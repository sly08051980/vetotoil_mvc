<?php

var_dump($editer);

foreach($editer as $edit){
?>

<div class="col-md-12">

<div class="card mb-6 shadow-sm">
    <img src="<?= $edit->images ?>" class="card-img-top" alt="<?= $edit->nom ?>">
    <div class="card-body">
        <h5 class="card-title">
            <?= $edit->nom ?>
        </h5>
        <p class="card-text">
            <?= $edit->prenom ?>
        </p>
        <p class="card-text">
            <?= $edit->adresse ?>
        </p>
        <p class="card-text">
            <?= $edit->code_postal ?>
        </p>
        <p class="card-text">
            <?= $edit->ville ?>
        </p>
        <p class="card-text">
            <?= $edit->telephone ?>
        </p>
        <p class="card-text">
            <?= $edit->jours_travailler ?>
        </p>
        <div class="d-flex justify-content-between align-items-center">
            <div class="btn-group">
                <form method="POST" action="?controller=pro&action=editer_employer">
                    <input type="hidden" value=<?=$edit->id_employer?> name="employer">
                    <input type="submit" value="Editer">
                </form>
                <form method="POST" action="?controller=pro&action=supprimer_employer">
                <input type="hidden" value=<?=$edit->id_employer?> name="employer">
                <input type="submit" value="Supprimer">
               
                </form>
            </div>

        </div>
    </div>
</div>

</div>

<?php
}
?>