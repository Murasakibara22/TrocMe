<div>


    <section class="my-lg-10 my-8">
        <!-- container -->
        <div class="container">
            <!-- row -->
            @if(session()->has('errorCreateUser'))
                <div class="alert alert-danger">
                {{ session('errorCreateUser')}}
                </div>
                @endif


             
            <div class="row justify-content-center align-items-center">
                <div class="col-12 col-md-6 col-lg-4 order-lg-1 order-2">
                    <!-- img -->
                    <img src="@if($currentPage == 1) {{ asset('../assets/images/signup-g.svg') }} @else {{ asset('../assets/images/confiident.gif') }} @endif" alt="" class="img-fluid mt-3">
                </div>
                @if(session()->has('successMessage'))
                <div class="alert alert-success">
                {{ session('successMessage')}}
                </div>
                @endif
                <!-- col -->
                <div class="col-12 col-md-6 offset-lg-1 col-lg-4 order-lg-2 order-1">
                    @if($errors->isNotEmpty()) 
                    <div class="alert alert-danger">
                       <span class="fw-bold"> Oupss!! </span> l'un des champs n'est pas correctement remplis.
                        </div>
                @endif

                    <div class="mb-lg-9 mb-3">
                        <h1 class="mb-1 h2 fw-bold">{{ $pages[$currentPage]['header'] }}</h1>
                        <p>{{$pages[$currentPage]['description'] }}</p>
                    </div>
                    <!-- form -->
                    <form wire:submit.prevent="SaveUser" method="POST">
                        <div class="row g-3">
                            <!-- col -->
                            @if($currentPage == 1)
                            <div class="col">
                                <!-- input --><input type="text" class="form-control" name="nom"
                                    placeholder="Nom" wire:model.debounce.500ms="nom" aria-label="First name" required>
                                    @error('nom') <span class="error text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="col">
                                <!-- input --><input type="text" class="form-control" name="prenom"
                                    placeholder="Prenoms" wire:model="prenom" aria-label="Last name" required>
                                    @error('prenom') <span class="error text-danger fs-6">{{ $message }}</span> @enderror
                            </div>
                            <div class="col-12">

                                <!-- input --><input type="email" class="form-control" name="email"
                                    placeholder="Email" wire:model="email" required>
                                    @error('email') <span class="error text-danger fs-6">{{ $message }}</span> @enderror
                            </div>
                            <div class="col-12">

                                <!-- input --><input type="text" wire:model="contact" class="form-control"
                                    placeholder="Contact" >
                            @error('contact') <span class="error text-danger fs-6">{{ $message }}</span> @enderror
                            </div>


                            <button type="button" wire:click="nextCurrentPage" class="btn btn-primary float-end">Suivant</button>

                            @elseif($currentPage == 2)
                            <div class="col-12">

                            <input type="password" wire:model="password" placeholder="Entrer votre mot de passe" id="inputPassword5" class="form-control" aria-describedby="passwordHelpBlock">
                                 @error('password') <span class="error text-danger">{{ $message }}</span> @enderror
                    
                            </div>

                            <div class="col-12">

                                <div class="password-field position-relative">
                                    <input type="password" name="password_confirmation" wire:model="password_confirmation" placeholder="Confirmer votre mot de passe"
                                        class="form-control" required>
                                </div>
                                @error('password_confirmation') <span class="error text-danger">{{ $message }}</span> @enderror
                            </div>

                            <div class="col-12">
                            <div class="form-group" >
                                <strong>Recaptcha:</strong>                  
                                {!! NoCaptcha::renderJs() !!}
                                {!! NoCaptcha::display() !!}
                            </div>
                            </div>


                            <div class="col-2 me-3 mt-3 d-grid float-start"> <button type="button" wire:click="PrecedenteCurrentPage" class="btn btn-danger ">Back</button>
                            </div>

                            <div class="col-3 ms-2 mt-3 d-grid float-end"> <button type="submit" class="btn btn-primary " :disabled="$disabled">Enregistrer</button>
                            </div>

                            @endif

                        </div>
                    </form>
                </div>
            </div>
        </div>


    </section>
</div>