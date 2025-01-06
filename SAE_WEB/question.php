<?php
require_once 'BddConnect.php';
session_start();
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AMI - Questionnaire</title>
    <link rel="icon" type="image/png" href="./img/LogoAMI.png">
    <link rel="stylesheet" href="./data/css/commun.css">
    <script src="./data/js/global.js" type="module"></script>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Uniquement pour la page questionnaire -->
    <link rel="stylesheet" href="./data/css/question.css">
</head>

<?php
$bdd = new BddConnect();
$pdo = $bdd->connexion();

$idUser = $_SESSION['user']['Id']; // ID de l'utilisateur

// Vérifie si l'utilisateur a déjà complété le questionnaire
$userStmt = $pdo->prepare("SELECT AComplete FROM Users WHERE Id = :idUser");
$userStmt->execute(['idUser' => $idUser]);
$user = $userStmt->fetch(PDO::FETCH_ASSOC);

// Si l'utilisateur a déjà complété le questionnaire
if ($user && $user['AComplete']) {
    include('header.php'); // Inclure le header

    // Message de remerciement
    echo "
    <div class='container mt-5'>
        <div class='text-center'>
            <h1 class='text-success mb-4'>Merci d'avoir complété le questionnaire !</h1>
            <p class='lead'>Nous vous remercions sincèrement pour votre participation. Votre contribution est précieuse pour nous.</p>
            <p>Nous avons bien enregistré vos réponses.</p>
            <a href='index.php' class='btn btn-primary mt-4'>Retour à l'accueil</a>
        </div>
    </div>";
    include('footer.php');
    exit;
}

// Si le formulaire n'a pas été complété, on charge le formulaire
// Récupérer les questions et options
$questionsStmt = $pdo->query("SELECT * FROM Questions");
$questions = $questionsStmt->fetchAll(PDO::FETCH_ASSOC);

include('header.php');
?>

<body>

<div class="container form-container mt-5">
    <h1 class="text-center mb-4">Merci de remplir ce questionnaire</h1>
    <form action="traitement_question.php" method="post" class="form">

        <?php foreach ($questions as $question): ?>
            <fieldset class="form-question mb-3">
                <legend><?php echo $question['Question']; ?></legend>

                <?php
                // Récupére les options de reponse pour chaque question
                $optionsStmt = $pdo->prepare("SELECT * FROM OptionsReponses WHERE IdQuestion = :idQuestion");
                $optionsStmt->execute(['idQuestion' => $question['IdQuestion']]);
                $options = $optionsStmt->fetchAll(PDO::FETCH_ASSOC);

                // Créer la liste déroulante pour chaque question
                ?>
                <select name="qst<?php echo $question['IdQuestion']; ?>" class="form-select" required>
                    <option value="" disabled selected>Sélectionner une option</option>
                    <?php foreach ($options as $option): ?>
                        <option value="<?php echo $option['Option']; ?>"><?php echo $option['Option']; ?></option>
                    <?php endforeach; ?>
                </select>
            </fieldset>
        <?php endforeach; ?>

        <div class="form-btn-container text-center mt-4">
            <button type="submit" class="form-btn">Soumettre</button>
        </div>
    </form>
</div>

<?php require_once 'footer.php'; ?>
</body>
</html>
