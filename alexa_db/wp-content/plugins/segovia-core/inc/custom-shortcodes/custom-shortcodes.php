<?php
/* Spacer */
function vt_spacer_function($atts, $content = true) {
  extract(shortcode_atts(array(
     "height" => '',
  ), $atts));

  $result = do_shortcode('[vc_empty_space height="'. $height .'"]');
  return $result;

}
add_shortcode("vt_spacer", "vt_spacer_function");

/* Overlay Title */
function hover_menu_title_function($atts, $content = true) {
  extract(shortcode_atts(array(
    "hover_title" => '',
    "custom_class" => '',
    "title_color" => '',
    "title_size" =>'',
   
  ), $atts));


  // Shortcode Style CSS
  $e_uniqid       = uniqid();
  $inline_style   = '';

  // Colors & Size
  if ( $title_color || $title_size ) {
    $inline_style .= '.segva-hover-title-'. $e_uniqid .' {';
    $inline_style .= ( $title_color ) ? 'color:'. $title_color .';' : '';
    $inline_style .= ( $title_size ) ? 'font-size:'. segovia_core_check_px($title_size) .' !important;' : '';
    $inline_style .= '}';
  }
 
  // add inline style
  add_inline_style( $inline_style );
  $styled_class  = ' segva-hover-title-'. $e_uniqid;

  $result = '<h5 class="nav-item-title '.$custom_class.' '.$styled_class.' ">'.$hover_title.'</h5>';
  return $result;

}
add_shortcode("hover_menu_title", "hover_menu_title_function");

/* Custom Title */
function segva_custom_title_function($atts, $content = true) {
  extract(shortcode_atts(array(
    "custom_title" => '',
    "custom_class" => '',
    "custom_title_color" => '',
    "custom_title_size" =>'',
   
  ), $atts));

  // Shortcode Style CSS
  $e_uniqid       = uniqid();
  $inline_style   = '';

  // Colors & Size
  if ( $custom_title_color || $custom_title_size ) {
    $inline_style .= '.segva-custom-title-'. $e_uniqid .' {';
    $inline_style .= ( $custom_title_color ) ? 'color:'. $custom_title_color .';' : '';
    $inline_style .= ( $custom_title_size ) ? 'font-size:'. segovia_core_check_px($custom_title_size) .' !important;' : '';
    $inline_style .= '}';
  }
 
  // add inline style
  add_inline_style( $inline_style );
  $styled_class  = ' segva-custom-title-'. $e_uniqid;

  $result = '<h5 class="segva-custom-title '.$custom_class.' '.$styled_class.' ">'.$custom_title.'</h5>';
  return $result;

}
add_shortcode("segva_custom_title", "segva_custom_title_function");

