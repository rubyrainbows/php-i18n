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
    private static $instance = null;

    private $directory;

    private function __construct ()
    {
    }

    /**
     * Returns an instance of the I18n class
     * 
     * @return I18n
     */
    public static function getInstance ()
    {
        if ( self::$instance == null )
            self::$instance = new I18n();

        return self::$instance;
    }

    /**
     * Sets up the I18n class
     * 
     * @param  array $params setup parameters
     */
    public function setup ( $params = [] )
    {
        if ( array_key_exists( 'directory', $params ) )
            $this->directory = $params['directory'];
    }
}
