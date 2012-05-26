<?php

$GLOBALS['wp_tests_options'] = array(
    'active_plugins' => array( 'hello.php' ),
    'template' => 'twentyeleven',
    'stylesheet' => 'twentytest',
);

$path = './vendors/WordPressUnitTest/init.php';

if( file_exists( $path ) ) {
    require_once $path;
} else {
    exit( "Couldn't find path to wordpress-tests/init.php\n" );
}