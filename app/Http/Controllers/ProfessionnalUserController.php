<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\ProfessionalUser;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfessionnalUserController extends Controller
{
    public function create_professional_account(Request $request){

        $date_debut = date('Y-m-d');
        $date_fin = \Carbon\Carbon::now()->addDays($request->nombre_jours);

        $professionnal_account = ProfessionalUser::where('user_id',Auth::user()->id)->where('user_id','!=',null)->where('date_fin','>=',date('Y-m-d'))->first();

        $user = User::where('id',Auth::user()->id)->first();

        if(!is_null($professionnal_account)){
            $date_de_debut = \Carbon\Carbon::createFromDate($date_debut);
            $dat_fin = \Carbon\Carbon::createFromDate($professionnal_account->date_fin);
            $difference_days = $dat_fin->diffInDays($date_de_debut);
            $date_de_fin = \Carbon\Carbon::now()->addDays($request->nombre_jours + $difference_days);

            $prof_user_account = new ProfessionalUser ;
            $prof_user_account->prix =  $request->price ;
            $prof_user_account->etat =  1 ;
            $prof_user_account->date_debut =  $date_de_debut ;
            $prof_user_account->date_fin =  $date_de_fin ;
            $prof_user_account->type_prof_user_id =  $request->type_prof_id ;
            $prof_user_account->user_id =  Auth::user()->id ;
            $prof_user_account->slug =  Str::slug("$request->token". Hash::make($request->price),"-");

            $save_prof_user = $prof_user_account->save();

           

            if($save_prof_user){

                return redirect('/account')->with('successAbonnee'," ");
            }else{
                return redirect('/')->with('NotAbonne'," ");
            }

        }else{
            $prof_user = new ProfessionalUser ;
            $prof_user->prix =  $request->price ;
            $prof_user->etat =  1 ;
            $prof_user->date_debut =  $date_debut ;
            $prof_user->date_fin = $date_fin ;
            $prof_user->type_prof_user_id =  $request->type_prof_id ;
            $prof_user->user_id =  Auth::user()->id ;
            $prof_user->slug =  Str::slug("$request->token". Hash::make($request->price),"-");


            $save_prof_user = $prof_user->save();

            
            if($save_prof_user){
                return redirect('/account')->with('successAbonnee'," ");
            }else{
                return redirect('/')->with('NotAbonne'," ");
            }
        }
    }
}
