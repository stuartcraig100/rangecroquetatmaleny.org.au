<?php
/**
 * Template for API activation.
 *
 * @package JupiterX\Framework\Admin\Setup_Wizard
 *
 * @since 1.0.0
 */

defined( 'ABSPATH' ) || exit;

?>
<div class="jupiterx-notice">
	<?php esc_html_e( 'By activating Jupiter X you will be able to download hundreds of free templates, contact one on one support, install key activate, get constant updates and much more. ', 'jupiterx' ); ?>
</div>
<div class="jupiterx-form">
	<div class="form-inline">
		<input type="text" class="jupiterx-form-control" placeholder="<?php esc_html_e( 'Enter your purchase code', 'jupiterx' ); ?>" />
		<button type="submit" class="btn btn-primary"><?php esc_html_e( 'Activate', 'jupiterx' ); ?></button>
	</div>
</div>
<div class="jupiterx-skip-wizard">
	<a href="<?php echo esc_url( admin_url() ); ?>" class="jupiterx-skip-link"><?php esc_html_e( 'Skip this wizard', 'jupiterx' ); ?></a>
</div>
