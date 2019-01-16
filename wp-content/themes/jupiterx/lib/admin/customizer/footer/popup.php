<?php
/**
 * Add Jupiter Footer popup and tabs to the WordPress Customizer.
 *
 * @package JupiterX\Framework\Admin\Customizer
 *
 * @since   1.0.0
 */

$popups = [
	'widgets_title'         => __( 'Widgets Title', 'jupiterx' ),
	'widgets_text'          => __( 'Widgets Text', 'jupiterx' ),
	'widgets_link'          => __( 'Widgets Link', 'jupiterx' ),
	'widgets_thumbnail'     => __( 'Widgets Thumbnail', 'jupiterx' ),
	'widgets_container'     => __( 'Widgets Container', 'jupiterx' ),
	'widgets_divider'       => __( 'Widgets Divider', 'jupiterx' ),
	'widget_area_container' => __( 'Widget Area Container', 'jupiterx' ),
	'sub_copyright'         => __( 'Sub Footer Copyright', 'jupiterx' ),
	'sub_menu'              => __( 'Sub Footer Menu', 'jupiterx' ),
	'sub_container'         => __( 'Sub Footer Container', 'jupiterx' ),
];

// Popup.
JupiterX_Customizer::add_section( 'jupiterx_footer', [
	'title'    => __( 'Footer', 'jupiterx' ),
	'type'     => 'popup',
	'priority' => 135,
	'tabs'     => [
		'settings' => __( 'Settings', 'jupiterx' ),
		'styles'   => __( 'Styles', 'jupiterx' ),
	],
	'popups'   => $popups,
] );

// Settings tab.
JupiterX_Customizer::add_section( 'jupiterx_footer_settings', [
	'popup' => 'jupiterx_footer',
	'type'  => 'pane',
	'pane'  => [
		'type' => 'tab',
		'id'   => 'settings',
	],
] );

// Styles tab.
JupiterX_Customizer::add_section( 'jupiterx_footer_styles', [
	'popup' => 'jupiterx_footer',
	'type'  => 'pane',
	'pane'  => [
		'type' => 'tab',
		'id'   => 'styles',
	],
] );

// Styles tab > Widgets child popups.
JupiterX_Customizer::add_field( [
	'type'     => 'jupiterx-child-popup',
	'settings' => 'jupiterx_footer_styles_popups',
	'section'  => 'jupiterx_footer_styles',
	'target'   => 'jupiterx_footer',
	'choices'  => [
		'widgets_title'         => __( 'Widgets Title', 'jupiterx' ),
		'widgets_text'          => __( 'Widgets Text', 'jupiterx' ),
		'widgets_link'          => __( 'Widgets Link', 'jupiterx' ),
		'widgets_thumbnail'     => __( 'Widgets Thumbnail', 'jupiterx' ),
		'widgets_container'     => __( 'Widgets Container', 'jupiterx' ),
		'widgets_divider'       => __( 'Widgets Divider', 'jupiterx' ),
		'widget_area_container' => __( 'Widget Area Container', 'jupiterx' ),
	],
	'active_callback'  => [
		[
			'setting'  => 'jupiterx_footer_widget_area',
			'operator' => '===',
			'value'    => true,
		],
	],
] );

// Styles tab > Subfooter child popups (sortable).
JupiterX_Customizer::add_field( [
	'type'       => 'jupiterx-child-popup',
	'settings'   => 'jupiterx_footer_sub_sort_content',
	'section'    => 'jupiterx_footer_styles',
	'target'     => 'jupiterx_footer',
	'sortable'   => true,
	'default'    => [ 'sub_menu', 'sub_copyright' ],
	'choices'    => [
		'sub_copyright' => __( 'Sub Footer Copyright', 'jupiterx' ),
		'sub_menu'      => __( 'Sub Footer Menu', 'jupiterx' ),
	],
	'active_callback'  => [
		[
			'setting'  => 'jupiterx_footer_sub',
			'operator' => '===',
			'value'    => true,
		],
	],
] );

// Styles tab > Subfooter child popups (static).
JupiterX_Customizer::add_field( [
	'type'     => 'jupiterx-child-popup',
	'settings' => 'jupiterx_footer_sub_styles_popups',
	'section'  => 'jupiterx_footer_styles',
	'target'   => 'jupiterx_footer',
	'choices'  => [
		'sub_container' => __( 'Sub Footer Container', 'jupiterx' ),
	],
	'active_callback'  => [
		[
			'setting'  => 'jupiterx_footer_sub',
			'operator' => '===',
			'value'    => true,
		],
	],
] );

// Create popup children.
foreach ( $popups as $popup_id => $label ) {
	JupiterX_Customizer::add_section( 'jupiterx_footer_' . $popup_id, [
		'popup' => 'jupiterx_footer',
		'type'  => 'pane',
		'pane'  => [
			'type' => 'popup',
			'id'   => $popup_id,
		],
	] );
}

// Load all the settings.
foreach ( glob( dirname( __FILE__ ) . '/*.php' ) as $setting ) {
	require_once $setting;
}
