@foreach($results as $resultss)
      <a href="/annonceDetail/{{$resultss->slug}}"> 
        <div class="col-12 col-sm-12 col-xs-12 col-md-12">
                    <div class="card card-product" style="border-radius: 0px!important;">
                        <!-- card body -->
                        <div class="card-body "
                            style="padding: 0px!important;">
                            <div class=" row p-2">
                                <!-- col -->
                                <div class="col-md-3 col-5 col-sm-6 col-xs-6">
                                    <div class="text-center position-relative ">

                                        <a href="/annonceDetail/{{$resultss->slug}}"> <img
                                                src="{{ url('../images/Annonce/'.$resultss->photo)}}" alt="troc moi"
                                                class=" img-fluid" style="height: 5.0rem!important;"></a>
                                    </div>
                                </div>
                                <div class="col-md-9 col-7 col-sm-6  col-xs-6 flex-grow-1" align="start">

                                    <h2 class="fs-5 text-truncate" style="max-whidth: 97%;">
                                        <a href="/annonceDetail/{{$resultss->slug}}"
                                            class="text-inherit text-decoration-none">{{$resultss->titre}}</a>
                                    </h2>
                                    <div>
                                        
                                        <div class="mt-0"><span
                                                class="text-dark bold fs-6">{{number_format($resultss->prix,0,',',' ')}}
                                                FCFA</span>
                                        </div>

                                        <div class="fs-6"> 
                                    
                                            <a href="/annonceDetail/{{$resultss->slug}}"
                                                class="btn btn-info btn-sm mb-1 float-end d-none d-sm-block  align-items-end">Voir
                                                plus</a>

                                                </div>
                                        
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                </a>  
                @endforeach