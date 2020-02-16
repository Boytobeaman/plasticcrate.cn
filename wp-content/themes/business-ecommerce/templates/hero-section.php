<?php
		$business_ecommerce_hero = get_theme_mod('hero_page', 0);
		if ($business_ecommerce_hero !==0) {
		$business_ecommerce_args = array( 'post_type' => 'page', 'ignore_sticky_posts' => 1 , 'post__in' => array($business_ecommerce_hero));
		$business_ecommerce_result = new WP_Query($business_ecommerce_args);
?>
<div class="container header-hero-section">
	<div class="row hero-content">
	<?php
		//get page id

		//show content
		while ( $business_ecommerce_result->have_posts() ) :
			$business_ecommerce_result->the_post();
			the_content();
		endwhile;
		
		wp_reset_postdata();
	?>
	</div>
</div>
<?php
}