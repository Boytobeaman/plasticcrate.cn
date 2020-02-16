<?php
/**
 * The template for displaying the header
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
	<link rel="pingback" href="<?php echo esc_url( get_bloginfo( 'pingback_url' ) ); ?>">
	<?php endif; ?>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php business_ecommerce_wp_body_open(); ?>
<?php 
if(get_theme_mod("box_layout_mode", false)) { echo '<div class="box-layout-style">'; }
?>	
<div id="page" class="site">
	<div class="site-inner">
		<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'business-ecommerce' ); ?></a>

		<?php if(get_theme_mod('top_banner_page', 0) != 0 ) { get_template_part( 'templates/banner', 'section' ); } ?>
		
		<header id="masthead" class="site-header" role="banner" >
			
			<div id="site-header-main" class="site-header-main">

			<?php get_template_part( 'templates/contact', 'section' ); ?>
			
			<?php if (class_exists('WooCommerce')): ?>
				<?php get_template_part( 'templates/woocommerce', 'header' ); ?>			
			<?php else: ?>
				<?php get_template_part( 'templates/default', 'header' ); ?>			
			<?php endif; ?>
			
			<?php if(is_front_page()): ?>
				<?php get_template_part( 'templates/hero', 'section' ); ?>
			<?php endif; ?>
			</div><!-- .site-header-main -->
			

		</header><!-- .site-header -->
		
		<?php if(is_front_page()  && get_theme_mod('slider_in_home_page' , 0)): ?>
			<?php get_template_part('templates/slider', 'section' ); ?>
		<?php endif; ?>
		
		<?php if(is_front_page()  && get_theme_mod('product_nav_slider_in_home_page' , 1)): ?>
		<br>
		<div class="container">
			<div class="row">
						
			<div class="col-md-4">					
			<?php get_template_part( 'templates/product-navigation', 'section' ); ?>
			</div>
			
			<div class="col-md-8">			
			<?php get_template_part( 'templates/product-slider', 'section' ); ?>
			</div>
			
			</div>
		</div>
		<?php endif; ?>
			
		<div id="content" class="site-content">
		

