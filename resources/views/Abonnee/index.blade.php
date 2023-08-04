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
         
          <div class=" "
            style="background: url(../images/User/{{$user->bannear}})no-repeat; background-size: cover; border-radius: ; background-position: center;">
            <div class="ps-lg-12 py-lg-16 col-xxl-5 col-md-7 py-14 px-8 text-xs-center" >
              <h2 class="text-dark display-5 fw-bold mt-4">{{$user->nom}}<br> {{$user->prenom}} </h2>
              <p class="lead">Troque tous, rapidement et simplement ici
              </p>
            </div>

          </div>

        </div>
      </div>

     
    </section>

 






    <section>
     <div class="container">
          <div class="col-md-12 mb-6">
            <h3 class="mb-0">Annonces de MIENSA </h3>
          </div>
          </div>
     
      
        <!-- section -->
 
<!-- Debut troque -->
@if($annon->count() > 0)
  <div class="container mt-5">
          <div class="row">
            <div class="col-12 ">
              <!-- heading -->
              <div class="bg-light rounded-1 d-flex justify-content-between ps-md-6">
                <div class="d-flex align-items-left mt-1 mb-1">
                <h3 class="mb-0" style="font-family:poppins;">Troque </h3> 
                  
                </div>
                <a href="/troque_abonnee/{{$user->slug}}"  class="float-end me-4 ">voir plus</a>
            </div>
          </div>
      </div>
    <!-- Category Section Start-->
    <section class="mb-lg-8 mt-lg-9  mb-4">
      <div class="container">
        <div class="row">
          <div class="col-10 mb-6">


          </div>
        </div>
        <div class="category-slider ">
          
        @foreach($annon  as $annonces)
          <div class="item" style="width:170px;"> 
            <a href="/annonceDetail/{{$annonces->slug}}" class="text-decoration-none text-inherit">
              <div class="card card-product mb-lg-2">
                <div class="card-body text-center py-1">
                  <img src="../images/Annonce/{{$annonces->photo}}" alt="Troc moi"
                    class="mb-3 img-fluid">
                  <div class="text-truncate">{{$annonces->titre}}</div>
                </div>
              </div>
            </a>
          </div>
          @endforeach

        </div>


      </div>
    </section>
    <!-- Category Section End--> 
  <!-- Fin troque -->
  @endif


  <!-- debut dons -->
 @if($annoncedons->count() > 0)
  <div class="container mt-5">
          <div class="row">
            <div class="col-12 ">
              <!-- heading -->
              <div class="bg-light rounded-1 d-flex justify-content-between ps-md-6">
                <div class="d-flex align-items-left mt-1 mb-1">
                <h3 class="mb-0" style="font-family:poppins;">A Vendre </h3> 
                  
                </div>
                <a href="/dons_abonnee/{{$user->slug}}"  class="float-end me-4 ">voir plus</a>
            </div>
          </div>
      </div>
    <!-- Category Section Start-->
    <section class="mb-lg-8 mt-lg-9  mb-4">
      <div class="container">
        <div class="row">
          <div class="col-10 mb-6">


          </div>
        </div>
        <div class="category-slider ">
          
        @foreach($annoncedons  as $annonces)
          <div class="item" style="width:170px;"> 
            <a href="/annonceDetail/{{$annonces->slug}}" class="text-decoration-none text-inherit">
              <div class="card card-product mb-lg-2">
                <div class="card-body text-center py-1">
                  <img src="../images/Annonce/{{$annonces->photo}}" alt="Troc moi"
                    class="mb-3 img-fluid">
                  <div class="text-truncate">{{$annonces->titre}}</div>
                </div>
              </div>
            </a>
          </div>
          @endforeach

        </div>


      </div>
    </section>
