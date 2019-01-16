<?php
/**
 * Add Jupiter settings for Pages > Maintenance > Settings tab to the WordPress Customizer.
 *
 * @package JupiterX\Framework\Admin\Customizer
 *
 * @since   1.0.0
 */

$section = 'jupiterx_maintenance';

// Fields description.
JupiterX_Customizer::add_field( [
	'type'       => 'jupiterx-label',
	'settings'   => 'jupiterx_maintenance_label',
	'section'    => $section,
	'label'      => __( 'Maintenance page will be displayed to guests only.', 'jupiterx' ),
	'label_type' => 'description',
] );

// Enable maintenance.
JupiterX_Customizer::add_field( [
	'type'        => 'jupiterx-toggle',
	'settings'    => 'jupiterx_maintenance',
	'section'     => $section,
	'label'       => __( 'Maintenance', 'jupiterx' ),
	'column'      => 6,
	'default'     => false,
] );

// Template.
JupiterX_Customizer::add_field( [
	'type'        => 'jupiterx-select',
	'settings'    => 'jupiterx_maintenance_template',
	'section'     => $section,
	'label'       => __( 'Template', 'jupiterx' ),
	'column'      => 6,
	'default'     => '',
	'placeholder' => __( 'None', 'jupiterx' ),
	'transport'   => 'postMessage',
	'preview'     => true,
	'choices'     => JupiterX_Customizer_Utils::get_select_pages(),
] );
