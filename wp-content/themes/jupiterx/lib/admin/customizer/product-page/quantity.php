<?php
/**
 * Add Jupiter settings for Product Page > Styles > Quantity tab to the WordPress Customizer.
 *
 * @package JupiterX\Framework\Admin\Customizer
 *
 * @since   1.0.0
 */

$section = 'jupiterx_product_page_quantity';

// Typography.
JupiterX_Customizer::add_field( [
	'type'       => 'jupiterx-typography',
	'settings'   => 'jupiterx_product_page_quantity_input_typography',
	'section'    => $section,
	'responsive' => true,
	'css_var'    => 'product-page-quantity-input',
	'transport'  => 'postMessage',
	'exclude'    => [ 'line_height', 'letter_spacing', 'text_transform' ],
	'output'     => [
		[
			'element' => '.woocommerce div.product form.cart div.quantity input, .woocommerce div.product form.cart div.quantity .btn',
		],
	],
] );

// Input Background Color.
JupiterX_Customizer::add_field( [
	'type'      => 'jupiterx-color',
	'settings'  => 'jupiterx_product_page_quantity_input_background_color',
	'section'   => $section,
	'css_var'   => 'product-page-quantity-input-background-color',
	'icon'      => 'background-color',
	'transport' => 'postMessage',
	'output'    => [
		[
			'element' => '.woocommerce div.product form.cart div.quantity input, .woocommerce div.product form.cart div.quantity .btn',
			'property' => 'background-color',
		],
	],
] );

// Input Border.
JupiterX_Customizer::add_field( [
	'type'      => 'jupiterx-border',
	'settings'  => 'jupiterx_product_page_quantity_input_border',
	'section'   => $section,
	'css_var'   => 'product-page-quantity-input-border',
	'transport' => 'postMessage',
	'exclude'   => [ 'style', 'size' ],
	'output'    => [
		[
			'element' => '.woocommerce div.product form.cart div.quantity input, .woocommerce div.product form.cart div.quantity .btn',
		],
	],
] );

// Spacing.
JupiterX_Customizer::add_responsive_field( [
	'type'      => 'jupiterx-box-model',
	'settings'  => 'jupiterx_product_page_quantity_input_spacing',
	'section'   => $section,
	'css_var'   => 'product-page-quantity-input',
	'transport' => 'postMessage',
	'exclude'   => [ 'margin' ],
	'default'   => [
		'desktop' => [
			'padding_top' => 0.5,
			jupiterx_get_direction( 'padding_right' ) => 0.75,
			'padding_bottom' => 0.5,
			jupiterx_get_direction( 'padding_left' ) => 0.75,
		],
	],
	'output'    => [
		[
			'element' => '.woocommerce div.product form.cart div.quantity .btn',
		],
	],
] );

// Divider.
JupiterX_Customizer::add_field( [
	'type'     => 'jupiterx-divider',
	'settings' => 'jupiterx_product_page_quantity_divider_1',
	'section'  => $section,
] );

// Spacing.
JupiterX_Customizer::add_responsive_field( [
	'type'      => 'jupiterx-box-model',
	'settings'  => 'jupiterx_product_page_quantity_spacing',
	'section'   => $section,
	'css_var'   => 'product-page-quantity',
	'transport' => 'postMessage',
	'exclude'   => [ 'padding' ],
	'output'    => [
		[
			'element' => '.woocommerce div.product form.cart div.quantity',
		],
	],
] );
