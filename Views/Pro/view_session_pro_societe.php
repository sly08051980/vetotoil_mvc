<?php

if (isset($connexionProfessionnel[0])){
$_SESSION['nom']=$connexionProfessionnel[0]->nom_societe;
$_SESSION['prenom']=$connexionProfessionnel[0]->nom_dirigeant;
$_SESSION['adresse']=$connexionProfessionnel[0]->adresse;
$_SESSION['ville']=$connexionProfessionnel[0]->ville;
$_SESSION['siret']=$connexionProfessionnel[0]->siret;
}

?>

<script>window.location.href="?controller=pro&action=ajout_employer"</script>