@extends('dash/layout/app')

@section('content')

 <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->

            <div class="content-page">
                <div class="content">
                @if ( session('saveSuccessequipe'))
                    <div class="alert alert-success">
                    Utilisateurs sauvegarder avec succès
                    </div>

                    @endif
                 @if ( session('NotsaveSuccessequipe'))
                    <div class="alert alert-danger">
                    un probelme est survenue lors de l'enregistrement d'un membre
                    </div>

                    @endif
                    @if ( session('AucunChamps'))
                    <div class="alert alert-danger">
                    les champs ne peuvent pas etre vide
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
                                            <li><a href="/following_list"><button type="button" class="btn btn-outline-info rounded-pill ms-5"><i class="uil-circuit"></i> Listes des types D'abonnement</button> </a></li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title"> Type D'abonnement </h4>
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="header-title">Modifier un Type d'abonnement</h4>


                                        <div class="tab-content">
                                            <div class="tab-pane show active" id="input-types-preview">
                                                <div class="row">
                                                    <div class="col-lg-10">
                                                    <form action="{{ route('changeFollows',$follow->slug) }}" method="POST" enctype="multipart/form-data">
                                                      @csrf 
                                                      @method('PUT')
                                                        <div class="mb-3">
                                                                <label for="example-palaceholder" class="form-label">titre</label>
                                                                <input name="titre" type="text" id="example-palaceholder" class="form-control" value="{{ old($follow->titre) ??  $follow->titre }}">
                                                            </div>

                                                            <div class="col-12  mb-3">
                                                                <label class="form-label" for="phone"> Prix <span class="text-danger">*</span></label>
                                                                    <div class="input-group mb-3">
                                                                        <span class="input-group-text">FCFA</span>
                                                                        <input type="text" class="form-control" name="prix" aria-label="" value="{{ old($follow->prix) ??  $follow->prix }} " >
                                                                    </div>
                                                                </div>
        
                                                                <div class="col-6-12 mb-3">
                                                                    <label for="example-palaceholder" class="form-label">Nombre de jours</label>
                                                                    <input name="nb_jours" type="number" id="example-palaceholder" class="form-control" value="">
                                                                </div>

                                                                <div class="row">
                                                                
                                                            <div class="mb-3 col-4">
                                                                <label for="example-palaceholder" class="form-label">Avantage 1</label>
                                                                <input name="avantage1" type="text" id="example-palaceholder" class="form-control" value="{{ old($follow->avantage1) ??  $follow->avantage1  }}">
                                                            </div>

                                                            <div class="mb-3 col-4">
                                                                <label for="example-palaceholder" class="form-label">Avantages 2</label>
                                                                <input name="avantage2" type="text" id="example-palaceholder" class="form-control"  value="{{ old($follow->avantage2) ??  $follow->avantage2 }}">
                                                            </div>

                                                            <div class="mb-3 col-4">
                                                                <label for="example-palaceholder" class="form-label">Avantages 3</label>
                                                                <input name="avantage3" type="text" id="example-palaceholder" class="form-control"  value="{{ old($follow->avantage3) ??  $follow->avantage3  }}">
                                                            </div>

                                                            </div>


                                                            <h5 class="mb-3 ">Description</h5>
                                                              <div class="form-floating mb-3">
                                                                  <textarea class="form-control" name="description" value="{{ old($follow->description ) ??  $follow->description  }} " id="floatingTextarea"
                                                                      style="height: 100px">{{ old($follow->description ) ??  $follow->description  }}</textarea>
                                                                  <label for="floatingTextarea">Toutes les informations sur le type d'abonnement</label>
                                                              </div>
                                                          </div>
                
                                                        <input type="hidden" name="token" value="{{ csrf_token() }}" />

                                                        </div>
                                                          <button type="submit" class="btn btn-primary mb-2">Modifier</button>
                                                      </div>
        
                
                                                        </form>
                                                    </div> <!-- end col -->
        
                                                 
                                                </div>
                                                <!-- end row-->                      
                                            </div> <!-- end preview-->
                                        
                            
                                        </div> <!-- end tab-content-->
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
                                <script>document.write(new Date().getFullYear())</script> © Hyper - Coderthemes.com
                            </div>
                            <div class="col-md-6">
                                <div class="text-md-end footer-links d-none d-md-block">
                                    <a href="javascript: void(0);">About</a>
                                    <a href="javascript: void(0);">Support</a>
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