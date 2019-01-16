<?php
/**
 * Add Jupiter settings for Product Page > Styles > Rating tab to the WordPress Customizer.
 *
 * @package JupiterX\Framework\Admin\Customizer
 *
 * @since   1.0.0
 */

$section = 'jupiterx_product_page_rating';

// Label.
JupiterX_Customizer::add_field( [
	'type'     => 'jupiterx-label',
	'settings' => 'jupiterx_product_page_rating_label_1',
	'section'  => $section,
	'label'    => __( 'Icon', 'jupiterx' ),
] );

// Size.
JupiterX_Customizer::add_field( [
	'type'        => 'jupiterx-input',
	'settings'    => 'jupiterx_product_page_rating_icon_size',
	'section'     => $section,
	'css_var'     => 'product-page-rating-icon-size',
	'column'      => '4',
	'icon'        => 'font-size',
	'units'       => [ 'px', 'em', 'rem' ],
	'transport'   => 'postMessage',
	'output'   => [
		[
			'element'  => '.single-product .woocommerce-product-rating .star-rating',
			'property' => 'font-size',
		],
	],
] );

// Icon Color.
JupiterX_Customizer::add_field( [
	'type'      => 'jupiterx-color',
	'settings'  => 'jupiterx_product_page_rating_icon_color',
	'section'   => $section,
	'css_var'   => 'product-page-rating-icon-color',
	'column'    => '3',
	'icon'      => 'icon-color',
	'transport' => 'postMessage',
	'output'    => [
		[
			'element'  => '.single-product .woocommerce-product-rating .star-rating:before',
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
	'settings' => 'jupiterx_product_page_rating_label_2',
	'section'  => $section,
] );

// Icon color active.
JupiterX_Customizer::add_field( [
	'type'      => 'jupiterx-color',
	'settings'  => 'jupiterx_product_page_rating_icon_color_active',
	'section'   => $section,
	'css_var'   => 'product-page-rating-icon-color-active',
	'column'    => '3',
	'icon'      => 'icon-color',
	'transport' => 'postMessage',
	'output'    => [
		[
			'element'  => '.single-product .woocommerce-product-rating .star-rating span',
			'property' => 'color',
		],
	],
] );

// Divider.
JupiterX_Customizer::add_field( [
	'type'     => 'jupiterx-divider',
	'settings' => 'jupiterx_product_page_rating_divider_1',
	'section'  => $section,
] );

// Link typography.
JupiterX_Customizer::add_field( [
	'type'       => 'jupiterx-typography',
	'settings'   => 'jupiterx_product_page_rating_link_typography',
	'section'    => $section,
	'responsive' => true,
	'css_var'    => 'product-page-rating-link',
	'label'      => __( 'Link', 'jupiterx' ),
	'transport'  => 'postMessage',
	'exclude'    => [ 'line_height', 'text_transform' ],
	'output'     => [
		[
			'element'  => '.single-product .woocommerce-review-link',
		],
	],
] );

// Hover label.
JupiterX_Customizer::add_field( [
	'type'       => 'jupiterx-label',
	'label'      => __( 'Hover', 'jupiterx' ),
	'label_type' => 'fancy',
	'color'      => 'orange',
	'settings' => 'jupiterx_product_page_rating_label_3',
	'section'  => $section,
] );

// Icon Color.
JupiterX_Customizer::add_field( [
	'type'      => 'jupiterx-color',
	'settings'  => 'jupiterx_product_page_rating_link_color_hover',
	'section'   => $section,
	'css_var'   => 'product-page-rating-link-color-hover',
	'column'    => '3',
	'icon'      => 'font-color',
	'transport' => 'postMessage',
	'output'    => [
		[
			'element'  => '.single-product .woocommerce-review-link:hover',
			'property' => 'color',
		],
	],
] );

// Divider.
JupiterX_Customizer::add_field( [
	'type'     => 'jupiterx-divider',
	'settings' => 'jupiterx_product_page_rating_divider_2',
	'section'  => $section,
] );

// Spacing.
JupiterX_Customizer::add_responsive_field( [
	'type'      => 'jupiterx-box-model',
	'settings'  => 'jupiterx_product_page_rating_spacing',
	'section'   => $section,
	'css_var'   => 'product-page-rating',
	'transport' => 'postMessage',
	'exclude'   => [ 'padding' ],
	'output'    => [
		[
			'element' => '.single-product .woocommerce-product-rating',
		],
	],
] );
