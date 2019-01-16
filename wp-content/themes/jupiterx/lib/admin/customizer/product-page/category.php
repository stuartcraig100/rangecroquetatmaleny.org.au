<?php
/**
 * Add Jupiter settings for Product Page > Styles > Name tab to the WordPress Customizer.
 *
 * @package JupiterX\Framework\Admin\Customizer
 *
 * @since   1.0.0
 */

$section = 'jupiterx_product_page_category';

// Title typography.
JupiterX_Customizer::add_field( [
	'type'       => 'jupiterx-typography',
	'settings'   => 'jupiterx_product_page_category_title_typography',
	'section'    => $section,
	'responsive' => true,
	'css_var'    => 'product-page-category-title',
	'label'      => __( 'Title', 'jupiterx' ),
	'exclude'    => [ 'line_height' ],
	'transport'  => 'postMessage',
	'output'     => [
		[
			'element' => '.single-product div.product .product_meta span.posted_in .jupiterx-product-category-title',
		],
	],
] );

// Divider.
JupiterX_Customizer::add_field( [
	'type'     => 'jupiterx-divider',
	'settings' => 'jupiterx_product_page_category_divider_1',
	'section'  => $section,
] );

// Text typography.
JupiterX_Customizer::add_field( [
	'type'       => 'jupiterx-typography',
	'settings'   => 'jupiterx_product_page_category_text_typography',
	'section'    => $section,
	'responsive' => true,
	'css_var'    => 'product-page-category-text',
	'label'      => __( 'Text', 'jupiterx' ),
	'exclude'    => [ 'line_height', 'text_transform' ],
	'transport'  => 'postMessage',
	'output'     => [
		[
			'element' => '.single-product div.product .product_meta span.product-categories, .single-product div.product .product_meta span.posted_in a',
		],
	],
] );

// Divider.
JupiterX_Customizer::add_field( [
	'type'     => 'jupiterx-divider',
	'settings' => 'jupiterx_product_page_category_divider_2',
	'section'  => $section,
] );

// Spacing.
JupiterX_Customizer::add_responsive_field( [
	'type'      => 'jupiterx-box-model',
	'settings'  => 'jupiterx_product_page_category_spacing',
	'section'   => $section,
	'css_var'   => 'product-page-category',
	'exclude'   => [ 'padding' ],
	'transport' => 'postMessage',
	'output'    => [
		[
			'element' => '.single-product div.product .product_meta span.posted_in',
		],
	],
] );
