<div>
    @if(Session::has('message'))
    <p class="alert alert-success">{{ Session::get('message') }}</p>
    @endif



            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                
                            </ol>
                        </div>
                        <h4 class="page-title">  
                        @if(is_null($list_aide))
                            <button type="button" data-bs-toggle="modal" data-bs-target="#modal_add" class="btn btn-info rounded-pill "><i class="uil-plus"></i> Ajoutez une aide</button> 
                        @endif
                            <button type="button" data-bs-toggle="modal" data-bs-target="#modalcgu_add" class="btn btn-primary rounded-pill "><i class="uil-plus-circle
                            "></i> Ajoutez une condition generale</button> 
                        </h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->




            <div class="row">

                <div class="col-lg-6 col-12 col-sm-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                                <h4 class="card-title">Aide
                    
                                            <div class="app-search dropdown float-end">
                                            
                                                    <div class="input-group">
                                                        <input type="search"  class="form-control dropdown-toggle"  placeholder="Recherche...">
                                                        <span class="mdi mdi-magnify search-icon"></span>
                                                        
                                                        <button class="input-group-text btn btn-primary" type="submit">Search</button>
                                                    </div>
                                            
                                            </div>
                                </h4>
                                    <p class="card-description">
                                        Vous avez la possibilité de  <code>modifier</code> ou de <code>suprimer  </code>  une Aide
                                    </p>
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead class="thead-dark bg-info">
                                                <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">message</th>
                                                <th scope="col">code</th>
                                                <th scope="col">actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @if(!is_null($list_aide))
                                                <tr>
                                                    <th scope="row">{{$list_aide->id}}</th>
                                                    <td>{{$list_aide->message}}</td>
                                                    <td>Desactiver</td>
                                                    <td class="table-action">
                                                        <a href="#" wire:click="edit_aide({{$list_aide->id}})" data-bs-toggle="modal" data-bs-target="#modal_edit" class="action-icon"> <i class="mdi mdi-pencil"></i></a>
                                                        <a href="#" wire:click="delete_aide({{$list_aide->id}})" class="action-icon"> <i class="mdi mdi-delete"></i></a>
                                                    </td>
                                                </tr>
                                                @else
                                                <th>
                                                    <td>
                                                        <h6 class="text-warning text-center">Aucun textte d'aide enregistrer</h6>
                                                    </td>
                                                </th>
                                                @endif
                                            </tbody>
                                        </table>
                                    </div>
                        </div>
                    </div>
                </div>


                <livewire:partials.c-g-u />


            </div>



            
        <div id="modal_add" wire:ignore.self class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">

                    <div class="modal-body">
                        <div class="text-center mt-2 mb-4">
                            <a href="/dashboard" class="text-success">
                                <span><img src="../assets/images/logo/Jiam_s3-removebg-preview.png" alt="" height="100"></span>
                            </a>
                        </div>

                        <form class="ps-3 pe-3 needs-validation" novalidate wire:submit.prevent="submit_aide">

                            <div class="mb-3">
                                <label for="username" class="form-label">Texte d'aide aux clients</label>
                                <textarea class="form-control" wire:model.debounce.500ms="text" rows="10"></textarea>
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

        <div id="modal_edit" wire:ignore.self class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">

                    <div class="modal-body">

                        <form class="ps-3 pe-3 needs-validation" novalidate wire:submit.prevent="update_aide">

                            <div class="mb-3">
                                <label for="username" class="form-label">Texte d'aide aux clients</label>
                                <textarea class="form-control" wire:model.debounce.500ms="text" rows="10"></textarea>
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
