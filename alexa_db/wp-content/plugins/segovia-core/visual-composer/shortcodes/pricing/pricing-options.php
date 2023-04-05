<?php
/**
 * Pricing Box - Shortcode Options
 */
add_action( 'init', 'segovia_pricing_box_vc_map' );
if ( ! function_exists( 'segovia_pricing_box_vc_map' ) ) {
  function segovia_pricing_box_vc_map() {
    vc_map( array(
      "name" => __( "Pricing Box", 'segovia-core'),
      "base" => "segovia_pricing_box",
      "description" => __( "Pricing Box", 'segovia-core'),
      "icon" => "fa fa-usd color-orange",
      "category" => SegoviaLib::segovia_cat_name(),
      "params" => array(
       
        array(
          "type" => "textfield",
          "heading" => __( "Plan Title", 'segovia-core' ),
          "param_name" => "price_title",
          'value' => '',
          'admin_label' => true,
          "description" => __( "Enter your pricing_box title.", 'segovia-core'),
        ),
        array(
          "type" => "textarea",
          "heading" => __( "Plan Description", 'segovia-core' ),
          "param_name" => "price_subtitle",
          'value' => '',
          "description" => __( "Enter your pricing description.", 'segovia-core'),
        ),
        array(
          "type" => "textfield",
          "heading" => __( "Plan Cost", 'segovia-core' ),
          "param_name" => "price",
          'edit_field_class'   => 'vc_col-md-4 vc_column vt_field_space',          
          'value' => '',
        ),
        array(
          "type" => "textfield",
          "heading" => __( "Currency", 'segovia-core' ),
          "param_name" => "price_currency",
          'edit_field_class'   => 'vc_col-md-4 vc_column vt_field_space',
          'value' => '',
        ),
        array(
          "type" => "textfield",
          "heading" => __( "Button Text", 'segovia-core' ),
          "param_name" => "btn_text",
          'value' => '',
        ),
        array(
          "type" => "textfield",
          "heading" => __( "Button Link", 'segovia-core' ),
          "param_name" => "btn_link",
          'value' => '',
        ),
        SegoviaLib::vt_class_option(),

        // List of features
        array(
          'type' => 'param_group',
          'value' => '',
          'heading' => __( 'Features', 'segovia-core' ),
          'param_name' => 'pricing_box_features',
          'params' => array(
            array(
              'type' => 'textfield',
              'value' => '',
              'heading' => __( 'Features', 'segovia-core' ),
              'param_name' => 'price_features',
              'admin_label' => true,
            ),  
            array(
            "type" => "switcher",
            "heading" => __( "Disable Feature?", 'segovia-core' ),
            "param_name" => "pricing_feature",
            "std" => false,
            'value' => '',
            "on_text" => __( "Yes", 'segovia-core' ),
            "off_text" => __( "No", 'segovia-core' ),
            'edit_field_class'  => 'vc_col-md-6 vc_column vt_field_space',
          ),          

          )
        ),

        // Style
         SegoviaLib::vt_notice_field(__( "Title Styling", 'segovia-core' ),'tle_opt','cs-info', 'Style'), // Notice
          array(
          "type"      => 'textfield',
          "heading"   => __('Title Size', 'segovia-core'),
          "param_name" => "title_size",
          "value"      => "",
          "description" => __( "Enter title size.", 'segovia-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
          "group"     =>__('Style', 'segovia-core'),
        ),
        array(
          "type"        =>'colorpicker',
          "heading"     =>__('Title Color', 'segovia-core'),
          "param_name"  => "title_color",
          "value"       => "",
          'edit_field_class'   => 'vc_col-md-4 vc_column vt_field_space',
          "group"     =>__('Style', 'segovia-core'),
        ),

        SegoviaLib::vt_notice_field(__( "Price Styling", 'segovia-core' ),'tle_opt','cs-info', 'Style'), // Notice
        array(
          "type"      => 'textfield',
          "heading"   => __('Price Size', 'segovia-core'),
          "param_name" => "price_size",
          "value"      => "",
          "description" => __( "Enter price size.", 'segovia-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
          "group"     =>__('Style', 'segovia-core'),
        ),
        array(
          "type"        =>'colorpicker',
          "heading"     =>__('Price Color', 'segovia-core'),
          "param_name"  => "price_color",
          "value"       => "",
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
          "group"     =>__('Style', 'segovia-core'),
        ), 
        array(
          "type"      => 'textfield',
          "heading"   => __('Currency Symbol Size', 'segovia-core'),
          "param_name" => "cur_size",
          "value"      => "",
          "description" => __( "Enter Currency Symbol size.", 'segovia-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
          "group"     =>__('Style', 'segovia-core'),
        ),
        array(
          "type"        =>'colorpicker',
          "heading"     =>__('Currency Symbol Color', 'segovia-core'),
          "param_name"  => "cur_color",
          "value"       => "",
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
          "group"     =>__('Style', 'segovia-core'),
        ), 

        SegoviaLib::vt_notice_field(__( "Description Styling", 'segovia-core' ),'tle_opt','cs-info', 'Style'), // Notice
         array(
          "type"      => 'textfield',
          "heading"   => __('Description Size', 'segovia-core'),
          "param_name" => "desc_size",
          "value"      => "",
          "description" => __( "Enter description size.", 'segovia-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
          "group"     =>__('Style', 'segovia-core'),
        ),
        array(
          "type"        =>'colorpicker',
          "heading"     =>__('Description Color', 'segovia-core'),
          "param_name"  => "desc_color",
          "value"       => "",
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
          "group"     =>__('Style', 'segovia-core'),
        ), 
        SegoviaLib::vt_notice_field(__( "Pricing Features Styling", 'segovia-core' ),'tle_opt','cs-info', 'Style'), // Notice
        array(
          "type"      => 'textfield',
          "heading"   => __('Feature Text Size', 'segovia-core'),
          "param_name" => "feature_size",
          "value"      => "",
          "description" => __( "Enter Feature size.", 'segovia-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
          "group"     =>__('Style', 'segovia-core'),
        ),
        array(
          "type"        =>'colorpicker',
          "heading"     =>__('Feature Text Color', 'segovia-core'),
          "param_name"  => "feature_color",
          "value"       => "",
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
          "group"     =>__('Style', 'segovia-core'),
        ), 
        array(
          "type"      => 'textfield',
          "heading"   => __('Feature Icon Size', 'segovia-core'),
          "param_name" => "feature_icon_size",
          "value"      => "",
          "description" => __( "Enter Feature Icon size.", 'segovia-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
          "group"     =>__('Style', 'segovia-core'),
        ),
        array(
          "type"        =>'colorpicker',
          "heading"     =>__('Feature Icon Color', 'segovia-core'),
          "param_name"  => "feature_icon_color",
          "value"       => "",
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
          "group"     =>__('Style', 'segovia-core'),
        ), 
        array(
          "type"      => 'textfield',
          "heading"   => __('Disable feature Text Size', 'segovia-core'),
          "param_name" => "disable_size",
          "value"      => "",
          "description" => __( "Enter Feature Icon size.", 'segovia-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
          "group"     =>__('Style', 'segovia-core'),
        ),
        array(
          "type"        =>'colorpicker',
          "heading"     =>__('Disable Feature Text Color', 'segovia-core'),
          "param_name"  => "disable_color",
          "value"       => "",
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
          "group"     =>__('Style', 'segovia-core'),
        ), 

        SegoviaLib::vt_notice_field(__( "Background Styling", 'segovia-core' ),'tle_opt','cs-info', 'Style'), // Notice
        array(
          "type"        =>'colorpicker',
          "heading"     =>__('Pricing Background Color', 'segovia-core'),
          "param_name"  => "price_bg_color",
          "value"       => "",
          'edit_field_class'   => 'vc_col-md-4 vc_column vt_field_space',
          "group"     =>__('Style', 'segovia-core'),
        ),
        SegoviaLib::vt_notice_field(__( "Button Link Styling", 'segovia-core' ),'tle_opt','cs-info', 'Style'), // Notice
         array(
          "type"      => 'textfield',
          "heading"   => __('Button text Size', 'segovia-core'),
          "param_name" => "btn_text_size",
          "value"      => "",
          "description" => __( "Enter Feature Icon size.", 'segovia-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
          "group"     =>__('Style', 'segovia-core'),
        ),
        array(
          "type"        =>'colorpicker',
          "heading"     =>__('Button Text Color', 'segovia-core'),
          "param_name"  => "btn_text_color",
          "value"       => "",
          'edit_field_class'   => 'vc_col-md-4 vc_column vt_field_space',
          "group"     =>__('Style', 'segovia-core'),
        ),
        array(
          "type"        =>'colorpicker',
          "heading"     =>__('Button Text Hover Color', 'segovia-core'),
          "param_name"  => "btn_text_hover_color",
          "value"       => "",
          'edit_field_class'   => 'vc_col-md-4 vc_column vt_field_space',
          "group"     =>__('Style', 'segovia-core'),
        ),
        array(
          "type"        =>'colorpicker',
          "heading"     =>__('Button Hover Border Color', 'segovia-core'),
          "param_name"  => "btn_border_color",
          "value"       => "",
          'edit_field_class'   => 'vc_col-md-4 vc_column vt_field_space',
          "group"     =>__('Style', 'segovia-core'),
        ),
      )
    ) );
  }
}
