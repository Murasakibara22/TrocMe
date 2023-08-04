@extends('../layouts/app')

@section('styles')

    @livewireStyles

@endsection


@section('content')

@if ( session('succesEdit'))
<div class="alert alert-success">
    Vos informations ont été modifier avec succes, veuillez rafraichir la page pour voir les modifications
</div>
@endif
@if ( session('erreur'))
<div class="alert alert-warning">
    l'un des champs n'est pas correctement remplis
</div>
@endif
@if ( session('error'))
<div class="alert alert-warning">
    probleme survenue veuillez reessayer plus tard
</div>
@endif


<main>
    <!-- section -->
    <section>
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <!-- col -->
                <div class="col-12">
                    <div class="d-flex justify-content-between align-items-center d-md-none py-4">
                        <!-- heading -->
                        <h3 class="fs-5 mb-0">Mes Informations</h3>
                        <!-- button -->
                        <button class="btn btn-outline-gray-400 text-muted d-md-none btn-icon btn-sm ms-3 "
                            type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasAccount"
                            aria-controls="offcanvasAccount">
                            <i class="bi bi-text-indent-left fs-3"></i>
                        </button>
                    </div>
                </div>
                <!-- col -->
                <div class="col-lg-3 col-md-4 col-12 border-end  d-none d-md-block">
                    <div class="pt-10 pe-lg-10">
                        <!-- nav -->
                        <ul class="nav flex-column nav-pills nav-pills-dark">
                            <!-- nav item -->
                            <li class="nav-item">
                                <a class="nav-link " aria-current="page" href="/account"><i
                                        class="feather-icon icon-shopping-bag me-2"></i>Mes Annonces</a>
                            </li>
                            <!-- nav item -->
                            <li class="nav-item">
                                <a class="nav-link active" href="/account_reglage"><i
                                        class="feather-icon icon-settings me-2"></i>Infos Personnelles</a>
                            </li>
                            <!-- nav item -->
                            <!-- nav item -->
                            <li class="nav-item">
                                <a class="nav-link" href="/dashboard_user_troque"><i
                                        class="feather-icon icon-settings me-2"></i>Mes Troc</a>
                            </li>
                            <!-- nav item -->
                            <!-- nav item -->
                            <li class="nav-item">
                                <a class="nav-link" href="/dashboard_user_dons"><i
                                        class="feather-icon icon-settings me-2"></i>Mes donss</a>
                            </li>
                            <!-- nav item -->
                            <!-- nav item -->
                            <li class="nav-item">
                                <a class="nav-link " href="/dashboard_user_demande"><i
                                        class="feather-icon icon-settings me-2"></i>Mes Demandes</a>
                            </li>
                            <!-- nav item -->
                            <!-- nav item -->
                            <li class="nav-item">
                                <hr>
                            </li>
                            <!-- nav item -->
                            <li class="nav-item">
                                <a class="nav-link " href="/deconnexion"><i
                                        class="feather-icon icon-log-out me-2"></i>Déconnexion</a>
                            </li>
                        </ul>
                    </div>

                    <!-- Div d'annonce pub -->
              <div class="row mt-1 mb-5 blink_affPub">
                <div class="col-md-12 col-12 mb-3">
                    <div class="card card-product">
                        <div class="card-body " style="padding-top: none; border: 0.02em #0dad63 solid; border-radius: 0.3rem!important;">
                          <div class="text-start  position-relative ">
                              <a href="/pricings"><img
                                src="../assets/images/affiche1.jpg" alt="Troc moi"
                                class="mb-1 img-fluid"></a>
                              <div class="card-product-action">
                                  <div class="d-grid ">
                              <a href="/pricings" class="btn btn-success ">
                              
                                Devenir Professionnel
                              </a>
                          </div>
                              </div>
                          </div>
                        </div>
                    </div>
                  </div>
              </div>



                </div>

                <div class="col-lg-9 col-md-8 col-12">
                    <div class="py-4 p-md-6 p-lg-10">
                        <div class="mb-6">
                            <!-- heading -->
                            <h2 class="mb-0">Informations Personnelles</h2>
                        </div>
                        <div>
                            <!-- heading -->

                            <div class="row">
                                <!-- form -->

                                <div class="col-lg-6">
                                    <form action="{{ route('updateUsers',$user->slug) }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <!-- input -->
                                        <div class="mb-3">
                                            <label class="form-label">Nom</label>
                                            <input type="text" class="form-control" name="nom"
                                                value="{{ old($user->nom) ?? $user->nom}}">
                                        </div>
                                        <!-- input -->
                                        <div class="mb-3">
                                            <label class="form-label">Email</label>
                                            <input type="email" class="form-control" name="email"
                                                value="{{ old($user->email) ?? $user->email}}">
                                        </div>
                                        <!-- input -->
                                        <div class="mb-5">
                                            <label class="form-label">contacts</label>
                                            <input type="text" class="form-control" name="contact"
                                                value="{{ old($user->contact) ?? $user->contact}}">
                                        </div>



                                </div>
                                <div class="col-lg-6">

                                    <!-- input -->
                                    <div class="mb-3">
                                        <label class="form-label">Prenom</label>
                                        <input type="text" class="form-control" name="prenom"
                                            value="{{ old($user->prenom) ?? $user->prenom}}">
                                    </div>
                                    <!-- input -->
                                    <div class="mb-3">
                                        <label class="form-label">Photo</label>
                                        <input type="file" class="form-control" name="photo"
                                            value="{{ old($user->photo) ?? $user->photo}}">
                                    </div>
                                    <!-- input -->
                                    <div class="mb-5">
                                        <div class="row">
                                            <div class="col-5 justify-content-center rounded-2"
                                                style="margin: 0.5rem 3rem 0 3.5rem">
                                                <img src="../images/User/{{$user->photo}}" alt="Troc moi " height="100%"
                                                    width="90%" style="box-shadow: 0.2px 0.3px 7px 2px;"
                                                    class="rounded-3">
                                            </div>
                                        </div>
                                    </div>
                                    <!-- button -->
                                    @if($user_pro == True)

                                    <div class="col-lg-12 float-start">
                                        <!-- input -->
                                        <div class="mb-3">
                                            <label class="form-label">Photo entreprise</label>
                                            <input type="file" class="form-control" name="photo_entreprise">
                                        </div>
                                        <!-- input -->
                                        
                                    </div>
                                    @endif


                                    <input type="hidden" name="token" value="{{ csrf_token() }}" />
                                </div>

                                
                             



                                <div class="mb-3">
                                    <button type="submit" class="btn btn-primary">Sauvegarder</button>
                                </div>
                                </form>
                            </div>
                        </div>
                        <hr class="my-10">

                        @if($user_pro == True)
                        <!-- Mon composant Livewire pour la bannear -->
                        
                                @livewire('reglage-user.ajout-img', ['Userid' => $user->id], key($user->id))
                             @endif

                        <hr class="my-10">
                        <div>
                            <!-- heading -->
                            <h5 class="mb-4">Supprimer le compte</h5>
                            <p class="mb-2">Souhaitez-vous supprimer votre compte ?</p>
                            <p class="mb-5">Ce compte contient 12 commandes, la suppression de votre compte supprimera
                                tous les détails de la commande
                                associé avec.</p>
                            <!-- btn -->
                            <a href="#" class="btn btn-outline-danger">Je veux supprimer mon compte</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>



