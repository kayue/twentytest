<?php

/**
 * Load WordPress test environment
 *
 * @see https://github.com/nb/wordpress-tests
 */

// Tells WordPress to load the WordPress theme and output it.
define('WP_USE_THEMES', true);

// The path to wordpress-tests
$path = 'vendors/wordpress-tests/init.php';

if( file_exists( $path ) ) {
    require_once $path;
} else {
    exit( "Couldn't find path to wordpress-tests/init.php\n" );
}