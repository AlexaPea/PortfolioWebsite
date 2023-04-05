<?php
/* ==========================================================
    Slider
=========================================================== */
if ( !function_exists('segovia_slider_function')) {
  function segovia_slider_function( $atts, $content = NULL ) {

    extract(shortcode_atts(array(
      'sliders'  => '',
      'class'  => '',
      // Design
      'title_size'  => '',
      'content_size'  => '',
      'title_color'  => '',
      'content_text_size' =>'',
      'content_color'  => '',
      'btn_text_size'  => '',
      'btn_text_color'  => '',
      'btn_text_hover_color'  => '',
      'btn_border_color'  => '',

    ), $atts));

    // Alignment & Texts
    $class = ( $class ) ? ' '. $class : '';

    // Group Field
    $slider_items = (array) vc_param_group_parse_atts( $sliders );
    $get_each_lists = array();
    foreach ( $slider_items as $slider_item ) {
      $each_list = $slider_item;
      $each_list['slider_image'] = isset( $slider_item['slider_image'] ) ? $slider_item['slider_image'] : '';
      $each_list['caption_alignment'] = isset( $slider_item['caption_alignment'] ) ? $slider_item['caption_alignment'] : '';
      $each_list['slider_title'] = isset( $slider_item['slider_title'] ) ? $slider_item['slider_title'] : '';
      $each_list['title_animation'] = isset( $slider_item['title_animation'] ) ? $slider_item['title_animation'] : '';

      $each_list['slider_content'] = isset( $slider_item['slider_content'] ) ? $slider_item['slider_content'] : '';
      $each_list['textarea_animation'] = isset( $slider_item['textarea_animation'] ) ? $slider_item['textarea_animation'] : '';

      $each_list['slider_link_text'] = isset( $slider_item['slider_link_text'] ) ? $slider_item['slider_link_text'] : '';
      $each_list['slider_link'] = isset( $slider_item['slider_link'] ) ? $slider_item['slider_link'] : '';
      $each_list['btn_animation'] = isset( $slider_item['btn_animation'] ) ? $slider_item['btn_animation'] : '';

      $each_list['slider_btwo_text'] = isset( $slider_item['slider_btwo_text'] ) ? $slider_item['slider_btwo_text'] : '';
      $each_list['slider_btwo_link'] = isset( $slider_item['slider_btwo_link'] ) ? $slider_item['slider_btwo_link'] : '';
      $each_list['btwo_animation'] = isset( $slider_item['btwo_animation'] ) ? $slider_item['btwo_animation'] : '';
      $each_list['custom_class'] = isset( $slider_item['custom_class'] ) ? $slider_item['custom_class'] : '';
      $get_each_lists[] = $each_list;
    }

    // Shortcode Style CSS
    $e_uniqid        = uniqid();
    $inline_style  = '';

  
    // Title
    if ( $title_size || $title_color ) {
      $inline_style .= '.segovia-slider-'. $e_uniqid .' .segva-slider-caption h2.slider-caption-title {';
      $inline_style .= ( $title_size ) ? 'font-size:'. segovia_core_check_px($title_size) .';' : '';
      $inline_style .= ( $title_color ) ? 'color:'. $title_color .';' : '';
      $inline_style .= '}';
    } 
    // Content
    if ( $content_text_size || $content_color ) {
      $inline_style .= '.segovia-slider-'. $e_uniqid .' .segva-slider-caption .caption-wrap p {';
      $inline_style .= ( $content_text_size ) ? 'font-size:'. segovia_core_check_px($content_text_size) .';' : '';
      $inline_style .= ( $content_color ) ? 'color:'. $content_color .';' : '';
      $inline_style .= '}';
    } 
    // Bone
    if ( $btn_text_size || $btn_text_color) {
      $inline_style .= '.segovia-slider-'. $e_uniqid .' .segva-slider-caption .segva-border-link, .segovia-slider-'. $e_uniqid .' .caption-wrap .segva-border-link a {';
      $inline_style .= ( $btn_text_size ) ? 'font-size:'. segovia_core_check_px($btn_text_size) .';' : '';
      $inline_style .= ( $btn_text_color ) ? 'color:'. $btn_text_color .';' : '';
      $inline_style .= '}';
    } 
     if ( $btn_text_hover_color) {
      $inline_style .= '.segovia-slider-'. $e_uniqid .' .caption-wrap .segva-border-link a:hover {';
      $inline_style .= ( $btn_text_hover_color ) ? 'color:'. $btn_text_hover_color .';' : '';
      $inline_style .= '}';
    } 

     if ( $btn_border_color) {
      $inline_style .= '.segovia-slider-'. $e_uniqid .' .caption-wrap .segva-border-link a:after {';
      $inline_style .= ( $btn_border_color ) ? 'background:'. $btn_border_color .';' : '';
      $inline_style .= '}';
    } 

   
    // add inline style
    add_inline_style( $inline_style );
    $styled_class  = ' segovia-slider-'. $e_uniqid;

    $output = '<div class="segva-spacer-wrap' .$styled_class.' '.$class.'"><div class="swiper-container fadeslides keyboard"><div class="swiper-wrapper">';
         
                  foreach ( $get_each_lists as $each_list ) {
                    if ($each_list['caption_alignment'] === 'right') {
                      $align_class = ' right';
                    } elseif ($each_list['caption_alignment'] === 'center') {
                      $align_class = ' center';
                    } else {
                      $align_class = '';
                    }
                    if ($each_list['slider_content']) {
                      $caption_content = '<p class="animated" data-animation="'.$each_list['textarea_animation'].'">'.$each_list['slider_content'].'</p>';
                    } else {
                      $caption_content = '';
                    }
                    $image_url = wp_get_attachment_url( $each_list['slider_image'] );
    

     $output .= '<div class="swiper-slide" style="background-image: url('. $image_url .');">
                <div class="segva-slider-caption">
                  <div class="segva-table-wrap">
                    <div class="segva-align-wrap">
                      <div class="container">
                        <div class="caption-wrap">
                          <h2 class="slider-caption-title animated" data-animation="'.$each_list['title_animation'].'">'.$each_list['slider_title'].'</h2>
                          '.$caption_content.'
                          <div class="segva-border-link animated" data-animation="'.$each_list['btn_animation'].'"><a href="'.$each_list['slider_link'].'"><i class="fa fa-angle-down" aria-hidden="true"></i> '.$each_list['slider_link_text'].'</a></div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>';

              }

      $output .= '</div><div class="swiper-button-prev"></div><div class="swiper-button-next"></div></div></div>';

    // Starts

    return $output;

  }
}
add_shortcode( 'segovia_slider', 'segovia_slider_function' );
