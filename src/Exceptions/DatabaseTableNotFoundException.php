<?php

namespace P4dev\ConsolidacaoPhpunit\Exceptions;

class DatabaseTableNotFoundException extends \Exception
{
    public function __construct(string $table)
    {
        parent::__construct("Table {$table} not found");
    }
}
