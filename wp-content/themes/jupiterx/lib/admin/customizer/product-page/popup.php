<?php
/**
 * Add Jupiter Product page popup and tabs to the WordPress Customizer.
 *
 * @package JupiterX\Framework\Admin\Customizer
 *
 * @since   1.0.0
 */

$popups = [
	'image'             => __( 'Image', 'jupiterx' ),
	'name'              => __( 'Name', 'jupiterx' ),
	'regular_price'     => __( 'Regular Price', 'jupiterx' ),
	'sale_price'        => __( 'Sale Price', 'jupiterx' ),
	'rating'            => __( 'Rating', 'jupiterx' ),
	'category'          => __( 'Category', 'jupiterx' ),
	'tags'              => __( 'Tags', 'jupiterx' ),
	'sku'               => __( 'SKU', 'jupiterx' ),
	'short_description' => __( 'Short Description', 'jupiterx' ),
	'variations'        => __( 'Variations', 'jupiterx' ),
	'quantity'          => __( 'Quantity', 'jupiterx' ),
	'add_cart_button'   => __( 'Add to Cart Button', 'jupiterx' ),
	'social_share'      => __( 'Social Share', 'jupiterx' ),
	'tabs'              => __( 'Tabs', 'jupiterx' ),
	'sale_badge'        => __( 'Sale Badge', 'jupiterx' ),
	'outstock_badge'    => __( 'Out of Stock', 'jupiterx' ),
];

// Product page popup.
JupiterX_Customizer::add_section( 'jupiterx_product_page', [
	'panel'    => 'jupiterx_shop_panel',
	'title'    => __( 'Product Page', 'jupiterx' ),
	'type'     => 'popup',
	'tabs'     => [
		'settings' => __( 'Settings', 'jupiterx' ),
		'styles'   => __( 'Styles', 'jupiterx' ),
	],
	'popups'  => $popups,
	'preview' => true,
] );

// Settings tab.
JupiterX_Customizer::add_section( 'jupiterx_product_page_settings', [
	'popup' => 'jupiterx_product_page',
	'type'  => 'pane',
	'pane'  => [
		'type' => 'tab',
		'id'   => 'settings',
	],
] );

// Styles tab.
JupiterX_Customizer::add_section( 'jupiterx_product_page_styles', [
	'popup' => 'jupiterx_product_page',
	'type'  => 'pane',
	'pane'  => [
		'type' => 'tab',
		'id'   => 'styles',
	],
] );

// Styles tab > Child popups.
JupiterX_Customizer::add_field( [
	'type'     => 'jupiterx-child-popup',
	'settings' => 'jupiterx_product_page_styles_popups',
	'section'  => 'jupiterx_product_page_styles',
	'target'   => 'jupiterx_product_page',
	'choices'  => $popups,
] );

// Create popup children.
foreach ( $popups as $popup_id => $label ) {
	JupiterX_Customizer::add_section( 'jupiterx_product_page_' . $popup_id, [
		'popup' => 'jupiterx_product_page',
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
