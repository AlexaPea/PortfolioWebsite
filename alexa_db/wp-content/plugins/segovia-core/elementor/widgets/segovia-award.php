<?php
/*
 * Elementor Segovia Intro List Widget
 * Author & Copyright: VictorTheme
*/

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Segovia_award extends Widget_Base{

	/**
	 * Retrieve the widget name.
	*/
	public function get_name(){
		return 'vt-segovia_award';
	}

	/**
	 * Retrieve the widget title.
	*/
	public function get_title(){
		return esc_html__( 'Award', 'segovia-core' );
	}

	/**
	 * Retrieve the widget icon.
	*/
	public function get_icon() {
		return 'fa fa-trophy';
	}

	/**
	 * Retrieve the list of categories the widget belongs to.
	*/
	public function get_categories() {
		return ['victortheme-category'];
	}

	/**
	 * Retrieve the list of scripts the Segovia Intro List widget depended on.
	 * Used to set scripts dependencies required to run the widget.
	*/
	/*
	public function get_script_depends() {
		return ['vt-segovia_award'];
	}
	*/
	
	/**
	 * Register Segovia Intro List widget controls.
	 * Adds different input fields to allow the user to change and customize the widget settings.
	*/
	protected function _register_controls(){
		
		$this->start_controls_section(
			'award',
			[
				'label' => __( 'Award', 'segovia-core' ),
			]
		);

		$this->add_control(
			'award_year',
			[
				'label' => esc_html__( 'Award Year', 'segovia-core' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( '2011', 'segovia-core' ),
				'placeholder' => esc_html__( 'Type award here', 'segovia-core' ),
				'label_block' => true,
			]
		);
		$this->add_control(
			'award_title',
			[
				'label' => esc_html__( 'Title', 'segovia-core' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( 'Title', 'segovia-core' ),
				'placeholder' => esc_html__( 'Type title text here', 'segovia-core' ),
				'label_block' => true,
			]
		);
		$this->add_control(
			'award_content',
			[
				'label' => esc_html__( 'Content', 'segovia-core' ),
				'default' => esc_html__( 'your content text', 'segovia-core' ),
				'placeholder' => esc_html__( 'Type your content here', 'segovia-core' ),
				'type' => Controls_Manager::TEXTAREA,
				'label_block' => true,
			]
		);
		$this->add_control(
			'award_link_text',
			[
				'label' => esc_html__( 'Link Text', 'segovia-core' ),
				'type' => Controls_Manager::TEXT,
				'placeholder' => esc_html__( 'Type link text here', 'segovia-core' ),
				'label_block' => true,
			]
		);
		$this->add_control(
			'award_link_text_link',
			[
				'label' => esc_html__( 'Link', 'segovia-core' ),
				'type' => Controls_Manager::URL,
				'placeholder' => 'https://your-link.com',
				'default' => [
					'url' => '',
				],
				'label_block' => true,
			]
		);		
		
		$this->end_controls_section();// end: Section

		$this->start_controls_section(
			'section_year_style',
			[
				'label' => esc_html__( 'Year', 'segovia-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
			$this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'label' => esc_html__( 'Typography', 'segovia-core' ),
					'name' => 'sastool_year_typography',					
					'selector' => '{{WRAPPER}} .award-item .award-year',
				]
			);

			$this->add_control(
				'year_color',
				[
					'label' => esc_html__( 'Color', 'segovia-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .award-item .award-year' => 'color: {{VALUE}};',
					],
				]
			);

		$this->end_controls_section();// end: Section

		$this->start_controls_section(
			'section_award_title_style',
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
					'selector' => '{{WRAPPER}} .award-item .award-title',
				]
			);

			$this->add_control(
				'title_color',
				[
					'label' => esc_html__( 'Color', 'segovia-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .award-item .award-title' => 'color: {{VALUE}};',
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
					'selector' => '{{WRAPPER}} .award-item .award-info p',
				]
			);
			$this->add_control(
				'content_color',
				[
					'label' => esc_html__( 'Color', 'segovia-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .award-item .award-info p' => 'color: {{VALUE}};',
					],
				]
			);
		$this->end_controls_section();// end: Section

		// Left Section Link
		$this->start_controls_section(
			'bg_link_section',
			[
				'label' => esc_html__( 'Link', 'segovia-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'label' => esc_html__( 'Typography', 'segovia-core' ),
				'name' => 'bg_link_typography',
				'selector' => '{{WRAPPER}} .segva-border-link.arrow-btn .segva-link-btn',
			]
		);

		$this->add_responsive_control(
			'link_icon_size',
			[
				'label' => esc_html__( 'Link Icon Size', 'segovia-core' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 2,
						'max' => 120,
						'step' => 2,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .segva-border-link.arrow-btn .segva-link-btn i' => 'font-size: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->start_controls_tabs( 'award_title_style' );
		$this->start_controls_tab(
				'bg_title_normal',
				[
					'label' => esc_html__( 'Normal', 'segovia-core' ),
				]
			);
		$this->add_control(
			'bg_link_text_color',
			[
				'label' => esc_html__( 'Color', 'segovia-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .segva-border-link.arrow-btn .segva-link-btn' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
				'bg_link_border_color',
				[
					'label' => esc_html__( 'Link Icon Color', 'segovia-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .segva-border-link.arrow-btn .segva-link-btn i' => 'color: {{VALUE}};',
					],
				]
			);

		$this->end_controls_tab();  // end:Normal tab

			$this->start_controls_tab(
				'bg_title_hover',
				[
					'label' => esc_html__( 'Hover', 'segovia-core' ),
				]
			);

			$this->add_control(
				'bg_title_hover_color',
				[
					'label' => esc_html__( 'Color', 'segovia-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .segva-border-link.arrow-btn .segva-link-btn:hover' => 'color: {{VALUE}};',
					],
				]
			);
			$this->add_control(
				'bg_link_border_hover_color',
				[
					'label' => esc_html__( 'Link Icon Color', 'segovia-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .segva-border-link.arrow-btn .segva-link-btn:hover i' => 'color: {{VALUE}};',
					],
				]
			);

		$this->end_controls_tab();  // end:Hover tab
		$this->end_controls_tabs(); // end tabs

		$this->end_controls_section();// end: Section
		
	}

	/**
	 * Render Tools widget output on the frontend.
	 * Written in PHP and used to generate the final HTML.
	*/
	protected function render() {
		// Tools query
		$settings = $this->get_settings_for_display();
		$award_year = !empty( $settings['award_year'] ) ? $settings['award_year'] : [];
		$award_title = !empty( $settings['award_title'] ) ? $settings['award_title'] : [];
		$award_link_text = !empty( $settings['award_link_text'] ) ? $settings['award_link_text'] : '';

		$award_link_text_link = !empty( $settings['award_link_text_link'] ) ? $settings['award_link_text_link'] : '';
		$link_url = !empty( $award_link_text_link['url'] ) ? esc_url($award_link_text_link['url']) : '';
		$link_external = !empty( $award_link_text_link['is_external'] ) ? 'target="_blank"' : '';
		$link_nofollow = !empty( $award_link_text_link['nofollow'] ) ? 'rel="nofollow"' : '';
		$link_attr = !empty( $award_link_text_link['url'] ) ?  $link_external.' '.$link_nofollow : '';

		$title_link_main = $award_link_text_link ? '<div class="segva-border-link arrow-btn"><a href="'.$link_url.'" '.$link_attr.' class="segva-link-btn"> <i class="fa fa-long-arrow-right" aria-hidden="true"></i>'.$award_link_text.'</a></div>' : '<div class="segva-border-link"><span class="segva-link-btn"> '.$award_link_text.'</span></div>';

		$title_link_actual = $award_link_text ? $title_link_main : '';

		$output = '';

			$output .= '<div class="segva-award">';

			// Group Param Output
				$icon_type = !empty( $settings['icon_type'] ) ? $settings['icon_type'] : '';
	  		$icon = !empty( $settings['award_icon'] ) ? $settings['award_icon'] : '';

			
			  $content = !empty( $settings['award_content'] ) ? '<p>'.$settings['award_content'].'</p>' : '';

				$award_title = !empty( $settings['award_title'] ) ? '<h4 class="award-title">'.$award_title.'</h4>' : '';

			  $output .= '<div class="award-item "><div class="container"><div class="row">';

			  $output .='<div class="col-md-2"><span class="award-year">'.$award_year.'</span>
			  						</div>';

                $output .=   '<div class="col-md-10"><div class="award-info">
                      '.$award_title.$content.'
                      '.$title_link_actual.'
                    </div>
                  </div></div> ';

			$output .='</div></div></div>';

			echo $output;
		
	}

	/**
	 * Render Award widget output in the editor.
	 * Written as a Backbone JavaScript template and used to generate the live preview.
	*/
	
	//protected function _content_template(){}
	
}
Plugin::instance()->widgets_manager->register_widget_type( new Segovia_award() );

