@extends('../layouts/app')


@section('content')

<main>
  <!-- section-->
  <div class="mt-4">
    <div class="container">
      <!-- row -->
      <div class="row ">
        <!-- col -->
        <div class="col-12">
          <!-- breadcrumb -->
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
              <li class="breadcrumb-item"><a href="#!">Accueil</a></li>
              <li class="breadcrumb-item"><a href="#!">Profil Client</a></li>
              <li class="breadcrumb-item active" aria-current="page">{{$user->nom}} {{$user->prenom}}</li>
            </ol>
          </nav>
        </div>
      </div>
    </div>
  </div>
  <!-- section -->
  <div class="mt-8 mb-lg-14 mb-8">
    <!-- container -->
    <div class="container"  style="padding-right: 1%!important">
      <div class="row gx-10">
        <!-- col -->
        <aside class="col-lg-3 col-md-4 mb-6 mb-md-0" style="padding-right: 0px!important; padding-left: 1%!important;">
          <div class="offcanvas offcanvas-start offcanvas-collapse w-md-50 " tabindex="-1" id="offcanvasCategory" aria-labelledby="offcanvasCategoryLabel">

            <div class="offcanvas-header d-lg-none">
              <h5 class="offcanvas-title" id="offcanvasCategoryLabel">Filter</h5>
              <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body ps-lg-2 pt-lg-0">
            <div class="mb-8">
        
            <!-- Div Info User -->
            <div class="row">
                <div class="col-lg-12 col-12 mb-2 ">
                    <!-- card -->
                    <div class="card h-100 card-lg shadow p-1 mb-2">
                        <!-- card body -->
                        <div class="card-body p-6">
                            <!-- heading -->
                            <div class="d-flex justify-content-between align-items-center mb-6">
                                <div>
                                    <h4 class="mb-0 fs-5">{{$user->nom}} {{$user->prenom}} (Cote d'ivoire)</h4>
                                </div>
                                @if($user_pro == True)
                                    <img src="{{ url('../assets/images/logo/certifi.png') }} " class=" rounded-circle" style="width: 40%; height: 40%; padding-left: 8%;" alt="">
                                @endif
                            </div>
                            <!-- project number -->
                           

                            <div class="lh-1">
                            @if($user_pro == True)
                            <h4 class=" mb-3 fw-bold fs-6">Type de vendeurs:  <span class="text-primary">  Professionels </span> </h4>
                            @else
                            <h4 class=" mb-3 fw-bold fs-6">Type de vendeurs:  <span class="text-primary">  Particuliers </span> </h4> 
                            @endif
                                <!-- <h1 class=" mb-2 fw-bold fs-4">$93,438.78</h1> -->
                                <span>Vues par:  <span class="text-dark fw-bold"> {{$user->view_count_page}} </span>personnes</span>
                            </div>

                           
                        </div>
                        <div class="row ">
                         
                         <div class="col-6 col-md-6">
                           <button class="btn btn-primary " style="width: 100%;">
                           <i class="bi bi-telephone-outbound me-1"></i>Appel
                           </button>
                         </div>
                         <div class="col-6 col-md-6">
                           <button class="btn btn-outline-primary" style="width: 100%;">
                           <i class="bi bi-envelope-at-fill me-1"></i>E-mail
                           </button>
                       </div>
                     </div>
                    </div>
                </div>
            </div> 


          </div>

          <div class="mb-8">

            <h5 class="mb-3">Filtre</h5>
           
            <!-- form check -->
            <div class="form-check mb-2">
              <!-- input -->
              <input class="form-check-input" type="checkbox" value="" id="eGrocery" checked>
              <label class="form-check-label" for="eGrocery">
                Troque
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
                Demandes
              </label>
            </div>


          </div>
          <div class="mb-8">
            <!-- price -->
            <h5 class="mb-3">Prix</h5>
            <div>
              <!-- range -->
              <div id="priceRange" class="mb-3"></div>
              <small class="text-muted">Prix:</small> <span id="priceRange-value" class="small"></span>

            </div>



          </div>
          <!-- rating -->
      
          <div class="mb-8 position-relative">
            <!-- Banner Design -->
            <!-- Banner Content -->
            <div class="position-absolute p-5 py-8">
              <h3 class="mb-0">Fresh Fruits </h3>
              <p>Get Upto 25% Off</p>
              <a href="#" class="btn btn-dark">Shop Now<i class="feather-icon icon-arrow-right ms-1"></i></a>
            </div>
            <!-- Banner Content -->
            <!-- Banner Image -->
            <!-- img --><img src="{{ asset('../assets/images/banner/assortment-citrus-fruits.png')}}" alt=""
              class="img-fluid rounded ">
            <!-- Banner Image -->
          </div>
          </div>
        </div>
        </aside>


        <section class="col-lg-9 col-md-12" style=" padding-right: 0.3%!important;">
          <!-- card -->
           <!-- row -->
            <div class="row mb-4">
                <div class="col-md-12">
                    <!-- card -->
                    @if($user_pro == True)
                    <div class="card bg-light border-0 rounded-4" style="background-image: url(  {{ URL::asset('../images/User/'.$user->bannear) }}    ); background-repeat: no-repeat; background-size: cover; background-position: right;">
                    @else
                    <div class="card bg-light border-0 rounded-4" style="background-image: url({{ asset('../assets/images/slider/slider-image-1.jpg); background-repeat: no-repeat; background-size: cover; background-position: right; ') }}">
                    @endif
                        <div class="card-body p-lg-10">
                            <h1>{{$user->nom}} {{$user->prenom}}
                            </h1>
                        
                        </div>
                    </div>
                </div>
            </div>
            <!-- table -->

            <div class="mb-4">
                <div class="row justify-content-between">
                <div class="col-md-10 col-12 mb-2 mb-md-0">
                    <!-- form -->
                    <form class="d-flex" role="search" id="recherche_">
                      <input type="hidden" id="id_user" value="{{$user->id}}">
                    <input class="form-control" type="search" id="search-term"  placeholder="Recherche" aria-label="Search">
                    </form>
                    <div id="search-results"  style="position: absolute; z-index: 999; max-width: 90%!important;"></div>
                </div>
                <div class="col-lg-2 col-md-4 col-12">
                    <!-- main -->
                <button class="btn btn-primary">
                        Recherchez
                </button>
                </div>
                </div>
            </div>
                    
          

            <div class="d-lg-flex justify-content-between align-items-center">
                  <div class="mb-3 mb-lg-0">
                    <p class="mb-0"> <span class="text-dark"> {{$annonce_simple->count()  + $annonce_sponsoriser->count()}} </span> Annonces </p>
                  </div>

                <!-- icon -->
                <div class="d-md-flex justify-content-between align-items-center">
                  <div class="d-flex align-items-center justify-content-between">
                  <div>

                  <a href="" class="active me-3"><i class="bi bi-list-ul"></i></a>
                  
                  </div>
                  <div class="ms-2 d-lg-none">
                    <a class="btn btn-outline-gray-400 text-muted" data-bs-toggle="offcanvas" href="#offcanvasCategory" role="button" aria-controls="offcanvasCategory"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none"
                      stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                      class="feather feather-filter me-2">
                      <polygon points="22 3 2 3 10 12.46 10 19 14 21 14 12.46 22 3"></polygon>
                    </svg> Filters</a>
                  </div>
                </div>

                  <div class="d-flex mt-2 mt-lg-0">
                
                    <div>
                      <!-- select option -->
                      <a href="">
                      <button class="btn btn-primary">
                                Toutes
                      </button>
                      </a>
                    </div>

                    <div class="ms-1">
                      <!-- select option -->
                      
                            <button class="btn btn-outline-secondary " id="simple_affiche_index" >
                                    Simple
                        </button>
                     
                        
                    </div>


                    <div class="ms-1 flex-grow-1"  >
                      <!-- select option -->
                 
                                <button class="btn" style="background-color: #fffdde;" id="vip_affiche_index" >
                                    VIP
                                    </button>
    
                    </div>

                  </div>

                </div>
          </div>
                            
            
            <!-- row -->
            <div class="row   row-cols-1 mt-1">
                   <!-- Annonces Sponsoriser -->
                   
                   <div id="simple_annonce_pages_users-results" style="padding-right: 1%!important; max-width: 100%;">
                
                   @foreach($annonce_sponsoriser as $annonce_sponsorisers)
                <div class="col-12 col-sm-12 col-xs-12 col-md-12 mt-2" >
                    <div class="card card-product">
                        <!-- card body -->
                        <div class="card-body shadow p-3"
                            style="padding-top: 1%!important;padding-bottom: 1%!important;padding-left: 1%!importatnt; border: 0.02em #0dad63 solid; background-color: #fffdde; border-radius: 0.3rem!important;">
                            <div class=" row ">
                                <!-- col -->
                                <div class="col-md-3 col-5 col-sm-6 col-xs-6">
                                    <div class="text-center position-relative ">

                                        <a href="/annonceDetail/{{$annonce_sponsorisers->slug}}"> <img
                                                src="{{ url('../images/Annonce/'.$annonce_sponsorisers->photo) }}" alt="troc moi"
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
                                                class="btn btn-info btn-sm mt-3 float-end  d-none d-sm-block align-items-center">Voir
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

                @foreach($annonce_simple as $annonce_simples)
                
                <div class="col-12 col-sm-12 col-xs-12 col-md-12 mt-2">
                    <div class="card card-product">
                        <!-- card body -->
                        <div class="card-body  shadow p-3"
                            style="padding-top: none;padding-bottom: 1%!important; border: 0.02em #ccc solid; border-radius: 0.3rem!important;">
                            <div class=" row ">
                                <!-- col -->
                                <div class="col-md-3 col-5 col-sm-6 col-xs-6">
                                    <div class="text-center position-relative ">

                                        <a href="/annonceDetail/{{$annonce_simples->slug}}"> <img
                                                src="{{ url('../images/Annonce/'.$annonce_simples->photo) }}" alt="troc moi"
                                                class=" img-fluid" style="height: 6.8rem!important;"></a>
                                    </div>
                                </div>
                                <div class="col-md-9 col-7 col-sm-6  col-xs-6 flex-grow-1 my-1" align="start">

                                    <h2 class="fs-5 text-truncate" style="max-whidth: 97%;">
                                        <a href="/annonceDetail/{{$annonce_simples->slug}}"
                                            class="text-inherit text-decoration-none" >{{$annonce_simples->titre}}</a>
                                    </h2>
                                    <span
                                        class="text-muted small float-end">{{$annonce_simples->created_at->diffForHumans()}}

                                    </span> <br>

                                   
                                    <div>

                                            @foreach($annonce_simples->villes()->get() as $ville)
                                        <div class="mt-0"><span
                                                class="text-dark bold float-end">{{$ville->name}}</span>
                                        </div>
                                        @endforeach
                                        <!-- btn --> <br>
                                     
                                        <span
                                                class="text-dark fw-bold bold float-start">{{number_format($annonce_simples->prix,0,',',' ')}}
                                                FCFA</span>
                                    
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

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
      </div>
    </div>
  </div>
</main>





@endsection





@section('scripts')
<script>
$(document).ready(function() {
    $('#search-term').on('input', function() {
        var term = $(this).val();
        var id = $('#id_user').val();

        $.ajax({
            url: '/autocomplete-search',
            data: {
              term: term,
              user_id: id
            },
            success: function(response) {
                var results = $('#search-results');

                $('#search-results').html(response)
            }
        });
    });
});

</script>



<script>
  
var rechercheDiv = document.getElementById('recherche_');
var resultatsDiv = document.getElementById('search-results');

// Ajoute un écouteur d'événements click sur le document
document.addEventListener('click', function(e) {
  // Vérifie si l'événement a été déclenché en dehors de la div de recherche
  if (!rechercheDiv.contains(e.target)) {
    // Efface les résultats pré-affichés
    resultatsDiv.innerHTML = '';
  }
});

</script>




<script>
$(document).ready(function() {
    $('#simple_affiche_index').on('click', function() {
          var id = $('#id_user').val();

        $.ajax({
            url: '/search-simple_annonce_pages_user',
            data: {
              user_id: id
            },
            success: function(response) {
                var results = $('#simple_annonce_pages_users-results');

                results.html(response)
            }
        });
    });
});

</script>


@endsection