<?php
/* ==========================================================
  Services
=========================================================== */
if ( !function_exists('segovia_process_function')) {
  function segovia_process_function( $atts, $content = true ) {

    extract(shortcode_atts(array(
      'process_image'  => '',
      'process_link'  => '',
      'process_title'  => '',
      'process_border' =>'',

      
      'open_link'  => '',
      'class'  => '',

      // Style
      'process_title_size'  => '',
      'process_title_color'  => '',
      'process_title_hover_color'  => '',
      'image_overlay_color' =>'',
      'image_bg_color' =>'',

    ), $atts));

    // fix unclosed/unwanted paragraph tags in $content
    $content = wpb_js_remove_wpautop($content, true);
  
    // Shortcode Style CSS
    $e_uniqid        = uniqid();
    $inline_style  = '';


  // Title Size & Color
    if ( $process_title_size || $process_title_color ) {
      $inline_style .= '.process-item.segovia-process-service-'. $e_uniqid .' .process-title {';
      $inline_style .= ( $process_title_size ) ? 'font-size:'. segovia_core_check_px($process_title_size) .';' : '';
      $inline_style .= ( $process_title_color  ) ? 'color:'. $process_title_color .';' : '';
      $inline_style .= '}';
    }

    // Title Hover Color
    if ( $process_title_hover_color ) {
      $inline_style .= '.process-item.segovia-process-service-'. $e_uniqid .':hover .process-title {';
      $inline_style .= ( $process_title_hover_color  ) ? 'color:'. $process_title_hover_color .';' : '';
      $inline_style .= '}';
    }

    // Image Overlay Color
    if ($image_bg_color ) {
      $inline_style .= '.process-item.segovia-process-service-'. $e_uniqid .' .process-info {';
      $inline_style .= ( $image_bg_color  ) ? 'background:'. $image_bg_color .';' : '';
      $inline_style .= '}';
    }

    // Image Hover Overlay Color
    if ($image_overlay_color ) {
      $inline_style .= '.process-item.segovia-process-service-'. $e_uniqid .'.segva-hover .process-info {';
      $inline_style .= ( $image_overlay_color  ) ? 'background:'. $image_overlay_color .';' : '';
      $inline_style .= '}';
    }

    // add inline style
    add_inline_style( $inline_style );
    $styled_class  = ' segovia-process-service-'. $e_uniqid;


    // Link Target
    $open_link = $open_link ? 'target="_blank"' : '';

    $process_border = $process_border ? 'border-class' : '';


    // Service Image
    $image_url = wp_get_attachment_url( $process_image );

    $output = '';

      $output .= '<div class="segva-item process-item '.$process_border.''. $class .$styled_class.'">
                  <div class="segva-image"><img src="'.$image_url.'" alt="'.$process_title.'"></div>
                  <a href="'.$process_link.'" '. $open_link.' class="process-info">
                    <span class="segva-table-wrap">
                      <span class="segva-align-wrap"><span class="process-title">'.$process_title.'</span></span>
                    </span>
                  </a>
                </div>';
    

    return $output;
  }
}
add_shortcode( 'segva_process', 'segovia_process_function' );
