<?php
/**
 * Add Jupiter assets.
 *
 * @package JupiterX\Framework\Assets
 *
 * @since   1.0.0
 */

jupiterx_add_smart_action( 'wp_enqueue_scripts', 'jupiterx_enqueue_jupiterx_components' );
/**
 * Enqueue Bootstrap components and Jupiter style.
 *
 * @since 1.0.0
 *
 * @return void
 */
function jupiterx_enqueue_jupiterx_components() {
	$variables = [ 'variables' ];

	// ... .
	$bootstrap = jupiterx_get_bootstrap_assets();
	$theme     = jupiterx_get_theme_assets();
	$wc        = jupiterx_get_wc_assets();

	// ... .
	$styles = array_merge( $variables, $bootstrap['styles'], $theme['styles'], $wc['styles'] );

	array_walk( $styles, function( &$value, $key ) {
		$value = JUPITERX_PATH . 'assets/less/' . $value . '.less';
	} );

	// ... .
	$scripts = array_merge( $theme['scripts'], $bootstrap['scripts'], $wc['scripts'] );

	array_walk( $scripts, function( &$value, $key ) {
		$value = JUPITERX_PATH . 'assets/js/' . $value . '.js';
	} );

	// ... .
	jupiterx_compile_less_fragments(
		'jupiterx',
		array_unique( $styles ),
		apply_filters( 'jupiterx_enqueued_styles_args', [] )
	);

	// ... .
	jupiterx_compile_js_fragments(
		'jupiterx',
		array_unique( $scripts ),
		apply_filters( 'jupiterx_enqueued_scripts_args', [
			'depedencies' => [ 'jquery', 'underscore' ],
			'in_footer'   => true,
		] )
	);
}

/**
 * Get Bootstrap components.
 *
 * @since 1.0.0
 *
 * @return array Styles and scripts array.
 */
function jupiterx_get_bootstrap_assets() {
	$assets = [];

	// phpcs:disable
	$assets['styles'] = [
		// 'bootstrap/mixins/breakpoints', // No need.
		// 'bootstrap/mixins/hover', // No need.
		'bootstrap/mixins/image',
		'bootstrap/mixins/badge',
		'bootstrap/mixins/resize',
		'bootstrap/mixins/screen-reader',
		'bootstrap/mixins/size',
		'bootstrap/mixins/reset-text',
		'bootstrap/mixins/text-emphasis',
		'bootstrap/mixins/text-hide',
		'bootstrap/mixins/text-truncate',
		'bootstrap/mixins/visibility',
		'bootstrap/mixins/alert',
		'bootstrap/mixins/buttons',
		'bootstrap/mixins/caret',
		'bootstrap/mixins/pagination',
		'bootstrap/mixins/lists',
		// 'bootstrap/mixins/list-group',
		'bootstrap/mixins/nav',
		'bootstrap/mixins/forms',
		// 'bootstrap/mixins/table-row',
		// 'bootstrap/mixins/background-variant',
		'bootstrap/mixins/border-radius',
		// 'bootstrap/mixins/box-shadow', // No need.
		// 'bootstrap/mixins/gradients',
		// 'bootstrap/mixins/transition', // No need.
		'bootstrap/mixins/clearfix',
		// 'bootstrap/mixins/grid-framework', // No need.
		// 'bootstrap/mixins/grid', // No need.
		'bootstrap/mixins/float',
		'bootstrap/root',
		'bootstrap/reboot',
		'bootstrap/type',
		'bootstrap/images',
		'bootstrap/code',
		'bootstrap/grid',
		'bootstrap/tables',
		'bootstrap/forms',
		'bootstrap/buttons',
		'bootstrap/transitions',
		'bootstrap/dropdown',
		// 'bootstrap/button-group',
		'bootstrap/input-group',
		// 'bootstrap/custom-forms',
		'bootstrap/nav',
		'bootstrap/navbar',
		'bootstrap/card',
		'bootstrap/breadcrumb',
		'bootstrap/pagination',
		'bootstrap/badge',
		// 'bootstrap/jumbotron',
		'bootstrap/alert',
		// 'bootstrap/progress',
		// 'bootstrap/media',
		// 'bootstrap/list-group',
		// 'bootstrap/close',
		// 'bootstrap/modal',
		// 'bootstrap/tooltip',
		// 'bootstrap/popover',
		// 'bootstrap/carousel',
		// 'bootstrap/utilities/align',
		// 'bootstrap/utilities/background',
		// 'bootstrap/utilities/borders',
		'bootstrap/utilities/clearfix',
		// 'bootstrap/utilities/display',
		// 'bootstrap/utilities/embed',
		// 'bootstrap/utilities/flex',
		// 'bootstrap/utilities/float',
		// 'bootstrap/utilities/position',
		// 'bootstrap/utilities/screenreaders',
		// 'bootstrap/utilities/shadows',
		// 'bootstrap/utilities/sizing',
		// 'bootstrap/utilities/spacing',
		// 'bootstrap/utilities/text',
		'bootstrap/utilities/visibility',
		'bootstrap/print',
	];
	// phpcs:enable

	$assets['scripts'] = [
		'bootstrap/index',
		'bootstrap/util',
		'bootstrap/popper',
		'bootstrap/dropdown',
		'bootstrap/collapse',
	];

	return $assets;
}

