@extends('dash/layout/app')

@section('content')


@if ( session('Notedit'))
  <div class="alert alert-danger">
   Non sauvegarder
  </div>

@endif



<!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->

            <div class="content-page">
                <div class="content">
                @if ( session('success'))
                    <!-- Basic Toast -->
                    <div class="toast fade show  ms-7 bg-success align-center" role="alert" aria-live="assertive" aria-atomic="true">
                        <div class="toast-header">
                            <img src="assets/images/logo-dark-sm.png" alt="brand-logo" height="12" class="me-1" />
                            <strong class="me-auto">succes</strong>
                            <small>Maintenant</small>
                            <button type="button" class="ms-2 mb-1 btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                        </div>
                        <div class="toast-body">
                            Categorie Sauvegarder avec succes.
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
                                    <h4 class="page-title">Listes des Categories <a href="/new_Categorie" class="float-end"><button type="button" class="btn btn-outline-info rounded-pill ms-5"><i class="uil-plus"></i> Ajoutez des Categories</button> </a></h4>
                                    
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->
                        

                      
                    <div class="row mt-2">
                      @foreach($categories as $categorie)
                            <div class="col-lg-10">
                                <div class="card">
                                    <div class="row g-0 align-items-center">
                                        <div class="col-md-2">
                                            <img src="/images/Categorie/{{$categorie->photo}}" class="card-img w-100 h-30" alt="...">
                                        </div>
                                        <div class="col-md-10">
                                            <div class="card-body">
                                                <h5 class="card-title">{{$categorie->libelle}}</h5>
                                                <p class="card-text">{{$categorie->description}}</p>
                                                <p class="card-text"><small class="text-muted">
                                                  <a href="/SousSelonCat/{{$categorie->slug}}"><button type="button" class="btn btn-outline-danger"><i class="uil-cog"></i> Voir les sous categories</button></a> 
                                                  <a href="/Categorie_edit/{{$categorie->slug}}"> <button type="button" class="btn btn-warning "><i class="mdi mdi-wrench"></i> </button> </a>
                                                  <a href="/Categorie_delete/{{$categorie->slug}}"><button type="button" class="btn btn-danger"><i class="mdi mdi-delete"></i> </button> </a>
                                                  </small></p>
                                            </div> <!-- end card-body-->
                                        </div> <!-- end col -->
                                    </div> <!-- end row-->
                                </div> <!-- end card-->
                            </div> <!-- end col-->
                            @endforeach
                        </div>
                       
                        <!-- end row -->
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