/* Social Icons */
function vt_socials_function($atts, $content = true) {
  extract(shortcode_atts(array(
    "social_select" => '',
    "custom_class" => '',
    // Colors
    "icon_color" => '',
    "icon_hover_color" => '',
    "bg_color" => '',
    "bg_hover_color" => '',
    "border_color" => '',
    "icon_size" => '',
  ), $atts));

  // Atts
  if($social_select === 'style-two') {
    $social_style = '';
  } elseif($social_select === 'style-three') {
    $social_style = ' ';
  } else {
    $social_style = ' rounded';
  }
  // Div for topbar social icons
  if ($social_select === 'style-one') {
    $social_open = '<div class="segva-tr-element">';
    $social_close = '</div>';
  } else {
    $social_open = '';
    $social_close = '';
  }

  // Shortcode Style CSS
  $e_uniqid       = uniqid();
  $inline_style   = '';

  // Colors & Size
  if ( $icon_color || $icon_size ) {
    $inline_style .= '.segva-socials-'. $e_uniqid .'.segva-social a, .segva-socials-'. $e_uniqid .'.segva-social-two li a, .segva-socials-'. $e_uniqid .'.tm-social-links a i {';
    $inline_style .= ( $icon_color ) ? 'color:'. $icon_color .';' : '';
    $inline_style .= ( $icon_size ) ? 'font-size:'. segovia_core_check_px($icon_size) .';' : '';
    $inline_style .= '}';
  }
  if ($social_select !== 'style-three') {
    if ( $icon_hover_color ) {
      $inline_style .= '.segva-socials-'. $e_uniqid .'.segva-social li a:hover, .segva-socials-'. $e_uniqid .'.segva-social-two li a:hover {';
      $inline_style .= ( $icon_hover_color ) ? 'color:'. $icon_hover_color .';' : '';
      $inline_style .= '}';
    }
  }
  if($social_select !== 'style-one') {
    if ( $bg_color ) {
      $inline_style .= '.segva-socials-'. $e_uniqid .'.segva-social-two li a, .segva-socials-'. $e_uniqid .'.tm-social-links a {';
      $inline_style .= ( $bg_color ) ? 'background-color:'. $bg_color .';' : '';
      $inline_style .= '}';
    }
  }
  if($social_select === 'style-two') {
    if ( $bg_hover_color ) {
      $inline_style .= '.segva-socials-'. $e_uniqid .'.segva-social-two li a:hover {';
      $inline_style .= ( $bg_hover_color ) ? 'background-color:'. $bg_hover_color .';' : '';
      $inline_style .= '}';
    }
  }
  if($social_select === 'style-three') {
    if ( $border_color ) {
      $inline_style .= '.segva-socials-'. $e_uniqid .'.tm-social-links a {';
      $inline_style .= ( $border_color ) ? 'border-color:'. $border_color .';' : '';
      $inline_style .= '}';
    }
  }

  // add inline style
  add_inline_style( $inline_style );
  $styled_class  = ' segva-socials-'. $e_uniqid;

  $result = $social_open .'<div class="segva-social'. $social_style . $custom_class . $styled_class .'">'. do_shortcode($content) .'</div>'. $social_close;
  return $result;

}
add_shortcode("vt_socials", "vt_socials_function");

/* Social Icon */
function vt_social_function($atts, $content = NULL) {
   extract(shortcode_atts(array(
      "social_link" => '',
      "social_icon" => '',
      "target_tab" => ''
   ), $atts));

   $social_link = ( isset( $social_link ) ) ? 'href="'. $social_link . '"' : '';
   $target_tab = ( $target_tab === '1' ) ? ' target="_blank"' : '';

   $result = '<a '. $social_link . $target_tab .' class="'. str_replace('fa ', 'icon-', $social_icon) .'"><i class="'. $social_icon .'"></i></a>';
   return $result;

}
add_shortcode("vt_social", "vt_social_function");

/* Simple Images */
function vt_image_lists_function($atts, $content = true) {
  extract(shortcode_atts(array(
    "custom_class" => '',
  ), $atts));

  $result = '<ul class="simple-fix '. $custom_class .'">'. do_shortcode($content) .'</ul>';
  return $result;

}
add_shortcode("vt_image_lists", "vt_image_lists_function");

/* Simple Image */
function vt_image_list_function($atts, $content = NULL) {
  extract(shortcode_atts(array(
    "get_image" => '',
    "link" => '',
    "open_tab" => ''
  ), $atts));

  // Atts
  if ($get_image) {
    $my_image = ($get_image) ? '<img src="'. $get_image .'" alt=""/>' : '';
  } else {
    $my_image = '';
  }
  if ($link) {
    $open_tab = $open_tab ? 'target="_blank"' : '';
    $link_o = '<a href="'. $link .'" '. $open_tab .'>';
    $link_c = '</a>';
  } else {
    $link_o = '';
    $link_c = '';
  }

  $result = '<li>'. $link_o . $my_image . $link_c .'</li>';
  return $result;

}
add_shortcode("vt_image_list", "vt_image_list_function");

/* Banner Sidebar Images */
function vt_banner_images_function($atts, $content = true) {
  extract(shortcode_atts(array(
    "custom_class" => '',
    "get_image" => '',
    "title_text" => '',
    "link" => '',
    "open_tab" => '',

  ), $atts));
   $open_tab = $open_tab ? 'target="_blank"' : '';
   
  $title_link = $link ? '<h4 class="banner-spot-title"><a href="'.$link.'" '.$open_tab.'>'.$title_text.'</a></h4>' : '<h4 class="banner-spot-title">'.$title_text.'</h4>';

  $result = '<div class="banner-spot">
              <div class="segva-image"><img src="'.esc_url($get_image).'" alt="Banner Spot"></div>
              <div class="banner-spot-info">
                <div class="segva-table-wrap">
                  <div class="segva-align-wrap">
                    '.$title_link.'
                  </div>
                </div>
              </div>
            </div>';
  return $result;

}
add_shortcode("vt_banner_images", "vt_banner_images_function");

