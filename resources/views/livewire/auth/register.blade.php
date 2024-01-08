<div wire:ignore.self class="modal fade" id="userModal" tabindex="-1" aria-labelledby="userModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content p-4">
            <div class="modal-header border-0">
                <h5 class="modal-title fs-3 fw-bold" id="userModalLabel">Inscrivez-vous en un clic</h5>

                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form wire:submit.prevent='registerUser'>
                    <div class="mb-3">
                        <label for="fullName" class="form-label">Prenom</label>
                        <input type="text" class="form-control @error('name') is-invalid @endif" placeholder="Enter Your Name" wire:model="name"
                            required="">
                            @error('name') <span class="error text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input type="email" class="form-control" placeholder="Enter Email address" wire:model.lazy="email"
                            required="">
                            @error('email') <span class="error text-danger">{{$message}}</span> @enderror
                    </div>

                    <div class="mb-3">
                        <label  class="form-label">Contact</label>
                        <input type="number" class="form-control" placeholder="Enter votre contact " wire:model="contact"
                            required="">
                            @error('contact') <span class="error text-danger">{{$message}}</span> @enderror
                    </div>

                    <div class="mb-5">
                        <label for="password" class="form-label">Password</label>

                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Enter Password"
                                wire:model="password" required="">
                            <button class="btn btn-outline-secondary" type="button" wire:click='generateRandomPassword'>
                                <i class="bi bi-arrow-clockwise"></i>
                            </button>
                        </div>

                        @error('password') <span class="error text-danger">{{$message}}</span> @enderror
                    </div>

                    <div class="mb-5">
                        <label for="password" class="form-label">Confirmation de mot de passe</label>
                        <input type="text" class="form-control" placeholder="Confirmer le mot de passe"
                            wire:model="password_confirmation" >
                            @error('password_confirmation') <span class="error text-danger">{{$message}}</span> @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">Inscription</button>
                </form>
            </div>
            <div class="modal-footer border-0 justify-content-center">

                J'ai deja un compte? <a href="#">Connexion</a>
            </div>
        </div>
    </div>
</div>
