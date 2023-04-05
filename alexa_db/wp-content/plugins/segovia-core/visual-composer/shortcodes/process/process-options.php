<?php
/**
 * Services - Shortcode Options
 */
add_action( 'init', 'segovia_process_vc_map' );
if ( ! function_exists( 'segovia_process_vc_map' ) ) {
  function segovia_process_vc_map() {
    vc_map( array(
      "name" => __( "Our Process", 'segovia-core'),
      "base" => "segva_process",
      "description" => __( "Our Process Shortcodes", 'segovia-core'),
      "icon" => "fa fa-cog color-brown",
      "category" => SegoviaLib::segovia_cat_name(),
      "params" => array(

        // SegoviaLib::vt_open_link_tab(),
        array(
          "type"      => 'attach_image',
          "heading"   => __('Upload Process Image', 'segovia-core'),
          "param_name" => "process_image",
          "value"      => "",
          "description" => __( "Set your process image.", 'segovia-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type"      => 'textfield',
          "heading"   => __('Process Title', 'segovia-core'),
          "param_name" => "process_title",
          "value"      => "",
          "description" => __( "Enter your process title.", 'segovia-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
          'admin_label' => true,
        ),
        array(
          "type"      => 'href',
          "heading"   => __('Process Link', 'segovia-core'),
          "param_name" => "process_link",
          "value"      => "",
          "description" => __( "Enter your process link.", 'segovia-core'),
          'edit_field_class'   => 'vc_col-md-12 vc_column vt_field_space',
        ),
        array(
          "type" => "switcher",
          "heading" => __( "Process Link Open New Tab?", 'segovia-core' ),
          "param_name" => "open_link",
          "std" => false,
          'value' => '',
          "on_text" => __( "Yes", 'segovia-core' ),
          "off_text" => __( "No", 'segovia-core' ),
          'edit_field_class'  => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type" => "switcher",
          "heading" => __( "Process Need Right Border?", 'segovia-core' ),
          "param_name" => "process_border",
          "std" => true,
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
          "param_name"  => "process_title_size",
          "value"       => "",
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
          "group"     =>__('Style', 'segovia-core'),
        ),
        array(
          "type"        =>'colorpicker',
          "heading"     =>__('Title Color', 'segovia-core'),
          "param_name"  => "process_title_color",
          "value"       => "",
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
          "group"     =>__('Style', 'segovia-core'),
        ),
        array(
          "type"        =>'colorpicker',
          "heading"     =>__('Title Hover Color', 'segovia-core'),
          "param_name"  => "process_title_hover_color",
          "value"       => "",
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
          "group"     =>__('Style', 'segovia-core'),
        ),
        array(
          "type"        =>'colorpicker',
          "heading"     =>__('Image  Overlay Color', 'segovia-core'),
          "param_name"  => "image_bg_color",
          "value"       => "",
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
          "group"     =>__('Style', 'segovia-core'),
        ),
        array(
          "type"        =>'colorpicker',
          "heading"     =>__('Image Hover Overlay Color', 'segovia-core'),
          "param_name"  => "image_overlay_color",
          "value"       => "",
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
          "group"     =>__('Style', 'segovia-core'),
        ),
      )
    ) );
  }
}
