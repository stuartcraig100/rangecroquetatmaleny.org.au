<?php
/**
 * The Jupiter Header component contains a set of functions for site header.
 *
 * @package JupiterX\Framework\API\Header
 *
 * @since   1.0.0
 */

jupiterx_add_smart_action( 'jupiterx_body_before_markup', 'jupiterx_get_header_body_class' );
/**
 * Get header class for body.
 *
 * @since 1.0.0
 *
 * @return void
 * @SuppressWarnings(PHPMD.NPathComplexity)
 */
function jupiterx_get_header_body_class() {
	$class = [];

	$border          = get_theme_mod( 'jupiterx_site_body_border_enabled' );
	$behavior        = jupiterx_get_option( 'jupiterx_header_behavior', 'global' );
	$behavior_tablet = jupiterx_get_option( 'jupiterx_header_behavior_tablet', '', true );
	$behavior_mobile = jupiterx_get_option( 'jupiterx_header_behavior_mobile', '', true );
	$position        = jupiterx_get_option( 'jupiterx_header_position', 'global', 'top' );

	// Body border.
	if ( $border ) {
		$class[] = 'jupiterx-has-border';
	}

	// Behavior.
	if ( ! empty( $behavior ) && 'static' !== $behavior ) {
		$class[] = 'jupiterx-header-' . $behavior;
	}

	// Position.
	if ( 'bottom' === $position && 'fixed' === $behavior ) {
		$class[] = 'jupiterx-header-' . $position;
	}

	// Enable on tablet.
	if ( ! $behavior_tablet && 'static' !== $behavior ) {
		$class[] = 'jupiterx-header-tablet-behavior-off';
	}

	// Enable on mobile.
	if ( ! $behavior_mobile && 'static' !== $behavior ) {
		$class[] = 'jupiterx-header-mobile-behavior-off';
	}

	// Overlap.
	if ( jupiterx_is_header_overlap() ) {
		$class = array_merge( $class, jupiterx_get_header_overlap_classes() );
	}

	if ( empty( $class ) ) {
		return;
	}

	jupiterx_add_attribute( 'jupiterx_body', 'class', implode( ' ', $class ) );
}

/**
 * Get header class.
 *
 * @since 1.0.0
 *
 * @return string The header classes.
 */
function jupiterx_get_header_class() {
	$class = [ 'jupiterx-header' ];

	$template        = jupiterx_get_option( 'jupiterx_header_template', 'global' );
	$sticky_template = jupiterx_get_option( 'jupiterx_header_sticky_template', 'global' );

	// Custom header.
	if ( '_custom' === jupiterx_get_option( 'jupiterx_header_type', 'global' ) ) {
		$class[] = 'jupiterx-header-custom';
	}

	// Sticky template.
	if ( ! empty( $sticky_template ) && $template !== $sticky_template ) {
		$class[] = 'jupiterx-header-sticky-custom';
	}

	// Orientation.
	if ( 'horizontal' !== jupiterx_get_option( 'jupiterx_header_orientation', '', 'horizontal' ) ) {
		$class[] = 'jupiterx-header-vertical';
	}

	return implode( ' ', $class );
}

/**
 * Get header settings.
 *
 * @since 1.0.0
 *
 * @return array The header settings.
 */
function jupiterx_get_header_settings() {
	$data = [
		'breakpoint' => '767.98',
	];

	// Template.
	$template = jupiterx_get_option( 'jupiterx_header_template', 'global' );

	if ( ! empty( $template ) ) {
		$data['template'] = $template;
	}

	// Sticky template.
	$sticky_template = jupiterx_get_option( 'jupiterx_header_sticky_template', 'global' );

	if ( ! empty( $sticky_template ) && $template !== $sticky_template ) {
		$data['stickyTemplate'] = $sticky_template;
	}

	// Behavior.
	$behavior = jupiterx_get_option( 'jupiterx_header_behavior', 'global' );

	if ( 'static' !== $behavior ) {
		$data['behavior'] = $behavior;
	}

	// Position.
	if ( 'fixed' === $behavior ) {
		$data['position'] = jupiterx_get_option( 'jupiterx_header_position', 'global', 'top' );
	}

	// Offset.
	if ( 'sticky' === $behavior ) {
		$data['offset'] = jupiterx_get_option( 'jupiterx_header_offset', 'global', '500' );

		if ( 'global' === jupiterx_get_field( 'jupiterx_header_behavior', 'global' ) ) {
			$data['offset'] = get_theme_mod( 'jupiterx_header_offset', '500' );
		}
	}

	// Overlap.
	if ( jupiterx_is_header_overlap() ) {
		$data['overlap'] = jupiterx_get_header_overlap();
	}

	return wp_json_encode( $data );
}

jupiterx_add_smart_action( 'jupiterx_header_custom', 'jupiterx_get_custom_header' );
/**
 * Get header settings.
 *
 * @since 1.0.0
 */
function jupiterx_get_custom_header() {
	$template        = jupiterx_get_option( 'jupiterx_header_template', 'global' );
	$sticky_template = jupiterx_get_option( 'jupiterx_header_sticky_template', 'global' );

	// Fallback.
	if ( empty( $template ) ) {
		jupiterx_output_e( 'jupiterx_custom_header_template_fallback', sprintf(
			'<div class="container"><div class="alert alert-warning" role="alert">%1$s</div></div>',
			__( 'Select a custom header template.', 'jupiterx' )
		) );
	}

	// Template.
	jupiterx_output_e( 'jupiterx_custom_header_template', jupiterx_get_custom_template( $template ) );

	// Sticky template.
	if ( ! empty( $sticky_template ) && $template !== $sticky_template ) {
		jupiterx_output_e( 'jupiterx_custom_header_sticky_template', jupiterx_get_custom_template( $sticky_template ) );
	}
}

/**
 * Check header overlap status.
 *
 * @since 1.0.0
 *
 * @return boolean Overlap status.
 */
function jupiterx_is_header_overlap() {
	$overlap = jupiterx_get_option( 'jupiterx_header_overlap', 'global' );

	// Overlap responsive.
	if ( is_array( $overlap ) ) {
		return (boolean) count( array_keys( $overlap, true, true ) );
	}

	return (boolean) $overlap;
}

/**
 * Get header overlap devices.
 *
 * @return string Overlap devices.
 */
function jupiterx_get_header_overlap() {
	$overlap = jupiterx_get_option( 'jupiterx_header_overlap', 'global' );

	if ( empty( $overlap ) ) {
		return '';
	}

	// Overlap responsive.
	if ( is_array( $overlap ) ) {
		return implode( ',', array_keys( $overlap, true, true ) );
	}

	return 'desktop,tablet,mobile';
}

/**
 * Get header overlap classes.
 *
 * @return string Overlap classes.
 */
function jupiterx_get_header_overlap_classes() {
	$overlap = jupiterx_get_option( 'jupiterx_header_overlap', 'global' );

	if ( empty( $overlap ) ) {
		return [];
	}

	$class   = [];
	$devices = [ 'desktop', 'tablet', 'mobile' ];

	// Overlap responsive.
	if ( is_array( $overlap ) ) {
		$devices = array_keys( $overlap, true, true );
	}

	foreach ( $devices as $device ) {
		$class[] = 'jupiterx-header-overlapped' . ( 'desktop' !== $device ? "-{$device}" : '' );
	}

	return $class;
}
