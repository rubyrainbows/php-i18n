<?php

/**
 * YamlParser.php
 *
 * @author    Thomas Muntaner thomas.muntaner@gmail.com
 * @copyright 2014 Thomas Muntaner
 * @version   1.0.0
 */

namespace RubyRainbows\I18n\Parsers;

use Symfony\Component\Yaml\Parser;

/**
 * Class YamlParser
 *
 * This class interacts with the symfony yaml component
 * to read yaml locale files
 *
 * @package RubyRainbows\I18n\Parsers
 * 
 */
class YamlParser extends BaseParser
{
    /**
     * @var Parser
     */
    private $parser;

    public function __construct ()
    {
        $this->parser = new Parser();
    }

    /**
     * Parses a yaml file into a php array
     * 
     * @param  string $file
     * @return array
     */
    public function parse ( $file )
    {
        try
        {
            return $this->parser->parse( $file );
        }
        catch ( \Exception $e )
        {
            return [];
        }
    }
}
