<?php

class SQLiteUserRepository
{

    private \PDO $dbConnexion;

    public function __construct(\PDO $dbConnexion)
    {
        $this->dbConnexion = $dbConnexion;
    }

    public function findUserByEmail(string $email): ?User
    {
        // Assurez-vous que la connexion $pdo est bien définie
        $stmt = $this->dbConnexion->prepare("SELECT * FROM users WHERE email = :email");
        $stmt->execute(['email' => $email]);
        $data = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($data) {
            return new User(
                $data['email'],
                $data['password'],
                $data['Civilite'],
                $data['nom'],
                $data['prenom'],
                $data['IdCateg'],
                (bool)$data['AComplete'],
                (int)$data['Id']  // Récupérer l'ID
            );
        }

        return null;
    }

    // Sauvegarder un nouvel utilisateur dans la base de données
    public function saveUser(User $user): bool
    {
        $stmt = $this->dbConnexion->prepare(
            "INSERT INTO users (email, password, civilite, nom, prenom, idcateg, AComplete) 
             VALUES (:email, :password, :civilite, :nom, :prenom, :idcateg, :AComplete)"
        );
        $stmt->execute([
            'email' => $user->getEmail(),
            'password' => $user->getPassword(),
            'civilite' => $user->getCivilite(),
            'nom' => $user->getNom(),
            'prenom' => $user->getPrenom(),
            'idcateg' => $user->getIdcateg(),
            'AComplete' => $user->getAComplete(),
        ]);

        // Récupérer l'ID auto-incrémenté après l'insertion
        $userId = $this->dbConnexion->lastInsertId();
        $user->setId($userId);  // Mettez à jour l'ID dans l'objet User
        return true;
    }

    public function userExists(string $email): bool {
        $stmt = $this->dbConnexion->prepare("SELECT COUNT(*) FROM users WHERE email = :email");
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchColumn() > 0;
    }

}
