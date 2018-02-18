<?php

function meera_enqueues() {

	/* Styles */

	wp_register_style('bootstrap-css', 'https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta/css/bootstrap.min.css', false, '4.0.0-beta', null);
	wp_enqueue_style('bootstrap-css');

	wp_register_style('font-awesome-css', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css', false, '4.7.0', null);
	wp_enqueue_style('font-awesome-css');

  	wp_register_style('meera-css', get_template_directory_uri() . '/assets/css/meera.css', false, null);
	wp_enqueue_style('meera-css');

	/* Scripts */

	wp_enqueue_script( 'jquery' );
	/* Note: this enqueue above uses WordPress's onboard jQuery. You can enqueue other pre-registered scripts from WordPress too. See:
	https://developer.wordpress.org/reference/functions/wp_enqueue_script/#Default_Scripts_Included_and_Registered_by_WordPress */

  	wp_register_script('modernizr',  'https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js', false, '2.8.3', true);
	wp_enqueue_script('modernizr');

	wp_register_script('popper',  'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js', false, '1.11.0', true);
	wp_enqueue_script('popper');

  	wp_register_script('bootstrap-js', 'https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta/js/bootstrap.min.js', false, '4.0.0-beta', true);
	wp_enqueue_script('bootstrap-js');

	wp_register_script('meera-js', get_template_directory_uri() . '/assets/js/meera.js', false, null, true);
	wp_enqueue_script('meera-js');

	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}
}
add_action('wp_enqueue_scripts', 'meera_enqueues', 100);
