<?php
/*
 * Elementor Segovia Counter Widget
 * Author & Copyright: VictorTheme
*/

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Segovia_Counter extends Widget_Base{

	/**
	 * Retrieve the widget name.
	*/
	public function get_name(){
		return 'vt-segovia_counter';
	}

	/**
	 * Retrieve the widget title.
	*/
	public function get_title(){
		return esc_html__( 'Counter', 'segovia-core' );
	}

	/**
	 * Retrieve the widget icon.
	*/
	public function get_icon() {
		return 'fa fa-sort-numeric-asc';
	}

	/**
	 * Retrieve the list of categories the widget belongs to.
	*/
	public function get_categories() {
		return ['victortheme-category'];
	}

	/**
	 * Retrieve the list of scripts the Segovia Counter widget depended on.
	 * Used to set scripts dependencies required to run the widget.
	*/
	public function get_script_depends() {
		return ['vt-segovia_counter'];
	}
	
	/**
	 * Register Segovia Counter widget controls.
	 * Adds different input fields to allow the user to change and customize the widget settings.
	*/
	protected function _register_controls(){
		
		$this->start_controls_section(
			'section_counter',
			[
				'label' => esc_html__( 'Counter Options', 'segovia-core' ),
			]
		);
		$this->add_control(
			'counter_title',
			[
				'label' => esc_html__( 'Title', 'segovia-core' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => esc_html__( 'Default title', 'segovia-core' ),
				'placeholder' => esc_html__( 'Type your counter title here', 'segovia-core' ),
			]
		);
		$this->add_control(
			'counter_value',
			[
				'label' => esc_html__( 'Value', 'segovia-core' ),
				'type' => Controls_Manager::NUMBER,
				'min' => 1,
				'step' => 1,
				'default' => 100,
				'description' => esc_html__( 'Type your counter value here', 'segovia-core' ),
			]
		);
		$this->add_control(
			'counter_value_in',
			[
				'label' => esc_html__( 'Value In', 'segovia-core' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => esc_html__( '+', 'segovia-core' ),
				'placeholder' => esc_html__( 'Type your counter value here', 'segovia-core' ),
			]
		);
		$this->add_control(
			'need_light_value',
			[
				'label' => esc_html__( 'Need Light Value', 'segovia-core' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Yes', 'segovia-core' ),
				'label_off' => esc_html__( 'No', 'segovia-core' ),
				'return_value' => 'true',
				'default' => 'false',
			]
		);
		$this->add_control(
			'need_border',
			[
				'label' => esc_html__( 'Need Separator Image', 'segovia-core' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Yes', 'segovia-core' ),
				'label_off' => esc_html__( 'No', 'segovia-core' ),
				'return_value' => 'true',
				'default' => 'false',
			]
		);
		$this->add_control(
			'seperator_image',
			[
				'label' => esc_html__( 'Upload Separator Image', 'segovia-core' ),
				'type' => Controls_Manager::MEDIA,
				'condition' => [
					'need_border' => 'true',
				],
				'default' => [
					'url' => '',
				],
				'description' => esc_html__( 'Set your separator image.', 'segovia-core'),
				'selectors' => [
					'{{WRAPPER}} .counter-item span.segva-separator' => 'background-image: url({{url}});',
				],
			]
		);
		$this->add_responsive_control(
				'content_bottom_space',
				[
					'label' => esc_html__( 'Bottom space', 'segovia-core' ),
					'type' => Controls_Manager::SLIDER,
					'range' => [
						'px' => [
							'min' => -100,
							'max' => 500,
							'step' => 2,
						],
					],
					'size_units' => [ 'px', '%' ],
					'condition' => [
						'need_border' => 'true',
					],
					'selectors' => [
						'{{WRAPPER}} .counter-item span.segva-separator' => 'right: {{SIZE}}{{UNIT}};',
					],
				]
			);
		$this->add_responsive_control(
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
					'{{WRAPPER}} .counter-item' => 'text-align: {{VALUE}};',
				],
			]
		);

		$this->end_controls_section();// end: Section

		$this->start_controls_section(
			'section_title_style',
			[
				'label' => esc_html__( 'Title', 'segovia-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'counter_title!' => '',
				],
				'frontend_available' => true,
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'sascou_title_typography',				
				'selector' => '{{WRAPPER}} h4.conter-title',
			]
		);
		$this->add_control(
			'title_color',
			[
				'label' => esc_html__( 'Color', 'segovia-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} h4.conter-title' => 'color: {{VALUE}};',
				],
			]
		);
		$this->end_controls_section();// end: Section
		
		$this->start_controls_section(
			'section_value_style',
			[
				'label' => esc_html__( 'Value', 'segovia-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'counter_value!' => '',
				],
				'frontend_available' => true,
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'value_typography',
				'selector' => '{{WRAPPER}} .counter .counter-number',
			]
		);
		$this->add_control(
			'value_color',
			[
				'label' => esc_html__( 'Color', 'segovia-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .counter .counter-number' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'title_shadow_color',
			[
				'label' => esc_html__( 'Shadow Color', 'segovia-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .counter-item h2' => 'text-shadow: 0 8px {{VALUE}};',
				],
			]
		);
		$this->end_controls_section();// end: Section
		
		$this->start_controls_section(
			'section_value_in_style',
			[
				'label' => esc_html__( 'Value In', 'segovia-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'counter_value_in!' => '',
				],
				'frontend_available' => true,
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'value_in_typography',
				'selector' => '{{WRAPPER}} .counter .counter-type ',
			]
		);
		$this->add_control(
			'value_in_color',
			[
				'label' => esc_html__( 'Color', 'segovia-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .counter .counter-type' => 'color: {{VALUE}};',
				],
			]
		);
		$this->end_controls_section();// end: Section
				
	}

	/**
	 * Render Counter widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	*/
	protected function render() {
		$settings = $this->get_settings_for_display();
		$counter_title = !empty( $settings['counter_title'] ) ? $settings['counter_title'] : '';
		$counter_value = !empty( $settings['counter_value'] ) ? $settings['counter_value'] : '';
		$counter_value_in = !empty( $settings['counter_value_in'] ) ? $settings['counter_value_in'] : '';
		$need_light_value  = ( isset( $settings['need_light_value'] ) && ( 'true' == $settings['need_light_value'] ) ) ? true : false;
		$need_border  = ( isset( $settings['need_border'] ) && ( 'true' == $settings['need_border'] ) ) ? true : false;
		
		// Counter Title
		$counter_title = $counter_title ? '<h4 class="conter-title">'. $counter_title .'</h4>' : '';

		if($need_light_value) {
		  $light_cls = ' light';
		} else {
		  $light_cls = '';
		}

		if($need_border) {
			$border = '<span class="segva-separator"></span>';
		} else {
			$border = '';
		}


		// Value
		$counter_value = $counter_value ? '<h2 class="counter"><span class="counter-number">'.$counter_value.'</span><span class="counter-type '.$light_cls.'">'.$counter_value_in.'</span></h2>' :'';

		// Counters
		 $output = '<div class="segva-item counter-item">
            '.$counter_value.''. $counter_title .''.$border.'
          </div>';

		// Output
		echo $output;
		
	}

	/**
	 * Render Counter widget output in the editor.
	 * Written as a Backbone JavaScript template and used to generate the live preview.
	*/
	 
	//protected function _content_template(){}
	
}
Plugin::instance()->widgets_manager->register_widget_type( new Segovia_Counter() );