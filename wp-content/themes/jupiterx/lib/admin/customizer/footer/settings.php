<?php
/**
 * Add Jupiter settings for Footer > Settings tab to the WordPress Customizer.
 *
 * @package JupiterX\Framework\Admin\Customizer
 *
 * @since   1.0.0
 */

$section = 'jupiterx_footer_settings';

// Type.
JupiterX_Customizer::add_field( [
	'type'     => 'jupiterx-choose',
	'settings' => 'jupiterx_footer_type',
	'section'  => $section,
	'label'    => __( 'Type', 'jupiterx' ),
	'column'   => '6',
	'default'  => '',
	'choices'  => [
		''        => __( 'Default', 'jupiterx' ),
		'_custom' => __( 'Custom', 'jupiterx' ),
	],
] );

// Behavior.
JupiterX_Customizer::add_field( [
	'type'            => 'jupiterx-choose',
	'settings'        => 'jupiterx_footer_behavior',
	'section'         => $section,
	'label'           => __( 'Behavior', 'jupiterx' ),
	'default'         => 'static',
	'column'          => '6',
	'choices'         => [
		'static' => __( 'Static', 'jupiterx' ),
		'fixed'  => __( 'Fixed', 'jupiterx' ),
	],
] );


// Widget area.
JupiterX_Customizer::add_field( [
	'type'            => 'jupiterx-toggle',
	'settings'        => 'jupiterx_footer_widget_area',
	'section'         => $section,
	'label'           => __( 'Widget Area', 'jupiterx' ),
	'column'          => '6',
	'default'         => false,
	'active_callback' => [
		[
			'setting'  => 'jupiterx_footer_type',
			'operator' => '!=',
			'value'    => '_custom',
		],
	],
] );

$widget_area_enabled = [
	[
		'setting'  => 'jupiterx_footer_type',
		'operator' => '!=',
		'value'    => '_custom',
	],
	[
		'setting'  => 'jupiterx_footer_widget_area',
		'operator' => '==',
		'value'    => true,
	],
];

// Full width.
JupiterX_Customizer::add_field( [
	'type'     => 'jupiterx-toggle',
	'settings' => 'jupiterx_footer_widgets_full_width',
	'section'  => $section,
	'label'    => __( 'Full Width', 'jupiterx' ),
	'column'   => '6',
	'default'  => false,
	'active_callback' => $widget_area_enabled,
] );

// Layout columns.
JupiterX_Customizer::add_field( [
	'type'            => 'jupiterx-radio-image',
	'settings'        => 'jupiterx_footer_widgets_layout',
	'section'         => $section,
	'label'           => __( 'Layout', 'jupiterx' ),
	'default'         => 'footer_layout_01',
	'choices'         => [
		'footer_layout_01' => 'footer-layout-01',
		'footer_layout_02' => 'footer-layout-02',
		'footer_layout_03' => 'footer-layout-03',
		'footer_layout_04' => 'footer-layout-04',
		'footer_layout_05' => 'footer-layout-05',
		'footer_layout_06' => 'footer-layout-06',
		'footer_layout_07' => 'footer-layout-07',
		'footer_layout_08' => 'footer-layout-08',
		'footer_layout_09' => 'footer-layout-09',
		'footer_layout_10' => 'footer-layout-10',
		'footer_layout_11' => 'footer-layout-11',
		'footer_layout_12' => 'footer-layout-12',
		'footer_layout_13' => 'footer-layout-13',
		'footer_layout_14' => 'footer-layout-14',
		'footer_layout_15' => 'footer-layout-15',
		'footer_layout_16' => 'footer-layout-16',
		'footer_layout_17' => 'footer-layout-17',
	],
	'active_callback' => $widget_area_enabled,
] );

// Enable on tablet (widget area).
JupiterX_Customizer::add_field( [
	'type'      => 'jupiterx-toggle',
	'settings'  => 'jupiterx_footer_widget_area_tablet',
	'css_var'   => 'footer-widget-area-tablet',
	'section'   => $section,
	'label'     => __( 'Enable on Tablet', 'jupiterx' ),
	'column'    => '6',
	'default'   => true,
	'active_callback' => $widget_area_enabled,
] );

