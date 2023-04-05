<?php
/**
 * Countowns - Shortcode Options
 */
add_action( 'init', 'segovia_countown_vc_map' );
if ( ! function_exists( 'segovia_countown_vc_map' ) ) {
  function segovia_countown_vc_map() {
    vc_map( array(
      "name" => __( "Countown", 'segovia-core'),
      "base" => "segva_countown",
      "description" => __( "Countown Shortcodes", 'segovia-core'),
      "icon" => "fa fa-clock-o color-brown",
      "category" => SegoviaLib::segovia_cat_name(),
      "params" => array(

        array(
          'type' => 'dropdown',
          'heading' => __( 'Countown Type', 'segovia-core' ),
          'value' => array(
            __( 'Static Date', 'segovia-core' ) => 'static',
            __( 'Fake Date', 'segovia-core' ) => 'fake',
                 ),
          'admin_label' => true,
          'param_name' => 'count_type',
          'description' => __( 'Select your countown type.', 'segovia-core' ),
        ),
        array(
          "type"      => 'textfield',
          "heading"   => __('Date', 'segovia-core'),
          "param_name" => "count_date",
          "value"      => "",
          "description" => __( "Enter your date here. Format : mm/dd/yyyy ", 'segovia-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',

          'dependency' => array(
            'element' => 'count_type',
            'value' => 'static',
          ),
        ),
        array(
          "type"      => 'textfield',
          "heading"   => __('Time', 'segovia-core'),
          "param_name" => "count_date_time",
          "value"      => "",
          "description" => __( "Enter your date in hours:minutes:seconds. Format - hh:mm:ss", 'segovia-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',

          'dependency' => array(
            'element' => 'count_type',
            'value' => 'static',
          ),
        ),
         array(
          "type"      => 'textfield',
          "heading"   => __('Fake Date', 'segovia-core'),
          "param_name" => "fake_date",
          "value"      => "",
          "description" => __( "Enter your fake day count here. Ex: 2 or 3(in days)", 'segovia-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',

          'dependency' => array(
            'element' => 'count_type',
            'value' => 'fake',
          ),
        ),
         array(
          "type"      => 'attach_image',
          "heading"   => __('Upload Countown Image', 'segovia-core'),
          "param_name" => "count_icon_image",
          "value"      => "",
          "description" => __( "Set your count top image.", 'segovia-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type"      => 'textfield',
          "heading"   => __('Content', 'segovia-core'),
          "param_name" => "count_content",
          "value"      => "",
          "description" => __( "Type your content text here", 'segovia-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
         array(
          "type"      => 'textfield',
          "heading"   => __('Countdown Format', 'segovia-core'),
          "param_name" => "countdown_format",
          "value"      => "",
          "description" => __( "Default: dHMS", 'segovia-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),


        SegoviaLib::vt_notice_field(__( "Countdown Labels", 'segovia-core' ),'tle_opt','cs-info', ''), // Notice
        array(
          "type"      => 'textfield',
          "heading"   => __('Years Text', 'segovia-core'),
          "param_name" => "label_years",
          "value"      => "",
          "description" => __( "Enter years text.", 'segovia-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type"      => 'textfield',
          "heading"   => __('Months Text', 'segovia-core'),
          "param_name" => "label_months",
          "value"      => "",
          "description" => __( "Enter month text.", 'segovia-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type"      => 'textfield',
          "heading"   => __('Weeks Text', 'segovia-core'),
          "param_name" => "label_weeks",
          "value"      => "",
          "description" => __( "Enter weeks text.", 'segovia-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type"      => 'textfield',
          "heading"   => __('Days Text', 'segovia-core'),
          "param_name" => "label_days",
          "value"      => "",
          "description" => __( "Enter days text.", 'segovia-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type"      => 'textfield',
          "heading"   => __('Hours Text', 'segovia-core'),
          "param_name" => "label_hours",
          "value"      => "",
          "description" => __( "Enter hours text.", 'segovia-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type"      => 'textfield',
          "heading"   => __('Minutes Text', 'segovia-core'),
          "param_name" => "label_minutes",
          "value"      => "",
          "description" => __( "Enter minutes text.", 'segovia-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type"      => 'textfield',
          "heading"   => __('Seconds Text', 'segovia-core'),
          "param_name" => "label_seconds",
          "value"      => "",
          "description" => __( "Enter seconds text.", 'segovia-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),

        SegoviaLib::vt_notice_field(__( "Countdown Singular Labels", 'segovia-core' ),'tle_opt','cs-info', ''), // Notice
        array(
          "type"      => 'textfield',
          "heading"   => __('Year Text', 'segovia-core'),
          "param_name" => "label_year",
          "value"      => "",
          "description" => __( "Enter year text.", 'segovia-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type"      => 'textfield',
          "heading"   => __('Month Text', 'segovia-core'),
          "param_name" => "label_month",
          "value"      => "",
          "description" => __( "Enter month text.", 'segovia-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type"      => 'textfield',
          "heading"   => __('Week Text', 'segovia-core'),
          "param_name" => "label_week",
          "value"      => "",
          "description" => __( "Enter week text.", 'segovia-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type"      => 'textfield',
          "heading"   => __('Day Text', 'segovia-core'),
          "param_name" => "label_day",
          "value"      => "",
          "description" => __( "Enter days text.", 'segovia-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type"      => 'textfield',
          "heading"   => __('Hour Text', 'segovia-core'),
          "param_name" => "label_hour",
          "value"      => "",
          "description" => __( "Enter hour text.", 'segovia-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type"      => 'textfield',
          "heading"   => __('Minute Text', 'segovia-core'),
          "param_name" => "label_minute",
          "value"      => "",
          "description" => __( "Enter minute text.", 'segovia-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type"      => 'textfield',
          "heading"   => __('Second Text', 'segovia-core'),
          "param_name" => "label_second",
          "value"      => "",
          "description" => __( "Enter second text.", 'segovia-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),


        SegoviaLib::vt_class_option(),

        // Style
        SegoviaLib::vt_notice_field(__( "Counter Content Styling", 'segovia-core' ),'tle_opt','cs-warning', 'Style'), // Notice
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
          "heading"   => __('Hiphen Color', 'segovia-core'),
          "param_name" => "hiphen_color",
          "value"      => "",
          "description" => __( "Pick your content color.", 'segovia-core'),
          "group" => __( "Style", 'segovia-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
        SegoviaLib::vt_notice_field(__( "Counter Number Styling", 'segovia-core' ),'tle_opt','cs-warning', 'Style'), // Notice
        array(
          "type"      => 'colorpicker',
          "heading"   => __('Value Color', 'segovia-core'),
          "param_name" => "value_color",
          "value"      => "",
          "description" => __( "Pick your value color.", 'segovia-core'),
          "group" => __( "Style", 'segovia-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type"      => 'textfield',
          "heading"   => __('Value Size', 'segovia-core'),
          "param_name" => "value_size",
          "value"      => "",
          "description" => __( "Enter the numeric value for value size in px.", 'segovia-core'),
          "group" => __( "Style", 'segovia-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type"      => 'colorpicker',
          "heading"   => __('Value BG Color', 'segovia-core'),
          "param_name" => "value_bg_color",
          "value"      => "",
          "description" => __( "Pick your value background color.", 'segovia-core'),
          "group" => __( "Style", 'segovia-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
         SegoviaLib::vt_notice_field(__( "Counter Text Styling", 'segovia-core' ),'tle_opt','cs-warning', 'Style'), // Notice
          array(
          "type"      => 'colorpicker',
          "heading"   => __('Value Text Color', 'segovia-core'),
          "param_name" => "value_text_color",
          "value"      => "",
          "description" => __( "Pick your value text color.", 'segovia-core'),
          "group" => __( "Style", 'segovia-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type"      => 'textfield',
          "heading"   => __('Value Text Size', 'segovia-core'),
          "param_name" => "value_text_size",
          "value"      => "",
          "description" => __( "Enter the numeric value text for value size in px.", 'segovia-core'),
          "group" => __( "Style", 'segovia-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),


      )
    ) );
  }
}
