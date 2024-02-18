<?php

// Fonction pour géocoder une adresse et obtenir ses coordonnées géographiques (latitude et longitude)
function geocodeAddress($address, $apiKey) {
    // Préparer l'adresse pour l'URL
    $encodedAddress = urlencode($address);

    // URL de l'API Geocoding
    $url = "https://maps.googleapis.com/maps/api/geocode/json?address={$encodedAddress}&key={$apiKey}";

    // Effectuer la requête HTTP
    $response = file_get_contents($url);

    // Vérifier si la réponse est valide
    if ($response === false) {
        return false;
    }

    // Décoder la réponse JSON
    $data = json_decode($response, true);

    // Vérifier si la réponse contient des résultats
    if (!isset($data['results']) || empty($data['results'])) {
        return false;
    }

    // Récupérer les coordonnées géographiques (latitude et longitude) à partir des résultats
    $location = $data['results'][0]['geometry']['location'];

    return $location;
}

// Fonction pour récupérer les adresses dans un rayon donné autour de coordonnées géographiques spécifiques
function getAddressesInRadius($latitude, $longitude, $radius, $apiKey) {
    $pageToken = null;
    $addresses = [];

    do {
        // URL de l'API Geocoding pour obtenir les adresses dans un rayon donné autour des coordonnées spécifiées
        $url = "https://maps.googleapis.com/maps/api/geocode/json?latlng={$latitude},{$longitude}&radius={$radius}&key={$apiKey}";

        // Ajouter le jeton de page à l'URL si disponible
        if ($pageToken !== null) {
            $url .= "&pagetoken={$pageToken}";
        }

        // Effectuer la requête HTTP
        $response = file_get_contents($url);

        // Décoder la réponse JSON
        $data = json_decode($response, true);

        // Vérifier si la réponse contient des résultats
        if (!isset($data['results']) || empty($data['results'])) {
            break;
        }

        // Récupérer les adresses à partir des résultats
        foreach ($data['results'] as $result) {
            $addresses[] = $result['formatted_address'];
        }

        // Récupérer le jeton de page pour la prochaine page de résultats
        $pageToken = isset($data['next_page_token']) ? $data['next_page_token'] : null;

        // Attendre un court instant pour éviter les limites de taux de requête
        sleep(2);
    } while ($pageToken !== null);

    return $addresses;
}

// Exemple d'utilisation
$address = '6 avenue du marechal ney ,marseille,13011'; // Adresse spécifiée (rue, ville, code postal)
$radius = 50000; // Rayon de recherche en mètres
$apiKey = 'AIzaSyCDqrU32v7JAnzr1vZxhsVzLgQGfuyGMb0'; // Clé API Google Maps

// Géocoder l'adresse spécifiée pour obtenir ses coordonnées géographiques
$location = geocodeAddress($address, $apiKey);

if ($location !== false) {
    $latitude = $location['lat'];
    $longitude = $location['lng'];

    // Rechercher les adresses dans un rayon donné autour des coordonnées géographiques spécifiées
    $addresses = getAddressesInRadius($latitude, $longitude, $radius, $apiKey);

    if (!empty($addresses)) {
        foreach ($addresses as $address) {
            echo $address . "<br>";
        }
    } else {
        echo "Aucune adresse trouvée dans le rayon spécifié.";
    }
} else {
    echo "Impossible de géocoder l'adresse spécifiée.";
}

?>
