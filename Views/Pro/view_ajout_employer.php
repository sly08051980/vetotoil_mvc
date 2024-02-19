<div class="row" id="ajout_employer">
    <div class="col-12 col-sm-4">
    <div class="card shadow-lg p-3 mb-5 bg-body rounded border-5 ">
        <div class="card">
        
            <img src="<?= $_SESSION['images'] ?>" class="card-img-top image-pro" alt="image societe">
            <div class="card-body">
                <h5 class="card-title">Société :
                    <?= $_SESSION['nom'] ?>
                </h5>
                <p class="card-text">Nom :
                    <?= $_SESSION['prenom'] ?>
                </p>
                <p class="card-text">Adresse :
                    <?= $_SESSION['adresse'] ?>
                </p>
                <p class="card-text">Ville :
                    <?= $_SESSION['ville'] ?>
                </p>
            </div>
            <button class="btn btn-custom rounded-pill" id="btn_ajout_employer">Ajouter Employer</button>
        </div>
</div>
    </div>

    <div class="col-12 col-sm-8 invisible" id="employer">
        <div class="card">
        <div class="card shadow-lg p-3 mb-5 bg-body rounded border-5 ">
            <form action="?controller=pro&action=enregistrement_employer" method="POST" enctype="multipart/form-data">

                <div class="row">
                    <div class="col-12 col-sm-6">
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
                            <input type="text" class="form-control" id="adresse" name="adresse"
                                aria-describedby="adresse">
                            <ul id="list"></ul></label>
                        </div>
                        <div class="mb-3">
                            <label for="complementAdresse" class="form-label">Complément Adresse</label>
                            <input type="text" class="form-control" id="complementAdresse" name="complementAdresse"
                                aria-describedby="complementAdresse">
                        </div>
                        <div class="mb-3">
                            <label for="codePostal" class="form-label">Code Postal</label>
                            <input type="text" class="form-control" id="codePostal" name="codePostal"
                                aria-describedby="codePostal">
                        </div>
                        <div class="mb-3">
                            <label for="ville" class="form-label">Ville</label>
                            <input type="text" class="form-control" id="ville" name="ville" aria-describedby="ville">
                        </div>
                        <div class="mb-3">
                            <label for="telephone" class="form-label">Téléphone</label>
                            <input type="text" class="form-control" id="telephone" name="telephone"
                                aria-describedby="telephone">
                        </div>
                    </div>
                    <div class="col-12 col-sm-6">

                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" aria-describedby="email">
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

                            <label for="password" class="form-label">Mot de passe</label>
                            <input type="password" class="form-control" name="password" id="password"
                                autocomplete="off">
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
                            <input type="password" class="form-control" id="repassword" autocomplete="off">
                        </div>
                        <div class="mb-3">
                            <label for="dateEntre" class="form-label">Date D'entrée</label>
                            <input type="text" class="form-control" id="dateEntre" name="dateEntre"
                                aria-describedby="date d'entrée">
                        </div>
                        <div class="mb-3">
                            <input type="checkbox" id="lundi" name="lundi" />
                            <label for="lundi">Lundi </label>

                            <input type="checkbox" id="mardi" name="mardi" />
                            <label for="mardi">Mardi </label>

                            <input type="checkbox" id="mercredi" name="mercredi" />
                            <label for="mercredi">Mercredi </label>

                            <input type="checkbox" id="jeudi" name="jeudi" />
                            <label for="jeudi">Jeudi</label>
                        </div>
                        <div class="mb-3">
                            <input type="checkbox" id="vendredi" name="vendredi" />
                            <label for="vendredi">Vendredi </label>

                            <input type="checkbox" id="samedi" name="samedi" />
                            <label for="samedi">Samedi </label>

                            <input type="checkbox" id="dimanche" name="dimanche" />
                            <label for="dimanche">Dimanche</label>
                        </div>
                        <input type="hidden" name="siret" value="<?= $_SESSION['siret']; ?>">

                        <div class="mb-3">
                            <label for="file">Choisir une image qui sera utilisé dans les recheche utilisateur</label>
                            </br>
                            <input type="file" name="file" id="image">
                        </div>
                        <span id="passwordHelpInline" class="form-text">
                            En cochant la case ci-dessous, je confirme avoir lu, compris et accepté l'ensemble des
                            dispositions relatives à l'utilisation d'images sur la plateforme Vetotoil.
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
                <input type="submit" class="btn btn-custom rounded-pill" id="submit" value="Valider">
            </form>
</div>
        </div>
    </div>
</div>