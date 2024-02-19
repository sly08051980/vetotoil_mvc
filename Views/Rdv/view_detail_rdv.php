<?php
<<<<<<< HEAD

=======
// Récupérer les valeurs de $nom et $codePostal à partir de la requête GET ou POST
>>>>>>> b44879ff3442b2b9334c1b1cb23afd3f6182047c
$nom = isset($_REQUEST['nom']) ? $_REQUEST['nom'] : null;
$codePostal = isset($_REQUEST['codePostal']) ? $_REQUEST['codePostal'] : null;
var_dump($nom);

<<<<<<< HEAD

if ($nom !== null && $codePostal !== null) {

    $date_demain = new DateTime('tomorrow');
    $date_demain_str = $date_demain->format('Y-m-d');

    // trie 
    usort($employerDispos, function ($a, $b) use ($nom, $codePostal) {
        //
        $result = strcasecmp($a['nom'], $b['nom']);

        if ($result == 0) {
            // trie par code postal si il y a deja un nom https://www.php.net/manual/fr/function.strcasecmp.php
=======
// Assurez-vous que $nom et $codePostal sont définis avant de continuer
if ($nom !== null && $codePostal !== null) {
    // Obtenir la date de demain
    $date_demain = new DateTime('tomorrow');
    $date_demain_str = $date_demain->format('Y-m-d');

    // Triez les employés par nom puis par code postal en fonction des valeurs de $nom et $codePostal
    usort($employerDispos, function ($a, $b) use ($nom, $codePostal) {
        // Comparer d'abord par nom
        $result = strcasecmp($a['nom'], $b['nom']);

        if ($result == 0) {
            // Si les noms sont identiques, trier par code postal
>>>>>>> b44879ff3442b2b9334c1b1cb23afd3f6182047c
            return strcasecmp($a['code_postal'], $b['code_postal']);
        }
        return $result;
    });

<<<<<<< HEAD
   
    $lastEmployerInfo = null;
    ?>
    <div class="row">
        <?php foreach ($employerDispos as $employerDispo) {

       

        var_dump($employerDispo);
        die;
       
            if ($employerDispo['nom'] == $nom && $employerDispo['code_postal'] == $codePostal) {

           
                // Vérifier si les informations sur l'employé actuel sont différentes de celles du dernier employé affiché
                if ($lastEmployerInfo !== null && $lastEmployerInfo !== $employerDispo) {

              
=======
    // Variable pour stocker les informations sur le dernier employé affiché
    $lastEmployerInfo = null;
    ?>
    <div class="row">
        <?php foreach ($employerDispos as $employerDispo) :

        var_dump($employerDispo);
        die;
            // Vérifier si le nom et le code postal correspondent
            if ($employerDispo['nom'] == $nom && $employerDispo['code_postal'] == $codePostal) :
                // Vérifier si les informations sur l'employé actuel sont différentes de celles du dernier employé affiché
                if ($lastEmployerInfo !== null && $lastEmployerInfo !== $employerDispo) :
>>>>>>> b44879ff3442b2b9334c1b1cb23afd3f6182047c
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
<<<<<<< HEAD
                <?php   }
                // garde les info
                $lastEmployerInfo = $employerDispo;

                // disponibilité
                foreach ($employerDispo as $date => $disponibilites) {
                    if (DateTime::createFromFormat('Y-m-d', $date) !== false && $date > $date_demain_str) :
                        // recherche des heures en fonction des jours
                        foreach ($disponibilites as $jour => $plages) {

                       
=======
                <?php endif;
                // Stocker les informations sur l'employé actuel
                $lastEmployerInfo = $employerDispo;

                // disponibilité
                foreach ($employerDispo as $date => $disponibilites) :
                    if (DateTime::createFromFormat('Y-m-d', $date) !== false && $date > $date_demain_str) :
                        // recherche des heures en fonction des jours
                        foreach ($disponibilites as $jour => $plages) :
>>>>>>> b44879ff3442b2b9334c1b1cb23afd3f6182047c
                            // Afficher le jour
                            ?>
                            <div class="col-md-4">
                                <div class="card mb-3" style="max-width: 540px;">
                                    <div class="card-body">
                                        <h5 class="card-title"><?= ucfirst($jour) ?></h5>
                                        <?php
                                        // Afficher les créneaux horaires disponibles
<<<<<<< HEAD
                                        foreach ($plages[0] as $heure) {
                                            if (!empty($heure)) {
                                                ?>
                                                <p class="card-text"><?= $date ?> <?= $heure ?></p>
                                            <?php }
                                       }
=======
                                        foreach ($plages[0] as $heure) :
                                            if (!empty($heure)) :
                                                ?>
                                                <p class="card-text"><?= $date ?> <?= $heure ?></p>
                                            <?php endif;
                                        endforeach;
>>>>>>> b44879ff3442b2b9334c1b1cb23afd3f6182047c
                                        ?>
                                    </div>
                                </div>
                            </div>
<<<<<<< HEAD
                        <?php  }
                    endif;
                }
            }
        }
=======
                        <?php endforeach;
                    endif;
                endforeach;
            endif;
        endforeach;
>>>>>>> b44879ff3442b2b9334c1b1cb23afd3f6182047c
        ?>
    </div>
<?php } else {
    // Gérer le cas où $nom ou $codePostal n'est pas défini
    echo "Veuillez fournir le nom et le code postal.";
}
?>
