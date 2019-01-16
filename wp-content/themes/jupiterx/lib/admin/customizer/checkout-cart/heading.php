<?php
/**
 * Add Jupiter settings for Checkout & Cart > Styles > Heading tab to the WordPress Customizer.
 *
 * @package JupiterX\Framework\Admin\Customizer
 *
 * @since   1.0.0
 */

$section = 'jupiterx_checkout_cart_heading';

// Typography.
JupiterX_Customizer::add_field( [
	'type'       => 'jupiterx-typography',
	'settings'   => 'jupiterx_checkout_cart_heading_typography',
	'section'    => $section,
	'responsive' => true,
	'css_var'    => 'checkout-cart-heading',
	'transport'  => 'postMessage',
	'exclude'    => [ 'line_height' ],
	'output'     => [
		[
			'element' => '.woocommerce-cart .woocommerce h2:not(.woocommerce-loop-product__title), .woocommerce-checkout .woocommerce h3',
		],
	],
] );

// Divider.
JupiterX_Customizer::add_field( [
	'type'     => 'jupiterx-divider',
	'settings' => 'jupiterx_checkout_cart_heading_divider',
	'section'  => $section,
] );

// Spacing.
JupiterX_Customizer::add_responsive_field( [
	'type'      => 'jupiterx-box-model',
	'settings'  => 'jupiterx_checkout_cart_heading_spacing',
	'section'   => $section,
	'css_var'   => 'checkout-cart-heading',
	'transport' => 'postMessage',
	'exclude'   => [ 'padding' ],
	'output'    => [
		[
			'element' => '.woocommerce-cart .woocommerce h2:not(.woocommerce-loop-product__title), .woocommerce-checkout .woocommerce h3',
		],
	],
] );
