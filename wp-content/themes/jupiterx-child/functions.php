<?php

// Include Jupiter X.
require_once( get_template_directory() . '/lib/init.php' );

/**
 * Enqueue assets.
 *
 * Add theme style and script to Jupiter X assets files.
 */
// jupiterx_add_smart_action( 'wp_enqueue_scripts', 'jupiterx_child_enqueue_scripts', 8 );

function jupiterx_child_enqueue_scripts() {

	// Add the theme style as a fragment to have access to all the variables.
	jupiterx_compiler_add_fragment( 'jupiterx', get_stylesheet_directory_uri() . '/assets/less/style.less', 'less' );

	// Add the theme script as a fragment.
	jupiterx_compiler_add_fragment( 'jupiterx', get_stylesheet_directory_uri() . '/assets/js/script.js', 'js' );

}

/**
 * Example 1
 *
 * Modify markups and attributes.
 */
// jupiterx_add_smart_action( 'wp', 'jupiterx_setup_document' );

function jupiterx_setup_document() {

	// Header
	jupiterx_add_attribute( 'jupiterx_header', 'class', 'jupiterx-child-header' );

	// Breadcrumb
	jupiterx_remove_action( 'jupiterx_breadcrumb' );

	// Post image
	jupiterx_modify_action_hook( 'jupiterx_post_image', 'jupiterx_post_header_before_markup' );

	// Post read more
	jupiterx_replace_attribute( 'jupiterx_post_more_link', 'class' , 'btn-outline-secondary', 'btn-danger' );

	// Post related
	jupiterx_modify_action_priority( 'jupiterx_post_related', 11 );

}

/**
 * Example 2
 *
 * Modify the sub footer credit text.
 */
// jupiterx_add_smart_action( 'jupiterx_subfooter_credit_text_output', 'jupiterx_child_modify_subfooter_credit' );

function jupiterx_child_modify_subfooter_credit() { ?>

	<a href="https//jupiterx.com" target="_blank">Jupiter X Child</a> theme for <a href="http://wordpress.org" target="_blank">WordPress</a>

<?php }
