<?php
if (!session_id())
    session_start();
?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>A.M.I - Questionnaire</title>
        <link rel="stylesheet" href="./data/css/question.css">
        <link rel="stylesheet" href="./data/css/commun.css">
        <link rel="icon" type="image/png" href="./img/LogoAMI.png">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <script src="./data/js/actualite.js"></script>
        <script src="./data/js/global.js" type="module"> </script>
    </head>
    <body>

    <?php
    require_once 'header.php'
    ?>

    <section class="hero">
        <img src="img/Business%20Meeting%20Illustration.jpg"
    </section>

    <form action="" method="POST">

        <div class="form">

            <label for="qstOne" class="form-question fw-bold fs-3">
                Quelle région ?
            </label>
            <div class="dropdown-question">
                <select name="qstOne" id="qstOne" class="form-input-select fs-5">
                    <option value="Selectionnez" disabled selected> Selectionnez votre région</option>
                    <option value="idf">Île-de-France</option>
                    <option value="ara">Auvergne-Rhône-Alpes</option>
                    <option value="bfc">Bourgogne-Franche-Comté</option>
                    <option value="bretagne">Bretagne</option>
                    <option value="nvl">Normandie</option>
                    <option value="naqu">Nouvelle-Aquitaine</option>
                    <option value="paca">Provence-Alpes-Côte d'Azur</option>
                </select>

            </div>

            <label for="qstTwo" class="form-question fw-bold fs-3">
                Quel âge ?
            </label>
            <div class="dropdown-question">
                <select name="qstTwo" id="qstTwo" class="form-input-select fs-5">
                    <option value="Selectionnez" disabled selected> Selectionnez votre âge</option>
                    <option value="18-24">18-24 ans</option>
                    <option value="25-34">25-34 ans</option>
                    <option value="35-44">35-44 ans</option>
                    <option value="45-54">45-54 ans</option>
                    <option value="55-64">55-64 ans</option>
                    <option value="65+">65 ans et plus</option>
                </select>
            </div>

            <label for="qstThree" class="form-question fw-bold fs-3">
                Votre logement actuel répond-il aux normes d’accessibilité ?
            </label>

            <div class="radio-button">
                <label class="radio-label fs-5">
                    <input class="form-input-radio" type="radio" name="qstThree" id="qstThree">
                    <span class="custom-radio"></span>
                    Oui
                </label>
                <label class="radio-label fs-5">
                    <input class="form-input-radio" type="radio" name="qstThree" id="qstThree">
                    <span class="custom-radio"></span>
                    Non
                </label>
                <label class="radio-label fs-5">
                    <input class="form-input-radio" type="radio" name="qstThree" id="qstThree">
                    <span class="custom-radio"></span>
                    Partiellement
                </label>
            </div>

            <label for="qstFour" class="form-question fw-bold fs-3">
                Trouvez-vous que votre lieu de vie est adapté à vos besoins spécifiques liés à votre handicap ?
            </label>

            <div class="radio-button">
                <label class="radio-label fs-5">
                    <input class="form-input-radio" type="radio" name="qstFour" id="qstFour">
                    <span class="custom-radio"></span>
                    Oui
                </label>
                <label class="radio-label fs-5">
                    <input class="form-input-radio" type="radio" name="qstFour" id="qstFour">
                    <span class="custom-radio"></span>
                    Non
                </label>
                <label class="radio-label fs-5">
                    <input class="form-input-radio" type="radio" name="qstFour" id="qstFour">
                    <span class="custom-radio"></span>
                    Partiellement
                </label>
            </div>

            <label for="qstFive" class="form-question fw-bold fs-3">
                Ce lieu de vie correspond-il a votre choix ?
            </label>

            <div class="radio-button">
                <label class="radio-label fs-5">
                    <input class="form-input-radio" type="radio" name="qstFive" id="qstFive">
                    <span class="custom-radio"></span>
                    Oui
                </label>
                <label class="radio-label fs-5">
                    <input class="form-input-radio" type="radio" name="qstFive" id="qstFive">
                    <span class="custom-radio"></span>
                    Non
                </label>
                <label class="radio-label fs-5">
                    <input class="form-input-radio" type="radio" name="qstFive" id="qstFive">
                    <span class="custom-radio"></span>
                    Partiellement
                </label>
            </div>

            <label for="qstSix" class="form-question fw-bold fs-3">
                Avez-vous un accès facile aux soins médicaux dont vous avez besoin (généraliste, spécialiste, kinésithérapie, etc.) ?
            </label>

            <div class="radio-button">
                <label class="radio-label fs-5">
                    <input class="form-input-radio" type="radio" name="qstSix" id="qstSix">
                    <span class="custom-radio"></span>
                    Oui
                </label>
                <label class="radio-label fs-5">
                    <input class="form-input-radio" type="radio" name="qstSix" id="qstSix">
                    <span class="custom-radio"></span>
                    Non
                </label>
                <label class="radio-label fs-5">
                    <input class="form-input-radio" type="radio" name="qstSix" id="qstSix">
                    <span class="custom-radio"></span>
                    Partiellemnt
                </label>
            </div>

            <label for="qstSeven" class="form-question fw-bold fs-3">
                Sentez-vous isolé ou exclus socialement ?
            </label>

            <div class="radio-button">
                <label class="radio-label fs-5">
                    <input class="form-input-radio" type="radio" name="qstSeven" id="qstSeven">
                    <span class="custom-radio"></span>
                    Oui
                </label>
                <label class="radio-label fs-5">
                    <input class="form-input-radio" type="radio" name="qstSeven" id="qstSeven">
                    <span class="custom-radio"></span>
                    Non
                </label>
                <label class="radio-label fs-5">
                    <input class="form-input-radio" type="radio" name="qstSeven" id="qstSeven">
                    <span class="custom-radio"></span>
                    Partiellement
                </label>
            </div>
        </div>
        <div class="form-btn-container">
            <button class="form-btn fs-4">Send Feedback</button>
        </div>
    </form>

    <?php
    require_once 'footer.php';
    ?>
    </body>
</html>
