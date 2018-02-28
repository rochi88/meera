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
	  </div><!-- #content -->

    <footer class="site-footer">
      <div class="site-info">
      <a href="<?php echo esc_url( __( 'https://wordpress.org/', 'meera' ) ); ?>"><?php
      /* translators: %s: CMS name, i.e. WordPress. */
      printf( esc_html__( 'Proudly powered by %s', 'meera' ), 'WordPress' );
      ?></a>
      <span class="sep"> | </span>
      <?php
      /* translators: 1: Theme name, 2: Theme author. */
      printf( esc_html__( 'Theme: %1$s by %2$s.', 'meera' ), 'meera', '<a href="https://#">Meera</a>' );
      ?>
      </div><!-- .site-info -->
    </footer>
  </div> <!-- closes <div class=container"> -->

<?php wp_footer(); ?>
</body>
</html>
