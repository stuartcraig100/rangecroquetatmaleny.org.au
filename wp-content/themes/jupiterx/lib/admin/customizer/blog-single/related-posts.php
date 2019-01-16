<?php
/**
 * Add Jupiter settings for Blog Single > Styles > Related Posts tab to the WordPress Customizer.
 *
 * @package JupiterX\Framework\Admin\Customizer
 *
 * @since   1.0.0
 */

$section = 'jupiterx_post_single_related_posts';

// Typography.
JupiterX_Customizer::add_field( [
	'type'       => 'jupiterx-typography',
	'settings'   => "{$section}_typography",
	'section'    => $section,
	'responsive' => true,
	'css_var'    => 'post-single-related-posts',
	'transport'  => 'postMessage',
	'exclude'    => [ 'text_transform' ],
	'output'     => [
		[
			'element' => '.single-post .jupiterx-post-related .card-title',
		],
	],
] );

// Background color.
JupiterX_Customizer::add_field( [
	'type'      => 'jupiterx-color',
	'settings'  => "{$section}_background_color",
	'section'   => $section,
	'css_var'   => 'post-single-related-posts-background-color',
	'column'    => '3',
	'icon'      => 'background-color',
	'transport' => 'postMessage',
	'output'    => [
		[
			'element'  => '.single-post .jupiterx-post-related .card-body',
			'property' => 'background-color',
		],
	],
] );

// Border.
JupiterX_Customizer::add_field( [
	'type'      => 'jupiterx-border',
	'settings'  => "{$section}_border",
	'section'   => $section,
	'css_var'   => 'post-single-related-posts-border',
	'transport' => 'postMessage',
	'exclude'   => [ 'style', 'size' ],
	'output'    => [
		[
			'element' => '.single-post .jupiterx-post-related .card',
		],
	],
] );

// Spacing.
JupiterX_Customizer::add_responsive_field( [
	'type'      => 'jupiterx-box-model',
	'settings'  => "{$section}_spacing",
	'section'   => $section,
	'css_var'   => 'post-single-related-posts',
	'transport' => 'postMessage',
	'exclude'   => [ 'margin' ],
	'output'    => [
		[
			'element' => '.single-post .jupiterx-post-related .card-body',
		],
	],
] );

// Divider.
JupiterX_Customizer::add_field( [
	'type'     => 'jupiterx-divider',
	'settings' => "{$section}_divider",
	'section'  => $section,
] );

// Spacing.
JupiterX_Customizer::add_responsive_field( [
	'type'      => 'jupiterx-box-model',
	'settings'  => "{$section}_container_spacing",
	'section'   => $section,
	'css_var'   => 'post-single-related-posts-container',
	'transport' => 'postMessage',
	'exclude'   => [ 'padding' ],
	'default'   => [
		'desktop' => [
			'margin_top' => 3,
		],
	],
	'output'    => [
		[
			'element' => '.single-post .jupiterx-post-related',
		],
	],
] );
