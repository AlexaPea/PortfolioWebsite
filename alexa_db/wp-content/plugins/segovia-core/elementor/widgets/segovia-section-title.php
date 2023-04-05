<?php
/*
 * Elementor Segovia Section Title Widget
 * Author & Copyright: VictorTheme
*/

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Segovia_Section_Title extends Widget_Base{

	/**
	 * Retrieve the widget name.
	*/
	public function get_name(){
		return 'vt-segovia_section_title';
	}

	/**
	 * Retrieve the widget title.
	*/
	public function get_title(){
		return esc_html__( 'Section Title', 'segovia-core' );
	}

	/**
	 * Retrieve the widget icon.
	*/
	public function get_icon() {
		return 'fa fa-header';
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
		return ['vt-segovia_section_title'];
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

		$this->add_control(
			'section_title',
			[
				'label' => esc_html__( 'Title', 'segovia-core' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => esc_html__( 'Title', 'segovia-core' ),
				'placeholder' => esc_html__( 'Type your title here', 'segovia-core' ),

			]
		);
		$this->add_control(
			'section_sec_title',
			[
				'label' => esc_html__( 'Secondary Title', 'segovia-core' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => esc_html__( 'Secondary Title', 'segovia-core' ),
				'placeholder' => esc_html__( 'Type your secondary title here', 'segovia-core' ),

			]
		);
		$this->add_control(
			'need_icon',
			[
				'label' => esc_html__( 'Hide Icon Image', 'segovia-core' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Yes', 'segovia-core' ),
				'label_off' => esc_html__( 'No', 'segovia-core' ),
				'return_value' => 'true',
			]
		);
		$this->add_control(
			'icon_image',
			[
				'label' => esc_html__( 'Upload Icon Image', 'segovia-core' ),
				'type' => Controls_Manager::MEDIA,
				'condition' => [
					'need_icon!' => 'true',
				],
				'default' => [
					'url' => '',
				],
				'description' => esc_html__( 'Set your icon image.', 'segovia-core'),
				'selectors' => [
					'{{WRAPPER}} .section-title-wrap.hav-icon .section-title-two:after' => 'background-image: url({{url}});',
				],
			]
		);
		$this->add_control(
			'section_content',
			[
				'label' => esc_html__( 'Content', 'segovia-core' ),
				'type' => Controls_Manager::TEXTAREA,
				'label_block' => true,
				'default' => esc_html__( 'This is Content text', 'segovia-core' ),
				'placeholder' => esc_html__( 'Type your content text here', 'segovia-core' ),
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
					'{{WRAPPER}} .section-title-wrap' => 'text-align: {{VALUE}};',
				],
			]
		);
		$this->add_responsive_control(
			'section_max_width',
			[
				'label' => esc_html__( 'Width', 'segovia-core' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1700,
						'step' => 2,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .section-title-wrap' => 'max-width: {{SIZE}}{{UNIT}};',
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
		$this->add_control(
			'section_margin',
			[
				'label' => __( 'Margin', 'segovia-core' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px' ],
				'selectors' => [
					'{{WRAPPER}} .section-title-wrap' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'sassect_title_typography',				
				'selector' => '{{WRAPPER}} .section-title-wrap .section-title',
			]
		);
		$this->add_control(
			'title_color',
			[
				'label' => esc_html__( 'Color', 'segovia-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .section-title-wrap .section-title' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'title_shadow_color',
			[
				'label' => esc_html__( 'Shadow Color', 'segovia-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .section-title-wrap .section-title' => 'text-shadow: 0 8px {{VALUE}};',
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
					'{{WRAPPER}} .section-title-wrap .section-title-two' => 'padding-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'need_seperator',
			[
				'label' => esc_html__( 'Hide Seperator', 'segovia-core' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Yes', 'segovia-core' ),
				'label_off' => esc_html__( 'No', 'segovia-core' ),
				'return_value' => 'true',

			]
		);
		$this->add_control(
			'seperator_image',
			[
				'label' => esc_html__( 'Upload Separator Image', 'segovia-core' ),
				'type' => Controls_Manager::MEDIA,
				'condition' => [
					'need_seperator!' => 'true',
				],
				'default' => [
					'url' => '',
				],
				'description' => esc_html__( 'Set your separator image.', 'segovia-core'),
				'selectors' => [
					'{{WRAPPER}} .section-title-wrap.hav-sep .sec-title:after' => 'background-image: url({{url}});',
				],
			]
		);
		$this->add_responsive_control(
			'separator_bg_size',
			[
				'label' => esc_html__( 'Separator Size', 'segovia-core' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
						'step' => 1,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'condition' => [
					'need_seperator!' => 'true',
				],
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .section-title-wrap.hav-sep .sec-title:after' => 'background-size: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'separator_max_width',
			[
				'label' => esc_html__( 'Separator Width', 'segovia-core' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
						'step' => 2,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'condition' => [
					'need_seperator!' => 'true',
				],
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .section-title-wrap.hav-sep .sec-title:after' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'separator_max_height',
			[
				'label' => esc_html__( 'Separator Height', 'segovia-core' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
						'step' => 2,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'condition' => [
					'need_seperator!' => 'true',
				],
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .section-title-wrap.hav-sep .sec-title:after' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'separator_top_space',
			[
				'label' => esc_html__( 'Separator Top Space', 'segovia-core' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
						'step' => 2,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'condition' => [
					'need_seperator!' => 'true',
				],
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .section-title-wrap.hav-sep .sec-title:after' => 'margin-top: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'need_seperator_animation',
			[
				'label' => esc_html__( 'Seperator Animation', 'segovia-core' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Yes', 'segovia-core' ),
				'label_off' => esc_html__( 'No', 'segovia-core' ),
				'condition' => [
					'need_seperator!' => 'true',
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
				'name' => 'content_typography',
				'selector' => '{{WRAPPER}} .section-title-wrap p',
			]
		);
		$this->add_control(
			'content_color',
			[
				'label' => esc_html__( 'Color', 'segovia-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .section-title-wrap p' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_responsive_control(
			'content_top_space',
			[
				'label' => esc_html__( 'Top space', 'segovia-core' ),
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
					'{{WRAPPER}} .section-title-wrap .sec-content' => 'padding-top: {{SIZE}}{{UNIT}};',
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
						'min' => 0,
						'max' => 500,
						'step' => 2,
					],
				],
				'size_units' => [ 'px' ],
				'selectors' => [
					'{{WRAPPER}} .section-title-wrap .sec-content' => 'padding-bottom: {{SIZE}}{{UNIT}};',
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
	 * Render Section Title widget output on the frontend.
	 * Written in PHP and used to generate the final HTML.
	*/
	protected function render() {
		$settings = $this->get_settings_for_display();

		$section_title = !empty( $settings['section_title'] ) ? $settings['section_title'] : '';
		$section_sec_title = !empty( $settings['section_sec_title'] ) ? $settings['section_sec_title'] : '';
		$section_content = !empty( $settings['section_content'] ) ? $settings['section_content'] : '';
		$section_align = !empty( $settings['section_align'] ) ? $settings['section_align'] : '';
		$need_seperator = !empty( $settings['need_seperator'] ) ? $settings['need_seperator'] : '';
		$need_seperator_animation = !empty( $settings['need_seperator_animation'] ) ? $settings['need_seperator_animation'] : '';
		$need_icon = !empty( $settings['need_icon'] ) ? $settings['need_icon'] : '';

		$readmore_title = !empty( $settings['readmore_title'] ) ? $settings['readmore_title'] : '';
		$read_more_link = !empty( $settings['read_more_link']['url'] ) ? $settings['read_more_link']['url'] : '';
		$read_more_link_external = !empty( $settings['read_more_link']['is_external'] ) ? 'target="_blank"' : '';
		$read_more_link_nofollow = !empty( $settings['read_more_link']['nofollow'] ) ? 'rel="nofollow"' : '';
		$read_more_link_attr = !empty( $read_more_link ) ?  $read_more_link_external.' '.$read_more_link_nofollow : '';
		$readmore = $read_more_link ? '<div class="segva-link-wrap"><a href="'.esc_url($read_more_link).'" '.$read_more_link_attr .' class="segva-link">'. $readmore_title.'</a></div>' : '';

		// Seperator Class
		if($need_seperator) {
			$sep_class = 'dhav-sep';
		} else {
			$sep_class = 'hav-sep';
		}
		if($need_icon) {
			$icon_class = ' dhav-icon';
		} else {
			$icon_class = ' hav-icon';
		}
		if($need_seperator_animation) {
			$animation_cls = ' hav-animation';
		} else {
			$animation_cls = ' dhav-animation';
		}
		// Sepereator align Class
		if($section_align === 'right') {
			$sep_align_class = ' sep-right';
		} elseif ($section_align === 'center'){
			$sep_align_class = ' sep-center';
		} else {
			$sep_align_class = '';
		}

		$sec_title = $section_title ? '<h2 class="section-title">'.$section_title.'</h2>' : '';
		$sec_title_sec = $section_sec_title ? '<h2 class="section-title section-title-two">'.$section_sec_title.'</h2>' : '';
		$sec_content = $section_content ? '<div class="sec-content"><p>'.$section_content.'</p></div>' : '';

		$output = '';

	  $output .= '<div class="section-title-wrap '.$sep_class.$icon_class.$animation_cls.$sep_align_class.'">
        <div class="sec-title">'.$sec_title.$sec_title_sec.'</div>'.$sec_content.''.$readmore.'
      </div>';

		echo $output;
		
	}

	/**
	 * Render Section Title widget output in the editor.
	 * Written as a Backbone JavaScript template and used to generate the live preview.
	*/
	
	//protected function _content_template(){}
	
}
Plugin::instance()->widgets_manager->register_widget_type( new Segovia_Section_Title() );