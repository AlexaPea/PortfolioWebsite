<?php
/**
 * Clients - Shortcode Options
 */
add_action( 'init', 'segovia_image_info_vc_map' );
if ( ! function_exists( 'segovia_image_info_vc_map' ) ) {
  function segovia_image_info_vc_map() {
    vc_map( array(
      "name" => __( "Image Info", 'segovia-core'),
      "base" => "segovia_image_info",
      "description" => __( "Image Info Section", 'segovia-core'),
      "icon" => "fa fa-external-link color-green",
      "category" => SegoviaLib::segovia_cat_name(),
      "params" => array(

         SegoviaLib::vt_notice_field(__( "Image Info Section", 'segovia-core' ),'tle_opt','cs-warning', ''), // Notice
        array(
          "type"      => 'attach_image',
            "param_name" => "banner_image",
          "heading"   => __('Upload Your Image Info Image', 'segovia-core'),
          "value"      => "",
          "description" => __( "Set your banner Image.", 'segovia-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
          'admin_label' => true,
        ),
          array(
            'type' => 'textfield',
            'value' => '',
            'heading' => __( 'Button Text', 'segovia-core' ),
            'param_name' => 'list_text',
            'edit_field_class'  => 'vc_col-md-6 vc_column vt_field_space',
          ),
          array(
            'type' => 'textfield',
            'value' => '',
            'heading' => __( 'Button Text Link', 'segovia-core' ),
            'param_name' => 'text_link',
            'edit_field_class'  => 'vc_col-md-6 vc_column vt_field_space',
          ),
          array(
            "type" => "checkbox",
            "heading" => __( "Open New Tab?", 'segovia-core' ),
            "param_name" => "open_link",
            "std" => false,
            'value' => '',
            "on_text" => __( "Yes", 'segovia-core' ),
            "off_text" => __( "No", 'segovia-core' ),
            'edit_field_class'  => 'vc_col-md-6 vc_column vt_field_space',
          ),
          array(
            'type' => 'textfield',
            'value' => '',
            'heading' => __( 'Image Border Radius', 'segovia-core' ),
            'param_name' => 'border_radius',
            'edit_field_class'  => 'vc_col-md-6 vc_column vt_field_space',
             "description" => __( "Enter image section border radius.", 'segovia-core'),
          ),
           array(
          "type" => "dropdown",
          "heading" => esc_html__( "Button Alignment", 'segovia-core' ),
          "param_name" => "text_align",
          'value' => array(
            esc_html__( 'Center', 'segovia-core' ) => 'text-center',
            esc_html__( 'Left', 'segovia-core' ) => 'text-left',
            esc_html__( 'Right', 'segovia-core' ) => 'text-right',
          ),
          'edit_field_class'  => 'vc_col-md-6 vc_column vt_field_space',
        ),
     
        SegoviaLib::vt_class_option(),

         // Style
         array(
          "type"        => "notice",
          "heading"     => __( "Section Styles", 'segovia-core' ),
          "param_name"  => 'lsng_opt',
          'class'       => 'cs-warning',
          'value'       => '',
        ),
        array(
          "type"        =>'colorpicker',
          "heading"     =>__('Image Overlay', 'segovia-core'),
          "param_name"  => "overlay_color",
          "value"       => "",
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type"        =>'textfield',
          "heading"     =>__('Button Text Size', 'segovia-core'),
          "param_name"  => "btn_text_size",
          "value"       => "",
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type"        =>'colorpicker',
          "heading"     =>__('Button Text Color', 'segovia-core'),
          "param_name"  => "btn_text_color",
          "value"       => "",
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type"        =>'colorpicker',
          "heading"     =>__('Button Background Color', 'segovia-core'),
          "param_name"  => "btn_bg_color",
          "value"       => "",
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type"        =>'colorpicker',
          "heading"     =>__('Button Text Hover Color', 'segovia-core'),
          "param_name"  => "btn_text_hover_color",
          "value"       => "",
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type"        =>'colorpicker',
          "heading"     =>__('Button BG Hover Color', 'segovia-core'),
          "param_name"  => "btn_bg_hover_color",
          "value"       => "",
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
       
   

      )
    ) );
  }
}
