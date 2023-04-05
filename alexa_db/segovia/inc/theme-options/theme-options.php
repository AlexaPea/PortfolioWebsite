<?php
/*
 * All Theme Options for Segovia theme.
 * Author & Copyright: VictorThemes
 * URL: https://victorthemes.com/wp-themes
 */

function segovia_vt_settings( $settings ) {

  $settings           = array(
    'menu_title'      => SEGOVIA_NAME . esc_html__( ' Options', 'segovia' ),
    'menu_slug'       => sanitize_title(SEGOVIA_NAME) . '_options',
    'menu_type'       => 'menu',
    'menu_icon'       => 'dashicons-awards',
    'menu_position'   => '4',
    'ajax_save'       => false,
    'show_reset_all'  => true,
    'framework_title' => SEGOVIA_NAME .' <small>V-'. SEGOVIA_VERSION .' by <a href="'. SEGOVIA_BRAND_URL .'" target="_blank">'. SEGOVIA_BRAND_NAME .'</a></small>',
  );

  return $settings;

}
add_filter( 'cs_framework_settings', 'segovia_vt_settings' );

// Theme Framework Options
function segovia_vt_options( $options ) {

  $options      = array(); // remove old options

  // ------------------------------
  // Theme Brand
  // ------------------------------
  $options[]   = array(
    'name'     => 'theme_brand',
    'title'    => esc_html__( 'Brand', 'segovia' ),
    'icon'     => 'fa fa-bookmark',
     'fields'   => array(

          // Site Logo
          array(
            'type'    => 'notice',
            'class'   => 'info cs-vt-heading',
            'content' => esc_html__( 'Site Logo', 'segovia' )
          ),
          array(
            'id'    => 'brand_logo_default',
            'type'  => 'image',
            'title' => esc_html__( 'Default Logo', 'segovia' ),
            'info'  => esc_html__( 'Upload your default logo here. If you not upload, then site title will load in this logo location.', 'segovia' ),
            'add_title' => esc_html__( 'Add Logo', 'segovia' ),
          ),
          array(
            'id'    => 'brand_logo_retina',
            'type'  => 'image',
            'title' => esc_html__( 'Retina Logo', 'segovia' ),
            'info'  => esc_html__( 'Upload your retina logo here. Recommended size is 2x from default logo.', 'segovia' ),
            'add_title' => esc_html__( 'Add Retina Logo', 'segovia' ),
          ),
          array(
            'id'          => 'retina_width',
            'type'        => 'text',
            'title'       => esc_html__( 'Retina & Normal Logo Width', 'segovia' ),
            'unit'        => 'px',
          ),
          array(
            'id'          => 'retina_height',
            'type'        => 'text',
            'title'       => esc_html__( 'Retina & Normal Logo Height', 'segovia' ),
            'unit'        => 'px',
          ),
          array(
            'id'          => 'brand_logo_top',
            'type'        => 'number',
            'title'       => esc_html__( 'Logo Top Space', 'segovia' ),
            'attributes'  => array( 'placeholder' => 5 ),
            'unit'        => 'px',
          ),
          array(
            'id'          => 'brand_logo_bottom',
            'type'        => 'number',
            'title'       => esc_html__( 'Logo Bottom Space', 'segovia' ),
            'attributes'  => array( 'placeholder' => 5 ),
            'unit'        => 'px',
          ),
          array(
            'type'    => 'notice',
            'class'   => 'info cs-vt-heading',
            'content' => esc_html__( 'Small Logo / Sidebar Logo', 'segovia' )
          ),
          array(
            'id'    => 'brand_logo_default_small',
            'type'  => 'image',
            'title' => esc_html__( 'Default Small Logo (Show on left sidebar header)', 'segovia' ),
            'info'  => esc_html__( 'Upload your default small logo here. Recommended size is 150x150.', 'segovia' ),
            'add_title' => esc_html__( 'Add Small Logo', 'segovia' ),
          ),

          array(
            'type'    => 'notice',
            'class'   => 'info cs-vt-heading',
            'content' => esc_html__( 'Transparent Header', 'segovia' )
          ),
          array(
            'id'    => 'transparent_logo_default',
            'type'  => 'image',
            'title' => esc_html__( 'Transparent Logo', 'segovia' ),
            'info'  => esc_html__( 'Upload your transparent header logo here. This logo is used in transparent header by enabled in each pages.', 'segovia' ),
            'add_title' => esc_html__( 'Add Transparent Logo', 'segovia' ),
          ),
          array(
            'id'    => 'transparent_logo_retina',
            'type'  => 'image',
            'title' => esc_html__( 'Transparent Retina Logo', 'segovia' ),
            'info'  => esc_html__( 'Upload your transparent header retina logo here. This logo is used in transparent header by enabled in each pages.', 'segovia' ),
            'add_title' => esc_html__( 'Add Transparent Retina Logo', 'segovia' ),
          ),

          // WordPress Admin Logo
          array(
            'type'    => 'notice',
            'class'   => 'info cs-vt-heading',
            'content' => esc_html__( 'WordPress Admin Logo', 'segovia' )
          ),
          array(
            'id'    => 'brand_logo_wp',
            'type'  => 'image',
            'title' => esc_html__( 'Login logo', 'segovia' ),
            'info'  => esc_html__( 'Upload your WordPress login page logo here.', 'segovia' ),
            'add_title' => esc_html__( 'Add Login Logo', 'segovia' ),
          ),
        ) // end: fields

  );

  // ------------------------------
  // Layout
  // ------------------------------
  $options[] = array(
    'name'   => 'theme_layout',
    'title'  => esc_html__( 'Layout', 'segovia' ),
    'icon'   => 'fa fa-file-text'
  );

  $options[]      = array(
    'name'        => 'theme_general',
    'title'       => esc_html__( 'General', 'segovia' ),
    'icon'        => 'fa fa-wrench',

    // begin: fields
    'fields'      => array(

      // -----------------------------
      // Begin: Responsive
      // -----------------------------
      array(
        'id'    => 'theme_layout_width',
        'type'  => 'image_select',
        'title' => esc_html__( 'Full Width & Extra Width', 'segovia' ),
        'info' => esc_html__( 'Boxed or Fullwidth? Choose your site layout width. Default : Full Width', 'segovia' ),
        'options'      => array(
          'container'    => SEGOVIA_CS_IMAGES .'/boxed-width.jpg',
          'container-fluid'    => SEGOVIA_CS_IMAGES .'/full-width.jpg',
        ),
        'default'      => 'container-fluid',
        'radio'      => true,
      ),
      array(
        'type'    => 'notice',
        'class'   => 'info cs-vt-heading',
        'content' => esc_html__( 'Background Options', 'segovia' ),
        'dependency' => array( 'theme_layout_width_container', '==', 'true' ),
      ),
      array(
        'id'             => 'theme_layout_bg_type',
        'type'           => 'select',
        'title'          => esc_html__( 'Background Type', 'segovia' ),
        'options'        => array(
          'bg-image' => esc_html__( 'Image', 'segovia' ),
          'bg-pattern' => esc_html__( 'Pattern', 'segovia' ),
        ),
        'dependency' => array( 'theme_layout_width_container', '==', 'true' ),
      ),
      array(
        'id'    => 'theme_layout_bg_pattern',
        'type'  => 'image_select',
        'title' => esc_html__( 'Background Pattern', 'segovia' ),
        'info' => esc_html__( 'Select background pattern', 'segovia' ),
        'options'      => array(
          'pattern-1'    => SEGOVIA_CS_IMAGES . '/pattern-1.png',
          'pattern-2'    => SEGOVIA_CS_IMAGES . '/pattern-2.png',
          'pattern-3'    => SEGOVIA_CS_IMAGES . '/pattern-3.png',
          'pattern-4'    => SEGOVIA_CS_IMAGES . '/pattern-4.png',
          'custom-pattern'  => SEGOVIA_CS_IMAGES . '/pattern-5.png',
        ),
        'default'      => 'pattern-1',
        'radio'      => true,
        'dependency' => array( 'theme_layout_width_container|theme_layout_bg_type', '==|==', 'true|bg-pattern' ),
      ),
      array(
        'id'      => 'custom_bg_pattern',
        'type'    => 'upload',
        'title'   => esc_html__( 'Custom Pattern', 'segovia' ),
        'dependency' => array( 'theme_layout_width_container|theme_layout_bg_type|theme_layout_bg_pattern_custom-pattern', '==|==|==', 'true|bg-pattern|true' ),
        'info' => esc_html__( 'Select your custom background pattern. <br />Note, background pattern image will be repeat in all x and y axis. So, please consider all repeatable area will perfectly fit your custom patterns.', 'segovia' ),
      ),
      array(
        'id'      => 'theme_layout_bg',
        'type'    => 'background',
        'title'   => esc_html__( 'Background', 'segovia' ),
        'dependency' => array( 'theme_layout_width_container|theme_layout_bg_type', '==|==', 'true|bg-image' ),
      ),
      array(
        'id'      => 'theme_bg_parallax',
        'type'    => 'switcher',
        'title'   => esc_html__( 'Parallax', 'segovia' ),
        'dependency' => array( 'theme_layout_width_container', '==', 'true' ),
      ),
      array(
        'id'      => 'theme_bg_parallax_speed',
        'type'    => 'text',
        'title'   => esc_html__( 'Parallax Speed', 'segovia' ),
        'attributes' => array(
          'placeholder'     => '0.4',
        ),
        'dependency' => array( 'theme_layout_width_container|theme_bg_parallax', '==|!=', 'true' ),
      ),
      array(
        'id'      => 'theme_bg_overlay_color',
        'type'    => 'color_picker',
        'title'   => esc_html__( 'Overlay Color', 'segovia' ),
        'dependency' => array( 'theme_layout_width_container', '==', 'true' ),
      ),
      array(
        'id'       => 'theme_btotop',
        'type'     => 'switcher',
        'title'    => esc_html__( 'Back To Top', 'segovia' ),
        'desc'     => esc_html__( 'Turn off if you don\'t want back to top button.', 'segovia' ),
        'text_on'  => 'Yes',
        'text_off' => 'No',
        'default' => true,
      ),
      array(
        'id'       => 'theme_img_resizer',
        'type'     => 'switcher',
        'title'    => esc_html__( 'Disable Image Resizer?', 'segovia' ),
        'desc'     => esc_html__( 'Turn on if you don\'t want image resizer.', 'segovia' ),
        'text_on'  => 'Yes',
        'text_off' => 'No',
      ),

    ), // end: fields

  );

  // ------------------------------
  // Header Sections
  // ------------------------------
  $options[]   = array(
    'name'     => 'theme_header_tab',
    'title'    => esc_html__( 'Header', 'segovia' ),
    'icon'     => 'fa fa-bars',
    'sections' => array(

      // header design tab
      array(
        'name'     => 'header_design_tab',
        'title'    => esc_html__( 'Design', 'segovia' ),
        'icon'     => 'fa fa-magic',
        'fields'   => array(

          // Header Select
          array(
            'id'           => 'select_header_design',
            'type'         => 'image_select',
            'title'        => esc_html__( 'Select Header Design', 'segovia' ),
            'options'      => array(
              'style_one'    => SEGOVIA_CS_IMAGES .'/hs-1.png',
              'style_two'    => SEGOVIA_CS_IMAGES .'/hs-2.png',
            ),
            'attributes' => array(
              'data-depend-id' => 'header_design',
            ),
            'radio'        => true,
            'default'   => 'style_one',
            'info' => esc_html__( 'Select your header design, following options will may differ based on your selection of header design.', 'segovia' ),
          ),
          // Header Select

          // Extra's
          array(
            'type'    => 'notice',
            'class'   => 'info cs-vt-heading',
            'content' => esc_html__( 'Extra\'s', 'segovia' ),
          ),
          array(
            'id'          => 'mobile_breakpoint',
            'type'        => 'text',
            'title'       => esc_html__( 'Mobile Menu Starts from?', 'segovia' ),
            'attributes'  => array( 'placeholder' => '767' ),
            'info' => esc_html__( 'Just put numeric value only. Like : 767. Don\'t use px or any other units.', 'segovia' ),
          ),
          array(
            'id'    => 'sticky_header',
            'type'  => 'switcher',
            'title' => esc_html__( 'Sticky Header', 'segovia' ),
            'info' => esc_html__( 'Turn On if you want your naviagtion bar on sticky.', 'segovia' ),
            'default' => true,
            'dependency' => array('header_design', '==', 'style_one'),
          ),
          array(
            'id'    => 'search_icon',
            'type'  => 'switcher',
            'title' => esc_html__( 'Search Icon', 'segovia' ),
            'info' => esc_html__( 'Turn On if you want to show search icon in navigation bar.', 'segovia' ),
            'default' => true,
            'dependency' => array('header_design', '==', 'style_one'),
          ),
          array(
            'id'    => 'hide_main_menu',
            'type'  => 'switcher',
            'title' => esc_html__( 'Hide Main Menu', 'segovia' ),
            'info' => esc_html__( 'Turn On if you want to show transparent overlay menu in navigation bar.', 'segovia' ),
            'default' => false,
            'dependency' => array('header_design', '==', 'style_one'),
          ),

          array(
            'id'    => 'trans_header',
            'type'  => 'switcher',
            'title' => esc_html__( 'Transparent Header', 'segovia' ),
            'info' => esc_html__( 'Turn On if you want transparent header.', 'segovia' ),
            'default' => false,
            'dependency' => array('header_design', '==', 'style_one'),
          ),
          array(
            'id'    => 'header_width',
            'type'  => 'switcher',
            'title' => esc_html__( 'Header Width', 'segovia' ),
            'info' => esc_html__( 'Turn On if you want container width header.', 'segovia' ),
            'default' => false,
            'dependency' => array('header_design', '==', 'style_one'),
          ),
          array(
            'id'    => 'menu_border',
            'type'  => 'switcher',
            'title' => esc_html__( 'Menu Border', 'segovia' ),
            'info' => esc_html__( 'Turn On if you want border bottom for Menu.', 'segovia' ),
            'default' => false,
            'dependency' => array('header_design', '==', 'style_one'),
          ),

          array(
            'id'          => 'social_ftr_icon',
            'title'       => esc_html__( 'Footer Social Icon', 'segovia' ),
            'desc'        => esc_html__( 'Footer Social Icons.', 'segovia' ),
            'type'        => 'textarea',
            'shortcode'   => true,
            'dependency' => array('header_design', '==', 'style_two'),
          ),
          array(
            'id'          => 'social_ftr_cprt',
            'title'       => esc_html__( 'Copyright Section', 'segovia' ),
            'desc'        => esc_html__( 'Footer Copyright.', 'segovia' ),
            'type'        => 'textarea',
            'shortcode'   => true,
            'dependency' => array('header_design', '==', 'style_two'),
          ),

           array(
            'type'       => 'notice',
            'class'      => 'info cs-segovia-heading',
            'content'    => esc_html__('Column Layouts', 'segovia'),
          ),
          array(
            'id'               => 'logo_column_layout',
            'type'             => 'select',
            'title'            => esc_html__('Select Column for Logo', 'segovia'),
            'options'      => array(
                '1/12'  => esc_html__('1 Column', 'segovia'),
                '1/5'   => esc_html__('2 Columns', 'segovia'),
                '1/4'   => esc_html__('3 Columns', 'segovia'),
                '1/3'   => esc_html__('4 Columns', 'segovia'),
                '5/12'  => esc_html__('5 Columns', 'segovia'),
                '1/2'   => esc_html__('6 Columns', 'segovia'),
                '7/12'  => esc_html__('7 Columns', 'segovia'),
                '2/3'   => esc_html__('8 Columns', 'segovia'),
                '3/4'   => esc_html__('9 Columns', 'segovia'),
                '5/6'   => esc_html__('10 Columns', 'segovia'),
                '11/12' => esc_html__('11 Columns', 'segovia'),
                '12/12' => esc_html__('12 Columns', 'segovia'),
              ),
            'default_option'   => 'Select column',
            'info'       => esc_html__('Total 12 columns. If you select column 3 for logo, then only 9 will be avilable for menu & icons.so you can choose 7 for menu And 2 for icons', 'segovia'),
          ),
          array(
            'id'               => 'menu_column_layout',
            'type'             => 'select',
            'title'            => esc_html__('Select Column for Menu', 'segovia'),
            'options'      => array(
                '1/12'  => esc_html__('1 Column', 'segovia'),
                '1/5'   => esc_html__('2 Columns', 'segovia'),
                '1/4'   => esc_html__('3 Columns', 'segovia'),
                '1/3'   => esc_html__('4 Columns', 'segovia'),
                '5/12'  => esc_html__('5 Columns', 'segovia'),
                '1/2'   => esc_html__('6 Columns', 'segovia'),
                '7/12'  => esc_html__('7 Columns', 'segovia'),
                '2/3'   => esc_html__('8 Columns', 'segovia'),
                '3/4'   => esc_html__('9 Columns', 'segovia'),
                '5/6'   => esc_html__('10 Columns', 'segovia'),
                '11/12' => esc_html__('11 Columns', 'segovia'),
                '12/12' => esc_html__('12 Columns', 'segovia'),
              ),
            'default_option'   => 'Select column',
          ),
          array(
            'id'               => 'icon_column_layout',
            'type'             => 'select',
            'title'            => esc_html__('Select Column for Icons', 'segovia'),
            'options'      => array(
                '1/12'  => esc_html__('1 Column', 'segovia'),
                '1/5'   => esc_html__('2 Columns', 'segovia'),
                '1/4'   => esc_html__('3 Columns', 'segovia'),
                '1/3'   => esc_html__('4 Columns', 'segovia'),
                '5/12'  => esc_html__('5 Columns', 'segovia'),
                '1/2'   => esc_html__('6 Columns', 'segovia'),
                '7/12'  => esc_html__('7 Columns', 'segovia'),
                '2/3'   => esc_html__('8 Columns', 'segovia'),
                '3/4'   => esc_html__('9 Columns', 'segovia'),
                '5/6'   => esc_html__('10 Columns', 'segovia'),
                '11/12' => esc_html__('11 Columns', 'segovia'),
                '12/12' => esc_html__('12 Columns', 'segovia'),
              ),
            'default_option'   => 'Select column',
          ),

        )
      ),

      // header banner
      array(
        'name'     => 'header_banner_tab',
        'title'    => esc_html__( 'Title Bar (or) Banner', 'segovia' ),
        'icon'     => 'fa fa-bullhorn',
        'fields'   => array(

          // Title Area
          array(
            'type'    => 'notice',
            'class'   => 'info cs-vt-heading',
            'content' => esc_html__( 'Title Area', 'segovia' )
          ),
          array(
            'id'      => 'need_title_bar',
            'type'    => 'switcher',
            'title'   => esc_html__( 'Title Bar', 'segovia' ),
            'label'   => esc_html__( 'If you want title bar in your sub-pages, please turn this ON.', 'segovia' ),
            'default'    => true,
          ),
          array(
            'id'             => 'title_bar_padding',
            'type'           => 'select',
            'title'          => esc_html__( 'Padding Spaces Top & Bottom', 'segovia' ),
            'options'        => array(
              'padding-none' => esc_html__( 'Default Spacing', 'segovia' ),
              'padding-xs' => esc_html__( 'Extra Small Padding', 'segovia' ),
              'padding-sm' => esc_html__( 'Small Padding', 'segovia' ),
              'padding-md' => esc_html__( 'Medium Padding', 'segovia' ),
              'padding-lg' => esc_html__( 'Large Padding', 'segovia' ),
              'padding-xl' => esc_html__( 'Extra Large Padding', 'segovia' ),
              'padding-no' => esc_html__( 'No Padding', 'segovia' ),
              'padding-custom' => esc_html__( 'Custom Padding', 'segovia' ),
            ),
            'dependency'   => array( 'need_title_bar', '==', 'true' ),
          ),
          array(
            'id'             => 'titlebar_top_padding',
            'type'           => 'text',
            'title'          => esc_html__( 'Padding Top', 'segovia' ),
            'attributes' => array(
              'placeholder'     => '100px',
            ),
            'dependency'   => array( 'title_bar_padding', '==', 'padding-custom' ),
          ),
          array(
            'id'             => 'titlebar_bottom_padding',
            'type'           => 'text',
            'title'          => esc_html__( 'Padding Bottom', 'segovia' ),
            'attributes' => array(
              'placeholder'     => '100px',
            ),
            'dependency'   => array( 'title_bar_padding', '==', 'padding-custom' ),
          ),

          array(
            'type'    => 'notice',
            'class'   => 'info cs-vt-heading',
            'content' => esc_html__( 'Background Options', 'segovia' ),
            'dependency' => array( 'need_title_bar', '==', 'true' ),
          ),
          array(
            'id'      => 'titlebar_bg',
            'type'    => 'background',
            'title'   => esc_html__( 'Background', 'segovia' ),
            'dependency' => array( 'need_title_bar', '==', 'true' ),
          ),
          array(
            'id'      => 'titlebar_bg_overlay_color',
            'type'    => 'color_picker',
            'title'   => esc_html__( 'Overlay Color', 'segovia' ),
            'dependency' => array( 'need_title_bar', '==', 'true' ),
          ),

          array(
            'type'    => 'notice',
            'class'   => 'info cs-vt-heading',
            'content' => esc_html__( 'Breadcrumbs', 'segovia' ),
          ),
          array(
            'id'      => 'need_breadcrumbs',
            'type'    => 'switcher',
            'title'   => esc_html__( 'Breadcrumbs', 'segovia' ),
            'label'   => esc_html__( 'If you want Breadcrumbs in your banner, please turn this ON.', 'segovia' ),
            'default'    => true,
          ),

        )
      ),

    ),
  );

  // ------------------------------
  // Footer Section
  // ------------------------------
  $options[]   = array(
    'name'     => 'footer_section',
    'title'    => esc_html__( 'Footer', 'segovia' ),
    'icon'     => 'fa fa-ellipsis-h',
        'sections' => array(

      // footer widgets
      array(
        'name'     => 'footer_widgets_tab',
        'title'    => esc_html__( 'Widget Area', 'segovia' ),
        'icon'     => 'fa fa-th',

        'fields'   => array(

          // Footer Widget Block
          array(
            'type'    => 'notice',
            'class'   => 'info cs-vt-heading',
            'content' => esc_html__( 'Footer Widget Block', 'segovia' )
          ),
          array(
            'id'    => 'footer_widget_block',
            'type'  => 'switcher',
            'title' => esc_html__( 'Enable Widget Block', 'segovia' ),
            'info' => esc_html__( 'If you turn this ON, then Goto : Appearance > Widgets. There you can see <strong>Footer Widget 1,2,3 or 4</strong> Widget Area, add your widgets there.', 'segovia' ),
            'default' => true,
          ),
             // Footer Widget Block
          array(
            'type'    => 'notice',
            'class'   => 'info cs-vt-heading',
            'content' => esc_html__( 'Fixed Footer', 'segovia' )
          ),
          array(
            'id'    => 'footer_fixed_style',
            'type'  => 'switcher',
            'title' => esc_html__( 'Enable Fixed Footer', 'segovia' ),
            'info' => esc_html__( 'Turn On to Enable Fixed footer', 'segovia' ),
          ),
          array(
            'id'    => 'footer_widget_layout',
            'type'  => 'image_select',
            'title' => esc_html__( 'Widget Layouts', 'segovia' ),
            'info' => esc_html__( 'Choose your footer widget layouts.', 'segovia' ),
            'default' => 3,
            'options' => array(
              1   => SEGOVIA_CS_IMAGES . '/footer/footer-1.png',
              2   => SEGOVIA_CS_IMAGES . '/footer/footer-2.png',
              3   => SEGOVIA_CS_IMAGES . '/footer/footer-3.png',
              4   => SEGOVIA_CS_IMAGES . '/footer/footer-4.png',
              5   => SEGOVIA_CS_IMAGES . '/footer/footer-5.png',
              6   => SEGOVIA_CS_IMAGES . '/footer/footer-6.png',
              7   => SEGOVIA_CS_IMAGES . '/footer/footer-7.png',
              8   => SEGOVIA_CS_IMAGES . '/footer/footer-8.png',
              9   => SEGOVIA_CS_IMAGES . '/footer/footer-9.png',
              10   => SEGOVIA_CS_IMAGES . '/footer/footer-8.png',
            ),
            'radio'       => true,
            'dependency'  => array('footer_widget_block', '==', true),
          ),

        )
      ),

       // footer copyright
      array(
        'name'     => 'footer_copyright_tab',
        'title'    => esc_html__( 'Copyright Bar', 'segovia' ),
        'icon'     => 'fa fa-copyright',
        'fields'   => array(

          // Copyright
          array(
            'type'    => 'notice',
            'class'   => 'info cs-vt-heading',
            'content' => esc_html__( 'Copyright Layout', 'segovia' ),
          ),
          array(
            'id'    => 'need_copyright',
            'type'  => 'switcher',
            'title' => esc_html__( 'Enable Copyright Section', 'segovia' ),
            'default' => true,
          ),
          array(
            'id'    => 'footer_copyright_layout',
            'type'  => 'image_select',
            'title' => esc_html__( 'Select Copyright Layout', 'segovia' ),
            'info' => esc_html__( 'In above image, blue box is copyright text and yellow box is secondary text.', 'segovia' ),
            'default'      => 'copyright-3',
            'options'      => array(
              'copyright-1'    => SEGOVIA_CS_IMAGES .'/footer/copyright-1.png',
              'copyright-2'    => SEGOVIA_CS_IMAGES .'/footer/copyright-2.png',
              'copyright-3'    => SEGOVIA_CS_IMAGES .'/footer/copyright-3.png',
              ),
            'radio'        => true,
            'dependency'     => array('need_copyright', '==', true),
          ),
          array(
            'id'    => 'copyright_text',
            'type'  => 'textarea',
            'title' => esc_html__( 'Copyright Text', 'segovia' ),
            'shortcode' => true,
            'dependency' => array('need_copyright', '==', true),
            'after'       => 'Helpful shortcodes: [vt_current_year] [vt_home_url] or any shortcode.',
          ),

          // Copyright Another Text
          array(
            'type'    => 'notice',
            'class'   => 'warning cs-vt-heading',
            'content' => esc_html__( 'Copyright Secondary Text', 'segovia' ),
            'dependency'     => array('need_copyright', '==', true),
          ),
          array(
            'id'    => 'secondary_text',
            'type'  => 'textarea',
            'title' => esc_html__( 'Secondary Text', 'segovia' ),
            'shortcode' => true,
            'dependency' => array('need_copyright', '==', 'true'),
          ),

        )
      ),
    ),

  );

  // ------------------------------
  // Design
  // ------------------------------
  $options[] = array(
    'name'   => 'theme_design',
    'title'  => esc_html__( 'Design', 'segovia' ),
    'icon'   => 'fa fa-magic'
  );

  // ------------------------------
  // color section
  // ------------------------------
  $options[]   = array(
    'name'     => 'theme_color_section',
    'title'    => esc_html__( 'Colors', 'segovia' ),
    'icon'     => 'fa fa-eyedropper',
    'fields' => array(

      array(
        'type'    => 'heading',
        'content' => esc_html__( 'Color Options', 'segovia' ),
      ),
      array(
        'type'    => 'subheading',
        'wrap_class' => 'color-tab-content',
        'content' => esc_html__( 'All color options are available in our theme customizer. The reason of we used customizer options for color section is because, you can choose each part of color from there and see the changes instantly using customizer.
          <br /><br />Highly customizable colors are in <strong>Appearance > Customize</strong>', 'segovia' ),
      ),

    ),
  );

  // ------------------------------
  // Typography section
  // ------------------------------
  $options[]   = array(
    'name'     => 'theme_typo_section',
    'title'    => esc_html__( 'Typography', 'segovia' ),
    'icon'     => 'fa fa-header',
    'fields' => array(

      // Start fields
      array(
        'id'                  => 'typography',
        'type'                => 'group',
        'fields'              => array(
          array(
            'id'              => 'title',
            'type'            => 'text',
            'title'           => esc_html__( 'Title', 'segovia' ),
          ),
          array(
            'id'              => 'selector',
            'type'            => 'textarea',
            'title'           => esc_html__( 'Selector', 'segovia' ),
            'info'           => esc_html__( 'Enter css selectors like : <strong>body, .custom-class</strong>', 'segovia' ),
          ),
          array(
            'id'              => 'font',
            'type'            => 'typography',
            'title'           => esc_html__( 'Font Family', 'segovia' ),
          ),
          array(
            'id'              => 'css',
            'type'            => 'textarea',
            'title'           => esc_html__( 'Custom CSS', 'segovia' ),
          ),
        ),
        'button_title'        => esc_html__( 'Add New Typography', 'segovia' ),
        'accordion_title'     => esc_html__( 'New Typography', 'segovia' ),
        'default'             => array(
          array(
            'title'           => esc_html__( 'Body Typography', 'segovia' ),
            'selector'        => 'body, .segva-blog-tags ul li a, .segva-widget .recent-post h5, .dl-horizontal dt, h5.contact-item-title, .pricing-title h2 span, .counter-item h4,.woocommerce ul.products li.product .price span.woocommerce-Price-amount.amount, .woocommerce ul.products li.product .button, .woocommerce .woocommerce-checkout-review-order table.shop_table tbody .product-name, .segva-team-single .member-info h5, h4.author-name span.author-designation, .segva-blog-detail blockquote p,  .segva-content-side blockquote p, blockquote p:before, .section-content-wrap span,.pricing-item a.segva-btn, .segva-navigation, .segva-form input[type="text"],.segva-form input[type="email"],.segva-form input[type="password"],.segva-form input[type="tel"],.segva-form input[type="search"],.segva-form input[type="date"],.segva-form input[type="time"],.segva-form input[type="datetime-local"],.segva-form input[type="month"],.segva-form input[type="url"],.segva-form input[type="number"],.segva-form textarea,.segva-form select,.form-control,.post-password-required input[type="password"],.widget_search form input[type="text"],.footer-widget input[type="email"],.search-box input[type="text"],.mc4wp-form-fields input[type="text"],.mc4wp-form-fields input[type="email"],.woocommerce-Reviews input[type="text"],.woocommerce-Reviews input[type="email"],.woocommerce input[type="text"],.woocommerce input[type="tel"],.woocommerce input[type="email"],.woocommerce input[type="password"],.woocommerce-Reviews textarea,.woocommerce textarea,.woocommerce-cart table.cart td.actions .coupon .input-text, .segva-form input[type="submit"],.mc4wp-form-fields input[type="submit"],.woocommerce .woocommerce-Reviews #respond input[type="submit"],.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce .woocommerce-Reviews #respond input[type="submit"],.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, blockquote p, blockquote cite, .segva-slider-caption p.slider-category.animated, .caption-wrap .segva-border-link a.segva-link, .project-category, .segva-big-title-wrap .big-title, .blog-category, .blog-meta, .blog-meta a, .gallery-style-two .project-category, .bpw-style-one .masonry-item .segva-link, .segva-link-wrap .segva-link, .mc4wp-form-fields input[type="submit"], .blog-style-four .segva-link',
            'font'            => array(
              'family'        => 'DM Sans',
              'variant'       => 'regular',
            ),
          ),
          array(
            'title'           => esc_html__( 'Menu Typography', 'segovia' ),
            'selector'        => '.segva-navigation, .mean-container .mean-nav ul li a',
            'font'            => array(
              'family'        => 'DM Sans',
              'variant'       => '500',
            ),
          ),
          array(
            'title'           => esc_html__( 'Sub Menu Typography', 'segovia' ),
            'selector'        => '.dropdown-menu, .mean-container .mean-nav ul.dropdown-nav li a, .segva-header .dropdown-nav > li > a,  .dropdown-nav, .segva-navigation  .dropdown-nav',
            'font'            => array(
              'family'        => 'DM Sans',
              'variant'       => '500',
            ),
          ),
          array(
            'title'           => esc_html__( 'Headings Typography', 'segovia' ),
            'selector'        => '  h1, .h1, h2, .h2, h3, .h3, h4, .h4, h5, .h5, h6, .h6, .text-logo, .section-title-wrap h2, .pricing-title',
            'font'            => array(
              'family'        => 'Barlow Condensed',
              'variant'       => '800',
            ),
          ),
          array(
            'title'           => esc_html__( 'Shortcode Elements Primary Font', 'segovia' ),
            'selector'        => '.process-title,span.name-first-letter,.segva-banner.banner-style-two p,span.prgrs-cntr-prcnt,span.values-number,.wp-pagenavi,.segva-blog-detail .segva-controls-links .control-link-title,.segva-widget .recent-post h5.post-title,.dl-horizontal dd,.dl-horizontal dd .project-category,a.contact-link-item,.portfolio-single-nav,span.play-title,span.start_index,span.end_index,.action-links,.segva-pagination,.woocommerce-pagination,.wp-link-pages,.woocommerce span.onsale,.woocommerce div.product p.price, .woocommerce div.product span.price,.product_meta span.meta-title,.woocommerce div.product .woocommerce-tabs ul.tabs li a,.woocommerce-tabs.wc-tabs-wrapper .woocommerce-Reviews span#reply-title,.woocommerce table.shop_table,.woocommerce .wc_payment_method label,.woocommerce-account form.woocommerce-EditAccountForm.edit-account legend,.stats-item p,.woocommerce ul.product_list_widget li a, .blog-style-four span.blog-item-month,.blogs-style-two span.blog-item-month,.blog-detail-wrap span.blog-item-month, .blog-style-four span.blog-item-date,.blogs-style-two span.blog-item-date,.blog-detail-wrap span.blog-item-date',
            'font'            => array(
              'family'        => 'Barlow Condensed',
              'variant'       => 'regular',
            ),
          ),
          array(
            'title'           => esc_html__( 'Example Usage', 'segovia' ),
            'selector'        => '.your-custom-class',
            'font'            => array(
              'family'        => 'DM Sans',
              'variant'       => 'regular',
            ),
          ),
        ),
      ),

      // Subset
      array(
        'id'                  => 'subsets',
        'type'                => 'select',
        'title'               => esc_html__( 'Subsets', 'segovia' ),
        'class'               => 'chosen',
        'options'             => array(
          'latin'             => 'latin',
          'latin-ext'         => 'latin-ext',
          'cyrillic'          => 'cyrillic',
          'cyrillic-ext'      => 'cyrillic-ext',
          'greek'             => 'greek',
          'greek-ext'         => 'greek-ext',
          'vietnamese'        => 'vietnamese',
          'devanagari'        => 'devanagari',
          'khmer'             => 'khmer',
        ),
        'attributes'         => array(
          'data-placeholder' => 'Subsets',
          'multiple'         => 'multiple',
          'style'            => 'width: 200px;'
        ),
        'default'             => array( 'latin' ),
      ),

      array(
        'id'                  => 'font_weight',
        'type'                => 'select',
        'title'               => esc_html__( 'Font Weights', 'segovia' ),
        'class'               => 'chosen',
        'options'             => array(
          '100'   => 'Thin 100',
          '100i'  => 'Thin 100 Italic',
          '200'   => 'Extra Light 200',
          '200i'  => 'Extra Light 200 Italic',
          '300'   => 'Light 300',
          '300i'  => 'Light 300 Italic',
          '400'   => 'Regular 400',
          '400i'  => 'Regular 400 Italic',
          '500'   => 'Medium 500',
          '500i'  => 'Medium 500 Italic',
          '600'   => 'Semi Bold 600',
          '600i'  => 'Semi Bold 600 Italic',
          '700'   => 'Bold 700',
          '700i'  => 'Bold 700 Italic',
          '800'   => 'Extra Bold 800',
          '800i'  => 'Extra Bold 800 Italic',
          '900'   => 'Black 900',
          '900i'  => 'Black 900 Italic',
        ),
        'attributes'         => array(
          'data-placeholder' => 'Font Weight',
          'multiple'         => 'multiple',
          'style'            => 'width: 200px;'
        ),
        'default'             => array( '300','400','500', '700', '800', '900', '400i', '500i', '600i', '700i' ),
      ),

      // Custom Fonts Upload
      array(
        'id'                 => 'font_family',
        'type'               => 'group',
        'title'              => 'Upload Custom Fonts',
        'button_title'       => 'Add New Custom Font',
        'accordion_title'    => 'Adding New Font',
        'accordion'          => true,
        'desc'               => 'It is simple. Only add your custom fonts and click to save. After you can check "Font Family" selector. Do not forget to Save!',
        'fields'             => array(

          array(
            'id'             => 'name',
            'type'           => 'text',
            'title'          => 'Font-Family Name',
            'attributes'     => array(
              'placeholder'  => 'for eg. Arial'
            ),
          ),

          array(
            'id'             => 'ttf',
            'type'           => 'upload',
            'title'          => 'Upload .ttf <small><i>(optional)</i></small>',
            'settings'       => array(
              'upload_type'  => 'font',
              'insert_title' => 'Use this Font-Format',
              'button_title' => 'Upload <i>.ttf</i>',
            ),
          ),

          array(
            'id'             => 'eot',
            'type'           => 'upload',
            'title'          => 'Upload .eot <small><i>(optional)</i></small>',
            'settings'       => array(
              'upload_type'  => 'font',
              'insert_title' => 'Use this Font-Format',
              'button_title' => 'Upload <i>.eot</i>',
            ),
          ),

          array(
            'id'             => 'otf',
            'type'           => 'upload',
            'title'          => 'Upload .otf <small><i>(optional)</i></small>',
            'settings'       => array(
              'upload_type'  => 'font',
              'insert_title' => 'Use this Font-Format',
              'button_title' => 'Upload <i>.otf</i>',
            ),
          ),

          array(
            'id'             => 'woff',
            'type'           => 'upload',
            'title'          => 'Upload .woff <small><i>(optional)</i></small>',
            'settings'       => array(
              'upload_type'  => 'font',
              'insert_title' => 'Use this Font-Format',
              'button_title' => 'Upload <i>.woff</i>',
            ),
          ),

          array(
            'id'             => 'css',
            'type'           => 'textarea',
            'title'          => 'Extra CSS Style <small><i>(optional)</i></small>',
            'attributes'     => array(
              'placeholder'  => 'for eg. font-weight: normal;'
            ),
          ),

        ),
      ),
      // End All field

    ),
  );

  // ------------------------------
  // Pages
  // ------------------------------
  $options[] = array(
    'name'   => 'theme_pages',
    'title'  => esc_html__( 'Pages', 'segovia' ),
    'icon'   => 'fa fa-files-o'
  );

  // ------------------------------
  // Portfolio Section
  // ------------------------------
  $options[]   = array(
    'name'     => 'portfolio_section',
    'title'    => esc_html__( 'Portfolio', 'segovia' ),
    'icon'     => 'fa fa-briefcase',
    'fields' => array(

      // portfolio name change
      array(
        'id'            => 'noneed_portfolio_post',
        'type'          => 'switcher',
        'title'         => esc_html__( 'Disable Portfolio Post?', 'segovia' ),
        'desc'          => esc_html__( 'If need to disable this post type, please turn this ON.', 'segovia' ),
        'default'       => false,
      ),
      
      array(
        'type'    => 'notice',
        'class'   => 'info cs-vt-heading',
        'content' => esc_html__( 'Name Change', 'segovia' ),
        'dependency'    => array('noneed_portfolio_post', '==', 'false'),
      ),
      array(
        'id'      => 'theme_portfolio_name',
        'type'    => 'text',
        'title'   => esc_html__( 'Portfolio Name', 'segovia' ),
        'attributes'     => array(
          'placeholder'  => 'Portfolio'
        ),
        'dependency'    => array('noneed_portfolio_post', '==', 'false'),
      ),
      array(
        'id'      => 'theme_portfolio_slug',
        'type'    => 'text',
        'title'   => esc_html__( 'Portfolio Slug', 'segovia' ),
        'attributes'     => array(
          'placeholder'  => 'portfolio-item'
        ),
        'dependency'    => array('noneed_portfolio_post', '==', 'false'),
      ),
      array(
        'id'      => 'theme_portfolio_cat_slug',
        'type'    => 'text',
        'title'   => esc_html__( 'Portfolio Category Slug', 'segovia' ),
        'attributes'     => array(
          'placeholder'  => 'portfolio-category'
        ),
        'dependency'    => array('noneed_portfolio_post', '==', 'false'),
      ),
      array(
        'type'    => 'notice',
        'class'   => 'danger',
        'content' => esc_html__( '<strong>Important</strong>: Please do not set portfolio slug and page slug as same. It\'ll not work.', 'segovia' ),
        'dependency'    => array('noneed_portfolio_post', '==', 'false'),
      ),
      // Portfolio Name

      // portfolio listing
      array(
        'type'    => 'notice',
        'class'   => 'info cs-vt-heading',
        'content' => esc_html__( 'Portfolio Style', 'segovia' ),
        'dependency'    => array('noneed_portfolio_post', '==', 'false'),
      ),
      array(
        'id'             => 'portfolio_style',
        'type'           => 'select',
        'title'          => esc_html__( 'Portfolio Style', 'segovia' ),
        'options'        => array(
          'bpw-style-one' => esc_html__( 'Style One', 'segovia' ),
          'bpw-style-two' => esc_html__( 'Style Two', 'segovia' ),
          'bpw-style-three' => esc_html__( 'Style Three', 'segovia' ),
        ),
        'default_option'     => esc_html__( 'Select Portfolio Style', 'segovia' ),
        'dependency'    => array('noneed_portfolio_post', '==', 'false'),
      ),
      array(
        'id'             => 'portfolio_column',
        'type'           => 'select',
        'title'          => esc_html__( 'Portfolio Column', 'segovia' ),
        'options'        => array(
          'bpw-col-2' => esc_html__( 'Two Columns', 'segovia' ),
          'bpw-col-3' => esc_html__( 'Three Columns', 'segovia' ),
          'bpw-col-4' => esc_html__( 'Four Columns', 'segovia' ),
        ),
        'default_option'     => esc_html__( 'Select Portfolio Column', 'segovia' ),
         'dependency'     => array('portfolio_style|noneed_portfolio_post', '!=|==', 'bpw-style-three|false'),
      ),
      array(
        'id'             => 'portfolio_order',
        'type'           => 'select',
        'title'          => esc_html__( 'Select Portfolio Order', 'segovia' ),
        'options'        => array(
          'ASC' => esc_html__( 'Asending', 'segovia' ),
          'DESC' => esc_html__( 'Desending', 'segovia' ),
        ),
        'default_option'     => esc_html__( 'Select Portfolio Order', 'segovia' ),
        'dependency'    => array('noneed_portfolio_post', '==', 'false'),
      ),
      array(
        'id'             => 'portfolio_orderby',
        'type'           => 'select',
        'title'          => esc_html__( 'Select Portfolio Order By', 'segovia' ),
        'options'        => array(
          'none' => esc_html__( 'None', 'segovia' ),
          'ID' => esc_html__( 'ID', 'segovia' ),
          'author' => esc_html__( 'Author', 'segovia' ),
          'title' => esc_html__( 'Title', 'segovia' ),
          'date' => esc_html__( 'Date', 'segovia' ),
        ),
        'default_option'     => esc_html__( 'Select Portfolio Order', 'segovia' ),
        'dependency'    => array('noneed_portfolio_post', '==', 'false'),
      ),
      array(
        'id'      => 'portfolio_limit',
        'type'    => 'text',
        'title'   => esc_html__( 'Limit', 'segovia' ),
        'info'   => esc_html__( 'Enter the number of items to show.', 'segovia' ),
        'dependency'    => array('noneed_portfolio_post', '==', 'false'),
      ),
      array(
        'id'      => 'portfolio_title',
        'type'    => 'text',
        'title'   => esc_html__( 'Portfolio Title', 'segovia' ),
        'info'   => esc_html__( 'Enter Portfolio Title.', 'segovia' ),
        'dependency'     => array('portfolio_style|noneed_portfolio_post', '!=|==', 'bpw-style-three|false'),
      ),
      array(
        'id'      => 'portfolio_sec_title',
        'type'    => 'text',
        'title'   => esc_html__( 'Portfolio Secondary Title', 'segovia' ),
        'info'   => esc_html__( 'Enter Portfolio Secondary Title.', 'segovia' ),
        'dependency'     => array('portfolio_style|noneed_portfolio_post', '!=|==', 'bpw-style-three|false'),
      ),
      array(
        'type'    => 'notice',
        'class'   => 'info cs-vt-heading',
        'content' => esc_html__( 'Enable/Disable Options', 'segovia' ),
        'dependency'     => array('portfolio_style|noneed_portfolio_post', 'any|==', 'bpw-style-one,bpw-style-two,bpw-style-three|false'),
      ),
      array(
        'id'      => 'portfolio_pagination',
        'type'    => 'switcher',
        'title'   => esc_html__( 'Pagination', 'segovia' ),
        'label'   => esc_html__( 'If you need pagination in portfolio pages, please turn this ON.', 'segovia' ),
        'default'   => true,
        'dependency'     => array('portfolio_style|noneed_portfolio_post', 'any|==', 'bpw-style-one,bpw-style-two,bpw-style-three|false'),
      ),
      array(
        'id'      => 'portfolio_filter',
        'type'    => 'switcher',
        'title'   => esc_html__( 'Filter', 'segovia' ),
        'label'   => esc_html__( 'If you need pagination in portfolio pages, please turn this ON.', 'segovia' ),
        'default'   => true,
        'dependency'     => array('portfolio_style|noneed_portfolio_post', 'any|==', 'bpw-style-two,bpw-style-three|false'),
      ),
      array(
        'type'    => 'notice',
        'class'   => 'info cs-vt-heading',
        'content' => esc_html__( 'Single Portfolio', 'segovia' ),
        'dependency'    => array('noneed_portfolio_post', '==', 'false'),
      ),
       array(
          'id'      => 'portfolio_home_url',
          'type'    => 'text',
          'title'   => esc_html__( 'Portfolio Home URL', 'segovia' ),
          'info'   => esc_html__( 'Enter portfolio single home url.', 'segovia' ),
          'dependency'    => array('noneed_portfolio_post', '==', 'false'),
        ),
        array(
          'id'      => 'next_port',
          'type'    => 'text',
          'title'   => esc_html__( 'Next Portfolio Title', 'segovia' ),
          'info'   => esc_html__( 'Enter next portfoliog title.', 'segovia' ),
          'dependency'    => array('noneed_portfolio_post', '==', 'false'),
        ),
        array(
          'id'      => 'prev_port',
          'type'    => 'text',
          'title'   => esc_html__( 'Previous Portfolio Title', 'segovia' ),
          'info'   => esc_html__( 'Enter prev portfolio title.', 'segovia' ),
          'dependency'    => array('noneed_portfolio_post', '==', 'false'),
        ),
      array(
        'id'      => 'readmore_title',
        'type'    => 'text',
        'title'   => esc_html__( 'Read More Text', 'segovia' ),
        'info'   => esc_html__( 'Enter the readmore text.', 'segovia' ),
        'dependency'     => array('portfolio_style|noneed_portfolio_post', '==|==', 'bpw-style-one|false'),
      ),
      array(
        'id'      => 'readmore_link',
        'type'    => 'text',
        'title'   => esc_html__( 'Read More Text Link', 'segovia' ),
        'info'   => esc_html__( 'Enter the readmore text link.', 'segovia' ),
        'dependency'     => array('portfolio_style|noneed_portfolio_post', '==|==', 'bpw-style-one|false'),
      ),
      array(
        'id'      => 'portfolio_single_pagination',
        'type'    => 'switcher',
        'title'   => esc_html__( 'Next & Prev Navigation', 'segovia' ),
        'label'   => esc_html__( 'If you don\'t want next and previous navigation in portfolio single pages, please turn this OFF.', 'segovia' ),
        'default'   => true,
        'dependency'    => array('noneed_portfolio_post', '==', 'false'),
      ),
      // Portfolio Listing

    ),
  );

  // ------------------------------
  // Team Section
  // ------------------------------
  $options[]   = array(
    'name'     => 'team_section',
    'title'    => esc_html__( 'Team', 'segovia' ),
    'icon'     => 'fa fa-users',
    'fields' => array(

      // Team Start
      array(
        'id'            => 'noneed_team_post',
        'type'          => 'switcher',
        'title'         => esc_html__( 'Disable Team Post?', 'segovia' ),
        'desc'          => esc_html__( 'If need to disable this post type, please turn this ON.', 'segovia' ),
        'default'       => false,
      ),
      array(
        'type'           => 'notice',
        'class'          => 'info cs-vt-heading',
        'content'        => esc_html__( 'Name Change', 'segovia' ),
        'dependency'    => array('noneed_team_post', '==', 'false'),
      ),
      array(
        'id'             => 'theme_team_name',
        'type'           => 'text',
        'title'          => esc_html__( 'Team Name', 'segovia' ),
        'attributes'     => array(
          'placeholder'  => 'Team'
        ),
        'dependency'    => array('noneed_team_post', '==', 'false'),
      ),
      array(
        'id'             => 'theme_team_slug',
        'type'           => 'text',
        'title'          => esc_html__( 'Team Slug', 'segovia' ),
        'attributes'     => array(
          'placeholder'  => 'team-item'
        ),
        'dependency'    => array('noneed_team_post', '==', 'false'),
      ),
      array(
        'type'           => 'notice',
        'class'          => 'danger',
        'content'        => esc_html__( '<strong>Important</strong>: Please do not set team slug and page slug as same. It\'ll not work.', 'segovia' ),
        'dependency'    => array('noneed_team_post', '==', 'false'),
      ),
      array(
        'type'           => 'notice',
        'class'          => 'info cs-vt-heading',
        'content'        => esc_html__( 'Team Style', 'segovia' ),
        'dependency'    => array('noneed_team_post', '==', 'false'),
      ),
      array(
        'id'             => 'team_order',
        'type'           => 'select',
        'title'          => esc_html__( 'Select Team Order', 'segovia' ),
        'options'        => array(
          'ASC' => esc_html__( 'Asending', 'segovia' ),
          'DESC' => esc_html__( 'Desending', 'segovia' ),
        ),
        'default_option'     => esc_html__( 'Select Team Order', 'segovia' ),
        'dependency'    => array('noneed_team_post', '==', 'false'),
      ),
      array(
        'id'             => 'team_orderby',
        'type'           => 'select',
        'title'          => esc_html__( 'Select Team Order By', 'segovia' ),
        'options'        => array(
          'none' => esc_html__( 'None', 'segovia' ),
          'ID' => esc_html__( 'ID', 'segovia' ),
          'author' => esc_html__( 'Author', 'segovia' ),
          'title' => esc_html__( 'Title', 'segovia' ),
          'date' => esc_html__( 'Date', 'segovia' ),
        ),
        'default_option'     => esc_html__( 'Select Team Order', 'segovia' ),
        'dependency'    => array('noneed_team_post', '==', 'false'),
      ),
      array(
        'id'      => 'team_limit',
        'type'    => 'text',
        'title'   => esc_html__( 'Limit', 'segovia' ),
        'info'   => esc_html__( 'Enter the number of team members to show.', 'segovia' ),
        'dependency'    => array('noneed_team_post', '==', 'false'),
      ),
      // Team End

      // Team Start
      array(
        'type'    => 'notice',
        'class'   => 'info cs-vt-heading',
        'content' => esc_html__( 'Team Single', 'segovia' ),
        'dependency'    => array('noneed_team_post', '==', 'false'),
      ),
      array(
        'id'      => 'team_top_spacing',
        'type'    => 'text',
        'title'   => esc_html__( 'Top Spacing', 'segovia' ),
        'info'   => esc_html__( 'Enter value in px, for team single pages top value.', 'segovia' ),
        'default' => '60px',
        'dependency'    => array('noneed_team_post', '==', 'false'),
      ),
      array(
        'id'      => 'team_bottom_spacing',
        'type'    => 'text',
        'title'   => esc_html__( 'Bottom Spacing', 'segovia' ),
        'info'   => esc_html__( 'Enter value in px, for team single pages bottom value.', 'segovia' ),
        'default' => '0px',
        'dependency'    => array('noneed_team_post', '==', 'false'),
      ),

    ),
  );

  // ------------------------------
  // Testimonial Section
  // ------------------------------
  $options[]   = array(
    'name'     => 'testimonial_section',
    'title'    => esc_html__( 'Testimonial', 'segovia' ),
    'icon'     => 'fa fa-commenting',
    'fields' => array(

      // Testimonial Start
      array(
        'id'            => 'noneed_testimonial_post',
        'type'          => 'switcher',
        'title'         => esc_html__( 'Disable Testimonial Post?', 'segovia' ),
        'desc'          => esc_html__( 'If need to disable this post type, please turn this ON.', 'segovia' ),
        'default'       => false,
      ),
      array(
        'type'           => 'notice',
        'class'          => 'info cs-vt-heading',
        'content'        => esc_html__( 'Name Change', 'segovia' ),
        'dependency'    => array('noneed_testimonial_post', '==', 'false'),
      ),
      array(
        'id'             => 'theme_testimonial_name',
        'type'           => 'text',
        'title'          => esc_html__( 'Testimonial Name', 'segovia' ),
        'attributes'     => array(
          'placeholder'  => 'Testimonial'
        ),
        'dependency'    => array('noneed_testimonial_post', '==', 'false'),
      ),
      array(
        'id'             => 'theme_testimonial_slug',
        'type'           => 'text',
        'title'          => esc_html__( 'Testimonial Slug', 'segovia' ),
        'attributes'     => array(
          'placeholder'  => 'team-item'
        ),
        'dependency'    => array('noneed_testimonial_post', '==', 'false'),
      ),
      array(
        'type'           => 'notice',
        'class'          => 'danger',
        'content'        => esc_html__( '<strong>Important</strong>: Please do not set team slug and page slug as same. It\'ll not work.', 'segovia' ),
        'dependency'    => array('noneed_testimonial_post', '==', 'false'),
      ),
      array(
        'type'           => 'notice',
        'class'          => 'info cs-vt-heading',
        'content'        => esc_html__( 'Testimonial Style', 'segovia' ),
        'dependency'    => array('noneed_testimonial_post', '==', 'false'),
      ),
      array(
        'id'             => 'testimonial_style',
        'type'           => 'select',
        'title'          => esc_html__( 'Testimonial Style', 'segovia' ),
        'options'        => array(
          'style-one'          => esc_html__( 'Style One', 'segovia' ),
          'style-two'          => esc_html__( 'Style Two', 'segovia' ),
          'style-three'          => esc_html__( 'Style Three', 'segovia' ),
        ),
        'placeholder' => esc_html__( 'Select Testimonial Style', 'segovia' ),
        'dependency'   => array('noneed_testimonial_post', '==', 'false'),
      ),
      array(
        'id'      => 'testimonial_items',
        'type'    => 'text',
        'title'   => esc_html__( 'Carousel Items', 'segovia' ),
        'info'   => esc_html__( 'Enter the number of team members to show per slide.', 'segovia' ),
        'dependency'    => array('noneed_testimonial_post', '==', 'false'),
      ),
      array(
        'id'             => 'testimonial_order',
        'type'           => 'select',
        'title'          => esc_html__( 'Select Testimonial Order', 'segovia' ),
        'options'        => array(
          'ASC' => esc_html__( 'Asending', 'segovia' ),
          'DESC' => esc_html__( 'Desending', 'segovia' ),
        ),
        'default_option'     => esc_html__( 'Select Testimonial Order', 'segovia' ),
        'dependency'    => array('noneed_testimonial_post', '==', 'false'),
      ),
      array(
        'id'             => 'testimonial_orderby',
        'type'           => 'select',
        'title'          => esc_html__( 'Select Testimonial Order By', 'segovia' ),
        'options'        => array(
          'none' => esc_html__( 'None', 'segovia' ),
          'ID' => esc_html__( 'ID', 'segovia' ),
          'author' => esc_html__( 'Author', 'segovia' ),
          'title' => esc_html__( 'Title', 'segovia' ),
          'date' => esc_html__( 'Date', 'segovia' ),
        ),
        'default_option'     => esc_html__( 'Select Testimonial Order', 'segovia' ),
        'dependency'    => array('noneed_testimonial_post', '==', 'false'),
      ),
      array(
        'id'      => 'testimonial_limit',
        'type'    => 'text',
        'title'   => esc_html__( 'Limit', 'segovia' ),
        'info'   => esc_html__( 'Enter the number of team members to show.', 'segovia' ),
        'dependency'    => array('noneed_testimonial_post', '==', 'false'),
      ),
      array(
        'id'            => 'theme_testi_excerpt',
        'type'          => 'spinner',
        'title'         => esc_html__( 'Excerpt Length', 'segovia' ),
        'subtitle'      => esc_html__( 'max:200 | min:0 | step:1', 'segovia' ),
        'max'           => 200,
        'min'           => 0,
        'step'          => 1,
        'default'       => 35,
      ),
      // Testimonial End

    ),
  );

  // ------------------------------
  // Blog Section
  // ------------------------------
  $options[]   = array(
    'name'     => 'blog_section',
    'title'    => esc_html__( 'Blog', 'segovia' ),
    'icon'     => 'fa fa-edit',
    'sections' => array(

      // blog general section
      array(
        'name'     => 'blog_general_tab',
        'title'    => esc_html__( 'General', 'segovia' ),
        'icon'     => 'fa fa-cog',
        'fields'   => array(

          // Layout
          array(
            'type'    => 'notice',
            'class'   => 'info cs-vt-heading',
            'content' => esc_html__( 'Layout', 'segovia' )
          ),
          array(
            'id'             => 'blog_listing_style',
            'type'           => 'select',
            'title'          => esc_html__( 'Blog Listing Style', 'segovia' ),
            'options'        => array(
              'style-one' => esc_html__( 'List (Default)', 'segovia' ),
              'style-two' => esc_html__( 'Masonry', 'segovia' ),
              'style-three' => esc_html__( 'Grid', 'segovia' ),
              'style-four' => esc_html__( 'List Two', 'segovia' ),
            ),
            'default_option' => 'Select blog style',
            'help'          => esc_html__( 'This style will apply, default blog pages - Like : Archive, Category, Tags, Search & Author. If this settings will not apply your blog page, please set that page as a post page in Settings > Readings.', 'segovia' ),
          ),
          array(
            'id'             => 'blog_listing_columns',
            'type'           => 'select',
            'title'          => esc_html__( 'Blog Listing Columns', 'segovia' ),
            'options'        => array(
              'segva-blog-col-2' => esc_html__( 'Column Two', 'segovia' ),
              'segva-blog-col-3' => esc_html__( 'Column Three', 'segovia' ),
              'segva-blog-col-4' => esc_html__( 'Column Four', 'segovia' ),
            ),
            'default_option' => 'Select blog column',
            'dependency'     => array('blog_listing_style', 'any', 'style-two,style-three'),
          ),
          array(
            'id'       => 'blog_img_resizer',
            'type'     => 'switcher',
            'title'    => esc_html__( 'Disable Image Resizer?', 'segovia' ),
            'desc'     => esc_html__( 'Turn on if you don\'t want image resizer.', 'segovia' ),
            'text_on'  => 'Yes',
            'text_off' => 'No',
          ),
          array(
            'id'             => 'blog_sidebar_position',
            'type'           => 'select',
            'title'          => esc_html__( 'Sidebar Position', 'segovia' ),
            'options'        => array(
              'sidebar-right' => esc_html__( 'Right', 'segovia' ),
              'sidebar-left' => esc_html__( 'Left', 'segovia' ),
              'sidebar-hide' => esc_html__( 'Hide', 'segovia' ),
            ),
            'default_option' => 'Select sidebar position',
            'help'          => esc_html__( 'This style will apply, default blog pages - Like : Archive, Category, Tags, Search & Author.', 'segovia' ),
            'info'          => esc_html__( 'Default option : Right', 'segovia' ),
          ),
          array(
            'id'    => 'floating_sidebar',
            'type'  => 'switcher',
            'title' => esc_html__( 'Floating Sidebar', 'segovia' ),
            'info' => esc_html__( 'If need floating sidebar for blog single, please turn this ON.', 'segovia' ),
          ),
          array(
            'id'             => 'blog_widget',
            'type'           => 'select',
            'title'          => esc_html__( 'Sidebar Widget', 'segovia' ),
            'options'        => segovia_vt_registered_sidebars(),
            'default_option' => esc_html__( 'Select Widget', 'segovia' ),
            'dependency'     => array('blog_sidebar_position', '!=', 'sidebar-hide'),
            'info'          => esc_html__( 'Default option : Main Widget Area', 'segovia' ),
          ),
          // Layout
          // Global Options
          array(
            'type'    => 'notice',
            'class'   => 'info cs-vt-heading',
            'content' => esc_html__( 'Global Options', 'segovia' )
          ),
          array(
            'id'         => 'theme_exclude_categories',
            'type'       => 'checkbox',
            'title'      => esc_html__( 'Exclude Categories', 'segovia' ),
            'info'      => esc_html__( 'Select categories you want to exclude from blog page.', 'segovia' ),
            'options'    => 'categories',
          ),
          array(
            'id'      => 'theme_blog_home',
            'type'    => 'text',
            'title'   => esc_html__('Blog Home Page Link', 'segovia'),
            'info'   => esc_html__('Enter blog home page link here.', 'segovia'),
          ),
          array(
            'id'      => 'theme_blog_excerpt',
            'type'    => 'text',
            'title'   => esc_html__( 'Excerpt Length', 'segovia' ),
            'info'   => esc_html__( 'Blog short content length, in blog listing pages.', 'segovia' ),
            'default' => '20',
          ),
          array(
            'id'      => 'theme_metas_hide',
            'type'    => 'checkbox',
            'title'   => esc_html__( 'Meta\'s to hide', 'segovia' ),
            'info'    => esc_html__( 'Check items you want to hide from blog/post meta field.', 'segovia' ),
            'class'      => 'horizontal',
            'options'    => array(
              'category'   => esc_html__( 'Category', 'segovia' ),
              'date'    => esc_html__( 'Date', 'segovia' ),
              'author'     => esc_html__( 'Author', 'segovia' ),
              'comments'      => esc_html__( 'Comments', 'segovia' ),
            ),
          ),
          // End fields

        )
      ),

      // blog single section
      array(
        'name'     => 'blog_single_tab',
        'title'    => esc_html__( 'Single', 'segovia' ),
        'icon'     => 'fa fa-sticky-note',
        'fields'   => array(

          // Start fields
          array(
            'type'    => 'notice',
            'class'   => 'info cs-vt-heading',
            'content' => esc_html__( 'Enable / Disable', 'segovia' )
          ),
          array(
            'id'    => 'single_featured_image',
            'type'  => 'switcher',
            'title' => esc_html__( 'Featured Image', 'segovia' ),
            'info' => esc_html__( 'If need to hide featured image from single blog post page, please turn this OFF.', 'segovia' ),
            'default' => true,
          ),
          array(
            'id'    => 'single_author_info',
            'type'  => 'switcher',
            'title' => esc_html__( 'Author Info', 'segovia' ),
            'info' => esc_html__( 'If need to hide author info on single blog page, please turn this OFF.', 'segovia' ),
            'default' => true,
          ),
          array(
            'id'    => 'single_share_option',
            'type'  => 'switcher',
            'title' => esc_html__( 'Share Option', 'segovia' ),
            'info' => esc_html__( 'If need to hide share option on single blog page, please turn this OFF.', 'segovia' ),
            'default' => true,
          ),
          array(
            'id'    => 'single_comment_form',
            'type'  => 'switcher',
            'title' => esc_html__( 'Comment Area/Form', 'segovia' ),
            'info' => esc_html__( 'If need to hide comment area and that form on single blog page, please turn this OFF.', 'segovia' ),
            'default' => true,
          ),
           array(
            'id'      => 'blog_home_url',
            'type'    => 'text',
            'title'   => esc_html__( 'Blog Home URL', 'segovia' ),
            'info'   => esc_html__( 'Enter blog single home url.', 'segovia' ),
          ),
          array(
            'id'      => 'next_blog',
            'type'    => 'text',
            'title'   => esc_html__( 'Next Post Title', 'segovia' ),
            'info'   => esc_html__( 'Enter next blog title.', 'segovia' ),
          ),
          array(
            'id'      => 'prev_blog',
            'type'    => 'text',
            'title'   => esc_html__( 'Previous Post Title', 'segovia' ),
            'info'   => esc_html__( 'Enter prev blog title.', 'segovia' ),
          ),
          array(
            'id'      => 'single_metas_hide',
            'type'    => 'checkbox',
            'title'   => esc_html__( 'Meta\'s to hide', 'segovia' ),
            'info'    => esc_html__( 'Check items you want to hide from post single meta field.', 'segovia' ),
            'class'      => 'horizontal',
            'options'    => array(
              'category'   => esc_html__( 'Category', 'segovia' ),
              'date'    => esc_html__( 'Date', 'segovia' ),
              'author'     => esc_html__( 'Author', 'segovia' ),
              'comments'      => esc_html__( 'Comments', 'segovia' ),
            ),
          ),
          array(
            'type'    => 'notice',
            'class'   => 'info cs-vt-heading',
            'content' => esc_html__( 'Related Posts', 'segovia' ),
          ),
          array(
            'id'      => 'related_post_title',
            'type'    => 'text',
            'title'   => esc_html__( 'Related Post Title', 'segovia' ),
            'info'   => esc_html__( 'Enter related post title.', 'segovia' ),
          ),
          array(
            'id'      => 'related_post_limit',
            'type'    => 'text',
            'title'   => esc_html__( 'Related Post Limit', 'segovia' ),
            'info'   => esc_html__( 'Enter related post limit.', 'segovia' ),
          ),
          array(
            'id'          => 'related_post_order',
            'title'       => esc_html__( 'Related Post Order', 'segovia' ),
            'desc'        => esc_html__( 'Select related post order', 'segovia' ),
            'type'        => 'select',
            'options'        => array(
              'ascending' => esc_html__( 'Ascending', 'segovia' ),
              'decending' => esc_html__( 'Decending', 'segovia' ),
            ),
          ),
          array(
            'id'          => 'related_post_orderby',
            'title'       => esc_html__( 'Related Post Orderby', 'segovia' ),
            'desc'        => esc_html__( 'Select related post orderby', 'segovia' ),
            'type'        => 'select',
            'options'        => array(
              'None' => esc_html__( 'None', 'segovia' ),
              'id' => esc_html__( 'ID', 'segovia' ),
              'author' => esc_html__( 'Author', 'segovia' ),
              'title' => esc_html__( 'Title', 'segovia' ),
              'name' => esc_html__( 'Name', 'segovia' ),
              'type' => esc_html__( 'Type', 'segovia' ),
              'date' => esc_html__( 'Date', 'segovia' ),
              'modified' => esc_html__( 'Modified', 'segovia' ),
              'random' => esc_html__( 'Random', 'segovia' ),
            ),
          ),

          array(
            'type'    => 'notice',
            'class'   => 'info cs-vt-heading',
            'content' => esc_html__( 'Sidebar', 'segovia' )
          ),
          array(
            'id'             => 'single_sidebar_position',
            'type'           => 'select',
            'title'          => esc_html__( 'Sidebar Position', 'segovia' ),
            'options'        => array(
              'sidebar-right' => esc_html__( 'Right', 'segovia' ),
              'sidebar-left' => esc_html__( 'Left', 'segovia' ),
              'sidebar-hide' => esc_html__( 'Hide', 'segovia' ),
            ),
            'default_option' => 'Select sidebar position',
            'info'          => esc_html__( 'Default option : Right', 'segovia' ),
          ),
          array(
            'id'             => 'single_blog_widget',
            'type'           => 'select',
            'title'          => esc_html__( 'Sidebar Widget', 'segovia' ),
            'options'        => segovia_vt_registered_sidebars(),
            'default_option' => esc_html__( 'Select Widget', 'segovia' ),
            'dependency'     => array('single_sidebar_position', '!=', 'sidebar-hide'),
            'info'          => esc_html__( 'Default option : Main Widget Area', 'segovia' ),
          ),

        )
      ),

    ),
  );

if (class_exists( 'WooCommerce' )){
  // ------------------------------
  // WooCommerce Section
  // ------------------------------
  $options[]   = array(
    'name'     => 'woocommerce_section',
    'title'    => esc_html__( 'WooCommerce', 'segovia' ),
    'icon'     => 'fa fa-shopping-cart',
    'fields' => array(

      // Start fields
      array(
        'type'    => 'notice',
        'class'   => 'info cs-vt-heading',
        'content' => esc_html__( 'Layout', 'segovia' )
      ),
      array(
        'id'             => 'woo_product_columns',
        'type'           => 'select',
        'title'          => esc_html__( 'Product Column', 'segovia' ),
        'options'        => array(
          3 => esc_html__( 'Three Column', 'segovia' ),
          4 => esc_html__( 'Four Column', 'segovia' ),
        ),
        'default_option' => esc_html__( 'Select Product Columns', 'segovia' ),
        'help'          => esc_html__( 'This style will apply, default woocommerce listings pages. Like, shop and archive pages.', 'segovia' ),
      ),
      array(
        'id'             => 'woo_sidebar_position',
        'type'           => 'select',
        'title'          => esc_html__( 'Sidebar Position', 'segovia' ),
        'options'        => array(
          'right-sidebar' => esc_html__( 'Right', 'segovia' ),
          'left-sidebar' => esc_html__( 'Left', 'segovia' ),
          'sidebar-hide' => esc_html__( 'Hide', 'segovia' ),
        ),
        'default_option' => esc_html__( 'Select sidebar position', 'segovia' ),
        'info'          => esc_html__( 'Default option : Right', 'segovia' ),
      ),
      array(
        'id'             => 'woo_widget',
        'type'           => 'select',
        'title'          => esc_html__( 'Sidebar Widget', 'segovia' ),
        'options'        => segovia_vt_registered_sidebars(),
        'default_option' => esc_html__( 'Select Widget', 'segovia' ),
        'dependency'     => array('woo_sidebar_position', '!=', 'sidebar-hide'),
        'info'          => esc_html__( 'Default option : Shop Page', 'segovia' ),
      ),

      array(
        'type'    => 'notice',
        'class'   => 'info cs-vt-heading',
        'content' => esc_html__( 'Listing', 'segovia' )
      ),
      array(
        'id'      => 'theme_woo_limit',
        'type'    => 'text',
        'title'   => esc_html__( 'Product Limit', 'segovia' ),
        'info'   => esc_html__( 'Enter the number value for per page products limit.', 'segovia' ),
      ),
      array(
        'id'      => 'theme_align_height',
        'type'    => 'text',
        'title'   => esc_html__( 'Have Alignment Space?', 'segovia' ),
        'info'   => esc_html__( 'Set minimun height of each products here. Current minimum height is 100px', 'segovia' ),
      ),
      // End fields

      // Start fields
      array(
        'type'    => 'notice',
        'class'   => 'info cs-vt-heading',
        'content' => esc_html__( 'Single Product', 'segovia' )
      ),
      array(
        'id'             => 'woo_related_limit',
        'type'           => 'text',
        'title'          => esc_html__( 'Related Products Limit', 'segovia' ),
      ),
      array(
        'id'    => 'woo_single_upsell',
        'type'  => 'switcher',
        'title' => esc_html__( 'You May Also Like', 'segovia' ),
        'info' => esc_html__( 'If you want \'You May Also Like\' products in single product page, please turn this ON.', 'segovia' ),
        'default' => false,
      ),
      array(
        'id'    => 'woo_single_related',
        'type'  => 'switcher',
        'title' => esc_html__( 'Related Products', 'segovia' ),
        'info' => esc_html__( 'If you want \'Related Products\' in single product page, please turn this ON.', 'segovia' ),
        'default' => false,
      ),
      array(
        'id'    => 'woo_single_sidebar',
        'type'  => 'switcher',
        'title' => esc_html__( 'Single Sidebar', 'segovia' ),
        'info' => esc_html__( 'If you don\'t want sidebar in single product page, please turn this ON.', 'segovia' ),
        'default' => false,
      ),
      // End fields

    ),
  );
}

  // ------------------------------
  // Extra Pages
  // ------------------------------
  $options[]   = array(
    'name'     => 'theme_extra_pages',
    'title'    => esc_html__( 'Extra Pages', 'segovia' ),
    'icon'     => 'fa fa-clone',
    'sections' => array(

       // PASSOWRD PROOFING
      array(
        'name'     => 'password_proofing_form',
        'title'    => esc_html__( 'Password Proofing', 'segovia' ),
        'icon'     => 'fa fa-unlock',
        'fields'   => array(
          array(
            'id'    => 'password_title',
            'type'  => 'text',
            'title' => esc_html__( 'Title', 'segovia' ),
          ),
          array(
            'id'    => 'password_content',
            'type'  => 'textarea',
            'title' => esc_html__( 'Content', 'segovia' ),
          ),
          array(
            'id'    => 'password_proof_bg',
            'type'  => 'image',
            'title' => esc_html__( 'Background', 'segovia' ),
            'add_title' => esc_html__( 'Add Background Image', 'segovia' ),
          ),
          array(
            'id'    => 'password_proof_icon',
            'type'  => 'image',
            'title' => esc_html__( 'Icon', 'segovia' ),
            'add_title' => esc_html__( 'Add Password Protected icon', 'segovia' ),
          ),

        ) // end: fields
      ), // end: PASSOWRD PROOFING

      // error 404 page
      array(
        'name'     => 'error_page_section',
        'title'    => esc_html__( '404 Page', 'segovia' ),
        'icon'     => 'fa fa-exclamation-triangle',
        'fields'   => array(

          // Start 404 Page
          array(
            'id'    => 'error_heading',
            'type'  => 'text',
            'title' => esc_html__( '404 Page Heading', 'segovia' ),
            'info'  => esc_html__( 'Enter 404 page heading.', 'segovia' ),
          ),
          array(
            'id'    => 'error_page_content',
            'type'  => 'textarea',
            'title' => esc_html__( '404 Page Content', 'segovia' ),
            'info'  => esc_html__( 'Enter 404 page content.', 'segovia' ),
            'shortcode' => true,
          ),
          array(
            'id'    => 'error_page_bg',
            'type'  => 'image',
            'title' => esc_html__( '404 Image', 'segovia' ),
            'info'  => esc_html__( 'Choose 404 image.', 'segovia' ),
            'add_title' => esc_html__( 'Add 404 Image', 'segovia' ),
          ),
          array(
            'id'    => 'error_btn_text',
            'type'  => 'text',
            'title' => esc_html__( 'Button Text', 'segovia' ),
            'info'  => esc_html__( 'Enter BACK TO HOME button text. If you want to change it.', 'segovia' ),
          ),
          // End 404 Page

        ) // end: fields
      ), // end: fields section

      // maintenance mode page
      array(
        'name'     => 'maintenance_mode_section',
        'title'    => esc_html__( 'Maintenance Mode', 'segovia' ),
        'icon'     => 'fa fa-hourglass-half',
        'fields'   => array(

          // Start Maintenance Mode
          array(
            'type'    => 'notice',
            'class'   => 'info cs-vt-heading',
            'content' => esc_html__( 'If you turn this ON : Only Logged in users will see your pages. All other visiters will see, selected page of : <strong>Maintenance Mode Page</strong>', 'segovia' )
          ),
          array(
            'id'             => 'enable_maintenance_mode',
            'type'           => 'switcher',
            'title'          => esc_html__( 'Maintenance Mode', 'segovia' ),
            'default'        => false,
          ),
          array(
            'id'             => 'maintenance_mode_page',
            'type'           => 'select',
            'title'          => esc_html__( 'Maintenance Mode Page', 'segovia' ),
            'options'        => 'pages',
            'default_option' => esc_html__( 'Select a page', 'segovia' ),
            'dependency'   => array( 'enable_maintenance_mode', '==', 'true' ),
          ),
          array(
            'id'             => 'maintenance_mode_bg',
            'type'           => 'background',
            'title'          => esc_html__( 'Page Background', 'segovia' ),
            'dependency'   => array( 'enable_maintenance_mode', '==', 'true' ),
          ),
          // End Maintenance Mode

        ) // end: fields
      ), // end: fields section

    )
  );

  // ------------------------------
  // Advanced
  // ------------------------------
  $options[] = array(
    'name'   => 'theme_advanced',
    'title'  => esc_html__( 'Advanced', 'segovia' ),
    'icon'   => 'fa fa-cog'
  );

  // ------------------------------
  // Misc Section
  // ------------------------------
  $options[]   = array(
    'name'     => 'misc_section',
    'title'    => esc_html__( 'Misc', 'segovia' ),
    'icon'     => 'fa fa-recycle',
    'sections' => array(

      // custom sidebar section
      array(
        'name'     => 'custom_sidebar_section',
        'title'    => esc_html__( 'Custom Sidebar', 'segovia' ),
        'icon'     => 'fa fa-reorder',
        'fields'   => array(

          // start fields
          array(
            'id'              => 'custom_sidebar',
            'title'           => esc_html__( 'Sidebars', 'segovia' ),
            'desc'            => esc_html__( 'Go to Appearance -> Widgets after create sidebars', 'segovia' ),
            'type'            => 'group',
            'fields'          => array(
              array(
                'id'          => 'sidebar_name',
                'type'        => 'text',
                'title'       => esc_html__( 'Sidebar Name', 'segovia' ),
              ),
              array(
                'id'          => 'sidebar_desc',
                'type'        => 'text',
                'title'       => esc_html__( 'Custom Description', 'segovia' ),
              )
            ),
            'accordion'       => true,
            'button_title'    => esc_html__( 'Add New Sidebar', 'segovia' ),
            'accordion_title' => esc_html__( 'New Sidebar', 'segovia' ),
          ),
          // end fields

        )
      ),
      // custom sidebar section

      // Custom CSS/JS
      array(
        'name'        => 'custom_css_js_section',
        'title'       => esc_html__( 'Custom Codes', 'segovia' ),
        'icon'        => 'fa fa-code',

        // begin: fields
        'fields'      => array(

          // Start Custom CSS/JS
          array(
            'type'    => 'notice',
            'class'   => 'info cs-vt-heading',
            'content' => esc_html__( 'Custom CSS', 'segovia' )
          ),
          array(
            'id'             => 'theme_custom_css',
            'type'           => 'textarea',
            'attributes' => array(
              'rows'     => 10,
              'placeholder'     => esc_html__( 'Enter your CSS code here...', 'segovia' ),
            ),
          ),

          array(
            'type'    => 'notice',
            'class'   => 'info cs-vt-heading',
            'content' => esc_html__( 'Custom JS', 'segovia' )
          ),
          array(
            'id'             => 'theme_custom_js',
            'type'           => 'textarea',
            'attributes' => array(
              'rows'     => 10,
              'placeholder'     => esc_html__( 'Enter your JS code here...', 'segovia' ),
            ),
          ),
          // End Custom CSS/JS

        ) // end: fields
      ),

      // Translation
      array(
        'name'        => 'theme_translation_section',
        'title'       => esc_html__( 'Translation', 'segovia' ),
        'icon'        => 'fa fa-language',

        // begin: fields
        'fields'      => array(

          // Start Translation
          array(
            'type'    => 'notice',
            'class'   => 'info cs-vt-heading',
            'content' => esc_html__( 'Common Texts', 'segovia' )
          ),
          array(
            'id'          => 'menu_text',
            'type'        => 'text',
            'title'       => esc_html__( 'Menu Text(Header Style Two)', 'segovia' ),
          ),
          array(
            'id'          => 'read_more_text',
            'type'        => 'text',
            'title'       => esc_html__( 'Read More Text', 'segovia' ),
          ),
          array(
            'id'          => 'view_more_text',
            'type'        => 'text',
            'title'       => esc_html__( 'View More Text', 'segovia' ),
          ),
          array(
            'id'          => 'share_text',
            'type'        => 'text',
            'title'       => esc_html__( 'Share Text', 'segovia' ),
          ),
          array(
            'id'          => 'share_on_text',
            'type'        => 'text',
            'title'       => esc_html__( 'Share On Tooltip Text', 'segovia' ),
          ),
          array(
            'id'          => 'author_text',
            'type'        => 'text',
            'title'       => esc_html__( 'Author Text', 'segovia' ),
          ),
          array(
            'id'          => 'author_by_text',
            'type'        => 'text',
            'title'       => esc_html__( 'Author By Text', 'segovia' ),
          ),
          array(
            'id'          => 'tags_text',
            'type'        => 'text',
            'title'       => esc_html__( 'View More Text', 'segovia' ),
          ),
          array(
            'id'          => 'post_comment_text',
            'type'        => 'text',
            'title'       => esc_html__( 'Post Comment Text [Submit Button]', 'segovia' ),
          ),
          array(
            'type'    => 'notice',
            'class'   => 'info cs-vt-heading',
            'content' => esc_html__( 'WooCommerce', 'segovia' )
          ),
          array(
            'id'          => 'add_to_cart_text',
            'type'        => 'text',
            'title'       => esc_html__( 'Add to Cart Text', 'segovia' ),
          ),
          array(
            'id'          => 'details_text',
            'type'        => 'text',
            'title'       => esc_html__( 'Details Text', 'segovia' ),
          ),

          array(
            'type'    => 'notice',
            'class'   => 'info cs-vt-heading',
            'content' => esc_html__( 'Pagination', 'segovia' )
          ),
          array(
            'id'          => 'older_post',
            'type'        => 'text',
            'title'       => esc_html__( 'Older Posts Text', 'segovia' ),
          ),
          array(
            'id'          => 'newer_post',
            'type'        => 'text',
            'title'       => esc_html__( 'Newer Posts Text', 'segovia' ),
          ),

          array(
            'type'    => 'notice',
            'class'   => 'info cs-vt-heading',
            'content' => esc_html__( 'Single Portfolio Pagination', 'segovia' )
          ),
          array(
            'id'          => 'prev_port',
            'type'        => 'text',
            'title'       => esc_html__( 'Prev Project Text', 'segovia' ),
          ),
          array(
            'id'          => 'next_port',
            'type'        => 'text',
            'title'       => esc_html__( 'Next Project Text', 'segovia' ),
          ),
          // End Translation

        ) // end: fields
      ),

    ),
  );

  // ------------------------------
  // backup                       -
  // ------------------------------
  $options[]   = array(
    'name'     => 'backup_section',
    'title'    => 'Backup',
    'icon'     => 'fa fa-shield',
    'fields'   => array(

      array(
        'type'    => 'notice',
        'class'   => 'warning',
        'content' => 'You can save your current options. Download a Backup and Import.',
      ),

      array(
        'type'    => 'backup',
      ),

    )
  );

  return $options;

}
add_filter( 'cs_framework_options', 'segovia_vt_options' );