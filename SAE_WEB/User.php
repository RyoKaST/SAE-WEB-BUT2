<?php

class User {
    private string $email;
    private string $password;
    private string $civilite;
    private string $nom;
    private string $prenom;

    public function __construct(string $email, string $password, string $civilite, string $nom, string $prenom) {
        $this->email = $email;
        $this->password = $password;
        $this->civilite = $civilite;
        $this->nom = $nom;
        $this->prenom = $prenom;
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
}
