<div>
    <!-- section -->
 <div class="mt-4 mb-lg-6 mb-6">
    <!-- container -->
    <div class="container" style="padding-left: 0.1%!important; padding-right: 0.1%!important;">
      <div class="row">
      


       <!-- col -->
       <aside class="col-lg-3 col-md-4 mb-6 mb-md-0">
                <div class="offcanvas offcanvas-start offcanvas-collapse w-md-50 " tabindex="-1" id="offcanvasCategory" aria-labelledby="offcanvasCategoryLabel">

                    <div class="offcanvas-header d-lg-none">
                        <h5 class="offcanvas-title" id="offcanvasCategoryLabel">Filter</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body ps-lg-2 pt-lg-0">
                    <div class="mb-8">


                    <div class="mb-8">
                    <!-- price -->
                    <h5 class="mb-3">Prix</h5>
                    
                    <div class="col-12" style="color: #fff;">
                    <!-- range -->
                    <input  id="priceRange" wire:model="rangeValue" type="range" min="0"  max="10000" value="5"> 
                    </div>
                    <small class="text-muted">Prix:0 XOF - {{$rangeValue}} XOF</small>




                </div>
                    <!-- title -->
                    <h5 class="mb-3">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-layers text-primary">
                        <polygon points="12 2 2 7 12 12 22 7 12 2"></polygon>
                        <polyline points="2 17 12 22 22 17"></polyline>
                        <polyline points="2 12 12 17 22 12"></polyline>
                    </svg>
                             
                    Categories </h5>
                    <!-- nav -->
                    <ul class="nav nav-category" >
                   
                    <!-- nav item -->
                    @foreach($categorie as $categories)
                    <li class="nav-item border-bottom w-100 " ><a href="/listAllAnnonceCat/{{$categories->slug}}"
                        class="nav-link">{{$categories->libelle}} 
                        </a>
                    </li>
                 @endforeach

                    </ul>
                </div>

                <div class="mb-8">

                    <h5 class="mb-3">Annonces</h5>
                   
                    <div class="form-check mb-2" wire:click="preniumAnnonce">
                    <!-- input -->
                    <input class="form-check-input"  type="checkbox"  id="Blinkit">
                    <label class="form-check-label"  for="Blinkit">
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
                        Particuliers
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
                    <input class="form-check-input" type="checkbox" value="" id="onlineGrocery" checked>
                    <label class="form-check-label" for="onlineGrocery">
                        Toutes
                    </label>
                    </div>

                </div>
               
                
                <div class="mb-8 position-relative">
                    <!-- Banner Design -->
                    <!-- Banner Content -->
                    <div class="position-absolute p-5 py-8">
                    <h3 class="mb-0">Passez en mode PRO </h3>
                    <p>avec 25% de reduction</p>
                    <a href="/pricings" class="btn btn-dark">compte pro<i class="feather-icon icon-arrow-right ms-1"></i></a>
                    </div>
                    <!-- Banner Content -->
                    <!-- Banner Image -->
                    <!-- img --><img src="../assets/images/banner/assortment-citrus-fruits.png" alt="troc moi Bannear dons"
                    class="img-fluid rounded ">
                    <!-- Banner Image -->
                </div>

          
                </div>
            </aside>

        <section class="col-lg-9 col-md-12" style="padding-right: 0%;">
          <!-- card -->
          <form role="search" class="mb-2">
              <input class="form-control" type="search" placeholder="Effectuez une recherche " wire:model="search" >
            </form>
            
          <div class="card mb-3 bg-light border-0">

          

            <!-- card body -->
            <div class="card-body p-4">
              <h2 class="mb-0 fs-3">Annonces dons</h2>
            </div>
          </div>
          <!-- text -->
          <div class="d-lg-flex justify-content-between align-items-center">
            <div class="mb-3 mb-lg-0">
              <p class="mb-0"> <span class="text-dark"> {{ $annonce->count()}} </span> Annonces </p>
            </div>

            <!-- icon -->
            <div class="d-md-flex justify-content-between align-items-center">
              <div class="d-flex align-items-center justify-content-between">


              <div class="ms-2 d-lg-none mb-3">
                <a class="btn btn-outline-gray-400 text-muted" data-bs-toggle="offcanvas" href="#offcanvasCategory" role="button" aria-controls="offcanvasCategory"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none"
                  stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                  class="feather feather-filter me-2">
                  <polygon points="22 3 2 3 10 12.46 10 19 14 21 14 12.46 22 3"></polygon>
                </svg> Menu</a>
              </div>
             
            </div>

            
            


            <form action="{{ route('filterVen') }}" class="ms-1">
                  <div class="d-flex  mt-lg-0 ">
                        <!-- select option -->
                        <select class="form-select" aria-label="Default select example" name="FiltrerSelon">
                        <option selected >Pertinence: </option>
                          <option value="prix Le plus bas">Prix Le plus bas</option>
                          <option value="prix Le plus haut"> Prix Le plus eleve</option>
                          <option value="Annonces Recentes">date recentes</option>
                          <option value="Annonces les plus anciens">Annonces les plus anciens</option>
                        </select>

                        <button type="submit" class="btn btn-dark ms-1">Filtrer </button>
                      
                      </div>
                              
                          
                        
                      </form>

            </div>
          </div>
          <!-- row -->
          <div class="row g-4  row-cols-1 mt-2">
           


                <!-- Annonces Sponsoriser -->

                @foreach($annonce_sponsoriser as $annonce_sponsorisers)
                <div class="col-12 col-sm-12 col-xs-12 col-md-12 mt-2" style="padding-right: 1%!important; padding-left: 3.3%!important">
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
                                                class=" img-fluid" style="height: 7.5rem!important;"></a>
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
                                                class="btn btn-info btn-sm mt-3 float-end   align-items-center">Voir
                                                plus</a>

                                                </div>
                                    
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                    <!-- Annonces Simple  -->

                @foreach($annonce as $annonces)
                
                <div class="col-12 col-sm-12 col-xs-12 col-md-12 mt-2" style="padding-right: 1%!important;padding-left: 3.3%!important">
                    <div class="card card-product">
                        <!-- card body -->
                        <div class="card-body  shadow p-3"
                            style="padding-top: none;padding-bottom: 1%!important; border: 0.02em #ccc solid; border-radius: 0.3rem!important;">
                            <div class=" row ">
                                <!-- col -->
                                <div class="col-md-3 col-5 col-sm-6 col-xs-6">
                                    <div class="text-center position-relative ">

                                        <a href="/annonceDetail/{{$annonces->slug}}"> <img
                                                src="../images/Annonce/{{$annonces->photo}}" alt="troc moi {{$annonces->photo}}"
                                                class=" img-fluid" style="height: 6.9rem!important;"></a>
                                    </div>
                                </div>
                                <div class="col-md-9 col-7 col-sm-6  col-xs-6 flex-grow-1 my-auto" align="start">

                                    <h2 class="fs-5 text-truncate" style="max-whidth: 97%;">
                                        <a href="/annonceDetail/{{$annonces->slug}}"
                                            class="text-inherit text-decoration-none" >{{$annonces->titre}}</a>
                                    </h2>
                                    <span
                                        class="text-muted small float-end">{{$annonces->created_at->diffForHumans()}}

                                    </span> <br>

                                   
                                    <div>

                                            @foreach($annonces->villes()->get() as $ville)
                                        <div class="mt-1"><span
                                                class="text-dark bold float-end">{{$ville->name}}</span>
                                        </div>
                                        @endforeach
                                        <!-- btn --> <br>
                                     
                                        <span
                                                class="text-dark fw-bold bold float-start">{{number_format($annonces->prix,0,',',' ')}}
                                                FCFA</span>
                                    
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach




          </div>
                 <!-- row -->
                 <div class="row mt-8 mx-auto">
                    <div class="col">
                        <div class="text-center mt-1">
                        <p wire:loading>Chargement en cour... </p>
                            <button wire:click="loadMore" type="button" class="btn btn-light">voir plus <i class="bi bi-arrow-repeat"></i></button>
                        </div>
                    </div>
                </div>
        </section>

         

           
      </div>
    </div>
</div>


</div>
