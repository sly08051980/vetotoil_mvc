<div class="container " id="ficheUsers">
    <div class="row d-flex align-items-center pt-5">

        <div class="card mb-3" style="max-width: 540px;">
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="./Content/img/userdefaut.png" class="img-fluid rounded-start" alt="vetotoil image user">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">
                            <?= isset($_SESSION['nom']) ? htmlspecialchars($_SESSION['nom']) : '' ?>
                            <?= isset($_SESSION['prenom']) ? htmlspecialchars($_SESSION['prenom']) : '' ?>
                        </h5>
                        <p class="card-text">Adresse :
                            <?= isset($_SESSION["adresse"]) ? htmlspecialchars($_SESSION["adresse"]) : '' ?>
                        </p>
                        <p class="card-text">Code postal :
                            <?= isset($_SESSION['code_postal']) ? htmlspecialchars($_SESSION['code_postal']) : '' ?>
                        </p>
                        <p class="card-text">Ville :
                            <?= isset($_SESSION["ville"]) ? htmlspecialchars($_SESSION["ville"]) : '' ?>
                        </p>

                    </div>

                </div>
            </div>
          

        </div>
        <div class="row">
            <div class="col-lg-8">
                <button type="submit" class="btn btn-primary" id="boutonAnimal">Ajouter Animal</button>
            </div>
        </div>
        <div class="col-6 invisible" id="afficherAnimal">
            <div class="card mb-3" style="max-width: 540px;">
                <div class="row g-0">
                    
                    <div class="col-md-8">
                        <div class="card-body">
                            <form class="col-lg-8" id="choix_animal">
                                <div class="mb-3">
                                    <label for="typeAnimal" class="form-label">Type d'animal</label>
                                    <select class="form-select" id="typeAnimal" name="typeAnimal"
                                        aria-describedby="choix de l'animal">
                                        <option value="selection" selected>Choisissez une option</option>
                                        <option value="Chien">Chien</option>
                                        <option value="Chat">Chat</option>
                                    </select>
                                </div>
                            </form>
                            <p id="confirmationMessage" class="card-text">test</p>
                        </div>
                        <div class="row" id="descriptionAnimal">
                            <form action="?controller=animal&action=enregistrer_animal" method="POST">
                                <div class="mb-3">
                                    <label for="prenom" class="form-label">Race de votre Animal</label>
                                    <p class="fs-6 text-danger">Si vous ne trouvez pas la race choisir autre</p>
                                    <input type="text" class="form-control" id="race" name="race"
                                        aria-describedby="race de votre animal">
                                    <input type="hidden" class="form-control" id="numero" name="numero"
                                        aria-describedby="race de votre animal">
                                    <input type="hidden" class="form-control" id="patient" name="patient"
                                        value="<?= isset($_SESSION["id"]) ? $_SESSION["id"] : '' ?>">

                                </div>
                                <ul id="raceList"></ul>
                                <div class="mb-3">
                                    <label for="prenom" class="form-label">Prenom de votre Animal</label>
                                    <input type="text" class="form-control" id="prenom" name="prenom"
                                        aria-describedby="prenom de votre animal">
                                </div>
                                <div class="mb-3">
                                    <label for="dateNaissance" class="form-label">Date de naissance</label>
                                    <input type="text" class="form-control" id="dateNaissance" name="dateNaissance"
                                        aria-describedby="date de naissance de votre animal">
                                </div>


                                <div class="mb-3">
                                    <input type="hidden" class="form-control" id="raceValide" name="raceValide"
                                        aria-describedby="prenom de votre animal">
                                </div>
                                <input type="submit" value="Valider">
                            </form>
                        </div>

                    </div>
                </div>
            </div>

        </div>

  
    </div>

    
       
   
</div>