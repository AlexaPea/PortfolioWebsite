<?php
/**
 * Gmap - Shortcode Options
 */
add_action( 'init', 'segovia_gmap_vc_map' );
if ( ! function_exists( 'segovia_gmap_vc_map' ) ) {
  function segovia_gmap_vc_map() {
    vc_map( array(
      "name" => __( "Google Map", 'segovia-core'),
      "base" => "segva_gmap",
      "description" => __( "Google Map Styles", 'segovia-core'),
      "icon" => "fa fa-map color-cadetblue",
      "category" => SegoviaLib::segovia_cat_name(),
      "params" => array(

        array(
          "type"        => "notice",
          "heading"     => __( "API KEY", 'segovia-core' ),
          "param_name"  => 'api_key',
          'class'       => 'cs-info',
          'value'       => '',
        ),
        array(
          "type"        =>'textfield',
          "heading"     =>__('Enter Map ID', 'segovia-core'),
          "param_name"  => "gmap_id",
          "value"       => "",
          "description" => __( 'Enter google map ID. If you\'re using this in <strong>Map Tab</strong> shortcode, enter unique ID for each map tabs. Else leave it as blank. <strong>Note : This should same as Tab ID in Map Tabs shortcode.</strong>', 'segovia-core'),
          'admin_label' => true,
        ),
        array(
          "type"        =>'textfield',
          "heading"     =>__('Enter your Google Map API Key', 'segovia-core'),
          "param_name"  => "gmap_api",
          "value"       => "",
          "description" => __( 'New Google Maps usage policy dictates that everyone using the maps should register for a free API key. <br />Please create a key for "Google Static Maps API" and "Google Maps Embed API" using the <a href="https://console.developers.google.com/project" target="_blank">Google Developers Console</a>.<br /> Or follow this step links : <br /><a href="https://console.developers.google.com/flows/enableapi?apiid=maps_embed_backend&keyType=CLIENT_SIDE&reusekey=true" target="_blank">1. Step One</a> <br /><a href="https://console.developers.google.com/flows/enableapi?apiid=static_maps_backend&keyType=CLIENT_SIDE&reusekey=true" target="_blank">2. Step Two</a><br /> If you still receive errors, please check following link : <a href="https://churchthemes.com/2016/07/15/page-didnt-load-google-maps-correctly/" target="_blank">How to Fix?</a>', 'segovia-core'),
        ),

        array(
          "type"        => "notice",
          "heading"     => __( "Map Settings", 'segovia-core' ),
          "param_name"  => 'map_settings',
          'class'       => 'cs-info',
          'value'       => '',
        ),
        array(
          'type' => 'dropdown',
          'heading' => __( 'Google Map Type', 'segovia-core' ),
          'value' => array(
            __( 'Select Type', 'segovia-core' ) => '',
            __( 'ROADMAP', 'segovia-core' ) => 'ROADMAP',
            __( 'SATELLITE', 'segovia-core' ) => 'SATELLITE',
            __( 'HYBRID', 'segovia-core' ) => 'HYBRID',
            __( 'TERRAIN', 'segovia-core' ) => 'TERRAIN',
          ),
          'admin_label' => true,
          'param_name' => 'gmap_type',
          'description' => __( 'Select your google map type.', 'segovia-core' ),
        ),
        array(
          'type' => 'dropdown',
          'heading' => __( 'Google Map Style', 'segovia-core' ),
          'value' => array(
            __( 'Select Style', 'segovia-core' ) => '',
            __( 'Gray Scale', 'segovia-core' ) => "gray-scale",
            __( 'Mid Night', 'segovia-core' ) => "mid-night",
            __( 'Blue Water', 'segovia-core' ) => 'blue-water',
            __( 'Light Dream', 'segovia-core' ) => 'light-dream',
            __( 'Pale Dawn', 'segovia-core' ) => 'pale-dawn',
            __( 'Apple Maps-esque', 'segovia-core' ) => 'apple-maps',
            __( 'Blue Essence', 'segovia-core' ) => 'blue-essence',
            __( 'Unsaturated Browns', 'segovia-core' ) => 'unsaturated-browns',
            __( 'Paper', 'segovia-core' ) => 'paper',
            __( 'Midnight Commander', 'segovia-core' ) => 'midnight-commander',
            __( 'Light Monochrome', 'segovia-core' ) => 'light-monochrome',
            __( 'Flat Map', 'segovia-core' ) => 'flat-map',
            __( 'Retro', 'segovia-core' ) => 'retro',
            __( 'becomeadinosaur', 'segovia-core' ) => 'becomeadinosaur',
            __( 'Neutral Blue', 'segovia-core' ) => 'neutral-blue',
            __( 'Subtle Grayscale', 'segovia-core' ) => 'subtle-grayscale',
            __( 'Ultra Light with Labels', 'segovia-core' ) => 'ultra-light-labels',
            __( 'Shades of Grey', 'segovia-core' ) => 'shades-grey',
          ),
          'admin_label' => true,
          'param_name' => 'gmap_style',
          'description' => __( 'Select your google map style.', 'segovia-core' ),
          'dependency' => array(
            'element' => 'gmap_type',
            'value' => 'ROADMAP',
          ),
        ),
        array(
          "type"        =>'textfield',
          "heading"     =>__('Height', 'segovia-core'),
          "param_name"  => "gmap_height",
          "value"       => "",
          "description" => __( "Enter the px value for map height. This will not work if you add this shortcode into the Map Tab shortcode.", 'segovia-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type"        =>'attach_image',
          "heading"     =>__('Common Marker', 'segovia-core'),
          "param_name"  => "gmap_common_marker",
          "value"       => "",
          "description" => __( "Upload your custom marker.", 'segovia-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),

        array(
          "type"        => "notice",
          "heading"     => __( "Enable & Disable", 'segovia-core' ),
          "param_name"  => 'enb_disb',
          'class'       => 'cs-info',
          'value'       => '',
        ),
        array(
          "type"        =>'switcher',
          "heading"     =>__('Scroll Wheel', 'segovia-core'),
          "param_name"  => "gmap_scroll_wheel",
          "value"       => "",
          "std"         => false,
          'edit_field_class'   => 'vc_col-md-4 vc_column vt_field_space',
        ),
        array(
          "type"        =>'switcher',
          "heading"     =>__('Street View Control', 'segovia-core'),
          "param_name"  => "gmap_street_view",
          "value"       => "",
          "std"         => false,
          'edit_field_class'   => 'vc_col-md-4 vc_column vt_field_space',
        ),
        array(
          "type"        =>'switcher',
          "heading"     =>__('Map Type Control', 'segovia-core'),
          "param_name"  => "gmap_maptype_control",
          "value"       => "",
          "std"         => false,
          'edit_field_class'   => 'vc_col-md-4 vc_column vt_field_space',
        ),

        // Map Markers
        array(
          "type"        => "notice",
          "heading"     => __( "Map Pins", 'segovia-core' ),
          "param_name"  => 'map_pins',
          'class'       => 'cs-info',
          'value'       => '',
        ),
        array(
          'type' => 'param_group',
          'value' => '',
          'heading' => __( 'Map Locations', 'segovia-core' ),
          'param_name' => 'locations',
          'params' => array(

            array(
              'type' => 'textfield',
              'value' => '',
              'heading' => __( 'Latitude', 'segovia-core' ),
              'param_name' => 'latitude',
              'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
              'admin_label' => true,
              'description' => __( 'Find Latitude : <a href="http://www.latlong.net/" target="_blank">latlong.net</a>', 'segovia-core' ),
            ),
            array(
              'type' => 'textfield',
              'value' => '',
              'heading' => __( 'Longitude', 'segovia-core' ),
              'param_name' => 'longitude',
              'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
              'admin_label' => true,
              'description' => __( 'Find Longitude : <a href="http://www.latlong.net/" target="_blank">latlong.net</a>', 'segovia-core' ),
            ),
            array(
              'type' => 'attach_image',
              'value' => '',
              'heading' => __( 'Custom Marker', 'segovia-core' ),
              'param_name' => 'custom_marker',
              "description" => __( "Upload your unique map marker if your want to differentiate from others.", 'segovia-core'),
            ),
            array(
              'type' => 'textfield',
              'value' => '',
              'heading' => __( 'Heading', 'segovia-core' ),
              'param_name' => 'location_heading',
              'admin_label' => true,
            ),
            array(
              'type' => 'textarea',
              'value' => '',
              'heading' => __( 'Content', 'segovia-core' ),
              'param_name' => 'location_text',
            ),

          )
        ),

        SegoviaLib::vt_class_option(),


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
