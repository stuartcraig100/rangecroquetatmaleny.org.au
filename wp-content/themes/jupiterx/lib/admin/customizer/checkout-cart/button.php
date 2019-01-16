<?php
/**
 * Add Jupiter settings for Checkout & Cart > Styles > Button tab to the WordPress Customizer.
 *
 * @package JupiterX\Framework\Admin\Customizer
 *
 * @since   1.0.0
 */

$section = 'jupiterx_checkout_cart_button';

// Typography.
JupiterX_Customizer::add_field( [
	'type'       => 'jupiterx-typography',
	'settings'   => 'jupiterx_checkout_cart_button_typography',
	'section'    => $section,
	'responsive' => true,
	'css_var'    => 'checkout-cart-button',
	'exclude'    => [ 'line_height' ],
	'transport'  => 'postMessage',
	'output'     => [
		[
			'element' => '.woocommerce-cart .woocommerce button.button, .woocommerce-cart .woocommerce a.button.alt, .woocommerce-checkout .woocommerce button.button',
		],
	],
] );

// Background Color.
JupiterX_Customizer::add_field( [
	'type'      => 'jupiterx-color',
	'settings'  => 'jupiterx_checkout_cart_button_background_color',
	'section'   => $section,
	'css_var'   => 'checkout-cart-button-background-color',
	'icon'      => 'background-color',
	'transport' => 'postMessage',
	'output'    => [
		[
			'element'  => '.woocommerce-cart .woocommerce button.button, .woocommerce-cart .woocommerce a.button.alt, .woocommerce-checkout .woocommerce button.button',
			'property' => 'background-color',
		],
	],
] );

// Border.
JupiterX_Customizer::add_field( [
	'type'      => 'jupiterx-border',
	'settings'  => 'jupiterx_checkout_cart_button_border',
	'section'   => $section,
	'css_var'   => 'checkout-cart-button-border',
	'transport' => 'postMessage',
	'exclude'   => [ 'style', 'size' ],
	'output'    => [
		[
			'element' => '.woocommerce-cart .woocommerce button.button, .woocommerce-cart .woocommerce a.button.alt, .woocommerce-checkout .woocommerce button.button',
		],
	],
] );

// Hover label.
JupiterX_Customizer::add_field( [
	'type'       => 'jupiterx-label',
	'label'      => __( 'Hover', 'jupiterx' ),
	'label_type' => 'fancy',
	'color'      => 'orange',
	'settings'   => 'jupiterx_checkout_cart_button_label_1',
	'section'    => $section,
] );

// Text color.
JupiterX_Customizer::add_field( [
	'type'      => 'jupiterx-color',
	'settings'  => 'jupiterx_checkout_cart_button_text_color_hover',
	'section'   => $section,
	'css_var'   => 'checkout-cart-button-text-color-hover',
	'column'    => '3',
	'icon'      => 'font-color',
	'transport' => 'postMessage',
	'output'    => [
		[
			'element'  => '.woocommerce-cart .woocommerce button.button:hover, .woocommerce-cart .woocommerce a.button.alt:hover, .woocommerce-checkout .woocommerce button.button:hover',
			'property' => 'color',
		],
	],
] );

// Background color.
JupiterX_Customizer::add_field( [
	'type'      => 'jupiterx-color',
	'settings'  => 'jupiterx_checkout_cart_button_background_color_hover',
	'section'   => $section,
	'css_var'   => 'checkout-cart-button-background-color-hover',
	'column'    => '3',
	'icon'      => 'background-color',
	'transport' => 'postMessage',
	'output'    => [
		[
			'element'  => '.woocommerce-cart .woocommerce button.button:hover, .woocommerce-cart .woocommerce a.button.alt:hover, .woocommerce-checkout .woocommerce button.button:hover',
			'property' => 'background-color',
		],
	],
] );

// Border color.
JupiterX_Customizer::add_field( [
	'type'      => 'jupiterx-color',
	'settings'  => 'jupiterx_checkout_cart_button_border_color_hover',
	'section'   => $section,
	'css_var'   => 'checkout-cart-button-border-color-hover',
	'column'    => '3',
	'icon'      => 'border-color',
	'transport' => 'postMessage',
	'output'    => [
		[
			'element'  => '.woocommerce-cart .woocommerce button.button:hover, .woocommerce-cart .woocommerce a.button.alt:hover, .woocommerce-checkout .woocommerce button.button:hover',
			'property' => 'border-color',
		],
	],
] );

// Divider.
JupiterX_Customizer::add_field( [
	'type'     => 'jupiterx-divider',
	'settings' => 'jupiterx_checkout_cart_button_divider_3',
	'section'  => $section,
] );

// Spacing.
JupiterX_Customizer::add_responsive_field( [
	'type'      => 'jupiterx-box-model',
	'settings'  => 'jupiterx_checkout_cart_button_spacing',
	'section'   => $section,
	'css_var'   => 'checkout-cart-button',
	'transport' => 'postMessage',
	'output'    => [
		[
			'element' => '.woocommerce-cart .woocommerce button.button, .woocommerce-cart .woocommerce button.button:disabled, .woocommerce-cart .woocommerce button.button:disabled[disabled], .woocommerce-cart .woocommerce a.button.alt, .woocommerce-checkout .woocommerce button.button',
		],
	],
] );
