<?php
/**
 * Add Jupiter settings for Product List > Styles > Rating tab to the WordPress Customizer.
 *
 * @package JupiterX\Framework\Admin\Customizer
 *
 * @since   1.0.0
 */

$section = 'jupiterx_product_list_rating';

// Label.
JupiterX_Customizer::add_field( [
	'type'     => 'jupiterx-label',
	'settings' => 'jupiterx_product_list_rating_label_1',
	'section'  => $section,
	'label'    => __( 'Icon', 'jupiterx' ),
] );

// Size.
JupiterX_Customizer::add_field( [
	'type'        => 'jupiterx-input',
	'settings'    => 'jupiterx_product_list_rating_icon_size',
	'section'     => $section,
	'css_var'     => 'product-list-rating-icon-size',
	'column'      => '4',
	'icon'        => 'font-size',
	'units'       => [ 'px', 'em', 'rem' ],
	'transport'   => 'postMessage',
	'output'   => [
		[
			'element'  => '.woocommerce ul.products li.product .star-rating',
			'property' => 'font-size',
		],
	],
] );

// Icon Color.
JupiterX_Customizer::add_field( [
	'type'      => 'jupiterx-color',
	'settings'  => 'jupiterx_product_list_rating_icon_color',
	'section'   => $section,
	'css_var'   => 'product-list-rating-icon-color',
	'column'    => '3',
	'icon'      => 'icon-color',
	'transport' => 'postMessage',
	'output'    => [
		[
			'element'  => '.woocommerce ul.products li.product .star-rating:before',
			'property' => 'color',
		],
	],
] );

// Active label.
JupiterX_Customizer::add_field( [
	'type'       => 'jupiterx-label',
	'label'      => __( 'Active', 'jupiterx' ),
	'label_type' => 'fancy',
	'color'      => 'green',
	'settings' => 'jupiterx_product_list_rating_label_2',
	'section'  => $section,
] );

// Icon color active.
JupiterX_Customizer::add_field( [
	'type'      => 'jupiterx-color',
	'settings'  => 'jupiterx_product_list_rating_icon_color_active',
	'section'   => $section,
	'css_var'   => 'product-list-rating-icon-color-active',
	'column'    => '3',
	'icon'      => 'icon-color',
	'transport' => 'postMessage',
	'output'    => [
		[
			'element'  => '.woocommerce ul.products li.product .star-rating span',
			'property' => 'color',
		],
	],
] );

// Divider.
JupiterX_Customizer::add_field( [
	'type'     => 'jupiterx-divider',
	'settings' => 'jupiterx_product_list_rating_divider_1',
	'section'  => $section,
] );

// Spacing.
JupiterX_Customizer::add_responsive_field( [
	'type'      => 'jupiterx-box-model',
	'settings'  => 'jupiterx_product_list_rating_spacing',
	'section'   => $section,
	'css_var'   => 'product-list-rating',
	'transport' => 'postMessage',
	'exclude'   => [ 'padding' ],
	'default'   => [
		'desktop' => [
			'margin_bottom' => 0.4,
		],
	],
	'output'    => [
		[
			'element' => '.woocommerce ul.products li.product .rating-wrapper',
		],
	],
] );
