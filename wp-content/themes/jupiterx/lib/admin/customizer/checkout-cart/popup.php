<?php
/**
 * Add Jupiter elements popup and tabs to the WordPress Customizer.
 *
 * @package JupiterX\Framework\Admin\Customizer
 *
 * @since   1.0.0
 */

$popups = [
	'steps'       => __( 'Steps', 'jupiterx' ),
	'heading'     => __( 'Heading', 'jupiterx' ),
	'field_label' => __( 'Field Label', 'jupiterx' ),
	'field'       => __( 'Field', 'jupiterx' ),
	'button'      => __( 'Button', 'jupiterx' ),
	'back_button' => __( 'Back Button', 'jupiterx' ),
];

// Elements popup.
JupiterX_Customizer::add_section( 'jupiterx_checkout_cart', [
	'panel' => 'jupiterx_shop_panel',
	'title' => __( 'Checkout & Cart', 'jupiterx' ),
	'type'  => 'popup',
	'tabs'  => [
		'styles' => __( 'Styles', 'jupiterx' ),
	],
	'popups'  => $popups,
	'preview' => true,
] );

// Styles tab.
JupiterX_Customizer::add_section( 'jupiterx_checkout_cart_styles', [
	'popup' => 'jupiterx_checkout_cart',
	'type'  => 'pane',
	'pane'  => [
		'type' => 'tab',
		'id'   => 'styles',
	],
] );

// Styles tab > Child popups.
JupiterX_Customizer::add_field( [
	'type'     => 'jupiterx-child-popup',
	'settings' => 'jupiterx_checkout_cart_styles_popups',
	'section'  => 'jupiterx_checkout_cart_styles',
	'target'   => 'jupiterx_checkout_cart',
	'choices'  => $popups,
] );

// Create popup children.
foreach ( $popups as $popup_id => $label ) {
	JupiterX_Customizer::add_section( 'jupiterx_checkout_cart_' . $popup_id, [
		'popup' => 'jupiterx_checkout_cart',
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
