<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Ville;
use App\Models\Annonces;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\SousCategorie;
use Intervention\Image\Image;
use Image as InterventionImage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class AnnonceController extends Controller
{
    function newAnnonce(){

        $souscat = SousCategorie::OrderBy('libelle','ASC')->get();
        $ville   = City::where('state_id',858)->orWhere('state_id',857)->OrderBy('name','ASC')->get();
        return view('AdminPages.Annonces.new', compact('souscat','ville'));
    }

    function addAnnonce(Request $request)
    {
        $validateData = $request->validate([
            'titre' => ['required', 'string', 'max:200'],
            'contactWhatsapp' => ['required'],
            'prix' => ['required'],
            'type' => ['required'],
            'lieu' => ['required'],
            'photo' => ['required'],
            'souscategorie_id' => ['required'],
            'ville_id' => ['required'],
        ]);

        
        if($validateData){
        $annonce = new Annonces;
        $annonce->titre = $request->titre;
        $annonce->contactWhatsapp = $request->contactWhatsapp;
        if($request->description){
            $annonce->description = $request->description;
        }else{
            $annonce->description = "Aucune description veuillez contactez le vendeur directement";
        }
        $annonce->prix = str_replace(' ','', $request->prix) ;   //supprimer les espaces
        $annonce->type = $request->type;
        $annonce->lieu = $request->lieu;
        if (request()->file('photo')) {
            $img = request()->file('photo');
                $messi = md5($img->getClientOriginalExtension().time().$request->contactWhatsapp).".".$img->getClientOriginalExtension();
                $source = $img;
                $waterMarkUrl = public_path('assets/images/logi_img.png');
                $target = 'images/Annonce/'.$messi;
                InterventionImage::make($source->getRealPath())->fit(700,510)->insert($waterMarkUrl,'bottom-left',3,3)->save($target);
                $annonce->photo   =  $messi;
        }else{
            $annonce->photo   = "default.jpg";
        }

            //images secondaires
          if (request()->file('images_secondaire')) {

            $n2=0;
            $photos = array();

            foreach(request()->file('images_secondaire') as $img){
                $n2++;
                $photo = md5($img->getClientOriginalExtension().time()).$n2.".".$img->getClientOriginalExtension();
                $source = $img;
                $waterMarkUrl = public_path('assets/images/logi_img.png');
                $target = 'images/Annonce/' .$photo;
                InterventionImage::make($source)->fit(700,510)->insert($waterMarkUrl,'bottom-left',3,3)->save($target);
                array_push($photos, $photo);
            }

            $photos = json_encode($photos);
        $annonce->images_secondaire = $photos;

        }


        if($request->email){
            $annonce->email = $request->email;
        }else{
            $annonce->email = Auth()->user()->email;
        }
        $annonce->user_id = Auth()->user()->id;
        if($request->facebook){
            $annonce->facebook = $request->facebook; 
        }else{
            $annonce->facebook = "aucun";
        }

        $annonce->ville_id = $request->ville_id;

        if(!is_null($request->souscategorie_id)){
            $annonce->souscategorie_id = $request->souscategorie_id;
        }else{
            return redirect()->back()->with('NotSousCategorieId', 'veuillez selectionner la categorie de votre articles');
        }

        $annonce->slug   = "TrockMoi".Str::slug("$request->token". Hash::make($request->email),"-");

        $annonce->save();
        
        if($annonce->save()){
            return redirect()->back()->with('saveSuccessAnnonce', "Annonce publiez avec succes");
        }else{
            return redirect()->back()->with('NotsaveSuccessAnnonce', "l'annonce n'a pas pu etre sauvegarder verifier que tous les champs sont correcte ");
        }

    }else{
        return redirect()->back()->with('champsNotSuccess', "un ou plusieurs champs ne sont pas correctement remplis veuillez reessayez");
    }

    }


    public function listAllAnnonce(){

        $annonce = Annonces::OrderBy('id', 'DESC')->get();
        $ville = City::where('state_id',858)->orWhere('state_id',857)->OrderBy('name','ASC')->get();
        return view('AdminPages.Annonces.list', compact('annonce','ville'));
    }

    function editAnnonce($slug)
    {
        $annonce = Annonces::where('slug',$slug)->first();
        if(!is_null($annonce)){
            $souscat = SousCategorie::OrderBy('libelle','ASC')->get();
            $ville   = City::where('state_id',858)->orWhere('state_id',857)->OrderBy('name','ASC')->get();
            return view('AdminPages.Annonces.edit', compact('annonce','souscat','ville'));
        }else{
            return redirect('/annonce_list')->with('NotExist', "L'Annonce n'existe pas ");
        }     
    }

    function updateAnnonce(Request $request, $slug)
    {
        $annonce = Annonces::where('slug',$slug)->first();
        if(!is_null($annonce))
        {
            if($request->titre){
                $annonce->titre = $request->titre;
            } 
            if($request->contactWhatsapp){
            $annonce->contactWhatsapp = $request->contactWhatsapp;
                
            }
            if($request->description){
                $annonce->description = $request->description;
            }
            if($request->prix)
                {
                $annonce->prix = $request->prix;
                }
                if($request->type){
                    $annonce->type = $request->type;
                }
                if($request->lieu){
                    $annonce->lieu = $request->lieu;
                }
            if (request()->file('photo')) {
                $img = request()->file('photo');
                    $messi = md5($img->getClientOriginalExtension().time().$request->contactWhatsapp).".".$img->getClientOriginalExtension();
                    $source = $img;
                    $waterMarkUrl = public_path('assets/images/logi_img.png');
                    $target = 'images/Annonce/'.$messi;
                    InterventionImage::make($source)->fit(700,510)->insert($waterMarkUrl,'bottom-left',2,2)->save($target);
                    $annonce->photo   =  $messi;
            }

              //images secondaires
          if (request()->file('images_secondaire')) {

            $n2=0;
            $photos = array();

            foreach(request()->file('images_secondaire') as $img){
                $n2++;
                $photo = md5($img->getClientOriginalExtension().time()).$n2.".".$img->getClientOriginalExtension();
                $source = $img;
                $waterMarkUrl = public_path('assets/images/logi_img.png');
                $target = 'images/Annonce/' .$photo;
                InterventionImage::make($source)->fit(700,510)->insert($waterMarkUrl,'bottom-left',2,2)->save($target);
                array_push($photos, $photo);
            }

            $photos = json_encode($photos);
            $annonce->images_secondaire = $photos;
        }

    
            if($request->email){
                $annonce->email = $request->email;
            }else{
                $annonce->email = $annonce->email;
            }
            if($request->facebook){
                $annonce->facebook = $request->facebook; 
            }
  
            if($request->ville_id == "aucun"){
            $annonce->ville_id = $annonce->ville_id;
            }else{
            $annonce->ville_id = $request->ville_id;
            }
           
            
    
            if($request->souscategorie_id == "aucun"){
                $annonce->souscategorie_id = $annonce->souscategorie_id;
            }else{
                $annonce->souscategorie_id = $request->souscategorie_id;
            }
    
    

            $annonce->update();
            if($annonce->update()){
                return redirect('/account')->with('ModifyAnnonceSuccess', "L'annonce a ete modifier avec success ");
            }else{
                return redirect('/account')->with('NotModifyAnnonceSuccess', " L'annonce n'a pas ete modifer veuillez rafraichir la page" );
            }
        }else{
            return redirect('/account')->with('NotExist', "L'Annonce n'existe pas ");
        }
    }


    function deleteAnnonce($slug)
    {
        $annonce = Annonces::where('slug',$slug)->first();
        if(isset($annonce)){
            return view('AdminPages.Annonces.delete', compact('annonce'));
        }else{
            return redirect('/annonce_list')->with('NotExist', "L'Annonce n'existe pas ");
        } 
    }

    function destroyAnnonce($slug)
    {
        $annonce = Annonces::where('slug',$slug)->first();
        if(isset($annonce)){
            $annonce->delete();
            if(Auth::user()->role == "admin"){   
                        return redirect('/annonce_list')->with('supprimer', "L'Annonce a ete supprimer ");  
            }else{
                return redirect('/account')->with('supprimer', "L'Annonce a ete supprimer ");  
            }
        }else{
            if(Auth::user()->role == "admin"){
                return redirect('/annonce_list')->with('NotExist', "L'Annonce n'existe pas ");
            }else{ 
                return redirect('/account')->with('supprimer', "L'Annonce a ete supprimer ");  
            }
        }  
    }



    function findSearchAnnonces(Request $request)
    {			
        $search = $request->search;		
        $annonce = Annonces::where( 'titre', 'LIKE', '%' . $search . '%' )->orWhere( 'prix', 'LIKE', '%' . $search . '%' )->orWhere( 'description', 'LIKE', '%' . $search . '%' )->get();
        if (count ($annonce) > 0 && isset($annonce)){
        return view ( 'AdminPages.Annonces.search')->with('annonce',$annonce);
        }else{
        return redirect( '/annonce_list')->with( 'Nodetails','No Details found. Esaayez encore  !' );	
        }	
    }


    function findSearchAnnoncesSelonCategorie(Request $request)
    {
        
        if($request->FindAnnonce == "Prix Le plus bas"){
            $annonce = Annonces::OrderBy('prix','ASC')->get();
            // ->select('*', 'users.name as unn')
            // ->join('users', 'commandes.user_id', '=',  'users.id')
            // ->get();
            
            if (count ($annonce) > 0 && isset($annonce)){
            return view('AdminPages.Annonces.search')->with('annonce',$annonce);
        }else{
            return redirect('/annonce_list')->with( 'Nodetails','No Details found. Esaayez encore  !' );	
            }	
        }
        if($request->FindAnnonce == "Prix Le plus eleve"){

            $annonce = Annonces::OrderBy('prix','DESC')->get();
            // ->select('*', 'users.name as unn')
            // ->join('users', 'commandes.user_id', '=',  'users.id')
            // ->get();
            if (count ($annonce) > 0 && isset($annonce)){
                return view('AdminPages.Annonces.search')->with('annonce',$annonce);
            }else{
                return redirect( '/annonce_list')->with( 'Nodetails','No Details found. Esaayez encore  !' );	
                }
        }
        if($request->FindAnnonce == "date recente"){
            $annonce = Annonces::OrderBy('created_at','DESC')->get();
            // ->select('*', 'users.name as unn')
            // ->join('users', 'commandes.user_id', '=',  'users.id')
            // ->get();
         
            if (count ($annonce) > 0 && isset($annonce)){
                return view('AdminPages.Annonces.search')->with('annonce',$annonce);
            }else{
                return redirect( '/annonce_list')->with( 'Nodetails','No Details found. Esaayez encore  !' );	
                }
        }
    }

    //fonction permettant a l'user de modify

    function changeAllRigth($slug){
        $annonce = Annonces::where('slug',$slug)->first();
        if(!is_null($annonce)){
            $souscat = SousCategorie::OrderBy('libelle','ASC')->get();
            $ville = City::where('state_id',858)->orWhere('state_id',857)->OrderBy('name','ASC')->get();
                return view('pages.Rigth.modify',compact('annonce','souscat','ville'));
        }else{
                return redirect()->back()->with('NotExist',"L'annonce selectionner n'est pas disponible ");
        }
    }

    function deleteAllRigth($slug){
        $annonce = Annonces::where('slug',$slug)->first();
        if(!is_null($annonce)){
          
                return view('pages.Rigth.delete',compact('annonce'));
        }else{
                return redirect()->back()->with('NotExist',"L'annonce selectionner n'est pas disponible ");
        }
    }
}
