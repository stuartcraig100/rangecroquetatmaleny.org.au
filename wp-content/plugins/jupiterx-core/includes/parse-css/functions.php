<?php
/**
 * The Jupiter Core Parse CSS component is a wrapper for CSS parser.
 *
 * @package JupiterX_Core\Parse_CSS
 */

jupiterx_core()->load_files( [ 'parse-css/vendors/autoload', 'parse-css/class' ] );

/**
 * Parse CSS.
 *
 * @since 1.0.0
 *
 * @param string $content The CSS strings.
 *
 * @return string The parsed CSS content.
 */
function jupiterx_parse_css( $content ) {
	$parser = new _JupiterX_Parse_CSS( $content );
	$parser = $parser->parse();

	return $parser->render();
}
