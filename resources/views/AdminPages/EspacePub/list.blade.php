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
                                            <li><a href="/new_espaccepub"><button type="button" class="btn btn-outline-success rounded-pill ms-5"><i class="uil-plus-circle"></i> Ajoutez une Pub </button> </a></li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title"> Nos Differentes publicitées </h4>
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->



                    <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Liste des publicitées
                    
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
                    Vous avez la possibilité de  <code>modifier</code> ou de <code>suprimer  </code> un une publicité
                  </p>
                  <div class="table-responsive">
                  <table class="table">
                    <thead class="thead-dark">
                        <tr>
                        <th scope="col">photo</th>
                        <th scope="col">titre</th>
                        
                        <th scope="col">Sous_categorie</th>
                        <th scope="col">modifier</th>
                        <th scope="col">suprimer</th>
                        
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($espace as $espaces)
                        <tr>
                        <td> 
                        <div class="text-truncate" style=" height:70px; width:98px; overflow:hidden;">
                            <img src="/images/EspacePub/{{$espaces->photo}}" alt="image" class="rounded-2" height="100%" width="100%" />
                        </div>
                        </td>
                            <td class="fw-bold">
                            <div class="text-truncate" style=" height:20px; width:188px; overflow:hidden;">
                            {{$espaces->titre}}
                            </div>
                        </td>
                        <td>
                            @foreach($espaces->souscategorie()->get() as $sousca)

                            {{$sousca->libelle}}   
                            @endforeach
                        </td>
                        
                        <td >
                            <a href="/espaccepub_edit/{{$espaces->slug}}"> <button type="button" class="btn btn-info"><i class="mdi mdi-keyboard"></i> </button> </a> 
                        </td>
                        <td>
                            <a href="/espaccepub_delete/{{$espaces->slug}}"> <button type="button" class="btn btn-danger"><i class="mdi mdi-delete"></i> </button> </a> 
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