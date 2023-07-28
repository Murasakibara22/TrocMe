<!-- toggle between modal -->
<div class="modal fade montrer" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
   <div class="modal-dialog modal-xl">
     <div class="modal-content">
       <div class="modal-header">
         <h5 class="modal-title" id="exampleModalToggleLabel">{{$annonces->titre}}</h5>
         <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
       </div>
       <div class="modal-body">


       <div class="container-fluid" style="background: linear-gradient(90deg, #00C9FF 0%, #92FE9D 100%);">
    <div class="container p-5">
      <div class="row">
        @foreach($pricings as $pricing)
        <div class="col-lg-4 col-md-12 mb-4">
          <div class="card h-100 shadow-lg">
            <div class="card-body">
              <div class="text-center p-3">
                <h5 class="card-title text-info">{{$pricing->titre}}</h5>
                @if($pricing->titre  == "Gratuit")
                <small>Personnel</small>
                @else
                <small>Personnel/Entreprise</small>
                @endif
                <br><br>
                @if($pricing->titre  == "Gratuit")
                <span class="h2">{{$pricing->prix}} FCFA</span>/ {{$pricing->nb_jours}}
                @else
                <span class="h2 text-info">{{$pricing->prix}} FCFA</span>/ {{$pricing->nb_jours}}
                @endif
                <br><br>
              </div>
              <p class="card-text">{{$pricing->description}}</p>
            </div>
            <ul class="list-group list-group-flush">
              <li class="list-group-item"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
                <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z"/>
              </svg> {{$pricing->avantage1}}</li>
              <li class="list-group-item"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
                <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z"/>
              </svg> {{$pricing->avantage2}}</li>
              <li class="list-group-item"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
                <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z"/>
              </svg> {{$pricing->avantage3}}</li>
            </ul>
            <div class="card-body text-center">
                <form action="{{ route('sponsorisation_checkout')}}" method="POST">
                    @csrf
                    <input type="hidden" value="{{$pricing->id}}" name="following_id">
                    <input type="hidden" value="{{$annonces->id}}" name="annonce_id">
                    <input type="hidden" value="{{$pricing->nb_jours}}" name="nb_jour">
                    <input type="hidden" value="{{$pricing->prix}}" name="price">
                <button type="Submit" class="btn btn-outline-primary btn-lg" style="border-radius:30px">Commencez</button>
                </form>
            </div>
          </div>
        </div>
      @endforeach
      </div>    
    </div>


       </div>

     </div>
   </div>
 </div>
   
 <a class="btn btn-primary" data-bs-toggle="modal" href="#exampleModalToggle" role="button">sponsoriser votre annonces et gagner plus</a>