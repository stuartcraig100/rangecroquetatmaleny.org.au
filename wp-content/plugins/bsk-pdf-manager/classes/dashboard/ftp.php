<?php

class BSKPDFM_Dashboard_FTP {

	public function __construct() {
		global $wpdb;
	}
	
	function bsk_pdf_manager_pdfs_add_by_ftp(){
		global $current_user, $wpdb;
		
		//get all categories
		$sql = 'SELECT COUNT(*) FROM '.$wpdb->prefix.BSKPDFManager::$_cats_tbl_name;
		if( $wpdb->get_var( $sql ) < 1 ){
			$create_category_url = add_query_arg( 'page', BSKPDFM_Dashboard::$_bsk_pdfm_pro_pages['category'], admin_url() );
			$create_category_url = add_query_arg( 'view', 'addnew', $create_category_url );
			echo 'Please <a href="'.$create_category_url.'">create category</a> first';
			
			return;
		}
						
		$maximum_of_list = 50;
		$pdf_files_under_ftp_folder = array();
		$ftp_folder  = opendir( BSKPDFManager::$_upload_path.BSKPDFManager::$_upload_folder_4_ftp );
		$item_filename = 0;
		while (false !== ($filename = readdir($ftp_folder))) {
			if( $filename == '.' ||
			    $filename == '..' ||
				$filename == 'index.php' ){
				
				continue;
			}
			$ext_n_type = wp_check_filetype( $filename );
            $supported_extension_and_mime_type = BSKPDFM_Common_Backend::get_supported_extension_with_mime_type();
            if( !array_key_exists( strtolower($ext_n_type['ext']), $supported_extension_and_mime_type) ){
                continue;
            }
            if( !in_array( $ext_n_type['type'], $supported_extension_and_mime_type[strtolower($ext_n_type['ext'])] ) ){
                continue;
            }
            
			$item_filename++;
            $timestamp_of_last_modify = filemtime( BSKPDFManager::$_upload_path.BSKPDFManager::$_upload_folder_4_ftp.$filename );
            $file_unique_id = uniqid();
			$pdf_files_under_ftp_folder[$file_unique_id] = array( 
                                                    'name' => $filename, 
                                                    'title' => str_replace( '.'.$ext_n_type['ext'], '', $filename ),
                                                    'ext' => $ext_n_type['ext'],
                                                    'datetime' => date( 'Y-m-d H:i:s', $timestamp_of_last_modify ),
                                                 );
			if( $maximum_of_list <= $item_filename ){
				break;
			}
		}
        
        $plugin_settings = get_option( BSKPDFManager::$_plugin_settings_option, '' );
        $supported_extension = false;
        if( isset($plugin_settings['supported_extension']) ){
            $supported_extension = $plugin_settings['supported_extension'];
        }
        if( !$supported_extension || !is_array($supported_extension) || !in_array( 'pdf', $supported_extension ) ){
            $supported_extension = array( 'pdf' );
        }
        
		$upload_folder_4_ftp_display = str_replace( ABSPATH, '', BSKPDFManager::$_upload_path.BSKPDFManager::$_upload_folder_4_ftp );
		echo '  <p style="margin-top:30px;">Please uplaod all you PDF files to the folder <b>'.$upload_folder_4_ftp_display.'</b> first.</p>';
		echo '  <p>After upload, your PDF will be moved out from this folder.<p>';
		echo '  <p>To avoid time out error on your server the maximum of PDF fiels that can be listed here is '.$maximum_of_list.'. It means you may import max 50 PDFs every time but you may come to here any time.</p>';
		?>
        <h3>Settings</h3>
        <p style="font-weight: bold;">Exclude extension( <?php echo implode(', ', $supported_extension ); ?> ) from title:</p>
        <p>
            <span class="bsk-pdf-field">
                <label>
                    <input type="radio" name="bsk_pdfm_ftp_exclude_extension_raido" class="bsk-pdfm-ftp-exclude-extension-raido" value="YES" checked="checked" /> Yes
                </label>
                <label style="margin-left:20px;">
                    <input type="radio" name="bsk_pdfm_ftp_exclude_extension_raido" class="bsk-pdfm-ftp-exclude-extension-raido" value="NO" /> No
                </label>
            </span>
        </p>
        <p style="font-weight: bold;">Set document's date&amp;time with:</p>
        <p>
            <span class="bsk-pdf-field">
                <label>
                    <input type="radio" name="bsk_pdfm_ftp_date_way_raido" class="bsk-pdfm-ftp-date-way-raido" value="Last_Modify" checked="checked" /> Document's last modify date&amp;time
                </label>
                <label style="margin-left:20px;">
                    <input type="radio" name="bsk_pdfm_ftp_date_way_raido" class="bsk-pdfm-ftp-date-way-raido" value="Current" /> Current server date&amp;time
                </label>
            </span>
        </p>
        <table class="widefat bsk-pdfm-ftp-files-list-table" style="width:95%;">
            <thead>
                <tr>
                    <td class="check-column" style="width:5%; padding-left:10px;"><input type='checkbox' /></td>
                    <td style="width:30%;">File</td>
                    <td style="width:35%;">Title</td>
                    <td style="width:30%;">Date&amp;Time</td>
                </tr>
            </thead>
            <tbody>
                <?php
                if( count($pdf_files_under_ftp_folder) < 1 ){
                ?>
                <tr class="alternate">
                    <td colspan="4">No valid PDF files found</td>
                </tr>
                <?php
                }else{
                    $i = 1;
                    foreach( $pdf_files_under_ftp_folder as $file_unique_id => $file_obj ){
                        $class_str = '';
                        if( $i % 2 == 1 ){
                            $class_str = ' class="alternate"';
                        }
                ?>
                    <tr<?php echo $class_str; ?>>
                        <td class="check-column" style="padding-left:18px;">
                            <input type='checkbox' name='bsk_pdf_manager_ftp_files[<?php echo $file_unique_id; ?>]' value="<?php echo $file_obj['name']; ?>" class="bsk-pdf-manager-ftp-files-chk" style="padding:0; margin:0;" />
                        </td>
                        <td class="bsk-pdfm-ftp-filename"><?php echo $file_obj['name']; ?></td>
                        <?php
                        $title = $file_obj['title'];
                        ?>
                        <td>
                            <input type="text" name="bsk_pdf_manager_ftp_titles[<?php echo $file_unique_id; ?>]" value="<?php echo $title; ?>" maxlength="512" style="width: 350px;" class="bsk-pdf-manager-ftp-title-input" />
                            <input type="hidden" class="bsk-pdf-manager-ftp-extension-val" value="<?php echo $file_obj['ext']; ?>" />
                        </td>
                        <?php
                        $date = substr( $file_obj['datetime'], 0, 10 );
                        $time_h = substr( $file_obj['datetime'], 11, 2 );
                        $time_m = substr( $file_obj['datetime'], 14, 2 );
                        $time_s = substr( $file_obj['datetime'], 17, 2 );
                        ?>
                        <td>
                            <input type="text" name="bsk_pdf_manager_ftp_dates[<?php echo $file_unique_id; ?>]" value="<?php echo $date; ?>" class="bsk-pdfm-date-time-date bsk-date" />
                            <span>@</span>
                            <input type="number" name="bsk_pdf_manager_ftp_dates_hour[<?php echo $file_unique_id; ?>]" class="bsk-pdfm-date-time-hour" value="<?php echo $time_h; ?>" min="0" max="24" step="1" />
                            <span>:</span>
                            <input type="number" name="bsk_pdf_manager_ftp_dates_minute[<?php echo $file_unique_id; ?>]" class="bsk-pdfm-date-time-minute" value="<?php echo $time_m; ?>" min="0" max="60" step="1"  />
                            <span>:</span>
                            <input type="number" name="bsk_pdf_manager_ftp_dates_second[<?php echo $file_unique_id; ?>]" class="bsk-pdfm-date-time-second" value="<?php echo $time_s; ?>" min="0" max="60" step="1"  />
                            <input type="hidden" class="bsk-pdf-manager-ftp-last-modify-datetime" value="<?php echo $file_obj['datetime']; ?>" />
                        </td>
                    </tr>
                <?php
                        $i++;
                    }
                }
                ?>
            </tbody>
            <tfoot>
                <tr>
                    <td class="check-column" style="padding-left:10px;"><input type='checkbox' /></td>
                    <td>File</td>
                    <td>Title</td>
                    <td>Date&amp;Time</td>
                </tr>
            </tfoot>
            <input type="hidden" class="bsk-pdf-manager-ftp-current-server-date-time" value="<?php echo date('Y-m-d H:i:s', current_time('timestamp') ) ?>" />
		</table>
		<?php
		if( count($pdf_files_under_ftp_folder) > 0 ){
		?>
        <h3>Category</h3>
		<?php
        echo BSKPDFM_Common_Backend::get_category_hierarchy_checkbox( 'bsk_pdf_manager_ftp_categories[]', 'bsk-pdfm-ftp-category-checkbox', NULL );
		$nonce = wp_create_nonce( 'bsk_pdf_manager_pdf_upload_by_ftp_nonce' );
        ?>
		<p style="margin-top:20px;">
        	<input type="hidden" name="nonce" value="<?php echo $nonce; ?>" />
        	<input type="hidden" name="bsk_pdf_manager_action" value="pdf_upload_by_ftp" />
        	<input type="button" id="bsk_pdf_manager_add_by_ftp_save_button_ID" class="button-primary" value="Upload..."  disabled />
        </p>
        <?php
		}
	}//end of function
}