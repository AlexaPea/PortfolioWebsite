<?php
/**
 * Clients - Shortcode Options
 */
add_action( 'init', 'segovia_about_me_vc_map' );
if ( ! function_exists( 'segovia_about_me_vc_map' ) ) {
  function segovia_about_me_vc_map() {
    vc_map( array(
      "name" => __( "About Me", 'segovia-core'),
      "base" => "segovia_about_me",
      "description" => __( "About Me Section", 'segovia-core'),
      "icon" => "fa fa-shield color-orange",
      "category" => SegoviaLib::segovia_cat_name(),
      "params" => array(

        array(
          "type" => "textfield",
          "heading" => __( "Your Title", 'segovia-core' ),
          "param_name" => "about_title",
          'value' => '',
          "description" => __( "Enter your about me title.", 'segovia-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',

        ),
        array(
          "type"      => 'attach_image',
            "param_name" => "about_image",
          "heading"   => __('Upload Your Image', 'segovia-core'),
          "value"      => "",
          "description" => __( "Set your Image.", 'segovia-core'),
          'edit_field_class'   => 'vc_col-md-4 vc_column vt_field_space',
          'admin_label' => true,
        ),
        array(
          "type" => "textarea",
          "heading" => __( "Your Content", 'segovia-core' ),
          "param_name" => "about_content",
          'value' => '',
          "description" => __( "Enter your about content.", 'segovia-core'),
        ),
        array(
          "type" => "textfield",
          "heading" => __( "Download Text", 'segovia-core' ),
          "param_name" => "about_link_text",
          'value' => '',
          "description" => __( "Enter your link text.", 'segovia-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
         array(
          'type' => 'vt_icon',
          'value' => '',
          'heading' => __( 'Download Text Icon', 'segovia-core' ),
          'param_name' => 'select_link_icon',
          'edit_field_class'  => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type" => "textfield",
          "heading" => __( "Download Text Link ", 'segovia-core' ),
          "param_name" => "about_text_link",
          'value' => '',
          "description" => __( "Enter your link .", 'segovia-core'),
          'edit_field_class'  => 'vc_col-md-6 vc_column vt_field_space',
        ),
       
         array(
          "type" => "switcher",
          "heading" => __( "Open New Tab?", 'segovia-core' ),
          "param_name" => "open_link",
          "std" => false,
          'value' => '',
          "on_text" => __( "Yes", 'segovia-core' ),
          "off_text" => __( "No", 'segovia-core' ),
          'edit_field_class'  => 'vc_col-md-6 vc_column vt_field_space',
        ),
     
        // client logos
        array(
          'type' => 'param_group',
          'value' => '',
          'heading' => __( 'Social Icons', 'segovia-core' ),
          'param_name' => 'social_items',
          // Note params is mapped inside param-group:
          'params' => array(
            array(
              "type"      => 'vt_icon',
              "heading"   => __('Upload Social Icon', 'segovia-core'),
              "param_name" => "social_icon",
              "value"      => "",
              "description" => __( "Set your social madia icon.", 'segovia-core'),
              'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
              'admin_label' => true,
            ),
            array(
              "type" => "textfield",
              "heading" => __( "Social Media Name", 'segovia-core' ),
              "param_name" => "social_name",
              'value' => '',
              "description" => __( "Enter your social media name.", 'segovia-core'),
            ),
            array(
              "type" => "textfield",
              "heading" => __( "Social Media Link", 'segovia-core' ),
              "param_name" => "social_link",
              'value' => '',
              "description" => __( "Enter your social media link.", 'segovia-core'),
            ),
           
          )

        ),

        SegoviaLib::vt_class_option(),

         // Style
         array(
          "type"        => "notice",
          "heading"     => __( "Title Section Styles", 'segovia-core' ),
          "param_name"  => 'lsng_opt',
          'class'       => 'cs-warning',
          'value'       => '',
          "group"     =>__('Style', 'segovia-core'),
        ),
        array(
          "type"        =>'textfield',
          "heading"     =>__('Title Size', 'segovia-core'),
          "param_name"  => "title_size",
          "value"       => "",
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
          "group"     =>__('Style', 'segovia-core'),
        ),
        array(
          "type"        =>'colorpicker',
          "heading"     =>__('Title Color', 'segovia-core'),
          "param_name"  => "title_color",
          "value"       => "",
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
          "group"     =>__('Style', 'segovia-core'),
        ),
         array(
          "type"        => "notice",
          "heading"     => __( "Content Section Styles", 'segovia-core' ),
          "param_name"  => 'lsng_opt',
          'class'       => 'cs-warning',
          'value'       => '',
          "group"     =>__('Style', 'segovia-core'),
        ),
         array(
          "type"        =>'textfield',
          "heading"     =>__('Content Size', 'segovia-core'),
          "param_name"  => "content_size",
          "value"       => "",
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
          "group"     =>__('Style', 'segovia-core'),
        ),
        array(
          "type"        =>'colorpicker',
          "heading"     =>__('Content Color', 'segovia-core'),
          "param_name"  => "content_color",
          "value"       => "",
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
          "group"     =>__('Style', 'segovia-core'),
        ),
          array(
          "type"        => "notice",
          "heading"     => __( "Link Section Styles", 'segovia-core' ),
          "param_name"  => 'lsng_opt',
          'class'       => 'cs-warning',
          'value'       => '',
          "group"     =>__('Style', 'segovia-core'),
        ),
        array(
          "type"        =>'textfield',
          "heading"     =>__('Link Text Size', 'segovia-core'),
          "param_name"  => "link_text_size",
          "value"       => "",
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
          "group"     =>__('Style', 'segovia-core'),
        ),
        array(
          "type"        =>'colorpicker',
          "heading"     =>__('Link Text Color', 'segovia-core'),
          "param_name"  => "link_text_color",
          "value"       => "",
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
          "group"     =>__('Style', 'segovia-core'),
        ),
        array(
          "type"        =>'textfield',
          "heading"     =>__('Link Icon Size', 'segovia-core'),
          "param_name"  => "link_icon_size",
          "value"       => "",
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
          "group"     =>__('Style', 'segovia-core'),
        ),
        array(
          "type"        =>'colorpicker',
          "heading"     =>__('Link Icon Color', 'segovia-core'),
          "param_name"  => "link_icon_color",
          "value"       => "",
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
          "group"     =>__('Style', 'segovia-core'),
        ),
         array(
          "type"        =>'colorpicker',
          "heading"     =>__('Link Border Color', 'segovia-core'),
          "param_name"  => "link_border_color",
          "value"       => "",
          'edit_field_class'   => 'vc_col-md-4 vc_column vt_field_space',
          "group"     =>__('Style', 'segovia-core'),
        ),
        array(
          "type"        =>'colorpicker',
          "heading"     =>__('Link Text Hover Color', 'segovia-core'),
          "param_name"  => "link_text_hover_color",
          "value"       => "",
          'edit_field_class'   => 'vc_col-md-4 vc_column vt_field_space',
          "group"     =>__('Style', 'segovia-core'),
        ),
        array(
          "type"        =>'colorpicker',
          "heading"     =>__('Link Icon Hover Color', 'segovia-core'),
          "param_name"  => "link_icon_hover_color",
          "value"       => "",
          'edit_field_class'   => 'vc_col-md-4 vc_column vt_field_space',
          "group"     =>__('Style', 'segovia-core'),
        ),

        array(
          "type"        => "notice",
          "heading"     => __( "Social Section Styles", 'segovia-core' ),
          "param_name"  => 'lsng_opt',
          'class'       => 'cs-warning',
          'value'       => '',
          "group"     =>__('Style', 'segovia-core'),
        ),
        array(
          "type"        =>'textfield',
          "heading"     =>__('Social Text Size', 'segovia-core'),
          "param_name"  => "social_text_size",
          "value"       => "",
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
          "group"     =>__('Style', 'segovia-core'),
        ),
        array(
          "type"        =>'colorpicker',
          "heading"     =>__('Social Text Color', 'segovia-core'),
          "param_name"  => "social_text_color",
          "value"       => "",
          'edit_field_class'   => 'vc_col-md-4 vc_column vt_field_space',
          "group"     =>__('Style', 'segovia-core'),
        ),
        array(
          "type"        =>'textfield',
          "heading"     =>__('Social Icon Size', 'segovia-core'),
          "param_name"  => "social_icon_size",
          "value"       => "",
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
          "group"     =>__('Style', 'segovia-core'),
        ),
     
        array(
          "type"        =>'colorpicker',
          "heading"     =>__('Social Icon Color', 'segovia-core'),
          "param_name"  => "social_icon_color",
          "value"       => "",
          'edit_field_class'   => 'vc_col-md-4 vc_column vt_field_space',
          "group"     =>__('Style', 'segovia-core'),
        ),
        
        array(
          "type"        =>'colorpicker',
          "heading"     =>__('Social Title Hover Color', 'segovia-core'),
          "param_name"  => "social_title_hover_color",
          "value"       => "",
          'edit_field_class'   => 'vc_col-md-4 vc_column vt_field_space',
          "group"     =>__('Style', 'segovia-core'),
        ),
        array(
          "type"        =>'colorpicker',
          "heading"     =>__('Social Icon Hover Color', 'segovia-core'),
          "param_name"  => "social_icon_hover_color",
          "value"       => "",
          'edit_field_class'   => 'vc_col-md-4 vc_column vt_field_space',
          "group"     =>__('Style', 'segovia-core'),
        ),
        array(
          "type"        => "notice",
          "heading"     => __( "Social Background Styles", 'segovia-core' ),
          "param_name"  => 'lsng_opt',
          'class'       => 'cs-warning',
          'value'       => '',
          "group"     =>__('Style', 'segovia-core'),
        ),
        array(
          "type"        =>'colorpicker',
          "heading"     =>__('Social Background Color', 'segovia-core'),
          "param_name"  => "social_background_color",
          "value"       => "",
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
          "group"     =>__('Style', 'segovia-core'),
        ),
        array(
          "type"        =>'colorpicker',
          "heading"     =>__('Social Background Hover Color', 'segovia-core'),
          "param_name"  => "social_bg_hover_color",
          "value"       => "",
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
          "group"     =>__('Style', 'segovia-core'),
        ),

      )
    ) );
  }
}
