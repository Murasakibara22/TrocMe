<?php

namespace App\Http\Controllers;

use App\Models\Partenaire;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Intervention\Image\Image;
use Image as InterventionImage;
use Illuminate\Support\Facades\Hash;

class PartenaireController extends Controller
{
    function nouveau()
    {
        return view('AdminPages.Partenaire.new');
    }

    function ajoutPartenaire(Request $request)
    {
        $validateData =  $request->validate([
            'nom' => ['required', 'string', 'max:150'],
            'contact'=>['required'],
            'email'=>['required'],
        ]);


        if($validateData)
        {
            $partenaire = new Partenaire;
            $partenaire->nom = $request->nom;
            $partenaire->email = $request->email;
            $partenaire->contact = $request->contact;
            $partenaire->slug   = "TROC-MOI-"."$request->nom".Str::slug("$request->token".Hash::make($request->nom),"-");  
            if($request->hasfile('photo')){
                $img = request()->file('photo');
                    $messi = md5($img->getClientOriginalExtension().time().$request->email).".".$img->getClientOriginalExtension();
                    $source = $img;
                    $target = 'images/Partenaire/'.$messi;
                    InterventionImage::make($source)->fit(135,42)->save($target);
                    $partenaire->photo   =  $messi;
            }else{
                $partenaire->photo   = "default.jpg";
            }

            $partenaire->save();
                if($partenaire->save()){
                    return redirect()->back()->with('saveSuccessPartenaire', 'Partenaire sauvegarder avec succes');
                }else{
                    return redirect()->back()->with('NotsaveSuccessPartenaire', " un probelme est survenue lors de l'enregistrement du Partenaire ");
                }

        }else{
            return redirect()->back()->with('AucunChamps', 'les champs ne peuvent pas etre vide');
        }
    }

    function listAll()
    {
        $partenaire = Partenaire::OrderBy('nom', 'ASC')->get();
        return view('AdminPages.Partenaire.list', compact('partenaire'));
    }

    function change($slug)
    {
        $partenaire = Partenaire::where('slug',$slug)->first();
        if(!is_null($partenaire))
        {
            return view('AdminPages.Partenaire.edit',compact('partenaire'));
        }else
        {
            return redirect()->back()->with('NotExist', "Le partenaire selectionner n'existe pas , veuillez rafraichir votre page");
        }
    }

    function modifyPartenaire(Request $request, $slug)
    {
        $partenaire = Partenaire::where('slug',$slug)->first();
        if(!is_null($partenaire))
        {
            $partenaire->nom = $request->nom;
            $partenaire->email = $request->email;
            $partenaire->contact = $request->contact;
            $partenaire->slug   = "TROC-MOI-"."$request->nom".Str::slug("$request->token".Hash::make($request->nom),"-");  
            if($request->hasfile('photo')){
                $img = request()->file('photo');
                    $messi = md5($img->getClientOriginalExtension().time().$request->email).".".$img->getClientOriginalExtension();
                    $source = $img;
                    $target = 'images/Partenaire/'.$messi;
                    InterventionImage::make($source)->fit(135,42)->save($target);
                    $partenaire->photo   =  $messi;
            }
            
            $partenaire->update();
            if($partenaire->update()){
                return redirect('/partenaire_list')->with('ModifySccuessPartenaire', "les informations du partenaires ont ete modifier avec succes");
            }else{
                return redirect()->back()->with('NotmodifySuccessPartenaire', " un probelme est survenue lors de la modification du Partenaire ");
            }
        }else{
            return redirect()->back()->with('NotExist', "Le partenaire selectionner n'existe pas , veuillez rafraichir votre page");
        }

    }

    function supprime($slug)
    {
        $partenaire = Partenaire::where('slug',$slug)->first();
        if(!is_null($partenaire))
        {
            return view('AdminPages.Partenaire.delete',compact('partenaire'));

        }else{
                return redirect()->back()->with('NotExist', "Le partenaire selectionner n'existe pas , veuillez rafraichir votre page");
            }
    }

    function spprimerPartenaire($slug)
    {
        $partenaire = Partenaire::where('slug',$slug)->first();
        if(!is_null($partenaire))
        {
            $partenaire->delete();
            return redirect('/partenaire_list')->with('SupprimerAvecSuccess', "Le partenaire selectionner a ete supprimer avec success");
        }else{
                return redirect()->back()->with('NotExist', "Le partenaire selectionner n'existe pas , veuillez rafraichir votre page");
            }
    }

    function findSearchPartenaire(Request $request)
    {			
        $search = $request->search;		
        $partenaire = Partenaire::where( 'nom', 'LIKE', '%' . $search . '%' )->orWhere( 'email', 'LIKE', '%' . $search . '%' )->get();
        if (count ($partenaire) > 0 && isset($partenaire)){
        return view ( 'AdminPages.Partenaire.search')->with('partenaire',$partenaire);
        }else{
        return redirect( '/partenaire_list')->with( 'Nodetails','No Details found. Esaayez encore  !' );	
        }	
    }
}