<div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasAccount" aria-labelledby="offcanvasAccountLabel">
    <!-- offcanvas header -->
    <div class="offcanvas-header bg-success">
      <h5 class="offcanvas-title color-white" id="offcanvasAccountLabel">Mon Menu</h5>
      <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
      <!-- offcanvas body -->
    <div class="offcanvas-body">
      <ul class="nav flex-column nav-pills nav-pills-dark">
          <!-- nav item -->
        <li class="nav-item">
          <a class="nav-link {{ Request::is('account') ? 'active': ''}}" aria-current="page" href="/account"><i
              class="feather-icon icon-shopping-bag me-2"></i>Mes Annonces</a>
        </li>
          <!-- nav item -->
        <li class="nav-item">
          <a class="nav-link {{ Request::is('account_reglage') ? 'active': ''}}" href="/account_reglage"><i class="feather-icon icon-settings me-2"></i>Infos Personnelles</a>
        </li>
          <!-- nav item -->
        <li class="nav-item">
          <a class="nav-link  {{ Request::is('dashboard_user_troque') ? 'active': ''}}" href="/dashboard_user_troque"><i class="feather-icon icon-map-pin me-2"></i>Mes Trocks</a>
        </li>
          <!-- nav item -->
        <li class="nav-item">
          <a class="nav-link  {{ Request::is('dashboard_user_dons') ? 'active': ''}}" href="/dashboard_user_dons"><i
              class="feather-icon icon-credit-card me-2"></i>Mes donss</a>
        </li>
          <!-- nav item -->
        <li class="nav-item {{ Request::is('dashboard_user_demande') ? 'active': ''}}">
          <a class="nav-link" href="/dashboard_user_demande"><i
              class="feather-icon icon-bell me-2"></i>Mes Demandes</a>
        </li>

      </ul>
      <hr class="my-6">
      <div>
          <!-- nav  -->
        <ul class="nav flex-column nav-pills nav-pills-dark">
            <!-- nav item -->
          <li class="nav-item">
            <a class="nav-link " href="/deconnexion"><i class="feather-icon icon-log-out me-2"></i>Déconnexion</a>
          </li>

        </ul>
      </div>
    </div>
  </div>

@endsection



@section('scripts')

    @livewireScripts





    

@endsection