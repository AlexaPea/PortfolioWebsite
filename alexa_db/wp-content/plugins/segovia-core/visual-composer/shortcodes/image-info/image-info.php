<?php
/* ==========================================================
  Clients
=========================================================== */
if ( !function_exists('segovia_image_info_function')) {
  function segovia_image_info_function( $atts, $content = NULL ) {

    extract(shortcode_atts(array(
      'list_text' =>'',
      'banner_image' =>'',
      'text_link' =>'',
      'open_link' =>'',
      'class'  => '',
      'text_align' =>'',
      'border_radius' =>'',
      // Style     
      'overlay_color' => '',
      'btn_text_size' =>'',
      'btn_text_color' =>'',
      'btn_bg_color' =>'',
      'btn_text_hover_color' =>'',
      'btn_bg_hover_color' =>'',

    ), $atts));


    // Shortcode Style CSS
    $e_uniqid        = uniqid();
    $inline_style  = '';

    // Overlay
    if ( $overlay_color ) {
      $inline_style .= '.segovia-info-image-'. $e_uniqid .'.imagebox-item:before {';
      $inline_style .= ( $overlay_color ) ? 'background-color:'. $overlay_color .';' : '';
      $inline_style .= '}';
    }
    // Button Text 
    if ( $btn_text_color || $btn_text_size ) {
      $inline_style .= '.segovia-info-image-'. $e_uniqid .'.imagebox-item .segva-btn-wrap .segva-btn {';
      $inline_style .= ( $btn_text_color ) ? 'color:'. $btn_text_color .';' : '';
      $inline_style .= ( $btn_text_size ) ? 'font-size:'. segovia_core_check_px($btn_text_size) .';' : '';
      $inline_style .= '}';
    }
    // Bg Color
    if ( $btn_bg_color ) {
      $inline_style .= '.segovia-info-image-'. $e_uniqid .'.imagebox-item .segva-btn-wrap .segva-btn {';
      $inline_style .= ( $btn_bg_color ) ? 'background-color:'. $btn_bg_color .';' : '';
      $inline_style .= '}';
    }
    if ( $btn_text_hover_color || $btn_bg_hover_color) {
      $inline_style .= '.segovia-info-image-'. $e_uniqid .'.imagebox-item .segva-btn-wrap .segva-btn:hover {';
      $inline_style .= ( $btn_text_hover_color ) ? 'color:'. $btn_text_hover_color .';' : '';
      $inline_style .= ( $btn_bg_hover_color ) ? 'background-color:'. $btn_bg_hover_color .';' : '';
      $inline_style .= '}';
    }
     // Border Radius
    if (  $border_radius ) {
      $inline_style .= '.segovia-info-image-'. $e_uniqid .'.imagebox-item, .segovia-info-image-'. $e_uniqid .'.imagebox-item:before {';
      $inline_style .= ( $border_radius ) ? 'border-radius:'. segovia_core_check_px($border_radius) .';' : '';
      $inline_style .= '}';
    }

     
    // add inline style
    add_inline_style( $inline_style );
    $styled_class  = ' segovia-info-image-'. $e_uniqid;

    $text_align = $text_align ? $text_align : ' text-center';

    // Conditions
    $image_url = wp_get_attachment_url( $banner_image );
    $open_link = $open_link ? ' target="_blank"' : '';
    $button = $text_link ? '<div class="segva-btn-wrap"><a href="'.esc_url($text_link).'" '.$open_link.' class="segva-btn segva-light-blue-bdr-btn">'.$list_text.'</a></div>' : '';
 
    // Output
      $output = '<div class="imagebox-item '.$class.$styled_class.$text_align.'" style="background-image: url('.$image_url.')"> <div class="segva-table-wrap">
      <div class="segva-align-wrap"><span class="link-box-content">'.$button.'</span></div></div></div>'; 

    return $output;
  }
}
add_shortcode( 'segovia_image_info', 'segovia_image_info_function' ); 
