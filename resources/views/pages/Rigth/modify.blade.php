@extends('../layouts/app')



@section('styles')

<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>

<script>
  tinymce.init({
    selector: '#mytextarea',
    plugins: [
      'a11ychecker','advlist','advcode','advtable','autolink','checklist','export',
      'lists','link','image','charmap','preview','anchor','searchreplace','visualblocks',
      'powerpaste','fullscreen','formatpainter','insertdatetime','media','table','help','wordcount'
    ],
    toolbar: 'undo redo | formatpainter casechange blocks | bold italic backcolor | ' +
      'alignleft aligncenter alignright alignjustify | ' +
      'bullist numlist checklist outdent indent | removeformat | a11ycheck code table help'
  });
</script>

@endsection



@section('content')


                    @if ( session('saveSuccessAnnonce'))
                    <div class="alert alert-success">
                    Annonce publiez avec succes
                    </div>
                    @endif
<main>
  <!-- section -->
             

  <section class="my-lg-14 my-4 mb-7">
      <!-- container -->
    <div class="container">
      <div class="row justify-content-center">
          <!-- col -->
          <div class="col-md-12">
            <div class="wrapper">
              <div class="row no-gutters">
        <div class="col-md-6  rounded-2" style="background-color:#F2F3F4; box-shadow: 2px 3px 10px 1px;">
          <div class="mb-7">
              <!-- heading -->
            <h1 class="h3 mt-3" style="font-family: poppins;">  {{$annonce->titre}} </h1>
            <p class="lead mb-0 ">Vous allez modifier cette annonce </p>
          </div>
          <!-- form -->
          <form class="row" action="{{ route('updateAnnonce',$annonce->slug) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
              <!-- input -->
            <div class="col-md-6 mb-3">
              <label class="form-label" for="fname"> titre<span class="text-danger">*</span></label>
              <input type="text" id="fname" class="form-control" name="titre" value="{{ old($annonce->titre) ?? $annonce->titre}}">
            </div>

            <div class="col-md-6 mb-3">
            <label class="form-label" for="fname"> Categorie<span class="text-danger">*</span></label>
                <div class="input-group mb-3" name="souscategorie_id">
                    <select class="form-select" id="inputGroupSelect02" name="souscategorie_id" value="{{ old($annonce->souscategorie_id) ?? $annonce->souscategorie_id}}" >
                    <option value="aucun">aucun</option>
                    @foreach($souscat as $souscats)
                        <option value="{{$souscats->id}}" name="souscategorie_id" >{{$souscats->libelle}}</option>
                        @endforeach
                    </select>
                    <label class="input-group-text" for="inputGroupSelect02">Options</label>
                </div>
            </div>
            
          
              <!-- le type d'annonce -->
              <label class="form-label" for="fname"> Type<span class="text-danger">*</span></label>
            <div class="input-group mb-3" name="type" >
                <select class="form-select" id="inputGroupSelect02" name="type" value="{{ old($annonce->type) ?? $annonce->type}}">
                <option selected value="{{ old($annonce->type) ?? $annonce->type}}">{{ old($annonce->type) ?? $annonce->type}}</option>
                    <option value="troque">Troque</option>
                    <option value="vente">Vente</option>
                    <option value="demandez">Recherchez</option>
                    <option value="Troque ou Vente">Troque ou Vente</option>
                </select>
                <label class="input-group-text" for="inputGroupSelect02">Type</label>
            </div>
        
        
            <div class="col-md-12 mb-3">
            <label class="form-label" for="company">Images <span class="text-danger">*</span></label>
           
              
                <div class="input-group mb-2 col-3">
            <input type="file" name="photo" class="form-control" id="inputGroupFile02" >
                </div>
                
            </div>


            <label class="form-label" for="company">Images secondaires <span class="text-danger">*</span></label>
            <div class="input-group mb-2 col-3">
            <input type="file" name="images_secondaire[]" class="form-control" id="inputGroupFile02" multiple="">
                </div>



            <div class="col-md-6 mb-3">
              <label class="form-label" for="emailContact">Email<span class="text-danger">*</span></label>
              <input type="text" id="emailContact" name="email" class="form-control" value="{{ old($annonce->email) ?? $annonce->email}}" >
            </div>
            <div class="col-md-6 mb-3">
              <!-- input -->
              <label class="form-label" for="phone"> Contact Whatsapp</label>
              <input type="text" id="phone" name="contactWhatsapp" class="form-control" value="{{ old($annonce->contactWhatsapp) ?? $annonce->contactWhatsapp}}">
            </div>

            <div class="col-md-6  mb-3">
            <label class="form-label" for="phone">Prix<span class="text-danger">*</span></label>
                <div class="input-group mb-3">
                    <span class="input-group-text">FCFA</span>
                    <input type="text" class="form-control" name="prix" aria-label="" value="{{str_replace(' ','', $annonce->prix)}}">
                </div>
            </div>

            <div class="col-md-6  mb-3">
            <label class="form-label" for="phone"> ville</label>
                <div class="input-group mb-3" name="ville_id">
                    <button class="btn btn-outline-secondary" type="button">Lieu</button>
                    <select class="form-select" id="inputGroupSelect03" aria-label="Example select with button addon" name="ville_id">
                    <option value="aucun">aucune</option>
                    @foreach($ville as $villes)
                    <option value="{{$villes->id}}" name="ville_id">{{$villes->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="col-md-6 mb-3">
              <label class="form-label" for="emailContact">Adresse<span class="text-danger">*</span></label>
              <input type="text" id="emailContact" name="Lieu" class="form-control" value="{{ old($annonce->Lieu) ?? $annonce->Lieu}}" >
            </div>
            <div class="col-md-6 mb-3">
              <!-- input -->
              <label class="form-label" for="phone">Joindre via Facebook</label>
              <input type="text" id="phone" name="facebook" class="form-control" value="{{ old($annonce->facebook) ?? $annonce->facebook}}" >
            </div>


            <div class="col-md-12 mb-3">
              <!-- input -->
              <div style="height: 100%; width: 100%;">
                        <textarea id="mytextarea" class="h-100 w-100" value="{{old($annonce->description) ?? $annonce->description}}"  name="description"> {!!$annonce->description !!}</textarea>
                    </div>
            </div>
            <div class="col-md-12">
              <!-- btn -->
              <button type="submit" class="btn btn-info mb-3">Modifer</button>
            </div>


          </form>

        </div>
            <div class="col-md-6 mb-9" >
                <div class="row " style="margin-top: 6rem;">
                            <img src="../assets/images/reglage.gif" class="w-100 h-100" alt="Troc Moi" >
                        </div>
            </div> 
        </div>
        </div>
        </div>
      </div>
    </div>

  </section>
</main>



@endsection