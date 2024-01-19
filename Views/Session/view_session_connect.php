
<?php


if (isset($connexion)){
    $_SESSION["nom"]=$connexion[0]->nom;
    $_SESSION["prenom"]=$connexion[0]->prenom;
    $_SESSION["id"]=$connexion[0]->id;

    // echo "<br>";
    // echo "test : " .$_SESSION["nom"];
    // echo "<br>";
    // echo "test : " .$_SESSION["prenom"];
   
}

    ?>
    <script>window.location.href="?controller=home&action=home"</script>