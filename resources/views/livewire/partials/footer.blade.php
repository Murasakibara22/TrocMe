
    @if($categorie_list->count() > 0)
    @foreach($categorie_list as $item)
    <div class="col-6 col-sm-6 col-md-3">
            <h6 class="mb-4">{{$item->libelle}} </h6>
            <ul class="nav flex-column">
                @foreach($item->Souscat()->take(7)->get() as $itemsouscat)
              <li class="nav-item mb-2"><a href="/searchAnnonceSouscat/{{$itemsouscat->slug}}" class="nav-link">{{$itemsouscat->libelle}}</a></li>
             @endforeach
            </ul>
    </div>
    @endforeach
    @endif