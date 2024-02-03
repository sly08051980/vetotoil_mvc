<?php

function validate_formulaire($data){
    $data=trim($data);
    $data=htmlspecialchars($data);
    $data=stripslashes($data);
    $data=strtolower($data);
    return($data);

}

function inserer_image($file){
    if(isset($_FILES['file'])){

        $tmpName = $_FILES['file']['tmp_name'];
        $name = $_FILES['file']['name'];
        $size = $_FILES['file']['size'];
        $error = $_FILES['file']['error'];
        
        $tabExtension = explode('.', $name);
        $extension = strtolower(end($tabExtension));
        //Tableau des extensions que l'on accepte
        $extensions = ['jpg', 'png', 'jpeg', 'gif'];
        $maxSize = 4000000;
 
        $finfo = finfo_open(FILEINFO_MIME_TYPE);
        $mimeType = finfo_file($finfo, $tmpName);
    
    
        if ($mimeType == "image/jpeg"||$mimeType == "image/jpg"||$mimeType == "image/gif"||$mimeType == "image/png"||$mimeType =="image/svg+xml") {
            if (in_array($extension, $extensions) && $size <= $maxSize && $error == 0) {
                $uniqueName = uniqid('', true);
    
                $file = $uniqueName . "." . $extension;
                var_dump($file);
                move_uploaded_file($tmpName, './upload/' . $file);
                echo "./upload/" . $file;
            } else {
            echo "Mauvaise extension ou taille trop grande";
        }
    } else {
        echo "nop";
    
    }
    }
}
?>