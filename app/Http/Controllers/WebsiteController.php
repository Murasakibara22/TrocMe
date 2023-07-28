<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Annonces;
use App\Models\Categorie;
use Illuminate\Http\Request;
use App\Models\SousCategorie;

class WebsiteController extends Controller
{
    
    public function get_annonces(){
        $ville   = City::where('state_id',858)->orWhere('state_id',857)->OrderBy('name','ASC')->get();
        $souscat = SousCategorie::OrderBy('libelle','ASC')->get();
        $annonce_simple = Annonces::OrderBy('id', 'DESC')->paginate(20);
        $categorie = Categorie::OrderBy('created_at','DESC')->get();
        $annonce_sponsoriser = Annonces::query()
                        ->select('annonces.titre','annonces.prix','annonces.type','annonces.created_at','annonces.slug','annonces.photo','annonces.souscategorie_id')
                        ->join('annonce_prenia','annonce_prenia.annonce_id','=','annonces.id')
                        ->where('date_fin','>=',date('Y-m-d'))
                        ->where('annonce_prenia.etat',1)
                        ->OrderBy('annonce_prenia.created_at','DESC')
                        ->paginate(2);
        $total_annonces = Annonces::all();
        return view('pages.BestPage.annonceAll',compact('annonce_sponsoriser','ville','souscat','annonce_simple','categorie','total_annonces'));
    }



    public function filtrer_par_prix()
{

    $donnees  = Annonces::where('prix', request('filtre1'))->get();


    return response()->json($donnees);
}


    public function func_form_affichage()
    {
        $ville   = City::where('state_id',858)->orWhere('state_id',857)->OrderBy('name','ASC')->get();
        $souscat = SousCategorie::OrderBy('libelle','ASC')->get();
        $annonce_simple = Annonces::OrderBy('id', 'DESC')->paginate(20);
        $categorie = Categorie::OrderBy('created_at','DESC')->get();
        $annonce_sponsoriser = Annonces::query()
                        ->select('annonces.titre','annonces.prix','annonces.type','annonces.created_at','annonces.slug','annonces.photo','annonces.souscategorie_id')
                        ->join('annonce_prenia','annonce_prenia.annonce_id','=','annonces.id')
                        ->where('date_fin','>=',date('Y-m-d'))
                        ->where('annonce_prenia.etat',1)
                        ->OrderBy('annonce_prenia.created_at','DESC')
                        ->get();
        $donnees = request('model_affiche_annonces');
        

        return view('pages.BestPage.ModelAffichageAnnonces',compact('donnees','annonce_sponsoriser','ville','souscat','annonce_simple','categorie'));
    }

}
