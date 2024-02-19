<?php

// Informations de connexion à la base de données
$dsn = 'mysql:host=localhost;dbname=vetotoil';

$username = 'root';
$password = '';

try {
    // Connexion à la base de données avec PDO
    $pdo = new PDO($dsn, $username, $password);
    
    // Définir le mode d'erreur PDO à exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
     // Date de début et de fin pour la période de deux semaines
     $date_debut = date('Y-m-d');
     $date_fin = date('Y-m-d', strtotime('+14 days'));
     
     // Requête pour récupérer tous les employés et leurs jours travaillés
     $sql_employes = "SELECT e.id_employer, e.nom, e.prenom, a.jours_travailler 
                      FROM employer e 
                      INNER JOIN ajouter a ON e.id_employer = a.id_employer";
     $stmt_employes = $pdo->query($sql_employes);
     $employes = $stmt_employes->fetchAll(PDO::FETCH_ASSOC);
     
     // Parcourir tous les employés
     foreach ($employes as $employe) {
         $employe_id = $employe['id_employer'];
         $jours_travailles = json_decode($employe['jours_travailler'], true);
         
         echo "Disponibilités pour l'employé {$employe['nom']} {$employe['prenom']} pour la période du $date_debut au $date_fin :<br>";
         
         // Boucle sur chaque jour de la période
         $date = $date_debut;
         while ($date <= $date_fin) {
             $jour_semaine_fr = strtolower(date('l', strtotime($date)));
             
             // Traduire le jour de la semaine en français
             switch ($jour_semaine_fr) {
                 case 'monday':
                     $jour_semaine_fr = 'lundi';
                     break;
                 case 'tuesday':
                     $jour_semaine_fr = 'mardi';
                     break;
                 case 'wednesday':
                     $jour_semaine_fr = 'mercredi';
                     break;
                 case 'thursday':
                     $jour_semaine_fr = 'jeudi';
                     break;
                 case 'friday':
                     $jour_semaine_fr = 'vendredi';
                     break;
                 case 'saturday':
                     $jour_semaine_fr = 'samedi';
                     break;
                 case 'sunday':
                     $jour_semaine_fr = 'dimanche';
                     break;
             }
             
             // Vérifier si le jour fait partie des jours travaillés de l'employé
             if (in_array($jour_semaine_fr, $jours_travailles)) {
                 // Requête pour récupérer les créneaux horaires déjà pris pour cet employé pour cette date
                 $sql_pris = "SELECT heure FROM rdv WHERE date_rdv = :date AND id_employer = :id_employer";
                 $stmt_pris = $pdo->prepare($sql_pris);
                 $stmt_pris->bindParam(':date', $date);
                 $stmt_pris->bindParam(':id_employer', $employe_id);
                 $stmt_pris->execute();
                 $creneaux_pris = $stmt_pris->fetchAll(PDO::FETCH_COLUMN);
                 
                 // Générer une liste de tous les créneaux horaires possibles (par exemple, de 9h à 17h)
                 $creneaux_possibles = [];
                 for ($i = 9; $i < 17; $i++) {
                     $creneaux_possibles[] = sprintf("%02d:00:00", $i);
                 }
                 
                 // Filtrer les créneaux horaires disponibles en excluant ceux qui sont déjà pris
                 $creneaux_disponibles = array_diff($creneaux_possibles, $creneaux_pris);
                 
                 // Afficher les créneaux horaires disponibles pour cet employé pour cette date
                 echo "Date : $date ($jour_semaine_fr)<br>";
                 if (count($creneaux_disponibles) > 0) {
                     echo "Créneaux horaires disponibles :<br>";
                     foreach ($creneaux_disponibles as $creneau) {
                         echo "$creneau<br>";
                     }
                 } else {
                     echo "Aucun créneau horaire disponible pour cette date.<br>";
                 }
                 echo "<br>";
             }
             
             // Passer à la prochaine date
             $date = date('Y-m-d', strtotime($date . ' +1 day'));
         }
     }
 } catch (PDOException $e) {
     // En cas d'erreur de connexion à la base de données
     echo "Erreur de connexion à la base de données : " . $e->getMessage();
 }
 
 // Fermer la connexion à la base de données
 $pdo = null;
 
 ?>