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
    <title>AMI - Nouvelle Aquitaine</title>
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
    <h2> Comité A.M.I de Pessac </h2>
    <p> Maison des Associations Bureau n° 3 <br>
        Salle municipale de Saige Bureau n° 3 <br>
        33600 PESSAC<br>
        Permanences :<br>
        Mercredis 10h à 11h30.
        Sur rendez-vous, en cas d'urgence laissez nous un message.
        Tél : 06 72 91 69 97<br>
        Courriel :contact@33.ami-nationale.com</p>

    <h2> Comité A.M.I de Bruges </h2>
    <p> Maison Municipale de Bruges <br>
        63, Rue André Messager <br>
        33520 Bruges<br>
        Permanences :<br>
        Tous les mercredis à partir de 15h.
        Sur rendez-vous, en cas d'urgence laissez nous un message.
        Tél : 04 78 54 78 18<br>
        Courriel :contact@33.ami-nationale.com </p>
    </p>
</section>
<?php
require_once '../components/footer.php';
?>

</body>

</html>