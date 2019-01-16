<?php
/**
 * Plugin Name: Jupiter X Core
 * Plugin URI: https://jupiterx.com
 * Description: Jupiter X Core
 * Version: 1.0.0
 * Author: Artbees
 * Author URI: https://artbees.net
 * Text Domain: jupiterx-core
 * License: GPL2
 *
 * @package JupiterX_Core
 */

defined( 'ABSPATH' ) || die();

if ( ! class_exists( 'JupiterX_Core' ) ) {

	/**
	 * Jupiter Core class.
	 *
	 * @since 1.0.0
	 */
	class JupiterX_Core {

		/**
		 * Jupiter Core instance.
		 *
		 * @since 1.0.0
		 *
		 * @access private
		 * @var JupiterX_Core
		 */
		private static $instance;

		/**
		 * The plugin version number.
		 *
		 * @since 1.0.0
		 *
		 * @access private
		 * @var string
		 */
		private static $version;

		/**
		 * The plugin basename.
		 *
		 * @since 1.0.0
		 *
		 * @access private
		 * @var string
		 */
		private static $plugin_basename;

		/**
		 * The plugin name.
		 *
		 * @since 1.0.0
		 *
		 * @access private
		 * @var string
		 */
		private static $plugin_name;

		/**
		 * The plugin directory.
		 *
		 * @since 1.0.0
		 *
		 * @access private
		 * @var string
		 */
		private static $plugin_dir;

		/**
		 * The plugin URL.
		 *
		 * @since 1.0.0
		 *
		 * @access private
		 * @var string
		 */
		private static $plugin_url;

		/**
		 * Returns JupiterX_Core instance.
		 *
		 * @since 1.0.0
		 *
		 * @return JupiterX_Core
		 */
		public static function get_instance() {
			if ( is_null( self::$instance ) ) {
				self::$instance = new self();
			}
			return self::$instance;
		}

		/**
		 * Constructor.
		 *
		 * @since 1.0.0
		 */
		public function __construct() {
			$this->define_constants();
			$this->add_actions();
		}

		/**
		 * Defines constants used by the plugin.
		 *
		 * @since 1.0.0
		 */
		protected function define_constants() {
			$plugin_data = get_file_data( __FILE__, array( 'Plugin Name', 'Version' ), 'jupiterx-core' );

			self::$plugin_basename = plugin_basename( __FILE__ );
			self::$plugin_name     = array_shift( $plugin_data );
			self::$version         = array_shift( $plugin_data );
			self::$plugin_dir      = trailingslashit( plugin_dir_path( __FILE__ ) );
			self::$plugin_url      = trailingslashit( plugin_dir_url( __FILE__ ) );
		}

		/**
		 * Adds required action hooks.
		 *
		 * @since 1.0.0
		 * @access protected
		 */
		protected function add_actions() {
			add_action( 'plugins_loaded', array( $this, 'init' ) );
			add_action( 'admin_menu', array( $this, 'menus' ), 15 );
			add_action( 'init', array( $this, 'customizer_redirect' ) );
		}

		/**
		 * Initializes the plugin.
		 *
		 * @since 1.0.0
		 */
		public function init() {
			load_plugin_textdomain( 'jupiterx-core', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );

			$this->load_files([
				'customizer/functions',
				'parse-css/functions',
				'post-type/class',
			]);

			$this->disable_admin_bar();

			/**
			 * Fires after all files have been loaded.
			 *
			 * @since 1.0.0
			 *
			 * @param JupiterX_Core
			 */
			do_action( 'jupiterx_core_init', $this );
		}

		/**
		 * Register admin menu pages.
		 *
		 * @since 1.0.0
		 */
		public function menus() {
			if ( ! defined( 'JUPITERX_NAME' ) ) {
				return;
			}

			add_menu_page( JUPITERX_NAME, JUPITERX_NAME, 'edit_theme_options', JUPITERX_SLUG, function () {
				include_once JUPITERX_CONTROL_PANEL_PATH . '/views/layout/master.php';
			}, '', 3 );

			add_submenu_page( JUPITERX_SLUG, __( 'Control Panel', 'jupiterx' ), __( 'Control Panel', 'jupiterx' ), 'edit_theme_options', JUPITERX_SLUG, function() {
				include_once JUPITERX_CONTROL_PANEL_PATH . '/views/layout/master.php';
			} );

			add_submenu_page( JUPITERX_SLUG, __( 'Customize', 'jupiterx' ), __( 'Customize', 'jupiterx' ), 'edit_theme_options', 'customize_theme', '__return_false' );

			remove_submenu_page( 'themes.php', JUPITERX_SLUG );
		}

		/**
		 * Returns the version number of the plugin.
		 *
		 * @since 1.0.0
		 *
		 * @return string
		 */
		public function version() {
			return self::$version;
		}

		/**
		 * Returns the plugin basename.
		 *
		 * @since 1.0.0
		 *
		 * @return string
		 */
		public function plugin_basename() {
			return self::$plugin_basename;
		}

		/**
		 * Returns the plugin name.
		 *
		 * @since 1.0.0
		 *
		 * @return string
		 */
		public function plugin_name() {
			return self::$plugin_name;
		}

		/**
		 * Returns the plugin directory.
		 *
		 * @since 1.0.0
		 *
		 * @return string
		 */
		public function plugin_dir() {
			return self::$plugin_dir;
		}

		/**
		 * Returns the plugin URL.
		 *
		 * @since 1.0.0
		 *
		 * @return string
		 */
		public function plugin_url() {
			return self::$plugin_url;
		}

		/**
		 * Loads all PHP files in a given directory.
		 *
		 * @since 1.0.0
		 *
		 * @param string $directory_name The directory name to load the files.
		 */
		public function load_directory( $directory_name ) {
			$path       = trailingslashit( $this->plugin_dir() . 'includes/' . $directory_name );
			$file_names = glob( $path . '*.php' );
			foreach ( $file_names as $filename ) {
				if ( file_exists( $filename ) ) {
					require_once $filename;
				}
			}
		}

		/**
		 * Loads specified PHP files from the plugin includes directory.
		 *
		 * @since 1.0.0
		 *
		 * @param array $file_names The names of the files to be loaded in the includes directory.
		 */
		public function load_files( $file_names = array() ) {
			foreach ( $file_names as $file_name ) {
				$path = $this->plugin_dir() . 'includes/' . $file_name . '.php';

				if ( file_exists( $path ) ) {
					require_once $path;
				}
			}
		}

		/**
		 * Redirect to customizer page.
		 *
		 * @since 1.0.0
		 */
		public function customizer_redirect() {
			// phpcs:disable
			if ( isset( $_GET['page'] ) && 'customize_theme' === $_GET['page'] ) {
				wp_redirect( admin_url( 'customize.php' ) );
				exit;
			}
			// phpcs:enable
		}

		/**
		 * Disable admin bar in Elementor preview.
		 *
		 * Admin bar causes spacing issues. Elementor added the same codes but it's not working correctly.
		 * When it's fixed, the codes will be removed.
		 *
		 * @since 1.0.0
		 */
		private function disable_admin_bar() {
			if ( ! empty( $_GET['elementor-preview'] ) ) { // phpcs:ignore
				add_filter( 'show_admin_bar', '__return_false' );
			}
		}
	}
}

/**
 * Returns the Jupiter Core application instance.
 *
 * @since 1.0.0
 *
 * @return JupiterX_Core
 */
function jupiterx_core() {
	return JupiterX_Core::get_instance();
}

/**
 * Initializes the Jupiter Core application.
 *
 * @since 1.0.0
 */
jupiterx_core();
