@extends('dash/layout/app')

@section('styles')

<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>

<script>
  tinymce.init({
    selector: '#mytextarea',
    plugins: [
      'a11ychecker','advlist','advcode','advtable','autolink','checklist','export',
      'lists','link','image','charmap','preview','anchor','searchreplace','visualblocks',
      'powerpaste','fullscreen','formatpainter','insertdatetime','media','table','help','wordcount'
    ],
    toolbar: 'undo redo | formatpainter casechange blocks | bold italic backcolor | ' +
      'alignleft aligncenter alignright alignjustify | ' +
      'bullist numlist checklist outdent indent | removeformat | a11ycheck code table help'
  });
</script>

@endsection

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
                                            <li><a href="/type_professionUser"><button type="button" class="btn btn-outline-info rounded-pill ms-5"><i class="uil-circuit"></i> Listes des TUP</button> </a></li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title"> Type D'abonnement Utilisateurs Professionel </h4>
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <div class="row">
                            <div class="col-10 mx-auto">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="header-title">Enregistrer un Type D'abonnement Utilisateurs Professionel</h4>


                                        <div class="tab-content">
                                            <div class="tab-pane show active" id="input-types-preview">
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                    <form action="{{ route('type_professionUser.store') }}" method="POST" enctype="multipart/form-data">
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

                                                              


                                                            <h5 class="mb-3 ">Description</h5>
                                                                <div style="height: 100%; width: 100%;">
                                                                    <textarea id="mytextarea" class="h-100 w-100"  name="description"></textarea>
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