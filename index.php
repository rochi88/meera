<?php defined( 'ABSPATH' ) OR die( 'This script cannot be accessed directly.' );


<?php get_header(); ?>

<?php
global $wp_query;
$id = $wp_query->get_queried_object_id();
$sidebar = get_post_meta($id, "qode_show-sidebar", true);

if ( get_query_var('paged') ) { $paged = get_query_var('paged'); }
elseif ( get_query_var('page') ) { $paged = get_query_var('page'); }
else { $paged = 1; }

$blog_hide_comments = "";
if (isset($qode_options_proya['blog_hide_comments']))
	$blog_hide_comments = $qode_options_proya['blog_hide_comments'];

if(isset($qode_options_proya['blog_page_range']) && $qode_options_proya['blog_page_range'] != ""){
	$blog_page_range = $qode_options_proya['blog_page_range'];
} else{
	$blog_page_range = $wp_query->max_num_pages;
}
?>

<div class="container">

</div><!-- /.container -->

<?php get_footer(); ?>
