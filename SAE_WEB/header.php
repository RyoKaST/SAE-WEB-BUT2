<!doctype html>
<html lang="fr">

<header class="header sticky-top">
    <a href="accueil.php">
        <img src="img/LogoAMI.png" alt="Logo AMI" class="logo">
    </a>
    <nav>

        <div class="burgerButton" id="check">
            <div class="burgerLines" id="burgerLines">
                <span class="line-1"></span>
                <span class="line-2"></span>
                <span class="line-3"></span>
            </div>
        </div>

        <ul id="navList">
            <?php
            if (isset($_SESSION['user'])) {
                $idcateg = intval($_SESSION['user']['Idcateg']); // S'assurer que c'est un entier
                $prenom = htmlspecialchars($_SESSION['user']['prenom']);
                $nom = htmlspecialchars($_SESSION['user']['nom']);


                if ($idcateg === 2) {
                    echo '<li><a href="question.php">Questionnaire</a></li>';
                } elseif ($idcateg === 3) {
                    echo '<li><a href="enquete.php">Enquête</a></li>';
                }
            }
            ?>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" id="dropdownMenu" data-bs-toggle="dropdown"
                   aria-expanded="false">Nos agences</a>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenu">
                    <li><a class="dropdown-item" href="Agences-Rhone.php">Auvergne-Rhône-Alpes</a></li>
                    <li><a class="dropdown-item" href="Agences-Bourgogne.php">Bourgogne Franche-Comté</a></li>
                    <li><a class="dropdown-item" href="Agences-Centre.php">Centre</a></li>
                    <li><a class="dropdown-item" href="Agences-Guyane.php">Guyane</a></li>
                    <li><a class="dropdown-item" href="Agences-Aquitaine.php">Nouvelle Aquitaine</a></li>
                    <li><a class="dropdown-item" href="Agences-IDF.php">Île-de-France</a></li>
                </ul>
            </li>
            <li><a href="actualite.php">Actualités</a></li>
            <li><a href="adhesion.php">Adhérer</a></li>
            <li><a href="formulaire.php">
                    <img src="img/formulaire_icon.png" alt="icon de connexion" class="icon">
                </a></li>
        </ul>
    </nav>
</header>

</html>
