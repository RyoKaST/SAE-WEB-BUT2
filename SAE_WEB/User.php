<?php

class User {
    private string $email;
    private string $password;
    private string $civilite;
    private string $nom;
    private string $prenom;

    private int $idcateg;

    public function __construct(string $email, string $password, string $civilite, string $nom, string $prenom, int $idcateg=1) {
        $this->email = $email;
        $this->password = $password;
        $this->civilite = $civilite;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->idcateg = $idcateg;
    }

    public function getEmail(): string {
        return $this->email;
    }

    public function getPassword(): string {
        return $this->password;
    }

    public function getCivilite(): string {
        return $this->civilite;
    }

    public function getNom(): string {
        return $this->nom;
    }

    public function getPrenom(): string {
        return $this->prenom;
    }

    public function getIdcateg(): int {
        return $this->idcateg;
    }

}
