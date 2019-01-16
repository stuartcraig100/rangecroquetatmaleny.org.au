<?php
/**
 * Add Jupiter settings for Product Page > Styles > SKU tab to the WordPress Customizer.
 *
 * @package JupiterX\Framework\Admin\Customizer
 *
 * @since   1.0.0
 */

$section = 'jupiterx_product_page_sku';

// Title typography.
JupiterX_Customizer::add_field( [
	'type'       => 'jupiterx-typography',
	'settings'   => 'jupiterx_product_page_sku_title_typography',
	'section'    => $section,
	'responsive' => true,
	'css_var'    => 'product-page-sku-title',
	'label'      => __( 'Title', 'jupiterx' ),
	'transport'  => 'postMessage',
	'exclude'    => [ 'line_height' ],
	'output'     => [
		[
			'element' => '.single-product div.product .product_meta span.sku_wrapper .jupiterx-product-sku-title',
		],
	],
] );

// Divider.
JupiterX_Customizer::add_field( [
	'type'     => 'jupiterx-divider',
	'settings' => 'jupiterx_product_page_sku_divider_1',
	'section'  => $section,
] );

// Text typography.
JupiterX_Customizer::add_field( [
	'type'       => 'jupiterx-typography',
	'settings'   => 'jupiterx_product_page_sku_text_typography',
	'section'    => $section,
	'responsive' => true,
	'css_var'    => 'product-page-sku-text',
	'label'      => __( 'Text', 'jupiterx' ),
	'transport'  => 'postMessage',
	'exclude'    => [ 'line_height', 'text_transform' ],
	'output'     => [
		[
			'element' => '.single-product div.product .product_meta span.sku_wrapper .sku',
		],
	],
] );

// Divider.
JupiterX_Customizer::add_field( [
	'type'     => 'jupiterx-divider',
	'settings' => 'jupiterx_product_page_sku_divider_2',
	'section'  => $section,
] );

// Spacing.
JupiterX_Customizer::add_responsive_field( [
	'type'      => 'jupiterx-box-model',
	'settings'  => 'jupiterx_product_page_sku_spacing',
	'section'   => $section,
	'css_var'   => 'product-page-sku',
	'transport' => 'postMessage',
	'exclude'   => [ 'padding' ],
	'output'    => [
		[
			'element' => '.single-product div.product .product_meta span.sku_wrapper',
		],
	],
] );
