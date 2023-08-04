<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Annonces;
use Illuminate\Http\Request;

class DashboardUserController extends Controller
{
    //Page de troque de l'utilisateur 

    public function troque_utilisateur(){
        $annonce = Annonces::Where('type','troque')->where('user_id',Auth()->user()->id)->get();
        return view('pages.dashboardUser.troque',compact('annonce'));
    }


    //Page de dons de l'utilisateur 
    public function dons_utilisateur(){
        $annonce = Annonces::Where('type','dons')->where('user_id',Auth()->user()->id)->get();

            return view('pages.dashboardUser.dons',compact('annonce'));
    }


     //Page de demande de l'utilisateur 
     public function demande_utilisateur(){
        $annonce = Annonces::Where('type','demandez')->where('user_id',Auth()->user()->id)->get();
            return view('pages.dashboardUser.demandez',compact('annonce'));
      
    }



    public function index_page($slug)
    {

        $user = User::where('slug',$slug)->first();


        if($user){

            $annonce_simple = Annonces::Where('user_id',$user->id)->OrderBy('id', 'DESC')->paginate(12);
        $annonce_sponsoriser = Annonces::query()
                        ->select('annonces.id','annonces.titre','annonces.prix','annonces.type','annonces.created_at','annonces.slug','annonces.photo','annonces.souscategorie_id','annonces.user_id')
                        ->join('annonce_prenia','annonce_prenia.annonce_id','=','annonces.id')
                        ->join('users','annonces.user_id','=','users.id')
                        ->where('date_fin','>=',date('Y-m-d'))
                        ->where('annonce_prenia.etat',1)
                        ->where('annonces.user_id','=',$user->id)
                        ->OrderBy('annonce_prenia.created_at','DESC')
                        ->get();
        $total_annonces = Annonces::all();

        
    



            $validity_souscrit_pro = User::query()
            ->select('users.id','users.nom','users.prenom','users.slug','users.contact','users.email','users.photo','users.photo_entreprise','users.bannear','users.view_count_page','users.role')
            ->join('professional_users','professional_users.user_id','=','users.id')
            ->where('professional_users.date_fin','>=',date('Y-m-d'))
            ->where('professional_users.etat',1)
            ->where('users.id','=',$user->id)
            ->first();

        
            if($validity_souscrit_pro){
                $user_pro = True ;
            }else{
                $user_pro = False;
            }


            $user->increment('view_count_page');
            return view('pages.BestPage.DashUserView.index',compact('user','annonce_sponsoriser','total_annonces','annonce_simple','user_pro'));
        }else{

            session()->flash('messageuser',"L'utilisateur specifier n'existe pas ou a ete supprimer si vous voulez vraiment le contactez veuillez prendre le numero dans la section Informations");
            return redirect()->back() ;
        }

        
    }


    

    public function autocompleteSearch(Request $request)
    {
        $term = $request->input('term');
        $id_user = $request->input('user_id');

        $results = Annonces::where('user_id',$id_user)->where('titre', 'like', '%'.$term.'%')
                           ->get();
    
        $apostolic = view('pages.listSearch',compact('results'))->render();
        return response()->json($apostolic);
    }

    public function autocompleteSearchDemandez(Request $request)
    {
        $term = $request->input('term');

        $results = Annonces::where('titre', 'like', '%'.$term.'%')->where('type','demandez')->take(12)->get();
    
        $resultat_search = view('pages.listSearchDemandez',compact('results'))->render();
        return response()->json($resultat_search);
    }

    public function autocompleteSearchTrock(Request $request)
    {
        $term = $request->input('term');

        $results = Annonces::where('titre', 'like', '%'.$term.'%')->where('type','troque')->take(12)->get();
    
        $resultat_search = view('pages.listSearchDemandez',compact('results'))->render();
        return response()->json($resultat_search);
    }

    public function autocompleteSearchdons(Request $request)
    {
        $term = $request->input('term');

        $results = Annonces::where('titre', 'like', '%'.$term.'%')->where('type','dons')->take(12)->get();
    
        $resultat_search = view('pages.listSearchDemandez',compact('results'))->render();
        return response()->json($resultat_search);
    }


    public function simple_annonce_pages_user(Request $request)
    {
        $id_user = $request->input('user_id');

        $results = Annonces::Where('user_id',$id_user)->OrderBy('id', 'DESC')->get();

        $show_simple_page = view('pages.list_simple_annonce',compact('results'))->render();
        
        return response()->json($show_simple_page);
    }

    public function professional_page_get()
    {

        $results = User::query()
            ->select('users.id','users.nom','users.prenom','users.slug','users.contact','users.email','users.photo','users.photo_entreprise','users.bannear','users.created_at','users.view_count_page','users.role')
            ->join('professional_users','professional_users.user_id','=','users.id')
            ->where('professional_users.date_fin','>=',date('Y-m-d'))
            ->where('professional_users.etat',1)
            ->OrderBy('professional_users.date_fin','DESC')
            ->get();


        $show_professional_page = view('pages.list_professional_annonce',compact('results'))->render();
        
        return response()->json($show_professional_page);
    }


    public function particulier_page_get(){

        $results = array();
        
        $non_pro = Annonces::OrderBy('id', 'DESC')->get();

        $pro = Annonces::query()
        ->select('annonces.id','annonces.titre','annonces.prix','annonces.type','annonces.created_at','annonces.slug','annonces.photo','annonces.souscategorie_id','annonces.user_id','annonce_prenia.date_fin as preniumdate')
        ->join('annonce_prenia','annonce_prenia.annonce_id','=','annonces.id')
        ->join('users','annonces.user_id','=','users.id')
        ->where('date_fin','>=',date('Y-m-d'))
        ->where('annonce_prenia.etat',1)
        ->OrderBy('annonce_prenia.created_at','DESC')
        ->get();
    

        foreach($pro as $pros){
                foreach($non_pro as $non_pros){
                    if($pros->id == $non_pros->id && $non_pros->preniumdate < date('Y-m-d') || $pros->id != $non_pros->id){ //comment retrouver des annonce qui n'existe pas dans une table
                        array_push($results, $non_pros);
                    }
                }
        }

        $show_particulier_page = view('pages.list_particulier_annonce',compact('results'))->render();
        
        return response()->json($show_particulier_page);
    }
}
