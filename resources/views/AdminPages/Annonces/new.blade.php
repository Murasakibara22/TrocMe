@extends('dash/layout/app')

@section('content')

 <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->

            <div class="content-page">
                 <!-- Start Content-->
                <div class="content">

                @if ( session('saveSuccessAnnonce'))
                    <div class="alert alert-success">
                    Annonce publiez avec succes
                    </div>
                    @endif

                @if ( session('NotsaveSuccessAnnonce'))
                    <div class="alert alert-warning">
                    l'annonce n'a pas pu etre sauvegarder verifier que tous les champs sont correcte
                    </div>
                    @endif

                 <div class="container-fluid">

                  <!-- start page title -->
                  <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            
                                        </ol>
                                    </div>
                                    <h4 class="page-title">ANNONCES <a href="/annonce_list" class="float-end"><button type="button" class="btn btn-outline-primary rounded-pill ms-5"><i class="uil-circuit"></i> Listez toutes les Annonces</button> </a></h4>

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                       


                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="header-title mb-3">Ajouter une nouvelle Annonces </h4>


                 <form class="row" action="{{ route('ajoutAnnonce') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('POST')
              <!-- input -->
            <div class="col-md-6 mb-1">
              <label class="form-label" for="fname"> titre<span class="text-danger">*</span></label>
              <input type="text" id="fname" class="form-control" name="titre" placeholder="Entrer Le nom de l'article" required>
            </div>

            <div class="col-md-6 mb-1">
            <label class="form-label" for="fname"> Categorie<span class="text-danger">*</span></label>
                <div class="input-group mb-3" name="souscategorie_id">
                    <select class="form-select" id="inputGroupSelect02" name="souscategorie_id">
                        @foreach($souscat as $souscats)
                        <option value="{{$souscats->id}}" name="souscategorie_id" >{{$souscats->libelle}}</option>
                        @endforeach
                    </select>
                    <label class="input-group-text" for="inputGroupSelect02">Options</label>
                </div>
            </div>
            
          
              <!-- le type d'annonce -->
              <label class="form-label" for="fname"> Type<span class="text-danger">*</span></label>
            <div class="input-group mb-3" name="type" >
                <select class="form-select" id="inputGroupSelect02" name="type" required>
                    <option selected>choix...</option>
                    <option value="troque">Troque</option>
                    <option value="dons">dons</option>
                    <option value="demandez">Recherchez</option>
                    <option value="Troque ou dons">Troque ou dons</option>
                </select>
                <label class="input-group-text" for="inputGroupSelect02">Type</label>
            </div>
        
        
            <div class="col-md-12 mb-3">
            <label class="form-label" for="company">Images <span class="text-danger">*</span></label>
           
              
                <div class="input-group mb-2 col-3">
            <input type="file" name="photo" class="form-control" id="inputGroupFile02" required>
                </div>
                
            </div>

            <label class="form-label" for="company">Images secondaires <span class="text-danger">*</span></label>
            <div class="input-group mb-2 col-3">
            <input type="file" name="images_secondaire[]" class="form-control" id="inputGroupFile02" multiple="">
                </div>



            <div class="col-md-6 mb-3">
              <label class="form-label" for="emailContact">Email<span class="text-danger">*</span></label>
              <input type="text" id="emailContact" name="email" class="form-control" placeholder="Entrer votre Email"  >
            </div>
            <div class="col-md-6 mb-3">
              <!-- input -->
              <label class="form-label" for="phone"> Contact Whatsapp</label>
              <input type="text" id="phone" name="contactWhatsapp" class="form-control" placeholder="Entrer votre contact" required>
            </div>

            <div class="col-md-6  mb-3">
            <label class="form-label" for="phone"> Prix <span class="text-danger">*</span></label>
                <div class="input-group mb-3">
                    <span class="input-group-text">FCFA</span>
                    <input type="text" class="form-control" name="prix" aria-label="" placeholder="Ex : 10000" required >
                </div>
            </div>

            <div class="col-md-6  mb-3">
            <label class="form-label" for="phone"> ville</label>
                <div class="input-group mb-3" name="ville_id">
                    <button class="btn btn-outline-secondary" type="button">Lieu</button>
                    <select class="form-select" id="inputGroupSelect03" aria-label="Example select with button addon" name="ville_id">
                        @foreach($ville as $villes)
                    <option value="{{$villes->id}}" name="ville_id">{{$villes->libelle}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="col-md-6 mb-3">
              <label class="form-label" for="emailContact">Adresse<span class="text-danger">*</span></label>
              <input type="text" id="emailContact" name="lieu" class="form-control" placeholder="Entrer votre Adresse" required >
            </div>
            <div class="col-md-6 mb-3">
              <!-- input -->
              <label class="form-label" for="phone">Joindre via Facebook</label>
              <input type="text" id="phone" name="facebook" class="form-control" placeholder="Entrer username facebook" required>
            </div>


            <div class="col-md-12 mb-3">
              <!-- input -->
              <label class="form-label" for="comments"> Description</label>
              <textarea rows="3" id="comments" name="description" class="form-control" placeholder="Tous ce dont le client a besoin de savoir sur votre article"></textarea>
            </div>
            <div class="col-md-12">
              <!-- btn -->
              <button type="submit" class="btn btn-primary">publiez</button>
            </div>


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
                        <script>document.write(new Date().getFullYear())</script> ©Troc  moi
                    </div>
                    <div class="col-md-6">
                        <div class="text-md-end footer-links d-none d-md-block">
                            <a href="/apropos">About</a>
                    
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