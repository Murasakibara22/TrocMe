@extends('dash/layout/app')

@section('content')

 <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->

            <div class="content-page">
                <div class="content">
              


                    <!--  -->
                  

                    <!-- Start Content-->
                    <div class="container-fluid">

                     <!-- start page title -->
                     <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li><a href="/new_partenaire"><button type="button" class="btn btn-outline-info rounded-pill ms-5"><i class="uil-circuit"></i> Ajoutez un partenaire</button> </a></li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title"> Nos Partenaires </h4>
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->



                    <div class="col-lg-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                            <h4 class="card-title">Liste des Partenaires
                    
                                             <div class="app-search dropdown float-end">
                                                <form action="{{ route('findSearchPart') }}">
                                                    <div class="input-group">
                                                        <input type="search" name= "search" value="{{  request()->search ?? '' }}"  class="form-control dropdown-toggle"  placeholder="Recherche..." id="top-search">
                                                        <span class="mdi mdi-magnify search-icon"></span>
                                                        
                                                        <button class="input-group-text btn btn-primary" type="submit">Search</button>
                                                    </div>
                                                </form>

                                              
                                            </div>
                
                                </h4>
                                <p class="card-description">
                                    Vous avez la possibilité de  <code>modifier</code> ou de <code>suprimer  </code> un Partenaire
                                </p>
                                <div class="table-responsive">
                                <table class="table">
                                    <thead class="thead-dark">
                                        <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">nom</th>
                                        <th scope="col">email</th>
                                        <th scope="col">contact</th>
                                        <th scope="col">photo</th>
                                        <th scope="col">modifier</th>
                                        <th scope="col">suprimer</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($partenaire  as $part)
                                        <tr>
                                        <th scope="row">{{$part->id}}</th>
                                        <td>{{$part->nom}}</td>
                                        <td>{{$part->email}}</td>
                                        <td>{{$part->contact}}</td>
                                        <td> 
                                            <img src="/images/Partenaire/{{$part->photo}}" alt="image" width="70" height="38" />
                                        <td>
                                            <a href="/partenaire_edit/{{$part->slug}}"> <button type="button" class="btn btn-info"><i class="mdi mdi-keyboard"></i> </button> </a> 
                                            </td>
                                        <td>
                                            <a href="/partenaire_delete/{{$part->slug}}"> <button type="button" class="btn btn-danger"><i class="mdi mdi-delete"></i> </button> </a> 
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