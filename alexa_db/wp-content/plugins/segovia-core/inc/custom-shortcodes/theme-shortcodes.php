<?php
/*
 * All Custom Shortcode for [theme_name] theme.
 * Author & Copyright: VictorThemes
 * URL: https://victorthemes.com/wp-themes
 */

if( ! function_exists( 'segovia_vt_shortcodes' ) ) {
  function segovia_vt_shortcodes( $options ) {

    $options       = array();


    /* Header Shortcodes */
    $options[]     = array(
      'title'      => __('Header Shortcodes', 'segovia'),
      'shortcodes' => array(

        // Address Info
        array(
          'name'          => 'vt_address_infos',
          'title'         => __('Address Info', 'segovia'),
          'view'          => 'clone',
          'clone_id'      => 'vt_address_info',
          'clone_title'   => __('Add New', 'segovia'),
          'fields'        => array(

            array(
              'id'        => 'custom_class',
              'type'      => 'text',
              'title'     => __('Custom Class', 'segovia'),
            ),

          ),
          'clone_fields'  => array(

            array(
              'id'        => 'address_style',
              'type'      => 'select',
              'options'   => array(
                'style-one' => __('Style One', 'segovia'),
                'style-two' => __('Style Two', 'segovia'),
              ),
              'title'     => __('Address Style', 'segovia'),
            ),
            array(
              'id'        => 'info_icon',
              'type'      => 'icon',
              'title'     => __('Info Icon', 'segovia')
            ),
            array(
              'id'        => 'info_icon_color',
              'type'      => 'color_picker',
              'title'     => __('Info Icon Color', 'segovia'),
            ),
            array(
              'id'        => 'info_main_text',
              'type'      => 'text',
              'title'     => __('Main Text', 'segovia')
            ),
            array(
              'id'        => 'info_main_text_link',
              'type'      => 'text',
              'title'     => __('Main Text Link', 'segovia')
            ),
            array(
              'id'        => 'info_main_text_color',
              'type'      => 'color_picker',
              'title'     => __('Main Text Color', 'segovia'),
            ),
            array(
              'id'        => 'info_sec_text',
              'type'      => 'text',
              'title'     => __('Secondary Text', 'segovia'),
              'dependency'  => array('address_style', '==', 'style-one'),
            ),
            array(
              'id'        => 'info_sec_text_link',
              'type'      => 'text',
              'title'     => __('Secondary Text Link', 'segovia'),
              'dependency'  => array('address_style', '==', 'style-one'),
            ),
            array(
              'id'        => 'info_sec_text_color',
              'type'      => 'color_picker',
              'title'     => __('Secondary Text Color', 'segovia'),
              'dependency'  => array('address_style', '==', 'style-one'),
            ),
            array(
              'id'        => 'target_tab',
              'type'      => 'switcher',
              'title'     => __('Open New Tab?', 'segovia'),
              'on_text'     => __('Yes', 'segovia'),
              'off_text'     => __('No', 'segovia'),
            ),

          ),

        ),
        // Address Info

      ),
    );

    /* Content Shortcodes */
    $options[]     = array(
      'title'      => __('Content Shortcodes', 'segovia'),
      'shortcodes' => array(

        // Spacer
        array(
          'name'          => 'vc_empty_space',
          'title'         => __('Spacer', 'segovia'),
          'fields'        => array(

            array(
              'id'        => 'height',
              'type'      => 'text',
              'title'     => __('Height', 'segovia'),
              'attributes' => array(
                'placeholder'     => '20px',
              ),
            ),

          ),
        ),
        // Spacer

        // Hover Menu - Overlay Menu
        array(
          'name'          => 'hover_menu_title',
          'title'         => __('Title', 'segovia'),
          'fields'        => array(

            array(
              'id'        => 'hover_title',
              'type'      => 'text',
              'title'     => __('Title', 'segovia'),
            ),
            array(
              'id'        => 'custom_class',
              'type'      => 'text',
              'title'     => __('Custom Class', 'segovia'),
            ),
            array(
              'id'        => 'title_color',
              'type'      => 'color_picker',
              'title'     => __('Title Color', 'segovia'),
              'wrap_class' => 'column_third',
            ),
            array(
              'id'        => 'title_size',
              'type'      => 'text',
              'title'     => __('Title Size', 'segovia'),
              'wrap_class' => 'column_third',
            ),

          ),
        ),
        // Hover Menu - Overlay Menu

        // Custom Title
        array(
          'name'          => 'segva_custom_title',
          'title'         => __('Custom Title', 'segovia'),
          'fields'        => array(

            array(
              'id'        => 'custom_title',
              'type'      => 'text',
              'title'     => __('Title', 'segovia'),
            ),
            array(
              'id'        => 'custom_class',
              'type'      => 'text',
              'title'     => __('Custom Class', 'segovia'),
            ),
            array(
              'id'        => 'custom_title_color',
              'type'      => 'color_picker',
              'title'     => __('Title Color', 'segovia'),
              'wrap_class' => 'column_third',
            ),
            array(
              'id'        => 'custom_title_size',
              'type'      => 'text',
              'title'     => __('Title Size', 'segovia'),
              'wrap_class' => 'column_third',
            ),

          ),
        ),
        // Custom Title

        // Segovia Link
        array(
          'name'          => 'segovia_readmore',
          'title'         => __('Segovia ReadMore Link', 'segovia'),
          'fields'        => array(

            array(
              'id'        => 'readmore_title',
              'type'      => 'text',
              'title'     => __('Readmore Title', 'segovia'),
            ),
            array(
              'id'        => 'readmore_icon',
              'type'      => 'icon',
              'title'     => __('Readmore Icon', 'segovia'),
            ),
            array(
              'id'        => 'readmore_size',
              'type'      => 'text',
              'title'     => __('Readmore Size', 'segovia'),
            ),
            array(
              'id'        => 'readmore_icon_size',
              'type'      => 'text',
              'title'     => __('Readmore Icon Size', 'segovia'),
            ),
            array(
              'id'        => 'custom_class',
              'type'      => 'text',
              'title'     => __('Custom Class', 'segovia'),
            ),
            array(
              'id'        => 'readmore_link',
              'type'      => 'text',
              'title'     => __('Readmore Link', 'segovia'),
            ),
            array(
              'id'        => 'padding_top',
              'type'      => 'text',
              'title'     => __('Padding Top', 'segovia'),
            ),
            array(
              'id'        => 'target_tab',
              'type'      => 'switcher',
              'title'     => __('Open New Tab?', 'segovia'),
              'on_text'     => __('Yes', 'segovia'),
              'off_text'     => __('No', 'segovia'),
            ),
             // Normal Mode
            array(
              'type'    => 'notice',
              'class'   => 'info',
              'content' => __('Normal Mode', 'segovia')
            ),
            array(
              'id'        => 'readmore_color',
              'type'      => 'color_picker',
              'title'     => __('Text Color', 'segovia'),
              'wrap_class' => 'column_half el-hav-border',
            ),
             array(
              'id'        => 'readmore_bg_color',
              'type'      => 'color_picker',
              'title'     => __('Background Color', 'segovia'),
              'wrap_class' => 'column_half el-hav-border',
            ),
            array(
              'id'        => 'border_color',
              'type'      => 'color_picker',
              'title'     => __('Border Color', 'segovia'),
              'wrap_class' => 'column_half el-hav-border',
            ),
            // Hover Mode
            array(
              'type'    => 'notice',
              'class'   => 'info',
              'content' => __('Hover Mode', 'segovia')
            ),
            array(
              'id'        => 'text_hover_color',
              'type'      => 'color_picker',
              'title'     => __('Text Hover Color', 'segovia'),
              'wrap_class' => 'column_half el-hav-border',
            ),
            array(
              'id'        => 'bg_hover_color',
              'type'      => 'color_picker',
              'title'     => __('Background Hover Color', 'segovia'),
              'wrap_class' => 'column_half el-hav-border',
            ),
            array(
              'id'        => 'border_hover_color',
              'type'      => 'color_picker',
              'title'     => __('Border Hover Color', 'segovia'),
              'wrap_class' => 'column_half el-hav-border',
            ),

          ),
        ),
        // Segovia Link

        // Typewritter Text
        array(
          'name'          => 'segovia_typewritter_lists',
          'title'         => __('Typewritter Text', 'segovia'),
          'view'          => 'clone',
          'clone_id'      => 'segovia_typewritter_list',
          'clone_title'   => __('Add New', 'segovia'),
          'fields'        => array(

            array(
              'id'        => 'custom_class',
              'type'      => 'text',
              'title'     => __('Custom Class', 'segovia'),
            ),

          ),
          'clone_fields'  => array(

            array(
              'id'        => 'text',
              'type'      => 'text',
              'title'     => __('Typewritter Text', 'segovia')
            ),

          ),

        ),
        // Typewritter Text

        // Social Icons
        array(
          'name'          => 'vt_socials',
          'title'         => __('Social Icons', 'segovia'),
          'view'          => 'clone',
          'clone_id'      => 'vt_social',
          'clone_title'   => __('Add New', 'segovia'),
          'fields'        => array(

            array(
              'id'        => 'social_select',
              'type'      => 'select',
              'options'   => array(
                'style-one' => __('Style One (Menu)', 'segovia'),
                'style-two' => __('Style Two (Footer)', 'segovia'),
              ),
              'title'     => __('Social Icons Style', 'segovia'),
            ),
            array(
              'id'        => 'custom_class',
              'type'      => 'text',
              'title'     => __('Custom Class', 'segovia'),
            ),

            // Colors
            array(
              'type'    => 'notice',
              'class'   => 'info',
              'content' => __('Colors', 'segovia')
            ),
            array(
              'id'        => 'icon_color',
              'type'      => 'color_picker',
              'title'     => __('Icon Color', 'segovia'),
              'wrap_class' => 'column_third',
            ),
            array(
              'id'        => 'icon_hover_color',
              'type'      => 'color_picker',
              'title'     => __('Icon Hover Color', 'segovia'),
              'wrap_class' => 'column_third',
              'dependency'  => array('social_select', '!=', 'style-three'),
            ),
            array(
              'id'        => 'bg_color',
              'type'      => 'color_picker',
              'title'     => __('Backrgound Color', 'segovia'),
              'wrap_class' => 'column_third',
              'dependency'  => array('social_select', '!=', 'style-one'),
            ),
            array(
              'id'        => 'bg_hover_color',
              'type'      => 'color_picker',
              'title'     => __('Backrgound Hover Color', 'segovia'),
              'wrap_class' => 'column_third',
              'dependency'  => array('social_select', '==', 'style-two'),
            ),
            array(
              'id'        => 'border_color',
              'type'      => 'color_picker',
              'title'     => __('Border Color', 'segovia'),
              'wrap_class' => 'column_third',
              'dependency'  => array('social_select', '==', 'style-three'),
            ),

            // Icon Size
            array(
              'id'        => 'icon_size',
              'type'      => 'text',
              'title'     => __('Icon Size', 'segovia'),
              'wrap_class' => 'column_full',
            ),

          ),
          'clone_fields'  => array(

            array(
              'id'        => 'social_link',
              'type'      => 'text',
              'attributes' => array(
                'placeholder'     => 'http://',
              ),
              'title'     => __('Link', 'segovia')
            ),
            array(
              'id'        => 'social_icon',
              'type'      => 'icon',
              'title'     => __('Social Icon', 'segovia')
            ),
            array(
              'id'        => 'target_tab',
              'type'      => 'switcher',
              'title'     => __('Open New Tab?', 'segovia'),
              'on_text'     => __('Yes', 'segovia'),
              'off_text'     => __('No', 'segovia'),
            ),

          ),

        ),
        // Social Icons

        // Service Item
        array(
          'name'          => 'segovia_service_item',
          'title'         => __('Service Item', 'segovia'),
          'fields'        => array(

             array(
            'id'        => 'item_icon_image',
            'type'      => 'upload',
            'title'     => __('Service Item Image', 'segovia'),
            ),
            array(
              'id'        => 'service_item_title',
              'type'      => 'text',
              'title'     => __('Service Item Title', 'segovia'),
            ),
             array(
              'id'        => 'service_title_size',
              'type'      => 'text',
              'title'     => __('Service Title Size', 'segovia'),
            ),
            array(
              'id'        => 'service_title_color',
              'type'      => 'color_picker',
              'title'     => __('Service Title Color', 'segovia'),
             
            ),
            array(
              'id'        => 'service_item_content',
              'type'      => 'textarea',
              'title'     => __('Service Item Content', 'segovia'),
            ),
            array(
              'id'        => 'service_content_size',
              'type'      => 'text',
              'title'     => __('Service Content Size', 'segovia'),
            ),
            array(
              'id'        => 'service_content_color',
              'type'      => 'color_picker',
              'title'     => __('Service Content Color', 'segovia'),
             
            ),

          ),
        ),
        // Segovia Service Item

        // Simple Image List
        array(
          'name'          => 'vt_image_lists',
          'title'         => __('Simple Image List', 'segovia'),
          'view'          => 'clone',
          'clone_id'      => 'vt_image_list',
          'clone_title'   => __('Add New', 'segovia'),
          'fields'        => array(

            array(
              'id'        => 'custom_class',
              'type'      => 'text',
              'title'     => __('Custom Class', 'segovia'),
            ),

          ),
          'clone_fields'  => array(

            array(
              'id'        => 'get_image',
              'type'      => 'upload',
              'title'     => __('Image', 'segovia')
            ),
        
            array(
              'id'        => 'link',
              'type'      => 'text',
              'attributes' => array(
                'placeholder'     => 'http://',
              ),
              'title'     => __('Link', 'segovia')
            ),
            array(
              'id'    => 'open_tab',
              'type'  => 'switcher',
              'std'   => false,
              'title' => __('Open link to new tab?', 'segovia')
            ),

          ),

        ),
        // Simple Image List

        // Sidebar Banner Image
        array(
          'name'          => 'vt_banner_images',
          'title'         => __('Sidebar Banner Image', 'segovia'),
          'fields'        => array(

            array(
              'id'        => 'custom_class',
              'type'      => 'text',
              'title'     => __('Custom Class', 'segovia'),
            ),

            array(
              'id'        => 'get_image',
              'type'      => 'upload',
              'title'     => __('Image', 'segovia')
            ),
            array(
              'id'        => 'title_text',
              'type'      => 'text',
              'title'     => __('Text', 'segovia')
            ),
          
            array(
              'id'        => 'link',
              'type'      => 'text',
              'attributes' => array(
                'placeholder'     => 'http://',
              ),
              'title'     => __('Link', 'segovia')
              
            ),
            array(
              'id'    => 'open_tab',
              'type'  => 'switcher',
              'std'   => false,
              'title' => __('Open link to new tab?', 'segovia'),
              
            ),

         ),

        ),
        // Sidebar Banner Image

        // Simple Link
        array(
          'name'          => 'vt_simple_link',
          'title'         => __('Simple Link', 'segovia'),
          'fields'        => array(

            array(
              'id'        => 'link_text',
              'type'      => 'text',
              'title'     => __('Link Text', 'segovia'),
            ),
            array(
              'id'        => 'link',
              'type'      => 'text',
              'title'     => __('Link', 'segovia'),
              'attributes' => array(
                'placeholder'     => 'http://',
              ),
            ),
            array(
              'id'        => 'target_tab',
              'type'      => 'switcher',
              'title'     => __('Open New Tab?', 'segovia'),
              'on_text'     => __('Yes', 'segovia'),
              'off_text'     => __('No', 'segovia'),
            ),
            array(
              'id'        => 'custom_class',
              'type'      => 'text',
              'title'     => __('Custom Class', 'segovia'),
            ),

            // Normal Mode
            array(
              'type'    => 'notice',
              'class'   => 'info',
              'content' => __('Normal Mode', 'segovia')
            ),
            array(
              'id'        => 'text_color',
              'type'      => 'color_picker',
              'title'     => __('Text Color', 'segovia'),
              'wrap_class' => 'column_half el-hav-border',
            ),
            array(
              'id'        => 'border_color',
              'type'      => 'color_picker',
              'title'     => __('Border Color', 'segovia'),
              'wrap_class' => 'column_half el-hav-border',
              'dependency'  => array('link_style', '==', 'link-underline'),
            ),
            // Hover Mode
            array(
              'type'    => 'notice',
              'class'   => 'info',
              'content' => __('Hover Mode', 'segovia')
            ),
            array(
              'id'        => 'text_hover_color',
              'type'      => 'color_picker',
              'title'     => __('Text Hover Color', 'segovia'),
              'wrap_class' => 'column_half el-hav-border',
            ),
            array(
              'id'        => 'border_hover_color',
              'type'      => 'color_picker',
              'title'     => __('Border Hover Color', 'segovia'),
              'wrap_class' => 'column_half el-hav-border',
              'dependency'  => array('link_style', '==', 'link-underline'),
            ),

            // Size
            array(
              'type'    => 'notice',
              'class'   => 'info',
              'content' => __('Font Sizes', 'segovia')
            ),
            array(
              'id'        => 'text_size',
              'type'      => 'text',
              'title'     => __('Text Size', 'segovia'),
              'attributes' => array(
                'placeholder'     => 'Eg: 14px',
              ),
            ),

          ),
        ),
        // Simple Link

        // Blockquotes
        array(
          'name'          => 'vt_blockquote',
          'title'         => __('Blockquote', 'segovia'),
          'fields'        => array(

            // Content
            array(
              'id'        => 'author_name',
              'type'      => 'text',
              'title'     => __('Author Name', 'segovia'),
            ),
            array(
              'id'        => 'author_link',
              'type'      => 'text',
              'title'     => __('Author Name Link', 'segovia'),
            ),
            array(
              'id'        => 'content_blck',
              'type'      => 'textarea',
              'title'     => __('Content', 'segovia'),
            ),
             array(
              'id'        => 'target_tab',
              'type'      => 'switcher',
              'title'     => __('Author Link Open New Tab?', 'segovia'),
              'on_text'     => __('Yes', 'segovia'),
              'off_text'     => __('No', 'segovia'),
            ),

            array(
              'id'        => 'text_size',
              'type'      => 'text',
              'title'     => __('Text Size', 'segovia'),
            ),
             array(
              'id'        => 'content_size',
              'type'      => 'text',
              'title'     => __('Content Size', 'segovia'),
            ),
            array(
              'id'        => 'custom_class',
              'type'      => 'text',
              'title'     => __('Custom Class', 'segovia'),
            ),
            array(
              'id'        => 'content_color',
              'type'      => 'color_picker',
              'title'     => __('Content Color', 'segovia'),
            ),
           
             array(
              'id'        => 'text_color',
              'type'      => 'color_picker',
              'title'     => __('Name Text Color', 'segovia'),
            ),
            array(
              'id'        => 'text_hover_color',
              'type'      => 'color_picker',
              'title'     => __('Name Text Hover Color', 'segovia'),
            ),
   
          ),

        ),
        // Blockquotes

        // Address Styles
        array(
          'name'          => 'segovia_address_lists',
          'title'         => __('Address Lists', 'segovia'),
          'view'          => 'clone',
          'clone_id'      => 'segovia_address_list',
          'clone_title'   => __('Add New', 'segovia'),
          'fields'        => array(

            array(
              'id'        => 'custom_class',
              'type'      => 'text',
              'title'     => __('Custom Class', 'segovia'),
            ),

            // Colors
            array(
              'type'    => 'notice',
              'class'   => 'info',
              'content' => __('Colors', 'segovia')
            ),
            array(
              'id'        => 'text_color',
              'type'      => 'color_picker',
              'title'     => __('Text Color', 'segovia'),
              'wrap_class' => 'column_half el-hav-border',
            ),
            array(
              'id'        => 'text_hover_color',
              'type'      => 'color_picker',
              'title'     => __('Text Hover Color', 'segovia'),
              'wrap_class' => 'column_half el-hav-border',
            ),
            array(
              'id'        => 'title_color',
              'type'      => 'color_picker',
              'title'     => __('Title Color', 'segovia'),
              'wrap_class' => 'column_half el-hav-border',
            ),
            array(
              'id'        => 'icon_color',
              'type'      => 'color_picker',
              'title'     => __('Icon Color', 'segovia'),
              'wrap_class' => 'column_half el-hav-border',
            ),
            array(
              'id'        => 'icon_size',
              'type'      => 'text',
              'title'     => __('Icon Size', 'segovia'),
              'wrap_class' => 'column_half el-hav-border',
            ),

            // Size
            array(
              'id'        => 'text_size',
              'type'      => 'text',
              'title'     => __('Text Size', 'segovia'),
              'wrap_class' => 'column_half el-hav-border',
            ),
            array(
              'id'        => 'title_size',
              'type'      => 'text',
              'title'     => __('Title Size', 'segovia'),
              'wrap_class' => 'column_half el-hav-border',
            ),
          ),
          'clone_fields'  => array(

            array(
              'id'        => 'list_icon',
              'type'      => 'icon',
              'title'     => __('Icon', 'segovia'),
            ),
            array(
              'id'        => 'list_title',
              'type'      => 'text',
              'title'     => __('Title', 'segovia')
            ),
            array(
              'id'        => 'list_text',
              'type'      => 'textarea',
              'title'     => __('Text', 'segovia')
            ),
            array(
              'id'        => 'list_text_link',
              'type'      => 'text',
              'title'     => __('Text Link', 'segovia')
            ),
            array(
              'id'        => 'list_text_target',
              'type'      => 'switcher',
              'title'     => __('Open New Tab?', 'segovia'),
              'on_text'     => __('Yes', 'segovia'),
              'off_text'     => __('No', 'segovia'),
            ),

          ),

        ),
        // Address Styles

      ),
    );

  return $options;

  }
  add_filter( 'cs_shortcode_options', 'segovia_vt_shortcodes' );
}