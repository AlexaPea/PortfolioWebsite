<?php
/* ==========================================================
  Services
=========================================================== */
if ( !function_exists('segovia_service_toggle_function')) {
  function segovia_service_toggle_function( $atts, $content = true ) {

    extract(shortcode_atts(array(
      'service_toggle_title' =>'',
      'service_toggle_image'  => '',
      'service_toggle_content' =>'',
      
      'read_more_title'  => '',
      'read_more_link'  => '',
      'toggle_align' =>'',
      'open_link'  => '',
      'class'  => '',

      // Style
      'title_color'  => '',
      'title_size'  => '',
      'content_color' =>'',
      'content_size' =>'',
      'learnmore_color' =>'',
      'learnmore_size' =>'',
      'learnmore_border_color'=>'',
      'learnmore_hover_color' =>'',

    ), $atts));


    $e_uniqid        = uniqid();
    $inline_style  = '';


    // Title Size & Color
    if ( $title_size || $title_color ) {
      $inline_style .= '.segovia-service-toggle-'. $e_uniqid .'-'.sanitize_title($service_toggle_title).'.identify-item h2.identify-title {';
      $inline_style .= ( $title_size ) ? 'font-size:'. segovia_core_check_px($title_size) .';' : '';
      $inline_style .= ( $title_color  ) ? 'color:'. $title_color .';' : '';
      $inline_style .= '}';
    }
    // Conetent Size & Color
    if ( $content_size || $content_color ) {
      $inline_style .= '.segovia-service-toggle-'. $e_uniqid .'.identify-item p {';
      $inline_style .= ( $content_size ) ? 'font-size:'. segovia_core_check_px($content_size) .';' : '';
      $inline_style .= ( $content_color  ) ? 'color:'. $content_color .';' : '';
      $inline_style .= '}';
    }
    // Learnmore Size & Color
    if ( $learnmore_size || $learnmore_color ) {
      $inline_style .= '.segovia-service-toggle-'. $e_uniqid .'.identify-item .segva-border-link a {';
      $inline_style .= ( $learnmore_size ) ? 'font-size:'. segovia_core_check_px($learnmore_size) .';' : '';
      $inline_style .= ( $learnmore_color  ) ? 'color:'. $learnmore_color .';' : '';
      $inline_style .= '}';
    }
    // Learnmore Border Color
    if ( $learnmore_border_color ) {
      $inline_style .= '.segovia-service-toggle-'. $e_uniqid .'.identify-item .segva-border-link a:after {';
      $inline_style .= ( $learnmore_border_color  ) ? 'background:'. $learnmore_border_color .';' : '';
      $inline_style .= '}';
    }
     // Learnmore Hover Color
    if ( $learnmore_hover_color ) {
      $inline_style .= '.segovia-service-toggle-'. $e_uniqid .'.identify-item .segva-border-link a:hover {';
      $inline_style .= ( $learnmore_hover_color  ) ? 'color:'. $learnmore_hover_color .';' : '';
      $inline_style .= '}';
    }


    // add inline style
    add_inline_style( $inline_style );
    $styled_class  = ' segovia-service-toggle-'. $e_uniqid.'-'.sanitize_title($service_toggle_title);


    $title = $service_toggle_title ? '<h2 class="identify-title">'.$service_toggle_title.'</h2>' : '';
    $content = $service_toggle_content ? '<p>'.$service_toggle_content.'</p>' : '';

    // Link Target
    $open_link = $open_link ? 'target="_blank"' : '';
 
    // Service LearnMore Title
      $link = $read_more_link ? '<div class="segva-border-link"><a href="'.$read_more_link.'" '. $open_link.' class="segve-btn">'.$read_more_title.' <i class="fa fa-angle-right" aria-hidden="true"></i></a></div>' : '';

    // Toggle Align
    if($toggle_align === 'true') {
      $align_left = ' order-lg-2';
      $align_right = ' order-lg-1';
    } else {
      $align_left = '';
      $align_right = '';
    }

    // Service Image
    $image_url = wp_get_attachment_url( $service_toggle_image );
    $image = $image_url ? '<img src="'.$image_url.'" alt="Segovia Toggle">' : '';
  
    $output = '<div class="identify-item '.$class.' '.$styled_class.'">
                <div class="row">
                  <div class="col-lg-6 col-md-12'.$align_left.'">
                    <div class="segva-image segva-item">'.$image.'</div>
                  </div>
                  <div class="col-lg-6 col-md-12'.$align_right.'">
                    <div class="identify-info segva-item">
                      <div class="segva-table-wrap">
                        <div class="segva-align-wrap">
                          '.$title.$content.$link.'
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>';

    return $output;
  }
}
add_shortcode( 'segva_service_toggle', 'segovia_service_toggle_function' );
