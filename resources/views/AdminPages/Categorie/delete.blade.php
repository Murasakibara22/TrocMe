@extends('dash/layout/app')

@section('content')


@if ( session('success'))
  <div class="alert alert-success">
   sauvegarder avec succès
  </div>

@endif


          <div class="content-page">
                          <div class="content">

                              <!-- Start Content-->
                              <div class="container-fluid">

                               <!-- start page title -->
                                <div class="row">
                                        <div class="col-12">
                                            <div class="page-title-box">
                                                <div class="page-title-right">
                                                    <ol class="breadcrumb m-0">
                                                        <li class="breadcrumb-item"><a href="javascript: void(0);">List</a></li>
                                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Nouvelle</a></li>
                                                    </ol>
                                                </div>
                                                <h4 class="page-title"><a href="/Categorie_list"><button type="button" class="btn btn-outline-info rounded-pill ms-3"><i class="uil-circuit"></i> Retour</button> </a>Votre avis  </h4>
                                                
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end page title -->

                              <form action="{{ url('/CategoriDelete/'.$categories->slug) }}" method="POST">
                              @csrf 
                                @method('DELETE')

                                    <div class="alert alert-danger" role="alert">
                                  vous allez suprimer Cette  Categorie ? 
                                    </div>

                                    <div class="shadow-lg p-3 mb-5 bg-body rounded ms-5">Voulez vous vraiment suprimer cette  categorie ? ({{$categories->libelle}})
                                    <button type="submit"  class="btn btn-danger ms-3">oui suprimer</button>
                                    </div>
                                </form>


                            </div>
                        </div>
                </div>






@endsection