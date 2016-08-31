<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package jp-cmhd
 */

?>

	</div><!-- #content -->
<div class="footer-bg">	
<div class="container">
	<div class="row">
		<div class="col-md-4">
			<h3>Send us a email.</h3>
			<?php echo do_shortcode('[createFooterForm]' ); ?>
		</div>
		<div class="col-md-4">
			<h3>Connect with us</h3>
			<?php dynamic_sidebar( 'footMid' ); ?>
		</div>
		<div class="col-md-4">
			<h3>Gallery</h3>
			<?php dynamic_sidebar( 'footRight' ); ?>
		</div>
	</div>
</div>
</div>
	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="container">
		<div class="site-info">
			<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'jp-cmhd' ) ); ?>"><?php printf( esc_html__( 'Proudly powered by %s', 'jp-cmhd' ), 'WordPress' ); ?></a>
			<span class="sep"> | </span>
			<?php printf( esc_html__( 'Theme: %1$s by %2$s.', 'jp-cmhd' ), 'jp-cmhd', '<a href="http://jigerpatel.co.uk/" rel="designer">jigerpatel.co.uk</a>' ); ?>
		</div><!-- .site-info -->
	</div>
	</footer><!-- #colophon -->
</div><!-- #page -->
<?php wp_footer(); ?>

</body>
</html>
