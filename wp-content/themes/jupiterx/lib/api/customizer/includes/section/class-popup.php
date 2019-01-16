<?php
/**
 * This handles customizer custom popup section.
 *
 * @package JupiterX\Framework\API\Customizer
 *
 * @since 1.0.0
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Customizer Popup class.
 *
 * @since 1.0.0
 * @ignore
 * @access public
 *
 * @package JupiterX\Framework\API\Customizer
 */
class JupiterX_Customizer_Section_Popup extends WP_Customize_Section {

	/**
	 * Type of this section.
	 *
	 * @since 1.0.0
	 *
	 * @var string
	 */
	public $type = 'kirki-popup';

	/**
	 * Preview URL of popup.
	 *
	 * @since 1.0.0
	 *
	 * @var string
	 */
	public $preview;


	/**
	 * Order priority to load the control in Customizer.
	 *
	 * @since 1.0.0
	 *
	 * @var int
	 */
	public $priority = 160;

	/**
	 * Tabs for this section.
	 *
	 * @since 1.0.0
	 *
	 * @var array
	 */
	public $tabs = [];

	/**
	 * Popups for this section.
	 *
	 * @since 1.0.0
	 *
	 * @var array
	 */
	public $popups = [];

	/**
	 * Set visibility to hidden.
	 *
	 * If set to true, it will remove the accordion title inside the panel.
	 *
	 * @since 1.0.0
	 *
	 * @var boolean
	 */
	public $hidden = false;

	/**
	 * Gather the parameters passed to client JavaScript via JSON.
	 *
	 * @since 1.0.0
	 *
	 * @return array The array to be exported to the client as JSON.
	 */
	public function json() {
		$array                   = wp_array_slice_assoc( (array) $this, array( 'id', 'description', 'priority', 'panel', 'type', 'description_hidden' ) );
		$array['title']          = html_entity_decode( $this->title, ENT_QUOTES, get_bloginfo( 'charset' ) );
		$array['content']        = $this->get_content();
		$array['active']         = $this->active();
		$array['instanceNumber'] = $this->instance_number;
		$array['tabs']           = $this->tabs;
		$array['popups']         = $this->popups;
		$array['hidden']         = $this->hidden;
		$array['preview']        = $this->preview;

		return $array;
	}

	/**
	 * An Underscore (JS) template for rendering this section.
	 *
	 * @since 1.0.0
	 */
	protected function render_template() {
		?>
		<li id="jupiterx-popup-{{ data.id }}" class="accordion-section control-section control-section-{{ data.type }}">
			<h3 class="accordion-section-title" tabindex="0">
				{{ data.title }}
				<span class="screen-reader-text"><?php esc_html_e( 'Press return or enter to open this section', 'jupiterx' ); ?></span>
			</h3>
			<?php $this->section_template(); ?>
		</li>
		<?php
	}

	/**
	 * Template for content container.
	 *
	 * @since 1.0.0
	 */
	protected function section_template() {
		?>
		<div class="customize-jupiterx-popup-section jupiterx-popup-section">
			<div class="jupiterx-popup-header">
				<h3 class="jupiterx-popup-title">{{ data.title }}</h3>
				<div class="jupiterx-popup-header-buttons">
					<button class="jupiterx-popup-button jupiterx-popup-close">
						<span class="dashicons dashicons-no"></span>
						<?php esc_html_e( 'Close', 'jupiterx' ); ?>
					</button>
				</div>
			</div>
			<?php
			$this->content_template();
			$this->tabs_template();
			$this->popups_template();
			?>
		</div>
		<?php
	}

	/**
	 * Template for basic content.
	 *
	 * @since 1.0.0
	 */
	protected function content_template() {
		?>
		<# if ( _.isEmpty( data.tabs ) ) { #>
			<div class="jupiterx-popup-content">
				<ul class="jupiterx-controls jupiterx-row"></ul>
			</div>
		<# } #>
		<?php
	}

	/**
	 * Content template for tabs.
	 *
	 * @since 1.0.0
	 */
	protected function tabs_template() {
		?>
		<# if ( ! _.isEmpty( data.tabs ) ) { #>
			<div class="jupiterx-popup-tabs">
				<div class="jupiterx-tabs">
					<div class="jupiterx-tabs-list">
						<# _.each( data.tabs, function( tab, tabId ) { #>
							<button
								class="jupiterx-tabs-button"
								data-target="tab-{{ tabId }}-{{ data.id }}"
								tabindex="-1"
							>{{ tab }}</button>
						<# }) #>
					</div>
					<# _.each( data.tabs, function( tab, tabId ) { #>
						<div
							class="jupiterx-tabs-pane hidden"
							id="tab-{{ tabId }}-{{ data.id }}"
							tabindex="0"
						></div>
					<# }) #>
				</div>
			</div>
		<# } #>
		<?php
	}

	/**
	 * Content template for popups.
	 *
	 * @since 1.0.0
	 */
	protected function popups_template() {
		?>
		<# if ( ! _.isEmpty( data.popups ) ) { #>
			<div class="jupiterx-popup-child">
				<# _.each( data.popups, function( popup, popupId ) { #>
					<div class="jupiterx-child-popup" id="popup-{{ popupId }}-{{ data.id }}">
						<div class="jupiterx-child-popup-header">
							<h3 class="jupiterx-child-popup-title">{{ popup }}</h3>
							<div class="jupiterx-child-popup-header-buttons">
								<button class="jupiterx-child-popup-button jupiterx-child-popup-close">
									<span class="dashicons dashicons-no"></span>
									<span class="screen-reader-text"><?php esc_html_e( 'Close', 'jupiterx' ); ?></span>
								</button>
							</div>
						</div>
						<div class="jupiterx-child-popup-content"></div>
					</div>
				<# }) #>
			</div>
		<# } #>
		<?php
	}
}
