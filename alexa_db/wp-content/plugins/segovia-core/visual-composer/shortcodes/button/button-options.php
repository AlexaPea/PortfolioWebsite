<?php
/**
 * Button - Shortcode Options
 */
add_action( 'init', 'segovia_button_vc_map' );
if ( ! function_exists( 'segovia_button_vc_map' ) ) {
  function segovia_button_vc_map() {
    vc_map( array(
      "name" => __( "Button", 'segovia-core'),
      "base" => "segva_button",
      "description" => __( "Button Styles", 'segovia-core'),
      "icon" => "fa fa-mouse-pointer color-orange",
      "category" => SegoviaLib::segovia_cat_name(),
      "params" => array(

        array(
          'type' => 'dropdown',
          'heading' => __( 'Button Size', 'segovia-core' ),
          'value' => array(
            __( 'Select Button Size', 'segovia-core' ) => '',
            __( 'Small', 'segovia-core' ) => 'btn-small',
            __( 'Medium', 'segovia-core' ) => 'btn-medium',
            __( 'Large', 'segovia-core' ) => 'btn-large',
          ),
          'admin_label' => true,
          'param_name' => 'button_size',
          'description' => __( 'Select button size', 'segovia-core' ),
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
        array(
          "type" => "switcher",
          "heading" => __( "Disable Simple Dark Hover", 'segovia-core' ),
          "param_name" => "simple_hover",
          "std" => false,
          'value' => '',
          'edit_field_class'  => 'vc_col-md-6 vc_column vt_field_space',
        ),
        SegoviaLib::vt_class_option(),

        // Styling
        array(
          "type" => "colorpicker",
          "heading" => __( "Text Color", 'segovia-core' ),
          "param_name" => "text_color",
          'value' => '',
          "group" => __( "Styling", 'segovia-core'),
          'edit_field_class'  => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type" => "colorpicker",
          "heading" => __( "Text Hover Color", 'segovia-core' ),
          "param_name" => "text_hover_color",
          'value' => '',
          "group" => __( "Styling", 'segovia-core'),
          'edit_field_class'  => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type" => "colorpicker",
          "heading" => __( "Background Hover Color", 'segovia-core' ),
          "param_name" => "bg_hover_color",
          'value' => '',
          "group" => __( "Styling", 'segovia-core'),
          'edit_field_class'  => 'vc_col-md-6 vc_column vt_field_space',
          'dependency' => array(
            'element' => 'simple_hover',
            'value' => 'true',
          ),
        ),
        array(
          "type" => "colorpicker",
          "heading" => __( "Border Hover Color", 'segovia-core' ),
          "param_name" => "border_hover_color",
          'value' => '',
          "group" => __( "Styling", 'segovia-core'),
          'edit_field_class'  => 'vc_col-md-6 vc_column vt_field_space',
          'dependency' => array(
            'element' => 'simple_hover',
            'value' => 'true',
          ),
        ),
        array(
          "type" => "textfield",
          "heading" => __( "Text Size", 'segovia-core' ),
          "param_name" => "text_size",
          'value' => '',
          "description" => __( "Enter button text font size. [Eg: 14px]", 'segovia-core'),
          "group" => __( "Styling", 'segovia-core'),
        ),

        // Icon
        array(
          'type' => 'dropdown',
          'heading' => __( 'Icon Alignment', 'segovia-core' ),
          'value' => array(
            __( 'Select Icon Alignment', 'segovia-core' ) => '',
            __( 'Left', 'segovia-core' ) => 'btn-icon-left',
            __( 'Right', 'segovia-core' ) => 'btn-icon-right',
          ),
          'param_name' => 'icon_alignment',
          'description' => __( 'Select icon alignment in this button.', 'segovia-core' ),
          "group" => __( "Icon", 'segovia-core'),
        ),
        array(
          "type" => "vt_icon",
          "heading" => __( "Select Icon", 'segovia-core' ),
          "param_name" => "select_icon",
          'value' => '',
          "description" => __( "Select icon if you want.", 'segovia-core'),
          "group" => __( "Icon", 'segovia-core'),
          'edit_field_class'  => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type" => "textfield",
          "heading" => __( "Icon Size", 'segovia-core' ),
          "param_name" => "icon_size",
          'value' => '',
          "description" => __( "Enter icon size in px.", 'segovia-core'),
          "group" => __( "Icon", 'segovia-core'),
          'edit_field_class'  => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type" => "colorpicker",
          "heading" => __( "Icon Color", 'segovia-core' ),
          "param_name" => "icon_color",
          'value' => '',
          "description" => __( "Pick your icon color.", 'segovia-core'),
          "group" => __( "Icon", 'segovia-core'),
          'edit_field_class'  => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type" => "colorpicker",
          "heading" => __( "Icon Hover Color", 'segovia-core' ),
          "param_name" => "icon_hover_color",
          'value' => '',
          "description" => __( "Pick your icon hover color.", 'segovia-core'),
          "group" => __( "Icon", 'segovia-core'),
          'edit_field_class'  => 'vc_col-md-6 vc_column vt_field_space',
        ),

        // Design Tab
        array(
          "type" => "css_editor",
          "heading" => __( "Text Size", 'segovia-core' ),
          "param_name" => "css",
          "group" => __( "Design", 'segovia-core'),
        ),

      )
    ) );
  }
}
