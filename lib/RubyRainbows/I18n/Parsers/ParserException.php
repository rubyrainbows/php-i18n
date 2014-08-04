<?php

/**
 * ParserException.php
 *
 * @author    Thomas Muntaner thomas.muntaner@gmail.com
 * @copyright 2014 Thomas Muntaner
 * @version   1.0.0
 */

namespace RubyRainbows\I18n\Parsers;

/**
 * Class ParserException
 *
 * This is an exception for parsing
 *
 * @package RubyRainbows\I18n\Parsers
 * 
 */
class ParserException extends \Exception
{
    public function __construct ( \Previous $previous )
    {
        parent::__construct( "Something went wrong with parsing the document.", 0, $previous );
    }
}
