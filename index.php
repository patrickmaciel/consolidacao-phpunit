<?php

require_once __DIR__ . '/bootstrap.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

use P4dev\ConsolidacaoPhpunit\Profile;

try {
    echo 'Iniciando script da aplicação...' . PHP_EOL;
    $profile = new Profile('Visitante');
    $profile->save();

    var_dump($profile);
} catch (Exception $e) {
    die("Erro: {$e->getMessage()}");
}
