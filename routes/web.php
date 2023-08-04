<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PaysController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\EquipeController;
use App\Http\Controllers\AnnonceController;
use App\Http\Controllers\SousCatController;
use App\Http\Controllers\WebsiteController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\EspacePubController;
use App\Http\Controllers\FollowingController;
use App\Http\Controllers\AbonnementController;
use App\Http\Controllers\PartenaireController;
use App\Http\Controllers\TypeProfUserController;
use App\Http\Controllers\DashboardUserController;
use App\Http\Controllers\SousCategorieController;
use App\Http\Controllers\AnnoncePreniumController;
use App\Http\Controllers\ProfessionnalUserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', [HomeController::class , 'index']);

Route::get('/indexAbonnee/{slug}', [FollowingController::class , 'Home_principale']);

Route::get('/troque_abonnee/{slug}', [FollowingController::class , 'troque_abonnee']);

Route::get('/dons_abonnee/{slug}', [FollowingController::class , 'dons_abonnee']);

Route::get('/recherchez_abonnee/{slug}', [FollowingController::class , 'recherchez_abonnee']);

Route::get('/AllAnnonce', [HomeController::class , 'Atsutshi']);

Route::get('/troc', [HomeController::class , 'aomine']);

Route::get('/annonceDetail/{slug}', [HomeController::class , 'seijuro']);

Route::get('/annonceDetaildonss/{slug}', [HomeController::class , 'seijurodonss']);

Route::get('/publiez', [HomeController::class , 'tetsuya'])->middleware(['auth']);

Route::get('/dons', [HomeController::class , 'akashi']);

Route::get('/account_reglage', [HomeController::class , 'daiki'])->middleware(['auth']); //recopis le slug

Route::get('/account_user_sponsorise_annonce/{slug}', [AnnoncePreniumController::class , 'new'])->name('modal_sponsorisation');

Route::post('/account_user_sponsorise_annonce_checkout', [AnnoncePreniumController::class , 'checkout_sponsorisation'])->name('sponsorisation_checkout');

Route::get('/account', [HomeController::class , 'kuroko'])->name('my_account')->middleware(['auth']); //recois un slug

Route::get('/pricings', [HomeController::class , 'pricing'])->middleware(['auth']); //recois un slug

Route::post('/professional_account_create', [ProfessionnalUserController::class , 'create_professional_account'])->name('create_professional_accounts')->middleware(['auth']); //creeee un compte professionnel

Route::get('/payements', [HomeController::class , 'payement']); //recois un slug

Route::get('/apropos', [HomeController::class , 'about']); 

Route::get('/aproposDetail', [HomeController::class , 'aboutdetail']); 

Route::get('/demandez', [HomeController::class , 'Recherchez']); 

Route::get('/viewCategorie', [HomeController::class , 'viewCat']); 

Route::get('/searchAnnonceSouscat/{slug}', [HomeController::class , 'searchAnnSouscat']); 

Route::get('/Filter', [HomeController::class , 'FilterAnnonce'])->name('FilterAnnonces'); 

//recherce selon la barrre de recherche
Route::get('/searchTroquer', [HomeController::class , 'searchTroquez'])->name('searchTroc');

Route::get('/filtre_selon_recherche', [HomeController::class , 'SearchfilterTroque'])->name('SearchfilterTroc');

Route::get('/searchdons', [HomeController::class , 'searchdonss'])->name('searchVen');

Route::get('/filtre_selon_recherche_dons', [HomeController::class , 'Searchfilterdonss'])->name('SearchfilterVen');

Route::get('/searchDm', [HomeController::class , 'searchDemande'])->name('searchDemandez');

Route::get('/filtre_selon_recherche_demandez', [HomeController::class , 'SearchfilterDemander'])->name('SearchfilterDemandez');
//fin recherche page d'acceuil

Route::get('/filterTroquer', [HomeController::class , 'filterTroquez'])->name('filterTroc');

Route::get('/filterdons', [HomeController::class , 'filterdonss'])->name('filterVen');

Route::get('/filterDm', [HomeController::class , 'filterDemande'])->name('filterDemandez');

