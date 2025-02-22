<?php


use classes\SQLiteUserRepository;
use classes\User;
use database\BddConnect;

if (!session_id()) {
    session_start();
}

require_once '../classes/User.php';
require_once '../database/BddConnect.php';
require_once '../classes/SQLiteUserRepository.php';

$bdd = new BddConnect();
$pdo = $bdd->connexion();
$userRepo = new SQLiteUserRepository($pdo);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['signup-email'] ?? null;
    $password = $_POST['signup-pwd'] ?? null;
    $civilite = $_POST['signup-civil'] ?? null;
    $nom = $_POST['signup-last'] ?? null;
    $prenom = $_POST['signup-prenom'] ?? null;
    $IdCateg = 1; // Valeur par défaut

    try {
        // Vérifier si l'utilisateur existe déjà
        if ($userRepo->userExists($email)) {
            throw new Exception("L'email est déjà utilisé. Veuillez en choisir un autre.");
        }

        // Inscription sans ID (l'ID est auto-généré par la data)
        $user = new User($email, $password, $civilite, $nom, $prenom, $IdCateg, false);
        $retour = $userRepo->saveUser($user);

        if ($retour) {
            $_SESSION['flash']['success'] = "Inscription réussie ! Vous pouvez vous connecter.";
            header('Location: /index.php');
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
