<?php
/**
 * Handles radio image control class.
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
 * Radio image control class.
 *
 * @since 1.0.0
 * @ignore
 * @access private
 *
 * @package JupiterX\Framework\API\Customizer
 */
class JupiterX_Customizer_Control_Radio_Image extends JupiterX_Customizer_Base_Control {

	/**
	 * Control's type.
	 *
	 * @since 1.0.0
	 *
	 * @var string
	 */
	public $type = 'jupiterx-radio-image';

	/**
	 * An Underscore (JS) template for control wrapper.
	 *
	 * Use to create the control template.
	 *
	 * @since 1.0.0
	 */
	protected function control_template() {
		?>
		<div class="jupiterx-control jupiterx-radio-image-control">
			<div class="jupiterx-radio-image-control-buttons">
				<# _.each( data.choices, function( image, key ) { #>
					<input class="jupiterx-radio-image-control-radio" {{{ data.inputAttrs }}} type="radio" value="{{ key }}" name="{{ data.id }}" id="{{ data.id }}-{{ key }}" {{{ data.link }}} <# if ( key === data.value ) { #> checked <# } #>>
					<label class="jupiterx-radio-image-control-button" for="{{ data.id }}-{{ key }}"><img src="<?php echo esc_url( JupiterX_Customizer_Utils::get_assets_url() ); ?>/img/{{ image }}.svg" /></label>
				<# } ) #>
			</div>
		</div>
		<?php
	}
}
