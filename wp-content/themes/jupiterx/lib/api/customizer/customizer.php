<?php
/**
 * This class handles API for customizer.
 *
 * @package JupiterX\Framework\API\Customizer
 *
 * @since 1.0.0
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Customizer wrapper class.
 *
 * @since 1.0.0
 * @ignore
 * @access private
 *
 * @package JupiterX\Framework\API\Customizer
 */
final class JupiterX_Customizer {

	/**
	 * Registered panels.
	 *
	 * @since 1.0.0
	 *
	 * @var array
	 */
	public static $panels = [];

	/**
	 * Registered sections.
	 *
	 * @since 1.0.0
	 *
	 * @var array
	 */
	public static $sections = [];

	/**
	 * Registered settings.
	 *
	 * @since 1.0.0
	 *
	 * @var array
	 */
	public static $settings = [];

	/**
	 * Configuration ID.
	 *
	 * Defined for Kirki.
	 *
	 * @since 1.0.0
	 *
	 * @var string
	 */
	public static $config_id = 'jupiterx';

	/**
	 * Section types.
	 *
	 * @since 1.0.0
	 *
	 * @var array
	 */
	public static $section_types = [
		'kirki-popup' => 'JupiterX_Customizer_Section_Popup',
		'kirki-pane'  => 'JupiterX_Customizer_Section_Pane',
	];

	/**
	 * Control types.
	 *
	 * @since 1.0.0
	 *
	 * @var array
	 */
	public static $control_types = [
		'jupiterx-input'       => 'JupiterX_Customizer_Control_Input',
		'jupiterx-text'        => 'JupiterX_Customizer_Control_Text',
		'jupiterx-textarea'    => 'JupiterX_Customizer_Control_Textarea',
		'jupiterx-select'      => 'JupiterX_Customizer_Control_Select',
		'jupiterx-toggle'      => 'JupiterX_Customizer_Control_Toggle',
		'jupiterx-choose'      => 'JupiterX_Customizer_Control_Choose',
		'jupiterx-multicheck'  => 'JupiterX_Customizer_Control_Multicheck',
		'jupiterx-divider'     => 'JupiterX_Customizer_Control_Divider',
		'jupiterx-label'       => 'JupiterX_Customizer_Control_Label',
		'jupiterx-position'    => 'JupiterX_Customizer_Control_Position',
		'jupiterx-color'       => 'JupiterX_Customizer_Control_Color',
		'jupiterx-image'       => 'JupiterX_Customizer_Control_Image',
		'jupiterx-radio-image' => 'JupiterX_Customizer_Control_Radio_Image',
		'jupiterx-child-popup' => 'JupiterX_Customizer_Control_Child_Popup',
		'jupiterx-popup'       => 'JupiterX_Customizer_Control_Popup',
		'jupiterx-box-model'   => 'JupiterX_Customizer_Control_Box_Model',
		'jupiterx-fonts'       => 'JupiterX_Customizer_Control_Fonts',
		'jupiterx-font'        => 'JupiterX_Customizer_Control_Font',
		'jupiterx-exceptions'  => 'JupiterX_Customizer_Control_Exceptions',
	];

	/**
	 * Group control types.
	 *
	 * @since 1.0.0
	 *
	 * @var array
	 */
	public static $group_control_types = [
		'jupiterx-background' => 'JupiterX_Customizer_Group_Control_Background',
		'jupiterx-box-shadow' => 'JupiterX_Customizer_Group_Control_Box_Shadow',
		'jupiterx-typography' => 'JupiterX_Customizer_Group_Control_Typography',
		'jupiterx-border'     => 'JupiterX_Customizer_Group_Control_Border',
	];

	/**
	 * Responsive devices media query.
	 *
	 * @since 1.0.0
	 *
	 * @var array
	 */
	public static $responsive_devices = [
		'desktop' => 'global',
		'tablet'  => '@media (max-width: 767.98px)',
		'mobile'  => '@media (max-width: 575.98px)',
	];

	/**
	 * Store panel.
	 *
	 * @since 1.0.0
	 *
	 * @param string $id ID of the panel.
	 * @param array  $args Arguments of the panel.
	 */
	public static function add_panel( $id = '', $args = [] ) {
		if ( empty( $id ) ) {
			return;
		}

		self::$panels[ $id ] = $args;
	}

	/**
	 * Store section.
	 *
	 * @since 1.0.0
	 *
	 * @param string $id ID of the section.
	 * @param array  $args Arguments of the section.
	 */
	public static function add_section( $id = '', $args = [] ) {
		if ( empty( $id ) ) {
			return;
		}

		self::$sections[ $id ] = array_merge( [ 'priority' => 160 ], $args );
	}

	/**
	 * Store settings.
	 *
	 * @since 1.0.0
	 *
	 * @param array $args Arguments of the field.
	 */
	public static function add_field( $args = [] ) {
		if ( ! isset( $args['type'] ) && ! isset( $args['settings'] ) ) {
			return;
		}

		self::$settings[ $args['settings'] ] = $args;
	}

	/**
	 * Add responsive field.
	 *
	 * @since 1.0.0
	 *
	 * @param array $args Arguments of the field.
	 */
	public static function add_responsive_field( $args = [] ) {
		if ( ! isset( $args['type'] ) && ! isset( $args['settings'] ) ) {
			return;
		}

		$args['responsive'] = true;

		self::$settings[ $args['settings'] ] = $args;
	}
}