//recherce avec la barrre de recherche selon la categorie choisi
Route::get('/SubcategorySearchAnnonce/{slug}',[HomeController::class , 'SubcategorySearchAnnon'])->name('SubcategorySearchAnnonces');

Route::get('/SubcategoryFilterAnnonce/{slug}',[HomeController::class , 'SubcategoryFilterAnnon'])->name('SubcategoryFilterAnnonces');

Route::get('/listAllAnnonceCat/{slug}',[HomeController::class , 'listAllAnnonceCatego'])->name('listAllAnnonceCats');// lister tous les annonces d'une categorie et aussi les souscategories

Route::get('/findSearchAllAnnonce', [HomeController::class, 'findSearchAnnonces'])->name('findSearchAllAnnonces');

Route::get('/filtre_selon_recherche_All', [HomeController::class, 'SearchfilterAllAnnonce'])->name('SearchfilterAllAnnonces');

Route::get('/filtreAllAnnonce', [HomeController::class, 'filtreAllAnnonce'])->name('filtreAllAnnonces');

//Annonces

Route::post('/new_annonces', [AnnonceController::class, 'addAnnonce'])->middleware(['auth'])->name('ajoutAnnonce');

Route::get('/modifyAnnonce/{slug}',[AnnonceController::class, 'changeAllRigth'])->middleware(['auth']);//la vue qui permet a l'utilisateur de modifier ses annonces

Route::put('/annoncesEdit/{slug}', [AnnonceController::class, 'updateAnnonce'])->middleware(['auth'])->name('updateAnnonce');

Route::get('/deleteAnnonce/{slug}',[AnnonceController::class, 'deleteAllRigth'])->middleware(['auth']);//la vue qui permet a l'utilisateur de supprimer ses annonces

Route::delete('/annoncesDelete/{slug}', [AnnonceController::class, 'destroyAnnonce'])->middleware(['auth'])->name('deletedAnnonce');

Route::get('/searchAnnonce', [AnnonceController::class, 'findSearchAnnonces'])->name('findSearchAnnonce');

Route::get('/searchAnnonceSelonCat', [AnnonceController::class, 'findSearchAnnoncesSelonCategorie'])->name('findSearchAnnonceCat');



Route::put('/UserModify/{slug}', [HomeController::class , 'editionUser'])->middleware(['auth'])->name('updateUsers');


    //pays
    Route::get('/pays_list', [PaysController::class, 'listAll']);

    Route::get('/ville_list', [PaysController::class, 'listAllVille']);//liste des villes

    Route::get('/pays_search', [PaysController::class, 'findSearchPa'])->name('findSearchPays');//liste des villes

    Route::get('/ville_search', [PaysController::class, 'findSearchVil'])->name('findSearchVille');//liste des villes


//Dashboard Utilisateur 
Route::get('/dashboard_user_troque',[DashboardUserController::class,'troque_utilisateur'])->middleware(['auth']);//page listant tous les troques de l'utilisateur

Route::get('/dashboard_user_dons',[DashboardUserController::class,'dons_utilisateur'])->middleware(['auth']);//page listant toutes les donss de l'utilisateur

Route::get('/dashboard_user_demande',[DashboardUserController::class,'demande_utilisateur'])->middleware(['auth']);//page listant toutes les demandes de l'utilisateur





