<?php

namespace App\Http\Livewire\Demande;

use Livewire\Component;
use App\Models\Annonces;

class SearchDemande extends Component
{

    public $search  ;

    public  $results  = [];

    public function updatingSearch(){
        $this->results = Annonces::where('titre', 'like', '%'.$this->search.'%')->where('type','demandez')->get();

        $this->search = "";
    }


    public function render()
    {
        return view('livewire.demande.search-demande');
    }
}
