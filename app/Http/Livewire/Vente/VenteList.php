<?php

namespace App\Http\Livewire\Vente;

use Livewire\Component;
use App\Models\Annonces;
use App\Models\Categorie;

class VenteList extends Component
{

    public $search ;

    public  $rangeValue ;

    public $paginateNumber = 5;

    protected $queryString =[
        'search' => ['except'=> '']
    ];


    public function loadMore(){
        $this->paginateNumber += 5 ;
    }

    public function render()
    {
        return view('livewire.vente.vente-list',[
            'annonce_sponsoriser' =>  Annonces::query()
                            ->select('annonces.titre','annonces.prix','annonces.type','annonces.created_at','annonces.slug','annonces.photo')
                            ->join('annonce_prenia','annonce_prenia.annonce_id','=','annonces.id')
                            ->where('date_fin','>=',date('Y-m-d'))
                            ->where('annonces.type','=',"vente")
                            ->where('annonce_prenia.etat',1)
                            ->where('annonces.titre','LIKE','%'.$this->search.'%')
                            ->OrderBy('annonce_prenia.created_at','DESC')
                            ->get(),
            'annonce'=>Annonces::where('titre','LIKE','%'.$this->search.'%')->where('type','vente')->Orwhere('type','Troque ou Vente')->OrderBy('created_at', 'DESC')->paginate($this->paginateNumber),
            'categorie' => Categorie::OrderBy('created_at','DESC')->get()
        ]);
    }
}
