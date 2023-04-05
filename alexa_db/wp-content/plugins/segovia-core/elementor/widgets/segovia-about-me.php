<?php
/*
 * Elementor Segovia About Me Widget
 * Author & Copyright: VictorTheme
*/

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Segovia_About_Me extends Widget_Base{

	/**
	 * Retrieve the widget name.
	*/
	public function get_name(){
		return 'vt-segovia_about_me';
	}

	/**
	 * Retrieve the widget title.
	*/
	public function get_title(){
		return esc_html__( 'About Me', 'segovia-core' );
	}

	/**
	 * Retrieve the widget icon.
	*/
	public function get_icon() {
		return 'fa fa-info';
	}

	/**
	 * Retrieve the list of categories the widget belongs to.
	*/
	public function get_categories() {
		return ['victortheme-category'];
	}

	/**
	 * Retrieve the list of scripts the Segovia About Me widget depended on.
	 * Used to set scripts dependencies required to run the widget.
	*/
	/*
	public function get_script_depends() {
		return ['vt-segovia_list'];
	}
	*/
	
	/**
	 * Register Segovia About Me widget controls.
	 * Adds different input fields to allow the user to change and customize the widget settings.
	*/
	protected function _register_controls(){
		
		$this->start_controls_section(
			'section_about_me',
			[
				'label' => esc_html__( 'About Me Options', 'segovia-core' ),
			]
		);


		// Content Sections
		$this->add_control(
			'about_bg_image',
			[
				'label' => esc_html__( 'About Image', 'segovia-core' ),
				'type' => Controls_Manager::MEDIA,
				'frontend_available' => true,
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
				'description' => esc_html__( 'Set your image.', 'segovia-core'),
			]
		);
			$this->add_control(
			'about_title',
			[
				'label' => esc_html__( 'About Title', 'segovia-core' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( 'Title Text', 'segovia-core' ),
				'placeholder' => esc_html__( 'Type title text here', 'segovia-core' ),
				'label_block' => true,
			]
		);
		$this->add_control(
			'about_content',
			[
				'label' => esc_html__( 'Your First Content', 'segovia-core' ),
				'default' => esc_html__( 'your content text', 'segovia-core' ),
				'placeholder' => esc_html__( 'Type your content here', 'segovia-core' ),
				'type' => Controls_Manager::TEXTAREA,
				'label_block' => true,
			]
		);
		$this->add_control(
			'about_content_two',
			[
				'label' => esc_html__( 'Your Second Content', 'segovia-core' ),
				'default' => esc_html__( 'your content text', 'segovia-core' ),
				'placeholder' => esc_html__( 'Type your content here', 'segovia-core' ),
				'type' => Controls_Manager::TEXTAREA,
				'label_block' => true,
			]
		);
		$this->add_control(
			'about_link_text',
			[
				'label' => esc_html__( 'Link Text', 'segovia-core' ),
				'type' => Controls_Manager::TEXT,
				'placeholder' => esc_html__( 'Type link text here', 'segovia-core' ),
				'label_block' => true,
			]
		);
		$this->add_control(
			'about_link_text_link',
			[
				'label' => esc_html__( 'Link', 'segovia-core' ),
				'type' => Controls_Manager::URL,
				'placeholder' => 'https://your-link.com',
				'default' => [
					'url' => '',
				],
				'label_block' => true,
			]
		);
		$this->add_control(
			'link_text_icon',
			[
				'label' => esc_html__( 'Link Icon', 'segovia-core' ),
				'type' => Controls_Manager::ICON,
				'options' => Controls_Helper_Output::get_include_icons(),
				'frontend_available' => true,
				'default' => 'fa fa-download',
			]
		);


		$repeater = new Repeater();
		
		$repeater->add_control(
			'select_icon',
			[
				'label' => esc_html__( 'Select Icon', 'segovia-core' ),
				'type' => Controls_Manager::ICON,
				'frontend_available' => true,
				'options' => Controls_Helper_Output::get_include_icons(),
				'default' => 'fa fa-facebook',
			]
		);
		$repeater->add_control(
			'social_text',
			[
				'label' => esc_html__( 'Social Text', 'segovia-core' ),
				'type' => Controls_Manager::TEXT,
				'placeholder' => esc_html__( 'Type social text here', 'segovia-core' ),
				'label_block' => true,
			]
		);
		$repeater->add_control(
			'icon_link',
			[
				'label' => esc_html__( 'Icon Link', 'segovia-core' ),
				'type' => Controls_Manager::URL,
				'placeholder' => __( 'https://your-link.com', 'segovia-core' ),
				'show_external' => true,
				'default' => [
					'url' => '',
					'is_external' => true,
					'nofollow' => true,
				],
			]
		);
		
		$this->add_control(
			'listItems_groups',
			[
				'label' => esc_html__( 'Social Icons', 'segovia-core' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'title_field' => '{{{ select_icon }}}',
			]
		);
		$this->end_controls_section();// end: Section
		

		// Style Section
		// Title Styles
		$this->start_controls_section(
			'about_title_style',
			[
				'label' => esc_html__( 'About Title', 'segovia-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
			$this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'label' => esc_html__( 'Typography', 'segovia-core' ),
					'name' => 'sasloo_title_typography',					
					'selector' => '{{WRAPPER}} .my-info h1',
				]
			);
			$this->add_control(
				'title_color',
				[
					'label' => esc_html__( 'Color', 'segovia-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .my-info h1' => 'color: {{VALUE}};',
					],
				]
			);
		$this->end_controls_section();// end: Section

		// Content Section
		$this->start_controls_section(
			'about_content_style',
			[
				'label' => esc_html__( 'About Content', 'segovia-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
			$this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'label' => esc_html__( 'Typography', 'segovia-core' ),
					'name' => 'sasloo_content_typography',
					'selector' => '{{WRAPPER}} .my-info p',
				]
			);
			$this->add_control(
				'about_content_color',
				[
					'label' => esc_html__( 'Color', 'segovia-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .my-info p' => 'color: {{VALUE}};',
					],
				]
			);
		$this->end_controls_section();// end: Section

		// Link Section
		// Title Styles
		$this->start_controls_section(
			'section_link_style',
			[
				'label' => esc_html__( 'Link Section', 'segovia-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
			$this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'label' => esc_html__( 'Typography', 'segovia-core' ),
					'name' => 'sasloo_link_typography',
					'selector' => '{{WRAPPER}} .my-info .segva-border-link a',
				]
			);
			$this->add_responsive_control(
			'read_more_icon_size',
			[
				'label' => esc_html__( 'Read More Icon', 'windfall-core' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 2,
						'max' => 150,
						'step' => 2,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .my-info .segva-border-link a i' => 'font-size: {{SIZE}}{{UNIT}};',
				],
			]
		);
			$this->start_controls_tabs( 'about_link_style' );
			$this->start_controls_tab(
				'link_normal',
				[
					'label' => esc_html__( 'Normal', 'segovia-core' ),
				]
			);
			$this->add_control(
				'link_color',
				[
					'label' => esc_html__( 'Color', 'segovia-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .my-info .segva-border-link a, {{WRAPPER}} .my-info .segva-border-link a i' => 'color: {{VALUE}};',
					],
				]
			);
			$this->add_control(
				'link_border_color',
				[
					'label' => esc_html__( 'Border Color', 'segovia-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .my-info .segva-border-link a:after' => 'background: {{VALUE}};',
					],
				]
			);
			$this->end_controls_tab();  // end:Normal tab
				$this->start_controls_tab(
				'about_link_hover',
				[
					'label' => esc_html__( 'Hover', 'segovia-core' ),
				]
			);
			$this->add_control(
				'about_link_hover_color',
				[
					'label' => esc_html__( 'Color', 'segovia-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .my-info .segva-border-link a:hover, {{WRAPPER}} .my-info .segva-border-link a:hover i ' => 'color: {{VALUE}};',
					],
				]
			);

			$this->end_controls_tab();  // end:Hover tab
		$this->end_controls_tabs(); // end tabs

		$this->end_controls_section();// end: Section


		// Social Icon Section
		$this->start_controls_section(
			'about_me_section_icon_style',
			[
				'label' => esc_html__( 'Icon', 'segovia-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->start_controls_tabs( 'icon_style' );
			$this->start_controls_tab(
					'about_me_icon_normal',
					[
						'label' => esc_html__( 'Normal', 'segovia-core' ),
					]
				);
			$this->add_control(
				'about_me_icon_color',
				[
					'label' => esc_html__( 'Color', 'segovia-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .segva-social a' => 'color: {{VALUE}};',
					],
				]
			);
			$this->add_control(
				'about_me_icon_bg',
				[
					'label' => esc_html__( 'Background Color', 'segovia-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .segva-social a' => 'background-color: {{VALUE}};',
					],
				]
			);
			$this->end_controls_tab();  // end:Normal tab
			$this->start_controls_tab(
					'about_me_icon_hover',
					[
						'label' => esc_html__( 'Hover', 'segovia-core' ),
					]
				);
			$this->add_control(
				'about_me_icon_hover_color',
				[
					'label' => esc_html__( 'Color', 'segovia-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .segva-social a:hover' => 'color: {{VALUE}};',
					],
				]
			);
			$this->add_control(
				'about_me_icon_bg_hov',
				[
					'label' => esc_html__( 'Background Hover Color', 'segovia-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .segva-social a:hover' => 'background-color: {{VALUE}};',
					],
				]
			);
			$this->end_controls_tab();  // end:Hover tab
		$this->end_controls_tabs(); // end tabs		
		
		$this->add_responsive_control(
			'icon_size',
			[
				'label' => esc_html__( 'Size', 'segovia-core' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000,
						'step' => 1,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .segva-social a, {{WRAPPER}} .my-info .segva-social a .social-title' => 'font-size:{{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'icon_width',
			[
				'label' => esc_html__( 'Width', 'segovia-core' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000,
						'step' => 1,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .segva-social a' => 'width:{{SIZE}}{{UNIT}};height:{{SIZE}}{{UNIT}};line-height:{{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'icon_margin',
			[
				'label' => __( 'Margin', 'segovia-core' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .segva-social a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_section();// end: Section
		
	}

	/**
	 * Render About Me widget output on the frontend.
	 * Written in PHP and used to generate the final HTML.
	*/
	protected function render() {
		$settings = $this->get_settings_for_display();
		$listItems_groups = !empty( $settings['listItems_groups'] ) ? $settings['listItems_groups'] : [];

		$about_bg_image = !empty( $settings['about_bg_image']['id'] ) ? $settings['about_bg_image']['id'] : '';	

		$about_title = !empty( $settings['about_title'] ) ? $settings['about_title'] : '';	
		$about_content = !empty( $settings['about_content'] ) ? $settings['about_content'] : '';	
		$about_content_two = !empty( $settings['about_content_two'] ) ? $settings['about_content_two'] : '';	


		$about_link_text = !empty( $settings['about_link_text'] ) ? $settings['about_link_text'] : '';	

		$about_link_text_link = !empty( $settings['about_link_text_link']['url'] ) ? $settings['about_link_text_link']['url'] : '';
		$about_link_text_link_external = !empty( $settings['about_link_text_link']['is_external'] ) ? 'target="_blank"' : '';
		$about_link_text_link_nofollow = !empty( $settings['about_link_text_link']['nofollow'] ) ? 'rel="nofollow"' : '';
		$about_link_text_link_attr = !empty( $about_link_text_link ) ?  $about_link_text_link_external.' '.$about_link_text_link_nofollow : '';

		$link_text_icon = !empty( $settings['link_text_icon'] ) ? $settings['link_text_icon'] : '';	
		$icon = $link_text_icon ? ' <i class="'.$link_text_icon.'" aria-hidden="true"></i>' : '';


		$about_link_text = $about_link_text_link ? '<div class="segva-border-link"><a href="'.$about_link_text_link.'" class="segva-btn">'.$icon.' '.$about_link_text.'</a></div>' : $about_link_text;

		// $title = $about_link_text ? '<h4 class="about-title">'.$about_link_text.'</h4>' : '';

		// Image
		$image_url = wp_get_attachment_url( $about_bg_image );

		$output ='<div class="segva-about-me">
      <div class="segva-background segva-parallax" style="background-image: url('.$image_url.');"></div>
      <div class="my-info">
        <div class="my-info-wrap">
          <div class="vertical-scroll">
            <div class="segva-table-wrap">
              <div class="segva-align-wrap">
                <h1 class="my-name">'.$about_title .'</h1>
                <p>'.$about_content.'</p>
                <p>'.$about_content_two.'</p>
                '.$about_link_text.'
              </div>
            </div>
          </div>
        </div>';
		
	  $output .= '<div class="segva-social square">';

		// Group Param Output
		if( is_array( $listItems_groups ) && !empty( $listItems_groups ) ){
		  foreach ( $listItems_groups as $each_list ) {

		  $icon_link = !empty( $each_list['icon_link'] ) ? $each_list['icon_link'] : '';
		  $social_text = !empty( $each_list['social_text'] ) ? $each_list['social_text'] : '';


			$link_url = !empty( $icon_link['url'] ) ? esc_url($icon_link['url']) : '';
			$link_external = !empty( $icon_link['is_external'] ) ? 'target="_blank"' : '';
			$link_nofollow = !empty( $icon_link['nofollow'] ) ? 'rel="nofollow"' : '';
			$link_attr = !empty( $icon_link['url'] ) ?  $link_external.' '.$link_nofollow : '';

   		$social_icon = ( $each_list['select_icon'] ) ? $each_list['select_icon'] : '';
			
		  $output .= '<a  href="'.$link_url.'" '.$link_attr.' class="'. str_replace('fa ', 'icon-', $social_icon) .'"><i class="'. $social_icon .'"></i> <span class="social-title">'.$social_text.'</span></a>';

		  }
		}

		$output .= '</div>
    </div></div>';

		echo $output;
		
	}

	/**
	 * Render About Me widget output in the editor.
	 * Written as a Backbone JavaScript template and used to generate the live preview.
	*/
	
	//protected function _content_template(){}
	
}
Plugin::instance()->widgets_manager->register_widget_type( new Segovia_About_Me() );
