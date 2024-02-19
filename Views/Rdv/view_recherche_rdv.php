<?php
// Obtenir la date de demain
$date_demain = new DateTime('tomorrow');
$date_demain_str = $date_demain->format('Y-m-d');

?>
<div class="row">
    <?php
    // boucle par employer
    foreach ($employerDispos as $employerDispo) {
     
        // pour voir si la premiere date est trouvée
        $firstDateDisplayed = false;

        // disponibilité
        foreach ($employerDispo as $date => $disponibilites) {
            if (DateTime::createFromFormat('Y-m-d', $date) !== false && $date > $date_demain_str) {
                // recherche des heures en fonction des jours
                foreach ($disponibilites as $jour => $plages) {
                    // pour voir si la plage horaire est trouvée
                    $plage_trouvee = false;
                    // recherche le premier rendez-vous le jour et la date et l'heure
                    foreach ($plages[0] as $heure) {
                        if (!empty($heure)) {
    ?>
                            <div class="col-md-4">
                                <div class="card mb-3" style="max-width: 540px;">
                                    <div class="row g-0">
                                        <div class="col-md-4">
                                            <img src="..." class="img-fluid rounded-start" alt="...">
                                        </div>
                                        <div class="col-md-8">
                                            <div class="card-body">
                                                <h5 class="card-title">Nom : <?= $employerDispo['nom'] ?></h5>
                                                <p class="card-text">Adresse : <?= $employerDispo['adresse'] ?></p>
                                                <p class="card-text">Code Postal : <?= $employerDispo['code_postal'] ?></p>
                                                <p class="card-text">Ville : <?= $employerDispo['ville'] ?></p>
                                                <p class="card-text">Téléphone : <?= $employerDispo['telephone_societe'] ?></p>
                                                <p class="card-text"><?= ucfirst($jour) . " : " . $date . " " . $heure ?></p>
                            <?php
                            $plage_trouvee = true;
                            break;
                        }
                    }
                    // si pas de rendez-vous
                    if (!$plage_trouvee) {
                        echo "<p class='card-text'>Pas de disponibilité</p>";
                    }
                }
                // variable pour la premiere date trouvé
                $firstDateDisplayed = true;
<<<<<<< HEAD
                break; 
=======
                break; // arrêter dès qu'un résultat est trouvé
>>>>>>> b44879ff3442b2b9334c1b1cb23afd3f6182047c
            }
        }
                            ?>
                            <form action="?controller=rdv&action=detail_rdv" method="POST">
                                <input type="text" name="profession" value=<?=$employerDispo['profession'];?>>
                                <input type="text" name="nom" value=<?=$employerDispo['nom'];?>>
                                <input type="text" name="codePostal" value=<?=$employerDispo['code_postal'];?>>
                               
                                <input type="submit" value="Selectioner">
                            </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php
                    }
                        ?>
</div>