<?php
/**
 * Despite its name, this template echos between the opening HTML markup and the opening primary markup.
 *
 * This template must be called using get_header().
 *
 * @package JupiterX\Framework\Templates\Structure
 *
 * @since   1.0.0
 */

jupiterx_output_e( 'jupiterx_doctype', '<!DOCTYPE html>' );

jupiterx_open_markup_e( 'jupiterx_html', 'html', str_replace( ' ', '&', str_replace( '"', '', jupiterx_render_function( 'language_attributes' ) ) ) );

	jupiterx_open_markup_e( 'jupiterx_head', 'head' );

		/**
		 * Fires in the head.
		 *
		 * This hook fires in the head HTML section, not in wp_header().
		 *
		 * @since 1.0.0
		 */
		do_action( 'jupiterx_head' );

		wp_head();

	jupiterx_close_markup_e( 'jupiterx_head', 'head' );

	jupiterx_open_markup_e(
		'jupiterx_body',
		'body',
		array(
			'class'     => implode( ' ', get_body_class( 'no-js' ) ),
			'itemscope' => 'itemscope',
			'itemtype'  => 'http://schema.org/WebPage',
		)
	);

		jupiterx_open_markup_e( 'jupiterx_site', 'div', array( 'class' => 'jupiterx-site' ) );

			jupiterx_open_markup_e( 'jupiterx_main', 'main', array( 'class' => 'jupiterx-main' ) );
