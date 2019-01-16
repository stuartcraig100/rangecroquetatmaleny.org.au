<div class="jupiterx-cp-pane-box bootstrap-wrapper">
	<h3><?php esc_html_e( 'Settings', 'jupiterx' ); ?></h3>
	<div class="jupiterx-cp-export-wrap">
		<form class="jupiterx-cp-settings-form" action="#">
			<div class="form-row">
				<div class="form-group col-md-12">
					<button type="button" class="btn btn-secondary jupiterx-cp-settings-flush"><?php esc_html_e( 'Flush Assets Cache', 'jupiterx' ); ?></button>
					<span class="jupiterx-cp-settings-flush-feedback text-muted ml-2 d-none"><?php esc_html_e( 'Flushing...', 'jupiterx' ); ?></span>
					<small class="form-text text-muted"><?php esc_html_e( 'Clear CSS, Javascript and images cached files. New cached versions will be compiled/created on page load.', 'jupiterx' ); ?></small>
				</div>
				<div class="col-md-12"><hr></div>
				<div class="form-group col-md-6">
					<label for="jupiterx-cp-settings-dev-mode"><?php esc_html_e( 'Development Mode', 'jupiterx' ); ?></label>
					<input type="hidden" name="jupiterx_dev_mode" value="0">
					<div class="jupiterx-switch">
						<input type="checkbox" id="jupiterx-cp-settings-dev-mode" name="jupiterx_dev_mode" value="1" <?php echo ( empty( get_option( 'jupiterx_dev_mode' ) ) ) ? '' : 'checked'; ?>>
						<label for="jupiterx-cp-settings-dev-mode"></label>
					</div>
					<small class="form-text text-muted"><?php esc_html_e( 'This option should be enabled while your website is in development.', 'jupiterx' ); ?></small>
				</div>
				<div class="form-group col-md-6">
					<label for="jupiterx-cp-settings-svg-support"><?php esc_html_e( 'SVG Support', 'jupiterx' ); ?></label>
					<input type="hidden" name="jupiterx_svg_support" value="0">
					<div class="jupiterx-switch">
						<input type="checkbox" id="jupiterx-cp-settings-svg-support" name="jupiterx_svg_support" value="1" <?php echo ( empty( get_option( 'jupiterx_svg_support' ) ) ) ? '' : 'checked'; ?>>
						<label for="jupiterx-cp-settings-svg-support"></label>
					</div>
					<small class="form-text text-muted"><?php esc_html_e( 'Enable this option to upload SVG to WordPress Media Library.', 'jupiterx' ); ?></small>
				</div>
				<div class="col-md-12"><hr></div>
				<div class="form-group col-md-6">
					<label for="jupiterx-cp-settings-google-analytics-id"><?php esc_html_e( 'Google Analytics ID', 'jupiterx' ); ?></label>
					<input type="text" class="jupiterx-form-control" id="jupiterx-cp-settings-google-analytics-id" value="<?php echo get_option( 'jupiterx_google_analytics_id' ); ?>" name="jupiterx_google_analytics_id" placeholder="UA-45******-*">
				</div>
				<div class="form-group col-md-6">
					<label for="jupiterx-cp-settings-adobe-project-id"><?php esc_html_e( 'Adobe Fonts Project ID', 'jupiterx' ); ?></label>
					<input type="text" class="jupiterx-form-control" id="jupiterx-cp-settings-adobe-project-id" value="<?php echo get_option( 'jupiterx_adobe_fonts_project_id' ); ?>" name="jupiterx_adobe_fonts_project_id" placeholder="ezv****">
				</div>
				<div class="col-md-12"><hr></div>
				<div class="form-group col-md-4">
					<label for="jupiterx-cp-settings-tracking-codes-before-head"><?php _e( sprintf( 'Tracking Codes Before %s Tag', '<code>&#x3C;/head&#x3E;</code>' ), 'jupiterx' ); ?></label>
					<textarea class="jupiterx-form-control" rows="7" id="jupiterx-cp-settings-tracking-codes-before-head" name="jupiterx_tracking_codes_before_head" rows="3"><?php echo stripslashes( get_option( 'jupiterx_tracking_codes_before_head' ) ); ?></textarea>
				</div>
				<div class="form-group col-md-4">
					<label for="jupiterx-cp-settings-tracking-codes-after-body"><?php _e( sprintf( 'Tracking Codes After %s Tag', '<code>&#x3C;body&#x3E;</code>' ), 'jupiterx' ); ?></label>
					<textarea class="jupiterx-form-control" rows="7" id="jupiterx-cp-settings-tracking-codes-after-body" name="jupiterx_tracking_codes_after_body" rows="3"><?php echo stripslashes( get_option( 'jupiterx_tracking_codes_after_body' ) ); ?></textarea>
				</div>
				<div class="form-group col-md-4">
					<label for="jupiterx-cp-settings-tracking-codes-before-body"><?php _e( sprintf( 'Tracking Codes Before %s Tag', '<code>&#x3C;/body&#x3E;</code>' ), 'jupiterx' ); ?></label>
					<textarea class="jupiterx-form-control" rows="7" id="jupiterx-cp-settings-tracking-codes-before-body" name="jupiterx_tracking_codes_before_body" rows="3"><?php echo stripslashes( get_option( 'jupiterx_tracking_codes_before_body' ) ); ?></textarea>
				</div>
			</div>
			<div class="mt-2">
				<button type="submit" class="btn btn-primary"><?php esc_html_e( 'Save Settings', 'jupiterx' ); ?></button>
				<span class="jupiterx-cp-settings-save-feedback text-muted ml-2 d-none"><?php esc_html_e( 'Saving...', 'jupiterx' ); ?></span>
			</div>
		</form>
	</div>
</div>
