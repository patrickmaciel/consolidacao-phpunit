<?php

namespace Tests\Feature;

use Exception;
use P4dev\ConsolidacaoPhpunit\Database;
use P4dev\ConsolidacaoPhpunit\Exceptions\ProfileInvalidNameException;
use P4dev\ConsolidacaoPhpunit\Exceptions\ProfileNameAlreadyUsedException;
use P4dev\ConsolidacaoPhpunit\Profile;
use Tests\TestCase;

class ProfileTest extends TestCase
{
    public static function setUpBeforeClass(): void
    {
        $pdo = Database::getInstance()->getConnection();
        $pdo->exec('DROP TABLE IF EXISTS profiles');
        $pdo->exec('CREATE TABLE profiles (
            id INTEGER PRIMARY KEY,
            name TEXT NOT NULL
        )');
    }

    /** @test
     * @throws Exception
     */
    public function it_throws_exception_for_empty_name()
    {
        $this->expectException(ProfileInvalidNameException::class);

        $profile = new Profile('');
        $profile->save();
    }

    /** @test
     * @throws Exception
     */
    public function it_throws_exception_for_not_unique_name()
    {
        $this->expectException(ProfileNameAlreadyUsedException::class);

        $profile = new Profile('Visitante 2');
        $profile->save();

        $profile = new Profile('Visitante 2');
        $profile->save();
    }

    /** @test */
    public function it_save_correctly()
    {
        $profile = new Profile('Administrador 2');
        $profile->save();

        $this->assertIsInt($profile->id);
        $this->assertGreaterThan(0, $profile->id);
        $this->assertNotEmpty($profile->name);
        $this->assertIsString($profile->name);
    }
}
