<?php

use RubyRainbows\I18n\LocaleCache as Cache;

class LocaleCacheTest extends TestCase
{
    private $cache;

    public function setUp ()
    {
        parent::setUp();

        $this->cache = new Cache( $this->fixturesPath . '/locales' );
    }

    public function testCache ()
    {
        $expected = [
                    'nested'    => ['foo' => ['bar' => 'foo bar']],
                    'single'    => ['foo' => 'bar'],
                    'plural'    => ['foo' => ['one' => 'foo bar', 'other' => 'foo bars']],
                    'var'       => ['foo' => 'foo :var']
        ];

        $this->assertEquals( $expected, $this->cache->get( 'en' ) );
    }
}
