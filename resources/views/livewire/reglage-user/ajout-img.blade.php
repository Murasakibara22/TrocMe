

<div >
        @if(session()->has('message'))
         <div class="alert alert-success">
           {{session('message')}}
        </div>
        @endif
      

<form action="" wire:submit.prevent="ModifierPhotoBannear">
        <div class="row mb-3" >
                <div class="col-12 col-sm-8 col-lg-6 col-xs-12 col-md-12">
                    <label class="form-label">banniere de Votre Page Professionnelle</label>
                    <input type="file" wire:model.debounce.50ms="addPhoto" class="form-control" name="bannear">
                    <p wire:loading>Sélection de la photo en cours...</p>
                    <span class="text-info">Taille de la banniere : 1660 px largeur et 625 px
                        hauteur</span>
                        
                </div>

                <div class="col-12 col-sm-8 col-lg-6 col-xs-12 col-md-12 " style=" margin: 0px!important;">
                    <div style="border: 0.02rem solid black; width: 100%; height: 120px;">
                                @if($addPhoto)
                                <img src="{{ $addPhoto->temporaryUrl() }}" alt="Troc moi " height="100%"
                                    width="100%" style="box-shadow: 0.2px 0.3px 7px 2px;"
                                    class="rounded-3">
                                    @endif
                    </div>
                </div>
        </div>


        <div class="mb-3">
             <button type="submit" class="btn btn-primary">valider</button>
        </div>

</form>



       
</div>
