<?php
/**
 * This class provides the list of system status values
 *
 * @package JupiterX\Framework\Admin
 *
 * @since   1.0.0
 */

/**
 * Show list of system critical data
 *
 * @since   1.0.0
 * @ignore
 * @access  private
 */
class JupiterX_Control_Panel_System_Status {


	/**
	 * JupiterX_Control_Panel_System_Status constructor.
	 *
	 * @since 1.0.0
	 */
	public function __construct() {

	}

	/**
	 * Create an array of system status
	 *
	 * @since 1.0.0
	 *
	 * @return array
	 */
	public static function compile_system_status() {
		global $wpdb;

		$sysinfo = array();

		$sysinfo['home_url'] = esc_url( home_url( '/' ) );
		$sysinfo['site_url'] = esc_url( site_url( '/' ) );

		$sysinfo['wp_content_url']      = WP_CONTENT_URL;
		$sysinfo['wp_ver']              = get_bloginfo( 'version' );
		$sysinfo['wp_multisite']        = is_multisite();
		$sysinfo['permalink_structure'] = get_option( 'permalink_structure' ) ? get_option( 'permalink_structure' ) : 'Default';
		$sysinfo['front_page_display']  = get_option( 'show_on_front' );
		if ( 'page' == $sysinfo['front_page_display'] ) {
			$front_page_id = get_option( 'page_on_front' );
			$blog_page_id  = get_option( 'page_for_posts' );

			$sysinfo['front_page'] = 0 != $front_page_id ? get_the_title( $front_page_id ) . ' (#' . $front_page_id . ')' : 'Unset';
			$sysinfo['posts_page'] = 0 != $blog_page_id ? get_the_title( $blog_page_id ) . ' (#' . $blog_page_id . ')' : 'Unset';
		}

		$sysinfo['wp_mem_limit']['raw']  = JupiterX_Control_Panel_Helpers::let_to_num( WP_MEMORY_LIMIT );
		$sysinfo['wp_mem_limit']['size'] = size_format( $sysinfo['wp_mem_limit']['raw'] );

		$sysinfo['db_table_prefix'] = 'Length: ' . strlen( $wpdb->prefix ) . ' - Status: ' . (strlen( $wpdb->prefix ) > 16 ? 'ERROR: Too long' : 'Acceptable');

		$sysinfo['wp_debug'] = 'false';
		if ( defined( 'WP_DEBUG' ) && WP_DEBUG ) {
			$sysinfo['wp_debug'] = 'true';
		}

		$sysinfo['wp_lang'] = get_locale();

		if ( ! class_exists( 'Browser' ) ) {
			$file_path = pathinfo( __FILE__ );
			require_once JUPITERX_CONTROL_PANEL_PATH . '/classes/class-browser.php';
		}

		$browser = new Browser();

		$sysinfo['browser'] = array(
			'agent'    => $browser->getUserAgent(),
			'browser'  => $browser->getBrowser(),
			'version'  => $browser->getVersion(),
			'platform' => $browser->getPlatform(),

		);

		$sysinfo['server_info'] = esc_html( $_SERVER['SERVER_SOFTWARE'] );
		$sysinfo['localhost']   = JupiterX_Control_Panel_Helpers::make_bool_string( JupiterX_Control_Panel_Helpers::is_localhost() );
		$sysinfo['php_ver']     = function_exists( 'phpversion' ) ? esc_html( phpversion() ) : 'phpversion() function does not exist.';
		$sysinfo['abspath']     = ABSPATH;

		if ( function_exists( 'ini_get' ) ) {
			$sysinfo['php_mem_limit']      = size_format( JupiterX_Control_Panel_Helpers::let_to_num( ini_get( 'memory_limit' ) ) );
			$sysinfo['php_post_max_size']  = size_format( JupiterX_Control_Panel_Helpers::let_to_num( ini_get( 'post_max_size' ) ) );
			$sysinfo['php_time_limit']     = ini_get( 'max_execution_time' );
			$sysinfo['php_max_input_var']  = ini_get( 'max_input_vars' );
			$sysinfo['suhosin_request_max_vars']  = ini_get( 'suhosin.request.max_vars' );
			$sysinfo['suhosin_post_max_vars'] = ini_get( 'suhosin.post.max_vars' );
			$sysinfo['php_display_errors'] = JupiterX_Control_Panel_Helpers::make_bool_string( ini_get( 'display_errors' ) );
		}

		$sysinfo['suhosin_installed'] = extension_loaded( 'suhosin' );
		$sysinfo['mysql_ver']         = $wpdb->db_version();
		$sysinfo['max_upload_size']   = size_format( wp_max_upload_size() );

		$sysinfo['def_tz_is_utc'] = 'true';
		if ( date_default_timezone_get() !== 'UTC' ) {
			$sysinfo['def_tz_is_utc'] = 'false';
		}

		$sysinfo['fsockopen_curl'] = 'false';
		if ( function_exists( 'fsockopen' ) || function_exists( 'curl_init' ) ) {
			$sysinfo['fsockopen_curl'] = 'true';
		}

		$sysinfo['soap_client'] = 'false';
		if ( class_exists( 'SoapClient' ) ) {
			$sysinfo['soap_client'] = 'true';
		}

		$sysinfo['dom_document'] = 'false';
		if ( class_exists( 'DOMDocument' ) ) {
			$sysinfo['dom_document'] = 'true';
		}

		$sysinfo['gzip'] = 'false';
		if ( is_callable( 'gzopen' ) ) {
			$sysinfo['gzip'] = 'true';
		}

			$sysinfo['mbstring'] = 'false';

		if ( extension_loaded( 'mbstring' ) && function_exists( 'mb_eregi' ) && function_exists( 'mb_ereg_match' ) ) {
			$sysinfo['mbstring'] = 'true';
		}

		$sysinfo['simplexml'] = 'false';

		if ( class_exists( 'SimpleXMLElement' ) && function_exists( 'simplexml_load_string' ) ) {
			$sysinfo['simplexml'] = 'true';
		}

		$sysinfo['phpxml'] = 'false';

		if ( function_exists( 'xml_parse' ) ) {
			$sysinfo['phpxml'] = 'true';
		}

			$response = wp_remote_post(
				'https://www.paypal.com/cgi-bin/webscr', array(
					'sslverify'  => false,
					'timeout'    => 60,
					'user-agent' => 'JupiterFramework/',
					'body'       => array(
						'cmd' => '_notify-validate',
					),
				)
			);

		if ( ! is_wp_error( $response ) && $response['response']['code'] >= 200 && $response['response']['code'] < 300 ) {
			$sysinfo['wp_remote_post']       = 'true';
			$sysinfo['wp_remote_post_error'] = '';
		} else {
			$sysinfo['wp_remote_post'] = 'false';

			try {
				if ( is_wp_error( $response ) ) {
					$sysinfo['wp_remote_post_error'] = $response->get_error_message();
				}
			} catch ( Exception $e ) {

				$sysinfo['wp_remote_post_error'] = $e->getMessage();
			}
		}

			$response = wp_remote_get( 'http://reduxframework.com/wp-admin/admin-ajax.php?action=get_redux_extensions' );

		if ( ! is_wp_error( $response ) && $response['response']['code'] >= 200 && $response['response']['code'] < 300 ) {
			$sysinfo['wp_remote_get']       = 'true';
			$sysinfo['wp_remote_get_error'] = '';
		} else {
			$sysinfo['wp_remote_get'] = 'false';

			try {
				if ( is_wp_error( $response ) ) {
					$sysinfo['wp_remote_get_error'] = $response->get_error_message();
				}
			} catch ( Exception $e ) {

				$sysinfo['wp_remote_get_error'] = $e->getMessage();
			}
		}

		$active_plugins = (array) get_option( 'active_plugins', array() );

		if ( is_multisite() ) {
			$active_plugins = array_merge( $active_plugins, get_site_option( 'active_sitewide_plugins', array() ) );
		}

		$sysinfo['plugins'] = array();

		foreach ( $active_plugins as $plugin ) {
			$plugin_data = @get_plugin_data( WP_PLUGIN_DIR . '/' . $plugin );
			$plugin_name = esc_html( $plugin_data['Name'] );

			$sysinfo['plugins'][ $plugin_name ] = $plugin_data;
		}

		$active_theme = wp_get_theme();

		$sysinfo['theme']['name']       = $active_theme->Name;
		$sysinfo['theme']['version']    = $active_theme->Version;
		$sysinfo['theme']['author_uri'] = $active_theme->{'Author URI'};
		$sysinfo['theme']['is_child']   = JupiterX_Control_Panel_Helpers::make_bool_string( is_child_theme() );

		if ( is_child_theme() ) {
			$parent_theme = wp_get_theme( $active_theme->Template );

			$sysinfo['theme']['parent_name']       = $parent_theme->Name;
			$sysinfo['theme']['parent_version']    = $parent_theme->Version;
			$sysinfo['theme']['parent_author_uri'] = $parent_theme->{'Author URI'};
		}

		return $sysinfo;
	}
}
new JupiterX_Control_Panel_System_Status();
