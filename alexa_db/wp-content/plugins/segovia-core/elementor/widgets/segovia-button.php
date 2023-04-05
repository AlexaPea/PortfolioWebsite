<?php
/*
 * Elementor Segovia Button Widget
 * Author & Copyright: VictorTheme
*/

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Segovia_Button extends Widget_Base{

	/**
	 * Retrieve the widget name.
	*/
	public function get_name(){
		return 'vt-segovia_button';
	}

	/**
	 * Retrieve the widget title.
	*/
	public function get_title(){
		return esc_html__( 'Button', 'segovia-core' );
	}

	/**
	 * Retrieve the widget icon.
	*/
	public function get_icon() {
		return 'fa fa-mouse-pointer';
	}

	/**
	 * Retrieve the list of categories the widget belongs to.
	*/
	public function get_categories() {
		return ['victortheme-category'];
	}

	/**
	 * Retrieve the list of scripts the Segovia Button widget depended on.
	 * Used to set scripts dependencies required to run the widget.
	*/
	/*
	public function get_script_depends() {
		return ['vt-segovia_button'];
	}
	*/
	
	/**
	 * Register Segovia Button widget controls.
	 * Adds different input fields to allow the user to change and customize the widget settings.
	*/
	protected function _register_controls(){
	

		$this->start_controls_section(
			'section_button_btn',
			[
				'label' => esc_html__( 'Button Options', 'segovia-core' ),
			]
		);
		$this->add_control(
			'button_btn',
			[
				'label' => esc_html__( 'Button Text', 'segovia-core' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( 'Button Text', 'segovia-core' ),
				'placeholder' => esc_html__( 'Type btn text here', 'segovia-core' ),
				'label_block' => true,
			]
		);
		$this->add_control(
			'button_btn_link',
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
			'icon_type',
			[
				'label' => __( 'Button Icon Type', 'segovia-core' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'image' => esc_html__( 'Image', 'segovia-core' ),
					'icon' => esc_html__( 'Icon', 'segovia-core' ),
				],
				'default' => 'image',
			]
		);
		$this->add_control(
			'button_btn_icon',
			[
				'label' => esc_html__( 'Icon', 'segovia-core' ),
				'type' => Controls_Manager::ICON,
				'options' => Controls_Helper_Output::get_include_icons(),
				'frontend_available' => true,
				'default' => 'fa fa-long-arrow-right',
				'condition' => [
					'icon_type' => 'icon',
				],
			]
		);
		$this->add_control(
			'choose_image',
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
		$this->add_responsive_control(
			'section_align',
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
				'default' => 'center',
				'selectors' => [
					'{{WRAPPER}} .segva-btn-wrap' => 'text-align: {{VALUE}};',
				],
			]
		);
		$this->end_controls_section();// end: Section

			
		// Button Animation
		$this->start_controls_section(
			'section_button_animation',
			[
				'label' => esc_html__( 'Button Animation', 'segovia-core' ),
			]
		);
		$this->add_control(
			'button_entrance_animation',
			[
				'label' => esc_html__( 'Button Entrance Animation', 'segovia-core' ),
				'type' => Controls_Manager::ANIMATION,
			]
		);
		$this->add_control(
			'button_animation_duartion',
			[
				'label' => esc_html__( 'Animation Duration', 'segovia-core' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( '1', 'segovia-core' ),
				'description' => esc_html__( 'Enter Animation duration in seconds Eg:1,2,3.', 'segovia-core' ),
				'label_block' => true,
			]
		);
		$this->add_control(
			'button_animation_delay',
			[
				'label' => esc_html__( 'Animation Delay', 'segovia-core' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( '1', 'segovia-core' ),
				'description' => esc_html__( 'Enter Animation delay in seconds Eg:1,2,3.', 'segovia-core' ),
				'label_block' => true,
			]
		);

		$this->end_controls_section();// end: Section

		// Button		
		$this->start_controls_section(
			'section_btn_style',
			[
				'label' => esc_html__( 'Button Style', 'segovia-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);		
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'button_typography',				
				'selector' => '{{WRAPPER}} .segva-btn',
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
					'{{WRAPPER}} .segva-btn' => 'min-width: {{SIZE}}{{UNIT}};',
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
					'{{WRAPPER}} .segva-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} .segva-btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->start_controls_tabs( 'btn_style' );
			$this->start_controls_tab(
				'btn_normal',
				[
					'label' => esc_html__( 'Normal', 'segovia-core' ),
				]
			);
			$this->add_control(
				'btn_text_color',
				[
					'label' => esc_html__( 'Text Color', 'segovia-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .segva-btn span' => 'color: {{VALUE}};',
					],
				]
			);
			$this->add_control(
				'btn_bg_color',
				[
					'label' => esc_html__( 'Button Background Color', 'segovia-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .segva-btn' => 'background-color: {{VALUE}};',
					],
				]
			);
			$this->add_control(
				'btn_border_color',
				[
					'label' => esc_html__( 'Button Border Color', 'segovia-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .segva-btn' => 'border-color: {{VALUE}};',
					],
				]
			);
			$this->end_controls_tab();  // end:Normal tab
			
			$this->start_controls_tab(
				'btn_hover',
				[
					'label' => esc_html__( 'Hover', 'segovia-core' ),
				]
			);
			$this->add_control(
				'btn_text_hover_color',
				[
					'label' => esc_html__( 'Text Color', 'segovia-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .segva-btn:hover span' => 'color: {{VALUE}};',
					],
				]
			);
			$this->add_control(
				'btn_bg_hover_color',
				[
					'label' => esc_html__( 'Button Background Color', 'segovia-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .segva-btn:hover' => 'background-color: {{VALUE}};',
					],
				]
			);
			$this->add_control(
				'btn_border_hover_color',
				[
					'label' => esc_html__( 'Button Border Color', 'segovia-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .segva-btn:hover' => 'border-color: {{VALUE}};',
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
	

		$button_btn = !empty( $settings['button_btn'] ) ? $settings['button_btn'] : '';	
		$button_btn_link = !empty( $settings['button_btn_link']['url'] ) ? $settings['button_btn_link']['url'] : '';
		$button_btn_link_external = !empty( $settings['button_btn_link']['is_external'] ) ? 'target="_blank"' : '';
		$button_btn_link_nofollow = !empty( $settings['button_btn_link']['nofollow'] ) ? 'rel="nofollow"' : '';
		$button_btn_link_attr = !empty( $button_btn_link ) ?  $button_btn_link_external.' '.$button_btn_link_nofollow : '';

		$button_btn_icon = !empty( $settings['button_btn_icon'] ) ? $settings['button_btn_icon'] : '';	
		$icon_type = !empty($settings['icon_type']) ? $settings['icon_type'] : '';
		$btn_icon_url = wp_get_attachment_url( $settings['choose_image']['id'], 'thumbnail' );
		$segovia_alt = get_post_meta($settings['choose_image']['id'], '_wp_attachment_image_alt', true);

		// Animation
		$img_entrance_animation = !empty( $settings['img_entrance_animation'] ) ? $settings['img_entrance_animation'] : '';
		$animation_duartion = !empty( $settings['animation_duartion'] ) ? $settings['animation_duartion'] : '';
		$animation_delay = !empty( $settings['animation_delay'] ) ? $settings['animation_delay'] : '';
		$button_animation_duartion = !empty( $settings['button_animation_duartion'] ) ? $settings['button_animation_duartion'] : '';
		$button_animation_delay = !empty( $settings['button_animation_delay'] ) ? $settings['button_animation_delay'] : '';
		$button_entrance_animation = !empty( $settings['button_entrance_animation'] ) ? $settings['button_entrance_animation'] : '';
		$button_entrance_animation = $button_entrance_animation ? $button_entrance_animation : '';
		$animation_duartion = $animation_duartion ? $animation_duartion : '1';
		$animation_delay = $animation_delay ? $animation_delay : '1';
		$button_animation_duartion = $button_animation_duartion ? $button_animation_duartion : '1';
		$button_animation_delay = $button_animation_delay ? $button_animation_delay : '1';

		// Image
	
		// Button Icon image
		$btn_image = $btn_icon_url ? '<img src="'. $btn_icon_url .'" width="15" alt="'.$segovia_alt.'">' : '';
		$icon = $button_btn_icon ? '<i class="'.$button_btn_icon.'" aria-hidden="true"></i>' : '';

		if($icon_type === 'icon') {
		  $icon_image = $icon;
		} else {
		  $icon_image = $btn_image;
		}
		
		$button = $button_btn_link ? '<div class="segva-btn-wrap wow '.$button_entrance_animation.'" data-wow-duration="'.$button_animation_duartion.'s" data-wow-delay="'.$button_animation_delay.'s"><a href="'.$button_btn_link.'" '.$button_btn_link_attr.' class="segva-btn"><span>'.$button_btn.$icon_image.'</span></a></div>' : '<div class="segva-btn-wrap wow '.$button_entrance_animation.'" data-wow-duration="'.$button_animation_duartion.'s" data-wow-delay="'.$button_animation_delay.'s"><div class="segva-btn"><span>'.$button_btn.$icon_image.'</span></div></div>';

			$output = '<div class="segva-button-content">
								          '.$button.'
								        </div>';
		echo $output;
		
	}

	/**
	 * Render Button widget output in the editor.
	 * Written as a Backbone JavaScript template and used to generate the live preview.
	*/
	
	//protected function _content_template(){}
	
}
Plugin::instance()->widgets_manager->register_widget_type( new Segovia_Button() );