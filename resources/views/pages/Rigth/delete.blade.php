@extends('../layouts/app')


@section('content')

            

                    @if ( session('saveSuccessAnnonce'))
                    <div class="alert alert-success">
                    Annonce publiez avec succes
                    </div>
                    @endif
<main>
  <!-- section -->
             

  <section class="my-lg-14 my-4">
      <!-- container -->
    <div class="container">
      <div class="row justify-content-center">
          <!-- col -->
          <div class="col-md-12 mb-8">
            <div class="wrapper">
              <div class="row no-gutters">

              <div class="col-md-5 " >
                        <div class="alert alert-danger">
                                Vous allez supprimer cette annonce
                                </div>
                     <div class="row " style="width: 100%; margin-left: 0.4em; height: 100%;">
                            <img src="../assets/images/delete2.gif" class="w-100 h-100" alt="">
                        </div>
            </div> 


        <div class="col-md-7  rounded-2" style="background-color:#F2F3F4;">
          <div class="mb-7">
              <!-- heading -->
            <h1 class="h3 mt-3" style="font-family: poppins;">TITRE :  {{$annonce->titre}} </h1>
            <p class="lead mb-0 ">Vous allez supprimer cette annonce </p>

            <div class="content-page mt-5">
                <div class="content">


                   <!-- Start Content-->
                   <div class="container-fluid">

                    <form action="{{ url('/annoncesDelete/'.$annonce->slug) }}" method="POST">
                        @csrf 
                        @method('DELETE')


                    <div class="shadow-lg p-3 mb-5 mt-10 bg-body rounded">Voulez vous vraiment suprimer : {{$annonce->titre}} </br>
                    <div class="mt-6">
                        <button type="submit"  class="btn btn-danger ">oui suprimer</button>
                        <a href="{{ url('/account') }}"><button type="button" class="btn btn-secondary" data-bs-dismiss="modal">non fermer </button>  </a>  
                        </div>
                    </div>
                    </form>


                    </div> <!-- container -->

                    </div> <!-- content -->

                    </div>
            
          </div>
          <!-- form -->
        

        </div>
            
        </div>
        </div>
        </div>
      </div>
    </div>

  </section>
</main>



@endsection