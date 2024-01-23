<?php

function validate_formulaire($data){
    $data=trim($data);
    $data=htmlspecialchars($data);
    $data=stripslashes($data);
    $data=strtolower($data);
    return($data);

}



?>