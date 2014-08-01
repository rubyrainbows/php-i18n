<?php

use RubyRainbows\I18n\I18n as Lang;

class I18nTest extends TestCase
{
    private $parser;

    public function setUp ()
    {
        parent::setUp();

        $this->lang = Lang::getInstance();
    }

    public function testGetInstance ()
    {
        $this->assertNotNull( $this->lang );
    }
}
