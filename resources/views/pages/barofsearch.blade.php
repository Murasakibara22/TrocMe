@extends('../layouts/app')


@section('content')


<main>
  <div class="mt-2">
    <div class="container--xxl">
       <!-- row -->
       <div class="row ">
        <div class="col-12" >
          <!-- heading -->
          <div class="d-flex justify-content-between ps-md-8 ps-6"  style="background: url(../assets/images/banner/grocery-banner.png)no-repeat; background-size: cover; border-radius: ; background-position: center;">
            <div class="d-flex align-items-center">
              <h1 class="mb-0 fw-bold">Tous</h1>

            </div>
            <div class="py-12">
              <div class="py-6 d-flex me-3">
              
              </div>
          </div>


        </div>
      </div>
    </div>
  </div>
  <!-- section -->

  <section class="mt-2">
    <!-- container -->
    <div class="container">
     

      <div class="row">
        <div class="col-12">
        <h6 class="mt-6">Recherchez ou filtrez selon la Categorie</h6>
        <div class="row">
          <div class="mb-1 col-6">
           
            <!-- recherche -->
              <div class="app-search dropdown ">
                         <form action="{{ route('findSearchTeam') }}">
                             <div class="input-group">
                                                        <input type="search" name= "search" value="{{  request()->search ?? '' }}"  class="form-control dropdown-toggle"  placeholder="Recherche..." id="top-search">
                                 <span class="mdi mdi-magnify search-icon"></span>
                                 
                         
                                 <button class="input-group-text btn btn-primary" type="submit">Search</button>
                             </div>
                         </form>
                       
                     </div>
          </div>

              <div class="mb-1 col-6">
                
                <!-- title -->
                <form action="">
                  <div class="d-flex  mt-lg-0 ">
                        <!-- select option -->
                        <select class="form-select" aria-label="Default select example">
                          <option selected>Categorie: </option>
                          <option value="Low to High">Prix Le plus bas</option>
                          <option value="High to Low"> Prix Le plus eleve</option>
                          <option value="Release Date"> La date</option>
                          <option value="Avg. Rating">couleur</option>

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
  </section>
  <section class="mt-6 mb-lg-14 mb-8">
    <!-- container -->
    <div class="container">
      <!-- row -->
      
      <!-- row -->
      <div class="row g-4 row-cols-lg-4 row-cols-2 row-cols-md-3  my-2">
        @foreach($annonce  as  $annonces)
          <div class="col" style="padding-right: 0.5%!important; margin-top: 1rem;">
            <div class="card card-product">
              <div class="card-body" style="padding:4% 4%;">

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
                  <a href="/annonceDetail/{{$annonces->slug}}"> <img src="../images/Annonce/{{$annonces->photo}}" alt="Troc moi"
                      class="mb-3 img-fluid"></a>
                </div>
                @foreach($annonces->villes()->get()  as  $ville)
                <div class="text-small mb-1"><a href="/annonceDetail/{{$annonces->slug}}" class="text-decoration-none text-muted"><small>{{$ville->libelle}}</small></a></div>
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
                <div><a href="/annonceDetail/{{$annonces->slug}}" class="btn btn-outline-primary btn-sm mt-2  align-items-center">
                     voir plus</a></div>
              </div>
            </div>
          </div>
        @endforeach
        </div>

           <div class="row mt-8">
            <div class="col">
              <!-- nav -->
              <nav>
                {{$annonce->links()}}
              </nav>
            </div>
          </div>
    </div>
  </section>


  </main>



@endsection