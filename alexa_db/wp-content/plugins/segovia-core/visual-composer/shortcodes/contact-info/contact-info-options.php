<?php
/**
 * Address - Shortcode Options
 */
add_action( 'init', 'segovia_contact_info_vc_map' );
if ( ! function_exists( 'segovia_contact_info_vc_map' ) ) {
  function segovia_contact_info_vc_map() {
    vc_map( array( 
      "name" => __( "Contact Info", 'segovia-core'),
      "base" => "segovia_contact_info",
      "description" => __( "Contact Info Shortcodes", 'segovia-core'),
      "icon" => "fa fa-map-signs color-brown",
      "category" => SegoviaLib::segovia_cat_name(),
      "params" => array(

        array(
          'type' => 'param_group',
          'value' => '',
          'heading' => __( 'Lists', 'segovia-core' ),
          'param_name' => 'list_items',
          // Note params is mapped inside param-group:
          'params' => array(
            array(
              'type' => 'textfield',
              'value' => '',
              'heading' => __( 'Info Title', 'segovia-core' ),
              'param_name' => 'list_title',
              'admin_label' => true,
            ),
            array(
              'type' => 'textarea',
              'value' => '',
              'heading' => __( 'Info Content', 'segovia-core' ),
              'param_name' => 'list_content',
              
            ),
            array(
              'type' => 'textfield',
              'value' => '',
              'heading' => __( 'Text', 'segovia-core' ),
              'param_name' => 'list_text',
             
            ),
            array(
              'type' => 'textfield',
              'value' => '',
              'heading' => __( 'Text Link', 'segovia-core' ),
              'param_name' => 'text_link',
            ),
            array(
              "type" => "checkbox",
              "heading" => __( "Open New Tab?", 'segovia-core' ),
              "param_name" => "open_link",
              "std" => false,
              'value' => '',
              "on_text" => __( "Yes", 'segovia-core' ),
              "off_text" => __( "No", 'segovia-core' ),
            ),

          )

        ),
        
        SegoviaLib::vt_class_option(),

        // Style
        SegoviaLib::vt_notice_field(__( "Title Styling", 'segovia-core' ),'tle_opt','cs-warning', 'Style'), // Notice
        array(
          "type"      => 'colorpicker',
          "heading"   => __('Info Title Color', 'segovia-core'),
          "param_name" => "info_title_color",
          "value"      => "",
          "description" => __( "Pick your info title color.", 'segovia-core'),
          "group" => __( "Style", 'segovia-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type"      => 'textfield',
          "heading"   => __('Info Title Size', 'segovia-core'),
          "param_name" => "info_title_size",
          "value"      => "",
          "description" => __( "Enter the numeric value for info title size in px.", 'segovia-core'),
          "group" => __( "Style", 'segovia-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
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
          "type"      => 'textfield',
          "heading"   => __('Link Size', 'segovia-core'),
          "param_name" => "link_size",
          "value"      => "",
          "description" => __( "Enter the numeric value for link size in px.", 'segovia-core'),
          "group" => __( "Style", 'segovia-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type"      => 'colorpicker',
          "heading"   => __('Link Color', 'segovia-core'),
          "param_name" => "link_color",
          "value"      => "",
          "description" => __( "Pick your link color.", 'segovia-core'),
          "group" => __( "Style", 'segovia-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type"      => 'colorpicker',
          "heading"   => __('Link Hover Color', 'segovia-core'),
          "param_name" => "link_hover_color",
          "value"      => "",
          "description" => __( "Pick your link hover color.", 'segovia-core'),
          "group" => __( "Style", 'segovia-core'),
          'edit_field_class'   => 'vc_col-md-4 vc_column vt_field_space',
        ),
     
        SegoviaLib::vt_notice_field(__( "Border & Styling", 'segovia-core' ),'tle_opt','cs-warning', 'Style'), // Notice
        array(
          "type"        => 'switcher',
          "heading"     => __('Need Border', 'segovia-core'),
          "param_name"  => "need_border",
          "value"       => "",
           "group" => __( "Style", 'segovia-core'),
          "std"         => true,
          'edit_field_class' => 'vc_col-md-3 vc_column vt_field_space',
        ),
        array(
          "type"      => 'colorpicker',
          "heading"   => __('Border Color', 'segovia-core'),
          "param_name" => "border_color",
          "value"      => "",
          "description" => __( "Pick your border color.", 'segovia-core'),
          "group" => __( "Style", 'segovia-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
       

      )
    ) );
  }
}
