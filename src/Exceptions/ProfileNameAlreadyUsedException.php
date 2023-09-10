<?php

namespace P4dev\ConsolidacaoPhpunit\Exceptions;

class ProfileNameAlreadyUsedException extends \Exception
{
    public function __construct()
    {
        parent::__construct('Profile name already used');
    }
}
