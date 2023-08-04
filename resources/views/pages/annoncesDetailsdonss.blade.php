@extends('../layouts/app')


@section('content')


<main>
    <div class="mt-3">
        <div class="container-xl">
            <!-- row -->
            <div class="row ">
                <!-- col -->
                <div class="col-12">
                    <!-- breadcrumb -->
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="/">Accueil</a></li>
                            <li class="breadcrumb-item"><a href="/donss">donss</a></li>
                            @foreach($annonce->souscat()->get() as $souscats)

                            <li class="breadcrumb-item active" aria-current="page">{{$souscats->libelle}}</li>

                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <section class="mt-3">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <!-- Crossfade -->
                    <div id="carouselExampleFade" class="carousel slide carousel-fade " data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img itemprop="photo" src="../images/Annonce/{{$annonce->photo}}" class="d-block w-100 "
                                    alt="...">
                            </div>
                            @if(!is_null($annonce->images_secondaire) && $annonce->images_secondaire != "NULL")
                            @foreach(json_decode($annonce->images_secondaire) as $img)
                            <div class="carousel-item">
                                <img src="../images/Annonce/{{$img}}" class="d-block w-100 " alt="...">
                            </div>
                            @endforeach
                            @endif
                          
                           
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </a>
                        
                    </div>

                </div>


                <!-- Nom et details -->
                <div class="col-md-6">


                    <!-- Section Infos Annnonce -->
                    <div class="ps-lg-10 mt-2 mt-md-0">
                        <!-- content -->
                        <a href="/searchAnnonceSouscat/{{$souscats->slug}}"
                            class="mb-2 d-block">{{$souscats->libelle}}</a>
                        <!-- heading -->
                        <h1 class="mb-1">{{$annonce->titre}} </h1>

                        <div class="fs-4 mt-3">
                            <!-- price --><span class="fw-bold text-dark">{{number_format($annonce->prix,0,',',' ')}}
                                FCFA</span>
                        </div>
                        <!-- hr -->
                        <hr class="my-2">

                    </div>


                    <div>
                        <!-- table -->
                        <table class="table table-borderless">

                            <tbody>
                                <tr>
                                    <td>Categorie :</td>
                                    <td>{{$souscats->libelle}}</td>

                                </tr>
                                <tr>
                                    <td>publicateurs :</td>
                                    @foreach($annonce->user()->get() as $utilisat)
                                    <td> <a href="{{ route('latestModel.index_page',$utilisat->slug) }}">{{$utilisat->prenom}}
                                            {{$utilisat->nom}}</a></td>
                                    @endforeach
                                </tr>
                                <tr>
                                    <td>Type:</td>
                                    <td>{{$annonce->type}}</td>

                                </tr>
                            </tbody>
                        </table>

                    </div>

                    <hr class="my-2">


                    <!-- Boutton Appele -->
                    <div class="mt-2 row justify-content-end g-2 align-items-center">

                        <div class="col-xxl-4 col-lg-6 col-md-5 col-5 d-grid ">
                                @foreach($annonce->user()->get() as $utilisateur)
                                    <!-- btn -->  <a href="tel:{{$utilisateur->contact}}" type="button" class="btn btn-primary"><i class="feather-icon icon-phone-outgoing me-2"></i>Appelez</a>
                             @endforeach
                        </div>
                        <div class="col-md-4 col-4">
                            <!-- btn -->
                            <!-- btn --> <a href="https://api.whatsapp.com/send?phone={{$annonce->contactWhatsapp}}"
                                type="button" class="btn btn-outline-success"><i
                                    class="bi bi-whatsapp me-1"></i>whatsApp</a>
                            <!-- <a class="btn btn-light " href="https://api.whatsapp.com/send?phone={{$annonce->contactWhatsapp}}"><i class="feather-icon icon-message-circle"></i></a> -->
                        </div>
                    </div>



                    <div class="mt-4">
                        <!-- dropdown -->
                        <div class="dropdown">
                            <a class="btn btn-outline-secondary dropdown-toggle" href="#" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Share
                            </a>

                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#"><i class="bi bi-facebook me-2"></i>Facebook</a>
                                </li>
                                <li><a class="dropdown-item" href="#"><i class="bi bi-twitter me-2"></i>Twitter</a></li>
                                <li><a class="dropdown-item" href="#"><i class="bi bi-instagram me-2"></i>Instagram</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- hr -->
                    <hr class="my-6">

                    <!-- <div class="ps-lg-10 mt-4 mt-md-0 rounded-2"
                        style="background-color:#FBE58D ; font-family: poppins; box-shadow: 3px 1px 15px 5px;">
                        <!-- heading 
                        <h5 class=" text-danger mt-5">ATTENTION AUX ARNAQUES ! COMMENT LES EVITER ?</h5>

                        <div class="fs-4 mt-3">
                            <p style="font-size: 0.8rem; padding-right:5%; ">
                                L'équipe Trock Moi surveille en permanence les annonces en général elle détecte
                                rapidement les arnaqueurs ou spammeurs. Toutefois il arrive que certains d'entre eux
                                passent entre les mailles du filet, et il convient d'être très prudent lors de vos
                                transactions et échanges de messages. </br>
                            <ul style="font-size: 0.8rem;">
                                <li>Ne jamais envoyer d'argent </li>
                                <li>Ne jamais transmettre son numéro de carte bleue ou son RIB à un inconnu ou à une
                                    entreprise étrangère (par message privé, email, téléphone ou sur le site d'une
                                    entreprise).</li>
                                <li>N’envoyez jamais de copie de documents officiels (carte grise, pièces d’identité,)
                                </li>
                            </ul>
                            </p>
                        </div>
                        <!-- hr 
                        <hr class="my-3">

                    </div> -->



                </div>
            </div>
        </div>
        </div>
        </div>
    </section>
    <section class="mt-lg-3 ">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ul class="nav nav-pills nav-lb-tab" id="myTab" role="tablist">
                        <!-- nav item -->
                        <li class="nav-item" role="presentation">
                            <!-- btn --> <button class="nav-link active" id="product-tab" data-bs-toggle="tab"
                                data-bs-target="#product-tab-pane" type="button" role="tab"
                                aria-controls="product-tab-pane" aria-selected="true">description</button>
                        </li>
                        <!-- nav item -->
                        <li class="nav-item" role="presentation">
                            <!-- btn --> <button class="nav-link" id="details-tab" data-bs-toggle="tab"
                                data-bs-target="#details-tab-pane" type="button" role="tab"
                                aria-controls="details-tab-pane" aria-selected="false">Information</button>
                        </li>
                    </ul>
                    <!-- tab content -->
                    <div class="tab-content" id="myTabContent">
                        <!-- tab pane -->
                        <div class="tab-pane fade show active" id="product-tab-pane" role="tabpanel"
                            aria-labelledby="product-tab" tabindex="0">
                            <div class="my-8">
                                {!!$annonce->description!!}
                            </div>
                        </div>
                        <!-- tab pane -->
                        <div class="tab-pane fade" id="details-tab-pane" role="tabpanel" aria-labelledby="details-tab"
                            tabindex="0">
                            <div class="my-8">
                                <div class="row">
                                    <div class="col-12">
                                        <h4 class="mb-4">Details</h4>
                                    </div>
                                    <div class="col-12 col-lg-6">
                                        <table class="table table-striped">
                                            <!-- table -->
                                            <tbody>
                                                <tr>
                                                    <th>Titre</th>
                                                    <td> {{$annonce->titre}}</td>
                                                </tr>
                                                <tr>
                                                    <th> Type</th>
                                                    <td> {{$annonce->type}}</td>
                                                </tr>
                                                <tr>
                                                    <th>prix</th>
                                                    <td>{{$annonce->prix}} XOF</td>
                                                </tr>
                                                <tr>
                                                    <th>Categorie</th>
                                                    <td>{{$souscats->libelle}}</td>
                                                </tr>
                                                @foreach($annonce->user()->get() as $utilisat)
                                                <tr>
                                                    <th>Nom du publicateur</th>
                                                    <a href="{{ route('latestModel.index_page',$utilisat->slug) }}">
                                                        <td>{{$utilisat->nom}}</td>
                                                    </a>
                                                </tr>
                                                <tr>
                                                    <th>Prenom du publicateur</th>
                                                    <a href="{{ route('latestModel.index_page',$utilisat->slug) }}">
                                                        <td>{{$utilisat->prenom}}</td>
                                                    </a>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="col-12 col-lg-6">
                                        <table class="table table-striped">
                                            <!-- table -->
                                            <tbody>
                                                <tr>
                                                    <th>Whatssap :</th>
                                                    <td>{{$annonce->contactWhatsapp}}</td>
                                                </tr>
                                                <tr>
                                                    <th>Email</th>
                                                    <td>{{$annonce->email}}</td>
                                                </tr>
                                                <tr>
                                                    <th>Nom Facebook</th>
                                                    <td>{{$annonce->facebook}}</td>
                                                </tr>
                                                @foreach($annonce->villes()->get() as $ville)
                                                <tr>
                                                    <th>Villes</th>
                                                    <td>{{$ville->name}}</td>
                                                </tr>
                                                @endforeach
                                                <tr>
                                                    <th>Adresse</th>
                                                    <td>{{$annonce->Lieu}}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>




    <!-- section -->
    <section class="my-lg-6 my-4">
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-12">
                    <!-- heading -->
                    <h3>Autres Annonces</h3>
                </div>
            </div>
            <!-- row -->
            <div class="row g-4 row-cols-lg-4 row-cols-2 row-cols-md-3  my-2">
                @foreach($anno as $annos)
                <div class="col">
                    <div class="card card-product">
                        <div class="card-body">

                            <div class="text-center position-relative ">

                                <a href="/annonceDetaildonss/{{$annos->slug}}"> <img
                                        src="../images/Annonce/{{$annos->photo}}" alt="Troc moi"
                                        class="mb-3 img-fluid"></a>



                            </div>
                            <div class="text-small mb-1"><a href="/annonceDetaildonss/"
                                    class="text-decoration-none text-muted"><small>Abidjan</small></a></div>
                            <div style="height:19px;" class="overflow-hidden justify-content-between">
                                <h2 class="fs-6 "><a href="./pages/shop-single.html"
                                        class="text-inherit text-decoration-none">{{$annos->titre}}</a></h2>
                            </div>

                            <div>

                                @if( date('j M, Y', strtotime($annos->created_at)) == $today )
                                <span class="text-muted small">Aujourd'hui</span>
                                @else
                                <span
                                    class="text-muted small">{{ date('j M, Y', strtotime($annos->created_at)) }}</span>
                                @endif
                            </div>
                            <div class="d-flex justify-content-between align-items-center mt-3">
                                <div><span class="text-dark">{{number_format($annos->prix,0,',',' ')}} FCFA</span>
                                </div>
                            </div>
                            <div><a href="/annonceDetaildonss/"
                                    class="btn btn-outline-primary btn-sm mt-2  align-items-center">Achetez </a></div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="d-grid mt-4 w-20 float-center">
                <a href="/AllAnnonce" class="btn btn-primary ">
                    <line x1="12" y1="5" x2="12" y2="19"></line>
                    <line x1="5" y1="12" x2="19" y2="12"></line>
                    </svg> PLUS D'ANNONCES <i class="feather-icon icon-arrow-right ms-1"></i>
                </a>
            </div>
        </div>
        </div>
    </section>
    @endforeach
</main>




@endsection