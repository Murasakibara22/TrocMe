@extends('../layouts/app')


@section('content')



<main>
<!-- section -->
  <div class="mt-4">
    <div class="container">
      <div class="row ">
        <div class="col-12">
          <!-- breadcrumb -->
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
              <li class="breadcrumb-item"><a href="/">Accueil</a></li>
              <li class="breadcrumb-item"><a href="/apropos">A propos</a></li>
              <li class="breadcrumb-item active" aria-current="page">Details</li>
            </ol>
          </nav>
        </div>
      </div>
    </div>
  </div>
  <!-- section -->
  <section class="my-lg-6 my-2">
    <div class="container">
      <div class="row">
        <div class="col-md-8 offset-md-2">
          <!-- text -->
          <div class="mb-3">
            <div class="mb-3 text-center"><a href="#!">Tous sur</a></div>
            <h1 class="fw-bold text-center">Troc Moi</h1>
            <div class="d-flex justify-content-center text-muted mt-4"><span class="me-2"><small>29 Octobre
                  2022</small></span><span><small>Temps de lecture : <span class="text-dark fw-bold">5min</span></small></span>
            </div>
          </div>
          <!-- img -->
          <div class="mb-8"> <img src="../assets/images/4.jpg" alt="" class="img-fluid rounded-3"></div>

          <div>
            <!-- text -->
            <div class="mb-4">
              <p> <span class="text-dark fw-bold">Trock Moi </span> est une plateforme qui veut en finir avec les barrières et permettre de
                 troquer objet contre objet, c’est un mode de<span class="text-dark fw-bold"> recyclage, de redistribution, un geste 
                 écocitoyen et solidaire </span> qui permet à tous de mieux vivre, et de faire partie de l'écosystème.
               </p>
              <p> Le site Trock Moi s'adresse à toutes les personnes qui souhaitent s’échanger de vieux ou nouveaux 
                objets ou les personnes qui souhaitent juste faire des dons ou récupérer des dons. Trock Moi, c'est un peu
                 comme un <span class="text-dark fw-bold">grenier où tout est gratuit </span>. A l'exception de quelques catégories d'objets interdits <a href="#"> (voir les infos pratique)</a>,
                  vous pouvez échanger ou donner tout type de produits : de l’immobilier, de l'électroménager, des babioles, des revues,
                   des vêtements, des encombrants divers... quasiment tout ce qui vous ne sert plus, ce qui ne vous a jamais servi et vous 
                   encombre. En retrouvant <span class="text-dark fw-bold">les gestes ancestraux </span>, nous retrouvons un art de vivre <span class="text-dark fw-bold"> où la négociation et la conversation sont
                    aussi importants que ce que nous possédons </span>, y consacrer du temps c’est utile et agréable..</p>
              <p> <span class="text-dark fw-bold">Trock Moi </span> c’est aussi hyper rapide : nos ingénieurs, ont mijoté des calculs complexes pour développer notre moteur.
                 Plus puissant et intelligent il accélère la circulation des annonces et augmente ainsi les possibilités de choix et de transactions. 
                 Fini le troc coincé entre deux personnes qui n’arrivent pas à se mettre d’accord. Grâce à notre technique innovante, vous avez le choix
                  entre plusieurs propositions, à vous de choisir la meilleure. Vous décidez quand, où et comment vous voulez récupérez ou donner vos objets,
                   ainsi les possibilités de « Matching » sont multiples. L’architecture des catégories correspond à chaque moment important de la vie et couvre 100% de vos besoins. </p>
              <p>Chacun peut accéder à la plus immense vitrine de trocs où comme on dit en Côte d’Ivoire <span class="text-dark fw-bold"> « approchez regardez, ya œuf hein ! ya di pain !
                 ya brosse, ya éponge hein ! tantie Ya peigne hein ! » </span> il s’y toutes les richesses et les surprises du réseau. Volontaires pour bâtir un 
                 monde plus « smart », chacun enrichit le pot commun de ses « stuff » :  vêtements, chaussures de sports, jardinières, livres adorés,
                  collection de films .... L'ensemble se remet à circuler dans le réseau pour le bien de tous.</p>
              <!-- <p>Integer aliquet blandit bibendum uisque ornare mauris et sem sodales quis porttitor nunc consequat.
                Suspendisse potenti. In condimentum leo vitae nisl dignissim, in imperdiet massa euismod tiam gravida
                dui ut posuere mollis.</p> -->
            </div>
            <hr class="mt-lg-10 mb-lg-6 my-md-6">
            <!-- blockquote -->
            <blockquote class="blockquote text-center ">
              <p class="text-primary fst-italic fw-semi-bold lh-base h1 px-2 px-lg-14">
                "C’est le moment, troquez la vie à pleines dents !!"</p>
              <footer class="blockquote-footer mt-3 text-muted">
               
              </footer>
            </blockquote>
           
            <!-- <div class="mb-4">
              <p>
                Condimentum leo utipsum euismod feugiatn elntum <strong>sapiennonser variusmi elementum </strong>
                necunc elem entum velitnon tortor convallis
                variusa placerat nequhse. Quis eu Lorem irure magna. Ex
                labore reprehenderit veniam irure id nostrud velit. Minim
                aliquip cillum laborum qui Lorem eu.
              </p>
              <p>
                Sint officia nulla deserunt voluptate non amet consequat ipsum
                tempor. Nulla id cupidatat ipsum occaecat. Aute ad et fugiat
                velit sunt qui veniam labore elit ipsum commodo proident. Sit
                tempor consectetur commodo laborum mollit. Enim sint nostrud
                nisi in ad aliqua laboris ad non.
              </p>
            </div> -->
     
            <!-- <div class="mb-5">
              <h3 class="mb-3">Unordered Lists (Nested)</h3>
              <ul>
                <li>Lorem ipsum dolor sit amet</li>
                <li>Consectetur adipiscing elit</li>
                <li>Integer molestie lorem at massa</li>
                <li>Facilisis in pretium nisl aliquet</li>
                <li>
                  Nulla volutpat aliquam velit
                  <ul>
                    <li>Phasellus iaculis neque</li>
                    <li>Purus sodales ultricies</li>
                    <li>Vestibulum laoreet porttitor sem</li>
                    <li>Ac tristique libero volutpat at</li>
                  </ul>
                </li>
                <li>Faucibus porta lacus fringilla vel</li>
                <li>Aenean sit amet erat nunc</li>
                <li>Eget porttitor lorem</li>
              </ul>
            </div>
            <div class="mb-5">
              <h3 class="mb-3">Ordered List (Nested)</h3>
              <ol>
                <li>Lorem ipsum dolor sit amet</li>
                <li>Consectetur adipiscing elit</li>
                <li>Integer molestie lorem at massa</li>
                <li>Facilisis in pretium nisl aliquet</li>
                <li>
                  Nulla volutpat aliquam velit
                  <ol>
                    <li>Phasellus iaculis neque</li>
                    <li>Purus sodales ultricies</li>
                    <li>Vestibulum laoreet porttitor sem</li>
                    <li>Ac tristique libero volutpat at</li>
                  </ol>
                </li>
                <li>Faucibus porta lacus fringilla vel</li>
                <li>Aenean sit amet erat nunc</li>
                <li>Eget porttitor lorem</li>
              </ol>
            </div> -->
        </div>
          <hr class="mt-3 mb-4">
     
        </div>
      </div>
    </div>
  </section>

</main>


@endsection