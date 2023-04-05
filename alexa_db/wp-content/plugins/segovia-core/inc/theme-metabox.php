<?php
/*
 * All Metabox related options for Segovia theme.
 * Author & Copyright: VictorThemes
 * URL: https://victorthemes.com/wp-themes
 */

function segovia_vt_metabox_options( $options ) {

  $options      = array();

  $args = array(
      'post_type' => 'template',
      'posts_per_page' => -1,
    );
    $pages = get_posts($args);
    $template_post = array();
    if ( $pages ) {
      foreach ( $pages as $page ) {
        $template_post[ $page->ID ] = $page->post_title;
      }
    } else {
      $template_post[ esc_html__( 'No templates found', 'cosgrove' ) ] = 0;
    }

  // -----------------------------------------
  // Post Metabox Options                    -
  // -----------------------------------------
  $options[]    = array(
    'id'        => 'post_type_metabox',
    'title'     => esc_html__('Post Options', 'segovia'),
    'post_type' => 'post',
    'context'   => 'normal',
    'priority'  => 'default',
    'sections'  => array(

      // All Post Formats
      array(
        'name'   => 'section_post_formats',
        'fields' => array(

          // Standard, Image
          array(
            'title' => 'Standard Image',
            'type'  => 'subheading',
            'content' => esc_html__('There is no Extra Option for this Post Format!', 'segovia'),
            'wrap_class' => 'vt-minimal-heading hide-title',
          ),
          // Standard, Image

          // Gallery
          array(
            'id'      => 'gallery_type',
            'type'    => 'radio',
            'title'   => esc_html__('Gallery Type (Normal or Gallery With Page Numbers)', 'segovia'),
            'info'    => esc_html__('Choose your Gallery Type(Normal or Gallery With Page Numbers). Default : Normal', 'segovia'),
            'options'    => array(
              'normal'   => 'Normal',
              'page_number'    => 'Gallery With Page Numbers',
            ),
            'default'    => 'normal',
            'radio'      => true,
          ),
          array(
            'id'          => 'gallery_post_format',
            'type'        => 'gallery',
            'title'       => esc_html__('Add Gallery', 'segovia'),
            'add_title'   => esc_html__('Add Image(s)', 'segovia'),
            'edit_title'  => esc_html__('Edit Image(s)', 'segovia'),
            'clear_title' => esc_html__('Clear Image(s)', 'segovia'),
          ),
          // Gallery

           // Video Post
          array(
            'type'       => 'notice',
            'title'      => 'Video Post',
            'wrap_class' => 'hide-title',
            'class'      => 'info cs-vt-heading',
            'content'    => esc_html__('Video Post', 'segovia')
          ),
          array(
            'id'        => 'video_post',
            'type'      => 'textarea',
            'title'     => esc_html__('Video iframe', 'segovia'),
            'info'      => esc_html__('Enter your Video iframe', 'segovia'),
            'sanitize'  => true,
          ),

        ),
      ),

    ),
  );
  // -----------------------------------------
  // Portfolio Metabox Options                    -
  // -----------------------------------------
      $options[]    = array(
    'id'        => 'portfolio_options',
    'title'     => esc_html__('Portfolio Option', 'segovia'),
    'post_type' => 'portfolio',
    'context'   => 'side',
    'priority'  => 'default',
    'sections'  => array(

      array(
        'name'   => 'portfolio_option_section',
        'fields' => array(

          array(
            'id'    => 'double_header',
            'type'  => 'switcher',
            'title' => esc_html__('Double Width Image', 'segovia'),
            'info' => esc_html__('Turn on to double width image', 'segovia'),
          ),

        ),
      ),

    ),
  );

  // -----------------------------------------
  // Portfolio Metabox Options                    -
  // -----------------------------------------
     $cf7 = get_posts( 'post_type="wpcf7_contact_form"&numberposts=-1' );
  $contact_forms = array();
  if ( $cf7 ) {
    foreach ( $cf7 as $cform ) {
      $contact_forms[ $cform->ID ] = $cform->post_title;
    }
  } else {
    $contact_forms[ __( 'No contact forms found', 'segovia' ) ] = 0;
  }

  // -----------------------------------------
  // Featured Image Options
  // -----------------------------------------

  $options[]    = array(
    'id'        => 'portfolio_featured_image',
    'title'     => esc_html__('Featured Image', 'segovia'),
    'post_type' => 'portfolio',
    'context'   => 'side',
    'priority'  => 'default',
    'sections'  => array(
        array(
          'name'  => 'portfolio_layout_section',
          'fields' => array(
            array(
              'id'        => 'featured_image_vertical',
              'type'      => 'image',
              'title'   => esc_html__('Vertical Featured Image', 'segovia'),
            ),
            array(
              'id'        => 'featured_image_horizontal',
              'type'      => 'image',
              'title'   => esc_html__('Horizontal Featured Image', 'segovia'),
            ),
          ), // End Fields
        ), // Content Section
      ),
    ); // featured image

  // -----------------------------------------
  // Page Metabox Options                    -
  // -----------------------------------------
  $options[]    = array(
    'id'        => 'page_type_metabox',
    'title'     => esc_html__('Page Custom Options', 'segovia'),
    'post_type' => array('post', 'page', 'portfolio', 'product', 'team'),
    'context'   => 'normal',
    'priority'  => 'default',
    'sections'  => array(


      // Header
      array(
        'name'  => 'header_section',
        'title' => esc_html__('Header', 'segovia'),
        'icon'  => 'fa fa-bars',
        'fields' => array(

          array(
            'id'           => 'select_header_design',
            'type'         => 'image_select',
            'title'        => esc_html__('Select Header Design', 'segovia'),
            'options'      => array(
              'default'     => SEGOVIA_IMGS_METABOX .'/hs-0.png',
              'style_one'   => SEGOVIA_IMGS_METABOX .'/hs-1.png',
              'style_two'   => SEGOVIA_IMGS_METABOX .'/hs-2.png',
            ),
            'attributes' => array(
              'data-depend-id' => 'header_design',
            ),
            'radio'     => true,
            'default'   => 'default',
            'info'      => esc_html__('Select your header design, following options will may differ based on your selection of header design.', 'segovia'),
          ),
          array(
            'id'    => 'transparency_header',
            'type'  => 'switcher',
            'title' => esc_html__('Transparent Header', 'segovia'),
            'info' => esc_html__('Use Transparent Method', 'segovia'),
            'dependency' => array('header_design', '==', 'style_one'),
          ),
          array(
            'id'        => 'trans_menu_style',
            'type'      => 'select',
            'title'     => esc_html__('Transparent Menu Style', 'segovia'),
            'options'   => array(
              'default_menu_color' => esc_html__('Light Transparent Menu', 'segovia'),
              'dark_menu_color' => esc_html__('Dark Transparent Menu', 'segovia'),
            ),
            'dependency'   => array('transparency_header|header_design', '==|==', 'true|style_one'),
          ),
          array(
            'id'             => 'choose_menu',
            'type'           => 'select',
            'title'          => esc_html__('Choose Menu', 'segovia'),
            'desc'          => esc_html__('Choose custom menus for this page.', 'segovia'),
            'options'        => 'menus',
            'default_option' => esc_html__('Select your menu', 'segovia'),
            'dependency'   => array('header_design', '!=', 'default'),
          ),

          // Enable & Disable
          array(
            'type'    => 'notice',
            'class'   => 'info cs-vt-heading',
            'content' => esc_html__('Enable & Disable', 'segovia'),
            'dependency' => array('header_design', '!=', 'default'),
          ),
          array(
            'id'    => 'sticky_header',
            'type'  => 'switcher',
            'title' => esc_html__('Sticky Header', 'segovia'),
            'info' => esc_html__('Turn On if you want your naviagtion bar on sticky.', 'segovia'),
            'default' => true,
            'dependency' => array('header_design', '==', 'style_one'),
          ),
          array(
            'id'    => 'search_icon',
            'type'  => 'switcher',
            'title' => esc_html__('Search Icon', 'segovia'),
            'info' => esc_html__('Turn On if you want to show search icon in navigation bar.', 'segovia'),
            'default' => true,
            'dependency' => array('header_design', '==', 'style_one'),
          ),
          array(
            'id'    => 'hide_main_menu',
            'type'  => 'switcher',
            'title' => esc_html__('Hide Main Menu', 'segovia'),
            'info' => esc_html__('Turn On if you want to hide main menu in navigation bar.', 'segovia'),
            'default' => true,
            'dependency' => array('header_design', '==', 'style_one'),
          ),
          array(
            'id'        => 'toggle_menu_style',
            'type'      => 'select',
            'title'     => esc_html__('Toggle Menu Style', 'segovia'),
            'options'   => array(
              'default_toggle' => esc_html__('Default Style', 'segovia'),
              'round_toggle' => esc_html__('Rounded Border', 'segovia'),
            ),
            'dependency' => array('header_design', '==', 'style_one'),
          ),
          array(
            'id'    => 'header_width',
            'type'  => 'switcher',
            'title' => esc_html__('Container Width', 'segovia'),
            'info' => esc_html__('Turn On if you want Container width header.', 'segovia'),
            'default' => false,
            'dependency' => array('header_design', '==', 'style_one'),
          ),
          array(
            'id'    => 'menu_border',
            'type'  => 'switcher',
            'title' => esc_html__('Menu Border', 'segovia'),
            'info' => esc_html__('Turn On if you want border bottom for Menu.', 'segovia'),
            'default' => false,
            'dependency' => array('header_design', '==', 'style_one'),
          ),
          array(
            'id'          => 'social_ftr_icon',
            'title'       => esc_html__('Footer Social Icon', 'segovia'),
            'desc'        => esc_html__('Footer Social Icons.', 'segovia'),
            'type'        => 'textarea',
            'shortcode'   => true,
            'dependency' => array('header_design', '==', 'style_two'),
          ),
          array(
            'id'          => 'social_ftr_cprt',
            'title'       => esc_html__('Copyright Section', 'segovia'),
            'desc'        => esc_html__('Footer Copyright.', 'segovia'),
            'type'        => 'textarea',
            'shortcode'   => true,
            'dependency' => array('header_design', '==', 'style_two'),
          ),
        ),
      ),
      // Header

      // Banner & Title Area
      array(
        'name'  => 'banner_title_section',
        'title' => esc_html__('Banner & Title Area', 'segovia'),
        'icon'  => 'fa fa-bullhorn',
        'fields' => array(

          array(
            'id'        => 'banner_type',
            'type'      => 'select',
            'title'     => esc_html__('Choose Banner Type', 'segovia'),
            'options'   => array(
              'default-title'    => 'Default Title',
              'revolution-slider' => 'Shortcode [Rev Slider]',
              'template' => 'Template',
              'hide-title-area'   => 'Hide Title/Banner Area',
            ),
          ),
           array(
            'id'        => 'template_name',
            'type'      => 'select',
            'title'     => esc_html__('Choose Template', 'cosgrove'),
            'options'   => $template_post,
            'dependency'   => array('banner_type', '==', 'template'),
          ),
          array(
            'id'    => 'page_revslider',
            'type'  => 'textarea',
            'title' => esc_html__('Revolution Slider or Any Shortcodes', 'segovia'),
            'desc' => esc_html__('Enter any shortcodes that you want to show in this page title area. <br />Eg : Revolution Slider shortcode.', 'segovia'),
            'attributes' => array(
              'placeholder' => esc_html__('Enter your shortcode...', 'segovia'),
            ),
            'dependency'   => array('banner_type', '==', 'revolution-slider'),
          ),
          array(
            'id'    => 'page_custom_title',
            'type'  => 'text',
            'title' => esc_html__('Custom Title', 'segovia'),
            'attributes' => array(
              'placeholder' => esc_html__('Enter your custom title...', 'segovia'),
            ),
            'dependency'   => array('banner_type', '==', 'default-title'),
          ),
          array(
            'id'        => 'title_area_spacings',
            'type'      => 'select',
            'title'     => esc_html__('Title Area Spacings', 'segovia'),
            'options'   => array(
              'padding-none' => esc_html__('Default Spacing', 'segovia'),
              'padding-xs' => esc_html__('Extra Small Padding', 'segovia'),
              'padding-sm' => esc_html__('Small Padding', 'segovia'),
              'padding-md' => esc_html__('Medium Padding', 'segovia'),
              'padding-lg' => esc_html__('Large Padding', 'segovia'),
              'padding-xl' => esc_html__('Extra Large Padding', 'segovia'),
              'padding-no' => esc_html__('No Padding', 'segovia'),
              'padding-custom' => esc_html__('Custom Padding', 'segovia'),
            ),
            'dependency'   => array('banner_type', '==', 'default-title'),
          ),
          array(
            'id'    => 'title_top_spacings',
            'type'  => 'text',
            'title' => esc_html__('Top Spacing', 'segovia'),
            'attributes'  => array( 'placeholder' => '100px' ),
            'dependency'  => array('banner_type|title_area_spacings', '==|==', 'default-title|padding-custom'),
          ),
          array(
            'id'    => 'title_bottom_spacings',
            'type'  => 'text',
            'title' => esc_html__('Bottom Spacing', 'segovia'),
            'attributes'  => array( 'placeholder' => '100px' ),
            'dependency'  => array('banner_type|title_area_spacings', '==|==', 'default-title|padding-custom'),
          ),
          array(
            'id'    => 'title_area_bg',
            'type'  => 'background',
            'title' => esc_html__('Background', 'segovia'),
            'dependency'   => array('banner_type', '==', 'default-title'),
          ),
          array(
            'id'    => 'titlebar_bg_overlay_color',
            'type'  => 'color_picker',
            'title' => esc_html__('Overlay Color', 'segovia'),
            'dependency'   => array('banner_type', '==', 'default-title'),
          ),

        ),
      ),
      // Banner & Title Area

      // Content Section
      array(
        'name'  => 'page_content_options',
        'title' => esc_html__('Content Options', 'segovia'),
        'icon'  => 'fa fa-file',

        'fields' => array(

          array(
            'id'        => 'content_spacings',
            'type'      => 'select',
            'title'     => esc_html__('Content Spacings', 'segovia'),
            'options'   => array(
              'padding-none' => esc_html__('Default Spacing', 'segovia'),
              'padding-xs' => esc_html__('Extra Small Padding', 'segovia'),
              'padding-sm' => esc_html__('Small Padding', 'segovia'),
              'padding-md' => esc_html__('Medium Padding', 'segovia'),
              'padding-lg' => esc_html__('Large Padding', 'segovia'),
              'padding-xl' => esc_html__('Extra Large Padding', 'segovia'),
              'padding-cnt-no' => esc_html__('No Padding', 'segovia'),
              'padding-custom' => esc_html__('Custom Padding', 'segovia'),
            ),
            'desc' => esc_html__('Content area top and bottom spacings.', 'segovia'),
          ),
          array(
            'id'    => 'content_top_spacings',
            'type'  => 'text',
            'title' => esc_html__('Top Spacing', 'segovia'),
            'attributes'  => array( 'placeholder' => '100px' ),
            'dependency'  => array('content_spacings', '==', 'padding-custom'),
          ),
          array(
            'id'    => 'content_bottom_spacings',
            'type'  => 'text',
            'title' => esc_html__('Bottom Spacing', 'segovia'),
            'attributes'  => array( 'placeholder' => '100px' ),
            'dependency'  => array('content_spacings', '==', 'padding-custom'),
          ),

        ), // End Fields
      ), // Content Section

      // Enable & Disable
      array(
        'name'  => 'hide_show_section',
        'title' => esc_html__('Enable & Disable', 'segovia'),
        'icon'  => 'fa fa-toggle-on',
        'fields' => array(

          array(
            'id'    => 'hide_header',
            'type'  => 'switcher',
            'title' => esc_html__('Hide Header', 'segovia'),
            'label' => esc_html__('Yes, Please do it.', 'segovia'),
          ),
          array(
            'id'    => 'need_breadcrumbs',
            'type'  => 'switcher',
            'title' => esc_html__('Need Breadcrumbs', 'segovia'),
            'label' => esc_html__('Yes, Please do it.', 'segovia'),
          ),
          array(
            'id'    => 'hide_copyright',
            'type'  => 'switcher',
            'title' => esc_html__('Hide Copyright', 'havnor'),
            'label' => esc_html__('Yes, Please do it.', 'havnor'),
          ),
          array(
            'id'    => 'hide_footer',
            'type'  => 'switcher',
            'title' => esc_html__('Hide Footer', 'segovia'),
            'label' => esc_html__('Yes, Please do it.', 'segovia'),
          ),

        ),
      ),
      // Enable & Disable

    ),
  );

  // -----------------------------------------
  // Page Layout
  // -----------------------------------------
  $options[]    = array(
    'id'        => 'page_layout_options',
    'title'     => esc_html__('Page Layout', 'segovia'),
    'post_type' => 'page',
    'context'   => 'side',
    'priority'  => 'default',
    'sections'  => array(

      array(
        'name'   => 'page_layout_section',
        'fields' => array(

          array(
            'id'        => 'page_layout',
            'type'      => 'image_select',
            'options'   => array(
              'full-width'    => SEGOVIA_IMGS_METABOX . '/page-1.png',
              'extra-width'   => SEGOVIA_IMGS_METABOX . '/page-2.png',
              'left-sidebar'  => SEGOVIA_IMGS_METABOX . '/page-3.png',
              'right-sidebar' => SEGOVIA_IMGS_METABOX . '/page-4.png',
            ),
            'attributes' => array(
              'data-depend-id' => 'page_layout',
            ),
            'default'    => 'full-width',
            'radio'      => true,
            'wrap_class' => 'text-center',
          ),
          array(
            'id'            => 'page_sidebar_widget',
            'type'           => 'select',
            'title'          => esc_html__('Sidebar Widget', 'segovia'),
            'options'        => segovia_vt_registered_sidebars(),
            'default_option' => esc_html__('Select Widget', 'segovia'),
            'dependency'   => array('page_layout', 'any', 'left-sidebar,right-sidebar'),
          ),
           array(
            'id'    => 'floating_sidebar',
            'type'  => 'switcher',
            'title' => esc_html__('Floating Sidebar', 'segovia'),
            'info' => esc_html__('If need floating sidebar for blog single, please turn this ON.', 'segovia'),
            'dependency'   => array('page_layout', 'any', 'left-sidebar,right-sidebar'),
          ),

        ),
      ),

    ),
  );

  // -----------------------------------------
  // Testimonial
  // -----------------------------------------
  $options[]    = array(
    'id'        => 'testimonial_options',
    'title'     => esc_html__('Testimonial Client', 'segovia'),
    'post_type' => 'testimonial',
    'context'   => 'side',
    'priority'  => 'default',
    'sections'  => array(

      array(
        'name'   => 'testimonial_option_section',
        'fields' => array(

          array(
            'id'      => 'testi_link',
            'type'    => 'text',
            'title'   => esc_html__('Custom Link', 'segovia'),
            'info'    => esc_html__('Enter custom link for testimonial', 'segovia'),
          ),
          array(
            'id'      => 'testi_pro',
            'type'    => 'text',
            'title'   => esc_html__('Profession', 'segovia'),
            'info'    => esc_html__('Enter client profession', 'segovia'),
          ),
          array(
            'id'    => 'testi_logo',
            'type'  => 'image',
            'title' => esc_html__('Testimonial Logo', 'segovia'),
            'button_title' => esc_html__('Add Logo', 'segovia'),
          ),

        ),
      ),

    ),
  );

  // -----------------------------------------
  // Team
  // -----------------------------------------
  $options[]    = array(
    'id'        => 'team_options',
    'title'     => esc_html__('Job Position', 'segovia'),
    'post_type' => 'team',
    'context'   => 'side',
    'priority'  => 'default',
    'sections'  => array(

      array(
        'name'   => 'team_option_section',
        'fields' => array(

          array(
            'id'      => 'team_job_position',
            'type'    => 'text',
            'attributes' => array(
              'placeholder' => esc_html__('Eg : Financial Manager', 'segovia'),
            ),
            'info'    => esc_html__('Enter this employee job position, in your company.', 'segovia'),
          ),
          array(
            'id'      => 'team_custom_link',
            'type'    => 'text',
            'title'    => esc_html__('Custom Link', 'segovia'),
            'attributes' => array(
              'placeholder' => esc_html__('http://', 'segovia'),
            ),
            'info'    => esc_html__('Enter your custom link, if you don\'t want to show this page.', 'segovia'),
          ),

          // Contact fields
          array(
            'id'                  => 'contact_details',
            'type'                => 'group',
            'title'    => esc_html__('Contact Details', 'caspiar'),
            'button_title'       => 'Add New',
            'fields'              => array(

              array(
                'id'              => 'contact_icon',
                'type'            => 'icon',
                'title'           => esc_html__('Select your icon', 'caspiar'),
              ),
              array(
                'id'              => 'contact_title',
                'type'            => 'text',
                'title'           => esc_html__('Enter your title', 'caspiar'),
              ),
              array(
                'id'              => 'contact_text',
                'type'            => 'text',
                'title'           => esc_html__('Enter your text', 'caspiar'),
              ),
              array(
                'id'              => 'contact_link',
                'type'            => 'text',
                'title'           => esc_html__('Enter your link', 'caspiar'),
              ),

            ),
          ),
           array(
            'id'      => 'social_text',
            'type'    => 'text',
            'title'    => esc_html__('Social Text', 'segovia'),
            'attributes' => array(
              'placeholder' => esc_html__('Let\'s Connect', 'segovia'),
            ),
          ),
          // Social fields
          array(
            'id'                  => 'social_icons',
            'type'                => 'group',
            'title'    => esc_html__('Social Icons', 'segovia'),
            'button_title'       => 'Add New Icon',
            'accordion_title'    => 'Adding New Icon',
            'accordion'          => true,
            'fields'              => array(
              array(
                'id'              => 'icon',
                'type'            => 'icon',
                'title'           => esc_html__('Select your icon', 'segovia'),
              ),
              array(
                'id'              => 'icon_link',
                'type'            => 'text',
                'title'           => esc_html__('Enter your icon link', 'segovia'),
              ),

            ),

          ),

        ),
      ),

    ),
  );

  return $options;

}
add_filter( 'cs_metabox_options', 'segovia_vt_metabox_options' );