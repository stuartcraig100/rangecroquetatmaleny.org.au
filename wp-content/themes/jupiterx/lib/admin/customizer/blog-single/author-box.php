<?php
/**
 * Add Jupiter settings for Blog Single > Styles > Related Posts tab to the WordPress Customizer.
 *
 * @package JupiterX\Framework\Admin\Customizer
 *
 * @since   1.0.0
 */

$section = 'jupiterx_post_single_author_box';

// Avatar label.
JupiterX_Customizer::add_field( [
	'type'       => 'jupiterx-label',
	'label'      => __( 'Avatar', 'jupiterx' ),
	'settings'   => 'jupiterx_post_single_author_box_label',
	'section'    => $section,
] );

// Avatar border radius.
JupiterX_Customizer::add_field( [
	'type'        => 'jupiterx-input',
	'settings'    => 'jupiterx_post_single_author_box_avatar_border_radius',
	'section'     => $section,
	'css_var'     => 'post-single-author-box-avatar-border-radius',
	'column'      => '4',
	'icon'        => 'corner-radius',
	'units'       => [ 'px', '%' ],
	'transport'   => 'postMessage',
	'output'      => [
		[
			'element'  => '.single-post .jupiterx-post-author-box-avatar img',
			'property' => 'border-radius',
		],
	],
] );

// Divider.
JupiterX_Customizer::add_field( [
	'type'     => 'jupiterx-divider',
	'settings' => 'jupiterx_post_single_author_box_divider',
	'section'  => $section,
] );

// Name label.
JupiterX_Customizer::add_field( [
	'type'       => 'jupiterx-label',
	'label'      => __( 'Name', 'jupiterx' ),
	'settings'   => 'jupiterx_post_single_author_box_label_2',
	'section'    => $section,
] );

// Name typography.
JupiterX_Customizer::add_responsive_field( [
	'type'      => 'jupiterx-typography',
	'settings'  => 'jupiterx_post_single_author_box_name_typography',
	'section'   => $section,
	'css_var'   => 'post-single-author-box-name',
	'transport' => 'postMessage',
	'exclude'   => [ 'letter_spacing', 'text_transform', 'line_height' ],
	'output'    => [
		[
			'element' => '.single-post .jupiterx-post-author-box-link',
		],
	],
] );

// Divider.
JupiterX_Customizer::add_field( [
	'type'     => 'jupiterx-divider',
	'settings' => 'jupiterx_post_single_author_box_divider_2',
	'section'  => $section,
] );

// Description label.
JupiterX_Customizer::add_field( [
	'type'       => 'jupiterx-label',
	'label'      => __( 'Description', 'jupiterx' ),
	'settings'   => 'jupiterx_post_single_author_box_label_3',
	'section'    => $section,
] );

// Description typography.
JupiterX_Customizer::add_responsive_field( [
	'type'      => 'jupiterx-typography',
	'settings'  => 'jupiterx_post_single_author_box_description_typography',
	'section'   => $section,
	'css_var'   => 'post-single-author-box-description',
	'transport' => 'postMessage',
	'exclude'   => [ 'letter_spacing', 'text_transform' ],
	'output'    => [
		[
			'element' => '.single-post .jupiterx-post-author-box-content p',
		],
	],
] );

// Divider.
JupiterX_Customizer::add_field( [
	'type'     => 'jupiterx-divider',
	'settings' => 'jupiterx_post_single_author_box_divider_3',
	'section'  => $section,
] );

// Icons label.
JupiterX_Customizer::add_field( [
	'type'       => 'jupiterx-label',
	'label'      => __( 'Social Network Icons', 'jupiterx' ),
	'settings'   => 'jupiterx_post_single_author_box_label_4',
	'section'    => $section,
] );

