<?php

class SQLiteUserRepository {

    private \PDO $dbConnexion;

    public function __construct(\PDO $dbConnexion) {
        $this->dbConnexion = $dbConnexion;
    }

    public function saveUser(User $user): bool {
        $stmt = $this->dbConnexion->prepare(
            "INSERT INTO Users (email, password, civilite, nom, prenom) 
        VALUES (:email, :password, :civilite, :nom, :prenom)"
        );

        return $stmt->execute([
            'email' => $user->getEmail(),
            'password' => $user->getPassword(),
            'civilite' => $user->getCivilite(),
            'nom' => $user->getNom(),
            'prenom' => $user->getPrenom(),
        ]);
    }


    public function findUserByEmail(string $email): ?User {
        $stmt = $this->dbConnexion->prepare("SELECT * FROM Users WHERE email = :email");
        $stmt->execute(['email' => $email]);
        $result = $stmt->fetch();

        if ($result) {
            return new User($result['email'], $result['password'], $result['civilite'], $result['nom'], $result['prenom']);
        }

        return null;
    }

    public function userExists(string $email): bool {
        $stmt = $this->dbConnexion->prepare("SELECT COUNT(*) FROM users WHERE email = :email");
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchColumn() > 0;
    }

}
