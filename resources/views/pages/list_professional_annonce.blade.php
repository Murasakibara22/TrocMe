
@foreach($results as $resultss)
                 
<div class="col-12 col-sm-12 col-xs-12 col-md-12 mt-2" >
                    <div class="card card-product">
                        <!-- card body -->
                        <div class="card-body shadow p-2"
                            style="padding-top: 1%!important;padding-bottom: 1%!important;padding-left: 1%!importatnt; border: 0.02em #0dad63 solid; background-color:  #fffdde; border-radius: 0.3rem!important;">
                            <div class=" row ">
                                <!-- col -->
                                <div class="col-md-3 col-5 col-sm-6 col-xs-6">
                                    <div class="text-center position-relative ">

                                        <a href="{{ route('latestModel.index_page',$resultss->slug) }}"> <img
                                                src="../images/User/{{$resultss->photo_entreprise}}" alt="troc moi"
                                                class=" img-fluid" style="height: 7.0rem!important;"></a>
                                    </div>
                                </div>
                                <div class="col-md-9 col-7 col-sm-6  col-xs-6 flex-grow-1 my-auto" align="start">

                                    <h2 class="fs-5 text-truncate" style="max-whidth: 97%;">
                                        <a href="{{ route('latestModel.index_page',$resultss->slug) }}"
                                            class="text-inherit text-decoration-none">{{$resultss->nom}} {{$resultss->prenom}}</a>
                                    </h2>
                                    <span
                                        class="text-muted small">{{$resultss->created_at->diffForHumans()}}
                                        <i class="bi bi-award float-end text-success fs-1"></i>

                                    </span>

                                   

                                    <div>
                                        <!-- price -->

                                        <div class="mt-1"><span
                                                class="text-dark bold">{{__('Compte entreprise')}}</span>
                                        </div>

                                        <!-- btn -->
                                     <div class="fs-3">

                                     <i class="bi bi-patch-check-fill  fs-6"  style="color: green;"></i> <span class="text-success small fs-6"> certifiée </span> 
                                    
                                            <a href="{{ route('latestModel.index_page',$resultss->slug) }}"
                                                class="btn btn-info btn-sm mt-1 float-end   align-items-center">Voir
                                                plus</a>

                                                </div>
                                    
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                 
                 @endforeach