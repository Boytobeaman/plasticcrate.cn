<section id="top-banner">
	<div>
		<?php 
		$business_ecommerce_banner = get_theme_mod('top_banner_page', 0);
		if($business_ecommerce_banner != 0 ) {
	
			$business_ecommerce_args = array( 'post_type' => 'page','ignore_sticky_posts' => 1 , 'post__in' => array($business_ecommerce_banner));
			$business_ecommerce_result = new WP_Query($business_ecommerce_args);
			while ( $business_ecommerce_result->have_posts() ) :
				$business_ecommerce_result->the_post();
				the_content();
			endwhile;
			wp_reset_postdata();
		}
		 ?>
	</div>
</section> 

