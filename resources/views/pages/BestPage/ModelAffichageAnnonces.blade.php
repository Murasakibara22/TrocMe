@extends('../layouts/app')


@section('content')

<main>







    <section class="py-lg-6 py-6"
        style="background: url(../assets/images/banner/banner-4.jpg)no-repeat; background-position: center; background-size: cover;">
        <div class="container">
            <!-- row -->

            <div class="col-xl-12  col-lg-7 col-md-7 col-xs-6">
                <!--filter-->
                <div class="container mt-2 rounded-2 py-5 mb-7"
                    style="background-color: #fff; box-shadow: 5px 1px 30px 2px black;">
                    <div class="col-12">
                        <div class="d-lg-flex justify-content-between align-items-center">
                            <div class="mb-2 mx-auto">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-map-pin text-danger">
                                    <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                                    <circle cx="12" cy="10" r="3"></circle>
                                </svg>
                                <h1 class="mt-1 mb-0 h4">Trouver des annonces particuliere</h1>
                            </div>
                            <!-- icon -->

                            <form action="{{ route('FilterAnnonces') }}">
                                <div class="d-flex mt-2 mt-lg-0">
                                    <div class="me-2 flex-grow-2">
                                        <!-- select option -->
                                        <select class="form-select" aria-label="Default select example" name="ville_id">
                                            <option value="" selected>ville:</option>
                                            @foreach($ville as $villes)
                                            <option value="{{$villes->id}}" name="ville_id">{{$villes->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="me-2 flex-grow-2">
                                        <select class="form-select" aria-label="Default select example"
                                            name="souscategorie_id">
                                            <option value="" selected>categories:</option>
                                            @foreach($souscat as $souscats)
                                            <option value="{{$souscats->id}}" name="souscategorie_id">
                                                {{$souscats->libelle}}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div>
                                        <!-- select option -->
                                        <select class="form-select" aria-label="Default select example"
                                            name="TrouveSelon">
                                            <option selected value="">Trier Par: </option>
                                            <option value="prix Le plus bas">prix Le plus bas</option>
                                            <option value="prix Le plus haut"> prix Le plus haut</option>
                                            <option value="Annonces Recentes">Annonces Recentes</option>
                                            <option value="Annonces les plus anciens"> Annonces les plus anciens
                                            </option>
                                        </select>
                                    </div>

                                    <div>
                                        <button type="submit" class="btn btn-outline-warning ms-2 me-1">
                                            <img src="../assets/images/filter.gif" width="23" height="23"
                                                viewBox="40 40 40 40" alt="">

                                        </button>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>


                <div class="mt-1">
                    <small class="text-white"> Bonjour, Connectez-vous pour la meilleure expérience. Nouveau sur
                        Trockmoi ? <a href="#" class="text-white">inscrivez-vous</a></small>
                </div>
            </div>

        </div>
    </section>










    <!-- section -->
    <div class="mt-4 mb-lg-6 mb-6">
        <!-- container -->
        <div class="container" style="padding-left: 0.1%!important; padding-right: 0.1%!important;">
            <div class="row gx-10">



                <section class="col-lg-9 col-md-12" style="padding-right: 0%;">
                    <!-- card -->
                    <div class="card mb-3 bg-light border-0">
                        <!-- card body -->
                        <div class="card-body p-4">
                            <h2 class="mb-0 fs-3">Toutes les annonces</h2>
                        </div>
                    </div>
                    <!-- text -->
                    <div class="d-lg-flex justify-content-between align-items-center">
                        <div class="mb-3 mb-lg-0">
                            <p class="mb-0"> <span class="text-dark"> {{ $annonce_sponsoriser->count()}} </span>
                                Annonces </p>
                        </div>

                        <!-- icon -->
                        <div class="d-md-flex justify-content-between align-items-center">
                            <div class="d-flex align-items-center justify-content-between">
                                <div>

                                    <a href="/get_all_annonce" class="me-3"><i class="bi bi-list-ul"></i></a>

                                    <a href="{{url('form_affichage?model_affiche_annonces=column')}}" class="{{ Request::is('/form_affichage?model_affiche_annonces=column') ? 'active': ''}} me-3 "><i class="bi bi-grid"></i></a>
                                    <a href="{{url('form_affichage?model_affiche_annonces=grid')}}" class="{{ Request::is('/form_affichage?model_affiche_annonces=grid') ? 'active': ''}} me-3 "><i
                                            class="bi bi-grid-3x3-gap"></i></a>
                                </div>
                                <div class="ms-2 d-lg-none">
                                    <a class="btn btn-outline-gray-400 text-muted" data-bs-toggle="offcanvas"
                                        href="#offcanvasCategory" role="button" aria-controls="offcanvasCategory"><svg
                                            xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="feather feather-filter me-2">
                                            <polygon points="22 3 2 3 10 12.46 10 19 14 21 14 12.46 22 3"></polygon>
                                        </svg> Filtrer</a>
                                </div>
                            </div>

                            <div class="d-flex mt-2 mt-lg-0">

                            <div>
                            <!-- select option -->
                                    <a href="">
                                    <button class="btn {{  Request::is('form_affichage') ? 'btn-primary': ''}}">
                                                Toutes
                                    </button>
                                    </a>
                            </div>

                            <div class="ms-1">
                            <!-- select option -->
                                    <button id="particuliar" class="btn btn-outline-secondary ">
                                            Particuliers
                                    </button>                    
                            </div>


                            <div class="ms-1 flex-grow-1"  >
                            <!-- select option -->
                                        <button id="professionnalisme" class="btn btn-outline-secondary " style="background-color: #fffdde;"> 
                                                    Entreprises
                                            </button>
                            </div>

                            </div>

                        </div>
                    </div>
                    <!-- row -->
                    <div class="row  row-cols-1 ">

                    <div id="professionnal-results">
                        <!-- Annonces Sponsoriser -->
                        @if( $donnees == "column" )
                        <div class="row  row-cols-lg-3 row-cols-2 row-cols-md-3  my-1" style="padding-right: 0.5%!important; ">
                            @foreach($annonce_sponsoriser as $annonce_sponsorisers)
                            <div class="col"  style="padding-right: 0.5%!important; margin-top: 1rem;">
                                <div class="card card-product"
                                    style="padding-top: none; border: 0.02em #0dad63 solid; background-color: #fffdde; border-radius: 0.3rem!important;">
                                    <div class="card-body" style="padding: 4% 4%; ">

                                        <div class="text-center position-relative ">
                                            <div class=" position-absolute top-0 start-0">
                                                @if($annonce_sponsorisers->type == "troque")
                                                <span class="badge bg-success">{{$annonce_sponsorisers->type}}</span>
                                                @elseif($annonce_sponsorisers->type == "Troque ou dons")
                                                <span class="badge bg-warning">{{$annonce_sponsorisers->type}}</span>
                                                @elseif($annonce_sponsorisers->type == "demandez")
                                                <span class="badge bg-danger">{{$annonce_sponsorisers->type}}</span>
                                                @else
                                                <span class="badge bg-dark">{{$annonce_sponsorisers->type}}</span>
                                                @endif
                                            </div>
                                            @if($annonce_sponsorisers->type == "troque")
                                            <a href="/annonceDetail/{{$annonce_sponsorisers->slug}}"> <img
                                                    src="../images/Annonce/{{$annonce_sponsorisers->photo}}"
                                                    alt="troc moi" class="mb-3 img-fluid"></a>
                                            @elseif($annonce_sponsorisers->type == "dons")
                                            <a href="/annonceDetaildons/{{$annonce_sponsorisers->slug}}"> <img
                                                    src="../images/Annonce/{{$annonce_sponsorisers->photo}}"
                                                    alt="troc moi" class="mb-3 img-fluid"></a>
                                            @elseif($annonce_sponsorisers->type == "Troque ou dons")
                                            <a href="/annonceDetail/{{$annonce_sponsorisers->slug}}"> <img
                                                    src="../images/Annonce/{{$annonce_sponsorisers->photo}}"
                                                    alt="troc moi" class="mb-3 img-fluid"></a>
                                            @else
                                            <a href="/annonceDetail/{{$annonce_sponsorisers->slug}}"> <img
                                                    src="../images/Annonce/{{$annonce_sponsorisers->photo}}"
                                                    alt="troc moi" class="mb-3 img-fluid"></a>
                                            @endif



                                        </div>
                                        @foreach($annonce_sponsorisers->villes()->get() as $ville)
                                        <div class="text-small mb-1"><a
                                                href="/annonceDetail/{{$annonce_sponsorisers->slug}}"
                                                class="text-decoration-none text-muted"><small>{{$ville->libelle}}</small></a>
                                        </div>
                                        @endforeach
                                        <div style="height:19px;" class="overflow-hidden justify-content-between">
                                            <h2 class="fs-6 "><a href="/annonceDetail/{{$annonce_sponsorisers->slug}}"
                                                    class="text-inherit text-decoration-none">{{$annonce_sponsorisers->titre}}</a>
                                            </h2>
                                        </div>

                                        <div>

                                            <span
                                                class="text-muted small">{{ $annonce_sponsorisers->created_at->diffForHumans() }}</span>
                                            <i class="bi bi-award float-end text-success fs-2"></i>


                                        </div>
                                        <div class="d-flex justify-content-between align-items-center mt-3">
                                            <div><span
                                                    class="text-dark">{{number_format($annonce_sponsorisers->prix,0,',',' ')}}
                                                    FCFA</span>
                                            </div>
                                        </div>
                                        <i class="bi bi-patch-check-fill fs-6"  style="color: green;"><span class="text-success small fs-6"> certifiée </span></i>

                                        @if($annonce_sponsorisers->type == "troque")
                                        <div><a href="/annonceDetail/{{$annonce_sponsorisers->slug}}"
                                                class="btn btn-outline-primary btn-sm mt-2  align-items-center">
                                                Afficher</a></div>
                                        @elseif($annonce_sponsorisers->type == "dons")
                                        <div><a href="/annonceDetaildons/{{$annonce_sponsorisers->slug}}"
                                                class="btn btn-outline-warning btn-sm mt-2  align-items-center">
                                                Achetez</a></div>
                                        @elseif($annonce_sponsorisers->type == "Troque ou dons")
                                        <div><a href="/annonceDetail/{{$annonce_sponsorisers->slug}}"
                                                class="btn btn-outline-info btn-sm mt-2  align-items-center">
                                                Afficher</a></div>
                                        @else
                                        <div><a href="/annonceDetail/{{$annonce_sponsorisers->slug}}"
                                                class="btn btn-outline-primary btn-sm mt-2  align-items-center">
                                                proposez</a></div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            @endforeach



                            <!-- Annonces Simple -->

                            @foreach($annonce_simple as $annonce_simples)
                            <div class="col" style="padding-right: 0.5%!important; margin-top: 1rem;">
                                <div class="card card-product">
                                    <div class="card-body" style="padding: 4% 4%; ">

                                        <div class="text-center position-relative ">
                                            <div class=" position-absolute top-0 start-0">
                                                @if($annonce_simples->type == "troque")
                                                <span class="badge bg-success">{{$annonce_simples->type}}</span>
                                                @elseif($annonce_simples->type == "Troque ou dons")
                                                <span class="badge bg-warning">{{$annonce_simples->type}}</span>
                                                @elseif($annonce_simples->type == "demandez")
                                                <span class="badge bg-danger">{{$annonce_simples->type}}</span>
                                                @else
                                                <span class="badge bg-dark">{{$annonce_simples->type}}</span>
                                                @endif
                                            </div>
                                            @if($annonce_simples->type == "troque")
                                            <a href="/annonceDetail/{{$annonce_simples->slug}}"> <img
                                                    src="../images/Annonce/{{$annonce_simples->photo}}" alt="troc moi"
                                                    class="mb-3 img-fluid"></a>
                                            @elseif($annonce_simples->type == "dons")
                                            <a href="/annonceDetaildons/{{$annonce_simples->slug}}"> <img
                                                    src="../images/Annonce/{{$annonce_simples->photo}}" alt="troc moi"
                                                    class="mb-3 img-fluid"></a>
                                            @elseif($annonce_simples->type == "Troque ou dons")
                                            <a href="/annonceDetail/{{$annonce_simples->slug}}"> <img
                                                    src="../images/Annonce/{{$annonce_simples->photo}}" alt="troc moi"
                                                    class="mb-3 img-fluid"></a>
                                            @else
                                            <a href="/annonceDetail/{{$annonce_simples->slug}}"> <img
                                                    src="../images/Annonce/{{$annonce_simples->photo}}" alt="troc moi"
                                                    class="mb-3 img-fluid"></a>
                                            @endif



                                        </div>
                                        @foreach($annonce_simples->villes()->get() as $ville)
                                        <div class="text-small mb-1"><a href="/annonceDetail/{{$annonce_simples->slug}}"
                                                class="text-decoration-none text-muted"><small>{{$ville->libelle}}</small></a>
                                        </div>
                                        @endforeach
                                        <div style="height:19px;" class="overflow-hidden justify-content-between">
                                            <h2 class="fs-6 "><a href="/annonceDetail/{{$annonce_simples->slug}}"
                                                    class="text-inherit text-decoration-none">{{$annonce_simples->titre}}</a>
                                            </h2>
                                        </div>

                                        <div>

                                            <span
                                                class="text-muted small">{{ $annonce_simples->created_at->diffForHumans() }}</span>


                                        </div>
                                        <div class="d-flex justify-content-between align-items-center mt-3">
                                            <div><span
                                                    class="text-dark">{{number_format($annonce_simples->prix,0,',',' ')}}
                                                    FCFA</span>
                                            </div>
                                        </div>
                                        @if($annonce_simples->type == "troque")
                                        <div><a href="/annonceDetail/{{$annonce_simples->slug}}"
                                                class="btn btn-outline-primary btn-sm mt-2  align-items-center">
                                                Afficher</a></div>
                                        @elseif($annonce_simples->type == "dons")
                                        <div><a href="/annonceDetaildons/{{$annonce_simples->slug}}"
                                                class="btn btn-outline-warning btn-sm mt-2  align-items-center">
                                                Achetez</a></div>
                                        @elseif($annonce_simples->type == "Troque ou dons")
                                        <div><a href="/annonceDetail/{{$annonce_simples->slug}}"
                                                class="btn btn-outline-info btn-sm mt-2  align-items-center">
                                                Afficher</a></div>
                                        @else
                                        <div><a href="/annonceDetail/{{$annonce_simples->slug}}"
                                                class="btn btn-outline-primary btn-sm mt-2  align-items-center">
                                                proposez</a></div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            @endforeach


                        </div>


                        @elseif($donnees == "grid")
                        <div class="row  row-cols-lg-4 row-cols-2 row-cols-md-3  " style="padding-right: 0.5%!important; ">
                            @foreach($annonce_sponsoriser as $annonce_sponsorisers)
                            <div class="col"  style="padding-right: 0.5%!important; margin-top: 1rem;">
                                <div class="card card-product"
                                    style="padding-top: none; border: 0.02em #0dad63 solid; background-color: #fffdde; border-radius: 0.3rem!important;">
                                    <div class="card-body" style="padding: 4% 4%; "> 

                                        <div class="text-center position-relative ">
                                            <div class=" position-absolute top-0 start-0">
                                                @if($annonce_sponsorisers->type == "troque")
                                                <span class="badge bg-success">{{$annonce_sponsorisers->type}}</span>
                                                @elseif($annonce_sponsorisers->type == "Troque ou dons")
                                                <span class="badge bg-warning">{{$annonce_sponsorisers->type}}</span>
                                                @elseif($annonce_sponsorisers->type == "demandez")
                                                <span class="badge bg-danger">{{$annonce_sponsorisers->type}}</span>
                                                @else
                                                <span class="badge bg-dark">{{$annonce_sponsorisers->type}}</span>
                                                @endif
                                            </div>
                                            @if($annonce_sponsorisers->type == "troque")
                                            <a href="/annonceDetail/{{$annonce_sponsorisers->slug}}"> <img
                                                    src="../images/Annonce/{{$annonce_sponsorisers->photo}}"
                                                    alt="troc moi" class="mb-3 img-fluid"></a>
                                            @elseif($annonce_sponsorisers->type == "dons")
                                            <a href="/annonceDetaildons/{{$annonce_sponsorisers->slug}}"> <img
                                                    src="../images/Annonce/{{$annonce_sponsorisers->photo}}"
                                                    alt="troc moi" class="mb-3 img-fluid"></a>
                                            @elseif($annonce_sponsorisers->type == "Troque ou dons")
                                            <a href="/annonceDetail/{{$annonce_sponsorisers->slug}}"> <img
                                                    src="../images/Annonce/{{$annonce_sponsorisers->photo}}"
                                                    alt="troc moi" class="mb-3 img-fluid"></a>
                                            @else
                                            <a href="/annonceDetail/{{$annonce_sponsorisers->slug}}"> <img
                                                    src="../images/Annonce/{{$annonce_sponsorisers->photo}}"
                                                    alt="troc moi" class="mb-3 img-fluid"></a>
                                            @endif



                                        </div>
                                        @foreach($annonce_sponsorisers->villes()->get() as $ville)
                                        <div class="text-small mb-1"><a
                                                href="/annonceDetail/{{$annonce_sponsorisers->slug}}"
                                                class="text-decoration-none text-muted"><small>{{$ville->libelle}}</small></a>
                                        </div>
                                        @endforeach
                                        <div style="height:19px;" class="overflow-hidden justify-content-between">
                                            <h2 class="fs-6 "><a href="/annonceDetail/{{$annonce_sponsorisers->slug}}"
                                                    class="text-inherit text-decoration-none">{{$annonce_sponsorisers->titre}}</a>
                                            </h2>
                                        </div>

                                        <div>

                                            <span
                                                class="text-muted small">{{ $annonce_sponsorisers->created_at->diffForHumans() }}</span>
                                            <i class="bi bi-award float-end text-success fs-2"></i>


                                        </div>
                                        <div class="d-flex justify-content-between align-items-center mt-3">
                                            <div><span
                                                    class="text-dark">{{number_format($annonce_sponsorisers->prix,0,',',' ')}}
                                                    FCFA</span>
                                            </div>
                                        </div>

                                        <i class="bi bi-patch-check-fill fs-6"  style="color: green;"><span class="text-success small fs-6"> certifiée </span></i>
                                        @if($annonce_sponsorisers->type == "troque")
                                        <div><a href="/annonceDetail/{{$annonce_sponsorisers->slug}}"
                                                class="btn btn-outline-primary btn-sm mt-2  align-items-center">
                                                Afficher</a></div>
                                        @elseif($annonce_sponsorisers->type == "dons")
                                        <div><a href="/annonceDetaildons/{{$annonce_sponsorisers->slug}}"
                                                class="btn btn-outline-warning btn-sm mt-2  align-items-center">
                                                Achetez</a></div>
                                        @elseif($annonce_sponsorisers->type == "Troque ou dons")
                                        <div><a href="/annonceDetail/{{$annonce_sponsorisers->slug}}"
                                                class="btn btn-outline-info btn-sm mt-2  align-items-center">
                                                Afficher</a></div>
                                        @else
                                        <div><a href="/annonceDetail/{{$annonce_sponsorisers->slug}}"
                                                class="btn btn-outline-primary btn-sm mt-2  align-items-center">
                                                proposez</a></div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            @endforeach



                            <!-- Annonces Simple -->

                            @foreach($annonce_simple as $annonce_simples)
                            <div class="col" style="padding-right: 0.5%!important; margin-top: 1rem;">
                                <div class="card card-product">
                                    <div class="card-body" style="padding: 4% 4%; ">

                                        <div class="text-center position-relative ">
                                            <div class=" position-absolute top-0 start-0">
                                                @if($annonce_simples->type == "troque")
                                                <span class="badge bg-success">{{$annonce_simples->type}}</span>
                                                @elseif($annonce_simples->type == "Troque ou dons")
                                                <span class="badge bg-warning">{{$annonce_simples->type}}</span>
                                                @elseif($annonce_simples->type == "demandez")
                                                <span class="badge bg-danger">{{$annonce_simples->type}}</span>
                                                @else
                                                <span class="badge bg-dark">{{$annonce_simples->type}}</span>
                                                @endif
                                            </div>
                                            @if($annonce_simples->type == "troque")
                                            <a href="/annonceDetail/{{$annonce_simples->slug}}"> <img
                                                    src="../images/Annonce/{{$annonce_simples->photo}}" alt="troc moi"
                                                    class="mb-3 img-fluid"></a>
                                            @elseif($annonce_simples->type == "dons")
                                            <a href="/annonceDetaildons/{{$annonce_simples->slug}}"> <img
                                                    src="../images/Annonce/{{$annonce_simples->photo}}" alt="troc moi"
                                                    class="mb-3 img-fluid"></a>
                                            @elseif($annonce_simples->type == "Troque ou dons")
                                            <a href="/annonceDetail/{{$annonce_simples->slug}}"> <img
                                                    src="../images/Annonce/{{$annonce_simples->photo}}" alt="troc moi"
                                                    class="mb-3 img-fluid"></a>
                                            @else
                                            <a href="/annonceDetail/{{$annonce_simples->slug}}"> <img
                                                    src="../images/Annonce/{{$annonce_simples->photo}}" alt="troc moi"
                                                    class="mb-3 img-fluid"></a>
                                            @endif



                                        </div>
                                        @foreach($annonce_simples->villes()->get() as $ville)
                                        <div class="text-small mb-1"><a href="/annonceDetail/{{$annonce_simples->slug}}"
                                                class="text-decoration-none text-muted"><small>{{$ville->libelle}}</small></a>
                                        </div>
                                        @endforeach
                                        <div style="height:19px;" class="overflow-hidden justify-content-between">
                                            <h2 class="fs-6 "><a href="/annonceDetail/{{$annonce_simples->slug}}"
                                                    class="text-inherit text-decoration-none">{{$annonce_simples->titre}}</a>
                                            </h2>
                                        </div>

                                        <div>

                                            <span
                                                class="text-muted small">{{ $annonce_simples->created_at->diffForHumans() }}</span>


                                        </div>
                                        <div class="d-flex justify-content-between align-items-center mt-3">
                                            <div><span
                                                    class="text-dark">{{number_format($annonce_simples->prix,0,',',' ')}}
                                                    FCFA</span>
                                            </div>
                                        </div>
                                        @if($annonce_simples->type == "troque")
                                        <div><a href="/annonceDetail/{{$annonce_simples->slug}}"
                                                class="btn btn-outline-primary btn-sm mt-2  align-items-center">
                                                Afficher</a></div>
                                        @elseif($annonce_simples->type == "dons")
                                        <div><a href="/annonceDetaildons/{{$annonce_simples->slug}}"
                                                class="btn btn-outline-warning btn-sm mt-2  align-items-center">
                                                Achetez</a></div>
                                        @elseif($annonce_simples->type == "Troque ou dons")
                                        <div><a href="/annonceDetail/{{$annonce_simples->slug}}"
                                                class="btn btn-outline-info btn-sm mt-2  align-items-center">
                                                Afficher</a></div>
                                        @else
                                        <div><a href="/annonceDetail/{{$annonce_simples->slug}}"
                                                class="btn btn-outline-primary btn-sm mt-2  align-items-center">
                                                proposez</a></div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            @endforeach


                        </div>

                        @endif



                    </div>
                    </div>
                    

                    <!-- row -->
                    <div class="row mt-8 mx-auto">
                        <div class="col">
                            <!-- nav -->
                            <nav>
                                <ul class="pagination">
                                    {{$annonce_simple->links()}}
                                </ul>
                            </nav>
                        </div>
                    </div>
                </section>

                <!-- col -->
                <aside class="col-lg-3 col-md-4 mb-6 mb-md-0">
                    <div class="offcanvas offcanvas-start offcanvas-collapse w-md-50 " tabindex="-1"
                        id="offcanvasCategory" aria-labelledby="offcanvasCategoryLabel">

                        <div class="offcanvas-header d-lg-none">
                            <h5 class="offcanvas-title" id="offcanvasCategoryLabel">Filter</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="offcanvas"
                                aria-label="Close"></button>
                        </div>
                        <div class="offcanvas-body ps-lg-2 pt-lg-0">
                            <div class="mb-8">
                                <!-- title -->
                                <h5 class="mb-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" class="feather feather-layers text-primary">
                                        <polygon points="12 2 2 7 12 12 22 7 12 2"></polygon>
                                        <polyline points="2 17 12 22 22 17"></polyline>
                                        <polyline points="2 12 12 17 22 12"></polyline>
                                    </svg>

                                    Categories
                                </h5>
                                <!-- nav -->
                                <ul class="nav nav-category">

                                    <!-- nav item -->
                                    @foreach($categorie as $categories)
                                    <li class="nav-item border-bottom w-100 "><a
                                            href="/searchAnnonceSouscat/{{$categories->slug}}"
                                            class="nav-link">{{$categories->libelle}}
                                        </a>
                                    </li>
                                    @endforeach

                                </ul>
                            </div>

                            <div class="mb-8">

                                <h5 class="mb-3">Annonces</h5>
                                <div class="mb-4">
                                    <!-- select option -->
                                    <select class="form-select">
                                        <option selected>Pertinence</option>
                                        <a href="">
                                            <option value="">date: Les plus anciennes</option>
                                        </a>
                                        <a href="">
                                            <option value="">date: les plus recentes</option>
                                        </a>
                                        <a href="">
                                            <option value="">Prix: les plus Haut</option>
                                        </a>
                                        <a href="">
                                            <option value="">Prix: les plus Bas</option>
                                        </a>
                                    </select>
                                </div>
                                <!-- form check -->
                                <div class="form-check mb-2">
                                    <!-- input -->
                                    <input class="form-check-input" type="checkbox" value="" id="eGrocery" checked>
                                    <label class="form-check-label" for="eGrocery">
                                        Trock
                                    </label>
                                </div>
                                <!-- form check -->
                                <div class="form-check mb-2">
                                    <!-- input -->
                                    <input class="form-check-input" type="checkbox" value="" id="DealShare">
                                    <label class="form-check-label" for="DealShare">
                                        dons
                                    </label>
                                </div>
                                <!-- form check -->
                                <div class="form-check mb-2">
                                    <!-- input -->
                                    <input class="form-check-input" type="checkbox" value="" id="Dmart">
                                    <label class="form-check-label" for="Dmart">
                                        Demande
                                    </label>
                                </div>
                                <!-- form check -->
                                <div class="form-check mb-2">
                                    <!-- input -->
                                    <input class="form-check-input" type="checkbox" value="" id="Blinkit">
                                    <label class="form-check-label" for="Blinkit">
                                        Premium
                                    </label>
                                </div>
                                <!-- form check -->
                                <div class="form-check mb-2">
                                    <!-- input -->
                                    <input class="form-check-input" type="checkbox" value="" id="BigBasket">
                                    <label class="form-check-label" for="BigBasket">
                                        VIP
                                    </label>
                                </div>
                                <!-- form check -->
                                <div class="form-check mb-2">
                                    <!-- input -->
                                    <input class="form-check-input" type="checkbox" value="" id="StoreFront">
                                    <label class="form-check-label" for="StoreFront">
                                        Paarticuliere
                                    </label>
                                </div>
                                <!-- form check -->
                                <div class="form-check mb-2">
                                    <!-- input -->
                                    <input class="form-check-input" type="checkbox" value="" id="Spencers">
                                    <label class="form-check-label" for="Spencers">
                                        Les plus vues
                                    </label>
                                </div>
                                <!-- form check -->
                                <div class="form-check mb-2">
                                    <!-- input -->
                                    <input class="form-check-input" type="checkbox" value="" id="onlineGrocery">
                                    <label class="form-check-label" for="onlineGrocery">
                                        Toutes
                                    </label>
                                </div>

                            </div>
                            <div class="mb-8">
                                <!-- price -->
                                <h5 class="mb-3">Prix</h5>

                                <div>
                                    <!-- range -->
                                    <div id="priceRange" class="mb-3"></div>
                                    <small class="text-muted">Prix:</small>
                                </div>



                            </div>

                            <div class="mb-8 position-relative">
                                <!-- Banner Design -->
                                <!-- Banner Content -->
                                <div class="position-absolute p-5 py-8">
                                    <h3 class="mb-0">Passez en mode PRO </h3>
                                    <p>avec 25% de reduction</p>
                                    <a href="/pricings" class="btn btn-dark">compte pro<i
                                            class="feather-icon icon-arrow-right ms-1"></i></a>
                                </div>
                                <!-- Banner Content -->
                                <!-- Banner Image -->
                                <!-- img --><img src="../assets/images/banner/assortment-citrus-fruits.png" alt=""
                                    class="img-fluid rounded ">
                                <!-- Banner Image -->
                            </div>


                        </div>
                </aside>


            </div>
        </div>
    </div>
</main>


@endsection


@section('scripts')
<script>
$(document).on('submit', '#filtre-form', function(e) {
    e.preventDefault();

    $.ajax({
        url: '/filter_price',
        type: 'GET',
        data: $('#filtre-form').serialize(),
        dataType: 'json',
    }).done(function(data) {
        // Affichage des résultats dans la div
        var html = '';
        $.each(data, function(index, value) {
            html += '<p>' + value.titre + ' - ' + value.prix + '</p>';
        });
        $('#resultats').html(html);
    });
});
</script>


<script>
    $(document).ready(function() {
    $('#professionnalisme').on('click', function() {

        $.ajax({
            url: '/professional-page-get_all_annonce',
            success: function(response) {
                var results = $('#professionnal-results');

                results.html(response)
            }
        });
    });
});
</script>


<script>
    $(document).ready(function(){
        $('#particuliar').on('click',function(){

            $.ajax({
                url:'/particulier-page-get_all_annonce',
                success: function(response){
                    var results = $('#professionnal-results');

                    results.html(response)
                }
            });
        });
    });
</script>


@endsection