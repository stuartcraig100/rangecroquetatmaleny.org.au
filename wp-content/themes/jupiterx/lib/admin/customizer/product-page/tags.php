<?php
/**
 * Add Jupiter settings for Product Page > Styles > Tags tab to the WordPress Customizer.
 *
 * @package JupiterX\Framework\Admin\Customizer
 *
 * @since   1.0.0
 */

$section = 'jupiterx_product_page_tags';

// Title.
JupiterX_Customizer::add_field( [
	'type'       => 'jupiterx-typography',
	'settings'   => 'jupiterx_product_page_tags_title_typography',
	'section'    => $section,
	'responsive' => true,
	'css_var'    => 'product-page-tags-title',
	'label'      => __( 'Title', 'jupiterx' ),
	'transport'  => 'postMessage',
	'exclude'    => [ 'line_height' ],
	'output'     => [
		[
			'element' => '.single-product div.product .product_meta span.tagged_as .jupiterx-product-tag-title',
		],
	],
] );

// Divider.
JupiterX_Customizer::add_field( [
	'type'     => 'jupiterx-divider',
	'settings' => 'jupiterx_product_page_tags_divider_1',
	'section'  => $section,
] );

// Typography.
JupiterX_Customizer::add_field( [
	'type'       => 'jupiterx-typography',
	'settings'   => 'jupiterx_product_page_tags_text_typography',
	'section'    => $section,
	'responsive' => true,
	'css_var'    => 'product-page-tags-text',
	'label'      => __( 'Text', 'jupiterx' ),
	'transport'  => 'postMessage',
	'exclude'    => [ 'line_height', 'text_transform' ],
	'output'     => [
		[
			'element' => '.single-product div.product .product_meta span.tagged_as span.product-tags, .single-product div.product .product_meta span.tagged_as a',
		],
	],
] );

// Divider.
JupiterX_Customizer::add_field( [
	'type'     => 'jupiterx-divider',
	'settings' => 'jupiterx_product_page_tags_divider_2',
	'section'  => $section,
] );

// Spacing.
JupiterX_Customizer::add_responsive_field( [
	'type'      => 'jupiterx-box-model',
	'settings'  => 'jupiterx_product_page_tags_spacing',
	'section'   => $section,
	'css_var'   => 'product-page-tags',
	'transport' => 'postMessage',
	'exclude'   => [ 'padding' ],
	'output'    => [
		[
			'element' => '.single-product div.product .product_meta span.tagged_as',
		],
	],
] );
