<?php

use RubyRainbows\I18n\Core\LocaleCache;

class LocaleCacheTest extends TestCase
{
    /**
     * @var LocaleCache
     */
    private $cache;

    public function setUp ()
    {
        parent::setUp();

        $this->cache = new LocaleCache( $this->fixturesPath . '/locales' );
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
