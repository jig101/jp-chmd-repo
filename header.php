<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package jp-cmhd
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<title><?php if (is_home () ){bloginfo('name');}elseif ( is_category() ){single_cat_title(); echo ' - ' ; bloginfo('name');}elseif (is_single() ){single_post_title();}elseif (is_page() ){bloginfo('name'); echo ': '; single_post_title();}else{wp_title('',true);}?></title>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<META NAME="author" CONTENT="crawleymobilehairdresser">
<META NAME="subject" CONTENT="mobile hairdresser">
<META NAME="Language" CONTENT="English">
<META NAME="Designer" CONTENT="Jiger Patel">
<META NAME="Publisher" CONTENT="JP web solutions">
<META NAME="distribution" CONTENT="Global">
<META NAME="city" CONTENT="Crawley">
<META NAME="country" CONTENT="UK">
<meta property="og:url"           content="http://www.crawleymobilehairdresser.co.uk/" />
<meta property="og:type"          content="www.crawleymobilehairdresser.co.uk" />
<meta property="og:title"         content="Mobile Hairdresser" />
<meta property="og:description"   content="Crawley Mobile Hairdresser offer Professional and Highly experienced mobile hair stylists working in Sussex and surrounding areas. Call 07426 890442" />
<meta property="og:image"         content="http://localhost/cmhd/wp-content/uploads/2015/10/crawley-and-sussex-mobile-hairdresser011.jpg" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>"><?php wp_head(); ?>

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
<!-- 	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'jp-cmhd' ); ?></a>
 -->
	<header id="masthead" class="site-header" role="banner">
		<div id="top-head-bg">
		<div class="container">
		<div class="site-quick-action row vertical-align">
		  	<div class="col-xs-7 col-md-5">
		  		Mobile Hairdresser In Crawley And Sussex Area
			</div>
			<div class="col-xs-0 col-md-3"></div>
		  	<div class="col-xs-5 col-md-4 right">	
			<a href="tel:+447426890442"><button type="button" class="btn btn-primary">Call Us 07426890442</button></a>
		  	</div>
		</div>
		</div>
		</div>
		<div id="top-head-logo-bg" class="whitebg">
		<div class="container">
		<div class="site-branding row">
			<div class="col-md-12">
			  	<div class="center-block">
			  	<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
		 		<img alt="crawley-mobile-hairdresser-logo" src="<?php echo get_template_directory_uri() . '/img/crawley-mobile-hairdresser-logo.png'?>" class="logo img-responsive" />
		 		</a>
		 		</div>
		 	</div>
		</div>
		<nav class="navbar navbar-default pinkBg">
		  <div class="container-fluid">
		    <!-- Brand and toggle get grouped for better mobile display -->
		    <div class="navbar-header">
		      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
		        <span class="sr-only">Toggle navigation</span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		      </button>
		      <a class="navbar-brand" href="#">Crawley Mobile Hairdresser</a>
		    </div>

		    <!-- Collect the nav links, forms, and other content for toggling -->
		    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1"><?php //wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) );
					wp_nav_menu( array(
					  'menu' => 'top_menu',
					  'depth' => 2,
					  'container' => false,
					  'menu_class' => 'nav navbar-nav',
					  //Process nav menu using our custom nav walker
					  'walker' => new wp_bootstrap_navwalker())
					); ?>
			<form class="navbar-form navbar-right" role="search">
		        <div class="form-group">
		          <input type="text" class="form-control" placeholder="Search">
		        </div>
		        <button type="submit" class="btn btn-default">Submit</button>
		      </form>
		<!--       <ul class="nav navbar-nav navbar-right">
		        <li><a href="#">Link</a></li>
		        <li class="dropdown">
		          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
		          <ul class="dropdown-menu">
		            <li><a href="#">Action</a></li>
		            <li><a href="#">Another action</a></li>
		            <li><a href="#">Something else here</a></li>
		            <li role="separator" class="divider"></li>
		            <li><a href="#">Separated link</a></li>
		          </ul>
		        </li>
		      </ul> -->
		    </div><!-- /.navbar-collapse -->
		  </div><!-- /.container-fluid -->
		</nav>
		</div>
		</div>
		<div class="container">
			<?php if ( is_front_page() ) : ?>
					<?php echo do_shortcode('[jp_carousel]' ); ?>
			<?php endif; ?>
		</div>	
	</header><!-- #masthead -->

	<div id="content" class="site-content">
