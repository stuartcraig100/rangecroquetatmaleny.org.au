<?php
/**
 * Add Jupiter settings for Product List > Styles > Pagination tab to the WordPress Customizer.
 *
 * @package JupiterX\Framework\Admin\Customizer
 *
 * @since   1.0.0
 */

$section = 'jupiterx_product_list_pagination';

// Align.
JupiterX_Customizer::add_responsive_field( [
	'type'      => 'jupiterx-choose',
	'settings'  => 'jupiterx_product_list_pagination_align',
	'section'   => $section,
	'label'     => __( 'Align', 'jupiterx' ),
	'column'    => '4',
	'choices'   => JupiterX_Customizer_Utils::get_align(),
	'css_var'   => 'product-list-pagination-align',
	'transport' => 'postMessage',
	'default'   => [
		'desktop' => 'center',
		'tablet'  => 'center',
		'mobile'  => 'center',
	],
	'output'    => [
		[
			'element'  => '.woocommerce nav.woocommerce-pagination',
			'property' => 'text-align',
		],
	],
] );

// Gutter Space.
JupiterX_Customizer::add_field( [
	'type'        => 'jupiterx-text',
	'settings'    => 'jupiterx_product_list_pagination_gutter_space',
	'section'     => $section,
	'css_var'     => 'product-list-pagination-gutter-space',
	'label_empty' => true,
	'column'      => '4',
	'icon'        => 'grid-horizontal-space',
	'transport'   => 'postMessage',
	'input_type'  => 'number',
	'unit'        => 'px',
	'output'      => [
		[
			'element'       => '.woocommerce nav.woocommerce-pagination ul li',
			'property'      => 'margin-left',
			'value_pattern' => 'calc($px / 2)',
		],
		[
			'element'       => '.woocommerce nav.woocommerce-pagination ul li',
			'property'      => 'margin-right',
			'value_pattern' => 'calc($px / 2)',
		],
	],
] );

// Typography.
JupiterX_Customizer::add_field( [
	'type'       => 'jupiterx-typography',
	'settings'   => 'jupiterx_product_list_pagination_typography',
	'section'    => $section,
	'responsive' => true,
	'css_var'    => 'product-list-pagination-typography',
	'transport'  => 'postMessage',
	'exclude'    => [ 'text_transform', 'line_height', 'letter_spacing' ],
	'output'     => [
		[
			'element' => '.woocommerce nav.woocommerce-pagination ul .page-numbers',
		],
	],
] );

// Background.
JupiterX_Customizer::add_field( [
	'type'       => 'jupiterx-background',
	'settings'   => 'jupiterx_product_list_pagination_background',
	'section'    => $section,
	'css_var'    => 'product-list-pagination-background',
	'transport'  => 'postMessage',
	'exclude'    => [ 'image', 'position', 'repeat', 'attachment', 'size' ],
	'output'     => [
		[
			'element' => '.woocommerce nav.woocommerce-pagination ul .page-numbers',
		],
	],
] );

// Border.
JupiterX_Customizer::add_field( [
	'type'      => 'jupiterx-border',
	'settings'  => 'jupiterx_product_list_pagination_border',
	'section'   => $section,
	'css_var'   => 'product-list-pagination-border',
	'transport' => 'postMessage',
	'exclude'   => [ 'style', 'size' ],
	'output'    => [
		[
			'element' => '.woocommerce nav.woocommerce-pagination ul li .page-numbers, .woocommerce nav.woocommerce-pagination ul li:first-child .page-numbers, .woocommerce nav.woocommerce-pagination ul li:last-child .page-numbers',
		],
	],
] );

// Hover label.
JupiterX_Customizer::add_field( [
	'type'       => 'jupiterx-label',
	'label'      => __( 'Hover', 'jupiterx' ),
	'label_type' => 'fancy',
	'color'      => 'orange',
	'settings' => 'jupiterx_product_list_add_cart_buton_label_1',
	'section'  => $section,
] );

// Background.
JupiterX_Customizer::add_field( [
	'type'       => 'jupiterx-background',
	'settings'   => 'jupiterx_product_list_pagination_background_hover',
	'section'    => $section,
	'css_var'    => 'product-list-pagination-background-hover',
	'transport'  => 'postMessage',
	'exclude'    => [ 'image', 'position', 'repeat', 'attachment', 'size' ],
	'output'     => [
		[
			'element' => '.woocommerce nav.woocommerce-pagination ul .page-numbers:not(.current):hover',
		],
	],
] );