Route::middleware(['auth', 'role:admin'])->group(function(){
    Route::get('/dashboard',[AdminController::class , 'index'])->middleware(['auth'])->name('dashboard');


//Utilisateurs
    Route::get('/addUser', [UserController::class , 'newUser']);

    Route::post('/addUser', [UserController::class , 'addUser'])->name('AddUser');

    Route::get('/Utilisateurs_list', [UserController::class , 'listAllUser']);

    Route::get('/Utilisateurs_edit/{slug}', [UserController::class , 'editUser']);

    Route::put('/UtilisateursEdit/{slug}', [UserController::class , 'updateUser'])->name('editUser');

    Route::get('/Userdelete/{slug}', [UserController::class , 'deleteUser']);

    Route::delete('/Userdele/{slug}', [UserController::class , 'destroyUser']);

    Route::get('/findSearch', [UserController::class , 'findSearch'])->name('findSearch');





    
            //categories
Route::get('/new_Categorie', [CategorieController::class , 'nouvelle']);

Route::post('/newCategorie', [CategorieController::class , 'ajoutCategorie'])->name('addCat');

Route::get('/Categorie_list', [CategorieController::class , 'listAll']);

Route::get('/Categorie_edit/{slug}', [CategorieController::class , 'change']);

Route::put('/CategoriEdit/{slug}', [CategorieController::class , 'changeCategorie'])->name('ModifCat');

Route::get('/Categorie_delete/{slug}', [CategorieController::class , 'supprimeCategorie']);

Route::delete('/CategoriDelete/{slug}', [CategorieController::class , 'supprimer']);


    //Sous-categories
 Route::get('/new_SousCat', [SousCategorieController::class , 'nouveau']);

 Route::post('/new_SousCategorie', [SousCategorieController::class , 'ajoutSousCat'])->name('addsouscats');
            
Route::get('/SousCategorie_list', [SousCategorieController::class , 'listAll']);
            
Route::get('/SousCategorie_edit/{slug}', [SousCategorieController::class , 'changed']);
            
Route::put('/SousCategoriEdit/{slug}', [SousCategorieController::class , 'modifierSubCategory'])->name('ModifSousCats');
            
Route::get('/SousCategorie_delete/{slug}', [SousCategorieController::class , 'supprimeSub']);
            
Route::delete('/sousCategoriDelete/{slug}', [SousCategorieController::class , 'supprimeSubCategory']);

Route::get('/SousSelonCat/{slug}', [SousCategorieController::class , 'listSelonCat']);//liste de toutes les sous categories selon une categorie

Route::get('/AnnonceSelonSousCat/{slug}', [SousCategorieController::class , 'listAnnonceSelonSousCat']);//liste des Annonces selon la souscategorie

Route::get('/SearchSouscat', [SousCategorieController::class , 'searchSouscat'])->name('searchSouscats');//recherche de souscat

//Abonnement
Route::get('/ajoutAbonnement',[AbonnementController::class, 'nouveau']);

Route::post('/ajoutAbonnement',[AbonnementController::class, 'ajoutAbonne'])->name('abonnementAjouter');

Route::get('/AbonnementList', [AbonnementController::class, 'ListAll']);//liste de tous  les abonner (temps valide ou non)

Route::get('/AbonnementListAbonner', [AbonnementController::class, 'ListAllAbonner']);//liste de tous les Abonnees valide aux offres 

Route::get('/AbonnementListTimeLimited', [AbonnementController::class, 'ListTimeLimited']);//liste des Abonnes dont le temps est limitee


//Partenaires
Route::get('/new_partenaire',[PartenaireController::class, 'nouveau']);

Route::post('/newPartenaire',[PartenaireController::class, 'ajoutPartenaire'])->name('addPartenaire');

Route::get('/partenaire_list',[PartenaireController::class, 'listAll']);

Route::get('/partenaire_edit/{slug}',[PartenaireController::class, 'change']);

Route::put('/partenairEdit/{slug}',[PartenaireController::class, 'modifyPartenaire'])->name('modifyPartenaire');

Route::get('/partenaire_delete/{slug}',[PartenaireController::class, 'supprime']);

Route::delete('/partenairDelete/{slug}',[PartenaireController::class, 'spprimerPartenaire'])->name('deletePartenaire');

Route::get('/findPartenaire',[PartenaireController::class, 'findSearchPartenaire'])->name('findSearchPart');



//equipe
Route::get('/new_equipe', [EquipeController::class, 'nouvelle']);

Route::post('/newEquipe', [EquipeController::class, 'ajoutTeam'])->name('addEquipe');

Route::get('/equipe_list', [EquipeController::class, 'listAll']);

Route::get('/equipe_edit/{slug}', [EquipeController::class, 'change']);

Route::put('/equipEdit/{slug}', [EquipeController::class, 'modifyEquipe'])->name('modifierEquipe');

Route::get('/equipe_delete/{slug}', [EquipeController::class, 'supprime']);

Route::delete('/equipDelete/{slug}', [EquipeController::class, 'supprimeeEquipe'])->name('deleteEquipe'); 

Route::get('/findTeam',[EquipeController::class, 'findSearchEquipe'])->name('findSearchTeam');


//pays
Route::get('/new_pays', [PaysController::class, 'nouveau']);

Route::post('/newPays', [PaysController::class, 'ajoutPays'])->name('AjoutPa');


Route::get('/new_ville', [PaysController::class, 'nouvelle']);

Route::post('/newVille', [PaysController::class, 'ajoutVille'])->name('AjoutVi');


Route::resource('/type_professionUser', TypeProfUserController::class);

//AnnoncesAdmin
Route::get('/new_annonce', [AnnonceController::class, 'newAnnonce']);

Route::get('/annonce_list', [AnnonceController::class, 'listAllAnnonce']);

Route::get('/annonces_edit/{slug}', [AnnonceController::class, 'editAnnonce'])->middleware(['auth']);

Route::get('/annonces_delete/{slug}', [AnnonceController::class, 'deleteAnnonce'])->middleware(['auth']);


//Type D'abonnement dans le pricing

Route::get('/new_following', [FollowingController::class, 'nouveau']);

Route::post('/newFollowing', [FollowingController::class, 'ajoutfollowing'])->name('ajoutfollowings');
//listes des types de 
Route::get('/following_list', [FollowingController::class, 'listAll']);

Route::get('/following_edit/{slug}', [FollowingController::class, 'change']);

Route::put('/followingEdit/{slug}', [FollowingController::class, 'changeFollow'])->name('changeFollows');

Route::get('/following_delete/{slug}', [FollowingController::class, 'supprimer']);

Route::delete('/followingDelete/{slug}', [FollowingController::class, 'supprimerFollowing']);


//Espace publicitaire

Route::get('/new_espaccepub',[EspacePubController::class , 'nouveau']);

Route::post('/newEspaccepub',[EspacePubController::class , 'ajoutEspace'])->name('ajoutEspaces');

Route::get('/espaccepub_list',[EspacePubController::class , 'listAll']);

Route::get('/espaccepub_edit/{slug}',[EspacePubController::class , 'change']);

Route::put('/espaccepubEdit/{slug}',[EspacePubController::class , 'modifyEspacePub'])->name('modifyEspacePubs');

Route::get('/espaccepub_delete/{slug}',[EspacePubController::class , 'supprimer']);

Route::delete('/espaccepubDelete/{slug}',[EspacePubController::class , 'supprimerEspacePub'])->name('deletEspacePubs');

});

