<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\City;
use App\Models\User;
use App\Models\ville;
use App\Models\Equipe;
use App\Models\Annonces;
use App\Models\Categorie;
use App\Models\EspacePub;
use App\Models\Following;
use App\Models\Partenaire;
use Illuminate\Support\Str;
use App\Models\TypeProfUser;
use Illuminate\Http\Request;
use App\Models\SousCategorie;
use Intervention\Image\Image;
use Illuminate\Support\Carbon;
use Image as InterventionImage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{


    function index(){
        

        $category = Categorie::OrderBy('id','ASC')->get(); 
        $patenaire = Partenaire::all();
        $souscat = SousCategorie::OrderBy('libelle','ASC')->get();
        $ville   = City::where('state_id',858)->orWhere('state_id',857)->OrderBy('name','ASC')->get();
        $espace1 = EspacePub::OrderBy('id','DESC')->take(2)->get();
        $espace2 = EspacePub::OrderBy('id','DESC')->take(2)->get();
        $annonce = Annonces::OrderBy('id', 'DESC')->take(16)->get();
        $today = date('j M, Y', strtotime(Carbon::today())  );
        $annonce_sponsoriser = Annonces::query()
                        ->select('annonces.titre','annonces.prix','annonces.type','annonces.created_at','annonces.slug','annonces.photo')
                        ->join('annonce_prenia','annonce_prenia.annonce_id','=','annonces.id')
                        ->where('date_fin','>=',date('Y-m-d'))
                        ->where('annonce_prenia.etat',1)
                        ->OrderBy('annonce_prenia.created_at','DESC')
                        ->get();


        $user_souscrit = User::Where('souscrit',1)->take(3)->get();
 

        
        return view('welcome',compact('patenaire','category','souscat','ville','espace1','espace2','annonce','today','user_souscrit','annonce_sponsoriser'));
    }


    public function Atsutshi(){
        $annonce = Annonces::OrderBy('created_at', 'DESC')->paginate(20);
        $today = date('j M, Y', strtotime(Carbon::today())  );
        $annonce_sponsoriser = Annonces::query()
                        ->select('annonces.titre','annonces.prix','annonces.type','annonces.created_at','annonces.slug','annonces.photo')
                        ->join('annonce_prenia','annonce_prenia.annonce_id','=','annonces.id')
                        ->where('date_fin','>=',date('Y-m-d'))
                        ->where('annonce_prenia.etat',1)
                        ->OrderBy('annonce_prenia.created_at','DESC')
                        ->get();
        return view('pages/AllAnnonces', compact('annonce','today','annonce_sponsoriser'))->with('message',"Nouveau toast message");
    }


    public function aomine(){
        $today = date('j M, Y', strtotime(Carbon::today())  );
        $annonce = Annonces::where('type','troque')->Orwhere('type','Troque ou dons')->OrderBy('created_at', 'DESC')->paginate(10);
        $annonce_sponsoriser =  Annonces::query()
                                ->select('annonces.titre','annonces.prix','annonces.type','annonces.created_at','annonces.slug','annonces.photo')
                                ->join('annonce_prenia','annonce_prenia.annonce_id','=','annonces.id')
                                ->where('date_fin','>=',date('Y-m-d'))
                                ->where('annonces.type','=',"troque")
                                ->where('annonce_prenia.etat',1)
                                ->OrderBy('annonce_prenia.created_at','DESC')
                                ->get();
        return view('pages/troque',compact('today','annonce','annonce_sponsoriser'));
    }

    
    public function akashi(){
        $annonce = Annonces::where('type','dons')->Orwhere('type','Troque ou dons')->OrderBy('created_at', 'DESC')->paginate(20);
        $today = date('j M, Y', strtotime(Carbon::today())  );
       
        return view('pages/dons',compact('annonce','today'));
    }

    public function seijuro($slug){
        $annonce = Annonces::where('slug',$slug)->first();
        if(!is_null($annonce)){

            $anno = Annonces::Where('type','troque')->OrderBy('created_at','ASC')->take(4)->get();
            $today = date('j M, Y', strtotime(Carbon::today()) );
           $annonce->increment('view_count_annonces');

           
            $annonce_sponsoriser = Annonces::query()
                        ->select('annonces.id','annonces.titre','annonces.prix','annonces.type','annonces.created_at','annonces.slug','annonces.photo','annonces.souscategorie_id')
                        ->join('annonce_prenia','annonce_prenia.annonce_id','=','annonces.id')
                        ->where('date_fin','>=',date('Y-m-d'))
                        ->where('annonce_prenia.etat',1)
                        ->OrderBy('annonce_prenia.created_at','DESC')
                        ->get();

                       
                       
                foreach($annonce_sponsoriser as $a_prenium){
                    if($a_prenium->id == $annonce->id){
     
                        $is_vip = "vip";
          
                    }else{
                        $is_vip = "non_vip";
                    }
                }
               
       
             return view('pages/annoncesDetails',compact('annonce','anno','today'));
        }else{
            return redirect()->back()->with('NotExist', "L'article selectionner n'est plus disponible");
        }
    }

    public function seijurodons($slug){
        $annonce = Annonces::where('slug',$slug)->first();
        if(!is_null($annonce)){

            $nomUser = User::query()
                    ->select('users.nom as Nom','users.prenom as Prenom')
                    ->join('annonces','annonces.user_id','=','users.id')
                    ->where('annonces.slug','=',$slug)
                    ->get();

        $anno = Annonces::Where('type','dons')->take(4)->get();
        $today = date('j M, Y', strtotime(Carbon::today())  );
        $annonce->increment('view_count_annonces');
            return view('pages/annoncesDetailsdons',compact('annonce','nomUser','anno','today'));
        }else{
            return redirect()->back()->with('NotExist', "L'article selectionner n'est plus disponible");
        }
        
    }

    public function tetsuya(){
        $ville = City::where('state_id',858)->orWhere('state_id',857)->OrderBy('name','ASC')->get();
        $souscat  = SousCategorie::OrderBy('id','ASC')->get();
        return view('pages/pubAnnonce', compact('ville', 'souscat'));
    }

    public function kuroko(){
        $userSlug = Auth()->user()->slug;
        $user = User::where('slug',$userSlug)->first();
        if(!is_null($user)){
            $annonce = Annonces::where('user_id',$user->id)->get();
            return view('pages/account',compact('annonce'));
        }else{
            return redirect()->back()->with('NotExist',"L'utilisateu n'est pas correctement authentifier");
        }
    }

    public function daiki(){
        $userSlug = Auth()->user()->slug;
        $user = User::where('slug',$userSlug)->first();
                   

        if(!is_null($user)){

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

                         
            return view('pages/reglage',compact('user','user_pro'));
        }else{
            return redirect()->back()->with('NotExist',"L'utilisateu n'est pas correctement authentifier");
        }
        
    }

    public function pricing()
    {
        $pricings = TypeProfUser::all();
        return view('pages/pricing', compact('pricings'));
    }

    public function payement()
    {
        return view('pages/payement');
    }

    public function about(){

        $equipe = Equipe::all();
        return view('pages/About', compact('equipe'));
    }
    
    public function aboutdetail(){
        return view('pages/aboutDetails');
    }

    public function Recherchez(){
        $annonce = Annonces::where('type','demandez')->OrderBy('created_at', 'DESC')->paginate(6);
        $today = date('j M, Y', strtotime(Carbon::today())  );
        $annonce_sponsoriser = Annonces::query()
                        ->select('annonces.titre','annonces.prix','annonces.type','annonces.created_at','annonces.slug','annonces.photo')
                        ->join('annonce_prenia','annonce_prenia.annonce_id','=','annonces.id')
                        ->where('date_fin','>=',date('Y-m-d'))
                        ->where('annonces.type','=',"demandez")
                        ->where('annonce_prenia.etat',1)
                        ->OrderBy('annonce_prenia.created_at','DESC')
                        ->paginate(4);
        return view('pages/Demandez', compact('annonce','today','annonce_sponsoriser'));
    }

    function viewCat(){
        $cat = Categorie::OrderBy('libelle','ASC')->get();
            if(!is_null($cat)){
        return view('pages/viewAllCat',compact('cat'));
            }else{
                return redirect()->back()->with('AucuneSousCat','Aucune sous-categorie disponible');
            }
    }

    function searchAnnSouscat($slug){
        try{
        $souscat = SousCategorie::where('slug',$slug)->first();
        $today = date('j M, Y', strtotime(Carbon::today())  );
        if(!is_null($souscat)){
        return view('pages/viewAnnonceSousCat',compact('souscat','today'));
        }else{
            return redirect()->back()->with('NotAnnoncePub','Aucune annonce publier pour le moment pour cette sous categorie ');
        }

        }catch(Exception $e){
            report($e);

            return redirect()->back()->with('Probleme','un probleme est survenue veuillez reeesayer ');
        }
    }


//filtre sur la page d'acceuille
    function FilterAnnonce(Request $request){

        $today = date('j M, Y', strtotime(Carbon::today())  );
        if(!is_null($request->ville_id) && !is_null($request->souscategorie_id) && !is_null($request->TrouveSelon)){
            
            
            if($request->TrouveSelon == "prix Le plus bas"){
                $annonce = Annonces::where( 'titre', 'LIKE', '%' . $request->fieldSearch . '%' )->where('ville_id',$request->ville_id)->where('souscategorie_id',$request->souscategorie_id)->OrderBy('prix','ASC')->paginate(20);
               
               
                if (count ($annonce) > 0 && isset($annonce)){
                return view('pages.barofsearch',compact('today'))->with('annonce',$annonce);
            }else{
                return redirect('/')->with( 'Nodetails','No Details found. Esaayez encore  !' );	
                }	
            }elseif($request->TrouveSelon == "prix Le plus haut"){
    
                $annonce = Annonces::where( 'titre', 'LIKE', '%' . $request->fieldSearch . '%' )->where('ville_id',$request->ville_id)->where('souscategorie_id',$request->souscategorie_id)->OrderBy('prix','DESC')->paginate(20);
               
                
                if (count ($annonce) > 0 && isset($annonce)){
                    return view('pages.barofsearch',compact('today'))->with('annonce',$annonce);
                }else{
                    return redirect( '/')->with( 'Nodetails','No Details found. Esaayez encore  !' );	
                    }
            }elseif($request->TrouveSelon == "Annonces Recentes"){
                $annonce = Annonces::where( 'titre', 'LIKE', '%' . $request->fieldSearch . '%' )->where('ville_id',$request->ville_id)->where('souscategorie_id',$request->souscategorie_id)->OrderBy('created_at','DESC')->paginate(20);
               
                
                if (count ($annonce) > 0 && isset($annonce)){
                    return view('pages.barofsearch',compact('today'))->with('annonce',$annonce);
                }else{
                    return redirect( '/')->with( 'Nodetails','No Details found. Esaayez encore  !' );	
                    }
            }elseif($request->TrouveSelon == "Annonces les plus anciens"){
                $annonce = Annonces::where( 'titre', 'LIKE', '%' . $request->fieldSearch . '%' )->where('ville_id',$request->ville_id)->where('souscategorie_id',$request->souscategorie_id)->OrderBy('created_at','ASC')->paginate(20);
               
                
                if (count ($annonce) > 0 && isset($annonce)){
                    return view('pages.barofsearch',compact('today'))->with('annonce',$annonce);
                }else{
                    return redirect('/')->with( 'Nodetails','No Details found. Esaayez encore  !' );	
                    }
            }

        }
        elseif(!isset($request->ville_id) && !is_null($request->souscategorie_id) && !is_null($request->TrouveSelon))
        {
            
            if($request->TrouveSelon == "prix Le plus bas"){
                $annonce = Annonces::where( 'titre', 'LIKE', '%' . $request->fieldSearch . '%' )->where('souscategorie_id',$request->souscategorie_id)->OrderBy('prix','ASC')->paginate(20);
               
                
                if (count ($annonce) > 0 && isset($annonce)){
                return view('pages.barofsearch',compact('today'))->with('annonce',$annonce);
            }else{
                return redirect('/')->with( 'Nodetails','No Details found. Esaayez encore  !' );	
                }	
            }elseif($request->TrouveSelon == "prix Le plus haut"){
    
                $annonce = Annonces::where( 'titre', 'LIKE', '%' . $request->fieldSearch . '%' )->where('souscategorie_id',$request->souscategorie_id)->OrderBy('prix','DESC')->paginate(20);
               
                
                if (count ($annonce) > 0 && isset($annonce)){
                    return view('pages.barofsearch',compact('today'))->with('annonce',$annonce);
                }else{
                    return redirect( '/')->with( 'Nodetails','No Details found. Esaayez encore  !' );	
                    }
            }elseif($request->TrouveSelon == "Annonces Recentes"){
                $annonce = Annonces::where( 'titre', 'LIKE', '%' . $request->fieldSearch . '%' )->where('souscategorie_id',$request->souscategorie_id)->OrderBy('created_at','DESC')->paginate(20);
               
                
                if (count ($annonce) > 0 && isset($annonce)){
                    return view('pages.barofsearch',compact('today'))->with('annonce',$annonce);
                }else{
                    return redirect( '/')->with( 'Nodetails','No Details found. Esaayez encore  !' );	
                    }
            }elseif($request->TrouveSelon == "Annonces les plus anciens"){
                $annonce = Annonces::where( 'titre', 'LIKE', '%' . $request->fieldSearch . '%' )->where('souscategorie_id',$request->souscategorie_id)->OrderBy('created_at','ASC')->paginate(20);
               
                
                if (count ($annonce) > 0 && isset($annonce)){
                    return view('pages.barofsearch',compact('today'))->with('annonce',$annonce);
                }else{
                    return redirect('/')->with( 'Nodetails','No Details found. Esaayez encore  !' );	
                    }
            }else{
                return redirect('/')->with( 'Nodetails','No Details found. Esaayez encore  !' );
            }


        }
        elseif(!is_null($request->ville_id) && !isset($request->souscategorie_id) && !is_null($request->TrouveSelon))
        {
            
            if($request->TrouveSelon == "prix Le plus bas"){
                $annonce = Annonces::where( 'titre', 'LIKE', '%' . $request->fieldSearch . '%' )->where('ville_id',$request->ville_id)->OrderBy('prix','ASC')->paginate(20);
               
               
                if (count ($annonce) > 0 && isset($annonce)){
                return view('pages.barofsearch',compact('today'))->with('annonce',$annonce);
            }else{
                return redirect('/')->with( 'Nodetails','No Details found. Esaayez encore  !' );	
                }	
            }elseif($request->TrouveSelon == "prix Le plus haut"){
    
                $annonce = Annonces::where( 'titre', 'LIKE', '%' . $request->fieldSearch . '%' )->where('ville_id',$request->ville_id)->OrderBy('prix','DESC')->paginate(20);
               
                
                if (count ($annonce) > 0 && isset($annonce)){
                    return view('pages.barofsearch',compact('today'))->with('annonce',$annonce);
                }else{
                    return redirect( '/')->with( 'Nodetails','No Details found. Esaayez encore  !' );	
                    }
            }elseif($request->TrouveSelon == "Annonces Recentes"){
                $annonce = Annonces::where( 'titre', 'LIKE', '%' . $request->fieldSearch . '%' )->where('ville_id',$request->ville_id)->OrderBy('created_at','DESC')->paginate(20);
               
                
                if (count ($annonce) > 0 && isset($annonce)){
                    return view('pages.barofsearch',compact('today'))->with('annonce',$annonce);
                }else{
                    return redirect( '/')->with( 'Nodetails','No Details found. Esaayez encore  !' );	
                    }
            }elseif($request->TrouveSelon == "Annonces les plus anciens"){
                $annonce = Annonces::where( 'titre', 'LIKE', '%' . $request->fieldSearch . '%' )->where('ville_id',$request->ville_id)->OrderBy('created_at','ASC')->paginate(20);
               
                
                if (count ($annonce) > 0 && isset($annonce)){
                    return view('pages.barofsearch',compact('today'))->with('annonce',$annonce);
                }else{
                    return redirect('/')->with( 'Nodetails','No Details found. Esaayez encore  !' );	
                    }
            }else{
                return redirect('/')->with( 'Nodetails','No Details found. Esaayez encore  !' );
            }
            

        }
        elseif(!is_null($request->ville_id) && !is_null($request->souscategorie_id) && !isset($request->TrouveSelon))
        {
            
                $annonce = Annonces::where( 'titre', 'LIKE', '%' . $request->fieldSearch . '%' )->where('ville_id',$request->ville_id)->where('souscategorie_id',$request->souscategorie_id)->paginate(20);
               
                
                if (count ($annonce) > 0 && isset($annonce)){
                return view('pages.barofsearch',compact('today'))->with('annonce',$annonce);
            }else{
                return redirect('/')->with( 'Nodetails','No Details found. Esaayez encore  !' );	
                }	

            

        }
        elseif(!is_null($request->ville_id) && !isset($request->souscategorie_id) &&  !isset($request->TrouveSelon))
        {
            
            $annonce = Annonces::where( 'titre', 'LIKE', '%' . $request->fieldSearch . '%' )->where('ville_id',$request->ville_id)->paginate(20);
            
            if (count ($annonce) > 0 && isset($annonce)){
            return view('pages.barofsearch',compact('today'))->with('annonce',$annonce);
        }else{
            return redirect('/')->with( 'Nodetails','No Details found. Esaayez encore  !' );	
            }	
            

        }
        elseif(!isset($request->ville_id) && !is_null ($request->souscategorie_id) &&  !isset($request->TrouveSelon))
        {
            $annonce = Annonces::where( 'titre', 'LIKE', '%' . $request->fieldSearch . '%' )->where('souscategorie_id',$request->souscategorie_id)->paginate(20);
               
            
            if (count ($annonce) > 0 && isset($annonce)){
            return view('pages.barofsearch',compact('today'))->with('annonce',$annonce);
        }else{
            return redirect('/')->with( 'Nodetails','No Details found. Esaayez encore  !' );	
            }	
            

        }
        elseif(!isset($request->ville_id) &&  !isset($request->souscategorie_id) &&  !is_null($request->fieldSearch))
        {

                $annonce = Annonces::where( 'titre', 'LIKE', '%' . $request->fieldSearch . '%' )->OrderBy('created_at','DESC')->paginate(20);
               
                if (count ($annonce) > 0 && isset($annonce)){
                return view('pages.barofsearch',compact('today'))->with('annonce',$annonce);
            }else{
                return redirect('/')->with( 'Nodetails','No Details found. Esaayez encore  !' );	
                }	
           
        }

    }
    //Fin du filtrage


    //recherche avec la barre de recherche
    function searchTroquez(Request $request){
        $today = date('j M, Y', strtotime(Carbon::today())  );
        if(!is_null($request->search)){
                $searched = $request->search;		
                $annonce = Annonces::where( 'titre', 'LIKE', '%' . $searched . '%' )->Where('type', 'troque' )->orWhere( 'prix', 'LIKE', '%' . $searched . '%' )->paginate(20);
            
                if (count ($annonce) > 0 && isset($annonce)){
                return view ('pages.Search.searchAnnonce',compact('today','searched'))->with('annonce',$annonce);
                }else{
                return redirect('/troc')->with( 'Nodetails','No Details found. Esaayez encore !' );	
                }
         }elseif($request->searched == "" || $request->searched == " "){
            return redirect('/troc')->with( 'Nodetails','No Details found. Esaayez encore !' );
         }else{
             return redirect('/troc')->with( 'Nodetails','No Details found. Esaayez encore !' ); 
         }
    }

    function searchdons(Request $request){
        $today = date('j M, Y', strtotime(Carbon::today())  );
        if(!is_null($request->search)){
            $searched = $request->search;		
            $annonce = Annonces::where( 'titre', 'LIKE', '%' . $searched . '%' )->Where( 'type', 'dons' )->Orwhere('type', 'Troque ou dons')->orWhere( 'prix', 'LIKE', '%' . $searched . '%' )->paginate(20);
            
            if (count ($annonce) > 0 && isset($annonce)){
            return view ( 'pages.Search.searchdons',compact('today','searched'))->with('annonce',$annonce);
            }else{
            return redirect('/dons')->with( 'Nodetails','No Details found. Esaayez encore !' );	
            }

        }elseif($request->searched == "" || $request->searched == " "){
            return redirect('/dons')->with( 'Nodetails','No Details found. Esaayez encore !' );
        }else{
            return redirect('/dons')->with( 'Nodetails','No Details found. Esaayez encore !' ); 
        }
    }

    function searchDemande(Request $request){
        $today = date('j M, Y', strtotime(Carbon::today())  );
        if(!is_null($request->search)){
                $searched = $request->search;		
                $annonce = Annonces::where( 'titre', 'LIKE', '%' . $searched . '%' )->Where( 'type', 'demandez' )->orWhere( 'prix', 'LIKE', '%' . $searched . '%' )->paginate(20);
            
                if (count ($annonce) > 0 && isset($annonce)){
                return view ( 'pages.Search.searchDemande',compact('today','searched'))->with('annonce',$annonce);
                }else{
                return redirect('/demandez')->with( 'Nodetails','No Details found. Esaayez encore !' );	
                }

        }elseif($request->searched == "" || $request->searched == " "){
            return redirect('/demandez')->with( 'Nodetails','No Details found. Esaayez encore !' );
        }else{
            return redirect('/demandez')->with( 'Nodetails','No Details found. Esaayez encore !' ); 
        }
    }
    //fin recherche


    //Filtrage sur les pages
    function filterTroquez(Request $request)
    {
        $today = date('j M, Y', strtotime(Carbon::today())  );
        if($request->FiltrerSelon == "prix Le plus bas"){
            $annonce = Annonces::where('type','troque')->OrderBy('prix','ASC')->paginate(40);
           
            
            if (count ($annonce) > 0 && isset($annonce)){
            return view('pages.Filter.filtrerAnnonce',compact('today'))->with('annonce',$annonce);
        }else{
            return redirect('/troc')->with( 'Nodetails','No Details found. Esaayez encore  !' );	
            }	
        }elseif($request->FiltrerSelon == "prix Le plus haut"){

            $annonce = Annonces::where('type','troque')->OrderBy('prix','DESC')->paginate(40);
           
           
            if (count ($annonce) > 0 && isset($annonce)){
                return view('pages.Filter.filtrerAnnonce',compact('today'))->with('annonce',$annonce);
            }else{
                return redirect('/troc')->with( 'Nodetails','No Details found. Esaayez encore  !' );	
                }
        }elseif($request->FiltrerSelon == "Annonces Recentes"){
            $annonce = Annonces::where('type','troque')->OrderBy('created_at','DESC')->paginate(40);
          
            if (count ($annonce) > 0 && isset($annonce)){
                return view('pages.Filter.filtrerAnnonce',compact('today'))->with('annonce',$annonce);
            }else{
                return redirect('/troc')->with( 'Nodetails','No Details found. Esaayez encore  !' );	
                }
        }elseif($request->FiltrerSelon == "Annonces les plus anciens"){
            $annonce = Annonces::where('type','troque')->OrderBy('created_at','ASC')->paginate(40);
           
           
            if (count ($annonce) > 0 && isset($annonce)){
                return view('pages.Filter.filtrerAnnonce',compact('today'))->with('annonce',$annonce);
            }else{
                return redirect('/troc')->with( 'Nodetails','No Details found. Esaayez encore  !' );	
                }
        }else{
            return redirect('/troc')->with( 'Nodetails','No Details found. Esaayez encore  !' );
        }

    }

    //pour les dons
    function filterdons(Request $request)
    {
        $today = date('j M, Y', strtotime(Carbon::today())  );
        if($request->FiltrerSelon == "prix Le plus bas"){
            $annonce = Annonces::where('type','dons')->OrWhere('type','Troque ou dons')->OrderBy('prix','ASC')->paginate(20);
           
            
            if (count ($annonce) > 0 && isset($annonce)){
            return view('pages.Filter.filtrerdons',compact('today'))->with('annonce',$annonce);
        }else{
            return redirect('/dons')->with( 'Nodetails','No Details found. Esaayez encore  !' );	
            }	
        }elseif($request->FiltrerSelon == "prix Le plus haut"){

            $annonce = Annonces::where('type','dons')->OrderBy('prix','DESC')->get();
           
            
            if (count ($annonce) > 0 && isset($annonce)){
                return view('pages.Filter.filtrerdons',compact('today'))->with('annonce',$annonce);
            }else{
                return redirect( '/dons')->with( 'Nodetails','No Details found. Esaayez encore  !' );	
                }
        }elseif($request->FiltrerSelon == "Annonces Recentes"){
            $annonce = Annonces::where('type','dons')->OrderBy('created_at','DESC')->get();
           
           
            if (count ($annonce) > 0 && isset($annonce)){
                return view('pages.Filter.filtrerdons',compact('today'))->with('annonce',$annonce);
            }else{
                return redirect( '/dons')->with( 'Nodetails','No Details found. Esaayez encore  !' );	
                }
        }elseif($request->FiltrerSelon == "Annonces les plus anciens"){
            $annonce = Annonces::where('type','dons')->OrderBy('created_at','ASC')->get();
           
           
            if (count ($annonce) > 0 && isset($annonce)){
                return view('pages.Filter.filtrerdons',compact('today'))->with('annonce',$annonce);
            }else{
                return redirect('/dons')->with( 'Nodetails','No Details found. Esaayez encore  !' );	
                }
        }else{
            return redirect('/dons')->with( 'Nodetails','No Details found. Esaayez encore  !' );
        }

    }

    //Filtrer selon les Annonces demandez
    function filterDemande(Request $request)
    {
        $today = date('j M, Y', strtotime(Carbon::today())  );
        if($request->FiltrerSelon == "prix Le plus bas"){
            $annonce = Annonces::where('type','demandez')->OrderBy('prix','ASC')->paginate(40);
           
            
            if (count ($annonce) > 0 && isset($annonce)){
            return view('pages.Filter.filtrerDemandez',compact('today'))->with('annonce',$annonce);
        }else{
            return redirect('/demandez')->with( 'Nodetails','No Details found. Esaayez encore  !' );	
            }	
        }elseif($request->FiltrerSelon == "prix Le plus haut"){

            $annonce = Annonces::where('type','demandez')->OrderBy('prix','DESC')->paginate(40);
           
            
            if (count ($annonce) > 0 && isset($annonce)){
                return view('pages.Filter.filtrerDemandez',compact('today'))->with('annonce',$annonce);
            }else{
                return redirect( '/demandez')->with( 'Nodetails','No Details found. Esaayez encore  !' );	
                }
        }elseif($request->FiltrerSelon == "Annonces Recentes"){
            $annonce = Annonces::where('type','demandez')->OrderBy('created_at','DESC')->paginate(40);
           
            
            if (count ($annonce) > 0 && isset($annonce)){
                return view('pages.Filter.filtrerDemandez',compact('today'))->with('annonce',$annonce);
            }else{
                return redirect( '/demandez')->with( 'Nodetails','No Details found. Esaayez encore  !' );	
                }
        }elseif($request->FiltrerSelon == "Annonces les plus anciens"){
            $annonce = Annonces::where('type','demandez')->OrderBy('created_at','ASC')->paginate(40);
           
            
            if (count ($annonce) > 0 && isset($annonce)){
                return view('pages.Filter.filtrerDemandez',compact('today'))->with('annonce',$annonce);
            }else{
                return redirect('/demandez')->with( 'Nodetails','No Details found. Esaayez encore  !' );	
                }
        }else{
            return redirect('/demandez')->with( 'Nodetails','No Details found. Esaayez encore  !' );
        }

    }


    //barre de recherche des annonces selon les categorie 
    function SubcategorySearchAnnon(Request $request, $slug){
        //verifie si le slug est bien rattacher a une sousCategorie
        $FindSlug = SousCategorie::where('slug',$slug)->first();
       
        if(!is_null($FindSlug)){
            $search = $request->search;
            $annonce = Annonces::where('souscategorie_id',$FindSlug->id)->Where( 'prix', 'LIKE', '%' . $search . '%' )->orWhere('titre', 'LIKE', '%' . $search . '%' )->orWhere('Lieu', 'LIKE', '%' . $search . '%' )->get(); 
            $today = date('j M, Y', strtotime(Carbon::today())  );
            
            if (count ($annonce) > 0 && isset($annonce)){
                return view('pages.Search.SubcategorySearch',compact('today'))->with('annonce',$annonce);
            }else{
                return redirect()->back()->with( 'Nodetails','No Details found. Esaayez encore  !' );	
                }  
        }
    }


    //barre de filtre selon les sousCategorie
        function  SubcategoryFilterAnnon(Request $request, $slug){
             //verifie si le slug est bien rattacher a une sousCategorie
                $FindSlug = SousCategorie::where('slug',$slug)->first();
                if(!is_null($FindSlug))
                {
                    $today = date('j M, Y', strtotime(Carbon::today())  );
                            if($request->FindAnnonce == "prix Le plus bas"){
                                $annonce = Annonces::where('souscategorie_id',$FindSlug->id)->OrderBy('prix','ASC')->get();
                               
                                
                                if (count ($annonce) > 0 && isset($annonce)){
                                return view('pages.Search.SubcategorySearch',compact('today'))->with('annonce',$annonce);
                            }else{
                                return redirect()->back()->with( 'Nodetails','No Details found. Esaayez encore  !' );	
                                }	
                            }elseif($request->FindAnnonce == "prix Le plus haut"){

                                $annonce = Annonces::where('souscategorie_id',$FindSlug->id)->OrderBy('prix','DESC')->get();
                                
                                
                                if (count ($annonce) > 0 && isset($annonce)){
                                    return view('pages.Search.SubcategorySearch',compact('today'))->with('annonce',$annonce);
                                }else{
                                    return redirect()->back()->with( 'Nodetails','No Details found. Esaayez encore  !' );	
                                    }
                            }elseif($request->FindAnnonce == "Annonces Recentes"){
                                $annonce = Annonces::where('souscategorie_id',$FindSlug->id)->OrderBy('created_at','DESC')->get();
                            
                                
                                if (count ($annonce) > 0 && isset($annonce)){
                                    return view('pages.Search.SubcategorySearch',compact('today'))->with('annonce',$annonce);
                                }else{
                                    return redirect( )->back()->with( 'Nodetails','No Details found. Esaayez encore  !' );	
                                    }
                            }elseif($request->FindAnnonce == "Annonces les plus anciens"){
                                $annonce = Annonces::where('souscategorie_id',$FindSlug->id)->OrderBy('created_at','ASC')->get();
                            
                                
                                if (count ($annonce) > 0 && isset($annonce)){
                                    return view('pages.Search.SubcategorySearch',compact('today'))->with('annonce',$annonce);
                                }else{
                                    return redirect()->back()->with( 'Nodetails','No Details found. Esaayez encore  !' );	
                                    }
                            }else{
                                return redirect()->back()->with( 'Nodetails','No Details found. Esaayez encore  !' );
                            }
                }

        }

        //fonction de recherche sur la pages toutes les annonces
        function findSearchAnnonces(Request $request)
        {			
            $today = date('j M, Y', strtotime(Carbon::today())  );
        $searched = $request->search;		
        $annonce = Annonces::where( 'titre', 'LIKE', '%' . $searched . '%' )->orWhere( 'prix', 'LIKE', '%' . $searched . '%' )->orWhere('description', 'LIKE', '%' . $searched . '%' )->OrderBy('created_at','DESC')->paginate(20);

        if (count ($annonce) > 0 && isset($annonce)){
        return view ( 'pages.Search.searchAll',compact('today','searched'))->with('annonce',$annonce);
        }else{
        return redirect()->back()->with( 'Nodetails','No Details found. Esaayez encore  !' );	
        }	
        }


        //filtre sur la page allannonce
        function filtreAllAnnonce(Request $request)
    {
        $today = date('j M, Y', strtotime(Carbon::today())  );
        if($request->FiltrerSelon == "prix Le plus bas"){
            $annonce = Annonces::OrderBy('prix','ASC')->paginate(7);;
            
            if (count ($annonce) > 0 && isset($annonce)){
            return view('pages.Filter.filtrerAllAnnonce',compact('today','annonce'));
        }else{
            return redirect('/AllAnnonce')->with( 'Nodetails','No Details found. Esaayez encore  !' );	
            }	
        }
        if($request->FiltrerSelon == "prix Le plus haut"){

            $annonce = Annonces::OrderBy('prix','DESC')->get();
    
            if (count ($annonce) > 0 && isset($annonce)){
                return view('pages.Filter.filtrerAllAnnonce',compact('today'))->with('annonce',$annonce);
            }else{
                return redirect( '/AllAnnonce')->with( 'Nodetails','No Details found. Esaayez encore  !' );	
                }
        }
        if($request->FiltrerSelon == "Annonces Recentes"){
            $annonce = Annonces::OrderBy('created_at','DESC')->get();
         
            if (count ($annonce) > 0 && isset($annonce)){
                return view('pages.Filter.filtrerAllAnnonce',compact('today'))->with('annonce',$annonce);
            }else{
                return redirect( '/AllAnnonce')->with( 'Nodetails','No Details found. Esaayez encore  !' );	
                }
        }
        if($request->FiltrerSelon == "Annonces les plus anciens"){
            $annonce = Annonces::OrderBy('created_at','ASC')->get();
         
            if (count ($annonce) > 0 && isset($annonce)){
                return view('pages.Filter.filtrerAllAnnonce',compact('today'))->with('annonce',$annonce);
            }else{
                return redirect( '/AllAnnonce')->with( 'Nodetails','No Details found. Esaayez encore  !' );	
                }
        }
    }

    //listes des souscts d'une categorie et les differentes annonces relier

    function listAllAnnonceCatego($slug){
        $category = Categorie::where('slug',$slug)->first();
        $today = date('j M, Y', strtotime(Carbon::today())  );

        $espacePuublicitair = EspacePub::query()
                            ->select('espace_pubs.titre','espace_pubs.description','espace_pubs.photo','espace_pubs.slug','espace_pubs.souscat_id','sous_categories.libelle','sous_categories.categorie_id')
                            ->join('sous_categories','espace_pubs.souscat_id','=','sous_categories.id')
                            ->join('categories','sous_categories.categorie_id','=','categories.id')
                            ->where('categories.id',$category->id)
                            ->take(3)
                            ->get();

            
          $annonced  = Annonces::query()
          ->select('annonces.id', 'annonces.titre','annonces.description','annonces.prix','annonces.type','annonces.Lieu','annonces.email','annonces.photo','annonces.photo','annonces.souscategorie_id')
          ->join('sous_categories','annonces.souscategorie_id','=','annonces.id')
          ->join('categories','sous_categories.categorie_id','=','categories.id')
          ->where('categories.id',$category->id)
          ->paginate(4);


        if(!is_null($category)){
            return view('pages.listAllAnnonceCategory',compact('category','annonced','today','espacePuublicitair'));
        }else{
            return redirect('/AllAnnonce');
        }
    }

    //modifier un utilisateur
    public function editionUser(Request $request ,$slug){

        // try{
            $user = User::where('slug',$slug)->first();
            if(!is_null($user))
            {
                $user->nom    = $request->nom;
                $user->prenom    = $request->prenom;
                $user->email   = $request->email;
                $user->slug   = Str::slug("$request->token". Hash::make($request->nom),"-");
                $user->contact  = $request->contact;
                if (request()->hasfile('photo')) 
                {
                        $img = request()->file('photo');
                        $messi = md5($img->getClientOriginalExtension().time().$request->token).".".$img->getClientOriginalExtension();
                        $source = $img;
                        $target = 'images/User/'.$messi;
                        InterventionImage::make($source)->fit(212,207)->save($target);
                        $user->photo   =  $messi;
                }

                if (request()->file('photo_entreprise')) {
                    $img = request()->file('photo_entreprise');
                        $messi = md5($img->getClientOriginalExtension().time().$request->email).".".$img->getClientOriginalExtension();
                        $source = $img;
                        $target = 'images/User/'.$messi;
                        InterventionImage::make($source)->fit(212,207)->save($target);
                        $user->photo_entreprise   =  $messi;
                }

                if (request()->file('bannear')) {
                    $img = request()->file('bannear');
                        $pogba = md5($img->getClientOriginalExtension().time().$request->email."++").".".$img->getClientOriginalExtension();
                        $source = $img;
                        $target = 'images/User/'.$pogba;
                        InterventionImage::make($source)->fit(960,425)->save($target);//taille de la banner a chercher
                        $user->bannear   =  $pogba;
                }
    

                $user->update();
                    if($user->update()){
                            return redirect()->back()->with('succesEdit', 'Utilisateurs modifier');
                    }else{
                        return redirect()->back()->with('erreur', "l'un des champs n'est pas correctement remplis");
                    }
            }

    // }catch(Exception $err){
    //     report($err);
    //     return redirect()->back()->with('error', "probleme survenue veuillezreessayer plus tard");
    //     }
    }



    //supprimer un compte user 
    function deleteMyAccount(Request $request, $slug)
    {
        $user = User::where('slug',$slug)->first();
        if(!is_null($user)){
            $user->nom = ($request->nom."TrocMoi");
            $user->email = ($request->email."TrocMoi");
        }
        
    }


    
///////////////////////////////////////////////////////
/**Filtre dans la recherche souhaiter */
//////////////////////////////////////////////////////


//Filtre au niveau de la page troque 

    public function SearchfilterTroque(Request $request){

        $today = date('j M, Y', strtotime(Carbon::today())  );
        $searched = $request->filtreSearch;
        if($request->FiltrerSelon == "prix Le plus bas"){
            $annonce = Annonces::where( 'titre', 'LIKE', '%' . $searched . '%' )->Where('type', 'troque' )->OrderBy('prix','ASC')->orWhere( 'prix', 'LIKE', '%' . $searched . '%' )->get();

            if (count ($annonce) > 0 && isset($annonce)){
                return view ('pages.Search.filtersearchAnnonce',compact('today','searched'))->with('annonce',$annonce);
            }else{
                return redirect()->back()->with( 'Nodetails','No Details found. Esaayez encore !' );	
            }

        }elseif($request->FiltrerSelon == "prix Le plus haut"){
            $annonce = Annonces::where( 'titre', 'LIKE', '%' . $searched . '%' )->Where('type', 'troque' )->OrderBy('prix','DESC')->orWhere( 'prix', 'LIKE', '%' . $searched . '%' )->get();

            if (count ($annonce) > 0 && isset($annonce)){
                return view ('pages.Search.filtersearchAnnonce',compact('today','searched'))->with('annonce',$annonce);
            }else{
                return redirect()->back()->with( 'Nodetails','No Details found. Esaayez encore !' );	
            }

        }elseif($request->FiltrerSelon == "Annonces Recentes"){
            $annonce = Annonces::where( 'titre', 'LIKE', '%' . $searched . '%' )->Where('type', 'troque' )->OrderBy('created_at','DESC')->orWhere( 'prix', 'LIKE', '%' . $searched . '%' )->get();

            if (count ($annonce) > 0 && isset($annonce)){
                return view ('pages.Search.filtersearchAnnonce',compact('today','searched'))->with('annonce',$annonce);
            }else{
                return redirect()->back()->with( 'Nodetails','No Details found. Esaayez encore !' );	
            }
        }elseif($request->FiltrerSelon == "Annonces les plus anciens"){
            $annonce = Annonces::where( 'titre', 'LIKE', '%' . $searched . '%' )->Where('type', 'troque' )->OrderBy('created_at','ASC')->orWhere( 'prix', 'LIKE', '%' . $searched . '%' )->get();

            if (count ($annonce) > 0 && isset($annonce)){
                return view ('pages.Search.filtersearchAnnonce',compact('today','searched'))->with('annonce',$annonce);
            }else{
                return redirect()->back()->with( 'Nodetails','No Details found. Esaayez encore !' );	
            }
        }else{
            return redirect()->back()->with( 'NotSelectedFilter','Aucun type de filtrage choisit, veuillez Reessayer' );	
        }
    }
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


//Filtre au niveau de la page dons

public function  Searchfilterdons(Request $request){
    $today = date('j M, Y', strtotime(Carbon::today())  );
    $searched = $request->filtreSearch;

    if($request->FiltrerSelon == "prix Le plus bas"){
    $annonce = Annonces::where( 'titre', 'LIKE', '%' . $searched . '%' )->Where('type', 'dons' )->OrderBy('prix','ASC')->orWhere( 'prix', 'LIKE', '%' . $searched . '%' )->get();
        
        if (count ($annonce) > 0 && isset($annonce)){
            return view ('pages.Search.filtersearchdons',compact('today','searched'))->with('annonce',$annonce);
        }else{
            return redirect()->back()->with( 'Nodetails','No Details found. Esaayez encore !' );	
        }

    }elseif($request->FiltrerSelon == "prix Le plus haut"){
    $annonce = Annonces::where( 'titre', 'LIKE', '%' . $searched . '%' )->Where('type', 'dons' )->OrderBy('prix','DESC')->orWhere( 'prix', 'LIKE', '%' . $searched . '%' )->get();
        
        if (count ($annonce) > 0 && isset($annonce)){
            return view ('pages.Search.filtersearchdons',compact('today','searched'))->with('annonce',$annonce);
        }else{
            return redirect()->back()->with( 'Nodetails','No Details found. Esaayez encore !' );	
        }
    }elseif($request->FiltrerSelon == "Annonces Recentes"){
    $annonce = Annonces::where( 'titre', 'LIKE', '%' . $searched . '%' )->Where('type', 'dons' )->OrderBy('created_at','DESC')->orWhere( 'prix', 'LIKE', '%' . $searched . '%' )->get();

        
        if (count ($annonce) > 0 && isset($annonce)){
            return view ('pages.Search.filtersearchdons',compact('today','searched'))->with('annonce',$annonce);
        }else{
            return redirect()->back()->with( 'Nodetails','No Details found. Esaayez encore !' );	
        }
    }elseif($request->FiltrerSelon == "Annonces les plus anciens"){
    $annonce = Annonces::where( 'titre', 'LIKE', '%' . $searched . '%' )->Where('type', 'dons' )->OrderBy('created_at','ASC')->orWhere( 'prix', 'LIKE', '%' . $searched . '%' )->get();
        
        if (count ($annonce) > 0 && isset($annonce)){
            return view ('pages.Search.filtersearchdons',compact('today','searched'))->with('annonce',$annonce);
        }else{
            return redirect()->back()->with( 'Nodetails','No Details found. Esaayez encore !' );	
        }
    }else{
        return redirect()->back()->with( 'NotSelectedFilter','Aucun type de filtrage choisit, veuillez Reessayer' );	
    }
}

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


//Filtre au niveau de la page Rechercher

public function  SearchfilterDemander(Request $request){
    $today = date('j M, Y', strtotime(Carbon::today())  );
    $searched = $request->filtreSearch;

    if($request->FiltrerSelon == "prix Le plus bas"){
    $annonce = Annonces::where( 'titre', 'LIKE', '%' . $searched . '%' )->Where('type', 'demandez' )->OrderBy('prix','ASC')->orWhere( 'prix', 'LIKE', '%' . $searched . '%' )->get();
        
        if (count ($annonce) > 0 && isset($annonce)){
            return view ('pages.Search.filtersearchDemandes',compact('today','searched'))->with('annonce',$annonce);
        }else{
            return redirect()->back()->with( 'Nodetails','No Details found. Esaayez encore !' );	
        }

    }elseif($request->FiltrerSelon == "prix Le plus haut"){
    $annonce = Annonces::where( 'titre', 'LIKE', '%' . $searched . '%' )->Where('type', 'demandez' )->OrderBy('prix','DESC')->orWhere( 'prix', 'LIKE', '%' . $searched . '%' )->get();
        
        if (count ($annonce) > 0 && isset($annonce)){
            return view ('pages.Search.filtersearchDemandes',compact('today','searched'))->with('annonce',$annonce);
        }else{
            return redirect()->back()->with( 'Nodetails','No Details found. Esaayez encore !' );	
        }
    }elseif($request->FiltrerSelon == "Annonces Recentes"){
    $annonce = Annonces::where( 'titre', 'LIKE', '%' . $searched . '%' )->Where('type', 'demandez' )->OrderBy('created_at','DESC')->orWhere( 'prix', 'LIKE', '%' . $searched . '%' )->get();

        
        if (count ($annonce) > 0 && isset($annonce)){
            return view ('pages.Search.filtersearchDemandes',compact('today','searched'))->with('annonce',$annonce);
        }else{
            return redirect()->back()->with( 'Nodetails','No Details found. Esaayez encore !' );	
        }
    }elseif($request->FiltrerSelon == "Annonces les plus anciens"){
    $annonce = Annonces::where( 'titre', 'LIKE', '%' . $searched . '%' )->Where('type', 'demandez' )->OrderBy('created_at','ASC')->orWhere( 'prix', 'LIKE', '%' . $searched . '%' )->get();
        
        if (count ($annonce) > 0 && isset($annonce)){
            return view ('pages.Search.filtersearchDemandes',compact('today','searched'))->with('annonce',$annonce);
        }else{
            return redirect()->back()->with( 'Nodetails','No Details found. Esaayez encore !' );	
        }
    }else{
        return redirect()->back()->with( 'NotSelectedFilter','Aucun type de filtrage choisit, veuillez Reessayer' );	
    }
}

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


//Filtre au niveau de la page AllAnnonce

public function  SearchfilterAllAnnonce(Request $request){
    $today = date('j M, Y', strtotime(Carbon::today())  );
    $searched = $request->filtreSearch;

    if($request->FiltrerSelon == "prix Le plus bas"){
    $annonce = Annonces::where( 'titre', 'LIKE', '%' . $searched . '%' )->OrderBy('prix','ASC')->orWhere( 'prix', 'LIKE', '%' . $searched . '%' )->get();
        
        if (count ($annonce) > 0 && isset($annonce)){
            return view ('pages.Search.filtersearchAll',compact('today','searched'))->with('annonce',$annonce);
        }else{
            return redirect()->back()->with( 'Nodetails','No Details found. Esaayez encore !' );	
        }

    }elseif($request->FiltrerSelon == "prix Le plus haut"){
    $annonce = Annonces::where( 'titre', 'LIKE', '%' . $searched . '%' )->OrderBy('prix','DESC')->orWhere( 'prix', 'LIKE', '%' . $searched . '%' )->get();
        
        if (count ($annonce) > 0 && isset($annonce)){
            return view ('pages.Search.filtersearchAll',compact('today','searched'))->with('annonce',$annonce);
        }else{
            return redirect()->back()->with( 'Nodetails','No Details found. Esaayez encore !' );	
        }
    }elseif($request->FiltrerSelon == "Annonces Recentes"){
    $annonce = Annonces::where( 'titre', 'LIKE', '%' . $searched . '%' )->OrderBy('created_at','DESC')->orWhere( 'prix', 'LIKE', '%' . $searched . '%' )->get();

        
        if (count ($annonce) > 0 && isset($annonce)){
            return view ('pages.Search.filtersearchAll',compact('today','searched'))->with('annonce',$annonce);
        }else{
            return redirect()->back()->with( 'Nodetails','No Details found. Esaayez encore !' );	
        }
    }elseif($request->FiltrerSelon == "Annonces les plus anciens"){
    $annonce = Annonces::where( 'titre', 'LIKE', '%' . $searched . '%' )->OrderBy('created_at','ASC')->orWhere( 'prix', 'LIKE', '%' . $searched . '%' )->get();
        
        if (count ($annonce) > 0 && isset($annonce)){
            return view ('pages.Search.filtersearchAll',compact('today','searched'))->with('annonce',$annonce);
        }else{
            return redirect()->back()->with( 'Nodetails','No Details found. Esaayez encore !' );	
        }
    }else{
        return redirect()->back()->with( 'NotSelectedFilter','Aucun type de filtrage choisit, veuillez Reessayer' );	
    }
}



///////////////////////////////////////////////////////
/** End Filtre dans la recherche souhaiter */
//////////////////////////////////////////////////////
}