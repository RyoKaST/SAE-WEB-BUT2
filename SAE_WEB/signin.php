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
    $email = $_POST['signin-email'] ?? null;
    $password = $_POST['signin-pwd'] ?? null;

    try {
        // Vérifier si l'utilisateur existe
        $user = $userRepo->findUserByEmail($email);
        if (!$user) {
            throw new Exception("Email introuvable.");
        }

        // Vérifier le mot de passe
        if ($password !== $user->getPassword()) {
            throw new Exception("Mot de passe incorrect.");
        }

        // Connexion réussie
        $_SESSION['user'] = [
            'email' => $user->getEmail(),
            'nom' => $user->getNom(),
            'prenom' => $user->getPrenom(),
        ];
        $_SESSION['flash']['success'] = "Connexion réussie. Bienvenue, " . $user->getPrenom() . " !";

        header("Location: index.php");
        exit;
    } catch (Exception $e) {
        // Gestion des erreurs
        $_SESSION['flash']['warning'] = $e->getMessage();
        header("Location: formulaire.php");
        exit;
    }
}
