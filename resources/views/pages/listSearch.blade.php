@foreach($results as $resultss)
      <a href="/annonceDetail/{{$resultss->slug}}"> 
        <div class="col-12 col-sm-12 col-xs-12 col-md-12 mt-2">
                    <div class="card card-product">
                        <!-- card body -->
                        <div class="card-body  shadow p-3"
                            style="padding: 0px!important;  border: 0.01em #0dad63 solid; border-radius: 0.1rem!important;">
                            <div class=" row ">
                                <!-- col -->
                                <div class="col-md-3 col-5 col-sm-6 col-xs-6">
                                    <div class="text-center position-relative ">

                                        <a href="/annonceDetail/{{$resultss->slug}}"> <img
                                                src="{{ url('../images/Annonce/'.$resultss->photo)}}" alt="troc moi"
                                                class=" img-fluid" style="height: 5.5rem!important;"></a>
                                    </div>
                                </div>
                                <div class="col-md-9 col-7 col-sm-6  col-xs-6 flex-grow-1" align="start">

                                    <h2 class="fs-6 text-truncate" style="max-whidth: 97%;">
                                        <a href="shop-single.html"
                                            class="text-inherit text-decoration-none">{{$resultss->titre}}</a>
                                    </h2>
                            

                                   

                                    <div>
                                        

                                        <div class="mt-0"><span
                                                class="text-dark bold">{{number_format($resultss->prix,0,',',' ')}}
                                                FCFA</span>
                                        </div>

                                        <!-- btn -->
                                     <div class="fs-6"> 
                                    
                                            <a href="/annonceDetail/{{$resultss->slug}}"
                                                class="btn btn-info btn-sm mt-1 float-center   align-items-center">Voir
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