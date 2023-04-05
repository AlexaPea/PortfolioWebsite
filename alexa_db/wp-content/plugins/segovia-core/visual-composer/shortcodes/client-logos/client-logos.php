<?php
/* ==========================================================
  Clients
=========================================================== */
if ( !function_exists('segovia_clients_function')) {
  function segovia_clients_function( $atts, $content = NULL ) {

    extract(shortcode_atts(array(
      'clients_style'  => '',
      'clients_title'  => '',
      'logo_items'  => '',
      'class'  => '',
      'retina_img' => '',
      // Style
      'title_color'  => '',
      'title_size'  => '',
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

    // add inline style
    add_inline_style( $inline_style );
    $styled_class  = ' segovia-clients-'. $e_uniqid;

    $output ='<div class="segva-clients '. $class.'"> <div class="constainer"> <div class="clients-wrap"> <div class="row">';

      // Group Param Output
      foreach ( $get_each_list as $each_list ) {
        $image_url = wp_get_attachment_url( $each_list['client_logo'] );
       if($image_url){
            list($width, $height, $type, $attr) = getimagesize($image_url);
          } else {
            $width = '';
            $height = '';
          }
          if($retina_img) {
            $logo_width = $width/2;
            $logo_height = $height/2;
          } else {
            $logo_width = '';
            $logo_height = '';
          }

        $output .= '<div class="segva-item client-item">';

        $image_actual = $each_list['client_logo'] ? '<img src="'.$image_url.'" alt="'.esc_attr('Sponso', 'segovia-core').'" style="width: '.segovia_core_check_px($logo_width).'; height: '.segovia_core_check_px($logo_height).'">' : '';
        $logo_link = $each_list['logo_link'] ? '<div class="segva-image"><a href="'.$each_list['logo_link'].'">'.$image_actual.'</a></div>' : '<div class="segva-image">'.$image_actual.'</div>';
        $logo_exact = $each_list['client_logo'] ? $logo_link : '';

        $output .= $logo_exact;
        $output .= '</div>';
      }

    $output .= '  </div></div></div></div>';

    return $output;
  }
}
add_shortcode( 'segovia_clients', 'segovia_clients_function' ); 
