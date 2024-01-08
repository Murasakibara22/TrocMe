<!-- navigation -->
<header>

    <div class="py-1" style="background-color: #0e1c7d;">
        <div class="container">
            <div class="row">

                <div class="col-3 text-start  d-none d-md-block">
                    <a href="tel:+2252224202321" class="text-decoration-none text-white">
                        +225 2224202321
                    </a>
                </div>
                <div class="col-md-5 col-8 text-center text-md-start">
                    <span id="bienvenue" class="textblink" style="font-weight: bold;">
                        <marquee behavior="" direction="left"> Troc Moi est une plateforme qui veut en finir avec les
                            barrières et permettre de troquer objet contre objet </marquee>
                    </span>
                </div>
                <div class="col-4 col-xs-2 text-center d-md-block">

                    @if (!Auth::user())
                        <a class="text-decoration-none text-white "
                            style="font-family: Century Gothic; font-weight: 600;" data-bs-toggle="modal"
                            data-bs-target="#exampleModal" href="/login"> Connexion
                        </a>
                    @else
                        <div class="dropdown">
                            <a class=" text-center text-decoration-none text-white" href="#" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <span class="me-1">
                                    <img src="{{ url('../images/User/' . Auth::user()->photo) }}"
                                        alt="TROC-MOI {{ Auth::user()->nom }}" width="7%" height="7%"
                                        class="rounded-5">
                                </span> <span
                                    class="text-white">{{ Illuminate\Support\Str::words(!is_null(Auth::user()) ?? Auth::user()->prenom, 2, '..') }}</span>
                            </a>

                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item " href="/account"><span class="me-2">
                                            <img src="../assets/images/icons/user.svg" alt="" class=""
                                                style="width:60%;">

                                        </span>Profil</a></li>
                                <li><a class="dropdown-item text-primary" href="/deconnexion"><span class="me-2">

                                            <img src="../assets/images/icons/.svg" alt="" class="float-start">

                                        </span>Logout</a></li>

                            </ul>
                        </div>
                    @endif




                </div>
            </div>
        </div>
    </div>


    <div class="container">
        <div class="row align-items-center py-3 mt-1 mt-lg-0">
            <div class="col-xl-2 col-md-3 mb-4 mb-md-0 col-12 text-center text-md-start">
                <a href="../../index.html"><img src="../../assets/images/logo/freshcart-logo.svg"
                        alt="eCommerce HTML Template"></a>
            </div>

            <div class="col-xxl-6 col-xl-5 col-lg-6 col-md-9">
                <form action="#">
                    <div class="input-group">
                        <input class="form-control" type="search" placeholder="Search for products"
                            aria-label="Recipient's username" aria-describedby="button-addon2">
                        <button class="btn btn-primary" type="button" id="button-addon2">Search</button>
                    </div>
                </form>



            </div>
            <div class="col-xxl-4 col-xl-5 col-lg-3 d-none d-lg-block">
                <div class="d-flex align-items-center justify-content-between ms-4">
                    <div class="text-center">

                        <div class="dropdown">

                            <a href="#" class="text-reset" data-bs-toggle="dropdown" aria-expanded="false">
                                <div class="lh-1">
                                    <div class="position-relative d-inline-block mb-2">
                                        <i class="bi bi-bell fs-4"></i>
                                        <span
                                            class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                            1
                                            <span class="visually-hidden">unread messages</span>
                                        </span>
                                    </div>
                                    <p class="mb-0 d-none d-xl-block small">Notification</p>
                                </div>
                            </a>

                            <div class="dropdown-menu dropdown-menu-lg p-0">
                                <div>
                                    <h6 class="px-4 border-bottom py-3 mb-0">Notification
                                    </h6>
                                    <p class="mb-0 px-4 py-3 "><a href="#">Sign in</a> or <a
                                            href="#">register</a> in or so you don t have
                                        to
                                        enter your details every time</p>
                                </div>

                            </div>
                        </div>
                    </div>
                   @auth

                   @else
                    <div class="ms-6 text-center">
                        <a href="#" class="text-reset" data-bs-toggle="modal" data-bs-target="#userModal">
                            <div class="lh-1">
                                <div class="mb-2">
                                    <i class="bi bi-person-circle fs-4"></i>

                                </div>
                                <p class="mb-0 d-none d-xl-block small">Sign up</p>
                            </div>
                        </a>
                    </div>
                    @endauth

                    <div class="ms-6 text-center">
                        <a href="#" class="text-reset">
                            <div class="lh-1">
                                <div class="mb-2">
                                    <i class="bi bi-archive fs-4"></i>

                                </div>
                                <p class="mb-0 d-none d-xl-block small">Mes Annonces</p>
                            </div>
                        </a>
                    </div>
                    <div class="text-center ms-6">
                        <a data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" href="#offcanvasExample"
                            role="button" aria-controls="offcanvasRight" class="text-reset">
                            <div class="text-center">
                                <div class="">
                                    <i class="bi bi-cart2 fs-4"></i>


                                </div>
                                <p class="mb-0 d-none d-xl-block small">Shopping Cart</p>
                            </div>
                        </a>
                    </div>


                </div>
            </div>

        </div>

    </div>
