<?php
/**
 * Add Jupiter settings for Product List > Styles > Name tab to the WordPress Customizer.
 *
 * @package JupiterX\Framework\Admin\Customizer
 *
 * @since   1.0.0
 */

$section = 'jupiterx_product_list_name';

// Typography.
JupiterX_Customizer::add_field( [
	'type'       => 'jupiterx-typography',
	'settings'   => 'jupiterx_product_list_name_typography',
	'section'    => $section,
	'responsive' => true,
	'css_var'    => 'product-list-name',
	'transport'  => 'postMessage',
	'exclude'    => [ 'text_transform', 'line_height', 'letter_spacing' ],
	'output'     => [
		[
			'element' => '.woocommerce ul.products li.product .woocommerce-loop-product__title',
		],
	],
] );

// Divider.
JupiterX_Customizer::add_field( [
	'type'     => 'jupiterx-divider',
	'settings' => 'jupiterx_product_list_name_divider',
	'section'  => $section,
] );

// Spacing.
JupiterX_Customizer::add_responsive_field( [
	'type'      => 'jupiterx-box-model',
	'settings'  => 'jupiterx_product_list_name_spacing',
	'section'   => $section,
	'css_var'   => 'product-list-name',
	'transport' => 'postMessage',
	'exclude'   => [ 'padding' ],
	'output'    => [
		[
			'element' => '.woocommerce ul.products li.product .woocommerce-loop-product__title',
		],
	],
] );
