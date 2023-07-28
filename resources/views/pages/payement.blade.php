@extends('../layouts/app')



@section('content')


<main>
  <!-- section -->
  <section>
     <!-- container -->
    <div class="container">
       <!-- row -->
      <div class="row">
         <!-- col -->
         <div class="col-12">
          <div class="d-flex justify-content-between align-items-center d-md-none py-4">
            <!-- heading -->
           
            <!-- button -->
            <button class="btn btn-outline-gray-400 text-muted d-md-none btn-icon btn-sm ms-3 " type="button"
              data-bs-toggle="offcanvas" data-bs-target="#offcanvasAccount" aria-controls="offcanvasAccount">
              <i class="bi bi-text-indent-left fs-3"></i>
            </button>
          </div>
        </div>
        <div class="col-lg-9 col-md-8 col-12">
          <div class="py-6 p-md-6 p-lg-10">
              <!-- heading -->
            <div class="d-flex justify-content-between mb-6 align-items-center">
              <h2 class="mb-0">Method de Paiement</h2>
              <a href="#" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#paymentModal">Ajouter
                Payment </a>

            </div>
            <ul class="list-group list-group-flush">
              <!-- List group item -->
              <li class="list-group-item py-5 px-0">
                <div class="d-flex justify-content-between">
                  <div class="d-flex">
                      <!-- img -->
                    <img src="../assets/images/svg-graphics/visa.svg" alt="">
                      <!-- text -->
                    <div class="ms-4">
                      <h5 class="mb-0 h6 h6">Moov Money</h5>
                      <p class="mb-0 small">Expiration 
                      </p>
                    </div>
                  </div>
                  <div>
                      <!-- button -->
                    <a href="#" class="btn btn-outline-gray-400 disabled btn-sm">choisir</a>
                  </div>
                </div>
              </li>
              <!-- List group item -->
              <li class="list-group-item px-0 py-5">
                <div class="d-flex justify-content-between">
                  <div class="d-flex">
                      <!-- img -->
                    <img src="../assets/images/svg-graphics/mastercard.svg" alt="" class="me-3">
                    <div>
                      <h5 class="mb-0 h6"> Orange Money</h5>
                      <p class="mb-0 small">Expires </p>
                    </div>
                  </div>
                  <div>
                      <!-- button-->
                    <a href="#" class="btn btn-outline-gray-400 text-muted btn-sm">choisir</a>
                  </div>
                </div>
              </li>
              <!-- List group item -->
              <li class="list-group-item px-0 py-5">
                <div class="d-flex justify-content-between">
                  <div class="d-flex">
                      <!-- img -->
                    <img src="../assets/images/svg-graphics/discover.svg" alt="" class="me-3">
                    <div>
                        <!-- text -->
                      <h5 class="mb-0 h6">Discover ending in 1234</h5>
                      <p class="mb-0 small">Expires in 07/2020 <span class="badge bg-warning text-dark"> This card is
                          expired.</span></p>
                    </div>
                  </div>
                  <div>
                      <!-- btn -->
                    <a href="#" class="btn btn-outline-gray-400 text-muted btn-sm">choisir</a>
                  </div>
                </div>
              </li>
              <!-- List group item -->
              <li class="list-group-item px-0 py-5">
                <div class="d-flex justify-content-between">
                  <div class="d-flex">
                      <!-- img -->
                    <img src="../assets/images/svg-graphics/americanexpress.svg" alt="" class="me-3">
                      <!-- text -->
                    <div>
                      <h5 class="mb-0 h6">American Express ending </h5>
                      <p class="mb-0 small">Expires in 12/2021</p>
                    </div>
                  </div>
                  <div>
                      <!-- btn -->
                    <a href="#" class="btn btn-outline-gray-400 text-muted btn-sm">choisir</a>
                  </div>
                </div>
              </li>
              <!-- List group item -->
              <li class="list-group-item px-0 py-5 border-bottom">
                <div class="d-flex justify-content-between">
                  <div class="d-flex">
                      <!-- img -->
                    <img src="../assets/images/svg-graphics/paypal.svg" alt="" class="me-3">
                    <div>
                        <!-- text -->
                      <h5 class="mb-0 h6">Paypal Card</h5>
                      <p class="mb-0 small">Expires </p>
                    </div>
                  </div>
                  <div>
                      <!-- btn -->
                    <a href="#" class="btn btn-outline-gray-400 text-muted btn-sm">choisir</a>
                  </div>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>
</main>

@endsection