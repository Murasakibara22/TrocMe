<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Intervention\Image\Image;
use Image as InterventionImage;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use Symfony\Component\Console\Input\Input;

class UserController extends Controller
{
    public function newUser(){

        return view('AdminPages.User.new');
    }

    public function addUser(Request $request){

        $validatedData = $request->validate([
            'nom' => ['required', 'string', 'max:100'],
            'prenom' => ['required', 'string', 'max:255'],
            'contact' => ['required', 'string', 'max:15', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => 'required|string|min:8',
        ]);

        if($validatedData){

        $user         =  new User;
        $user->nom    = $request->nom;
        $user->prenom    = $request->prenom;
        $user->email   = $request->email;
        $user->slug   = Str::slug("$request->token". Hash::make($request->nom),"-");
        $user->contact  = $request->contact;
        if (request()->file('photo')) {
            $img = request()->file('photo');
                $messi = md5($img->getClientOriginalExtension().time().$request->email).".".$img->getClientOriginalExtension();
                $source = $img;
                $target = 'images/User/'.$messi;
                InterventionImage::make($source)->fit(212,207)->save($target);
                $user->photo   =  $messi;
        }else{
            $user->photo   = "default.jpg";
        }

        $user->password = Hash::make($request->password);

        if($request->role){
            $user->role    = $request->role;
        }else{
            $user->role = 'user';
        }
        
        
        $user->save();

        if( $user->save()){

            event(new Registered($user));
        
            return  redirect()->back()->with('success', 'user sauvegarder');
        }else{
            return  redirect()->back()->with('error', 'user non sauvegarder');
        }

    }else{
        return  redirect()->back()->with('error', 'user non sauvegarder');
    }
    

    }


    //liste tous
    public function listAllUser(){

        $user = User::OrderBy('id', 'ASC')->get();
        return view('AdminPages.User.list', compact('user'));
    }

//vue modifier
    public function editUser($slug){

        $users = User::where('slug',$slug)->first();
        return view('AdminPages.User.edit', compact('users'));
    }

//modifier
    public function updateUser(Request $request ,$slug){

        // try{
            $user = User::where('slug',$slug)->first();
            if(isset($user))
            {
                $user->nom    = $request->nom;
                $user->prenom    = $request->prenom;
                $user->email   = $request->email;
                $user->slug   = Str::slug("$request->token". Hash::make($request->nom),"-");
                $user->contact  = $request->contact;
                if (request()->file('photo')) {
                    $img = request()->file('photo');
                        $messi = md5($img->getClientOriginalExtension().time().$request->email).".".$img->getClientOriginalExtension();
                        $source = $img;
                        $target = 'images/User/'.$messi;
                        InterventionImage::make($source)->fit(212,207)->save($target);
                        $user->photo   =  $messi;
                }

                    if (request()->file('photo_entreprise')) {
                        $img = request()->file('photo_entreprise');
                            $cr7 = md5($img->getClientOriginalExtension().time().$request->token."+").".".$img->getClientOriginalExtension();
                            $source = $img;
                            $target = 'images/User/'.$cr7;
                            InterventionImage::make($source)->fit(212,207)->save($target);
                            $user->photo_entreprise   =  $cr7;
                    }

                    if (request()->file('bannear')) {
                        $img = request()->file('bannear');
                            $pogba = md5($img->getClientOriginalExtension().time().$request->email."++").".".$img->getClientOriginalExtension();
                            $source = $img;
                            $target = 'images/User/'.$pogba;
                            InterventionImage::make($source)->fit(212,207)->save($target);//taille de la banner a chercher
                            $user->bannear   =  $pogba;
                    }
        

                    if($request->role == "aucun"){
                        $user->role    =   $user->role ;
                    }else{
                        $user->role    = $request->role;
                    }

                $user->update();
                    if($user->update()){
                            return redirect('/Utilisateurs_list')->with('succesEdit', 'Utilisateurs modifier');
                    }else{
                        return redirect()->back()->with('erreur', "l'un des champs n'est pas correctement remplis");
                    }
            }

    // }catch(Exception $err){
    //     report($err);
    //     return redirect()->back()->with('error', "probleme survenue veuillezreessayer plus tard");
    //     }
    }

//view dele
public function deleteUser($slug)
{
    $UserSearch =  User::where('slug',$slug)->first();
        if(isset($UserSearch))
            {
                return view('AdminPages.User.delete', compact('UserSearch'));
            }else{
                return redirect('/Utilisateurs_list')->with('NotExist', "L'utilisateur spécifier n'existe pas");
            }
}

    public function  destroyUser($slug){

        $user =  User::where('slug',$slug)->first();
        if(isset($user))
            {
                $user->delete();
                return redirect('/Utilisateurs_list')->with('successDele', 'Utilisateur Supprimer');
            }else{
                return redirect('/Utilisateurs_list')->with('NotExist', "L'utilisateur spécifier n'existe pas");
            }
    }



    public function findSearch(Request $request)
        {			
            $search = $request->search;		
            $user = User::where( 'nom', 'LIKE', '%' . $search . '%' )->orWhere( 'email', 'LIKE', '%' . $search . '%' )->get();
            if (count ($user) > 0 && isset($user)){
            return view ( 'AdminPages.User.search')->with('user',$user);
            }else{
            return redirect( '/Utilisateurs_list')->with( 'Nodetails','No Details found. Try to search again !' );	
            }	
        }
}
