<?php
/**
 * Services - Shortcode Options
 */
add_action( 'init', 'segovia_service_toggle_vc_map' );
if ( ! function_exists( 'segovia_service_toggle_vc_map' ) ) {
  function segovia_service_toggle_vc_map() {
    vc_map( array(
      "name" => __( "Service Toggle", 'segovia-core'),
      "base" => "segva_service_toggle",
      "description" => __( "Service Toggle Shortcodes", 'segovia-core'),
      "icon" => "fa fa-cog color-green",
      "category" => SegoviaLib::segovia_cat_name(),
      "params" => array(

    
        SegoviaLib::vt_notice_field(__( "Service Toggle Content Area", 'segovia-core' ),'cntara_opt','cs-warning', ''), // Notice
        array(
          "type"      => 'textfield',
          "heading"   => __('Service Title', 'segovia-core'),
          "param_name" => "service_toggle_title",
          "value"      => "",
          "description" => __( "Enter your service title.", 'segovia-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type"      => 'attach_image',
          "heading"   => __('Upload Service Image', 'segovia-core'),
          "param_name" => "service_toggle_image",
          "value"      => "",
          "description" => __( "Set your service image.", 'segovia-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
         array(
          "type"      => 'textarea',
          "heading"   => __('Service Content', 'segovia-core'),
          "param_name" => "service_toggle_content",
          "value"      => "",
          "description" => __( "Enter your service content.", 'segovia-core'),
          'edit_field_class'   => 'vc_col-md-12 vc_column vt_field_space',
        ),
        // Learn More
        array(
    			"type"        => "notice",
    			"heading"     => __( "Learn More Link", 'segovia-core' ),
    			"param_name"  => 'rml_opt',
    			'class'       => 'cs-warning',
    			'value'       => '',
    		),
        array(
          "type"      => 'textfield',
          "heading"   => __('Learn More Title', 'segovia-core'),
          "param_name" => "read_more_title",
          "value"      => "",
          "description" => __( "Enter your read more title.", 'segovia-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type"      => 'href',
          "heading"   => __('Link', 'segovia-core'),
          "param_name" => "read_more_link",
          "value"      => "",
          "description" => __( "Set your link for read more.", 'segovia-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
          'dependency' => array(
            'element' => 'service_style',
            'value' => 'segva-service-one',
          ),
        ),
         array(
          "type" => "switcher",
          "heading" => __( "Toggle Align ?", 'segovia-core' ),
          "param_name" => "toggle_align",
          "std" => false,
          'value' => '',
          "on_text" => __( "Yes", 'segovia-core' ),
          "off_text" => __( "No", 'segovia-core' ),
          'edit_field_class'  => 'vc_col-md-6 vc_column vt_field_space',
        ),

        SegoviaLib::vt_open_link_tab(),
        SegoviaLib::vt_class_option(),

        // Style
        SegoviaLib::vt_notice_field(__( "Title Styling", 'segovia-core' ),'tle_opt','cs-warning', 'Style'), // Notice
        array(
          "type"      => 'colorpicker',
          "heading"   => __('Title Color', 'segovia-core'),
          "param_name" => "title_color",
          "value"      => "",
          "description" => __( "Pick your service title color.", 'segovia-core'),
          "group" => __( "Style", 'segovia-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type"      => 'textfield',
          "heading"   => __('Title Size', 'segovia-core'),
          "param_name" => "title_size",
          "value"      => "",
          "description" => __( "Enter the numeric value for service title size in px.", 'segovia-core'),
          "group" => __( "Style", 'segovia-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
        SegoviaLib::vt_notice_field(__( "Content Styling", 'segovia-core' ),'tle_opt','cs-warning', 'Style'), // Notice
        array(
          "type"      => 'colorpicker',
          "heading"   => __('Content Color', 'segovia-core'),
          "param_name" => "content_color",
          "value"      => "",
          "description" => __( "Pick your service content color.", 'segovia-core'),
          "group" => __( "Style", 'segovia-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type"      => 'textfield',
          "heading"   => __('Content Size', 'segovia-core'),
          "param_name" => "content_size",
          "value"      => "",
          "description" => __( "Enter the numeric value for service content size in px.", 'segovia-core'),
          "group" => __( "Style", 'segovia-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
        SegoviaLib::vt_notice_field(__( "Learnmore Styling", 'segovia-core' ),'tle_opt','cs-warning', 'Style'), // Notice
        array(
          "type"      => 'colorpicker',
          "heading"   => __('Learn More Color', 'segovia-core'),
          "param_name" => "learnmore_color",
          "value"      => "",
          "description" => __( "Pick your learnmore color.", 'segovia-core'),
          "group" => __( "Style", 'segovia-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type"      => 'textfield',
          "heading"   => __('Learn More Size', 'segovia-core'),
          "param_name" => "learnmore_size",
          "value"      => "",
          "description" => __( "Enter the numeric value for learnmore size in px.", 'segovia-core'),
          "group" => __( "Style", 'segovia-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type"      => 'colorpicker',
          "heading"   => __('Learn More Border Color', 'segovia-core'),
          "param_name" => "learnmore_border_color",
          "value"      => "",
          "description" => __( "Pick your learnmore border color.", 'segovia-core'),
          "group" => __( "Style", 'segovia-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
         array(
          "type"      => 'colorpicker',
          "heading"   => __('Learn More Hover Color', 'segovia-core'),
          "param_name" => "learnmore_hover_color",
          "value"      => "",
          "description" => __( "Pick your learnmore hover color.", 'segovia-core'),
          "group" => __( "Style", 'segovia-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),

      )
    ) );
  }
}
