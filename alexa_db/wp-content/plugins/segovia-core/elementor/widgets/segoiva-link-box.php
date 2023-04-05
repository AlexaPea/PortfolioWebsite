<?php
/*
 * Elementor Segovia Looking For Widget
 * Author & Copyright: VictorTheme
*/

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Segovia_Looking extends Widget_Base{

	/**
	 * Retrieve the widget name.
	*/
	public function get_name(){
		return 'vt-segovia_linkbox';
	}

	/**
	 * Retrieve the widget title.
	*/
	public function get_title(){
		return esc_html__( 'Link Box', 'segovia-core' );
	}

	/**
	 * Retrieve the widget icon.
	*/
	public function get_icon() {
		return 'fa fa-eye';
	}

	/**
	 * Retrieve the list of categories the widget belongs to.
	*/
	public function get_categories() {
		return ['victortheme-category'];
	}

	/**
	 * Retrieve the list of scripts the Segovia Looking For widget depended on.
	 * Used to set scripts dependencies required to run the widget.
	*/
	/*
	public function get_script_depends() {
		return ['vt-segovia_linkbox'];
	}
	*/
	
	/**
	 * Register Segovia Looking For widget controls.
	 * Adds different input fields to allow the user to change and customize the widget settings.
	*/
	protected function _register_controls(){
		
		$this->start_controls_section(
			'section_linkbox',
			[
				'label' => __( 'Link Box Item', 'segovia-core' ),
			]
		);
			$this->add_control(
			'link_box_icon',
			[
				'label' => esc_html__( 'Icon', 'segovia-core' ),
				'type' => Controls_Manager::ICON,
				'options' => Controls_Helper_Output::get_include_icons(),
				'frontend_available' => true,
				'default' => 'fa fa-angle-right',
			]
		);
		$this->add_control(
			'linkbox_image',
			[
				'label' => esc_html__( 'Background Image', 'saaspot-core' ),
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
				'label_block' => true,
			]
		);
		$this->add_control(
			'linkbox_title',
			[
				'label' => esc_html__( 'Title Text', 'segovia-core' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( 'Title Text', 'segovia-core' ),
				'placeholder' => esc_html__( 'Type title text here', 'segovia-core' ),
				'label_block' => true,
			]
		);
		$this->add_control(
			'linkbox_title_link',
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
			'linkbox_content',
			[
				'label' => esc_html__( 'Content', 'segovia-core' ),
				'default' => esc_html__( 'your content text', 'segovia-core' ),
				'placeholder' => esc_html__( 'Type your content here', 'segovia-core' ),
				'type' => Controls_Manager::TEXTAREA,
				'label_block' => true,
			]
		);

		$this->add_control(
			'button_alignment',
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
			'section_linkbox_btn',
			[
				'label' => esc_html__( 'Button Options', 'segovia-core' ),
			]
		);
		$this->add_control(
			'linkbox_btn',
			[
				'label' => esc_html__( 'Button Text', 'segovia-core' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( 'Button Text', 'segovia-core' ),
				'placeholder' => esc_html__( 'Type btn text here', 'segovia-core' ),
				'label_block' => true,
			]
		);
		$this->add_control(
			'linkbox_btn_link',
			[
				'label' => esc_html__( 'Button Link', 'segovia-core' ),
				'type' => Controls_Manager::URL,
				'placeholder' => 'https://your-link.com',
				'default' => [
					'url' => '',
				],
				'label_block' => true,
			]
		);
		$this->add_control(
			'linkbox_btn_icon',
			[
				'label' => esc_html__( 'Icon', 'segovia-core' ),
				'type' => Controls_Manager::ICON,
				'options' => Controls_Helper_Output::get_include_icons(),
				'frontend_available' => true,
			]
		);
		$this->end_controls_section();// end: Section
		
		// Style
		$this->start_controls_section(
			'section_box_style',
			[
				'label' => esc_html__( 'Box', 'segovia-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
			$this->add_group_control(
				Group_Control_Border::get_type(),
				[
					'name' => 'box_border',
					'label' => esc_html__( 'Border', 'segovia-core' ),
					'selector' => '{{WRAPPER}} .linkbox-item, {{WRAPPER}} .linkbox-item.segva-hover .segva-btn',
				]
			);
			$this->add_control(
				'box_border_radius',
				[
					'label' => __( 'Border Radius', 'segovia-core' ),
					'type' => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%', 'em' ],
					'selectors' => [
						'{{WRAPPER}} .linkbox-item, {{WRAPPER}} .linkbox-item:before'  => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);
			$this->add_group_control(
				Group_Control_Box_Shadow::get_type(),
				[
					'name' => 'sasloo_section_box_shadow',
					'label' => esc_html__( 'Box Shadow', 'segovia-core' ),
					'selector' => '{{WRAPPER}} .linkbox-item',
				]
			);
			$this->add_control(
				'box_overlay_color',
				[
					'label' => esc_html__( 'Overlay Color', 'segovia-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .linkbox-item:before' => 'background-color: {{VALUE}};',
					],
				]
			);
		$this->end_controls_section();// end: Section

		$this->start_controls_section(
			'section_icon_style',
			[
				'label' => esc_html__( 'Icon', 'segovia-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
			$this->add_control(
				'top_icon_color',
				[
					'label' => esc_html__( 'Color', 'segovia-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .linkbox-item .link-top-icon i' => 'color: {{VALUE}};',
					],
				]
			);
			$this->add_responsive_control(
			'top_icon_size',
			[
				'label' => esc_html__( 'Size', 'segovia-core' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 10,
						'max' => 500,
						'step' => 1,
					],
				],
				'size_units' => [ 'px' ],
				'selectors' => [
					'{{WRAPPER}} .linkbox-item .link-top-icon i' => 'font-size: {{SIZE}}{{UNIT}};',
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
					'name' => 'sasloo_title_typography',					
					'selector' => '{{WRAPPER}} .linkbox-item h3',
				]
			);
			$this->add_control(
				'title_color',
				[
					'label' => esc_html__( 'Color', 'segovia-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .linkbox-item h3' => 'color: {{VALUE}};',
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
					'selector' => '{{WRAPPER}} .linkbox-item p',
				]
			);
			$this->add_control(
				'content_color',
				[
					'label' => esc_html__( 'Color', 'segovia-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .linkbox-item p' => 'color: {{VALUE}};',
					],
				]
			);
		$this->end_controls_section();// end: Section

		$this->start_controls_section(
			'section_button_style',
			[
				'label' => esc_html__( 'Button', 'segovia-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'button_typography',				
				'selector' => '{{WRAPPER}} .linkbox-item .segva-btn',
			]
		);
		$this->add_responsive_control(
			'button_min_width',
			[
				'label' => esc_html__( 'Width', 'segovia-core' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 10,
						'max' => 500,
						'step' => 1,
					],
				],
				'size_units' => [ 'px' ],
				'selectors' => [
					'{{WRAPPER}} .linkbox-item .segva-btn' => 'min-width: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'button_padding',
			[
				'label' => __( 'Padding', 'segovia-core' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .linkbox-item .segva-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'button_border_radius',
			[
				'label' => __( 'Border Radius', 'segovia-core' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .linkbox-item .segva-btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->start_controls_tabs( 'button_style' );
			$this->start_controls_tab(
				'button_normal',
				[
					'label' => esc_html__( 'Normal', 'segovia-core' ),
				]
			);
			$this->add_control(
				'button_color',
				[
					'label' => esc_html__( 'Color', 'segovia-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .linkbox-item .segva-btn' => 'color: {{VALUE}};',
					],
				]
			);
			$this->add_control(
				'button_bg_color',
				[
					'label' => esc_html__( 'Background Color', 'segovia-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .linkbox-item .segva-btn' => 'background-color: {{VALUE}};',
					],
				]
			);
			$this->add_group_control(
				Group_Control_Border::get_type(),
				[
					'name' => 'button_border',
					'label' => esc_html__( 'Border', 'segovia-core' ),
					'selector' => '{{WRAPPER}} .linkbox-item .segva-btn',
				]
			);
			$this->end_controls_tab();  // end:Normal tab
			
			$this->start_controls_tab(
				'button_hover',
				[
					'label' => esc_html__( 'Hover', 'segovia-core' ),
				]
			);
			$this->add_control(
				'button_hover_color',
				[
					'label' => esc_html__( 'Color', 'segovia-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .linkbox-item .segva-btn:hover, {{WRAPPER}} .linkbox-item.segva-hover .segva-btn' => 'color: {{VALUE}};',
					],
				]
			);
			$this->add_control(
				'button_bg_hover_color',
				[
					'label' => esc_html__( 'Background Color', 'segovia-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .linkbox-item .segva-btn:hover, {{WRAPPER}} .linkbox-item.segva-hover .segva-btn' => 'background-color: {{VALUE}};',
					],
				]
			);
			$this->add_group_control(
				Group_Control_Border::get_type(),
				[
					'name' => 'button_hover_border',
					'label' => esc_html__( 'Border', 'segovia-core' ),
					'selector' => '{{WRAPPER}} .linkbox-item .segva-btn:hover, {{WRAPPER}} .linkbox-item.segva-hover .segva-btn',
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
		$linkbox_image = !empty( $settings['linkbox_image']['id'] ) ? $settings['linkbox_image']['id'] : '';	
		$linkbox_title = !empty( $settings['linkbox_title'] ) ? $settings['linkbox_title'] : '';	
		$linkbox_title_link = !empty( $settings['linkbox_title_link']['url'] ) ? $settings['linkbox_title_link']['url'] : '';
		$linkbox_title_link_external = !empty( $settings['linkbox_title_link']['is_external'] ) ? 'target="_blank"' : '';
		$linkbox_title_link_nofollow = !empty( $settings['linkbox_title_link']['nofollow'] ) ? 'rel="nofollow"' : '';
		$linkbox_title_link_attr = !empty( $linkbox_title_link ) ?  $linkbox_title_link_external.' '.$linkbox_title_link_nofollow : '';

		$linkbox_content = !empty( $settings['linkbox_content'] ) ? $settings['linkbox_content'] : '';	
		$linkbox_btn = !empty( $settings['linkbox_btn'] ) ? $settings['linkbox_btn'] : '';	
		$linkbox_btn_link = !empty( $settings['linkbox_btn_link']['url'] ) ? $settings['linkbox_btn_link']['url'] : '';
		$linkbox_btn_link_external = !empty( $settings['linkbox_btn_link']['is_external'] ) ? 'target="_blank"' : '';
		$linkbox_btn_link_nofollow = !empty( $settings['linkbox_btn_link']['nofollow'] ) ? 'rel="nofollow"' : '';
		$linkbox_btn_link_attr = !empty( $linkbox_btn_link ) ?  $linkbox_btn_link_external.' '.$linkbox_btn_link_nofollow : '';

		$link_box_icon = !empty( $settings['link_box_icon'] ) ? $settings['link_box_icon'] : '';
		$link_icon = $link_box_icon  ? '<span class="link-top-icon"><i class="'.$link_box_icon .'" aria-hidden="true"></i></span>' : '';

		$linkbox_btn_icon = !empty( $settings['linkbox_btn_icon'] ) ? $settings['linkbox_btn_icon'] : '';	

		$image_url = wp_get_attachment_url( $linkbox_image );


		$title_link = $linkbox_title_link ? '<a href="'.$linkbox_title_link.'">'.$linkbox_title.'</a>' : $linkbox_title;
		$title = $linkbox_title ? '<h3 class="linkbox-title">'.$title_link.'</h3>' : '';
		$content = $linkbox_content ? '<p>'.$linkbox_content.'</p>' : '';
		$icon = $linkbox_btn_icon ? ' <i class="'.$linkbox_btn_icon.'" aria-hidden="true"></i>' : '';
		$button = $linkbox_btn_link ? '<div class="segva-btn-wrap"><a href="'.esc_url($linkbox_btn_link).'" '.$linkbox_btn_link_attr .' class="segva-btn segva-light-blue-bdr-btn">'.$linkbox_btn.$icon.'</a></div>' : '<div class="segva-btn-wrap"><span class="segva-btn segva-light-blue-bdr-btn">'.$linkbox_btn.$icon.'</span></div>';

		$output = '<div class="linkbox-item" style="background-image: url('.$image_url.')"><span class="link-box-content">'.$link_icon.$title.$content.'</span>'.$button.'</div>';
		echo $output;
		
	}

	/**
	 * Render Looking For widget output in the editor.
	 * Written as a Backbone JavaScript template and used to generate the live preview.
	*/
	
	//protected function _content_template(){}
	
}
Plugin::instance()->widgets_manager->register_widget_type( new Segovia_Looking() );
