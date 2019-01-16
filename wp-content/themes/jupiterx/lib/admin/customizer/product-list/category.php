<?php
/**
 * Add Jupiter settings for Product List > Styles > Name tab to the WordPress Customizer.
 *
 * @package JupiterX\Framework\Admin\Customizer
 *
 * @since   1.0.0
 */

$section = 'jupiterx_product_list_category';

// Text typography.
JupiterX_Customizer::add_responsive_field( [
	'type'      => 'jupiterx-typography',
	'settings'  => 'jupiterx_product_list_category_typography',
	'section'   => $section,
	'css_var'   => 'product-list-category',
	'label'     => __( 'Text', 'jupiterx' ),
	'exclude'   => [ 'line_height', 'text_transform', 'letter_spacing' ],
	'transport' => 'postMessage',
	'default'   => [
		'desktop' => [
			'color' => '#212526',
		],
	],
	'output'    => [
		[
			'element' => '.woocommerce ul.products li.product span.posted_in',
		],
	],
] );

// Divider.
JupiterX_Customizer::add_field( [
	'type'     => 'jupiterx-divider',
	'settings' => 'jupiterx_product_list_category_divider_2',
	'section'  => $section,
] );

// Spacing.
JupiterX_Customizer::add_responsive_field( [
	'type'     => 'jupiterx-box-model',
	'settings' => 'jupiterx_product_list_category_spacing',
	'section'  => $section,
	'css_var'  => 'product-list-category',
	'exclude'  => [ 'padding' ],
	'transport'  => 'postMessage',
	'output'   => [
		[
			'element' => '.woocommerce ul.products li.product span.posted_in',
		],
	],
] );
