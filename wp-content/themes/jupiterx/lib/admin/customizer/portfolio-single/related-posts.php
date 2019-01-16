<?php
/**
 * Add Jupiter settings for Portfolio Single > Styles > Related Posts tab to the WordPress Customizer.
 *
 * @package JupiterX\Framework\Admin\Customizer
 *
 * @since   1.0.0
 */

$section = 'jupiterx_portfolio_single_related_posts';

// Typography.
JupiterX_Customizer::add_field( [
	'type'       => 'jupiterx-typography',
	'settings'   => 'jupiterx_portfolio_single_related_posts_typography',
	'section'    => $section,
	'responsive' => true,
	'css_var'    => 'portfolio-single-related-posts',
	'transport'  => 'postMessage',
	'exclude'    => [ 'text_transform' ],
	'output'     => [
		[
			'element' => '.single-portfolio .jupiterx-post-related .card-title',
		],
	],
] );

// Background color.
JupiterX_Customizer::add_field( [
	'type'      => 'jupiterx-color',
	'settings'  => 'jupiterx_portfolio_single_related_posts_background_color',
	'section'   => $section,
	'css_var'   => 'portfolio-single-related-posts-background-color',
	'column'    => '3',
	'icon'      => 'background-color',
	'transport' => 'postMessage',
	'output'    => [
		[
			'element'  => '.single-portfolio .jupiterx-post-related .card-body',
			'property' => 'background-color',
		],
	],
] );

// Border.
JupiterX_Customizer::add_field( [
	'type'      => 'jupiterx-border',
	'settings'  => 'jupiterx_portfolio_single_related_posts_border',
	'section'   => $section,
	'css_var'   => 'portfolio-single-related-posts-border',
	'transport' => 'postMessage',
	'exclude'   => [ 'style', 'size' ],
	'output'    => [
		[
			'element' => '.single-portfolio .jupiterx-post-related .card',
		],
	],
] );

// Spacing.
JupiterX_Customizer::add_responsive_field( [
	'type'      => 'jupiterx-box-model',
	'settings'  => 'jupiterx_portfolio_single_related_posts_spacing',
	'section'   => $section,
	'css_var'   => 'portfolio-single-related-posts',
	'transport' => 'postMessage',
	'exclude'   => [ 'margin' ],
	'output'    => [
		[
			'element' => '.single-portfolio .jupiterx-post-related .card-body',
		],
	],
] );

// Divider.
JupiterX_Customizer::add_field( [
	'type'     => 'jupiterx-divider',
	'settings' => 'jupiterx_portfolio_single_related_posts_divider',
	'section'  => $section,
] );

// Spacing.
JupiterX_Customizer::add_responsive_field( [
	'type'      => 'jupiterx-box-model',
	'settings'  => 'jupiterx_portfolio_single_related_posts_container_spacing',
	'section'   => $section,
	'css_var'   => 'portfolio-single-related-posts-container',
	'transport' => 'postMessage',
	'exclude'   => [ 'padding' ],
	'default'   => [
		'desktop' => [
			'margin_bottom' => 3,
		],
	],
	'output'    => [
		[
			'element' => '.single-portfolio .jupiterx-post-related',
		],
	],
] );