/* Simple Underline Link */
function vt_simple_link_function($atts, $content = NULL) {
  extract(shortcode_atts(array(

    "link_text" => '',
    "link" => '',
    "target_tab" => '',
    "custom_class" => '',
    // Normal
    "text_color" => '',
    "border_color" => '',
    // Hover
    "text_hover_color" => '',
    "border_hover_color" => '',
    // Size
    "text_size" => '',
  ), $atts));

  // Atts
  $target_tab = $target_tab ? 'target="_blank"' : '';

  // Shortcode Style CSS
  $e_uniqid       = uniqid();
  $inline_style   = '';

  // Colors & Size
  if ( $text_color || $text_size ) {
    $inline_style .= '.segva-simple-link-'. $e_uniqid .' .segva-link {';
    $inline_style .= ( $text_color ) ? 'color:'. $text_color .';' : '';
    $inline_style .= ( $text_size ) ? 'font-size:'. segovia_core_check_px($text_size) .';' : '';
    $inline_style .= '}';
  }
  if ( $text_hover_color ) {
    $inline_style .= '.segva-simple-link-'. $e_uniqid .' .segva-link:hover {';
    $inline_style .= ( $text_hover_color ) ? 'color:'. $text_hover_color .';' : '';
    $inline_style .= '}';
  }

  // add inline style
  add_inline_style( $inline_style );
  $styled_class  = ' segva-simple-link-'. $e_uniqid;

  $result = '<div class="segva-link-wrap simple-link '.$styled_class.'"><a href="'. $link .'" '. $target_tab .' class="segva-link '. $custom_class . $styled_class .'">'. $link_text.'</a></div>';
  return $result;

}
add_shortcode("vt_simple_link", "vt_simple_link_function");

// Segovia ReadMore Links
function segovia_readmore_function($atts, $content = true) {
   extract(shortcode_atts(array(
      "readmore_title" => '',
      "readmore_icon" =>'',
      "custom_class" => '',
      "readmore_link" =>'',
      "padding_top" =>'',
      // Color
      "readmore_color" =>'',
      "readmore_bg_color" =>'',
      "border_color" =>'',
      // Hover
      "text_hover_color" =>'',
      "bg_hover_color" =>'',
      "border_hover_color" =>'',
      // ReadMore Size
      "readmore_size"=>'',
      "readmore_icon_size" =>'',
       "target_tab" => ''

   ), $atts));
   // Shortcode Style CSS
  $e_uniqid       = uniqid();
  $inline_style   = '';

  // Colors & Size
  if ( $readmore_color || $readmore_size ) {
    $inline_style .= '.segovia-readmore-link-'. $e_uniqid .', .segva-border-link.segovia-readmore-link-'. $e_uniqid .', .segva-border-link.segovia-readmore-link-'. $e_uniqid .' a {';
    $inline_style .= ( $readmore_color ) ? 'color:'. $readmore_color .';' : '';
    $inline_style .= ( $readmore_size ) ? 'font-size:'. segovia_core_check_px($readmore_size) .';' : '';
    $inline_style .= '}';
  }
  if ( $readmore_bg_color ) {
    $inline_style .= '.segovia-readmore-link-'. $e_uniqid .', .segva-border-link.segovia-readmore-link-'. $e_uniqid .' a i {';
    $inline_style .= ( $readmore_bg_color ) ? 'color:'. $readmore_bg_color .';' : '';
    $inline_style .= '}';
  }
  if ( $readmore_icon_size ) {
    $inline_style .= '.segovia-readmore-link-'. $e_uniqid .', .segva-border-link.segovia-readmore-link-'. $e_uniqid .' a i {';
    $inline_style .= ( $readmore_icon_size ) ? 'font-size:'. segovia_core_check_px($readmore_icon_size) .';' : '';
    $inline_style .= '}';
  }
  if ( $text_hover_color ) {
    $inline_style .= '.segovia-readmore-link-'. $e_uniqid .', .segva-border-link.segovia-readmore-link-'. $e_uniqid .' a:hover {';
    $inline_style .= ( $text_hover_color ) ? 'color:'. $text_hover_color .';' : '';
    $inline_style .= '}';
  }
  if ( $border_color ) {
    $inline_style .= '.segva-border-link.segovia-readmore-link-'. $e_uniqid .' a:after {';
    $inline_style .= ( $border_color ) ? 'background:'. $border_color .';' : '';
    $inline_style .= '}';
  }
  if ( $padding_top ) {
    $inline_style .= '.segva-border-link.segovia-readmore-link-'. $e_uniqid .' {';
    $inline_style .= ( $padding_top ) ? 'padding-top:'. segovia_core_check_px($padding_top) .';' : '';
    $inline_style .= '}';
  }
 
// add inline style
  add_inline_style( $inline_style );
  $styled_class  = ' segovia-readmore-link-'. $e_uniqid;

  $target_tab = ( $target_tab === '1' ) ? 'target="_blank"' : '';

  $result = '<div class="segva-border-link segva-custom-btn'. $custom_class . $styled_class .' "><a href=" '.$readmore_link.'" '.$target_tab.' class="segva-btn"> '. $readmore_title .'<i class="'. $readmore_icon .'"></i></a></div>';
    return $result;
}
add_shortcode("segovia_readmore", "segovia_readmore_function");

