<?php $sysinfo = JupiterX_Control_Panel_System_Status::compile_system_status(); ?>

<div class="jupiterx-cp-pane-box" id="jupiterx-cp-system-status">
	<h3>
		<?php esc_html_e( 'System Status', 'jupiterx' ); ?>
	</h3>

	<a class="btn btn-primary jupiterx-button--get-system-report" href="#">
		<?php esc_html_e( 'Get System Report', 'jupiterx' ); ?>
	</a>

	<div id="jupiterx-textarea--get-system-report">
		<textarea readonly="readonly" onclick="this.focus();this.select()"></textarea>
	</div>
	<br>
	<table class="table" cellspacing="0">
		<thead class="thead-light">
		<tr>
			<th colspan="3" data-export-label="WordPress Environment">
				<?php esc_html_e( 'WordPress Environment', 'jupiterx' ); ?>
			</th>
		</tr>
		</thead>
		<tbody>
		<tr>
			<td data-export-label="Home URL">
				<?php esc_html_e( 'Home URL', 'jupiterx' ); ?>:
			</td>
			<td class="help">
				<a class="jupiterx-tooltip" data-content="<?php echo esc_attr__( 'The URL of your site\'s homepage.', 'jupiterx' ); ?>" href="#" data-toggle="popover" data-placement="top"></a>
			</td>

			<td><code><?php echo wp_kses_post( $sysinfo['home_url'] ); ?></code></td>
		</tr>
		<tr>
			<td data-export-label="Site URL">
				<?php esc_html_e( 'Site URL', 'jupiterx' ); ?>:
			</td>
			<td class="help">
				<a class="jupiterx-tooltip" data-content="<?php echo esc_attr__( 'The root URL of your site.', 'jupiterx' ); ?>" href="#" data-toggle="popover" data-placement="top"></a>
			</td>
			<td>
				<code><?php echo esc_url( $sysinfo['site_url'] ); ?></code>
			</td>
		</tr>
		<tr>
			<td data-export-label="WP Content URL">
				<?php esc_html_e( 'WP Content URL', 'jupiterx' ); ?>:
			</td>
			<td class="help">
				<a class="jupiterx-tooltip" data-content="<?php echo esc_attr__( 'The location of WordPress\'s content URL.', 'jupiterx' ); ?>" href="#" data-toggle="popover" data-placement="top"></a>
			</td>
			<td>
				<code><?php echo esc_url( $sysinfo['wp_content_url'] ); ?></code>
			</td>
		</tr>
		<tr>
			<td data-export-label="WP Version">
				<?php esc_html_e( 'WP Version', 'jupiterx' ); ?>:
			</td>
			<td class="help">
				<a class="jupiterx-tooltip" data-content="<?php echo esc_attr__( 'The version of WordPress installed on your site.', 'jupiterx' ); ?>" href="#" data-toggle="popover" data-placement="top"></a>
			</td>
			<td>
				<?php bloginfo( 'version' ); ?>
			</td>
		</tr>
		<tr>
			<td data-export-label="WP Multisite">
				<?php esc_html_e( 'WP Multisite', 'jupiterx' ); ?>:
			</td>
			<td class="help">
				<a class="jupiterx-tooltip" data-content="<?php echo esc_attr__( 'Whether or not you have WordPress Multisite enabled.', 'jupiterx' ); ?>" href="#" data-toggle="popover" data-placement="top"></a>
			</td>
			<td>
				<?php if ( false == $sysinfo['wp_multisite'] ) : ?>
					<span class="status-invisible">False</span><span class="status-state status-false"></span>
				<?php else : ?>
					<span class="status-invisible">True</span><span class="status-state status-true"></span>
				<?php endif; ?>
			</td>
		</tr>
		<tr>
			<td data-export-label="Permalink Structure">
				<?php esc_html_e( 'Permalink Structure', 'jupiterx' ); ?>:
			</td>
			<td class="help">
				<a class="jupiterx-tooltip" data-content="<?php echo esc_attr__( 'The current permalink structure as defined in WordPress Settings->Permalinks.', 'jupiterx' ); ?>" href="#" data-toggle="popover" data-placement="top"></a>
			</td>
			<td>
				<code><?php echo esc_html( $sysinfo['permalink_structure'] ); ?></code>
			</td>
		</tr>
		<?php $sof = $sysinfo['front_page_display']; ?>
		<tr>
			<td data-export-label="Front Page Display">
				<?php esc_html_e( 'Front Page Display', 'jupiterx' ); ?>:
			</td>
			<td class="help">
				<a class="jupiterx-tooltip" data-content="<?php echo esc_attr__( 'The current Reading mode of WordPress.', 'jupiterx' ); ?>" href="#" data-toggle="popover" data-placement="top"></a>
			</td>
			<td><?php echo esc_html( $sof ); ?></td>
		</tr>

		<?php
		if ( 'page' == $sof ) {
?>
		<tr>
			<td data-export-label="Front Page">
				<?php esc_html_e( 'Front Page', 'jupiterx' ); ?>:
			</td>
			<td class="help">
				<a class="jupiterx-tooltip" data-content="<?php echo esc_attr__( 'The currently selected page which acts as the site\'s Front Page.', 'jupiterx' ); ?>" href="#" data-toggle="popover" data-placement="top"></a>
			</td>
			<td>
				<?php echo esc_html( $sysinfo['front_page'] ); ?>
			</td>
		</tr>
		<tr>
			<td data-export-label="Posts Page">
				<?php esc_html_e( 'Posts Page', 'jupiterx' ); ?>:
			</td>
			<td class="help">
				<a class="jupiterx-tooltip" data-content="<?php echo esc_attr__( 'The currently selected page in where blog posts are displayed.', 'jupiterx' ); ?>" href="#" data-toggle="popover" data-placement="top"></a>
			</td>
			<td>
				<?php echo esc_html( $sysinfo['posts_page'] ); ?>
			</td>
		</tr>
<?php
		}
