<div>
    

         <!-- recherche -->
         <div class="app-search dropdown ">
                         <form action="{{ route('searchDemandez') }}" id="recherche_demande">
                         
                             <div class="input-group">
                                              <input type="search" name= "search" value="{{  request()->search ?? '' }}"  class="form-control dropdown-toggle" wire:model.debounce.300ms="search"  placeholder="Recherche..." id="top-search">
                                 <span class="mdi mdi-magnify search-icon"></span>
                                 
                         
                                 <button class="input-group-text btn btn-primary" type="submit">Recherche</button>
               
                                </div>
                         </form>

 
                     </div>





 @if(count($results) > 0)
<div id="search-results-demandez"  style="width: 86%;position: absolute;z-index: 990; opacity: 0.95; ">
      @foreach($results as $resultss)
      <a href="/annonceDetail/{{$resultss->slug}}" > 
        <div class="col-12 col-sm-12 col-xs-12 col-md-12 mt-1" >
                    <div class="card card-product">
                        <!-- card body -->
                        <div class="card-body  shadow p-3"
                            style="padding: 0px!important; border-radius: 0.1rem!important; background-color: #f6f5f5;">
                            <div class=" row ">
                                <!-- col -->
                                <div class="col-md-3 col-5 col-sm-6 col-xs-6">
                                    <div class="text-center position-relative ">

                                        <a href="/annonceDetail/{{$resultss->slug}}"> <img
                                                src="{{ url('../images/Annonce/'.$resultss->photo)}}" alt="troc moi"
                                                class=" img-fluid" style="height: 4.5rem!important;"></a>
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

                                  
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                </a>  
                @endforeach
                       
                </div>
        </a>
      @endif

                     

                     






</div>
