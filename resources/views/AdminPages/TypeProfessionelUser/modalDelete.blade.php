<!-- toggle between modal -->
<div class="modal fade montrer_delete" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
   <div class="modal-dialog modal-lg">
     <div class="modal-content">
       <div class="modal-header">
         <h5 class="modal-title" id="exampleModalToggleLabel">{{$type_profession_user->titre}}</h5>
         <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
       </div>
       <div class="modal-body">


       <div class="container-fluid" style="background: linear-gradient(90deg, #00C9FF 0%, #92FE9D 100%);">
    <div class="container p-5">
      <div class="row">
        <div class="col-lg-12 col-md-12 mb-4">
          <div class="card h-100 shadow-lg">
            <div class="card-body">
              <div class="text-center p-3">
                <h5 class="card-title text-info">{{$type_profession_user->titre}}</h5>
                @if($type_profession_user->titre  == "Gratuit")
                <small>Personnel</small>
                @else
                <small>Personnel/Entreprise</small>
                @endif
                <br><br>
                @if($type_profession_user->titre  == "Gratuit")
                <span class="h2">{{$type_profession_user->prix}} FCFA</span>/ {{$type_profession_user->nb_jours}}
                @else
                <span class="h2 text-info">{{$type_profession_user->prix}} FCFA</span>/ {{$type_profession_user->nb_jours}}
                @endif
                <br><br>
              </div>
            </div>
            <p class="card-text">{!!$type_profession_user->description!!}</p>

            <div class="card-body text-center">
                <form action="{{ route('type_professionUser.destroy',$type_profession_user->id)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <input type="hidden" value="{{$type_profession_user->id}}" name="following_id">
                    <input type="hidden" value="{{$type_profession_user->nb_jours}}" name="nb_jour">
                    <input type="hidden" value="{{$type_profession_user->prix}}" name="price">
                <button type="Submit" class="btn btn-outline-danger btn-lg" style="border-radius:30px">Supprimer</button>
                </form>
            </div>
          </div>
        </div>
   
      </div>    
    </div>


       </div>

     </div>
   </div>
 </div>
   
 <a class="btn btn-primary" data-bs-toggle="modal" href="#exampleModalToggle" role="button">sponsoriser votre annonces et gagner plus</a>