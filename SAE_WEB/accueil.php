<?php
if(!session_id())
    session_start();
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AMI - Accueil</title>
    <link rel="icon" type="image/png" href="./img/LogoAMI.png">
    <link rel="stylesheet" href="./data/css/accueil.css">
    <link rel="stylesheet" href="./data/css/commun.css">
    <script src="./data/js/global.js" type="module"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

<?php
require_once 'header.php';
?>


    <!-- Hero -->
    <section class="hero">
        <div class="hero-overlay">
            <h1>AMI</h1>
            <p>Association nationale de défense des Malades, Invalides et handicapés</p>
        </div>
    </section>
    

    <!-- Text-->
    <section class="Text">
        <h2>Qu’est ce que l’A.M.I. ?</h2>
        <div class="Text-conteneur">
            <div class="Text-cadre">
                <h3>Histoire</h3>
                <p>L’Association nationale de défense des Malades, Invalides et handicapés est une association loi 1901
                    présente sur le territoire français au travers de comités locaux et départementaux. <br> <br>
                    Née en 1936 dans les sanatoriums au cœur des combats des travailleurs atteints de tuberculose au
                    sein de la FNTC puis de la FNLA, l’A.M.i. regroupe depuis 1964 des personnes handicapées ou malades,
                    des parents d’enfants handicapés et des personnes valides qui ont choisi de lutter contre la
                    discrimination faites aux handicapés </p>
            </div>
            <div class="Text-cadre">
                <h3>Missions</h3>
                <p> Accompagner les personnes en situation de handicap vers une réinsertion sociale et
                    professionnelle.<br> <br>
                    Proposer des activités adaptées pour favoriser l’autonomie et améliorer la qualité de vie des
                    personnes concernées.<br> <br>
                    Sensibiliser le public et les entreprises à la question du handicap, afin de promouvoir une
                    meilleure compréhension et intégration.<br> <br>
                    Faciliter l’accès à l’emploi pour les personnes handicapées, en offrant des parcours d’insertion
                    professionnelle, des formations et des ateliers.<br> <br>
                    Fournir un soutien psychologique et social aux personnes touchées par le handicap.</p>
            </div>
            <div class="Text-cadre">
                <h3>Objectifs</h3>
                <p>L’Allocation aux Adultes Handicapés au niveau du SMIC <br> <br>
                    La revalorisation des salaires et des pensions <br> <br>
                    La reconnaissance du statut de salarié.e pour les personnes handicapées qui travaillent en ESAT <br>
                    <br>
                    La fin des discriminations envers les personnes handicapées et particulièrement les femmes en
                    situation de handicap <br> <br>
                    Une vraie politique d’insertion scolaire et professionnelle avec des moyens humains et financiers
                    conséquents <br> <br>
                    Un vrai statut pour les AESH- Accompagnantes d’Elèves en Situation de Handicap – dans le cadre des
                    métiers et du statut de l’Education Nationale.
                </p>
            </div>
        </div>
    </section>

    <!-- Actions Section -->
    <section class="actions">
        <h2>Actions réalisées</h2>
        <div class="container">
            <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
                        aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                        aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                        aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="img/Carousel/Carousel1.jpg" class="d-block w-100 carousel-image"
                            alt="Manifestation 1">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Manifestation lors du printemps de l'handicap.</h5>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="img/Carousel/Carousel2.jpg" class="d-block w-100 carousel-image"
                            alt="Manifestation 2">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Manifestation lors du printemps de l'handicap.</h5>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="img/Carousel/Carousel3.jpg" class="d-block w-100 carousel-image"
                            alt="Conference sur le handicap">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Conférence sur l'inclusion des personnes handicapées.</h5>
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </section>



<?php
require_once 'footer.php';
?>






    <!-- Inclure Bootstrap JavaScript via CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>