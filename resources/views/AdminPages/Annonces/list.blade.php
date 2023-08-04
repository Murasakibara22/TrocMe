@extends('dash/layout/app')

@section('content')

 <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->

            <div class="content-page">
                <div class="content">
                @if ( session('ModifyAnnonceSuccess'))
                    <div class="alert alert-success">
                    L'annonce a ete modifier avec success
                    </div>
                    @endif
                @if ( session('supprimer'))
                    <div class="alert alert-success">
                    L'Annonce a ete supprimer avec success
                    </div>

                    @endif
                @if ( session('SupprimerAvecSuccess'))
                    <div class="alert alert-success">
                    Le partenaire selectionner a ete supprimer avec success
                    </div>

                    @endif
                 @if ( session('NotExist'))
                    <div class="alert alert-danger">
                    L'Annonce n'existe pas
                    </div>

                    @endif

                    @if ( session('NotModifyAnnonceSuccess'))
                    <div class="alert alert-warning">
                    L'annonce n'a pas ete modifer veuillez rafraichir la page
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
                                    <h4 class="page-title"> Nos Annonces
                                    <a href="/new_annonce" class="float-end"><button type="button" class="btn btn-outline-info rounded-pill ms-5"><i class="uil-plus-circle"></i> Ajoutez une Annonce</button> </a>
                                </h4>
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->



                                <div class="col-lg-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                            <h4 class="card-title">Liste de toutes les Annonces
                    
                                         <div class="app-search dropdown float-end">
                                                <form action="{{ route('findSearchAnnonce') }}">
                                                    <div class="input-group">
                                                        <input type="search" name= "search" value="{{  request()->search ?? '' }}"  class="form-control dropdown-toggle"  placeholder="Recherche..." id="top-search">
                                                        <span class="mdi mdi-magnify search-icon"></span>
                                                        
                                                        <button class="input-group-text btn btn-primary" type="submit">Search</button>
                                                    </div>
                                                </form>

                                              
                                            </div>
                
                </h4>
                  <p class="card-description">
                    Vous avez la possibilité de  <code>modifier</code> ou de <code>suprimer  </code> une Annonce
                  </p>
                
                    <!-- Fitrage -->
                  <div class="mb-1 col-6">
                
                <!-- title -->
                <form action="{{ route('findSearchAnnonceCat') }}">
                  <div class="d-flex  mt-lg-0 ">
                        <!-- select option -->
                        <select class="form-select" aria-label="Default select example" name="FindAnnonce">
                          <option selected>Filtrer selon: </option>
                          <option value="Prix Le plus bas">Prix Le plus bas</option>
                          <option value="Prix Le plus eleve"> Prix Le plus eleve</option>
                          <option value="date recente"> date recente</option>
                        </select>

                        <button type="submit" class="btn btn-dark ms-3">Filtrer </button>
                      
                      </div>

                      </form>
              </div>





                  <div class="table-responsive">
                  <table class="table">
                    <thead class="thead-dark">
                        <tr class="bg-warning">
                        <th scope="col">titre</th>
                        <th scope="col">Whatssapp</th>
                        <th scope="col">prix</th>
                        <th scope="col">type</th>
                        <th scope="col">lieu</th>
                        <th scope="col">categorie</th>
                        <th scope="col">Ville</th>
                        <th scope="col">Publiez par</th>
                        <th scope="col">plus</th>
                        <th scope="col">modifier</th>
                        <th scope="col">suprimer</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($annonce  as $annonces)
                        @foreach($annonces->souscat()->get() as $item)
                         @foreach($annonces->villes()->get() as $ville)
                            @foreach($annonces->user()->get() as $utilisateur)
                        <tr>
                              
                               <td class="fw-bold" >
                               <div class="text-truncate" style=" height:30px; width:198px; overflow:hidden;">
                                  {{$annonces->titre}}   
                                  </div>
                              </td>
                               
                        <td>
                          <a href="https://api.whatsapp.com/send?phone={{$annonces->contactWhatsapp}}"><button type="button" class="btn btn-success"><i class="mdi mdi-whatsapp"></i> </button></a>
                        </td>
                        <td class="fw-bold"> {{$annonces->prix}} FCFA</td>
                        <td>{{$annonces->type}}</td>
                        <td>{{$annonces->Lieu}}</td>
                        <td>{{$item->libelle}}</td>
                        <td>{{$ville->name}}</td>
                        <td>{{$utilisateur->nom}}, {{$utilisateur->prenom}}</td>
                        <td> 
                            @if($annonces->type == "dons")
                            <a href="/annonceDetaildonss/{{$annonces->slug}}"><button type="button" class="btn btn-warning"><i class="mdi mdi-eye"></i> </button></a>
                            @elseif($annonces->type == "troque")
                            <a href="/annonceDetail/{{$annonces->slug}}"><button type="button" class="btn btn-warning"><i class="mdi mdi-eye"></i> </button></a>
                           @else
                           <a href="/annonceDetail/{{$annonces->slug}}"><button type="button" class="btn btn-warning"><i class="mdi mdi-eye"></i> </button></a>
                            @endif
                        <td>
                            <a href="/annonces_edit/{{$annonces->slug}}"><button type="button" class="btn btn-info"><i class="mdi mdi-keyboard"></i> </button> </a> 
                            </td>
                        <td>
                            <a href="/annonces_delete/{{$annonces->slug}}"> <button type="button" class="btn btn-danger"><i class="mdi mdi-delete"></i> </button> </a> 
                        </td>
                        </tr>
                                @endforeach
                            @endforeach
                        @endforeach
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