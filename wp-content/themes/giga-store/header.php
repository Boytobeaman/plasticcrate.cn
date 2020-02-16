<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta http-equiv="content-type" content="<?php bloginfo( 'html_type' ); ?>; charset=<?php bloginfo( 'charset' ); ?>" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
		<?php wp_head(); ?>
	</head>
	<body id="blog" <?php body_class(); ?>>

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

		<?php get_template_part( 'template-part', 'topnav' ); ?>

		<?php get_template_part( 'template-part', 'head' ); ?>
