<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use ReCaptcha\ReCaptcha;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Auth\Events\Registered;
use App\Providers\RouteServiceProvider;

class Register extends Component
{

    public $currentPage = 1;

    public $password;

    public $nom;
    public $prenom;
    public $email;
    public $contact;
    public $password_confirmation;


    private $validationRules  = [
        1 => [
            "nom" => ['required','max:255','min:3'],
            "prenom" => ['required','max:100','min:3'],
            "email" => ['required','email'],
            "contact" => ['required','min:10'],
        ],
        2 => [
            "password" => 'required|string ',
            "password_confirmation"=> ['required','min:8','same:password'],
        ]
    ];


     //Personnaliser mes message d'erreur
     protected $messages = [
        'nom.required' => 'Entrer un Nom valide',
        'nom.nom' => 'Le nom doit comporter plus de 5 carractere',
        'prenom.required' => 'Entrer un Prenom valide',
        'prenom.prenom' => 'Le Prenom doit comporter plus de 5 carractere',
        'email.required' => 'Entrer une adresse E-mail valide',
        'email.email' => 'le format de l\'adresse est invalid',
        'contact.required' => 'Entrer un Contact valide',
        'contact.contact' => 'le Contact est invalid',
        'password.required' => 'Entrer un password valide',
        'password.password' => 'le Contact est invalid',
        'password_confirmation.required' => 'Les deux password doivent etre compatible',
        'password_confirmation.password_confirmation' => 'mot de passe non compatible',
    ];


    public function updated($propertyName){
        $this->validateOnly($propertyName , $this->validationRules[$this->currentPage]);

    }

    public $pages = [
        1 => [
            'header' => "Informations personnels",
            'description' => "Entrer vos Informations personnels"
        ],
        2 => [
            'header' => "Informations Confidentielles",
            'description' => "Entrer un Mot de passe correspondant"
        ]
    ];

    public function nextCurrentPage()
    {
        $this->validate($this->validationRules[$this->currentPage]);
       $this->currentPage ++ ;
    }

    public function PrecedenteCurrentPage()
    {
       $this->currentPage--;
    }


    public function SaveUser()
    {
    
        $rules = Collect($this->validationRules)->collapse()->toArray();
         $this->validate($rules);
       

        $user = new User;
        $user->nom = $this->nom;
        $user->prenom = $this->prenom;
        $user->email = $this->email;
        $user->contact = $this->contact;
        $user->password = Hash::make($this->password);
        $user->slug = "TrockMoi".Str::slug(Hash::make($this->nom),"-");

        $user->save();

        session()->flash('successMessage',"User creer avec success");

        $this->reset();
        $this->resetValidation();


        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);

    }
    
    public function render()
    {
        return view('livewire.register');
    }
}
