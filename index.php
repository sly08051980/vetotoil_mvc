<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
     <!-- bootstrap-->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
      <!-- mes scripts-->
    <script src="./Content/js/script.js" defer></script>
    <script src="./Content/js/inscriptionPro.js" defer></script>
    <script src="./Content/js/adresse.js" defer></script>
    <!-- captcha google-->
    <!-- <script src="https://www.google.com/recaptcha/enterprise.js?render=6LdvkU4pAAAAALTI79SpmGzz32zYsFa2klLYdv4P"></script> -->
   
    <link rel="stylesheet" href="./Content/css/style.css">
      <!-- google font-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto+Serif:ital,opsz,wght@0,8..144,100;0,8..144,200;0,8..144,300;0,8..144,400;0,8..144,500;0,8..144,600;0,8..144,800;0,8..144,900;1,8..144,100;1,8..144,200;1,8..144,300;1,8..144,400;1,8..144,500;1,8..144,600;1,8..144,700;1,8..144,800;1,8..144,900&display=swap"
        rel="stylesheet">

    <title>Vetotoil</title>
  </head>
</html>
<?php 




require_once('Models/Model.php');
require_once('Controllers/Controller.php');
require_once('Utils/header.php');



$controllers=['home','acces'];
$controller_default='home';



if(isset($_GET['controller']) and in_array($_GET['controller'],$controllers))
{
    $nom_controller=$_GET['controller'];
}
else
    $nom_controller=$controller_default;

$nom_classe="Controller_".$nom_controller;
$nom_fichier="Controllers/".$nom_classe.".php";


if(file_exists($nom_fichier))
{
    require_once("$nom_fichier");
    $controller=new $nom_classe();
}
else 
    exit("ERROR 404:not found");

require_once('Utils/footer.php');

?>