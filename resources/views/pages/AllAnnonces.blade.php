@extends('../layouts/app')

@section('meta')

<meta name="keywords"
    content="Annonces Trock Moi , Particulier a particulier , trock moi , Troquez tout , Site de trock en ligne, plateforme de vente et de trock, Troque et recherche d'article,accessoire deuxieme main propre, Articles d'occasion en Cote d'ivoire, plateforme de trock, troque en Cote d'ivoire, meilleur plateforme de trock en cote d'ivoire, Best Platform of Trock in Ivory coast">
<meta name="description"
    content="Toutes les Annonces chez  Trock Moi , vendez gratuitement partout en Côte d’Ivoire sur Trock Moi">
@endsection

@section('content')


@section('styles')
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0- 
     alpha/css/bootstrap.css" rel="stylesheet">
	

	<link rel="stylesheet" type="text/css" 
     href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
	
     <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

@endsection


@section('content')

<main>
  <div class="mt-1 ">
    <div class="container--xxl" >
       <!-- row -->
       <div class="row ">
        <div class="col-12" style="padding-right: 0.3%!important;">
          <!-- heading -->
          <div class="d-flex justify-content-between ps-md-8 ps-6"  style="background: url(../assets/images/banner/grocery-banner.png)no-repeat; background-size: cover; border-radius: ; background-position: center;">
            <div class="d-flex align-items-center">
              <h1 class="mb-0 fw-bold">Toutes Les Annonces</h1>

            </div>
            <div class="py-14">
              <div class="py-6 d-flex me-3">
              
              </div>
          </div>


        </div>
      </div>
    </div>
  </div>
  <!-- section -->
  <section class="mt-4 mb-lg-6 mb-4">
    <div class="container" style="padding-right: 0px!important; margin-right: 4%!important;">
      <!-- row -->
      <div class="row">
        <!-- col -->
        <div class="col-lg-12">
      
         
                    
            <!-- icon -->
            <div class="d-md-flex justify-content-between align-items-center">
            
            <!-- Recherche -->
              <div class="row">
                    <div class="col-12  mt-2">
                    <h6>Recherchez ou filtrez selon la Categorie</h6>
                    <div class="row mt-5">
                      <div class="mb-3 col-12  col-lg-6">
                      
                        <!-- recherche -->
                          <div class="app-search dropdown ">
                                    <form action="{{ route('findSearchAllAnnonces') }}" >
                                    
                                        <div class="input-group">
                                              <input type="search" name= "search" value="{{  request()->search ?? '' }}"  class="form-control dropdown-toggle"  placeholder="Recherche..." id="top-search">
                                            <span class="mdi mdi-magnify search-icon"></span>
                                            
                                    
                                            <button class="input-group-text btn btn-primary" type="submit">Recherche</button>
                                        </div>
                                    </form>
                                  
                                </div>
                      </div>


                        <div class="mb-1 col-12 col-lg-6">
                          <!-- title -->
                          <form action="{{ route('filtreAllAnnonces') }}" >
                           
                            <div class="d-flex  mt-lg-0 ">
                                  <!-- select option -->
                                  <select class="form-select" aria-label="Default select example" name="FiltrerSelon">
                                  <option selected >Categorie: </option>
                                    <option value="prix Le plus bas">Prix Le plus bas</option>
                                    <option value="prix Le plus haut"> Prix Le plus eleve</option>
                                    <option value="Annonces Recentes">date recentes</option>
                                    <option value="Annonces les plus anciens">Annonces les plus anciens</option>
                                  </select>

                                  <button type="submit" class="btn btn-dark ms-3">Filtrer </button>
                                
                                </div>
                                </form>
                        </div>
            
                      </div>
              
                      </div>
                    </div>
                  </div>

             

            </div>
          </div>



          <!-- row -->
          <div class="row">
                @foreach($annonce_sponsoriser as $annonce_sponsorisers)
                <div class="col-12 col-sm-12 col-xs-12 col-md-6 mt-2" >
                    <div class="card card-product">
                        <!-- card body -->
                        <div class="card-body shadow p-3"
                            style="padding-top: 1%!important;padding-bottom: 1%!important;padding-left: 1%!importatnt; border: 0.02em #0dad63 solid; background-color: #fffdde; border-radius: 0.3rem!important;">
                            <div class=" row ">
                                <!-- col -->
                                <div class="col-md-3 col-5 col-sm-6 col-xs-6">
                                    <div class="text-center position-relative ">

                                        <a href="/annonceDetail/{{$annonce_sponsorisers->slug}}"> <img
                                                src="../images/Annonce/{{$annonce_sponsorisers->photo}}" alt="troc moi {{$annonce_sponsorisers->titre}}"
                                                class=" img-fluid" style="height: 6.8rem!important;"></a>
                                    </div>
                                </div>
                                <div class="col-md-9 col-7 col-sm-6  col-xs-6 flex-grow-1 my-auto" align="start">

                                    <h2 class="fs-5 text-truncate" style="max-whidth: 97%;">
                                        <a href="/annonceDetail/{{$annonce_sponsorisers->slug}}"
                                            class="text-inherit text-decoration-none">{{$annonce_sponsorisers->titre}}</a>
                                    </h2>
                                    <span
                                        class="text-muted small">{{$annonce_sponsorisers->created_at->diffForHumans()}}
                                        <i class="bi bi-award float-end text-success fs-1"></i>

                                    </span>

                                   

                                    <div>
                                        <!-- price -->

                                        <div class="mt-1"><span
                                                class="text-dark bold">{{number_format($annonce_sponsorisers->prix,0,',',' ')}}
                                                FCFA</span>
                                        </div>

                                        <!-- btn -->
                                     <div class="fs-3">

                                     <i class="bi bi-patch-check-fill  fs-6"  style="color: green;"></i> <span class="text-success small fs-6"> certifiée </span> 
                                    
                                            <a href="/annonceDetail/{{$annonce_sponsorisers->slug}}"
                                                class="btn btn-info btn-sm mt-3 float-end d-none d-sm-block  align-items-center">Voir
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

            
          
          <div class="row g-4 row-cols-lg-4 row-cols-2 row-cols-md-3  my-2">
            @foreach($annonce as $annonces)
          <div class="col" >
            <div class="card card-product">
              <div class="card-body" style="padding: 4% 4%; ">

                <div class="text-center position-relative ">
                  <div class=" position-absolute top-0 start-0">
                  @if($annonces->type == "troque")
                    <span class="badge bg-success">{{$annonces->type}}</span>
                    @elseif($annonces->type == "Troque ou Vente")
                    <span class="badge bg-warning">{{$annonces->type}}</span>
                    @elseif($annonces->type == "demandez")
                    <span class="badge bg-danger">{{$annonces->type}}</span>
                      @else
                      <span class="badge bg-dark">{{$annonces->type}}</span>
                      @endif
                  </div>
                  @if($annonces->type == "troque")
                  <a href="/annonceDetail/{{$annonces->slug}}"> <img src="../images/Annonce/{{$annonces->photo}}" alt="troc moi {{$annonces->titre}}"
                      class="mb-3 img-fluid"></a>
                      @elseif($annonces->type == "vente")
                      <a href="/annonceDetailVentes/{{$annonces->slug}}"> <img src="../images/Annonce/{{$annonces->photo}}" alt="troc moi {{$annonces->titre}}"
                      class="mb-3 img-fluid"></a>
                      @elseif($annonces->type == "Troque ou Vente")
                      <a href="/annonceDetail/{{$annonces->slug}}"> <img src="../images/Annonce/{{$annonces->photo}}" alt="troc moi {{$annonces->titre}}"
                      class="mb-3 img-fluid"></a>
                      @else
                      <a href="/annonceDetail/{{$annonces->slug}}"> <img src="../images/Annonce/{{$annonces->photo}}" alt="troc moi {{$annonces->titre}}"
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
                     Proposez</a></div>
                     @elseif($annonces->type == "vente")
                     <div><a href="/annonceDetailVentes/{{$annonces->slug}}" class="btn btn-outline-warning btn-sm mt-2  align-items-center">
                     Dons</a></div>
                     @elseif($annonces->type == "Troque ou Vente")
                     <div><a href="/annonceDetail/{{$annonces->slug}}" class="btn btn-outline-info btn-sm mt-2  align-items-center">
                     Proposez</a></div>
                     @else
                     <div><a href="/annonceDetail/{{$annonces->slug}}" class="btn btn-outline-primary btn-sm mt-2  align-items-center">
                     proposez</a></div>
                     @endif
              </div>
            </div>
          </div>
          @endforeach
        </div>
          <!-- row -->
          <div class="row mt-8">
            <div class="col">
              <!-- nav -->
              <nav>
                <ul class="pagination">
                  {{$annonce->links()}}
                </ul>
              </nav>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

</main>

@endsection


@section('scripts')



<script>



  </script>

@endsection