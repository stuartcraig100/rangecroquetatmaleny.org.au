<?php
/**
 * This class provides the methods to Store and retrieve Image sizes from database.
 *
 * @package JupiterX\Framework\Admin
 *
 * @since   1.0.0
 */

/**
 * Store and retrieve Image sizes.
 *
 * @since   1.0.0
 * @ignore
 * @access  private
 */
class JupiterX_Control_Panel_Image_Sizes {


	/**
	 * JupiterX_Control_Panel_Image_Sizes constructor.
	 *
	 * @since 1.0.0
	 */
	public function __construct() {
		add_action( 'wp_ajax_jupiterx_save_image_sizes', array( &$this, 'save_image_size' ) );
	}

	/**
	 * Return list of the stored image sizes, if empty, it will return default sample size.
	 *
	 * @since 1.0.0
	 *
	 * @return array
	 */
	public static function get_available_image_sizes() {

		$options = get_option( JUPITERX_IMAGE_SIZE_OPTION );

		if ( empty( $options ) ) {
			$options = array(
				array(
					'size_w' => 500,
					'size_h' => 500,
					'size_n' => 'Image Size 500x500',
					'size_c' => 'on',
				),
			);
		}

		return $options;
	}


	/**
	 * Process image sizes data passed via admin-ajax.php and store it in wp_options table.
	 *
	 * @since 1.0.0
	 *
	 * @return String|void
	 */
	public function save_image_size() {

		check_ajax_referer( 'ajax-image-sizes-options', 'security' );

		$options = isset( $_POST['options'] ) ? $_POST['options'] : array();
		$options_array = array();
		if ( ! empty( $options ) ) {
			foreach ( $options as $sizes ) {
				parse_str( $sizes, $output );
				$options_array[] = $output;
			}
		}
		update_option( JUPITERX_IMAGE_SIZE_OPTION, $options_array );
		wp_die( 1 );
	}
}
new JupiterX_Control_Panel_Image_Sizes();
