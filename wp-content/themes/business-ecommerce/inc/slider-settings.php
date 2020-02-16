<?php

/* Post Slider Settings */

		$wp_customize->add_section( 'slider_section' , array(
			'title'      => __('Home Slider', 'business-ecommerce' ),			
			'panel' => 'theme_options',
			'priority'   => 1,
		) );
		
		$wp_customize->add_setting( 'slider_in_home_page' , array(
		'default'    => 0,
		'sanitize_callback' => 'business_ecommerce_sanitize_checkbox',
		));
		
		$wp_customize->add_control('slider_in_home_page' , array(
		'label' => __('Enable slider in home page','business-ecommerce' ),
		'section' => 'slider_section',
		'type'=>'checkbox',
		) );
		
	
		// post 1
		$wp_customize->add_setting( 'slider_category' , array(
		'default'    => '',
		'sanitize_callback' => 'business_ecommerce_sanitize_select',
		));

		$wp_customize->add_control('slider_category' , array(
		'label' => __('Select Slider Post Category','business-ecommerce' ),
		'section' => 'slider_section',
		'type'=>'select',
		'choices'=> business_ecommerce_get_post_categories(),
		) );
		
		$wp_customize->selective_refresh->add_partial( 'slider_category', array(
			'selector' => '#main_slider .carousel-caption',
		) );				
	
		// slider animation type
		$wp_customize->add_setting( 'slider_animation_type' , array(
		'default'    => 'slide',
		'sanitize_callback' => 'business_ecommerce_sanitize_select',
		));

		$wp_customize->add_control('slider_animation_type' , array(
		'label' => __('Slider Animation','business-ecommerce' ),
		'section' => 'slider_section',
		'type'=>'select',
		'choices'=>array(
			'slide'=> __('Slide', 'business-ecommerce' ),
			'fade'=> __('Fade', 'business-ecommerce' ),
		),
		) );
		
		// slider speed
		$wp_customize->add_setting( 'slider_speed' , array(
		'default'    => 4200,
		'sanitize_callback' => 'absint',
		));

		$wp_customize->add_control('slider_speed' , array(
		'label' => __('Slider animation speed in ms','business-ecommerce' ),
		'section' => 'slider_section',
		'type'=>'number',
		) );
	
		// slider button title
		$wp_customize->add_setting( 'slider_button_text' , array(
		'default'    => '',
		'sanitize_callback' => 'sanitize_text_field',
		));

		$wp_customize->add_control('slider_button_text' , array(
		'label' => __('Slider Button text','business-ecommerce' ),
		'section' => 'slider_section',
		'type'=>'text',
		) );
		
		// slider button url
		$wp_customize->add_setting( 'slider_button_url' , array(
		'sanitize_callback' => 'esc_url_raw',
		));

		$wp_customize->add_control('slider_button_url' , array(
		'label' => __('Slider Button Link','business-ecommerce' ),
		'section' => 'slider_section',
		'type'=>'url',
		) );				
				
		// height
		$wp_customize->add_setting( 'slider_image_height' , array(
		'default'    => 500,
		'sanitize_callback' => 'sanitize_text_field',
		));

		$wp_customize->add_control('slider_image_height' , array(
		'label' => __('Slider Height','business-ecommerce' ),
		'section' => 'slider_section',
		'type'=>'number',
		) );		

		
/* Product Slider Settings */		

		$wp_customize->add_section( 'woo_section' , array(
			'title'      => __('Product Slider & Navigation', 'business-ecommerce' ),			
			'panel' => 'theme_options',
			'priority'   =>2,
		) );
		
		$wp_customize->add_setting( 'product_nav_slider_in_home_page' , array(
		'default'    => 1,
		'sanitize_callback' => 'business_ecommerce_sanitize_checkbox',
		));
		
		$wp_customize->add_control('product_nav_slider_in_home_page' , array(
		'label' => __('Enable Product Slider & Navigation in home page','business-ecommerce' ),
		'section' => 'woo_section',
		'type'=>'checkbox',
		) );
		
		// product category
		$wp_customize->add_setting( 'product_slider_category' , array(
		'default'    => '',
		'sanitize_callback' => 'business_ecommerce_sanitize_select',
		));

		$wp_customize->add_control('product_slider_category' , array(
		'label' => __('Select Product Slider Category','business-ecommerce' ),
		'section' => 'woo_section',
		'type'=>'select',
		'choices'=> business_ecommerce_get_product_categories(),
		) );
		
		// product slider height
		$wp_customize->add_setting( 'product_slider_height' , array(
		'default'    => 400,
		'sanitize_callback' => 'absint',
		));

		$wp_customize->add_control('product_slider_height' , array(
		'label' => __('Slider Max Height (px)','business-ecommerce' ),
		'section' => 'woo_section',
		'type'=>'number',
		) );				
		
