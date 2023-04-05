<?php
/**
 * Accordion - Shortcode Options
 */
add_action( 'init', 'segovia_accordion_vc_map' );
if ( ! function_exists( 'segovia_accordion_vc_map' ) ) {
  function segovia_accordion_vc_map() {

    vc_map( array(
      'name'            => __( 'Segovia Accordion', 'segovia-core'),
      'base'            => 'vc_accordion',
      'is_container'    => true,
      'description'     => __( 'Accordion Styles', 'segovia-core'),
      'icon'            => 'fa fa-bars color-pink',
      'category'        => SegoviaLib::segovia_cat_name(),
      'params'          => array(

        SegoviaLib::vt_id_option(),
        SegoviaLib::vt_class_option(),
        array(
          'type'        => 'textfield',
          'heading'     => __( 'Active tab', 'segovia-core'),
          'param_name'  => 'active_tab',
          'description' => __( "Which tab you want to be active on load. [Eg. 1 or 2 or 3]", 'segovia-core'),
        ),
        array(
          'type'        => 'textfield',
          'heading'     => __( 'Title Size', 'segovia-core'),
          'param_name'  => 'title_size',
          'group' => __( 'Style', 'segovia-core' ),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          'type' => 'colorpicker',
          'value' => '',
          'heading' => __( 'Title Color', 'segovia-core' ),
          'param_name' => 'title_color',
          'group' => __( 'Style', 'segovia-core' ),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          'type' => 'colorpicker',
          'value' => '',
          'heading' => __( 'Title Background Color', 'segovia-core' ),
          'param_name' => 'title_bg_color',
          'group' => __( 'Style', 'segovia-core' ),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          'type' => 'colorpicker',
          'value' => '',
          'heading' => __( 'Toggle Button Color', 'segovia-core' ),
          'param_name' => 'tgl_btn_color',
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
          'group' => __( 'Style', 'segovia-core' ),
        ),  
        array(
          "type"        => "notice",
          "heading"     => __( "Active Styles", 'segovia-core' ),
          "param_name"  => 'tgl_btn',
          'class'       => 'cs-info',
          'value'       => '',
          'group' => __( 'Style', 'segovia-core' ),
        ),
        array(
          'type' => 'colorpicker',
          'value' => '',
          'heading' => __( 'Active Title Color', 'segovia-core' ),
          'param_name' => 'active_title_color',
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
          'group' => __( 'Style', 'segovia-core' ),
        ),  
        array(
          'type' => 'colorpicker',
          'value' => '',
          'heading' => __( 'Active Title BG Color', 'segovia-core' ),
          'param_name' => 'active_title_bg_color',
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
          'group' => __( 'Style', 'segovia-core' ),
        ),  
        array(
          'type' => 'colorpicker',
          'value' => '',
          'heading' => __( 'Active Toggle Button Color', 'segovia-core' ),
          'param_name' => 'active_toggle_color',
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
          'group' => __( 'Style', 'segovia-core' ),
        ),  

      ),

      'custom_markup'   => '<div class="wpb_accordion_holder wpb_holder clearfix vc_container_for_children">%content%</div><div class="tab_controls"><a class="add_tab" title="Add section"><span class="vc_icon"></span> <span class="tab-label">Add section</span></a></div>',
      'default_content' => '
        [vc_accordion_tab title="Accordion Tab 1" sub_title="Sub Title 1"][/vc_accordion_tab]
        [vc_accordion_tab title="Accordion Tab 2" sub_title="Sub Title 2"][/vc_accordion_tab]
      ',
      'js_view'         => 'VcAccordionView'
    ) );

    // ==========================================================================================
    // VC ACCORDION TAB
    // ==========================================================================================
    vc_map( array(
      'name'                      => __( 'Accordion Section', 'segovia-core'),
      'base'                      => 'vc_accordion_tab',
      // 'allowed_container_element' => 'vc_row',
      'is_container'              => true,
      'content_element'           => false,
      'category'                  => SegoviaLib::segovia_cat_name(),
      'params'                    => array(
        array(
          'type'        => 'textfield',
          'heading'     => __( 'Title', 'segovia-core'),
          'param_name'  => 'title',
        ),
      ),
      'js_view'         => 'VcAccordionTabView'
    ) );

  }
}
