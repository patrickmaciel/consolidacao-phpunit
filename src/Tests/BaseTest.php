<?php

namespace P4dev\ConsolidacaoPhpunit\Tests;

use PHPUnit\Framework\TestCase;

abstract class BaseTest extends TestCase
{
    protected $app;
    protected bool $setUpHasRun = false;

    abstract public function createApplication();

    protected function setUp(): void
    {
        //echo __FILE__ . ' - ' . __CLASS__ . ' - ' . __LINE__ . PHP_EOL;
        //echo 'setUp' . PHP_EOL;
        //echo json_encode($_ENV) . PHP_EOL;
        //echo 'app = ' . $this->app . PHP_EOL;
        if (!$this->app) {
            //echo 'refreshApplication' . PHP_EOL;
            $this->refreshApplication();
            //echo 'app 2 = ' . $this->app . PHP_EOL;
        }
        $this->setUpHasRun = true;
        //echo '-------------------' . PHP_EOL;
    }

    public function refreshApplication(): void
    {
        $this->app = $this->createApplication();
    }
}
