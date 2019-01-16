<?php
/**
 * Load all functionalities about Custom Fields.
 *
 * @package JupiterX\Framework\API\Custom_Fields
 *
 * @since   1.0.0
 */

/**
 * The Main class for populating Custom Fields.
 *
 * @since   1.0.0
 * @ignore
 * @access  private
 *
 * @package JupiterX\Framework\API\Custom_Fields
 */
class JupiterX_Custom_Fields {
	/**
	 * Constructor.
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	public function __construct() {
		jupiterx_add_smart_action( 'acf/init', [ $this, 'register_fields' ] );
		jupiterx_add_smart_action( 'acf/include_field_types', [ $this, 'register_field_types' ] );
		jupiterx_add_smart_action( 'wp_enqueue_scripts', [ $this, 'styles' ], 9 );
		jupiterx_add_smart_action( 'save_post', [ $this, 'flush_styles' ], 20 );
		jupiterx_add_smart_action( 'admin_enqueue_scripts', [ $this, 'assets' ] );
	}

	/**
	 * Register field types.
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	public function register_field_types() {
		$fields = [
			'widget-area.php',
			'divider.php',
		];

		foreach ( $fields as $control ) {
			require_once JUPITERX_API_PATH . 'custom-fields/field-types/' . $control;
		}
	}

	/**
	 * Register fields.
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	public function register_fields() {
		$fields = [
			'post-types/options',
			'post-types/options/header',
			'post-types/options/main',
			'post-types/options/title-bar',
			'post-types/options/footer',
			'taxonomy',
			'user',
		];

		foreach ( $fields as $field ) {
			require_once JUPITERX_ADMIN_PATH . 'custom-fields/' . $field . '.php';
		}
	}

	/**
	 * Generate styles based on functions that hooked to jupiterx_post_styles.
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	public function styles() {

		$styles = apply_filters( 'jupiterx_post_styles', array() );

		if ( empty( $styles ) ) {
			return;
		}

		jupiterx_compiler_add_fragment( 'jupiterx', $styles, 'less' );
	}

	/**
	 * Flush styles and regenerate them.
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	public function flush_styles() {
		jupiterx_flush_compiler( 'jupiterx', 'css', false );
	}

	/**
	 * Enqueue needed assets for custom fields.
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	public function assets() {
		wp_enqueue_style( 'jupiterx-custom-fields', JUPITERX_ADMIN_URL . '/assets/css/custom-fields.css', false, JUPITERX_VERSION );
	}

}

// Init.
new JupiterX_Custom_Fields();
