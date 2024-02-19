<div class="container " id="inscriptionPro">
    <div class="row">
<div class="col-12 col-sm-5">
<a href="?controller=pro&action=connexion_pro"><button class="btn btn-custom rounded-pill" >Connexion Pro</button></a>
</div>

    </div>


    <div class="row pt-3">
        <div class="card shadow-lg p-3 mb-5 bg-body rounded border-5 ">
            <div class="col-12 justify-content-center py-5">
                <h1 class="text-center">Inscription Pour les Professionnels</h1>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="card shadow-lg p-3 mb-5 bg-body rounded border-5 ">
            <form class="col-lg-12" method="POST" action="?controller=pro&action=inscription_pro"
                enctype="multipart/form-data">

                <div class="row">


                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label for="siret" class="form-label">Numero Siret</label>
<<<<<<< HEAD
                            <input type="text" class="form-control" name="siret" id="siret" aria-describedby="siret" required>
=======
                            <input type="text" class="form-control" name="siret" id="siret" aria-describedby="siret">
>>>>>>> b44879ff3442b2b9334c1b1cb23afd3f6182047c

                            <button type="button" class="btn btn-custom rounded-pill" id="button">Rechercher</button>

                        </div>
                        <div class="mb-3">
                            <label for="nomSociete" class="form-label">Nom Société</label>
                            <input type="text" class="form-control" name="nomSociete" id="nomSociete"
<<<<<<< HEAD
                                aria-describedby="nomSociete" required>
=======
                                aria-describedby="nomSociete">
>>>>>>> b44879ff3442b2b9334c1b1cb23afd3f6182047c
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
<<<<<<< HEAD
                                aria-describedby="nomDirigeant" required>
=======
                                aria-describedby="nomDirigeant">
>>>>>>> b44879ff3442b2b9334c1b1cb23afd3f6182047c
                            <ul id="list"></ul></label>
                        </div>

                    </div>


                    <div class="col-lg-4">

                        <div class="mb-3">
                            <label for="adresse" class="form-label">Adresse</label>
                            <input type="text" class="form-control" name="adresse" id="adresse"
<<<<<<< HEAD
                                aria-describedby="adresse" required>
=======
                                aria-describedby="adresse">
>>>>>>> b44879ff3442b2b9334c1b1cb23afd3f6182047c
                        </div>
                        <div class="mb-3">
                            <label for="complementAdresse" class="form-label">Complément Adresse</label>
                            <input type="text" class="form-control" name="complementAdresse" id="complementAdresse"
                                aria-describedby="complementAdresse">
                        </div>
                        <div class="mb-3">
                            <label for="codePostal" class="form-label">Code Postal</label>
                            <input type="text" class="form-control" name="codePostal" id="codePostal"
<<<<<<< HEAD
                                aria-describedby="codePostal" required>
                        </div>
                        <div class="mb-3">
                            <label for="ville" class="form-label">Ville</label>
                            <input type="text" class="form-control" name="ville" id="ville" aria-describedby="ville" required>
=======
                                aria-describedby="codePostal">
                        </div>
                        <div class="mb-3">
                            <label for="ville" class="form-label">Ville</label>
                            <input type="text" class="form-control" name="ville" id="ville" aria-describedby="ville">
>>>>>>> b44879ff3442b2b9334c1b1cb23afd3f6182047c
                        </div>


                    </div>
                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label for="telephoneSociete" class="form-label">Téléphone Société</label>
                            <input type="tel" class="form-control" name="telephoneSociete" id="telephoneSociete"
<<<<<<< HEAD
                                aria-describedby="telephoneSociete" pattern="[0-9]{10}" required>
=======
                                aria-describedby="telephoneSociete" pattern="[0-9]{10}">
>>>>>>> b44879ff3442b2b9334c1b1cb23afd3f6182047c
                        </div>
                        <div class="mb-3">
                            <label for="telephoneDirigeant" class="form-label">Téléphone Dirigeant</label>
                            <input type="tel" class="form-control" name="telephoneDirigeant" id="telephoneDirigeant"
<<<<<<< HEAD
                                aria-describedby="telephoneDirigeant" pattern="[0-9]{10}" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" name="email" id="email" aria-describedby="email" required>
=======
                                aria-describedby="telephoneDirigeant" pattern="[0-9]{10}">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" name="email" id="email" aria-describedby="email">
>>>>>>> b44879ff3442b2b9334c1b1cb23afd3f6182047c
                        </div>
                        <div class="mb-3">

                            <label for="password" class="form-label">Mot de passe</label>
<<<<<<< HEAD
                            <input type="password" class="form-control" name="password" id="password" required>
                        </div>
                        <ul id="ulVisible" class="d-none">
                            <div class="row">
                                <div class="col-4">
                                <img src="./Content/img/valider.png"class="img-thumbnail d-none" id="chiffre" width="25%">
                            
                                </div>
                                <div class=col-8>
                                <li class="text-font">Mettre des lettres et de chiffres</li>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4">
                                <img src="./Content/img/valider.png"class="img-thumbnail d-none" id="majuscule" width="25%">
                            
                                </div>
                                <div class=col-8>
                                <li class="text-font">Une ou plusieurs Majuscule</li>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4">
                                <img src="./Content/img/valider.png"class="img-thumbnail d-none" id="caractere" width="25%">
                            
                                </div>
                                <div class=col-8>
                                <li class="text-font">8 Caractères minimum</li>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4">
                                <img src="./Content/img/valider.png"class="img-thumbnail d-none" id="special" width="25%">
                            
                                </div>
                                <div class=col-8>
                                <li class="text-font">1 Caractere special</li>
                                </div>
                            </div>
                           
                            </ul>
                        <div class="mb-3">
                            <label for="repassword" class="form-label">Confirmer le mot de passe</label>
                            <input type="password" class="form-control" id="repassword" required>
=======
                            <input type="password" class="form-control" name="password" id="password">
                        </div>
                        <div class="mb-3">
                            <label for="repassword" class="form-label">Confirmer le mot de passe</label>
                            <input type="password" class="form-control" id="repassword">
>>>>>>> b44879ff3442b2b9334c1b1cb23afd3f6182047c
                        </div>
                    </div>

                </div>
        </div>

        <!-- Bouton au bas du milieu -->
        <div class="row justify-content-center pt-5">
            
            <div class="card shadow-lg p-3 mb-5 bg-body rounded border-5 ">
                <div class="mb-3">
                    <label for="file">Choisir une image qui sera utilisé dans les recheche utilisateur</label>
                    </br>
                    <input type="file" name="file" id="image">
                </div>
                <span id="passwordHelpInline" class="form-text">
                    En cochant la case ci-dessous, je confirme avoir lu, compris et accepté l'ensemble des dispositions
                    relatives à l'utilisation d'images sur la plateforme Vetotoil.
                </span>
                <div class="form-check">

                    <input class="form-check-input" type="checkbox" value="checkbox" id="checkbox">
                    <label class="form-check-label" for="flexCheckDefault">
                        <span id="passwordHelpInline" class="form-text">
                            J'accepte les Conditions Générales d'Utilisation de Vetotoil.
                        </span>
                    </label>
                </div>
                <div class="col-lg-8 text-center">
<<<<<<< HEAD
                    <input id="submit" type="submit" class="btn btn-custom rounded-pill" value="Envoyer" >
=======
                    <input id="submit" type="submit" class="btn btn-custom rounded-pill" value="Envoyer">
>>>>>>> b44879ff3442b2b9334c1b1cb23afd3f6182047c
                </div>
            </div>
            </form>
        </div>
    </div>
   

</div>
</div>