// Enable on mobile (widget area).
JupiterX_Customizer::add_field( [
	'type'      => 'jupiterx-toggle',
	'settings'  => 'jupiterx_footer_widget_area_mobile',
	'css_var'   => 'footer-widget-area-mobile',
	'section'   => $section,
	'label'     => __( 'Enable on Mobile', 'jupiterx' ),
	'column'    => '6',
	'default'   => true,
	'active_callback' => $widget_area_enabled,
] );

// Divider.
JupiterX_Customizer::add_field( [
	'type'     => 'jupiterx-divider',
	'settings' => 'jupiterx_footer_divider',
	'column'   => '12',
	'section'  => $section,
	'active_callback' => [
		[
			'setting'  => 'jupiterx_footer_type',
			'operator' => '!=',
			'value'    => '_custom',
		],
	],
] );

// Enable sub footer.
JupiterX_Customizer::add_field( [
	'type'     => 'jupiterx-toggle',
	'settings' => 'jupiterx_footer_sub',
	'section'  => $section,
	'label'    => __( 'Sub Footer', 'jupiterx' ),
	'column'   => '6',
	'default'  => true,
	'active_callback' => [
		[
			'setting'  => 'jupiterx_footer_type',
			'operator' => '!=',
			'value'    => '_custom',
		],
	],
] );

$footer_sub_enabled = [
	[
		'setting'  => 'jupiterx_footer_sub',
		'operator' => '==',
		'value'    => true,
	],
	[
		'setting'  => 'jupiterx_footer_type',
		'operator' => '!=',
		'value'    => '_custom',
	],
];

// Full width.
JupiterX_Customizer::add_field( [
	'type'     => 'jupiterx-toggle',
	'settings' => 'jupiterx_footer_sub_full_width',
	'section'  => $section,
	'label'    => __( 'Full Width', 'jupiterx' ),
	'column'   => '6',
	'default'  => false,
	'active_callback' => $footer_sub_enabled,
] );

// Display elements.
JupiterX_Customizer::add_field( [
	'type'            => 'jupiterx-multicheck',
	'settings'        => 'jupiterx_footer_sub_elements',
	'section'         => $section,
	'label'           => __( 'Display Elements', 'jupiterx' ),
	'default'         => [ 'copyright', 'menu' ],
	'choices'         => [
		'copyright' => __( 'Copyright Text', 'jupiterx' ),
		'menu'      => __( 'Menu', 'jupiterx' ),
	],
	'active_callback' => $footer_sub_enabled,
] );

// Enable on tablet (sub footer).
JupiterX_Customizer::add_field( [
	'type'            => 'jupiterx-toggle',
	'settings'        => 'jupiterx_footer_sub_tablet',
	'css_var'         => 'footer-sub-tablet',
	'section'         => $section,
	'label'           => __( 'Enable on Tablet', 'jupiterx' ),
	'column'          => '6',
	'default'         => true,
	'active_callback' => $footer_sub_enabled,
] );

// Enable on mobile (sub footer).
JupiterX_Customizer::add_field( [
	'type'            => 'jupiterx-toggle',
	'settings'        => 'jupiterx_footer_sub_mobile',
	'css_var'         => 'footer-sub-mobile',
	'section'         => $section,
	'label'           => __( 'Enable on Mobile', 'jupiterx' ),
	'column'          => '6',
	'default'         => true,
	'active_callback' => $footer_sub_enabled,
] );

// Template.
JupiterX_Customizer::add_field( [
	'type'            => 'jupiterx-select',
	'settings'        => 'jupiterx_footer_template',
	'section'         => $section,
	'column'          => '6',
	'label'           => __( 'Template', 'jupiterx' ),
	'placeholder'     => __( 'Select one', 'jupiterx' ),
	'choices'         => JupiterX_Customizer_Utils::get_templates( 'footer' ),
	'active_callback' => [
		[
			'setting'  => 'jupiterx_footer_type',
			'operator' => '==',
			'value'    => '_custom',
		],
	],
] );
