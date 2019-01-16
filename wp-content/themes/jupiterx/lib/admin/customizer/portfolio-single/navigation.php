<?php
/**
 * Add Jupiter settings for Portfolio Single > Styles > Navigation tab to the WordPress Customizer.
 *
 * @package JupiterX\Framework\Admin\Customizer
 *
 * @since   1.0.0
 */

$section = 'jupiterx_portfolio_single_navigation';

// Label.
JupiterX_Customizer::add_field( [
	'type'     => 'jupiterx-label',
	'settings' => 'jupiterx_portfolio_single_navigation_label',
	'section'  => $section,
	'label'    => __( 'Image', 'jupiterx' ),
] );

// Image.
JupiterX_Customizer::add_field( [
	'type'      => 'jupiterx-toggle',
	'settings'  => 'jupiterx_portfolio_single_navigation_image',
	'section'   => $section,
	'column'    => '3',
	'default'   => true,
] );

// Image border radius.
JupiterX_Customizer::add_field( [
	'type'        => 'jupiterx-input',
	'settings'    => 'jupiterx_portfolio_single_navigation_image_border_radius',
	'section'     => $section,
	'css_var'     => 'portfolio-single-navigation-image-border-radius',
	'column'      => '4',
	'icon'        => 'corner-radius',
	'units'       => [ 'px', '%' ],
	'transport'   => 'postMessage',
	'output'      => [
		[
			'element'  => '.single-portfolio .jupiterx-post-navigation-link img',
			'property' => 'border-radius',
		],
	],
	'active_callback' => [
		[
			'setting'  => 'jupiterx_portfolio_single_navigation_image',
			'operator' => '==',
			'value'    => true,
		],
	],
] );

// Divider.
JupiterX_Customizer::add_field( [
	'type'     => 'jupiterx-divider',
	'settings' => 'jupiterx_portfolio_single_navigation_divider',
	'section'  => $section,
] );

// Title label.
JupiterX_Customizer::add_field( [
	'type'       => 'jupiterx-label',
	'label'      => __( 'Title', 'jupiterx' ),
	'settings'   => 'jupiterx_portfolio_single_navigation_label_2',
	'section'    => $section,
] );

// Title typography.
JupiterX_Customizer::add_field( [
	'type'       => 'jupiterx-typography',
	'settings'   => 'jupiterx_portfolio_single_navigation_title_typography',
	'section'    => $section,
	'responsive' => true,
	'css_var'    => 'portfolio-single-navigation-title',
	'transport'  => 'postMessage',
	'exclude'    => [ 'line_height' ],
	'output'     => [
		[
			'element' => '.single-portfolio .jupiterx-post-navigation-title',
		],
	],
] );

// Divider.
JupiterX_Customizer::add_field( [
	'type'     => 'jupiterx-divider',
	'settings' => 'jupiterx_portfolio_single_navigation_divider_2',
	'section'  => $section,
] );

// Label label.
JupiterX_Customizer::add_field( [
	'type'       => 'jupiterx-label',
	'label'      => __( 'Label', 'jupiterx' ),
	'settings'   => 'jupiterx_portfolio_single_navigation_label_3',
	'section'    => $section,
] );

// Label typography.
JupiterX_Customizer::add_field( [
	'type'       => 'jupiterx-typography',
	'settings'   => 'jupiterx_portfolio_single_navigation_label_typography',
	'section'    => $section,
	'responsive' => true,
	'css_var'    => 'portfolio-single-navigation-label',
	'transport'  => 'postMessage',
	'exclude'    => [ 'line_height' ],
	'output'     => [
		[
			'element' => '.single-portfolio .jupiterx-post-navigation-label',
		],
	],
] );

// Divider.
JupiterX_Customizer::add_field( [
	'type'     => 'jupiterx-divider',
	'settings' => 'jupiterx_portfolio_single_navigation_divider_3',
	'section'  => $section,
] );

// Spacing.
JupiterX_Customizer::add_responsive_field( [
	'type'      => 'jupiterx-box-model',
	'settings'  => 'jupiterx_portfolio_single_navigation_spacing',
	'section'   => $section,
	'css_var'   => 'portfolio-single-navigation',
	'exclude'   => [ 'padding' ],
	'transport' => 'postMessage',
	'default'   => [
		'desktop' => [
			'margin_top' => 3,
		],
	],
	'output'    => [
		[
			'element' => '.single-portfolio .jupiterx-post-navigation',
		],
	],
] );