/**
 * Get theme components.
 *
 * @since 1.0.0
 *
 * @return array Styles and scripts array.
 */
function jupiterx_get_theme_assets() {
	$assets = [];

	$assets['styles'] = [
		'theme/mixins/vendor-prefixes',
		'theme/mixins/align',
		'theme/mixins/background',
		'theme/mixins/border',
		'theme/mixins/sizes',
		'theme/mixins/spacing',
		'theme/mixins/typography',
		'theme/mixins/visibility',
		'theme/site',
		'theme/header',
		'theme/main',
		'theme/post',
		'theme/post-single',
		'theme/portfolio-single',
		'theme/elements',
		'theme/archive',
		'theme/widgets',
		'theme/sidebar',
		'theme/search',
		'theme/comments',
		'theme/social-share',
		'theme/icons',
		'theme/footer',
		'theme/style',
	];

	$assets['scripts'] = [
		'base/config',
		'lib/inheritance',
		'lib/pubsub',
		'lib/request-animation-frame',
		'lib/updwn',
		'lib/slick',
		'lib/utils',
		'lib/stickyfill',
		'lib/objectFitPolyfill',
		'lib/zenscroll',
		'base/base',
		'base/utils',
		'header',
		'sidebar',
		'widgets',
		'footer',
		'base/init',
	];

	return $assets;
}

/**
 * Get WooCommerce components.
 *
 * @since 1.0.0
 *
 * @return array Styles and scripts array.
 */
function jupiterx_get_wc_assets() {
	$assets = [
		'styles' => [],
		'scripts' => [],
	];

	if ( ! class_exists( 'woocommerce' ) ) {
		return $assets;
	}

	$template = [ get_theme_mod( 'jupiterx_product_page_template' ) ];

	$assets['styles'] = [
		'woocommerce/common',
		'woocommerce/buttons',
		'woocommerce/fields',
		'woocommerce/badges',
		'woocommerce/rating',
		'woocommerce/pagination',
		'woocommerce/product-list',
		'woocommerce/product-page',
		'woocommerce/variations',
		'woocommerce/quantity',
		'woocommerce/widgets',
		'woocommerce/checkout-cart',
		'woocommerce/cart-quick-view',
		'woocommerce/tabs',
		'woocommerce/order',
		'woocommerce/steps',
	];

	$assets['scripts'] = [
		'woocommerce/input-spinner',
		'woocommerce/widgets',
		'woocommerce/common',
		'woocommerce/single-product',
	];

	if ( array_intersect( $template, [ 3, 4, 7, 8 ] ) ) {
		$assets['styles'][] = 'woocommerce/product-page-3-4-7-8';
	}

	if ( array_intersect( $template, [ 9, 10 ] ) ) {
		$assets['styles'][]  = 'woocommerce/product-page-9-10';
		$assets['scripts'][] = 'woocommerce/sticky';
	}

	return $assets;
}

jupiterx_add_smart_action( 'wp_enqueue_scripts', 'jupiterx_enqueue_assets', 5 );
/**
 * Enqueue Jupiter assets.
 *
 * @since 1.0.0
 *
 * @return void
 */
function jupiterx_enqueue_assets() {

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	// Utils.
	wp_register_script( 'jupiterx-utils', JUPITERX_ASSETS_URL . 'js/lib/utils' . JUPITERX_MIN_JS . '.js', [], JUPITERX_VERSION ); // @codingStandardsIgnoreLine
}
