<?php
/*
 * Elementor Segovia Intro List Widget
 * Author & Copyright: VictorTheme
*/

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Segovia_intro_List extends Widget_Base{

	/**
	 * Retrieve the widget name.
	*/
	public function get_name(){
		return 'vt-segovia_intro_list';
	}

	/**
	 * Retrieve the widget title.
	*/
	public function get_title(){
		return esc_html__( 'Intro List Item', 'segovia-core' );
	}

	/**
	 * Retrieve the widget icon.
	*/
	public function get_icon() {
		return 'fa fa-check';
	}

	/**
	 * Retrieve the list of categories the widget belongs to.
	*/
	public function get_categories() {
		return ['victortheme-category'];
	}

	/**
	 * Retrieve the list of scripts the Segovia Intro List widget depended on.
	 * Used to set scripts dependencies required to run the widget.
	*/
	/*
	public function get_script_depends() {
		return ['vt-segovia_intro_list'];
	}
	*/
	
	/**
	 * Register Segovia Intro List widget controls.
	 * Adds different input fields to allow the user to change and customize the widget settings.
	*/
	protected function _register_controls(){
		
		$this->start_controls_section(
			'intro_list',
			[
				'label' => __( 'Intro List Item', 'segovia-core' ),
			]
		);

		$this->add_control(
			'icon_type',
			[
				'label' => __( 'Icon Type', 'segovia-core' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'image' => esc_html__( 'Image', 'segovia-core' ),
					'icon' => esc_html__( 'Icon', 'segovia-core' ),
				],
				'default' => 'image',
			]
		);
		$this->add_control(
			'tools_icon',
			[
				'label' => esc_html__( 'Icon', 'segovia-core' ),
				'type' => Controls_Manager::ICON,
				'options' => Controls_Helper_Output::get_include_icons(),
				'frontend_available' => true,
				'default' => 'icon-arrows-check',
				'condition' => [
					'icon_type' => 'icon',
				],
			]
		);
		$this->add_control(
			'tools_image',
			[
				'label' => esc_html__( 'Upload Icon', 'segovia-core' ),
				'type' => Controls_Manager::MEDIA,
				'condition' => [
					'icon_type' => 'image',
				],
				'frontend_available' => true,
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
				'description' => esc_html__( 'Set your icon image.', 'segovia-core'),
			]
		);


		$this->add_control(
			'intro_list_title',
			[
				'label' => esc_html__( 'Title', 'segovia-core' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( 'Title', 'segovia-core' ),
				'placeholder' => esc_html__( 'Type title text here', 'segovia-core' ),
				'label_block' => true,
			]
		);
		$this->add_control(
			'tools_content',
			[
				'label' => esc_html__( 'Content', 'segovia-core' ),
				'default' => esc_html__( 'your content text', 'segovia-core' ),
				'placeholder' => esc_html__( 'Type your content here', 'segovia-core' ),
				'type' => Controls_Manager::TEXTAREA,
				'label_block' => true,
			]
		);
		$this->add_control(
			'intro_list_link_text',
			[
				'label' => esc_html__( 'Link Text', 'segovia-core' ),
				'type' => Controls_Manager::TEXT,
				'placeholder' => esc_html__( 'Type link text here', 'segovia-core' ),
				'label_block' => true,
			]
		);
		$this->add_control(
			'intro_list_link_text_link',
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
		
		$this->end_controls_section();// end: Section

		// Style Section
		$this->start_controls_section(
			'section_style',
			[
				'label' => esc_html__( 'Section Style', 'segovia-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

			$this->add_control(
				'intro_bg_color',
				[
					'label' => esc_html__( 'Background Color', 'segovia-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .segva-intro-list' => 'background-color: {{VALUE}};',
					],
				]
			);
				$this->add_group_control(
				Group_Control_Border::get_type(),
				[
					'name' => 'box_border',
					'label' => esc_html__( 'Border', 'segovia-core' ),
					'selector' => '{{WRAPPER}} .segva-intro-list',
				]
			);
			$this->add_control(
				'box_border_radius',
				[
					'label' => __( 'Border Radius', 'segovia-core' ),
					'type' => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%', 'em' ],
					'selectors' => [
						'{{WRAPPER}} .segva-intro-list'  => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

			$this->add_control(
			'section_alignment',
			[
				'label' => esc_html__( 'Alignment', 'segovia-core' ),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => esc_html__( 'Left', 'segovia-core' ),
						'icon' => 'fa fa-align-left',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'segovia-core' ),
						'icon' => 'fa fa-align-center',
					],
					'right' => [
						'title' => esc_html__( 'Right', 'segovia-core' ),
						'icon' => 'fa fa-align-right',
					],
				],
				'default' => 'left',
				'selectors' => [
					'{{WRAPPER}}' => 'text-align: {{VALUE}};',
				],
			]
		);

		$this->end_controls_section();// end: Section

		$this->start_controls_section(
			'icon_style',
			[
				'label' => esc_html__( 'Icon', 'segovia-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'icon_color',
			[
				'label' => esc_html__( 'Color', 'segovia-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .segva-intro-list .segva-icon i' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_responsive_control(
			'icon_font_size',
			[
				'label' => esc_html__( 'Icon Font Size', 'segovia-core' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 1,
						'max' => 200,
						'step' => 1,
					],
				],
				'size_units' => [ 'px' ],
				'selectors' => [
					'{{WRAPPER}} .segva-intro-list .segva-icon i' => 'font-size: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();// end: Section

		$this->start_controls_section(
			'section_title_style',
			[
				'label' => esc_html__( 'Title', 'segovia-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
			$this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'label' => esc_html__( 'Typography', 'segovia-core' ),
					'name' => 'sastool_title_typography',					
					'selector' => '{{WRAPPER}} .intro-list-info h4',
				]
			);

			$this->add_control(
				'title_color',
				[
					'label' => esc_html__( 'Color', 'segovia-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .intro-list-info h4' => 'color: {{VALUE}};',
					],
				]
			);

		$this->end_controls_section();// end: Section
		
		$this->start_controls_section(
			'section_content_style',
			[
				'label' => esc_html__( 'Content', 'segovia-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
			$this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'label' => esc_html__( 'Typography', 'segovia-core' ),
					'name' => 'content_typography',
					'selector' => '{{WRAPPER}} .intro-list-info p',
				]
			);
			$this->add_control(
				'content_color',
				[
					'label' => esc_html__( 'Color', 'segovia-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .intro-list-info p' => 'color: {{VALUE}};',
					],
				]
			);
		$this->end_controls_section();// end: Section

		// Left Section Link
		$this->start_controls_section(
			'bg_link_section',
			[
				'label' => esc_html__( 'Link', 'segovia-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'label' => esc_html__( 'Typography', 'segovia-core' ),
				'name' => 'bg_link_typography',				
				'selector' => '{{WRAPPER}} .segva-border-link.arrow-btn .segva-link-btn',
			]
		);

		$this->add_responsive_control(
			'link_icon_size',
			[
				'label' => esc_html__( 'Link Icon Size', 'segovia-core' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 2,
						'max' => 120,
						'step' => 2,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .segva-border-link.arrow-btn .segva-link-btn i' => 'font-size: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->start_controls_tabs( 'list_title_style' );
		$this->start_controls_tab(
				'bg_title_normal',
				[
					'label' => esc_html__( 'Normal', 'segovia-core' ),
				]
			);
		$this->add_control(
			'bg_link_text_color',
			[
				'label' => esc_html__( 'Color', 'segovia-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .segva-border-link.arrow-btn .segva-link-btn' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
				'bg_link_border_color',
				[
					'label' => esc_html__( 'Link Icon Color', 'segovia-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .segva-border-link.arrow-btn .segva-link-btn i' => 'color: {{VALUE}};',
					],
				]
			);

		$this->end_controls_tab();  // end:Normal tab

			$this->start_controls_tab(
				'bg_title_hover',
				[
					'label' => esc_html__( 'Hover', 'segovia-core' ),
				]
			);

			$this->add_control(
				'bg_title_hover_color',
				[
					'label' => esc_html__( 'Color', 'segovia-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .segva-border-link.arrow-btn .segva-link-btn:hover' => 'color: {{VALUE}};',
					],
				]
			);
			$this->add_control(
				'bg_link_border_hover_color',
				[
					'label' => esc_html__( 'Link Icon Color', 'segovia-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .segva-border-link.arrow-btn .segva-link-btn:hover i' => 'color: {{VALUE}};',
					],
				]
			);

		$this->end_controls_tab();  // end:Hover tab
		$this->end_controls_tabs(); // end tabs

		$this->end_controls_section();// end: Section
		
	}

	/**
	 * Render Tools widget output on the frontend.
	 * Written in PHP and used to generate the final HTML.
	*/
	protected function render() {
		// Tools query
		$settings = $this->get_settings_for_display();
		$intro_list_style = !empty( $settings['intro_list_style'] ) ? $settings['intro_list_style'] : [];
		$intro_bg_title = !empty( $settings['intro_bg_title'] ) ? $settings['intro_bg_title'] : [];
		$intro_list_link_text = !empty( $settings['intro_list_link_text'] ) ? $settings['intro_list_link_text'] : '';

		$intro_list_link_text_link = !empty( $settings['intro_list_link_text_link'] ) ? $settings['intro_list_link_text_link'] : '';
		$link_url = !empty( $intro_list_link_text_link['url'] ) ? esc_url($intro_list_link_text_link['url']) : '';
		$link_external = !empty( $intro_list_link_text_link['is_external'] ) ? 'target="_blank"' : '';
		$link_nofollow = !empty( $intro_list_link_text_link['nofollow'] ) ? 'rel="nofollow"' : '';
		$link_attr = !empty( $intro_list_link_text_link['url'] ) ?  $link_external.' '.$link_nofollow : '';

		$title_link_main = $intro_list_link_text_link ? '<div class="segva-border-link arrow-btn"><a href="'.$link_url.'" '.$link_attr.' class="segva-link-btn"> <i class="fa fa-long-arrow-right" aria-hidden="true"></i>'.$intro_list_link_text.'</a></div>' : '<div class="segva-border-link"><span class="segva-link-btn"> '.$intro_list_link_text.'</span></div>';

		$title_link_actual = $intro_list_link_text ? $title_link_main : '';

		$output = '';

			$output .= '<div class="segva-intro-list">';

			// Group Param Output
				$image_url = wp_get_attachment_url( $settings['tools_image']['id'], 'thumbnail' );
				$segovia_alt = get_post_meta($settings['tools_image']['id'], '_wp_attachment_image_alt', true);
				$intro_list_title_link = !empty( $settings['intro_list_title_link'] ) ? $settings['intro_list_title_link'] : '';

				$link_url = !empty( $intro_list_title_link['url'] ) ? esc_url($intro_list_title_link['url']) : '';
				$link_external = !empty( $intro_list_title_link['is_external'] ) ? 'target="_blank"' : '';
				$link_nofollow = !empty( $intro_list_title_link['nofollow'] ) ? 'rel="nofollow"' : '';
				$link_attr = !empty( $intro_list_title_link['url'] ) ?  $link_external.' '.$link_nofollow : '';
				
				$icon_type = !empty( $settings['icon_type'] ) ? $settings['icon_type'] : '';
	  		$icon = !empty( $settings['tools_icon'] ) ? $settings['tools_icon'] : '';

			  $title_link = !empty( $link_url ) ? '<a href="'.$link_url.'" '.$link_attr.'>'.$settings['intro_list_title'].'</a>' : $settings['intro_list_title'];
			  $content = !empty( $settings['tools_content'] ) ? '<p>'.$settings['tools_content'].'</p>' : '';

			  $image = $image_url ? '<div class="segva-icon"><img src="'. $image_url .'" width=56 alt="'.$segovia_alt.'"></div>' : '';
				$icon = $icon ? '<div class="segva-icon"><i class="'.$icon.'" aria-hidden="true"></i></div>' : '';

			  if($icon_type === 'icon') {
				  $icon_image = $icon;
				} else {
				  $icon_image = $image;
				}

				$title = !empty( $settings['intro_list_title'] ) ? '<h4 class="intro-list-title">'.$title_link.'</h4>' : '';

			  $output .= '<div class="intro-list-item ">
                      '.$icon_image.'
                    <div class="intro-list-info">
                      '.$title.$content.'
                      '.$title_link_actual.'
                    </div>
                  </div> ';

			$output .='</div>';

			echo $output;
		
	}

	/**
	 * Render Intro List Item widget output in the editor.
	 * Written as a Backbone JavaScript template and used to generate the live preview.
	*/
	
	//protected function _content_template(){}
	
}
Plugin::instance()->widgets_manager->register_widget_type( new Segovia_intro_List() );

