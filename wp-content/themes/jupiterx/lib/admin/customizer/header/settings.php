<?php
/**
 * Add Jupiter settings for Header > Settings tab to the WordPress Customizer.
 *
 * @package JupiterX\Framework\Admin\Customizer
 *
 * @since   1.0.0
 */

$section = 'jupiterx_header_settings';

// Type.
JupiterX_Customizer::add_field( [
	'type'     => 'jupiterx-choose',
	'settings' => 'jupiterx_header_type',
	'section'  => $section,
	'label'    => __( 'Type', 'jupiterx' ),
	'default'  => '',
	'choices'  => [
		''         => __( 'Default', 'jupiterx' ),
		'_custom'  => __( 'Custom', 'jupiterx' ),
	],
] );

// Align.
JupiterX_Customizer::add_responsive_field( [
	'type'     => 'jupiterx-choose',
	'settings' => 'jupiterx_header_align',
	'css_var'  => 'header-align',
	'section'  => $section,
	'label'    => __( 'Align', 'jupiterx' ),
	'column'   => '4',
	'default'  => [
		'desktop' => 'row',
		'tablet'  => 'row',
		'mobile'  => 'row',
	],
	'choices' => JupiterX_Customizer_Utils::get_align( 'flex-direction', [ 'center' ] ),
	'output'  => [
		[
			'element'  => '.jupiterx-site-navbar > div',
			'property' => 'flex-direction',
		],
	],
	'active_callback' => [
		[
			'setting'  => 'jupiterx_header_type',
			'operator' => '!=',
			'value'    => '_custom',
		],
	],
] );

// Template.
JupiterX_Customizer::add_field( [
	'type'            => 'jupiterx-select',
	'settings'        => 'jupiterx_header_template',
	'section'         => $section,
	'column'          => '6',
	'label'           => __( 'Template', 'jupiterx' ),
	'placeholder'     => __( 'Select one', 'jupiterx' ),
	'choices'         => JupiterX_Customizer_Utils::get_templates( 'header' ),
	'active_callback' => [
		[
			'setting'  => 'jupiterx_header_type',
			'operator' => '==',
			'value'    => '_custom',
		],
	],
] );

// Overlap content.
JupiterX_Customizer::add_responsive_field( [
	'type'      => 'jupiterx-toggle',
	'settings'  => 'jupiterx_header_overlap',
	'css_var'   => 'header-overlap',
	'section'   => $section,
	'label'     => __( 'Overlap Content', 'jupiterx' ),
	'column'    => '4',
] );

// Divider.
JupiterX_Customizer::add_field( [
	'type'     => 'jupiterx-divider',
	'settings' => 'jupiterx_header_settings_divider',
	'column'   => '12 jupiterx-divider-control-empty',
	'section'  => $section,
	'active_callback' => [
		[
			'setting'  => 'jupiterx_header_type',
			'operator' => '==',
			'value'    => '_custom',
		],
	],
] );

// Full width.
JupiterX_Customizer::add_field( [
	'type'            => 'jupiterx-toggle',
	'settings'        => 'jupiterx_header_full_width',
	'section'         => $section,
	'label'           => __( 'Full Width', 'jupiterx' ),
	'column'          => '4',
	'active_callback' => [
		[
			'setting'  => 'jupiterx_header_type',
			'operator' => '!=',
			'value'    => '_custom',
		],
	],
] );

// Display elements.
JupiterX_Customizer::add_responsive_field( [
	'type'            => 'jupiterx-multicheck',
	'settings'        => 'jupiterx_header_elements',
	'section'         => $section,
	'css_var'         => 'header_elements',
	'label'           => __( 'Display Elements', 'jupiterx' ),
	'default'         => [
		'desktop' => [ 'logo', 'menu', 'search', 'cart' ],
		'tablet'  => [ 'logo', 'menu', 'search', 'cart' ],
		'mobile'  => [ 'logo', 'menu', 'search', 'cart' ],
	],
	'choices'         => [
		'logo'      => __( 'Logo', 'jupiterx' ),
		'menu'      => __( 'Menu', 'jupiterx' ),
		'search'    => __( 'Search', 'jupiterx' ),
		'cart'      => __( 'Cart', 'jupiterx' ),
	],
	'active_callback' => [
		[
			'setting'  => 'jupiterx_header_type',
			'operator' => '!=',
			'value'    => '_custom',
		],
	],
] );

