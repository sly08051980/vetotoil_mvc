<head>
<script src="./Content/js/adminPro.js"defer></script>
</head>

<div class="collapse navbar-collapse" id="navbarScroll">
    <ul class="navbar-nav ms-auto mb-2 mb-lg-0 mx-auto">
        <li class='nav-item'>
        <form method="POST" action="?controller=pro&action=modifier_pro">
                <input type="hidden" name="siret" value="<?= $_SESSION['siret'] ?>">
                <input type="submit" class="bg-transparent border-0 pt-2" id="envoyerSiret" value="Accueil">
            </form>
           
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Employer
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="#">Gestion Employer</a></li>
                <li><a class="dropdown-item" href="#">Ajouter Employer</a></li>
                <li><a class="dropdown-item" href="#">Voir RDV Employer</a></li>
                <li><a class="dropdown-item" href="#">Recherche RDV Employer</a></li>
                <li>
                    <hr class="dropdown-divider">
                </li>
                <li><a class="dropdown-item" href="#">Something else here</a></li>
            </ul>

        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Société
            </a>
            <ul class="dropdown-menu " aria-labelledby="navbarDropdown">
                <form method="POST" action="?controller=pro&action=modifier_pro">
                <input type="hidden" name="siret" value="<?= $_SESSION['siret'] ?>">
                <input type="submit" class="bg-transparent border-0 ms-3" id="envoyerSiret" value="Modifier">
            </form>
                <li>
                    <hr class="dropdown-divider">
                </li>
                <li><a class="dropdown-item" href="#">Something else here</a></li>
            </ul>

        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Contact</a>
        </li>
    </ul>

    <?php if (isset($_SESSION['nom'])) { ?>
        <ul class='navbar-nav mb-2 mb-lg-0'>
            <li class='nav-item'>
                <a class='nav-link active' aria-current='page' href='?controller=home&action=contact'>Bienvenue <?= $_SESSION['nom'] . ' ' . $_SESSION['prenom'] ?></a>
            </li>
            <li class="nav-item">
                <a href="?controller=session&action=session_deconnexion">
                    <img src="./Content/img/deconnexion1.png" class="img-fluid" alt="vetotoil deconnexion">
                </a>
            </li>
        </ul>
    <?php } else { ?>
        <ul class='navbar-nav mb-2 mb-lg-0'>
            <li class="nav-item">
                <a href="?controller=acces&action=acces_connexion">
                    <img src="./Content/img/connexion1.png" class="img-fluid" alt="vetotoil deconnexion">
                </a>
            </li>
        </ul>
    <?php } ?>
</div>