Route::get('/deconnexion',[AdminController::class , 'deconnexion'] );

require __DIR__.'/auth.php';



///////////////////WebSite latest Model and best model/////////////////////

Route::get('/get_all_annonce',[WebsiteController::class , 'get_annonces'] )->name('latestModel.all_annonces');

 Route::get('/filter_price',[WebsiteController::class , 'filtrer_par_prix'] );

 Route::get('/form_affichage',[WebsiteController::class , 'func_form_affichage'] )->name('latestModel.form_affichage');



 Route::get('/autocomplete-search', [DashboardUserController::class, 'autocompleteSearch'])->name('search.index'); //recherche sur la page admin sans recharger la page
 Route::get('/search-simple_annonce_pages_user', [DashboardUserController::class, 'simple_annonce_pages_user'])->name('simple_annonce_pages_users'); //recherche 
 Route::get('/professional-page-get_all_annonce', [DashboardUserController::class, 'professional_page_get'])->name('professional_page_gets'); //filtre pro
 Route::get('/particulier-page-get_all_annonce', [DashboardUserController::class, 'particulier_page_get'])->name('particulier_page_gets'); 
 Route::get('/autocomplete-search-demandez', [DashboardUserController::class, 'autocompleteSearchDemandez'])->name('search.demandez'); 
 Route::get('/autocomplete-search-trock', [DashboardUserController::class, 'autocompleteSearchTrock'])->name('search.Trock'); 
 Route::get('/autocomplete-search-dons', [DashboardUserController::class, 'autocompleteSearchdons'])->name('search.dons'); 

 
    Route::group(['prefix' => '/TrockMoi-profil/client'], function () { 


        Route::get('/index_page/{slug}',[DashboardUserController::class , 'index_page'] )->name('latestModel.index_page');


     });