<?php
/**
 * Add Jupiter settings for Product Page > Styles > Variations tab to the WordPress Customizer.
 *
 * @package JupiterX\Framework\Admin\Customizer
 *
 * @since   1.0.0
 */

$section = 'jupiterx_product_page_variations';

// Title.
JupiterX_Customizer::add_field( [
	'type'       => 'jupiterx-typography',
	'settings'   => 'jupiterx_product_page_variations_title_typography',
	'section'    => $section,
	'responsive' => true,
	'css_var'    => 'product-page-variations-title',
	'label'      => __( 'Title', 'jupiterx' ),
	'transport'  => 'postMessage',
	'exclude'    => [ 'line_height' ],
	'output'     => [
		[
			'element' => '.woocommerce div.product form.cart .variations label',
		],
	],
] );

// Divider.
JupiterX_Customizer::add_field( [
	'type'     => 'jupiterx-divider',
	'settings' => 'jupiterx_product_page_variations_divider_1',
	'section'  => $section,
] );

// Box.
JupiterX_Customizer::add_field( [
	'type'       => 'jupiterx-typography',
	'settings'   => 'jupiterx_product_page_variations_select_typography',
	'section'    => $section,
	'responsive' => true,
	'css_var'    => 'product-page-variations-select',
	'label'      => __( 'Box', 'jupiterx' ),
	'transport'  => 'postMessage',
	'exclude'    => [ 'line_height' ],
	'output'     => [
		[
			'element' => '.woocommerce div.product form.cart .variations select',
		],
	],
] );

// Box Background Color.
JupiterX_Customizer::add_field( [
	'type'      => 'jupiterx-color',
	'settings'  => 'jupiterx_product_page_variations_select_background_color',
	'section'   => $section,
	'css_var'   => 'product-page-variations-select-background-color',
	'icon'      => 'background-color',
	'transport' => 'postMessage',
	'output'    => [
		[
			'element' => '.woocommerce div.product form.cart .variations select, .woocommerce div.product form.cart .variations .btn',
			'property' => 'background-color',
		],
	],
] );

// Box Border.
JupiterX_Customizer::add_field( [
	'type'      => 'jupiterx-border',
	'settings'  => 'jupiterx_product_page_variations_select_border',
	'section'   => $section,
	'css_var'   => 'product-page-variations-select-border',
	'transport' => 'postMessage',
	'exclude'   => [ 'style', 'size' ],
	'output'    => [
		[
			'element' => '.woocommerce div.product form.cart .variations select, .woocommerce div.product form.cart .variations .btn',
		],
	],
] );

// Spacing.
JupiterX_Customizer::add_responsive_field( [
	'type'      => 'jupiterx-box-model',
	'settings'  => 'jupiterx_product_page_variations_select_spacing',
	'section'   => $section,
	'css_var'   => 'product-page-variations-select',
	'transport' => 'postMessage',
	'exclude'   => [ 'margin' ],
	'output'    => [
		[
			'element' => '.woocommerce div.product form.cart .variations select, .woocommerce div.product form.cart .variations .btn',
		],
	],
] );

// Divider.
JupiterX_Customizer::add_field( [
	'type'     => 'jupiterx-divider',
	'settings' => 'jupiterx_product_page_variations_divider_2',
	'section'  => $section,
] );

// Spacing.
JupiterX_Customizer::add_responsive_field( [
	'type'      => 'jupiterx-box-model',
	'settings'  => 'jupiterx_product_page_variations_spacing',
	'section'   => $section,
	'css_var'   => 'product-page-variations',
	'transport' => 'postMessage',
	'exclude'   => [ 'padding' ],
	'output'    => [
		[
			'element' => '.woocommerce div.product form.cart .variations',
		],
	],
] );
