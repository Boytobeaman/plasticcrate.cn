<?php
/**
 * Business Ecommerce Customizer functionality
 */

if ( ! function_exists( 'business_ecommerce_header_style' ) ) :
	/**
	 * Styles the header text displayed on the site.
	 *
	 * Create your own business_ecommerce_header_style() function to override in a child theme.
	 *
	 * @see business_ecommerce_custom_header_and_background().
	 */
	function business_ecommerce_header_style() {
		// If the header text option is untouched, let's bail.
		if ( display_header_text() ) {
			return;
		}

		// If the header text has been hidden.
		?>
		<style type="text/css" id="business-ecommerce-header-css">
		.site-branding {
			margin: 0 auto 0 0;
		}

		.site-branding .site-title,
		.site-description {
			clip: rect(1px, 1px, 1px, 1px);
			position: absolute;
		}
		</style>
		<?php
	}
endif; // business_ecommerce_header_style

/**
 * Adds postMessage support for site title and description for the Customizer.
 * @param WP_Customize_Manager $wp_customize The Customizer object.
 */
function business_ecommerce_customize_register( $wp_customize ) {

	$wp_customize->get_setting( 'blogname' )->transport        = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial(
			'blogname',
			array(
				'selector'            => '.site-title a',
				'container_inclusive' => false,
				'render_callback'     => 'business_ecommerce_customize_partial_blogname',
			)
		);
		$wp_customize->selective_refresh->add_partial(
			'blogdescription',
			array(
				'selector'            => '.site-description',
				'container_inclusive' => false,
				'render_callback'     => 'business_ecommerce_customize_partial_blogdescription',
			)
		);
	}
	
	/***************** 
	 * Theme options *
	 ****************/

	$wp_customize->add_panel( 'theme_options' , array(
		'title'      => __( 'Theme Options', 'business-ecommerce' ),
		'priority'   => 1,
	) );
	
	// header and footer
	$wp_customize->add_section( 'theme_header' , array(
		'title'      => __( 'Theme Header', 'business-ecommerce' ),
		'priority'   => 1,
		'panel' => 'theme_options',
	) );
	
	
	//top banner
	$wp_customize->add_setting('top_banner_page' , array(
		'default'    => 0,
		'sanitize_callback' => 'absint',
	));

	$wp_customize->add_control('top_banner_page' , array(
		'label' => __('Select Top banner (Page)', 'business-ecommerce' ),
		'section' => 'theme_header',
		'type'=> 'dropdown-pages',
	) );
		

	//add settings page
	require get_template_directory() . '/inc/slider-settings.php';	
	
	$wp_customize->add_section( 'theme_footer' , array(
		'title'      => __( 'Theme Footer', 'business-ecommerce' ),
		'priority'   => 3,
		'panel' => 'theme_options',
	) );
			
	//hero content 
	$wp_customize->add_setting('hero_page' , array(
		'default'    => 0,
		'sanitize_callback' => 'absint',
	));

	$wp_customize->add_control('hero_page' , array(
		'label' => __('Select Hero Content (Page)', 'business-ecommerce' ),
		'section' => 'theme_header',
		'type'=> 'dropdown-pages',
	) );
	
	
	
	// Add primary color setting and control.
	$wp_customize->add_setting(
		'primary_color',
		array(
			'default'           => '#3787ef',
			'sanitize_callback' => 'sanitize_hex_color',
			'transport'         => 'refresh',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'primary_color',
			array(
				'label'   => __( 'Theme Primary Color', 'business-ecommerce' ),
				'section' => 'colors',
			)
		)
	);

	// Add page background color setting and control.
	$wp_customize->add_setting(
		'page_background_color',
		array(
			'default'           => '#ffffff',
			'sanitize_callback' => 'sanitize_hex_color',
			'transport'         => 'refresh',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'page_background_color',
			array(
				'label'   => __( 'Page Background Color', 'business-ecommerce' ),
				'section' => 'colors',
			)
		)
	);


	// Add link color setting and control.
	$wp_customize->add_setting(
		'link_color',
		array(
			'default'           => '#007acc',
			'sanitize_callback' => 'sanitize_hex_color',
			'transport'         => 'refresh',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'link_color',
			array(
				'label'   => __( 'Link Color', 'business-ecommerce' ),
				'section' => 'colors',
			)
		)
	);

	// Add main text color setting and control.
	$wp_customize->add_setting(
		'main_text_color',
		array(
			'default'           => '#1a1a1a',
			'sanitize_callback' => 'sanitize_hex_color',
			'transport'         => 'refresh',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'main_text_color',
			array(
				'label'   => __( 'Main Text Color', 'business-ecommerce' ),
				'section' => 'colors',
			)
		)
	);

	// Add secondary text color setting and control.
	$wp_customize->add_setting(
		'header_text_color',
		array(
			'default'           => '#ffffff',
			'sanitize_callback' => 'sanitize_hex_color',
			'transport'         => 'refresh',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'header_text_color',
			array(
				'label'   => __( 'Headet Text Color', 'business-ecommerce' ),
				'section' => 'theme_header',
			)
		)
	);
	
	// Header text colour
	$wp_customize->add_setting(
		'header_bg_color',
		array(
			'default'           => '#035186',
			'sanitize_callback' => 'sanitize_hex_color',
			'transport'         => 'refresh',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'header_bg_color',
			array(
				'label'   => __( 'Header Background Color', 'business-ecommerce' ),
				'section' => 'theme_header',
			)
		)
	);
	
	//header tel
	$wp_customize->add_setting('header_telephone' , array(
		'default'    => '1-000-123-4567',
		'sanitize_callback' => 'sanitize_text_field',
	));
	
	

	$wp_customize->add_control('header_telephone' , array(
		'label' => __('Tel', 'business-ecommerce' ),
		'section' => 'theme_header',
		'type'=> 'text',
	) );
	
	
	$wp_customize->selective_refresh->add_partial( 'header_telephone', array(
		'selector' => '.contact-info',
	) );
	
	//header email
	$wp_customize->add_setting('header_email' , array(
		'default'    => 'mail@domain.com',
		'sanitize_callback' => 'sanitize_email',
	));

	$wp_customize->add_control('header_email' , array(
		'label' => __('Email', 'business-ecommerce' ),
		'section' => 'theme_header',
		'type'=> 'text',
	) );
			
	//header address
	$wp_customize->add_setting('header_address' , array(
		'default'    => __('Street, City', 'business-ecommerce'),
		'sanitize_callback' => 'sanitize_text_field',
	));

	$wp_customize->add_control('header_address' , array(
		'label' => __('Address', 'business-ecommerce' ),
		'section' => 'theme_header',
		'type'=> 'text',
	) );
	
		
	// Add footer color setting and control.
	$wp_customize->add_setting(
		'footer_text_color',
		array(
			'default'           => '#242424',
			'sanitize_callback' => 'sanitize_hex_color',
			'transport'         => 'refresh',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'footer_text_color',
			array(
				'label'   => __( 'Footer Text Color', 'business-ecommerce' ),
				'section' => 'theme_footer',
			)
		)
	);
	
	// layout section 

	$wp_customize->add_section( 'layout_section' , array(
		'title'      => __('Layout', 'business-ecommerce' ),			 
		'description'=> __('Chanege site layout to fluid / box mode', 'business-ecommerce' ),
		'panel' => 'theme_options',
	));
 
	$wp_customize->add_setting( 'box_layout_mode' , array(
		'default'    => false,
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'business_ecommerce_sanitize_checkbox',
	));

	$wp_customize->add_control('box_layout_mode' , array(
		'label' => __('Set Box Layout mode','business-ecommerce' ),
		'section' => 'layout_section',
		'type'=> 'checkbox',
	));
	
	// sidebar position
	$wp_customize->add_setting( 'woo_sidebar_position' , array(
		'default'    => 'right',
		'sanitize_callback' => 'business_ecommerce_sanitize_select',
	));

	$wp_customize->add_control('woo_sidebar_position' , array(
		'label' => __('WooCommerce Sidebar position', 'business-ecommerce' ),
		'section' => 'layout_section',
		'type' => 'select',
		'choices' => array(
			'right' => __('Right', 'business-ecommerce' ),
			'left' => __('Left', 'business-ecommerce' ),
			'none' => __('No Sidebar', 'business-ecommerce' ),
		),
	) );
	
	// Add footer background color setting and control.
	$wp_customize->add_setting(
		'footer_bg_color',
		array(
			'default'           => '#fbfbfb',
			'sanitize_callback' => 'sanitize_hex_color',
			'transport'         => 'refresh',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'footer_bg_color',
			array(
				'label'   => __( 'Footer Background Color', 'business-ecommerce' ),
				'section' => 'theme_footer',
			)
		)
	);
	
	// footer section image
	$wp_customize->add_setting( 'footer_bg_image' , 
		array(
			'default' 		=> '',
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'esc_url_raw',
		)
	);
	
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize , 'footer_bg_image' ,
		array(
			'label'          => __( 'Footer Background Image', 'business-ecommerce' ),
			'description'	=> __('Upload your background image', 'business-ecommerce'),
			'settings'  => 'footer_bg_image',
			'section'        => 'theme_footer',
		))
	);
	
	// footer copyright text
	$wp_customize->add_setting( 'footer_text' , array(
		'default'    => __("Copyright Text", 'business-ecommerce'),
		'sanitize_callback' => 'wp_kses_post',
	));	
	
	$wp_customize->add_control('footer_text' , array(
		'label' => __('Footer Bottom Text', 'business-ecommerce'),
		'section' => 'theme_footer',
		'type'=>'textarea',
	) );
	
	$wp_customize->selective_refresh->add_partial( 'footer_text', array(
		'selector' => '.site-info',
	) );			
	
	
