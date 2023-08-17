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
    <!-- container -->
    <div class="container">
      <!-- row -->
      <div class="row justify-content-center align-items-center">
        <div class="col-12 col-md-6 col-lg-4 order-lg-1 order-2">
          <!-- img -->
          <img src="../assets/images/fp-g.svg" alt="" class="img-fluid">
        </div>
        <div class="col-12 col-md-6 offset-lg-1 col-lg-4 order-lg-2 order-1 d-flex align-items-center">
          <div>
            <div class="mb-lg-9 mb-5">

            

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />


              <!-- heading -->
              <h1 class="mb-2 h2 fw-bold">Mot de passe oublier?</h1>
              <p>Veuillez saisir l'adresse e-mail associée à votre compte et nous vous enverrons par e-mail un lien pour réinitialiser votre mot de passe.</p>
            </div>
            <!-- form -->
            <form method="POST" action="{{ route('password.update') }}">
            @csrf
              <!-- row -->
              <div class="row g-3">

            <input type="hidden" name="token" value="{{ $request->route('token') }}">

               <!-- col -->
                <div class="col-12">
                  <!-- input -->
                  <input type="email" class="form-control" name="email" :value="old($request->email)" placeholder="Email" required autofocus>
                </div>

                <div class="col-12">
                  <!-- input -->
                  <input class="form-control"  type="password" name="password" placeholder="mot de passe" required>
                </div>
                <div class="col-12">
                  <!-- input -->
                  <input class="form-control" type="password" name="password_confirmation" placeholder="Confirmation de mot de passe"  required="">
                </div>

<!-- btn -->
                <div class="col-12 d-grid gap-2">
                     <button type="submit" class="btn btn-primary">Renitialiser</button>
                </div>


              </div>
            </form>
          </div>
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
