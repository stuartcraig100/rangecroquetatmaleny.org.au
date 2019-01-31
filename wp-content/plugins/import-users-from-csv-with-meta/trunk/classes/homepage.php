<?php

if ( ! defined( 'ABSPATH' ) ) exit; 

class ACUI_Homepage{
	public static function admin_gui(){
		$args_old_csv = array( 'post_type'=> 'attachment', 'post_mime_type' => 'text/csv', 'post_status' => 'inherit', 'posts_per_page' => -1 );
		$old_csv_files = new WP_Query( $args_old_csv );

		acui_check_options();
?>
	<div class="wrap acui">	

		<?php if( $old_csv_files->found_posts > 0 ): ?>
		<div class="postbox">
		    <div title="<?php _e( 'Click to open/close', 'import-users-from-csv-with-meta' ); ?>" class="handlediv">
		      <br>
		    </div>

		    <h3 class="hndle"><span>&nbsp;&nbsp;&nbsp;<?php _e( 'Old CSV files uploaded', 'import-users-from-csv-with-meta' ); ?></span></h3>

		    <div class="inside" style="display: block;">
		    	<p><?php _e( 'For security reasons you should delete this files, probably they would be visible in the Internet if a bot or someone discover the URL. You can delete each file or maybe you want delete all CSV files you have uploaded:', 'import-users-from-csv-with-meta' ); ?></p>
		    	<input type="button" value="<?php _e( 'Delete all CSV files uploaded', 'import-users-from-csv-with-meta' ); ?>" id="bulk_delete_attachment" style="float:right;" />
		    	<ul>
		    		<?php while($old_csv_files->have_posts()) : 
		    			$old_csv_files->the_post(); 

		    			if( get_the_date() == "" )
		    				$date = "undefined";
		    			else
		    				$date = get_the_date();
		    		?>
		    		<li><a href="<?php echo wp_get_attachment_url( get_the_ID() ); ?>"><?php the_title(); ?></a> <?php _e( 'uploaded on', 'import-users-from-csv-with-meta' ) . ' ' . $date; ?> <input type="button" value="<?php _e( 'Delete', 'import-users-from-csv-with-meta' ); ?>" class="delete_attachment" attach_id="<?php the_ID(); ?>" /></li>
		    		<?php endwhile; ?>
		    		<?php wp_reset_postdata(); ?>
		    	</ul>
		        <div style="clear:both;"></div>
		    </div>
		</div>
		<?php endif; ?>	

		<div id='message' class='updated'><?php _e( 'File must contain at least <strong>2 columns: username and email</strong>. These should be the first two columns and it should be placed <strong>in this order: username and email</strong>. If there are more columns, this plugin will manage it automatically.', 'import-users-from-csv-with-meta' ); ?></div>
		<div id='message-password' class='error'><?php _e( 'Please, read carefully how <strong>passwords are managed</strong> and also take note about capitalization, this plugin is <strong>case sensitive</strong>.', 'import-users-from-csv-with-meta' ); ?></div>

		<div>
			<h2><?php _e( 'Import users from CSV','import-users-from-csv-with-meta' ); ?></h2>
		</div>

		<div style="clear:both;"></div>

		<div class="main_bar">
			<form method="POST" enctype="multipart/form-data" action="" accept-charset="utf-8" onsubmit="return check();">
			<table class="form-table">
				<tbody>
				<tr class="form-field form-required">
					<th scope="row"><label><?php _e( 'Update existing users?', 'import-users-from-csv-with-meta' ); ?></label></th>
					<td>
						<select name="update_existing_users">
							<option value="yes"><?php _e( 'Yes', 'import-users-from-csv-with-meta' ); ?></option>
							<option value="no"><?php _e( 'No', 'import-users-from-csv-with-meta' ); ?></option>
						</select>
					</td>
				</tr>

				<tr class="form-field">
					<th scope="row"><label for="role"><?php _e( 'Default role', 'import-users-from-csv-with-meta' ); ?></label></th>
					<td>
					<?php 
						$list_roles = acui_get_editable_roles(); 
						
						foreach ($list_roles as $key => $value) {
							if($key == "subscriber")
								echo "<label style='margin-right:5px;'><input name='role[]' type='checkbox' checked='checked' value='$key'/>$value</label>";
							else
								echo "<label style='margin-right:5px;'><input name='role[]' type='checkbox' value='$key'/>$value</label>";
						}
					?>

					<p class="description"><?php _e( 'You can also import roles from a CSV column. Please read documentation tab to see how it can be done. If you choose more than one role, the roles would be assigned correctly but you should use some plugin like <a href="https://wordpress.org/plugins/user-role-editor/">User Role Editor</a> to manage them.', 'import-users-from-csv-with-meta' ); ?></p>
					</td>
				</tr>

				<tr class="form-field form-required">
					<th scope="row"><label><?php _e( 'Update roles for existing users?', 'import-users-from-csv-with-meta' ); ?></label></th>
					<td>
						<select name="update_roles_existing_users">
							<option value="no"><?php _e( 'No', 'import-users-from-csv-with-meta' ); ?></option>
							<option value="yes"><?php _e( 'Yes, update and override existing roles', 'import-users-from-csv-with-meta' ); ?></option>
							<option value="yes_no_override"><?php _e( 'Yes, add new roles and not override existing ones', 'import-users-from-csv-with-meta' ); ?></option>
						</select>
					</td>
				</tr>

				<tr class="form-field form-required">
					<th scope="row"><label><?php _e( 'CSV file <span class="description">(required)</span></label>', 'import-users-from-csv-with-meta' ); ?></th>
					<td>
						<div id="upload_file">
							<input type="file" name="uploadfiles[]" id="uploadfiles" size="35" class="uploadfiles" />
							<?php _e( '<em>or you can choose directly a file from your host,', 'import-users-from-csv-with-meta' ) ?> <a href="#" class="toggle_upload_path"><?php _e( 'click here', 'import-users-from-csv-with-meta' ) ?></a>.</em>
						</div>
						<div id="introduce_path" style="display:none;">
							<input placeholder="<?php _e( 'You have to introduce the path to file, i.e.:' ,'import-users-from-csv-with-meta' ); ?><?php $upload_dir = wp_upload_dir(); echo $upload_dir["path"]; ?>/test.csv" type="text" name="path_to_file" id="path_to_file" value="<?php echo dirname( __FILE__ ); ?>/test.csv" style="width:70%;" />
							<em><?php _e( 'or you can upload it directly from your PC', 'import-users-from-csv-with-meta' ); ?>, <a href="#" class="toggle_upload_path"><?php _e( 'click here', 'import-users-from-csv-with-meta' ); ?></a>.</em>
						</div>
					</td>
				</tr>

				<tr class="form-field form-required">
					<th scope="row"><label><?php _e( 'What should the plugin do with empty cells?', 'import-users-from-csv-with-meta' ); ?></label></th>
					<td>
						<select name="empty_cell_action">
							<option value="leave"><?php _e( 'Leave the old value for this metadata', 'import-users-from-csv-with-meta' ); ?></option>
							<option value="delete"><?php _e( 'Delete the metadata', 'import-users-from-csv-with-meta' ); ?></option>
						</select>
					</td>
				</tr>

				<?php if( is_plugin_active( 'buddypress/bp-loader.php' ) ):

					if( !class_exists( "BP_XProfile_Group" ) ){
						require_once( WP_PLUGIN_DIR . "/buddypress/bp-xprofile/classes/class-bp-xprofile-group.php" );
					}

					$buddypress_fields = array();
					$buddypress_types=array();
					$profile_groups = BP_XProfile_Group::get( array( 'fetch_fields' => true	) );

					if ( !empty( $profile_groups ) ) {
						 foreach ( $profile_groups as $profile_group ) {
							if ( !empty( $profile_group->fields ) ) {				
								foreach ( $profile_group->fields as $field ) {
									$buddypress_fields[] = $field->name;
									$buddypress_types[] = $field->type;
								}
							}
						}
					}
				?>

				<tr class="form-field form-required">
					<th scope="row"><label><?php _e( 'BuddyPress users', 'import-users-from-csv-with-meta' ); ?></label></th>
					<td><?php _e( 'You can insert any profile from BuddyPress using his name as header. Plugin will check, before import, which fields are defined in BuddyPress and will assign it in the update. You can use this fields:', 'import-users-from-csv-with-meta' ); ?>
					<ul style="list-style:disc outside none;margin-left:2em;">
						<?php foreach ($buddypress_fields as $buddypress_field ): ?><li><?php echo $buddypress_field; ?></li><?php endforeach; ?>
					</ul>
					<?php _e( 'Remember that all date fields have to be imported using a format like this: 2016-01-01 00:00:00', 'import-users-from-csv-with-meta' ); ?>

					<p class="description"><strong>(<?php _e( 'Only for', 'import-users-from-csv-with-meta' ); ?> <a href="https://wordpress.org/plugins/buddypress/">BuddyPress</a> <?php _e( 'users', 'import-users-from-csv-with-meta' ); ?></strong>.)</p>
					</td>					
				</tr>

				<?php endif; ?>

				<?php if( is_plugin_active( 'wp-members/wp-members.php' ) ): ?>

				<tr class="form-field form-required">
					<th scope="row"><label>Activate user when they are being imported?</label></th>
					<td>
						<select name="activate_users_wp_members">
							<option value="no_activate"><?php _e( 'Do not activate users', 'import-users-from-csv-with-meta' ); ?></option>
							<option value="activate"><?php _e( 'Activate users when they are being imported', 'import-users-from-csv-with-meta' ); ?></option>
						</select>

						<p class="description"><strong>(<?php _e( 'Only for', 'import-users-from-csv-with-meta' ); ?> <a href="https://wordpress.org/plugins/wp-members/"><?php _e( 'WP Members', 'import-users-from-csv-with-meta' ); ?></a> <?php _e( 'users', 'import-users-from-csv-with-meta' ); ?>)</strong>.</p>
					</td>
					
				</tr>

				<?php endif; ?>

				<?php if( is_plugin_active( 'new-user-approve/new-user-approve.php' ) ): ?>

				<tr class="form-field form-required">
					<th scope="row"><label><?php _e( 'Approve users at the same time is being created', 'import-users-from-csv-with-meta' ); ?></label></th>
					<td>
						<select name="approve_users_new_user_appove">
							<option value="no_approve"><?php _e( 'Do not approve users', 'import-users-from-csv-with-meta' ); ?></option>
							<option value="approve"><?php _e( 'Approve users when they are being imported', 'import-users-from-csv-with-meta' ); ?></option>
						</select>

						<p class="description"><strong>(<?php _e( 'Only for', 'import-users-from-csv-with-meta' ); ?> <a href="https://es.wordpress.org/plugins/new-user-approve/"><?php _e( 'New User Approve', 'import-users-from-csv-with-meta' ); ?></a> <?php _e( 'users', 'import-users-from-csv-with-meta' ); ?></strong>.</p>
					</td>
					
				</tr>

				<?php endif; ?>

				<?php if( is_plugin_active( 'allow-multiple-accounts/allow-multiple-accounts.php' ) ): ?>

				<tr class="form-field form-required">
					<th scope="row"><label><?php _e( 'Repeated email in different users?', 'import-users-from-csv-with-meta' ); ?></label></th>
					<td>
						<select name="allow_multiple_accounts">
							<option value="not_allowed"><?php _e( 'Not allowed', 'import-users-from-csv-with-meta' ); ?></option>
							<option value="allowed"><?php _e( 'Allowed', 'import-users-from-csv-with-meta' ); ?></option>
						</select>
						<p class="description"><strong>(<?php _e( 'Only for', 'import-users-from-csv-with-meta' ); ?> <a href="https://wordpress.org/plugins/allow-multiple-accounts/"><?php _e( 'Allow Multiple Accounts', 'import-users-from-csv-with-meta' ); ?></a> <?php _e( 'users', 'import-users-from-csv-with-meta'); ?>)</strong>. <?php _e('Allow multiple user accounts to be created having the same email address.','import-users-from-csv-with-meta' ); ?></p>
					</td>
				</tr>

				<?php endif; ?>

				<?php if( is_plugin_active( 'wp-access-areas/wp-access-areas.php' ) ): ?>

				<tr class="form-field form-required">
					<th scope="row"><label><?php _e('WordPress Access Areas is activated','import-users-from-csv-with-meta'); ?></label></th>
					<td>
						<p class="description"><?php _e('As user of','import-users-from-csv-with-meta' ); ?> <a href="https://wordpress.org/plugins/wp-access-areas/"><?php _e( 'WordPress Access Areas', 'import-users-from-csv-with-meta' )?></a> <?php _e( 'you can use the Access Areas created', 'import-users-from-csv-with-meta' ); ?> <a href="<?php echo admin_url( 'users.php?page=user_labels' ); ?>"><?php _e( 'here', 'import-users-from-csv-with-meta' ); ?></a> <?php _e( 'and use this areas in your own CSV file. Please use the column name <strong>wp-access-areas</strong> and in each row use <strong>the name that you have used', 'import-users-from-csv-with-meta' ); ?> <a href="<?php echo admin_url( 'users.php?page=user_labels' ); ?>"><?php _e( 'here', 'import-users-from-csv-with-meta' ); ?></a></strong><?php _e( ', like this ones:', 'import-users-from-csv-with-meta' ); ?></p>
						<ol>
							<?php 
								$data = WPAA_AccessArea::get_available_userlabels( '0,5' , NULL ); 								
								foreach ( $data as $access_area_object ): ?>
									<li><?php echo $access_area_object->cap_title; ?></li>
							<?php endforeach; ?>

						</ol>
						<p class="description"><?php _e( "If you leave this cell empty for some user or the access area indicated doesn't exist, user won't be assigned to any access area. You can choose more than one area for each user using pads between them in the same row, i.e.: ", 'import-users-from-csv-with-meta' ) ?>access_area1#accces_area2</p>
					</td>
				</tr>

				<?php endif; ?>

				<tr class="form-field">
					<th scope="row"><label for="user_login"><?php _e( 'Send mail', 'import-users-from-csv-with-meta' ); ?></label></th>
					<td>
						<p>
							<?php _e( 'Do you wish to send a mail with credentials and other data?', 'import-users-from-csv-with-meta' ); ?> 
							<input type="checkbox" name="sends_email" value="yes" <?php if( get_option( 'acui_manually_send_mail' ) ): ?> checked="checked" <?php endif; ?>>
						</p>
						<p>
							<?php _e( 'Do you wish to send this mail also to users that are being updated? (not only to the one which are being created)', 'import-users-from-csv-with-meta' ); ?>
							<input type="checkbox" name="send_email_updated" value="yes" <?php if( get_option( 'acui_manually_send_mail_updated' ) ): ?> checked="checked" <?php endif; ?>>
						</p>
					</td>
				</tr>
				</tbody>
			</table>

			<?php wp_nonce_field( 'acui-import', 'acui-nonce' ); ?>

			<input class="button-primary" type="submit" name="uploadfile" id="uploadfile_btn" value="<?php _e( 'Start importing', 'import-users-from-csv-with-meta' ); ?>"/>
			</form>
		</div>

		<div class="sidebar">
			<div class="sidebar_section become_patreon">
		    	<a class="patreon" color="primary" type="button" name="become-a-patron" data-tag="become-patron-button" href="https://www.patreon.com/bePatron?c=1741454" role="button">
		    		<div><span><?php _e( 'Become a patron', 'import-users-from-csv-with-meta'); ?></span></div>
		    	</a>
		    </div>

		    <?php if( substr( get_locale(), 0, 2 ) == 'es' ): ?>
			<div class="sidebar_section" id="webempresa">
				<h3>Tu web más rápida con Webempresa</h3>
				<ul>
					<li><label>Además ahora un <a href="https://codection.com/25-de-descuento-en-el-mejor-hosting-en-espanol-con-webempresa/">25% de descuento</a>.</label></li>
				</ul>
				<a href="https://codection.com/25-de-descuento-en-el-mejor-hosting-en-espanol-con-webempresa/" target="_blank">
					<img src="<?php echo plugin_dir_url( __FILE__ ); ?>assets/webempresa_logo.png">
				</a>
			</div>
			<?php else: ?>
			<div class="sidebar_section" style="padding:0 !important;border:none !important;background:none !important;">
				<a href="https://codection.com/how-to-transfer-your-website-to-inmotion-hosting/" target="_blank">
					<img src="<?php echo plugin_dir_url( __FILE__ ); ?>assets/codection-inmotion.png">
				</a>
			</div>
			<?php endif; ?>
			
			<div class="sidebar_section" id="vote_us">
				<h3>Rate Us</h3>
				<ul>
					<li><label>If you like it, Please vote and support us.</label></li>
				</ul>
			</div>
			<div class="sidebar_section">
				<h3>Having Issues?</h3>
				<ul>
					<li><label>You can create a ticket</label> <a target="_blank" href="http://wordpress.org/support/plugin/import-users-from-csv-with-meta"><label>WordPress support forum</label></a></li>
					<li><label>You can ask for premium support</label> <a target="_blank" href="mailto:contacto@codection.com"><label>contacto@codection.com</label></a></li>
				</ul>
			</div>
			<div class="sidebar_section">
				<h3>Donate</h3>
				<ul>
					<li><label>If you appreciate our work and you want to help us to continue developing it and giving the best support</label> <a target="_blank" href="https://paypal.me/imalrod"><label>donate</label></a></li>
				</ul>
			</div>
		</div>

	</div>
	<script type="text/javascript">
	function check(){
		if(document.getElementById("uploadfiles").value == "" && jQuery( "#upload_file" ).is(":visible") ) {
		   alert("<?php _e( 'Please choose a file', 'import-users-from-csv-with-meta' ); ?>");
		   return false;
		}

		if( jQuery( "#path_to_file" ).val() == "" && jQuery( "#introduce_path" ).is(":visible") ) {
		   alert("<?php _e( 'Please enter a path to the file', 'import-users-from-csv-with-meta' ); ?>");
		   return false;
		}

		if( jQuery("[name=role\\[\\]]input:checkbox:checked").length == 0 ){
			alert("<?php _e( 'Please select a role', 'import-users-from-csv-with-meta'); ?>");
		   	return false;	
		}
	}

	jQuery( document ).ready( function( $ ){
		$( ".delete_attachment" ).click( function(){
			var answer = confirm( "<?php _e( 'Are you sure to delete this file?', 'import-users-from-csv-with-meta' ); ?>" );
			if( answer ){
				var data = {
					'action': 'acui_delete_attachment',
					'attach_id': $( this ).attr( "attach_id" )
				};

				$.post(ajaxurl, data, function(response) {
					if( response != 1 )
						alert( "<?php _e( 'There were problems deleting the file, please check file permissions', 'import-users-from-csv-with-meta' ); ?>" );
					else{
						alert( "<?php _e( 'File successfully deleted', 'import-users-from-csv-with-meta' ); ?>" );
						document.location.reload();
					}
				});
			}
		});

		$( "#bulk_delete_attachment" ).click( function(){
			var answer = confirm( "<?php _e( 'Are you sure to delete ALL CSV files uploaded? There can be CSV files from other plugins.', 'import-users-from-csv-with-meta' ); ?>" );
			if( answer ){
				var data = {
					'action': 'acui_bulk_delete_attachment',
				};

				$.post(ajaxurl, data, function(response) {
					if( response != 1 )
						alert( "<?php _e( 'There were problems deleting the files, please check files permissions', 'import-users-from-csv-with-meta' ); ?>" );
					else{
						alert( "<?php _e( 'Files successfully deleted', 'import-users-from-csv-with-meta' ); ?>" );
						document.location.reload();
					}
				});
			}
		});

		$( ".toggle_upload_path" ).click( function( e ){
			e.preventDefault();

			$("#upload_file,#introduce_path").toggle();
		} );

		$("#vote_us").click(function(){
			var win=window.open("http://wordpress.org/support/view/plugin-reviews/import-users-from-csv-with-meta?free-counter?rate=5#postform", '_blank');
			win.focus();
		});

	} );
	</script>
	<?php 
	}
}