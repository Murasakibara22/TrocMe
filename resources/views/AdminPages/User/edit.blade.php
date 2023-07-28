@extends('dash/layout/app')

@section('content')


@if ( session('success'))
  <div class="alert alert-success">
   sauvegarder avec succès
  </div>

@endif




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
                                  
                                    <h4 class="page-title"> Utilisateurs 
                                    <a href="/Utilisateurs_list" class="btn btn-outline-info rounded-pill ms-5 float-end"><i class="uil-circuit"></i> Listes des Utilisateurs</a>
                                    </h4>
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body ">
                                        <h4 class="header-title">Modifier l'utilisateur <span class="text-success"> ( {{$users->nom}} )  </span></h4>


                                        <div class="tab-content">
                                            <div class="tab-pane show active" id="input-types-preview">
                                                <div class="row ">
                                                    <div class=" mx-auto col-lg-10">
                                                    <form action="{{ url('/UtilisateursEdit',$users->slug) }}" method="POST" enctype="multipart/form-data">
                                                      @csrf 
                                                      @method('PUT')
                                                        <div class="mb-3">
                                                                <label for="example-palaceholder" class="form-label">Nom</label>
                                                                <input name="nom" type="text" id="example-palaceholder" class="form-control" value="{{ old($users->nom) ?? $users->nom }}">
                                                            </div>

                                                            <div class="mb-3">
                                                                <label for="example-palaceholder" class="form-label">Prenoms</label>
                                                                <input name="prenom" type="text" id="example-palaceholder" class="form-control" value="{{ old($users->prenom) ?? $users->prenom }}">
                                                            </div>
        
                                                            <div class="mb-3">
                                                                <label for="example-email" class="form-label">Email</label>
                                                                <input name="email" type="email" id="example-email" class="form-control" value="{{ old($users->email) ?? $users->email }}">
                                                            </div>

                                                            <div class="mb-3">
                                                                <label for="example-palaceholder" class="form-label">Contact</label>
                                                                <input name="contact" type="text" id="example-palaceholder" class="form-control" value="{{ old($users->contact) ?? $users->contact }}">
                                                            </div>

                                                            <div class="mb-3">
                                                            <label for="example-select" class="form-label">Status</label>
                                                            <select class="form-select" id="example-select" name="role">
                                                                <option value="aucun">none</option>
                                                                <option value="user">utilisateurs</option>
                                                                <option value="admin">Administrateur</option>
                                                            </select>
                                                        </div>

                                                        

                                                            <div class="mb-3">
                                                            <label for="example-fileinput" class="form-label">Joindre une photo de profile (FACULTATIF)</label>
                                                            <input name="photo" type="file" id="example-fileinput" class="form-control">{{ old($users->photo) ?? $users->photo }}
                                                        </div>
                
                                                        <input type="hidden" name="token" value="{{ csrf_token() }}" />

                                                        <button type="submit" class="btn btn-primary mb-2">Modifier</button>

                                                        </div>
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

                    </div>


                </div>
            </div>

<!-- ============================================================== -->
<!-- End Page content -->
<!-- ============================================================== -->





@endsection