<?php
/**
 * Handles typography control class.
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
 * Typography control class.
 *
 * @since 1.0.0
 * @ignore
 * @access private
 *
 * @package JupiterX\Framework\API\Customizer
 */
class JupiterX_Customizer_Group_Control_Typography extends JupiterX_Customizer_Base_Group_Control {

	/**
	 * Control's type.
	 *
	 * @since 1.0.0
	 *
	 * @var string
	 */
	public $type = 'jupiterx-typography';

	/**
	 * Set the fields for this control.
	 *
	 * @since 1.0.0
	 */
	protected function set_fields() {
		$this->add_field( 'font_family', [
			'type'        => 'jupiterx-font',
			'column'      => '5',
			'icon'        => 'font-family',
			'placeholder' => __( 'Default', 'jupiterx' ),
		] );

		$this->add_field( 'font_size', [
			'type'        => 'jupiterx-input',
			'column'      => '4',
			'icon'        => 'font-size',
			'units'       => [ 'px', 'em', 'rem' ],
			'defaultUnit' => 'rem',
			'responsive'  => true,
		] );

		$this->add_field( 'color', [
			'type'   => 'jupiterx-color',
			'column' => '3',
			'icon'   => 'font-color',
		] );

		$this->add_field( 'font_weight', [
			'type'        => 'jupiterx-select',
			'column'      => '5',
			'icon'        => 'font-weight',
			'placeholder' => __( 'Default', 'jupiterx' ),
			'choices'     => $this->get_font_weights(),
		] );

		$this->add_field( 'font_style', [
			'type'    => 'jupiterx-choose',
			'column'  => '3',
			'default' => 'normal',
			'choices' => [
				'normal' => [
					'icon' => 'font-style-normal',
				],
				'italic' => [
					'icon' => 'font-style-italic',
				],
			],
		] );

		$this->add_field( 'line_height', [
			'type'        => 'jupiterx-input',
			'column'      => '4',
			'icon'        => 'line-height',
			'units'       => [ '-', 'px', 'em', 'rem' ],
			'defaultUnit' => '-',
		] );

		$this->add_field( 'letter_spacing', [
			'type'        => 'jupiterx-input',
			'column'      => '4',
			'icon'        => 'letter-spacing',
			'inputAttrs'  => [
				'min' => -1000,
			],
			'units'       => [ 'px', 'em', 'rem' ],
			'defaultUnit' => 'px',
		] );

		$this->add_field( 'text_transform', [
			'type'        => 'jupiterx-select',
			'column'      => '5',
			'icon'        => 'text-transform',
			'placeholder' => __( 'Default', 'jupiterx' ),
			'choices'     => [
				'capitalize' => __( 'Capitalize', 'jupiterx' ),
				'lowercase'  => __( 'Lowercase', 'jupiterx' ),
				'uppercase'  => __( 'Uppercase', 'jupiterx' ),
			],
		] );
	}

	/**
	 * Get safe fonts.
	 *
	 * @since 1.0.0
	 *
	 * @return array Safe fonts.
	 */
	protected function get_safe_fonts() {
		$font_family = [];

		$safe_fonts = [
			'HelveticaNeue-Light, Helvetica Neue Light, Helvetica Neue, Helvetica, Arial, "Lucida Grande", sans-serif',
			'Arial, Helvetica, sans-serif',
			'Arial Black, Gadget, sans-serif',
			'Bookman Old Style, serif',
			'Courier, monospace',
			'Courier New, Courier, monospace',
			'Garamond, serif',
			'Georgia, serif',
			'Impact, Charcoal, sans-serif',
			'Lucida Console, Monaco, monospace',
			'Lucida Grande, Lucida Sans Unicode, sans-serif',
			'MS Sans Serif, Geneva, sans-serif',
			'MS Serif, New York, sans-serif',
			'Palatino Linotype, Book Antiqua, Palatino, serif',
			'Tahoma, Geneva, sans-serif',
			'Times New Roman, Times, serif',
			'Trebuchet MS, Helvetica, sans-serif',
			'Verdana, Geneva, sans-serif',
			'Comic Sans MS, cursive',
		];

		foreach ( $safe_fonts as $font ) {
			$font_family[ $font ] = $font;
		}

		return $font_family;
	}

	/**
	 * Get font weights.
	 *
	 * @since 1.0.0
	 */
	protected function get_font_weights() {
		$font_weights = [
			'normal'  => __( 'Normal', 'jupiterx' ),
			'bold'    => __( 'Bold', 'jupiterx' ),
			'bolder'  => __( 'Bolder', 'jupiterx' ),
			'lighter' => __( 'Lighter', 'jupiterx' ),
			'100'     => __( '100', 'jupiterx' ),
			'200'     => __( '200', 'jupiterx' ),
			'300'     => __( '300', 'jupiterx' ),
			'400'     => __( '400', 'jupiterx' ),
			'500'     => __( '500', 'jupiterx' ),
			'600'     => __( '600', 'jupiterx' ),
			'700'     => __( '700', 'jupiterx' ),
			'800'     => __( '800', 'jupiterx' ),
			'900'     => __( '900', 'jupiterx' ),
		];

		return $font_weights;
	}

	/**
	 * Format CSS value from theme mod array value.
	 *
	 * @since 1.0.0
	 *
	 * @param array $value The field's value.
	 * @param array $args The field's arguments.
	 *
	 * @return array The formatted properties.
	 *
	 * @SuppressWarnings(PHPMD.UnusedFormalParameter)
	 */
	public static function format_properties( $value, $args ) {
		$with_unit = [ 'font_size', 'line_height', 'letter_spacing' ];

		foreach ( $with_unit as $property ) {
			if ( isset( $value[ $property ] ) && ! empty( $value[ $property ] ) ) {
				$value[ $property ] = JupiterX_Customizer_Control_Input::format_value( $value[ $property ] );
			}
		}

		return $value;
	}
}
