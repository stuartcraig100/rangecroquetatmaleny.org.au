<?php
$api_key = get_option( 'artbees_api_key' );
$is_registered = ! empty( $api_key ) ? '' : 'jupiterx-call-to-register-product';
?>
<div class="jupiterx-cp-wrap jupiterx-wrap <?php echo esc_attr( $is_registered ); ?>" id="js__jupiterx-cp-wrap">

	<?php include_once( JUPITERX_CONTROL_PANEL_PATH . '/views/layout/header.php' ); ?>

	<div class="jupiterx-cp-container">
		<?php include_once( JUPITERX_CONTROL_PANEL_PATH . '/views/layout/sidebar.php' ); ?>
		<div class="jupiterx-cp-panes" id="js__jupiterx-cp-panes">
			<?php include_once( JUPITERX_CONTROL_PANEL_PATH . '/views/panes/home.php' ); ?>
		</div>
	</div>
</div>

