@extends('../layouts/app')


@section('styles')

<style>
    .card {
      border:none;
      padding: 10px 50px;
    }

    .card::after {
      position: absolute;
      z-index: -1;
      opacity: 0;
      -webkit-transition: all 0.6s cubic-bezier(0.165, 0.84, 0.44, 1);
      transition: all 0.6s cubic-bezier(0.165, 0.84, 0.44, 1);
    }

    .card:hover {


      transform: scale(1.02, 1.02);
      -webkit-transform: scale(1.02, 1.02);
      backface-visibility: hidden; 
      will-change: transform;
      box-shadow: 0 1rem 3rem rgba(0,0,0,.75) !important;
    }

    .card:hover::after {
      opacity: 1;
    }

    .card:hover .btn-outline-primary{
      color:white;
      background:#007bff;
    }

  </style>
@endsection

@section('content')


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
                <span class="h2 text-info">{{$pricing->prix}} FCFA</span>/ {{$pricing->type}}
                @endif
                <br><br>
              </div>
              <p class="card-text text-center text-primary"> {{$pricing->created_at->diffForHumans() }}</p>
            </div>
            <p class="card-text">{!!$pricing->description!!}</p>

            <div class="card-body text-center">
              <form action="{{ route('create_professional_accounts') }}" method="POST">
                @csrf

                <input type="hidden" value="{{ Auth::user()->id}}" name="user_id">
                <input type="hidden" value="{{ $pricing->id }}" name="type_prof_id">
                <input type="hidden" value="{{ $pricing->nb_jours }}" name="nombre_jours">
                <input type="hidden" value="{{ $pricing->prix }}" name="price">
              <button class="btn btn-outline-primary btn-lg" type="submit" style="border-radius:30px">Souscrire</button>
              </form>
            </div>
          </div>
        </div>
      @endforeach
      </div>    
    </div>


@endsection




@section('scripts')

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

@endsection