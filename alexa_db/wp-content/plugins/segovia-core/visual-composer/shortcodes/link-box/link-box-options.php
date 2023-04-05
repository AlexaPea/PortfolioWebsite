<?php
/**
 * Services - Shortcode Options
 */
add_action( 'init', 'link_box_vc_map' );
if ( ! function_exists( 'link_box_vc_map' ) ) {
  function link_box_vc_map() {
    vc_map( array(
      "name" => __( "Link Box", 'segovia-core'),
      "base" => "link_box",
      "description" => __( "Link Box Shortcodes", 'segovia-core'),
      "icon" => "fa fa-cog color-brown",
      "category" => SegoviaLib::segovia_cat_name(),
      "params" => array(

        array(
          "type"      => 'vt_icon',
          "heading"   => __('Upload Icon', 'segovia-core'),
          "param_name" => "link_icon",
          "value"      => "",
          "description" => __( "Set your service icon image.", 'segovia-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
              array(
          "type"      => 'attach_image',
          "heading"   => __('Upload Service Background Image', 'segovia-core'),
          "param_name" => "service_bg_image",
          "value"      => "",
          "description" => __( "Set your service background image.", 'segovia-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
         array(
          "type"      => 'textfield',
          "heading"   => __('Link Box Title', 'segovia-core'),
          "param_name" => "title",
          "value"      => "",
          "description" => __( "Enter your link box title", 'segovia-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
         array(
          "type"      => 'textarea',
          "heading"   => __('Link Box Content', 'segovia-core'),
          "param_name" => "linkbox_content",
          "value"      => "",
          "description" => __( "Enter your link box content", 'segovia-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type" => "textfield",
          "heading" => __( "Button Text", 'segovia-core' ),
          "param_name" => "button_text",
          'value' => '',
          'admin_label' => true,
          "description" => __( "Enter your button text.", 'segovia-core'),
          'edit_field_class'  => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type" => "href",
          "heading" => __( "Button Link", 'segovia-core' ),
          "param_name" => "button_link",
          'value' => '',
          "description" => __( "Enter your button link.", 'segovia-core'),
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
  
        SegoviaLib::vt_class_option(),

        // Style
        array(
          "type" => "colorpicker",
          "heading" => __( "Background Image Overlay Color", 'segovia-core' ),
          "param_name" => "background_overlay_color",
          'value' => '',
          'dependency' => array(
            'element' => 'service_style',
            'value' => 'service-four',
          ),
          "group" => __( "Style", 'segovia-core'),
          'edit_field_class'  => 'vc_col-md-6 vc_column vt_field_space',
        ),
        SegoviaLib::vt_notice_field(__( "Title Styling", 'segovia-core' ),'tle_opt','cs-warning', 'Style'), // Notice
        array(
          "type"      => 'colorpicker',
          "heading"   => __('Title Color', 'segovia-core'),
          "param_name" => "title_color",
          "value"      => "",
          "description" => __( "Pick your heading color.", 'segovia-core'),
          "group" => __( "Style", 'segovia-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type"      => 'textfield',
          "heading"   => __('Title Size', 'segovia-core'),
          "param_name" => "title_size",
          "value"      => "",
          "description" => __( "Enter the numeric value for title size in px.", 'segovia-core'),
          "group" => __( "Style", 'segovia-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
         SegoviaLib::vt_notice_field(__( "Icon Styling", 'segovia-core' ),'icn_opt','cs-warning', 'Style'), // Notice
        array(
          "type"      => 'colorpicker',
          "heading"   => __('Icon Color', 'segovia-core'),
          "param_name" => "icon_color",
          "value"      => "",
          "description" => __( "Pick your icon color.", 'segovia-core'),
          "group" => __( "Style", 'segovia-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type"      => 'textfield',
          "heading"   => __('Icon Size', 'segovia-core'),
          "param_name" => "icon_size",
          "value"      => "",
          "description" => __( "Enter the numeric value for icon size in px.", 'segovia-core'),
          "group" => __( "Style", 'segovia-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
        SegoviaLib::vt_notice_field(__( "Content Styling", 'segovia-core' ),'cnt_opt','cs-warning', 'Style'), // Notice
        array(
          "type"      => 'colorpicker',
          "heading"   => __('Content Color', 'segovia-core'),
          "param_name" => "content_color",
          "value"      => "",
          "description" => __( "Pick your content color.", 'segovia-core'),
          "group" => __( "Style", 'segovia-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type"      => 'textfield',
          "heading"   => __('Content Size', 'segovia-core'),
          "param_name" => "content_size",
          "value"      => "",
          "description" => __( "Enter the numeric value for content size in px.", 'segovia-core'),
          "group" => __( "Style", 'segovia-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
       

        SegoviaLib::vt_notice_field(__( "Button Styling", 'segovia-core' ),'tle_opt','cs-warning', 'Style'), // Notice
        array(
          "type" => "textfield",
          "heading" => __( "Button Text Size", 'segovia-core' ),
          "param_name" => "btn_text_size",
          "group" => __( "Style", 'segovia-core'),
          'edit_field_class'  => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type" => "textfield",
          "heading" => __( "Button Border Radius", 'segovia-core' ),
          "param_name" => "btn_border_radius",
          "group" => __( "Style", 'segovia-core'),
          'edit_field_class'  => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type" => "colorpicker",
          "heading" => __( "Button Text Color", 'segovia-core' ),
          "param_name" => "btn_text_color",
          'value' => '',
          "group" => __( "Style", 'segovia-core'),
          'edit_field_class'  => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type" => "colorpicker",
          "heading" => __( "Button Text Hover Color", 'segovia-core' ),
          "param_name" => "btn_text_hover_color",
          'value' => '',
          "group" => __( "Style", 'segovia-core'),
          'edit_field_class'  => 'vc_col-md-6 vc_column vt_field_space', 
        ),
        array(
          "type" => "colorpicker",
          "heading" => __( "Button Background Color", 'segovia-core' ),
          "param_name" => "btn_bg_color",
          'value' => '',
          "group" => __( "Style", 'segovia-core'),
          'edit_field_class'  => 'vc_col-md-6 vc_column vt_field_space', 
        ),
        array(
          "type" => "colorpicker",
          "heading" => __( "Button Background Hover Color", 'segovia-core' ),
          "param_name" => "btn_bg_hover_color",
          'value' => '',
          "group" => __( "Style", 'segovia-core'),
          'edit_field_class'  => 'vc_col-md-6 vc_column vt_field_space', 
        ),
        array(
          "type" => "colorpicker",
          "heading" => __( "Button Border Color", 'segovia-core' ),
          "param_name" => "btn_border_color",
          'value' => '',
          "group" => __( "Style", 'segovia-core'),
          'edit_field_class'  => 'vc_col-md-6 vc_column vt_field_space', 
        ),
        array(
          "type" => "colorpicker",
          "heading" => __( "Button Border Hover Color", 'segovia-core' ),
          "param_name" => "btn_border_hover_color",
          'value' => '',
          "group" => __( "Style", 'segovia-core'),
          'edit_field_class'  => 'vc_col-md-6 vc_column vt_field_space', 
        ),



      )
    ) );
  }
}
