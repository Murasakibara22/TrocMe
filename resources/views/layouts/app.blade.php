<!DOCTYPE html>
<html lang="fr">

<head>

  <title>Trock Moi</title>
  <!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="Troc moi">
<meta content="Troc moi" name="Murasakibara" />
<link rel="canonical" href="https://trockmoi.prumadci.com/" />
@yield('meta')
<meta name="description" content="Achetez et vendez gratuitement partout en Côte d’Ivoire sur Trock Moi  ! ✓ Nº1 des Petites Annonces en ligne en Côte d’Ivoire ✓ Autos, Téléphones, Immobilier, Informatique, Emploi, Mode et Beauté ✓ Produits Neufs ou d'Occasion ✓ Annonces Pros & Particuliers ✓ 100% Gratuit !">
<meta name="robots" content="index, follow">
<meta name="google" content="translate" />
<meta property="og:title" content="Trock moi en  Côte d’Ivoire |  annonces de tous genres Gratuites ">
<meta property="og:image" content="https://trockmoi.prumadci.com/assets/images/logotroc.jpg">
<meta property="og:description" content="trockez des articles gratuitement partout en Côte d’Ivoire sur Trock moi meilleur plateforme de trock ! ✓ Nº1 des annonces de tous genres Gratuites  en ligne en Côte d’Ivoire ✓ Autos, Téléphones, Immobilier, Informatique, Emploi, Mode et Beauté ✓ Produits Neufs ou d'Occasion ✓ Annonces Pros & Particuliers ✓ 100% Gratuit !">
<meta property="og:type" content="website">
<meta property="og:url" content="https://trockmoi.prumadci.com/">
<meta name="twitter:title" content="Trock Moi Côte d’Ivoire |  annonces Gratuites , de tous genre" />
<meta name="twitter:image" content="https://trockmoi.prumadci.com/assets/images/logotroc.jpg" />



<!-- Favicon icon-->
<link rel="shortcut icon" type="image/x-icon" href="{{ asset('./assets/images/logotroc.jpg') }}">



<!-- Libs CSS -->
<link href="{{ asset('./assets/libs/bootstrap-icons/font/bootstrap-icons.css') }}" rel="stylesheet" />
<link href="{{ asset('./assets/libs/feather-webfont/dist/feather-icons.css') }}" rel="stylesheet" />
<link href="{{ asset('./assets/libs/slick-carousel/slick/slick.css') }}" rel="stylesheet" />
<link href="{{ asset('./assets/libs/slick-carousel/slick/slick-theme.css') }}" rel="stylesheet" />
<link href="{{ asset('./assets/libs/simplebar/dist/simplebar.min.css') }}" rel="stylesheet" />
<link href="{{ asset('./assets/libs/nouislider/dist/nouislider.min.css') }}" rel="stylesheet">
<link href="{{ asset('./assets/libs/tiny-slider/dist/tiny-slider.css') }}" rel="stylesheet">
<link href="{{ asset('./assets/libs/dropzone/dist/min/dropzone.min.css') }}" rel="stylesheet" />
<link href="{{ asset('./assets/libs/prismjs/themes/prism-okaidia.min.css') }}" rel="stylesheet">

@yield('styles')
<!-- <link href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,500,500i,600,600i,700,700i,800,800i"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,400i,500,500i,700,700i&amp;display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Rubik:400,400i,500,500i,700,700i" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('website/assets/css/jquery-ui.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('website/assets/css/animate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('website/assets/css/bootstrap.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('website/assets/css/color1.css') }}"> -->

<!-- Theme CSS -->
<link rel="stylesheet" href="{{ asset('./assets/css/theme.min.css') }}">
@livewireStyles

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">

<style>
  #nomNav{
		width: 96%;
		overflow: hidden;
		overflow-x: hidden;
		overflow-y: hidden;
		overflow-y: hidden;
		
  }  


  .blink {
    animation: blinker 2.2s linear infinite;
  }

  @keyframes blinker {
    50% {
      opacity: 0;
    }
  }




  .textblink {
    animation: blinker-red 1.5s linear infinite;
  }

  @keyframes  blinker-red {
    50% {
      color: #e88f31;
      opacity: 0%;
    }
  }


  
  #souclouk {
    animation: blinker-blue 1000ms  infinite;
    color: #fff;
  }

  @keyframes  blinker-blue {
    50% {
      color: blue;
      opacity: 100%;
    }
  }



  .textsponsorisation {
    animation: blinker-success 1.5s linear infinite;
  }

  @keyframes  blinker-success {
    50% {
      opacity: 0;
    }
  }



  .blink-img {
    animation: blinker-red 4s linear infinite;
  }

  @keyframes blinker-red {
    50% {
      opacity: 70%;
    }
  }


  .blink_affPub {
    animation: blinker-yellow 3s linear infinite;
  }

  @keyframes blinker-yellow {
    50% {
      opacity: 0%;
      color: yellow;
    }
  }


 

.float{
	position:fixed;
	width:60px;
	height:60px;
	bottom:30px;
	right:30px;
	background-color:#3475d6;
	color:#FFFFFF;
	border-radius:50px;
	text-align:center;
	box-shadow: 2px 2px 3px #999;
}

.my-float{
	margin-top:24px;
  font-weight: 400;
  font-size: 2.5rem;
  margin:auto;
}

.my-float:hover {
  color: #fff;
}


#loading-container {
  position: fixed;
  z-index: 9999;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: #fff;
  display: flex;
  justify-content: center;
  align-items: center;
}

