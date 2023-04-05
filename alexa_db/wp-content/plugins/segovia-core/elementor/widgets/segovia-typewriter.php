<?php
/*
 * Elementor Segovia Typewriter Widget
 * Author & Copyright: VictorTheme
*/

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Segovia_TypeWriter extends Widget_Base{

	/**
	 * Retrieve the widget name.
	*/
	public function get_name(){
		return 'vt-segovia_type_writers';
	}

	/**
	 * Retrieve the widget title.
	*/
	public function get_title(){
		return esc_html__( 'Type Writer', 'segovia-core' );
	}

	/**
	 * Retrieve the widget icon.
	*/
	public function get_icon() {
		return 'fa fa-hashtag';
	}

	/**
	 * Retrieve the list of categories the widget belongs to.
	*/
	public function get_categories() {
		return ['victortheme-category'];
	}

	/**
	 * Retrieve the list of scripts the Segovia Typewriter widget depended on.
	 * Used to set scripts dependencies required to run the widget.
	*/
	/*
	public function get_script_depends() {
		return ['vt-segovia_list'];
	}
	*/
	
	/**
	 * Register Segovia Typewriter widget controls.
	 * Adds different input fields to allow the user to change and customize the widget settings.
	*/
	protected function _register_controls(){
		
		$this->start_controls_section(
			'section_type_writers',
			[
				'label' => esc_html__( 'Type Writer Options', 'segovia-core' ),
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
				'default' => 'center',
				'selectors' => [
					'{{WRAPPER}}' => 'text-align: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'type_main_text',
			[
				'label' => esc_html__( 'Main Text', 'segovia-core' ),
				'type' => Controls_Manager::TEXT,
				'placeholder' => esc_html__( 'Enter main text here', 'segovia-core' ),
				'label_block' => true,
			]
		);

		$repeater = new Repeater();
		
		$repeater->add_control(
			'type_text',
			[
				'label' => esc_html__( 'Typing Text', 'segovia-core' ),
				'type' => Controls_Manager::TEXT,
				'placeholder' => esc_html__( 'Enter type text here', 'segovia-core' ),
				'label_block' => true,
			]
		);
		
		$this->add_control(
			'listItems_groups',
			[
				'label' => esc_html__( 'Type Writers', 'segovia-core' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
			
			]
		);
		$this->end_controls_section();// end: Section
		
		// Button
		$this->start_controls_section(
			'typewriter_text_style',
			[
				'label' => esc_html__( 'Type Writer Section', 'segovia-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'button_typography',				
				'selector' => '{{WRAPPER}} .segva-big-title-wrap .big-title',
			]
		);
		$this->add_control(
			'main_text_color',
			[
				'label' => esc_html__( 'Main Text Color', 'segovia-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .segva-typewriter .main-text' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'typer_text_color',
			[
				'label' => esc_html__( 'Type Writer Text Color', 'segovia-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .segva-typewriter .typewriter-caption' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'typer_text_border_color',
			[
				'label' => esc_html__( 'Type Writer Border & Cursor Color', 'segovia-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .typewriter-caption:after, {{WRAPPER}} .typewriter-caption:before' => 'background: {{VALUE}};',
				],
			]
		);
		$this->end_controls_section();// end: Section
	}

	/**
	 * Render Typewriter widget output on the frontend.
	 * Written in PHP and used to generate the final HTML.
	*/
	protected function render() {
		$settings = $this->get_settings_for_display();
		$type_main_text = !empty( $settings['type_main_text'] ) ? $settings['type_main_text'] : [];

		$listItems_groups = !empty( $settings['listItems_groups'] ) ? $settings['listItems_groups'] : [];
		
	  $output = '<div class="segva-big-title-wrap">
          <div class="big-title segva-typewriter">
            <span class="main-text">'.$type_main_text.'</span> <div id="typed-strings">'
            ;

		// Group Param Output
		if( is_array( $listItems_groups ) && !empty( $listItems_groups ) ){
		  foreach ( $listItems_groups as $each_list ) {

		  $type_text = !empty( $each_list['type_text'] ) ? $each_list['type_text'] : '';

			
		  $output .= '<span>'.$type_text.'</span>';

		  }
		}

		$output .= '</div><div class="typewriter-caption" id="typed"></div></div>
        </div>';

		echo $output;
		
	}

	/**
	 * Render Typewriter widget output in the editor.
	 * Written as a Backbone JavaScript template and used to generate the live preview.
	*/
	
	//protected function _content_template(){}
	
}
Plugin::instance()->widgets_manager->register_widget_type( new Segovia_TypeWriter() );
