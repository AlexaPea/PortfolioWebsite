<?php
/**
 * Clients - Shortcode Options
 */
add_action( 'init', 'segovia_banner_vc_map' );
if ( ! function_exists( 'segovia_banner_vc_map' ) ) {
  function segovia_banner_vc_map() {
    vc_map( array(
      "name" => __( "Banner", 'segovia-core'),
      "base" => "segovia_banner",
      "description" => __( "Banner Section", 'segovia-core'),
      "icon" => "fa fa-shield color-green",
      "category" => SegoviaLib::segovia_cat_name(),
      "params" => array(

        array(
          "type" => "textfield",
          "heading" => __( "Banner Caption", 'segovia-core' ),
          "param_name" => "banner_title",
          'value' => '',
          "description" => __( "Enter your banner caption.", 'segovia-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type"      => 'attach_image',
            "param_name" => "banner_image",
          "heading"   => __('Upload Your Banner Image', 'segovia-core'),
          "value"      => "",
          "description" => __( "Set your banner Image.", 'segovia-core'),
          'edit_field_class'   => 'vc_col-md-4 vc_column vt_field_space',
          'admin_label' => true,
        ),
     
        SegoviaLib::vt_class_option(),

         // Style
         array(
          "type"        => "notice",
          "heading"     => __( "Title Section Styles", 'segovia-core' ),
          "param_name"  => 'lsng_opt',
          'class'       => 'cs-warning',
          'value'       => '',
        ),
        array(
          "type"        =>'textfield',
          "heading"     =>__('Title Size', 'segovia-core'),
          "param_name"  => "title_size",
          "value"       => "",
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type"        =>'colorpicker',
          "heading"     =>__('Title Color', 'segovia-core'),
          "param_name"  => "title_color",
          "value"       => "",
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
       
        array(
          "type"        =>'colorpicker',
          "heading"     =>__('Image Overlay', 'segovia-core'),
          "param_name"  => "overlay_color",
          "value"       => "",
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),

      )
    ) );
  }
}
