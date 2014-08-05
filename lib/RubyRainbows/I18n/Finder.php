<?php

/**
 * Finder.php
 *
 * @author    Thomas Muntaner thomas.muntaner@gmail.com
 * @copyright 2014 Thomas Muntaner
 * @version   1.0.0
 */

namespace RubyRainbows\I18n;

/**
 * Class Finder
 *
 * This class finds translations
 *
 * @package RubyRainbows\I18n
 * 
 */
class Finder
{
    private $cache;

    public function __construct ( $langDirectory )
    {
        $this->cache = new LocaleCache( $langDirectory );
    }

    /**
     * Finds a localized string from the cache
     * 
     * @param  string $locale
     * @param  string $key
     * 
     * @return string
     */
    public function get ( $locale, $key )
    {
        $data = $this->cache->get( $locale );

        return $this->find( $data, $key );
    }

    /**
     * Finds the item in the array from the key
     * 
     * @param  array $data
     * @param  array $keys
     * 
     * @return string
     */
    private function find ( $data, $key )
    {
        $keys = explode( '.', $key );

        foreach ( $keys as $key )
        {
            if ( is_array( $data ) && array_key_exists( $key, $data ) )
                $data = $data[$key];
            else
                return '';
        }

        return $data;
    }
}
