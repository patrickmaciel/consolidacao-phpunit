<?php

namespace Tests\Unit;

use Tests\TestCase;

class DatabaseTest extends TestCase
{
    /** @test */
    public function it_database_exists()
    {
        $this->assertFileExists('test.sqlite');
    }
}
