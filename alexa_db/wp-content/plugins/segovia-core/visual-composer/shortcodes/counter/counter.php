<?php
/* ==========================================================
  Partner
=========================================================== */
if ( !function_exists('segovia_counter_function')) {
  function segovia_counter_function( $atts, $content = NULL ) {

    extract(shortcode_atts(array(
      // 'counter_items' =>'',
      'class'  => '',
      'counter_title' => '',
      'counter_value' => '',
      'counter_value_in' => '',
      'light_value' => '',

      // Style
      'counter_title_color'  => '',
      'counter_value_color'  => '',
      'counter_value_in_color'  => '',

      'counter_title_size'  => '',
      'counter_value_size'  => '',
      'counter_value_in_size'  => '',
    ), $atts));

      // Group Field
    // $counter_items = (array) vc_param_group_parse_atts( $counter_items );
    // $get_each_list = array();
    // foreach ( $counter_items as $counter_item ) {
    //   $each_list = $counter_item;
    //   $each_list['counter_title'] = isset( $counter_item['counter_title'] ) ? $counter_item['counter_title'] : '';
    //   $each_list['counter_value'] = isset( $counter_item['counter_value'] ) ? $counter_item['counter_value'] : '';
    //   $each_list['counter_value_in'] = isset( $counter_item['counter_value_in'] ) ? $counter_item['counter_value_in'] : '';
    //   $each_list['light_value'] = isset( $counter_item['light_value'] ) ? $counter_item['light_value'] : '';

    //   $get_each_list[] = $each_list;
    // }

     // Shortcode Style CSS
    $e_uniqid     = uniqid();
    $inline_style = '';

  
    // Counter Text Hover Color
    if ( $counter_title_color || $counter_title_size) {
      $inline_style .= '.segva-item.counter-item.segva-counter-'. $e_uniqid .' h4 {';
      $inline_style .= ( $counter_title_color ) ? 'color:'. $counter_title_color .' ;' : '';
      $inline_style .= ( $counter_title_size ) ? 'font-size:'. $counter_title_size .' ;' : '';
      $inline_style .= '}';
    }

     // Counter Value Size & Color
    if ( $counter_value_color || $counter_value_size) {
      $inline_style .= '.segva-item.counter-item.segva-counter-'. $e_uniqid .' h2 {';
      $inline_style .= ( $counter_value_color ) ? 'color:'. $counter_value_color .' ;' : '';
      $inline_style .= ( $counter_value_size ) ? 'font-size:'. $counter_value_size .' ;' : '';
      $inline_style .= '}';
    }

     // Counter Value In Size Color
    if ( $counter_value_in_color || $counter_value_in_size) {
      $inline_style .= '.segva-item.counter-item.segva-counter-'. $e_uniqid .' .counter-type {';
      $inline_style .= ( $counter_value_in_color ) ? 'color:'. $counter_value_in_color .' ;' : '';
      $inline_style .= ( $counter_value_in_size ) ? 'font-size:'. $counter_value_in_size .' ;' : '';
      $inline_style .= '}';
    }
   
   
    // add inline style
    add_inline_style( $inline_style );
    $styled_class  = ' segva-counter-'. $e_uniqid;

    // Style
    $counter_title_color = $counter_title_color ? 'color:'. $counter_title_color .';' : '';
    $counter_value_color = $counter_value_color ? 'color:'. $counter_value_color .';' : '';
    $counter_value_in_color = $counter_value_in_color ? 'color:'. $counter_value_in_color .';' : '';
    // Size
    $counter_title_size = $counter_title_size ? 'font-size:'. $counter_title_size .';' : '';
    $counter_value_size = $counter_value_size ? 'font-size:'. $counter_value_size .';' : '';
    $counter_value_in_size = $counter_value_in_size ? 'font-size:'. $counter_value_in_size .';' : '';

    // Light Value Count
    
      $output = '';
      // foreach ( $get_each_list as $each_list ) {
                if($light_value) {
                    $light_class = 'light';
                  }
                  else {
                    $light_class = '';
                  }

      $output .= '<div class="segva-item counter-item '. $class . $styled_class .'">

            <h2 class="counter"><span class="counter-number">'. $counter_value .'</span><span class="counter-type '.$light_class.'">'.$counter_value_in.'</span></h2>

            <h4 class="conter-title">'.$counter_title.'</h4>
          </div>';
          // }
    // Output
    return $output;

  }
}
add_shortcode( 'segva_counter', 'segovia_counter_function' );
