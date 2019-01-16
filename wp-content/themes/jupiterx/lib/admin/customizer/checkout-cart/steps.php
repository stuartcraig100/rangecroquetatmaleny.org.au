<?php
/**
 * Add Jupiter settings for Checkout & Cart > Styles > Steps tab to the WordPress Customizer.
 *
 * @package JupiterX\Framework\Admin\Customizer
 *
 * @since   1.0.0
 */

$section = 'jupiterx_checkout_cart_steps';

// Number.
JupiterX_Customizer::add_field( [
	'type'     => 'jupiterx-label',
	'label'    => __( 'Number', 'jupiterx' ),
	'settings' => 'jupiterx_checkout_cart_steps_label',
	'section'  => $section,
] );

// Typography.
JupiterX_Customizer::add_responsive_field( [
	'type'      => 'jupiterx-typography',
	'settings'  => 'jupiterx_checkout_cart_steps_number_typography',
	'section'   => $section,
	'css_var'   => 'checkout-cart-steps-number',
	'transport' => 'postMessage',
	'exclude'   => [ 'letter_spacing', 'line_height', 'text_transform' ],
	'default'   => [
		'desktop' => [
			'color' => '#fff',
		],
	],
	'output'    => [
		[
			'element' => '.jupiterx-wc-step-number',
		],
	],
] );

// Background color.
JupiterX_Customizer::add_field( [
	'type'      => 'jupiterx-color',
	'settings'  => 'jupiterx_checkout_cart_steps_number_background_color',
	'section'   => $section,
	'css_var'   => 'checkout-cart-steps-number-bg-color',
	'column'    => '3',
	'icon'      => 'background-color',
	'transport' => 'postMessage',
	'default'   => '#adb5bd',
	'output'    => [
		[
			'element'  => '.jupiterx-wc-step-number',
			'property' => 'background-color',
		],
	],
] );

// Divider.
JupiterX_Customizer::add_field( [
	'type'     => 'jupiterx-divider',
	'settings' => 'jupiterx_checkout_cart_steps_divider',
	'section'  => $section,
] );

// Title.
JupiterX_Customizer::add_field( [
	'type'     => 'jupiterx-label',
	'label'    => __( 'Title', 'jupiterx' ),
	'settings' => 'jupiterx_checkout_cart_steps_label_2',
	'section'  => $section,
] );

// Typography.
JupiterX_Customizer::add_responsive_field( [
	'type'      => 'jupiterx-typography',
	'settings'  => 'jupiterx_checkout_cart_steps_title_typography',
	'section'   => $section,
	'css_var'   => 'checkout-cart-steps-title',
	'transport' => 'postMessage',
	'exclude'   => [ 'line_height', 'text_transform' ],
	'default'   => [
		'desktop' => [
			'color'     => '#adb5bd',
			'font_size' => [
				'size' => 1.25,
				'unit' => 'rem',
			],
		],
	],
	'output'    => [
		[
			'element' => '.jupiterx-wc-step-title',
		],
	],
] );

// Divider.
JupiterX_Customizer::add_field( [
	'type'     => 'jupiterx-divider',
	'settings' => 'jupiterx_checkout_cart_steps_divider_2',
	'section'  => $section,
] );

// Spacing.
JupiterX_Customizer::add_responsive_field( [
	'type'      => 'jupiterx-box-model',
	'settings'  => 'jupiterx_checkout_cart_steps_spacing',
	'section'   => $section,
	'css_var'   => 'checkout-cart-steps',
	'transport' => 'postMessage',
	'exclude'   => [ 'padding' ],
	'default'   => [
		'desktop' => [
			'margin_bottom' => 1.5,
			jupiterx_get_direction( 'margin_right' ) => 1.5,
		],
	],
	'output'    => [
		[
			'element' => '.jupiterx-wc-step',
		],
	],
] );

// Active label.
JupiterX_Customizer::add_field( [
	'type'       => 'jupiterx-label',
	'label'      => __( 'Active', 'jupiterx' ),
	'label_type' => 'fancy',
	'color'      => 'green',
	'settings'   => 'jupiterx_checkout_cart_steps_label_3',
	'section'    => $section,
] );

// Number.
JupiterX_Customizer::add_field( [
	'type'     => 'jupiterx-label',
	'label'    => __( 'Number', 'jupiterx' ),
	'settings' => 'jupiterx_checkout_cart_steps_label_4',
	'section'  => $section,
] );

// Color.
JupiterX_Customizer::add_field( [
	'type'      => 'jupiterx-color',
	'settings'  => 'jupiterx_checkout_cart_steps_number_color_active',
	'section'   => $section,
	'css_var'   => 'checkout-cart-steps-number-color-active',
	'column'    => '3',
	'icon'      => 'font-color',
	'transport' => 'postMessage',

	'output'    => [
		[
			'element'  => '.jupiterx-wc-step-active .jupiterx-wc-step-number',
			'property' => 'color',
		],
	],
] );

// Background color.
JupiterX_Customizer::add_field( [
	'type'      => 'jupiterx-color',
	'settings'  => 'jupiterx_checkout_cart_steps_number_background_color_active',
	'section'   => $section,
	'css_var'   => 'checkout-cart-steps-number-bg-color-active',
	'column'    => '3',
	'icon'      => 'background-color',
	'transport' => 'postMessage',
	'default'   => '#007bff',
	'output'    => [
		[
			'element'  => '.jupiterx-wc-step-active .jupiterx-wc-step-number',
			'property' => 'background-color',
		],
	],
] );

// Divider.
JupiterX_Customizer::add_field( [
	'type'     => 'jupiterx-divider',
	'settings' => 'jupiterx_checkout_cart_steps_divider_3',
	'section'  => $section,
] );

// Title.
JupiterX_Customizer::add_field( [
	'type'     => 'jupiterx-label',
	'label'    => __( 'Title', 'jupiterx' ),
	'settings' => 'jupiterx_checkout_cart_steps_label_5',
	'section'  => $section,
] );

// Color.
JupiterX_Customizer::add_field( [
	'type'      => 'jupiterx-color',
	'settings'  => 'jupiterx_checkout_cart_steps_title_color_active',
	'section'   => $section,
	'css_var'   => 'checkout-cart-steps-title-color-active',
	'column'    => '3',
	'icon'      => 'font-color',
	'transport' => 'postMessage',
	'default'   => '#212529',
	'output'    => [
		[
			'element'  => '.jupiterx-wc-step-active .jupiterx-wc-step-title',
			'property' => 'color',
		],
	],
] );
