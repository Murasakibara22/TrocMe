<?php

namespace App\Http\Livewire\Partials;

use Livewire\Component;
use App\Models\Categorie;

class Footer extends Component
{
    public function render()
    {
        return view('livewire.partials.footer',[
            'categorie_list' => Categorie::Has('Souscat', '>=' , 5)->take(2)->get()
        ]);
    }
}
