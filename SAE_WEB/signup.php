<?php
if (!session_id()) {
    session_start();
}

require_once 'User.php';
require_once 'BddConnect.php';
require_once 'SQLiteUserRepository.php';
require_once 'Authentification.php';

$bdd = new BddConnect();
$pdo = $bdd->connexion();
$userRepo = new SQLiteUserRepository($pdo);
$auth = new Authentification($userRepo);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['signup-email'] ?? null;
    $password = $_POST['signup-pwd'] ?? null;
    $civilite = $_POST['signup-civil'] ?? null;
    $nom = $_POST['signup-last'] ?? null;
    $prenom = $_POST['signup-prenom'] ?? null;

    try {
        // Inscription
        $user = new User($email, $password, $civilite, $nom, $prenom);
        $retour = $userRepo->saveUser($user);

        if ($retour) {
            $message = "Inscription réussie ! Vous pouvez vous connecter.";
            $code = "success";
        } else {
            throw new Exception("Impossible d'enregistrer l'utilisateur.");
        }
    } catch (Exception $e) {
        $message = "Erreur lors de l'inscription : " . $e->getMessage();
        $code = "warning";
    }

    $_SESSION['flash'][$code] = $message;

    // Redirection vers la page principale ou autre
    header("Location: index.php");
    exit;
}