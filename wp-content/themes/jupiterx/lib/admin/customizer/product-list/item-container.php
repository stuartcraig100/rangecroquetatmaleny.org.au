<?php
/**
 * Add Jupiter settings for Product List > Styles > Out of Stock Badge tab to the WordPress Customizer.
 *
 * @package JupiterX\Framework\Admin\Customizer
 *
 * @since   1.0.0
 */

$section = 'jupiterx_product_list_item_container';

// Align.
JupiterX_Customizer::add_responsive_field( [
	'type'      => 'jupiterx-choose',
	'settings'  => 'jupiterx_product_list_item_container_align',
	'section'   => $section,
	'label'     => __( 'Align', 'jupiterx' ),
	'choices'   => JupiterX_Customizer_Utils::get_align(),
	'css_var'   => 'product-list-item-container-align',
	'transport' => 'postMessage',
	'output'    => [
		[
			'element'  => '.woocommerce ul.products li.product',
			'property' => 'text-align',
		],
	],
] );

// Background Color.
JupiterX_Customizer::add_field( [
	'type'      => 'jupiterx-color',
	'settings'  => 'jupiterx_product_list_item_container_background_color',
	'section'   => $section,
	'css_var'   => 'product-list-item-container-background-color',
	'icon'      => 'background-color',
	'transport' => 'postMessage',
	'output'    => [
		[
			'element'  => '.woocommerce ul.products .jupiterx-product-container',
			'property' => 'background-color',
		],
	],
] );

// Border.
JupiterX_Customizer::add_field( [
	'type'      => 'jupiterx-border',
	'settings'  => 'jupiterx_product_list_item_container_border',
	'section'   => $section,
	'css_var'   => 'product-list-item-container-border',
	'transport' => 'postMessage',
	'exclude'   => [ 'style', 'size' ],
	'default'   => [
		'width' => [
			'size' => '0',
			'unit' => 'px',
		],
	],
	'output'    => [
		[
			'element' => '.woocommerce ul.products .jupiterx-product-container',
		],
	],
] );

// Divider.
JupiterX_Customizer::add_field( [
	'type'     => 'jupiterx-divider',
	'settings' => 'jupiterx_product_list_item_container_divider_3',
	'section'  => $section,
] );

// Spacing.
JupiterX_Customizer::add_responsive_field( [
	'type'      => 'jupiterx-box-model',
	'settings'  => 'jupiterx_product_list_item_container_spacing',
	'section'   => $section,
	'css_var'   => 'product-list-item-container',
	'exclude'   => [ 'margin' ],
	'transport' => 'postMessage',
	'output'    => [
		[
			'element' => '.woocommerce ul.products .jupiterx-product-container',
		],
	],
] );
