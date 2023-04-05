<?php
/* ==========================================================
  Services
=========================================================== */
if ( !function_exists('segovia_services_function')) {
  function segovia_services_function( $atts, $content = true ) {

    extract(shortcode_atts(array(
      'service_style'  => '',
      'service_image'  => '',
      'service_image_link'  => '',
      'service_icon_image'  => '',
      'service_icon'  => '',
      'service_title'  => '',
      'read_more_link'  => '',
      'read_more_title'  => '',
      'open_link'  => '',
      'class'  => '',

      // Style
      'title_color'  => '',
      'title_size'  => '',
      'title_top_space'  => '',
      'title_bottom_space'  => '',
    ), $atts));

    // fix unclosed/unwanted paragraph tags in $content
    $content = wpb_js_remove_wpautop($content, true);

    // Style
    $title_color = $title_color ? 'color:' . $title_color . ';' : '';
    $title_size = $title_size ? 'font-size:' . $title_size . ';' : '';
    $title_top_space = $title_top_space ? 'margin-top:' . $title_top_space . ';' : '';
    $title_bottom_space = $title_bottom_space ? 'margin-bottom:' . $title_bottom_space . ';' : '';

    // Link Target
    $open_link = $open_link ? 'target="_blank"' : '';
    $read_more_link = $read_more_link ? '<a href="'. $read_more_link .'" class="services-read-more" '. $open_link .'>'. $read_more_title .'</a>' : '';

    // Service Icon
    $service_icon = $service_icon ? '<div class="service-icon"><i class="'. $service_icon .'"></i></div>' : '';
    $icon_image_url = wp_get_attachment_url( $service_icon_image );
    $service_icon_image = $service_icon_image ? '<div class="service-icon"><img src="'. $icon_image_url .'" alt=""/></div>' : '';

    // Service Image
    $image_url = wp_get_attachment_url( $service_image );
    $service_image_main = $service_image ? '<img class="rounded-three" src="'. $image_url .'" alt="">' : '';
    $service_image_exact = $service_image_link ? '<a href="'. $service_image_link .'" class="service-image" '. $open_link .'>'. $service_image_main .'</a>' : '<span class="service-image">'. $service_image_main .'</span>';

    // Service Title
    if ( function_exists( 'vc_parse_multi_attribute' ) ) {
      $parse_args = vc_parse_multi_attribute( $service_title );
      $url        = ( isset( $parse_args['url'] ) ) ? $parse_args['url'] : '';
      $title      = ( isset( $parse_args['title'] ) ) ? $parse_args['title'] : '';
      $target     = ( isset( $parse_args['target'] ) ) ? trim( $parse_args['target'] ) : '_self';
    }
    if ($url) {
      $service_title = '<a href="'. $url .'" class="service-heading" target="'. $target .'" style="'. $title_color . $title_size . $title_top_space . $title_bottom_space .'">'. $title .'</a>';
    } elseif ($title) {
      $service_title = '<h3 class="service-heading" style="'. $title_color . $title_size . $title_top_space . $title_bottom_space .'">'. $title .'</h3>';
    } else {
      $service_title = '';
    }

    $output = '';
    if ($service_style === 'segva-service-two') {
      $output .= '<div class="segva-service-two">'. $service_icon .'<div class="services-content">'. $service_title . $content .'</div></div>';
    } elseif ($service_style === 'segva-service-three') {
      $output .= '
      <div class="segva-service-three">'. $service_icon .'<div class="services-content">'. $service_title . $content .'</div></div>';
    } elseif ($service_style === 'segva-service-four') {
      $output .= '
      <div class="segva-service-four text-center">'. $service_icon .'<div class="services-content">'. $service_title . $content .'</div></div>';
    } elseif ($service_style === 'segva-service-five') {
      $output .= '
      <div class="segva-service-five">'. $service_icon_image . $service_title . $content .'</div>';
    } else {
      $output .= '<div class="segva-service-one '. $class .'">'. $service_image_exact . $service_title . $content . $read_more_link .'</div>';
    }

    return $output;
  }
}
add_shortcode( 'segva_services', 'segovia_services_function' );
