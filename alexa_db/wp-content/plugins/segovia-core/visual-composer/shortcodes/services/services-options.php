<?php
/**
 * Services - Shortcode Options
 */
add_action( 'init', 'segovia_services_vc_map' );
if ( ! function_exists( 'segovia_services_vc_map' ) ) {
  function segovia_services_vc_map() {
    vc_map( array(
      "name" => __( "Service", 'segovia-core'),
      "base" => "segva_services",
      "description" => __( "Service Shortcodes", 'segovia-core'),
      "icon" => "fa fa-cog color-brown",
      "category" => SegoviaLib::segovia_cat_name(),
      "params" => array(

        array(
          'type' => 'dropdown',
          'heading' => __( 'Services Style', 'segovia-core' ),
          'value' => array(
            __( 'Style One', 'segovia-core' ) => 'segva-service-one',
            __( 'Style Two', 'segovia-core' ) => 'segva-service-two',
            __( 'Style Three', 'segovia-core' ) => 'segva-service-three',
            __( 'Style Four', 'segovia-core' ) => 'segva-service-four',
            __( 'Style Five', 'segovia-core' ) => 'segva-service-five',
          ),
          'admin_label' => true,
          'param_name' => 'service_style',
          'description' => __( 'Select your service style.', 'segovia-core' ),
        ),
        SegoviaLib::vt_open_link_tab(),
        array(
          "type"      => 'attach_image',
          "heading"   => __('Upload Service Image', 'segovia-core'),
          "param_name" => "service_image",
          "value"      => "",
          "description" => __( "Set your service image.", 'segovia-core'),
          'dependency' => array(
            'element' => 'service_style',
            'value' => 'segva-service-one',
          ),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type"      => 'attach_image',
          "heading"   => __('Upload Icon', 'segovia-core'),
          "param_name" => "service_icon_image",
          "value"      => "",
          "description" => __( "Set your service icon image.", 'segovia-core'),
          'dependency' => array(
            'element' => 'service_style',
            'value' => 'segva-service-five',
          ),
        ),
        array(
          "type"      => 'href',
          "heading"   => __('Image Link', 'segovia-core'),
          "param_name" => "service_image_link",
          "value"      => "",
          "description" => __( "Enter your service image link.", 'segovia-core'),
          'dependency' => array(
            'element' => 'service_style',
            'value' => 'segva-service-one',
          ),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type"      => 'vt_icon',
          "heading"   => __('Set Icon', 'segovia-core'),
          "param_name" => "service_icon",
          "value"      => "",
          "description" => __( "Set your service icon.", 'segovia-core'),
          'dependency' => array(
            'element' => 'service_style',
            'value' => array('segva-service-two','segva-service-three','segva-service-four'),
          ),
        ),
        SegoviaLib::vt_notice_field(__( "Content Area", 'segovia-core' ),'cntara_opt','cs-warning', ''), // Notice
        array(
          "type"      => 'vc_link',
          "heading"   => __('Service Title', 'segovia-core'),
          "param_name" => "service_title",
          "value"      => "",
          "description" => __( "Enter your service title and link.", 'segovia-core')
        ),
        array(
          "type"      => 'textarea_html',
          "heading"   => __('Content', 'segovia-core'),
          "param_name" => "content",
          "value"      => "",
          "description" => __( "Enter your service content here.", 'segovia-core')
        ),

        // Read More
        array(
    			"type"        => "notice",
    			"heading"     => __( "Read More Link", 'segovia-core' ),
    			"param_name"  => 'rml_opt',
    			'class'       => 'cs-warning',
    			'value'       => '',
          'dependency' => array(
            'element' => 'service_style',
            'value' => 'segva-service-one',
          ),
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
          "type"      => 'textfield',
          "heading"   => __('Title', 'segovia-core'),
          "param_name" => "read_more_title",
          "value"      => "",
          "description" => __( "Enter your read more title.", 'segovia-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
          'dependency' => array(
            'element' => 'service_style',
            'value' => 'segva-service-one',
          ),
        ),
        SegoviaLib::vt_class_option(),

        // Style
        SegoviaLib::vt_notice_field(__( "Title Styling", 'segovia-core' ),'tle_opt','cs-warning', 'Style'), // Notice
        array(
          "type"      => 'colorpicker',
          "heading"   => __('Title Color', 'segovia-core'),
          "param_name" => "title_color",
          "value"      => "",
          "description" => __( "Pick your heading color.", 'segovia-core'),
          "group" => __( "Style", 'segovia-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type"      => 'textfield',
          "heading"   => __('Title Size', 'segovia-core'),
          "param_name" => "title_size",
          "value"      => "",
          "description" => __( "Enter the numeric value for title size in px.", 'segovia-core'),
          "group" => __( "Style", 'segovia-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type"      => 'textfield',
          "heading"   => __('Title Top Space', 'segovia-core'),
          "param_name" => "title_top_space",
          "value"      => "",
          "description" => __( "Enter the value for title top space in px.", 'segovia-core'),
          "group" => __( "Style", 'segovia-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type"      => 'textfield',
          "heading"   => __('Title Bottom Space', 'segovia-core'),
          "param_name" => "title_bottom_space",
          "value"      => "",
          "description" => __( "Enter the value for title bottom space in px.", 'segovia-core'),
          "group" => __( "Style", 'segovia-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),

      )
    ) );
  }
}
