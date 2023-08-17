<header style="padding-right: none!important">
    <div class="py-1" style="background-color: #0e1c7d;">
        <div class="container">
            <div class="row">

                <div class="col-3 text-start  d-none d-md-block">
                    <a href="tel:+2252224202321" class="text-decoration-none text-white">
                        +225 2224202321
                    </a>
                </div>
                <div class="col-md-5 col-8 text-center text-md-start">
                    <span id="bienvenue" class="textblink" style="font-weight: bold;" >
                        <marquee behavior="" direction="left"> Troc Moi est une plateforme qui veut en finir avec les
                            barrières et permettre de troquer objet contre objet </marquee>
                    </span>
                </div>
                <div class="col-4 col-xs-2 text-center d-md-block">
                  
                        @if(!Auth::user())
                        <a class="text-decoration-none text-white " style="font-family: Century Gothic; font-weight: 600;" data-bs-toggle="modal"
                            data-bs-target="#exampleModal" href="/login" >  Connexion 
                        </a>
                        @else
                        <div class="dropdown">
                        <a class=" text-center text-decoration-none text-white" href="#" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <span class="me-1">
                                <img src="{{ url('../images/User/'.Auth::user()->photo) }}" alt="TROC-MOI {{Auth::user()->nom}}"
                                    width="7%" height="7%" class="rounded-5">
                            </span> <span class="text-white">{{Auth::user()-> nom}} </span>
                        </a>

                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item " href="/account"><span class="me-2">
                                        <img src="../assets/images/icons/user.svg" alt="" class="" style="width:60%;">

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

    <div class="navbar navbar-light py-lg-3 pt-1  pb-3">
        <div class="container">
            <div class="row w-100 align-items-center g-lg-2 g-9">
                <div class="col-xxl-2 col-lg-2">

                    <a class="navbar-brand d-none d-lg-block" href="/">
                        <img src="{{ asset('./assets/images/logotroc.jpg') }}" style="width: 40%; " alt="Trock Moi logo">

                    </a>

                    
                    <div class="d-flex justify-content-between w-100 d-lg-none ms-4">
                        <a class="navbar-brand" href="/">
                            <img src="{{ asset('./assets/images/logotroc.jpg') }}" style="width: 40%; " alt="Trock Moi logo">

                        </a>

                        <div class="d-flex align-items-center lh-1 " style="margin-left: 13%!important;">

                            <div class="list-inline ms-5">
                                <div class="list-inline-item">

                                    <a href="/account" class="text-muted" >
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round" class="feather feather-user">
                                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                            <circle cx="12" cy="7" r="4"></circle>
                                        </svg>
                                    </a>
                                </div>
             

                            </div>
                            <!-- Button -->
                            <button class="navbar-toggler collapsed" type="button" data-bs-toggle="offcanvas" data-bs-target="#navbar-default" aria-controls="navbar-default" aria-expanded="false" aria-label="Toggle navigation">
                                <svg xmlns="http://www.w3.org/2000/svg" width="28" height="25" fill="currentColor" class="bi bi-text-indent-left text-primary" viewBox="0 0 16 16">
                                    <path d="M2 3.5a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5zm.646 2.146a.5.5 0 0 1 .708 0l2 2a.5.5 0 0 1 0 .708l-2 2a.5.5 0 0 1-.708-.708L4.293 8 2.646 6.354a.5.5 0 0 1 0-.708zM7 6.5a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 3a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5zm-5 3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5z"></path>
                                </svg>
                                </button>

                        </div>
                    </div>

                </div>


                <div class="col-md-2 col-lg-10 col-xxl-1 text-end d-none d-lg-block" >
                         <nav class="navbar navbar-expand-lg navbar-light navbar-default pt-0 pb-0">
                             <ul class="navbar-nav ms-5">
                                    <li class="nav-item ">
                                        <a class="nav-link active"  href="/" role="button"    >
                                            Accueil
                                        </a>
                                    </li>
                                    <li class="nav-item ">
                                        <a class="nav-link " href="/troc" role="button"   aria-expanded="false">
                                            Troque
                                        </a>
                                    </li>
                                    <li class="nav-item ">
                                        <a class="nav-link " href="/dons" role="button"   aria-expanded="false">
                                            dons
                                        </a>
                                    </li>

                                    <li class="nav-item ">
                                        <a class="nav-link " href="/demandez" role="button"   aria-expanded="false">
                                            Recherchez
                                        </a>
                                    </li>


                                    <li class="nav-item ">
                                        <a class="nav-link " href="/apropos" >
                                            About
                                        </a>
                                    </li>




                                    @if(Auth::guest())

                                    <div class="dropdown me-3 d-none d-lg-block " style="margin-left: 8%;">
                                        <a href="/publiez"><button class="btn btn-primary  " type="button"
                                                aria-expanded="false">
                                                <span class="me-1">
                                                   
                                                </span>PUBLIEZ
                                            </button>
                                        </a>

                                    </div>


                                    <div class="dropdown me-3 d-none d-lg-block float-end">
                                        <a href="/register"><button class="btn btn-info ">
                                                <span class="me-1">
                                                </span>INSCRIPTION
                                            </button>
                                        </a>

                                    </div>
                                    @else

                                    <div class="dropdown me-3 d-none d-lg-block " style="margin-left: 30%;">
                                        <a href="/publiez"><button class="btn  px-6 blink" style="background-color: #d30000; color: white;">
                                                <span class="me-1">
                                                  
                                                </span>PUBLIEZ
                                            </button>
                                        </a>

                                    </div>

                                    @endif

                            </ul>
                        </nav>
                </div>
            </div>
        </div>
    </div>

