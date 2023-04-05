<?php
/*
 * Elementor Segovia Services Widget
 * Author & Copyright: VictorTheme
*/

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Segovia_Services extends Widget_Base{

	/**
	 * Retrieve the widget name.
	*/
	public function get_name(){
		return 'vt-segovia_services';
	}

	/**
	 * Retrieve the widget title.
	*/
	public function get_title(){
		return esc_html__( 'Services', 'segovia-core' );
	}

	/**
	 * Retrieve the widget icon.
	*/
	public function get_icon() {
		return 'fa fa-cog';
	}

	/**
	 * Retrieve the list of categories the widget belongs to.
	*/
	public function get_categories() {
		return ['victortheme-category'];
	}

	/**
	 * Retrieve the list of scripts the Segovia Services widget depended on.
	 * Used to set scripts dependencies required to run the widget.
	*/
	/*
	public function get_script_depends() {
		return ['vt-segovia_services'];
	}
	*/
	
	/**
	 * Register Segovia Services widget controls.
	 * Adds different input fields to allow the user to change and customize the widget settings.
	*/
	protected function _register_controls(){
		
		$this->start_controls_section(
			'section_services',
			[
				'label' => __( 'Services Options', 'segovia-core' ),
			]
		);
		$this->add_control(
			'upload_type',
			[
				'label' => __( 'Icon Type', 'segovia-core' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'icon' => esc_html__( 'Icon', 'segovia-core' ),
					'image' => esc_html__( 'Image', 'segovia-core' ),
				],
				'default' => 'icon',
			]
		);
		$this->add_control(
			'service_image',
			[
				'label' => esc_html__( 'Upload Icon', 'segovia-core' ),
				'type' => Controls_Manager::MEDIA,
				'condition' => [
					'upload_type' => 'image',
				],
				'frontend_available' => true,
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
				'description' => esc_html__( 'Set your icon image.', 'segovia-core'),
			]
		);
		$this->add_control(
			'service_icon',
			[
				'label' => esc_html__( 'Service Icon', 'segovia-core' ),
				'type' => Controls_Manager::ICON,
				'options' => Controls_Helper_Output::get_include_icons(),
				'frontend_available' => true,
				'default' => 'fa fa-cog',
				'condition' => [
					'upload_type' => 'icon',
				],
			]
		);
		$this->add_control(
			'services_title',
			[
				'label' => esc_html__( 'Title Text', 'segovia-core' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( 'Goal Setting', 'segovia-core' ),
				'placeholder' => esc_html__( 'Type title text here', 'segovia-core' ),
				'label_block' => true,
			]
		);
		$this->add_control(
			'services_title_link',
			[
				'label' => esc_html__( 'Title Link', 'segovia-core' ),
				'type' => Controls_Manager::URL,
				'placeholder' => 'https://your-link.com',
				'default' => [
					'url' => '',
				],
				'label_block' => true,
			]
		);
		$this->add_control(
			'services_content',
			[
				'label' => esc_html__( 'Content', 'segovia-core' ),
				'placeholder' => esc_html__( 'Type your content here', 'segovia-core' ),
				'type' => Controls_Manager::TEXTAREA,
				'label_block' => true,
			]
		);
		$this->add_control(
			'view_more_link',
			[
				'label' => esc_html__( 'Read More Link', 'segovia-core' ),
				'type' => Controls_Manager::URL,
				'placeholder' => __( 'https://your-link.com', 'segovia-core' ),
				'show_external' => true,
				'default' => [
					'url' => '',
				],
			]
		);
		$this->add_control(
			'read_icon',
			[
				'label' => esc_html__( 'Upload Read More Icon', 'segovia-core' ),
				'type' => Controls_Manager::MEDIA,
				'frontend_available' => true,
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
				'description' => esc_html__( 'Set your icon image.', 'segovia-core'),
			]
		);

		$this->end_controls_section();// end: Section

		// Style
		// Section
		$this->start_controls_section(
			'section_box_style',
			[
				'label' => esc_html__( 'Section', 'segovia-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'service_item_box_shadow',
				'label' => esc_html__( 'Service Box Shadow', 'segovia-core' ),
				'selector' => '{{WRAPPER}} .service-item',
			]
		);

		$this->start_controls_tabs( 'box_style' );
			$this->start_controls_tab(
				'box_bg_normal',
				[
					'label' => esc_html__( 'Normal', 'segovia-core' ),
				]
			);
			$this->add_control(
				'box_bg_color',
				[
					'label' => esc_html__( 'Background Color', 'segovia-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .service-item' => 'background-color: {{VALUE}};',
					],
				]
			);
			
			$this->end_controls_tab();  // end:Normal tab
			$this->start_controls_tab(
				'box_hover',
				[
					'label' => esc_html__( 'Hover', 'segovia-core' ),
				]
			);
			$this->add_control(
				'box_bg_hover_color',
				[
					'label' => esc_html__( 'Background Color', 'segovia-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .service-item.segva-hover' => 'background-color: {{VALUE}};',
					],
				]
			);
			
			$this->end_controls_tab();  // end:Hover tab
		$this->end_controls_tabs(); // end tabs

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'box_border',
				'label' => esc_html__( 'Border', 'segovia-core' ),
				'selector' => '{{WRAPPER}} .service-item',
			]
		);
		$this->add_control(
			'box_border_radius',
			[
				'label' => __( 'Border Radius', 'segovia-core' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .service-item' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'service_section_margin',
			[
				'label' => __( 'Margin', 'segovia-core' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px' ],
				'selectors' => [
					'{{WRAPPER}} .service-item' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'service_section_padding',
			[
				'label' => __( 'Padding', 'segovia-core' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px' ],
				'selectors' => [
					'{{WRAPPER}} .service-item' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'service_box_shadow',
				'label' => esc_html__( 'Hover Box Shadow', 'segovia-core' ),
				'selector' => '{{WRAPPER}} .service-item.segva-hover',
			]
		);
		$this->end_controls_section();// end: Section

		// Icon
		$this->start_controls_section(
			'section_icon_style',
			[
				'label' => esc_html__( 'Icon', 'segovia-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'upload_type' => array('icon'),
				],
			]
		);
			$this->add_control(
				'icon_color',
				[
					'label' => esc_html__( 'Icon Color', 'segovia-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .service-item .segva-icon i' => 'color: {{VALUE}};',
					],
				]
			);
			$this->add_control(
				'icon_size',
				[
					'label' => esc_html__( 'Icon Size', 'segovia-core' ),
					'type' => Controls_Manager::SLIDER,
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 500,
							'step' => 1,
						],
					],
					'size_units' => [ 'px' ],
					'selectors' => [
						'{{WRAPPER}} .service-item .segva-icon i' => 'font-size: {{SIZE}}{{UNIT}};',
					],
				]
			);
		$this->end_controls_section();// end: Section

		// Title
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
				'name' => 'sasstp_title_typography',				
				'selector' => '{{WRAPPER}} .service-item h3',
			]
		);
		$this->start_controls_tabs( 'title_style' );
			$this->start_controls_tab(
				'title_normal',
				[
					'label' => esc_html__( 'Normal', 'segovia-core' ),
				]
			);
			$this->add_control(
				'title_color',
				[
					'label' => esc_html__( 'Color', 'segovia-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .service-item h3, {{WRAPPER}} .service-item h3 a' => 'color: {{VALUE}};',
					],
				]
			);
			$this->end_controls_tab();  // end:Normal tab
			$this->start_controls_tab(
				'title_hover',
				[
					'label' => esc_html__( 'Hover', 'segovia-core' ),
				]
			);
			$this->add_control(
				'title_hover_color',
				[
					'label' => esc_html__( 'Color', 'segovia-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .service-item h3 a:hover' => 'color: {{VALUE}};',
					],
				]
			);
			$this->end_controls_tab();  // end:Hover tab
		$this->end_controls_tabs(); // end tabs
		$this->end_controls_section();// end: Section		

		// Content		
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
					'selector' => '{{WRAPPER}} .service-item p',
				]
			);
			$this->add_control(
				'content_color',
				[
					'label' => esc_html__( 'Color', 'segovia-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .service-item p' => 'color: {{VALUE}};',
					],
				]
			);
		$this->end_controls_section();// end: Section

		// Read More
		$this->start_controls_section(
			'section_readmore_style',
			[
				'label' => esc_html__( 'Read More', 'segovia-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->start_controls_tabs( 'read_style' );
			$this->start_controls_tab(
				'read_normal',
				[
					'label' => esc_html__( 'Normal', 'segovia-core' ),
				]
			);
			$this->add_control(
				'read_color',
				[
					'label' => esc_html__( 'Background', 'segovia-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .segva-read-more-btn' => 'background-color: {{VALUE}};',
					],
				]
			);
			$this->end_controls_tab();  // end:Normal tab
			$this->start_controls_tab(
				'read_hover',
				[
					'label' => esc_html__( 'Hover', 'segovia-core' ),
				]
			);
			$this->add_control(
				'read_hover_color',
				[
					'label' => esc_html__( 'Background', 'segovia-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .segva-read-more-btn:hover' => 'background-color: {{VALUE}};',
					],
				]
			);
			$this->end_controls_tab();  // end:Hover tab
		$this->end_controls_tabs(); // end tabs
		$this->end_controls_section();// end: Section		
		
	}

	/**
	 * Render App Works widget output on the frontend.
	 * Written in PHP and used to generate the final HTML.
	*/
	protected function render() {
		$settings = $this->get_settings_for_display();
		$upload_type = !empty( $settings['upload_type'] ) ? $settings['upload_type'] : '';
		$service_image = !empty( $settings['service_image']['id'] ) ? $settings['service_image']['id'] : '';	
		$service_icon = !empty( $settings['service_icon'] ) ? $settings['service_icon'] : '';	
		$read_icon = !empty( $settings['read_icon']['id'] ) ? $settings['read_icon']['id'] : '';	
		$services_title = !empty( $settings['services_title'] ) ? $settings['services_title'] : '';	
		$services_title_link = !empty( $settings['services_title_link']['url'] ) ? $settings['services_title_link']['url'] : '';
		$services_title_link_external = !empty( $settings['services_title_link']['is_external'] ) ? 'target="_blank"' : '';
		$services_title_link_nofollow = !empty( $settings['services_title_link']['nofollow'] ) ? 'rel="nofollow"' : '';
		$services_title_link_attr = !empty( $services_title_link ) ?  $services_title_link_external.' '.$services_title_link_nofollow : '';
		$services_content = !empty( $settings['services_content'] ) ? $settings['services_content'] : '';	

		$view_more_link = !empty( $settings['view_more_link']['url'] ) ? $settings['view_more_link']['url'] : '';
		$button_link_external = !empty( $settings['view_more_link']['is_external'] ) ? 'target="_blank"' : '';
		$view_more_link_nofollow = !empty( $settings['view_more_link']['nofollow'] ) ? 'rel="nofollow"' : '';
		$view_more_link_link_attr = !empty( $view_more_link ) ?  $button_link_external.' '.$view_more_link_nofollow : '';

		// Button
		// Image
		$read_image_url = wp_get_attachment_url( $read_icon );
		$segovia_read_alt = get_post_meta($read_icon, '_wp_attachment_image_alt', true);

		$read_image_url = $read_image_url ? $read_image_url : SEGOVIA_IMAGES.'/icons/service-arrow.png';

		$read_icon_actual = '<img src="'.$read_image_url.'" width="30" alt="'.$segovia_read_alt.'">';
		$button_link = $view_more_link ? '<a href="'. esc_url($view_more_link) .'" '.$view_more_link_link_attr.' class="segva-read-more-btn">'.$read_icon_actual.'</a>' : ''; 

		// Image
		$image_url = wp_get_attachment_url( $service_image );
		$segovia_alt = get_post_meta($service_image, '_wp_attachment_image_alt', true);

		$services_image = $image_url ? '<div class="segva-image"><img src="'.$image_url.'" width="92" alt="'.$segovia_alt.'"></div>' : '';
		$services_icon = $service_icon ? '<div class="segva-icon"><i class="'.$service_icon.'"></i></div>' : '';
		
		if($upload_type === 'image'){
		  $icon_main = $services_image;
		} else {
		  $icon_main = $services_icon;
		}
		$title_link = $services_title_link ? '<a href="'.$services_title_link.'" '.$services_title_link_attr.'>'.$services_title.'</a>' : $services_title;
		$title = $services_title ? '<h3 class="service-title">'.$title_link.'</h3><span class="segva-separator"></span>' : '';
		$content = $services_content ? '<p>'.$services_content.'</p>' : '';

		$output = '<div class="segva-services-wrap"> 
							    <div class="service-item">
							      '.$title.$content.$icon_main.$button_link.'
							    </div>
							</div>';
		echo $output;
		
	}

	/**
	 * Render Services widget output in the editor.
	 * Written as a Backbone JavaScript template and used to generate the live preview.
	*/
	
	//protected function _content_template(){}
	
}
Plugin::instance()->widgets_manager->register_widget_type( new Segovia_Services() );
