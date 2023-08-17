<!DOCTYPE html>
<html lang="en">

<head>

  <title>Trock moi</title>
  <!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="Site de Troque et vente d'articles de tous genre">
<meta content="Murasakibara" name="author">

<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-M8S4MT3EYG"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-M8S4MT3EYG');
</script>

<!-- Favicon icon-->
<link rel="shortcut icon" type="image/x-icon" href="{{ asset('../assets/images/favicon/favicon.ico') }}">


<!-- Libs CSS -->
<link href="{{ asset('../assets/libs/bootstrap-icons/font/bootstrap-icons.css') }}" rel="stylesheet">
<link href="{{ asset('../assets/libs/feather-webfont/dist/feather-icons.css') }}" rel="stylesheet">
<link href="{{ asset('../assets/libs/simplebar/dist/simplebar.min.css') }}" rel="stylesheet">


<!-- Theme CSS -->
<link rel="stylesheet" href="{{ asset('../assets/css/theme.min.css') }}">

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">



</head>

<body>

  <!-- navigation -->
<div class="border-bottom shadow-sm">
  <nav class="navbar navbar-light py-2">
    <div class="container justify-content-center justify-content-lg-between">
      <a class="navbar-brand" href="../index.html">
        <img src="{{ asset('../assets/images/logo/-logo.svg') }}" alt="" class="d-inline-block align-text-top">
      </a>
      <span class="navbar-text">
        je n'ai pas de compte ? <a href="../register">Inscription</a>
      </span>
    </div>
  </nav>
</div>

 
  <main>
  <!-- section -->
  <section class="my-lg-14 my-8">
    <div class="container">
      <!-- row -->
      <div class="row justify-content-center align-items-center">
        <div class="col-12 col-md-6 col-lg-4 order-lg-1 order-2">
          <!-- img -->
          <img src="{{ asset('../assets/images/signin-g.svg') }}" alt="" class="img-fluid">
        </div>
        <!-- col -->
        <div class="col-12 col-md-6 offset-lg-1 col-lg-4 order-lg-2 order-1">
          <div class="mb-lg-9 mb-5">
            <h1 class="mb-1 h2 fw-bold">Connexion a Trock moi</h1>
            <p>Bienvenue sur Trock Moi! Entrez votre e-mail pour commencer.</p>
          </div>

          <form action="{{ route('login') }}" method="POST">
            @csrf
            <div class="row g-3">
              <!-- row -->

              <div class="col-12">
                <!-- input -->
                <input type="email" name="email" class="form-control" id="inputEmail4" placeholder="Email" required>
              </div>
              <div class="col-12">
                <!-- input -->
                <div class="password-field position-relative">
                    <input type="password" name="password" id="fakePassword" placeholder="Enter Password" class="form-control" required >
                    </div>

              </div>
              <div class="d-flex justify-content-between">
                <!-- form check -->
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                  <!-- label --> <label class="form-check-label" for="flexCheckDefault">
                    se rappeler
                  </label>
                </div>
                <div> Mot de passe Oublié ? <a href="{{route('password.request')}}">Renitialiser</a></div>
              </div>
              <!-- btn -->
              <div class="col-12 d-grid"> <button type="submit" class="btn btn-primary">Connexion</button>
              </div>
              <!-- link -->
              <div>Don’t have an account? <a href="../pages/signup.html"> Sign Up</a></div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>

</main>




  <!-- Footer -->
  <!-- footer -->
  @include('partials/footer')

  <!-- Javascript-->
  <!-- Libs JS -->
<script src="{{ asset('../assets/libs/jquery/dist/jquery.min.js ') }}"></script>
<script src="{{ asset('../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js ') }}"></script>
<script src="{{ asset('../assets/libs/simplebar/dist/simplebar.min.js ') }}"></script>

<!-- Theme JS -->
<script src="{{ asset('../assets/js/theme.min.js ') }}"></script>
  <script src="{{ asset('../assets/js/vendors/password.js ') }}"></script>




</body>

</html>