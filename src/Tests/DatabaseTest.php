<?php

namespace P4dev\ConsolidacaoPhpunit\Tests;

use PDO;

class DatabaseTest
{
    private static $instance;
    private $pdo;

    private function __construct()
    {
        //echo 'DatabaseTest = ' . $_ENV['DB_DATABASE'] . PHP_EOL;
        // Configurações da conexão com o banco de dados
        $dsn = 'sqlite:test.sqlite';

        // Estabelece a conexão PDO
        $this->pdo = new PDO($dsn);
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public static function getInstance()
    {
        if (!self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function getConnection()
    {
        return $this->pdo;
    }

    public static function tableExists(string $tableName): bool
    {
        $stmt = self::getInstance()
            ->getConnection()
            ->prepare("SELECT name FROM sqlite_master WHERE type='table' AND name=:name");
        $stmt->execute([':name' => $tableName]);
        $result = $stmt->fetch();
        return (bool)$result;
    }
}
