@extends('../layouts/app')

@section('styles')

    @livewireStyles

@endsection

@section('content')

                  @if ( session('NotExist'))
                    <div class="alert alert-warning">
                    L'article selectionner n'est plus disponible
                    </div>
                    @endif

                  @if ( session('NotSelectedFilter'))
                    <div class="alert alert-info">
                    Aucun type de filtrage choisit, veuillez Reessayer
                    </div>
                    @endif

          
<main>
      <section class="py-lg-6 py-6" style="background: url(../assets/images/banner/banner-4.jpg)no-repeat; background-position: center; background-size: cover;">
            <div class="container">
               <!-- row -->

                  <div class="col-xl-12  col-lg-10 col-md-10 col-xs-6">
                                    <!--filter-->
                        <div class="container mt-2 rounded-2 py-5 mb-7" style="background-color: #fff; box-shadow: 5px 1px 30px 2px black;">
                            <div class="col-12">
                            <div class="d-lg-flex justify-content-between align-items-center">
                                    
                                 

                            <form action="{{ route('searchVen') }}"  class="col-lg-12" id="recherche_vente">
                      
                                    <div class="input-group">
                                              <input type="search" name= "search" value="{{  request()->search ?? '' }}"  class="form-control dropdown-toggle"  placeholder="Recherche..." id="search-term_vente">
                                        <span class="mdi mdi-magnify search-icon"></span>
                                        
                                
                                        <button class="input-group-text btn btn-primary" type="submit">Recherche</button>
                                    </div>
                                </form>

                                </div>
                            </div>
                            <div id="search-results_vente"  style="width: 86%;position: absolute;z-index: 990; opacity: 0.95; background-color: #f0f3f2; "></div>
                        </div>

                        
                     <div class="mt-1">
                        <small class="text-white"> Bonjour, Connectez-vous pour la meilleure expérience. Nouveau sur Trockmoi ?  <a href="#" class="text-white">inscrivez-vous</a></small>
                     </div>
                  </div>

            </div>
        </section>

  <section class="mt-4 ">
    <!-- container -->
    <div class="container">

      <div class="row">
        <div class="col-12">
        <h6 class="mt-3">Recherchez ou filtrez selon la Categorie</h6>
        <div class="row">
          <div class="mb-1 col-6">
           
            <!-- recherche -->
              <!-- <div class="app-search dropdown ">
                         <form action="{{ route('searchVen') }}" >
                      
                             <div class="input-group">
                                       <input type="search" name= "search" value="{{  request()->search ?? '' }}"  class="form-control dropdown-toggle"  placeholder="Recherche..." id="top-search">
                                 <span class="mdi mdi-magnify search-icon"></span>
                                 
                         
                                 <button class="input-group-text btn btn-primary" type="submit">Search</button>
                             </div>
                         </form>
                       
                     </div> -->
          </div>

              <div class="mb-1 col-6">
                
                <!-- title -->
                <!-- <form action="{{ route('filterVen') }}">
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
                              
                          
                        
                      </form> -->
              </div>
          </div>
  
          </div>
        </div>
      </div>
    </div>
  </section>



    <livewire:vente.vente-list />


</main>



@endsection

@section('scripts')

    @livewireScripts

<script>
$(document).ready(function() {
    $('#search-term_vente').on('input', function() {
        var term = $(this).val();

        $.ajax({
            url: '/autocomplete-search-vente',
            data: {
              term: term
            },
            success: function(response) {
                var results = $('#search-results_vente');

                results.html(response)
            }
        });
    });
});

</script>

<script>
  
var rechercheDivvente = document.getElementById('recherche_vente');
var resultatsDivvente = document.getElementById('search-results_vente');

// Ajoute un écouteur d'événements click sur le document
document.addEventListener('click', function(e) {
  // Vérifie si l'événement a été déclenché en dehors de la div de recherche
  if (!rechercheDivvente.contains(e.target)) {
    // Efface les résultats pré-affichés
    resultatsDivvente.innerHTML = '';
  }
});

</script>

@endsection