#loading-container::before {
  content: "";
  width: 50px;
  height: 50px;
  border-radius: 50%;
  animation: spin 7s linear infinite;
}



</style>

</head>

<body >


<div id="loading-container">
  <img src="{{ url('../assets/images/load.gif') }}" alt="">
</div>

@include('partials/navbar')

@yield('content')

@include('partials/footer')


<a href="/publiez" class="float">
<i class="bi bi-plus my-float"></i>
</a>


<div class="return_div_modal"></div>






<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelOne"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabelOne">Bon Retour sur Troc-moi !</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('login') }}" method="POST">
                @csrf
                <div class="modal-body">

                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">email:</label>
                        <input type="email" class="form-control" id="recipient-name" name="email">
                    </div>
                    <div class="mb-3">
                        <label for="message-text" class="col-form-label">password:</label>
                        <input type="password" class="form-control" id="recipient-name" name="password">
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">fermer</button>
                    <button type="submit" class="btn btn-primary">Connexion</button>
                </div>
            </form>
        </div>
    </div>
</div>











 <!-- Libs JS -->
 @livewireScripts
 <script src="{{ asset('./assets/libs/jquery/dist/jquery.min.js') }}"></script>
<script src="{{ asset('./assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('./assets/libs/jquery-countdown/dist/jquery.countdown.min.js') }}"></script>
<script src="{{ asset('./assets/libs/slick-carousel/slick/slick.min.js') }}"></script>
<script src="{{ asset('./assets/libs/simplebar/dist/simplebar.min.js') }}"></script>
<script src="{{ asset('./assets/libs/nouislider/dist/nouislider.min.js') }}"></script>
<script src="{{ asset('./assets/libs/wnumb/wNumb.min.js') }}"></script>
<script src="{{ asset('./assets/libs/rater-js/index.js') }}"></script>
<script src="{{ asset('./assets/libs/prismjs/prism.js') }}"></script>
<script src="{{ asset('./assets/libs/prismjs/components/prism-scss.min.js') }}"></script>
<script src="{{ asset('./assets/libs/prismjs/plugins/toolbar/prism-toolbar.min.js') }}"></script>
<script src="{{ asset('./assets/libs/prismjs/plugins/copy-to-clipboard/prism-copy-to-clipboard.min.js') }}"></script>
<script src="{{ asset('./assets/libs/tiny-slider/dist/min/tiny-slider.js') }}"></script>
<script src="{{ asset('./assets/libs/dropzone/dist/min/dropzone.min.js') }}"></script>
<script src="{{ asset('./assets/libs/flatpickr/dist/flatpickr.min.js') }}"></script>
<script src="{{ asset('./assets/libs/inputmask/dist/jquery.inputmask.min.js') }}"></script>


<!-- Theme JS -->
@yield('scripts')
<script src="{{ asset('./assets/js/theme.min.js') }}"></script>
<!-- <script src="{{ asset('website/assets/js/jquery-3.6.0.min.js') }}"></script>
        <script src="{{ asset('website/assets/js/popper.min.js') }}"></script>
        <script src="{{ asset('website/assets/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('website/assets/js/jquery-ui.js') }}"></script>
        <script src="{{ asset('website/assets/js/jquery.ui.touch-punch.min.js') }}"></script>
        <script src="{{ asset('website/assets/js/range-slider.js') }}"></script>
        <script src="{{ asset('website/assets/js/feather-icon/feather.min.js') }}"></script>
        <script src="{{ asset('website/assets/js/feather-icon/feather-icon.js') }}"></script>
        <script src="{{ asset('website/assets/js/wow.min.js') }}" ></script>
        <script src="{{ asset('website/assets/js/slick.js') }}"></script>
        <script src="{{ asset('website/assets/js/slick-animation.min.js') }}"></script>
        <script src="{{ asset('website/assets/js/custom-slick.js') }}"></script>
        <script src="{{ asset('website/assets/js/bootstrap-notify.min.js') }}"></script>
        <script src="{{ asset('website/assets/js/fancy-slider.js') }}"></script>
        <script src="{{ asset('website/assets/js/script.js') }}"></script>
        <script src="{{ asset('website/assets/js/customizer.js') }}"></script>
        <script src="{{ asset('website/assets/js/color/layout5.js') }}"></script>
        <script src="{{ asset('website/assets/js/more-infos.js') }}"></script> -->


<script>
   var f = document.getElementById("bienvenue");
	setInterval(() => {
    f.style.color = "#fff";
  }, 400);


  $(document).on("click",".Monmodal", function(e){
     
     e.preventDefault();
     var a=$(this);
     $('.return_div_modal').text("");
     $.ajax({
         method: 'get',
         url: a.attr("href"),
         success : function(response){
             $('.return_div_modal').html(response);
             $('.montrer').modal('show');
         }
     });
 });
 




//  const clignotant = document.getElementById("souclouk");

// setInterval(function() {
//   clignotant.style.color = (clignotant.style.color == "orange") ? "black" : "orange";
// }, 500);



</script>

<script>
  // Pour afficher l'effet de chargement
document.getElementById("loading-container").style.display = "flex";

// Pour masquer l'effet de chargement
document.getElementById("loading-container").style.display = "none";
</script>


<script>
//pour faire charger mon loading pendant le nombre de seconde defini
const loadingElement = document.querySelector('#loading-container');
loadingElement.style.display = 'flex';
setTimeout(() => {
  loadingElement.style.display = 'none';
}, 1200); 
</script>

            

</body>

</html>