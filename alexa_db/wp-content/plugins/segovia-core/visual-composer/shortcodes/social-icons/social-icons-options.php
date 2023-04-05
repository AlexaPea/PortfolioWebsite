<?php
/**
 * Socials - Shortcode Options
 */
add_action( 'init', 'segovia_socials_vc_map' );
if ( ! function_exists( 'segovia_socials_vc_map' ) ) {
  function segovia_socials_vc_map() {
    vc_map( array(
      "name" => __( "Social Icons", 'segovia-core'),
      "base" => "segovia_socials",
      "description" => __( "Socials Styles", 'segovia-core'),
      "icon" => "fa fa-share-alt color-red",
      "category" => SegoviaLib::segovia_cat_name(),
      "params" => array(
        SegoviaLib::vt_notice_field(__( "Social Section Title", 'segovia-core' ),'cntara_opt','cs-info', ''), // Notice
        array(
          "type"      => 'textfield',
          "heading"   => __('Social Section Title', 'segovia-core'),
          "param_name" => "social_title",
          "value"      => "",
          "description" => __( "Enter your social title  ", 'segovia-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
        SegoviaLib::vt_notice_field(__( "Social Icons", 'segovia-core' ),'cntara_opt','cs-info', ''), // Notice
        // client logos
        array(
          'type' => 'param_group',
          'value' => '',
          'heading' => __( 'Icons', 'segovia-core' ),
          'param_name' => 'logo_items',
          // Note params is mapped inside param-group:
          'params' => array(
            array(
              "type"      => 'vt_icon',
              "heading"   => __('Set Icon', 'segovia-core'),
              "param_name" => "client_logo",
              "value"      => "",
              "description" => __( "Set your service icon.", 'segovia-core'),
              'dependency' => array(
                'element' => 'service_style',
                'value' => array('segva-service-two','segva-service-three','segva-service-four'),
              ),
            ),
            array(
              "type" => "textfield",
              "heading" => __( "Logo Link", 'segovia-core' ),
              "param_name" => "logo_link",
              'value' => '',
              "description" => __( "Enter your client logo link.", 'segovia-core'),
            ),
          )
        ),
        array(
          "type" => "checkbox",
          "heading" => __( "Need Rounded Social Icons ", 'segovia-core' ),
          "param_name" => "rounded_social",
          "description" => __( "Check the box if you need rounded social icons.", 'segovia-core'),
          "std" => false,
          'value' => '',
          'edit_field_class'  => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type" => "dropdown",
          "heading" => esc_html__( "Social Section Align", 'segovia-core' ),
          "param_name" => "text_align",
          'value' => array(
            esc_html__( 'Center', 'segovia-core' ) => 'text-center',
            esc_html__( 'Left', 'segovia-core' ) => 'text-left',
            esc_html__( 'Right', 'segovia-core' ) => 'text-right',
          ),
          'edit_field_class'  => 'vc_col-md-6 vc_column vt_field_space',
        ),

        SegoviaLib::vt_class_option(),

        SegoviaLib::vt_notice_field(__( "Social Title", 'segovia-core' ),'cntara_opt','cs-info', 'Style'), // Notice
        array(
          "type"      => 'colorpicker',
          "heading"   => __('Social Title Color', 'segovia-core'),
          "param_name" => "social_title_color",
          "value"      => "",
          "description" => __( "Pick your social title color.", 'segovia-core'),
          "group" => __( "Style", 'segovia-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type"      => 'textfield',
          "heading"   => __('Social Title Size', 'segovia-core'),
          "param_name" => "social_title_size",
          "value"      => "",
          "description" => __( "Enter the numeric value for social title size in px.", 'segovia-core'),
          "group" => __( "Style", 'segovia-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),

        SegoviaLib::vt_notice_field(__( "Social Icons", 'segovia-core' ),'cntara_opt','cs-info', 'Style'), // Notice
        array(
          "type"      => 'colorpicker',
          "heading"   => __('Social Icon Color', 'segovia-core'),
          "param_name" => "social_icon_color",
          "value"      => "",
          "description" => __( "Pick your social icon color.", 'segovia-core'),
          "group" => __( "Style", 'segovia-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type"      => 'colorpicker',
          "heading"   => __('Social Icon Hover Color', 'segovia-core'),
          "param_name" => "social_icon_hover_color",
          "value"      => "",
          "description" => __( "Pick your social icon hover color.", 'segovia-core'),
          "group" => __( "Style", 'segovia-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type"      => 'textfield',
          "heading"   => __('Social Icon Size', 'segovia-core'),
          "param_name" => "social_icon_size",
          "value"      => "",
          "description" => __( "Enter the numeric value for social icon size in px.", 'segovia-core'),
          "group" => __( "Style", 'segovia-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type"      => 'colorpicker',
          "heading"   => __('Social Icon Border Color', 'segovia-core'),
          "param_name" => "social_icon_border_color",
          "value"      => "",
          "description" => __( "Pick your social icon border color (Only for rounded icons).", 'segovia-core'),
          "group" => __( "Style", 'segovia-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
         array(
          "type"      => 'colorpicker',
          "heading"   => __('Social Icon Border Hover Color', 'segovia-core'),
          "param_name" => "social_icon_border_hover_color",
          "value"      => "",
          "description" => __( "Pick your social icon border hover color (Only for rounded icons).", 'segovia-core'),
          "group" => __( "Style", 'segovia-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),


      )
    ) );
  }
}
