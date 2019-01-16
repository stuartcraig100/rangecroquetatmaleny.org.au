<?php
/**
 * Add Jupiter settings for Product List > Styles > Sale Badge tab to the WordPress Customizer.
 *
 * @package JupiterX\Framework\Admin\Customizer
 *
 * @since   1.0.0
 */

$section = 'jupiterx_product_list_sale_badge';

// Typography.
JupiterX_Customizer::add_field( [
	'type'       => 'jupiterx-typography',
	'settings'   => 'jupiterx_product_list_sale_badge_typography',
	'section'    => $section,
	'responsive' => true,
	'css_var'    => 'product-list-sale-badge',
	'transport'  => 'postMessage',
	'exclude'    => [ 'line_height', 'text_transform', 'letter_spacing' ],
	'output'     => [
		[
			'element' => '.woocommerce ul.products li.product .onsale',
		],
	],
] );

// Background Color.
JupiterX_Customizer::add_field( [
	'type'      => 'jupiterx-color',
	'settings'  => 'jupiterx_product_list_sale_badge_background_color',
	'section'   => $section,
	'css_var'   => 'product-list-sale-badge-background-color',
	'icon'      => 'background-color',
	'transport' => 'postMessage',
	'output'    => [
		[
			'element'  => '.woocommerce ul.products li.product .onsale',
			'property' => 'background-color',
		],
	],
] );

// Border.
JupiterX_Customizer::add_field( [
	'type'      => 'jupiterx-border',
	'settings'  => 'jupiterx_product_list_sale_badge_border',
	'section'   => $section,
	'css_var'   => 'product-list-sale-badge-border',
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
			'element' => '.woocommerce ul.products li.product .onsale',
		],
	],
] );

// Divider.
JupiterX_Customizer::add_field( [
	'type'     => 'jupiterx-divider',
	'settings' => 'jupiterx_product_list_sale_badge_divider_3',
	'section'  => $section,
] );

// Spacing.
JupiterX_Customizer::add_responsive_field( [
	'type'      => 'jupiterx-box-model',
	'settings'  => 'jupiterx_product_list_sale_badge_spacing',
	'section'   => $section,
	'css_var'   => 'product-list-sale-badge',
	'transport' => 'postMessage',
	'output'    => [
		[
			'element' => '.woocommerce ul.products li.product .onsale',
		],
	],
] );
