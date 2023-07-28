<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Intervention\Image\Image;
use Image as InterventionImage;
use Illuminate\Support\Facades\Hash;

class CategorieController extends Controller
{
    public function nouvelle(){
        return view('AdminPages.Categorie.new');
    }

    function ajoutCategorie(Request $request)
    {
        $request->validate([
            'libelle'=> ['required','string','max:200'],
        ]);

        $categories                = new Categorie;
        $categories->libelle      = $request->libelle;     
        $categories->slug   = "TrockMoi".Str::slug("$request->token".Hash::make($request->libelle),"-");  
        if($request->description)
        {
            $categories->description =  $request->description;
        }else{
            $categories->description = 'Aucune description disponible';
        }

        if($request->hasfile('photo')){
            $img = request()->file('photo');
                $messi = md5($img->getClientOriginalExtension().time().$request->libelle).".".$img->getClientOriginalExtension();
                $source = $img;
                $target = 'images/Categorie/'.$messi;
                InterventionImage::make($source)->fit(118,92)->save($target);
                $categories->photo   =  $messi;
        }else{
            $categories->photo   = "default.jpg";
        }

        if($request->hasfile('image_illustrant')){
            $img = request()->file('image_illustrant');
                $messi = md5($img->getClientOriginalExtension().time().$request->libelle).".".$img->getClientOriginalExtension();
                $source = $img;
                $target = 'images/Categorie/img/'.$messi;
                InterventionImage::make($source)->fit(960,460)->save($target);
                $categories->image_illustrant   =  $messi;
        }else{
            $categories->image_illustrant   = "default.jpg";
        }

        
        $categories->save();
        

        if($categories->save())
        {
            return redirect()->back()->with('save','sauvegarder avec success');
        }else{
            return redirect()->back()->with('Notsave','sauvegarder pas sauvegarder');
        }

    }


    function listAll()
    {
        $categories  = Categorie::all();
        return view('AdminPages.Categorie.list',compact('categories'));
    }


    function change($slug)
    {
            $categories = Categorie::where('slug',$slug)->first();
            if(!is_null($categories)){
                return view('AdminPages.Categorie.edit', compact('categories'));
            }else{
                return redirect()->back()->with('Notedit','La categorie selectionner ne peut pas etre modifier');
            }
    }



    function changeCategorie(Request $request, $slug)
    {
        $categories = Categorie::where('slug',$slug)->first();
            if(!is_null($categories))
            {
                $categories->libelle      = $request->libelle;     
                $categories->slug   = "TrockMoi".Str::slug("$request->token".Hash::make($request->libelle),"-");  
                if($request->description)
                {
                    $categories->description =$request->description;
                }else{
                    $categories->description = 'Aucune description disponible';
                }
        
                if($request->has('photo')){
                    $img = request()->file('photo');
                        $messi = md5($img->getClientOriginalExtension().time().$request->libelle).".".$img->getClientOriginalExtension();
                        $source = $img;
                        $target = 'images/Categorie/'.$messi;
                        InterventionImage::make($source)->fit(118,92)->save($target);
                        $categories->photo   =  $messi;
                }
                

                if($request->has('image_illustrant')){
                    $img = request()->file('image_illustrant');
                        $cr7 = md5($img->getClientOriginalExtension().time()).".".$img->getClientOriginalExtension();
                        $source = $img;
                        $target = 'images/Categorie/img/'.$cr7;
                        InterventionImage::make($source)->fit(960,460)->save($target);
                        $categories->image_illustrant   =  $cr7;
                }

                $categories->update();
                if($categories->update())
                {
                    return redirect('/Categorie_list');
                }else{
                    return redirect('/Categorie_list')->width('NoteditSucces','categorie non modifier');
                }

            }else{
                return redirect('/Categorie_list')->width('Notedit','La categorie selectionner ne peut pas etre modifier');
            }
    }


    function supprimeCategorie($slug){
        $categories  = Categorie::where('slug',$slug)->first();
        if(!is_null($categories)){  
            return view('AdminPages.Categorie.delete', compact('categories'));
            
        }else{
            return redirect()->back()->with('Notedit','La categorie selectionner ne peut pas etre supprimer');
        }
    }


    function supprimer($slug)
    {
        $categories  = Categorie::where('slug',$slug)->first();
        
        if(!is_null($categories)){  
            $categories->delete();
            return redirect('/Categorie_list')->with('supprimerSuccess','Categorie supprimer avec success');
        }else{
            return redirect()->back()->with('Notedit','La categorie selectionner ne peut pas etre supprimer');
        }
    }


//for souscat

    

}
