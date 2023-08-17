<?php

namespace App\Http\Livewire\Partials;

use App\Models\Aide;
use Livewire\Component;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class Aide1 extends Component
{

    public $text, $status, $id_aide;

    protected $rules = [
        'text' => ['required','min:10'],
    ];
 
    protected $messages = [
        'text.required' => 'Le champs text ne peu pas etre vide.',
        'text.min' => 'Le text doit depasser au moins 10 lettre',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
 
    function submit_aide() : void {
        $this->validate();

        $aide = new Aide ;
        $aide->message = $this->text ;
        $aide->status = 0 ;
        $aide->slug = "TrockMoi".Str::slug($aide->id.Hash::make($this->text),"-");
        $aide->save();

        Session::flash('message', 'Aide enregisrer avec success !'); 

        $this->reset();

        $this->dispatchBrowserEvent('closeAddHelp');
    }


    function edit_aide($id) : void {
        $aide  = Aide::find($id);
        if($aide){
            $this->id_aide = $aide->id ;
            $this->text = $aide->message ;
        }
    }

    function update_aide(){
        $aide  = Aide::first();
        if($aide){
            $aide->message  = $this->text;
            $aide->update();

            if($aide->update()){
                Session::flash('message', "La modification du text d'aide a été éffectuer avec success"); 
                $this->reset();

                $this->dispatchBrowserEvent('closeEditHelp');
            }
        }
    }

    function delete_aide() : void {
        $aide  = Aide::first();
        if($aide){
            $aide->delete();
                Session::flash('message', "Texte d'aide supprimer avce succes"); 
                $this->reset();
        }
    }

    public function render()
    {
        return view('livewire.partials.aide1',[
            'list_aide' => Aide::first()
        ]);
    }
}
