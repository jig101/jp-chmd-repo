<?php 
function jp_carousel_function(){
$number = 0; 
$args = array(
'post_type'              => array( 'jp_bs_post_type' ),
'post_status'            => array( 'Published' ),
'meta_query' => array(
array( 'key' => '_thumbnail_id'), //Show only posts with featured images
)
);
$JPslides = new WP_Query($args);
$jc = $JPslides->found_posts;
$number = 0; 
// Support for posts and pages and events - add others if necessary if you added more custom post types above, and change max number of slides to show if you want
	 if($JPslides->have_posts()): ?>
		<div id="jpCarousel" class="carousel slide" data-ride="carousel">
	 		<ol class="carousel-indicators">
	 			<?php while($JPslides->have_posts()) { ?>
	 			<?php 
	 			$JPslides->the_post(); 
	 			$postIdl = get_the_ID(); 
	 			$has_fetured_imagel =  has_post_thumbnail( $postIdl ); 
	 			$carousel_imagel = get_the_post_thumbnail( $postIdl, "full" );
	 			if($carousel_imagel != '' || $has_fetured_imagel){ ?>
	 			<li data-target="#jpCarousel" data-slide-to="<?php echo $number++; ?>"></li>
	 			<?php }  ?>
	 			<?php } //end while ?>
			</ol>
		  <!-- Carousel items -->
		  <div class="carousel-inner">
	 			<?php while($JPslides->have_posts()) { ?>
	 			<?php 
	 			$JPslides->the_post(); 
			  	$slider_title = '';
			  	$carousel_title = get_the_title( );
			  	$id = get_post_thumbnail_id(); 
				$carousel_image_url = wp_get_attachment_image_src($id,full); 
			  	//$carousel_image_url = wp_get_attachment_url( get_post_thumbnail_id(  $postIdl) );	

			  if($carousel_image_url != '') 
			  {
		     ?>   
		    <div class="item">
		      <img src="<?php echo $carousel_image_url[0]; ?>" alt="<?php echo $carousel_title; ?>" class="attachment-full wp-post-image">
		        <div class="carousel-caption"><a href="<?php the_content(); ?>"><?php echo $slider_title; ?></a></div>
		    </div>
		    <?php  } } ?>
		  </div>

  <!-- Carousel nav - these chevrons require the Font Awesome librar}y to be loaded. It often is with Bootstrap themes -->
  
  <!-- Controls -->
  <a class="left carousel-control" href="#jpCarousel" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#jpCarousel" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
<?php endif; wp_reset_postdata();
}
add_shortcode('jp_carousel', 'jp_carousel_function');  
//Add js to footer. Change the interval to alter how long the slides display - 4000 equals 4 seconds.
function jp_carousel_js() { ?>

<script>
jQuery(document).ready(function($){
  $("#jpCarousel .carousel-indicators li:first").addClass("active");
  $("#jpCarousel .carousel-inner .item:first").addClass("active");
   $("#jpCarousel").carousel({
  interval: 4000
  })
});
</script>
<?php
}
add_action('wp_footer', 'jp_carousel_js');

