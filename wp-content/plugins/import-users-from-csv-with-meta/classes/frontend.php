<?php

if ( ! defined( 'ABSPATH' ) ) exit; 

class ACUI_Frontend{
	function admin_gui(){
		$send_mail_frontend = get_option( "acui_frontend_send_mail");
		$send_mail_updated_frontend = get_option( "acui_frontend_send_mail_updated");
		$role = get_option( "acui_frontend_role");
		$activate_users_wp_members = get_option( "acui_frontend_activate_users_wp_members");

		if( empty( $send_mail_frontend ) )
			$send_mail_frontend = false;

		if( empty( $send_mail_updated_frontend ) )
			$send_mail_updated_frontend = false;
		?>
		<h3><?php _e( "Execute an import of users in the frontend", 'import-users-from-csv-with-meta' ); ?></h3>

		<form method="POST" enctype="multipart/form-data" action="" accept-charset="utf-8">
			<table class="form-table">
				<tbody>
				<tr class="form-field">
					<th scope="row"><label for=""><?php _e( 'Use this shortcode in any page or post', 'import-users-from-csv-with-meta' ); ?></label></th>
					<td>
						<pre>[import-users-from-csv-with-meta]</pre>
						<input class="button-primary" type="button" id="copy_to_clipboard" value="<?php _e( 'Copy to clipboard', 'import-users-from-csv-with-meta'); ?>"/>
					</td>
				</tr>
				<tr class="form-field form-required">
					<th scope="row"><label for="send-mail-frontend"><?php _e( 'Send mail when using frontend import?', 'import-users-from-csv-with-meta' ); ?></label></th>
					<td>
						<input type="checkbox" name="send-mail-frontend" value="yes" <?php if( $send_mail_frontend == true ) echo "checked='checked'"; ?>/>
					</td>
				</tr>
				<tr class="form-field form-required">
					<th scope="row"><label for="send-mail-updated-frontend"><?php _e( 'Send mail also to users that are being updated?', 'import-users-from-csv-with-meta' ); ?></label></th>
					<td>
						<input type="checkbox" name="send-mail-updated-frontend" value="yes" <?php if( $send_mail_updated_frontend == true ) echo "checked='checked'"; ?>/>
					</td>
				</tr>
				<tr class="form-field form-required">
					<th scope="row"><label for="role"><?php _e( 'Role', 'import-users-from-csv-with-meta' ); ?></label></th>
					<td>
						<select id="role-frontend" name="role-frontend">
							<?php 
								if( $role == '' )
									echo "<option selected='selected' value=''>" . __( 'Disable role assignement in frontend import', 'import-users-from-csv-with-meta' )  . "</option>";
								else
									echo "<option value=''>" . __( 'Disable role assignement in frontend import', 'import-users-from-csv-with-meta' )  . "</option>";

								$list_roles = acui_get_editable_roles();								
								foreach ($list_roles as $key => $value) {
									if($key == $role)
										echo "<option selected='selected' value='$key'>$value</option>";
									else
										echo "<option value='$key'>$value</option>";
								}
							?>
						</select>
						<p class="description"><?php _e( 'Which role would be used to import users?', 'import-users-from-csv-with-meta' ); ?></p>
					</td>
				</tr>

				<?php if( is_plugin_active( 'wp-members/wp-members.php' ) ): ?>

				<tr class="form-field form-required">
					<th scope="row"><label>Activate user when they are being imported?</label></th>
					<td>
						<select name="activate_users_wp_members">
							<option value="no_activate" <?php selected( $activate_users_wp_members,'no_activate', true ); ?>><?php _e( 'Do not activate users', 'import-users-from-csv-with-meta' ); ?></option>
							<option value="activate"  <?php selected( $activate_users_wp_members,'activate', true ); ?>><?php _e( 'Activate users when they are being imported', 'import-users-from-csv-with-meta' ); ?></option>
						</select>

						<p class="description"><strong>(<?php _e( 'Only for', 'import-users-from-csv-with-meta' ); ?> <a href="https://wordpress.org/plugins/wp-members/"><?php _e( 'WP Members', 'import-users-from-csv-with-meta' ); ?></a> <?php _e( 'users', 'import-users-from-csv-with-meta' ); ?>)</strong>.</p>
					</td>
				</tr>

				<?php endif; ?>
				</tbody>
			</table>
			<input class="button-primary" type="submit" value="<?php _e( 'Save frontend import options', 'import-users-from-csv-with-meta'); ?>"/>
		</form>

		<script>
		jQuery( document ).ready( function( $ ){
			$( '#copy_to_clipboard' ).click( function(){
				var $temp = $("<input>");
				$("body").append($temp);
				$temp.val( '[import-users-from-csv-with-meta]' ).select();
				document.execCommand("copy");
				$temp.remove();
			} );
		});
		</script>
		<?php
	}
}