<?php
/**
 * If Polylang is active:
 * - save and retrieve customizer setting per language.
 * - on front-page, set options and theme mod for the selected language.
 *
 * Inspired by https://github.com/fastlinemedia/customizer-export-import
 *
 * @package JupiterX\Framework\API\Customizer
 */

namespace JupiterX\Customizer\Multilingual;

if ( ! \function_exists( 'pll_current_language' ) && ! \class_exists( 'SitePress' ) ) {
	return;
}

\add_action( 'customize_save_after', __NAMESPACE__ . '\CustomizerMultilingual::save_settings', 1000 );
\add_action( 'plugins_loaded', __NAMESPACE__ . '\CustomizerMultilingual::load_settings', 9 );  // Must happen before 10 when _wp_customize_include() fires.
\add_action( 'after_setup_theme', __NAMESPACE__ . '\CustomizerMultilingual::load_settings' );
\add_action( 'customize_controls_enqueue_scripts', __NAMESPACE__ . '\CustomizerMultilingual::add_lang_to_customizer_previewer', 9 );
\add_action( 'wp_before_admin_bar_render', __NAMESPACE__ . '\CustomizerMultilingual::on_wp_before_admin_bar_render', 100 );
\add_action( 'admin_menu', __NAMESPACE__ . '\CustomizerMultilingual::on_admin_menu', 100 );
\add_action( 'after_setup_theme', __NAMESPACE__ . '\CustomizerMultilingual::remove_filters', 5 );


interface CustimizerMultilingualInterface {
	public static function save_settings( $wp_customize); // @phpcs:ignore
	public static function load_settings( $wp_customize = null); // @phpcs:ignore
}

/**
 * Functionality for multilingual customizer.
 *
 * @since 1.0.0
 *
 * @package JupiterX\Framework\API\Customizer
 * @SuppressWarnings(PHPMD.ExcessiveClassComplexity)
 */
class CustomizerMultilingual implements CustimizerMultilingualInterface {

	/**
	 * Remove bloginfo update filters. As we save options per language in this class, we don't need WPML functionality for the .
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	public static function remove_filters() {
		global $WPML_String_Translation; // @phpcs:ignore
		remove_filter( 'pre_update_option_blogname', [ $WPML_String_Translation, 'pre_update_option_blogname' ], 5 ); // @phpcs:ignore
		remove_filter( 'pre_update_option_blogdescription', [ $WPML_String_Translation, 'pre_update_option_blogdescription' ], 5 ); // @phpcs:ignore
	}

	/**
	 * Get current language.
	 *
	 * @since 1.0.0
	 *
	 * @return string|bool $language|false Current language or false when none of Polylang & WPML are active.
	 */
	public static function get_language() {
		if ( \function_exists( 'pll_current_language' ) ) {
			$language = pll_current_language();

			if ( ! $language ) {
				$language = pll_default_language();
			}

			return $language;
		}

		if ( class_exists( 'SitePress' ) && defined( 'ICL_LANGUAGE_CODE' ) ) {
			return ICL_LANGUAGE_CODE;
		}

		return false;
	}

	/**
	 * Get a list of active languages with extra parameters like name and slug.
	 *
	 * @since 1.0.0
	 *
	 * @return array|bool $languages|false List of active languages or false when none of Polylang & WPML are active.
	 */
	public static function get_languages_list() {
		if ( \function_exists( 'pll_current_language' ) ) {
			return get_option( '_transient_pll_languages_list' );
		}

		if ( class_exists( 'SitePress' ) && defined( 'ICL_LANGUAGE_CODE' ) ) {
			$list      = icl_get_languages( 'skip_missing=1' );
			$languages = [];

			foreach ( $list as $language ) {
				$temp         = [];
				$temp['name'] = $language['native_name'];
				$temp['slug'] = $language['code'];
				$languages[]  = $temp;
			}

			return $languages;
		}

		return false;
	}

	/**
	 * Get a proper option key per plugin.
	 *
	 * @since 1.0.0
	 *
	 * @return string|bool Option key or false when none of Polylang & WPML are active.
	 */
	public static function get_option_key() {
		if ( \function_exists( 'pll_current_language' ) ) {
			return '_customizer_polylang_settings_';
		}

		if ( class_exists( 'SitePress' ) && defined( 'ICL_LANGUAGE_CODE' ) ) {
			return '_customizer_wpml_settings_';
		}

		return false;
	}

	/**
	 * Get home URL of current language.
	 *
	 * @param string $language current language.
	 *
	 * @since 1.0.0
	 *
	 * @return string|bool Home URL of current language or false when none of Polylang & WPML are active.
	 */
	public static function get_home_url( $language ) {
		if ( \function_exists( 'pll_current_language' ) ) {
			return pll_home_url( $language );
		}

		if ( \class_exists( 'SitePress' ) ) {
			global $sitepress;
			return $sitepress->language_url( $language );
		}

		return false;
	}

