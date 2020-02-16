<?php
/**
 * Returns CSS for the color schemes, @return string Color scheme CSS.
 */
function business_ecommerce_get_theme_css( ) {

	/* fonts */
	
	$header_font = get_theme_mod('header_font', 'Roboto');
	$body_font = get_theme_mod('body_font', 'PT Sans');
	
	/* colors */
	
	$colors['background_color'] = get_theme_mod('background_color', '#ffffff');
	$colors['page_background_color'] = get_theme_mod('page_background_color', '#ffffff');
	$colors['link_color'] = get_theme_mod('link_color', '#007acc');
	$colors['main_text_color'] = get_theme_mod('main_text_color', '#1a1a1a');
	$colors['header_text_color'] = get_theme_mod('header_text_color', '#ffffff');
	$colors['primary_color'] = get_theme_mod('primary_color', '#3787ef');
	
	$colors['footer_text_color'] = get_theme_mod('footer_text_color', '#242424');
	
	/* Convert main text hex color to rgba */
	$main_text_color_rgb = business_ecommerce_hex2rgb( $colors['main_text_color'] );
	$border_color = vsprintf( 'rgba( %1$s, %2$s, %3$s, 0.2)', $main_text_color_rgb );	
	$colors['border_color'] = $border_color;
	
	$header_image = esc_url(get_header_image());
	$footer_image = get_theme_mod('footer_bg_image');
	$footer_bg_color = get_theme_mod('footer_bg_color', '#fbfbfb');
	$header_bg_color = get_theme_mod('header_bg_color', '#035186');
	
	
	return "
	
	.category-navigation > ul > li > a::before {
		color:".$colors['primary_color'].";	
	}
	
	.category-navigation > ul > li > a {
		color:unset;	
	}	
	
	.product-wrapper .badge-wrapper .onsale,
	.woocommerce a.add_to_cart_button, 
	.woocommerce a.add_to_cart_button:focus, 
	.woocommerce a.product_type_grouped, 
	.woocommerce a.product_type_external, 
	.woocommerce a.product_type_simple, 
	.woocommerce a.product_type_variable, 
	.woocommerce button.button.alt, 
	.woocommerce a.button, 
	.woocommerce button.button, 
	.woocommerce a.button.alt, 
	.woocommerce #respond input#submit, 
	.woocommerce .widget_price_filter .price_slider_amount .button {
		background-color: ".$colors['primary_color'].";
		color: #fff;
	}
	
	.add_to_cart_button {
		background-color: ".$colors['primary_color'].";
		color: #FFF !important;
	}	
	
	.site-header { 
		background-image: url(".$header_image.");
		background-color: ".$header_bg_color.";
		background-size: cover;
		background-position: center top;
		box-shadow: 0 1px 1px #eee;					
	}
	
	/* #site-navigation.sticky-nav {
		background-color: ".$header_bg_color.";
	} */
		
	.site-footer {
		background-image: url(".$footer_image.");
		background-color: ".$footer_bg_color.";
		background-size: cover;
		background-position: center bottom;
		border-top: 3px solid ".$colors['primary_color']."		
	}
	
	.footer-text .widget-title, 
	.footer-text a, 
	.footer-text p,
	.footer-text caption, 
	.footer-text li,
	.footer-text h1,
	.footer-text h2,
	.footer-text h3,
	.footer-text h4,
	.footer-text h5,
	.footer-text h6,
	.footer-text .social-navigation a {
		color: ".$colors['footer_text_color'].";
	}
	
	
	.footer-text .social-navigation a, 
	.footer-text th, 
	.footer-text td,	
	.footer-text .widget_calendar th,
	.footer-text .widget_calendar td, 
	.footer-text table {
		border-color: ".$colors['footer_text_color'].";
		color: ".$colors['footer_text_color'].";
	}
	
	/* slider button */
	
	.start-button {
		background-color: ".$colors['primary_color'].";
		border: 1px solid ".$colors['primary_color'].";
	
	}
	a.start-button:hover,
	a.start-button:focus {
		color: ".$colors['primary_color'].";
		border: 1px solid ".$colors['primary_color'].";
	}
	
	.carousel-indicators li.active {
    	background-color:  ".$colors['primary_color'].";
	}

	/* Background Color */
	body {
		background-color: ".$colors['background_color'].";
	}
	
	/* Heaader text Color */	
	.site-title a,
	.site-description,
	.site-description,
	.main-navigation ul a,
	.dropdown-toggle,
	.menu-toggle,
	.menu-toggle.toggled-on,
	.dropdown-toggle:after,
	.site-header-main .contact-info a.tel-link,
	.site-header-main .contact-info  a.email-link,
	.site-header-main .contact-info,
	.site-header-main .contact-info .fa,
	.site-header-main .social-navigation a
	{
		color: ".$colors['header_text_color'].";
	}
	
	.hero-content a, 
	.hero-content p,
	.hero-content h1,
	.hero-content h2,
	.hero-content h3,
	.hero-content h4,
	.hero-content h5,
	.hero-content h6,
	.hero-content span{
		color: ".$colors['header_text_color'].";
	}
	
	.menu-toggle {
		border-color: ".$colors['header_text_color'].";
	}	

	/* Page Background Color */
	.site {
		background-color: ".$colors['page_background_color'].";
	}

	mark,
	button,
	button[disabled]:hover,
	button[disabled]:focus,
	input[type='button'],
	input[type='button'][disabled]:hover,
	input[type='button'][disabled]:focus,
	input[type='reset'],
	input[type='reset'][disabled]:hover,
	input[type='reset'][disabled]:focus,
	input[type='submit'],
	input[type='submit'][disabled]:hover,
	input[type='submit'][disabled]:focus,
	.menu-toggle.toggled-on:hover,
	.menu-toggle.toggled-on:focus,
	.pagination .prev,
	.pagination .next,
	.pagination .prev:hover,
	.pagination .prev:focus,
	.pagination .next:hover,
	.pagination .next:focus,
	.pagination .nav-links:before,
	.pagination .nav-links:after,
	.widget_calendar tbody a,
	.widget_calendar tbody a:hover,
	.widget_calendar tbody a:focus,
	a.comment-reply-link:hover,
	a.comment-reply-link:focus,
	a.comment-reply-link,
	.page-links a,
	.page-links a:hover,
	.page-links a:focus {
		color: ".$colors['page_background_color'].";
	}

	/* Link Color */
	.menu-toggle:hover,
	.menu-toggle:focus,
	a,
	.main-navigation a:hover,
	.main-navigation a:focus,
	.main-navigation.sticky-nav a:hover,
	.main-navigation.sticky-nav a:focus,	
	.dropdown-toggle:hover,
	.dropdown-toggle:focus,
	.social-navigation a:hover:before,
	.social-navigation a:focus:before,
	.post-navigation a:hover .post-title,
	.post-navigation a:focus .post-title,
	.tagcloud a:hover,
	.tagcloud a:focus,
	.site-branding .site-title a:hover,
	.site-branding .site-title a:focus,
	.entry-title a:hover,
	.entry-title a:focus,
	.entry-footer a:hover,
	.entry-footer a:focus,
	.comment-metadata a:hover,
	.comment-metadata a:focus,
	.pingback .comment-edit-link:hover,
	.pingback .comment-edit-link:focus,
	.required,
	.site-info a:hover,
	.site-info a:focus {
		color: ".$colors['link_color'].";
	}

	mark,
	button:hover,
	button:focus,
	input[type='button']:hover,
	input[type='button']:focus,
	input[type='reset']:hover,
	input[type='reset']:focus,
	input[type='submit']:hover,
	input[type='submit']:focus,
	.pagination .prev:hover,
	.pagination .prev:focus,
	.pagination .next:hover,
	.pagination .next:focus,
	.widget_calendar tbody a,
	a.comment-reply-link,
	.page-links a:hover,
	.page-links a:focus {
		background-color: ".$colors['link_color'].";
	}

	input[type='date']:focus,
	input[type='time']:focus,
	input[type='datetime-local']:focus,
	input[type='week']:focus,
	input[type='month']:focus,
	input[type='text']:focus,
	input[type='email']:focus,
	input[type='url']:focus,
	input[type='password']:focus,
	input[type='search']:focus,
	input[type='tel']:focus,
	input[type='number']:focus,
	textarea:focus,
	.tagcloud a:hover,
	.tagcloud a:focus,
	.menu-toggle:hover,
	.menu-toggle:focus {
		border-color: ".$colors['link_color'].";
	}

	/* Main Text Color */
	body,
	blockquote cite,
	blockquote small,
	.main-navigation a,
	.social-navigation a,
	.post-navigation a,
	.pagination a:hover,
	.pagination a:focus,
	.widget-title a,
	.entry-title a,
	.page-links > .page-links-title,
	.comment-author,
	.comment-reply-title small a:hover,
	.comment-reply-title small a:focus {
		color: ".$colors['main_text_color'].";
	}

	blockquote,
	.menu-toggle.toggled-on,
	.menu-toggle.toggled-on:hover,
	.menu-toggle.toggled-on:focus,
	.post-navigation,
	.post-navigation div + div,
	.pagination,
	.widget,
	.page-header,
	.page-links a,
	.comments-title,
	.comment-reply-title {
		border-color: ".$colors['main_text_color'].";
	}

	button,
	button[disabled]:hover,
	button[disabled]:focus,
	input[type='button'],
	input[type='button'][disabled]:hover,
	input[type='button'][disabled]:focus,
	input[type='reset'],
	input[type='reset'][disabled]:hover,
	input[type='reset'][disabled]:focus,
	input[type='submit'],
	input[type='submit'][disabled]:hover,
	input[type='submit'][disabled]:focus,
	.menu-toggle.toggled-on,
	.menu-toggle.toggled-on:hover,
	.menu-toggle.toggled-on:focus,
	.pagination:before,
	.pagination:after,
	.pagination .prev,
	.pagination .next,
	.comment-reply-link,	
	.page-links a {
		background-color: ".$colors['primary_color'].";
	}
	

	/* main text color 2 */
	body:not(.search-results) .entry-summary {
		color: ".$colors['main_text_color'].";
	}

	/**
	 * IE8 and earlier will drop any block with CSS3 selectors.
	 * Do not combine these styles with the next block.
	 */

	blockquote,
	.post-password-form label,
	a:hover,
	a:focus,
	a:active,
	.post-navigation .meta-nav,
	.image-navigation,
	.comment-navigation,
	.widget_recent_entries .post-date,
	.widget_rss .rss-date,
	.widget_rss cite,
	.author-bio,
	.entry-footer,
	.entry-footer a,
	.sticky-post,
	.taxonomy-description,
	.entry-caption,
	.comment-metadata,
	.pingback .edit-link,
	.comment-metadata a,
	.pingback .comment-edit-link,
	.comment-form label,
	.comment-notes,
	.comment-awaiting-moderation,
	.logged-in-as,
	.form-allowed-tags,
	.wp-caption .wp-caption-text,
	.gallery-caption,
	.widecolumn label,
	.widecolumn .mu_register label {
		color: ".$colors['main_text_color'].";
	}

	.widget_calendar tbody a:hover,
	.widget_calendar tbody a:focus {
		background-color: ".$colors['main_text_color'].";
	}
	
	#secondary .widget .widget-title {
		border-bottom: 2px solid ".$colors['primary_color'].";
	}


	/* Border Color */
	fieldset,
	pre,
	abbr,
	acronym,
	table,
	th,
	td,
	input[type='date'],
	input[type='time'],
	input[type='datetime-local'],
	input[type='week'],
	input[type='month'],
	input[type='text'],
	input[type='email'],
	input[type='url'],
	input[type='password'],
	input[type='search'],
	input[type='tel'],
	input[type='number'],
	textarea,
	.main-navigation .primary-menu,
	.social-navigation a,
	.image-navigation,
	.comment-navigation,
	.tagcloud a,
	.entry-content,
	.entry-summary,
	.page-links a,
	.page-links > span,
	.comment-list article,
	.comment-list .pingback,
	.comment-list .trackback,
	.no-comments,
	.widecolumn .mu_register .mu_alert {
		border-color: ".$colors['main_text_color']."; /* Fallback for IE7 and IE8 */
		border-color: ".$colors['border_color'].";
	}

	hr, code {
		background-color: ".$colors['main_text_color']."; /* Fallback for IE7 and IE8 */
		background-color: ".$colors['border_color'].";
	}
	
	@media screen and (max-width: 56.875em) {
		.main-navigation ul ul a {
			color: ".$colors['header_text_color'].";
		}
		
		.main-navigation li {
			border-top: 1px solid ".$colors['header_text_color'].";
		}
	}

	@media screen and (min-width: 56.875em) {
		.main-navigation li:hover > a,
		.main-navigation li.focus > a {
			color: ".$colors['link_color'].";
			background-color: #fff;
			border-radius: 5px;
		}
		
		.main-navigation li {
			border-color: ".$colors['main_text_color']."; /* Fallback for IE7 and IE8 */
			border-color: ".$colors['border_color'].";
		}		

		.main-navigation ul ul,
		.main-navigation ul ul li {
			
		}

		.main-navigation ul ul:before {
			border-top-color: ".$colors['border_color'].";
			border-bottom-color: ".$colors['border_color'].";
		}

		.main-navigation ul ul li {
			
		}

		.main-navigation ul ul:after {

		}
	}
	
	
	/*
	 * Google Font CSS 
	 */
 
	h1,
	h2,
	h3,
	h4,
	h5,
	h6,
	
	.site-title a,

	
	button,
	button[disabled]:hover,
	button[disabled]:focus,
	input[type='button'],
	input[type='button'][disabled]:hover,
	input[type='button'][disabled]:focus,
	input[type='reset'],
	input[type='reset'][disabled]:hover,
	input[type='reset'][disabled]:focus,
	input[type='submit'],
	input[type='submit'][disabled]:hover,
	input[type='submit'][disabled]:focus,
	
	.post-password-form label,	
	.main-navigation,
	.post-navigation,
	.post-navigation .post-title,
	.pagination,	
	.image-navigation,
	.comment-navigation,	
	.site .skip-link,	
	.widget_recent_entries .post-date,	
	.widget_rss .rss-date,
	.widget_rss cite,	
	.tagcloud a,	
	.page-links,	
	.comments-title,
	.comment-reply-title,	
	.comment-metadata,
	.pingback .edit-link,	
	.comment-reply-link,	
	.comment-form label,	
	.no-comments,	
	.site-footer .site-title:after,	
	.site-footer span[role=separator],	
	.widecolumn label,
	.widecolumn .mu_register label {
 		font-family : ".$header_font.", Sans serif;	
	} 
	
	html,
	.hero-content h1,
	.hero-content h2 {
		font-family: ".$body_font.", Sans Serif;
	}	
 	

";

}


/**
 *
 * The template generates the css dynamically for instant display in the
 * Customizer preview.
 *
 */
function business_ecommerce_css_template() {
	?>
	<script type="text/html" id="tmpl-business-ecommerce-css-scheme">
		<?php echo wp_strip_all_tags(business_ecommerce_get_theme_css() ); ?>
	</script>
	<?php
}
add_action( 'customize_controls_print_footer_scripts', 'business_ecommerce_css_template' );
