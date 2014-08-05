<?php

use RubyRainbows\I18n\Finder as Finder;

class FinderTest extends TestCase
{
    private $finder;

    public function setUp ()
    {
        parent::setUp();

        $this->finder = new Finder( $this->fixturesPath . '/locales' );
    }

    public function testGet ()
    {
        $this->assertEquals( 'bar', $this->finder->get( 'en', 'single.foo' ) );
    }

    public function testGetWithKeyNotExisting ()
    {
        $this->assertEquals( '', $this->finder->get( 'en', 'bar.bar.foo' ) );
        $this->assertEquals( '', $this->finder->get( 'en', 'bar-foo' ) );
        $this->assertEquals( '', $this->finder->get( 'en', '' ) );
    }
}
