<?php
/**
 * Add Jupiter settings for Product Page > Styles > Social Share tab to the WordPress Customizer.
 *
 * @package JupiterX\Framework\Admin\Customizer
 *
 * @since   1.0.0
 */

$section = 'jupiterx_product_page_social_share';

// Social Network Filter.
JupiterX_Customizer::add_field( [
	'type'     => 'jupiterx-multicheck',
	'settings' => 'jupiterx_product_page_social_share_filter',
	'section'  => $section,
	'default'  => [
		'facebook',
		'twitter',
		'pinterest',
		'linkedin',
		'google-plus',
		'reddit',
		'digg',
		'email',
	],
	'icon_choices'  => [
		'facebook'    => 'share-facebook-f',
		'twitter'     => 'share-twitter',
		'pinterest'   => 'share-pinterest-p',
		'linkedin'    => 'share-linkedin-in',
		'google-plus' => 'share-google-plus-g',
		'reddit'      => 'share-reddit-alien',
		'digg'        => 'share-digg',
		'email'       => 'share-email',
	],
] );

// Divider.
JupiterX_Customizer::add_field( [
	'type'     => 'jupiterx-divider',
	'settings' => 'jupiterx_product_page_social_share_divider_1',
	'section'  => $section,
] );

// Icon Size Label.
JupiterX_Customizer::add_field( [
	'type'     => 'jupiterx-label',
	'settings' => 'jupiterx_product_page_social_share_label',
	'section'  => $section,
	'label'    => __( 'Icon Size', 'jupiterx' ),
] );

// Font Size.
JupiterX_Customizer::add_field( [
	'type'        => 'jupiterx-input',
	'settings'    => 'jupiterx_product_page_social_share-link_font_size',
	'section'     => $section,
	'css_var'     => 'product-page-social-share-link-font-size',
	'column'      => '4',
	'units'       => [ 'px', 'em', 'rem' ],
	'default'     => [
		'size' => 1,
		'unit' => 'rem',
	],
	'transport'   => 'postMessage',
	'output'      => [
		[
			'element'  => '.woocommerce div.product .jupiterx-social-share a',
			'property' => 'font-size',
		],
		[
			'element'  => '.woocommerce div.product .jupiterx-social-share .jupiterx-icon::before',
			'property' => 'width',
		],
	],
] );


// Gutter Size.
JupiterX_Customizer::add_field( [
	'type'        => 'jupiterx-input',
	'settings'    => 'jupiterx_product_page_social_share-link_gutter_size',
	'section'     => $section,
	'css_var'     => 'product-page-social-share-link-gutter-size',
	'column'      => '4',
	'icon'        => 'letter-spacing',
	'units'       => [ 'px', 'em', 'rem' ],
	'transport'   => 'postMessage',
	'output'      => [
		[
			'element'       => '.woocommerce div.product .jupiterx-social-share .jupiterx-social-share-inner',
			'property'      => 'margin',
			'value_pattern' => '0 calc(-$ / 2)',
		],
		[
			'element'       => '.woocommerce div.product .jupiterx-social-share a',
			'property'      => 'margin',
			'value_pattern' => '0 calc($ / 2) $',
		],
	],
] );

// Color.
JupiterX_Customizer::add_field( [
	'type'      => 'jupiterx-color',
	'settings'  => 'jupiterx_product_page_social_share-link_color',
	'section'   => $section,
	'css_var'   => 'product-page-social-share-link-color',
	'column'    => '3',
	'icon'      => 'icon-color',
	'transport' => 'postMessage',
	'output'    => [
		[
			'element'  => '.woocommerce div.product .jupiterx-social-share a',
			'property' => 'color',
		],
	],
] );

// Background Color.
JupiterX_Customizer::add_field( [
	'type'      => 'jupiterx-color',
	'settings'  => 'jupiterx_product_page_social_share-link_background_color',
	'section'   => $section,
	'css_var'   => 'product-page-social-share-link-background-color',
	'column'    => '3',
	'icon'      => 'background-color',
	'transport' => 'postMessage',
	'output'    => [
		[
			'element'  => '.woocommerce div.product .jupiterx-social-share a',
			'property' => 'background-color',
		],
	],
] );

