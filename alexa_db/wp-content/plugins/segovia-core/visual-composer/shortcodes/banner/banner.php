<?php
/* ==========================================================
  Clients
=========================================================== */
if ( !function_exists('segovia_banner_function')) {
  function segovia_banner_function( $atts, $content = NULL ) {

    extract(shortcode_atts(array(
      'banner_title' =>'',
      'banner_image' =>'',

      'class'  => '',
      // Style
      'title_size' =>'',
      'title_color' =>'',      
      'overlay_color' => '',

    ), $atts));


    // Shortcode Style CSS
    $e_uniqid        = uniqid();
    $inline_style  = '';

    // Styles Section

    // Title 
     if ( $title_color || $title_size ) {
      $inline_style .= '.segovia-banner-'. $e_uniqid .' .segva-banner.banner-style-two .banner-wrap .banner-caption h1 {';
      $inline_style .= ( $title_color ) ? 'color:'. $title_color .';' : '';
      $inline_style .= ( $title_size ) ? 'font-size:'. $title_size .';' : '';
      $inline_style .= '}';
    }
    // Content
     if ( $overlay_color ) {
      $inline_style .= '.segovia-banner-'. $e_uniqid .' .banner-style-two .banner-wrap {';
      $inline_style .= ( $overlay_color ) ? 'background:'. $overlay_color .';' : '';
      $inline_style .= '}';
    }

    // add inline style
    add_inline_style( $inline_style );
    $styled_class  = ' segovia-banner-'. $e_uniqid;


    // Conditions
    $image_url = wp_get_attachment_url( $banner_image );
    $banner_name = $banner_title ? '<h1 class="banner-title">'.$banner_title.'</h1>' : '';
 
    // Output
    $output ='<div class="segva-spacer-wrap '.$class.$styled_class.'"><div class="segva-banner banner-style-two segva-parallax" style="background-image: url('. $image_url .');">
          <div class="banner-wrap">
            <div class="segva-table-wrap">
              <div class="segva-align-wrap">
                <div class="container">
                  <div class="banner-caption">
                    '.$banner_name.'
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div></div>';

    return $output;
  }
}
add_shortcode( 'segovia_banner', 'segovia_banner_function' ); 
