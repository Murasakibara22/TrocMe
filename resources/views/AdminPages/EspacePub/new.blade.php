@extends('dash/layout/app')

@section('content')






 <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->

            <div class="content-page">
                <div class="content">

                @if ( session('SaveEspacePub'))
                    <div class="alert alert-success">
                    L'espace publicitaire a ete sauvegarder avec succes
                    </div>
                    @endif

                @if ( session('NotSaveEspacePub'))
                    <div class="alert alert-warning">
                    Un probleme est survenue veuillez reessayer
                    </div>
                    @endif

                @if ( session('NotValidateData'))
                    <div class="alert alert-warning">
                    l'un des champs n'est pas correctement remplit
                    </div>
                    @endif

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
                                    <h4 class="page-title">Ajouter une publicité<a href="/espaccepub_list" class="float-end"><button type="button" class="btn btn-outline-info rounded-pill ms-5"><i class="uil-circuit"></i> Liste des une publicitées</button> </a></h4>
                                    
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                       

                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="header-title">Espace publicitaire</h4>
                                      
                                      
                                        <form action="{{ route('ajoutEspaces') }}" method="POST" enctype="multipart/form-data">
                                        @csrf 
                                        @method('POST')
                                              <div class="tab-content">
                                                  <div class="tab-pane show active" id="floating-preview">
                                                      <div class="row">
                                                                         
                                                          <div class="col-lg-6">

                                                              <h5 class="mb-3">Titre</h5>
                                                              <div class="form-floating mb-3">
                                                                  <input type="text" name="titre" class="form-control" id="floatingInput" placeholder="nom de la Categorie">
                                                                  <label for="floatingInput">nom de la publicité</label>
                                                              </div>
                                                            

                                                              <h5 class="mb-3">Ajouter une photo</h5>
                                                              <div class="form-floating">
                                                                  <div class="col-sm-12">
                                                                        <input class="form-control" name="photo" type="file" id="inputGroupFile04">
                                                                    </div>

                                                                </div>
                                                             </div>
                                                                  

                                                             <div class="col-lg-6">
                                                      <h5 class="mb-3 mt-4">Description</h5>
                                                              <div class="form-floating">
                                                                  <textarea class="form-control" name="description" placeholder="Leave a comment here" id="floatingTextarea"
                                                                      style="height: 100px"></textarea>
                                                                  <label for="floatingTextarea">La description sur l'espace publicitiare</label>
                                                              </div>
                                                          </div>


                                                          <div class="col-lg-6">
                                                                <h5 class="mb-3">Categorie</h5>
                                                                <div class="form-floating" name="souscat_id">
                                                                    <select class="form-select" id="floatingSelect" name="souscat_id" aria-label="Floating label select example">
                                                                    @foreach($souscategorie as $souscategories)
                                                                        <option value="aucun">Aucun</option>
                                                                        <option value="{{$souscategories->id}}" name="categorie_id">{{$souscategories->libelle}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                    <label for="floatingSelect">Selectionne la categorie cible</label>
                                                                </div>
                                                            </div>

                                                              <input type="hidden" name="token" value="{{ csrf_token() }}" />
                                                            
                                                              <div class="row g-2 mb-1 mt-3 " >
                                                              <div class="col-auto">
                                                                      <button type="submit" class="btn btn-primary mb-2">Valider</button>
                                                                  </div>
                                                              </div>
                                                          </div>
                                                      </div>
                                                  </div>
                                                
                                              </div> <!-- end tab-content-->
                                  </form>
                                    </div> <!-- end card-body -->
                                </div> <!-- end card -->
                            </div><!-- end col -->
                        </div><!-- end row -->

                


                     


                 


               
                        
                    </div> <!-- container -->

                </div> <!-- content -->

                <!-- Footer Start -->
                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6">
                                <script>document.write(new Date().getFullYear())</script> © Troc Moi
                            </div>
                            <div class="col-md-6">
                                <div class="text-md-end footer-links d-none d-md-block">
                                    <a href="javascript: void(0);">About</a>
                                    <a href="javascript: void(0);">Contact Us</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </footer>
                <!-- end Footer -->

            </div>

            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->



@endsection