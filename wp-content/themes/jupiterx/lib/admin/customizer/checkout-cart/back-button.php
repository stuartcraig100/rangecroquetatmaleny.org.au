<?php
/**
 * Add Jupiter settings for Checkout & Cart > Styles > Back Button tab to the WordPress Customizer.
 *
 * @package JupiterX\Framework\Admin\Customizer
 *
 * @since   1.0.0
 */

$section = 'jupiterx_checkout_cart_back_button';

// Typography.
JupiterX_Customizer::add_field( [
	'type'       => 'jupiterx-typography',
	'settings'   => 'jupiterx_checkout_cart_back_button_typography',
	'section'    => $section,
	'responsive' => true,
	'css_var'    => 'checkout-cart-back-button',
	'exclude'    => [ 'line_height' ],
	'transport'  => 'postMessage',
	'output'     => [
		[
			'element' => '.woocommerce-cart .woocommerce .jupiterx-continue-shopping, .woocommerce-checkout .woocommerce .jupiterx-continue-shopping',
		],
	],
] );

// Background Color.
JupiterX_Customizer::add_field( [
	'type'      => 'jupiterx-color',
	'settings'  => 'jupiterx_checkout_cart_back_button_background_color',
	'section'   => $section,
	'css_var'   => 'checkout-cart-back-button-background-color',
	'icon'      => 'background-color',
	'transport' => 'postMessage',
	'output'    => [
		[
			'element'  => '.woocommerce-cart .woocommerce .jupiterx-continue-shopping, .woocommerce-checkout .woocommerce .jupiterx-continue-shopping',
			'property' => 'background-color',
		],
	],
] );

// Border.
JupiterX_Customizer::add_field( [
	'type'      => 'jupiterx-border',
	'settings'  => 'jupiterx_checkout_cart_back_button_border',
	'section'   => $section,
	'css_var'   => 'checkout-cart-back-button-border',
	'transport' => 'postMessage',
	'exclude'   => [ 'style', 'size' ],
	'output'    => [
		[
			'element' => '.woocommerce-cart .woocommerce .jupiterx-continue-shopping, .woocommerce-checkout .woocommerce .jupiterx-continue-shopping',
		],
	],
] );

// Hover label.
JupiterX_Customizer::add_field( [
	'type'       => 'jupiterx-label',
	'label'      => __( 'Hover', 'jupiterx' ),
	'label_type' => 'fancy',
	'color'      => 'orange',
	'settings'   => 'jupiterx_checkout_cart_back_button_label_1',
	'section'    => $section,
] );

// Text color.
JupiterX_Customizer::add_field( [
	'type'      => 'jupiterx-color',
	'settings'  => 'jupiterx_checkout_cart_back_button_text_color_hover',
	'section'   => $section,
	'css_var'   => 'checkout-cart-back-button-text-color-hover',
	'column'    => '3',
	'icon'      => 'font-color',
	'transport' => 'postMessage',
	'output'    => [
		[
			'element'  => '.woocommerce-cart .woocommerce .jupiterx-continue-shopping:hover, .woocommerce-checkout .woocommerce .jupiterx-continue-shopping:hover',
			'property' => 'color',
		],
	],
] );

// Background color.
JupiterX_Customizer::add_field( [
	'type'      => 'jupiterx-color',
	'settings'  => 'jupiterx_checkout_cart_back_button_background_color_hover',
	'section'   => $section,
	'css_var'   => 'checkout-cart-back-button-background-color-hover',
	'column'    => '3',
	'icon'      => 'background-color',
	'transport' => 'postMessage',
	'output'    => [
		[
			'element'  => '.woocommerce-cart .woocommerce .jupiterx-continue-shopping:hover, .woocommerce-checkout .woocommerce .jupiterx-continue-shopping:hover',
			'property' => 'background-color',
		],
	],
] );

// Border color.
JupiterX_Customizer::add_field( [
	'type'      => 'jupiterx-color',
	'settings'  => 'jupiterx_checkout_cart_back_button_border_color_hover',
	'section'   => $section,
	'css_var'   => 'checkout-cart-back-button-border-color-hover',
	'column'    => '3',
	'icon'      => 'border-color',
	'transport' => 'postMessage',
	'output'    => [
		[
			'element'  => '.woocommerce-cart .woocommerce .jupiterx-continue-shopping:hover, .woocommerce-checkout .woocommerce .jupiterx-continue-shopping:hover',
			'property' => 'border-color',
		],
	],
] );

// Divider.
JupiterX_Customizer::add_field( [
	'type'     => 'jupiterx-divider',
	'settings' => 'jupiterx_checkout_cart_back_button_divider_3',
	'section'  => $section,
] );

// Spacing.
JupiterX_Customizer::add_responsive_field( [
	'type'      => 'jupiterx-box-model',
	'settings'  => 'jupiterx_checkout_cart_back_button_spacing',
	'section'   => $section,
	'css_var'   => 'checkout-cart-back-button',
	'transport' => 'postMessage',
	'default'   => [
		'desktop' => [
			jupiterx_get_direction( 'margin_right' ) => .75,
		],
	],
	'output'    => [
		[
			'element' => '.woocommerce-cart .woocommerce .jupiterx-continue-shopping, .woocommerce-checkout .woocommerce .jupiterx-continue-shopping',
		],
	],
] );
