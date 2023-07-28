@extends('../layouts/app')


@section('content')


<main>
  <!-- section -->
  <section class="mt-lg-2 mt-3">
    <!-- container -->
    <div class="container">
      <!-- row -->
      <div class="row">
        <!-- col -->
        <div class="offset-lg-1 col-lg-10 col-12">
          <div class="row align-items-center mb-14">
            <div class="col-md-6">
              <!-- text -->
              <div class="ms-xxl-14 me-xxl-15 mb-8 mb-md-0 text-center text-md-start">
                <h1 class="mb-6">Qui Sommes Nous (Troc Moi)?</h1>
                <p class="mb-0 lead"> <strong> Trock Moi</strong> est une plateforme qui veut en finir avec les barrières et permettre de troquer objet contre objet, c’est un mode de recyclage, de redistribution, un geste écocitoyen et solidaire qui permet à tous de mieux vivre, et de faire partie de l'écosystème.</p>
              </div>
            </div>
            <!-- col -->
            <div class="col-md-6">
              <div class=" me-6">
                <!-- img -->
                <img src="../assets/images/echange.jpg" alt="" class="img-fluid rounded-3">
              </div>
            </div>

          </div>
          <!-- row -->
          <div class="row mb-7">
            <div class="col-12">
              <div class="mb-8">
                <!-- heading -->
                <h2>Prêt à commencer?</h2>
              </div>
            </div>
            <div class="col-md-4">
              <!-- card -->
              <div class="card bg-light mb-6 border-0">
                <!-- card body -->
                <div class="card-body p-8">
                  <div class="mb-4">
                    <!-- img -->
                    <img src="../assets/images/icons/user.svg" alt="">
                  </div>
                  <div style="width:100%; height:50px; overflow: hidden; text-overflow: ellipsis;">
                  <h4>Publie gratuitement et facilement </h4>
                    </div>
                  <div style="width:100%; height:110px; overflow: hidden; text-overflow: ellipsis;">
                  <p>vous pouvez échanger ou donner tout type de produits 
                    : de l’immobilier, de l'électroménager, des babioles, des revues, des
                     vêtements, des encombrants divers... quasiment tout ce qui vous ne sert plus</p>
                    </div>
                  <!-- btn -->
                  <a href="/register" class="btn btn-dark mt-2">Join nous</a>
                </div>

              </div>
            </div>
            <div class="col-md-4">
              <!-- card -->
              <div class="card bg-light mb-6 border-0">
                <!-- card body -->
                <div class="card-body p-8">
                  <div class="mb-4">
                    <!-- img -->
                    <img src="../assets/images/icons/star.svg" alt="">
                  </div>
                  <div style="width:100%; height:50px; overflow: hidden; text-overflow: ellipsis;">
                  <h4>Faire une publiciter sponsoriser</h4>
                    </div>
                  <div style="width:100%; height:110px;overflow:hidden;">
                  <p>Si vous etes un utilisateur regulier sur Troc moi et que vous voulez que vos annonces est plus de visibilitées , passez en mode professionnel </p>
                  <!-- btn -->
</div>
                  <a href="/account" class="btn btn-dark mt-2">Abonnez vous</a>
                </div>

              </div>
            </div>
            <div class="col-md-4">
              <!-- card -->
              <div class="card bg-light mb-6 border-0">
                <!-- card body -->
                <div class="card-body p-8">
                  <div class="mb-4">
                    <!-- img -->
                    <img src="../assets/images/icons/home.svg" alt="">
                  </div>
                  <div style="width:100%; height:50px; overflow: hidden; text-overflow: ellipsis;">
                  <h4>Apprendre plus sur Troc Moi</h4>
                  </div>
                  <div style="width:100%; height:110px;overflow:hidden;">
                  <p >Si vous etes un utilisateur regulier sur Troc moi et que vous voulez que vos annonces est plus de visibilitées , passez en mode professionnel </p>
                  <!-- btn -->
                  </div>
                  <a href="/aproposDetail" class="btn btn-dark mt-2"> En savoir plus</a>
                </div>

              </div>
            </div>
            <div class="col">
              <!-- text -->
              <p>For assistance using Freshcart services, please visit our <a href="#">Help Center</a></p>
            </div>

          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- section -->
  <section class="bg-success py-10">

    <div class="container">
      <div class="row">
        <!-- col -->
        <blockquote class="blockquote text-center ">
              <p class="text-white fst-italic fw-semi-bold lh-base h1 px-2 px-lg-14">
                "C’est le moment, troquez la vie à pleines dents !!"</p>
             
            </blockquote>
      </div>
    </div>
  </section>
  <!-- section -->
  <section class="mt-6">
    <!-- container -->
    <div class="container">
      <div class="row">
        <!-- col -->
        <div class="offset-md-1 col-md-10">
          <div class="mb-9">
             <!-- heading -->
            <h2>Notre Equipe </h2>
          </div>
        </div>
      </div>
    </div>
  </section>
   <!-- section -->
  <section class="mb-6">
     <!-- slider -->
    <div class="team-slider">
       <!-- item -->
       @foreach($equipe as $equipes)
      <div class="item mx-2">
        <div class="bg-light rounded-3">
           <!-- text -->
          <div class="p-6">
            <h5 class="h6 mb-0">{{$equipes->nom}}  {{$equipes->prenom}}</h5>
            <small>{{$equipes->fonction}}</small>
          </div>
           <!-- img -->
          <img src="../images/Equipe/{{$equipes->photo}}" alt="" class="img-fluid">
        </div>
      </div>
    @endforeach




    </div>
  </section>
</main>



@endsection