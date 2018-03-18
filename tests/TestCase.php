<?php

require_once __DIR__ . '/../vendor/autoload.php';

class TestCase extends \PHPUnit\Framework\TestCase
{
    protected $fixturesPath;

    public function setUp ()
    {
        $this->fixturesPath = dirname(__FILE__) . '/fixtures';
    }

    public function tearDown ()
    {
    }
}