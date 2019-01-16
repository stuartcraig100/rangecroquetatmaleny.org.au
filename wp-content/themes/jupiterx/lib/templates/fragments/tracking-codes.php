<?php
/**
 * Echo tracking codes fragment.
 *
 * @package JupiterX\Framework\Templates\Fragments
 *
 * @since   1.0.0
 */

jupiterx_add_smart_action( 'jupiterx_head_append_markup', 'jupiterx_add_tracking_codes_before_head' );
/**
 * Echo tracking codes before </head>.
 *
 * @since 1.0.0
 *
 * @return void
 */
function jupiterx_add_tracking_codes_before_head() {
	echo get_option( 'jupiterx_tracking_codes_before_head' ); // WPCS: XSS ok.
}

jupiterx_add_smart_action( 'jupiterx_body_prepend_markup', 'jupiterx_add_tracking_codes_after_body' );
/**
 * Echo tracking codes after <body>.
 *
 * @since 1.0.0
 *
 * @return void
 */
function jupiterx_add_tracking_codes_after_body() {
	echo get_option( 'jupiterx_tracking_codes_after_body' ); // WPCS: XSS ok.
}

jupiterx_add_smart_action( 'jupiterx_body_append_markup', 'jupiterx_add_tracking_codes_before_body' );
/**
 * Echo tracking codes before </body>.
 *
 * @since 1.0.0
 *
 * @return void
 */
function jupiterx_add_tracking_codes_before_body() {
	echo get_option( 'jupiterx_tracking_codes_before_body' ); // WPCS: XSS ok.
}
