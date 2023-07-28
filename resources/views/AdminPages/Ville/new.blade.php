@extends('dash/layout/app')

@section('content')






 <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->

            <div class="content-page">
                <div class="content">
                @if ( session('success'))
                    <!-- Basic Toast -->
                  <div class="toast fade show  ms-7 bg-success align-center" role="alert" aria-live="assertive" aria-atomic="true">
                      <div class="toast-header">
                          <img src="assets/images/logo-dark-sm.png" alt="Trocmoi" height="12" class="me-1" />
                          <strong class="me-auto">succes</strong>
                          <small>Maintenant</small>
                          <button type="button" class="ms-2 mb-1 btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                      </div>
                      <div class="toast-body">
                          Sous ville Sauvegarder avec succes.
                      </div>
                  </div> <!--end toast-->

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
                                    <h4 class="page-title">Ajouter une nouvelle ville <a href="/ville_list" class="float-end"><button type="button" class="btn btn-outline-info rounded-pill ms-5"><i class="uil-circuit"></i> Liste des  villes</button> </a></h4>
                                    
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                       


                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="header-title"> villes</h4>
                            
                                     
                                  <form action="{{ route('AjoutVi') }}" method="POST" enctype="multipart/form-data">
                                  @csrf 
                                  @method('POST')
                                        <div class="tab-content">
                                            <div class="tab-pane show active" id="floating-preview">
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <h5 class="mb-3">Nom</h5>
                                                        <div class="form-floating mb-3">
                                                            <input type="text" name="libelle" class="form-control" id="floatingInput" placeholder="name@example.com">
                                                            <label for="floatingInput">Nom de la  ville</label>
                                                        </div>
                                                
                                                    </div>


                                                    <div class="col-lg-6">
                                                        <h5 class="mb-3">Code</h5>
                                                        <div class="form-floating mb-3">
                                                            <input type="text" name="code" class="form-control" id="floatingInput" placeholder="">
                                                            <label for="floatingInput">code de la  ville</label>
                                                        </div>
                                                
                                                    </div>
                                                
                                                    <div class="col-lg-12 mb-3">
                                                        <h5 class="mb-3">pays</h5>
                                                        <div class="form-floating" name="pays_id">
                                                            <select class="form-select" id="floatingSelect" name="pays_id" aria-label="Floating label select example">
                                                              @foreach($pays as $pay)
                                                                <option value="{{$pay->id}}" name="pays_id">{{$pay->libelle}}</option>
                                                                @endforeach
                                                            </select>
                                                            <label for="floatingSelect">Selectionne la Pays cible</label>
                                                        </div>
                                                    </div>

                                                    <input type="hidden" name="token" value="{{ csrf_token() }}" />

                                                </div>
                                                <button type="submit" class="btn btn-primary mb-2">Submit</button>
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