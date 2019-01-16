<?php
/**
 * Add Jupiter settings for Product List > Styles > Add to Cart Button tab to the WordPress Customizer.
 *
 * @package JupiterX\Framework\Admin\Customizer
 *
 * @since   1.0.0
 */

$section = 'jupiterx_product_list_add_cart_button';

// Icon.
JupiterX_Customizer::add_field( [
	'type'      => 'jupiterx-toggle',
	'settings'  => 'jupiterx_product_list_add_cart_button_icon',
	'section'   => $section,
	'css_var'   => 'product-list-add-cart-button-icon',
	'label'     => __( 'Icon', 'jupiterx' ),
	'column'    => '3',
	'default'   => true,
	'transport' => 'postMessage',
	'output'    => [
		[
			'element'       => '.woocommerce ul.products li.product a.button:before',
			'property'      => 'display',
			'exclude'       => [ true ],
			'value_pattern' => 'none',
		],
		[
			'element'       => '.woocommerce ul.products li.product a.button:before',
			'property'      => 'display',
			'exclude'       => [ false ],
			'value_pattern' => 'inline',
		],
	],
] );

// Full width.
JupiterX_Customizer::add_field( [
	'type'      => 'jupiterx-toggle',
	'settings'  => 'jupiterx_product_list_add_cart_button_full_width',
	'section'   => $section,
	'css_var'   => 'product-list-add-cart-button-full-width',
	'label'     => __( 'Full Width', 'jupiterx' ),
	'column'    => '3',
	'transport' => 'postMessage',
	'output'    => [
		[
			'element'       => '.woocommerce ul.products li.product a.button',
			'property'      => 'width',
			'exclude'       => [ false ],
			'value_pattern' => '100',
			'units'         => '%',
		],
		[
			'element'       => '.woocommerce ul.products li.product a.button',
			'property'      => 'width',
			'exclude'       => [ true ],
			'value_pattern' => 'auto',
		],
	],
] );


// Typography.
JupiterX_Customizer::add_field( [
	'type'       => 'jupiterx-typography',
	'settings'   => 'jupiterx_product_list_add_cart_button_typography',
	'section'    => $section,
	'responsive' => true,
	'css_var'    => 'product-list-add-cart-button',
	'exclude'    => [ 'line_height' ],
	'transport'  => 'postMessage',
	'output'     => [
		[
			'element' => '.woocommerce ul.products li.product a.button',
		],
	],
] );

// Background Color.
JupiterX_Customizer::add_field( [
	'type'     => 'jupiterx-color',
	'settings' => 'jupiterx_product_list_add_cart_button_background_color',
	'section'  => $section,
	'css_var'  => 'product-list-add-cart-button-background-color',
	'icon'     => 'background-color',
	'transport' => 'postMessage',
	'output'   => [
		[
			'element'  => '.woocommerce ul.products li.product a.button',
			'property' => 'background-color',
		],
	],
] );

// Border.
JupiterX_Customizer::add_field( [
	'type'      => 'jupiterx-border',
	'settings'  => 'jupiterx_product_list_add_cart_button_border',
	'section'   => $section,
	'css_var'   => 'product-list-add-cart-button-border',
	'exclude'   => [ 'style', 'size' ],
	'transport' => 'postMessage',
	'output'    => [
		[
			'element' => '.woocommerce ul.products li.product a.button',
		],
	],
] );

// Hover label.
JupiterX_Customizer::add_field( [
	'type'       => 'jupiterx-label',
	'label'      => __( 'Hover', 'jupiterx' ),
	'label_type' => 'fancy',
	'color'      => 'orange',
	'settings' => 'jupiterx_product_list_add_cart_button_label_1',
	'section'  => $section,
] );

// Text color.
JupiterX_Customizer::add_field( [
	'type'      => 'jupiterx-color',
	'settings'  => 'jupiterx_product_list_add_cart_button_text_color_hover',
	'section'   => $section,
	'css_var'   => 'product-list-add-cart-button-text-color-hover',
	'column'    => '3',
	'icon'      => 'font-color',
	'transport' => 'postMessage',
	'output'    => [
		[
			'element'  => '.woocommerce ul.products li.product a.button:hover',
			'property' => 'color',
		],
	],
] );

// Background color.
JupiterX_Customizer::add_field( [
	'type'      => 'jupiterx-color',
	'settings'  => 'jupiterx_product_list_add_cart_button_background_color_hover',
	'section'   => $section,
	'css_var'   => 'product-list-add-cart-button-background-color-hover',
	'column'    => '3',
	'icon'      => 'background-color',
	'transport' => 'postMessage',
	'output'    => [
		[
			'element'  => '.woocommerce ul.products li.product a.button:hover',
			'property' => 'background-color',
		],
	],
] );

// Border color.
JupiterX_Customizer::add_field( [
	'type'      => 'jupiterx-color',
	'settings'  => 'jupiterx_product_list_add_cart_button_border_color_hover',
	'section'   => $section,
	'css_var'   => 'product-list-add-cart-button-border-color-hover',
	'column'    => '3',
	'icon'      => 'border-color',
	'transport' => 'postMessage',
	'output'    => [
		[
			'element'  => '.woocommerce ul.products li.product a.button:hover',
			'property' => 'border-color',
		],
	],
] );

// Divider.
JupiterX_Customizer::add_field( [
	'type'     => 'jupiterx-divider',
	'settings' => 'jupiterx_product_list_add_cart_button_divider_3',
	'section'  => $section,
] );

// Spacing.
JupiterX_Customizer::add_responsive_field( [
	'type'      => 'jupiterx-box-model',
	'settings'  => 'jupiterx_product_list_add_cart_button_spacing',
	'section'   => $section,
	'css_var'   => 'product-list-add-cart-button',
	'transport' => 'postMessage',
	'output'    => [
		[
			'element' => '.woocommerce ul.products li.product a.button',
		],
	],
	'default' => [
		'desktop' => [
			'margin_bottom' => 0.2,
		],
	],
] );
