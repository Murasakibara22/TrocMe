@extends('dash/layout/app')

@section('content')


<div class="content-page">
                <div class="content">

                    <!-- Start Content-->
                    <div class="container-fluid">

                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                  
                                    <h4 class="page-title fw-bold mt-3">Listes des Sous Categories 
                                    <a href="/new_SousCat" class="float-end"><button type="button" class="btn btn-outline-info rounded-pill ms-5"><i class="uil-circuit"></i> Ajouter une Sous Categories</button> </a>
                                        </h4>
                                </div>
                            </div>
                        </div>     

                        <div class="app-search dropdown mb-3">
                                                <form action="{{ route('searchSouscats') }}">
                                                    <div class="input-group">
                                                        <input type="search" name= "search" value="{{  request()->search ?? '' }}"  class="form-control dropdown-toggle"  placeholder="Recherche..." id="top-search">
                                                        <span class="mdi mdi-magnify search-icon"></span>
                                                        
                                                        <button class="input-group-text btn btn-primary" type="submit">Search</button>
                                                    </div>
                                                </form>

                                              
                                            </div>
                        <div class="row">
                        @foreach($SubCategory as $SubCategorys)
                            <div class="col-md-4">
                                <div class="card border-secondary border">
                                    <div class="card-body">
                                        <h5 class="card-title">{{$SubCategorys->libelle}} </h5>
                                        @foreach($SubCategorys->categorie()->get()  as  $item)
                                        <p class="card-text"> {{$item->libelle}}</p>
                                        @endforeach
                                        <a href="/AnnonceSelonSousCat/{{$SubCategorys->slug}}" class="btn btn-secondary btn-sm">Annonces</a>
                                        <a href="/SousCategorie_edit/{{$SubCategorys->slug}}"> <button type="button" class="btn btn-warning "><i class="mdi mdi-wrench"></i> </button> </a>
                                        <a href="/SousCategorie_delete/{{$SubCategorys->slug}}"><button type="button" class="btn btn-danger float-end"><i class="mdi mdi-delete"></i> </button> </a>
                                    </div> <!-- end card-body-->
                                </div> <!-- end card-->
                            </div> <!-- end col-->
                            @endforeach
                        </div>
                        <!-- end row -->
                      
                       
                        
                    </div> <!-- container -->

                </div> <!-- content -->

                <!-- Footer Start -->

                <!-- end Footer -->

            </div>


@endsection