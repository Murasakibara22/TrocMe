@extends('dash/layout/app')

@section('content')

 <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->

            <div class="content-page">
                <div class="content">
                @if ( session('ModifyFollowingSuccess'))
                    <div class="alert alert-success">
                    le type d'abonnements a ete modifier avec success
                    </div>

                    @endif
                @if ( session('supprimerSuccessFolowing'))
                    <div class="alert alert-success">
                    Le type d'abonnement selectionner a ete supprimer avec succes
                    </div>

                    @endif
                 @if ( session('NotModifyFollowingSuccess'))
                    <div class="alert alert-danger">
                    le type d'abonnements n'a pas pu etre modifier 
                    </div>

                    @endif
                    @if ( session('NotExist'))
                    <div class="alert alert-warning">
                    Le type d'abonnement selectionner n'existe pas
                    </div>
                    @endif

                    @if ( session('Nodetails'))
                    <div class="alert alert-warning">
                    Aucun details trouver. Esaayez encore  !
                    </div>

                    @endif

                    <!--  -->
                  

                    <!-- Start Content-->
                    <div class="container-fluid" style="padding: 1%!important;">

                     <!-- start page title -->
                     <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li><a href="/type_professionUser/create"><button type="button" class="btn btn-outline-info rounded-pill ms-5"><i class="uil-circuit"></i> Ajoutez un Type d'abo Professionnel</button> </a></li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title"> Nos Types d'abonnements Pour les Utilisateurs Professionel</h4>
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->



                    <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body" style="padding: 2%!important;">
                  <h4 class="card-title">Liste des Types d'abonnements Utilisateurs Professionel
                    
                                      <!-- <div class="app-search dropdown float-end">
                                                <form action="">
                                                    <div class="input-group">
                                                        <input type="search" name= "search" value="{{  request()->search ?? '' }}"  class="form-control dropdown-toggle"  placeholder="Recherche..." id="top-search">
                                                        <span class="mdi mdi-magnify search-icon"></span>
                                                        
                                                        <button class="input-group-text btn btn-primary" type="submit">Search</button>
                                                    </div>
                                                </form>

                                              
                                            </div> -->
                
                </h4>
                  <p class="card-description">
                    Vous avez la possibilité de  <code>modifier</code> ou de <code>suprimer  </code> un Type d'abonnement
                  </p>
                  <div class="table-responsive">
                  <table class="table">
                    <thead class="thead-white bg-secondary text-white">
                        <tr>
                        <th scope="col">titre</th>
                        <th scope="col">prix</th>
                        <th scope="col">nombre de jours</th>
                        <th scope="col">voir  plus</th>
                        <th scope="col">modifier</th>
                        <th scope="col">suprimer</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($type_profession_user  as $type_profession_users)
                        <tr>
                        <th scope="row">{{$type_profession_users->titre}}</th>
                        <td>{{$type_profession_users->prix}} FCFA</td>
                        <td>{{$type_profession_users->nb_jours}}</td>
                        <td> 
                        <a href="/pricings"> <button type="button" class="btn btn-outline-warning"><i class="mdi mdi-eye"></i> </button> </a> 
                        <td>
                            <a href="/type_professionUser/{{$type_profession_users->id}}/edit"> <button type="button" class="btn btn-info"><i class="mdi mdi-keyboard"></i> </button> </a> 
                            </td>
                        <td>
                            <a href="/type_professionUser/{{$type_profession_users->id}}" class="modal_delete_TUP"> <button type="button" class="btn btn-danger"><i class="mdi mdi-delete"></i> </button> </a> 
                        </td>
                        </tr>
                    @endforeach
                    </tbody>
                    </table>


                  </div>
                </div>
              </div>
            </div>



                     </div>
                </div>
            </div>



@endsection