</header>


<nav class="navbar navbar-expand-lg navbar-light navbar-default p-0 p-sm-0 navbar-offcanvas-color "
    aria-label="Offcanvas navbar large">
    <div class="container">


        <div class="offcanvas offcanvas-start" tabindex="-1" id="navbar-default"
            aria-labelledby="navbar-defaultLabel">
            <div class="offcanvas-header pb-1">
                <a href="./index.html"><img src="../../assets/images/logo/freshcart-logo.svg"
                        alt="eCommerce HTML Template"></a>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body" style="justify-content: space-around">


                <div class="">
                    <ul class="navbar-nav pb-3" >
                        <li class="nav-item dropdown me-5">
                            <a class="nav-link {{ Request::is('') ? 'active' : '' }}" href="/" role="button">
                              <i class="feather-icon icon-home me-2"></i>
                                Accueil
                            </a>
                        </li>
                        <li class="nav-item dropdown me-5">
                            <a class="nav-link {{ Request::is('troc') ? 'active' : '' }}" href="/troc"
                                role="button" aria-expanded="false">
                              <i class="feather-icon icon-align-center me-2"></i>
                                Troque
                            </a>
                        </li>
                        <li class="nav-item  me-5">
                            <a class="nav-link {{ Request::is('dons') ? 'active' : '' }}" href="/dons"
                                role="button" aria-expanded="false">
                              <i class="feather-icon icon-gift me-2"></i>
                                dons
                            </a>

                        </li>
                        <li class="nav-item me-5">
                            <a class="nav-link " href="/demandez" role="button" aria-expanded="false">
                              <i class="feather-icon icon-list me-2"></i>
                              Recherchez
                            </a>
                        </li>
                        <li class="nav-item me-5">
                            <a class="nav-link " href="/apropos">
                              <i class="feather-icon icon-users me-2"></i>
                              A propos
                            </a>
                        </li>
                    </ul>

                </div>
            </div>
        </div>
    </div>
</nav>



<!-- Shop Cart -->

