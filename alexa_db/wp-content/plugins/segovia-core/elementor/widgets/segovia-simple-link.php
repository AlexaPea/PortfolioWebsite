<?php
/*
 * Elementor Segovia Simple Link Widget
 * Author & Copyright: VictorTheme
*/

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Segovia_Simple_Link extends Widget_Base{

	/**
	 * Retrieve the widget name.
	*/
	public function get_name(){
		return 'vt-segovia_simple_link';
	}

	/**
	 * Retrieve the widget title.
	*/
	public function get_title(){
		return esc_html__( 'Simple Link', 'segovia-core' );
	}

	/**
	 * Retrieve the widget icon.
	*/
	public function get_icon() {
		return 'fa fa-link';
	}

	/**
	 * Retrieve the list of categories the widget belongs to.
	*/
	public function get_categories() {
		return ['victortheme-category'];
	}

	/**
	 * Retrieve the list of scripts the Segovia Simple Link widget depended on.
	 * Used to set scripts dependencies required to run the widget.
	*/
	/*
	public function get_script_depends() {
		return ['vt-segovia_simple_link'];
	}
	*/
	
	/**
	 * Register Segovia Simple Link widget controls.
	 * Adds different input fields to allow the user to change and customize the widget settings.
	*/
	protected function _register_controls(){
		
		$this->start_controls_section(
			'section_sect_setting',
			[
				'label' => esc_html__( 'Settings', 'segovia-core' ),
			]
		);

		$this->add_control(
			'readmore_title',
			[
				'label' => esc_html__( 'Read More Text', 'segovia-core' ),
				'type' => Controls_Manager::TEXT,
				'placeholder' => esc_html__( 'Read More', 'segovia-core' ),
				'label_block' => true,
			]
		);
		$this->add_control(
			'read_more_link',
			[
				'label' => esc_html__( 'Read More Link', 'segovia-core' ),
				'type' => Controls_Manager::URL,
				'placeholder' => 'https://your-link.com',
				'default' => [
					'url' => '',
				],
				'label_block' => true,
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
					'{{WRAPPER}} .segva-link-wrap' => 'text-align: {{VALUE}};',
				],
			]
		);
		$this->end_controls_section();// end: Section

		// Read More
		$this->start_controls_section(
			'section_rmore_style',
			[
				'label' => esc_html__( 'Read More', 'segovia-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'sasapp_rmore_typography',				
				'selector' => '{{WRAPPER}} .segva-link',
			]
		);

		$this->start_controls_tabs( 'rmore_style' );
			$this->start_controls_tab(
				'rmore_normal',
				[
					'label' => esc_html__( 'Normal', 'segovia-core' ),
				]
			);
			$this->add_control(
				'rmore_color',
				[
					'label' => esc_html__( 'Color', 'segovia-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .segva-link' => 'color: {{VALUE}};',
					],
				]
			);
			$this->add_control(
				'rmore_border_color',
				[
					'label' => esc_html__( 'Border Color', 'segovia-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .segva-link:after' => 'background: {{VALUE}};',
					],
				]
			);
			$this->end_controls_tab();  // end:Normal tab
			
			$this->start_controls_tab(
				'rmore_hover',
				[
					'label' => esc_html__( 'Hover', 'segovia-core' ),
				]
			);
			$this->add_control(
				'rmore_hover_color',
				[
					'label' => esc_html__( 'Color', 'segovia-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .segva-link:hover' => 'color: {{VALUE}};',
					],
				]
			);
			$this->end_controls_tab();  // end:Hover tab
		$this->end_controls_tabs(); // end tabs		
		$this->end_controls_section();// end: Section
		
	}

	/**
	 * Render Simple Link widget output on the frontend.
	 * Written in PHP and used to generate the final HTML.
	*/
	protected function render() {
		$settings = $this->get_settings_for_display();

		$section_align = !empty( $settings['section_align'] ) ? $settings['section_align'] : '';

		$readmore_title = !empty( $settings['readmore_title'] ) ? $settings['readmore_title'] : '';
		$read_more_link = !empty( $settings['read_more_link']['url'] ) ? $settings['read_more_link']['url'] : '';
		$read_more_link_external = !empty( $settings['read_more_link']['is_external'] ) ? 'target="_blank"' : '';
		$read_more_link_nofollow = !empty( $settings['read_more_link']['nofollow'] ) ? 'rel="nofollow"' : '';
		$read_more_link_attr = !empty( $read_more_link ) ?  $read_more_link_external.' '.$read_more_link_nofollow : '';
		$readmore = $read_more_link ? '<div class="segva-link-wrap simple-link"><a href="'.esc_url($read_more_link).'" '.$read_more_link_attr .' class="segva-link">'. $readmore_title.'</a></div>' : '<div class="segva-link-wrap simple-link"><span class="segva-link">'. $readmore_title.'</span></div>';
		$readmore_actual = $readmore_title ? $readmore : '';

		$output = '';

	  $output .= $readmore_actual;

		echo $output;
		
	}

	/**
	 * Render Simple Link widget output in the editor.
	 * Written as a Backbone JavaScript template and used to generate the live preview.
	*/
	
	//protected function _content_template(){}
	
}
Plugin::instance()->widgets_manager->register_widget_type( new Segovia_Simple_Link() );