<?php
/**
 * The Jupiter Elementor component contains a set of functions for Elementor plugin.
 *
 * @package JupiterX\Framework\API\Elementor
 *
 * @since   1.0.0
 */

add_action( 'elementor/widgets/widgets_registered', 'jupiterx_elementor_register_widgets' );
/**
 * Register widgets to Elementor.
 *
 * @since 1.0.0
 * @access public
 *
 * @param object $widgets_manager The widgets manager.
 */
function jupiterx_elementor_register_widgets( $widgets_manager ) {
	require_once JUPITERX_API_PATH . 'elementor/widgets/sidebar.php';

	// Unregister native sidebar.
	$widgets_manager->unregister_widget_type( 'sidebar' );

	// Register custom sidebar.
	$widgets_manager->register_widget_type( new JupiterX_Elementor_Widget_Sidebar() );
}
