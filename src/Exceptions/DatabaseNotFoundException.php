<?php

namespace P4dev\ConsolidacaoPhpunit\Exceptions;

class DatabaseNotFoundException extends \Exception
{
    public function __construct()
    {
        parent::__construct('Database not found');
    }
}
