<?php defined( 'ABSPATH' ) OR die( 'This script cannot be accessed directly.' ); ?>

<?php
/**
 * meera functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package meera
 */

	require get_template_directory() . '/functions/cleanup.php';
	require get_template_directory() . '/functions/setup.php';
	require get_template_directory() . '/functions/enqueues.php';
	require get_template_directory() . '/functions/navbar.php';
	require get_template_directory() . '/functions/widgets.php';
	require get_template_directory() . '/functions/search-widget.php';
	require get_template_directory() . '/functions/index-pagination.php';
	require get_template_directory() . '/functions/split-post-pagination.php';
	require get_template_directory() . '/functions/feedback.php';
	require get_template_directory() . '/functions/remove-query-string.php';

	/**
 	* Custom template tags for this theme.
 	*/
	require get_template_directory() . '/functions/template-tags.php';

	/**
 * Load Jetpack compatibility file.
 */
	if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
	}
