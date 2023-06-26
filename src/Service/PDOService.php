<?php

namespace App\Service;

use PDO;

class PDOService
{
    protected PDO $pdo;

    private string $dsn = 'mysql:host=127.0.0.1:3306;dbname=cinema';
    private string $user = 'root';
    private string $password = '';

    public function __construct()
    {
        $this->pdo = new PDO($this->dsn, $this->user, $this->password);
    }

    public function findAll()
    {
        return $this->pdo->query("SELECT * FROM movie")->fetchAll();
    }
}
