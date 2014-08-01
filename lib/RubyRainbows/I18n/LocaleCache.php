<?php

/**
 * LocaleCache.php
 *
 * @author    Thomas Muntaner thomas.muntaner@gmail.com
 * @copyright 2014 Thomas Muntaner
 * @version   1.0.0
 */

namespace RubyRainbows\I18n;

use RubyRainbows\I18n\Parsers\YamlParser    as Parser;
use RubyRainbows\I18n\Core\IO\Directory     as Directory;
use RubyRainbows\I18n\Core\IO\File          as File;

/**
 * Class LocaleCache
 *
 * This class stores the translations
 *
 * @package RubyRainbows\I18n
 * 
 */
class LocaleCache
{
    private $cache          = null;
    private $langDirectory  = null;

    public function __construct ( $langDirectory )
    {
        $this->cache            = [];
        $this->langDirectory    = $langDirectory;
        $this->parser           = new Parser();
    }

    /**
     * Gets the cached array for the locale
     * 
     * @param  string $locale
     * 
     * @return array
     */
    public function get ( $locale )
    {
        if ( !array_key_exists( $locale, $this->cache ) )
            $this->build( $locale );

        return $this->cache[$locale];
    }

    /**
     * Builds the cache for the locale
     * 
     * @param  string $locale
     */
    private function build ( $locale )
    {
        $cache      = [];
        $directory  = new Directory( $this->langDirectory . '/' . $locale );
        $files      = $directory->getFiles();

        foreach ( $files as $file )
        {
            $data = $this->parser->parse( $file->readFile() );
            $data = [ $this->getInitialKey( $file ) => $data ];
            $cache = array_merge( $cache, $data );
        }

        $this->cache[$locale] = $cache;
    }

    /**
     * Gets the intial key for the file.  Needed to specify file in finder
     * 
     * @param  File   $file
     * 
     * @return string
     */
    private function getInitialKey ( File $file )
    {
        return explode( '.', $file->getName() )[0];
    }
}
