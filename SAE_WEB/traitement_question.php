<?php
// Démarrer la session
if (!session_id()) {
    session_start();
}

require_once 'BddConnect.php'; // Inclusion de la connexion à la base de données

// Connexion à la base de données
$bdd = new BddConnect();
$pdo = $bdd->connexion();

// Vérifier si l'utilisateur est connecté et que son ID est dans la session
if (isset($_SESSION['user']) && isset($_SESSION['user']['Id'])) {
    $idUser = $_SESSION['user']['Id'];
} else {
    echo "Utilisateur non trouvé ou session non correctement initialisée.";
    exit;
}

// Vérifier si l'utilisateur a déjà complété le questionnaire
if (isset($_SESSION['user']['AComplete']) && $_SESSION['user']['AComplete'] == true) {
    echo "<h2>Merci d'avoir complété le questionnaire !</h2>";
    exit;
}

// Débogage : Afficher les données soumises dans POST
echo "<h3>Données soumises (POST) :</h3>";
echo "<pre>";
print_r($_POST);
echo "</pre>";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Tableau pour stocker les réponses et les ID des options
    $reponses = [];
    $idOptions = [];

    // Vérifier les réponses et récupérer les IDs des options pour chaque question
    for ($i = 1; $i <= 7; $i++) {
        // Adapter en fonction des noms des questions dans votre formulaire (qstOne, qstTwo...)
        if (isset($_POST['qst' . ucfirst(strval($i))])) {
            $reponses['qst' . $i] = $_POST['qst' . ucfirst(strval($i))]; // Utilise qst1, qst2, etc. depuis le formulaire
        } else {
            $reponses['qst' . $i] = null;
        }
    }

    // Traiter les réponses pour chaque question
    foreach ($reponses as $key => $reponse) {
        if ($reponse !== null) {
            // Extraire le numéro de la question (par exemple, 1, 2, 3,...)
            $questionIndex = substr($key, 3);

            // Récupérer l'ID de l'option choisie dans la table 'OptionsReponses'
            $stmt = $pdo->prepare('SELECT IdOption FROM OptionsReponses WHERE IdQuestion = :idQuestion AND Option = :option');
            $stmt->execute([":idQuestion" => $questionIndex, ":option" => $reponse]);
            $idOption = $stmt->fetch(PDO::FETCH_ASSOC);

            // Si l'ID de l'option existe dans la base de données, insérer la réponse
            if ($idOption) {
                // Insérer la réponse dans la table 'Reponse'
                $stmtInsert = $pdo->prepare('INSERT INTO Reponse (Id, IdQuestion, Reponse, IdOption) VALUES (:IdUser, :IdQuestion, :Reponse, :IdOption)');
                $stmtInsert->execute([
                    ':IdUser' => $idUser,
                    ':IdQuestion' => $questionIndex,
                    ':Reponse' => $reponse,
                    ':IdOption' => $idOption['IdOption']
                ]);
            }
        }
    }

    // Mettre à jour le statut du questionnaire comme complété pour cet utilisateur
    try {
        $updateStmt = $pdo->prepare('UPDATE Users SET AComplete = true WHERE Id = :id');
        $updateStmt->execute([':id' => $idUser]);
    } catch (PDOException $e) {
        echo "Erreur lors de la mise à jour de l'utilisateur : " . $e->getMessage();
        exit;
    }

    // Message flash pour indiquer la soumission réussie
    $_SESSION['flash']['success'] = "Merci d'avoir complété le questionnaire !";
    header('Location: question.php'); // Redirection pour éviter une resoumission
    exit;
}
?>
