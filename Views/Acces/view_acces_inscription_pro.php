<div class="container pt-5" id="inscriptionPro">
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
                                <label for="siret" class="form-label">Numero Siret</label>
                                <input type="text" class="form-control" id="siret" aria-describedby="siret">

                                <button type="button" class="btn btn-custom rounded-pill"
                                    id="button">Rechercher</button>

                            </div>
                            <div class="mb-3">
                                <label for="nomSociete" class="form-label">Nom Société</label>
                                <input type="text" class="form-control" id="nomSociete" aria-describedby="nomSociete">
                            </div>
                            <div class="mb-3">
                                <label for="profession" class="form-label">Profession</label>
                                <select class="form-select" id="profession" aria-label="Sélectionnez une option">
                                    <option selected>Choisissez...</option>
                                    <option value="Vétérinaire">Vétérinaire</option>
                                    <option value="Toiletteur">Toiletteur</option>

                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="nomDirigeant" class="form-label">Nom du Dirigeant</label>
                                <input type="text" class="form-control" id="nomDirigeant"
                                    aria-describedby="nomDirigeant">
                                <ul id="list"></ul></label>
                            </div>
                            <div class="mb-3">
                                <label for="adresse" class="form-label">Adresse</label>
                                <input type="text" class="form-control" id="adresse" aria-describedby="adresse">
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
                                <label for="telephoneSociete" class="form-label">Téléphone Société</label>
                                <input type="tel" class="form-control" id="telephoneSociete"
                                    aria-describedby="telephoneSociete" pattern="[0-9]{10}">
                            </div>
                            <div class="mb-3">
                                <label for="telephoneDirigeant" class="form-label">Téléphone Dirigeant</label>
                                <input type="tel" class="form-control" id="telephoneDirigeant"
                                    aria-describedby="telephoneDirigeant" pattern="[0-9]{10}">
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
            <div class="row justify-content-center pt-5">
                <div class="col-lg-8 text-center">
                    <input type="submit" class="btn btn-custom rounded-pill" value="Envoyer">
                </div>
            </div>
            </form>
        </div>
        </div>