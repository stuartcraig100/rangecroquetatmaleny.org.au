<?php
/**
 * Add Jupiter settings for Blog Single > Styles > Featured Image tab to the WordPress Customizer.
 *
 * @package JupiterX\Framework\Admin\Customizer
 *
 * @since   1.0.0
 */

$section = 'jupiterx_post_single_social_share';


// Social Network Filter.
JupiterX_Customizer::add_field( [
	'type'          => 'jupiterx-multicheck',
	'settings'      => "{$section}_filter",
	'section'       => $section,
	'default'       => [
		'facebook',
		'twitter',
		'linkedin',
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
	'settings' => "{$section}_divider",
	'section'  => $section,
] );

// Align.
JupiterX_Customizer::add_responsive_field( [
	'type'      => 'jupiterx-choose',
	'settings'  => "{$section}_align",
	'section'   => $section,
	'css_var'   => 'post-single-social-share-align',
	'label'     => __( 'Align', 'jupiterx' ),
	'column'    => '4',
	'transport' => 'postMessage',
	'default'   => [
		'desktop' => '',
		'tablet'  => 'center',
		'mobile'  => 'center',
	],
	'choices'   => JupiterX_Customizer_Utils::get_align( 'justify-content' ),
	'output'    => [
		[
			'element'  => '.single-post .jupiterx-social-share-inner',
			'property' => 'justify-content',
		],
	],
] );

// Name.
JupiterX_Customizer::add_field( [
	'type'      => 'jupiterx-toggle',
	'settings'  => "{$section}_name",
	'section'   => $section,
	'label'     => __( 'Name', 'jupiterx' ),
	'column'    => '3',
	'default'   => true,
] );

// Divider.
JupiterX_Customizer::add_field( [
	'type'     => 'jupiterx-divider',
	'settings' => "{$section}_divider_2",
	'section'  => $section,
] );

// Link spacing.
JupiterX_Customizer::add_responsive_field( [
	'type'      => 'jupiterx-box-model',
	'settings'  => "{$section}_link_spacing",
	'section'   => $section,
	'css_var'   => 'post-single-social-share-link',
	'transport' => 'postMessage',
	'exclude'   => [ 'margin' ],
	'default'   => [
		'desktop' => [
			'padding_top'    => 0.4,
			jupiterx_get_direction( 'padding_right' ) => 0.75,
			'padding_bottom' => 0.4,
			jupiterx_get_direction( 'padding_left' ) => 0.75,
		],
	],
	'output'    => [
		[
			'element' => '.single-post .jupiterx-social-share-link',
		],
	],
] );

// Divider.
JupiterX_Customizer::add_field( [
	'type'     => 'jupiterx-divider',
	'settings' => "{$section}_divider_3",
	'section'  => $section,
] );

// Spacing.
JupiterX_Customizer::add_responsive_field( [
	'type'      => 'jupiterx-box-model',
	'settings'  => "{$section}_spacing",
	'section'   => $section,
	'css_var'   => 'post-single-social-share',
	'transport' => 'postMessage',
	'exclude'   => [ 'padding' ],
	'default'   => [
		'desktop' => [
			'margin_top' => 1.5,
		],
	],
	'output'    => [
		[
			'element' => '.single-post .jupiterx-social-share',
		],
	],
] );