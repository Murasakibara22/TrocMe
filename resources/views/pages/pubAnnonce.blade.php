@extends('../layouts/app')

@section('styles')

<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>

<script>
tinymce.init({
    selector: '#mytextarea',
    plugins: [
        'a11ychecker', 'advlist', 'advcode', 'advtable', 'autolink', 'checklist', 'export',
        'lists', 'link', 'image', 'charmap', 'preview', 'anchor', 'searchreplace', 'visualblocks',
        'powerpaste', 'fullscreen', 'formatpainter', 'insertdatetime', 'media', 'table', 'help', 'wordcount'
    ],
    toolbar: 'undo redo | formatpainter casechange blocks | bold italic backcolor | ' +
        'alignleft aligncenter alignright alignjustify | ' +
        'bullist numlist checklist outdent indent | removeformat | a11ycheck code table help'
});
</script>

@endsection


@section('content')

@if ( session('champsNotSuccess'))
<div class="alert alert-warning">
    un ou plusieurs champs ne sont pas correctement remplis veuillez reessayez
</div>
@endif

@if ( session('saveSuccessAnnonce'))
<div class="alert alert-success">
    Annonce publiez avec succes
</div>
@endif
<main>
    <!-- section -->


    <section class="my-lg-14 my-5">
        <!-- container -->
        <div class="container">
            <div class="row">
                <!-- col -->
                <div class="offset-lg-2 col-lg-8 col-12">
                    <div class="mb-8">
                        <!-- heading -->
                        <h1 class="h3">Publiez L'annonce de votre choix</h1>
                        <p class="lead mb-0 ">Tous lieu d'echange ou moyens de payement entre particulier et particulier
                            ne concerne en aucun cas cette plateforme </p>
                    </div>
                    <!-- form -->
                    <form class="row" action="{{ route('ajoutAnnonce') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('POST')
                        <!-- input -->
                        <div class="col-md-6 mb-3">
                            <label class="form-label" for="fname"> titre<span class="text-danger">*</span></label>
                            <input type="text" id="fname" class="form-control" name="titre"
                                placeholder="Entrer Le nom de l'article" required>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label" for="fname"> Categorie<span class="text-danger">*</span></label>
                            <div class="input-group mb-3" name="souscategorie_id">
                                <select class="form-select" id="inputGroupSelect02" name="souscategorie_id">
                                    @foreach($souscat as $souscats)
                                    <option value="{{$souscats->id}}" name="souscategorie_id">{{$souscats->libelle}}
                                    </option>
                                    @endforeach
                                </select>
                                <label class="input-group-text" for="inputGroupSelect02">Options</label>
                            </div>
                        </div>


                        <!-- le type d'annonce -->
                        <label class="form-label" for="fname"> Type<span class="text-danger">*</span></label>
                        <div class="input-group mb-3" name="type">
                            <select class="form-select" id="inputGroupSelect02" name="type" required>
                                <option selected>choix...</option>
                                <option value="troque">Troque</option>
                                <option value="vente">Vente</option>
                                <option value="demandez">Recherchez</option>
                                <option value="Troque ou Vente">Troque ou Vente</option>
                            </select>
                            <a tabindex="0" class="btn  btn-danger" role="button" data-bs-toggle="popover" data-trigger="focus" title="Informations sur le choix des types!!" data-bs-content="Trock: Tous les articles d'occasion..........;  Ventes: Tous les articles mise en vente; Demandez: Les articles que vous recherchez; ">info</a>
                        </div>


                        <div class="col-md-6 mb-3">
                            <label class="form-label" for="company">photo prinpipale <span class="text-danger">*</span></label>


                            <div class="input-group mb-2 col-3">
                                <input type="file" name="photo" class="form-control" id="inputGroupFile02" required>
                            </div>

                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label" for="company">Autres Images<span
                                    class="text-danger">*</span></label>
                            <div class="input-group mb-2 col-3">
                                <input type="file" name="images_secondaire[]" class="form-control" id="inputGroupFile02"
                                    multiple="">
                            </div>
                        </div>


                        <div class="col-md-6 mb-3">
                            <label class="form-label" for="emailContact">Email <span class="text-info"> (FACULTATIF)</span> </label>
                            <input type="text" id="emailContact" name="email" class="form-control"
                                placeholder="Entrer votre Email">
                        </div>
                        <div class="col-md-6 mb-3">
                            <!-- input -->
                            <label class="form-label" for="phone"> Contact Whatsapp</label>
                            <input type="text" id="phone" name="contactWhatsapp" class="form-control"
                                placeholder="Entrer votre contact" required>
                        </div>

                        <div class="col-md-6  mb-3">
                            <label class="form-label" for="phone">Prix<span class="text-danger">*</span></label>
                            <div class="input-group mb-3">
                                <span class="input-group-text">FCFA</span>
                                <input type="text" class="form-control" name="prix" aria-label=""
                                    placeholder="Ex : 10 000" required>
                            </div>
                        </div>

                        <div class="col-md-6  mb-3">
                            <label class="form-label" for="phone">ville</label>
                            <div class="input-group mb-3" name="ville_id">
                                <button class="btn btn-outline-secondary" type="button">Lieu</button>
                                <select class="form-select" id="inputGroupSelect03"
                                    aria-label="Example select with button addon" name="ville_id">
                                    @foreach($ville as $villes)
                                    <option value="{{$villes->id}}" name="ville_id">{{$villes->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label" for="emailContact">Adresse</label>
                            <input type="text" id="emailContact" name="lieu" class="form-control"
                                placeholder="Entrer votre Adresse" >
                        </div>
                        <div class="col-md-6 mb-3">
                            <!-- input -->
                            <label class="form-label" for="phone">Joindre via Facebook <span class="text-info"> (FACULTATIF) </span> </label>
                            <input type="text" id="phone" name="facebook" class="form-control"
                                placeholder="Entrer username facebook" >
                        </div>


                        <div class="col-md-12 mb-3">
                            <div style="height: 100%; width: 100%;">
                                <textarea id="mytextarea" class="h-100 w-100" name="description"></textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <!-- btn -->
                            <button type="submit" class="btn btn-primary">publiez</button>
                        </div>


                    </form>

                </div>
            </div>
        </div>

    </section>
</main>



@endsection