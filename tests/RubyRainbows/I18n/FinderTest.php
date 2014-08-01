<?php

use RubyRainbows\I18n\Finder as Finder;

class FinderTest extends TestCase
{
    private $finder;

    public function setUp ()
    {
        parent::setUp();

        $this->finder = new Finder( $this->fixturesPath . '/lang' );
    }

    public function testGet ()
    {
        $this->assertEquals( 'foo', $this->finder->get( 'en', 'bar.bar' ) );
    }

    public function testGetWithKeyNotExisting ()
    {
        $this->assertEquals( '', $this->finder->get( 'en', 'bar.bar.foo' ) );
        $this->assertEquals( '', $this->finder->get( 'en', 'bar-foo' ) );
        $this->assertEquals( '', $this->finder->get( 'en', '' ) );
    }
}
