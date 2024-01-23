<div class="container " id="ficheUsers">
    <div class="row d-flex justify-content-center align-items-center pt-5">

        <div class="card mb-3" style="max-width: 540px;">
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="./Content/img/userdefaut.png" class="img-fluid rounded-start" alt="vetotoil image user">
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

    <div class="row invisible" id="afficherAnimal">
        <div class="col-6">
            <div class="card mb-3" style="max-width: 540px;">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="./Content/img/userdefaut.png" class="img-fluid rounded-start" alt="vetotoil image user">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <form class="col-lg-8" id="choix">
                                <div class="mb-3">
                                    <label for="typeAnimal" class="form-label">Type d'animal</label>
                                    <select class="form-select" id="typeAnimal" name="typeAnimal" aria-describedby="choix de l'animal">
                                        <option value="selection" selected>Choisissez une option</option>
                                        <option value="Chien">Chien</option>
                                        <option value="Chat">Chat</option>
                                    </select>
                                </div>
                            </form>
                            <p id="confirmationMessage" class="card-text">test</p>
</div>
                        <div class="row" id="descriptionAnimal">
                        <form action="" method="">
                        <div class="mb-3">
                                <label for="prenom" class="form-label">Race de votre Animal</label>
                                <p class="fs-6 text-danger">Si vous ne trouvez pas la race choisir autre</p>
                                <input type="text" class="form-control" id="race" name="race" aria-describedby="race de votre animal">
                            </div>
                            <ul id="raceList"></ul>
                            <div class="mb-3">
                                <label for="prenom" class="form-label">Prenom de votre Animal</label>
                                <input type="text" class="form-control" id="prenom" name="prenom" aria-describedby="prenom de votre animal">
                            </div>
                            <div class="mb-3">
                                <label for="dateNaissance" class="form-label">Date de naissance</label>
                                <input type="text" class="form-control" id="dateNaissance" name="dateNaissance" aria-describedby="date de naissance de votre animal">
                            </div>

                         
                            <div class="mb-3">
                                <input type="hidden" class="form-control" id="raceValide" name="raceValide" aria-describedby="prenom de votre animal">
                            </div>

                            <form>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<div class="row invisible" id="">
    <div class="col-6">
        <div class="card mb-3" style="max-width: 540px;">
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="./Content/img/userdefaut.png" class="img-fluid rounded-start" alt="vetotoil image user">
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