<?php

namespace App\Http\Livewire\Troque;

use Livewire\Component;
use App\Models\Annonces;

class TroqueList extends Component
{

    public $query ;
    
    public $paginateNumber = 3 ;

    protected $queryString =[
        'query' => ['except'=> '']
    ];

    public function loadPlus()
    {
        $this->paginateNumber += 5 ;
    }
   
  

    public function render()
    {
        
        return view('livewire.troque.troque-list',[
            'annonce' => Annonces::where('titre','LIKE','%'.$this->query.'%')->where('type','troque')->OrderBy('created_at', 'DESC')->paginate($this->paginateNumber),
            'annonce_sponsoriser' => Annonces::query()
                                    ->select('annonces.titre','annonces.prix','annonces.type','annonces.created_at','annonces.slug','annonces.photo')
                                    ->join('annonce_prenia','annonce_prenia.annonce_id','=','annonces.id')
                                    ->where('date_fin','>=',date('Y-m-d'))
                                    ->where('annonces.type','=',"troque")
                                    ->where('annonce_prenia.etat',1)
                                    ->OrderBy('annonce_prenia.created_at','DESC')
                                    ->get()
        ]);
    }
}
