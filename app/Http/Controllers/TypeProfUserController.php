<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use App\Models\TypeProfUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class TypeProfUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $type_profession_user = TypeProfUser::OrderBy('created_at','DESC')->get();

        return view('AdminPages.TypeProfessionelUser.list',compact('type_profession_user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('AdminPages.TypeProfessionelUser.new');
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $exist = TypeProfUser::where('titre',$request->titre)->where('prix',$request->prix)->first();

        if($exist){
            return redirect()->back()->with('existDeja'," ");
        }

        $type_profession_user = TypeProfUser::create([
            'titre' => $request->titre,
            'description' => $request->description,
            'prix' => $request->prix,
            'nb_jours' => $request->nb_jours,
            'slug' => "TROC MOI"."$request->titre".Str::slug("$request->token".Hash::make($request->titre), "-")
        ]);

        if($type_profession_user){
            return redirect()->back()->with('saveSuccess'," ");
        }else{
            return redirect()->back()->with('notSave',"Un probeleme est survenue");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $type_profession_user = TypeProfUser::where('id',$id)->first();

        return view('AdminPages.TypeProfessionelUser.modalDelete',compact('type_profession_user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $type_profession_user = TypeProfUser::where('id',$id)->first();

        return view('AdminPages.TypeProfessionelUser.edit',compact('type_profession_user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $type_profession_user = TypeProfUser::where('id',$id)->first();

        if(!is_null($type_profession_user)){
            if($request->titre){
                $type_profession_user->titre = $request->titre ;
            }

            if($request->description){
                $type_profession_user->description = $request->description ;
            }

            if($request->prix){
                $type_profession_user->prix = $request->prix ;
            }

            if($request->nb_jours){
                $type_profession_user->nb_jours = $request->nb_jours ;
            }

            $type_profession_user->update();

            return redirect('/type_professionUser')->with('updateSuccess', " Modifier avec succes");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $type_profession_user = TypeProfUser::where('id',$id)->first();

        if( isset($type_profession_user)){
            $type_profession_user->delete();
            return redirect('/type_professionUser')->with('DeleteSuccess', " Supprimer avec succes");
        }else{
            return redirect('/type_professionUser')->with('NotDlete', " [probleme rencontrer ] ");
        }
    }
}
