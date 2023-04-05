<?php
/**
 * Tabs - Shortcode Options
 */

add_action( 'init', 'segovia_tabs_vc_map' );
if ( ! function_exists( 'segovia_tabs_vc_map' ) ) {
  function segovia_tabs_vc_map() {

    $tab_one_id = time() . '-1-' . rand( 0, 100 );
    $tab_two_id = time() . '-2-' . rand( 0, 100 );
    $tab_three_id = time() . '-3-' . rand( 0, 100 );

    vc_map( array(
      "name"            => __( "Segovia Tabs", 'segovia-core'),
      'base'            => 'vc_tabs',
      'is_container'    => true,
      'icon'            => 'fa fa-list-alt color-blue',
      'description'     => __( "Tabs Style", 'segovia-core'),
      'category'        => SegoviaLib::segovia_cat_name(),
      'params'          => array(

        array(
          "type"        => "notice",
          "heading"     => __( "Tab Section", 'omnitail-core' ),
          "param_name"  => 'tgl_btn',
          'class'       => 'cs-info',
          'value'       => '',
          'group' => '',
        ),
        array(
          'type'        => 'textfield',
          'heading'     => __( "Section Title", 'segovia-core'),
          'param_name'  => 'tab_title',
        ),
        array(
          'type'        => 'textarea',
          'heading'     => __( "Section Content", 'segovia-core'),
          'param_name'  => 'tab_content',
        ),
        array(
          'type'        => 'textfield',
          'heading'     => __( "Active Tab", 'segovia-core'),
          'param_name'  => 'active',
          'description' => __( "Which tab you want to be active on load [ Count starting from 0 ]. [Eg. 0 or 1 or 2]", 'segovia-core'),
        ),
        // Styling Section
        array(
          "type"        => "notice",
          "heading"     => __( "Tab Section Main Title & Content Style", 'omnitail-core' ),
          "param_name"  => 'tgl_btn',
          'class'       => 'cs-info',
          'value'       => '',
          'group' => __( 'Styling', 'segovia-core' ),
        ),
        array(
          "type"      => 'colorpicker',
          "heading"   => __('Tab Section Title Color', 'segovia-core'),
          "param_name" => "tab_section_title_color",
           "group" => __( "Styling", 'segovia-core'),
          "value"      => "",
          "description" => __( "Pick your tab section title color.", 'segovia-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type"      => 'textfield',
          "heading"   => __('Tab Section Title Size', 'segovia-core'),
          "param_name" => "tab_section_title_size",
           "group" => __( "Styling", 'segovia-core'),
          "value"      => "",
          "description" => __( "Pick your tab section title size.", 'segovia-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          'type'        => 'textfield',
          'heading'     => __( "Tab Content Size", 'segovia-core'),
          'param_name'  => 'tab_content_size',
           "group" => __( "Styling", 'segovia-core'),
          "description" => __( "Enter the numeric value for content size in px.", 'segovia-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type"      => 'colorpicker',
          "heading"   => __('Tab Section Content Color', 'segovia-core'),
          "param_name" => "tab_section_content_color",
           "group" => __( "Styling", 'segovia-core'),
          "value"      => "",
          "description" => __( "Pick your tab section content color.", 'segovia-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),

        array(
          "type"        => "notice",
          "heading"     => __( "Tab Section Content Styles", 'omnitail-core' ),
          "param_name"  => 'tgl_btn',
          'class'       => 'cs-info',
          'value'       => '',
          'group' => __( 'Styling', 'segovia-core' ),
        ),
          array(
          "type"      => 'colorpicker',
          "heading"   => __('Tab Title Color', 'segovia-core'),
          "param_name" => "tab_title_color",
           "group" => __( "Styling", 'segovia-core'),
          "value"      => "",
          "description" => __( "Pick your tab title color.", 'segovia-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          'type'        => 'textfield',
          'heading'     => __( "Tab Title Size", 'segovia-core'),
          'param_name'  => 'tab_title_size',
           "group" => __( "Styling", 'segovia-core'),
          "description" => __( "Enter the numeric value for title size in px.", 'segovia-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          'type'        => 'textfield',
          'heading'     => __( "Tab Content Size", 'segovia-core'),
          'param_name'  => 'tab_main_content_size',
           "group" => __( "Styling", 'segovia-core'),
          "description" => __( "Enter the numeric value for content size in px.", 'segovia-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type"      => 'colorpicker',
          "heading"   => __('Tab Content Color', 'segovia-core'),
          "param_name" => "tab_content_color",
           "group" => __( "Styling", 'segovia-core'),
          "value"      => "",
          "description" => __( "Pick your tab content color.", 'segovia-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type"      => 'colorpicker',
          "heading"   => __('Tab Title BG Color', 'segovia-core'),
          "param_name" => "tab_title_bg_color",
           "group" => __( "Styling", 'segovia-core'),
          "value"      => "",
          "description" => __( "Pick your tab title bg color.", 'segovia-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type"        => "notice",
          "heading"     => __( "Tab Section Active Styles", 'omnitail-core' ),
          "param_name"  => 'tgl_btn',
          'class'       => 'cs-info',
          'value'       => '',
          'group' => __( 'Styling', 'segovia-core' ),
        ),
        array(
          "type"      => 'colorpicker',
          "heading"   => __('Tab Title Active Color', 'segovia-core'),
          "param_name" => "tab_title_hover_color",
           "group" => __( "Styling", 'segovia-core'),
          "value"      => "",
          "description" => __( "Pick your tab title active color.", 'segovia-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type"      => 'colorpicker',
          "heading"   => __('Tab Title Active Bg Color', 'segovia-core'),
          "param_name" => "tab_title_active_bg_color",
           "group" => __( "Styling", 'segovia-core'),
          "value"      => "",
          "description" => __( "Pick your tab title active bg color.", 'segovia-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),


      ),
      'custom_markup'   => '<div class="wpb_tabs_holder wpb_holder vc_container_for_children"><ul class="tabs_controls"></ul>%content%</div>',
      'default_content' => '
        [vc_tab title="Tab 1" tab_id="' . $tab_one_id . '"][/vc_tab]
        [vc_tab title="Tab 2" tab_id="' . $tab_two_id . '"][/vc_tab]
        [vc_tab title="Tab 3" tab_id="' . $tab_three_id . '"][/vc_tab]',
      'js_view'         => 'VcTabsView'
    ) );

    /* Tab */
    vc_map( array(
      'name'                      => __( "Tab", 'segovia-core'),
      'base'                      => 'vc_tab',
      // 'allowed_container_element' => 'vc_row',
      'is_container'              => true,
      'content_element'           => false,
      'category'                  => SegoviaLib::segovia_cat_name(),
      'params'                    => array(
        array(
          'type'        => 'tab_id',
          'heading'     => __( "Tab Unique ID", 'segovia-core'),
          'param_name'  => 'tab_id'
        ),
        array(
          'type'        => 'textfield',
          'heading'     => __( "Tab Title", 'segovia-core'),
          'param_name'  => 'title',
        ),

      ),
      'js_view'         => 'VcTabView'
    ) );

  }
}
