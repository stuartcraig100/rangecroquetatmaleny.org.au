<?php
/**
 * Add Jupiter settings for Product Page > Styles > Tabs tab to the WordPress Customizer.
 *
 * @package JupiterX\Framework\Admin\Customizer
 *
 * @since   1.0.0
 */

$section = 'jupiterx_product_page_tabs';

// Title.
JupiterX_Customizer::add_field( [
	'type'       => 'jupiterx-typography',
	'settings'   => 'jupiterx_product_page_tabs_title_typography',
	'section'    => $section,
	'responsive' => true,
	'css_var'    => 'product-page-tabs-title',
	'label'      => __( 'Title', 'jupiterx' ),
	'transport'  => 'postMessage',
	'exclude'    => [ 'line_height' ],
	'output'     => [
		[
			'element' => '.woocommerce div.product .woocommerce-tabs ul.tabs li a, .woocommerce div.product .woocommerce-tabs ul.tabs li:not(.active) a:hover',
		],
		[
			'element' => '.woocommerce div.product .woocommerce-tabs.accordion .card-title',
		],
	],
] );

// Background color.
JupiterX_Customizer::add_field( [
	'type'      => 'jupiterx-color',
	'settings'  => 'jupiterx_product_page_tabs_title_background_color',
	'section'   => $section,
	'css_var'   => 'product-page-tabs-title-background-color',
	'column'    => '3',
	'icon'      => 'background-color',
	'transport' => 'postMessage',
	'default'   => '#fff',
	'output'    => [
		[
			'element'  => '.woocommerce div.product .woocommerce-tabs ul.tabs li',
			'property' => 'background-color',
		],
		[
			'element'  => '.woocommerce div.product .woocommerce-tabs.accordion .card-header',
			'property' => 'background-color',
		],
	],
] );

// Active label.
JupiterX_Customizer::add_field( [
	'type'       => 'jupiterx-label',
	'label'      => __( 'Active', 'jupiterx' ),
	'label_type' => 'fancy',
	'color'      => 'orange',
	'settings' => 'jupiterx_product_page_tabs_label_1',
	'section'  => $section,
] );

// Text color active.
JupiterX_Customizer::add_field( [
	'type'      => 'jupiterx-color',
	'settings'  => 'jupiterx_product_page_tabs_title_color_active',
	'section'   => $section,
	'css_var'   => 'product-page-tabs-title-color-active',
	'column'    => '3',
	'icon'      => 'font-color',
	'transport' => 'postMessage',
	'output'    => [
		[
			'element'  => '.woocommerce div.product .woocommerce-tabs ul.tabs li.active a',
			'property' => 'color',
		],
		[
			'element'  => '.woocommerce div.product .woocommerce-tabs.accordion .card-header:not(.collapsed) .card-title',
			'property' => 'color',
		],
	],
] );

// Background color active.
JupiterX_Customizer::add_field( [
	'type'      => 'jupiterx-color',
	'settings'  => 'jupiterx_product_page_tabs_title_background_color_active',
	'section'   => $section,
	'css_var'   => 'product-page-tabs-title-background-color-active',
	'column'    => '3',
	'default'   => '#fff',
	'icon'      => 'background-color',
	'transport' => 'postMessage',
	'output'    => [
		[
			'element'  => '.woocommerce div.product .woocommerce-tabs ul.tabs li.active',
			'property' => 'background-color',
		],
		[
			'element'  => '.woocommerce div.product div.woocommerce-tabs ul.tabs li.active',
			'property' => 'border-bottom-color',
		],
		[
			'element'  => '.woocommerce div.product .woocommerce-tabs.accordion .card-header:not(.collapsed)',
			'property' => 'background-color',
		],
	],
] );

// Icon color active.
JupiterX_Customizer::add_field( [
	'type'            => 'jupiterx-color',
	'settings'        => 'jupiterx_product_page_tabs_title_icon_color_active',
	'section'         => $section,
	'css_var'         => 'product-page-tabs-title-icon-color-active',
	'column'          => '3',
	'icon'            => 'icon-color',
	'transport'       => 'postMessage',
	'output'          => [
		[
			'element'  => '.woocommerce div.product .woocommerce-tabs.accordion span[class*="jupiterx-icon"]',
			'property' => 'color',
		],
	],
	'active_callback' => [
		[
			'setting'  => 'jupiterx_product_page_template',
			'operator' => 'contains',
			'value'    => [ '3', '4', '5', '9', '10' ],
		],
	],
] );

// Divider.
JupiterX_Customizer::add_field( [
	'type'     => 'jupiterx-divider',
	'settings' => 'jupiterx_product_page_tabs_divider_1',
	'section'  => $section,
] );