</header>

<!-- fin du header -->

<!-- 
<div class="navbar navbar-light py-lg-4 pt-3 px-0 pb-0">
    <div class="container">
        <div class="row w-100 align-items-center g-lg-2 g-0">

            <div class="col-xxl-2 col-lg-3">
                
                    <div class="container px-0 px-md-3">

                        <a class="navbar-brand d-none d-lg-block me-7" href="./index.html">
                            <img src="./assets/images/logo/t-logo.svg" alt="Troc Moi">

                        </a>

                         <div class="dropdown me-3 d-none d-lg-block">
                            <a href="/viewCategorie"><button class="btn btn-primary px-6 " type="button"  
                                aria-expanded="false">
                                <span class="me-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"
                                    class="feather feather-grid">
                                    <rect x="3" y="3" width="7" height="7"></rect>
                                    <rect x="14" y="3" width="7" height="7"></rect>
                                    <rect x="14" y="14" width="7" height="7"></rect>
                                    <rect x="3" y="14" width="7" height="7"></rect>
                                    </svg></span> Toutes les Categories
                                </button> </a> 
        
                        </div> -->



            <div class="offcanvas offcanvas-start p-4 p-lg-0" id="navbar-default">

                            <div class="d-flex justify-content-between align-items-center mb-2 d-block d-lg-none">
                                <a href="/"><img src="" alt="TrocMoi"></a>
                                <button type="button" class="btn-close" data-bs-dismiss="offcanvas"
                                    aria-label="Close"></button>
                            </div>

                            <div class="d-block d-lg-none mb-2 pt-2">
                                <a class="btn btn-primary w-100 d-flex justify-content-center align-items-center"
                                    href="/viewCategorie" role="button">
                                    <span class="me-2"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"
                                            stroke-linecap="round" stroke-linejoin="round" class="feather feather-grid">
                                            <rect x="3" y="3" width="7" height="7"></rect>
                                            <rect x="14" y="3" width="7" height="7"></rect>
                                            <rect x="14" y="14" width="7" height="7"></rect>
                                            <rect x="3" y="14" width="7" height="7"></rect>
                                        </svg></span> Toutes les Categories
                                </a>
                            </div>


                            <div class="d-none d-lg-block">
                                <ul class="navbar-nav ms-3">
                                    <li class="nav-item">
                                        <a class="nav-link " href="/" role="button" aria-expanded="false">
                                            Accueil
                                        </a>
                                    </li>
                                    <li class="nav-item ">
                                        <a class="nav-link " href="/troc" role="button" aria-expanded="false">
                                            Troque
                                        </a>
                                    </li>
                                    <li class="nav-item ">
                                        <a class="nav-link " href="/dons" role="button" aria-expanded="false">
                                            dons
                                        </a>
                                    </li>

                                    <li class="nav-item ">
                                        <a class="nav-link " href="/demandez" role="button" aria-expanded="false">
                                            Recherchez
                                        </a>
                                    </li>


                                    <li class="nav-item ">
                                        <a class="nav-link " href="/apropos">
                                            About
                                        </a>
                                    </li>




                                    @if(Auth::guest())


                                    <div class="dropdown me-3 d-none d-lg-block float-end">
                                        <a href="/register"><button class="btn btn-info px-3 " type="button"
                                                aria-expanded="false">
                                                <span class="me-1">

                                                </span>INSCRIPTION
                                            </button>
                                        </a>

                                    </div>





                                    @endif







                                </ul>
                            </div>


                            <div class="d-block d-lg-none">
                                <ul class="navbar-nav ">
                                    <li class="nav-item ">
                                        <a class="nav-link " href="/" role="button" aria-expanded="false">
                                            Accueil
                                        </a>
                                    </li>
                                    <li class="nav-item ">
                                        <a class="nav-link " href="/troc" role="button" aria-expanded="false">
                                            Troque
                                        </a>
                                    </li>
                                    <li class="nav-item ">
                                        <a class="nav-link " href="/dons" role="button" aria-expanded="false">
                                            dons
                                        </a>
                                    </li>
                                    <li class="nav-item ">
                                        <a class="nav-link " href="/demandez" role="button" aria-expanded="false">
                                            Recherchez
                                        </a>
                                    </li>
                                    <li class="nav-item ">
                                        <a class="nav-link " href="/apropos" role="button" aria-expanded="false">
                                            about
                                        </a>
                                    </li>


                                </ul>
                            </div>


                        </div>
                    </div>

                </nav>
            </div>


        </div>
    </div>
</div> 





