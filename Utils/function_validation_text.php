<?php

function validate_formulaire($data)
{
    $data = trim($data);
    $data = htmlspecialchars($data);
    $data = stripslashes($data);
    $data = strtolower($data);
    return ($data);
}

function inserer_image($file)
{
    // Vérifier si un fichier a été transmis
    if (!empty($_FILES['file']['name'])) {

        // Récupérer les informations sur le fichier
        $tmpName = $_FILES['file']['tmp_name'];
        $name = $_FILES['file']['name'];
        $size = $_FILES['file']['size'];

        // Vérifier que le fichier a été téléchargé avec succès
        if (is_uploaded_file($tmpName)) {

            $maxSize = 4000000;
            $finfo = finfo_open(FILEINFO_MIME_TYPE);

            // Obtenir le type MIME du fichier
            $mimeType = finfo_file($finfo, $tmpName);

            // Obtenir l'extension du fichier
            $extension = strtolower(pathinfo($name, PATHINFO_EXTENSION));

            // Tableau des extensions acceptées
            $extensions = ['jpg', 'png', 'jpeg', 'gif', 'svg'];

            // Vérifier si le type MIME et l'extension sont valides
            if (
                in_array($mimeType, ["image/jpeg", "image/jpg", "image/gif", "image/png", "image/svg+xml"]) &&
                in_array($extension, $extensions) && $size <= $maxSize
            ) {
                $uniqueName = uniqid('', true);
                $newFileName = $uniqueName . "." . $extension;

                // Déplacer le fichier téléchargé vers le répertoire de destination
                if (move_uploaded_file($tmpName, './Content/img/utilisateur/' . $newFileName)) {
                    return $newFileName;
                } else {
                    echo "Erreur lors du déplacement du fichier.";
                }
            } else {
                echo "Mauvaise extension ou taille trop grande";
            }
        } else {
            echo "Erreur lors du téléchargement du fichier.";
        }
    } 
}
