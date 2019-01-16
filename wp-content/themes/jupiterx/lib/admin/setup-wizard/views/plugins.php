<?php
/**
 * Template for plugins activation.
 *
 * @package JupiterX\Framework\Admin\Setup_Wizard
 *
 * @since 1.0.0
 */

defined( 'ABSPATH' ) || exit;

?>
<div class="jupiterx-notice">
	<?php esc_html_e( 'This will add essential plugins needed for Jupiter X to work properly.', 'jupiterx' ); ?><br />
	<?php esc_html_e( 'You can add/remove plugins later from control panel.', 'jupiterx' ); ?>
</div>
<div class="jupiterx-form">
	<?php $theme_plugins = jupiterx_setup_wizard()->get_plugins_list(); ?>
	<?php if ( ! empty( $theme_plugins ) ) : ?>
	<div class="jupiterx-plugins-list">
		<?php foreach ( $theme_plugins as $plugin ) { ?>
			<?php $required = 'true' === $plugin->required ? true : false; ?>
			<div class="custom-control custom-checkbox">
				<input type="checkbox" class="custom-control-input" name="jupiterx-plugins" value="<?php echo $plugin->slug; // WPCS: XSS ok. ?>" id="jupiterx-plugin-<?php echo esc_attr( $plugin->slug ); ?>" <?php echo $required ? 'disabled="disabled" checked="checked"' : ''; ?>>
				<label class="custom-control-label" for="jupiterx-plugin-<?php echo esc_attr( $plugin->slug ); ?>">
					<?php echo $plugin->name; // WCPS: XSS ok. ?>
				</label>
			</div>
		<?php } ?>
	</div>
	<?php endif; ?>
	<div class="text-center">
		<button type="submit" class="btn btn-primary"><?php esc_html_e( 'Install Plugins', 'jupiterx' ); ?></button>
	</div>
</div>
<div class="jupiterx-skip-wizard">
	<a href="<?php echo esc_url( admin_url() ); ?>" class="jupiterx-skip-link"><?php esc_html_e( 'Skip this wizard', 'jupiterx' ); ?></a>
</div>
