<?php
/* ===========================================================
    Title
=========================================================== */
if ( !function_exists('segov_title_function')) {
  function segov_title_function( $atts, $content = NULL ) {
    extract(shortcode_atts(array(
      "title" => '',
      "title_tag" => '',
      "description" => '',
      "section_class" => '',
      "section_width" =>'',
      // styles
      "text_align"  => '',
      "title_size" => '',
      "title_color" => '',
      "title_lineheight" =>'',
      "title_bottom_space" => '',
      "desc_color" => '',
      "desc_size" => '',
      "desc_line_height" => '',

      "class" => '',
      "css" => '',
    ), $atts));
   // Shortcode Style CSS
    $custom_css = ( function_exists( 'vc_shortcode_custom_css_class' ) ) ? vc_shortcode_custom_css_class( $css, ' ' ) : '';
    $title_tag = $title_tag ? $title_tag : 'h2';
    $e_uniqid       = uniqid();
    $inline_style   = '';
    
    // Heading
      if ( $title_color || $title_size || $title_bottom_space ) {
        $inline_style .= '.section-title-wrap.segov-heading-'. $e_uniqid. ' h2, .section-title-wrap.segov-heading-'. $e_uniqid. ' .section-title  {';
        $inline_style .= ( $title_color ) ? 'color:'. $title_color .';' : '';
        $inline_style .= ( $title_size ) ? 'font-size:'. segovia_core_check_px($title_size) .';' : '';
        $inline_style .= ( $title_bottom_space ) ? 'padding-bottom:'. segovia_core_check_px($title_bottom_space) .';' : '';
        $inline_style .= ( $title_lineheight ) ? 'line-height:'. segovia_core_check_px($title_lineheight) .';' : '';
        $inline_style .= '}';
      }
  
    // Description
      if ( $desc_color || $desc_size ) {
        $inline_style .= '.section-title-wrap.segov-heading-'. $e_uniqid .' p {';
        $inline_style .= ( $desc_color ) ? 'color:'. $desc_color .';' : '';
        $inline_style .= ( $desc_size ) ? 'font-size:'. segovia_core_check_px($desc_size) .';' : '';
        $inline_style .= '}';
      }
      if ( $desc_line_height ) {
        $inline_style .= '.section-title-wrap.segov-heading-'. $e_uniqid .' p {';
        $inline_style .= ( $desc_line_height ) ? 'line-height:'. segovia_core_check_px($desc_line_height) .';' : '';
        $inline_style .= '}';
      }
      if ( $section_width ) {
        $inline_style .= '.section-title-wrap.segov-heading-'. $e_uniqid .' {';
        $inline_style .= ( $section_width ) ? 'width:'. segovia_core_check_px($section_width) .';' : '';
        $inline_style .= '}';
      }

      

      // add inline style
      add_inline_style( $inline_style );
      $styled_class  = ' segov-heading-'. $e_uniqid.' ';

      $text_align = $text_align ? $text_align : 'text-center';

      $description = $description ? '<p>'.$description.'</p>' : '';

      $result = '';
      $result .='<div class="section-title-wrap '.$styled_class.$text_align.$custom_css.'">
                <'.$title_tag.' class="section-title '.$section_class.'">'.$title.'</'.$title_tag.'>
                '.$description.'
              </div>';
   
  
    return $result; 
  }
}
add_shortcode( 'segov_title', 'segov_title_function' );
