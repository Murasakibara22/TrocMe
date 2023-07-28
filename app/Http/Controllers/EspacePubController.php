<?php

namespace App\Http\Controllers;

use App\Models\EspacePub;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\SousCategorie;
use Intervention\Image\Image;
use Image as InterventionImage;
use Illuminate\Support\Facades\Hash;

class EspacePubController extends Controller
{
    function nouveau()
    {

        $souscategorie = SousCategorie::all();
        return view('AdminPages.EspacePub.new',compact('souscategorie'));
    }


    function ajoutEspace(Request $request)
    {
       $validateData =  $request->validate([
                'titre' => ['required', 'string', 'max:150'],
                'description' => ['required'],
                'photo' => ['required'],
        ]);

        if($validateData)
        {
            $espace = new EspacePub ; 
            $espace->titre  = $request->titre;
            $espace->slug  =  "TROC-MOI_".Str::slug("$request->token".Hash::make($request->titre),"-"); 
            if($request->description)
            {
                $espace->description =  $request->description;
            }else{
                $espace->description =  " ";
            }
            $espace->souscat_id = $request->souscat_id ;
    
            if($request->hasfile('photo')){
                $img = request()->file('photo');
                    $messi = md5($img->getClientOriginalExtension().time().$request->token).".".$img->getClientOriginalExtension();
                    $source = $img;
                    $target = 'images/EspacePub/'.$messi;
                    InterventionImage::make($source)->fit(787,300)->save($target);
                    $espace->photo   =  $messi;
            }else{
                $espace->photo   = "default.jpg";
            }

           
            $espace->save();
            if($espace->save())
            {
                return redirect()->back()->with('SaveEspacePub', "L'espace publicitaire a ete sauvegarder avec succes");
            }else{
                return redirect()->back()->with('NotSaveEspacePub', "Un probleme est survenue veuillez reessayer");
            }

        }else{
            return redirect()->back()->with('NotValidateData', "l'un des champs n'est pas correctement rempli ");
        }
    }


    function listAll(){
        $espace = EspacePub::OrderBy('id','DESC')->get();

        return view('AdminPages.EspacePub.list', compact('espace'));
    }


    function change($slug)
    {
        $espace = EspacePub::where('slug',$slug)->first();
        $souscategorie = SousCategorie::all();
        if(!is_null($espace)){
            return view('AdminPages.EspacePub.edit', compact('espace','souscategorie'));
        }else{
            return redirect()->back()->with('NotExist',"L'espace publicitaire choisi n'existe pas");
        }
    }

    function modifyEspacePub(Request $request, $slug)
    {
        $espace = EspacePub::where('slug',$slug)->first();
        if(!is_null($espace)){
            
            $espace->titre  = $request->titre;
            $espace->slug  =  "TROC-MOI_".Str::slug("$request->token".Hash::make($request->titre),"-"); 
            if($request->description)
            {
                $espace->description =  $request->description;
            }else{
                $espace->description =  " ";
            }
            if($request->souscat_id == "aucun"){
                $espace->souscat_id = $espace->souscat_id ;
            }else{
                $espace->souscat_id = $request->souscat_id ;
            }
    
            if($request->hasfile('photo')){
                $img = request()->file('photo');
                    $messi = md5($img->getClientOriginalExtension().time().$request->token).".".$img->getClientOriginalExtension();
                    $source = $img;
                    $target = 'images/EspacePub/'.$messi;
                    InterventionImage::make($source)->fit(787,300)->save($target);
                    $espace->photo   =  $messi;
            }
;
            $espace->update();
            if($espace->update()){
                return redirect('/espaccepub_list')->with('ModifyEspacePub', "L'espace publicitaire a ete Modifier avec succes");
            }else{
                return redirect('/espaccepub_list')->with('NotModifyEspacePub', "Un probleme est survenue veuillez reessayer");
            }
        }else{
            return redirect()->back()->with('NotExist',"L'espace publicitaire choisi n'existe pas");
        }
    }

    function supprimer($slug){
        $espace = EspacePub::where('slug',$slug)->first();
        if(!is_null($espace)){
            return view('AdminPages.EspacePub.delete', compact('espace'));
        }else{
            return redirect('/espaccepub_list')->with('NotExist',"L'espace publicitaire choisi n'existe pas");
        }
    }

    function supprimerEspacePub($slug){
        $espace = EspacePub::where('slug',$slug)->first();
        if(!is_null($espace))
        {
            $espace->delete();
            if($espace->delete()){
                return redirect('/espaccepub_list')->with('DeleteEspacePub', "L'espace publicitaire a ete Supprimer avec succes");
            }else{
                return redirect('/espaccepub_list')->with('NotDeleteEspacePub', "Un probleme est survenue veuillez reessayer");
            }
        }else{
            return redirect('/espaccepub_list')->with('NotExist',"L'espace publicitaire choisi n'existe pas");
        }
    }
}
