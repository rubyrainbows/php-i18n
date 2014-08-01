<?php

/**
 * Parser.php
 *
 * @author    Thomas Muntaner thomas.muntaner@gmail.com
 * @copyright 2014 Thomas Muntaner
 * @version   1.0.0
 */

namespace RubyRainbows\I18n\Parsers;

use Symfony\Component\Yaml\Exception\ParseException;

/**
 * Class Parser
 *
 * This abstract class defines the interpretation
 * of locale files in different languages and formats
 *
 * @package RubyRainbows\I18n\Parsers
 * 
 */
abstact class Parser
{
    /**
     * Gets the instance of the parser
     * 
     * @return Parser The instance of the parser
     */
    public static function getInstance ();

    /**
     * Parses a file into a php array
     * 
     * @param  string $file
     * @return array
     */
    public function parse ( $file );
}
