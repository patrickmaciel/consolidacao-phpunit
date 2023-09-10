<?php

namespace P4dev\ConsolidacaoPhpunit;

class User
{
    protected string $id;

    public function __construct(
        protected string $name,
        protected string $email,
        protected string $password,
        protected ?Profile $profile = null
    ) {
    }
}
