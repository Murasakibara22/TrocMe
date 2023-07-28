<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Ville;
use App\Models\Annonces;
use App\Models\Categorie;
use App\Models\EspacePub;
use App\Models\Following;
use App\Models\Partenaire;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\SousCategorie;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class FollowingController extends Controller
{
    function nouveau(){
        return view('AdminPages.Following.new');
    }

    function ajoutfollowing(Request $request)
    {
       $validateRequest =  $request->validate([
            'titre' => ['required', 'string',' max:100'],
            'avantage1' => ['required'],
            'avantage2' => ['required'],
            'prix' => ['required']
        ]);


        if($validateRequest){
            $follow = new Following;
            $follow->titre = $request->titre;
            $follow->nb_jours = $request->nb_jours;
            $follow->avantage1 = $request->avantage1;
            $follow->avantage2 = $request->avantage2;
            $follow->prix = $request->prix;
            $follow->description = $request->description;
            $follow->slug   = "TROC MOI"."$request->titre".Str::slug("$request->token".Hash::make($request->titre),"-");  

            if(isset($request->avantage3)){
            $follow->avantage3 = $request->avantage3;
            }else{
                $follow->avantage3 = "et plus" ;
            }

            
            $follow->save();
            if($follow->save()){
                return redirect()->back()->with('SaveFollowingSuccess', "le type d'abonnements a ete creer avec success ");
            }else{
                return redirect()->back()->with('NotSaveFollowingSuccess',"le type d'abonnements n'a pas pu etre creer avec success ");
            }
        }else{
            return redirect()->back()->with('champsmanquant', "l'un des champs n'est pas correctement remplit");
        }

    }


    function listAll(){
        $follow = Following::all();

        return view('AdminPages.Following.list', compact('follow'));
    }

    //vue  Following
    function change($slug){
        $follow = Following::where('slug',$slug)->first();
        if(!is_null($follow)){
            return view('AdminPages.Following.edit', compact('follow'));
        }else{
            return redirect()->back()->with('NotExist',"Le type d'abonnement selectionner n'existe pas ");
        }
    }


    function changeFollow(Request $request, $slug){
        $follow = Following::where('slug',$slug)->first();
        if(!is_null($follow))
        {
            if($request->titre){
                $follow->titre = $request->titre;
            }
            if($request->nb_jours){
                $follow->nb_jours = $request->nb_jours;
            }
            if($request->avantage1){
                $follow->avantage1 = $request->avantage1;
            }
            if($request->prix){
                $follow->prix = $request->prix;
            }
            if($request->avantage2){
                $follow->avantage2 = $request->avantage2;
            }
            if($request->description){
                $follow->description = $request->description;
            }

            if(isset($request->avantage3)){
            $follow->avantage3 = $request->avantage3;
            }else{
                $follow->avantage3 = "et plus" ;
            }

            $follow->update();
            if($follow->update()){
                return redirect('/following_list')->with('ModifyFollowingSuccess', "le type d'abonnements a ete modifier avec success ");
            }else{
                return redirect('/following_list')->with('NotModifyFollowingSuccess',"le type d'abonnements n'a pas pu etre modifier ");
            }
        
        }else{
            return redirect('/following_list')->with('NotExist',"Le type d'abonnement selectionner n'existe pas ");
        }
    }


    function supprimer($slug)
    {
        $follow = Following::where('slug',$slug)->first();
        if(!is_null($follow)){
            return view('AdminPages.Following.delete', compact('follow'));
        }else{
            return redirect('/following_list')->with('NotExist',"Le type d'abonnement selectionner n'existe pas ");
        }
    }


    function supprimerFollowing($slug)
    {
        $follow = Following::where('slug',$slug)->first();
        if(!is_null($follow)){
            $follow->delete();
            return redirect('/following_list')->with('supprimerSuccessFolowing',"Le type d'abonnement selectionner n'existe pas ");
        }else{
            return redirect('/following_list')->with('NotExist',"Le type d'abonnement selectionner n'existe pas ");
        }
    }







    //Page des Abonnees

    public function Home_principale($slug){
        $user = User::where('slug',$slug)->first();
        $annonce = Annonces::OrderBy('id', 'DESC')->where('user_id',$user->id)->get();
        $today = date('j M, Y', strtotime(Carbon::today())  );
        $annon = Annonces::Where('type','troque')->where('user_id',$user->id)->OrderBy('titre','ASC')->get();
        $annonceVente = Annonces::Where('type','vente')->where('user_id',$user->id)->OrderBy('titre','ASC')->get();
        $annonceDemandez = Annonces::Where('type','demandez')->where('user_id',$user->id)->OrderBy('titre','ASC')->get();
 
        return view('Abonnee.index',compact('annon','annonceVente','annonceDemandez','annonce','today','user'));
    }

    
    public function troque_abonnee($slug){
        $user = User::where('slug',$slug)->first();
        $today = date('j M, Y', strtotime(Carbon::today())  );

        $annon = Annonces::Where('type','troque')->where('user_id',$user->id)->OrderBy('titre','ASC')->get();
        return view('Abonnee.troc',compact('annon','user','today'));

    }


    public function vente_abonnee($slug){
        $user = User::where('slug',$slug)->first();
        $today = date('j M, Y', strtotime(Carbon::today())  );

        $annon = Annonces::Where('type','vente')->where('user_id',$user->id)->OrderBy('titre','ASC')->get();
        return view('Abonnee.vente',compact('annon','user','today'));
    }

    public function recherchez_abonnee($slug){
        $user = User::where('slug',$slug)->first();
        $today = date('j M, Y', strtotime(Carbon::today())  );

        $annon = Annonces::Where('type','demandez')->where('user_id',$user->id)->OrderBy('titre','ASC')->get();
        return view('Abonnee.demander',compact('annon','user','today'));
    }
}
