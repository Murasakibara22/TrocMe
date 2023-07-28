@extends('dash/layout/app')

@section('content')

 <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->

            <div class="content-page">
                <div class="content">
                @if ( session('ModifySccuessPartenaire'))
                    <div class="alert alert-success">
                    les informations du partenaires ont ete modifier avec succes
                    </div>

                    @endif
                @if ( session('SupprimerAvecSuccess'))
                    <div class="alert alert-success">
                    Le partenaire selectionner a ete supprimer avec success
                    </div>

                    @endif
                 @if ( session('NotExist'))
                    <div class="alert alert-danger">
                    Le partenaire selectionner n'existe pas , veuillez rafraichir votre page
                    </div>

                    @endif
                    @if ( session('NotmodifySuccessPartenaire'))
                    <div class="alert alert-warning">
                    les champs ne peuvent pas etre vide
                    </div>
                    @endif

                    @if ( session('Nodetails'))
                    <div class="alert alert-warning">
                    Aucun details trouver. Esaayez encore  !
                    </div>

                    @endif

                    <!--  -->
                  

                    <!-- Start Content-->
                    <div class="container-fluid">

                     <!-- start page title -->
                     <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            
                                        </ol>
                                    </div>
                                    <h4 class="page-title"> Nos Pays 
                                    <a href="/new_pays" class="float-end"><button type="button" class="btn btn-outline-info rounded-pill ms-5"><i class="uil-circuit"></i> Ajoutez un Pays</button> </a>

                                    </h4>
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->



                    <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Liste des Pays
                    
                  <div class="app-search dropdown float-end">
                                                <form action="{{ route('findSearchPays') }}">
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
                    <thead class="thead-dark bg-info">
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">libelle</th>
                        <th scope="col">code</th>
         
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($pays  as $pay)
                        <tr>
                        <th scope="row">{{$pay->id}}</th>
                        <td>{{$pay->libelle}}</td>
                        <td>{{$pay->code}}</td>
            
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