// Behavior.
JupiterX_Customizer::add_field( [
	'type'       => 'jupiterx-choose',
	'settings'   => 'jupiterx_header_behavior',
	'css_var'    => 'header-behavior',
	'section'    => $section,
	'label'      => __( 'Behavior', 'jupiterx' ),
	'column'     => '5',
	'default'    => 'static',
	'choices'  => [
		'static'  => [
			'label' => __( 'Static', 'jupiterx' ),
		],
		'fixed' => [
			'label' => __( 'Fixed', 'jupiterx' ),
		],
		'sticky' => [
			'label' => __( 'Sticky', 'jupiterx' ),
		],
	],
] );

// Position.
JupiterX_Customizer::add_field( [
	'type'       => 'jupiterx-choose',
	'settings'   => 'jupiterx_header_position',
	'css_var'    => 'header-position',
	'section'    => $section,
	'label'      => __( 'Position', 'jupiterx' ),
	'column'     => '3',
	'default'    => 'top',
	'choices'  => [
		'top'  => [
			'label' => __( 'Top', 'jupiterx' ),
		],
		'bottom' => [
			'label' => __( 'Bottom', 'jupiterx' ),
		],
	],
	'active_callback' => [
		[
			'setting'  => 'jupiterx_header_behavior',
			'operator' => '==',
			'value'    => 'fixed',
		],
	],
] );

// Offset.
JupiterX_Customizer::add_field( [
	'type'        => 'jupiterx-text',
	'settings'    => 'jupiterx_header_offset',
	'css_var'     => 'header-offset',
	'section'     => $section,
	'label'       => __( 'Offset', 'jupiterx' ),
	'column'      => '3',
	'inputType'   => 'number',
	'unit'        => 'px',
	'default'     => 500,
	'active_callback' => [
		[
			'setting'  => 'jupiterx_header_behavior',
			'operator' => '==',
			'value'    => 'sticky',
		],
	],
] );

// Behavior tablet.
JupiterX_Customizer::add_field( [
	'type'      => 'jupiterx-toggle',
	'settings'  => 'jupiterx_header_behavior_tablet',
	'css_var'   => 'header-behavior-tablet',
	'section'   => $section,
	'label'     => __( 'Enable on Tablet', 'jupiterx' ),
	'column'    => '6',
	'default'   => true,
	'active_callback' => [
		[
			'setting'  => 'jupiterx_header_behavior',
			'operator' => '!=',
			'value'    => 'static',
		],
	],
] );

// Behavior mobile.
JupiterX_Customizer::add_field( [
	'type'      => 'jupiterx-toggle',
	'settings'  => 'jupiterx_header_behavior_mobile',
	'css_var'   => 'header-behavior-mobile',
	'section'   => $section,
	'label'     => __( 'Enable on Mobile', 'jupiterx' ),
	'column'    => '6',
	'default'   => true,
	'active_callback' => [
		[
			'setting'  => 'jupiterx_header_behavior',
			'operator' => '!=',
			'value'    => 'static',
		],
	],
] );

// Template.
JupiterX_Customizer::add_field( [
	'type'            => 'jupiterx-select',
	'settings'        => 'jupiterx_header_sticky_template',
	'section'         => $section,
	'column'          => '6',
	'label'           => __( 'Template', 'jupiterx' ),
	'placeholder'     => __( 'Select one', 'jupiterx' ),
	'choices'         => JupiterX_Customizer_Utils::get_templates( 'header' ),
	'active_callback' => [
		[
			'setting'  => 'jupiterx_header_type',
			'operator' => '==',
			'value'    => '_custom',
		],
		[
			'setting'  => 'jupiterx_header_behavior',
			'operator' => '==',
			'value'    => 'sticky',
		],
	],
] );
