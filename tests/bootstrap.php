<?php

$GLOBALS['wp_tests_options'] = array(
    // parent theme.
    'template' => 'twentyeleven',

    // child theme, set to the same as parent theme if not a child theme.
    'stylesheet' => 'twentytest',

    // activate plugins.
    'active_plugins' => array(
        'hello.php',
    ),
);

$path = './vendors/WordPressUnitTest/init.php';

if( file_exists( $path ) ) {
    require_once $path;
} else {
    exit( "Couldn't find path to wordpress-tests/init.php\n" );
}