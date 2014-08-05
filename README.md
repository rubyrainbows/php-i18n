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

**Notice:** *Currently, only yaml files are supported.*

For this example, the language directory is stored at config/lang.  This directory contains language folders that hold the translations files.

Create a file config/lang/en/example.yml

```yaml
foo: bar
nested:
  foo: bar
var: foo :var
```

Now we can load the translation class and get our translated string.

```php
<?php

use RubyRainbows\I18n\I18n as Lang;

$lang   = new Lang( 'config/lang' );
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

**Note:** *The first part of the key is the file that contains the translations (example.yml => example).*
