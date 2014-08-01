<?php

use RubyRainbows\I18n\LocaleCache as Cache;

class LocaleCacheTest extends TestCase
{
    private $cache;

    public function setUp ()
    {
        parent::setUp();

        $this->cache = new Cache( $this->fixturesPath . '/lang' );
    }

    public function testCache ()
    {
        $expected = [
                    'bar' => ['bar' => 'foo'],
                    'foo' => ['foo' => 'bar']
        ];

        $this->assertEquals( $expected, $this->cache->get( 'en' ) );
    }
}
