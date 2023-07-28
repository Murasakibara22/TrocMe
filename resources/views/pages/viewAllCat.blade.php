@extends('../layouts/app')


@section('content')

            @if ( session('AucuneSousCat'))
                    <div class="alert alert-warning">
                    Aucune annonce publier pour le moment pour cette sous categorie 
                    </div>
                    @endif

                    @if ( session('Probleme'))
                    <div class="alert alert-danger">
                    un probleme est survenue veuillez reeesayer 
                     </div>
                    @endif


<main>
  <!-- section -->
  <div class="mt-4">
    <!-- container -->
    <div class="container">
      <!-- row -->
      <div class="row ">
        <!-- col -->
        <div class="col-12">
          <!-- breadcrumb -->
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
              <li class="breadcrumb-item"><a href="#!">Home</a></li>
              <li class="breadcrumb-item"><a href="#!">Blog</a></li>
              <li class="breadcrumb-item active" aria-current="page">Blog Category</li>
            </ol>
          </nav>
        </div>
      </div>
    </div>
  </div>

  <!-- section -->
  <section class="mt-2">
    <!-- container -->
    <div class="container--xxl">
       <!-- row -->
       <div class="row ">
        <div class="col-12" >
          <!-- heading -->
          <div class="d-flex justify-content-between ps-md-8 ps-6"  style="background: url(../assets/images/banner/troc1.webp)no-repeat; background-size: cover; border-radius: ; background-position: center;">
            <div class="d-flex align-items-center">
              <h1 class="mb-0 fw-bold" style="font-family:poppins;">Toutes les Categories</h1>

            </div>
            <div class="py-10">
              <div class="py-6 d-flex me-3">
              
              </div>
          </div>


        </div>
      </div>

  </div>
  </section>
  <!-- section -->





  <section class="mb-lg-6 mb-4 mt-5">
    <!-- container -->
    <div class="container">
      <!-- row -->
      <div class="row">
        <!-- col -->
        @foreach($cat as $cats)
        <div class="col-12 col-md-6 col-lg-4 mb-8">
          <div class="mb-4">
            <a href="/listAllAnnonceCat/{{$cats->slug}}">
              <!-- img -->
              <div class="img-zoom">
                <img src="../images/Categorie/img/{{$cats->image_illustrant}}" alt="" class="img-fluid rounded-3 w-100">
              </div>
            </a></div>
          <div class="mb-3"><a href="/listAllAnnonceCat/{{$cats->slug}}"></a>

          </div>
          <!-- text -->
          <div>
            <h2 class="h5"><a href="/listAllAnnonceCat/{{$cats->slug}}" class="text-inherit">{{$cats->libelle}}</a></h2>
            <p>{{$cats->description}}</p>
          </div>

        </div>
        <!-- col -->
        @endforeach
       


        
       


      </div>
    </div>
  </section>




</main>


@endsection