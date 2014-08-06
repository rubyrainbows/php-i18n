<?php

use RubyRainbows\I18n\I18n as Lang;

class I18nTest extends TestCase
{
    private $lang;

    public function setUp ()
    {
        parent::setUp();

        $this->lang = new Lang( $this->fixturesPath . '/locales' );
    }

    public function testGet ()
    {
        $this->assertEquals( 'bar', $this->lang->get( 'en', 'single.foo' ) );
        $this->assertEquals( 'foo bar', $this->lang->get( 'en', 'nested.foo.bar' ) );
        $this->assertEquals( 'foo bar', $this->lang->get( 'en', 'var.foo', ['var' => 'bar'] ) );
        $this->assertEquals( 'foo bar', $this->lang->get( 'en', 'plural.foo', [], 1 ) );
        $this->assertEquals( 'foo bars', $this->lang->get( 'en', 'plural.foo', [], 2 ) );
    }

    public function testGetWithDialect ()
    {
        $this->assertEquals( 'murica', $this->lang->get( 'en_US', 'single.foo' ) );
        $this->assertEquals( 'foo bar', $this->lang->get( 'en_US', 'nested.foo.bar' ) ); // fallback to en
    }

    public function testGetWithKeyNotExisting ()
    {
        $this->assertEquals( '', $this->lang->get( 'en', 'bar.bar.foo' ) );
        $this->assertEquals( '', $this->lang->get( 'en', 'bar-foo' ) );
        $this->assertEquals( '', $this->lang->get( 'en', '' ) );
    }
}
