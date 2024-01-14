<div class="container pt-5" id="ficheUsers">
    <div class="row d-flex justify-content-center align-items-center pt-5">

        <div class="card mb-3" style="max-width: 540px;">
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="../images/userdefaut.webp" class="img-fluid rounded-start" alt="vetotoil image user">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title"><?= isset($inscription['nom']) ? htmlspecialchars($inscription['nom']) : '' ?> <?= isset($inscription['prenom']) ? htmlspecialchars($inscription['prenom']) : '' ?></h5>
                        <p class="card-text">Adresse : <?= isset($inscription['adresse']) ? htmlspecialchars($inscription['adresse']) : '' ?></p>
                        <p class="card-text">Code postal : <?= isset($inscription['codePostal']) ? htmlspecialchars($inscription['codePostal']) : '' ?></p>
                        <p class="card-text">Ville : <?= isset($inscription['ville']) ? htmlspecialchars($inscription['ville']) : '' ?></p>
                        <p class="card-text">Téléphone : <?= isset($inscription['telephone']) ? htmlspecialchars($inscription['telephone']) : '' ?></p>
                        <p class="card-text">Email : <?= isset($inscription['email']) ? htmlspecialchars($inscription['email']) : '' ?></p>
                    </div>

                </div>
            </div>

        </div>

        <div class="row justify-content-center">
                        <div class="col-lg-8 text-center">
                            <button type="submit" class="btn btn-primary" id="boutonAnimal">Ajouter Animal</button>
                        </div>
    </div>
</div>
<div class="row invisible"id="afficherAnimal">
    <div class="col-6">
        <div class="card mb-3" style="max-width: 540px;">
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="../images/userdefaut.webp" class="img-fluid rounded-start" alt="vetotoil image user">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">Nom animal</h5>
                        <p class="card-text">Type</p>
                        <p class="card-text">Race</p>
                        <p class="card-text">Date de naissance</p>


                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
</div>