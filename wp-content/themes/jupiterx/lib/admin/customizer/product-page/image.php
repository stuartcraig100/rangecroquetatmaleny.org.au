<?php
/**
 * Add Jupiter settings for Product Page > Styles > Image tab to the WordPress Customizer.
 *
 * @package JupiterX\Framework\Admin\Customizer
 *
 * @since   1.0.0
 */

$section = 'jupiterx_product_page_image';

// Main Image Background Color.
JupiterX_Customizer::add_field( [
	'type'      => 'jupiterx-color',
	'settings'  => 'jupiterx_product_page_image_main_background_color',
	'section'   => $section,
	'css_var'   => 'product-page-image-main-background-color',
	'label'     => __( 'Background Color', 'jupiterx' ),
	'column'    => '4',
	'icon'      => 'background-color',
	'transport' => 'postMessage',
	'output'    => [
		[
			'element'  => '.woocommerce:not(.jupiterx-product-template-9):not(.jupiterx-product-template-10) div.product div.woocommerce-product-gallery .flex-viewport, .woocommerce:not(.jupiterx-product-template-9):not(.jupiterx-product-template-10) div.product div.woocommerce-product-gallery .woocommerce-product-gallery__image',
			'property' => 'background-color',
		],
		[
			'element'     => '.woocommerce.jupiterx-product-template-9 div.product div.woocommerce-product-gallery .woocommerce-product-gallery__image, .woocommerce.jupiterx-product-template-10 div.product div.woocommerce-product-gallery .woocommerce-product-gallery__image',
			'property'    => 'background-color',
			'media_query' => '@media (min-width: 992px)',
		],
		[
			'element'     => '.woocommerce.jupiterx-product-template-9 div.product div.woocommerce-product-gallery .flex-viewport, .woocommerce.jupiterx-product-template-9 div.product div.woocommerce-product-gallery .woocommerce-product-gallery__image, .woocommerce.jupiterx-product-template-10 div.product div.woocommerce-product-gallery .flex-viewport, .woocommerce.jupiterx-product-template-10 div.product div.woocommerce-product-gallery .woocommerce-product-gallery__image',
			'property'    => 'background-color',
			'media_query' => '@media (max-width: 991px)',
		],
	],
] );

// Min height.
JupiterX_Customizer::add_field( [
	'type'        => 'jupiterx-input',
	'settings'    => 'jupiterx_product_page_image_min_height',
	'section'     => $section,
	'css_var'     => 'product-page-image-min-height',
	'label'       => __( 'Min Height', 'jupiterx' ),
	'column'      => '4',
	'input_attrs' => [ 'placeholder' => 'auto' ],
	'transport'   => 'postMessage',
	'default'     => [
		'unit' => '-',
	],
	'units'       => [ '-', 'px', 'vh' ],
	'output'      => [
		[
			'element'       => '.single-product .woocommerce-product-gallery__image img',
			'property'      => 'min-height',
		],
	],
] );

// Max height.
JupiterX_Customizer::add_field( [
	'type'        => 'jupiterx-input',
	'settings'    => 'jupiterx_product_page_image_max_height',
	'section'     => $section,
	'css_var'     => 'product-page-image-max-height',
	'label'       => __( 'Max Height', 'jupiterx' ),
	'column'      => '4',
	'input_attrs' => [ 'placeholder' => 'auto' ],
	'transport'   => 'postMessage',
	'default'     => [
		'unit' => '-',
	],
	'units'       => [ '-', 'px', 'vh' ],
	'output'     => [
		[
			'element'       => '.woocommerce div.product div.woocommerce-product-gallery .woocommerce-product-gallery__image img',
			'property'      => 'max-height',
		],
	],
] );

// Main Image Border.
JupiterX_Customizer::add_field( [
	'type'      => 'jupiterx-border',
	'settings'  => 'jupiterx_product_page_image_main_border',
	'section'   => $section,
	'css_var'   => 'product-page-image-main-border',
	'exclude'   => [ 'style', 'size' ],
	'transport' => 'postMessage',
	'default'   => [
		'width' => [
			'size' => '0',
			'unit' => 'px',
		],
	],
	'output'    => [
		[
			'element'  => '.woocommerce:not(.jupiterx-product-template-9):not(.jupiterx-product-template-10) div.product div.woocommerce-product-gallery .flex-viewport, .woocommerce:not(.jupiterx-product-template-9):not(.jupiterx-product-template-10) div.product div.woocommerce-product-gallery .woocommerce-product-gallery__image',
		],
		[
			'element'     => '.woocommerce.jupiterx-product-template-9 div.product div.woocommerce-product-gallery .woocommerce-product-gallery__image, .woocommerce.jupiterx-product-template-10 div.product div.woocommerce-product-gallery .woocommerce-product-gallery__image',
			'media_query' => '@media (min-width: 992px)',
		],
		[
			'element'     => '.woocommerce.jupiterx-product-template-9 div.product div.woocommerce-product-gallery .flex-viewport, .woocommerce.jupiterx-product-template-9 div.product div.woocommerce-product-gallery .woocommerce-product-gallery__image, .woocommerce.jupiterx-product-template-10 div.product div.woocommerce-product-gallery .flex-viewport, .woocommerce.jupiterx-product-template-10 div.product div.woocommerce-product-gallery .woocommerce-product-gallery__image',
			'media_query' => '@media (max-width: 991px)',
		],
	],
] );

// Divider.
JupiterX_Customizer::add_field( [
	'type'            => 'jupiterx-divider',
	'settings'        => 'jupiterx_product_page_image_divider_1',
	'section'         => $section,
	'active_callback' => [
		[
			'setting'  => 'jupiterx_product_page_template',
			'operator' => 'contains',
			'value'    => [ '1', '2', '3', '4', '5', '6', '7', '8' ],
		],
	],
] );

// Image Gallery Orientation.
JupiterX_Customizer::add_field( [
	'type'            => 'jupiterx-choose',
	'settings'        => 'jupiterx_product_page_image_gallery_orientation',
	'section'         => $section,
	'label'           => __( 'Gallery Thumbnail Orientation', 'jupiterx' ),
	'default'         => 'horizontal',
	'choices'         => [
		'vertical'    => [
			'icon' => 'gallery-thumbnail-vertical',
		],
		'horizontal'  => [
			'icon' => 'gallery-thumbnail-horizontal',
		],
		'none' => [
			'icon' => 'gallery-thumbnail-none',
		],
	],
	'active_callback' => [
		[
			'setting'  => 'jupiterx_product_page_template',
			'operator' => 'contains',
			'value'    => [ '1', '2', '3', '4', '5', '6', '7', '8' ],
		],
	],
] );

// Divider.
JupiterX_Customizer::add_field( [
	'type'     => 'jupiterx-divider',
	'settings' => 'jupiterx_product_page_image_divider_2',
	'section'  => $section,
] );

// Spacing.
JupiterX_Customizer::add_responsive_field( [
	'type'      => 'jupiterx-box-model',
	'settings'  => 'jupiterx_product_page_image_spacing',
	'section'   => $section,
	'css_var'   => 'product-page-image',
	'exclude'   => [ 'padding' ],
	'transport' => 'postMessage',
	'output'    => [
		[
			'element' => '.woocommerce div.product div.woocommerce-product-gallery',
		],
	],
] );