<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
    <div class="offcanvas-header border-bottom">
        <div class="text-start">
            <h5 id="offcanvasRightLabel" class="mb-0 fs-4">Shop Cart</h5>
            <small>Location in 382480</small>
        </div>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">

        <div class="">
            <!-- alert -->
            <div class="alert alert-danger p-2" role="alert">
                You’ve got FREE delivery. Start <a href="javascript:void(0)" class="alert-link">checkout now!</a>
            </div>
            <ul class="list-group list-group-flush">
                <!-- list group -->
                <li class="list-group-item py-3 ps-0 border-top">
                    <!-- row -->
                    <div class="row align-items-center">
                        <div class="col-3 col-md-2">
                            <!-- img --> <img src="../../assets/images/products/product-img-1.jpg" alt="Ecommerce"
                                class="img-fluid">
                        </div>
                        <div class="col-4 col-md-6 col-lg-5">
                            <!-- title -->
                            <a href="../../pages/shop-single.html" class="text-inherit">
                                <h6 class="mb-0">Haldiram's Sev Bhujia</h6>
                            </a>
                            <span><small class="text-muted">.98 / lb</small></span>
                            <!-- text -->
                            <div class="mt-2 small lh-1"> <a href="javascript:void(0)"
                                    class="text-decoration-none text-inherit"> <span class="me-1 align-text-bottom">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                            class="feather feather-trash-2 text-success">
                                            <polyline points="3 6 5 6 21 6"></polyline>
                                            <path
                                                d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2">
                                            </path>
                                            <line x1="10" y1="11" x2="10" y2="17">
                                            </line>
                                            <line x1="14" y1="11" x2="14" y2="17">
                                            </line>
                                        </svg></span><span class="text-muted">Remove</span></a></div>
                        </div>
                        <!-- input group -->
                        <div class="col-3 col-md-3 col-lg-3">
                            <!-- input -->
                            <!-- input -->
                            <div class="input-group input-spinner  ">
                                <input type="button" value="-" class="button-minus  btn  btn-sm "
                                    data-field="quantity">
                                <input type="number" step="1" max="10" value="1" name="quantity"
                                    class="quantity-field form-control-sm form-input   ">
                                <input type="button" value="+" class="button-plus btn btn-sm "
                                    data-field="quantity">
                            </div>

                        </div>
                        <!-- price -->
                        <div class="col-2 text-lg-end text-start text-md-end col-md-2">
                            <span class="fw-bold">$5.00</span>

                        </div>
                    </div>

                </li>
                <!-- list group -->
                <li class="list-group-item py-3 ps-0">
                    <!-- row -->
                    <div class="row align-items-center">
                        <div class="col-3 col-md-2">
                            <!-- img --> <img src="../../assets/images/products/product-img-2.jpg" alt="Ecommerce"
                                class="img-fluid">
                        </div>
                        <div class="col-4 col-md-6 col-lg-5">
                            <!-- title -->
                            <a href="../../pages/shop-single.html" class="text-inherit">
                                <h6 class="mb-0">NutriChoice Digestive </h6>
                            </a>
                            <span><small class="text-muted">250g</small></span>
                            <!-- text -->
                            <div class="mt-2 small lh-1"> <a href="javascript:void(0)"
                                    class="text-decoration-none text-inherit"> <span class="me-1 align-text-bottom">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                            class="feather feather-trash-2 text-success">
                                            <polyline points="3 6 5 6 21 6"></polyline>
                                            <path
                                                d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2">
                                            </path>
                                            <line x1="10" y1="11" x2="10" y2="17">
                                            </line>
                                            <line x1="14" y1="11" x2="14" y2="17">
                                            </line>
                                        </svg></span><span class="text-muted">Remove</span></a></div>
                        </div>
                        <!-- input group -->
                        <div class="col-3 col-md-3 col-lg-3">
                            <!-- input -->
                            <!-- input -->
                            <div class="input-group input-spinner  ">
                                <input type="button" value="-" class="button-minus  btn  btn-sm "
                                    data-field="quantity">
                                <input type="number" step="1" max="10" value="1" name="quantity"
                                    class="quantity-field form-control-sm form-input   ">
                                <input type="button" value="+" class="button-plus btn btn-sm "
                                    data-field="quantity">
                            </div>
                        </div>
                        <!-- price -->
                        <div class="col-2 text-lg-end text-start text-md-end col-md-2">
                            <span class="fw-bold text-danger">$20.00</span>
                            <div class="text-decoration-line-through text-muted small">$26.00</div>
                        </div>
                    </div>

                </li>
                <!-- list group -->
                <li class="list-group-item py-3 ps-0">
                    <!-- row -->
                    <div class="row align-items-center">
                        <div class="col-3 col-md-2">
                            <!-- img --> <img src="../../assets/images/products/product-img-3.jpg" alt="Ecommerce"
                                class="img-fluid">
                        </div>
                        <div class="col-4 col-md-6 col-lg-5">
                            <!-- title -->
                            <a href="../../pages/shop-single.html" class="text-inherit">
                                <h6 class="mb-0">Cadbury 5 Star Chocolate</h6>
                            </a>
                            <span><small class="text-muted">1 kg</small></span>
                            <!-- text -->
                            <div class="mt-2 small lh-1"> <a href="javascript:void(0)"
                                    class="text-decoration-none text-inherit"> <span class="me-1 align-text-bottom">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                            class="feather feather-trash-2 text-success">
                                            <polyline points="3 6 5 6 21 6"></polyline>
                                            <path
                                                d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2">
                                            </path>
                                            <line x1="10" y1="11" x2="10" y2="17">
                                            </line>
                                            <line x1="14" y1="11" x2="14" y2="17">
                                            </line>
                                        </svg></span><span class="text-muted">Remove</span></a></div>
                        </div>
                        <!-- input group -->
                        <div class="col-3 col-md-3 col-lg-3">
                            <!-- input -->
                            <!-- input -->
                            <div class="input-group input-spinner  ">
                                <input type="button" value="-" class="button-minus  btn  btn-sm "
                                    data-field="quantity">
                                <input type="number" step="1" max="10" value="1" name="quantity"
                                    class="quantity-field form-control-sm form-input   ">
                                <input type="button" value="+" class="button-plus btn btn-sm "
                                    data-field="quantity">
                            </div>
                        </div>
                        <!-- price -->
                        <div class="col-2 text-lg-end text-start text-md-end col-md-2">
                            <span class="fw-bold">$15.00</span>
                            <div class="text-decoration-line-through text-muted small">$20.00</div>
                        </div>
                    </div>

                </li>
                <!-- list group -->
                <li class="list-group-item py-3 ps-0">
                    <!-- row -->
                    <div class="row align-items-center">
                        <div class="col-3 col-md-2">
                            <!-- img --> <img src="../../assets/images/products/product-img-4.jpg" alt="Ecommerce"
                                class="img-fluid">
                        </div>
                        <div class="col-4 col-md-6 col-lg-5">
                            <!-- title -->
                            <a href="../../pages/shop-single.html" class="text-inherit">
                                <h6 class="mb-0">Onion Flavour Potato</h6>
                            </a>
                            <span><small class="text-muted">250g</small></span>
                            <!-- text -->
                            <div class="mt-2 small lh-1"> <a href="javascript:void(0)"
                                    class="text-decoration-none text-inherit"> <span class="me-1 align-text-bottom">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                            class="feather feather-trash-2 text-success">
                                            <polyline points="3 6 5 6 21 6"></polyline>
                                            <path
                                                d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2">
                                            </path>
                                            <line x1="10" y1="11" x2="10" y2="17">
                                            </line>
                                            <line x1="14" y1="11" x2="14" y2="17">
                                            </line>
                                        </svg></span><span class="text-muted">Remove</span></a></div>
                        </div>
                        <!-- input group -->
                        <div class="col-3 col-md-3 col-lg-3">
                            <!-- input -->
                            <!-- input -->
                            <div class="input-group input-spinner  ">
                                <input type="button" value="-" class="button-minus  btn  btn-sm "
                                    data-field="quantity">
                                <input type="number" step="1" max="10" value="1" name="quantity"
                                    class="quantity-field form-control-sm form-input   ">
                                <input type="button" value="+" class="button-plus btn btn-sm "
                                    data-field="quantity">
                            </div>
                        </div>
                        <!-- price -->
                        <div class="col-2 text-lg-end text-start text-md-end col-md-2">
                            <span class="fw-bold">$15.00</span>
                            <div class="text-decoration-line-through text-muted small">$20.00</div>
                        </div>
                    </div>

                </li>
                <!-- list group -->
                <li class="list-group-item py-3 ps-0 border-bottom">
                    <!-- row -->
                    <div class="row align-items-center">
                        <div class="col-3 col-md-2">
                            <!-- img --> <img src="../../assets/images/products/product-img-5.jpg" alt="Ecommerce"
                                class="img-fluid">
                        </div>
                        <div class="col-4 col-md-6 col-lg-5">
                            <!-- title -->
                            <a href="../../pages/shop-single.html" class="text-inherit">
                                <h6 class="mb-0">Salted Instant Popcorn </h6>
                            </a>
                            <span><small class="text-muted">100g</small></span>
                            <!-- text -->
                            <div class="mt-2 small lh-1"> <a href="javascript:void(0)"
                                    class="text-decoration-none text-inherit"> <span class="me-1 align-text-bottom">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                            class="feather feather-trash-2 text-success">
                                            <polyline points="3 6 5 6 21 6"></polyline>
                                            <path
                                                d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2">
                                            </path>
                                            <line x1="10" y1="11" x2="10" y2="17">
                                            </line>
                                            <line x1="14" y1="11" x2="14" y2="17">
                                            </line>
                                        </svg></span><span class="text-muted">Remove</span></a></div>
                        </div>
                        <!-- input group -->
                        <div class="col-3 col-md-3 col-lg-3">
                            <!-- input -->
                            <!-- input -->
                            <div class="input-group input-spinner  ">
                                <input type="button" value="-" class="button-minus  btn  btn-sm "
                                    data-field="quantity">
                                <input type="number" step="1" max="10" value="1" name="quantity"
                                    class="quantity-field form-control-sm form-input   ">
                                <input type="button" value="+" class="button-plus btn btn-sm "
                                    data-field="quantity">
                            </div>
                        </div>
                        <!-- price -->
                        <div class="col-2 text-lg-end text-start text-md-end col-md-2">
                            <span class="fw-bold">$15.00</span>
                            <div class="text-decoration-line-through text-muted small">$25.00</div>
                        </div>
                    </div>

                </li>

            </ul>
            <!-- btn -->
            <div class="d-flex justify-content-between mt-4">
                <a href="javascript:void(0)" class="btn btn-primary">Continue Shopping</a>
                <a href="javascript:void(0)" class="btn btn-dark">Update Cart</a>
            </div>

        </div>
    </div>
