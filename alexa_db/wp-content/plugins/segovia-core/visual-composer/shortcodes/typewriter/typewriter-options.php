<?php
/**
 * TypeWriter - Shortcode Options
 */
add_action( 'init', 'segovia_typewriter_vc_map' );
if ( ! function_exists( 'segovia_typewriter_vc_map' ) ) {
  function segovia_typewriter_vc_map() {
    vc_map( array(
      "name" => __( "Typewriter", 'segovia-core'),
      "base" => "segovia_typewriter",
      "description" => __( "Typewriter Shortcodes", 'segovia-core'),
      "icon" => "fa fa-text-width color-orange",
      "category" => SegoviaLib::segovia_cat_name(),
      "params" => array(

        SegoviaLib::vt_notice_field(__( "Content Area", 'segovia-core' ),'cntara_opt','cs-warning', ''), // Notice
        array(
          "type"      => 'textarea_html',
          "heading"   => __('Content', 'segovia-core'),
          "param_name" => "content",
          "value"      => "",
          "description" => __( "Enter your Typewriter content here.", 'segovia-core')
        ),
        array(
          "type" => "dropdown",
          "heading" => esc_html__( "Typewriter Align", 'segovia-core' ),
          "param_name" => "text_align",
          'value' => array(
            esc_html__( 'Center', 'segovia-core' ) => 'text-center',
            esc_html__( 'Left', 'segovia-core' ) => 'text-left',
            esc_html__( 'Right', 'segovia-core' ) => 'text-right',
          ),
          'edit_field_class'  => 'vc_col-md-12 vc_column vt_field_space',
        ),

        SegoviaLib::vt_class_option(),

        // Style
        SegoviaLib::vt_notice_field(__( "Title Styling", 'segovia-core' ),'tle_opt','cs-warning', 'Style'), // Notice
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
        array(
          "type"      => 'colorpicker',
          "heading"   => __('Typewriter Text Color', 'segovia-core'),
          "param_name" => "typewriter_color",
          "value"      => "",
          "description" => __( "Pick your typewriter text color.", 'segovia-core'),
          "group" => __( "Style", 'segovia-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type"      => 'textfield',
          "heading"   => __('Typewriter Text Size', 'segovia-core'),
          "param_name" => "typewriter_size",
          "value"      => "",
          "description" => __( "Enter the numeric value for typewriter text size in px.", 'segovia-core'),
          "group" => __( "Style", 'segovia-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
         array(
          "type"      => 'colorpicker',
          "heading"   => __('Typewriter Text Line Color', 'segovia-core'),
          "param_name" => "typewriter_line_color",
          "value"      => "",
          "description" => __( "Pick your typewriter typed text line color.", 'segovia-core'),
          "group" => __( "Style", 'segovia-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
      )
    ) );
  }
}
