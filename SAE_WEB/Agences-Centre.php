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
    <title>AMI - Centre - Val de Loire</title>
    <link rel="icon" type="image/png" href="img/LogoAMI.png">
    <link rel="stylesheet" href="data/css/Agences.css">
    <link rel="stylesheet" href="data/css/commun.css">
    <script src="data/js/global.js" type="module"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
<?php
require_once 'header.php';;
?>

<section class="hero">
    <img src="img/Ami.png">
</section>

    <section class="preambule">
        <h1> L’association A.M.I. dispose de plusieurs comités régionaux à travers toute la France. <br> Il y a plus de
            10 comités dans 6 régions à travers toute la France et la Guyane. </h1>
        <h2> Choisissez le comité le plus proche de chez vous </h2>
    </section>

    <section class="Comite">
        <h2> Comité A.M.I d'Orleans </h2>
        <p> LA MAISON DES ASSOCIATIONS <br>
            46, rue Ste Catherine <br>
            Permanences :<br>
            le 2ème et 4ème vendredi de chaque mois de 14h à 16h
            45000 Orléans<br>
            Sur rendez-vous, en cas d'urgence laissez nous un message. 
            Tél : 02 38 66 78 43<br>
            Courriel : contact@cvl.ami-nationale.com<br></p>

        <p>La maison des associations, située au cœur de la ville, est un lieu de rencontre de culture, de dialogue et de réflexions et nous serons ravi de vous rencontrez afin d'échanger avec vous.<br>
        </p>


    </section>





<?php
require_once 'footer.php';
?>

</body>

</html>