</div>
<!-- Modal -->

<livewire:auth.register>


<div class="bg-white position-fixed bottom-0 w-100  z-1 shadow-lg d-block d-lg-none text-center py-4">
    <div class="d-flex align-items-center ">


        <div class="w-25">
            <!-- Button -->
            <button class="navbar-toggler collapsed d-lg-none" type="button" data-bs-toggle="offcanvas"
                data-bs-target="#navbar-default" aria-controls="navbar-default" aria-expanded="false"
                aria-label="Toggle navigation">
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor"
                    class="bi bi-text-indent-left text-primary" viewBox="0 0 16 16">
                    <path
                        d="M2 3.5a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5zm.646 2.146a.5.5 0 0 1 .708 0l2 2a.5.5 0 0 1 0 .708l-2 2a.5.5 0 0 1-.708-.708L4.293 8 2.646 6.354a.5.5 0 0 1 0-.708zM7 6.5a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 3a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5zm-5 3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5z" />
                </svg>
            </button>
        </div>


        <div class="dropdown  w-25 ms-2">

            <a href="#" class="text-inherit" data-bs-toggle="dropdown" aria-expanded="false">
                <div class="text-center">
                    <div class="position-relative d-inline-block">
                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor"
                            class="bi bi-bell" viewBox="0 0 16 16">
                            <path
                                d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zM8 1.918l-.797.161A4.002 4.002 0 0 0 4 6c0 .628-.134 2.197-.459 3.742-.16.767-.376 1.566-.663 2.258h10.244c-.287-.692-.502-1.49-.663-2.258C12.134 8.197 12 6.628 12 6a4.002 4.002 0 0 0-3.203-3.92L8 1.917zM14.22 12c.223.447.481.801.78 1H1c.299-.199.557-.553.78-1C2.68 10.2 3 6.88 3 6c0-2.42 1.72-4.44 4.005-4.901a1 1 0 1 1 1.99 0A5.002 5.002 0 0 1 13 6c0 .88.32 4.2 1.22 6z" />
                        </svg>
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                            1
                            <span class="visually-hidden">unread messages</span>
                        </span>
                    </div>

                </div>
            </a>

            <div class="dropdown-menu dropdown-menu-lg p-0">
                <div>
                    <h6 class="px-4 border-bottom py-3 mb-0">Notification
                    </h6>
                    <p class="mb-0 px-4 py-3"><a href="#">Sign in</a> or <a href="#">register</a> in or
                        so you don t have to
                        enter your details every time</p>
                </div>

            </div>
        </div>

        <div class="w-25 ms-2">
            <a href="#" class="text-inherit" data-bs-toggle="modal" data-bs-target="#userModal">
                <div class="text-center">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor"
                            class="bi bi-person" viewBox="0 0 16 16">
                            <path
                                d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0Zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4Zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10Z" />
                        </svg>

                    </div>

                </div>
            </a>
        </div>
        <div class="w-25 ms-2">
            <a href="#" class="text-inherit">
                <div class="text-center">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor"
                            class="bi bi-archive" viewBox="0 0 16 16">
                            <path
                                d="M0 2a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1v7.5a2.5 2.5 0 0 1-2.5 2.5h-9A2.5 2.5 0 0 1 1 12.5V5a1 1 0 0 1-1-1V2zm2 3v7.5A1.5 1.5 0 0 0 3.5 14h9a1.5 1.5 0 0 0 1.5-1.5V5H2zm13-3H1v2h14V2zM5 7.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5z" />
                        </svg>

                    </div>

                </div>
            </a>
        </div>
        <div class="w-25 ms-2">
            <a data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" href="#offcanvasExample" role="button"
                aria-controls="offcanvasRight" class="text-inherit">
                <div class="text-center">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor"
                            class="bi bi-cart2" viewBox="0 0 16 16">
                            <path
                                d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5zM3.14 5l1.25 5h8.22l1.25-5H3.14zM5 13a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0zm9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0z" />
                        </svg>

                    </div>

                </div>
            </a>
        </div>
        <div class="w-25 ms-2">
            <a class="text-inherit" data-bs-toggle="offcanvas" href="#offcanvasCategory" role="button"
                aria-controls="offcanvasCategory">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                    class="bi bi-funnel" viewBox="0 0 16 16">
                    <path
                        d="M1.5 1.5A.5.5 0 0 1 2 1h12a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.128.334L10 8.692V13.5a.5.5 0 0 1-.342.474l-3 1A.5.5 0 0 1 6 14.5V8.692L1.628 3.834A.5.5 0 0 1 1.5 3.5v-2zm1 .5v1.308l4.372 4.858A.5.5 0 0 1 7 8.5v5.306l2-.666V8.5a.5.5 0 0 1 .128-.334L13.5 3.308V2h-11z" />
                </svg></a>

        </div>


    </div>
</div>
