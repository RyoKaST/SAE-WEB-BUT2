<?php
if(!session_id())
    session_start();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Adhesion</title>
    <link rel="stylesheet" href="./data/css/adhesionstyle.css">
    <link rel="stylesheet" href="./data/css/commun.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <link rel="icon" type="image/png" href="./img/LogoAMI.png">
    <script src="./data/js/global.js" type="module"></script>

</head>
<body>
<?php
require_once 'header.php';
?>

<div class="container">
    <h1 class="titleTop"> L’A.M.I à besoin de vous !</h1>
    <div class="row">
        <div class="col-sm-12 col-lg-12 col-xl-8 ">
            <img src="./img/handicap.jpg" class="imgStats" alt="Personne souriant à la vie en fauteil roulant">
        </div>
        <div class="col-sm-12 col-lg-12 col-xl-4">
            <div class="boxStats">
                <strong>6,3 mio</strong><br>
                de personnes souffrant d'un handicap (physique, sensoriel ou cognitif)
            </div>
            <div class="boxStats">
                <strong>4,2 %</strong><br>
                des enfants de 5 à 14 ans reçoivent une aide
            </div>
            <div class="boxStats">
                <strong>28,9 %</strong><br>
                des personnes handicapées vivent dans un ménage pauvre
            </div>

        </div>
    </div>

    <p class="paragraphe1">
        Dans les départements où elle est implantée, des membres siègent au sein des différentes instances,
        comme les Commissions Départementales pour l’Autonomie des Personnes Handicapées (CDAPH),
        les commissions d’accessibilité etc. <br>
        Au niveau national, elle siège également au Conseil National Consultatif des Personnes Handicapées(CNCPH)<br>
        Dans ces instances, elle intervient dans le but de faire évoluer la législation pour améliorer la
        vie quotidienne des personnes en situation de handicap.<br>
        De nombreuses dispositions de la loi du 11 février 2005 ne répondent toujours pas aux besoins, aux
        attentes et aux aspirations des citoyens concernés.<br>
        Depuis plus de 80 ans, nous avons établi des liens avec les organisations syndicales, de la CGT notamment,
        avec les militants sensibilisés par les questions de handicap et lancé chaque année un appel à soutien financier.<br>
        Pour chaque adhésion, le journal Revivre est inclus !
    </p>

    <h1 class="titleDonation">
        Adherer à l'association
    </h1>

    <div id="breadcrumb"></div>

    <form class="" action="" method="post">
    <div class="row">
        <div class="col-sm-12 col-md-4 space">
            <h1 class="titleForm">MONTANT</h1>
            <div class="formBody">

                <div class="radio-group">
                    <input type="radio" id="montant1" name="montant"/>
                    <label for="montant1">
                        <span class="amount-box">20€</span>
                        Ressources < SMIC
                    </label>
                </div>

                <div class="radio-group">
                    <input type="radio" id="montant2" name="montant"/>
                    <label for="montant2">
                        <span class="amount-box">40€</span>
                        Ressources > SMIC
                    </label>
                </div>

                <div class="radio-group">
                    <input type="radio" id="montant3" name="montant"/>
                    <label for="montant3">
                                <span class="custom-amount">
                                    <input type="number" placeholder="--€">
                                </span>
                        Montant Libre
                    </label>
                </div>
            </div>
        </div>

        <div class="col-sm-12 col-md-4 space">
            <h1 class="titleForm">COORDONNÉES</h1>
            <div class="formBody form">
                <label for="formEmail">EMAIL</label>
                <input type="email" id="formEmail" placeholder="nom@exemple.com" required>
                <input type="checkbox" id="checkboxAssociation">
                <label for="checkboxAssociation"> Don au nom d'une organisation</label>

                <div class="row">
                    <div class="col-12 col-md-6" id="divNom">
                        <label for="formNom">NOM</label>
                        <input type="text" id="formNom" placeholder="Dupont" required>
                    </div>
                    <div class="col-12 col-md-6"id="divPrenom">
                        <label for="formPrenom">PRENOM</label>
                        <input type="text" id="formPrenom" placeholder="Jean" required>
                    </div>
                </div>

                <div id="divOrga">
                    <label for="formOrganisation">NOM ORGANISATION</label>
                    <input type="text" id="formOrganisation" placeholder="GOOGLE" required>
                </div>

                <label for="formAdresse">ADRESSE</label>
                <input type="text" id="formAdresse" placeholder="Versaille" required>

                <div class="row">
                    <div class="col-12 col-md-6">
                        <label for="formCodePostal">CODE POSTAL</label>
                        <input type="number" id="formCodePostal" placeholder="75000" required>
                    </div>
                    <div class="col-12 col-md-6">
                        <label for="formVille">VILLE</label>
                        <input type="text" id="formVille" placeholder="Paris" required>
                    </div>
                </div>

                <label for="formPays">PAYS</label>
                <input type="text" id="formPays" placeholder="France" required>
            </div>
        </div>


        <div class="col-sm-12 col-md-4 space">
            <h1 class="titleForm">PAYEMENT</h1>
            <div class="formBody form" id="payement-container">
                <div class ="payment-option">
                    <div onclick="showCardForm()">
                        <img src="https://img.icons8.com/ios-filled/100/000000/bank-card-back-side.png" alt="Carte Bancaire">
                        <p>CARTE BANCAIRE</p>
                    </div>
                    <div>
                        <img src="https://img.icons8.com/ios-filled/100/000000/paypal.png" alt="PayPal">
                        <p>PAYPAL</p>
                    </div>
                </div>

                <div class="card-form" id="card-form">
                    <label for="card-number">Numéro de Carte</label>
                    <input type="text" id="card-number" placeholder="1234 5678 9012 3456">

                    <label for="card-holder">Nom du Titulaire</label>
                    <input type="text" id="card-holder" placeholder="Nom du Titulaire">

                    <label for="expiry-date">Date d'Expiration</label>
                    <input type="text" id="expiry-date" placeholder="MM/AA"> <br>

                    <label for="cvv">CVV</label>
                    <input type="text" id="cvv" placeholder="123">

                    <button class="back-button" onclick="hideCardForm()">Retour</button>
                </div>
            </div>
        </div>
    </div>
    </form>
</div>

<!-- Footer -->
<?php
require_once 'footer.php';
?>

<script src="./data/js/adhesion.js" type="module"></script>

</html>