<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package jp-cmhd
 */

get_header(); ?>
<div class="container">
<div class="site-main-content row ">
	<div class="col-md-8">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'template-parts/content', 'single' ); ?>

			<?php the_post_navigation(); ?>

			<?php
				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;
			?>

		<?php endwhile; // End of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->
</div>
<div class="col-md-4">
			<h3>Write to us</h3>
			<?php echo do_shortcode('[createFooterForm]' ); ?>
			<h3>Call us</h3>
			<p><a href="tel:+447426890442"><button type="button" class="btn btn-primary">Call Us 07426890442</button></a></p>
</div>
</div>
</div>
<?php get_footer(); ?>
