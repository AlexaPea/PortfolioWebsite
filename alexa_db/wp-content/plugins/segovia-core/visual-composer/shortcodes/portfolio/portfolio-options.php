<?php
/**
 * Portfolio - Shortcode Options
 */
add_action( 'init', 'segovia_portfolio_vc_map' );
if ( ! function_exists( 'segovia_portfolio_vc_map' ) ) {
  function segovia_portfolio_vc_map() {
    vc_map( array(
      "name" => __( "Portfolio", 'segovia-core'),
      "base" => "segva_portfolio",
      "description" => __( "Portfolio Styles", 'segovia-core'),
      "icon" => "fa fa-briefcase color-green",
      "category" => SegoviaLib::segovia_cat_name(),
      "params" => array(

        array(
          'type' => 'dropdown',
          'heading' => __( 'Portfolio Style', 'segovia-core' ),
          'value' => array(
            __( 'Style One(Masonry Column)', 'segovia-core' ) => 'bpw-style-one',
            __( 'Style Two (Detail At Bottom)', 'segovia-core' ) => 'bpw-style-two',
             __( 'Style Three(Detail On Image)', 'segovia-core' ) => 'bpw-style-three',
             __( 'Style Four(Vertical Images)', 'segovia-core' ) => 'bpw-style-four',
             __( 'Style Five(Horizontal Image)', 'segovia-core' ) => 'bpw-style-five',
          ),
          'admin_label' => true,
          'param_name' => 'portfolio_style',
          'description' => __( 'Select your portfolio style.', 'segovia-core' ),
        ),
        array(
          "type"        =>'textfield',
          "heading"     =>__('Portfolio Title', 'segovia-core'),
          "param_name"  => "portfolio_title",
          "value"       => "",
          'admin_label' => true,
          "description" => __( "Enter the title for portfolio.", 'segovia-core'),
          'dependency' => array(
            'element' => 'portfolio_style',
            'value' => 'bpw-style-three',
          ),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type"        =>'textfield',
          "heading"     =>__('Limit', 'segovia-core'),
          "param_name"  => "portfolio_limit",
          "value"       => "",
          'admin_label' => true,
          "description" => __( "Enter the number of items to show.", 'segovia-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type"        =>'textfield',
          "heading"     =>__('Readmore Title', 'segovia-core'),
          "param_name"  => "readmore_title",
          "value"       => "",
          'admin_label' => true,
          "description" => __( "Enter the readmore title.", 'segovia-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
          'dependency' => array(
            'element' => 'portfolio_style',
            'value' => array('bpw-style-four','bpw-style-five'),
          ),
        ),
        array(
          'type' => 'dropdown',
          'heading' => __( 'Columns', 'segovia-core' ),
          'value' => array(
            __( 'Select Portfolio Columns', 'segovia-core' ) => '',
            __( 'Column Two', 'segovia-core' ) => 'bpw-col-2',
            __( 'Column Three', 'segovia-core' ) => 'bpw-col-3',
            __( 'Column Four', 'segovia-core' ) => 'bpw-col-4',
          ),
          'dependency' => array(
            'element' => 'portfolio_style',
            'value' => array('bpw-style-one','bpw-style-two','bpw-style-three'),
          ),
          'admin_label' => true,
          'param_name' => 'portfolio_column',
          'description' => __( 'Select your portfolio column.', 'segovia-core' ),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),

        array(
    			"type"        => "notice",
    			"heading"     => __( "Enable & Disable", 'segovia-core' ),
    			"param_name"  => 'ends_opt',
    			'class'       => 'cs-warning',
    			'value'       => '',
           'dependency' => array(
            'element' => 'portfolio_style',
            'value' => array('bpw-style-one','bpw-style-two','bpw-style-three'),
          ),
    		),
        array(
          "type"        =>'switcher',
          "heading"     =>__('Filter', 'segovia-core'),
          "param_name"  => "portfolio_filter",
          "value"       => "",
          "std"         => true,
          'dependency' => array(
            'element' => 'portfolio_style',
            'value' => array('bpw-style-two','bpw-style-three'),
          ),
          'edit_field_class'   => 'vc_col-md-4 vc_column vt_field_space',
        ),
        array(
          "type"        =>'switcher',
          "heading"     =>__('Pagination', 'segovia-core'),
          "param_name"  => "portfolio_pagination",
          "value"       => "",
          "std"         => true,
          'edit_field_class'   => 'vc_col-md-4 vc_column vt_field_space',
           'dependency' => array(
            'element' => 'portfolio_style',
            'value' => array('bpw-style-one','bpw-style-three'),
          ),
        ),
        array(
    			"type"        => "notice",
    			"heading"     => __( "Listing", 'segovia-core' ),
    			"param_name"  => 'lsng_opt',
    			'class'       => 'cs-warning',
    			'value'       => '',
    		),
        array(
          'type' => 'dropdown',
          'heading' => __( 'Order', 'segovia-core' ),
          'value' => array(
            __( 'Select Portfolio Order', 'segovia-core' ) => '',
            __('Asending', 'segovia-core') => 'ASC',
            __('Desending', 'segovia-core') => 'DESC',
          ),
          'param_name' => 'portfolio_order',
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          'type' => 'dropdown',
          'heading' => __( 'Order By', 'segovia-core' ),
          'value' => array(
            __('None', 'segovia-core') => 'none',
            __('ID', 'segovia-core') => 'ID',
            __('Author', 'segovia-core') => 'author',
            __('Title', 'segovia-core') => 'title',
            __('Date', 'segovia-core') => 'date',
          ),
          'param_name' => 'portfolio_orderby',
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type"        => 'textfield',
          "heading"     => __('Show only certain categories?', 'segovia-core'),
          "param_name"  => "portfolio_show_category",
          "value"       => "",
          "description" => __( "Enter category SLUGS (comma separated) you want to display.", 'segovia-core')
        ),
        SegoviaLib::vt_class_option(),

        // Stylings
        array(
    			"type"        => "notice",
    			"heading"     => __( "Filter", 'segovia-core' ),
    			"param_name"  => 'flst_opt',
    			'class'       => 'cs-warning',
    			'value'       => '',
          "group"       => __('Style', 'segovia-core'),
          'dependency' => array(
            'element' => 'portfolio_filter',
            'value' => 'true',
          ),
    		),
        array(
          "type"        => 'colorpicker',
          "heading"     => __('Color', 'segovia-core'),
          "param_name"  => "filter_color",
          "value"       => "",
          'edit_field_class'   => 'vc_col-md-4 vt_field_space',
          "group"       => __('Style', 'segovia-core'),
          'dependency' => array(
            'element' => 'portfolio_filter',
            'value' => 'true',
          ),
        ),
        array(
          "type"        => 'colorpicker',
          "heading"     => __('Active Color', 'segovia-core'),
          "param_name"  => "filter_active_color",
          "value"       => "",
          'edit_field_class'   => 'vc_col-md-4 vt_field_space',
          "group"       => __('Style', 'segovia-core'),
          'dependency' => array(
            'element' => 'portfolio_filter',
            'value' => 'true',
          ),
        ),
        array(
          "type"        => 'textfield',
          "heading"     => __('Text Size', 'segovia-core'),
          "param_name"  => "filter_size",
          "value"       => "",
          "group"       => __('Style', 'segovia-core'),
          "description" => __( "Enter filter text size in px.", 'segovia-core'),
          'dependency' => array(
            'element' => 'portfolio_filter',
            'value' => 'true',
          ),
        ),

        // Size
        array(
    			"type"        => "notice",
    			"heading"     => __( "Item Style", 'segovia-core' ),
    			"param_name"  => 'itm_opt',
    			'class'       => 'cs-warning',
    			'value'       => '',
          "group"       => __('Style', 'segovia-core'),
    		),
        array(
          "type"        => 'colorpicker',
          "heading"     => __('Image Overlay Color', 'segovia-core'),
          "param_name"  => "image_overlay_color",
          "value"       => "rgba(0,41,82,0.9)",
          'edit_field_class'   => 'vc_col-md-4 vt_field_space',
          "group"       => __('Style', 'segovia-core'),
           'dependency' => array(
            'element' => 'portfolio_style',
            'value' => array('bpw-style-one','bpw-style-two','bpw-style-three'),
          ),
        ),
        array(
          "type"        => 'textfield',
          "heading"     => __('Title Size', 'segovia-core'),
          "param_name"  => "portfolio_title_size",
          "value"       => "",
          'edit_field_class'   => 'vc_col-md-4 vt_field_space',
          "group"       => __('Style', 'segovia-core'),
        ),
        array(
          "type"        => 'colorpicker',
          "heading"     => __('Title Color', 'segovia-core'),
          "param_name"  => "portfolio_title_color",
          "value"       => "",
          'edit_field_class'   => 'vc_col-md-4 vt_field_space',
          "group"       => __('Style', 'segovia-core'),
        ),
        array(
          "type"        => 'colorpicker',
          "heading"     => __('Title Hover Color', 'segovia-core'),
          "param_name"  => "portfolio_title_hover_color",
          "value"       => "",
          'edit_field_class'   => 'vc_col-md-4 vt_field_space',
          "group"       => __('Style', 'segovia-core'),
          'dependency' => array(
            'element' => 'portfolio_style',
            'value' => array('bpw-style-one','bpw-style-two','bpw-style-three'),
          ),
        ),
        array(
          "type"        => 'colorpicker',
          "heading"     => __('Categroy Color', 'segovia-core'),
          "param_name"  => "portfolio_cat_color",
          "value"       => "",
          'edit_field_class'   => 'vc_col-md-4 vt_field_space',
          "group"       => __('Style', 'segovia-core'),
          'dependency' => array(
            'element' => 'portfolio_style',
            'value' => array('bpw-style-one','bpw-style-two','bpw-style-three'),
          ),
        ),
        array(
          "type"        => 'colorpicker',
          "heading"     => __('Category Hover Color', 'segovia-core'),
          "param_name"  => "portfolio_cat_hover_color",
          "value"       => "",
          'edit_field_class'   => 'vc_col-md-4 vt_field_space',
          "group"       => __('Style', 'segovia-core'),
           'dependency' => array(
            'element' => 'portfolio_style',
            'value' => array('bpw-style-one','bpw-style-two','bpw-style-three'),
          ),
        ),
        array(
          "type"        => 'textfield',
          "heading"     => __('Category Size', 'segovia-core'),
          "param_name"  => "portfolio_cat_size",
          "value"       => "",
          'edit_field_class'   => 'vc_col-md-4 vt_field_space',
          "group"       => __('Style', 'segovia-core'),
          'dependency' => array(
            'element' => 'portfolio_style',
            'value' => array('bpw-style-one','bpw-style-two','bpw-style-three'),
          ),
        ),
        array(
          "type"        => 'textfield',
          "heading"     => __('Read More Size', 'segovia-core'),
          "param_name"  => "portfolio_readmore_size",
          "value"       => "",
          'edit_field_class'   => 'vc_col-md-4 vt_field_space',
          "group"       => __('Style', 'segovia-core'),
          'dependency' => array(
            'element' => 'portfolio_style',
            'value' => array('bpw-style-four','bpw-style-five'),
          ),
        ),
        array(
          "type"        => 'colorpicker',
          "heading"     => __('Read More Color', 'segovia-core'),
          "param_name"  => "portfolio_readmore_color",
          "value"       => "",
          'edit_field_class'   => 'vc_col-md-4 vt_field_space',
          "group"       => __('Style', 'segovia-core'),
          'dependency' => array(
            'element' => 'portfolio_style',
            'value' => array('bpw-style-four','bpw-style-five'),
          ),
        ),
        array(
          "type"        => 'colorpicker',
          "heading"     => __('Read More Border Color', 'segovia-core'),
          "param_name"  => "portfolio_readmoreborder_color",
          "value"       => "",
          'edit_field_class'   => 'vc_col-md-4 vt_field_space',
          "group"       => __('Style', 'segovia-core'),
          'dependency' => array(
            'element' => 'portfolio_style',
            'value' => array('bpw-style-four','bpw-style-five'),
          ),
        ),
        array(
          "type"        => 'colorpicker',
          "heading"     => __('Read More Hover Color', 'segovia-core'),
          "param_name"  => "portfolio_readmorehover_color",
          "value"       => "",
          'edit_field_class'   => 'vc_col-md-4 vt_field_space',
          "group"       => __('Style', 'segovia-core'),
          'dependency' => array(
            'element' => 'portfolio_style',
            'value' => array('bpw-style-four','bpw-style-five'),
          ),
        ),
        array(
          "type"        => 'textfield',
          "heading"     => __('Info Content Size', 'segovia-core'),
          "param_name"  => "banner_info_size",
          "value"       => "",
          'edit_field_class'   => 'vc_col-md-4 vt_field_space',
          "group"       => __('Style', 'segovia-core'),
          'dependency' => array(
            'element' => 'portfolio_style',
            'value' => array('bpw-style-five'),
          ),
        ),
        array(
          "type"        => 'colorpicker',
          "heading"     => __('Info Content Color', 'segovia-core'),
          "param_name"  => "banner_info_color",
          "value"       => "",
          'edit_field_class'   => 'vc_col-md-4 vt_field_space',
          "group"       => __('Style', 'segovia-core'),
          'dependency' => array(
            'element' => 'portfolio_style',
            'value' => array('bpw-style-five'),
          ),
        ),
      )
    ) );
  }
}
