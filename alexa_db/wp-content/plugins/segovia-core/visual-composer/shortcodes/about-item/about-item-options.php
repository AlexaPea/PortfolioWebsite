<?php
/**
 * Services - Shortcode Options
 */
add_action( 'init', 'segovia_about_item_vc_map' );
if ( ! function_exists( 'segovia_about_item_vc_map' ) ) {
  function segovia_about_item_vc_map() {
    vc_map( array(
      "name" => __( "About Item", 'segovia-core'),
      "base" => "segva_about_item",
      "description" => __( "About Item Shortcodes", 'segovia-core'),
      "icon" => "fa fa-cog color-brown",
      "category" => SegoviaLib::segovia_cat_name(),
      "params" => array(

        // SegoviaLib::vt_open_link_tab(),
        array(
          "type"      => 'attach_image',
          "heading"   => __('Upload Service Image', 'segovia-core'),
          "param_name" => "about_item_image",
          "value"      => "",
          "description" => __( "Set your about item image.", 'segovia-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
      
        array(
          "type"      => 'textfield',
          "heading"   => __('About Item Title', 'segovia-core'),
          "param_name" => "about_item_title",
          "value"      => "",
          "description" => __( "Enter your about item title.", 'segovia-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
          'admin_label' => true,
        ),
          array(
          "type"      => 'textarea',
          "heading"   => __('Item Content', 'segovia-core'),
          "param_name" => "about_item_content",
          "value"      => "",
          "description" => __( "Enter your about item content.", 'segovia-core'),  
        ),
        array(
          "type"      => 'href',
          "heading"   => __('About Item Link', 'segovia-core'),
          "param_name" => "about_item_link",
          "value"      => "",
          "description" => __( "Enter your about item link.", 'segovia-core'),
          
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),

        array(
          "type"      => 'textfield',
          "heading"   => __('Read MoreTitle', 'segovia-core'),
          "param_name" => "read_more_title",
          "value"      => "",
          "description" => __( "Enter your read more title.", 'segovia-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
          array(
          "type" => "switcher",
          "heading" => __( "Item Link Open New Tab?", 'segovia-core' ),
          "param_name" => "open_link",
          "std" => false,
          'value' => '',
          "on_text" => __( "Yes", 'segovia-core' ),
          "off_text" => __( "No", 'segovia-core' ),
          'edit_field_class'  => 'vc_col-md-6 vc_column vt_field_space',
        ),
   
        SegoviaLib::vt_class_option(),

        // Style
        SegoviaLib::vt_notice_field(__( "Title Styling", 'segovia-core' ),'tle_opt','cs-info', 'Style'), // Notice
          array(
          "type"        =>'textfield',
          "heading"     =>__('Title Size', 'segovia-core'),
          "param_name"  => "item_title_size",
          "value"       => "",
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
          "group"     =>__('Style', 'segovia-core'),
        ),
        array(
          "type"        =>'colorpicker',
          "heading"     =>__('Title Color', 'segovia-core'),
          "param_name"  => "item_title_color",
          "value"       => "",
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
          "group"     =>__('Style', 'segovia-core'),
        ),
        array(
          "type"        =>'colorpicker',
          "heading"     =>__('Title Hover Color', 'segovia-core'),
          "param_name"  => "item_title_hover_color",
          "value"       => "",
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
          "group"     =>__('Style', 'segovia-core'),
        ),
        array(
          "type"        =>'colorpicker',
          "heading"     =>__('Image Overlay Color', 'segovia-core'),
          "param_name"  => "image_overlay_color",
          "value"       => "",
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
          "group"     =>__('Style', 'segovia-core'),
        ),

        SegoviaLib::vt_notice_field(__( "Content Styling", 'segovia-core' ),'tle_opt','cs-info', 'Style'), // Notice
        array(
          "type"        =>'textfield',
          "heading"     =>__('Content Size', 'segovia-core'),
          "param_name"  => "item_content_size",
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
        SegoviaLib::vt_notice_field(__( "ReadMore Styling", 'segovia-core' ),'tle_opt','cs-info', 'Style'), // Notice
        array(
          "type"        =>'textfield',
          "heading"     =>__('ReadMore Size', 'segovia-core'),
          "param_name"  => "readmore_size",
          "value"       => "",
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
          "group"     =>__('Style', 'segovia-core'),
        ),
        array(
          "type"        =>'colorpicker',
          "heading"     =>__('ReadMore Color', 'segovia-core'),
          "param_name"  => "readmore_color",
          "value"       => "",
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
          "group"     =>__('Style', 'segovia-core'),
        ),
        array(
          "type"        =>'colorpicker',
          "heading"     =>__('ReadMore Hover Color', 'segovia-core'),
          "param_name"  => "readmore_hover_color",
          "value"       => "",
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
          "group"     =>__('Style', 'segovia-core'),
        ),
         array(
          "type"        =>'colorpicker',
          "heading"     =>__('Hover Border Color', 'segovia-core'),
          "param_name"  => "readmore_border_hover_color",
          "value"       => "",
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
          "group"     =>__('Style', 'segovia-core'),
        ),

      )
    ) );
  }
}