@endif

  <!-- Fin dons -->

  @if($annonceDemandez->count() > 0)
  <!-- Debut TDemandez -->
  <div class="container mt-5">
          <div class="row">
            <div class="col-12 ">
              <!-- heading -->
              <div class="bg-light rounded-1 d-flex justify-content-between ps-md-6">
                <div class="d-flex align-items-left mt-1 mb-1">
                <h3 class="mb-0" style="font-family:poppins;">Articles Rechercher </h3> 
                  
                </div>
                <a href="/recherchez_abonnee/{{$user->slug}}"  class="float-end me-4 ">voir plus</a>
            </div>
          </div>
      </div>
    <!-- Category Section Start-->
    <section class="mb-lg-8 mt-lg-9  mb-4">
      <div class="container">
        <div class="row">
          <div class="col-10 mb-6">


          </div>
        </div>
        <div class="category-slider ">
          
        @foreach($annonceDemandez  as $annonces)
          <div class="item" style="width:170px;"> 
            <a href="/annonceDetail/{{$annonces->slug}}" class="text-decoration-none text-inherit">
              <div class="card card-product mb-lg-2">
                <div class="card-body text-center py-1">
                  <img src="../images/Annonce/{{$annonces->photo}}" alt="Troc moi"
                    class="mb-3 img-fluid">
                  <div class="text-truncate">{{$annonces->titre}}</div>
                </div>
              </div>
            </a>
          </div>
          @endforeach

        </div>


      </div>
    </section>
    @endif
  <!-- Fin TDemandez -->


    </section>
    <!-- Popular Products Start-->
    <section class="my-lg-14 my-8">
      <div class="container">
        <div class="row">
          <div class="col-12 mb-6">

            <h3 class="mb-0">Toutes nos Annonces</h3>

          </div>
        </div>

        <div class="row g-4 row-cols-lg-4 row-cols-2 row-cols-md-3  my-2">
        @foreach($annonce as $annonces)
          <div class="col">
            <div class="card card-product">
              <div class="card-body">

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
                  <a href="/annonceDetail/{{$annonces->slug}}"> <img src="../images/Annonce/{{$annonces->photo}}" alt="troc moi"
                      class="mb-3 img-fluid"></a>
                      @elseif($annonces->type == "dons")
                      <a href="/annonceDetaildonss/{{$annonces->slug}}"> <img src="../images/Annonce/{{$annonces->photo}}" alt="troc moi"
                      class="mb-3 img-fluid"></a>
                      @elseif($annonces->type == "Troque ou dons")
                      <a href="/annonceDetail/{{$annonces->slug}}"> <img src="../images/Annonce/{{$annonces->photo}}" alt="troc moi"
                      class="mb-3 img-fluid"></a>
                      @else
                      <a href="/annonceDetail/{{$annonces->slug}}"> <img src="../images/Annonce/{{$annonces->photo}}" alt="troc moi"
                      class="mb-3 img-fluid"></a>
                      @endif

                 

                </div>
                @foreach($annonces->villes()->get()  as  $ville)
                <div class="text-small mb-1"><a href="/annonceDetail" class="text-decoration-none text-muted"><small>{{$ville->libelle}}</small></a></div>
                @endforeach
                <div style="height:19px;" class="overflow-hidden justify-content-between">
                <h2 class="fs-6 "><a href="./pages/shop-single.html" class="text-inherit text-decoration-none">{{$annonces->titre}}</a></h2>
                </div>
                
                <div>
                      @if( date('j M, Y', strtotime($annonces->created_at))  == $today )
                      <span class="text-muted small">Aujourd'hui</span>
                      @else
                    <span class="text-muted small">{{ date('j M, Y', strtotime($annonces->created_at)) }}</span>
                    @endif
                </div>
                <div class="d-flex justify-content-between align-items-center mt-3">
                  <div><span class="text-dark">{{number_format($annonces->prix,0,',',' ')}} FCFA</span> 
                  </div>
                </div>
                @if($annonces->type == "troque")
                     <div><a href="/annonceDetail/{{$annonces->slug}}" class="btn btn-outline-primary btn-sm mt-2  align-items-center">
                     Afficher</a></div>
                     @elseif($annonces->type == "dons")
                     <div><a href="/annonceDetaildonss/{{$annonces->slug}}" class="btn btn-outline-warning btn-sm mt-2  align-items-center">
                     Achetez</a></div>
                     @elseif($annonces->type == "Troque ou dons")
                     <div><a href="/annonceDetail/{{$annonces->slug}}" class="btn btn-outline-info btn-sm mt-2  align-items-center">
                     Afficher</a></div>
                     @else
                     <div><a href="/annonceDetail/{{$annonces->slug}}" class="btn btn-outline-primary btn-sm mt-2  align-items-center">
                     proposez</a></div>
                     @endif
              </div>
            </div>
          </div>
          @endforeach
        </div>
    
    </section>
    <!-- Popular Products End-->






  </main>



@endsection