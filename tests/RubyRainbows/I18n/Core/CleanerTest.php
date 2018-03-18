<?php

use RubyRainbows\I18n\Core\Cleaner;

class CleanerTest extends TestCase
{
    /**
     * @var Cleaner
     */
    private $cleaner;

    /**
     * @var array
     */
    private $plural;

    public function setUp ()
    {
        parent::setUp();

        $this->cleaner  = new Cleaner();
        $this->plural   = [
            'one'   => ':var apple',
            'other' => ':count :color apples'
        ];
    }

    public function testNormalStringWithoutVars ()
    {
        $dirty      = 'foo';
        $cleaned    = $this->cleaner->clean( $dirty, [] );

        $this->assertEquals( $dirty, $cleaned );
    }

    public function testNormalStringWithVars ()
    {
        $dirty      = 'foo';
        $cleaned    = $this->cleaner->clean( $dirty, ['foo' => 'bar'] );

        $this->assertEquals( $dirty, $cleaned );
    }

    public function testVarStringWithoutVars ()
    {
        $dirty      = 'foo :foo';
        $cleaned    = $this->cleaner->clean( $dirty, [] );

        $this->assertEquals( $dirty, $cleaned );
    }

    public function testVarStringWithVars ()
    {
        $dirty      = 'foo :foo';
        $cleaned    = $this->cleaner->clean( $dirty, ['foo' => 'bar'] );

        $this->assertEquals( 'foo bar', $cleaned );
    }

    public function testPluralizationSingle ()
    {
        $cleaned = $this->cleaner->clean( $this->plural, ['var' => 'A'] );

        $this->assertEquals( 'A apple', $cleaned );
    }

    public function testPluralizationPlural ()
    {
        $cleaned = $this->cleaner->clean( $this->plural, ['color' => 'red'], 10 );

        $this->assertEquals( '10 red apples', $cleaned );
    }

    public function testCleanArrayShouldReturnEmptyString ()
    {
        $cleaned = $this->cleaner->clean( ['foo', 'bar'], ['color' => 'red', 'foo' => 'bar'], 20 );

        $this->assertEquals('', $cleaned);
    }
}