// Border.
JupiterX_Customizer::add_field( [
	'type'      => 'jupiterx-border',
	'settings'  => 'jupiterx_product_page_social_share-link_border',
	'section'   => $section,
	'css_var'   => 'product-page-social-share-link-border',
	'transport' => 'postMessage',
	'exclude'   => [ 'style', 'size' ],
	'output'    => [
		[
			'element'  => '.woocommerce div.product .jupiterx-social-share a',
		],
	],
] );

// Spacing.
JupiterX_Customizer::add_responsive_field( [
	'type'      => 'jupiterx-box-model',
	'settings'  => 'jupiterx_product_page_social_share_link_spacing',
	'section'   => $section,
	'css_var'   => 'product-page-social-share-link',
	'transport' => 'postMessage',
	'exclude'   => [ 'margin' ],
	'output'    => [
		[
			'element'  => '.woocommerce div.product .jupiterx-social-share a',
		],
	],
	'default' => [
		'desktop' => [
			'padding_top'    => 0.5,
			jupiterx_get_direction( 'padding_right' ) => 0.5,
			'padding_bottom' => 0.5,
			jupiterx_get_direction( 'padding_left' ) => 0.5,
			'padding_unit'   => 'em',
		],
	],
] );

// Fancy.
JupiterX_Customizer::add_field( [
	'type'       => 'jupiterx-label',
	'settings'   => 'jupiterx_product_page_social_share_hover',
	'section'    => $section,
	'label'      => __( 'Hover', 'jupiterx' ),
	'label_type' => 'fancy',
	'color'      => 'orange',
] );

// Color.
JupiterX_Customizer::add_field( [
	'type'      => 'jupiterx-color',
	'settings'  => 'jupiterx_product_page_social_share_link_hover_color',
	'section'   => $section,
	'css_var'   => 'product-page-social-share-link-hover-color',
	'column'    => '3',
	'icon'      => 'icon-color',
	'transport' => 'postMessage',
	'output'    => [
		[
			'element'  => '.woocommerce div.product .jupiterx-social-share a:hover',
			'property' => 'color',
		],
	],
] );

// Background Color.
JupiterX_Customizer::add_field( [
	'type'      => 'jupiterx-color',
	'settings'  => 'jupiterx_product_page_social_share_link_hover_background_color',
	'section'   => $section,
	'css_var'   => 'product-page-social-share-link-hover-background-color',
	'column'    => '3',
	'icon'      => 'background-color',
	'transport' => 'postMessage',
	'output'    => [
		[
			'element'  => '.woocommerce div.product .jupiterx-social-share a:hover',
			'property' => 'background-color',
		],
	],
] );

// Border Color.
JupiterX_Customizer::add_field( [
	'type'      => 'jupiterx-color',
	'settings'  => 'jupiterx_product_page_social_share_link_hover_border_color',
	'section'   => $section,
	'css_var'   => 'product-page-social-share-link-hover-border-color',
	'column'    => '3',
	'icon'      => 'border-color',
	'transport' => 'postMessage',
	'output'    => [
		[
			'element'  => '.woocommerce div.product .jupiterx-social-share a:hover',
			'property' => 'border-color',
		],
	],
] );

// Divider.
JupiterX_Customizer::add_field( [
	'type'     => 'jupiterx-divider',
	'settings' => 'jupiterx_product_page_social_share_divider_2',
	'section'  => $section,
] );

// Spacing.
JupiterX_Customizer::add_responsive_field( [
	'type'      => 'jupiterx-box-model',
	'settings'  => 'jupiterx_product_page_social_share_spacing',
	'section'   => $section,
	'css_var'   => 'product-page-social-share',
	'transport' => 'postMessage',
	'exclude'   => [ 'padding' ],
	'output'    => [
		[
			'element'  => '.woocommerce div.product .jupiterx-social-share',
		],
	],
] );
