<?php

business_ecommerce_product_slider();

function business_ecommerce_product_slider(){

	$category = get_theme_mod('product_slider_category', 0);
	$max_height = get_theme_mod('product_slider_height', '400');
	$operator = 'IN';
	$product_args = array();
	$operator ='AND';
	$query_args = array ();
	
	if( $category == -1 ){
		$query_args = array ( 'post_type' => 'product', 'posts_per_page'=> 10 );
	} else {
		$query_args = array ( 'post_type' => 'product',	'posts_per_page'=> 10,	
								'tax_query' => array( array( 'taxonomy' => 'product_cat',
															 'terms' => $category,
															 'operator' => $operator )));		
	}
	
	$loop = new WP_Query($query_args );
	
	$i = 1;
	$items = array();
	
		global $business_ecommerce_slider_id ;
		$business_ecommerce_slider_id += 1;		
		$carousal_id = 'product-carousal-'.$business_ecommerce_slider_id;
		//carousal begin
		echo '<div id="'.esc_attr($carousal_id).'" class="carousel slide" data-ride="carousel" data-interval="3000" style="max-height:'.absint($max_height).'px" >';
		echo '<div class="carousel-inner">';
		
		$i = 0;
		$items = array();
		
		while( $loop->have_posts() ) : $loop->the_post();
	
			global $product;		  
			$thumb_id = get_post_thumbnail_id(get_the_ID());	
			$image_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
			
			if(!$image_url) {
				$image_url = get_template_directory_uri().'/images/no-image.png';
			}
						
			$alt = get_post_meta($thumb_id, '_wp_attachment_image_alt', true);
			$link = get_permalink();
			$title = get_the_title();
			$content = get_the_excerpt();			
			$price = $product->get_price_html();
			
			$product_meta = true;
			
			$active = '';
			if ( $i < 1 ) $active = 'active';
	
			echo '<div class="item '.esc_html($active).' ">'; 
			$active = '';
			 echo '<div>';
			  echo '<div class="row"><a href="'.esc_url($link).'"><img class="img-responsive" src="'.esc_url($image_url).'" alt="Image" style="width:100%;max-height:'.absint($max_height).'px" ></a></div>';
			 
			   if( $product_meta ) {
				   echo '<div class="product-slider-caption on-left">';
						echo '<a href="'.esc_url($link).'">';
							echo '<div class="caption-heading">';
								echo '<h3 class="cap-title">'.esc_html($title).'</h3>';
							echo '</div>';
						echo '</a>';
						
						echo '<div class="price">'.wp_kses_post($price).'</div>';
				
						echo '<div class="content-desc">';
							echo '<h4><strong><em>'.wp_kses_post($content).'</em></strong></h4>';
						echo '</div>';
						
					echo '</div>';
				}
			echo  '</div>';
			echo '</div>';
				//item end			
			array_push($items, $i);
			$i++;
		endwhile;
	
			//indicators, navigation
			if($i>1) {	
		
			echo '<ul class="carousel-navigation ">
				   <li><a class="carousel-prev"  href="#'.esc_attr($carousal_id).'" data-slide="prev"></a></li>
				   <li><a class="carousel-next"  href="#'.esc_attr($carousal_id).'" data-slide="next"></a></li>
				  </ul>';	
			
				
				$active = 'active';				
				echo '<div class=row><ol class="custom carousel-indicators" >';
				$s = 0;
				foreach ($items as $item) {
					echo '<li data-target="#'.esc_attr($carousal_id).'" data-slide-to="'.absint($s).'" class="'.esc_attr($active).'" ></li>';
					$active = '';
					$s++;
				}
				echo '</ol></div>';
				//indicators end
			}//indicators, navigation
					
			echo '</div>';
			echo '</div>';
			//carousal end
	wp_reset_postdata();

}
	
