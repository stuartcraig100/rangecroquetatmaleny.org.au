<?php
/**
 * Template for selecting templates.
 *
 * @package JupiterX\Framework\Admin\Setup_Wizard
 *
 * @since 1.0.0
 */

defined( 'ABSPATH' ) || exit;

?>
<div class="jupiterx-notice">
	<?php esc_html_e( 'Add dummy pre-built contents to your website. This is the default content for Jupiter X created for you to get started quickly without having to start from scratch.', 'jupiterx' ); ?>
</div>
<div class="jupiterx-skip-wizard">
	<a href="<?php echo esc_url( admin_url() ); ?>" class="jupiterx-skip-link"><?php esc_html_e( 'Skip this wizard', 'jupiterx' ); ?></a>
</div>
<div class="jupiterx-form jupiterx-templates-selector">
	<div class="jupiterx-templates-header">
		<h5><?php esc_html_e( 'Select a template to start with', 'jupiterx' ); ?></h5>
		<div class="jupiterx-templates-filter">
			<div class="input-group">
				<input type="text" class="jupiterx-form-control jupiterx-templates-filter-name" placeholder="<?php esc_html_e( 'Search', 'jupiterx' ); ?>" />
				<div class="input-group-append">
					<button class="btn btn-outline-secondary dropdown-toggle" type="button" id="jupiterx-templates-category-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<?php esc_html_e( 'All Categories', 'jupiterx' ); ?>
					</button>
					<input type="hidden" class="jupiterx-templates-filter-category" value="0">
					<div class="dropdown-menu jupiterx-templates-category-dropdown" aria-labelledby="jupiterx-templates-category-dropdown">
						<span class="dropdown-item" data-value="0"><?php esc_html_e( 'All Categories', 'jupiterx' ); ?></span>
						<?php $categories = jupiterx_setup_wizard()->get_templates_categories(); ?>
						<?php if ( ! empty( $categories ) ) { ?>
							<?php foreach ( $categories as $category ) { ?>
							<span class="dropdown-item" data-value="<?php echo esc_attr( $category->id ); ?>"><?php echo $category->name; // WPCS: XSS ok. ?></span>
							<?php } ?>
						<?php } ?>
					</div>
				</div>
			</div>
			<button type="submit" class="jupiterx-submit btn btn-secondary"><?php esc_html_e( 'Search', 'jupiterx' ); ?></button>
		</div>
	</div>
	<div class="jupiterx-templates-body">
	</div>
</div>