// Color.
JupiterX_Customizer::add_field( [
	'type'      => 'jupiterx-color',
	'settings'  => 'jupiterx_product_list_pagination_color_hover',
	'section'   => $section,
	'column'    => '4',
	'css_var'   => 'product-list-pagination-color-hover',
	'icon'      => 'font-color',
	'transport' => 'postMessage',
	'output'    => [
		[
			'element'  => '.woocommerce nav.woocommerce-pagination ul .page-numbers:not(.current):hover',
			'property' => 'color',
		],
	],
] );

// Border Color.
JupiterX_Customizer::add_field( [
	'type'      => 'jupiterx-color',
	'settings'  => 'jupiterx_product_list_pagination_border_color_hover',
	'section'   => $section,
	'column'    => '4',
	'css_var'   => 'product-list-pagination-border-color-hover',
	'icon'      => 'border-color',
	'transport' => 'postMessage',
	'output'    => [
		[
			'element'  => '.woocommerce nav.woocommerce-pagination ul li .page-numbers:not(.current):hover, .woocommerce nav.woocommerce-pagination ul li:first-child .page-numbers:not(.current):hover, .woocommerce nav.woocommerce-pagination ul li:last-child .page-numbers:not(.current):hover',
			'property' => 'border-color',
		],
	],
] );

// Active label.
JupiterX_Customizer::add_field( [
	'type'       => 'jupiterx-label',
	'label'      => __( 'Active', 'jupiterx' ),
	'label_type' => 'fancy',
	'color'      => 'green',
	'settings' => 'jupiterx_product_list_add_cart_buttdn_label_1',
	'section'  => $section,
] );

// Background.
JupiterX_Customizer::add_field( [
	'type'       => 'jupiterx-background',
	'settings'   => 'jupiterx_product_list_pagination_background_active',
	'section'    => $section,
	'css_var'    => 'product-list-pagination-background-active',
	'transport'  => 'postMessage',
	'exclude'    => [ 'image', 'position', 'repeat', 'attachment', 'size' ],
	'output'     => [
		[
			'element' => '.woocommerce nav.woocommerce-pagination ul .page-numbers.current',
		],
	],
] );

// Color.
JupiterX_Customizer::add_field( [
	'type'      => 'jupiterx-color',
	'settings'  => 'jupiterx_product_list_pagination_color_active',
	'section'   => $section,
	'column'    => '4',
	'css_var'   => 'product-list-pagination-color-active',
	'icon'      => 'font-color',
	'transport' => 'postMessage',
	'output'    => [
		[
			'element'  => '.woocommerce nav.woocommerce-pagination ul .page-numbers.current',
			'property' => 'color',
		],
	],
] );

// Border Color.
JupiterX_Customizer::add_field( [
	'type'      => 'jupiterx-color',
	'settings'  => 'jupiterx_product_list_pagination_border_color_active',
	'section'   => $section,
	'column'    => '4',
	'css_var'   => 'product-list-pagination-border-color-active',
	'icon'      => 'border-color',
	'transport' => 'postMessage',
	'output'    => [
		[
			'element'  => '.woocommerce nav.woocommerce-pagination ul li .page-numbers.current, .woocommerce nav.woocommerce-pagination ul li:first-child .page-numbers.current, .woocommerce nav.woocommerce-pagination ul li:last-child .page-numbers.current',
			'property' => 'border-color',
		],
	],
] );

// Divider.
JupiterX_Customizer::add_field( [
	'type'     => 'jupiterx-divider',
	'settings' => 'jupiterx_product_list_pagination_divider',
	'section'  => $section,
] );

// Margin.
JupiterX_Customizer::add_responsive_field( [
	'type'      => 'jupiterx-box-model',
	'settings'  => 'jupiterx_product_list_pagination_margin',
	'section'   => $section,
	'css_var'   => 'product-list-pagination-margin',
	'exclude'   => [ 'padding' ],
	'transport' => 'postMessage',
	'output'    => [
		[
			'element' => '.woocommerce nav.woocommerce-pagination',
		],
	],
] );

// Padding.
JupiterX_Customizer::add_responsive_field( [
	'type'      => 'jupiterx-box-model',
	'settings'  => 'jupiterx_product_list_pagination_padding',
	'section'   => $section,
	'css_var'   => 'product-list-pagination-padding',
	'exclude'   => [ 'margin' ],
	'transport' => 'postMessage',
	'output'    => [
		[
			'element' => '.woocommerce nav.woocommerce-pagination ul .page-numbers',
		],
	],
] );
