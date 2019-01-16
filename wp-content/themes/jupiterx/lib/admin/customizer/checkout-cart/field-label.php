<?php
/**
 * Add Jupiter settings for Checkout & Cart > Styles > Field Label tab to the WordPress Customizer.
 *
 * @package JupiterX\Framework\Admin\Customizer
 *
 * @since   1.0.0
 */

$section = 'jupiterx_checkout_cart_field_label';

// Typography.
JupiterX_Customizer::add_field( [
	'type'       => 'jupiterx-typography',
	'settings'   => 'jupiterx_checkout_cart_field_label_typography',
	'section'    => $section,
	'responsive' => true,
	'css_var'    => 'checkout-cart-field-label',
	'transport'  => 'postMessage',
	'exclude'    => [ 'line_height' ],
	'output'     => [
		[
			'element' => '.woocommerce-checkout .woocommerce .form-row label',
		],
	],
] );

// Divider.
JupiterX_Customizer::add_field( [
	'type'     => 'jupiterx-divider',
	'settings' => 'jupiterx_checkout_cart_field_label_divider',
	'section'  => $section,
] );

// Spacing.
JupiterX_Customizer::add_responsive_field( [
	'type'      => 'jupiterx-box-model',
	'settings'  => 'jupiterx_checkout_cart_field_label_spacing',
	'section'   => $section,
	'css_var'   => 'checkout-cart-field-label',
	'transport' => 'postMessage',
	'exclude'   => [ 'padding' ],
	'output'    => [
		[
			'element' => '.woocommerce-checkout .woocommerce .form-row label',
		],
	],
] );
