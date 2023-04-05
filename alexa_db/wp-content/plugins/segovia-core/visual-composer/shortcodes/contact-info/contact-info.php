<?php
/* ==========================================================
  Address
=========================================================== */
if ( !function_exists('segovia_contact_info_function')) {
  function segovia_contact_info_function( $atts, $content = true ) {

    extract(shortcode_atts(array(
  
      'list_items'  => '',
      'class'  => '',
      // Style
      'info_title_color' =>'',
      'info_title_size' =>'',
      'content_color' =>'',
      'content_size' =>'',
      'link_size' =>'',
      'link_color' =>'',
      'link_hover_color' =>'',
      // Spacing
      'need_border' =>'',
      'border_color' =>'',
     
      
    ), $atts));

    // Group Field One
    $list_items = (array) vc_param_group_parse_atts( $list_items );
    $get_each_list = array();
    foreach ( $list_items as $list_item ) {
      $each_list = $list_item;
      $each_list['list_title'] = isset( $list_item['list_title'] ) ? $list_item['list_title'] : '';
      $each_list['list_content'] = isset( $list_item['list_content'] ) ? $list_item['list_content'] : '';
      $each_list['list_text'] = isset( $list_item['list_text'] ) ? $list_item['list_text'] : '';
      $each_list['text_link'] = isset( $list_item['text_link'] ) ? $list_item['text_link'] : '';
      $each_list['open_link'] = isset( $list_item['open_link'] ) ? $list_item['open_link'] : '';
      $get_each_list[] = $each_list;
    }

    // Shortcode Style CSS
    $e_uniqid        = uniqid();
    $inline_style  = '';
    
    if ( $info_title_size || $info_title_color) {
      $inline_style .= '.segva-contact-info-'. $e_uniqid .'.contact-info-main-wrap .info-main-title {';
      $inline_style .= ( $info_title_color ) ? 'color:'. $info_title_color .';' : '';
      $inline_style .= ( $info_title_size ) ? 'font-size:'. segovia_core_check_px($info_title_size) .';' : '';
      $inline_style .= '}';
    }
    if ( $content_color || $content_size ) {
      $inline_style .= '.segva-contact-info-'. $e_uniqid .'.contact-info-main-wrap p {';
      $inline_style .= ( $content_color ) ? 'color:'. $content_color .';' : '';
      $inline_style .= ( $content_size ) ? 'font-size:'. segovia_core_check_px($content_size) .';' : '';
      $inline_style .= '}';
    }
    if ( $link_color || $link_size ) {
      $inline_style .= '.segva-contact-info-'. $e_uniqid .'.contact-info-main-wrap .info-info .info-title a {';
      $inline_style .= ( $link_color ) ? 'color:'. $link_color .';' : '';
      $inline_style .= ( $link_size ) ? 'font-size:'. segovia_core_check_px($link_size) .';' : '';
      $inline_style .= '}';
    }
    if ( $link_hover_color ) {
      $inline_style .= '.segva-contact-info-'. $e_uniqid .'.contact-info-main-wrap .info-info .info-title a:hover {';
      $inline_style .= ( $link_hover_color ) ? 'color:'. $link_hover_color .';' : '';
      $inline_style .= '}';
    }
     if ( $border_color ) {
      $inline_style .= '.segva-contact-info-'. $e_uniqid .'.contact-info-main-wrap .info-item.segva-border {';
      $inline_style .= ( $border_color ) ? 'border-color:'. $border_color .';' : '';
      $inline_style .= '}';
    }


    // add inline style
    add_inline_style( $inline_style );
    $styled_class  = ' segva-contact-info-'. $e_uniqid;

    if($need_border) {
      $border_class = ' segva-border';
    } else {
      $border_class = '';
    }


    $output = '<div class="contact-info-main-wrap '.$styled_class.' '.$class.'"> ';
                    foreach ( $get_each_list as $list_item ) {
                      $open_link = $list_item['open_link'] ? ' target="_blank"' : '';

                      $output .= '<div class="info-item '.$border_class.'">
                        <span class="info-main-title">'.$list_item['list_title'].'</span>
                        <div class="info-info"><p>'.$list_item['list_content'].'</p>
                          <h5 class="info-title">
                            <a href="'. $list_item['text_link'] .'"'.$open_link.'>'. $list_item['list_text'] .'</a>
                          </h5>
                        </div>
                      </div>';

                    }
      $output .= '
                </div>';

    return $output;
  }
}
add_shortcode( 'segovia_contact_info', 'segovia_contact_info_function' );


