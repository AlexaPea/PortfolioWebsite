<?php
/*
 * Elementor Segovia Intro For Widget
 * Author & Copyright: VictorTheme
*/

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Segovia_Intro extends Widget_Base{

	/**
	 * Retrieve the widget name.
	*/
	public function get_name(){
		return 'vt-segovia_intro';
	}

	/**
	 * Retrieve the widget title.
	*/
	public function get_title(){
		return esc_html__( 'Intro Box', 'segovia-core' );
	}

	/**
	 * Retrieve the widget icon.
	*/
	public function get_icon() {
		return 'fa fa-info';
	}

	/**
	 * Retrieve the list of categories the widget belongs to.
	*/
	public function get_categories() {
		return ['victortheme-category'];
	}

	/**
	 * Retrieve the list of scripts the Segovia Intro For widget depended on.
	 * Used to set scripts dependencies required to run the widget.
	*/
	/*
	public function get_script_depends() {
		return ['vt-segovia_intro'];
	}
	*/
	
	/**
	 * Register Segovia Intro For widget controls.
	 * Adds different input fields to allow the user to change and customize the widget settings.
	*/
	protected function _register_controls(){
		
		$this->start_controls_section(
			'section_intro',
			[
				'label' => __( 'Intro Box Item', 'segovia-core' ),
			]
		);
			$this->add_control(
			'intro_count_text',
			[
				'label' => esc_html__( 'Count Text', 'segovia-core' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( '01', 'segovia-core' ),
				'placeholder' => esc_html__( 'Type title count text here', 'segovia-core' ),
				'label_block' => true,
			]
		);
		$this->add_control(
			'intro_title',
			[
				'label' => esc_html__( 'Title Text', 'segovia-core' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( 'Define The Strategy', 'segovia-core' ),
				'placeholder' => esc_html__( 'Type title text here', 'segovia-core' ),
				'label_block' => true,
			]
		);
		$this->add_control(
			'intro_title_link',
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
			'intro_content',
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
					'{{WRAPPER}} .intro-item' => 'text-align: {{VALUE}};',
				],
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
					'selector' => '{{WRAPPER}} .intro-item',
				]
			);
			$this->add_control(
				'box_border_radius',
				[
					'label' => __( 'Border Radius', 'segovia-core' ),
					'type' => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%', 'em' ],
					'selectors' => [
						'{{WRAPPER}} .intro-item, {{WRAPPER}} .intro-item:before'  => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);
			$this->add_group_control(
				Group_Control_Box_Shadow::get_type(),
				[
					'name' => 'sasloo_section_box_shadow',
					'label' => esc_html__( 'Box Shadow', 'segovia-core' ),
					'selector' => '{{WRAPPER}} .intro-item',
				]
			);
				$this->add_control(
				'box_bg_color',
				[
					'label' => esc_html__( 'Background Color', 'segovia-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .intro-item ' => 'background-color: {{VALUE}};',
					],
				]
			);
		$this->end_controls_section();// end: Section

		$this->start_controls_section(
			'section_count_style',
			[
				'label' => esc_html__( 'Count', 'segovia-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'label' => esc_html__( 'Typography', 'segovia-core' ),
					'name' => 'sasloo_count_typography',					
					'selector' => '{{WRAPPER}} .intro-item h3.intro-count-text',
				]
			);
			$this->add_control(
				'top_count_color',
				[
					'label' => esc_html__( 'Color', 'segovia-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .intro-item h3.intro-count-text' => 'color: {{VALUE}};',
					],
				]
			);
				$this->add_group_control(
				Group_Control_Border::get_type(),
				[
					'name' => 'box_border_count',
					'label' => esc_html__( 'Border', 'segovia-core' ),
					'selector' => '{{WRAPPER}} .intro-item h3.intro-count-text',
				]
			);
			$this->add_control(
				'box_border_count_radius',
				[
					'label' => __( 'Border Radius', 'segovia-core' ),
					'type' => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%', 'em' ],
					'selectors' => [
						'{{WRAPPER}} .intro-item h3.intro-count-text'  => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'selector' => '{{WRAPPER}} .intro-item .intro-right h3.intro-title, {{WRAPPER}} .intro-item .intro-right h3.intro-title a',
				]
			);
			$this->add_control(
				'title_color',
				[
					'label' => esc_html__( 'Color', 'segovia-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .intro-item .intro-right h3.intro-title, {{WRAPPER}} .intro-item .intro-right h3.intro-title a' => 'color: {{VALUE}};',
					],
				]
			);
			$this->add_control(
				'title_hover_color',
				[
					'label' => esc_html__( 'Hover Color', 'segovia-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .intro-item .intro-right h3.intro-title a:hover' => 'color: {{VALUE}};',
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
					'selector' => '{{WRAPPER}} .intro-item .intro-box-content p',
				]
			);
			$this->add_control(
				'content_color',
				[
					'label' => esc_html__( 'Color', 'segovia-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .intro-item .intro-box-content p' => 'color: {{VALUE}};',
					],
				]
			);
		$this->end_controls_section();// end: Section

		
	}

	/**
	 * Render App Works widget output on the frontend.
	 * Written in PHP and used to generate the final HTML.
	*/
	protected function render() {
		$settings = $this->get_settings_for_display();	
		$intro_title = !empty( $settings['intro_title'] ) ? $settings['intro_title'] : '';	
		$intro_title_link = !empty( $settings['intro_title_link']['url'] ) ? $settings['intro_title_link']['url'] : '';
		$intro_title_link_external = !empty( $settings['intro_title_link']['is_external'] ) ? 'target="_blank"' : '';
		$intro_title_link_nofollow = !empty( $settings['intro_title_link']['nofollow'] ) ? 'rel="nofollow"' : '';
		$intro_title_link_attr = !empty( $intro_title_link ) ?  $intro_title_link_external.' '.$intro_title_link_nofollow : '';
		$intro_content = !empty( $settings['intro_content'] ) ? $settings['intro_content'] : '';	
		$button_alignment = !empty( $settings['button_alignment'] ) ? $settings['button_alignment'] : '';	
	
		$intro_count_text = !empty( $settings['intro_count_text'] ) ? $settings['intro_count_text'] : '';
		$intro_count_text = $intro_count_text ? '<h3 class="intro-count-text">'.$intro_count_text.'</h3>' : '';

		if($button_alignment === 'right') {
			$count_icon = 'count-right';
		} elseif($button_alignment === 'center') {
			$count_icon = 'count-center';
		} else {
			$count_icon = 'count-left';
		}

		$title_link = $intro_title_link ? '<a href="'.$intro_title_link.'">'.$intro_title.'</a>' : $intro_title;
		$title = $intro_title ? '<h3 class="intro-title">'.$title_link.'</h3>' : '';
		$content = $intro_content ? '<p>'.$intro_content.'</p>' : '';

		$output = '<div class="intro-item '.$count_icon.'"><div class="intro-box-content">'.$intro_count_text.' <div class="intro-right">'.$title.$content.'</div></div></div>';
		echo $output;
		
	}

	/**
	 * Render Intro For widget output in the editor.
	 * Written as a Backbone JavaScript template and used to generate the live preview.
	*/
	
	//protected function _content_template(){}
	
}
Plugin::instance()->widgets_manager->register_widget_type( new Segovia_Intro() );
