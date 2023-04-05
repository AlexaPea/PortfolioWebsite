<?php
/*
 * Elementor Segovia Section Title Widget
 * Author & Copyright: VictorTheme
*/

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Segovia_Progress_Bar extends Widget_Base{

	/**
	 * Retrieve the widget name.
	*/
	public function get_name(){
		return 'vt-segovia_progress_bar';
	}

	/**
	 * Retrieve the widget title.
	*/
	public function get_title(){
		return esc_html__( 'Progress Bar', 'segovia-core' );
	}

	/**
	 * Retrieve the widget icon.
	*/
	public function get_icon() {
		return 'fa fa-ellipsis-h';
	}

	/**
	 * Retrieve the list of categories the widget belongs to.
	*/
	public function get_categories() {
		return ['victortheme-category'];
	}

	/**
	 * Retrieve the list of scripts the Segovia Section Title widget depended on.
	 * Used to set scripts dependencies required to run the widget.
	*/
	/*
	public function get_script_depends() {
		return ['vt-segovia_progress_bar'];
	}
	*/
	
	/**
	 * Register Segovia Section Title widget controls.
	 * Adds different input fields to allow the user to change and customize the widget settings.
	*/
	protected function _register_controls(){
		
		$this->start_controls_section(
			'section_sect_setting',
			[
				'label' => esc_html__( 'Settings', 'segovia-core' ),
			]
		);
		$repeater = new Repeater();
		$repeater->add_control(
			'section_title',
			[
				'label' => esc_html__( 'Title', 'segovia-core' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => esc_html__( 'Section Title', 'segovia-core' ),
				'placeholder' => esc_html__( 'Type your title here', 'segovia-core' ),
			]
		);
		$repeater->add_control(
			'section_percentage',
			[
				'label' => esc_html__( 'Progress Percentage', 'segovia-core' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => esc_html__( '50', 'segovia-core' ),
				'placeholder' => esc_html__( 'Type your progress bar percentage here', 'segovia-core' ),
			]
		);
		$repeater->add_control(
			'section_percentage_symbol',
			[
				'label' => esc_html__( 'Progress Percentage Symbol', 'segovia-core' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => esc_html__( '%', 'segovia-core' ),
				'placeholder' => esc_html__( 'Type your progress bar percentage symbol here', 'segovia-core' ),
			]
		);
		$this->add_control(
			'listItems_groups',
			[
				'label' => esc_html__( 'Progress Items', 'segovia-core' ),
				'type' => Controls_Manager::REPEATER,
				'default' => [
					[
						'section_title' => esc_html__( 'Item #1', 'segovia-core' ),
					],
					
				],
				'fields' => $repeater->get_controls(),
				'title_field' => '{{{ section_title }}}',
			]
		);

		$this->end_controls_section();// end: Section

		// Title
		$this->start_controls_section(
			'section_title_style',
			[
				'label' => esc_html__( 'Title/Percentage Value', 'segovia-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'sassect_title_typography',				
				'selector' => '{{WRAPPER}} .progress-item h4, {{WRAPPER}} .progress-counter, {{WRAPPER}} .prgrs-cntr-prcnt',
			]
		);
		$this->add_control(
			'title_color',
			[
				'label' => esc_html__( 'Color', 'segovia-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .progress-item h4, {{WRAPPER}} .progress-counter, {{WRAPPER}} .prgrs-cntr-prcnt' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_responsive_control(
			'title_bottom_space',
			[
				'label' => esc_html__( 'Bottom space', 'segovia-core' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 500,
						'step' => 2,
					],
				],
				'size_units' => [ 'px' ],
				'selectors' => [
					'{{WRAPPER}} .progress-item h4' => 'padding-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_section();// end: Section

		// Bar Color
		$this->start_controls_section(
			'section_progress_bar_style',
			[
				'label' => esc_html__( 'Progress Bar', 'segovia-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'item_padding',
			[
				'label' => __( 'Item Padding', 'segovia-core' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .progress-item' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'bar_color',
			[
				'label' => esc_html__( 'Bar Color', 'segovia-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .progress' => 'background-color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'bar_fill_color',
			[
				'label' => esc_html__( 'Bar Fill Color', 'segovia-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .progress-bar' => 'background-color: {{VALUE}};',
				],
			]
		);		
		$this->end_controls_section();// end: Section

	}

	/**
	 * Render Section Title widget output on the frontend.
	 * Written in PHP and used to generate the final HTML.
	*/
	protected function render() {
		$settings = $this->get_settings_for_display();
		$listItems_groups = !empty( $settings['listItems_groups'] ) ? $settings['listItems_groups'] : [];

		$output = '<div class="progress-wrap">';
		if( is_array( $listItems_groups ) && !empty( $listItems_groups ) ){
		  foreach ( $listItems_groups as $each_list ) {
		
			$section_title = !empty( $each_list['section_title'] ) ? $each_list['section_title'] : '';
			$section_percentage = !empty( $each_list['section_percentage'] ) ? $each_list['section_percentage'] : '';
			$symbol = !empty( $each_list['section_percentage_symbol'] ) ? $each_list['section_percentage_symbol'] : '';

			$sec_title = $section_title ? '<h4 class="progress-title">'.$section_title.'</h4>' : '';
			$section_percentage_new = $section_percentage ? '<div class="progress-bar" role="progressbar" aria-valuenow="'.$section_percentage.'" aria-valuemin="0" aria-valuemax="100"><span class="progress-counter"></span></div>' : '';

			$output .='<div class="progress-item">'.$sec_title.'<span class="prgrs-cntr-prcnt">'.$section_percentage.$symbol.'</span><div class="progress">'.$section_percentage_new.'</div></div>';
			}
		}
		$output .= '</div>';
		echo $output;
		
	}

	/**
	 * Render Section Title widget output in the editor.
	 * Written as a Backbone JavaScript template and used to generate the live preview.
	*/
	
	//protected function _content_template(){}
	
}
Plugin::instance()->widgets_manager->register_widget_type( new Segovia_Progress_Bar() );
