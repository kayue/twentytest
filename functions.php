<?php

/**
 * Trims text to a certain number of words.
 *
 * @param string $text Text to trim.
 * @param int $num_words Number of words. Default 55.
 * @param string $more What to append if $text needs to be trimmed. Default '&hellip;'.
 * @return string Trimmed text.
 */
function twentytest_trim($text, $num_words = 55, $more = null) {
	return wp_trim_words($text, $num_words = 55, $more = null);
}

/**
 * Converts value to nonnegative integer.
 *
 * @param mixed $maybeint Data you wish to have converted to a nonnegative integer
 * @return int An nonnegative integer
 */
function twentytest_absint($maybeint) {
	return absint($maybeint);
}

/**
 * Add a new shortcode.
 *
 * @param string $tag Shortcode tag to be searched in post content.
 * @param callable $func Hook to run when shortcode is found.
 */
add_shortcode('say', function($atts, $content = '') {
	extract(shortcode_atts(array(
		'who' => 'Someone'
	), $atts));

	return "{$who} say: \"{$content}\"";
});

/**
 * Add action.
 */
add_action('twentytest_do_somthing', function() {
	global $twentytest_do_somthing;

	$twentytest_do_somthing = true;
});

/**
 * Add filter.
 */
add_filter('twentytest_say_somthing', function($content, $who = 'Someone') {
	return "{$who} say: \"{$content}\"";
}, null, 2);