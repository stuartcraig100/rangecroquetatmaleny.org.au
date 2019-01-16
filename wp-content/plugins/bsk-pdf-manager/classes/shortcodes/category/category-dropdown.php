<?php

class BSKPDFM_Shortcodes_Category_Dropdown {

	public function __construct() {
        add_shortcode( 'bsk-pdfm-category-dropdown', array($this, 'bsk_pdf_manager_list_pdfs_by_cat_as_dropdown') );
	}
    
    function bsk_pdf_manager_list_pdfs_by_cat_as_dropdown( $atts, $content ){		
        $all_shortcode_atts = array( 
                                                'option_none' => 'Select to open...',
                                                'option_group_label' => 'CAT_TITLE', 
                                              );
        $all_shortcode_atts = array_merge( 
                                                           $all_shortcode_atts,
                                                           BSKPDFM_Shortcodes_Category_Functions::$_shortcode_category_atts,
                                                           BSKPDFM_Shortcodes_Category_Functions::$_shortcode_pdfs_atts,
                                                           BSKPDFM_Shortcodes_Category_Functions::$_shortcode_output_container_atts
                                                         );
        $all_shortcode_atts['target'] = '_blank';
		$shortcode_atts = shortcode_atts( $all_shortcode_atts, $atts );
        $shortcode_atts_processed = BSKPDFM_Shortcodes_Category_Functions::process_shortcode_parameters( $shortcode_atts );

        $ids_array = false;
		$categories_loop_array = false;
        $only_single_category = false;
        $return = BSKPDFM_Common_Data_Source::bsk_pdfm_organise_categories_id_sequence( 
                                                                                                $shortcode_atts_processed['id'], 
                                                                                                $shortcode_atts_processed['cat_order_by'], 
                                                                                                $shortcode_atts_processed['cat_order'] );
        if( $return ){
            $ids_array = $return['ids_array'];
            $categories_loop_array = $return['categories_loop'];
        }
        if( $ids_array == false || !is_array( $ids_array ) || count( $ids_array ) < 1 ){
            $str = '<div class="bsk-pdfm-output-container'.' '.$shortcode_atts_processed['output_container_class'].'">'.
                            '<p>No valid category id found</p>'.
                     '</div>';
            return $str;
        }
        
        $only_single_category = count( $ids_array ) == 1 ? true : false;
        $single_category_output = '';
        $multi_categories_output = '';
        
        if( $only_single_category ){
            /* 
                the difference between multiple categoryes & single cateogry: 
                1. searchbar is below category titile, category description
                2. weekday filter is below category titile, category description
                3. single category support show category empty messaage & hide empty category
                3. 
            */
            $category_obj = array_shift( $categories_loop_array );
            $category_output_return = $this->display_pdfs_in_dropdown_for_single_category( 
                                                                                        $shortcode_atts_processed,
                                                                                        $category_obj
                                                                                    );
            $single_category_output = $category_output_return['container_begin'];
            $single_category_output .= $category_output_return['cat_title'];
            
            $target_str = trim($shortcode_atts_processed['target']) == '_blank' ? ' data-target="_blank"' : '';
            $dropdown_str = '<select class="bsk-pdfm-pdfs-dropdown"'.$target_str.'>';
            if( $shortcode_atts_processed['option_none'] ){
                $dropdown_str .= '<option value="">'.$shortcode_atts_processed['option_none'].'</option>';
            }
            $dropdown_str .= $category_output_return['pdfs'];
            $dropdown_str .= '</select>';

            $single_category_output .= $dropdown_str;
            $single_category_output .= $category_output_return['container_end'];
        }else{
            $category_output_return = $this->display_pdfs_in_dropdown_multi_categories( 
                                                                                        $shortcode_atts_processed,
                                                                                        $ids_array,
                                                                                        $categories_loop_array
                                                                                    );
            $target_str = trim($shortcode_atts_processed['target']) == '_blank' ? ' data-target="_blank"' : '';
            $dropdown_str = '<select class="bsk-pdfm-pdfs-dropdown"'.$target_str.'>';
            if( $shortcode_atts_processed['option_none'] ){
                $dropdown_str .= '<option value="">'.$shortcode_atts_processed['option_none'].'</option>';
            }
            $dropdown_str .= $category_output_return['pdfs'];
            $dropdown_str .= '</select>';
            
            $multi_categories_output .= $dropdown_str;
        }
        
        $only_single_category_class = $only_single_category ? ' bsk-pdfm-category-single' : '';
        $output_container_class = $shortcode_atts_processed['output_container_class'] ? ' '.$shortcode_atts_processed['output_container_class'] : '';
        $output_container_start = '<div class="bsk-pdfm-output-container shortcode-category layout-dropdown'.$only_single_category_class.$output_container_class.'">';
        $output_container_end = '</div><!-- //bsk-pdfm-output-container -->';
        
        //credit
        $credit_str = BSKPDFM_Common_Display::get_plugin_credit_text();

        $output_str =  ''.
                            $output_container_start.
                            $single_category_output.
                            $multi_categories_output.
                            $credit_str.
                            $output_container_end;
        
		return $output_str;
        
	} //end of function
    