	/**
	 * Save settings per language.
	 *
	 * @param object $wp_customize Customizer object.
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	public static function save_settings( $wp_customize ) {
		$language = self::get_language();

		if ( ! $language ) {
			return;
		}

		$theme    = get_stylesheet();
		$template = get_template();
		$charset  = get_option( 'blog_charset' );
		$mods     = get_theme_mods();
		$data     = [
			'template' => $template,
			'mods'     => $mods ? $mods : [],
			'options'  => [],
		];
		// Get options from the Customizer API.
		$settings = $wp_customize->settings();

		foreach ( $settings as $key => $setting ) {
			if ( 'option' === $setting->type ) {
				switch ( $key ) {
					// Ignore these.
					case stristr( $key, 'widget_' ):
					case stristr( $key, 'sidebars_' ):
					case stristr( $key, 'nav_menus_' ):
						break;

					default:
						$data['options'][ $key ] = $setting->value();
						break;
				}
			}
		}

		foreach ( $data['options'] as $option_key ) {
			$option_value = get_option( $option_key );
			if ( $option_value ) {
				$data['options'][ $option_key ] = $option_value;
			}
		}

		if ( \function_exists( 'wp_get_custom_css_post' ) ) {
			$data['wp_css'] = wp_get_custom_css();
		}

		$option_prefix = \str_replace( '-', '_', $template );
		\update_option( $option_prefix . self::get_option_key() . $language, $data );
	}

	/**
	 * Load settings per language.
	 *
	 * @param object $wp_customize Customizer object.
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 * @SuppressWarnings(PHPMD.ElseExpression)
	 * @SuppressWarnings(PHPMD.NPathComplexity)
	 */
	public static function load_settings( $wp_customize = null ) {
		global $cei_error;

		$language = self::get_language();

		if ( ! $language ) {
			return;
		}

		$template      = get_template();
		$option_prefix = \str_replace( '-', '_', $template );
		$data          = get_option( $option_prefix . self::get_option_key() . $language, false );

		if ( $data ) {
			// Data checks.
			if ( 'array' !== gettype( $data ) ) {
				return;
			}

			if ( ! isset( $data['template'] ) || ! isset( $data['mods'] ) ) {
				return;
			}

			if ( $data['template'] !== $template ) {
				return;
			}

			// Import custom options.
			if ( isset( $data['options'] ) ) {
				foreach ( $data['options'] as $option_key => $option_value ) {
					if ( \class_exists( 'Customizermultilingialoption' ) ) {
						$option = new Customizermultilingialoption(
							$wp_customize, $option_key, [
								'default'    => '',
								'type'       => 'option',
								'capability' => 'edit_theme_options',
							]
						);
						$option->import( $option_value );
					} else {
						\update_option( $option_key, $option_value );
					}
				}
			}
			// If wp_css is set then import it.
			if ( \function_exists( 'wp_update_custom_css_post' ) && isset( $data['wp_css'] ) && '' !== $data['wp_css'] ) {
				wp_update_custom_css_post( $data['wp_css'] );
			}
			foreach ( $data['mods'] as $key => $val ) {
				set_theme_mod( $key, $val );
			}
		}
	}

	/**
	 * If Polylang activated, set the preview url and add select language control
	 *
	 * @author soderlind
	 * @version 1.0.0
	 * @link https://gist.github.com/soderlind/1908634f5eb0c1f69428666dd2a291d0
	 *
	 * @since 1.0.0
	 */
	public static function add_lang_to_customizer_previewer() {
		$languages = self::get_languages_list();

		if ( ! $languages ) {
			return;
		}

		$handle      = 'dss-add-lang-to-template';
		$js_path_url = trailingslashit( apply_filters( 'scp_js_path_url', get_stylesheet_directory_uri() . '/js/' ) );
		$src         = $js_path_url . 'customizer-multilingual.js';
		$deps        = [ 'customize-controls' ];
		wp_enqueue_script( $handle, $src, $deps, JUPITERX_VERSION, true );
		$language = ( empty( $_REQUEST['lang'] ) ) ? self::get_language() : $_REQUEST['lang']; // @phpcs:ignore

		if ( empty( $language ) ) {
			$language = self::default_language();
		}

		$url = add_query_arg( 'lang', $language, self::get_home_url( $language ) );

		wp_add_inline_script(
			$handle,
			sprintf(
				'JupiterCustomizerMultilingual.init( %s );', wp_json_encode(
					[
						'url'              => $url,
						'languages'        => $languages,
						'current_language' => $language,
						'switcher_text'    => __( 'Language:', 'jupiterx' ),
					]
				)
			), 'after'
		);
	}

	/**
	 * Append lang="contrycode" to the customizer url in the adminbar
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	public static function on_wp_before_admin_bar_render() {
		global $wp_admin_bar;
		$customize_node = $wp_admin_bar->get_node( 'customize' );
		if ( ! empty( $customize_node ) ) {
			$customize_node->href = add_query_arg( 'lang', self::get_language(), $customize_node->href );
			$wp_admin_bar->add_node( $customize_node );
		}
	}

	/**
	 * Append lang="contrycode" to the customizer url in the Admin->Apperance->Customize menu
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	public static function on_admin_menu() {
		global $menu, $submenu;
		$parent = 'themes.php';
		if ( ! isset( $submenu[ $parent ] ) ) {
			return;
		}
		foreach ( $submenu[ $parent ] as $k => $d ) {
			if ( 'customize' === $d['1'] ) {
				$submenu[ $parent ][ $k ]['2'] = add_query_arg( 'lang', self::get_language(), $submenu[ $parent ][ $k ]['2'] ); // @phpcs:ignore
				break;
			}
		}
	}

}

if ( class_exists( 'WP_Customize_Setting' ) ) {
	/**
	 * A class that extends WP_Customize_Setting so we can access
	 * the protected updated method when importing options.
	 *
	 * @since 0.3
	 */
	final class Customizermultilingialoption extends \WP_Customize_Setting { // @phpcs:ignore


		/**
		 * Import an option value for this setting.
		 *
		 * @since 0.3
		 * @param mixed $value The option value.
		 * @return void
		 */
		public function import( $value ) {
			$this->update( $value );
		}
	}
}
