<?php

use RubyRainbows\I18n\Core\IO\Directory as Directory;
use RubyRainbows\I18n\Core\IO\File      as File;

class DirectoryTest extends TestCase
{
    private $dir;

    public function setUp ()
    {
        parent::setUp();

        $this->dir = new Directory( $this->fixturesPath . '/directory' );
    }

    public function testGetInstance ()
    {
        $file = new File( $this->dir, 'test.txt' );

        $this->assertEquals( [$file], $this->dir->getFiles() );
    }
}
