@extends('dash/layout/app')

@section('content')

 <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->

            <div class="content-page">
                <div class="content">
                @if ( session('SaveFollowingSuccess'))
                    <div class="alert alert-success">
                    le type d'abonnements a ete creer avec success 
                    </div>
                    @endif
                    
                 @if ( session('NotSaveFollowingSuccess'))
                    <div class="alert alert-warning">
                    le type d'abonnements n'a pas pu etre creer avec success
                    </div>

                    @endif
                    @if ( session('champsmanquant'))
                    <div class="alert alert-danger">
                    l'un des champs n'est pas correctement remplit
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
                            <div class="col-10 mx-auto">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="header-title">Enregistrer un Type d'abonnement</h4>


                                        <div class="tab-content">
                                            <div class="tab-pane show active" id="input-types-preview">
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                    <form action="{{ route('ajoutfollowings') }}" method="POST" enctype="multipart/form-data">
                                                      @csrf 
                                                      @method('POST')
                                                        <div class="mb-3">
                                                                <label for="example-palaceholder" class="form-label">titre</label>
                                                                <input name="titre" type="text" id="example-palaceholder" class="form-control" placeholder="Entrer le Nom">
                                                            </div>

                                                            <div class="col-12  mb-3">
                                                                <label class="form-label" for="phone"> Prix <span class="text-danger">*</span></label>
                                                                    <div class="input-group mb-3">
                                                                        <span class="input-group-text">FCFA</span>
                                                                        <input type="text" class="form-control" name="prix" aria-label="" placeholder="Ex : 10000" required >
                                                                    </div>
                                                                </div>
        
                                                                <div class="col-6-12 mb-3">
                                                                    <label for="example-palaceholder" class="form-label">Nombre de jours</label>
                                                                    <input name="nb_jours" type="number" id="example-palaceholder" class="form-control" placeholder="Entrer le Nom">
                                                                </div>

                                                                <div class="row">
                                                                
                                                            <div class="mb-3 col-4">
                                                                <label for="example-palaceholder" class="form-label">Avantage 1</label>
                                                                <input name="avantage1" type="text" id="example-palaceholder" class="form-control" placeholder="Entrer L'avantage n'1">
                                                            </div>

                                                            <div class="mb-3 col-4">
                                                                <label for="example-palaceholder" class="form-label">Avantages 2</label>
                                                                <input name="avantage2" type="text" id="example-palaceholder" class="form-control"  placeholder="Entrer L'avantage n'2">
                                                            </div>

                                                            <div class="mb-3 col-4">
                                                                <label for="example-palaceholder" class="form-label">Avantages 3</label>
                                                                <input name="avantage3" type="text" id="example-palaceholder" class="form-control"  placeholder="Entrer L'avantage n'3">
                                                            </div>

                                                            </div>


                                                            <h5 class="mb-3 ">Description</h5>
                                                              <div class="form-floating mb-3">
                                                                  <textarea class="form-control" name="description" placeholder="Leave a comment here" id="floatingTextarea"
                                                                      style="height: 100px"></textarea>
                                                                  <label for="floatingTextarea">Toutes les informations sur le type d'abonnement</label>
                                                              </div>
                                                          </div>
                
                                                        <input type="hidden" name="token" value="{{ csrf_token() }}" />

                                                        </div>
                                                          <button type="submit" class="btn btn-primary mb-2">valider</button>
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