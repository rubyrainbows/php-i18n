[![Latest Stable Version](https://poser.pugx.org/rubyrainbows/i18n/version.svg)](https://packagist.org/packages/rubyrainbows/i18n)
[![Total Downloads](https://poser.pugx.org/rubyrainbows/i18n/downloads.svg)](https://packagist.org/packages/rubyrainbows/i18n)
[![Build Status](https://travis-ci.org/rubyrainbows/php-i18n.svg?branch=v1.0.1)](https://travis-ci.org/rubyrainbows/php-i18n)

# PHP I18n

PHP I18n is a simple library for storing localized strings outside of your code.

## Installing

Add the following require to your composer.json file.

```json
{
    "require": {
        "rubyrainbows/i18n": "1.0.*"
    }
}
```

## Setup

### Language Folder

In order to use i18n, you will need a language folder.  By convention this folder is `config/lang`, however, you can choose whichever you want.  In this folder, each supported language requires its own folder (`config/lang/en`, `config/lang/de`, ...). 

### Use in PHP

You will most likely be using the I18n class in your own implementation, so you are just given a class which you can write a wrapper class for in your own code.  All you need to do to create this class is give it the path to the language folder you decided on before.

```php
<?php

use RubyRainbows\I18n\I18n as Lang;

$lang = new Lang( dirname(__FILE__) . '/config/lang' );
```

## Example Usage

**Notice:** *Currently, only yaml files are supported.*

For this example, the language folder is at config/lang.  

Create a file `config/lang/en/example.yml`

```yaml
foo: bar
nested:
  foo: bar
var: foo :var
```

**Note:** *Take note of the yml file name as it will be the first part of your key (example.yml => example).*


Now we can load the translation class and get our translated string.

```php
<?php

use RubyRainbows\I18n\I18n as Lang;

$lang   = new Lang( dirname(__FILE__) . 'config/lang' );
$locale = 'en';

/**
 * normal translated string
 */
$lang->get( $locale, 'example.foo' ); // returns 'bar'


/**
 * nested translated strings
 */
$lang->get( $locale, 'example.nested.foo' ); // returns 'bar'

/**
 * Variable translated string
 */
$lang->get( $locale, 'example.var', ['var' => 'bar']); // returns 'foo bar'
```
