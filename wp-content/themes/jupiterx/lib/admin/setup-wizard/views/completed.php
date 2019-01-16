<?php
/**
 * Template for setup complete.
 *
 * @package JupiterX\Framework\Admin\Setup_Wizard
 *
 * @since 1.0.0
 */

defined( 'ABSPATH' ) || exit;

?>
<div class="jupiterx-notice">
	<?php esc_html_e( 'Your website is all set and ready to go. You can now customise your website and add your content to it. Here are some useful info you may need along the way.', 'jupiterx' ); ?>
</div>
<div class="jupiterx-container container">
	<div class="row">
		<div class="col-4">
			<h6><?php esc_html_e( 'More Help:', 'jupiterx' ); ?></h6>
			<ul class="jupiterx-help-links list-unstyled">
				<li><a href="<?php echo esc_url( 'https://www.youtube.com/watch?v=fnlzOHECEDo' ); ?>" target="_blank" class="text-secondary"><i class="fa fa-flag"></i> <?php esc_html_e( 'How to get started', 'jupiterx' ); ?></a></li>
				<li><a href="<?php echo esc_url( 'https://help.artbees.net/jupiterx#getting-started' ); ?>" target="_blank" class="text-secondary"><i class="fa fa-book"></i> <?php esc_html_e( 'Documentation', 'jupiterx' ); ?></a></li>
			</ul>
		</div>
		<div class="col-4">
			<h6><?php esc_html_e( 'Don\'t miss an update:', 'jupiterx' ); ?></h6>
			<ul class="jupiterx-social-links">
				<li><a href="<?php echo esc_url( 'https://www.facebook.com/artbees' ); ?>" target="_blank"><i class="fab fa-facebook"></i> <span class="screen-reader-text"><?php esc_html_e( 'Facebook' ); ?></span></a></li>
				<li><a href="<?php echo esc_url( 'https://twitter.com/artbees_design' ); ?>" target="_blank"><i class="fab fa-twitter"></i> <span class="screen-reader-text"><?php esc_html_e( 'Twitter' ); ?></a></span></li>
				<li><a href="<?php echo esc_url( 'https://instagram.com/artbees' ); ?>" target="_blank"><i class="fab fa-instagram"></i> <span class="screen-reader-text"><?php esc_html_e( 'Instagram' ); ?></span></a></li>
			</ul>
		</div>
		<div class="col-4">
			<h6><?php esc_html_e( 'Leave a Rating:', 'jupiterx' ); ?></h6>
			<a class="jupiterx-rate-link" target="_blank" href="https://themeforest.net/downloads">
				<i class="fas fa-star"></i>
				<i class="fas fa-star"></i>
				<i class="fas fa-star"></i>
				<i class="fas fa-star"></i>
				<i class="fas fa-star"></i>
			</a>
		</div>
	</div>
</div>
<div class="jupiterx-form text-center">
	<a class="btn btn-primary" href="<?php echo esc_url( add_query_arg( 'return', rawurlencode( admin_url() ), admin_url( 'customize.php' ) ) ); ?>"><?php esc_html_e( 'Customize your website', 'jupiterx' ); ?></a>
</div>
