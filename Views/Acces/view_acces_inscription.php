

        <div class="container" id="inscription">
            <div class="row">
                <div class="col-12 justify-content-center py-5">
                    <h1 class="text-center">Inscription</h1>
                </div>
            </div>
            <div class="row justify-content-center">
                <form class="col-lg-8" method="POST" action="?controller=acces&action=acces_inscription_valider">
                    <div class="row">
                        <!-- Colonnes de gauche -->

                        <div class="col-lg-5">
                            <div class="mb-3">
                                <label for="nom" class="form-label">Nom</label>
                                <input type="text" class="form-control" id="nom" name="nom" aria-describedby="nom">
                            </div>
                            <div class="mb-3">
                                <label for="prenom" class="form-label">Prénom</label>
                                <input type="text" class="form-control" id="prenom" name="prenom" aria-describedby="prenom">
                            </div>
                            <div class="mb-3">
                                <label for="adresse" class="form-label">Adresse</label>
                                <input type="text" class="form-control" id="adresse" name="adresse" aria-describedby="adresse">
                                <ul id="list"></ul></label>
                            </div>
                            <div class="mb-3">
                                <label for="complementAdresse" class="form-label">Complément Adresse</label>
                                <input type="text" class="form-control" id="complementAdresse" name="complementAdresse" aria-describedby="complementAdresse">
                            </div>
                            <div class="mb-3">
                                <label for="codePostal" class="form-label">Code Postal</label>
                                <input type="text" class="form-control" id="codePostal" name="codePostal" aria-describedby="codePostal">
                            </div>
                        </div>

                        <!-- Colonnes de droite -->
                        <div class="col-lg-5">
                            <div class="mb-3">
                                <label for="ville" class="form-label">Ville</label>
                                <input type="text" class="form-control" id="ville" name="ville" aria-describedby="ville">
                            </div>
                            <div class="mb-3">
                                <label for="telephone" class="form-label">Téléphone</label>
                                <input type="text" class="form-control" id="telephone" name="telephone" aria-describedby="telephone">
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" aria-describedby="email">
                            </div>
                            <div class="mb-3">

                                <label for="password" class="form-label">Mot de passe</label>
                                <input type="password" class="form-control" id="password" name="password">
                            </div>
                            <div class="mb-3">
                                <label for="repassword" class="form-label">Confirmer le mot de passe</label>
                                <input type="password" class="form-control" id="repassword">
                            </div>
                        </div>

                    </div>
            </div>

            <!-- Bouton au bas du milieu -->
            <div class="row justify-content-center">
                <div class="col-lg-8 text-center">
                    <input type="submit" class="btn btn-custom rounded-pill" value="Envoyer" />
                </div>
            </div>

            </form>
        </div>
        </div>
