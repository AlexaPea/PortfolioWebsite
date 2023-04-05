<?php
/*
 * Elementor Segovia Circle Progress Bar Widget
 * Author & Copyright: VictorTheme
*/

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Segovia_Circle_Progress extends Widget_Base{

	/**
	 * Retrieve the widget name.
	*/
	public function get_name(){
		return 'vt-segovia_circle_progress';
	}

	/**
	 * Retrieve the widget title.
	*/
	public function get_title(){
		return esc_html__( 'Circle Progress Bar', 'segovia-core' );
	}

	/**
	 * Retrieve the widget icon.
	*/
	public function get_icon() {
		return 'fa fa-circle-o-notch';
	}

	/**
	 * Retrieve the list of categories the widget belongs to.
	*/
	public function get_categories() {
		return ['victortheme-category'];
	}

	/**
	 * Retrieve the list of scripts the Segovia Circle Progress Bar widget depended on.
	 * Used to set scripts dependencies required to run the widget.
	*/
	public function get_script_depends() {
		return ['vt-segovia_circle_progress'];
	}
	
	/**
	 * Register Segovia Circle Progress Bar widget controls.
	 * Adds different input fields to allow the user to change and customize the widget settings.
	*/
	protected function _register_controls(){
		
		$this->start_controls_section(
			'section_circle_progress',
			[
				'label' => esc_html__( 'Circle Progress Options', 'segovia-core' ),
			]
		);
		$this->add_control(
			'progress_title',
			[
				'label' => esc_html__( 'Title', 'segovia-core' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => esc_html__( 'Default title', 'segovia-core' ),
				'placeholder' => esc_html__( 'Type your counter title here', 'segovia-core' ),
			]
		);
		$this->add_control(
			'progress_value',
			[
				'label' => esc_html__( 'Value', 'segovia-core' ),
				'type' => Controls_Manager::NUMBER,
				'min' => 1,
				'step' => 1,
				'default' => 90,
				'description' => esc_html__( 'Type your counter value here', 'segovia-core' ),
			]
		);
		$this->add_control(
			'progress_value_in',
			[
				'label' => esc_html__( 'Value In', 'segovia-core' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => esc_html__( '%', 'segovia-core' ),
				'placeholder' => esc_html__( 'Type your counter value here', 'segovia-core' ),
			]
		);
		$this->add_control(
			'section_size',
			[
				'label' => esc_html__( 'Circle Size', 'segovia-core' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => esc_html__( '170', 'segovia-core' ),
				'placeholder' => esc_html__( 'Type your circle size', 'segovia-core' ),
			]
		);
		$this->end_controls_section();// end: Section


		// General
		$this->start_controls_section(
			'section_general_style',
			[
				'label' => esc_html__( 'General', 'segovia-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'frontend_available' => true,
			]
		);
		$this->add_control(
			'circle_bg_color',
			[
				'label' => esc_html__( 'Background Color', 'segovia-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .circle-progressbar canvas' => 'background: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'fill_color',
			[
				'label' => esc_html__( 'Fill Color', 'segovia-core' ),
				'type' => Controls_Manager::COLOR,
			]
		);
		$this->add_control(
			'empty_color',
			[
				'label' => esc_html__( 'Empty Fill Color', 'segovia-core' ),
				'type' => Controls_Manager::COLOR,
			]
		);
		$this->end_controls_section();// end: Section

		$this->start_controls_section(
			'section_title_style',
			[
				'label' => esc_html__( 'Title', 'segovia-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'progress_title!' => '',
				],
				'frontend_available' => true,
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',				
				'selector' => '{{WRAPPER}} .stats-item p',
			]
		);
		$this->add_control(
			'title_color',
			[
				'label' => esc_html__( 'Color', 'segovia-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .stats-item p' => 'color: {{VALUE}};',
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
					'progress_value!' => '',
				],
				'frontend_available' => true,
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'value_typography',
				'selector' => '{{WRAPPER}} .circle-counter',
			]
		);
		$this->add_control(
			'value_color',
			[
				'label' => esc_html__( 'Color', 'segovia-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .circle-counter' => 'color: {{VALUE}};',
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
					'progress_value_in!' => '',
				],
				'frontend_available' => true,
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'value_in_typography',
				'selector' => '{{WRAPPER}} .valuein',
			]
		);
		$this->add_control(
			'value_in_color',
			[
				'label' => esc_html__( 'Color', 'segovia-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .valuein' => 'color: {{VALUE}};',
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
		$progress_title = !empty( $settings['progress_title'] ) ? $settings['progress_title'] : '';
		$progress_value = !empty( $settings['progress_value'] ) ? $settings['progress_value'] : '';
		$progress_value_in = !empty( $settings['progress_value_in'] ) ? $settings['progress_value_in'] : '';
		$section_size = !empty( $settings['section_size'] ) ? $settings['section_size'] : '';
		$fill_color = !empty( $settings['fill_color'] ) ? $settings['fill_color'] : '';
		$empty_color = !empty( $settings['empty_color'] ) ? $settings['empty_color'] : '';

		$fill_color_actual = $fill_color ? $fill_color : '#101014';
    $empty_fill_actual = $empty_color ? $empty_color : '#ffffff';

		// Counter Title
		$progress_title = $progress_title ? '<p>'.$progress_title.'</p>' : '';

		// ValueIn
		$progress_value_in = $progress_value_in ? $progress_value_in : '%';
		$data_val = $progress_value ? $progress_value / 100 : '';


		// Counters
		$output = '<div class="stats-item">
						    <div class="circle-progressbar" data-value="'.$data_val.'" data-size="'.$section_size.'" data-color="'.$fill_color_actual.'" data-empty="'.$empty_fill_actual.'">
						      <h3 class="circle-progressbar-counter"><span class="circle-counter">'.$progress_value.'</span><span class="valuein">'.$progress_value_in.'</span></h3>
						    </div>
						    '.$progress_title.'
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
Plugin::instance()->widgets_manager->register_widget_type( new Segovia_Circle_Progress() );
