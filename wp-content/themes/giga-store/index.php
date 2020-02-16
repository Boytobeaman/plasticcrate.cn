<?php
get_header();

if ( class_exists( 'WooCommerce' ) && get_theme_mod( 'breadcrumbs-check', 1 ) != 0 ) {
	woocommerce_breadcrumb();
}
?>

<!-- start content container -->
<div class="row container rsrc-content">

	<?php get_sidebar( 'left' ); ?>


	<div class="col-md-<?php giga_store_main_content_width_columns(); ?> rsrc-main">

		<?php
		if ( have_posts() ) : while ( have_posts() ) : the_post();
				get_template_part( 'content', get_post_format() );
			endwhile;
			?>
			<div class="footer-pagination"><?php the_posts_pagination(); ?></div>
			<?php
		else :
			get_template_part( 'content', 'none' );
		endif;
		?>

	</div>

	<?php get_sidebar( 'right' ); ?>

</div>
<!-- end content container -->

<div id="contactUs" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Request a Free Quote</h4>
      </div>
      <div class="modal-body">
		<?php echo do_shortcode( '[contact-form-7 id="244" title="Contact form 1"]' ); ?>
      </div>
    </div>
  </div>
</div>

<?php get_template_part( 'template-part', 'footernav' ); ?>

<?php get_footer(); ?>
