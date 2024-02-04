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
    if (isset($_FILES['file'])) {

        $tmpName = $_FILES['file']['tmp_name'];
        $name = $_FILES['file']['name'];
        $size = $_FILES['file']['size'];
        $error = $_FILES['file']['error'];

        $maxSize = 4000000;

        $finfo = finfo_open(FILEINFO_MIME_TYPE);
        $mimeType = finfo_file($finfo, $tmpName);

        // Obtenir les informations sur le chemin du fichier
        $pathInfo = pathinfo($name);
        $extension = strtolower($pathInfo['extension']);

        // Tableau des extensions que l'on accepte
        $extensions = ['jpg', 'png', 'jpeg', 'gif', 'svg'];

        if (
            $mimeType == "image/jpeg" || $mimeType == "image/jpg" || $mimeType == "image/gif" ||
            $mimeType == "image/png" || $mimeType == "image/svg+xml"
        ) {
            if (in_array($extension, $extensions) && $size <= $maxSize && $error == 0) {
                $uniqueName = uniqid('', true);
                $file = $uniqueName . "." . $extension;

                move_uploaded_file($tmpName, './Content/img/utilisateur/' . $file);
                return $file;
            } else {
                echo "Mauvaise extension ou taille trop grande";
            }
        } else {
            echo "Mauvaise extension d'image ";
        }
    }
}
