<?php
/**
 * Add Jupiter settings for Checkout & Cart > Styles > Field tab to the WordPress Customizer.
 *
 * @package JupiterX\Framework\Admin\Customizer
 *
 * @since   1.0.0
 */

$section = 'jupiterx_checkout_cart_field';

// Typography.
JupiterX_Customizer::add_field( [
	'type'       => 'jupiterx-typography',
	'settings'   => 'jupiterx_checkout_cart_field_typography',
	'section'    => $section,
	'responsive' => true,
	'css_var'    => 'checkout-cart-field',
	'transport'  => 'postMessage',
	'exclude'    => [ 'line_height', 'text_transform' ],
	'output'     => [
		[
			'element' => '.woocommerce-cart table.cart td.actions .coupon .input-text',
		],
		[
			'element' => '.woocommerce form .form-row input.input-text, .woocommerce form .form-row textarea, .woocommerce form .form-row .select2-container--default .select2-selection--single .select2-selection__rendered',
		],
	],
] );

// Focus label.
JupiterX_Customizer::add_field( [
	'type'       => 'jupiterx-label',
	'label'      => __( 'Focus', 'jupiterx' ),
	'label_type' => 'fancy',
	'color'      => 'blue',
	'settings'   => 'jupiterx_checkout_cart_field_label_focus',
	'section'    => $section,
] );

// Text color.
JupiterX_Customizer::add_field( [
	'type'      => 'jupiterx-color',
	'settings'  => 'jupiterx_checkout_cart_field_text_color_focus',
	'section'   => $section,
	'css_var'   => 'checkout-cart-field-color-focus',
	'column'    => '3',
	'icon'      => 'font-color',
	'transport' => 'postMessage',
	'output'    => [
		[
			'element'  => '.woocommerce-cart table.cart td.actions .coupon .input-text:focus',
			'property' => 'color',
		],
		[
			'element'  => '.woocommerce form .form-row input.input-text:focus, .woocommerce form .form-row textarea:focus',
			'property' => 'color',
		],
	],
] );

// Background color.
JupiterX_Customizer::add_field( [
	'type'      => 'jupiterx-color',
	'settings'  => 'jupiterx_checkout_cart_field_background_color_focus',
	'section'   => $section,
	'css_var'   => 'checkout-cart-field-background-color-focus',
	'column'    => '3',
	'icon'      => 'background-color',
	'transport' => 'postMessage',
	'output'    => [
		[
			'element'  => '.woocommerce-cart table.cart td.actions .coupon .input-text:focus',
			'property' => 'background-color',
		],
		[
			'element'  => '.woocommerce form .form-row input.input-text:focus, .woocommerce form .form-row textarea:focus',
			'property' => 'background-color',
		],
	],
] );

// Border color.
JupiterX_Customizer::add_field( [
	'type'      => 'jupiterx-color',
	'settings'  => 'jupiterx_checkout_cart_field_border_color_focus',
	'section'   => $section,
	'css_var'   => 'checkout-cart-field-border-color-focus',
	'column'    => '3',
	'icon'      => 'border-color',
	'transport' => 'postMessage',
	'output'    => [
		[
			'element'  => '.woocommerce-cart table.cart td.actions .coupon .input-text:focus',
			'property' => 'border-color',
		],
		[
			'element'  => '.woocommerce form .form-row input.input-text:focus, .woocommerce form .form-row textarea:focus',
			'property' => 'border-color',
		],
	],
] );

// Divider.
JupiterX_Customizer::add_field( [
	'type'     => 'jupiterx-divider',
	'settings' => 'jupiterx_checkout_cart_field_divider',
	'section'  => $section,
] );

// Spacing.
JupiterX_Customizer::add_responsive_field( [
	'type'      => 'jupiterx-box-model',
	'settings'  => 'jupiterx_checkout_cart_field_spacing',
	'section'   => $section,
	'css_var'   => 'checkout-cart-field',
	'transport' => 'postMessage',
	'output'    => [
		[
			'element'  => '.woocommerce-cart table.cart td.actions .coupon .input-text',
		],
		[
			'element' => '.woocommerce form .form-row input.input-text, .woocommerce form .form-row textarea, .woocommerce form .form-row .select2-container--default .select2-selection--single .select2-selection__rendered',
		],
	],
] );
