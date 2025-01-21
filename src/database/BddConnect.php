<?php
//Classe qui permet de faire la cpnnexion avec notre BD SqLite
namespace database;
class BddConnect
{
    private \PDO $pdo;
    protected string $db_file;

    public function __construct()
    {
        $this->db_file = realpath(__DIR__ . '/../../data/BD.db');
    }

    public function connexion(): \PDO
    {
        try {
            $dsn = "sqlite:$this->db_file";
            $this->pdo = new \PDO($dsn);
            $this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            $this->pdo->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_ASSOC);
        } catch (\PDOException $e) {
            die("Erreur de connexion à la base SQLite : " . $e->getMessage());
        }
        return $this->pdo;
    }
}
