<?php
/* ==========================================================
  Clients
=========================================================== */
if ( !function_exists('segovia_about_me_function')) {
  function segovia_about_me_function( $atts, $content = NULL ) {

    extract(shortcode_atts(array(
      'about_title' =>'',
      'about_image' =>'',
      'about_content' =>'',
      'about_link_text' =>'',
      'select_link_icon' =>'',
      'about_text_link' =>'',
      'open_link' =>'',
      'social_items' =>'',

      'class'  => '',
      // Style
      'title_size' =>'',
      'title_color' =>'',

      'content_size' =>'',
      'content_color' => '',

      'link_text_size' =>'',
      'link_text_color' =>'',
      

      'link_icon_size' =>'',
      'link_icon_color' =>'',

      'link_border_color' =>'',
      'link_text_hover_color' =>'',
      'link_icon_hover_color' =>'',

      'social_text_size' =>'',
      'social_text_color' =>'',

      'social_icon_size' =>'',
      'social_icon_color' =>'',

      'social_title_hover_color' =>'',
      'social_icon_hover_color' =>'',

      'social_background_color' =>'',
      'social_bg_hover_color' =>'',
    ), $atts));

    // Group Field
    $social_items = (array) vc_param_group_parse_atts( $social_items );
    $get_each_list = array();
    foreach ( $social_items as $social_item ) {
      $each_list = $social_item;
      $each_list['social_icon'] = isset( $social_item['social_icon'] ) ? $social_item['social_icon'] : '';
      $each_list['social_name'] = isset( $social_item['social_name'] ) ? $social_item['social_name'] : '';
      $each_list['social_link'] = isset( $social_item['social_link'] ) ? $social_item['social_link'] : '';

      $get_each_list[] = $each_list;
    }

    // Shortcode Style CSS
    $e_uniqid        = uniqid();
    $inline_style  = '';

    // Styles Section

    // Title 
     if ( $title_color || $title_size ) {
      $inline_style .= '.segva-about-me.segovia-about-'. $e_uniqid .' .my-info h1 {';
      $inline_style .= ( $title_color ) ? 'color:'. $title_color .';' : '';
      $inline_style .= ( $title_size ) ? 'font-size:'. $title_size .';' : '';
      $inline_style .= '}';
    }
    // Content
     if ( $content_color || $content_size ) {
      $inline_style .= '.segva-about-me.segovia-about-'. $e_uniqid .' .my-info p {';
      $inline_style .= ( $content_color ) ? 'color:'. $content_color .';' : '';
      $inline_style .= ( $content_size ) ? 'font-size:'. $content_size .';' : '';
      $inline_style .= '}';
    }

    // Links Text
     if ( $link_text_color || $link_text_size ) {
      $inline_style .= '.segva-about-me.segovia-about-'. $e_uniqid .' .my-info .segva-border-link a {';
      $inline_style .= ( $link_text_color ) ? 'color:'. $link_text_color .';' : '';
      $inline_style .= ( $link_text_size ) ? 'font-size:'. $link_text_size .';' : '';
      $inline_style .= '}';
    }

    // Link Icon
      if ( $link_icon_color || $link_icon_size ) {
      $inline_style .= '.segva-about-me.segovia-about-'. $e_uniqid .' .my-info .segva-border-link a i {';
      $inline_style .= ( $link_icon_color ) ? 'color:'. $link_icon_color .';' : '';
      $inline_style .= ( $link_icon_size ) ? 'font-size:'. $link_icon_size .';' : '';
      $inline_style .= '}';
    }

     // Link Border Color
      if ( $link_border_color) {
      $inline_style .= '.segva-about-me.segovia-about-'. $e_uniqid .' .my-info .segva-border-link a:after {';
      $inline_style .= ( $link_border_color ) ? 'background:'. $link_border_color .';' : '';
      $inline_style .= '}';
    }

      // Link Text Hover
      if ( $link_text_hover_color ) {
      $inline_style .= '.segva-about-me.segovia-about-'. $e_uniqid .' .my-info .segva-border-link:hover a {';
      $inline_style .= ( $link_text_hover_color ) ? 'color:'. $link_text_hover_color .';' : '';
      $inline_style .= '}';
    }

    // Link Icon Hover
      if ( $link_icon_hover_color ) {
      $inline_style .= '.segva-about-me.segovia-about-'. $e_uniqid .' .my-info .segva-border-link:hover a i {';
      $inline_style .= ( $link_icon_hover_color ) ? 'color:'. $link_icon_hover_color .';' : '';
      $inline_style .= '}';
    }

    // Social Text
     if ( $social_text_color || $social_text_size ) {
      $inline_style .= '.segva-about-me.segovia-about-'. $e_uniqid .' .my-info .segva-social.square a .social-title {';
      $inline_style .= ( $social_text_color ) ? 'color:'. $social_text_color .';' : '';
      $inline_style .= ( $social_text_size ) ? 'font-size:'. $social_text_size .';' : '';
      $inline_style .= '}';
    }

    // Social Icon
     if ( $social_icon_color || $social_icon_size ) {
      $inline_style .= '.segva-about-me.segovia-about-'. $e_uniqid .' .my-info .segva-social.square a i {';
      $inline_style .= ( $social_icon_color ) ? 'color:'. $social_icon_color .';' : '';
      $inline_style .= ( $social_icon_size ) ? 'font-size:'. $social_icon_size .';' : '';
      $inline_style .= '}';
    }

    // Social Title Hover
    if ( $social_title_hover_color ) {
      $inline_style .= '.segva-about-me.segovia-about-'. $e_uniqid .' .my-info .segva-social.square a:hover .social-title  {';
      $inline_style .= ( $social_title_hover_color ) ? 'color:'. $social_title_hover_color .';' : '';
      $inline_style .= '}';
    }

    // Social Icon Hover
    if ( $social_icon_hover_color ) {
      $inline_style .= '.segva-about-me.segovia-about-'. $e_uniqid .' .my-info .segva-social.square a:hover i {';
      $inline_style .= ( $social_icon_hover_color ) ? 'color:'. $social_icon_hover_color .';' : '';
      $inline_style .= '}';
    }

    // Social Background
    if ( $social_background_color ) {
      $inline_style .= '.segva-about-me.segovia-about-'. $e_uniqid .' .my-info .segva-social.square a {';
      $inline_style .= ( $social_background_color ) ? 'background:'. $social_background_color .';' : '';
      $inline_style .= '}';
    }

    // Social Background Hover
    if ( $social_bg_hover_color ) {
      $inline_style .= '.segva-about-me.segovia-about-'. $e_uniqid .' .my-info .segva-social.square a:hover {';
      $inline_style .= ( $social_bg_hover_color ) ? 'background:'. $social_bg_hover_color .';' : '';
      $inline_style .= '}';
    }

    // add inline style
    add_inline_style( $inline_style );
    $styled_class  = ' segovia-about-'. $e_uniqid;


    // Conditions
    $image_url = wp_get_attachment_url( $about_image );
    $abt_name = $about_title ? '<h1 class="my-name">'.$about_title.'</h1>' : '';
    $content_area = $about_content ? '<p>'.$about_content.'</p>' : '';
     $open_link = $open_link ? ' target="_blank"' : '';
    

     $output = '<div class="segva-about-me '.$styled_class .' '. $class.'">
      <div class="segva-background segva-parallax" style="background-image: url('. $image_url .');"></div>
      <div class="my-info">
        <div class="my-info-wrap">
          <div class="vertical-scroll">
            <div class="segva-table-wrap">
              <div class="segva-align-wrap">
                '.$abt_name.'
                '.$content_area.'
                <div class="segva-border-link"><a href="'.$about_text_link.'" '.$open_link.' class="segva-btn"><i class="'.$select_link_icon.'" aria-hidden="true"></i> '.$about_link_text.'</a></div>
              </div>
            </div>
          </div>
        </div>';

      // Group Param Output
     $output .= '<div class="segva-social square">';

      foreach ( $get_each_list as $each_list ) {

      $icon_link = $each_list['social_link'] ? '<a href="'.$each_list['social_link'].'" target="_blank"><i class="'.$each_list['social_icon'].'" aria-hidden="true"></i> <span class="social-title">'.$each_list['social_name'].'</span></a>' : '<span><i class="'.$each_list['social_icon'].'" aria-hidden="true"></i> <span class="social-title">'.$each_list['social_name'].'</span></span>';

      $icon_main = $each_list['social_icon'] ? $icon_link : '';
      $output .= $icon_main;
      }

      $output .= '</div>';

    $output .= ' </div></div>';

    return $output;
  }
}
add_shortcode( 'segovia_about_me', 'segovia_about_me_function' ); 
