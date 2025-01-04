<!doctype html>
<html lang="fr">

<header class="header">
    <a href="accueil.php">
        <img src="img/LogoAMI.png" alt="Logo AMI" class="logo">
    </a>
    <nav>
        <ul>
            <?php
            if (isset($_SESSION['user'])) {
                $idcateg = intval($_SESSION['user']['Idcateg']); // S'assurer que c'est un entier
                $prenom = htmlspecialchars($_SESSION['user']['prenom']);
                $nom = htmlspecialchars($_SESSION['user']['nom']);


                if ($idcateg === 2) {
                    echo '<li><a href="questionnaire.php">Questionnaire</a></li>';
                } elseif ($idcateg === 3) {
                    echo '<li><a href="enquete.php">Enquête</a></li>';
                }
            }
            ?>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" id="dropdownMenu" data-bs-toggle="dropdown"
                   aria-expanded="false">Nos agences</a>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenu">
                    <li><a class="dropdown-item" href="Agences/Agences-Rhone.html">Auvergne-Rhône-Alpes</a></li>
                    <li><a class="dropdown-item" href="Agences/Agences-Bourgogne.html">Bourgogne Franche-Comté</a></li>
                    <li><a class="dropdown-item" href="Agences/Agences-Centre.html">Centre</a></li>
                    <li><a class="dropdown-item" href="Agences/Agences-Guyane.html">Guyane</a></li>
                    <li><a class="dropdown-item" href="Agences/Agences-Aquitaine.html">Nouvelle Aquitaine</a></li>
                    <li><a class="dropdown-item" href="Agences/Agences-IDF.html">Île-de-France</a></li>
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
