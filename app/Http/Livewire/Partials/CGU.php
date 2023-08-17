<?php

namespace App\Http\Livewire\Partials;

use Livewire\Component;
use Illuminate\Support\Str;
use App\Models\ConditionGenerale;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class CGU extends Component
{

    public $msg, $status, $id_cgu;

    protected $rules = [
        'msg' => ['required','min:10'],
    ];
 
    protected $messages = [
        'msg.required' => 'Le champs msg ne peu pas etre vide.',
        'msg.min' => 'Le msg doit depasser au moins 10 lettre',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
 
    function submit_cgu() : void {
        $this->validate();

        $cgu = new ConditionGenerale ;
        $cgu->text = $this->msg ;
        $cgu->status = 0;
        $cgu->slug = "TrockMoi".Str::slug($cgu->id.Hash::make($this->msg),"-");
        $cgu->save();

        Session::flash('message', 'cgu enregisrer avec success !'); 

        $this->reset();

        $this->dispatchBrowserEvent('closeAddCGU');
    }


    function edit_cgu() : void {
        $cgu  = ConditionGenerale::first();
        if($cgu){
            $this->id_cgu = $cgu->id ;
            $this->msg = $cgu->text ;
        }
    }

    function update_cgu(){
        $cgu  = ConditionGenerale::first();
        if($cgu){
            $cgu->text  = $this->msg;
            $cgu->update();

            if($cgu->update()){
                Session::flash('message', "La modification du msg d'cgu a été éffectuer avec success"); 
                $this->reset();

                $this->dispatchBrowserEvent('closeEditCGU');
            }
        }
    }

    function delete_cgu() : void {
        $cgu  = ConditionGenerale::first();
        if($cgu){
            $cgu->delete();
                Session::flash('message', "msg d'cgu supprimer avce succes"); 
                $this->reset();
        }
    }


    public function render()
    {
        return view('livewire.partials.c-g-u',[
            'list_cgu' => ConditionGenerale::first()
        ]);
    }
}
