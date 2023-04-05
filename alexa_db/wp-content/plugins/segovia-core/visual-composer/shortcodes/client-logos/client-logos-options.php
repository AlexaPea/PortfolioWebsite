<?php
/**
 * Clients - Shortcode Options
 */
add_action( 'init', 'segovia_clients_vc_map' );
if ( ! function_exists( 'segovia_clients_vc_map' ) ) {
  function segovia_clients_vc_map() {
    vc_map( array(
      "name" => __( "Clients Logo", 'segovia-core'),
      "base" => "segovia_clients",
      "description" => __( "Clients Styles", 'segovia-core'),
      "icon" => "fa fa-shield color-orange",
      "category" => SegoviaLib::segovia_cat_name(),
      "params" => array(

        // client logos
        array(
          'type' => 'param_group',
          'value' => '',
          'heading' => __( 'Logos', 'segovia-core' ),
          'param_name' => 'logo_items',
          // Note params is mapped inside param-group:
          'params' => array(
            array(
              "type"      => 'attach_image',
              "heading"   => __('Upload client Logo', 'segovia-core'),
              "param_name" => "client_logo",
              "value"      => "",
              "description" => __( "Set your client logo.", 'segovia-core'),
              'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
              'admin_label' => true,
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
          "type"        =>'checkbox',
          "heading"     =>__(' Retina Image?', 'segovia-core'),
          "param_name"  => "retina_img",
          "value"       => "",
          "std"         => false,
          'edit_field_class'   => 'vc_col-md-12 vc_column vt_field_space',
          'description' => __( 'If you want to crop your image size into half, check it.', 'segovia-core' ),
        ),

        SegoviaLib::vt_class_option(),

      )
    ) );
  }
}