// Text.
JupiterX_Customizer::add_field( [
	'type'       => 'jupiterx-typography',
	'settings'   => 'jupiterx_product_page_tabs_text_typography',
	'section'    => $section,
	'responsive' => true,
	'css_var'    => 'product-page-tabs-text',
	'label'      => __( 'Text', 'jupiterx' ),
	'transport'  => 'postMessage',
	'exclude'    => [ 'line_height', 'text_transform' ],
	'output'     => [
		[
			'element' => '.woocommerce div.product .woocommerce-tabs .panel, .woocommerce div.product .woocommerce-tabs .panel p',
		],
		[
			'element' => '.woocommerce div.product .woocommerce-tabs.accordion .card-body, .woocommerce div.product .woocommerce-tabs.accordion .card-body p',
		],
	],
] );

// Divider.
JupiterX_Customizer::add_field( [
	'type'     => 'jupiterx-divider',
	'settings' => 'jupiterx_product_page_tabs_divider_2',
	'section'  => $section,
] );

// Box label.
JupiterX_Customizer::add_field( [
	'type'     => 'jupiterx-label',
	'label'    => __( 'Box', 'jupiterx' ),
	'settings' => 'jupiterx_product_page_tabs_label_2',
	'section'  => $section,
] );

// Box background color.
JupiterX_Customizer::add_field( [
	'type'      => 'jupiterx-color',
	'settings'  => 'jupiterx_product_page_tabs_box_background_color',
	'section'   => $section,
	'css_var'   => 'product-page-tabs-box-background-color',
	'column'    => '3',
	'icon'      => 'background-color',
	'transport' => 'postMessage',
	'output'    => [
		[
			'element'  => '.woocommerce div.product .woocommerce-tabs .panel',
			'property' => 'background-color',
		],
		[
			'element'  => '.woocommerce div.product .woocommerce-tabs.accordion .card-body',
			'property' => 'background-color',
		],
	],
] );

// Box border.
JupiterX_Customizer::add_field( [
	'type'      => 'jupiterx-border',
	'settings'  => 'jupiterx_product_page_tabs_box_border',
	'section'   => $section,
	'css_var'   => 'product-page-tabs-box-border',
	'exclude'   => [ 'style', 'size', 'radius' ],
	'transport' => 'postMessage',
	'default'   => [
		'width' => [
			'size' => 1,
			'unit' => 'px',
		],
		'color' => '#d3ced2', // WooCommerce border color.
	],
	'output'    => [
		[
			'element' => '.woocommerce div.product .woocommerce-tabs .panel, .woocommerce div.product .woocommerce-tabs ul.tabs:before, .woocommerce div.product .woocommerce-tabs ul.tabs li, .woocommerce div.product .woocommerce-tabs ul.tabs li.active',
		],
		[
			'element'  => '.woocommerce div.product .woocommerce-tabs ul.tabs li.active',
			'property' => 'border-width',
			'choice'   => 'width',
		],
		[
			'element' => '.woocommerce div.product .woocommerce-tabs.accordion .card, .woocommerce div.product .woocommerce-tabs.accordion .card-header',
		],
	],
] );

// Box spacing.
JupiterX_Customizer::add_responsive_field( [
	'type'      => 'jupiterx-box-model',
	'settings'  => 'jupiterx_product_page_tabs_box_spacing',
	'section'   => $section,
	'css_var'   => 'product-page-tabs-box',
	'transport' => 'postMessage',
	'exclude'   => [ 'margin' ],
	'output'    => [
		[
			'element' => '.woocommerce div.product .woocommerce-tabs .panel',
		],
		[
			'element' => '.woocommerce div.product .woocommerce-tabs.accordion .card-body',
		],
	],
] );

// Divider.
JupiterX_Customizer::add_field( [
	'type'     => 'jupiterx-divider',
	'settings' => 'jupiterx_product_page_tabs_divider_3',
	'section'  => $section,
] );

// Tabs wrapper spacing.
JupiterX_Customizer::add_responsive_field( [
	'type'      => 'jupiterx-box-model',
	'settings'  => 'jupiterx_product_page_tabs_spacing',
	'section'   => $section,
	'css_var'   => 'product-page-tabs',
	'transport' => 'postMessage',
	'exclude'   => [ 'padding' ],
	'default'   => [
		'desktop' => [
			'margin_bottom' => 5,
		],
	],
	'output'    => [
		[
			'element' => '.woocommerce div.product .woocommerce-tabs',
		],
		[
			'element' => '.woocommerce div.product .woocommerce-tabs.accordion',
		],
	],
] );
