@extends('layouts.app')


@section('content')
@if ( session('succesEdit'))
<div class="alert alert-success">
    Vos informations ont été modifier avec succes, veuillez rafraichir la page pour voir les modifications
</div>
@endif
<main>
    @if ( session('Nodetails'))
    <div class="alert alert-warning">
        Aucune annonce publiez pour ce type de recherche
    </div>

    @endif
    <section class="">
        <div class="container--xxl">
            <div class="hero-slider ">
                <div
                    style="background: url(assets/images/slideback.jpg)no-repeat; background-size: cover; border-radius: ; background-position: center;">
                    <div class="ps-lg-12 py-lg-10 col-xxl-5 col-md-7 py-5 px-8 text-xs-center">

                        <h2 class="text-dark display-5 fw-bold mt-4 text-white">Bienvenue </br>sur Trock Moi</h2>
                        <p class="lead text-white">Troque tous, rapidement et simplement ici</p>
                        <a href="/publiez" class="btn btn-dark mt-3">Publiez <i
                                class="feather-icon icon-arrow-right ms-1"></i></a>
                    </div>

                </div>
                <div class=" "
                    style="background: url(assets/images/bann.jpg)no-repeat; background-size: cover; border-radius: ; background-position: center;">
                    <div class="ps-lg-12 py-lg-10 col-xxl-5 col-md-7 py-5 px-8 text-xs-center">
                        <h2 class="text-white display-5 fw-bold mt-4">Une plateform <br> simple pour tous </h2>
                        <p class="lead text-white ">Troque tous, rapidement et simplement ici
                        </p>
                        <a href="/publiez" class="btn btn-dark mt-3">publiez <i
                                class="feather-icon icon-arrow-right ms-1"></i></a>
                    </div>

                </div>

            </div>
        </div>

        <!--filter-->
        <div class="container mt-2 rounded-2 py-4 mb-5" style="box-shadow: 5px 1px 30px 2px;">
            <div class="col-12">
                <div class="col-lg-11 justify-content-between align-items-center ">
       
                    <form action="{{ route('FilterAnnonces') }}">
                        <div class="d-flex mt-2 mt-lg-0">
                            <div class="me-2 col-lg-4">
                                    <!-- select option -->
                                    <div class="input-group ">
                                        <input type="text" class="form-control" name="fieldSearch" placeholder="Recherche..." aria-label="Recherche..." aria-describedby="basic-addon1">
                                    </div>
                            </div>

                            <div class="me-2 col-lg-4">
                                <!-- select option -->
                                <select class="form-select" aria-label="Default select example" name="ville_id">
                                    <option value="" selected>ville:</option>
                                    @foreach($ville as $villes)
                                    <option value="{{$villes->id}}" name="ville_id">{{$villes->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="me-2 col-lg-4">
                                <select class="form-select" aria-label="Default select example" name="souscategorie_id">
                                    <option value="" selected>categories:</option>
                                    @foreach($souscat as $souscats)
                                    <option value="{{$souscats->id}}" name="souscategorie_id">{{$souscats->libelle}}
                                    </option>
                                    @endforeach
                                </select>
                            </div>

                            <div>
                                <button type="submit" class="btn btn-warning ms-2 me-1">
                               <i class="bi bi-search"></i>

                                </button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
        </div>
    </section>




    <!-- section category -->
    <section class="my-lg-8 my-1" style="margin-bottom: 0.8rem!important;
     margin-top: 2rem!important;">
        <div class="container-xl ">
            <div class="row ms-1">
                <div class="col-12">
                    <div class="mb-1">
                        <!-- heading    -->
                        <h3 class="mb-0 ms-3">Categories
                            <a href="/viewCategorie" class="h6 float-end text-primary">Plus de categories</a>
                        </h3>
                    </div>
                </div>
                <div class="row ">
                    @foreach($category as $atry => $categorys)

                    <!-- col -->
                    <div class="col-lg-2 col-md-2 col-6 mt-4">
                        <div class="text-center mb-1">

                            <a href="/listAllAnnonceCat/{{$categorys->slug}}"><img
                                    src="../images/Categorie/{{$categorys->photo}}" alt="trock moi images"
                                    class="card-image rounded-4 shadow p-0"></a>

                            <div class="mt-4">
                                <h5 class="fs-6 mb-0"> <a href="/listAllAnnonceCat/{{$categorys->slug}}"
                                        class="text-inherit">{{$categorys->libelle}}</a></h5>
                            </div>

                        </div>


                    </div>

                    @if($atry == 5)


                    @break
                    @endif


                    @endforeach


                </div>

            </div>
        </div>
    </section>





    <!-- <section class="mb-lg-10 mt-lg-14 my-1 mb-5">
      <div class="container">
        <div class="row">
          <div class="col-12 mb-6">

            <h3 class="mb-0">Toutes les Categories</h3>

          </div>
        </div>
        <div class="category-slider" >
          @foreach($category as $categorys)
          <div class="col-lg-1 col-md-2 col-6" >
            <div class="text-center mb-3" >


              <a href="/listAllAnnonceCat/{{$categorys->slug}}"><img src="../images/Categorie/{{$categorys->photo}}" alt="trock moi images"
                  class="card-image rounded-4"></a>

              <div class="mt-4">
                <h5 class="fs-6 mb-0"> <a href="/listAllAnnonceCat/{{$categorys->slug}}" class="text-inherit">{{$categorys->libelle}}</a></h5>
              </div>

            </div>


          </div>
          @endforeach
        </div>
      </div>
    </section> -->



    <!-- <section>
        <div class="container">
            <div class="row">
                @foreach($espace1 as $espaces1)
                <div class="col-12 col-md-6 mb-1 mb-lg-0">
                    <div>
                        <div class="py-10 px-8 rounded-3"
                            style="background:url(../images/EspacePub/{{$espaces1->photo}})no-repeat; background-size: cover; background-position: center;">
                            <div>
                                @if($espaces1->titre == "Publiez une Annonce en un clique")
                                <h3 class="fw-bold mb-3 ">{{$espaces1->titre}}
                                </h3>
                                @else
                                <h3 class="fw-bold mb-3 text-ligth">{{$espaces1->titre}}
                                </h3>
                                @endif

                                @if($espaces1->titre == "Publiez une Annonce en un clique")
                                <a href="/publiez" class="btn btn-dark">Publiez</a>
                                @else
                                <a href="/pricings" class="btn btn-success">Abonnements</a>
                                @endif
                            </div>
                        </div>

                    </div>

                </div>
                @endforeach
                 <div class="col-12 col-md-6 ">

            <div>
              <div class="py-10 px-8 rounded-3"
                style="background:url(assets/images/prioriter.jpg)no-repeat; background-size: cover; background-position: center;">
                <div>
                  <h3 class="fw-bold mb-1 text-white">Deviens Prioritaire
                    
                  </h3>
                  <p class="mb-4 text-white">Abonne toi <span class="fw-bold"></span> ici</p>
                  <a href="/pricings" class="btn btn-success">Abonnements</a>
                </div>
              </div>

            </div>
          </div> 
            </div>
        </div>
    </section> -->

    <section class="mt-6 mb-lg-6 mb-8">
        <!-- container -->
        <div class="container">

            <div class="row mb-3">
                <!-- col -->
                <div class="col-12">
                    <!-- cta -->
                    <div
                        class="bg-light d-lg-flex justify-content-between align-items-center py-2 py-lg-2 px-8  text-center text-lg-start">
                        <!-- img -->
                        <div class="d-lg-flex align-items-center">
                            <div class="ms-lg-4">
                                <h2 class="fs-2 mb-1">Annonces ({{$annonce_sponsoriser->count() + $annonce->count()}})</h2>

                            </div>

                        </div>
                    </div>
                </div>

            </div>

            <!-- row -->
            <div class="row">
                @foreach($annonce_sponsoriser as $annonce_sponsorisers)
                <div class="col-12 col-sm-12 col-xs-12 col-md-6 mt-3" style="padding-right: 1%!important;">
                    <div class="card card-product">
                        <!-- card body -->
                        <div class="card-body shadow p-3"
                            style="padding-top: 0.9%!important;padding-bottom: 0.3%!important;padding-left: 1%!importatnt; border: 0.02em #0dad63 solid; background-color: #fffdde; border-radius: 0.3rem!important;">
                            <div class=" row ">
                                <!-- col -->
                                <div class="col-md-4 col-5 col-sm-6 col-xs-6">
                                    <div class="text-center position-relative ">

                                        <a href="/annonceDetail/{{$annonce_sponsorisers->slug}}"> <img
                                                src="../images/Annonce/{{$annonce_sponsorisers->photo}}" alt="trock moi {{$annonce_sponsorisers->titre}}"
                                                class=" img-fluid" style="height: 6.5rem!important;"></a>
                                    </div>
                                </div>
                                <div class="col-md-8 col-7 col-sm-6  col-xs-6 flex-grow-1 my-auto" align="start">

                                    <h2 class="fs-5 text-truncate" style="max-whidth: 97%;">
                                        <a href="/annonceDetail/{{$annonce_sponsorisers->slug}}"
                                            class="text-inherit text-decoration-none">{{$annonce_sponsorisers->titre}}</a>
                                    </h2>
                                    <span
                                        class="text-muted small">{{$annonce_sponsorisers->created_at->diffForHumans()}}
                                        <i class="bi bi-award float-end text-success fs-2"></i>

                                    </span>

                                   

                                    <div>

                                        <div class="mt-1"><span
                                                class="text-dark bold">{{number_format($annonce_sponsorisers->prix,0,',',' ')}}
                                                FCFA</span>
                                        </div>

                                        <!-- btn -->
                                     <div class="fs-3">

                                     <i class="bi bi-patch-check-fill  fs-6"  style="color: green;"></i> <span class="text-success small fs-6"> certifiée </span> 
                                    
                                            <a href="/annonceDetail/{{$annonce_sponsorisers->slug}}"
                                                class="btn btn-info btn-sm mt-1 float-end d-none d-sm-block  align-items-end">Voir
                                                plus</a>

                                                </div>
                                    
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>





    <section class="my-lg-3 my-2">
        <div class="container">


        <div class="row  row-cols-lg-4 row-cols-2 row-cols-md-3  my-2"  style="padding-right: 0.5%!important; ">
                @foreach($annonce as $annonces)
                <div class="col" style="padding-right: 0.5%!important; margin-top: 1rem;">
                    <div class="card card-product">
                        <div class="card-body" style="padding: 4% 4%; ">

                            <div class="text-center position-relative ">
                                <div class=" position-absolute top-0 start-0">
                                    @if($annonces->type == "troque")
                                    <span class="badge bg-success">{{$annonces->type}}</span>
                                    @elseif($annonces->type == "Troque ou dons")
                                    <span class="badge bg-warning">{{$annonces->type}}</span>
                                    @elseif($annonces->type == "demandez")
                                    <span class="badge bg-danger">{{$annonces->type}}</span>
                                    @else
                                    <span class="badge bg-dark">{{$annonces->type}}</span>
                                    @endif
                                </div>
                                @if($annonces->type == "troque")
                                <a href="/annonceDetail/{{$annonces->slug}}"> <img
                                        src="../images/Annonce/{{$annonces->photo}}" alt="trock moi {{$annonces->titre}}"
                                        class="mb-3 img-fluid"></a>
                                @elseif($annonces->type == "dons")
                                <a href="/annonceDetaildons/{{$annonces->slug}}"> <img
                                        src="../images/Annonce/{{$annonces->photo}}" alt="trock moi {{$annonces->titre}}"
                                        class="mb-3 img-fluid"></a>
                                @elseif($annonces->type == "Troque ou dons")
                                <a href="/annonceDetail/{{$annonces->slug}}"> <img
                                        src="../images/Annonce/{{$annonces->photo}}" alt="trock moi {{$annonces->titre}}"
                                        class="mb-3 img-fluid"></a>
                                @else
                                <a href="/annonceDetail/{{$annonces->slug}}"> <img
                                        src="../images/Annonce/{{$annonces->photo}}" alt="trock moi {{$annonces->titre}}"
                                        class="mb-3 img-fluid"></a>
                                @endif



                            </div>
                            @foreach($annonces->villes()->get() as $ville)
                            <div class="text-small mb-1"><a href="/annonceDetail/{{$annonces->slug}}"
                                    class="text-decoration-none text-muted"><small>{{$ville->libelle}}</small></a></div>
                            @endforeach
                            <div style="height:19px;" class="overflow-hidden justify-content-between">
                                <h2 class="fs-6 "><a href="/annonceDetail/{{$annonces->slug}}"
                                        class="text-inherit text-decoration-none">{{$annonces->titre}}</a></h2>
                            </div>

                            <div>
                                @if( date('j M, Y', strtotime($annonces->created_at)) == $today )
                                <span class="text-muted small">Aujourd'hui</span>
                                @else
                                <span class="text-muted small">{{ $annonces->created_at->diffForHumans() }}</span>
                                @endif
                            </div>
                            <div class="d-flex justify-content-between align-items-center mt-3">
                                <div><span class="text-dark">{{number_format($annonces->prix,0,',',' ')}} FCFA</span>
                                </div>
                            </div>
                            @if($annonces->type == "troque")
                            <div><a href="/annonceDetail/{{$annonces->slug}}"
                                    class="btn btn-outline-primary btn-sm mt-2  align-items-center">
                                    proposez</a></div>
                            @elseif($annonces->type == "dons")
                            <div><a href="/annonceDetaildons/{{$annonces->slug}}"
                                    class="btn btn-outline-warning btn-sm mt-2  align-items-center">
                                    Dons</a></div>
                            @elseif($annonces->type == "Troque ou dons")
                            <div><a href="/annonceDetail/{{$annonces->slug}}"
                                    class="btn btn-outline-info btn-sm mt-2  align-items-center">
                                    proposez</a></div>
                            @else
                            <div><a href="/annonceDetail/{{$annonces->slug}}"
                                    class="btn btn-outline-primary btn-sm mt-2  align-items-center">
                                    proposez</a></div>
                            @endif
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="d-grid mt-4 w-lg-20 w-50 float-center">
                <a href="/get_all_annonce" class="btn btn-primary ">
                    <line x1="12" y1="5" x2="12" y2="19"></line>
                    <line x1="5" y1="12" x2="19" y2="12"></line>
                    </svg> PLUS D'ANNONCES <i class="feather-icon icon-arrow-right ms-1"></i>
                </a>
            </div>
        </div>
    </section>
    <!-- Popular Products End-->


    <!-- section debute -->
    <section class="mt-2">
        <!-- contianer -->
        <div class="container">
            <div class="row">
                <!-- col -->
                <div class="col-12">
                    <!-- cta -->
                    <div
                        class="bg-light d-lg-flex justify-content-between align-items-center py-6 py-lg-3 px-8  text-center text-lg-start">
                        <!-- img -->
                        <div class="d-lg-flex align-items-center">
                          
                            <!-- text -->

                            <div class="ms-lg-4">
                                <h1 class="fs-2 mb-1">Telecharger Trock Moi gratuitement  </h1>

                            </div>

                        </div>
                        <div class="col-md-3 col-12">
                        <div class="row">
                        <div class="mt-3 mt-lg-0 col-lg-6 col-6" >
                            <a href="https://itunes.apple.com/app/idYOUR_APP_ID" target="_blank">
                                <img src="../assets/images/logo/appstore.png" class="w-100 h-100" alt="Télécharger sur l'App Store">
                            </a>
                        </div>
                        <div class="mt-3  mt-lg-0 col-lg-6 col-6" >
                            <a href="https://itunes.apple.com/app/idYOUR_APP_ID" target="_blank">
                                <img src="../assets/images/logo/playstore.png" class="w-100 h-100" alt="Télécharger sur l'App Store">
                            </a>
                        </div>
                        </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </section>
    <!-- section -->
    <section class="mt-4 mb-5">
        <div class="container">
            <!-- row -->
            <div class="row">
                @if($espace2->count() > 0 || isset($espace2))
                @foreach($espace2 as $espaces2)
                @foreach($espaces2->souscategorie()->get() as $souscat_links)
                    <a href="/searchAnnonceSouscat/{{$souscat_links->slug}}" class="col-lg-6 col-md-6 col-12" > 
                <div >
                    <div class="p-8 rounded-3 mb-3 blink-img"
                        style="background:url(../images/EspacePub/{{$espaces2->photo}})no-repeat; background-size: cover; border: 0.04em #cccc solid; box-shadow:  -0.3rem 0.2rem 0.2rem #5c6c75;">
                        <div>


                            <div style="height:93px;" class="overflow-hidden justify-content-between">

                            </div>
                            <div class="mt-2 mb-3 fs-6">
                                <div style="height:25px;" class="overflow-hidden justify-content-between">
                                    <p class="mb-0 text-truncate">

                                    </p>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
                </a>
                @endforeach
                @endforeach
                @endif
            </div>
        </div>
        </div>
    </section>






    <!-- section -->
    <section class="mt-1">
        <!-- container -->
        <div class="container">
            <div class="row">
                <!-- col -->
                <div class="offset-md-1 col-md-10">
                    <div class="mb-11">
                        <!-- heading -->
                        <h2> </h2>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- section -->
    <!-- section -->
    <section class="mb-9">
        <!-- slider -->
        <div class="container">
            <div class="team-slider">
                <!-- item -->
                @foreach($patenaire as $patenaires)
                <div class="item mx-2 bg-white"  style="max-width: 180px!important;">
                    <div class="bg-light rounded-3 bg-white" >
                        <!-- img -->
                        <img src="../images/Partenaire/{{$patenaires->photo}}" alt="trock moi images" class="img-fluid">
                    </div>
                </div>
                @endforeach





            </div>
        </div>
    </section>
</main>



@endsection