?>
		<tr>
			<td data-export-label="WP Memory Limit">
				<?php esc_html_e( 'WP Memory Limit', 'jupiterx' ); ?>:
			</td>
			<td class="help">
				<a class="jupiterx-tooltip" data-content="<?php echo esc_attr__( 'The maximum amount of memory (RAM) that your site can use at one time.', 'jupiterx' ); ?>" href="#" data-toggle="popover" data-placement="top"></a>
			</td>
			<td>
				<?php echo esc_html( $sysinfo['wp_mem_limit']['size'] ); ?>
			</td>
		</tr>
		<tr>
			<td data-export-label="Database Table Prefix">
				<?php esc_html_e( 'Database Table Prefix', 'jupiterx' ); ?>:
			</td>
			<td class="help">
				<a class="jupiterx-tooltip" data-content="<?php echo esc_attr__( 'The prefix structure of the current WordPress database.', 'jupiterx' ); ?>" href="#" data-toggle="popover" data-placement="top"></a>
			</td>
			<td>
				<?php echo esc_html( $sysinfo['db_table_prefix'] ); ?>
			</td>
		</tr>
		<tr>
			<td data-export-label="WP Debug Mode">
				<?php esc_html_e( 'WP Debug Mode', 'jupiterx' ); ?>:
			</td>
			<td class="help">
				<a class="jupiterx-tooltip" data-content="<?php echo esc_attr__( 'Displays whether or not WordPress is in Debug Mode.', 'jupiterx' ); ?>" href="#" data-toggle="popover" data-placement="top"></a>
			</td>
			<td>
				<?php if ( 'false' == $sysinfo['wp_debug'] ) : ?>
					<span class="status-invisible">False</span><span class="status-state status-false"></span>
				<?php else : ?>
					<span class="status-invisible">True</span><span class="status-state status-true"></span>
				<?php endif; ?>
			</td>
		</tr>
		<tr>
			<td data-export-label="Language">
				<?php esc_html_e( 'Language', 'jupiterx' ); ?>:
			</td>
			<td class="help">
				<a class="jupiterx-tooltip" data-content="<?php echo esc_attr__( 'The current language used by WordPress. Default = English', 'jupiterx' ); ?>" href="#" data-toggle="popover" data-placement="top"></a>
			</td>
			<td>
				<?php echo esc_html( $sysinfo['wp_lang'] ); ?>
			</td>
		</tr>
		</tbody>
	</table>
	<br><br>


	<table class="table" cellspacing="0">
		<thead class="thead-light">
		<tr>
			<th colspan="3" data-export-label="Theme"><?php esc_html_e( 'Theme', 'jupiterx' ); ?></th>
		</tr>
		</thead>
		<tbody>
		<tr>
			<td data-export-label="Name"><?php esc_html_e( 'Name', 'jupiterx' ); ?>:</td>
			<td class="help">
				<a class="jupiterx-tooltip" data-content="<?php echo esc_attr__( 'The name of the current active theme.', 'jupiterx' ); ?>" href="#" data-toggle="popover" data-placement="top"></a>
			</td>
			<td><?php echo esc_html( $sysinfo['theme']['name'] ); ?></td>
		</tr>
		<tr>
			<td data-export-label="Version"><?php esc_html_e( 'Version', 'jupiterx' ); ?>:</td>
			<td class="help">
				<a class="jupiterx-tooltip" data-content="<?php echo esc_attr__( 'The installed version of the current active theme.', 'jupiterx' ); ?>" href="#" data-toggle="popover" data-placement="top"></a>
			</td>
			<td>
				<?php echo esc_html( $sysinfo['theme']['version'] ); ?>
			</td>
		</tr>
		<tr>
			<td data-export-label="Author URL"><?php esc_html_e( 'Author URL', 'jupiterx' ); ?>:</td>
			<td class="help">
				<a class="jupiterx-tooltip" data-content="<?php echo esc_attr__( 'The theme developers URL.', 'jupiterx' ); ?>" href="#" data-toggle="popover" data-placement="top"></a>
			</td>
			<td><?php echo esc_url( $sysinfo['theme']['author_uri'] ); ?></td>
		</tr>
		<tr>
			<td data-export-label="Child Theme"><?php esc_html_e( 'Child Theme', 'jupiterx' ); ?>:</td>
			<td class="help">
				<a class="jupiterx-tooltip" data-content="<?php echo esc_attr__( 'Displays whether or not the current theme is a child theme.', 'jupiterx' ); ?>" href="#" data-toggle="popover" data-placement="top"></a>
			</td>
			<td>
				<?php if ( is_child_theme() ) : ?>
					<span class="status-invisible">True</span><span class="status-state status-true"></span>
				<?php else : ?>
					<span class="status-invisible">False</span><span class="status-state status-false"></span>
				<?php endif; ?>
			</td>
		</tr>
			<?php if ( is_child_theme() ) : ?>
				<tr>
				<td data-export-label="Parent Theme Name"><?php esc_html_e( 'Parent Theme Name', 'jupiterx' ); ?>:
				</td>
				<td class="help">
				<a class="jupiterx-tooltip" data-content="<?php echo esc_attr__( 'The name of the parent theme.', 'jupiterx' ); ?>" href="#" data-toggle="popover" data-placement="top"></a>
				</td>
				<td><?php echo esc_html( $sysinfo['theme']['parent_name'] ); ?></td>
				</tr>
				<tr>
				<td data-export-label="Parent Theme Version">
				<?php esc_html_e( 'Parent Theme Version', 'jupiterx' ); ?>:
				</td>
				<td class="help">
				<a class="jupiterx-tooltip" data-content="<?php echo esc_attr__( 'The installed version of the parent theme.', 'jupiterx' ); ?>" href="#" data-toggle="popover" data-placement="top"></a>
				</td>
				<td><?php echo esc_html( $sysinfo['theme']['parent_version'] ); ?></td>
				</tr>
				<tr>
				<td data-export-label="Parent Theme Author URL">
				<?php esc_html_e( 'Parent Theme Author URL', 'jupiterx' ); ?>:
				</td>
				<td class="help">
				<a class="jupiterx-tooltip" data-content="<?php echo esc_attr__( 'The parent theme developers URL.', 'jupiterx' ); ?>" href="#" data-toggle="popover" data-placement="top"></a>
				</td>
				<td><?php echo esc_url( $sysinfo['theme']['parent_author_uri'] ); ?></td>
				</tr>
			<?php endif; ?>
		</tbody>
	</table>
	<br><br>

	<table class="table" cellspacing="0">
		<thead class="thead-light">
		<tr>
			<th colspan="3" data-export-label="Browser">
				<?php esc_html_e( 'Browser', 'jupiterx' ); ?>
			</th>
		</tr>
		</thead>
		<tbody>
		<tr>
			<td data-export-label="Browser Info">
				<?php esc_html_e( 'Browser Info', 'jupiterx' ); ?>:
			</td>
			<td class="help">
				<a class="jupiterx-tooltip" data-content="<?php echo esc_attr__( 'Information about web browser current in use.', 'jupiterx' ); ?>" href="#" data-toggle="popover" data-placement="top"></a>
			</td>
			<td>
			<?php
			foreach ( $sysinfo['browser'] as $key => $value ) {
				echo '<strong>' . esc_html( ucfirst( $key ) ) . '</strong>: ' . esc_html( $value ) . '<br/>';
			}
			?>
			</td>
		</tr>
		</tbody>
	</table>
	<br><br>



	<table class="table" cellspacing="0">
		<thead class="thead-light">
		<tr>
			<th colspan="3" data-export-label="Server Environment">
				<?php esc_html_e( 'Server Environment', 'jupiterx' ); ?>
			</th>
		</tr>
		</thead>
		<tbody>
		<tr>
			<td data-export-label="Server Info">
				<?php esc_html_e( 'Server Info', 'jupiterx' ); ?>:
			</td>
			<td class="help">
				<a class="jupiterx-tooltip" data-content="<?php echo esc_attr__( 'Information about the web server that is currently hosting your site.', 'jupiterx' ); ?>" href="#" data-toggle="popover" data-placement="top"></a>
			</td>
			<td>
				<?php echo esc_html( $sysinfo['server_info'] ); ?>
			</td>
		</tr>
		<tr>
			<td data-export-label="Localhost Environment">
				<?php esc_html_e( 'Localhost Environment', 'jupiterx' ); ?>:
			</td>
			<td class="help">
				<a class="jupiterx-tooltip" data-content="<?php echo esc_attr__( 'Is the server running in a localhost environment.', 'jupiterx' ); ?>" href="#" data-toggle="popover" data-placement="top"></a>
			</td>
			<td>
			<?php if ( 'true' == $sysinfo['localhost'] ) : ?>
				<span class="status-invisible">True</span><span class="status-state status-true"></span>
			<?php else : ?>
				<span class="status-invisible">False</span><span class="status-state status-false"></span>
			<?php endif; ?>
			</td>
		</tr>
		<tr>
			<td data-export-label="PHP Version">
				<?php esc_html_e( 'PHP Version', 'jupiterx' ); ?>:
			</td>
			<td class="help">
				<a class="jupiterx-tooltip" data-content="<?php echo esc_attr__( 'The version of PHP installed on your hosting server.', 'jupiterx' ); ?>" href="#" data-toggle="popover" data-placement="top"></a>
			</td>
			<td>
				<?php echo esc_html( $sysinfo['php_ver'] ); ?>
			</td>
		</tr>
		<tr>
			<td data-export-label="ABSPATH">
				<?php esc_html_e( 'ABSPATH', 'jupiterx' ); ?>:
			</td>
			<td class="help">
				<a class="jupiterx-tooltip" data-content="<?php echo esc_attr__( 'The ABSPATH variable on the server.', 'jupiterx' ); ?>" href="#" data-toggle="popover" data-placement="top"></a>
			</td>
			<td>
				<?php echo '<code>' . esc_html( $sysinfo['abspath'] ) . '</code>'; ?>
			</td>
		</tr>

				<?php
				if ( function_exists( 'ini_get' ) ) {
				?>
					<tr>
				<td data-export-label="PHP Memory Limit"><?php esc_html_e( 'PHP Memory Limit', 'jupiterx' ); ?>:</td>
				<td class="help">
					<a class="jupiterx-tooltip" data-content="<?php echo esc_attr__( 'The largest filesize that can be contained in one post.', 'jupiterx' ); ?>" href="#" data-toggle="popover" data-placement="top"></a>
				</td>
				<td><?php echo esc_html( $sysinfo['php_mem_limit'] ); ?></td>
			</tr>
			<tr>
				<td data-export-label="PHP Post Max Size"><?php esc_html_e( 'PHP Post Max Size', 'jupiterx' ); ?>:</td>
				<td class="help">
					<a class="jupiterx-tooltip" data-content="<?php echo esc_attr__( 'The largest filesize that can be contained in one post.', 'jupiterx' ); ?>" href="#" data-toggle="popover" data-placement="top"></a>
				</td>
				<td><?php echo esc_html( $sysinfo['php_post_max_size'] ); ?></td>
			</tr>
			<tr>
				<td data-export-label="PHP Time Limit"><?php esc_html_e( 'PHP Time Limit', 'jupiterx' ); ?>:</td>
				<td class="help">
					<a class="jupiterx-tooltip" data-content="<?php echo esc_attr__( 'max_execution_time : The amount of time (in seconds) that your site will spend on a single operation before timing out (to avoid server lockups).', 'jupiterx' ); ?>" href="#" data-toggle="popover" data-placement="top"></a>
				</td>
				<td><?php echo esc_html( $sysinfo['php_time_limit'] ); ?></td>
			</tr>

			<tr>
				<td data-export-label="PHP Max Input Vars"><?php esc_html_e( 'PHP Max Input Vars', 'jupiterx' ); ?>:</td>
				<td class="help">
					<a class="jupiterx-tooltip" data-content="<?php echo esc_attr__( 'The maximum number of variables your server can use for a single function to avoid overloads.', 'jupiterx' ); ?>" href="#" data-toggle="popover" data-placement="top"></a>
				</td>
				<td><?php echo esc_html( $sysinfo['php_max_input_var'] ); ?></td>
			</tr>

		<?php
		if ( true == $sysinfo['suhosin_installed'] ) {
		?>
		<tr>
			<td data-export-label="PHP Max Input Vars"><?php esc_html_e( 'Suhosin Max Request Vars', 'jupiterx' ); ?>:</td>
			<td class="help">
				<a class="jupiterx-tooltip" data-content="<?php echo esc_attr__( 'The maximum number of variables your server running Suhosin can use for a single function to avoid overloads.', 'jupiterx' ); ?>" href="#" data-toggle="popover" data-placement="top"></a>
			</td>
			<td><?php echo esc_html( $sysinfo['suhosin_request_max_vars'] ); ?></td>
		</tr>
		<tr>
			<td data-export-label="PHP Max Input Vars"><?php esc_html_e( 'Suhosin Max Post Vars', 'jupiterx' ); ?>:</td>
			<td class="help">
				<a class="jupiterx-tooltip" data-content="<?php echo esc_attr__( 'The maximum number of variables your server running Suhosin can use for a single function to avoid overloads.', 'jupiterx' ); ?>" href="#" data-toggle="popover" data-placement="top"></a>
			</td>
			<td><?php echo esc_html( $sysinfo['suhosin_post_max_vars'] ); ?></td>
		</tr>
		<?php
		}
			?>
			<tr>
				<td data-export-label="PHP Display Errors"><?php esc_html_e( 'PHP Display Errors', 'jupiterx' ); ?>:</td>
				<td class="help">
					<a class="jupiterx-tooltip" data-content="<?php echo esc_attr__( 'Determines if PHP will display errors within the browser.', 'jupiterx' ); ?>" href="#" data-toggle="popover" data-placement="top"></a>
				</td>
				<td>
				<?php if ( 'false' == $sysinfo['php_display_errors'] ) : ?>
					<span class="status-invisible">False</span><span class="status-state status-false"></span>
				<?php else : ?>
					<span class="status-invisible">True</span><span class="status-state status-true"></span>
				<?php endif; ?>
						</td>
					</tr>
				<?php
				}
		?>
		<tr>
			<td data-export-label="SUHOSIN Installed"><?php esc_html_e( 'SUHOSIN Installed', 'jupiterx' ); ?>:</td>
			<td class="help">
				<a class="jupiterx-tooltip" data-content="<?php echo esc_attr__( 'Suhosin is an advanced protection system for PHP installations. It was designed to protect your servers on the one hand against a number of well known problems in PHP applications and on the other hand against potential unknown vulnerabilities within these applications or the PHP core itself.  If enabled on your server, Suhosin may need to be configured to increase its data submission limits.', 'jupiterx' ); ?>" href="#" data-toggle="popover" data-placement="top"></a>
			</td>
			<td>
				<?php if ( false == $sysinfo['suhosin_installed'] ) : ?>
					<span class="status-invisible">False</span><span class="status-state status-false"></span>
				<?php else : ?>
					<span class="status-invisible">True</span><span class="status-state status-true"></span>
				<?php endif; ?>
			</td>
		</tr>

		<tr>
			<td data-export-label="MySQL Version"><?php esc_html_e( 'MySQL Version', 'jupiterx' ); ?>:</td>
			<td class="help">
				<a class="jupiterx-tooltip" data-content="<?php echo esc_attr__( 'The version of MySQL installed on your hosting server.', 'jupiterx' ); ?>" href="#" data-toggle="popover" data-placement="top"></a>
			</td>
			<td><?php echo esc_html( $sysinfo['mysql_ver'] ); ?></td>
		</tr>
		<tr>
			<td data-export-label="Max Upload Size"><?php esc_html_e( 'Max Upload Size', 'jupiterx' ); ?>:</td>
			<td class="help">
				<a class="jupiterx-tooltip" data-content="<?php echo esc_attr__( 'The largest filesize that can be uploaded to your WordPress installation.', 'jupiterx' ); ?>" href="#" data-toggle="popover" data-placement="top"></a>
			</td>
			<td><?php echo esc_html( $sysinfo['max_upload_size'] ); ?></td>
		</tr>
		<tr>
			<td data-export-label="Default Timezone is UTC">
				<?php esc_html_e( 'Default Timezone is UTC', 'jupiterx' ); ?>:
			</td>
			<td class="help">
				<a class="jupiterx-tooltip" data-content="<?php echo esc_attr__( 'The default timezone for your server.', 'jupiterx' ); ?>" href="#" data-toggle="popover" data-placement="top"></a>
			</td>
			<td>
			<?php if ( 'false' == $sysinfo['def_tz_is_utc'] ) : ?>
				<span class="status-invisible">False</span><span class="status-state status-false"></span>
				<?php sprintf( __( 'Default timezone is %s - it should be UTC', 'jupiterx' ), esc_html( date_default_timezone_get() ) ); ?>
			<?php else : ?>
				<span class="status-invisible">True</span><span class="status-state status-true"></span>
			<?php endif; ?>
			</td>
		</tr>
		<tr>

			<td data-export-label="PHP XML">
				<?php esc_html_e( 'PHP XML', 'jupiterx' ); ?>:
			</td>
			<td class="help">
				<a class="jupiterx-tooltip" data-content="<?php echo esc_attr__( 'Theme requires PHP XML Library to be installed.', 'jupiterx' ); ?>" href="#" data-toggle="popover" data-placement="top"></a>
			</td>
			<td>
				<?php if ( 'false' == $sysinfo['phpxml'] ) : ?>
					<span class="status-invisible">False</span><span class="status-state status-false"></span>
				<?php else : ?>
					<span class="status-invisible">True</span><span class="status-state status-true"></span>
				<?php endif; ?>
			</td>
		</tr>
		<tr>
			<td data-export-label="MBString">
				<?php esc_html_e( 'MBString', 'jupiterx' ); ?>:
			</td>
			<td class="help">
				<a class="jupiterx-tooltip" data-content="<?php echo esc_attr__( 'Theme requires MBString PHP Library to be installed.', 'jupiterx' ); ?>" href="#" data-toggle="popover" data-placement="top"></a>
			</td>
			<td>
				<?php if ( 'false' == $sysinfo['mbstring'] ) : ?>
					<span class="status-invisible">False</span><span class="status-state status-false"></span>
				<?php else : ?>
					<span class="status-invisible">True</span><span class="status-state status-true"></span>
				<?php endif; ?>
			</td>
		</tr>
		<tr>
			<td data-export-label="SimpleXML">
				<?php esc_html_e( 'SimpleXML', 'jupiterx' ); ?>:
			</td>
			<td class="help">
				<a class="jupiterx-tooltip" data-content="<?php echo esc_attr__( 'Theme requires SimpleXML PHP Library to be installed.', 'jupiterx' ); ?>" href="#" data-toggle="popover" data-placement="top"></a>
			</td>
			<td>
				<?php if ( 'false' == $sysinfo['simplexml'] ) : ?>
					<span class="status-invisible">False</span><span class="status-state status-false"></span>
				<?php else : ?>
					<span class="status-invisible">True</span><span class="status-state status-true"></span>
				<?php endif; ?>
			</td>
		</tr>
		<?php
			$posting = array();

			$posting['fsockopen_curl']['name'] = esc_html__( 'fsockopen/cURL', 'jupiterx' );
			$posting['fsockopen_curl']['help'] = esc_attr__( 'Used when communicating with remote services with PHP.', 'jupiterx' );

		if ( 'true' == $sysinfo['fsockopen_curl'] ) {
			$posting['fsockopen_curl']['success'] = true;
		} else {
			$posting['fsockopen_curl']['success'] = false;
			$posting['fsockopen_curl']['note']    = esc_html__( 'Your server does not have fsockopen or cURL enabled - cURL is used to communicate with other servers. Please contact your hosting provider.', 'jupiterx' );
		}

			$posting['soap_client']['name'] = esc_html__( 'SoapClient', 'jupiterx' );
			$posting['soap_client']['help'] = esc_attr__( 'Some webservices like shipping use SOAP to get information from remote servers, for example, live shipping quotes from FedEx require SOAP to be installed.', 'jupiterx' );

		if ( true == $sysinfo['soap_client'] ) {
			$posting['soap_client']['success'] = true;
		} else {
			$posting['soap_client']['success'] = false;
			$posting['soap_client']['note']    = sprintf( __( 'Your server does not have the <a href="%s">SOAP Client</a> class enabled - some gateway plugins which use SOAP may not work as expected.', 'jupiterx' ), 'http://php.net/manual/en/class.soapclient.php' );
		}

			$posting['dom_document']['name'] = esc_html__( 'DOMDocument', 'jupiterx' );
			$posting['dom_document']['help'] = esc_attr__( 'HTML/Multipart emails use DOMDocument to generate inline CSS in templates.', 'jupiterx' );

		if ( true == $sysinfo['dom_document'] ) {
			$posting['dom_document']['success'] = true;
		} else {
			$posting['dom_document']['success'] = false;
			$posting['dom_document']['note']    = sprintf( __( 'Your server does not have the <a href="%s">DOMDocument</a> class enabled - HTML/Multipart emails, and also some extensions, will not work without DOMDocument.', 'jupiterx' ), 'http://php.net/manual/en/class.domdocument.php' );
		}


			$posting['gzip']['name'] = esc_html__( 'GZip', 'jupiterx' );
			$posting['gzip']['help'] = esc_attr__( 'GZip (gzopen) is used to open the GEOIP database from MaxMind.', 'jupiterx' );

		if ( true == $sysinfo['gzip'] ) {
			$posting['gzip']['success'] = true;
		} else {
			$posting['gzip']['success'] = false;
			$posting['gzip']['note'] = sprintf( __( 'Your server does not support the <a href="%s">gzopen</a> function - this is required to use the GeoIP database from MaxMind. The API fallback will be used instead for geolocation.', 'jupiterx' ), 'http://php.net/manual/en/zlib.installation.php' );
		}

			$posting['wp_remote_post']['name'] = esc_html__( 'Remote Post', 'jupiterx' );
			$posting['wp_remote_post']['help'] = esc_attr__( 'Used to send data to remote servers.', 'jupiterx' );

		if ( 'true' == $sysinfo['wp_remote_post'] ) {
			$posting['wp_remote_post']['success'] = true;
		} else {
			$posting['wp_remote_post']['note'] = esc_html__( 'wp_remote_post() failed. Many advanced features may not function. Contact your hosting provider.', 'jupiterx' );

			if ( isset( $sysinfo['wp_remote_post_error'] ) ) {
				$posting['wp_remote_post']['note'] .= ' ' . sprintf( __( 'Error: %s', 'jupiterx' ), sanitize_text_field( $sysinfo['wp_remote_post_error'] ) );
			}

			$posting['wp_remote_post']['success'] = false;
		}

		$posting['wp_remote_get']['name'] = esc_html__( 'Remote Get', 'jupiterx' );
		$posting['wp_remote_get']['help'] = esc_attr__( 'Used to grab information from remote servers for updates updates.', 'jupiterx' );

		if ( 'true' == $sysinfo['wp_remote_get'] ) {
			$posting['wp_remote_get']['success'] = true;
		} else {
			$posting['wp_remote_get']['note'] = esc_html__( 'wp_remote_get() failed. This is needed to get information from remote servers. Contact your hosting provider.', 'jupiterx' );

			if ( isset( $sysinfo['wp_remote_get_error'] ) ) {
				$posting['wp_remote_get']['note'] .= ' ' . sprintf( __( 'Error: %s', 'jupiterx' ), sanitize_text_field( $sysinfo['wp_remote_get_error'] ) );
			}

			$posting['wp_remote_get']['success'] = false;
		}

		$posting['zip_archive']['name'] = esc_html__( 'Zip Archive', 'jupiterx' );
		$posting['zip_archive']['help'] = esc_attr__( 'Used to read or write ZIP compressed archives and the files inside them.', 'jupiterx' );

		if ( class_exists( 'ZipArchive' ) ) {
			$posting['zip_archive']['success'] = true;
		} else {
			$posting['zip_archive']['note'] = esc_html__( 'ZipArchive Library is missing. Install the Zip extension. Contact your hosting provider.', 'jupiterx' );
			$posting['zip_archive']['success'] = false;
		}

		$posting = apply_filters( 'redux_debug_posting', $posting );

		foreach ( $posting as $post ) {
			$mark = ! empty( $post['success'] ) ? 'yes' : 'error';
			?>
			<tr>
			<td data-export-label="<?php echo esc_html( $post['name'] ); ?>">
				<?php echo esc_html( $post['name'] ); ?>:
			</td>
			<td class="help">
				<a class="jupiterx-tooltip" data-content="<?php echo isset( $post['help'] ) ? wp_kses_post( $post['help'] ) : ''; ?>" href="#" data-toggle="popover" data-placement="top"></a>
			</td>
			<td>
					<?php echo ! empty( $post['success'] ) ? '<span class="status-invisible">True</span><span class="status-state status-true"></span>' : '<span class="status-invisible">False</span><span class="status-state status-false"></span>'; ?>
					<?php echo ! empty( $post['note'] ) ? wp_kses_data( $post['note'] ) : ''; ?>
			</td>
			</tr>
			<?php
		}
		?>
		</tbody>
	</table>
	<br><br>
		<table class="table" cellspacing="0">
		<thead class="thead-light">
		<tr>
			<th colspan="3" data-export-label="Active Plugins (<?php echo esc_html( count( (array) get_option( 'active_plugins' ) ) ); ?>)">
				<?php esc_html_e( 'Active Plugins', 'jupiterx' ); ?> (<?php echo esc_html( count( (array) get_option( 'active_plugins' ) ) ); ?>)
			</th>
		</tr>
		</thead>
		<tbody>
		<?php
		foreach ( $sysinfo['plugins'] as $name => $plugin_data ) {

			if ( ! empty( $plugin_data['Name'] ) ) {
				$plugin_name = esc_html( $plugin_data['Name'] );

				if ( ! empty( $plugin_data['PluginURI'] ) ) {
					$plugin_name = '<a href="' . esc_url( $plugin_data['PluginURI'] ) . '" title="' . esc_attr__( 'Visit plugin homepage', 'jupiterx' ) . '">' . esc_html( $plugin_name ) . '</a>';
				}
?>
				<tr>
					<td><?php echo wp_kses_post( $plugin_name ); ?></td>
					<td class="help">
						<a class="jupiterx-tooltip" data-content="<?php echo esc_attr( strip_tags( $plugin_data['Description'] ) ); ?>" href="#" data-toggle="popover" data-placement="top"></a>
					</td>
					<td>
						<?php echo sprintf( _x( 'by %s', 'by author', 'jupiterx' ), wp_kses_post( $plugin_data['Author'] ) ) . ' &ndash; ' . esc_html( $plugin_data['Version'] ); ?>
					</td>
				</tr>
<?php
			}
		}
		?>
		</tbody>
	</table>

	</div>
</div>
