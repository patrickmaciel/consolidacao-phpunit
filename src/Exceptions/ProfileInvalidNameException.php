<?php

namespace P4dev\ConsolidacaoPhpunit\Exceptions;

class ProfileInvalidNameException extends \Exception
{
    public function __construct()
    {
        parent::__construct('Profile name invalid');
    }
}
