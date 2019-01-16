<?php
$api_key = get_option( 'artbees_api_key' );
$is_apikey = empty( $api_key ) ? false : true;
$has_api_key = empty( $api_key ) ? 'd-none' : '';
$no_api_key = empty( $has_api_key ) ? 'd-none' : '';
?>

<div class="jupiterx-cp-pane-box" id="jupiterx-cp-home">
	<?php if ( ! jupiterx_setup_wizard()->is_notice_hidden() ) : ?>
	<div class="alert alert-secondary jupiterx-setup-wizard-message" role="alert">
		<div class="row align-items-center">
			<div class="col-md-8">
				<p><?php esc_html_e( 'This wizard helps you configure your new website quick and easy.', 'jupiterx' ); ?></p>
			</div>
			<div class="col-md-4">
				<div class="text-right">
					<a class="btn btn-success" href="<?php echo jupiterx_setup_wizard()->get_url(); ?>"><?php esc_html_e( 'Run Setup Wizard', 'jupiterx' ); ?></a>
					<button class="btn btn-outline-secondary jupiterx-setup-wizard-hide-notice"><?php esc_html_e( 'Discard', 'jupiterx' ); ?></button>
				</div>
			</div>
		</div>
	</div>
	<?php endif; ?>

	<div class="get-api-key-form <?php echo esc_attr( $no_api_key ); ?>">
		<h3 class="heading-with-icon icon-lock">
			<?php esc_html_e( 'Activate', 'jupiterx' ); ?>
			<?php echo esc_html( JUPITERX_NAME ); ?>
		</h3>
		<div class="jupiterx-callout bd-callout-danger mb-4 ml-0">
			<h4><?php esc_html_e( 'Almost Done! Please register Jupiter X to activate its features.', 'jupiterx' ); ?></h4>
			<p><?php esc_html_e( 'By registering Jupiter X you will be able to download hundreds of free templates, contact one on one support, install key plugins, get constant updates and unlock more feature.', 'jupiterx' ); ?></p>
		</div>
		<div class="form-group">
			<input type="text" id="jupiterx-cp-register-api-input" class="jupiterx-form-control w-50 mb-3" placeholder="Enter your API key in here">
			<?php wp_nonce_field( 'jupiterx-cp-ajax-register-api', 'security' ); ?>
			<button class="btn btn-primary js__activate-product mb-5" id="js__regiser-api-key-btn" href="#"><?php esc_html_e( 'Activate Product', 'jupiterx' ); ?></button>
		</div>
	</div>

	<div class="remove-api-key-form <?php echo esc_attr( $has_api_key ); ?>">
		<h3 class="heading-with-icon icon-checkmark mb-4">
			<?php echo esc_html( JUPITERX_NAME ); ?>
			<?php esc_html_e( 'is Activated', 'jupiterx' ); ?>
		</h3>
		<button class="btn btn-primary js__deactivate-product mb-5" id="js__revoke-api-key-btn" href="#"><?php esc_html_e( 'Deactivate Product', 'jupiterx' ); ?></button>
	</div>

	<div class="row">
		<div class="col">
			<h3 class="heading-with-icon icon-learn"><?php esc_html_e( 'Learn', 'jupiterx' ); ?></h3>
			<h6><?php esc_html_e( 'Get started:', 'jupiterx' ); ?></h6>
			<iframe class="mb-4" width="400" height="225" src="https://www.youtube.com/embed/fnlzOHECEDo?modestbranding=1" frameborder="0" allowfullscreen></iframe>
			<h6><?php esc_html_e( 'Learn deeper:', 'jupiterx' ); ?></h6>
			<ul class="list-unstyled">
				<li><a class="list-with-icon icon-video" href="#" data-content="<?php echo esc_attr__( 'Coming Soon...', 'jupiterx' ); ?>" data-toggle="popover" data-placement="top"><?php esc_html_e( 'Watch Videos', 'jupiterx' ); ?></a></li>
				<li><a class="list-with-icon icon-docs" target="_blank" href="https://intercom.help/artbees/jupiterx#getting-started"><?php esc_html_e( 'Read Documentation', 'jupiterx' ); ?></a></li>
			</ul>
		</div>
		<div class="col">
			<h3 class="heading-with-icon icon-download"><?php esc_html_e( 'Start with a Template', 'jupiterx' ); ?></h3>
			<p><?php esc_html_e( 'Save time by choosing among beautiful templates designed for different sectors and purposes.', 'jupiterx' ); ?></p>
			<a class="btn btn-secondary js__cp-sidebar-link" href="#install-templates"><?php esc_html_e( 'Import a Template', 'jupiterx' ); ?></a>
		</div>
	</div>
</div>
