<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Pays;
use App\Models\Ville;
use App\Models\Country;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PaysController extends Controller
{

    function nouveau(){
        return view('AdminPages.Pays.new');
    }

    function ajoutPays(Request $request)
    {
        $pays = new Pays;
        $pays->libelle = $request->libelle;
        $pays->code = $request->code;
        $pays->slug = Str::slug("$request->token". Hash::make($request->libelle),"-");

        $pays->save();
        if($pays->save()){
            return redirect()->back()->with('PaysSuccesSsave',"Pays sauvegarder Avec success");
        }else{
            return redirect()->back()->with('NotPaysSuccesSsave'," echec de sauvegarde du Pays");
        }
    }


    function listAll()
    {
        $pays = Country::OrderBy('name', 'ASC')->get();
        return view('AdminPages.Pays.list', compact('pays')); 
    }

    function findSearchPa(Request $request){
        $search = $request->search;		
        $pays = Country::where( 'name', 'LIKE', '%' . $search . '%' )->get();
        if (count ($pays) > 0 && isset($pays)){
        return view ( 'AdminPages.Pays.search')->with('pays',$pays);
        }else{
        return redirect( '/pays_list')->with( 'Nodetails','No Details found. Esaayez encore  !' );	
        }	
    }
    










    //villes


    function nouvelle(){
        $pays = Country::all();
        return view('AdminPages.Ville.new', compact('pays'));
    }

    function ajoutVille(Request $request)
    {
        $ville = new Ville;
        $ville->libelle = $request->libelle;
        $ville->code = $request->code;
        $ville->pays_id = $request->pays_id;
        $ville->slug = Str::slug("$request->token". Hash::make($request->libelle),"-");

        $ville->save();
        if($ville->save()){
            return redirect()->back()->with('villeSuccesSsave',"ville sauvegarder Avec success");
        }else{
            return redirect()->back()->with('NotvilleSuccesSsave'," echec de sauvegarde du ville");
        }
    }


    function listAllVille()
    {
        $ville = City::OrderBy('name', 'ASC')->take(1000)->get();
        return view('AdminPages.Ville.list', compact('ville')); 
    }

    function findSearchVil(Request $request){
        $search = $request->search;		
        $ville = City::where( 'name', 'LIKE', '%' . $search . '%' )->get();
        if (count ($ville) > 0 && isset($ville)){
        return view ( 'AdminPages.Ville.search')->with('ville',$ville);
        }else{
        return redirect( '/ville_list')->with( 'Nodetails','No Details found. Esaayez encore  !' );	
        }	
    }

}
