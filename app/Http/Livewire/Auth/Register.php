<?php

namespace App\Http\Livewire\Auth;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class Register extends Component
{
    public $name, $email, $password, $contact, $password_confirmation;

    protected $rules = [
        'name' => 'required|min:3|regex:/^[a-zA-Z\s]+$/',
        'email' => 'required|email|unique:users',
        "contact" => ['required','max:10','regex:/^([0-9\s\-\+\(\)]*)$/','min:10'],
        'password' => 'required|min:8',
        'password_confirmation' => 'required|min:8|same:password'
    ];

    protected $messages = [
        'name.required' => 'Le nom est requis.',
        'name.min' => 'Le nom doit avoir au moins  3 caracteres .',
        'name.regex' => 'Le nom est invalid.',
        'email.required' => 'Adresse email requis.',
        'email.email' => 'Adresse email invalide.',
        'email.unique' => "L'email doit etre unique.",
        'contact.required' => 'un numero de telephone est obligatoire',
        'contact.regex' => 'le Contact est invalid',
        'contact.min' => 'le Contact doit avoir au moins 10 caracteres.',
        'contact.max' => 'le Contact ne doit pas avoir plus de 10 caracteres.',
        'password.required' => 'Mot de passe requis.',
        'password.min' => 'Le mot de passe est minimum 8 caracteres.',
        'password_confirmation.required' => 'Confirmation du mot de passe requis.',
        'password_confirmation.min' => 'Le mot de passe est minimum 8 caracteres.',
        'password_confirmation.same' => 'Le mot de passe doit etre identique au premier!.',
    ];

    public function updated($propertyName){
        $this->validateOnly($propertyName);
    }


    // Generate  password par default pour les utilisateurs
    function generateRandomPassword($length = 10) {
        $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789"!@#$%^&*()_-=+;:,.?';
        $password2 = '';

        for ($i = 0; $i < $length; $i++) {
            $index = rand(0, strlen($characters) - 1);
            $password2 .= $characters[$index];
        }

        $this->password = $password2;
    }



    //Enregistrer un utilisateur
    public function registerUser()
    {
        $this->validate();

        $user = new User;
            $user->prenom = $this->name;
            $user->email = $this->email;
            $user->contact = $this->contact;
            $user->password= Hash::make($this->password);
            $user->photo= "https://api.dicebear.com/7.x/adventurer/svg?seed={{ $user->prenom }}";
            $user->slug = "trocMoi".Str::slug(Hash::make($this->email),"-");
        $user->save();

        auth()->login($user);

        return redirect()->to('/');
    }

    public function render()
    {
        return view('livewire.auth.register');
    }
}
