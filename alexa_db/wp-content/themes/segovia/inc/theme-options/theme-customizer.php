<?php
/*
 * All customizer related options for Segovia theme.
 * Author & Copyright: VictorThemes
 * URL: https://victorthemes.com/wp-themes
 */

if( ! function_exists( 'segovia_vt_customizer' ) ) {
  function segovia_vt_customizer( $options ) {

	$options        = array(); // remove old options

	// Header Color
	$options[]      = array(
	  'name'        => 'header_color_section',
	  'title'       => esc_html__( '01. Header Colors', 'segovia' ),
	  'sections'    => array(

	  	array(
	      'name'          => 'normal_header_section',
	      'title'         => esc_html__( 'Normal Header', 'segovia' ),
	      'settings'      => array(

			    // Fields Start
					array(
						'name'          => 'header_main_menu_heading',
						'control'       => array(
							'type'        => 'cs_field',
							'options'     => array(
								'type'      => 'notice',
								'class'     => 'info',
								'content'   => esc_html__( 'Main Menu Colors', 'segovia' ),
							),
						),
					),
					array(
						'name'      => 'header_bg_color',
						'control'   => array(
							'type'  => 'color',
							'label' => esc_html__( 'Background Color', 'segovia' ),
						),
					),
					array(
						'name'      => 'header_border_color',
						'control'   => array(
							'type'  => 'color',
							'label' => esc_html__( 'Border Color', 'segovia' ),
						),
					),
					array(
						'name'      => 'header_link_color',
						'control'   => array(
							'type'  => 'color',
							'label' => esc_html__( 'Link Color', 'segovia' ),
						),
					),
					array(
						'name'      => 'header_link_hover_color',
						'control'   => array(
							'type'  => 'color',
							'label' => esc_html__( 'Link Hover Color', 'segovia' ),
						),
					),
					array(
						'name'      => 'header_link_hover_border_color',
						'control'   => array(
							'type'  => 'color',
							'label' => esc_html__( 'Menu Hover Border Color', 'segovia' ),
						),
					),

					// Sub Menu Color
					array(
						'name'          => 'header_submenu_heading',
						'control'       => array(
							'type'        => 'cs_field',
							'options'     => array(
								'type'      => 'notice',
								'class'     => 'info',
								'content'   => esc_html__( 'Sub-Menu Colors', 'segovia' ),
							),
						),
					),
					array(
						'name'      => 'submenu_bg_color',
						'control'   => array(
							'type'  => 'color',
							'label' => esc_html__( 'Background Color', 'segovia' ),
						),
					),
					array(
						'name'      => 'submenu_link_color',
						'control'   => array(
							'type'  => 'color',
							'label' => esc_html__( 'Link Color', 'segovia' ),
						),
					),
					array(
						'name'      => 'submenu_link_hover_color',
						'control'   => array(
							'type'  => 'color',
							'label' => esc_html__( 'Link Hover Color', 'segovia' ),
						),
					),

				)
    	),
    	array(
	      'name'          => 'light_transparent_header_section',
	      'title'         => esc_html__( 'Light Transparent Header', 'segovia' ),
	      'settings'      => array(
					array(
						'name'          => 'light_header_transparent_heading',
						'control'       => array(
							'type'        => 'cs_field',
							'options'     => array(
								'type'      => 'notice',
								'class'     => 'info',
								'content'   => esc_html__( 'Light Transparent Header Colors', 'segovia' ),
							),
						),
					),

					array(
						'name'      => 'light_trans_header_bg_color',
						'control'   => array(
							'type'  => 'color',
							'label' => esc_html__( 'Background Color', 'segovia' ),
						),
					),
					array(
						'name'      => 'light_trans_header_link_color',
						'control'   => array(
							'type'  => 'color',
							'label' => esc_html__( 'Link Color', 'segovia' ),
						),
					),
					array(
						'name'      => 'light_trans_header_link_hover_color',
						'control'   => array(
							'type'  => 'color',
							'label' => esc_html__( 'Link Hover Color', 'segovia' ),
						),
					),
					array(
						'name'      => 'light_trans_header_link_hover_border_color',
						'control'   => array(
							'type'  => 'color',
							'label' => esc_html__( 'Link Hover Border Color', 'segovia' ),
						),
					),
				)
			),
			array(
	      'name'          => 'light_trans_sticky_header_section',
	      'title'         => esc_html__( 'Light Transparent Header Sticky', 'segovia' ),
	      'settings'      => array(
	      	array(
						'name'          => 'header_light_trans_sticky_heading',
						'control'       => array(
							'type'        => 'cs_field',
							'options'     => array(
								'type'      => 'notice',
								'class'     => 'info',
								'content'   => esc_html__( 'Light Transparent Header Colors', 'segovia' ),
							),
						),
					),
					array(
						'name'      => 'light_trans_sticky_header_bg_color',
						'control'   => array(
							'type'  => 'color',
							'label' => esc_html__( 'Background Color', 'segovia' ),
						),
					),
					array(
						'name'      => 'light_trans_sticky_header_link_color',
						'control'   => array(
							'type'  => 'color',
							'label' => esc_html__( 'Link Color', 'segovia' ),
						),
					),
					array(
						'name'      => 'light_trans_sticky_header_link_hover_color',
						'control'   => array(
							'type'  => 'color',
							'label' => esc_html__( 'Link Hover Color', 'segovia' ),
						),
					),
					array(
						'name'      => 'light_trans_sticky_header_border_color',
						'control'   => array(
							'type'  => 'color',
							'label' => esc_html__( 'Hover Border Color', 'segovia' ),
						),
					),
				)
      ),

      array(
	      'name'          => 'dark_transparent_header_section',
	      'title'         => esc_html__( 'Dark Transparent Header', 'segovia' ),
	      'settings'      => array(
					array(
						'name'          => 'dark_header_transparent_heading',
						'control'       => array(
							'type'        => 'cs_field',
							'options'     => array(
								'type'      => 'notice',
								'class'     => 'info',
								'content'   => esc_html__( 'Dark Transparent Header Colors', 'segovia' ),
							),
						),
					),

					array(
						'name'      => 'dark_trans_header_bg_color',
						'control'   => array(
							'type'  => 'color',
							'label' => esc_html__( 'Background Color', 'segovia' ),
						),
					),
					array(
						'name'      => 'dark_trans_header_link_color',
						'control'   => array(
							'type'  => 'color',
							'label' => esc_html__( 'Link Color', 'segovia' ),
						),
					),
					array(
						'name'      => 'dark_trans_header_link_hover_color',
						'control'   => array(
							'type'  => 'color',
							'label' => esc_html__( 'Link Hover Color', 'segovia' ),
						),
					),
					array(
						'name'      => 'dark_trans_header_link_hover_border_color',
						'control'   => array(
							'type'  => 'color',
							'label' => esc_html__( 'Link Hover Border Color', 'segovia' ),
						),
					),
				)
			),

			// Dark Transparent Sticky
			array(
	      'name'          => 'dark_trans_sticky_header_section',
	      'title'         => esc_html__( 'Dark Transparent Header Sticky', 'segovia' ),
	      'settings'      => array(
	      	array(
						'name'          => 'header_dark_trans_sticky_heading',
						'control'       => array(
							'type'        => 'cs_field',
							'options'     => array(
								'type'      => 'notice',
								'class'     => 'info',
								'content'   => esc_html__( 'Dark Transparent Header Colors', 'segovia' ),
							),
						),
					),
					array(
						'name'      => 'dark_trans_sticky_header_bg_color',
						'control'   => array(
							'type'  => 'color',
							'label' => esc_html__( 'Background Color', 'segovia' ),
						),
					),
					array(
						'name'      => 'dark_trans_sticky_header_link_color',
						'control'   => array(
							'type'  => 'color',
							'label' => esc_html__( 'Link Color', 'segovia' ),
						),
					),
					array(
						'name'      => 'dark_trans_sticky_header_link_hover_color',
						'control'   => array(
							'type'  => 'color',
							'label' => esc_html__( 'Link Hover Color', 'segovia' ),
						),
					),
					array(
						'name'      => 'dark_trans_sticky_header_border_color',
						'control'   => array(
							'type'  => 'color',
							'label' => esc_html__( 'Hover Border Color', 'segovia' ),
						),
					),
				)
      ),

      array(
	      'name'          => 'mobile_menu_section',
	      'title'         => esc_html__( 'Mobile Menu', 'segovia' ),
	      'settings'      => array(
	      	array(
						'name'          => 'mobile_menu_heading',
						'control'       => array(
							'type'        => 'cs_field',
							'options'     => array(
								'type'      => 'notice',
								'class'     => 'info',
								'content'   => esc_html__( 'Mobile Menu Colors', 'segovia' ),
							),
						),
					),
					array(
						'name'      => 'mobile_menu_toggle_color',
						'control'   => array(
							'type'  => 'color',
							'label' => esc_html__( 'Menu Toggle Color', 'segovia' ),
						),
					),
					array(
						'name'      => 'mobile_menu_bg_color',
						'control'   => array(
							'type'  => 'color',
							'label' => esc_html__( 'Background Color', 'segovia' ),
						),
					),
					array(
						'name'      => 'mobile_menu_bg_hover_color',
						'control'   => array(
							'type'  => 'color',
							'label' => esc_html__( 'Background Hover Color', 'segovia' ),
						),
					),
					array(
						'name'      => 'mobile_menu_link_color',
						'control'   => array(
							'type'  => 'color',
							'label' => esc_html__( 'Link Color', 'segovia' ),
						),
					),
					array(
						'name'      => 'mobile_menu_link_hover_color',
						'control'   => array(
							'type'  => 'color',
							'label' => esc_html__( 'Link Hover Color', 'segovia' ),
						),
					),
					array(
						'name'      => 'mobile_menu_border_color',
						'control'   => array(
							'type'  => 'color',
							'label' => esc_html__( 'Border Color', 'segovia' ),
						),
					),
					array(
						'name'      => 'mobile_menu_expand_color',
						'control'   => array(
							'type'  => 'color',
							'label' => esc_html__( 'Menu Expand Color', 'segovia' ),
						),
					),
					array(
						'name'      => 'mobile_menu_expand_hover_color',
						'control'   => array(
							'type'  => 'color',
							'label' => esc_html__( 'Menu Expand Hover Color', 'segovia' ),
						),
					),
					array(
						'name'      => 'mobile_menu_expand_bg_color',
						'control'   => array(
							'type'  => 'color',
							'label' => esc_html__( 'Menu Expand Background Color', 'segovia' ),
						),
					),
					array(
						'name'      => 'mobile_menu_expand_bg_hover_color',
						'control'   => array(
							'type'  => 'color',
							'label' => esc_html__( 'Menu Expand Background Hover Color', 'segovia' ),
						),
					),
				)
      ),
	    // Fields End

	  )
	);
	// Header Color

	// Sidebar Menu Color
	$options[]      = array(
	  'name'        => 'sidemenu_section',
	  'title'       => esc_html__( '02. Side Menu Colors', 'segovia' ),
    'settings'      => array(

    	// Fields Start
    	array(
				'name'          => 'sidemenu_colors_heading',
				'control'       => array(
					'type'        => 'cs_field',
					'options'     => array(
						'type'      => 'notice',
						'class'     => 'info',
						'content'   => esc_html__( 'Side Menu Colors', 'segovia' ),
					),
				),
			),
    	array(
				'name'      => 'sidebar_bg_color',
				'control'   => array(
					'type'  => 'color',
					'label' => esc_html__( 'Background Color', 'segovia' ),
				),
			),
			array(
				'name'      => 'sidebar_text_color',
				'control'   => array(
					'type'  => 'color',
					'label' => esc_html__( 'Text Color', 'segovia' ),
				),
			),
			array(
				'name'      => 'sidebar_menu_border_color',
				'control'   => array(
					'type'  => 'color',
					'label' => esc_html__( 'Menu Border Color', 'segovia' ),
				),
			),
			array(
				'name'      => 'sidebar_link_color',
				'control'   => array(
					'type'  => 'color',
					'label' => esc_html__( 'Link Color', 'segovia' ),
				),
			),
			array(
				'name'      => 'sidebar_link_hover_color',
				'control'   => array(
					'type'  => 'color',
					'label' => esc_html__( 'Link Hover Color', 'segovia' ),
				),
			),

			array(
				'name'      => 'sidebar_submenu_link_color',
				'control'   => array(
					'type'  => 'color',
					'label' => esc_html__( 'Sub-Menu Link Color', 'segovia' ),
				),
			),
			array(
				'name'      => 'sidebar_submenu_link_hover_color',
				'control'   => array(
					'type'  => 'color',
					'label' => esc_html__( 'Sub-Menu Link Hover Color', 'segovia' ),
				),
			),
			array(
				'name'      => 'sidebar_submenu_arrow_color',
				'control'   => array(
					'type'  => 'color',
					'label' => esc_html__( 'Sub-Menu Link Arrow Color', 'segovia' ),
				),
			),
			array(
				'name'          => 'sidemenu_social_color',
				'control'       => array(
					'type'        => 'cs_field',
					'options'     => array(
						'type'      => 'notice',
						'class'     => 'info',
						'content'   => esc_html__( 'Social Icon Colors', 'segovia' ),
					),
				),
			),
			array(
				'name'      => 'sidebar_submenu_social_icon_color',
				'control'   => array(
					'type'  => 'color',
					'label' => esc_html__( 'Social Icon Color', 'segovia' ),
				),
			),
			array(
				'name'      => 'sidebar_submenu_social_icon_hover_color',
				'control'   => array(
					'type'  => 'color',
					'label' => esc_html__( 'Social Icon Hover Color', 'segovia' ),
				),
			),
	    // Fields End

	  )
	);
	// Sidebar Menu Color

	// Title Bar Color
	$options[]      = array(
	  'name'        => 'titlebar_section',
	  'title'       => esc_html__( '03. Title Bar Colors', 'segovia' ),
    'settings'      => array(

    	// Fields Start
    	array(
				'name'          => 'titlebar_colors_heading',
				'control'       => array(
					'type'        => 'cs_field',
					'options'     => array(
						'type'      => 'notice',
						'class'     => 'info',
						'content'   => esc_html__( 'This is common settings, if this settings not affect in your page. Please check your page metabox. You may set default settings there.', 'segovia' ),
					),
				),
			),
			array(
				'name'      => 'titlebar_bg_color',
				'control'   => array(
						'type'  => 'color',
						'label' => esc_html__( 'Background Color', 'segovia' ),
				),
			),
    	array(
				'name'      => 'titlebar_title_color',
				'control'   => array(
						'type'  => 'color',
						'label' => esc_html__( 'Title Color', 'segovia' ),
				),
			),

			array(
				'name'          => 'titlebar_breadcrumbs_heading',
				'control'       => array(
					'type'        => 'cs_field',
					'options'     => array(
						'type'      => 'notice',
						'class'     => 'info',
						'content'   => esc_html__( 'Breadcrumbs Colors', 'segovia' ),
					),
				),
			),
    	array(
				'name'      => 'breadcrumb_text_color',
				'control'   => array(
						'type'  => 'color',
						'label' => esc_html__( 'Text Color', 'segovia' ),
				),
			),
			array(
				'name'      => 'breadcrumb_link_color',
				'control'   => array(
						'type'  => 'color',
						'label' => esc_html__( 'Link Color', 'segovia' ),
				),
			),
			array(
				'name'      => 'breadcrumb_link_hover_color',
				'control'   => array(
						'type'  => 'color',
						'label' => esc_html__( 'Link Hover Color', 'segovia' ),
				),
			),
			array(
				'name'      => 'breadcrumb_bg_color',
				'control'   => array(
						'type'  => 'color',
						'label' => esc_html__( 'Background Color', 'segovia' ),
				),
			),
	    // Fields End

	  )
	);
	// Title Bar Color

	// Content Color
	$options[]      = array(
	  'name'        => 'content_section',
	  'title'       => esc_html__( '05. Content Colors', 'segovia' ),
	  'description' => esc_html__( 'This is all about content area text and heading colors.', 'segovia' ),
	  'sections'    => array(

	  	array(
	      'name'          => 'content_text_section',
	      'title'         => esc_html__( 'Content Text', 'segovia' ),
	      'settings'      => array(

			    // Fields Start
			    array(
						'name'      => 'body_color',
						'control'   => array(
								'type'  => 'color',
								'label' => esc_html__( 'Body & Content Color', 'segovia' ),
						),
					),
					array(
						'name'      => 'body_links_color',
						'control'   => array(
								'type'  => 'color',
								'label' => esc_html__( 'Body Links Color', 'segovia' ),
						),
					),
					array(
						'name'      => 'body_link_hover_color',
						'control'   => array(
								'type'  => 'color',
								'label' => esc_html__( 'Body Links Hover Color', 'segovia' ),
						),
					),
					array(
						'name'      => 'body_link_border_color',
						'control'   => array(
								'type'  => 'color',
								'label' => esc_html__( 'Body Links Border Color', 'segovia' ),
						),
					),
					array(
						'name'      => 'sidebar_content_color',
						'control'   => array(
								'type'  => 'color',
								'label' => esc_html__( 'Sidebar Content Color', 'segovia' ),
						),
					),
					array(
						'name'      => 'sidebar_links_color',
						'control'   => array(
								'type'  => 'color',
								'label' => esc_html__( 'Sidebar Link Color', 'segovia' ),
						),
					),
					array(
						'name'      => 'sidebar_links_hover_color',
						'control'   => array(
								'type'  => 'color',
								'label' => esc_html__( 'Sidebar Link Hover Color', 'segovia' ),
						),
					),
			    // Fields End
			  )
			),

			// Text Colors Section
			array(
	      'name'          => 'content_heading_section',
	      'title'         => esc_html__( 'Headings', 'segovia' ),
	      'settings'      => array(

	      	// Fields Start
					array(
						'name'      => 'content_heading_color',
						'control'   => array(
								'type'  => 'color',
								'label' => esc_html__( 'Content Heading Color', 'segovia' ),
						),
					),
	      	array(
						'name'      => 'sidebar_heading_color',
						'control'   => array(
								'type'  => 'color',
								'label' => esc_html__( 'Sidebar Heading Color', 'segovia' ),
						),
					),
			    // Fields End

      	)
      ),

	  )
	);
	// Content Color

	// Footer Color
	$options[]      = array(
	  'name'        => 'footer_section',
	  'title'       => esc_html__( '06. Footer Colors', 'segovia' ),
	  'description' => esc_html__( 'This is all about footer settings. Make sure you\'ve enabled your needed section at : Segovia > Theme Options > Footer ', 'segovia' ),
	  'sections'    => array(

			// Footer Widgets Block
	  	array(
	      'name'          => 'footer_widget_section',
	      'title'         => esc_html__( 'Widget Block', 'segovia' ),
	      'settings'      => array(

			    // Fields Start
					array(
			      'name'          => 'footer_widget_color_notice',
			      'control'       => array(
			        'type'        => 'cs_field',
			        'options'     => array(
			          'type'      => 'notice',
			          'class'     => 'info',
			          'content'   => esc_html__( 'Content Colors', 'segovia' ),
			        ),
			      ),
			    ),
					array(
						'name'      => 'footer_heading_color',
						'control'   => array(
								'type'  => 'color',
								'label' => esc_html__( 'Widget Heading Color', 'segovia' ),
						),
					),
					array(
						'name'      => 'footer_text_color',
						'control'   => array(
								'type'  => 'color',
								'label' => esc_html__( 'Widget Text Color', 'segovia' ),
						),
					),
					array(
						'name'      => 'footer_link_color',
						'control'   => array(
								'type'  => 'color',
								'label' => esc_html__( 'Widget Link Color', 'segovia' ),
						),
					),
					array(
						'name'      => 'footer_link_hover_color',
						'control'   => array(
								'type'  => 'color',
								'label' => esc_html__( 'Widget Link Hover Color', 'segovia' ),
						),
					),
					array(
						'name'      => 'footer_bg_color',
						'default'   => '#222327',
						'control'   => array(
								'type'  => 'color',
								'label' => esc_html__( 'Background Color', 'segovia' ),
						),
					),
			    // Fields End
			  )
			),
			// Footer Widgets Block

			// Footer Copyright Block
	  	array(
	      'name'          => 'footer_copyright_section',
	      'title'         => esc_html__( 'Copyright Block', 'segovia' ),
	      'settings'      => array(

			    // Fields Start
			    array(
			      'name'          => 'footer_copyright_active',
			      'control'       => array(
			        'type'        => 'cs_field',
			        'options'     => array(
			          'type'      => 'notice',
			          'class'     => 'info',
			          'content'   => esc_html__( 'Make sure you\'ve enabled copyright block in : <br /> <strong>Segovia > Theme Options > Footer > Copyright Bar : Enable Copyright Block</strong>', 'segovia' ),
			        ),
			      ),
			    ),
					array(
						'name'      => 'copyright_text_color',
						'control'   => array(
								'type'  => 'color',
								'label' => esc_html__( 'Text Color', 'segovia' ),
						),
					),
					array(
						'name'      => 'copyright_link_color',
						'control'   => array(
								'type'  => 'color',
								'label' => esc_html__( 'Link Color', 'segovia' ),
						),
					),
					array(
						'name'      => 'copyright_link_hover_color',
						'control'   => array(
								'type'  => 'color',
								'label' => esc_html__( 'Link Hover Color', 'segovia' ),
						),
					),
					array(
						'name'      => 'copyright_bg_color',
						'control'   => array(
								'type'  => 'color',
								'label' => esc_html__( 'Background Color', 'segovia' ),
						),
					),

			  )
			),
			// Footer Copyright Block

	  )
	);
	// Footer Color

	return $options;

  }
  add_filter( 'cs_customize_options', 'segovia_vt_customizer' );
}
