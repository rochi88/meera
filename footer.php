<?php defined( 'ABSPATH' ) OR die( 'This script cannot be accessed directly.' ); 

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package meera
 */

?>

		<footer class="section-full">
			<div class="container">
				<div class="footer-bottom d-flex justify-content-between align-items-center">
				<p><a href="<?php echo esc_url( __( 'https://wordpress.org/', 'meera' ) ); ?>">
				<?php
				/* translators: %s: CMS name, i.e. WordPress. */
				printf( esc_html__( 'Proudly powered by %s', 'meera' ), 'WordPress' );
				?></a> 
				<span> | </span>
				<?php
				/* translators: 1: Theme name, 2: Theme author. */
				printf( esc_html__( 'Theme: %1$s by %2$s.', 'meera' ), 'meera', '<a href="http://raisul.me/">raisul.me</a>' );
				?></p>
					<div class="footer-social d-flex align-items-center">
						<a href="#"><i class="fa fa-facebook"></i></a>
						<a href="#"><i class="fa fa-twitter"></i></a>
						<a href="#"><i class="fa fa-dribbble"></i></a>
						<a href="#"><i class="fa fa-behance"></i></a>
					</div>
				</div>
			</div>
		</footer>
<?php wp_footer(); ?>
</body>
</html>
