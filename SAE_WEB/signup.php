<?php
try {
    $db_file = 'C:/Users/Bouzi/PhpstormProjects/SAE-WEB-BUT2/SAE_WEB/BD/BD.db'; // Chemin vers la base SQLite
    $pdo = new PDO("sqlite:$db_file");
} catch (PDOException $e) {
    die("Erreur de connexion à la base de données: " . $e->getMessage());
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['signup-email']);
    $password = password_hash($_POST['signup-pwd'], PASSWORD_BCRYPT);
    $nom = trim($_POST['signup-last']);
    $prenom = trim($_POST['signup-prenom']);
    $civilite = $_POST['signup-civil'];

    $age = isset($_POST['signup-age']) ? (int)$_POST['signup-age'] : null; // Optionnel

    // Vérification des champs requis
    if (empty($email) || empty($password) || empty($nom) || empty($prenom) || empty($civilite)) {
        die("Tous les champs obligatoires doivent être remplis.");
    }

    try {
        // Vérifie si l'email existe déjà
        $stmt = $pdo->prepare("SELECT COUNT(*) FROM Users WHERE email = :email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        if ($stmt->fetchColumn() > 0) {
            die("Cet email est déjà utilisé.");
        }

        // Insertion des données dans la base
        $stmt = $pdo->prepare(
            "INSERT INTO Users (email, password, Nom, Prenom, Civilite, Age) 
             VALUES (:email, :password, :nom, :prenom, :civilite, :age)"
        );
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $password);
        $stmt->bindParam(':nom', $nom);
        $stmt->bindParam(':prenom', $prenom);
        $stmt->bindParam(':civilite', $civilite);
        $stmt->bindParam(':age', $age);

        $stmt->execute();

        echo "Inscription réussie!";
    } catch (PDOException $e) {
        die("Erreur lors de l'inscription: " . $e->getMessage());
    }
}
