<?php
/*
 * Elementor Segovia Simple List Widget
 * Author & Copyright: VictorTheme
*/

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Segovia_Simple_List extends Widget_Base{

	/**
	 * Retrieve the widget name.
	*/
	public function get_name(){
		return 'vt-segovia_simple_list';
	}

	/**
	 * Retrieve the widget title.
	*/
	public function get_title(){
		return esc_html__( 'Simple List Item', 'segovia-core' );
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
	 * Retrieve the list of scripts the Segovia Simple List widget depended on.
	 * Used to set scripts dependencies required to run the widget.
	*/
	/*
	public function get_script_depends() {
		return ['vt-segovia_simple_list'];
	}
	*/
	
	/**
	 * Register Segovia Simple List widget controls.
	 * Adds different input fields to allow the user to change and customize the widget settings.
	*/
	protected function _register_controls(){
		
		$this->start_controls_section(
			'simple_list',
			[
				'label' => __( 'Simple List Item', 'segovia-core' ),
			]
		);

		$this->add_control(
			'simple_list_title',
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
					'selector' => '{{WRAPPER}} .simple-list-info .simple-list-title',
				]
			);

			$this->add_control(
				'title_color',
				[
					'label' => esc_html__( 'Color', 'segovia-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .simple-list-info .simple-list-title' => 'color: {{VALUE}};',
					],
				]
			);
			$this->add_control(
				'title_underline_color',
				[
					'label' => esc_html__( 'Separator Color', 'segovia-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .simple-list-title:after' => 'background: {{VALUE}};',
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
					'selector' => '{{WRAPPER}} .simple-list-info p',
				]
			);
			$this->add_control(
				'content_color',
				[
					'label' => esc_html__( 'Color', 'segovia-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .simple-list-info p' => 'color: {{VALUE}};',
					],
				]
			);
		$this->end_controls_section();// end: Section
		
	}

	/**
	 * Render Tools widget output on the frontend.
	 * Written in PHP and used to generate the final HTML.
	*/
	protected function render() {
		// Tools query
		$settings = $this->get_settings_for_display();
		$simple_list_style = !empty( $settings['simple_list_style'] ) ? $settings['simple_list_style'] : [];

		$output = '';

			$output .= '<div class="segva-simple-list">';

			// Group Param Output	

		  $content = !empty( $settings['tools_content'] ) ? '<p>'.$settings['tools_content'].'</p>' : '';

			$title = !empty( $settings['simple_list_title'] ) ? '<p class="simple-list-title">'.$settings['simple_list_title'].'</p>' : '';

		  $output .= '<div class="simple-list-item ">
                    <div class="simple-list-info">
                      '.$title.$content.'
                    </div>
                  </div> ';

			$output .='</div>';

			echo $output;
		
	}

	/**
	 * Render Simple List Item widget output in the editor.
	 * Written as a Backbone JavaScript template and used to generate the live preview.
	*/
	
	//protected function _content_template(){}
	
}
Plugin::instance()->widgets_manager->register_widget_type( new Segovia_Simple_List() );

