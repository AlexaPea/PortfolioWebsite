<?php
/**
 * Counter - Shortcode Options
 */
add_action( 'init', 'segovia_counter_vc_map' );
if ( ! function_exists( 'segovia_counter_vc_map' ) ) {
  function segovia_counter_vc_map() {
    vc_map( array(
      "name" => __( "Counter", 'segovia-core'),
      "base" => "segva_counter",
      "description" => __( "Counter Styles", 'segovia-core'),
      "icon" => "fa fa-sort-numeric-asc color-blue",
      "category" => SegoviaLib::segovia_cat_name(),
      "params" => array(

        array(
          "type"        =>'textfield',
          "heading"     =>__('Title', 'segovia-core'),
          "param_name"  => "counter_title",
          "value"       => "",
          "description" => __( "Enter your counter title.", 'segovia-core')
        ),
        array(
          "type"        =>'textfield',
          "heading"     =>__('Counter Value', 'segovia-core'),
          "param_name"  => "counter_value",
          "value"       => "",
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
          "description" => __( "Enter numeric value to count. Ex : 20", 'segovia-core')
        ),
        array(
          "type"        =>'textfield',
          "heading"     =>__('Value In', 'segovia-core'),
          "param_name"  => "counter_value_in",
          "value"       => "",
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
          "description" => __( "Enter value in symbol or text. Eg : +", 'segovia-core')
        ),
        array(
          "type" => "switcher",
          "heading" => __( "Enable Light Value In", 'segovia-core' ),
          "param_name" => "light_value",
          "std" => false,
          'value' => '',
          'edit_field_class'  => 'vc_col-md-6 vc_column vt_field_space',
        ),
       
        SegoviaLib::vt_class_option(),

        // Stylings
        array(
          "type"        => 'colorpicker',
          "heading"     => __('Title Color', 'segovia-core'),
          "param_name"  => "counter_title_color",
          "value"       => "",
          'edit_field_class'   => 'vc_col-md-4 vt_field_space',
          "group"       => __('Style', 'segovia-core'),
        ),
        array(
          "type"        => 'colorpicker',
          "heading"     => __('Counter Color', 'segovia-core'),
          "param_name"  => "counter_value_color",
          "value"       => "",
          'edit_field_class'   => 'vc_col-md-4 vt_field_space',
          "group"       => __('Style', 'segovia-core'),
        ),
        array(
          "type"        => 'colorpicker',
          "heading"     => __('Value In Color', 'segovia-core'),
          "param_name"  => "counter_value_in_color",
          "value"       => "",
          'edit_field_class'   => 'vc_col-md-4 vt_field_space',
          "group"       => __('Style', 'segovia-core'),
        ),
        // Size
        array(
          "type"        => 'textfield',
          "heading"     => __('Title Size', 'segovia-core'),
          "param_name"  => "counter_title_size",
          "value"       => "",
          'edit_field_class'   => 'vc_col-md-4 vt_field_space',
          "group"       => __('Style', 'segovia-core'),
          "description" => __( "Enter font size in px.", 'segovia-core')
        ),
        array(
          "type"        => 'textfield',
          "heading"     => __('Counter Size', 'segovia-core'),
          "param_name"  => "counter_value_size",
          "value"       => "",
          'edit_field_class'   => 'vc_col-md-4 vt_field_space',
          "group"       => __('Style', 'segovia-core'),
          "description" => __( "Enter font size in px.", 'segovia-core')
        ),
        array(
          "type"        => 'textfield',
          "heading"     => __('Value In Size', 'segovia-core'),
          "param_name"  => "counter_value_in_size",
          "value"       => "",
          'edit_field_class'   => 'vc_col-md-4 vt_field_space',
          "group"       => __('Style', 'segovia-core'),
          "description" => __( "Enter font size in px.", 'segovia-core')
        ),

      )
    ) );
  }
}
