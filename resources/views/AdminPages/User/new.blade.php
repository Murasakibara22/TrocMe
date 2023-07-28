@extends('dash/layout/app')

@section('content')


@if ( session('success'))
  <div class="alert alert-success">
  Utilisateurs sauvegarder avec succès
  </div>

@endif

@if ( session('error'))
  <div class="alert alert-danger">
  Utilisateurs non sauvegarder (un champ n'est pas correctement remplis)  </div>

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
                            <img src="./assets/images/logo/freshcart-logo.svg" alt="brand-logo" height="12" class="me-1" />
                            <strong class="me-auto">succes</strong>
                            <small>Maintenant</small>
                            <button type="button" class="ms-2 mb-1 btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                        </div>
                        <div class="toast-body">
                            Utilisateur Sauvegarder avec succes.
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
                                    <h4 class="page-title"> Utilisateurs <a href="/Utilisateurs_list" class="float-end"><button type="button" class="btn btn-outline-info rounded-pill ms-5"><i class="uil-circuit"></i> Listes des Utilisateurs</button> </a></h4>
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="header-title">Enregistrer un Utilisateur</h4>


                                        <div class="tab-content">
                                            <div class="tab-pane show active" id="input-types-preview">
                                                <div class="row">
                                                    <div class="col-lg-10">
                                                    <form action="{{ route('AddUser') }}" method="POST" enctype="multipart/form-data">
                                                      @csrf 
                                                      @method('POST')
                                                        <div class="mb-3">
                                                                <label for="example-palaceholder" class="form-label">Nom</label>
                                                                <input name="nom" type="text" id="example-palaceholder" class="form-control" placeholder="Entrer le Nom">
                                                            </div>

                                                            <div class="mb-3">
                                                                <label for="example-palaceholder" class="form-label">Prenoms</label>
                                                                <input name="prenom" type="text" id="example-palaceholder" class="form-control" placeholder="Entrer le prenom">
                                                            </div>
        
                                                            <div class="mb-3">
                                                                <label for="example-email" class="form-label">Email</label>
                                                                <input name="email" type="email" id="example-email" class="form-control" placeholder="Email">
                                                            </div>

                                                            <div class="mb-3">
                                                                <label for="example-palaceholder" class="form-label">Contact</label>
                                                                <input name="contact" type="text" id="example-palaceholder" class="form-control" value="+225">
                                                            </div>

                                                            <div class="mb-3">
                                                            <label for="example-select" class="form-label">Status</label>
                                                            <select class="form-select" id="example-select" name="role">
                                                                <option value="user">utilisateurs</option>
                                                                <option value="admin">Administrateur</option>
                                                            </select>
                                                        </div>

                                                            <div class="mb-3">
                                                                <label for="password" class="form-label">Show/Hide Password</label>
                                                                <div class="input-group input-group-merge">
                                                                    <input name="password" type="password" id="password" class="form-control" placeholder="Enter your password">
                                                                    <div class="input-group-text" data-password="false">
                                                                        <span class="password-eye"></span>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="mb-3">
                                                            <label for="example-fileinput" class="form-label">Joindre une photo de profile (FACULTATIF)</label>
                                                            <input name="photo" type="file" id="example-fileinput" class="form-control">
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