<?php
/**
 * Loads Jupiter fragments.
 *
 * @package JupiterX\Framework\Render
 *
 * @since   1.0.0
 */

// Filter.
jupiterx_add_smart_action( 'template_redirect', 'jupiterx_load_global_fragments', 1 );
/**
 * Load global fragments and dynamic views.
 *
 * @since 1.0.0
 *
 * @return void
 */
function jupiterx_load_global_fragments() {
	jupiterx_load_fragment_file( 'breadcrumb' );
	jupiterx_load_fragment_file( 'footer' );
	jupiterx_load_fragment_file( 'header' );
	jupiterx_load_fragment_file( 'menu' );
	jupiterx_load_fragment_file( 'post-shortcodes' );
	jupiterx_load_fragment_file( 'post' );
	jupiterx_load_fragment_file( 'post-single' );
	jupiterx_load_fragment_file( 'portfolio-single' );
	jupiterx_load_fragment_file( 'search' );
	jupiterx_load_fragment_file( 'title-bar' );
	jupiterx_load_fragment_file( 'widget-area' );
	jupiterx_load_fragment_file( 'embed' );
	jupiterx_load_fragment_file( 'tracking-codes' );
	jupiterx_load_fragment_file( 'deprecated' );

	if ( class_exists( 'woocommerce' ) ) {
		jupiterx_load_fragment_file( 'woocommerce' );
		jupiterx_load_fragment_file( 'product-list' );
		jupiterx_load_fragment_file( 'product-page' );
		jupiterx_load_fragment_file( 'cart' );
		jupiterx_load_fragment_file( 'checkout' );
		jupiterx_load_fragment_file( 'order' );
	}

	jupiterx_load_fragment_file( 'customizer/layout' );
}

// Filter.
jupiterx_add_smart_action( 'comments_template', 'jupiterx_load_comments_fragment' );
/**
 * Load comments fragments.
 *
 * The comments fragments only loads if comments are active to prevent unnecessary memory usage.
 *
 * @since 1.0.0
 *
 * @param string $template The template filename.
 *
 * @return string The template filename.
 */
function jupiterx_load_comments_fragment( $template ) {

	if ( empty( $template ) ) {
		return;
	}

	jupiterx_load_fragment_file( 'comments' );

	return $template;
}

jupiterx_add_smart_action( 'elementor/widgets/widgets_registered', 'jupiterx_load_widget_fragment' );
jupiterx_add_smart_action( 'dynamic_sidebar_before', 'jupiterx_load_widget_fragment', -1 );
/**
 * Load widget fragments.
 *
 * The widget fragments only loads if a sidebar is active or Elementor's pages
 * to prevent unnecessary memory usage.
 *
 * @since 1.0.0
 *
 * @return bool True on success, false on failure.
 */
function jupiterx_load_widget_fragment() {
	return jupiterx_load_fragment_file( 'widget' );
}

jupiterx_add_smart_action( 'pre_get_posts', 'jupiterx_modify_search_page_query' );
/**
 * Modify search page query.
 *
 * @since 1.0.0
 *
 * @param object $query The query object.
 */
function jupiterx_modify_search_page_query( $query ) {
	if ( ! $query->is_search() || ! $query->is_main_query() ) {
		return;
	}

	global $wp_post_types;

	$search_post_types = get_theme_mod( 'jupiterx_search_post_types', [ 'post', 'page', 'portfolio', 'product' ] );

	$post_types = [ 'post', 'portfolio', 'page' ];

	// Set post type exclude from search when it is not existing in theme mod.
	foreach ( $post_types as $post_type ) {
		if ( post_type_exists( $post_type ) ) {
			$wp_post_types[ $post_type ]->exclude_from_search = ! in_array( $post_type, $search_post_types, true );
		}
	}

	// Always exclude WooCommerce products from search as we have other section to show results.
	if ( class_exists( 'woocommerce' ) && post_type_exists( 'product' ) ) {
		$wp_post_types['product']->exclude_from_search = true;
	}

	$query->set( 'posts_per_page', get_theme_mod( 'jupiterx_search_posts_per_page', 5 ) );
}

jupiterx_add_smart_action( 'pre_get_search_form', 'jupiterx_load_search_form_fragment' );
/**
 * Load search form fragments.
 *
 * The search form fragments only loads if search is active to prevent unnecessary memory usage.
 *
 * @since 1.0.0
 *
 * @return bool True on success, false on failure.
 */
function jupiterx_load_search_form_fragment() {
	return jupiterx_load_fragment_file( 'searchform' );
}

jupiterx_add_smart_action( 'template_redirect', 'jupiterx_404_page_redirect' );
/**
 * Redirect 404 pages to specific page template.
 *
 * @since 1.0.0
 *
 * @return void
 *
 * @SuppressWarnings(PHPMD.ExitExpression)
 */
function jupiterx_404_page_redirect() {
	// The page where redirect ended up.
	$page_template = intval( get_theme_mod( 'jupiterx_404_template' ) );

	// Legitimate non existing page, page template is not empty and the page status must be published.
	if ( is_404() && ! empty( $page_template ) && 'publish' === get_post_status( $page_template ) ) {
		// Set to 301 redirect to announce that the page is moved permanently.
		wp_safe_redirect( get_permalink( $page_template ), 301 );
		exit;
	}
}

jupiterx_add_smart_action( 'template_redirect', 'jupiterx_maintenance_page_redirect' );
/**
 * Redirect maintenance pages to specific page template.
 *
 * @since 1.0.0
 *
 * @return void
 *
 * @SuppressWarnings(PHPMD.ExitExpression)
 */
