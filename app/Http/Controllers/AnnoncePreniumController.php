<?php

namespace App\Http\Controllers;

use App\Models\Annonces;
use App\Models\Following;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\annonce_prenium;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;

class AnnoncePreniumController extends Controller
{
    function new ($slug){
        $annonces = Annonces::where('slug',$slug)->first();
        $pricings = Following::OrderBy('created_at','DESC')->get();

        return view ('pages.modal.sponsorisation',compact('annonces','pricings'));
    }


    public function checkout_sponsorisation(Request $request){
        $date_debut = date('Y-m-d');
        $date_fin = \Carbon\Carbon::now()->addDays($request->nb_jour);

        $annonce_prenium = annonce_prenium::where('annonce_id',$request->annonce_id)->where('annonce_id','!=',null)->where('date_fin','>=', date('Y-m-d'))->first();

        $annonce = Annonces::where('id',$request->annonce_id)->first();

        if(!is_null($annonce_prenium)){
            $date_update_debut = \Carbon\Carbon::createFromDate($date_debut);
            $date_update_fin = \Carbon\Carbon::createFromDate($annonce_prenium->date_fin);
            $difference_de_jours = $date_update_fin->diffInDays($date_update_debut);
            $date_de_fin = \Carbon\Carbon::now()->addDays($request->nb_jour + $difference_de_jours);
            $annonce_prenium->update([
                'etat'=> 1,
                'prix' => $request->price,
                'date_debut' => $date_update_debut,
                'date_fin' => $date_de_fin,
                'slug' => Str::slug("$request->token". Hash::make($annonce->titre),"-"),
                'annonce_id' => $request->annonce_id,
                'following_id' => $request->following_id,
            ]);
        }else{
            $annonce_a_sponsoriser = annonce_prenium::create([
                'etat'=> 1,
                'annonce_id' => $request->annonce_id,
                'prix' => $request->price,
                'following_id' => $request->following_id,
                'date_debut' =>$date_debut,
                'slug' => Str::slug("$request->token". Hash::make($annonce->titre),"-"),
                'date_fin' => date('Y-m-d', strtotime($date_fin))
            ]);
        }

        return redirect('/account');
    }
}
