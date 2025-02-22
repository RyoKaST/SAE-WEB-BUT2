<?php

use database\BddConnect;

session_start();
require_once '../database/BddConnect.php';
$bdd = new BddConnect();
$pdo = $bdd->connexion();

// Vérifier si l'utilisateur est connecté et que l'ID est présent dans la session
if (!isset($_SESSION['user']) || !isset($_SESSION['user']['Id'])) {
    header('Location: /src/formulaire.php');
    exit;
}

$idUser = $_SESSION['user']['Id'];


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Récupérer les réponses du formulaire
    $reponses = [];
    // Traitement des réponses pour chaque question
    for ($i = 1; $i <= 9; $i++) {  // Par exemple pour 7 questions
        if (isset($_POST['qst' . $i])) {
            $reponses[$i] = $_POST['qst' . $i];
        } else {
            // Si pas de réponse sélectionnée, mettre à NULL
            $reponses[$i] = NULL;
        }
    }

    // Préparer l'insertion des réponses dans la base de données
    $stmtInsert = $pdo->prepare('INSERT INTO Reponse (Id, IdQuestion, IdOption) VALUES (:IdUser, :IdQuestion, :IdOption)');

    // Insérer les réponses dans la base de données pour chaque question
    foreach ($reponses as $questionIndex => $reponse) {
        if ($reponse !== NULL) {
            // Vérifier l'ID de l'option correspondante pour chaque réponse
            $stmtOption = $pdo->prepare('SELECT IdOption FROM OptionsReponses WHERE IdQuestion = :IdQuestion AND Option = :Option');
            $stmtOption->execute([
                ':IdQuestion' => $questionIndex,
                ':Option' => $reponse
            ]);
            $option = $stmtOption->fetch(PDO::FETCH_ASSOC);

            if ($option) {
                // Insertion de la réponse dans la table "Reponse"
                $stmtInsert->execute([
                    ':IdUser' => $idUser,
                    ':IdQuestion' => $questionIndex,
                    ':IdOption' => $option['IdOption']
                ]);
            }
        }
    }

    // Mettre à jour le statut du questionnaire dans la table Users
    $stmtUpdate = $pdo->prepare('UPDATE Users SET AComplete = 1 WHERE Id = :IdUser');
    $stmtUpdate->execute([':IdUser' => $idUser]);

    // Rediriger avec un message de confirmation
    //$_SESSION['flash']['success'] = "Merci d'avoir complété le questionnaire.";
    header('Location: /src/auth/question.php');
    exit;
}

