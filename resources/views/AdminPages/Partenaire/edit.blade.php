@extends('dash/layout/app')

@section('content')

 <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->

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
                                            <li><a href="/partenaire_list"><button type="button" class="btn btn-outline-info rounded-pill ms-5"><i class="uil-circuit"></i> Listes des partenaires</button> </a></li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title"> Nos Partenaires </h4>
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="header-title">Modifier le partenaire</h4>


                                        <div class="tab-content">
                                            <div class="tab-pane show active" id="input-types-preview">
                                                <div class="row">
                                                    <div class="col-lg-10">
                                                    <form action="{{ route('modifyPartenaire',$partenaire->slug ) }}" method="POST" enctype="multipart/form-data">
                                                      @csrf 
                                                      @method('PUT')
                                                        <div class="mb-3">
                                                                <label for="example-palaceholder" class="form-label">Nom</label>
                                                                <input name="nom" type="text" id="example-palaceholder" class="form-control" value="{{  old($partenaire->nom) ?? $partenaire->nom }}">
                                                            </div>

                                                            <div class="mb-3">
                                                                <label for="example-email" class="form-label">Email</label>
                                                                <input name="email" type="email" id="example-email" class="form-control" value="{{  old($partenaire->email) ?? $partenaire->email }}">
                                                            </div>

                                                            <div class="mb-3">
                                                                <label for="example-palaceholder" class="form-label">Contact</label>
                                                                <input name="contact" type="text" id="example-palaceholder" class="form-control" value="{{  old($partenaire->contact) ?? $partenaire->contact }}">
                                                            </div>


                                                            <div class="mb-3">
                                                            <label for="example-fileinput" class="form-label">Joindre Le Logos</label>
                                                            <input name="photo" type="file" id="example-fileinput" class="form-control" value="{{  old($partenaire->photo) ?? $partenaire->photo }}">
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