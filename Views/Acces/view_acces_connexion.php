<div class="container pt-5">
            <div class="row">
                <div class="col-12 justify-content-center py-5">
                    <h1 class="text-center">Connexion Particulier</h1>
                </div>
                <form class="col-lg-5" action="?controller=session&action=session_connect" method="POST">
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp">

                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password">
                    </div>
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="checkbox">
                        <label class="form-check-label" for="checkbox">Afficher mot de passe</label>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <input type="submit" class="btn btn-custom rounded-pill" value="Valider"></button>

                        </div>


                    </div>
                </form>
                <div class="row">
                    <div class="col-12 justify-content-center py-2">
                        <a href="#">Mot de passe oublié</a>
                    </div>
                </div>
            </div>
        </div>