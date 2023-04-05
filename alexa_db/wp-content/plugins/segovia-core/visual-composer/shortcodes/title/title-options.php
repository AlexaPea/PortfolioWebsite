<?php
/**
 * Title - Shortcode Options
 */
add_action( 'init', 'segov_title_vc_map' );
if ( ! function_exists( 'segov_title_vc_map' ) ) {
  function segov_title_vc_map() {
    vc_map( array(
      "name" => esc_html__( "Segovia Title", 'segovia-core'),
      "base" => "segov_title",
      "description" => esc_html__( "Title Styles", 'segovia-core'),
      "icon" => "fa fa-header color-orange",
      "category" => SegoviaLib::segovia_cat_name(),
      "params" => array(        
             
        array(
          "type" => "textarea",
          "heading" => esc_html__( "Title", 'segovia-core' ),
          "param_name" => "title",
          'value' => '',
          'admin_label' => true,
          "description" => esc_html__( "Enter section your title.", 'segovia-core'),
          'edit_field_class'  => 'vc_col-md-12 vc_column vt_field_space',
        ),
        array(
          "type"      => 'textarea',
          "heading"   => esc_html__('Description', 'segovia-core'),
          "param_name" => "description",
          "value"      => "",
          "description" => esc_html__( "Enter your sub title here.", 'segovia-core'),
        ),
        array(
          "type" => "dropdown",
          "heading" => esc_html__( "Title Section Align", 'segovia-core' ),
          "param_name" => "text_align",
          'value' => array(
            esc_html__( 'Center', 'segovia-core' ) => 'text-center',
            esc_html__( 'Left', 'segovia-core' ) => 'text-left',
            esc_html__( 'Right', 'segovia-core' ) => 'text-right',
          ),
          'edit_field_class'  => 'vc_col-md-12 vc_column vt_field_space',
        ),
        array(
          'type' => 'dropdown',
          'heading' => esc_html__( 'Title Tags', 'segovia-core' ),
          'value' => array(
            esc_html__( 'H2', 'segovia-core' ) => 'h2',
            esc_html__( 'Div', 'segovia-core' ) => 'div',
            esc_html__( 'H1', 'segovia-core' ) => 'h1',
            esc_html__( 'H3', 'segovia-core' ) => 'h3',
            esc_html__( 'H4', 'segovia-core' ) => 'h4',
            esc_html__( 'H5', 'segovia-core' ) => 'h5',
            esc_html__( 'H6', 'segovia-core' ) => 'h6',
          ),
          'admin_label' => true,
          'param_name' => 'title_tag',
          'edit_field_class'  => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type" => "textfield",
          "heading" => esc_html__( "Section Class ", 'segovia-core' ),
          "param_name" => "section_class",
          'value' => '',
         'edit_field_class'  => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type" => "textfield",
          "heading" => esc_html__( "Title Section Width ", 'segovia-core' ),
          "param_name" => "section_width",
          'value' => '',
         'edit_field_class'  => 'vc_col-md-6 vc_column vt_field_space',
         "description" => esc_html__( "Enter your title section width EX: 750px.", 'segovia-core'),
        ),
      
        // Styling
        array(
          "type"        => "notice",
          "heading"     => esc_html__( "Title styles", 'segovia-core' ),
          "param_name"  => 'lsng_opt',
          'class'       => 'cs-warning',
          "group" => esc_html__( "Styling", 'segovia-core'),
          'value'       => '',
        ),
      
        array(
          "type" => "textfield",
          "heading" => esc_html__( "Title Size ", 'segovia-core' ),
          "param_name" => "title_size",
          'value' => '',
          "group" => esc_html__( "Styling", 'segovia-core'),
          'edit_field_class'  => 'vc_col-md-4 vc_column vt_field_space',
        ),
        array(
          "type" => "colorpicker",
          "heading" => esc_html__( "Title Color", 'segovia-core' ),
          "param_name" => "title_color",
          'value' => '',
          "group" => esc_html__( "Styling", 'segovia-core'),
          'edit_field_class'  => 'vc_col-md-4 vc_column vt_field_space',
        ),
        array(
          "type" => "textfield",
          "heading" => esc_html__( "Title Bottom Space ", 'segovia-core' ),
          "param_name" => "title_bottom_space",
          'value' => '',
          "group" => esc_html__( "Styling", 'segovia-core'),
          'edit_field_class'  => 'vc_col-md-4 vc_column vt_field_space',
        ),
        array(
          "type" => "textfield",
          "heading" => esc_html__( "Title Line Height  ", 'segovia-core' ),
          "param_name" => "title_lineheight",
          'value' => '',
          "group" => esc_html__( "Styling", 'segovia-core'),
          'edit_field_class'  => 'vc_col-md-4 vc_column vt_field_space',
        ),
        array(
          "type"        => "notice",
          "heading"     => esc_html__( "Description styles", 'segovia-core' ),
          "param_name"  => 'lsng_opt',
          'class'       => 'cs-warning',
          "group" => esc_html__( "Styling", 'segovia-core'),
          'value'       => '',
        ),
        array(
          "type" => "colorpicker",
          "heading" => esc_html__( "Description Color", 'segovia-core' ),
          "param_name" => "desc_color",
          'value' => '',
          "group" => esc_html__( "Styling", 'segovia-core'),
          'edit_field_class'  => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type" => "textfield",
          "heading" => esc_html__( "Description Size ", 'segovia-core' ),
          "param_name" => "desc_size",
          'value' => '',
          "group" => esc_html__( "Styling", 'segovia-core'),
          'edit_field_class'  => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type" => "textfield",
          "heading" => esc_html__( "Description Line Height ", 'segovia-core' ),
          "param_name" => "desc_line_height",
          'value' => '',
          "group" => esc_html__( "Styling", 'segovia-core'),
          'edit_field_class'  => 'vc_col-md-6 vc_column vt_field_space',
        ),
        // Design Tab
        array(
          "type" => "css_editor",
          "heading" => esc_html__( "Custom Style", 'segovia-core' ),
          "param_name" => "css",
          "group" => esc_html__( "Design", 'segovia-core'),
        ),

      )
    ) );
  }
}
