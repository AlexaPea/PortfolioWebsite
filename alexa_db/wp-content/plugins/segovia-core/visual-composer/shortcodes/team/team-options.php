<?php
/**
 * Team - Shortcode Options
 */
add_action( 'init', 'segovia_team_vc_map' );
if ( ! function_exists( 'segovia_team_vc_map' ) ) {
  function segovia_team_vc_map() {
    vc_map( array(
    "name" => __( "Team", 'segovia-core'),
    "base" => "segovia_team",
    "description" => __( "Team Style", 'segovia-core'),
    "icon" => "fa fa-users color-red",
    "category" => SegoviaLib::segovia_cat_name(),
    "params" => array(

        array(
          "type"        => "notice",
          "heading"     => __( "Listing", 'segovia-core' ),
          "param_name"  => 'lsng_opt',
          'class'       => 'cs-warning',
          'value'       => '',
        ),
        array(
          "type"        =>'textfield',
          "heading"     =>__('Limit', 'segovia-core'),
          "param_name"  => "team_limit",
          "value"       => "",
          "description" => __( "Enter the number of items to show.", 'segovia-core'),
        ),
        array(
          "type"        => 'textfield',
          "heading"     => __('Specific ID', 'segovia-core'),
          "param_name"  => "team_id",
          "value"       => "",
          "description" => __( "Enter your team members ID, to show them only by your choice.", 'segovia-core'),
        ),
        array(
          'type' => 'dropdown',
          'heading' => __( 'Order', 'segovia-core' ),
          'value' => array(
            __( 'Select Team Order', 'segovia-core' ) => '',
            __('Asending', 'segovia-core') => 'ASC',
            __('Desending', 'segovia-core') => 'DESC',
          ),
          'param_name' => 'team_order',
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          'type' => 'dropdown',
          'heading' => __( 'Order By', 'segovia-core' ),
          'value' => array(
            __('None', 'segovia-core') => 'none',
            __('ID', 'segovia-core') => 'ID',
            __('Author', 'segovia-core') => 'author',
            __('Title', 'segovia-core') => 'title',
            __('Date', 'segovia-core') => 'date',
          ),
          'param_name' => 'team_orderby',
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
        SegoviaLib::vt_class_option(),

        // Style
        array(
          "type"        =>'colorpicker',
          "heading"     =>__('Name Color', 'segovia-core'),
          "param_name"  => "name_color",
          "value"       => "",
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
          "group"     =>__('Style', 'segovia-core'),
        ),
        array(
          "type"        =>'colorpicker',
          "heading"     =>__('Name Hover Color', 'segovia-core'),
          "param_name"  => "name_hover_color",
          "value"       => "",
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
          "group"     =>__('Style', 'segovia-core'),
        ),
        array(
          "type"        =>'colorpicker',
          "heading"     =>__('Profession Color', 'segovia-core'),
          "param_name"  => "profession_color",
          "value"       => "",
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
          "group"     =>__('Style', 'segovia-core'),
        ),
        array(
          "type"        =>'colorpicker',
          "heading"     =>__('Overlay Color', 'segovia-core'),
          "param_name"  => "overlay_color",
          "value"       => "",
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
          "group"     =>__('Style', 'segovia-core'),
        ),

        // Size
        array(
          "type"        =>'textfield',
          "heading"     =>__('Name Size', 'segovia-core'),
          "param_name"  => "name_size",
          "value"       => "",
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
          "group"     =>__('Style', 'segovia-core'),
        ),
        array(
          "type"        =>'textfield',
          "heading"     =>__('Profession Size', 'segovia-core'),
          "param_name"  => "profession_size",
          "value"       => "",
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
          "group"     =>__('Style', 'segovia-core'),
        ),
      ), // Params
    ) );
  }
}