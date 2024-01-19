<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <!-- bootstrap-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
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

<body>



  <header>
    <?php session_start(); ?>
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top" id="navbar">

      <div class="container-fluid">
        <div class="d-flex align-items-center">
          <img src="./Content/img/logo.png" alt="logo-vetotoil" height="30px" width="30px" class="me-3">
          <a class="navbar-brand" href="#">VETOTOIL</a>
        </div>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll"
          aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarScroll">
          <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll mx-auto" style="--bs-scroll-height: 100px;">
            <li class='nav-item'>
              <a class='nav-link active' aria-current='page' href="?controller=home&action=home">-Accueil-</a>
            <li class='nav-item'>
              <a class='nav-link active' aria-current='page'
                href="?controller=acces&action=acces_connexion">-Connexion-</a>
            <li class='nav-item'>
              <a class='nav-link active' aria-current='page'
                href="?controller=acces&action=acces_inscription">-Inscription-</a>

            <li class='nav-item'>
              <a class='nav-link active' aria-current='page' href='?controller=home&action=contact'>-Contact-</a>

          </ul>
          <?php if (isset($_SESSION['nom'])) {
                echo "<ul class='navbar-nav  my-2 my-lg-0 navbar-nav-scroll justify-content-end' style='--bs-scroll-height: 100px;'>";
                echo "<li class='nav-item'>";
                echo "<a class='nav-link active' aria-current='page' href='?controller=home&action=contact'>Bienvenue " . $_SESSION['nom'] . " ".$_SESSION['prenom']."</a>";
                echo "</ul>";


                echo '<div class="nav-item">';
                echo '<div class="d-flex  justify-content-end">';
               
                echo '<a href ="?controller=session&action=session_deconnexion">
                 <img src="./Content/img/deconnexion.png" class="img-fluid" alt="vetotoil deconnexion"
                    style="width:15%"></a>';
                echo '</div>';
             echo '</div>';
              }else{
                echo '<div class="nav-item">';
                echo '<div class="d-flex  justify-content-end">';
               
                echo '<a href ="?controller=acces&action=acces_connexion">
                 <img src="./Content/img/connexion.png" class="img-fluid" alt="vetotoil deconnexion"
                    style="width:15%"></a>';
                echo '</div>';
             echo '</div>';
              }

              ?>
          
     
        </div>
    </nav>
  </header>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>
</body>

</html>