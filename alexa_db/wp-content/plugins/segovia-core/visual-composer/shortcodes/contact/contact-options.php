<?php
/**
 * Contact - Shortcode Options
 */
add_action( 'init', 'contact_vc_map' );
if ( ! function_exists( 'contact_vc_map' ) ) {
  function contact_vc_map() {

    $cf7 = get_posts( 'post_type="wpcf7_contact_form"&numberposts=-1' );
    $contact_forms = array();
    if ( $cf7 ) {
      foreach ( $cf7 as $cform ) {
        $contact_forms[ $cform->post_title ] = $cform->ID;
      }
    } else {
      $contact_forms[ __( 'No contact forms found', 'js_composer' ) ] = 0;
    }

    vc_map( array(
    "name" => __( "Contact Form 7", 'segovia-core'),
    "base" => "segva_contact",
    "description" => __( "Contact Form 7 Style", 'segovia-core'),
    "icon" => "icon-wpb-contactform7",
    "category" => SegoviaLib::segovia_cat_name(),
    "params" => array(

      array(
        'type' => 'dropdown',
        'heading' => __( 'Select contact form', 'js_composer' ),
        'param_name' => 'id',
        'value' => $contact_forms,
        'save_always' => true,
        'admin_label' => true,
        'description' => __( 'Choose previously created contact form from the drop down list.', 'js_composer' ),
      ),
      array(
        'type' => 'dropdown',
        'value' => array(
          __( 'No Styles', 'segovia-core' ) => '',
          __( 'Style One', 'segovia-core' ) => 'contact-box-one',
          __( 'Style Two', 'segovia-core' ) => 'contact-box-two',
        ),
        'admin_label' => true,
        'heading' => __( 'Contact Form Box Style', 'segovia-core' ),
        'param_name' => 'box_style',
        'description' => __( 'Select from box style.', 'segovia-core' ),
      ),
      array(
        'type' => 'textfield',
        'value' => '',
        'heading' => __( 'Title', 'segovia-core' ),
        'description' => __( 'Enter Form title for your contact form.', 'segovia-core' ),
        'param_name' => 'form_title',
      ),
      SegoviaLib::vt_class_option(),

      array(
        'type' => 'textfield',
        'value' => '',
        'heading' => __( 'Button Text Size', 'segovia-core' ),
        'description' => __( 'Enter text size for submit button.', 'segovia-core' ),
        'group' => __( 'Style', 'segovia-core' ),
        'param_name' => 'submit_size',
      ),
      array(
        'type' => 'colorpicker',
        'value' => '',
        'heading' => __( 'Button Text Color', 'segovia-core' ),
        'description' => __( 'Pick text color for submit button.', 'segovia-core' ),
        'group' => __( 'Style', 'segovia-core' ),
        'param_name' => 'submit_color',
      ),
      array(
        'type' => 'colorpicker',
        'value' => '',
        'heading' => __( 'Button BG Color', 'segovia-core' ),
        'description' => __( 'Pick button background color.', 'segovia-core' ),
        'group' => __( 'Style', 'segovia-core' ),
        'param_name' => 'submit_bg_color',
      ),

      ), // Params
    ) );
  }
}