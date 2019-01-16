<?php
/**
 * Add Jupiter settings for Product Page > Styles > Regular Price tab to the WordPress Customizer.
 *
 * @package JupiterX\Framework\Admin\Customizer
 *
 * @since   1.0.0
 */

$section = 'jupiterx_product_page_regular_price';

// Typography.
JupiterX_Customizer::add_field( [
	'type'       => 'jupiterx-typography',
	'settings'   => 'jupiterx_product_page_regular_price_typography',
	'section'    => $section,
	'responsive' => true,
	'css_var'    => 'product-page-regular-price',
	'transport'  => 'postMessage',
	'exclude'    => [ 'text_transform', 'line_height' ],
	'output'     => [
		[
			'element' => '.single-product div.product .summary p.price, .single-product div.product .summary span.price',
		],
	],
] );

// Text decoration.
JupiterX_Customizer::add_field( [
	'type'      => 'jupiterx-select',
	'settings'  => 'jupiterx_product_page_regular_price_text_decoration',
	'section'   => $section,
	'css_var'   => 'product-page-regular-price-text-decoration',
	'column'    => '5',
	'icon'      => 'text-decoration',
	'default'   => 'none',
	'choices'   => JupiterX_Customizer_Utils::get_text_decoration_choices(),
	'transport' => 'postMessage',
	'output'    => [
		[
			'element' => '.single-product div.product .summary p.price > span, .single-product div.product .summary span.price > span',
			'property' => 'text-decoration',
		],
	],
] );

// Divider.
JupiterX_Customizer::add_field( [
	'type'     => 'jupiterx-divider',
	'settings' => 'jupiterx_product_page_regular_price_divider',
	'section'  => $section,
] );

// Spacing.
JupiterX_Customizer::add_responsive_field( [
	'type'      => 'jupiterx-box-model',
	'settings'  => 'jupiterx_product_page_regular_price_spacing',
	'section'   => $section,
	'css_var'   => 'product-page-regular-price',
	'transport' => 'postMessage',
	'exclude'   => [ 'padding' ],
	'output'    => [
		[
			'element' => '.single-product div.product .summary p.price, .single-product div.product .summary span.price',
		],
	],
] );
