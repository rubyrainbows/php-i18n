<?php

use RubyRainbows\I18n\Parsers\YamlParser;

class YamlParserTest extends TestCase
{
    /**
     * @var YamlParser
     */
    private $parser;

    public function setUp ()
    {
        parent::setUp();

        $this->parser = new YamlParser();
    }

    public function testParse ()
    {
        $file       = file_get_contents( $this->fixturesPath . '/test.yml' );
        $expected   = [ 'foo' => [ 'foo1' => 'foo1', 'foo2' => 'foo2' ] ];

        $this->assertEquals( $expected, $this->parser->parse( $file ) );
    }
}
