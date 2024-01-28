<div class="card mb-3" id="societe">
    <div class="row g-0">
        <div class="col-md-4">
            <img src="#" class="img-fluid rounded-start" alt="...">
        </div>
        <div class="col-md-6">
            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                        <div class="row">
                            <label class="fw-bold">Nom de la Société : </label>
                        </div>
                        <div class="row">
                            <input type="text" class="card-title fw-normal border-0 " value="<?= $homePro[0]->nom_societe ?>" readonly>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="row">
                            <label class="fw-bold" for="siret">Siret : </label>
                        </div>
                        <div class="row">
                            <input type="text" id="siret" class="card-title fw-normal border-0" value="<?= $homePro[0]->siret ?>" readonly>
                        </div>

                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="row">
                            <label class="fw-bold">Nom du dirigeant </label>
                        </div>
                        <div class="row">
                            <input type="text" class="modifierInput card-title fw-normal border-0" value="<?= $homePro[0]->nom_dirigeant ?>" readonly>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="row">
                            <label class="fw-bold">profession </label>
                        </div>
                        <div class="row">
                            <input type="text" class="modifierInput card-title fw-normal border-0" value="<?= $homePro[0]->profession ?>" readonly>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-6">
                        <div class="row">
                            <label class="fw-bold">adresse </label>
                        </div>
                        <div class="row">
                            <input type="text" class="modifierInput card-title fw-normal border-0" value="<?= $homePro[0]->adresse ?>" readonly>

                        </div>
                    </div>
                    <div class="col-6">
                        <div class="row">
                            <label class="fw-bold">complement_adresse </label>
                        </div>
                        <div class="row">
                            <input type="text" class="modifierInput card-title fw-normal border-0" value="<?= $homePro[0]->complement_adresse ?>" readonly>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="row">
                            <label class="fw-bold">code_postal </label>
                        </div>
                        <div class="row">
                            <input type="text" class="modifierInput card-title fw-normal border-0" value="<?= $homePro[0]->code_postal ?>" readonly>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="row">
                            <label class="fw-bold">ville </label>
                        </div>
                        <div class="row">
                            <input type="text" class="modifierInput card-title fw-normal border-0" value="<?= $homePro[0]->ville ?>" readonly>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="row">
                            <label class="fw-bold">telephone_societe </label>
                        </div>
                        <div class="row">
                            <input type="text" class="modifierInput card-title fw-normal border-0" value="<?= $homePro[0]->telephone_societe ?>" readonly>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="row">
                            <label class="fw-bold">telephone_dirigeant </label>
                        </div>
                        <div class="row">
                            <input type="text" class="modifierInput card-title fw-normal border-0" value="<?= $homePro[0]->telephone_dirigeant ?>" readonly>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="row">
                            <label class="fw-bold">email </label>
                        </div>
                        <div class="row">
                            <input type="text" class="modifierInput card-title fw-normal border-0" value="<?= $homePro[0]->email ?>" readonly>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="row">
                            <label class="fw-bold">date_creation </label>
                        </div>
                        <div class="row">

                            <input type="text" class="card-title fw-normal border-0 " value="<?= $homePro[0]->date_creation ?>" readonly>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="row">
                            <label class="fw-bold">date_resiliation </label>
                        </div>
                        <div class="row">

                            <input type="text" class="card-title fw-normal border-0 " value="<?= $homePro[0]->date_resiliation ?>" readonly>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="row">
                            <label class="fw-bold">date_validation </label>
                        </div>
                        <div class="row">

                            <input type="text" class="card-title fw-normal border-0 " value="<?= $homePro[0]->date_validation ?>" readonly>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="row">
                            <label class="fw-bold">droit_utilisateur </label>
                        </div>
                        <div class="row">

                            <input type="text" class="card-title fw-normal border-0 " value="<?= $homePro[0]->droit_utilisateur ?>" readonly>
                        </div>
                    </div>

                </div>
                <div class="col-6">
                    <button type="button" id="modifier" value="modifier" class="btn btn-custom rounded-pill">Modifier</button>
                </div>
            </div>
        </div>
    </div>
</div>