//end of settings	
}
add_action( 'customize_register', 'business_ecommerce_customize_register', 11 );

/**
 * Render the site title for the selective refresh partial.
 */
function business_ecommerce_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @since Business Ecommerce 1.2
 * @see business_ecommerce_customize_register()
 *
 * @return void
 */
function business_ecommerce_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Enqueues front-end CSS for color scheme.
 * @see wp_add_inline_style()
 */
function business_ecommerce_color_scheme_css() {

	$scheme_css = business_ecommerce_get_theme_css();

	wp_add_inline_style( 'business-ecommerce-style', $scheme_css );
}
add_action( 'wp_enqueue_scripts', 'business_ecommerce_color_scheme_css' );


/**
 * Binds JS handlers to make the Customizer preview reload changes asynchronously.
 *
 *
 */
function business_ecommerce_customize_preview_js() {
	wp_enqueue_script( 'business-ecommerce-customize-preview', get_template_directory_uri() . '/js/customize-preview.js', array( 'customize-preview' ), '20160816', true );
}
add_action( 'customize_preview_init', 'business_ecommerce_customize_preview_js' );

/**
 * Theme options
 */

require get_template_directory() . '/inc/colors-fonts.php';

/*
 * Get product categories
 */

$business_ecommerce_product_categories = business_ecommerce_get_product_categories();

function business_ecommerce_get_product_categories(){

	$args = array(
			'taxonomy' => 'product_cat',
			'orderby' => 'date',
			'order' => 'ASC',
			'show_count' => 1,
			'pad_counts' => 0,
			'hierarchical' => 0,
			'title_li' => '',
			'hide_empty' => 1,
	);

	$categories = get_categories($args);

	$arr = array();
	$arr['0'] = esc_html__('-Select Category-', 'business-ecommerce') ;
	foreach($categories as $category){
		$arr[$category->term_id] = $category->name;
	}
	return $arr;
}

