<?php
/* ===========================================================
    Pricing
=========================================================== */
if ( !function_exists('segovia_pricing_box_function')) {
  function segovia_pricing_box_function( $atts, $content = NULL ) {

    extract(shortcode_atts(array(
      'price_title'    => '',
      'price_subtitle'    => '',
      'price'         => '',
      'price_currency'  => '',
      'btn_text'      => '',
      'btn_link'      => '',
      'pricing_box_features' => '',
      'class' => '',

      // Title Style
      'title_size' =>'',
      'title_color' =>'',
      'price_size' =>'',
      'price_color' =>'',
      'cur_size' =>'',
      'cur_color' =>'',
      'desc_size' =>'',
      'desc_color' =>'',
      'feature_size' =>'',
      'feature_color' =>'',
      'feature_icon_size' =>'',
      'feature_icon_color' =>'',
      'disable_size' =>'',
      'disable_color' =>'',
      'price_bg_color' => '',
      'btn_text_size' =>'',
      'btn_text_color'  => '',
      'btn_text_hover_color'  => '',
      'btn_border_color'  => '',
     
    ), $atts));

    // Group Field
  
    $pricing_box_features = (array) vc_param_group_parse_atts( $pricing_box_features );
    $get_each_list = array();
    foreach ( $pricing_box_features as $pricing_box_feature ) {
      $each_list = $pricing_box_feature;
      $each_list['price_features'] = isset( $pricing_box_feature['price_features'] ) ? $pricing_box_feature['price_features'] : '';
      $each_list['pricing_feature'] = isset( $pricing_box_feature['pricing_feature'] ) ? $pricing_box_feature['pricing_feature'] : '';

      $get_each_list[] = $each_list;
    }

    // Shortcode Style CSS
    $e_uniqid        = uniqid();
    $inline_style  = '';

    // Text Styles
    if ( $title_size || $title_color ) {
      $inline_style .= '.segva-item.pricing-item.segovia-pricing-'. $e_uniqid.' .pricing-title .pr-title {';
      $inline_style .= ( $title_size  ) ? 'font-size:'. $title_size  .';' : '';
      $inline_style .= ( $title_color  ) ? 'color:'. $title_color .';' : '';
      $inline_style .= '}';
    }
    // Price Styles
    if ( $price_size || $price_color ) {
      $inline_style .= '.segva-item.pricing-item.segovia-pricing-'. $e_uniqid.' .pricing-title .pr-amont .amount {';
      $inline_style .= ( $price_size  ) ? 'font-size:'. $price_size  .';' : '';
      $inline_style .= ( $price_color  ) ? 'color:'. $price_color .';' : '';
      $inline_style .= '}';
    }
    // Currency Styles
    if ( $cur_size || $cur_color ) {
      $inline_style .= '.segva-item.pricing-item.segovia-pricing-'. $e_uniqid.' .pricing-title .pr-amont .cur-symbol {';
      $inline_style .= ( $cur_size  ) ? 'font-size:'. $cur_size  .';' : '';
      $inline_style .= ( $cur_color  ) ? 'color:'. $cur_color .';' : '';
      $inline_style .= '}';
    }
    // Description Styles
    if ( $desc_size || $desc_color ) {
      $inline_style .= '.segva-item.pricing-item.segovia-pricing-'. $e_uniqid.' p {';
      $inline_style .= ( $desc_size  ) ? 'font-size:'. $desc_size  .';' : '';
      $inline_style .= ( $desc_color  ) ? 'color:'. $desc_color .';' : '';
      $inline_style .= '}';
    }
    // Features Styles
    if ( $feature_size || $feature_color ) {
      $inline_style .= '.segva-item.pricing-item.segovia-pricing-'. $e_uniqid.' ul li {';
      $inline_style .= ( $feature_size  ) ? 'font-size:'. $feature_size  .';' : '';
      $inline_style .= ( $feature_color  ) ? 'color:'. $feature_color .';' : '';
      $inline_style .= '}';
    }
    // Features Icon Styles
    if ( $feature_icon_size || $feature_icon_color ) {
      $inline_style .= '.segva-item.pricing-item.segovia-pricing-'. $e_uniqid.' ul li:before {';
      $inline_style .= ( $feature_icon_size  ) ? 'font-size:'. $feature_icon_size  .';' : '';
      $inline_style .= ( $feature_icon_color  ) ? 'color:'. $feature_icon_color .';' : '';
      $inline_style .= '}';
    }
    // Features Disable Styles
    if ( $disable_size || $disable_color ) {
      $inline_style .= '.segva-item.pricing-item.segovia-pricing-'. $e_uniqid.' ul li.disable-feature {';
      $inline_style .= ( $disable_size  ) ? 'font-size:'. $disable_size  .';' : '';
      $inline_style .= ( $disable_color  ) ? 'color:'. $disable_color .';' : '';
      $inline_style .= '}';
    }
    // Pricing background
    if ( $price_bg_color ) {
      $inline_style .= '.segva-item.pricing-item.segovia-pricing-'. $e_uniqid.' {';
      $inline_style .= ( $price_bg_color ) ? 'background:'. $price_bg_color .';' : '';
      $inline_style .= '}';
    }  
    // Btn Normal
    if ( $btn_text_color || $btn_text_size ) {
      $inline_style .= '.segva-item.pricing-item.segovia-pricing-'. $e_uniqid.' .segva-link a {';
      $inline_style .= ( $btn_text_color ) ? 'color:'. $btn_text_color .';' : '';
      $inline_style .= ( $btn_text_size ) ? 'font-size:'. $btn_text_size .';' : '';
      $inline_style .= '}';
    } 
    // Btn Hover
    if ( $btn_text_hover_color ) {
      $inline_style .= '.segva-item.pricing-item.segovia-pricing-'. $e_uniqid.' .segva-link a:hover {';
      $inline_style .= ( $btn_text_hover_color ) ? 'color:'. $btn_text_hover_color .';' : '';
      $inline_style .= '}';
    } 
    // Btn Hover Border
    if ( $btn_border_color ) {
      $inline_style .= '.segva-item.pricing-item.segovia-pricing-'. $e_uniqid.'.segva-hover .segva-link a:after {';
      $inline_style .= ( $btn_border_color ) ? 'background:'. $btn_border_color .';' : '';
      $inline_style .= '}';
    } 

    // add inline style
    add_inline_style( $inline_style );
    $styled_class  = ' segovia-pricing-'.$e_uniqid;
   
    $price_subtitle = $price_subtitle ? '<p>'.$price_subtitle.'</p>' : '';
    $price = $price ? '<h3 class="pricing-title"><span class="pull-left pr-title">'. $price_title.'</span><span class="pull-right pr-amont"><span class="cur-symbol">'.$price_currency.'</span><span class="amount">'. $price .'</span></span></h3>' : '';

    $btn_text = $btn_text ? $btn_text : 'Subscribe Now';
    $btn_link = $btn_link ? '<div class="segva-link"><a href="'.$btn_link.'"><i class="fa fa-angle-right" aria-hidden="true"></i> '.$btn_text.'</a></div>' : '';

    // Output
    $output ='<div class="segva-item pricing-item '. $class. $styled_class.'">
           '.$price.'
            '.$price_subtitle.' <ul> ';
           
    // Foreach features
    $i = 1;
    foreach ( $get_each_list as $list_item ) {

       if($list_item['pricing_feature']) {
            $feature_class = 'disable-feature';
          }
          else {
            $feature_class = '';
          }
      
      $output .= '<li class="'.$feature_class.'">'.$list_item['price_features'].'</li>';
    }
    // Foreach features

    $output .= '</ul>'.$btn_link.'</div>';
    return $output;

  }
}
add_shortcode( 'segovia_pricing_box', 'segovia_pricing_box_function' ); ?>
