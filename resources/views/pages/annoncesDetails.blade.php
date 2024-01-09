@extends('../layouts/app')


@section('content')


<main>
  <div class="mt-2">
    <div class="container-xl">
      <!-- row -->
      <div class="row ">
        <!-- col -->
        <div class="col-12">
          <!-- breadcrumb -->
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
              <li class="breadcrumb-item"><a href="#">Accueil</a></li>
              <li class="breadcrumb-item"><a href="/troc">Troque</a></li>
              @foreach($annonce->souscat()->get()  as $souscats)

              <li class="breadcrumb-item active" aria-current="page">{{$souscats->libelle}}</li>
            </ol>
          </nav>
        </div>
      </div>
    </div>
  </div>
  <section class="mt-8">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <!-- img slide -->
          <div class="product" id="product">
            <div class="zoom" onmousemove="zoom(event)"
              style="background-image: url(../images/Annonce/{{$annonce->photo}})">
              <!-- img -->
              <!-- img --><img src="../images/Annonce/{{$annonce->photo}}" alt="">
            </div>
            @if(!is_null($annonce->images_secondaire) && $annonce->images_secondaire != "NULL")
              @foreach(json_decode($annonce->images_secondaire) as $img)
            <div>
              <div class="zoom" onmousemove="zoom(event)"
                style="background-image: url(../images/Annonce/{{$img}})">
                <!-- img -->
                <img src="{{ asset('../images/Annonce/'.$img)}}" alt="">
              </div>
            </div>
           @endforeach
           @endif
          </div>
          <!-- product tools -->
          <div class="product-tools">
            <div class="thumbnails row g-3" id="productThumbnails">
              <div class="col-3" style="width:17%;">
                <div class="thumbnails-img">
                  <!-- img -->
                  <img src="../images/Annonce/{{$annonce->photo}}" alt="">
                </div>
              </div>
              @if(!is_null($annonce->images_secondaire) && $annonce->images_secondaire != "NULL")
              @foreach(json_decode($annonce->images_secondaire) as $img)
              <div class="col-3" style="width:17%;">
                <div class="thumbnails-img">
                  <!-- img -->
                  <img src="{{asset('../images/Annonce/'.$img)}}" alt="">
                </div>
              </div>
              @endforeach
           @endif
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="ps-lg-10 mt-6 mt-md-0">
            <!-- content -->
            <a href="/searchAnnonceSouscat/{{$souscats->slug}}" class="mb-4 d-block">{{$souscats->libelle}}</a>
            <!-- heading -->
            <h2 class="mb-1" style="font-family: poppins;"> {{$annonce->titre}}

            @foreach($annonce->annonce_prenium()->get() as $annonce_sponso)
            @if(isset($annonce_sponso) && $annonce_sponso->date_fin >= date('Y-m-d') && $annonce_sponso->etat == 1 )
           <img src="{{ asset('../assets/images/premium.gif') }}" alt="">
            @endif
            @endforeach

          </h2>



            <div class="fs-4 mt-4">
              <!-- price --><span class="fw-bold text-dark">{{number_format($annonce->prix,0,',',' ')}} FCFA</span>
            </div>
            <!-- hr -->
            <hr class="my-6">



                <!-- input -->


            </div>

            <div>
                <!-- table -->
                    <table class="table table-borderless">

                        <tbody>
                        <tr>
                            <td class="text-dark">Categorie :</td>
                            <td>{{$souscats->libelle}}</td>



                        </tr>
                        <tr>
                            <td  class="text-dark">nom et prenoms</td>
                            @foreach($annonce->user()->get() as $utilisat)
                            <td>  <a href="{{ route('latestModel.index_page',$utilisat->slug) }}">{{$utilisat->prenom}} {{$utilisat->nom}}</a></td>
                                @endforeach

                        </tr>

                    
                        <tr>
                            <td  class="text-dark">Type:</td>
                            <td>{{$annonce->type}}</td>
                        </tr>

                        <tr>
                          <td>
                          <i class="bi bi-eye-fill"></i> Visites :</td>
                          <td class="text-dark"> <strong>{{$annonce->view_count_annonces}}</strong></td>
                        </tr>
                        </tbody>
                    </table>

            </div>


            <!-- hr -->
            <hr class="my-6">

            <div class="mt-3 row justify-content-end g-2 align-items-center">

            <div class="col-xxl-4 col-lg-4 col-md-5 col-5 d-grid">
              <!-- button -->
              @foreach($annonce->user()->get() as $utilisateur)
              <!-- btn -->  <a href="tel:{{$utilisateur->contact}}" type="button" class="btn btn-primary"><i class="feather-icon icon-phone-outgoing me-2"></i>Appelez</a>
              @endforeach
            </div>
            <div class="col-md-4 col-4">
              <!-- btn -->
              <!-- btn --> <a href="https://api.whatsapp.com/send?phone={{$annonce->contactWhatsapp}}" type="button" class="btn btn-outline-success"><i class="bi bi-whatsapp me-1"></i>whatsApp</a>
              <!-- <a class="btn btn-light " href="https://api.whatsapp.com/send?phone={{$annonce->contactWhatsapp}}"><i class="feather-icon icon-message-circle"></i></a> -->
            </div>
          </div>
            <div class="mt-8">
              <!-- dropdown -->
              <div class="dropdown">
                <a class="btn btn-outline-secondary dropdown-toggle" href="#" role="button"
                  data-bs-toggle="dropdown" aria-expanded="false">
                  Share
                </a>

                <ul class="dropdown-menu" >
                  <li><a class="dropdown-item" href="#"><i class="bi bi-facebook me-2"></i>Facebook</a></li>
                  <li><a class="dropdown-item" href="#"><i class="bi bi-twitter me-2"></i>Twitter</a></li>
                  <li><a class="dropdown-item" href="#"><i class="bi bi-instagram me-2"></i>Instagram</a></li>
                </ul>
              </div>
            </div>



          </div>
          <!-- div pour l'alerte -->
                <div class="mt-8">
                    <div class="ps-lg-10 mt-6 mt-md-0  rounded-3 p-3" style="background-color:#FBE58D ; font-family: poppins; box-shadow: 1px 3px 7px 2px;">
                            <!-- heading -->
                            <h5 class=" text-danger mt-8">ATTENTION AUX ARNAQUES ! COMMENT LES EVITER ?</h5>

                            <div class="fs-4 mt-4">
                                <p style="font-size: 0.8rem; padding-right:5%; ">
                                            L'équipe Trock Moi surveille en permanence les annonces en général elle détecte rapidement les arnaqueurs ou spammeurs. Toutefois il arrive que certains d'entre eux passent entre les mailles du filet, et il convient d'être très prudent lors de vos transactions et échanges de messages. </br>
                                            <ul style="font-size: 0.8rem;">
                                                <li>Ne jamais envoyer d'argent </li>
                                                <li>Ne jamais transmettre son numéro de carte bleue ou son RIB à un inconnu ou à une entreprise étrangère (par message privé, email, téléphone ou sur le site d'une entreprise).</li>
                                                <li>N’envoyez jamais de copie de documents officiels (carte grise, pièces d’identité,)</li>
                                            </ul>
                                </p>
                            </div>
                            <!-- hr -->


                    </div>
                </div>
        </div>

      </div>

    </div>
  </section>


  <section class="mt-lg-4 ">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <ul class="nav nav-pills nav-lb-tab" id="myTab" role="tablist">
            <!-- nav item -->
            <li class="nav-item" role="presentation">
              <!-- btn --> <button class="nav-link active" id="product-tab" data-bs-toggle="tab"
                data-bs-target="#product-tab-pane" type="button" role="tab" aria-controls="product-tab-pane"
                aria-selected="true">description</button>
            </li>
            <!-- nav item -->
            <li class="nav-item" role="presentation">
              <!-- btn --> <button class="nav-link" id="details-tab" data-bs-toggle="tab"
                data-bs-target="#details-tab-pane" type="button" role="tab" aria-controls="details-tab-pane"
                aria-selected="false">Information</button>
            </li>
          </ul>
          <!-- tab content -->
          <div class="tab-content" id="myTabContent">
            <!-- tab pane -->
            <div class="tab-pane fade show active" id="product-tab-pane" role="tabpanel" aria-labelledby="product-tab"
              tabindex="0">
              <div class="my-8">
               {!!$annonce->description!!}
              </div>
            </div>
            <!-- tab pane -->
            <div class="tab-pane fade" id="details-tab-pane" role="tabpanel" aria-labelledby="details-tab" tabindex="0">
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
                          <a href="{{ route('latestModel.index_page',$utilisat->slug) }}"><td>{{$utilisat->nom}}</td></a>
                        </tr>
                        <tr>
                          <th>Prenom du publicateur</th>
                          <a href="{{ route('latestModel.index_page',$utilisat->slug) }}">  <td>{{$utilisat->prenom}}</td></a>
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




<section class="my-lg-8 my-14">
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

                  <a href="/annonceDetaildons/{{$annos->slug}}"> <img src="../images/Annonce/{{$annos->photo}}" alt="Troc moi"
                      class="mb-3 img-fluid"></a>



                </div>
                <div class="text-small mb-1"><a href="/annonceDetaildons/" class="text-decoration-none text-muted"><small>Abidjan</small></a></div>
                <div style="height:19px;" class="overflow-hidden justify-content-between">
                <h2 class="fs-6 "><a href="./pages/shop-single.html" class="text-inherit text-decoration-none">{{$annos->titre}}</a></h2>
                </div>

                <div>

                @if( date('j M, Y', strtotime($annos->created_at))  == $today )
                      <span class="text-muted small">Aujourd'hui</span>
                      @else
                    <span class="text-muted small">{{ date('j M, Y', strtotime($annos->created_at)) }}</span>
                    @endif
                </div>
                <div class="d-flex justify-content-between align-items-center mt-3">
                  <div><span class="text-dark">{{number_format($annos->prix,0,',',' ')}} FCFA</span>
                  </div>
                </div>
                <div><a href="/annonceDetaildons/" class="btn btn-outline-primary btn-sm mt-2  align-items-center">proposez </a></div>
              </div>
            </div>
          </div>
        @endforeach
      </div>
      <div class="d-grid mt-4 w-20 float-center">
          <a href="/AllAnnonce" class="btn btn-primary ">
                      <line x1="12" y1="5" x2="12" y2="19"></line>
                      <line x1="5" y1="12" x2="19" y2="12"></line>
                    </svg> PLUS D'ANNONCES <i class="feather-icon icon-arrow-right ms-1"></i></a></div>
      </div>
    </div>

  </section>


</main>

  <!-- modal -->
  <!-- Modal -->
<div class="modal fade" id="quickViewModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-body p-8">
        <div class="position-absolute top-0 end-0 me-3 mt-3">
          <button
            type="button"
            class="btn-close"
            data-bs-dismiss="modal"
            aria-label="Close"
          ></button>
        </div>
        <div class="row">
          <div class="col-lg-6">
            <!-- img slide -->
            <div class="product productModal" id="productModal">
              <div
                class="zoom"
                onmousemove="zoom(event)"
                style="
                  background-image: url(../images/Annonce/{{$annonce->photo}});
                "
              >
                <!-- img -->
                <img
                  src="../images/Annonce/{{$annonce->photo}}"
                  alt=""
                />
              </div>
              <div>
                <div
                  class="zoom"
                  onmousemove="zoom(event)"
                  style="
                    background-image: url(../images/Annonce/{{$annonce->photo2}});
                  "
                >
                  <!-- img -->
                  <img
                    src="../images/Annonce/{{$annonce->photo2}}"
                    alt=""
                  />
                </div>
              </div>
              <div>
                <div
                  class="zoom"
                  onmousemove="zoom(event)"
                  style="
                    background-image: url(../images/Annonce/{{$annonce->photo3}});
                  "
                >
                  <!-- img -->
                  <img
                    src="../images/Annonce/{{$annonce->photo3}}"
                    alt=""
                  />
                </div>
              </div>
              <div>
                <div
                  class="zoom"
                  onmousemove="zoom(event)"
                  style="
                    background-image: url(../images/Annonce/{{$annonce->photo4}});
                  "
                >
                  <!-- img -->
                  <img
                    src="../images/Annonce/{{$annonce->photo4}}"
                    alt=""
                  />
                </div>
              </div>
            </div>
            <!-- product tools -->
            <div class="product-tools">
              <div class="thumbnails row g-3" id="productModalThumbnails">
                <div class="col-3">
                  <div class="thumbnails-img">
                    <!-- img -->
                    <img
                      src="../images/Annonce/{{$annonce->photo}}"
                      alt=""
                    />
                  </div>
                </div>
                <div class="col-3">
                  <div class="thumbnails-img">
                    <!-- img -->
                    <img
                      src="../images/Annonce/{{$annonce->photo2}}"
                      alt=""
                    />
                  </div>
                </div>
                <div class="col-3">
                  <div class="thumbnails-img">
                    <!-- img -->
                    <img
                      src="../images/Annonce/{{$annonce->photo3}}"
                      alt=""
                    />
                  </div>
                </div>
                <div class="col-3">
                  <div class="thumbnails-img">
                    <!-- img -->
                    <img
                      src="../images/Annonce/{{$annonce->photo4}}"
                      alt=""
                    />
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="ps-lg-8 mt-6 mt-lg-0">
              <a href="#!" class="mb-4 d-block">Bakery Biscuits</a>
              <h2 class="mb-1 h1">Napolitanke Ljesnjak</h2>
              <div class="mb-4">
                <small class="text-warning">
                  <i class="bi bi-star-fill"></i>
                  <i class="bi bi-star-fill"></i>
                  <i class="bi bi-star-fill"></i>
                  <i class="bi bi-star-fill"></i>
                  <i class="bi bi-star-half"></i></small
                ><a href="#" class="ms-2">(30 reviews)</a>
              </div>
              <div class="fs-4">
                <span class="fw-bold text-dark">$32</span>
                <span class="text-decoration-line-through text-muted">$35</span
                ><span
                  ><small class="fs-6 ms-2 text-danger">26% Off</small></span
                >
              </div>
              <hr class="my-6" />
              <!-- <div class="mb-4">
                <button type="button" class="btn btn-outline-secondary">
                  250g
                </button>
                <button type="button" class="btn btn-outline-secondary">
                  500g
                </button>
                <button type="button" class="btn btn-outline-secondary">
                  1kg
                </button>
              </div> -->
              <!-- <div>

                <div class="input-group input-spinner  ">
                  <input type="button" value="-" class="button-minus  btn  btn-sm " data-field="quantity">
                  <input type="number" step="1" max="10" value="1" name="quantity" class="quantity-field form-control-sm form-input   ">
                  <input type="button" value="+" class="button-plus btn btn-sm " data-field="quantity">
                </div>
              </div> -->
              <div
                class="mt-3 row justify-content-start g-2 align-items-center"
              >

                <div class="col-lg-4 col-md-5 col-6 d-grid">
                  <!-- button -->
                  <!-- btn -->
                  <button type="button" class="btn btn-primary">
                    <i class="feather-icon icon-shopping-bag me-2"></i>Appelez
                  </button>
                </div>
                <div class="col-md-4 col-5">
                  <!-- btn -->
                  <a
                    class="btn btn-light"
                    href="#"
                    data-bs-toggle="tooltip"
                    data-bs-html="true"
                    aria-label="Compare"
                    ><i class="bi bi-arrow-left-right"></i
                  ></a>
                  <a
                    class="btn btn-light"
                    href="shop-wishlist.html"
                    data-bs-toggle="tooltip"
                    data-bs-html="true"
                    aria-label="Wishlist"
                    ><i class="feather-icon icon-heart"></i
                  ></a>
                </div>
              </div>
              <hr class="my-6" />
              <div>
                <table class="table table-borderless">
                  <tbody>
                    <tr>
                      <td>Articles Couleur:</td>
                      <td>FBB00255</td>
                    </tr>
                    <tr>
                      <td>valide aussi:</td>
                      <td>en gros</td>
                    </tr>
                    <tr>
                      <td>Type:</td>
                      <td>Categorie type</td>
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
</div>

@endforeach



 @endsection
