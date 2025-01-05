<?php

class SQLiteUserRepository {

    private \PDO $dbConnexion;

    public function __construct(\PDO $dbConnexion) {
        $this->dbConnexion = $dbConnexion;
    }

    public function saveUser(User $user): bool {
        $stmt = $this->dbConnexion->prepare(
            "INSERT INTO Users (email, password, Civilite, nom, prenom, IdCateg) 
        VALUES (:email, :password, :civilite, :nom, :prenom, :IdCateg)"
        );

        return $stmt->execute([
            'email' => $user->getEmail(),
            'password' => $user->getPassword(),
            'civilite' => $user->getCivilite(),
            'nom' => $user->getNom(),
            'prenom' => $user->getPrenom(),
            'IdCateg' => $user->getIdCateg()
        ]);
    }



    public function findUserByEmail(string $email): ?User {
        $stmt = $this->dbConnexion->prepare("SELECT * FROM Users WHERE email = :email");
        $stmt->execute(['email' => $email]);
        $result = $stmt->fetch();

        if ($result) {
            return new User(
                $result['email'],
                $result['password'],
                $result['Civilite'],
                $result['nom'],
                $result['prenom'],
                $result['IdCateg']
            );
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