// Icons size.
JupiterX_Customizer::add_field( [
	'type'        => 'jupiterx-input',
	'settings'    => 'jupiterx_post_single_author_box_icons_size',
	'section'     => $section,
	'css_var'     => 'post-single-author-box-icons-size',
	'column'      => '4',
	'icon'        => 'font-size',
	'units'       => [ 'px', 'em', 'rem' ],
	'transport'   => 'postMessage',
	'output'      => [
		[
			'element'  => '.single-post .jupiterx-post-author-icons a',
			'property' => 'font-size',
		],
	],
] );

// Icons gap.
JupiterX_Customizer::add_field( [
	'type'      => 'jupiterx-input',
	'settings'  => 'jupiterx_post_single_author_box_icons_gap',
	'section'   => $section,
	'css_var'   => 'post-single-author-box-icons-gap',
	'column'    => '4',
	'icon'      => 'space-between',
	'units'     => [ 'px', 'em' ],
	'transport' => 'postMessage',
	'output'    => [
		[
			'element'       => '.single-post .jupiterx-post-author-icons li',
			'property'      => 'margin-right',
		],
	],
] );

// Icons color.
JupiterX_Customizer::add_field( [
	'type'      => 'jupiterx-color',
	'settings'  => 'jupiterx_post_single_author_box_icons_color',
	'section'   => $section,
	'css_var'   => 'post-single-author-box-icons-color',
	'column'    => '3',
	'icon'      => 'font-color',
	'transport' => 'postMessage',
	'output'    => [
		[
			'element'  => '.single-post .jupiterx-post-author-icons a',
			'property' => 'color',
		],
	],
] );

// Divider.
JupiterX_Customizer::add_field( [
	'type'     => 'jupiterx-divider',
	'settings' => 'jupiterx_post_single_author_box_divider_4',
	'section'  => $section,
] );

// Container label.
JupiterX_Customizer::add_field( [
	'type'       => 'jupiterx-label',
	'label'      => __( 'Container', 'jupiterx' ),
	'settings'   => 'jupiterx_post_single_author_box_label_5',
	'section'    => $section,
] );

// Container align.
JupiterX_Customizer::add_responsive_field( [
	'type'     => 'jupiterx-choose',
	'settings' => 'jupiterx_post_single_author_box_align',
	'section'  => $section,
	'css_var'  => 'post-single-author-box-align',
	'column'   => '4',
	'default'  => [
		'desktop' => '',
		'tablet'  => 'center',
		'mobile'  => 'center',
	],
	'choices'  => JupiterX_Customizer_Utils::get_align(),
] );

// Container background color.
JupiterX_Customizer::add_field( [
	'type'      => 'jupiterx-color',
	'settings'  => 'jupiterx_post_single_author_box_background_color',
	'section'   => $section,
	'css_var'   => 'post-single-author-box-background-color',
	'column'    => '3',
	'icon'      => 'background-color',
	'transport' => 'postMessage',
	'output'    => [
		[
			'element'  => '.single-post .jupiterx-post-author-box',
			'property' => 'background-color',
		],
	],
] );

// Container border.
JupiterX_Customizer::add_field( [
	'type'      => 'jupiterx-border',
	'settings'  => 'jupiterx_post_single_author_box_border',
	'section'   => $section,
	'css_var'   => 'post-single-author-box-border',
	'transport' => 'postMessage',
	'exclude'   => [ 'style', 'size' ],
	'output'    => [
		[
			'element' => '.single-post .jupiterx-post-author-box',
		],
	],
] );

// Divider.
JupiterX_Customizer::add_field( [
	'type'     => 'jupiterx-divider',
	'settings' => 'jupiterx_post_single_author_box_divider_5',
	'section'  => $section,
] );

// Spacing.
JupiterX_Customizer::add_responsive_field( [
	'type'      => 'jupiterx-box-model',
	'settings'  => 'jupiterx_post_single_author_box_spacing',
	'section'   => $section,
	'css_var'   => 'post-single-author-box',
	'transport' => 'postMessage',
	'default'   => [
		'desktop' => [
			'margin_top' => 3,
		],
	],
	'output'    => [
		[
			'element' => '.single-post .jupiterx-post-author-box',
		],
	],
] );
