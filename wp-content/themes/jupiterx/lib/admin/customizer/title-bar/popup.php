<?php
/**
 * Add Jupiter Title Bar popup and tabs to the WordPress Customizer.
 *
 * @package JupiterX\Framework\Admin\Customizer
 *
 * @since   1.0.0
 */

$popups = [
	'title'      => __( 'Title', 'jupiterx' ),
	'subtitle'   => __( 'Subtitle', 'jupiterx' ),
	'breadcrumb' => __( 'Breadcrumb', 'jupiterx' ),
	'container'  => __( 'Container', 'jupiterx' ),
];

// Popup.
JupiterX_Customizer::add_section( 'jupiterx_title_bar', [
	'title'    => __( 'Title Bar', 'jupiterx' ),
	'type'     => 'popup',
	'priority' => 125,
	'tabs'     => [
		'settings' => __( 'Settings', 'jupiterx' ),
		'styles'   => __( 'Styles', 'jupiterx' ),
	],
	'popups'   => $popups,
] );

// Settings tab.
JupiterX_Customizer::add_section( 'jupiterx_title_bar_settings', [
	'popup' => 'jupiterx_title_bar',
	'type'  => 'pane',
	'pane'  => [
		'type' => 'tab',
		'id'   => 'settings',
	],
] );

// Styles tab.
JupiterX_Customizer::add_section( 'jupiterx_title_bar_styles', [
	'popup' => 'jupiterx_title_bar',
	'type'  => 'pane',
	'pane'  => [
		'type' => 'tab',
		'id'   => 'styles',
	],
] );

// Styles tab > Child popups.
JupiterX_Customizer::add_field( [
	'type'     => 'jupiterx-child-popup',
	'settings' => 'jupiterx_title_bar_styles_popups',
	'section'  => 'jupiterx_title_bar_styles',
	'target'   => 'jupiterx_title_bar',
	'choices'  => $popups,
] );

// Create popup children.
foreach ( $popups as $popup_id => $label ) {
	JupiterX_Customizer::add_section( 'jupiterx_title_bar_' . $popup_id, [
		'popup' => 'jupiterx_title_bar',
		'type'  => 'pane',
		'pane'  => [
			'type' => 'popup',
			'id'   => $popup_id,
		],
	] );
}

// Load all the settings.
foreach ( glob( dirname( __FILE__ ) . '/*.php' ) as $setting ) {
	require_once $setting;
}
