<?php

$nom = isset($_REQUEST['nom']) ? $_REQUEST['nom'] : null;
$codePostal = isset($_REQUEST['codePostal']) ? $_REQUEST['codePostal'] : null;
var_dump($nom);


if ($nom !== null && $codePostal !== null) {

    $date_demain = new DateTime('tomorrow');
    $date_demain_str = $date_demain->format('Y-m-d');

    // trie 
    usort($employerDispos, function ($a, $b) use ($nom, $codePostal) {
        //
        $result = strcasecmp($a['nom'], $b['nom']);

        if ($result == 0) {
            // trie par code postal si il y a deja un nom https://www.php.net/manual/fr/function.strcasecmp.php
            return strcasecmp($a['code_postal'], $b['code_postal']);
        }
        return $result;
    });

   
    $lastEmployerInfo = null;
    ?>
    <div class="row">
        <?php foreach ($employerDispos as $employerDispo) {

       

        var_dump($employerDispo);
        die;
       
            if ($employerDispo['nom'] == $nom && $employerDispo['code_postal'] == $codePostal) {

           
                // Vérifier si les informations sur l'employé actuel sont différentes de celles du dernier employé affiché
                if ($lastEmployerInfo !== null && $lastEmployerInfo !== $employerDispo) {

              
                    // Si oui, afficher les informations sur l'employé actuel
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
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php   }
                // garde les info
                $lastEmployerInfo = $employerDispo;

                // disponibilité
                foreach ($employerDispo as $date => $disponibilites) {
                    if (DateTime::createFromFormat('Y-m-d', $date) !== false && $date > $date_demain_str) :
                        // recherche des heures en fonction des jours
                        foreach ($disponibilites as $jour => $plages) {

                       
                            // Afficher le jour
                            ?>
                            <div class="col-md-4">
                                <div class="card mb-3" style="max-width: 540px;">
                                    <div class="card-body">
                                        <h5 class="card-title"><?= ucfirst($jour) ?></h5>
                                        <?php
                                        // Afficher les créneaux horaires disponibles
                                        foreach ($plages[0] as $heure) {
                                            if (!empty($heure)) {
                                                ?>
                                                <p class="card-text"><?= $date ?> <?= $heure ?></p>
                                            <?php }
                                       }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        <?php  }
                    endif;
                }
            }
        }
        ?>
    </div>
<?php } else {
    // Gérer le cas où $nom ou $codePostal n'est pas défini
    echo "Veuillez fournir le nom et le code postal.";
}
?>
