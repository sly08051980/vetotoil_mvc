<?php var_dump($modifier) ?>

<div class="row">
<?php  foreach($modifier as $key ): ?>

  <div class="col-sm-4">
    <div class="card">
      <div class="card-body">
        <h5 ><input type="text" name="prenom" value="<?=$key->prenom?>"></h5>
        <p><input type="text" name="prenom" value="<?=$key->date_naissance?>"></p>
        <p><input type="text" name="prenom" value="<?=$key->id_race?>"></p>
    
        <a href="#" class="btn btn-primary">Modifier</a>
      </div>
    </div>
  </div>

    
<?php endforeach; ?>
</div>