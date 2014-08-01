<?php

use RubyRainbows\I18n\Core\IO\Directory as Directory;
use RubyRainbows\I18n\Core\IO\File      as File;

class FileTest extends TestCase
{
    private $file;
    private $dir;

    public function setUp ()
    {
        parent::setUp();

        $this->dir  = new Directory( $this->fixturesPath . '/directory' );
        $this->file = new File( $this->dir, 'test.txt' );
    }

    public function testReadFile ()
    {
        $this->assertEquals( 'foo', $this->file->readFile() );
    }
}
