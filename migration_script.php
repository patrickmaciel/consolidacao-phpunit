<?php

require_once __DIR__ . '/bootstrap.php';

use P4dev\ConsolidacaoPhpunit\Database;
use P4dev\ConsolidacaoPhpunit\Tests\DatabaseTest;

$isTestEnv = false;

if (count($argv) >= 2) {
    $isTestEnv = $argv[1] === 'test';
}

if (!empty($argv[2]) && $argv[2] === 'fresh') {
    // delete the sqlite database file test.sqlite if exists
    if (file_exists(__DIR__ . '/test.sqlite')) {
        unlink(__DIR__ . '/test.sqlite');
    }
}

//$databaseClass = match($isTestEnv) {
//    true => DatabaseTest::class,
//    false => Database::class,
//};

//echo json_encode([$argv, $isTestEnv, $databaseClass]) . PHP_EOL;
//$instance = call_user_func([$databaseClass, 'getInstance']);
//$pdo = $instance->getConnection();
//$pdo = $databaseClass::getInstance()->getConnection();
$database = new Database();
$pdo = $database::getInstance()->getConnection();

$pdo->exec('DROP TABLE users;');
$pdo->exec('DROP TABLE profiles;');

$pdo->exec('CREATE TABLE profiles (
    id INTEGER PRIMARY KEY,
    name TEXT NOT NULL
);');

$pdo->exec('CREATE TABLE users (
    id INTEGER PRIMARY KEY,
    name TEXT NOT NULL,
    email TEXT NOT NULL,
    password TEXT NOT NULL
);');

//$profiles = $databaseClass::tableExists('profiles');
$profiles = Database::tableExists('profiles');
//$profiles = call_user_func([$databaseClass, 'tableExists'], 'profiles');
//$users = $databaseClass::tableExists('users');
$users = Database::tableExists('users');
//$users = call_user_func([$databaseClass, 'tableExists'], 'users');
//echo json_encode(compact('profiles', 'users')) . PHP_EOL;

//echo $profiles && $users;
echo true;
