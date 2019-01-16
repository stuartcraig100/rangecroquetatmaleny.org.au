<?php
/**
 * Add Jupiter settings for Product List > Styles > Sale Price tab to the WordPress Customizer.
 *
 * @package JupiterX\Framework\Admin\Customizer
 *
 * @since   1.0.0
 */

$section = 'jupiterx_product_list_sale_price';

// Typography.
JupiterX_Customizer::add_field( [
	'type'       => 'jupiterx-typography',
	'settings'   => 'jupiterx_product_list_sale_price_typography',
	'section'    => $section,
	'responsive' => true,
	'css_var'    => 'product-list-sale-price',
	'transport'  => 'postMessage',
	'exclude'    => [ 'text_transform', 'line_height', 'letter_spacing' ],
	'output'     => [
		[
			'element' => '.woocommerce ul.products li.product .price ins',
		],
	],
] );

// Text decoration.
JupiterX_Customizer::add_field( [
	'type'      => 'jupiterx-select',
	'settings'  => 'jupiterx_product_list_sale_price_text_decoration',
	'section'   => $section,
	'css_var'   => 'product-list-sale-price-text-decoration',
	'column'    => '5',
	'icon'      => 'text-decoration',
	'default'   => 'none',
	'choices'   => JupiterX_Customizer_Utils::get_text_decoration_choices(),
	'transport' => 'postMessage',
	'output'    => [
		[
			'element' => '.woocommerce ul.products li.product .price ins',
			'property' => 'text-decoration',
		],
	],
] );

// Divider.
JupiterX_Customizer::add_field( [
	'type'     => 'jupiterx-divider',
	'settings' => 'jupiterx_product_list_sale_price_divider',
	'section'  => $section,
] );

// Spacing.
JupiterX_Customizer::add_responsive_field( [
	'type'      => 'jupiterx-box-model',
	'settings'  => 'jupiterx_product_list_sale_price_spacing',
	'section'   => $section,
	'css_var'   => 'product-list-sale-price',
	'transport' => 'postMessage',
	'exclude'   => [ 'padding' ],
	'output'    => [
		[
			'element' => '.woocommerce ul.products li.product .price ins',
		],
	],
] );
