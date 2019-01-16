<?php
/**
 * Add Jupiter settings for Product Page > Styles > Short Description tab to the WordPress Customizer.
 *
 * @package JupiterX\Framework\Admin\Customizer
 *
 * @since   1.0.0
 */

$section = 'jupiterx_product_page_short_description';

$elements = [
	'.woocommerce div.product .woocommerce-product-details__short-description p',
	'.woocommerce div.product .woocommerce-product-details__short-description h1',
	'.woocommerce div.product .woocommerce-product-details__short-description h2',
	'.woocommerce div.product .woocommerce-product-details__short-description h3',
	'.woocommerce div.product .woocommerce-product-details__short-description h4',
	'.woocommerce div.product .woocommerce-product-details__short-description h5',
	'.woocommerce div.product .woocommerce-product-details__short-description h6',
];

// Typography.
JupiterX_Customizer::add_field( [
	'type'       => 'jupiterx-typography',
	'settings'   => 'jupiterx_product_page_short_description_typography',
	'section'    => $section,
	'responsive' => true,
	'css_var'    => 'product-page-short-description',
	'transport'  => 'postMessage',
	'exclude'    => [ 'text_transform' ],
	'output'     => [
		[
			'element' => implode( ',', $elements ),
		],
	],
] );

// Divider.
JupiterX_Customizer::add_field( [
	'type'     => 'jupiterx-divider',
	'settings' => 'jupiterx_product_page_short_description_divider',
	'section'  => $section,
] );

// Spacing.
JupiterX_Customizer::add_responsive_field( [
	'type'      => 'jupiterx-box-model',
	'settings'  => 'jupiterx_product_page_short_description_spacing',
	'section'   => $section,
	'css_var'   => 'product-page-short-description',
	'transport' => 'postMessage',
	'exclude'   => [ 'padding' ],
	'output'    => [
		[
			'element' => '.woocommerce div.product .woocommerce-product-details__short-description',
		],
	],
] );
