<?php
/**
 * Front to the WordPress application. This file doesn't do anything, but loads
 * wp-blog-header.php which does and tells WordPress to load the theme.
 *
 * @package WordPress
 */

/**
 * Tells WordPress to load the WordPress theme and output it.
 *
 * @var bool
 */
define('WP_USE_THEMES', true);

global $shortcode_tags;

/** Loads the WordPress Environment and Template */
$returnValue = require('../../../wp-load.php');

abstract class WordPress_TestCase extends PHPUnit_Framework_TestCase {

	function tearDown() {
		// unset global variables so it won't affect the next test
		unset(
			$GLOBALS['wp'], 
			$GLOBALS['wp_query'], 
			$GLOBALS['wp_the_query'],
			$GLOBALS['post']
		);
	}

	function query( $url ) {

		global $wp, $wp_query, $wp_the_query;

		// note: the WP and WP_Query classes like to silently fetch parameters
		// from all over the place (globals, GET, etc), which makes it tricky
		// to run them more than once without very carefully clearing everything
		$_GET = $_POST = array();

		foreach (array('query_string', 'id', 'postdata', 'authordata', 'day', 'currentmonth', 'page', 'pages', 'multipage', 'more', 'numpages', 'pagenow') as $v) {
			if ( isset( $GLOBALS[$v] ) ) unset( $GLOBALS[$v] );
		}

		$parts = parse_url($url);

		if (isset($parts['scheme'])) {
			$req = $parts['path'];
			if (isset($parts['query'])) {
				$req .= '?' . $parts['query'];
				// parse the url query vars into $_GET
				parse_str($parts['query'], $_GET);
			} else {
				$parts['query'] = '';
			}
		} else {
			$req = $url;
		}

		$_SERVER['REQUEST_URI'] = $req;
		unset($_SERVER['PATH_INFO']);

		wp_cache_flush();

		$wp_query = $wp_the_query = new WP_Query();
		$wp = new WP();

		// clean out globals to stop them polluting wp and wp_query
		foreach ($wp->public_query_vars as $v) {
			unset($GLOBALS[$v]);
		}

		foreach ($wp->private_query_vars as $v) {
			unset($GLOBALS[$v]);
		}

		$wp->main($parts['query']);
	}
}