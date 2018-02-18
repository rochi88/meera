<?php defined( 'ABSPATH' ) OR die( 'This script cannot be accessed directly.' ); ?>

<?php global $meera_options_proya, $wp_query, $meeraIconCollections; ?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<?php
	if (isset($_SERVER['HTTP_USER_AGENT']) && (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== false)) {
		echo('<meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">');
	} ?>

	<title><?php wp_title(''); ?></title>

	<link rel="profile" href="#" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<link rel="shortcut icon" type="image/x-icon" href="<?php //echo esc_url($qode_options_proya['favicon_image']); ?>">
	<link rel="apple-touch-icon" href="<?php //echo esc_url($qode_options_proya['favicon_image']); ?>"/>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?> >
