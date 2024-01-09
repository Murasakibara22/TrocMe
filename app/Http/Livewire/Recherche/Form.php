<?php

namespace App\Http\Livewire\Recherche;

use Livewire\Component;
use App\Models\Annonces;

class Form extends Component
{
    public $TypeAnnonce ;
    public $annonceValue ;
    public $searchValue = '';

    public function mount($params) : void {
        $this->TypeAnnonce = $params;
    }

    public function updatedSearchValue() : void {
        if(!isset($this->searchValue) || $this->searchValue == ''){
                $this->annonceValue = "";
            }
            else
            {
                $this->annonceValue = Annonces::where('type', $this->TypeAnnonce)
                ->where('titre', 'like', '%'.$this->searchValue.'%')
                ->orderBy('created_at', 'desc')
                ->take(5)
                ->get();
            }



    }

    public function render()
    {
        return view('livewire.recherche.form');
    }
}
