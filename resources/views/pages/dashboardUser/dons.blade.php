@extends('../layouts/app')


@section('content')

          @if ( session('NotExist'))
                    <div class="alert alert-warning">
                    L'annonce selectionner n'est pas disponible 
                    </div>
                    @endif

<main>
  <!-- section -->
  <section>
    <div class="container">
      <!-- row -->
      <div class="row">
        <!-- col -->
        <div class="col-12">
          <div class="d-flex justify-content-between align-items-center d-md-none py-4">
            <!-- heading -->
            <h3 class="fs-5 mb-0">Compte</h3>
            <!-- button -->
            <button class="btn btn-outline-gray-400 text-muted d-md-none btn-icon btn-sm ms-3 " type="button"
              data-bs-toggle="offcanvas" data-bs-target="#offcanvasAccount" aria-controls="offcanvasAccount">
              <i class="bi bi-text-indent-left fs-3"></i>
            </button>
          </div>
        </div>
        <!-- col -->
        <div class="col-lg-3 col-md-2 col-12 border-end  d-none d-md-block">
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
                <a class="nav-link" href="/account_reglage"><i
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
                <a class="nav-link active" href="/dashboard_user_dons"><i
                    class="feather-icon icon-settings me-2"></i>Mes dons</a>
              </li>
              <!-- nav item -->
              <!-- nav item -->
              <li class="nav-item">
                <a class="nav-link" href="/dashboard_user_demande"><i
                    class="feather-icon icon-settings me-2"></i>Mes Demandes</a>
              </li>
              <!-- nav item -->
              <!-- nav item -->
              <li class="nav-item">
                <hr>
              </li>
              <!-- nav item -->
              <li class="nav-item">
                <a class="nav-link " href="/deconnexion"><i class="feather-icon icon-log-out me-2"></i>Déconnexion</a>
              </li>
            </ul>
          </div>
        </div>
        <div class="col-lg-9 col-md-10 col-12">
          <div class="py-6 p-md-6 p-lg-10">
            <!-- heading -->
            <div class="d-flex justify-content-between mb-6 align-items-center">
              <h2 class="mb-0">Mes dons</h2>
              <a href="/publiez" class="btn btn-outline-primary" >Ajoutez une Annonce</a>

            </div>

            <div class="table-responsive border-0">
              <!-- Table -->
              <table class="table mb-0 text-nowrap">
                <!-- Table Head -->
                <thead class="table-light">
                  <tr>
                    <th class="border-0">photos</th>
                    <th class="border-0">titre</th>
                    <th class="border-0">Categories</th>
                    <th class="border-0"> ville</th>
                    <th class="border-0">type</th>
                    <th class="border-0">prix</th>

                    <th class="border-0">voir</th>
                    <th class="border-0">Modifier</th>
                    <th class="border-0">Supprimer</th>
                  </tr>
                </thead>
                <tbody>
                  <!-- Table body -->
                  @if($annonce->count() > 0 && isset($annonce))
                  @foreach($annonce as $annonces)
                  <tr>
                    <td class="align-middle border-top-0 w-0">
                      @if($annonces->type == "troque")
                  <a href="/annonceDetail/{{$annonces->slug}}"> <img src="../images/Annonce/{{$annonces->photo}}" alt="troc moi"
                      class="icon-shape icon-xl"></a>
                      @elseif($annonces->type == "dons")
                      <a href="/annonceDetaildons/{{$annonces->slug}}"> <img src="../images/Annonce/{{$annonces->photo}}" alt="troc moi"
                      class="icon-shape icon-xl"></a>
                      @elseif($annonces->type == "Troque ou dons")
                      <a href="/annonceDetail/{{$annonces->slug}}"> <img src="../images/Annonce/{{$annonces->photo}}" alt="troc moi"
                      class="icon-shape icon-xl"></a>
                      @else
                      <a href="/annonceDetail/{{$annonces->slug}}"> <img src="../images/Annonce/{{$annonces->photo}}" alt="troc moi"
                      class="icon-shape icon-xl"></a>
                      @endif

                    </td>
                    <td class="align-middle border-top-0">

                      <a href="/annonceDetail/{{$annonces->slug}}" class="fw-semi-bold text-inherit">
                           <div style=" height:20px; width:190px; overflow:hidden;">
                            <h6 class="mb-0  text-truncate">{{$annonces->titre}}</h6>
                               </div>
                       
                      </a>
                      <span><small class="text-muted">{{ date('j M, Y', strtotime($annonces->created_at)) }}</small></span>

                    </td>
                    @foreach($annonces->souscat()->get()  as $souscats)
                    <td class="align-middle border-top-0">
                      <a href="/searchAnnonceSouscat/{{$souscats->slug}}" class="text-inherit"> {{$souscats->libelle}}</a>
                       
                    </td>
                    @endforeach

                    @foreach($annonces->villes()->get()  as  $ville)
                    <td class="align-middle border-top-0">
                              {{$ville->name}}
                    </td>
                    @endforeach
                    
                    @if($annonces->type == "dons")
                    <td class="align-middle border-top-0">
                      <span class="badge bg-danger">{{$annonces->type}}</span>
                      </td>
                      @elseif($annonces->type == "troque")
                    <td class="align-middle border-top-0">
                      <span class="badge bg-info">{{$annonces->type}}</span>
                      </td>
                     @elseif($annonces->type == "Troque ou dons")
                     <td class="align-middle border-top-0">
                     <span class="badge bg-success">{{$annonces->type}}</span>
                     </td>
                     @else
                     <td class="align-middle border-top-0">
                     <span class="badge bg-dark">{{$annonces->type}}</span>
                     </td>
                     @endif
                   
                    
                    <td class="align-middle border-top-0">
                    {{number_format($annonces->prix,0,',',' ')}}  FCFA
                    </td>
                        @if($annonces->type = "troque")
                        <td class="text-muted align-middle border-top-0">
                          <a href="/annonceDetail/{{$annonces->slug}}" class="text-inherit" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="View"><i class="feather-icon icon-eye"></i></a>
                        </td>
                        @elseif($annonces->type == "dons")
                        <td class="text-muted align-middle border-top-0">
                          <a href="/annonceDetaildons/{{$annonces->slug}}" class="text-inherit" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="View"><i class="feather-icon icon-eye"></i></a>
                        </td>
                        @elseif($annonces->type == "Troque ou dons")
                        <td class="text-muted align-middle border-top-0">
                          <a href="/annonceDetail/{{$annonces->slug}}" class="text-inherit" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="View"><i class="feather-icon icon-eye"></i></a>
                        </td>
                        @else
                        <td class="text-muted align-middle border-top-0">
                          <a href="/annonceDetail/{{$annonces->slug}}" class="text-inherit" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="View"><i class="feather-icon icon-eye"></i></a>
                        </td>
                        @endif


                        <td>
                            <a href="/modifyAnnonce/{{$annonces->slug}}"><button type="button" class="btn btn-outline-warning"><i class="feather-icon icon-edit"></i> </button> </a> 
                            </td>
                        <td>
                            <a href="/deleteAnnonce/{{$annonces->slug}}"> <button type="button" class="btn btn-danger"><i class="feather-icon icon-delete"></i> </button> </a> 
                        </td>
                  </tr>
                    @endforeach
                
                    @else
                    <div class="alert alert-info">
                    Oupp's !! Vous n'avez poster aucune annonce de ce type!
                    </div>
                    @endif
                </tbody>
              </table>
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
              class="feather-icon icon-credit-card me-2"></i>Mes dons</a>
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