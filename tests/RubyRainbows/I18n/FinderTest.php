<?php

use RubyRainbows\I18n\Finder;

class FinderTest extends TestCase
{
    /**
     * @var Finder
     */
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


    public function testGetWithMissingFolder ()
    {
        $this->finder = new Finder( $this->fixturesPath . '/locales1' );
        $this->assertEquals( '', $this->finder->get( 'en', 'single.foo' ) );
    }
}
