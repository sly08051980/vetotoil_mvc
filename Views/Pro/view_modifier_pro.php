<h1 class="text-center">Bonjour Monsieur
    <?= $homePro[0]->nom_dirigeant ?>
</h1>
<div class="row">
    <div class="col-12 col-sm-6 mx-auto">
        <div class="card mb-3" id="societe">
            <div class="card shadow-lg p-3 mb-5 bg-body rounded border-5 ">

                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="#" class="img-fluid rounded-start" alt="...">
                    </div>
                    <form method="POST" action="?controller=pro&action=update_societe">
                        <div class="col-12 col-md-12">
                            <div class="card-body">
                                <div class="row">

                                    <div class="col-12 col-sm-6">
                                        <div class="row">
                                            <label class="fw-bold">Nom de la Société : </label>
                                        </div>
                                        <div class="row">
                                            <input type="text" class="card-title fw-normal border-0 " name="nomSociete"
                                                value="<?= $homePro[0]->nom_societe ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <div class="row">
                                            <label class="fw-bold" for="siret">Siret : </label>
                                        </div>
                                        <div class="row">
                                            <input type="text" id="siret" class="card-title fw-normal border-0"
                                                name="siret" value="<?= $homePro[0]->siret ?>" readonly>
                                        </div>

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 col-sm-6">
                                        <div class="row">
                                            <label class="fw-bold">Nom du dirigeant </label>
                                        </div>
                                        <div class="row">
                                            <input type="text" class="modifierInput card-title fw-normal border-0"
                                                name="nomDirigeant" value="<?= $homePro[0]->nom_dirigeant ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <div class="row">
                                            <label class="fw-bold">profession </label>
                                        </div>
                                        <div class="row">
                                            <input type="text" class="modifierInput card-title fw-normal border-0"
                                                name="profession" value="<?= $homePro[0]->profession ?>" readonly>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12 col-sm-6">
                                        <div class="row">
                                            <label class="fw-bold">adresse </label>
                                        </div>
                                        <div class="row">
                                            <input type="text" class="modifierInput card-title fw-normal border-0"
                                                name="adresse" value="<?= $homePro[0]->adresse ?>" readonly>

                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <div class="row">
                                            <label class="fw-bold">complement_adresse </label>
                                        </div>
                                        <div class="row">
                                            <input type="text" class="modifierInput card-title fw-normal border-0"
                                                name="complementAdresse" value="<?= $homePro[0]->complement_adresse ?>"
                                                readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 col-sm-6">
                                        <div class="row">
                                            <label class="fw-bold">code_postal </label>
                                        </div>
                                        <div class="row">
                                            <input type="text" class="modifierInput card-title fw-normal border-0"
                                                name="codePostal" value="<?= $homePro[0]->code_postal ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <div class="row">
                                            <label class="fw-bold">ville </label>
                                        </div>
                                        <div class="row">
                                            <input type="text" class="modifierInput card-title fw-normal border-0"
                                                name="ville" value="<?= $homePro[0]->ville ?>" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 col-sm-6">
                                        <div class="row">
                                            <label class="fw-bold">telephone_societe </label>
                                        </div>
                                        <div class="row">
                                            <input type="text" class="modifierInput card-title fw-normal border-0"
                                                name="telephoneSociete" value="<?= $homePro[0]->telephone_societe ?>"
                                                readonly>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <div class="row">
                                            <label class="fw-bold">telephone_dirigeant </label>
                                        </div>
                                        <div class="row">
                                            <input type="text" class="modifierInput card-title fw-normal border-0"
                                                name="telephoneDirigeant"
                                                value="<?= $homePro[0]->telephone_dirigeant ?>" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 col-sm-6">
                                        <div class="row">
                                            <label class="fw-bold">email </label>
                                        </div>
                                        <div class="row">
                                            <input type="text" class="modifierInput card-title fw-normal border-0"
                                                name="email" value="<?= $homePro[0]->email ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <div class="row">
                                            <label class="fw-bold">date_creation </label>
                                        </div>
                                        <div class="row">

                                            <input type="text" class="card-title fw-normal border-0 "
                                                name="dateCreation" value="<?= $homePro[0]->date_creation ?>" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 col-sm-6">
                                        <div class="row">
                                            <label class="fw-bold">date_resiliation </label>
                                        </div>
                                        <div class="row">

                                            <input type="text" class="card-title fw-normal border-0 "
                                                name="dateResiliation" value="<?= $homePro[0]->date_resiliation ?>"
                                                readonly>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <div class="row">
                                            <label class="fw-bold">date_validation </label>
                                        </div>
                                        <div class="row">

                                            <input type="text" class="card-title fw-normal border-0 "
                                                name="dateValidation" value="<?= $homePro[0]->date_validation ?>"
                                                readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 col-sm-6">
                                        <div class="row">
                                            <label class="fw-bold">droit_utilisateur </label>
                                        </div>
                                        <div class="row">

                                            <input type="text" class="card-title fw-normal border-0 "
                                                name="droitUtilisateur" value="<?= $homePro[0]->droit_utilisateur ?>"
                                                readonly>
                                        </div>
                                    </div>

                                </div>

                            </div>

                        </div>
                        <div class="col-12">
                            <button type="button" id="modifier" value="modifier"
                                class="btn btn-custom rounded-pill">Modifier</button>

                            <input type="submit" value="Envoyer" id="envoyerFormulaire"
                                class="d-none btn btn-custom rounded-pill ">

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>