    function display_pdfs_in_dropdown_for_single_category( 
                                                                                $processed_shortcodes_atts,
                                                                                $category_obj
                                                                           ){
        /**
          * Query PDFs for category
        */
        $query_args = array();
        $query_args['order_by'] = $processed_shortcodes_atts['order_by'];
        $query_args['order'] = $processed_shortcodes_atts['order'];
        $query_args['most_top'] = $processed_shortcodes_atts['most_top'];
        $query_args['ids_array'] = array( $category_obj->id );
        
        $cat_pdfs_query_results = BSKPDFM_Common_Data_Source::bsk_pdfm_get_pdfs_by_cat( $query_args );
        $category_depth = 1;
        $category_output_array = $this->get_category_output( 
                                                                                        $processed_shortcodes_atts,
                                                                                        $category_obj,
                                                                                        $cat_pdfs_query_results,
                                                                                        false, //for single category it need not option group
                                                                                        $category_depth //category_depth
                                                                                    );

        $return_category = array();
        $return_category['container_begin'] = $category_output_array['container_begin'];
        $return_category['container_end'] = $category_output_array['container_end'];
        $return_category['cat_title'] = $category_output_array['cat_title'];
        $return_category['pdfs'] = $category_output_array['pdfs'];
            
        return $return_category;
    }
    
    function display_pdfs_in_dropdown_multi_categories( 
                                                                 $processed_shortcodes_atts,
                                                                 $ids_array,
                                                                 $categories_to_loop
                                                              ){
        if( !$ids_array || !is_array( $ids_array ) || count( $ids_array ) < 1 || 
            !$categories_to_loop || !is_array( $categories_to_loop ) || count( $categories_to_loop ) < 1 ){
            return array( 'category_output' => '', 'results_desc' => 'No records found' );
        }
        
        /**
          * Query PDFs for category
        */
        $query_args = array();
        $query_args['order_by'] = $processed_shortcodes_atts['order_by'];
        $query_args['order'] = $processed_shortcodes_atts['order'];
        $query_args['most_top'] = $processed_shortcodes_atts['most_top'];
        $query_args['ids_array'] = $ids_array;
        
        $cat_pdfs_query_results = BSKPDFM_Common_Data_Source::bsk_pdfm_get_pdfs_by_cat( $query_args );
        if( !$cat_pdfs_query_results || !is_array( $cat_pdfs_query_results ) || count( $cat_pdfs_query_results ) < 1 ){
            return array( 'category_output' => '', 'results_desc' => 'No records found' );
        }
        $pdfs_results_array_by_category = $cat_pdfs_query_results['pdfs'];
        $categories_for_pdfs_results = $cat_pdfs_query_results['categories_for_pdfs'];

        //display PDFs
        global $wpdb;
        $all_category_pdfs_output = '';
        $all_category_password_form_output = '';
        $categories_ask_for_password = array();
        foreach( $categories_to_loop as $category_obj ){
            $current_category_depth = 1;
            if(  isset( $pdfs_results_array_by_category[$category_obj->id] ) && 
                 is_array( $pdfs_results_array_by_category[$category_obj->id] ) &&
                 count( $pdfs_results_array_by_category[$category_obj->id] ) > 0 ){
                $category_output_array = $this->get_category_output( 
                                                                                            $processed_shortcodes_atts,
                                                                                            $category_obj,
                                                                                            $cat_pdfs_query_results,
                                                                                            false, // for multile category it need not $date_weekday_filter here
                                                                                            $current_category_depth
                                                                                        );
                 $all_category_pdfs_output .= $category_output_array['pdfs'];
            }
        }//end foreach

        return array( 
                            'pdfs' => $all_category_pdfs_output,
                         );
    }
    
    function get_category_output( 
                                                    $processed_shortcodes_atts,
                                                    $category_obj,
                                                    $category_pdfs_query_result,
                                                    $category_depth
                                             ){
        $return_array = array( 
                                        'container_begin' => '',
                                        'container_end' => '',
                                        'cat_title' => '', 
                                        'pdfs' => '', 
                                      );
        
        if( !$category_obj ){
            return $return_array;
        }
        
        $depth_class = ' category-hierarchical-depth-'.$category_depth;
        $categor_output_container_begin = '<div class="bsk-pdfm-category-output cat-'.$category_obj->id.$depth_class.' pdfs-in-dropdown" data-cat-id="'.$category_obj->id.'">';
        $categor_output_container_end = '<!--//bsk-pdfm-category-output cat-'.$category_obj->id.'-->';
        $categor_output_container_end .= '</div>';
        
        $caegory_title_tag = 'h'.($category_depth + 1);
        $pdf_title_tag = 'h'.($category_depth + 2);
        
        $cat_title = '';
        if( $processed_shortcodes_atts['show_cat_title'] ){
            $cat_title = '<'.$caegory_title_tag.' class="bsk-pdfm-cat-titile">'.$category_obj->title.'</'.$caegory_title_tag.'>';
        }
        
        $return_array['container_begin'] = $categor_output_container_begin;
        $return_array['container_end'] = $categor_output_container_end;
        $return_array['cat_title'] = $cat_title;
        
        if( !$category_pdfs_query_result || !is_array( $category_pdfs_query_result ) || count( $category_pdfs_query_result ) < 1 ){
            return $return_array;
        }
        $pdfs_results_array_by_category = $category_pdfs_query_result['pdfs'];
        $categories_for_pdfs_results = $category_pdfs_query_result['categories_for_pdfs'];

        //display PDFs
        $pdfs_options_str = BSKPDFM_Common_Display::show_pdfs_dropdown_option_for_category(
                                                                                                                 $pdfs_results_array_by_category[$category_obj->id],
                                                                                                                 $category_obj,
                                                                                                                 $processed_shortcodes_atts['show_date'], 
                                                                                                                 $processed_shortcodes_atts['date_format'],
                                                                                                                 $processed_shortcodes_atts['date_before_title'],
                                                                                                                 $category_depth
                                                                                                                );
        $return_array['pdfs'] = $pdfs_options_str;
        
        return $return_array;
    }
}