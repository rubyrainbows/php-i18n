<?php

/**
 * BaseParser.php
 *
 * @author    Thomas Muntaner thomas.muntaner@gmail.com
 * @copyright 2014 Thomas Muntaner
 * @version   1.0.0
 */

namespace RubyRainbows\I18n\Core\Parsers;

/**
 * Class BaseParser
 *
 * This abstract class defines the interpretation
 * of locale files in different languages and formats
 *
 * @package RubyRainbows\I18n\Core\Parsers
 *
 */
abstract class BaseParser
{
    /**
     * Parses a file into a php array
     *
     * @param  string $file
     *
     * @return array
     */
    abstract function parse ( $file );
}
