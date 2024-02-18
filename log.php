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
    
    $requete = "SELECT * FROM commune WHERE nom_commune='ROSNY SOUS BOIS'";
    $result = $pdo->prepare($requete);

    // Exécution de la requête
    $result->execute();

    // Récupération des résultats
    $row = $result->fetch(PDO::FETCH_ASSOC);
    $latitude = $row['latitude'];
    $longitude = $row['longitude'];
    echo "Latitude: $latitude<br>";
    echo "Longitude: $longitude<br>";

    $formule = "(6366*acos(cos(radians($latitude))*cos(radians(`latitude`))*cos(radians(`longitude`)-radians($longitude))+sin(radians($latitude))*sin(radians(`latitude`))))";

    // Définition d'une valeur par défaut pour la distance
    $distance = 10; // Par exemple, une distance de 10 kilomètres

    $sql = "SELECT nom_commune, $formule AS dist FROM commune WHERE $formule <= :distance ORDER BY dist ASC";
    $res = $pdo->prepare($sql);
    $res->bindParam(':distance', $distance);
    $res->execute();
    
    // Récupération des résultats de la deuxième requête
    while ($r = $res->fetch(PDO::FETCH_ASSOC)) {
        echo $r['nom_commune'] . ": " . $r['dist'] . "<br>";
    }

} catch (PDOException $e) {
    // En cas d'erreur de connexion à la base de données
    echo "Erreur de connexion à la base de données : " . $e->getMessage();
}

// Fermer la connexion à la base de données
$pdo = null;


?>
