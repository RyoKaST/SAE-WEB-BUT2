<?php

namespace classes;
class User
{
    private string $email;
    private string $password;
    private string $civilite;
    private string $nom;
    private string $prenom;
    private int $idcateg;
    private bool $AComplete;
    private ?int $id = null;

    public function __construct(
        string $email,
        string $password,
        string $civilite,
        string $nom,
        string $prenom,
        int    $idcateg,
        bool   $AComplete,
        ?int   $id = null
    )
    {
        $this->email = $email;
        $this->password = $password;
        $this->civilite = $civilite;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->idcateg = $idcateg;
        $this->AComplete = $AComplete;
        $this->id = $id;  // ID peut être null
    }

    // Méthode pour définir l'ID après l'insertion
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getAComplete(): bool
    {
        return $this->AComplete;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function getCivilite(): string
    {
        return $this->civilite;
    }

    public function getNom(): string
    {
        return $this->nom;
    }

    public function getPrenom(): string
    {
        return $this->prenom;
    }

    public function getIdcateg(): int
    {
        return $this->idcateg;
    }
}
