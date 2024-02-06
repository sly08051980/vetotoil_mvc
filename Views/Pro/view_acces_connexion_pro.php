<div class="container">
            <div class="row">
            <div class="card shadow-lg p-3 mb-5 bg-body rounded border-5 ">
                <div class="col-12 justify-content-center py-5">
                    <h1 class="text-center">Connexion Professionnel</h1>
                </div>
</div>
<div class="card shadow-lg p-3 mb-5 bg-body rounded border-5 ">
                <form class="col-lg-5" action="?controller=pro&action=connexion_professionnel" method="POST">
                    <div class="mb-3">
                        <label for="siret" class="form-label">Siret</label>
                        <input type="text" class="form-control" id="siret" name="siret" aria-describedby="siret">

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
        </div>