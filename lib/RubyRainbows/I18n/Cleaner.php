<?php

/**
 * Cleaner.php
 *
 * @author    Thomas Muntaner thomas.muntaner@gmail.com
 * @copyright 2014 Thomas Muntaner
 * @version   1.0.0
 */

namespace RubyRainbows\I18n;

/**
 * Class Cleaner
 *
 * This class cleans a translation
 *
 * @package RubyRainbows\I18n
 * 
 */
class Cleaner
{
    /**
     * Finds a localized string from the cache
     * 
     * @param  string $translation
     * @param  array  $vars
     * 
     * @return string
     */
    public function clean ( $translation, $vars=[] )
    {
        foreach ( $vars as $key => $value )
            $translation = str_replace( ":{$key}", $value, $translation );
        
        return $translation;
    }
}
