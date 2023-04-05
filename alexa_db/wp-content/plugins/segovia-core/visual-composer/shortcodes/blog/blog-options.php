<?php
/**
 * Blog - Shortcode Options
 */
add_action( 'init', 'segovia_blog_vc_map' );
if ( ! function_exists( 'segovia_blog_vc_map' ) ) {
  function segovia_blog_vc_map() {
    vc_map( array(
      "name" => __( "Blog", 'segovia-core'),
      "base" => "segva_blog",
      "description" => __( "Blog Styles", 'segovia-core'),
      "icon" => "fa fa-newspaper-o color-red",
      "category" => SegoviaLib::segovia_cat_name(),
      "params" => array(

        array(
          'type' => 'dropdown',
          'heading' => __( 'Blog Style', 'segovia-core' ),
          'value' => array(
            __( 'List (Default)', 'segovia-core' ) => 'style-one',
            __( 'Masonry', 'segovia-core' ) => 'style-two',
            __( 'Grid', 'segovia-core' ) => 'style-three',
          ),
          'admin_label' => true,
          'param_name' => 'blog_style',
          'description' => __( 'Select your blog style.', 'segovia-core' ),
        ),
        array(
          'type' => 'dropdown',
          'heading' => __( 'Columns', 'segovia-core' ),
          'value' => array(
            __( 'Select Blog Columns', 'segovia-core' ) => '',
            __( 'Column Two', 'segovia-core' ) => 'segva-blog-col-2',
            __( 'Column Three', 'segovia-core' ) => 'segva-blog-col-3',
            __( 'Column Four', 'segovia-core' ) => 'segva-blog-col-4',
          ),
          'admin_label' => true,
          'param_name' => 'blog_column',
          'description' => __( 'Select your blog column.', 'segovia-core' ),
          'dependency' => array(
            'element' => 'blog_style',
            'value' => array('style-two','style-three'),
          ),
        ),
        array(
          "type"        =>'textfield',
          "heading"     =>__('Limit', 'segovia-core'),
          "param_name"  => "blog_limit",
          "value"       => "",
          'admin_label' => true,
          "description" => __( "Enter the number of items to show.", 'segovia-core'),
        ),

        array(
    			"type"        => "notice",
    			"heading"     => __( "Meta's to Hide", 'segovia-core' ),
    			"param_name"  => 'mts_opt',
    			'class'       => 'cs-warning',
    			'value'       => '',
    		),
        array(
          "type"        => 'switcher',
          "heading"     => __('Category', 'segovia-core'),
          "param_name"  => "blog_category",
          "value"       => "",
          "std"         => false,
          'edit_field_class' => 'vc_col-md-3 vc_column vt_field_space',
        ),
        array(
          "type"        =>'switcher',
          "heading"     =>__('Date', 'segovia-core'),
          "param_name"  => "blog_date",
          "value"       => "",
          "std"         => false,
          'edit_field_class'   => 'vc_col-md-3 vc_column vt_field_space',
        ),
        array(
          "type"        =>'switcher',
          "heading"     =>__('Author', 'segovia-core'),
          "param_name"  => "blog_author",
          "value"       => "",
          "std"         => false,
          'edit_field_class'   => 'vc_col-md-3 vc_column vt_field_space',
        ),
        array(
          "type"        =>'switcher',
          "heading"     =>__('Comments', 'segovia-core'),
          "param_name"  => "blog_comments",
          "value"       => "",
          "std"         => false,
          'edit_field_class'   => 'vc_col-md-3 vc_column vt_field_space',
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
            __( 'Select Blog Order', 'segovia-core' ) => '',
            __('Asending', 'segovia-core') => 'ASC',
            __('Desending', 'segovia-core') => 'DESC',
          ),
          'param_name' => 'blog_order',
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
          'param_name' => 'blog_orderby',
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type"        => 'textfield',
          "heading"     => __('Show only certain categories?', 'segovia-core'),
          "param_name"  => "blog_show_category",
          "value"       => "",
          "description" => __( "Enter category SLUGS (comma separated) you want to display.", 'segovia-core')
        ),
        array(
          "type"        => 'textfield',
          "heading"     => __('Short Content (Excerpt Length)', 'segovia-core'),
          "param_name"  => "short_content",
          "value"       => "",
          "description" => __( "Enter the numeric value of, how many words you want in short content paragraph.", 'segovia-core')
        ),
        array(
          "type"        =>'switcher',
          "heading"     =>__('Pagination', 'segovia-core'),
          "param_name"  => "blog_pagination",
          "value"       => "",
          "std"         => true,
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type"        =>'textfield',
          "heading"     =>__('Read More Button Text', 'segovia-core'),
          "param_name"  => "read_more_txt",
          "value"       => "",
          "description" => __( "Enter read more button text.", 'segovia-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type"        =>'textfield',
          "heading"     =>__('Miss-Aligned? Mention Minimum Height :', 'segovia-core'),
          "param_name"  => "miss_align_height",
          "value"       => "",
          "description" => __( "Enter the px value for minimum height. This will fix miss-aligned issue with your listing items.", 'segovia-core')
        ),
        SegoviaLib::vt_class_option(),

      )
    ) );
  }
}