/* Type Writer List */
function segovia_typewritter_lists_function($atts, $content = true) {
  extract(shortcode_atts(array(
    "custom_class" => '',
  ), $atts));

  // Output
  $output = '';

  $output .= '<div id="typed-strings" class="'. $custom_class .'">';
  $output .= do_shortcode($content);
  $output .= '</div><div class="typewriter-caption" id="typed"></div>';

  return $output;

}
add_shortcode("segovia_typewritter_lists", "segovia_typewritter_lists_function");

/* Type Writer List */
function segovia_typewritter_list_function($atts, $content = NULL) {
  extract(shortcode_atts(array(
    "text" => '',
  ), $atts));

  // Atts
  $text = $text ? '<span>'. $text .'</span> ' : '';

  $result = $text;
  return $result;

}
add_shortcode("segovia_typewritter_list", "segovia_typewritter_list_function");

/* Address Infos */
function vt_address_infos_function($atts, $content = true) {
   extract(shortcode_atts(array(
      "custom_class" => ''
   ), $atts));

   $result = '<div class="contact-info segva-top-info '. $custom_class .'"><ul>'. do_shortcode($content) .'</ul></div>';
   return $result;

}
add_shortcode("vt_address_infos", "vt_address_infos_function");

/* Address Info */
function vt_address_info_function($atts, $content = NULL) {
   extract(shortcode_atts(array(
      "address_style" => '',
      "info_icon" => '',
      "info_icon_color" => '',
      "info_main_text" => '',
      "info_main_text_link" => '',
      "info_main_text_color" => '',
      "info_sec_text" => '',
      "info_sec_text_link" => '',
      "info_sec_text_color" => '',
      "target_tab" => ''
   ), $atts));

   // Color
   $info_icon_color = $info_icon_color ? 'color:'. $info_icon_color .';' : '';
   $info_main_text_color = $info_main_text_color ? 'color:'. $info_main_text_color .';' : '';
   $info_sec_text_color = $info_sec_text_color ? 'color:'. $info_sec_text_color .';' : '';

   $address_style = ( $address_style === 'style-two' ) ? 'segva-ai-two' : '';
   $target_tab = ( $target_tab === '1' ) ? 'target="_blank"' : '';
   $info_icon = ( isset( $info_icon ) ) ? '<i class="'. $info_icon .'" style="'. $info_icon_color .'"></i>' : '';

   if (isset( $info_main_text ) && !$info_main_text_link ) {
      $info_main_text = '<span style="'. $info_main_text_color .'">'. $info_main_text .'</span>';
   } elseif (isset( $info_main_text ) && isset( $info_main_text_link )) {
      $info_main_text = '<span><a href="'. $info_main_text_link .'" '. $target_tab .'  style="'. $info_main_text_color .'">'. $info_main_text .'</a></span>';
   } else {
      $info_main_text = '';
   }
   if (isset( $info_sec_text ) && !$info_sec_text_link ) {
      $info_sec_text = '<p style="'. $info_sec_text_color .'">'. $info_sec_text .'</p>';
   } elseif (isset( $info_sec_text ) && isset( $info_sec_text_link )) {
      $info_sec_text = '<a href="'. $info_sec_text_link .'" '. $target_tab .' style="'. $info_sec_text_color .'">'. $info_sec_text .'</a>';
   } else {
      $info_sec_text = '';
   }

   // $result = '<div class="segva-address-info '. $address_style .'">'. $info_icon .'<div class="segva-ai-content">'. $info_main_text . $info_sec_text .'</div></div>';

    $result = '<li>'. $info_icon . $info_main_text .'</li>';
   return $result;

}
add_shortcode("vt_address_info", "vt_address_info_function");

