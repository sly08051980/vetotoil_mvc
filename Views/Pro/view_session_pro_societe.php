<?php

if (isset($connexionProfessionnel)){
$_SESSION['nom']=$connexionProfessionnel->nom_societe;
$_SESSION['prenom']=$connexionProfessionnel->nom_dirigeant;
$_SESSION['adresse']=$connexionProfessionnel->adresse;
$_SESSION['ville']=$connexionProfessionnel->ville;
$_SESSION['siret']=$connexionProfessionnel->siret;
$_SESSION['images']=$connexionProfessionnel->images;
$_SESSION['droit_utilisateur']=$connexionProfessionnel->droit_utilisateur;
}

?>

<script>window.location.href="?controller=pro&action=ajout_employer"</script>