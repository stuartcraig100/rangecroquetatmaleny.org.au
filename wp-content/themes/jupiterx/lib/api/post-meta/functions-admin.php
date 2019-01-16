<?php
// @codingStandardsIgnoreFile
/**
 * The Jupiter Post Meta component extends the Jupiter Fields and make it easy add fields to any Post Type.
 *
 * @package JupiterX\Framework\API\Post_Meta
 *
 * @since 1.0.0
 */

/**
 * Register Post Meta.
 *
 * This function should only be invoked through the 'admin_init' action.
 *
 * @since 1.0.0
 *
 * @param array        $fields {
 *            Array of fields to register.
 *
 *      @type string $id          A unique id used for the field. This id will also be used to save the value in
 *                                the database.
 *      @type string $type        The type of field to use. Please refer to the Jupiter core field types for more
 *                                information. Custom field types are accepted here.
 *      @type string $label       The field label. Default false.
 *      @type string $description The field description. The description can be truncated using <!--more-->
 *                                as a delimiter. Default false.
 *      @type array  $attributes  An array of attributes to add to the field. The array key defines the
 *                                attribute name and the array value defines the attribute value. Default array.
 *      @type mixed  $default     The default field value. Default false.
 *      @type array  $fields      Must only be used for 'group' field type. The array arguments are similar to the
 *                                {@see jupiterx_register_fields()} $fields arguments.
 *      @type bool   $db_group    Must only be used for 'group' field type. Defines whether the group of fields
 *                                registered should be saved as a group in the database or as individual
 *                                entries. Default false.
 * }
 * @param string|array $conditions Array of 'post types id(s)', 'post id(s)' or 'page template slug(s)' for which the post meta should be registered.
 *                                 'page template slug(s)' must include '.php' file extention. Set to true to display everywhere.
 * @param string       $section          A section id to define the group of fields.
 * @param array        $args {
 *            Optional. Array of arguments used to register the fields.
 *
 *      @type string $title    The metabox Title. Default 'Undefined'.
 *      @type string $context  Where on the page the metabox should be shown
 *                             ('normal', 'advanced', or 'side'). Default 'normal'.
 *      @type int    $priority The priority within the context where the boxes should show
 *                             ('high', 'core', 'default' or 'low'). Default 'high'.
 * }
 *
 * @return bool True on success, false on failure.
 */
function jupiterx_register_post_meta( array $fields, $conditions, $section, $args = array() ) {
	global $_jupiterx_post_meta_conditions;

	/**
	 * Filter the post meta fields.
	 *
	 * The dynamic portion of the hook name, $section, refers to the section id which defines the group of fields.
	 *
	 * @since 1.0.0
	 *
	 * @param array $fields An array of post meta fields.
	 */
	$fields = apply_filters( "jupiterx_post_meta_fields_{$section}", _jupiterx_pre_standardize_fields( $fields ) );

	/**
	 * Filter the conditions used to define whether the fields set should be displayed or not.
	 *
	 * The dynamic portion of the hook name, $section, refers to the section id which defines the group of fields.
	 *
	 * @since 1.0.0
	 *
	 * @param string|array $conditions Conditions used to define whether the fields set should be displayed or not.
	 */
	$conditions = apply_filters( "jupiterx_post_meta_post_types_{$section}", $conditions );

	$_jupiterx_post_meta_conditions = array_merge( $_jupiterx_post_meta_conditions, (array) $conditions );

	// Stop here if the current page isn't concerned.
	if ( ! _jupiterx_is_post_meta_conditions( $conditions ) || ! is_admin() ) {
		return;
	}

	// Stop here if the field can't be registered.
	if ( ! jupiterx_register_fields( $fields, 'post_meta', $section ) ) {
		return false;
	}

	// Load the class only if this function is called to prevent unnecessary memory usage.
	require_once JUPITERX_API_PATH . 'post-meta/class.php';

	new _JupiterX_Post_Meta( $section, $args );
}

/**
 * Check the current screen conditions.
 *
 * @since 1.0.0
 * @ignore
 * @access private
 *
 * @param array $conditions Conditions to show a Post Meta box.
 *
 * @return bool
 * @SuppressWarnings(PHPMD.ElseExpression)
 */
function _jupiterx_is_post_meta_conditions( $conditions ) {

	// If user has designated boolean true, it's always true. Nothing more to do here.
	if ( true === $conditions ) {
		return true;
	}

	// Check if it is a new post and treat it as such.
	if ( false !== stripos( $_SERVER['REQUEST_URI'], 'post-new.php' ) ) {
		$current_post_type = jupiterx_get( 'post_type' );

		if ( ! $current_post_type ) {

			if ( in_array( 'post', (array) $conditions, true ) ) {
				return true;
			} else {
				return false;
			}
		}
	} else {
		// Try to get id from $_GET.
		$id_get = jupiterx_get( 'post' );
		// Try to get id from $_POST.
		$id_post = jupiterx_post( 'post_ID' );

		if ( $id_get ) {
			$post_id = $id_get;
		} elseif ( $id_post ) {
			$post_id = $id_post;
		}

		if ( ! isset( $post_id ) ) {
			return false;
		}

		$current_post_type = get_post_type( $post_id );
	}

	$statements = array(
		in_array( $current_post_type, (array) $conditions, true ), // Check post type.
		isset( $post_id ) && in_array( $post_id, (array) $conditions, true ), // Check post id.
		isset( $post_id ) && in_array( get_post_meta( $post_id, '_wp_page_template', true ), (array) $conditions, true ), // Check page template.
	);

	// Return true if any condition is met, otherwise false.
	return in_array( true, $statements, true );
}

add_action( 'admin_print_footer_scripts', '_jupiterx_post_meta_page_template_reload' );
/**
 * Reload post edit screen on page template change.
 *
 * @since 1.0.0
 * @ignore
 * @access private
 *
 * @return void
 */
function _jupiterx_post_meta_page_template_reload() {
	global $_jupiterx_post_meta_conditions, $pagenow;

	// Stop here if not editing a post object.
	if ( ! in_array( $pagenow, array( 'post-new.php', 'post.php' ), true ) ) {
		return;
	}

	// Stop here of there isn't any post meta assigned to page templates.
	if ( false === stripos( wp_json_encode( $_jupiterx_post_meta_conditions ), '.php' ) ) {
		return;
	}

	?>
	<script type="text/javascript">
		( function( $ ) {
			$( document ).ready( function() {
				$( '#page_template' ).data( 'jupiterx-pre', $( '#page_template' ).val() );
				$( '#page_template' ).change( function() {
					var save = $( '#save-action #save-post' ),
						meta = JSON.parse( '<?php echo wp_json_encode( $_jupiterx_post_meta_conditions ); ?>' );

					if ( -1 === $.inArray( $( this ).val(), meta ) && -1 === $.inArray( $( this ).data( 'jupiterx-pre' ), meta ) ) {
						return;
					}

					if ( save.length === 0 ) {
						save = $( '#publishing-action #publish' );
					}

					$( this ).data( 'jupiterx-pre', $( this ).val() );
					save.trigger( 'click' );
					$( '#wpbody-content' ).fadeOut();
				} );
			} );
		} )( jQuery );
	</script>
	<?php
}

/**
 * Initialize post meta conditions.
 *
 * @ignore
 * @access private
 */
global $_jupiterx_post_meta_conditions;

if ( ! isset( $_jupiterx_post_meta_conditions ) ) {
	$_jupiterx_post_meta_conditions = array();
}
