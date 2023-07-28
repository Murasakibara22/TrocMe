@extends('../layouts/app')


@section('meta')

<meta name="keywords"
    content="{{$category->libelle}} IC DIGITAL , Particulier a particulier , trock moi , Troquez tout , Site de trock en ligne, plateforme de vente et de trock, Troque et recherche d'article,accessoire deuxieme main propre, Articles d'occasion en Cote d'ivoire, plateforme de trock, troque en Cote d'ivoire, meilleur plateforme de trock en cote d'ivoire, Best Platform of Trock in Ivory coast">
<meta name="description"
    content="IC DIGITAL {{$category->libelle}} vendez gratuitement partout en Côte d’Ivoire sur Trock Moi">
@endsection

@section('content')

@section('content')

<main>
  
  <!-- section -->
  <section class="mt-2 mb-lg-6 mb-4" >
    <div class="container--xxl">
       <!-- row -->
       <div class="row ">
        <div class="col-12" style="padding-right: 0.1%!important;">
          <!-- heading -->
          <div class="d-flex justify-content-between ps-md-8 ps-6"  style="background: url(../images/Categorie/img/{{$category->image_illustrant}})no-repeat; background-size: cover; border-radius: ; background-position: center;">
            <div class="d-flex align-items-center">
              <h1 class="mb-0 fw-bold text-white" style="font-family:poppins;">{{$category->libelle}}</h1>

            </div>
            <div class="py-14">
              <div class="py-10 d-flex me-3">
              
              </div>
          </div>
        </div>
      </div>
  </div>
          

  <div class="mt-2 ">
    <div class="container">
      <!-- row -->
      <div class="row ">
        <!-- col -->
        <div class="col-12">
          <!-- breadcrumb -->
          
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
              <li class="breadcrumb-item"><a href="/">Accueil</a></li>
              <li class="breadcrumb-item active" aria-current="page">{{$category->libelle}}</li>
            </ol>
          </nav>
        </div>
      </div>
    </div>
  </div>



<!-- @if($espacePuublicitair)
  <section class="mt-4" >
    <div class="container" style="padding-right: 0px!important; margin-right: auto; padding-left: 2.8%!important; margin-left:auto">
      <!-- row 
      <div class="row" >
        @foreach($espacePuublicitair as  $espacePuublicitaire)
        @foreach($espacePuublicitaire->souscategorie()->get() as $souscat_links)
        <a href="/searchAnnonceSouscat/{{$souscat_links->slug}}" class="col-lg-4 col-md-6 col-12" style="padding-right: 1.5%!important; padding-left: 3%!important;" > 
        <div >
          <div class="pb-11 pt-4 rounded-1 mb-1 mt-3" style="background:url(../images/EspacePub/{{$espacePuublicitaire->photo}})no-repeat; background-size: cover; border: 0.04em #cccc solid; box-shadow:  -0.3rem 0.2rem 0.2rem #5c6c75;">
            <div>


                <h3 class="fw-bold px-2" id="souclouk" style="margin-top: 2%!important;"> {{$espacePuublicitaire->titre}}<br>
                  </h3>
                <div class="mt-4 mb-5 fs-5">
                  <p class=""></p>
                  <span> <span class="fw-bold text-dark"></span></span>
                </div>
               
              </div>

          </div>

        </div>

        </a>
    
      @endforeach
      @endforeach
        <!-- <div class="col-lg-4 col-12 d-block d-md-none d-lg-block">
          <div class="p-8 rounded-3 mb-3" style="background:url(../assets/images/banner/ad-banner-3.jpg)no-repeat; background-size: cover;">


            <div>
              <!-- Banner Content 
              <h3 class=" fw-bold mb-3">When in doubt,<br>
                  eat ice cream </h3>
                  <div class="mt-4 mb-5 fs-5">
                <p class="fs-5 mb-0">Enjoy a scoop of<br>
                  summer today</p>
                  </div>


                <a href="#" class="btn btn-dark">Shop Now</a>


          </div>

        </div> 
      </div>
    </div>
    </div>
  </section>

  @endif
                     -->
                     





    <section class="my-lg-2 ">
                <div class="container" style="display:block ;">
                  
                    <div class="row">
                    <!-- col -->
                    @foreach($category->souscat()->get() as $subcategory)
                    <div class="col-lg-2 col-4">
                        <div class="text-center ">
                
                            <div class="mt-3 ">
                                <h5 class="fs-6 "> <a href="/searchAnnonceSouscat/{{$subcategory->slug}}" class="text-info">{{$subcategory->libelle}}</a></h5>
                            </div>

                        </div>


                    </div>
                 @endforeach
                    </div>

                </div>

    </section>

           

             

            </div>
            <!-- icon -->
            <div class="d-md-flex justify-content-between align-items-center">
            
            <!-- Recherche -->
           
          </div>
          
          <div class="container">
          <div class="row g-4 row-cols-lg-4 row-cols-2 row-cols-md-3  my-2">
          @foreach($category->souscat()->get() as $subcategorie)
            @foreach($subcategorie->annonce() as $annonces)
            @if($annonces)
          <div class="col" style="padding-right: 0.5%!important; margin-top: 1rem;">
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
                     Afficher</a></div>
                     @elseif($annonces->type == "vente")
                     <div><a href="/annonceDetailVentes/{{$annonces->slug}}" class="btn btn-outline-warning btn-sm mt-2  align-items-center">
                     Achetez</a></div>
                     @elseif($annonces->type == "Troque ou Vente")
                     <div><a href="/annonceDetail/{{$annonces->slug}}" class="btn btn-outline-info btn-sm mt-2  align-items-center">
                     Afficher</a></div>
                     @else
                     <div><a href="/annonceDetail/{{$annonces->slug}}" class="btn btn-outline-primary btn-sm mt-2  align-items-center">
                     proposez</a></div>
                     @endif
              </div>
            </div>
          </div>

          @else

          <div class="alert alert-primary">
            Aucune Annonces Publiez pour cette Catégorie Cible , Soyez le premier en cliquant ici <a href="/publiez">publiez une annonce</a>
        </div>
        @endif
          @endforeach
          @endforeach
        </div>
        </div>
          <!-- row -->
          <div class="row mt-8">
            <div class="col">
              <!-- nav -->
              <nav>
                <ul class="pagination">
              
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