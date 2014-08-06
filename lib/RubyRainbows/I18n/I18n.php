<?php

/**
 * I18n.php
 *
 * @author    Thomas Muntaner thomas.muntaner@gmail.com
 * @copyright 2014 Thomas Muntaner
 * @version   1.0.0
 */

namespace RubyRainbows\I18n;

/**
 * Class I18n
 *
 * The main class for the I18n module
 *
 * @package RubyRainbows\I18n
 * 
 */
class I18n
{
    private $directory;
    private $finder;
    private $cleaner;

    public function __construct ( $directory )
    {
        $this->directory    = $directory;
        $this->finder       = new Finder( $this->directory );
        $this->cleaner      = new Cleaner();
    }

    /**
     * Gets the localzied string from the finder
     * 
     * @param  string $locale
     * @param  string $key
     * 
     * @return string
     */
    public function get ( $locale, $key, $vars=[], $count=1 )
    {
        $locales    = [$locale];
        $position   = strpos( $locale, '_' );

        if ( $position !== false )
            $locales[] = explode( '_', $locale )[0];

        $translation = $this->getTranslation( $locales, $key );

        return $this->cleaner->clean( $translation, $vars, $count );
    }

    private function getTranslation ( $locales, $key )
    {
        foreach ( $locales as $locale )
        {
            $translation = $this->finder->get( $locale, $key );

            if ( $translation != '' )
                return $translation;
        }

        return '';
    }
}
