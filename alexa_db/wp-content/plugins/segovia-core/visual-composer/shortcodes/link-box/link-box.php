<?php
/* ==========================================================
  Services
=========================================================== */
if ( !function_exists('link_box_function')) {
  function link_box_function( $atts, $content = true ) {

    extract(shortcode_atts(array(
    
      'service_bg_image'  => '',
      'link_icon' =>'',
      'title'  => '',
      'linkbox_content' =>'',
      'button_text'  => '',
      'button_link'  => '',
      'open_link'  => '',
      'class'  => '',
      // Style
      'background_overlay_color' => '',
      'title_color'  => '',
      'title_size'  => '',
      'title_weight' => '',
      'title_hover_color'  => '',
      'content_color'  => '',
      'content_size'  => '',
      'icon_color'  => '',
      'icon_size'  => '',
      // Button
      'btn_text_size'  => '',
      'btn_border_radius' => '',
      'btn_text_color'  => '',
      'btn_text_hover_color'  => '',
      'bg_color' => '',
      'btn_bg_color'  => '',
      'btn_bg_hover_color'  => '',
      'btn_border_color'  => '',
      'btn_border_hover_color'  => '',

    ), $atts));

    // fix unclosed/unwanted paragraph tags in $content
    $content = wpb_js_remove_wpautop($content, true);

    // Shortcode Style CSS
    $e_uniqid        = uniqid();
    $inline_style  = '';

    /* Overlay Color */
    if ( $background_overlay_color ) {
      $inline_style .= '.segva-link-box-'. $e_uniqid .'.linkbox-item:before {';
      $inline_style .= ( $background_overlay_color ) ? 'background:'. $background_overlay_color .';' : '';
      $inline_style .= '}';
    }
    if ( $title_size || $title_color ) {
      $inline_style .= '.segva-link-box-'. $e_uniqid .'.linkbox-item h3 {';
      $inline_style .= ( $title_color ) ? 'color:'. $title_color .';' : '';
      $inline_style .= ( $title_size ) ? 'font-size:'. segovia_core_check_px($title_size) .';' : '';
      $inline_style .= '}';
    }
    if ( $icon_color || $icon_size ) {
      $inline_style .= '.segva-link-box-'. $e_uniqid .'.linkbox-item .link-top-icon i {';
      $inline_style .= ( $icon_color ) ? 'color:'. $icon_color .';' : '';
      $inline_style .= ( $icon_size ) ? 'font-size:'. segovia_core_check_px($icon_size) .';' : '';
      $inline_style .= '}';
    }
    if ( $content_color || $content_size ) {
      $inline_style .= '.segva-link-box-'. $e_uniqid .'.linkbox-item p {';
      $inline_style .= ( $content_color ) ? 'color:'. $content_color .';' : '';
      $inline_style .= ( $content_size ) ? 'font-size:'. segovia_core_check_px($content_size) .';' : '';
      $inline_style .= '}';
    }
    // Btn Color
    if ( $btn_text_color || $btn_text_size || $btn_bg_color || $btn_border_color || $btn_border_radius ) {
      $inline_style .= '.segva-link-box-'. $e_uniqid .'.linkbox-item .segva-btn-wrap .segva-btn {';
      $inline_style .= ( $btn_text_color ) ? 'color:'. $btn_text_color .';' : '';
      $inline_style .= ( $btn_bg_color ) ? 'background:'. $btn_bg_color .';' : '';
      $inline_style .= ( $btn_border_color ) ? 'border-color:'. $btn_border_color .';' : '';
      $inline_style .= ( $btn_text_size ) ? 'font-size:'. segovia_core_check_px($btn_text_size) .';' : '';
      $inline_style .= ( $btn_border_radius ) ? 'border-radius:'. segovia_core_check_px($btn_border_radius) .';' : '';
      $inline_style .= '}';
    }
    // Btn Hover Color
    if ( $btn_text_hover_color || $btn_bg_hover_color || $btn_border_hover_color ) {
      $inline_style .= '.segva-link-box-'. $e_uniqid .'.linkbox-item .segva-btn-wrap .segva-btn:hover {';
      $inline_style .= ( $btn_text_hover_color ) ? 'color:'. $btn_text_hover_color .';' : '';
      $inline_style .= ( $btn_border_hover_color ) ? 'border-color:'. $btn_border_hover_color .';' : '';
      $inline_style .= ( $btn_bg_hover_color ) ? 'background:'. $btn_bg_hover_color .';' : '';
      $inline_style .= '}';
    }

    // add inline style
    add_inline_style( $inline_style );
    $styled_class  = ' segva-link-box-'. $e_uniqid;

    $button_text = $button_text ? '<span class="btn-text">'. $button_text .'</span>' : '';
    $content = $linkbox_content ? '<p>'.$linkbox_content.'</p>' : '';
    $title = $title ? '<h3 class="linkbox-title">'.$title.'</h3>' : '';
  
    $open_link = $open_link ? ' target="_blank"' : '';
      $link_icon = $link_icon  ? '<span class="link-top-icon"><i class="'.$link_icon .'" aria-hidden="true"></i></span>' : '';

    $button = $button_link ? '<div class="segva-btn-wrap"><a href="'.esc_url($button_link).'" '.$open_link.'  class="segva-btn segva-light-blue-bdr-btn">'.$button_text.'</a></div>' : '<div class="segva-btn-wrap"><span class="segva-btn segva-light-blue-bdr-btn">'.$button_text.'</span></div>';
   
    $bg_image_url = wp_get_attachment_url( $service_bg_image );
  
    // Service Image
  
    $output = '<div class="linkbox-item text-center '.$styled_class.'" style="background-image: url('.$bg_image_url.')"><span class="link-box-content">'.$link_icon.$title.$content.'</span>'.$button.'</div>';
 
    return $output;
  }
}
add_shortcode( 'link_box', 'link_box_function' );
