<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package jp-cmhd
 */

get_header(); ?>
<div id="top-head-logo-bg" class="whitebg">
<div class="container">
<div class="site-main-content row ">
<div class="col-md-8">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'template-parts/content', 'page' ); ?>

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
			<div class="well">
			<?php echo do_shortcode('[createFooterForm]' ); ?>
			</div>
			<h3>Call us</h3>
			<p><a href="tel:+447426890442"><button type="button" class="btn btn-primary">Call Us 07426890442</button></a></p>
</div>
</div>
</div>
</div>
<?php get_footer(); ?>
