<?php
/**
 * Vcard CV Resume Theme Customizer
 *
 * @package Vcard CV Resume
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */

function vcard_cv_resume_custom_controls() {
	load_template( trailingslashit( get_template_directory() ) . '/inc/custom-controls.php' );
}
add_action( 'customize_register', 'vcard_cv_resume_custom_controls' );

function vcard_cv_resume_customize_register( $wp_customize ) {

	load_template( trailingslashit( get_template_directory() ) . '/inc/icon-picker.php' );

	$wp_customize->get_setting( 'blogname' )->transport = 'postMessage'; 
	$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial( 'blogname', array( 
		'selector' => '.logo .site-title a', 
	 	'render_callback' => 'vcard_cv_resume_Customize_partial_blogname',
	)); 

	$wp_customize->selective_refresh->add_partial( 'blogdescription', array( 
		'selector' => 'p.site-description', 
		'render_callback' => 'vcard_cv_resume_Customize_partial_blogdescription',
	));

	//Homepage Settings
	$wp_customize->add_panel( 'vcard_cv_resume_homepage_panel', array(
		'title' => esc_html__( 'Homepage Settings', 'vcard-cv-resume' ),
		'panel' => 'vcard_cv_resume_panel_id',
		'priority' => 20,
	));

	// Top Bar
	$wp_customize->add_section( 'vcard_cv_resume_top_bar' , array(
    	'title' => esc_html__( 'Top Bar', 'vcard-cv-resume' ),
		'panel' => 'vcard_cv_resume_homepage_panel'
	) );	

	$wp_customize->add_setting('vcard_cv_resume_topbar_btn_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vcard_cv_resume_topbar_btn_text',array(
		'label'	=> esc_html__('Add Button Text','vcard-cv-resume'),
		'input_attrs' => array(
            'placeholder' => esc_html__( 'Hire Me', 'vcard-cv-resume' ),
        ),
		'section'=> 'vcard_cv_resume_top_bar',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vcard_cv_resume_topbar_btn_link',array(
		'default'=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('vcard_cv_resume_topbar_btn_link',array(
		'label'	=> esc_html__('Add Button Link','vcard-cv-resume'),
		'input_attrs' => array(
            'placeholder' => esc_html__( 'www.example-info.com', 'vcard-cv-resume' ),
        ),
		'section'=> 'vcard_cv_resume_top_bar',
		'type'=> 'url'
	));

	//Menus Settings
	$wp_customize->add_section( 'vcard_cv_resume_menu_section' , array(
    	'title' => __( 'Menus Settings', 'vcard-cv-resume' ),
		'panel' => 'vcard_cv_resume_homepage_panel'
	) );

	$wp_customize->add_setting('vcard_cv_resume_navigation_menu_font_size',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vcard_cv_resume_navigation_menu_font_size',array(
		'label'	=> __('Menus Font Size','vcard-cv-resume'),
		'description'	=> __('Enter a value in pixels. Example:20px','vcard-cv-resume'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vcard-cv-resume' ),
        ),
		'section'=> 'vcard_cv_resume_menu_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vcard_cv_resume_navigation_menu_font_weight',array(
	    'default' => 'Default',
	    'transport' => 'refresh',
	    'sanitize_callback' => 'vcard_cv_resume_sanitize_choices'
	));
	$wp_customize->add_control('vcard_cv_resume_navigation_menu_font_weight',array(
	    'type' => 'select',
	    'label' => __('Menus Font Weight','vcard-cv-resume'),
	    'section' => 'vcard_cv_resume_menu_section',
	    'choices' => array(
	    	'Default' => __('Default','vcard-cv-resume'),
	        'Normal' => __('Normal','vcard-cv-resume')
        ),
	) );

	$wp_customize->add_setting('vcard_cv_resume_menus_item_style',array(
        'default' => '',
        'transport' => 'refresh',
        'sanitize_callback' => 'vcard_cv_resume_sanitize_choices'
	));
	$wp_customize->add_control('vcard_cv_resume_menus_item_style',array(
        'type' => 'select',
        'section' => 'vcard_cv_resume_menu_section',
		'label' => __('Menu Item Hover Style','vcard-cv-resume'),
		'choices' => array(
            'None' => __('None','vcard-cv-resume'),
            'Zoom In' => __('Zoom In','vcard-cv-resume'),
        ),
	) );

	$wp_customize->add_setting('vcard_cv_resume_header_menus_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'vcard_cv_resume_header_menus_color', array(
		'label'    => __('Menus Color', 'vcard-cv-resume'),
		'section'  => 'vcard_cv_resume_menu_section',
	)));

	$wp_customize->add_setting('vcard_cv_resume_header_menus_hover_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'vcard_cv_resume_header_menus_hover_color', array(
		'label'    => __('Menus Hover Color', 'vcard-cv-resume'),
		'section'  => 'vcard_cv_resume_menu_section',
	)));

	$wp_customize->add_setting('vcard_cv_resume_header_submenus_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'vcard_cv_resume_header_submenus_color', array(
		'label'    => __('Sub Menus Color', 'vcard-cv-resume'),
		'section'  => 'vcard_cv_resume_menu_section',
	)));

	$wp_customize->add_setting('vcard_cv_resume_header_submenus_hover_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'vcard_cv_resume_header_submenus_hover_color', array(
		'label'    => __('Sub Menus Hover Color', 'vcard-cv-resume'),
		'section'  => 'vcard_cv_resume_menu_section',
	)));

	//Social links
	$wp_customize->add_section(
		'vcard_cv_resume_social_links', array(
			'title'		=>	__('Social Links', 'vcard-cv-resume'),
			'priority'	=>	null,
			'panel'		=>	'vcard_cv_resume_homepage_panel'
		));

	$wp_customize->add_setting('vcard_cv_resume_social_icons',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vcard_cv_resume_social_icons',array(
		'label' =>  __('Steps to setup social icons','vcard-cv-resume'),
		'description' => __('<p>1. Go to Dashboard >> Appearance >> Widgets</p>
			<p>2. Add Vw Social Icon Widget in Social Media.</p>
			<p>3. Add social icons url and save.</p>','vcard-cv-resume'),
		'section'=> 'vcard_cv_resume_social_links',
		'type'=> 'hidden'
	));
	$wp_customize->add_setting('vcard_cv_resume_social_icon_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vcard_cv_resume_social_icon_btn',array(
		'description' => "<a target='_blank' href='". admin_url('widgets.php') ." '>Setup Social Icons</a>",
		'section'=> 'vcard_cv_resume_social_links',
		'type'=> 'hidden'
	));

	//Slider
	$wp_customize->add_section( 'vcard_cv_resume_slidersettings' , array(
    	'title' => esc_html__( 'Slider Settings', 'vcard-cv-resume' ),
    	'description' => __('Free theme has 3 slides options, For unlimited slides and more options </br> <a class="go-pro-btn" target="blank" href="https://www.vwthemes.com/themes/cv-resume-wordpress-theme/">GO PRO</a>','vcard-cv-resume'),
		'panel' => 'vcard_cv_resume_homepage_panel'
	) );

    //Selective Refresh
    $wp_customize->selective_refresh->add_partial('vcard_cv_resume_slider_arrows',array(
		'selector'        => '#slider .carousel-caption h1',
		'render_callback' => 'vcard_cv_resume_Customize_partial_vcard_cv_resume_slider_arrows',
	));

	$wp_customize->add_setting( 'vcard_cv_resume_slider_arrows',array(
    	'default' => 0,
      	'transport' => 'refresh',
      	'sanitize_callback' => 'vcard_cv_resume_switch_sanitization'
    ));  
    $wp_customize->add_control( new Vcard_CV_Resume_Toggle_Switch_Custom_Control( $wp_customize, 'vcard_cv_resume_slider_arrows',array(
      	'label' => esc_html__( 'Show / Hide Slider','vcard-cv-resume' ),
      	'section' => 'vcard_cv_resume_slidersettings'
    )));

    $wp_customize->add_setting('vcard_cv_resume_slider_type',array(
        'default' => 'Default slider',
        'sanitize_callback' => 'vcard_cv_resume_sanitize_choices'
	) );
	$wp_customize->add_control('vcard_cv_resume_slider_type', array(
        'type' => 'select',
        'label' => __('Slider Type','vcard-cv-resume'),
        'section' => 'vcard_cv_resume_slidersettings',
        'choices' => array(
            'Default slider' => __('Default slider','vcard-cv-resume'),
            'Advance slider' => __('Advance slider','vcard-cv-resume'),
        ),
	));

	$wp_customize->add_setting('vcard_cv_resume_advance_slider_shortcode',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vcard_cv_resume_advance_slider_shortcode',array(
		'label'	=> __('Add Slider Shortcode','vcard-cv-resume'),
		'section'=> 'vcard_cv_resume_slidersettings',
		'type'=> 'text',
		'active_callback' => 'vcard_cv_resume_advance_slider'
	));

	for ( $count = 1; $count <= 3; $count++ ) {
		$wp_customize->add_setting( 'vcard_cv_resume_slider_page' . $count, array(
			'default'  => '',
			'sanitize_callback' => 'vcard_cv_resume_sanitize_dropdown_pages'
		) );
		$wp_customize->add_control( 'vcard_cv_resume_slider_page' . $count, array(
			'label'    => esc_html__( 'Select Slider Page', 'vcard-cv-resume' ),
			'description' => esc_html__('Slider image size (650 x 650)','vcard-cv-resume'),
			'section'  => 'vcard_cv_resume_slidersettings',
			'type'     => 'dropdown-pages',
			'active_callback' => 'vcard_cv_resume_default_slider'
		) );
	}

	$wp_customize->add_setting( 'vcard_cv_resume_slider_title_hide_show',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vcard_cv_resume_switch_sanitization'
    ));  
    $wp_customize->add_control( new Vcard_CV_Resume_Toggle_Switch_Custom_Control( $wp_customize, 'vcard_cv_resume_slider_title_hide_show',array(
		'label' => esc_html__( 'Show / Hide Slider Title','vcard-cv-resume' ),
		'section' => 'vcard_cv_resume_slidersettings',
		'active_callback' => 'vcard_cv_resume_default_slider'
    )));

	$wp_customize->add_setting( 'vcard_cv_resume_slider_content_hide_show',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vcard_cv_resume_switch_sanitization'
    ));  
    $wp_customize->add_control( new Vcard_CV_Resume_Toggle_Switch_Custom_Control( $wp_customize, 'vcard_cv_resume_slider_content_hide_show',array(
		'label' => esc_html__( 'Show / Hide Slider Content','vcard-cv-resume' ),
		'section' => 'vcard_cv_resume_slidersettings',
		'active_callback' => 'vcard_cv_resume_default_slider'
    )));

    $wp_customize->add_setting( 'vcard_cv_resume_slider_excerpt_number', array(
		'default'              => 45,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vcard_cv_resume_sanitize_number_range',
		'sanitize_js_callback' => 'absint',
	) );
	$wp_customize->add_control( 'vcard_cv_resume_slider_excerpt_number', array(
		'label'       => esc_html__( 'Excerpt length','vcard-cv-resume' ),
		'section'     => 'vcard_cv_resume_slidersettings',
		'type'        => 'range',
		'settings'    => 'vcard_cv_resume_slider_excerpt_number',
		'input_attrs' => array(
			'step'             => 5,
			'min'              => 0,
			'max'              => 50,
		),'active_callback' => 'vcard_cv_resume_default_slider'
	) );

	$wp_customize->add_setting('vcard_cv_resume_slider_button_text',array(
		'default'=> esc_html__('Read More','vcard-cv-resume'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vcard_cv_resume_slider_button_text',array(
		'label'	=> esc_html__('Add Button Text','vcard-cv-resume'),
		'input_attrs' => array(
            'placeholder' => esc_html__( 'Read More', 'vcard-cv-resume' ),
        ),
		'section'=> 'vcard_cv_resume_slidersettings',
		'type'=> 'text',
		'active_callback' => 'vcard_cv_resume_default_slider'
	));

	//Slider height
	$wp_customize->add_setting('vcard_cv_resume_slider_height',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vcard_cv_resume_slider_height',array(
		'label'	=> __('Slider Height','vcard-cv-resume'),
		'description'	=> __('Specify the slider height (px).','vcard-cv-resume'),
		'input_attrs' => array(
            'placeholder' => __( '500px', 'vcard-cv-resume' ),
        ),
		'section'=> 'vcard_cv_resume_slidersettings',
		'type'=> 'text',
		'active_callback' => 'vcard_cv_resume_default_slider'
	));

	//Services
	$wp_customize->add_section('vcard_cv_resume_services',array(
		'title'	=> __('Services Section','vcard-cv-resume'),
		'description' => __('For more options of service section </br> <a class="go-pro-btn" target="blank" href="https://www.vwthemes.com/themes/cv-resume-wordpress-theme/">GO PRO</a>','vcard-cv-resume'),
		'panel' => 'vcard_cv_resume_homepage_panel',
	));

	$wp_customize->add_setting('vcard_cv_resume_services_heading',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('vcard_cv_resume_services_heading',array(
		'label'	=> esc_html__('Services Section Heading','vcard-cv-resume'),
		'input_attrs' => array(
            'placeholder' => esc_html__( 'Read My Own Blog', 'vcard-cv-resume' ),
        ),
		'section'=> 'vcard_cv_resume_services',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vcard_cv_resume_services_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vcard_cv_resume_services_text',array(
		'label'	=> esc_html__('Services Section Text','vcard-cv-resume'),
		'input_attrs' => array(
            'placeholder' => esc_html__( 'Lorem Ipsum has been the industry standard dummy text ever since the 1500s', 'vcard-cv-resume' ),
        ),
		'section'=> 'vcard_cv_resume_services',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vcard_cv_resume_services_viewbtn_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('vcard_cv_resume_services_viewbtn_text',array(
		'label'	=> esc_html__('Services Section Button Text','vcard-cv-resume'),
		'input_attrs' => array(
            'placeholder' => esc_html__( 'View All', 'vcard-cv-resume' ),
        ),
		'section'=> 'vcard_cv_resume_services',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vcard_cv_resume_services_viewbtn_link',array(
		'default'=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));	
	$wp_customize->add_control('vcard_cv_resume_services_viewbtn_link',array(
		'label'	=> esc_html__('Services Section Button Link','vcard-cv-resume'),
		'input_attrs' => array(
            'placeholder' => esc_html__( 'www.example12356.com', 'vcard-cv-resume' ),
        ),
		'section'=> 'vcard_cv_resume_services',
		'type'=> 'url'
	));

	$categories = get_categories();
		$cat_posts = array();
			$i = 0;
			$cat_posts[]='Select';
		foreach($categories as $category){
			if($i==0){
			$default = $category->slug;
			$i++;
		}
		$cat_posts[$category->slug] = $category->name;
	}

	$wp_customize->add_setting('vcard_cv_resume_services_category',array(
		'default'	=> 'select',
		'sanitize_callback' => 'vcard_cv_resume_sanitize_choices',
	));
	$wp_customize->add_control('vcard_cv_resume_services_category',array(
		'type'    => 'select',
		'choices' => $cat_posts,
		'label' => __('Select Category to display services','vcard-cv-resume'),
		'section' => 'vcard_cv_resume_services',
	));

	//About Section
	$wp_customize->add_section('vcard_cv_resume_about', array(
		'title'       => __('About Us Section', 'vcard-cv-resume'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','vcard-cv-resume'),
		'priority'    => null,
		'panel'       => 'vcard_cv_resume_homepage_panel',
	));

	$wp_customize->add_setting('vcard_cv_resume_about_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vcard_cv_resume_about_text',array(
		'description' => __('<p>1. More options for about us section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for about us section.</p>','vcard-cv-resume'),
		'section'=> 'vcard_cv_resume_about',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('vcard_cv_resume_about_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vcard_cv_resume_about_btn',array(
		'description' => "<a class='go-pro' target='_blank' href='". admin_url('themes.php?page=vcard_cv_resume_guide') ." '>More Info</a>",
		'section'=> 'vcard_cv_resume_about',
		'type'=> 'hidden'
	));

	//Features Skills Section
	$wp_customize->add_section('vcard_cv_resume_feature_skills', array(
		'title'       => __('Features Skills Section', 'vcard-cv-resume'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','vcard-cv-resume'),
		'priority'    => null,
		'panel'       => 'vcard_cv_resume_homepage_panel',
	));

	$wp_customize->add_setting('vcard_cv_resume_feature_skills_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vcard_cv_resume_feature_skills_text',array(
		'description' => __('<p>1. More options for Features Skills section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for Features Skills section.</p>','vcard-cv-resume'),
		'section'=> 'vcard_cv_resume_feature_skills',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('vcard_cv_resume_feature_skills_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vcard_cv_resume_feature_skills_btn',array(
		'description' => "<a class='go-pro' target='_blank' href='". admin_url('themes.php?page=vcard_cv_resume_guide') ." '>More Info</a>",
		'section'=> 'vcard_cv_resume_feature_skills',
		'type'=> 'hidden'
	));

	//Our Achievement Section
	$wp_customize->add_section('vcard_cv_resume_our_achievement', array(
		'title'       => __('Our Achievement Section', 'vcard-cv-resume'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','vcard-cv-resume'),
		'priority'    => null,
		'panel'       => 'vcard_cv_resume_homepage_panel',
	));

	$wp_customize->add_setting('vcard_cv_resume_our_achievement_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vcard_cv_resume_our_achievement_text',array(
		'description' => __('<p>1. More options for Our Achievement section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for Our Achievement section.</p>','vcard-cv-resume'),
		'section'=> 'vcard_cv_resume_our_achievement',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('vcard_cv_resume_our_achievement_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vcard_cv_resume_our_achievement_btn',array(
		'description' => "<a class='go-pro' target='_blank' href='". admin_url('themes.php?page=vcard_cv_resume_guide') ." '>More Info</a>",
		'section'=> 'vcard_cv_resume_our_achievement',
		'type'=> 'hidden'
	));

	//My Resume Section
	$wp_customize->add_section('vcard_cv_resume_my_resume', array(
		'title'       => __('My Resume Section', 'vcard-cv-resume'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','vcard-cv-resume'),
		'priority'    => null,
		'panel'       => 'vcard_cv_resume_homepage_panel',
	));

	$wp_customize->add_setting('vcard_cv_resume_my_resume_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vcard_cv_resume_my_resume_text',array(
		'description' => __('<p>1. More options for My Resume section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for My Resume section.</p>','vcard-cv-resume'),
		'section'=> 'vcard_cv_resume_my_resume',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('vcard_cv_resume_my_resume_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vcard_cv_resume_my_resume_btn',array(
		'description' => "<a class='go-pro' target='_blank' href='". admin_url('themes.php?page=vcard_cv_resume_guide') ." '>More Info</a>",
		'section'=> 'vcard_cv_resume_my_resume',
		'type'=> 'hidden'
	));

	//My Portfolio Section
	$wp_customize->add_section('vcard_cv_resume_my_portfolio', array(
		'title'       => __('My Portfolio Section', 'vcard-cv-resume'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','vcard-cv-resume'),
		'priority'    => null,
		'panel'       => 'vcard_cv_resume_homepage_panel',
	));

	$wp_customize->add_setting('vcard_cv_resume_my_portfolio_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vcard_cv_resume_my_portfolio_text',array(
		'description' => __('<p>1. More options for My Portfolio section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for My Portfolio section.</p>','vcard-cv-resume'),
		'section'=> 'vcard_cv_resume_my_portfolio',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('vcard_cv_resume_my_portfolio_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vcard_cv_resume_my_portfolio_btn',array(
		'description' => "<a class='go-pro' target='_blank' href='". admin_url('themes.php?page=vcard_cv_resume_guide') ." '>More Info</a>",
		'section'=> 'vcard_cv_resume_my_portfolio',
		'type'=> 'hidden'
	));

	//Freelance Available Section
	$wp_customize->add_section('vcard_cv_resume_freelance_available', array(
		'title'       => __('Freelance Available Section', 'vcard-cv-resume'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','vcard-cv-resume'),
		'priority'    => null,
		'panel'       => 'vcard_cv_resume_homepage_panel',
	));

	$wp_customize->add_setting('vcard_cv_resume_freelance_available_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vcard_cv_resume_freelance_available_text',array(
		'description' => __('<p>1. More options for Freelance Available section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for Freelance Available section.</p>','vcard-cv-resume'),
		'section'=> 'vcard_cv_resume_freelance_available',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('vcard_cv_resume_freelance_available_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vcard_cv_resume_freelance_available_btn',array(
		'description' => "<a class='go-pro' target='_blank' href='". admin_url('themes.php?page=vcard_cv_resume_guide') ." '>More Info</a>",
		'section'=> 'vcard_cv_resume_freelance_available',
		'type'=> 'hidden'
	));

	//Hire Me Section
	$wp_customize->add_section('vcard_cv_resume_hire_me', array(
		'title'       => __('Hire Me Section', 'vcard-cv-resume'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','vcard-cv-resume'),
		'priority'    => null,
		'panel'       => 'vcard_cv_resume_homepage_panel',
	));

	$wp_customize->add_setting('vcard_cv_resume_hire_me_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vcard_cv_resume_hire_me_text',array(
		'description' => __('<p>1. More options for Hire Me section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for Hire Me section.</p>','vcard-cv-resume'),
		'section'=> 'vcard_cv_resume_hire_me',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('vcard_cv_resume_hire_me_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vcard_cv_resume_hire_me_btn',array(
		'description' => "<a class='go-pro' target='_blank' href='". admin_url('themes.php?page=vcard_cv_resume_guide') ." '>More Info</a>",
		'section'=> 'vcard_cv_resume_hire_me',
		'type'=> 'hidden'
	));

	//Work Progress Section
	$wp_customize->add_section('vcard_cv_resume_work_progress', array(
		'title'       => __('Work Progress Section', 'vcard-cv-resume'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','vcard-cv-resume'),
		'priority'    => null,
		'panel'       => 'vcard_cv_resume_homepage_panel',
	));

	$wp_customize->add_setting('vcard_cv_resume_work_progress_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vcard_cv_resume_work_progress_text',array(
		'description' => __('<p>1. More options for Work Progress section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for Work Progress section.</p>','vcard-cv-resume'),
		'section'=> 'vcard_cv_resume_work_progress',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('vcard_cv_resume_work_progress_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vcard_cv_resume_work_progress_btn',array(
		'description' => "<a class='go-pro' target='_blank' href='". admin_url('themes.php?page=vcard_cv_resume_guide') ." '>More Info</a>",
		'section'=> 'vcard_cv_resume_work_progress',
		'type'=> 'hidden'
	));

	//My Blog Section
	$wp_customize->add_section('vcard_cv_resume_my_blog', array(
		'title'       => __('My Blog Section', 'vcard-cv-resume'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','vcard-cv-resume'),
		'priority'    => null,
		'panel'       => 'vcard_cv_resume_homepage_panel',
	));

	$wp_customize->add_setting('vcard_cv_resume_my_blog_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vcard_cv_resume_my_blog_text',array(
		'description' => __('<p>1. More options for My Blog section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for My Blog section.</p>','vcard-cv-resume'),
		'section'=> 'vcard_cv_resume_my_blog',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('vcard_cv_resume_my_blog_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vcard_cv_resume_my_blog_btn',array(
		'description' => "<a class='go-pro' target='_blank' href='". admin_url('themes.php?page=vcard_cv_resume_guide') ." '>More Info</a>",
		'section'=> 'vcard_cv_resume_my_blog',
		'type'=> 'hidden'
	));

	//Sponsor Section
	$wp_customize->add_section('vcard_cv_resume_sponsor', array(
		'title'       => __('Sponsor Section', 'vcard-cv-resume'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','vcard-cv-resume'),
		'priority'    => null,
		'panel'       => 'vcard_cv_resume_homepage_panel',
	));

	$wp_customize->add_setting('vcard_cv_resume_sponsor_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vcard_cv_resume_sponsor_text',array(
		'description' => __('<p>1. More options for Sponsor section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for Sponsor section.</p>','vcard-cv-resume'),
		'section'=> 'vcard_cv_resume_sponsor',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('vcard_cv_resume_sponsor_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vcard_cv_resume_sponsor_btn',array(
		'description' => "<a class='go-pro' target='_blank' href='". admin_url('themes.php?page=vcard_cv_resume_guide') ." '>More Info</a>",
		'section'=> 'vcard_cv_resume_sponsor',
		'type'=> 'hidden'
	));

	//Testimonial Section
	$wp_customize->add_section('vcard_cv_resume_testimonial', array(
		'title'       => __('Testimonial Section', 'vcard-cv-resume'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','vcard-cv-resume'),
		'priority'    => null,
		'panel'       => 'vcard_cv_resume_homepage_panel',
	));

	$wp_customize->add_setting('vcard_cv_resume_testimonial_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vcard_cv_resume_testimonial_text',array(
		'description' => __('<p>1. More options for Testimonial section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for Testimonial section.</p>','vcard-cv-resume'),
		'section'=> 'vcard_cv_resume_testimonial',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('vcard_cv_resume_testimonial_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vcard_cv_resume_testimonial_btn',array(
		'description' => "<a class='go-pro' target='_blank' href='". admin_url('themes.php?page=vcard_cv_resume_guide') ." '>More Info</a>",
		'section'=> 'vcard_cv_resume_testimonial',
		'type'=> 'hidden'
	));

	//Footer Text
	$wp_customize->add_section('vcard_cv_resume_footer',array(
		'title'	=> esc_html__('Footer Settings','vcard-cv-resume'),
		'description' => __('For more options of footer section </br> <a class="go-pro-btn" target="blank" href="https://www.vwthemes.com/themes/cv-resume-wordpress-theme/">GO PRO</a>','vcard-cv-resume'),
		'panel' => 'vcard_cv_resume_homepage_panel',
	));	

	$wp_customize->add_setting('vcard_cv_resume_footer_background_color', array(
		'default'           => '#111111',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'vcard_cv_resume_footer_background_color', array(
		'label'    => __('Footer Background Color', 'vcard-cv-resume'),
		'section'  => 'vcard_cv_resume_footer',
	)));

	$wp_customize->add_setting('vcard_cv_resume_footer_background_image',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw',
	));
	$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'vcard_cv_resume_footer_background_image',array(
        'label' => __('Footer Background Image','vcard-cv-resume'),
        'section' => 'vcard_cv_resume_footer'
	)));

	$wp_customize->add_setting('vcard_cv_resume_footer_widgets_heading',array(
        'default' => 'Left',
        'transport' => 'refresh',
        'sanitize_callback' => 'vcard_cv_resume_sanitize_choices'
	));
	$wp_customize->add_control('vcard_cv_resume_footer_widgets_heading',array(
        'type' => 'select',
        'label' => __('Footer Widget Heading','vcard-cv-resume'),
        'section' => 'vcard_cv_resume_footer',
        'choices' => array(
        	'Left' => __('Left','vcard-cv-resume'),
            'Center' => __('Center','vcard-cv-resume'),
            'Right' => __('Right','vcard-cv-resume')
        ),
	) );

	$wp_customize->add_setting('vcard_cv_resume_footer_widgets_content',array(
        'default' => 'Left',
        'transport' => 'refresh',
        'sanitize_callback' => 'vcard_cv_resume_sanitize_choices'
	));
	$wp_customize->add_control('vcard_cv_resume_footer_widgets_content',array(
        'type' => 'select',
        'label' => __('Footer Widget Content','vcard-cv-resume'),
        'section' => 'vcard_cv_resume_footer',
        'choices' => array(
        	'Left' => __('Left','vcard-cv-resume'),
            'Center' => __('Center','vcard-cv-resume'),
            'Right' => __('Right','vcard-cv-resume')
        ),
	) );

	// footer padding
	$wp_customize->add_setting('vcard_cv_resume_footer_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vcard_cv_resume_footer_padding',array(
		'label'	=> __('Footer Top Bottom Padding','vcard-cv-resume'),
		'description'	=> __('Enter a value in pixels. Example:20px','vcard-cv-resume'),
		'input_attrs' => array(
      'placeholder' => __( '10px', 'vcard-cv-resume' ),
    ),
		'section'=> 'vcard_cv_resume_footer',
		'type'=> 'text'
	));

    // footer social icon
  	$wp_customize->add_setting( 'vcard_cv_resume_footer_icon',array(
		'default' => false,
		'transport' => 'refresh',
		'sanitize_callback' => 'vcard_cv_resume_switch_sanitization'
    ) );
  	$wp_customize->add_control( new Vcard_CV_Resume_Toggle_Switch_Custom_Control( $wp_customize, 'vcard_cv_resume_footer_icon',array(
		'label' => esc_html__( 'Footer Social Icon','vcard-cv-resume' ),
		'section' => 'vcard_cv_resume_footer'
    ))); 

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial('vcard_cv_resume_footer_text', array( 
		'selector' => '.copyright p', 
		'render_callback' => 'vcard_cv_resume_Customize_partial_vcard_cv_resume_footer_text', 
	));
	
	$wp_customize->add_setting('vcard_cv_resume_footer_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('vcard_cv_resume_footer_text',array(
		'label'	=> esc_html__('Copyright Text','vcard-cv-resume'),
		'input_attrs' => array(
            'placeholder' => esc_html__( 'Copyright 2020, .....', 'vcard-cv-resume' ),
        ),
		'section'=> 'vcard_cv_resume_footer',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vcard_cv_resume_copyright_font_size',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vcard_cv_resume_copyright_font_size',array(
		'label'	=> __('Copyright Font Size','vcard-cv-resume'),
		'description'	=> __('Enter a value in pixels. Example:20px','vcard-cv-resume'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vcard-cv-resume' ),
        ),
		'section'=> 'vcard_cv_resume_footer',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vcard_cv_resume_copyright_alingment',array(
        'default' => 'center',
        'sanitize_callback' => 'vcard_cv_resume_sanitize_choices'
	));
	$wp_customize->add_control(new Vcard_CV_Resume_Image_Radio_Control($wp_customize, 'vcard_cv_resume_copyright_alingment', array(
        'type' => 'select',
        'label' => esc_html__('Copyright Alignment','vcard-cv-resume'),
        'section' => 'vcard_cv_resume_footer',
        'settings' => 'vcard_cv_resume_copyright_alingment',
        'choices' => array(
            'left' => esc_url(get_template_directory_uri()).'/assets/images/copyright1.png',
            'center' => esc_url(get_template_directory_uri()).'/assets/images/copyright2.png',
            'right' => esc_url(get_template_directory_uri()).'/assets/images/copyright3.png'
    ))));

    $wp_customize->add_setting( 'vcard_cv_resume_hide_show_scroll',array(
    	'default' => 1,
      	'transport' => 'refresh',
      	'sanitize_callback' => 'vcard_cv_resume_switch_sanitization'
    ));  
    $wp_customize->add_control( new Vcard_CV_Resume_Toggle_Switch_Custom_Control( $wp_customize, 'vcard_cv_resume_hide_show_scroll',array(
      	'label' => esc_html__( 'Show / Hide Scroll to Top','vcard-cv-resume' ),
      	'section' => 'vcard_cv_resume_footer'
    )));

     //Selective Refresh
	$wp_customize->selective_refresh->add_partial('vcard_cv_resume_scroll_to_top_icon', array( 
		'selector' => '.scrollup i', 
		'render_callback' => 'vcard_cv_resume_Customize_partial_vcard_cv_resume_scroll_to_top_icon', 
	));

    $wp_customize->add_setting('vcard_cv_resume_scroll_top_alignment',array(
        'default' => 'Right',
        'sanitize_callback' => 'vcard_cv_resume_sanitize_choices'
	));
	$wp_customize->add_control(new Vcard_CV_Resume_Image_Radio_Control($wp_customize, 'vcard_cv_resume_scroll_top_alignment', array(
        'type' => 'select',
        'label' => esc_html__('Scroll To Top','vcard-cv-resume'),
        'section' => 'vcard_cv_resume_footer',
        'settings' => 'vcard_cv_resume_scroll_top_alignment',
        'choices' => array(
            'Left' => esc_url(get_template_directory_uri()).'/assets/images/layout1.png',
            'Center' => esc_url(get_template_directory_uri()).'/assets/images/layout2.png',
            'Right' => esc_url(get_template_directory_uri()).'/assets/images/layout3.png'
    ))));

	//Blog Post Settings
	$wp_customize->add_panel( 'vcard_cv_resume_blog_post_parent_panel', array(
		'title' => esc_html__( 'Blog Post Settings', 'vcard-cv-resume' ),
		'panel' => 'vcard_cv_resume_panel_id',
		'priority' => 20,
	));

	// Add example section and controls to the middle (second) panel
	$wp_customize->add_section( 'vcard_cv_resume_post_settings', array(
		'title' => esc_html__( 'Post Settings', 'vcard-cv-resume' ),
		'panel' => 'vcard_cv_resume_blog_post_parent_panel',
	));

	//Blog layout
    $wp_customize->add_setting('vcard_cv_resume_blog_layout_option',array(
        'default' => 'Default',
        'sanitize_callback' => 'vcard_cv_resume_sanitize_choices'
    ));
    $wp_customize->add_control(new Vcard_CV_Resume_Image_Radio_Control($wp_customize, 'vcard_cv_resume_blog_layout_option', array(
        'type' => 'select',
        'label' => __('Blog Post Layouts','vcard-cv-resume'),
        'section' => 'vcard_cv_resume_post_settings',
        'choices' => array(
            'Default' => esc_url(get_template_directory_uri()).'/assets/images/blog-layout1.png',
            'Center' => esc_url(get_template_directory_uri()).'/assets/images/blog-layout2.png',
            'Left' => esc_url(get_template_directory_uri()).'/assets/images/blog-layout3.png',
    ))));

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial('vcard_cv_resume_toggle_postdate', array( 
		'selector' => '.post-main-box h2 a', 
		'render_callback' => 'vcard_cv_resume_Customize_partial_vcard_cv_resume_toggle_postdate', 
	));

  	$wp_customize->add_setting('vcard_cv_resume_toggle_postdate_icon',array(
		'default'	=> 'fas fa-calendar-alt',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new vcard_cv_resume_Fontawesome_Icon_Chooser(
        $wp_customize,'vcard_cv_resume_toggle_postdate_icon',array(
		'label'	=> __('Add Post Date Icon','vcard-cv-resume'),
		'transport' => 'refresh',
		'section'	=> 'vcard_cv_resume_post_settings',
		'setting'	=> 'vcard_cv_resume_toggle_postdate_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting( 'vcard_cv_resume_toggle_postdate',array(
        'default' => 1,
        'transport' => 'refresh',
        'sanitize_callback' => 'vcard_cv_resume_switch_sanitization'
    ) );
    $wp_customize->add_control( new Vcard_CV_Resume_Toggle_Switch_Custom_Control( $wp_customize, 'vcard_cv_resume_toggle_postdate',array(
        'label' => esc_html__( 'Post Date','vcard-cv-resume' ),
        'section' => 'vcard_cv_resume_post_settings'
    )));

	$wp_customize->add_setting('vcard_cv_resume_toggle_author_icon',array(
		'default'	=> 'fas fa-user',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new vcard_cv_resume_Fontawesome_Icon_Chooser(
        $wp_customize,'vcard_cv_resume_toggle_author_icon',array(
		'label'	=> __('Add Author Icon','vcard-cv-resume'),
		'transport' => 'refresh',
		'section'	=> 'vcard_cv_resume_post_settings',
		'setting'	=> 'vcard_cv_resume_toggle_author_icon',
		'type'		=> 'icon'
	)));

    $wp_customize->add_setting( 'vcard_cv_resume_toggle_author',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vcard_cv_resume_switch_sanitization'
    ) );
    $wp_customize->add_control( new Vcard_CV_Resume_Toggle_Switch_Custom_Control( $wp_customize, 'vcard_cv_resume_toggle_author',array(
		'label' => esc_html__( 'Author','vcard-cv-resume' ),
		'section' => 'vcard_cv_resume_post_settings'
    )));

    $wp_customize->add_setting('vcard_cv_resume_toggle_comments_icon',array(
		'default'	=> 'fa fa-comments',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new vcard_cv_resume_Fontawesome_Icon_Chooser(
        $wp_customize,'vcard_cv_resume_toggle_comments_icon',array(
		'label'	=> __('Add Comments Icon','vcard-cv-resume'),
		'transport' => 'refresh',
		'section'	=> 'vcard_cv_resume_post_settings',
		'setting'	=> 'vcard_cv_resume_toggle_comments_icon',
		'type'		=> 'icon'
	)));

    $wp_customize->add_setting( 'vcard_cv_resume_toggle_comments',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vcard_cv_resume_switch_sanitization'
    ) );
    $wp_customize->add_control( new Vcard_CV_Resume_Toggle_Switch_Custom_Control( $wp_customize, 'vcard_cv_resume_toggle_comments',array(
		'label' => esc_html__( 'Comments','vcard-cv-resume' ),
		'section' => 'vcard_cv_resume_post_settings'
    )));

  	$wp_customize->add_setting('vcard_cv_resume_toggle_time_icon',array(
		'default'	=> 'fas fa-clock',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new vcard_cv_resume_Fontawesome_Icon_Chooser(
        $wp_customize,'vcard_cv_resume_toggle_time_icon',array(
		'label'	=> __('Add Time Icon','vcard-cv-resume'),
		'transport' => 'refresh',
		'section'	=> 'vcard_cv_resume_post_settings',
		'setting'	=> 'vcard_cv_resume_toggle_time_icon',
		'type'		=> 'icon'
	)));

    $wp_customize->add_setting( 'vcard_cv_resume_toggle_time',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vcard_cv_resume_switch_sanitization'
    ) );
    $wp_customize->add_control( new Vcard_CV_Resume_Toggle_Switch_Custom_Control( $wp_customize, 'vcard_cv_resume_toggle_time',array(
		'label' => esc_html__( 'Time','vcard-cv-resume' ),
		'section' => 'vcard_cv_resume_post_settings'
    )));

    $wp_customize->add_setting( 'vcard_cv_resume_featured_image_hide_show',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vcard_cv_resume_switch_sanitization'
	));
    $wp_customize->add_control( new Vcard_CV_Resume_Toggle_Switch_Custom_Control( $wp_customize, 'vcard_cv_resume_featured_image_hide_show', array(
		'label' => esc_html__( 'Featured Image','vcard-cv-resume' ),
		'section' => 'vcard_cv_resume_post_settings'
    )));

    $wp_customize->add_setting( 'vcard_cv_resume_featured_image_border_radius', array(
		'default'              => '0',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vcard_cv_resume_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vcard_cv_resume_featured_image_border_radius', array(
		'label'       => esc_html__( 'Featured Image Border Radius','vcard-cv-resume' ),
		'section'     => 'vcard_cv_resume_post_settings',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting( 'vcard_cv_resume_featured_image_box_shadow', array(
		'default'              => '0',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vcard_cv_resume_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vcard_cv_resume_featured_image_box_shadow', array(
		'label'       => esc_html__( 'Featured Image Box Shadow','vcard-cv-resume' ),
		'section'     => 'vcard_cv_resume_post_settings',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	//Featured Image
	$wp_customize->add_setting('vcard_cv_resume_blog_post_featured_image_dimension',array(
       'default' => 'default',
       'sanitize_callback'	=> 'vcard_cv_resume_sanitize_choices'
	));
  	$wp_customize->add_control('vcard_cv_resume_blog_post_featured_image_dimension',array(
		'type' => 'select',
		'label'	=> __('Blog Post Featured Image Dimension','vcard-cv-resume'),
		'section'	=> 'vcard_cv_resume_post_settings',
		'choices' => array(
		'default' => __('Default','vcard-cv-resume'),
		'custom' => __('Custom Image Size','vcard-cv-resume'),
      ),
  	));

	$wp_customize->add_setting('vcard_cv_resume_blog_post_featured_image_custom_width',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
		));
	$wp_customize->add_control('vcard_cv_resume_blog_post_featured_image_custom_width',array(
		'label'	=> __('Featured Image Custom Width','vcard-cv-resume'),
		'description'	=> __('Enter a value in pixels. Example:20px','vcard-cv-resume'),
		'input_attrs' => array(
    	'placeholder' => __( '10px', 'vcard-cv-resume' ),),
		'section'=> 'vcard_cv_resume_post_settings',
		'type'=> 'text',
		'active_callback' => 'vcard_cv_resume_blog_post_featured_image_dimension'
		));

	$wp_customize->add_setting('vcard_cv_resume_blog_post_featured_image_custom_height',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vcard_cv_resume_blog_post_featured_image_custom_height',array(
		'label'	=> __('Featured Image Custom Height','vcard-cv-resume'),
		'description'	=> __('Enter a value in pixels. Example:20px','vcard-cv-resume'),
		'input_attrs' => array(
    	'placeholder' => __( '10px', 'vcard-cv-resume' ),),
		'section'=> 'vcard_cv_resume_post_settings',
		'type'=> 'text',
		'active_callback' => 'vcard_cv_resume_blog_post_featured_image_dimension'
	));

    $wp_customize->add_setting( 'vcard_cv_resume_toggle_tags',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vcard_cv_resume_switch_sanitization'
	));
    $wp_customize->add_control( new Vcard_CV_Resume_Toggle_Switch_Custom_Control( $wp_customize, 'vcard_cv_resume_toggle_tags', array(
		'label' => esc_html__( 'Tags','vcard-cv-resume' ),
		'section' => 'vcard_cv_resume_post_settings'
    )));

    $wp_customize->add_setting( 'vcard_cv_resume_excerpt_number', array(
		'default'              => 30,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vcard_cv_resume_sanitize_number_range',
		'sanitize_js_callback' => 'absint',
	) );
	$wp_customize->add_control( 'vcard_cv_resume_excerpt_number', array(
		'label'       => esc_html__( 'Excerpt length','vcard-cv-resume' ),
		'section'     => 'vcard_cv_resume_post_settings',
		'type'        => 'range',
		'settings'    => 'vcard_cv_resume_excerpt_number',
		'input_attrs' => array(
			'step'             => 5,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting('vcard_cv_resume_meta_field_separator',array(
		'default'=> '|',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vcard_cv_resume_meta_field_separator',array(
		'label'	=> __('Add Meta Separator','vcard-cv-resume'),
		'description' => __('Add the seperator for meta box. Example: "|", "/", etc.','vcard-cv-resume'),
		'section'=> 'vcard_cv_resume_post_settings',
		'type'=> 'text'
	));

    $wp_customize->add_setting('vcard_cv_resume_excerpt_settings',array(
        'default' => 'Excerpt',
        'transport' => 'refresh',
        'sanitize_callback' => 'vcard_cv_resume_sanitize_choices'
	));
	$wp_customize->add_control('vcard_cv_resume_excerpt_settings',array(
        'type' => 'select',
        'label' => esc_html__('Post Content','vcard-cv-resume'),
        'section' => 'vcard_cv_resume_post_settings',
        'choices' => array(
        	'Content' => esc_html__('Content','vcard-cv-resume'),
            'Excerpt' => esc_html__('Excerpt','vcard-cv-resume'),
            'No Content' => esc_html__('No Content','vcard-cv-resume')
        ),
	) );

   	$wp_customize->add_setting('vcard_cv_resume_blog_page_posts_settings',array(
        'default' => 'Into Blocks',
        'transport' => 'refresh',
        'sanitize_callback' => 'vcard_cv_resume_sanitize_choices'
	));
	$wp_customize->add_control('vcard_cv_resume_blog_page_posts_settings',array(
        'type' => 'select',
        'label' => __('Display Blog Page posts','vcard-cv-resume'),
        'section' => 'vcard_cv_resume_post_settings',
        'choices' => array(
        	'Into Blocks' => __('Into Blocks','vcard-cv-resume'),
            'Without Blocks' => __('Without Blocks','vcard-cv-resume')
        ),
	) );

    // Button Settings
	$wp_customize->add_section( 'vcard_cv_resume_button_settings', array(
		'title' => esc_html__( 'Button Settings', 'vcard-cv-resume' ),
		'panel' => 'vcard_cv_resume_blog_post_parent_panel',
	));

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial('vcard_cv_resume_button_text', array( 
		'selector' => '.post-main-box .more-btn a', 
		'render_callback' => 'vcard_cv_resume_Customize_partial_vcard_cv_resume_button_text', 
	));

    $wp_customize->add_setting('vcard_cv_resume_button_text',array(
		'default'=> esc_html__('Read More','vcard-cv-resume'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vcard_cv_resume_button_text',array(
		'label'	=> esc_html__('Add Button Text','vcard-cv-resume'),
		'input_attrs' => array(
            'placeholder' => esc_html__( 'Read More', 'vcard-cv-resume' ),
        ),
		'section'=> 'vcard_cv_resume_button_settings',
		'type'=> 'text'
	));

	// font size button
	$wp_customize->add_setting('vcard_cv_resume_button_font_size',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vcard_cv_resume_button_font_size',array(
		'label'	=> __('Button Font Size','vcard-cv-resume'),
		'description'	=> __('Enter a value in pixels. Example:20px','vcard-cv-resume'),
		'input_attrs' => array(
      	'placeholder' => __( '10px', 'vcard-cv-resume' ),
    ),
    	'type'        => 'text',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
		'section'=> 'vcard_cv_resume_button_settings',
	));

	$wp_customize->add_setting( 'vcard_cv_resume_button_border_radius', array(
		'default'              => 5,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vcard_cv_resume_sanitize_number_range',
		'sanitize_js_callback' => 'absint',
	) );
	$wp_customize->add_control( 'vcard_cv_resume_button_border_radius', array(
		'label'       => esc_html__( 'Button Border Radius','vcard-cv-resume' ),
		'section'     => 'vcard_cv_resume_button_settings',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting('vcard_cv_resume_button_letter_spacing',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vcard_cv_resume_button_letter_spacing',array(
		'label'	=> __('Button Letter Spacing','vcard-cv-resume'),
		'description'	=> __('Enter a value in pixels. Example:20px','vcard-cv-resume'),
		'input_attrs' => array(
      	'placeholder' => __( '10px', 'vcard-cv-resume' ),
    ),
    	'type'        => 'text',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
		'section'=> 'vcard_cv_resume_button_settings',
	));

	$wp_customize->add_setting('vcard_cv_resume_button_padding_top_bottom',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vcard_cv_resume_button_padding_top_bottom',array(
		'label'	=> __('Padding Top Bottom','vcard-cv-resume'),
		'description'	=> __('Enter a value in pixels. Example:20px','vcard-cv-resume'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vcard-cv-resume' ),
        ),
		'section'=> 'vcard_cv_resume_button_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vcard_cv_resume_button_padding_left_right',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vcard_cv_resume_button_padding_left_right',array(
		'label'	=> __('Padding Left Right','vcard-cv-resume'),
		'description'	=> __('Enter a value in pixels. Example:20px','vcard-cv-resume'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vcard-cv-resume' ),
        ),
		'section'=> 'vcard_cv_resume_button_settings',
		'type'=> 'text'
	));

	// text trasform
	$wp_customize->add_setting('vcard_cv_resume_button_text_transform',array(
		'default'=> 'Uppercase',
		'sanitize_callback'	=> 'vcard_cv_resume_sanitize_choices'
	));
	$wp_customize->add_control('vcard_cv_resume_button_text_transform',array(
		'type' => 'radio',
		'label'	=> __('Button Text Transform','vcard-cv-resume'),
		'choices' => array(
            'Uppercase' => __('Uppercase','vcard-cv-resume'),
            'Capitalize' => __('Capitalize','vcard-cv-resume'),
            'Lowercase' => __('Lowercase','vcard-cv-resume'),
        ),
		'section'=> 'vcard_cv_resume_button_settings',
	));

	// Related Post Settings
	$wp_customize->add_section( 'vcard_cv_resume_related_posts_settings', array(
		'title' => esc_html__( 'Related Posts Settings', 'vcard-cv-resume' ),
		'panel' => 'vcard_cv_resume_blog_post_parent_panel',
	));

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial('vcard_cv_resume_related_post_title', array( 
		'selector' => '.related-post h3', 
		'render_callback' => 'vcard_cv_resume_Customize_partial_vcard_cv_resume_related_post_title', 
	));

    $wp_customize->add_setting( 'vcard_cv_resume_related_post',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vcard_cv_resume_switch_sanitization'
    ) );
    $wp_customize->add_control( new Vcard_CV_Resume_Toggle_Switch_Custom_Control( $wp_customize, 'vcard_cv_resume_related_post',array(
		'label' => esc_html__( 'Related Post','vcard-cv-resume' ),
		'section' => 'vcard_cv_resume_related_posts_settings'
    )));

    $wp_customize->add_setting('vcard_cv_resume_related_post_title',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vcard_cv_resume_related_post_title',array(
		'label'	=> esc_html__('Add Related Post Title','vcard-cv-resume'),
		'input_attrs' => array(
            'placeholder' => esc_html__( 'Related Post', 'vcard-cv-resume' ),
        ),
		'section'=> 'vcard_cv_resume_related_posts_settings',
		'type'=> 'text'
	));

   	$wp_customize->add_setting('vcard_cv_resume_related_posts_count',array(
		'default'=> 3,
		'sanitize_callback'	=> 'vcard_cv_resume_sanitize_number_absint'
	));
	$wp_customize->add_control('vcard_cv_resume_related_posts_count',array(
		'label'	=> esc_html__('Add Related Post Count','vcard-cv-resume'),
		'input_attrs' => array(
            'placeholder' => esc_html__( '3', 'vcard-cv-resume' ),
        ),
		'section'=> 'vcard_cv_resume_related_posts_settings',
		'type'=> 'number'
	));

	$wp_customize->add_setting( 'vcard_cv_resume_related_posts_excerpt_number', array(
		'default'              => 20,
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vcard_cv_resume_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vcard_cv_resume_related_posts_excerpt_number', array(
		'label'       => esc_html__( 'Related Posts Excerpt length','vcard-cv-resume' ),
		'section'     => 'vcard_cv_resume_related_posts_settings',
		'type'        => 'range',
		'settings'    => 'vcard_cv_resume_related_posts_excerpt_number',
		'input_attrs' => array(
			'step'             => 5,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	// Single Posts Settings
	$wp_customize->add_section( 'vcard_cv_resume_single_blog_settings', array(
		'title' => __( 'Single Post Settings', 'vcard-cv-resume' ),
		'panel' => 'vcard_cv_resume_blog_post_parent_panel',
	));

	$wp_customize->add_setting( 'vcard_cv_resume_single_postdate',array(
	    'default' => 1,
	    'transport' => 'refresh',
	    'sanitize_callback' => 'vcard_cv_resume_switch_sanitization'
	) );
	$wp_customize->add_control( new Vcard_CV_Resume_Toggle_Switch_Custom_Control( $wp_customize, 'vcard_cv_resume_single_postdate',array(
	    'label' => esc_html__( 'Date','vcard-cv-resume' ),
	   'section' => 'vcard_cv_resume_single_blog_settings'
	)));

    $wp_customize->add_setting( 'vcard_cv_resume_single_author',array(
	    'default' => 1,
	    'transport' => 'refresh',
	    'sanitize_callback' => 'vcard_cv_resume_switch_sanitization'
	) );
	$wp_customize->add_control( new Vcard_CV_Resume_Toggle_Switch_Custom_Control( $wp_customize, 'vcard_cv_resume_single_author',array(
	    'label' => esc_html__( 'Author','vcard-cv-resume' ),
	    'section' => 'vcard_cv_resume_single_blog_settings'
	)));

	$wp_customize->add_setting( 'vcard_cv_resume_single_comments',array(
	    'default' => 1,
	    'transport' => 'refresh',
	    'sanitize_callback' => 'vcard_cv_resume_switch_sanitization'
	) );
	$wp_customize->add_control( new Vcard_CV_Resume_Toggle_Switch_Custom_Control( $wp_customize, 'vcard_cv_resume_single_comments',array(
	    'label' => esc_html__( 'Comments','vcard-cv-resume' ),
	    'section' => 'vcard_cv_resume_single_blog_settings'
	)));

	$wp_customize->add_setting( 'vcard_cv_resume_single_time',array(
	    'default' => 1,
	    'transport' => 'refresh',
	    'sanitize_callback' => 'vcard_cv_resume_switch_sanitization'
	) );

	$wp_customize->add_control( new Vcard_CV_Resume_Toggle_Switch_Custom_Control( $wp_customize, 'vcard_cv_resume_single_time',array(
	    'label' => esc_html__( 'Time','vcard-cv-resume' ),
	    'section' => 'vcard_cv_resume_single_blog_settings'
	)));

	$wp_customize->add_setting( 'vcard_cv_resume_single_post_breadcrumb',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vcard_cv_resume_switch_sanitization'
    ) );
    $wp_customize->add_control( new Vcard_CV_Resume_Toggle_Switch_Custom_Control( $wp_customize, 'vcard_cv_resume_single_post_breadcrumb',array(
		'label' => esc_html__( 'Single Post Breadcrumb','vcard-cv-resume' ),
		'section' => 'vcard_cv_resume_single_blog_settings'
    )));

    // Single Posts Category
  	$wp_customize->add_setting( 'vcard_cv_resume_single_post_category',array(
		'default' => true,
		'transport' => 'refresh',
		'sanitize_callback' => 'vcard_cv_resume_switch_sanitization'
    ) );
  	$wp_customize->add_control( new Vcard_CV_Resume_Toggle_Switch_Custom_Control( $wp_customize, 'vcard_cv_resume_single_post_category',array(
		'label' => esc_html__( 'Single Post Category','vcard-cv-resume' ),
		'section' => 'vcard_cv_resume_single_blog_settings'
    )));

	$wp_customize->add_setting( 'vcard_cv_resume_toggle_tags',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vcard_cv_resume_switch_sanitization'
	));
    $wp_customize->add_control( new Vcard_CV_Resume_Toggle_Switch_Custom_Control( $wp_customize, 'vcard_cv_resume_toggle_tags', array(
		'label' => esc_html__( 'Tags','vcard-cv-resume' ),
		'section' => 'vcard_cv_resume_single_blog_settings'
    )));

	$wp_customize->add_setting('vcard_cv_resume_single_post_meta_field_separator',array(
		'default'=> '|',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vcard_cv_resume_single_post_meta_field_separator',array(
		'label'	=> __('Add Meta Separator','vcard-cv-resume'),
		'description' => __('Add the seperator for meta box. Example: "|", "/", etc.','vcard-cv-resume'),
		'section'=> 'vcard_cv_resume_single_blog_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vcard_cv_resume_single_blog_comment_title',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('vcard_cv_resume_single_blog_comment_title',array(
		'label'	=> __('Add Comment Title','vcard-cv-resume'),
		'input_attrs' => array(
            'placeholder' => __( 'Leave a Reply', 'vcard-cv-resume' ),
        ),
		'section'=> 'vcard_cv_resume_single_blog_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vcard_cv_resume_single_blog_comment_button_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('vcard_cv_resume_single_blog_comment_button_text',array(
		'label'	=> __('Add Comment Button Text','vcard-cv-resume'),
		'input_attrs' => array(
            'placeholder' => __( 'Post Comment', 'vcard-cv-resume' ),
        ),
		'section'=> 'vcard_cv_resume_single_blog_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vcard_cv_resume_single_blog_comment_width',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vcard_cv_resume_single_blog_comment_width',array(
		'label'	=> __('Comment Form Width','vcard-cv-resume'),
		'description'	=> __('Enter a value in %. Example:50%','vcard-cv-resume'),
		'input_attrs' => array(
            'placeholder' => __( '100%', 'vcard-cv-resume' ),
        ),
		'section'=> 'vcard_cv_resume_single_blog_settings',
		'type'=> 'text'
	));

	 // Grid layout setting
	$wp_customize->add_section( 'vcard_cv_resume_grid_layout_settings', array(
		'title' => __( 'Grid Layout Settings', 'vcard-cv-resume' ),
		'panel' => 'vcard_cv_resume_blog_post_parent_panel',
	));

	$wp_customize->add_setting( 'vcard_cv_resume_grid_postdate',array(
        'default' => 1,
        'transport' => 'refresh',
        'sanitize_callback' => 'vcard_cv_resume_switch_sanitization'
    ) );
    $wp_customize->add_control( new Vcard_CV_Resume_Toggle_Switch_Custom_Control( $wp_customize, 'vcard_cv_resume_grid_postdate',array(
        'label' => esc_html__( 'Post Date','vcard-cv-resume' ),
        'section' => 'vcard_cv_resume_grid_layout_settings'
    )));

    $wp_customize->add_setting( 'vcard_cv_resume_grid_author',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vcard_cv_resume_switch_sanitization'
    ) );
    $wp_customize->add_control( new Vcard_CV_Resume_Toggle_Switch_Custom_Control( $wp_customize, 'vcard_cv_resume_grid_author',array(
		'label' => esc_html__( 'Author','vcard-cv-resume' ),
		'section' => 'vcard_cv_resume_grid_layout_settings'
    )));

    $wp_customize->add_setting( 'vcard_cv_resume_grid_comments',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vcard_cv_resume_switch_sanitization'
    ) );
    $wp_customize->add_control( new Vcard_CV_Resume_Toggle_Switch_Custom_Control( $wp_customize, 'vcard_cv_resume_grid_comments',array(
		'label' => esc_html__( 'Comments','vcard-cv-resume' ),
		'section' => 'vcard_cv_resume_grid_layout_settings'
    )));

	//Others Settings
	$wp_customize->add_panel( 'vcard_cv_resume_others_panel', array(
		'title' => esc_html__( 'Others Settings', 'vcard-cv-resume' ),
		'panel' => 'vcard_cv_resume_panel_id',
		'priority' => 20,
	));

	// Layout
	$wp_customize->add_section( 'vcard_cv_resume_left_right', array(
    	'title' => esc_html__( 'General Settings', 'vcard-cv-resume' ),
		'panel' => 'vcard_cv_resume_others_panel'
	) );

	$wp_customize->add_setting('vcard_cv_resume_width_option',array(
        'default' => 'Full Width',
        'sanitize_callback' => 'vcard_cv_resume_sanitize_choices'
	));
	$wp_customize->add_control(new Vcard_CV_Resume_Image_Radio_Control($wp_customize, 'vcard_cv_resume_width_option', array(
        'type' => 'select',
        'label' => esc_html__('Width Layouts','vcard-cv-resume'),
        'description' => esc_html__('Here you can change the width layout of Website.','vcard-cv-resume'),
        'section' => 'vcard_cv_resume_left_right',
        'choices' => array(
            'Full Width' => esc_url(get_template_directory_uri()).'/assets/images/full-width.png',
            'Wide Width' => esc_url(get_template_directory_uri()).'/assets/images/wide-width.png',
            'Boxed' => esc_url(get_template_directory_uri()).'/assets/images/boxed-width.png',
    ))));

	$wp_customize->add_setting('vcard_cv_resume_theme_options',array(
        'default' => 'Right Sidebar',
        'sanitize_callback' => 'vcard_cv_resume_sanitize_choices'
	));
	$wp_customize->add_control('vcard_cv_resume_theme_options',array(
        'type' => 'select',
        'label' => esc_html__('Post Sidebar Layout','vcard-cv-resume'),
        'description' => esc_html__('Here you can change the sidebar layout for posts. ','vcard-cv-resume'),
        'section' => 'vcard_cv_resume_left_right',
        'choices' => array(
            'Left Sidebar' => esc_html__('Left Sidebar','vcard-cv-resume'),
            'Right Sidebar' => esc_html__('Right Sidebar','vcard-cv-resume'),
            'One Column' => esc_html__('One Column','vcard-cv-resume'),
            'Grid Layout' => esc_html__('Grid Layout','vcard-cv-resume')
        ),
	) );

	$wp_customize->add_setting('vcard_cv_resume_page_layout',array(
        'default' => 'One_Column',
        'sanitize_callback' => 'vcard_cv_resume_sanitize_choices'
	));
	$wp_customize->add_control('vcard_cv_resume_page_layout',array(
        'type' => 'select',
        'label' => esc_html__('Page Sidebar Layout','vcard-cv-resume'),
        'description' => esc_html__('Here you can change the sidebar layout for pages. ','vcard-cv-resume'),
        'section' => 'vcard_cv_resume_left_right',
        'choices' => array(
            'Left_Sidebar' => esc_html__('Left Sidebar','vcard-cv-resume'),
            'Right_Sidebar' => esc_html__('Right Sidebar','vcard-cv-resume'),
            'One_Column' => esc_html__('One Column','vcard-cv-resume')
        ),
	) );

	$wp_customize->add_setting( 'vcard_cv_resume_single_page_breadcrumb',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vcard_cv_resume_switch_sanitization'
    ) );
    $wp_customize->add_control( new Vcard_CV_Resume_Toggle_Switch_Custom_Control( $wp_customize, 'vcard_cv_resume_single_page_breadcrumb',array(
		'label' => esc_html__( 'Single Page Breadcrumb','vcard-cv-resume' ),
		'section' => 'vcard_cv_resume_left_right'
    )));

	//Wow Animation
	$wp_customize->add_setting( 'vcard_cv_resume_animation',array(
        'default' => 1,
        'transport' => 'refresh',
        'sanitize_callback' => 'vcard_cv_resume_switch_sanitization'
    ));
    $wp_customize->add_control( new Vcard_CV_Resume_Toggle_Switch_Custom_Control( $wp_customize, 'vcard_cv_resume_animation',array(
        'label' => esc_html__( 'Animations','vcard-cv-resume' ),
        'description' => __('Here you can disable overall site animation effect','vcard-cv-resume'),
        'section' => 'vcard_cv_resume_left_right'
    )));

    // Pre-Loader
	$wp_customize->add_setting( 'vcard_cv_resume_loader_enable',array(
        'default' => 0,
        'transport' => 'refresh',
        'sanitize_callback' => 'vcard_cv_resume_switch_sanitization'
    ) );
    $wp_customize->add_control( new Vcard_CV_Resume_Toggle_Switch_Custom_Control( $wp_customize, 'vcard_cv_resume_loader_enable',array(
        'label' => esc_html__( 'Pre-Loader','vcard-cv-resume' ),
        'section' => 'vcard_cv_resume_left_right'
    )));

	$wp_customize->add_setting('vcard_cv_resume_preloader_bg_color', array(
		'default'           => '#373293',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'vcard_cv_resume_preloader_bg_color', array(
		'label'    => __('Pre-Loader Background Color', 'vcard-cv-resume'),
		'section'  => 'vcard_cv_resume_left_right',
	)));

	$wp_customize->add_setting('vcard_cv_resume_preloader_border_color', array(
		'default'           => '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'vcard_cv_resume_preloader_border_color', array(
		'label'    => __('Pre-Loader Border Color', 'vcard-cv-resume'),
		'section'  => 'vcard_cv_resume_left_right',
	)));

	//Responsive Media Settings
	$wp_customize->add_section('vcard_cv_resume_responsive_media',array(
		'title'	=> esc_html__('Responsive Media','vcard-cv-resume'),
		'panel' => 'vcard_cv_resume_others_panel',
	));

    $wp_customize->add_setting( 'vcard_cv_resume_resp_slider_hide_show',array(
      	'default' => 0,
     	'transport' => 'refresh',
      	'sanitize_callback' => 'vcard_cv_resume_switch_sanitization'
    ));  
    $wp_customize->add_control( new Vcard_CV_Resume_Toggle_Switch_Custom_Control( $wp_customize, 'vcard_cv_resume_resp_slider_hide_show',array(
      	'label' => esc_html__( 'Show / Hide Slider','vcard-cv-resume' ),
      	'section' => 'vcard_cv_resume_responsive_media'
    )));

    $wp_customize->add_setting( 'vcard_cv_resume_sidebar_hide_show',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vcard_cv_resume_switch_sanitization'
    ));  
    $wp_customize->add_control( new Vcard_CV_Resume_Toggle_Switch_Custom_Control( $wp_customize, 'vcard_cv_resume_sidebar_hide_show',array(
      	'label' => esc_html__( 'Show / Hide Sidebar','vcard-cv-resume' ),
      	'section' => 'vcard_cv_resume_responsive_media'
    )));

    $wp_customize->add_setting( 'vcard_cv_resume_resp_scroll_top_hide_show',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vcard_cv_resume_switch_sanitization'
    ));  
    $wp_customize->add_control( new Vcard_CV_Resume_Toggle_Switch_Custom_Control( $wp_customize, 'vcard_cv_resume_resp_scroll_top_hide_show',array(
      	'label' => esc_html__( 'Show / Hide Scroll To Top','vcard-cv-resume' ),
      	'section' => 'vcard_cv_resume_responsive_media'
    )));

    $wp_customize->add_setting('vcard_cv_resume_res_open_menu_icon',array(
		'default'	=> 'fas fa-bars',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new Vcard_CV_Resume_Fontawesome_Icon_Chooser(
        $wp_customize,'vcard_cv_resume_res_open_menu_icon',array(
		'label'	=> __('Add Open Menu Icon','vcard-cv-resume'),
		'transport' => 'refresh',
		'section'	=> 'vcard_cv_resume_responsive_media',
		'setting'	=> 'vcard_cv_resume_res_open_menu_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('vcard_cv_resume_res_menu_close_icon',array(
		'default'	=> 'fas fa-times',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new Vcard_CV_Resume_Fontawesome_Icon_Chooser(
        $wp_customize,'vcard_cv_resume_res_menu_close_icon',array(
		'label'	=> __('Add Close Menu Icon','vcard-cv-resume'),
		'transport' => 'refresh',
		'section'	=> 'vcard_cv_resume_responsive_media',
		'setting'	=> 'vcard_cv_resume_res_menu_close_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('vcard_cv_resume_resp_menu_toggle_btn_bg_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'vcard_cv_resume_resp_menu_toggle_btn_bg_color', array(
		'label'    => __('Toggle Button Bg Color', 'vcard-cv-resume'),
		'section'  => 'vcard_cv_resume_responsive_media',
	)));

    //Woocommerce settings
	$wp_customize->add_section('vcard_cv_resume_woocommerce_section', array(
		'title'    => __('WooCommerce Layout', 'vcard-cv-resume'),
		'priority' => null,
		'panel'    => 'woocommerce',
	));

    // Selective Refresh
	$wp_customize->selective_refresh->add_partial( 'vcard_cv_resume_woocommerce_shop_page_sidebar', array( 'selector' => '.post-type-archive-product #sidebar', 
		'render_callback' => 'vcard_cv_resume_customize_partial_vcard_cv_resume_woocommerce_shop_page_sidebar', ) );

    // Woocommerce Shop Page Sidebar
	$wp_customize->add_setting( 'vcard_cv_resume_woocommerce_shop_page_sidebar',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vcard_cv_resume_switch_sanitization'
    ) );
    $wp_customize->add_control( new Vcard_CV_Resume_Toggle_Switch_Custom_Control( $wp_customize, 'vcard_cv_resume_woocommerce_shop_page_sidebar',array(
		'label' => esc_html__( 'Shop Page Sidebar','vcard-cv-resume' ),
		'section' => 'vcard_cv_resume_woocommerce_section'
    )));

    $wp_customize->add_setting('vcard_cv_resume_shop_page_layout',array(
        'default' => 'Right Sidebar',
        'sanitize_callback' => 'vcard_cv_resume_sanitize_choices'
	));
	$wp_customize->add_control('vcard_cv_resume_shop_page_layout',array(
        'type' => 'select',
        'label' => __('Shop Page Sidebar Layout','vcard-cv-resume'),
        'section' => 'vcard_cv_resume_woocommerce_section',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','vcard-cv-resume'),
            'Right Sidebar' => __('Right Sidebar','vcard-cv-resume'),
        ),
	) );

    // Selective Refresh
	$wp_customize->selective_refresh->add_partial( 'vcard_cv_resume_woocommerce_single_product_page_sidebar', array( 'selector' => '.single-product #sidebar', 
		'render_callback' => 'vcard_cv_resume_customize_partial_vcard_cv_resume_woocommerce_single_product_page_sidebar', ) );

    //Woocommerce Single Product page Sidebar
	$wp_customize->add_setting( 'vcard_cv_resume_woocommerce_single_product_page_sidebar',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vcard_cv_resume_switch_sanitization'
    ) );
    $wp_customize->add_control( new Vcard_CV_Resume_Toggle_Switch_Custom_Control( $wp_customize, 'vcard_cv_resume_woocommerce_single_product_page_sidebar',array(
		'label' => esc_html__( 'Single Product Sidebar','vcard-cv-resume' ),
		'section' => 'vcard_cv_resume_woocommerce_section'
    )));

  	$wp_customize->add_setting('vcard_cv_resume_single_product_layout',array(
        'default' => 'Right Sidebar',
        'sanitize_callback' => 'vcard_cv_resume_sanitize_choices'
	));
	$wp_customize->add_control('vcard_cv_resume_single_product_layout',array(
        'type' => 'select',
        'label' => __('Single Product Sidebar Layout','vcard-cv-resume'),
        'section' => 'vcard_cv_resume_woocommerce_section',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','vcard-cv-resume'),
            'Right Sidebar' => __('Right Sidebar','vcard-cv-resume'),
        ),
	) );

    $wp_customize->add_setting('vcard_cv_resume_products_btn_padding_top_bottom',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vcard_cv_resume_products_btn_padding_top_bottom',array(
		'label'	=> __('Products Button Padding Top Bottom','vcard-cv-resume'),
		'description'	=> __('Enter a value in pixels. Example:20px','vcard-cv-resume'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vcard-cv-resume' ),
        ),
		'section'=> 'vcard_cv_resume_woocommerce_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vcard_cv_resume_products_btn_padding_left_right',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vcard_cv_resume_products_btn_padding_left_right',array(
		'label'	=> __('Products Button Padding Left Right','vcard-cv-resume'),
		'description'	=> __('Enter a value in pixels. Example:20px','vcard-cv-resume'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vcard-cv-resume' ),
        ),
		'section'=> 'vcard_cv_resume_woocommerce_section',
		'type'=> 'text'
	));

    //Products Sale Badge
	$wp_customize->add_setting('vcard_cv_resume_woocommerce_sale_position',array(
        'default' => 'left',
        'sanitize_callback' => 'vcard_cv_resume_sanitize_choices'
	));
	$wp_customize->add_control('vcard_cv_resume_woocommerce_sale_position',array(
        'type' => 'select',
        'label' => __('Sale Badge Position','vcard-cv-resume'),
        'section' => 'vcard_cv_resume_woocommerce_section',
        'choices' => array(
            'left' => __('Left','vcard-cv-resume'),
            'right' => __('Right','vcard-cv-resume'),
        ),
	) );

    $wp_customize->add_setting('vcard_cv_resume_woocommerce_sale_font_size',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vcard_cv_resume_woocommerce_sale_font_size',array(
		'label'	=> __('Sale Font Size','vcard-cv-resume'),
		'description'	=> __('Enter a value in pixels. Example:20px','vcard-cv-resume'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vcard-cv-resume' ),
        ),
		'section'=> 'vcard_cv_resume_woocommerce_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vcard_cv_resume_woocommerce_sale_padding_top_bottom',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vcard_cv_resume_woocommerce_sale_padding_top_bottom',array(
		'label'	=> __('Sale Padding Top Bottom','vcard-cv-resume'),
		'description'	=> __('Enter a value in pixels. Example:20px','vcard-cv-resume'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vcard-cv-resume' ),
        ),
		'section'=> 'vcard_cv_resume_woocommerce_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vcard_cv_resume_woocommerce_sale_padding_left_right',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vcard_cv_resume_woocommerce_sale_padding_left_right',array(
		'label'	=> __('Sale Padding Left Right','vcard-cv-resume'),
		'description'	=> __('Enter a value in pixels. Example:20px','vcard-cv-resume'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vcard-cv-resume' ),
        ),
		'section'=> 'vcard_cv_resume_woocommerce_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'vcard_cv_resume_woocommerce_sale_border_radius', array(
		'default'              => '0',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vcard_cv_resume_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vcard_cv_resume_woocommerce_sale_border_radius', array(
		'label'       => esc_html__( 'Sale Border Radius','vcard-cv-resume' ),
		'section'     => 'vcard_cv_resume_woocommerce_section',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

  	// Related Product
    $wp_customize->add_setting( 'vcard_cv_resume_related_product_show_hide',array(
        'default' => 1,
        'transport' => 'refresh',
        'sanitize_callback' => 'vcard_cv_resume_switch_sanitization'
    ) );
    $wp_customize->add_control( new Vcard_CV_Resume_Toggle_Switch_Custom_Control( $wp_customize, 'vcard_cv_resume_related_product_show_hide',array(
        'label' => esc_html__( 'Related product','vcard-cv-resume' ),
        'section' => 'vcard_cv_resume_woocommerce_section'
    )));

    // Has to be at the top
	$wp_customize->register_panel_type( 'Vcard_CV_Resume_WP_Customize_Panel' );
	$wp_customize->register_section_type( 'Vcard_CV_Resume_WP_Customize_Section' );
}

add_action( 'customize_register', 'vcard_cv_resume_customize_register' );

load_template( trailingslashit( get_template_directory() ) . '/inc/logo/logo-resizer.php' );

if ( class_exists( 'WP_Customize_Panel' ) ) {
  	class Vcard_CV_Resume_WP_Customize_Panel extends WP_Customize_Panel {
	    public $panel;
	    public $type = 'vcard_cv_resume_panel';
	    public function json() {
			$array = wp_array_slice_assoc( (array) $this, array( 'id', 'description', 'priority', 'type', 'panel', ) );
			$array['title'] = html_entity_decode( $this->title, ENT_QUOTES, get_bloginfo( 'charset' ) );
			$array['content'] = $this->get_content();
			$array['active'] = $this->active();
			$array['instanceNumber'] = $this->instance_number;
			return $array;
    	}
  	}
}

if ( class_exists( 'WP_Customize_Section' ) ) {
  	class Vcard_CV_Resume_WP_Customize_Section extends WP_Customize_Section {
	    public $section;
	    public $type = 'vcard_cv_resume_section';
	    public function json() {
			$array = wp_array_slice_assoc( (array) $this, array( 'id', 'description', 'priority', 'panel', 'type', 'description_hidden', 'section', ) );
			$array['title'] = html_entity_decode( $this->title, ENT_QUOTES, get_bloginfo( 'charset' ) );
			$array['content'] = $this->get_content();
			$array['active'] = $this->active();
			$array['instanceNumber'] = $this->instance_number;

			if ( $this->panel ) {
			$array['customizeAction'] = sprintf( 'Customizing &#9656; %s', esc_html( $this->manager->get_panel( $this->panel )->title ) );
			} else {
			$array['customizeAction'] = 'Customizing';
			}
			return $array;
    	}
  	}
}

// Enqueue our scripts and styles
function vcard_cv_resume_customize_controls_scripts() {
	wp_enqueue_script( 'vcard-cv-resume-customizer-controls', get_theme_file_uri( '/assets/js/customizer-controls.js' ), array(), '1.0', true );
}
add_action( 'customize_controls_enqueue_scripts', 'vcard_cv_resume_customize_controls_scripts' );

/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class Vcard_CV_Resume_Customize {

	/**
	 * Returns the instance.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return object
	 */
	public static function get_instance() {

		static $instance = null;

		if ( is_null( $instance ) ) {
			$instance = new self;
			$instance->setup_actions();
		}

		return $instance;
	}

	/**
	 * Constructor method.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function __construct() {}

	/**
	 * Sets up initial actions.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function setup_actions() {

		// Register panels, sections, settings, controls, and partials.
		add_action( 'customize_register', array( $this, 'sections' ) );

		// Register scripts and styles for the controls.
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue_control_scripts' ), 0 );
	}

	/**
	 * Sets up the customizer sections.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object  $manager
	 * @return void
	*/
	public function sections( $manager ) {

		// Load custom sections.
		load_template( trailingslashit( get_template_directory() ) . '/inc/section-pro.php' );

		// Register custom section types.
		$manager->register_section_type( 'Vcard_CV_Resume_Customize_Section_Pro' );

		// Register sections.
		$manager->add_section( new Vcard_CV_Resume_Customize_Section_Pro( $manager,'vcard_cv_resume_go_pro', array(
			'priority'   => 1,
			'title'    => esc_html__( 'CV RESUME PRO', 'vcard-cv-resume' ),
			'pro_text' => esc_html__( 'UPGRADE PRO', 'vcard-cv-resume' ),
			'pro_url'  => esc_url('https://www.vwthemes.com/themes/cv-resume-wordpress-theme/'),
		) )	);

		$manager->add_section(new Vcard_CV_Resume_Customize_Section_Pro($manager,'vcard_cv_resume_get_started_link',array(
			'priority'   => 1,
			'title'    => esc_html__( 'DOCUMENTATION', 'vcard-cv-resume' ),
			'pro_text' => esc_html__( 'DOCS', 'vcard-cv-resume' ),
			'pro_url'  => esc_url('https://www.vwthemesdemo.com/docs/free-vcard-cv-resume/'),
		)));
	}

	/**
	 * Loads theme customizer CSS.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue_control_scripts() {

		wp_enqueue_script( 'vcard-cv-resume-customize-controls', trailingslashit( get_template_directory_uri() ) . '/assets/js/customize-controls.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'vcard-cv-resume-customize-controls', trailingslashit( get_template_directory_uri() ) . '/assets/css/customize-controls.css' );
	}
}

// Doing this customizer thang!
Vcard_CV_Resume_Customize::get_instance();