
<?php


if (isset($connexion)){
    $_SESSION["nom"]=$connexion[0]->nom;
    $_SESSION["prenom"]=$connexion[0]->prenom;
    $_SESSION["id"]=$connexion[0]->id_patient;
    $_SESSION["adresse"]=$connexion[0]->adresse;
    $_SESSION["ville"]=$connexion[0]->ville;
    $_SESSION["code_postal"]=$connexion[0]->code_postal;
    $_SESSION['droit_utilisateur']=$connexion[0]->droit_utilisateur;

    // echo "<br>";
    // echo "test : " .$_SESSION["nom"];
    // echo "<br>";
    // echo "test : " .$_SESSION["prenom"];
    // echo "<br>";
    // echo "test : " .$_SESSION["id"];
    // echo "<br>";
    // echo "test : " .$_SESSION["droit_utilisateur"];
    //     echo "<br>";
    // echo "test : " .$_SESSION["adresse"];
    //     echo "<br>";
    // echo "test : " .$_SESSION["ville"];
    //      echo "<br>";
    // echo "test : " .$_SESSION["code_postal"];
    

   
}

    ?>
    <script>window.location.href="?controller=home&action=home"</script>