<form action="{{ route('searchTroc') }}" id="recherche_trock" class="col-lg-12">

    <div class="input-group">
        <input type="search" name="search" wire:model.debounce.400ms="searchValue" class="form-control dropdown-toggle"
            placeholder="Recherche..." id="search-term_trock">
        <span class="mdi mdi-magnify search-icon"></span>


        <button class="input-group-text btn btn-primary" type="submit">recherche</button>
    </div>

    <div class="list-group">
        @if(!is_null($annonceValue) && $annonceValue != "")
            @foreach ($annonceValue as $item)
                <a href="#" class="list-group-item list-group-item-action" style="position: relative; z-index: 990;" >{{$item->titre}}</a>
            @endforeach
        @endif
    </div>
</form>
