        
<div class="col-lg-6 col-12 col-sm-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                                    <h4 class="card-title">Condition generale d'utilisateurs
            
                                        <div class="app-search dropdown float-end">
                                    
                                            <div class="input-group">
                                                <input type="search"  class="form-control dropdown-toggle"  placeholder="Recherche...">
                                                <span class="mdi mdi-magnify search-icon"></span>
                                                
                                                <button class="input-group-text btn btn-primary" type="submit">Search</button>
                                            </div>
                                    
                                        </div>
                                    </h4>
                            <p class="card-description">
                                Remplissez les condition generale d'utilisateur
                            </p>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class="thead-dark bg-info">
                                        <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Texte</th>
                                        <th scope="col">actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                            @if(!is_null($list_cgu))
                                                <tr>
                                                    <th scope="row">{{$list_cgu->id}}</th>
                                                    <td>{{$list_cgu->text}}</td>
                                                    <td class="table-action">
                                                        <a href="#" wire:click="edit_cgu()" data-bs-toggle="modal" data-bs-target="#modalcgu_edit" class="action-icon"> <i class="mdi mdi-pencil"></i></a>
                                                        <a href="#" wire:click="delete_cgu({{$list_cgu->id}})" class="action-icon"> <i class="mdi mdi-delete"></i></a>
                                                    </td>
                                                </tr>
                                                @else
                                                <th>
                                                    <td>
                                                        <h6 class="text-warning text-center">Aucune condition generale d'utilisateur enregisrer</h6>
                                                    </td>
                                                </th>
                                            @endif
                                    </tbody>
                                </table>
                            </div>
                </div>
            </div>


        <div id="modalcgu_add" wire:ignore.self class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">

                    <div class="modal-body">

                        <form class="ps-3 pe-3 needs-validation" novalidate wire:submit.prevent="submit_cgu">

                            <div class="mb-2 mt-3">
                                <label for="username" class="form-label">Condition générale d'utilisateur</label>
                                <textarea class="form-control" wire:model.debounce.500ms="msg" rows="10"></textarea>
                                @error('text')<span class="error invalid-feedback">{{$message}}</span> @enderror
                            </div>


                            <div class="mb-3 text-center">
                                <button class="btn btn-success" type="submit">Enregistrer</button>
                            </div>

                        </form>

                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div>

        <div id="modalcgu_edit" wire:ignore.self class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">

                    <div class="modal-body">

                        <form class="ps-3 pe-3 needs-validation" novalidate wire:submit.prevent="update_cgu">

                            <div class="mb-3">
                                <label for="username" class="form-label">Condition générale d'utilisateur</label>
                                <textarea class="form-control" wire:model.debounce.500ms="msg" rows="10"></textarea>
                                @error('text')<span class="error invalid-feedback">{{$message}}</span> @enderror
                            </div>


                            <div class="mb-3 text-center">
                                <button class="btn btn-warning" type="submit">Modifier</button>
                            </div>

                        </form>

                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div>
</div>
        


        
