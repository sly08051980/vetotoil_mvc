<?php

if (isset($connexionProfessionnel[0])){
$_SESSION['nom_societe']=$connexionProfessionnel[0]->nom_societe;
$_SESSION['nom_dirigeant']=$connexionProfessionnel[0]->nom_dirigeant;
$_SESSION['adresse']=$connexionProfessionnel[0]->adresse;
$_SESSION['ville']=$connexionProfessionnel[0]->ville;
}

?>

<script>window.location.href="?controller=pro&action=ajout_employer"</script>