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
        // Vérifier si l'utilisateur existe déjà
        if ($userRepo->userExists($email)) {
            throw new Exception("L'email est déjà utilisé. Veuillez en choisir un autre.");
        }

        // Inscription
        $user = new User($email, $password, $civilite, $nom, $prenom);
        $retour = $userRepo->saveUser($user);

        if ($retour) {
            $_SESSION['flash']['success'] = "Inscription réussie ! Vous pouvez vous connecter.";
            header("Location: index.php");
            exit;
        } else {
            throw new Exception("Impossible d'enregistrer l'utilisateur.");
        }
    } catch (Exception $e) {
        // Afficher un message d'erreur sur la page d'inscription
        $_SESSION['flash']['warning'] = $e->getMessage();
        header("Location: formulaire.php");
        exit;
    }
}

