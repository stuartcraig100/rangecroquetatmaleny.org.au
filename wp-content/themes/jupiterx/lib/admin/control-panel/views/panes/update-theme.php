<?php
wp_update_themes();
$updates  = new JupiterX_Control_Panel_Updates_Downgrades();
$releases = $updates->get_release_notes();
$get_release_download_link_nonce = wp_create_nonce( 'jupiterx-ajax-get-theme-release-package-url-nonce' );
?>
<script type="text/javascript">
	DynamicMaxHeight({selector: ".dynamic-max-height"});
</script>
<div class="jupiterx-cp-pane-box" id="jupiterx-cp-updates-downgrades">
	<h3>
		<?php esc_html_e( 'Updates', 'jupiterx' ); ?>
	</h3>
	<?php if(empty($releases)) : ?>
		<div class="jupiterx-callout bd-callout-info mb-4 ml-0">
			<h4><?php esc_html_e( 'There are no updates available!', 'jupiterx' ); ?></h4>
		</div>
	<?php endif; ?>
	<?php
	foreach ( $releases as $release ) {
		$release_version = trim( str_replace( 'V', '', $release->post_title ) );
		$version_compare = version_compare( $release_version,JUPITERX_VERSION );
		$button_text = null;
		$button_color = null;
		if ( 1 === $version_compare ) {
			$button_text = 'update';
			$button_color = 'btn-success';
		} elseif ( -1 === $version_compare ) {
			$button_text = 'downgrade';
			$button_color = 'btn-outline-danger';
		}
	?>
	<div class="jupiterx-card mb-4 js-dynamic-height" data-maxheight="200">
		<div class="jupiterx-card-body">
			<div class="jupiterx-cp-new-version-title" id="<?php echo esc_attr( $release_version ); ?>">
				<span class="jupiterx-cp-version-number">
					<?php echo esc_attr( 'Version ' . $release_version ); ?>
				</span>
				<span class="jupiterx-cp-version-date">
					<?php echo esc_attr( mysql2date( 'j F Y', $release->post_date ) ); ?>
				</span>
			</div>
			<div class="jupiterx-cp-new-version-content dynamic-height-wrap dynamic-max-height" data-button-less="Show Less" data-button-more="Show More" data-maxheight="140">
				<div class="dynamic-wrap">
					<?php echo wp_kses_post( $release->post_content ); ?>
				</div>
			</div>
		</div>
		<hr style="margin: 0;">
			<div class="jupiterx-card-body">
				<?php if ( $button_text && $button_color ) { ?>
				<a class="btn <?php echo esc_attr( $button_color ); ?> mr-2 js__cp_change_theme_version" data-nonce="<?php echo esc_attr( $get_release_download_link_nonce ); ?>" data-release-id="<?php echo esc_attr( $release->ID ); ?>" data-release-version="<?php echo esc_attr( $release_version ); ?>" href="#" id="js__update-theme-btn">
					<?php if ( $button_text === 'update' ) { ?>
						<?php esc_html_e( 'Update', 'jupiterx' ); ?>
					<?php } else { ?>
						<?php esc_html_e( 'Downgrade', 'jupiterx' ); ?>
					<?php }	?>
				</a>
				<?php } ?>
				<a class="btn btn-primary release-download" data-nonce="<?php echo esc_attr( $get_release_download_link_nonce ); ?>" data-release-id="<?php echo esc_attr( $release->ID ); ?>" href="#" id="js__download-theme-package-btn" target="_blank">
					<?php esc_html_e( 'Download', 'jupiterx' ); ?>
				</a>
				<span class="jupiterx-cp-update-feedback text-muted ml-2 d-none"><?php esc_html_e( 'Processing the request...', 'jupiterx' ); ?></span>
			</div>
		</hr>
	</div>
	<?php } ?>
</div>