// Segovia Service Item
function segovia_service_item_function($atts, $content = true) {
   extract(shortcode_atts(array(
      "item_icon_image" => '',
      "service_item_title" =>'',
      "service_item_content" => '',
      "custom_class" =>'',

      "service_title_color" =>'',
      "service_title_size" =>'',
      "service_content_color" =>'',
      "service_content_size" =>'',
     
   ), $atts));

     // Shortcode Style CSS
  $e_uniqid       = uniqid();
  $inline_style   = '';

  // Colors & Size
 
  if ( $service_title_color || $service_title_size ) {
    $inline_style .= '.service-item.segovia-service-item-'. $e_uniqid .' .service-info h4 {';
    $inline_style .= ( $service_title_color ) ? 'color:'. $service_title_color .';' : '';
    $inline_style .= ( $service_title_size ) ? 'font-size:'. $service_title_size .';' : '';
    $inline_style .= '}';
  }
  if ( $service_content_color || $service_content_size ) {
    $inline_style .= '.service-item.segovia-service-item-'. $e_uniqid .' .service-info p {';
    $inline_style .= ( $service_content_color ) ? 'color:'. $service_content_color .';' : '';
    $inline_style .= ( $service_content_size ) ? 'font-size:'. $service_content_size .';' : '';
    $inline_style .= '}';
  }
 
  // add inline style
  add_inline_style( $inline_style );
  $styled_class  = ' segovia-service-item-'. $e_uniqid;

  $result ='<div class="service-item '. $custom_class . $styled_class .'">
          <div class="segva-icon">
            <img src="'.$item_icon_image.'" width="56" height="49" alt="'.$service_item_title.'">
          </div>
          <div class="service-info">
            <h4 class="service-title">'.$service_item_title.'</h4>
            <p>'.$service_item_content.'</p>
          </div>
        </div>';
    return $result;
}
add_shortcode("segovia_service_item", "segovia_service_item_function");

/* Blockquote */
function vt_blockquote_function($atts, $content = true) {
  extract(shortcode_atts(array(
    "author_name" =>'',
    "content_blck" =>'',
    "author_link" =>'',
    "target_tab" => '',

    "text_size" => '',
    "content_size" =>'',
    "text_color" =>'',
    "content_color" => '',
    "text_hover_color" =>'',
    "custom_class" => '',
   
  ), $atts));

  // Shortcode Style CSS
  $e_uniqid        = uniqid();
  $inline_style  = '';

  // Text Styles
  if ( $text_size || $text_color  ) {
    $inline_style .= '.segva-blockquote-'. $e_uniqid .' cite, .segva-blockquote-'. $e_uniqid .' cite a {';
    $inline_style .= ( $text_size ) ? 'font-size:'. $text_size .';' : '';
    $inline_style .= ( $text_color ) ? 'color:'. $text_color .';' : '';
    $inline_style .= '}';
  }
  // Content Styles
  if ( $content_size || $content_color  ) {
    $inline_style .= '.segva-blockquote-'. $e_uniqid .' p {';
    $inline_style .= ( $content_size ) ? 'font-size:'. $content_size .';' : '';
    $inline_style .= ( $content_color ) ? 'color:'. $content_color .';' : '';
    $inline_style .= '}';
  }

  // Text Hover
  if (  $text_hover_color  ) {
    $inline_style .= '.segva-blockquote-'. $e_uniqid .' cite a:hover {';
    $inline_style .= ( $text_hover_color ) ? 'color:'. $text_hover_color .';' : '';
    $inline_style .= '}';
  }
 
  // add inline style
  add_inline_style( $inline_style );
  $styled_class  = ' segva-blockquote-'. $e_uniqid;
  $target_tab = ( $target_tab === '1' ) ? 'target="_blank"' : '';

  $result ='<blockquote class="'.$custom_class . $styled_class .'">
              <p>'.$content_blck .'</p>';
              if($author_name) {
              $result .= '<cite><a href="'.$author_link.'" '.$target_tab.'>'.$author_name.'</a></cite>';
              }
            $result .='</blockquote>';
  return $result;

}
add_shortcode("vt_blockquote", "vt_blockquote_function");

