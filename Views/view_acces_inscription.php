<body>
    <main>

<div class="container pt-5">
            <div class="row">
                <div class="col-12 justify-content-center py-5">
                    <h1 class="text-center">Inscription</h1>
                </div>
            </div>
            <div class="row justify-content-center">
                <form class="col-lg-8">
                    <div class="row">
                        <!-- Colonnes de gauche -->
                        <div class="col-lg-5">
                            <div class="mb-3">
                                <label for="nom" class="form-label">Nom</label>
                                <input type="text" class="form-control" id="nom" aria-describedby="nom">
                            </div>
                            <div class="mb-3">
                                <label for="prenom" class="form-label">Prénom</label>
                                <input type="text" class="form-control" id="prenom" aria-describedby="prenom">
                            </div>
                            <div class="mb-3">
                                <label for="adresse" class="form-label">Adresse</label>
                                <input type="text" class="form-control" id="adresse" aria-describedby="adresse">
                                <ul id="list"></ul></label>
                            </div>
                            <div class="mb-3">
                                <label for="complementAdresse" class="form-label">Complément Adresse</label>
                                <input type="text" class="form-control" id="complementAdresse"
                                    aria-describedby="complementAdresse">
                            </div>
                            <div class="mb-3">
                                <label for="codePostal" class="form-label">Code Postal</label>
                                <input type="text" class="form-control" id="codePostal" aria-describedby="codePostal">
                            </div>
                        </div>

                        <!-- Colonnes de droite -->
                        <div class="col-lg-5">
                            <div class="mb-3">
                                <label for="ville" class="form-label">Ville</label>
                                <input type="text" class="form-control" id="ville" aria-describedby="ville">
                            </div>
                            <div class="mb-3">
                                <label for="telephone" class="form-label">Téléphone</label>
                                <input type="text" class="form-control" id="telephone" aria-describedby="telephone">
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" aria-describedby="email">
                            </div>
                            <div class="mb-3">

                                <label for="password" class="form-label">Mot de passe</label>
                                <input type="password" class="form-control" id="password">
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
                    <button type="submit" class="btn btn-custom rounded-pill">Submit</button>
                </div>
            </div>
            </form>
        </div>
        </div>
    </main>
</body>