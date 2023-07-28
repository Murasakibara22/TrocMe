<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Pays;
use App\Models\User;
use Livewire\Livewire;
use App\Models\Country;
use App\Models\Annonces;
use Illuminate\Http\Request;
use App\Models\SousCategorie;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index(){
        $anno = Annonces::all();
        $souscat= SousCategorie::all();
        $pays = Country::all();
        $ville = City::all();

        $annonceCount = count($anno);
        $souscatCount = count($souscat);
        $payscount = count($pays);
        $villecount = count($ville);

        $today = date('j M, Y', strtotime(Carbon::today())  );

        $userAnnonce = User::query()
                    ->select('nom','prenom','type','users.email as email','annonces.created_at as date','users.photo as image')
                    ->join('annonces','annonces.user_id','=','users.id')
                    ->limit(1)
                    ->get();       

        return view('dashboard', compact('villecount','annonceCount','souscatCount', 'payscount','userAnnonce','today'));
    }





    
    public function deconnexion() {
        auth()->logout();
    
        return redirect('/');
    }
}
