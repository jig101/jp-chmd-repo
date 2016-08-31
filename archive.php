<?php
/**
 * The template for displaying archive pages.
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

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<?php
					the_archive_title( '<h1 class="page-title">', '</h1>' );
					the_archive_description( '<div class="taxonomy-description">', '</div>' );
				?>
			</header><!-- .page-header -->

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php

					/*
					 * Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					get_template_part( 'template-parts/content', get_post_format() );
				?>

			<?php endwhile; ?>

			<?php the_posts_navigation(); ?>

		<?php else : ?>

			<?php get_template_part( 'template-parts/content', 'none' ); ?>

		<?php endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->
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
