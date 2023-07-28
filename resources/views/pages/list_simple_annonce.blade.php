




@foreach($results as $resultss)
                 
<div class="col-12 col-sm-12 col-xs-12 col-md-12 mt-2">
                    <div class="card card-product">
                        <!-- card body -->
                        <div class="card-body  shadow p-3"
                            style="padding-top: none;padding-bottom: 1%!important; border: 0.02em #ccc solid; border-radius: 0.3rem!important;">
                            <div class=" row ">
                                <!-- col -->
                                <div class="col-md-3 col-5 col-sm-6 col-xs-6">
                                    <div class="text-center position-relative ">

                                        <a href="/annonceDetail/{{$resultss->slug}}"> <img
                                                src="{{ url('../images/Annonce/'.$resultss->photo) }}" alt="troc moi"
                                                class=" img-fluid" style="height: 6.8rem!important;"></a>
                                    </div>
                                </div>
                                <div class="col-md-9 col-7 col-sm-6  col-xs-6 flex-grow-1 my-1" align="start">

                                    <h2 class="fs-5 text-truncate" style="max-whidth: 97%;">
                                        <a href="/annonceDetail/{{$resultss->slug}}"
                                            class="text-inherit text-decoration-none" >{{$resultss->titre}}</a>
                                    </h2>
                                    <span
                                        class="text-muted small float-end">{{$resultss->created_at->diffForHumans()}}

                                    </span> <br>

                                   
                                    <div>

                                            @foreach($resultss->villes()->get() as $ville)
                                        <div class="mt-0"><span
                                                class="text-dark bold float-end">{{$ville->name}}</span>
                                        </div>
                                        @endforeach
                                        <!-- btn --> <br>
                                     
                                        <span
                                                class="text-dark fw-bold bold float-start">{{number_format($resultss->prix,0,',',' ')}}
                                                FCFA</span>
                                    
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                 
                 @endforeach