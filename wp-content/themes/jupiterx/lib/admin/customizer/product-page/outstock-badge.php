<?php
/**
 * Add Jupiter settings for Product Page > Styles > Out of Stock Badge tab to the WordPress Customizer.
 *
 * @package JupiterX\Framework\Admin\Customizer
 *
 * @since   1.0.0
 */

$section = 'jupiterx_product_page_outstock_badge';

// Typography.
JupiterX_Customizer::add_field( [
	'type'       => 'jupiterx-typography',
	'settings'   => 'jupiterx_product_page_outstock_badge_typography',
	'section'    => $section,
	'responsive' => true,
	'css_var'    => 'product-page-outstock-badge',
	'transport'  => 'postMessage',
	'exclude'    => [ 'line_height' ],
	'output'     => [
		[
			'element' => '.single-product div.product .jupiterx-product-badges .jupiterx-out-of-stock',
		],
	],
] );

// Background Color.
JupiterX_Customizer::add_field( [
	'type'      => 'jupiterx-color',
	'settings'  => 'jupiterx_product_page_outstock_badge_background_color',
	'section'   => $section,
	'css_var'   => 'product-page-outstock-badge-background-color',
	'icon'      => 'background-color',
	'transport' => 'postMessage',
	'output'    => [
		[
			'element'  => '.single-product div.product .jupiterx-product-badges .jupiterx-out-of-stock',
			'property' => 'background-color',
		],
	],
] );

// Border.
JupiterX_Customizer::add_field( [
	'type'      => 'jupiterx-border',
	'settings'  => 'jupiterx_product_page_outstock_badge_border',
	'section'   => $section,
	'css_var'   => 'product-page-outstock-badge-border',
	'transport' => 'postMessage',
	'exclude'   => [ 'style', 'size' ],
	'default'   => [
		'width'  => [
			'size' => '0',
			'unit' => 'px',
		],
		'radius' => [
			'size' => 4,
			'unit' => 'px',
		],
	],
	'output'    => [
		[
			'element' => '.single-product div.product .jupiterx-product-badges .jupiterx-out-of-stock',
		],
	],
] );

// Divider.
JupiterX_Customizer::add_field( [
	'type'     => 'jupiterx-divider',
	'settings' => 'jupiterx_product_page_outstock_badge_divider_3',
	'section'  => $section,
] );

// Spacing.
JupiterX_Customizer::add_responsive_field( [
	'type'      => 'jupiterx-box-model',
	'settings'  => 'jupiterx_product_page_outstock_badge_spacing',
	'section'   => $section,
	'css_var'   => 'product-page-outstock-badge',
	'transport' => 'postMessage',
	'default'   => [
		'desktop' => [
			'margin_bottom' => 1.5,
		],
	],
	'output'    => [
		[
			'element' => '.single-product div.product .jupiterx-product-badges .jupiterx-out-of-stock',
		],
	],
] );
