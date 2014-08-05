<?php

use RubyRainbows\I18n\Cleaner as Cleaner;

class CleanerTest extends TestCase
{
    private $cleaner;

    public function setUp ()
    {
        parent::setUp();

        $this->cleaner = new Cleaner();
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
}
