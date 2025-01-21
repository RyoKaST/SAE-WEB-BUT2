<?php
if (!session_id()) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AMI - Bourgogne Franche-Comté</title>
    <link rel="icon" type="image/png" href="../../public/assets/img/LogoAMI.png">
    <link rel="stylesheet" href="../../public/assets/css/Agences.css">
    <link rel="stylesheet" href="../../public/assets/css/commun.css">
    <script src="../../public/assets/js/global.js" type="module"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<?php
require_once '../components/header.php';
?>

<section class="hero">
    <img src="../../public/assets/img/Ami.png">
</section>
    <section class="preambule">
        <h1> L’association A.M.I. dispose de plusieurs comités régionaux à travers toute la France. <br> Il y a plus de
            10 comités dans 6 régions à travers toute la France et la Guyane. </h1>
        <h2> Choisissez le comité le plus proche de chez vous </h2>
    </section>

    <section class="Comite">
        <h2> Comité A.M.I de Macon </h2>
        <p> Centre Social Eugénie COTTON <br>
            172, rue de la Chanaye <br>
            71000 MACON<br>
            Sur rendez-vous, en cas d'urgence laissez nous un message.
            Tél :  03 85 34 34 59<br>
            Courriel :amicd71@gmail.com<br></p>

        <h2> Nous avons besoin de vous ! </h2>
        <p>L'A.M.i. défend les personnes handicapées, invalides, les malades et leurs familles. Nous ne gérons aucune structure medico sociale car nous voulons garder notre liberté revendicative. <br>

            Malheureusement nos adhérent-es sont souvent âgé-e-s et pour beaucoup en situation de handicap. L'activité de l'association repose donc sur quelques un-e-s. <br>
            
            Nous avons donc besoin de sang neuf pour réaliser nos projets. L'action phare de l'A.M.i 71 est le Printemps du Handicap. Bienvenue à qui veut nous rejoindre. <br>
            
            "Nous avons besoin de bénévoles pour nos collectes de bouchons de liège et de radiographies qui nous permettent d'obtenir des financements".<br>
        </p>
    </section>
<?php
require_once '../components/footer.php';
?>
</body>
</html>