<p>Gestion des employés</p>

<div class="row">
    <?php foreach ($employer as $employe) { 
      
        ?>
        <div class="col-md-4">

            <div class="card mb-4 shadow-sm">
                <img src="<?= $employe->images ?>" class="card-img-top" alt="<?= $employe->nom ?>">
                <div class="card-body">
                    <h5 class="card-title">
                        <?= $employe->nom ?>
                    </h5>
                    <p class="card-text">
                        <?= $employe->prenom ?>
                    </p>
                    <p class="card-text">
                        <?= $employe->adresse ?>
                    </p>
                    <p class="card-text">
                        <?= $employe->code_postal ?>
                    </p>
                    <p class="card-text">
                        <?= $employe->ville ?>
                    </p>
                    <p class="card-text">
                        <?= $employe->telephone ?>
                    </p>
                    <p class="card-text">
                        <?= $employe->jours_travailler ?>
                    </p>
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="btn-group">
                            <form method="POST" action="?controller=pro&action=editer_employer">
                                <input type="hidden" value=<?=$employe->id_employer?> name="employer">
                                <input type="submit" value="Editer">
                            </form>
                            <form method="POST" action="?controller=pro&action=supprimer_employer">
                            <input type="hidden" value=<?=$employe->id_employer?> name="employer">
                            <input type="submit" value="Supprimer">
                           
                            </form>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    <?php } ?>
</div>