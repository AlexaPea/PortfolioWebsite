<?php
/* ==========================================================
  Services
=========================================================== */
if ( !function_exists('segovia_about_item_function')) {
  function segovia_about_item_function( $atts, $content = true ) {

    extract(shortcode_atts(array(
      'about_item_image'  => '',
      'about_item_link'  => '',
      'about_item_title'  => '',
      'about_item_content'  => '',
      'read_more_title'  => '',
      
      'open_link'  => '',
      'class'  => '',

      // Style
      'item_title_size'  => '',
      'item_title_color'  => '',
      'item_title_hover_color'  => '',
      'image_overlay_color' =>'',

      'item_content_size'  => '',
      'content_color' =>'',

      'readmore_size' =>'',
      'readmore_color' =>'',
      'readmore_hover_color' =>'',
      'readmore_border_hover_color' =>'',
    ), $atts));

    // fix unclosed/unwanted paragraph tags in $content
    $content = wpb_js_remove_wpautop($content, true);
  
    // Shortcode Style CSS
    $e_uniqid        = uniqid();
    $inline_style  = '';


  // Title Size & Color
    if ( $item_title_size || $item_title_color ) {
      $inline_style .= '.segva-item.about-item.segovia-item-about-'. $e_uniqid .' .about-info h4, .segva-item.about-item.segovia-item-about-'. $e_uniqid .' .about-info h4 a {';
      $inline_style .= ( $item_title_size  ) ? 'font-size:'. $item_title_size  .';' : '';
      $inline_style .= ( $item_title_color  ) ? 'color:'. $item_title_color .';' : '';
      $inline_style .= '}';
    }

    // Title Hover Color
    if ( $item_title_hover_color ) {
      $inline_style .= '.segva-item.about-item.segovia-item-about-'. $e_uniqid .' .about-info h4 a:hover {';
      $inline_style .= ( $item_title_hover_color  ) ? 'color:'. $item_title_hover_color .';' : '';
      $inline_style .= '}';
    }

    // Content Size & Color
    if ( $item_content_size || $content_color ) {
      $inline_style .= '.segva-item.about-item.segovia-item-about-'. $e_uniqid .' .about-info p {';
      $inline_style .= ( $item_content_size  ) ? 'font-size:'. $item_content_size  .';' : '';
      $inline_style .= ( $content_color  ) ? 'color:'. $content_color .';' : '';
      $inline_style .= '}';
    }

     // ReadMore Size & Color
    if ( $readmore_size || $readmore_color ) {
      $inline_style .= '.segva-item.about-item.segovia-item-about-'. $e_uniqid .' .about-info .segva-link a {';
      $inline_style .= ( $readmore_size  ) ? 'font-size:'. $readmore_size  .';' : '';
      $inline_style .= ( $readmore_color  ) ? 'color:'. $readmore_color .';' : '';
      $inline_style .= '}';
    }

     // ReadMore Hover Color
    if ($readmore_hover_color ) {
      $inline_style .= '.segva-item.about-item.segovia-item-about-'. $e_uniqid .' .about-info .segva-link a:hover {';
      $inline_style .= ( $readmore_hover_color  ) ? 'color:'. $readmore_hover_color .';' : '';
      $inline_style .= '}';
    }

     // ReadMore Border Color
    if ($readmore_border_hover_color ) {
      $inline_style .= '.segva-item.about-item.segovia-item-about-'. $e_uniqid .' .about-info .segva-link a:after {';
      $inline_style .= ( $readmore_border_hover_color  ) ? 'background:'. $readmore_border_hover_color .';' : '';
      $inline_style .= '}';
    }

    // Image Overlay Color
    if ($image_overlay_color ) {
      $inline_style .= '.segva-item.about-item.segovia-item-about-'. $e_uniqid .'.about-item .segva-image:before {';
      $inline_style .= ( $image_overlay_color  ) ? 'background:'. $image_overlay_color .';' : '';
      $inline_style .= '}';
    }

    // add inline style
    add_inline_style( $inline_style );
    $styled_class  = ' segovia-item-about-'. $e_uniqid;


    // Link Target
    $open_link = $open_link ? 'target="_blank"' : '';

    $item_content = $about_item_content ? '<p>'.$about_item_content.'</p>' : '';


    // Service Image
    $image_url = wp_get_attachment_url( $about_item_image );

    $output = '';

     $output .='<div class="segva-item about-item '.$styled_class.''. $class .'">
            <div class="segva-image"><a href="'.$about_item_link.'" '.$open_link.'><img src="'.$image_url.'" alt="'.$about_item_title.'"></a></div>
            <div class="about-info">
              <h4 class="about-title"><a href="'.$about_item_link.'"  '.$open_link.'>'.$about_item_title.'</a></h4>
              '.$item_content.'
              <div class="segva-link"><a href="'.$about_item_link.'"  '.$open_link.'><i class="fa fa-angle-right" aria-hidden="true"></i> '.$read_more_title.'</a></div>
            </div>
          </div>';
    

    return $output;
  }
}
add_shortcode( 'segva_about_item', 'segovia_about_item_function' );