function jupiterx_maintenance_page_redirect() {
	// Current viewing page ID.
	$post_id = get_queried_object_id();

	// Is maintenance enabled?
	$is_enabled = get_theme_mod( 'jupiterx_maintenance', false );

	// The page where redirect ended up.
	$page_template = intval( get_theme_mod( 'jupiterx_maintenance_template' ) );

	// Disable when logged in or viewing the current template.
	if ( is_user_logged_in() || $page_template === $post_id ) {
		return;
	}

	// Maintenance is enabled, page template is not empty and the page status is published.
	if ( $is_enabled && ! empty( $page_template ) && 'publish' === get_post_status( $page_template ) ) {
		wp_safe_redirect( get_permalink( $page_template ) );
		exit;
	}
}

add_filter( 'woocommerce_add_to_cart_fragments', 'jupiterx_wc_cart_count_fragments', 10, 1 );
/**
 * Get refreshed cart count.
 *
 * @param array $fragments The fragments.
 *
 * @since 1.0.0
 */
function jupiterx_wc_cart_count_fragments( $fragments ) {
	$count = WC()->cart->cart_contents_count;

	if ( empty( $count ) ) {
		$count = ' 0';
	}

	$markup = jupiterx_open_markup( 'jupiterx_navbar_cart_count', 'span', 'class=jupiterx-navbar-cart-count' );

		$markup .= jupiterx_output( 'jupiterx_navbar_brand_count_text', $count );

	$markup .= jupiterx_close_markup( 'jupiterx_navbar_cart_count', 'span' );

	$fragments['.jupiterx-navbar-cart-count'] = $markup;

	return $fragments;
}

add_action( 'woocommerce_product_query', 'jupiterx_wc_loop_shop_per_page' );
/**
 * Loop query post per page.
 *
 * @since 1.0.0
 *
 * @param object $query Query object.
 */
function jupiterx_wc_loop_shop_per_page( $query ) {
	if ( $query->is_main_query() ) {
		// Multiply rows and columns.
		$grid_columns = intval( get_theme_mod( 'jupiterx_product_list_grid_columns', 3 ) );
		$grid_rows    = intval( get_theme_mod( 'jupiterx_product_list_grid_rows', 3 ) );
		$grid_total   = $grid_columns * $grid_rows;

		// Set posts per page.
		$query->set( 'posts_per_page', $grid_total );
	}
}

add_action( 'woocommerce_proceed_to_checkout', 'jupiterx_wc_continue_shopping_button', 5 );
add_action( 'woocommerce_review_order_after_submit', 'jupiterx_wc_continue_shopping_button' );
/**
 * Adds continue shopping button to cart and order page.
 *
 * @since 1.0.0
 *
 * @return void
 */
function jupiterx_wc_continue_shopping_button() {

	$shop_page_url = get_permalink( wc_get_page_id( 'shop' ) );

	jupiterx_open_markup_e(
		'jupiterx_continue_shopping_button',
		'a',
		[
			'class' => 'button jupiterx-continue-shopping',
			'href'  => $shop_page_url,
		]
	);

		esc_html_e( 'Continue Shopping', 'jupiterx' );

	jupiterx_close_markup_e( 'jupiterx_continue_shopping_button', 'a' );
}

add_action( 'woocommerce_before_shop_loop_item_title', 'jupiterx_wc_shop_loop_item_category', 15 );
/**
 * Add categories to shop loop item.
 *
 * @since 1.0.0
 */
function jupiterx_wc_shop_loop_item_category() {
	global $product;

	$terms = get_the_terms( $product->get_id(), 'product_cat' );

	$categories = [];

	foreach ( $terms as $term ) {
		$categories[] = $term->name;
	}

	echo '<span class="posted_in">' . join( ', ', $categories ) . '</span>'; // WPCS: XSS ok.
}

add_action( 'pre_get_posts', 'jupiterx_modify_author_archive', 20 );
/**
 * Include portfolio to author archive.
 *
 * @since 1.0.0
 *
 * @param object $query Current query object.
 *
 * @return void
 */
function jupiterx_modify_author_archive( $query ) {
	if ( $query->is_author ) {
		$query->set( 'post_type', [ 'post', 'portfolio' ] );
	}

	remove_action( 'pre_get_posts', 'jupiterx_modify_author_archive' );
}

/**
 * Enable or disable loop elements.
 *
 * @since 1.0.0
 */
function jupiterx_wc_loop_elements_enabled() {
	/**
	 * Key is the ID of the element from Customizer setting and its value is the element hook, function name and priority.
	 */
	$hooks = [
		'image'              => [ 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10 ],
		'category'           => [ 'woocommerce_before_shop_loop_item_title', 'jupiterx_wc_shop_loop_item_category', 15 ],
		'name'               => [ 'woocommerce_shop_loop_item_title', 'jupiterx_wc_template_loop_product_title', 10 ],
		'rating'             => [ 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 ],
		'add_to_cart'        => [ 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 ],
		'sale_badge'         => [ 'woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 10 ],
		'out_of_stock_badge' => [ 'woocommerce_shop_loop_item_title', 'jupiterx_wc_template_loop_out_of_stock', 10 ],
		'price'              => [ 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10 ],
	];

	$elements = get_theme_mod( 'jupiterx_product_list_elements', array_keys( $hooks ) );

	// Remove badges when image is hidden.
	if ( ! in_array( 'image', $elements, true ) ) {
		$elements = array_diff( $elements, [ 'sale_badge', 'out_of_stock_badge' ] );
	}

	// Get elements to remove actions.
	$remove_elements = array_diff_key( $hooks, array_flip( $elements ) );

	foreach ( $remove_elements as $element ) {
		remove_action( $element[0], $element[1], $element[2] );
	}
}
