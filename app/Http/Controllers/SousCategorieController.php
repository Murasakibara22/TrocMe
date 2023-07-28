<?php

namespace App\Http\Controllers;

use App\Models\Annonces;
use App\Models\Categorie;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\SousCategorie;
use Illuminate\Support\Facades\Hash;

class SousCategorieController extends Controller
{
    
    function nouveau()
    {
        $categorie = Categorie::all();
        return view('AdminPages.SousCategorie.new',compact('categorie'));
    }


    function ajoutSousCat(Request $request)
    {
        $request->validate([
            'libelle'=>['required', 'string',' max:200'],
            'categorie_id'=> ['required']
        ]);

        $SubCategory  = new SousCategorie;
        $SubCategory->libelle  = $request->libelle;
        $SubCategory->categorie_id    = $request->categorie_id;
        $SubCategory->slug           =  Str::slug("$request->token".Hash::make($request->libelle), "-");

        $SubCategory->save();
        if($SubCategory->save())
        {
            return redirect()->back()->with('saveSuccessSubCate', 'Sous Categorie sauvegarder avec succes');
        }else{
            return redirect()->back()->with('NotsaveSuccessSubCate', 'Sous Categorie non sauvegarder');
        }
    }


    function listAll()
    {
        $SubCategory = SousCategorie::all();
        $categorie = Categorie::all();
        
        return view('AdminPages.SousCategorie.list',compact('SubCategory'));
    }


    function changed($slug)
    {
        $SubCategory = SousCategorie::where('slug', $slug)->first();
        if(!is_null($SubCategory)){
            $categorie = Categorie::all();
            return view('AdminPages.SousCategorie.edit', compact('SubCategory','categorie'));
        }else{
            return redirect()->back()->with('NotExist', "la Sous Categorie n'existe pas");
        }
    }

    function modifierSubCategory(Request $request ,$slug)
    {
        $SubCategory = SousCategorie::where('slug', $slug)->first();
        if(!is_null($SubCategory))
        {
            $SubCategory->libelle        = $request->libelle;
            $SubCategory->categorie_id   = $request->categorie_id;
            $SubCategory->slug           =  Str::slug("$request->token".Hash::make($request->libelle), "-");      

            $SubCategory->update();
            if($SubCategory->update()){
                return redirect('/SousCategorie_list')->with('updateSubCategory', 'la sous categorie a ete modifier avec succes ');
            }else{
                return redirect()->back()->with('NotupdateSubCategory', "une erreur c'est produite");
            }
        }else{
            return redirect('/SousCategorie_list')->with('NotExist');
        }
    }

    function supprimeSub($slug)
    {
        $SubCategory = SousCategorie::where('slug', $slug)->first();
        if(!is_null($SubCategory)){
            return view('AdminPages.SousCategorie.delete', compact('SubCategory'));
        }else{
            return redirect()->back()->with('NotExist', "la Sous Categorie n'existe pas");
        }
    }

    function supprimeSubCategory($slug)
    {
        $SubCategory = SousCategorie::where('slug', $slug)->first();
        if(!is_null($SubCategory)){
            // dd($SubCategory);
            $SubCategory->delete();
            return redirect('/SousCategorie_list')->with('deleteSuccess','La sous categorie a ete supprimer');
        }else{
            return redirect()->back()->with('NotExist', "la Sous Categorie n'existe pas");
        }
    }


    function listSelonCat($slug)
         {
            $SousCatItem = SousCategorie::query()
        ->select('sous_categories.libelle as nomSous','sous_categories.created_at as date', 'categories.libelle as nom')
        ->join('categories', 'sous_categories.categorie_id', '=',  'categories.id')
        ->where('categories.slug', '=', $slug)
        ->get();

        
            return view('AdminPages.SousCategorie.selon', compact('SousCatItem'));
         }

    function listAnnonceSelonSousCat($slug){

        $annonce = Annonces::query()
                    ->select('*')
                    ->join('sous_categories','annonces.souscategorie_id', '=','sous_categories.id')
                    ->where('sous_categories.slug', '=', $slug)
                    ->get();

        
        if(!is_null($annonce)){
        return view('AdminPages.SousCategorie.AnnonceSelonSousCat',compact('annonce'));
        }else{
            return redirect()->back()->with('Notfound');
        }
    }

    function searchSouscat(Request $request){
        $search = $request->search;
        $SubCategory = SousCategorie::where( 'libelle', 'LIKE', '%' . $search . '%' )->get();
        if (count ($SubCategory) > 0 && isset($SubCategory)){
        return view ( 'AdminPages.SousCategorie.searchSousCat')->with('SubCategory',$SubCategory);
        }else{
        return redirect( '/SousCategorie_list')->with( 'Nodetails','No Details found. Esaayez encore  !' );	
        }
    }
}
