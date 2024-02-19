<div class="row">
  <?php foreach ($modifier as $key) : ?>
    <div class="col-12 col-sm-4">
      <div class="card">
        <form method="POST" action="">
          <div class="card-body">
            <div class="mb-2">
              <label for="prenom" class="form-label">Prenom</label>
              <input type="text" id="prenom" name="prenom" class="form-control" value="<?= $key->prenom_animal ?>">
            </div>
            <div class="mb-2">
              <label for="naissance" class="form-label">Date de Naissance</label>
              <input type="text" id="naissance" name="naissance" class="form-control" value="<?= $key->date_naissance_animal ?>">
            </div>
            <div class="mb-2">
              <label for="race" class="form-label">Race</label>
              <input type="text" id="race" name="race" class="form-control" value="<?= $key->race_animal ?>">
            </div>
            <div class="mb-2">
              <input type="text" id="idAnimal" name="idAnimal" class="form-control" value="<?= $key->id_animal ?>">
            </div>
            <div class="row">
              <div class="col-6">
                <input type="submit" name="action" value="Modifier" class="btn btn-custom rounded-pill">
              </div>
              <div class="col-6 text-end">
                <input type="submit" formaction="?controller=animal&action=supprimer_animal" name="action" value="Retirer" class="btn btn-custom rounded-pill">
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  <?php endforeach; ?>
</div>