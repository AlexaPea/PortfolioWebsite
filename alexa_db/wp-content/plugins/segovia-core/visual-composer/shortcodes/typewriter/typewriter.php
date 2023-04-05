<?php
/* ==========================================================
  Typewriter
=========================================================== */
if ( !function_exists('segovia_typewriter_function')) {
  function segovia_typewriter_function( $atts, $content = true ) {

    extract(shortcode_atts(array(
      'class'  => '',
      'text_align' => '',
      // Style
      'content_color'  => '',
      'content_size'  => '',
      'typewriter_color'  => '',
      'typewriter_size'  => '',
      'typewriter_line_color' =>'',
    ), $atts));

    // fix unclosed/unwanted paragraph tags in $content
    $content = segovia_set_wpautop($content, false);

    // Shortcode Style CSS
    $e_uniqid        = uniqid();
    $inline_style  = '';

    if ( $content_size || $content_color) {
      $inline_style .= '.segva-big-title-wrap.typewriter-'. $e_uniqid .' .big-title {';
      $inline_style .= ( $content_color ) ? 'color:'.$content_color.';' : '';
      $inline_style .= ( $content_size ) ? 'font-size:'. segovia_core_check_px($content_size) .';' : '';
      $inline_style .= '}';
    }
    if ( $typewriter_size || $typewriter_color) {
      $inline_style .= '.segva-big-title-wrap.typewriter-'. $e_uniqid .' .typewriter-caption {';
      $inline_style .= ( $typewriter_color ) ? 'color:'.$typewriter_color.';' : '';
      $inline_style .= ( $typewriter_size ) ? 'font-size:'. segovia_core_check_px($typewriter_size) .';' : '';
      $inline_style .= '}';
    }
    if ( $typewriter_line_color) {
      $inline_style .= '.segva-big-title-wrap.typewriter-'. $e_uniqid .' .typewriter-caption:after, .segva-big-title-wrap.typewriter-'. $e_uniqid .' .typewriter-caption:before {';
      $inline_style .= ( $typewriter_line_color ) ? 'background:'.$typewriter_line_color.';' : '';
     
      $inline_style .= '}';
    }

    // add inline style
    add_inline_style( $inline_style );
    $styled_class  = ' typewriter-'. $e_uniqid;

    if($text_align === 'text-left') {
      $type_align = 'text-left';
    } elseif ($text_align === 'text-right') {
      $type_align = 'text-right';
    } else {
      $type_align = 'text-center';
    }
    
    $output = '';
    $output .= '<div class="segva-big-title-wrap '.$styled_class .' '.$class.' '.$type_align.'">
          <div class="big-title segva-typewriter">'.$content.' </div></div>';

    return $output;
  }
}
add_shortcode( 'segovia_typewriter', 'segovia_typewriter_function' );
