<?php
// Inclure la connexion à la base de données et démarrer la session
require_once 'BddConnect.php'; // Assure-toi que cette classe est bien incluse pour la connexion
session_start();

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['user'])) {
    header("Location: login.php"); // Rediriger si non connecté
    exit;
}

$bdd = new BddConnect();
$pdo = $bdd->connexion();

$idUser = $_SESSION['user']['Id']; // ID de l'utilisateur

// Vérifier si l'utilisateur a déjà complété le questionnaire
$userStmt = $pdo->prepare("SELECT AComplete FROM Users WHERE Id = :idUser");
$userStmt->execute(['idUser' => $idUser]);
$user = $userStmt->fetch(PDO::FETCH_ASSOC);

// Si l'utilisateur a déjà complété le questionnaire
if ($user && $user['AComplete']) {
    echo "<h1>Merci d'avoir complété le questionnaire !</h1>";
    exit; // Arrêter le script ici, aucun formulaire à afficher
}

// Récupérer les questions et options
$questionsStmt = $pdo->query("SELECT * FROM Questions");
$questions = $questionsStmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire Questionnaire</title>
</head>
<body>

<h1>Questionnaire</h1>

<form action="traitement_question.php" method="post">

    <?php foreach ($questions as $question): ?>
        <fieldset>
            <legend><?php echo $question['Question']; ?></legend>

            <?php
            // Récupérer les options pour chaque question
            $optionsStmt = $pdo->prepare("SELECT * FROM OptionsReponses WHERE IdQuestion = :idQuestion");
            $optionsStmt->execute(['idQuestion' => $question['IdQuestion']]);
            $options = $optionsStmt->fetchAll(PDO::FETCH_ASSOC);

            // Créer les boutons radio pour chaque option
            foreach ($options as $option):
                ?>
                <label>
                    <input type="radio" name="qst<?php echo $question['IdQuestion']; ?>" value="<?php echo $option['Option']; ?>" required>
                    <?php echo $option['Option']; ?>
                </label><br>
            <?php endforeach; ?>
        </fieldset>
    <?php endforeach; ?>

    <button type="submit">Soumettre</button>
</form>

</body>
</html>
