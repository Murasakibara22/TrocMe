@extends('../layouts/app')

@section('styles')

    @livewireStyles

@endsection

@section('content')


<main>
<section class="py-lg-6 py-6" style="background: url(../assets/images/banner/banner-4.jpg)no-repeat; background-position: center; background-size: cover;">
            <div class="container">
               <!-- row -->

                  <div class="col-xl-12  col-lg-10 col-md-10 col-xs-6">
                                    <!--filter-->
                        <div class="container mt-2 rounded-2 py-5 mb-7" style="background-color: #fff; box-shadow: 5px 1px 30px 2px black;">
                            <div class="col-12">
                            <div class="d-lg-flex justify-content-between align-items-center">

                            <div class=" col-12" style="padding-right: 0px!important;">


                        
                                <livewire:recherche.form :params="$annonce->first()->type">


                            {{-- <div id="search-results_demandez"  style="width: 86%;position: absolute;z-index: 990; opacity: 0.95; background-color: #f0f3f2; "> </div> --}}

                                </div>
                                </div>
                            </div>
                        </div>


                     <div class="mt-1">
                        <small class="text-white"> Bonjour, Connectez-vous pour la meilleure expérience. Nouveau sur Trockmoi ?  <a href="#" class="text-white">inscrivez-vous</a></small>
                     </div>
                  </div>

            </div>
        </section>
  <!-- section -->
  <section class="mt-5">
    <!-- container -->
    <div class="container" style="padding-right: 1%!important;">

      <!-- Filtrage -->
      <div class="row">
        <div class="col-12">
        <h6 class="mt-4">Recherchez ou filtrez selon la Categorie</h6>
        <div class="row">


              <!-- <div class="mb-1 col-6">

                <!-- title
                <form action="{{ route('filterDemandez') }}">
                  <div class="d-flex  mt-lg-0 ">
                        <!-- select option
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
              </div> -->
          </div>

          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="mt-0 mb-lg-4 mb-4">
    <!-- container -->
    <div class="container" style="padding-right: 1%!important;">
      <!-- row -->
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
                                                src="../images/Annonce/{{$annonce_sponsorisers->photo}}" alt="troc moi {{$annonce_sponsorisers->titre}}"
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
      <!-- row -->
      <div class="row g-4 row-cols-lg-4 row-cols-2 row-cols-md-3  my-2">
      @foreach($annonce as $annonces)
          <div class="col"  style="padding-right: 0.5%!important; margin-top: 1rem;">
                    <div class="card card-product">
                        <div class="card-body" style="padding: 4% 4%; ">

                            <div class="text-center position-relative ">

                                <a href="/annonceDetail/{{$annonces->slug}}"> <img
                                        src="../images/Annonce/{{$annonces->photo}}" alt="troc moi"
                                        class="mb-3 img-fluid"></a>



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
                                <span
                                    class="text-muted small">{{ date('j M, Y', strtotime($annonces->created_at)) }}</span>
                                @endif
                            </div>
                            <div class="d-flex justify-content-between align-items-center mt-3">
                                <div><span class="text-dark">{{number_format($annonces->prix,0,',',' ')}} FCFA</span>
                                </div>
                            </div>
                            @if($annonces->type == "troque")
                            <div><a href="/annonceDetail/{{$annonces->slug}}"
                                    class="btn btn-outline-primary btn-sm mt-2  align-items-center">
                                    Afficher</a></div>
                            @elseif($annonces->type == "dons")
                            <div><a href="/annonceDetail/{{$annonces->slug}}"
                                    class="btn btn-outline-warning btn-sm mt-2  align-items-center">
                                    Achetez</a></div>
                            @elseif($annonces->type == "Troque ou dons")
                            <div><a href="/annonceDetail/{{$annonces->slug}}"
                                    class="btn btn-outline-info btn-sm mt-2  align-items-center">
                                    Afficher</a></div>
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
  </section>


  </main>



@endsection


@section('scripts')

    @livewireScripts


    <script>
$(document).ready(function() {
    $('#search-term_demande').on('input', function() {
        var term = $(this).val();

        $.ajax({
            url: '/autocomplete-search-demandez',
            data: {
              term: term
            },
            success: function(response) {
                var results = $('#search-results_demandez');

                results.html(response)
            }
        });
    });
});

</script>



<script>

var rechercheDivdemandez = document.getElementById('recherche_demandez');
var resultatsDivdemandez = document.getElementById('search-results_demandez');

// Ajoute un écouteur d'événements click sur le document
document.addEventListener('click', function(e) {
  // Vérifie si l'événement a été déclenché en dehors de la div de recherche
  if (!rechercheDivdemandez.contains(e.target)) {
    // Efface les résultats pré-affichés
    resultatsDivdemandez.innerHTML = '';
  }
});

</script>

@endsection
