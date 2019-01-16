<?php
/**
 * Functions for updating theme version.
 *
 * @package JupiterX\Framework\API\Compatibility
 *
 * @since 1.0.0
 */

/**
 * Version 0.6.5 updates.
 *
 * 1. Header overlap responsive support
 * 2. Header offset control replacement from input to text
 *
 * @since 1.0.0
 *
 * @return void
 */
function jupiterx_update_v065() {
	$header_overlap = get_theme_mod( 'jupiterx_header_overlap' );

	if ( ! is_array( $header_overlap ) ) {
		set_theme_mod( 'jupiterx_header_overlap', [ 'desktop' => $header_overlap ] );
	}

	$header_offset = get_theme_mod( 'jupiterx_header_offset' );

	if ( is_array( $header_offset ) && isset( $header_offset['size'] ) ) {
		set_theme_mod( 'jupiterx_header_offset', $header_offset['size'] );
	}
}

/**
 * Version 0.6.51 updates.
 *
 * 1. Header logo
 * 2. Site settings -> Logo
 *
 * @since 1.0.0
 *
 * @return void
 */
function jupiterx_update_v066() {
	// 'jupiterx_header_logo_skin' to 'jupiterx_header_logo'.
	$logo_skin = get_theme_mod( 'jupiterx_header_logo_skin' );

	if ( 'jupiterx_logo_light' === $logo_skin ) {
		$logo_skin = 'jupiterx_logo_secondary';
	}

	set_theme_mod( 'jupiterx_header_logo', $logo_skin );

	// 'jupiterx_logo_light' to 'jupiterx_logo_secondary'.
	$light_logo = get_theme_mod( 'jupiterx_logo_light' );
	set_theme_mod( 'jupiterx_logo_secondary', $light_logo );

	// 'jupiterx_logo_light_retina' to 'jupiterx_logo_secondary_retina'.
	$retina_light_logo = get_theme_mod( 'jupiterx_logo_light_retina' );
	set_theme_mod( 'jupiterx_logo_secondary_retina', $light_logo );
}

/**
 * Version 0.7.5 updates.
 *
 * 1. Theme mod keys
 * 2. Posts meta (will be done via search and replace)
 * 3. Widgets options (will be done via search and replace)
 *
 * @since 1.0.0
 *
 * @return void
 */
function jupiterx_update_v075() {
	$mods = get_theme_mods();

	foreach ( $mods as $key => $value ) {
		if ( ! array_key_exists( $key, $mods ) ) {
			continue;
		}

		unset( $mods[ $key ] );

		$new_key          = str_replace( 'jupiter_', 'jupiterx_', $key );
		$mods[ $new_key ] = $value;
	}

	$theme = get_option( 'stylesheet' );
	update_option( "theme_mods_$theme", $mods );
}

/**
 * Version 0.7.6 updates.
 *
 * @since 1.0.0
 *
 * @return void
 */
function jupiterx_update_v076() {
	update_option( 'jupiterx_theme_version', '0.5.5' );
}

/**
 * Version 0.7.8 updates.
 *
 * @since 1.0.0
 *
 * @return void
 */
function jupiterx_update_v077() {
	$mods = get_theme_mods();

	foreach ( $mods as $key => $value ) {
		if ( ! array_key_exists( $key, $mods ) ) {
			continue;
		}

		unset( $mods[ $key ] );

		$new_key          = str_replace( 'jupiter_', 'jupiterx_', $key );
		$mods[ $new_key ] = $value;
	}

	$theme = get_option( 'stylesheet' );
	update_option( "theme_mods_$theme", $mods );
}
