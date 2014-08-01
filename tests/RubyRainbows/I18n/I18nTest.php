<?php

use RubyRainbows\I18n\I18n as Lang;

class I18nTest extends TestCase
{
    private $lang;

    public function setUp ()
    {
        parent::setUp();

        $this->lang = new Lang( $this->fixturesPath . '/lang' );
    }

    public function testGet ()
    {
        $this->assertEquals( 'foo', $this->lang->get( 'en', 'bar.bar' ) );
    }

    public function testGetWithKeyNotExisting ()
    {
        $this->assertEquals( '', $this->lang->get( 'en', 'bar.bar.foo' ) );
        $this->assertEquals( '', $this->lang->get( 'en', 'bar-foo' ) );
        $this->assertEquals( '', $this->lang->get( 'en', '' ) );
    }
}
