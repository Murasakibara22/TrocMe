@extends('../layouts/app')


@section('content')


<main>
  <div class="mt-2">
    <div class="container">
      <!-- row -->
      <div class="row ">
        <!-- col -->
        <div class="col-12">
          <!-- breadcrumb -->
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
              <li class="breadcrumb-item"><a href="/">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Toutes les annonces</li>
            </ol>
          </nav>
        </div>
      </div>
    </div>
  </div>
  <!-- section -->

  <section class="mt-2">
    <!-- container -->
    <div class="container">
      <!-- row -->
      <div class="row ">
        <div class="col-12 ">
          <!-- heading -->
          <div class="bg-light rounded-3 d-flex justify-content-between ps-md-10 ps-6">
            <div class="d-flex align-items-center">
              <h1 class="mb-0 fw-bold">Toutes les annonce</h1>

            </div>
            <div class="py-6">
              <!-- img -->
              <!-- img -->
              <img src="../assets/images/svg-graphics/store-graphics.svg" alt="" class="img-fluid"></div>

              <div class="py-3 d-flex me-3">
              <a href="/publiez" class="btn btn-primary">Publiez <i class="feather-icon icon-arrow-right ms-1"></i></a>
              </div>
          </div>


        </div>
      </div>
    </div>
  </section>
  <section class="mt-6 mb-lg-14 mb-8">
    <!-- container -->
    <div class="container">
      <!-- row -->
      <div class="row">
        <div class="col-12">
        <h6>Recherchez ou filtrez selon la Categorie</h6>
        <div class="row">
          <div class="mb-1 col-12 col-lg-6">
           
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
                          <form action="{{ route('SearchfilterAllAnnonces') }}" >
                           
                            <div class="d-flex  mt-lg-0 ">
                                  <!-- select option -->
                                  <select class="form-select" aria-label="Default select example" name="FiltrerSelon">
                                  <option selected >Categorie: </option>
                                    <option value="prix Le plus bas">Prix Le plus bas</option>
                                    <option value="prix Le plus haut"> Prix Le plus eleve</option>
                                    <option value="Annonces Recentes">date recentes</option>
                                    <option value="Annonces les plus anciens">Annonces les plus anciens</option>
                                  </select>

                        <input type="hidden" name="filtreSearch" value="{{$searched}}">

                                  <button type="submit" class="btn btn-dark ms-3">Filtrer </button>
                                
                                </div>
                                </form>
                        </div>
  
          </div>
        </div>
      </div>
      <!-- row -->
      <div class="row g-4 row-cols-lg-4 row-cols-2 row-cols-md-3  my-2">
        @foreach($annonce  as  $annonces)
          <div class="col"  style="padding-right: 0.5%!important; margin-top: 1rem;">
            <div class="card card-product">
              <div class="card-body"  style="padding: 4% 4%; ">

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
                  <a href="/annonceDetail"> <img src="../images/Annonce/{{$annonces->photo}}" alt="Troc moi"
                      class="mb-3 img-fluid"></a>
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
                  <div>{{number_format($annonces->prix,0,',',' ')}}<span class="text-dark"> FCFA</span> 
                  </div>
                </div>
                @if($annonces->type == "troque")
                     <div><a href="/annonceDetail" class="btn btn-outline-primary btn-sm mt-2  align-items-center">
                     Proposez</a></div>
                     @elseif($annonces->type == "vente")
                     <div><a href="/annonceDetail" class="btn btn-outline-warning btn-sm mt-2  align-items-center">
                     Dons</a></div>
                     @elseif($annonces->type == "Troque ou Vente")
                     <div><a href="/annonceDetail" class="btn btn-outline-info btn-sm mt-2  align-items-center">
                     Proposez</a></div>
                     @else
                     <div><a href="/annonceDetail" class="btn btn-outline-primary btn-sm mt-2  align-items-center">
                     proposez</a></div>
                     @endif
              </div>
            </div>
          </div>
        @endforeach
        </div>

           <div class="row mt-8">
            <div class="col">
              {{$annonce->links()}}
            </div>
          </div>
    </div>
  </section>


  </main>



@endsection