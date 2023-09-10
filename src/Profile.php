<?php

namespace P4dev\ConsolidacaoPhpunit;

use Exception;
use P4dev\ConsolidacaoPhpunit\Exceptions\ProfileInvalidNameException;
use P4dev\ConsolidacaoPhpunit\Exceptions\ProfileNameAlreadyUsedException;

class Profile
{
    public int $id;

    public function __construct(public string $name)
    {
    }

    /**
     * @throws Exception
     */
    public function save(): int
    {
        $pdo = Database::getInstance()->getConnection();

        if (empty($this->name)) {
            throw new ProfileInvalidNameException();
        }

        if ($this->findByName($this->name)) {
            throw new ProfileNameAlreadyUsedException();
        }

        $stmt = $pdo->prepare('INSERT INTO profiles (name) VALUES (:name)');
        $stmt->execute([$this->name]);
        $this->id = $pdo->lastInsertId();
        return $this->id;
    }

    public function findByName(string $name): bool
    {
        $pdo = Database::getInstance()->getConnection();
        $stmt = $pdo->prepare('SELECT * FROM profiles WHERE name = :name');
        $stmt->execute([$name]);

        $result = $stmt->fetch();
        return (bool)$result;
    }
}
