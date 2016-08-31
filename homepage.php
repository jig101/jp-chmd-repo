<?php
/**
 * Template Name: Home Page Template
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

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<?php 
			$args = array('post_type' => 'page','post__in' => array(526,17,13));
			$the_query = new WP_Query( $args ); ?>

			<?php if ( $the_query->have_posts() ) : ?>

				<!-- pagination here -->
			<div class="container">
			<div class="site-content-hm row">
				<!-- the loop -->
				<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
				<div class="col-md-4">
					<h2 class="text-center"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
					<?php if ( has_post_thumbnail() ) : ?>
			
						<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
						<?php the_post_thumbnail( 'medium' ,array( 'class'	=> "img-responsive f-images")); ?>
						</a>
					<?php endif; ?>
					<div class="text-justify well"><?php echo the_excerpt(); ?>					
						<a class="btn btn-default read-more text-right" href="<?php the_permalink(); ?>" title="<?php the_title_attribute();?>" role="button">Read More..</a>
</div>
				</div>
				<?php endwhile; ?>
				<!-- end of the loop -->
			</div>
			</div>
				<!-- pagination here -->

				<?php wp_reset_postdata(); ?>

			<?php else : ?>
				<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
			<?php endif; 
			
			$args1 = new WP_Query( array( 'post_type' => 'post','post_status' => 'published' ) );

			$the_query1 = new WP_Query( $args1 ); ?>

			<?php if ( $the_query1->have_posts() ) : ?>

				<!-- pagination here -->
			<div class="container">
			<div class="site-side-hm row">
				<h2 class="text-center"><a herf="#">Contact us for a appointment.</a></h2>	
			  	<div class="col-xs-0 col-md-4"></div>
			  	<div class="col-xs-12 col-md-4 well"><?php echo do_shortcode('[createFooterForm]' ); ?></div>
			  	<div class="col-xs-0 col-md-4"></div>
			</div>
			</div>
			<div class="container">
			<div class="site-side-hm row">  	
				<h2 class="text-center"><a herf="#">Recent Posts</a></h2>
				<!-- the loop -->
				<?php while ( $the_query1->have_posts() ) : $the_query1->the_post(); ?>
				<div class="col-md-12">
					<h3 class="text-left"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
					<?php if ( has_post_thumbnail() ) : ?>
			
						<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
						<?php the_post_thumbnail( 'small' ,array( 'class'	=> "img-responsive f-images")); ?>
						</a>
					<?php endif; ?>
					<div class="text-justify well"><?php echo the_excerpt(); ?>					
						<a class="btn btn-default read-more text-right" href="<?php the_permalink(); ?>" title="<?php the_title_attribute();?>" role="button">Read More..</a>
					</div>
				</div>
				<?php endwhile; ?>
				<!-- end of the loop -->
			</div>
			</div>
				<!-- pagination here -->

				<?php wp_reset_postdata(); ?>

			<?php else : ?>
				<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
			<?php endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
