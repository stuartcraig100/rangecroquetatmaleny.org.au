<?php
/**
 * This class provides the means to add Post Meta boxes.
 *
 * @package JupiterX\Framework\Api\Post_Meta
 *
 * @since 1.0.0
 */

/**
 * Handle the Jupiter Post Meta workflow.
 *
 * @since 1.0.0
 * @ignore
 * @access private
 *
 * @package JupiterX\Framework\API\Post_Meta
 */
final class _JupiterX_Post_Meta {

	/**
	 * Metabox arguments.
	 *
	 * @var array
	 */
	private $args = array();

	/**
	 * Fields section.
	 *
	 * @var string
	 */
	private $section;

	/**
	 * Constructor.
	 *
	 * @param string $section Field section.
	 * @param array  $args Arguments of the field.
	 */
	public function __construct( $section, $args ) {
		$defaults = array(
			'title'    => __( 'Undefined', 'jupiterx' ),
			'context'  => 'normal',
			'priority' => 'high',
		);

		$this->section = $section;
		$this->args    = array_merge( $defaults, $args );
		$this->do_once();

		add_action( 'add_meta_boxes', array( $this, 'register_metabox' ) );
	}

	/**
	 * Trigger actions only once.
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	private function do_once() {
		static $once = false;

		if ( ! $once ) {
			add_action( 'edit_form_top', array( $this, 'nonce' ) );
			add_action( 'save_post', array( $this, 'save' ) );
			add_filter( 'attachment_fields_to_save', array( $this, 'save_attachment' ) );

			$once = true;
		}
	}

	/**
	 * Post meta nonce.
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	public function nonce() {
		?>
		<input type="hidden" name="jupiterx_post_meta_nonce" value="<?php echo esc_attr( wp_create_nonce( 'jupiterx_post_meta_nonce' ) ); ?>" />
		<?php
	}

	/**
	 * Add the Metabox.
	 *
	 * @since 1.0.0
	 *
	 * @param string $post_type Name of the post type.
	 *
	 * @return void
	 */
	public function register_metabox( $post_type ) {
		add_meta_box( $this->section, $this->args['title'], array( $this, 'metabox_content' ), $post_type, $this->args['context'], $this->args['priority'] );
	}

	/**
	 * Metabox content.
	 *
	 * @since 1.0.0
	 *
	 * @param int $post Post ID.
	 *
	 * @return void
	 * @SuppressWarnings(PHPMD.UnusedFormalParameter)
	 */
	public function metabox_content( $post ) {

		foreach ( jupiterx_get_fields( 'post_meta', $this->section ) as $field ) {
			jupiterx_field( $field );
		}
	}

	/**
	 * Save Post Meta.
	 *
	 * @since 1.0.0
	 *
	 * @param int $post_id Post ID.
	 *
	 * @return mixed
	 */
	public function save( $post_id ) {

		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
			return false;
		}

		if ( ! wp_verify_nonce( jupiterx_post( 'jupiterx_post_meta_nonce' ), 'jupiterx_post_meta_nonce' ) ) {
			return $post_id;
		}

		$fields = jupiterx_post( 'jupiterx_fields' );

		if ( ! $fields ) {
			return $post_id;
		}

		foreach ( $fields as $field => $value ) {
			update_post_meta( $post_id, $field, $value );
		}
	}

	/**
	 * Save Post Meta for attachment.
	 *
	 * @since 1.0.0
	 *
	 * @param int $attachment Attachment ID.
	 *
	 * @return mixed
	 */
	public function save_attachment( $attachment ) {

		if ( ! wp_verify_nonce( jupiterx_post( 'jupiterx_post_meta_nonce' ), 'jupiterx_post_meta_nonce' ) ) {
			return $post_id;
		}

		if ( ! current_user_can( 'edit_post', $attachment['ID'] ) ) {
			return $attachment;
		}

		$fields = jupiterx_post( 'jupiterx_fields' );

		if ( ! $fields ) {
			return $attachment;
		}

		foreach ( $fields as $field => $value ) {
			update_post_meta( $attachment['ID'], $field, $value );
		}

		return $attachment;
	}
}
