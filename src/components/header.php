<!doctype html>
<html lang="fr">

<header class="header sticky-top">
    <a href="../pages/accueil.php">
        <img src=../../public/assets/img/LogoAMI.png alt="Logo AMI" class="logo">
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
                    echo '<li><a href="../auth/question.php">Questionnaire</a></li>';
                } elseif ($idcateg === 3) {
                    echo '<li><a href="../auth/enquete.php">Enquête</a></li>';
                }
            }
            ?>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" id="dropdownMenu" data-bs-toggle="dropdown"
                   aria-expanded="false">Nos agences</a>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenu">
                    <li><a class="dropdown-item" href="../pages/Agences-Rhone.php">Auvergne-Rhône-Alpes</a></li>
                    <li><a class="dropdown-item" href="../pages/Agences-Bourgogne.php">Bourgogne Franche-Comté</a></li>
                    <li><a class="dropdown-item" href="../pages/Agences-Centre.php">Centre</a></li>
                    <li><a class="dropdown-item" href="../pages/Agences-Guyane.php">Guyane</a></li>
                    <li><a class="dropdown-item" href="../pages/Agences-Aquitaine.php">Nouvelle Aquitaine</a></li>
                    <li><a class="dropdown-item" href="../pages/Agences-IDF.php">Île-de-France</a></li>
                </ul>
            </li>
            <li><a href="../pages/actualite.php">Actualités</a></li>
            <li><a href="../pages/adhesion.php">Adhérer</a></li>
            <li><a href="../pages/formulaire.php">
                    <img src="../../public/assets/img/formulaire_icon.png" alt="icon de connexion" class="icon">
                </a></li>
        </ul>
    </nav>
</header>

</html>
