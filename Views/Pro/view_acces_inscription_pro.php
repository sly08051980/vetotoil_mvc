<div class="container" id="inscriptionPro">


    <div class="row">
        <div class="col-12 justify-content-center py-5">
            <h1 class="text-center">Inscription Pour les Professionnels</h1>
        </div>
    </div>

    <div class="row justify-content-center">
        <form class="col-lg-8" method="POST" action="?controller=pro&action=inscription_pro" enctype="multipart/form-data">
            <div class="row">
                <div class="card mb-3" style="max-width: 540px;">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="./Content/img/userdefaut.png" class="img-fluid rounded-start" alt="...">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">

                            </div>
                        </div>
                    </div>
                </div>
                <!-- Colonnes de gauche -->
                <div class="col-lg-5">
                    <div class="mb-3">
                        <label for="siret" class="form-label">Numero Siret</label>
                        <input type="text" class="form-control" name="siret" id="siret" aria-describedby="siret">

                        <button type="button" class="btn btn-custom rounded-pill" id="button">Rechercher</button>

                    </div>
                    <div class="mb-3">
                        <label for="nomSociete" class="form-label">Nom Société</label>
                        <input type="text" class="form-control" name="nomSociete" id="nomSociete"
                            aria-describedby="nomSociete">
                    </div>
                    <div class="mb-3">
                        <label name="profession" for="profession" class="form-label">Profession</label>
                        <select class="form-select" name="profession" id="profession"
                            aria-label="Sélectionnez une option">
                            <option selected>Choisissez...</option>
                            <option value="Vétérinaire">Vétérinaire</option>
                            <option value="Toiletteur">Toiletteur</option>

                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="nomDirigeant" class="form-label">Nom du Dirigeant</label>
                        <input type="text" class="form-control" name="nomDirigeant" id="nomDirigeant"
                            aria-describedby="nomDirigeant">
                        <ul id="list"></ul></label>
                    </div>
                    <div class="mb-3">
                        <label for="adresse" class="form-label">Adresse</label>
                        <input type="text" class="form-control" name="adresse" id="adresse" aria-describedby="adresse">
                    </div>
                    <div class="mb-3">
                        <label for="complementAdresse" class="form-label">Complément Adresse</label>
                        <input type="text" class="form-control" name="complementAdresse" id="complementAdresse"
                            aria-describedby="complementAdresse">
                    </div>
                    <div class="mb-3">
                        <label for="codePostal" class="form-label">Code Postal</label>
                        <input type="text" class="form-control" name="codePostal" id="codePostal"
                            aria-describedby="codePostal">
                    </div>
                </div>

                <!-- Colonnes de droite -->
                <div class="col-lg-5">
                    <div class="mb-3">
                        <label for="ville" class="form-label">Ville</label>
                        <input type="text" class="form-control" name="ville" id="ville" aria-describedby="ville">
                    </div>
                    <div class="mb-3">
                        <label for="telephoneSociete" class="form-label">Téléphone Société</label>
                        <input type="tel" class="form-control" name="telephoneSociete" id="telephoneSociete"
                            aria-describedby="telephoneSociete" pattern="[0-9]{10}">
                    </div>
                    <div class="mb-3">
                        <label for="telephoneDirigeant" class="form-label">Téléphone Dirigeant</label>
                        <input type="tel" class="form-control" name="telephoneDirigeant" id="telephoneDirigeant"
                            aria-describedby="telephoneDirigeant" pattern="[0-9]{10}">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" id="email" aria-describedby="email">
                    </div>
                    <div class="mb-3">

                        <label for="password" class="form-label">Mot de passe</label>
                        <input type="password" class="form-control" name="password" id="password">
                    </div>
                    <div class="mb-3">
                        <label for="repassword" class="form-label">Confirmer le mot de passe</label>
                        <input type="password" class="form-control" id="repassword">
                    </div>
                    <div class="mb-3">
                        <label for="file">Choisir une image</label>
                        <input type="file" name="file" id="image">
                    </div>
                    <span id="passwordHelpInline" class="form-text">
                    En cochant la case ci-dessous, je confirme avoir lu, compris et accepté l'ensemble des dispositions relatives à l'utilisation d'images sur la plateforme Vetotoil.
                                </span>
                    <div class="form-check">
                   
                    <input class="form-check-input" type="checkbox" value="checkbox" id="checkbox">
                    <label class="form-check-label" for="flexCheckDefault">
                    <span id="passwordHelpInline" class="form-text">
                    J'accepte les Conditions Générales d'Utilisation de Vetotoil.
                                </span>
                        </label>
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
    <a href="?controller=pro&action=connexion_pro">Connexion Pro</a>

</div>
</div>