// Address List
function segovia_address_lists_function($atts, $content = true) {
  extract(shortcode_atts(array(
    "custom_class" => '',
    // Colors
    "text_color" => '',
    "text_hover_color" => '',
    "title_color" => '',
    "icon_color" => '',
    "icon_size" => '',
    // Size
    "text_size" => '',
    "title_size" => '',
  ), $atts));

  // Shortcode Style CSS
  $e_uniqid       = uniqid();
  $inline_style   = '';

  if ( $text_color || $text_size ) {
    $inline_style .= '.segva-list-'. $e_uniqid .'.contact-info ul li a, .segva-list-'. $e_uniqid .'.contact-info ul li span {';
    $inline_style .= ( $text_color ) ? 'color:'. $text_color .';' : '';
    $inline_style .= ( $text_size ) ? 'font-size:'. segovia_core_check_px($text_size) .';' : '';
    $inline_style .= '}';
  }
  if ( $text_hover_color ) {
    $inline_style .= '.segva-list-'. $e_uniqid .'.contact-info ul li a:hover {';
    $inline_style .= ( $text_hover_color ) ? 'color:'. $text_hover_color .';' : '';
    $inline_style .= ( $text_size ) ? 'font-size:'. segovia_core_check_px($text_size) .';' : '';
    $inline_style .= '}';
  }
  if ( $title_size || $title_color ) {
    $inline_style .= '.segva-list-'. $e_uniqid .'.contact-info ul li, .segva-list-'. $e_uniqid .'.contact-info {';
    $inline_style .= ( $title_color ) ? 'color:'. $title_color .';' : '';
    $inline_style .= ( $title_size ) ? 'font-size:'. segovia_core_check_px($title_size) .';' : '';
    $inline_style .= '}';
  }
  if ( $icon_size || $icon_color ) {
    $inline_style .= '.segva-list-'. $e_uniqid .'.contact-info ul li i {';
    $inline_style .= ( $icon_color ) ? 'color:'. $icon_color .';' : '';
    $inline_style .= ( $icon_size ) ? 'font-size:'. segovia_core_check_px($icon_size) .';' : '';
    $inline_style .= '}';
  }

  // add inline style
  add_inline_style( $inline_style );
  $styled_class  = ' segva-list-'. $e_uniqid;

  // Output
  $output = '';

  $output .= '<div class="contact-info '. $custom_class . $styled_class .'"> 
              <ul>';
  $output .= do_shortcode($content);
  $output .= '</ul></div>';

  return $output;

}
add_shortcode("segovia_address_lists", "segovia_address_lists_function");

// Address List 
function segovia_address_list_function($atts, $content = NULL) {
  extract(shortcode_atts(array(
    "list_icon" => '',
    "list_title" => '',
    "list_text" => '',
    "list_text_link" => '',
    "list_text_target" => '',
  ), $atts));

  // Atts
  $list_text_target = ( $list_text_target === '1' ) ? 'target="_blank"' : '';
  $address_line = $list_text_link ? '<a href="'. $list_text_link .'" '. $list_text_target . '>'.$list_text.'</a>' : '<span>'.$list_text.'</span>';

  $list_icon = $list_icon ? '<i class="'. $list_icon .'" aria-hidden="true"></i>' : '';
  $list_title = $list_title ? $list_title .'' : '';

  $result = '<li>'.$list_icon.' '.$list_title.' '. $address_line .'</li>';
  return $result;

}
add_shortcode("segovia_address_list", "segovia_address_list_function");


/* Current Year - Shortcode */
if( ! function_exists( 'vt_current_year' ) ) {
  function vt_current_year() {
    return date('Y');
  }
  add_shortcode( 'vt_current_year', 'vt_current_year' );
}

/* Get Home Page URL - Via Shortcode */
if( ! function_exists( 'vt_home_url' ) ) {
  function vt_home_url() {
    return esc_url( home_url( '/' ) );
  }
  add_shortcode( 'vt_home_url', 'vt_home_url' );
}