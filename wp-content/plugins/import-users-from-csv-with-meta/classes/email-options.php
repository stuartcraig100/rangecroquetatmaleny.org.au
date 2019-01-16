<?php

if ( ! defined( 'ABSPATH' ) ) exit; 

class ACUI_Email_Options{
	public static function admin_gui(){
		$from_email = get_option( "acui_mail_from" );
		$from_name = get_option( "acui_mail_from_name" );
		$body_mail = get_option( "acui_mail_body" );
		$subject_mail = get_option( "acui_mail_subject" );
		$template_id = get_option( "acui_mail_template_id" );
		$attachment_id = get_option( "acui_mail_attachment_id" );
		$enable_email_templates = get_option( "acui_enable_email_templates" );
		$automattic_wordpress_email = get_option( "acui_automattic_wordpress_email" );
	?>
		<form method="POST" enctype="multipart/form-data" action="" accept-charset="utf-8">
		<h3><?php _e('Mail options','import-users-from-csv-with-meta'); ?></h3>

		<p class="description"><?php _e( 'You can set your own SMTP and other mail details', 'import-users-from-csv-with-meta' ); ?> <a href="<?php echo admin_url( 'tools.php?page=acui-smtp' ); ?>" target="_blank"><?php _e( 'here', 'import-users-from-csv-with-meta' ); ?></a>.
		
		<table class="optiontable form-table">
			<tbody>
				<tr valign="top">
					<th scope="row"><?php _e( 'WordPress automatic emails users updated', 'import-users-from-csv-with-meta' ); ?></th>
					<td>
						<fieldset>
							<legend class="screen-reader-text">
								<span><?php _e( 'Send automattic WordPress emails?', 'import-users-from-csv-with-meta' ); ?></span>
							</legend>
							<label for="automattic_wordpress_email">
								<select name="automattic_wordpress_email" id="automattic_wordpress_email">
									<option <?php if( $automattic_wordpress_email == 'false' ) echo "selected='selected'"; ?> value="false"><?php _e( "Deactivate WordPress automattic email when an user is updated or his password is changed", 'import-users-from-csv-with-meta' ) ;?></option>
									<option <?php if( $automattic_wordpress_email == 'true' ) echo "selected='selected'"; ?> value="true"><?php _e( 'Activate WordPress automattic email when an user is updated or his password is changed', 'import-users-from-csv-with-meta' ); ?></option>
								</select>
								<span class="description"><? _e( "When you update an user or change his password, WordPress prepare and send automattic email, you can deactivate it here.", 'import-users-from-csv-with-meta' ); ?></span>
							</label>
						</fieldset>
					</td>
				</tr>
				<tr valign="top">
					<th scope="row"><?php _e( 'Enable mail templates:', 'import-users-from-csv-with-meta' ); ?></th>
					<td>
						<fieldset>
							<legend class="screen-reader-text">
								<span><?php _e( 'Do you want to enable mail templates?', 'import-users-from-csv-with-meta' ); ?></span>
							</legend>
							<label for="enable_email_templates">
								<input id="enable_email_templates" name="enable_email_templates" value="yes" type="checkbox" <?php checked( $enable_email_templates ); ?>>
								<span class="description"><? _e( "If you activate it, a new option in the menu will be created to store and manage mail templates, instead of using only the next one.", 'import-users-from-csv-with-meta' ); ?></span>
							</label>
						</fieldset>
					</td>
				</tr>
			</tbody>
		</table>

		<?php if( $enable_email_templates && wp_count_posts( 'acui_email_template' )->publish > 0 ): ?>
			<h3><?php _e( 'Load custom email from email templates', 'import-users-from-csv-with-meta' ); ?></h3>
			<?php wp_dropdown_pages( array( 'id' => 'email_template_selected', 'post_type' => 'acui_email_template', 'selected' => $template_id ) ); ?>
			<input id="load_email_template" class="button-primary" type="button" value="<?php _e( "Load subject and content from this email template", 'import-users-from-csv-with-meta' ); ?>"/>
		<?php endif; ?>			

		<h3><?php _e( 'Customize the email that can be sent when importing users', 'import-users-from-csv-with-meta' ); ?></h3>

		<p><?php _e( 'Mail subject :', 'import-users-from-csv-with-meta' ); ?><input name="subject_mail" size="100" value="<?php echo $subject_mail; ?>" id="title" autocomplete="off" type="text"></p>
		<?php wp_editor( $body_mail, 'body_mail'); ?>
		<input type="hidden" id="template_id" name="template_id" value="<?php echo $template_id; ?>"/>

		<fieldset>
			<div>
				<label for="email_template_attachment_file"><?php _e( 'Attachment', 'import-users-from-csv-with-meta' )?></label><br>
				<input type="url" class="large-text" name="email_template_attachment_file" id="email_template_attachment_file" value="<?php echo wp_get_attachment_url( $attachment_id ); ?>" readonly/><br>
				<input type="hidden" name="email_template_attachment_id" id="email_template_attachment_id" value="<?php echo $attachment_id ?>"/>
				<button type="button" class="button" id="acui_email_template_upload_button"><?php _e( 'Upload file', 'import-users-from-csv-with-meta' )?></button>
			</div>
		</fieldset>

		<br/>
		<input class="button-primary" type="submit" value="<?php _e( 'Save email template and options', 'import-users-from-csv-with-meta'); ?>" id="save_mail_template_options"/>
		
		<?php ACUI_Email_Template::email_templates_edit_form_after_editor(); ?>

		</form>

		<script type="text/javascript">
		jQuery( document ).ready( function( $ ){
			$( '#enable_email_templates' ).change( function(){
				var enable = $( this ).is( ':checked' );
				var data = {
					'action': 'acui_refresh_enable_email_templates',
					'enable': enable,
					'security': '<?php echo wp_create_nonce( "codection-security" ); ?>',
				};

				$.post( ajaxurl, data, function( response ) {
					location.reload();
				});
			} );

			$( '#load_email_template' ).click( function(){
				if( $( '#email_template_selected' ).val() == '' )
					return;

				var data = {
					'action': 'acui_email_template_selected',
					'email_template_selected': $( '#email_template_selected' ).val(),
					'security': '<?php echo wp_create_nonce( "codection-security" ); ?>',
				};

				$.post( ajaxurl, data, function( response ) {
					console.log( response );
					var response = JSON.parse( response );
					$( '#title' ).val( response.title );
					tinyMCE.get( 'body_mail' ).setContent( response.content );
					$( '#template_id' ).val( response.id );
					$( '#save_mail_template_options' ).click();
				});
			} );
		} );	
		</script>
		<?php
	}
}