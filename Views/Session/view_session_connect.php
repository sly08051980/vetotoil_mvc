
<?php


if (isset($connexion)){

    $_SESSION["nom"] = $connexion['nom'];
    $_SESSION["prenom"] = $connexion['prenom'];
    $_SESSION["id"] = $connexion['id_patient'];
    $_SESSION["adresse"] = $connexion['adresse'];
    $_SESSION["ville"] = $connexion['ville'];
    $_SESSION["code_postal"] = $connexion['code_postal'];
    $_SESSION['droit_utilisateur'] = $connexion['droit_utilisateur'];

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