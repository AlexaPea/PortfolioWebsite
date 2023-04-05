<?php
/* ==========================================================
  Clients
=========================================================== */
if ( !function_exists('segovia_socials_function')) {
  function segovia_socials_function( $atts, $content = NULL ) {

    extract(shortcode_atts(array(

      'social_title'  => '',
      'logo_items'  => '',
      'rounded_social' =>'',
      'class'  => '',
      'text_align' =>'',

      // Style
      'social_title_color'  => '',
      'social_title_size'  => '',
      'social_icon_color' =>'',
      'social_icon_size' =>'',

      'social_icon_border_color' =>'',
      'social_icon_hover_color' =>'',
      'social_icon_border_hover_color' =>'',
    ), $atts));

    // Group Field
    $logo_items = (array) vc_param_group_parse_atts( $logo_items );
    $get_each_list = array();
    foreach ( $logo_items as $logo_item ) {
      $each_list = $logo_item;
      $each_list['client_logo'] = isset( $logo_item['client_logo'] ) ? $logo_item['client_logo'] : '';
      $each_list['logo_link'] = isset( $logo_item['logo_link'] ) ? $logo_item['logo_link'] : '';
      $get_each_list[] = $each_list;
    }

    // Shortcode Style CSS
    $e_uniqid        = uniqid();
    $inline_style  = '';

    // Text
    if ( $social_title_size || $social_title_color ) {
      $inline_style .= '.social-section-'. $e_uniqid .'.social-section h4.social-title {';
      $inline_style .= ( $social_title_size ) ? 'font-size:'. segovia_core_check_px($social_title_size) .';' : '';
      $inline_style .= ( $social_title_color ) ? 'color:'. $social_title_color .';' : '';
      $inline_style .= '}';
    }

    // Icon
    if ( $social_icon_size || $social_icon_color || $social_icon_border_color ) {
      $inline_style .= '.social-section-'. $e_uniqid .'.social-section a {';
      $inline_style .= ( $social_icon_size ) ? 'font-size:'. segovia_core_check_px($social_icon_size) .';' : '';
      $inline_style .= ( $social_icon_color ) ? 'color:'. $social_icon_color .';' : '';
      $inline_style .= ( $social_icon_border_color ) ? 'border-color:'. $social_icon_border_color .';' : '';
      $inline_style .= '}';
    }

    if ( $social_icon_hover_color || $social_icon_border_hover_color ) {
      $inline_style .= '.social-section-'. $e_uniqid .'.social-section a:hover {';
      $inline_style .= ( $social_icon_hover_color ) ? 'color:'. $social_icon_hover_color .';' : '';
       $inline_style .= ( $social_icon_border_hover_color ) ? 'border-color:'. $social_icon_border_hover_color .';' : '';
      $inline_style .= '}';
    }

    // add inline style
    add_inline_style( $inline_style );
    $styled_class  = ' social-section-'. $e_uniqid;

    if($rounded_social) {
      $round_class = ' rounded';
    } else {
       $round_class = '';
    }

    $text_align = $text_align ? $text_align : 'text-center';

    $output ='<div class="social-section '. $class.' '. $text_align.' '.$styled_class.'">
    <h4 class="social-title">'.$social_title.'</h4> <div class="segva-social '.$round_class.'">  ';

    // Group Param Output
      foreach ( $get_each_list as $each_list ) {

        $output .= $each_list['logo_link'] ? '<a href="'.$each_list['logo_link'].'" target="_blank"><i class="'. $each_list['client_logo'] .'"></i></a>' : '<span><i class="'. $each_list['client_logo'] .'"></i></span>';
      }

    $output .= '  </div></div>';

    return $output;
  }
}
add_shortcode( 'segovia_socials', 'segovia_socials_function' ); 
