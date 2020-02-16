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
		<div class="woocommerce">
			<?php woocommerce_content(); ?>
		</div>
	</div>      
	<?php get_sidebar( 'right' ); ?>
</div>

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

<!-- end content container -->

<?php
get_footer();
