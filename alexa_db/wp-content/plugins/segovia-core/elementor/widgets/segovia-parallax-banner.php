<?php
/*
 * Elementor Segovia Banner Widget
 * Author & Copyright: VictorTheme
*/

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Segovia_Parallax_Banner extends Widget_Base{

	/**
	 * Retrieve the widget name.
	*/
	public function get_name(){
		return 'vt-segovia_parallax_banner';
	}

	/**
	 * Retrieve the widget title.
	*/
	public function get_title(){
		return esc_html__( 'Parallax Banner', 'segovia-core' );
	}

	/**
	 * Retrieve the widget icon.
	*/
	public function get_icon() {
		return 'fa fa-clone';
	}

	/**
	 * Retrieve the list of categories the widget belongs to.
	*/
	public function get_categories() {
		return ['victortheme-category'];
	}

	/**
	 * Retrieve the list of scripts the Segovia Banner widget depended on.
	 * Used to set scripts dependencies required to run the widget.
	*/
	/*
	public function get_script_depends() {
		return ['vt-segovia_parallax_banner'];
	}
	*/
	
	/**
	 * Register Segovia Banner widget controls.
	 * Adds different input fields to allow the user to change and customize the widget settings.
	*/
	protected function _register_controls(){
		
		$this->start_controls_section(
			'section_banner',
			[
				'label' => __( 'Banner Content', 'segovia-core' ),
			]
		);
		$this->add_control(
			'need_fullwidth',
			[
				'label' => esc_html__( 'Need Fullwidth', 'segovia-core' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Yes', 'segovia-core' ),
				'label_off' => esc_html__( 'No', 'segovia-core' ),
				'return_value' => 'true',
			]
		);
		$this->add_control(
			'bg_image',
			[
				'label' => esc_html__( 'Background Image', 'segovia-core' ),
				'type' => Controls_Manager::MEDIA,
				'frontend_available' => true,
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
				'description' => esc_html__( 'Set your image.', 'segovia-core'),
			]
		);
		$this->add_control(
			'banner_title',
			[
				'label' => esc_html__( 'Title Text', 'segovia-core' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( 'Title Text', 'segovia-core' ),
				'placeholder' => esc_html__( 'Type title text here', 'segovia-core' ),
				'label_block' => true,
			]
		);
		$this->add_control(
			'banner_title_two',
			[
				'label' => esc_html__( 'Banner title secondary', 'segovia-core' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'placeholder' => esc_html__( 'Type Banner secondary title here', 'segovia-core' ),
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
					'{{WRAPPER}} .banner-title-two:after' => 'background-image: url({{url}});',
				],
			]
		);
		$this->add_control(
			'banner_content',
			[
				'label' => esc_html__( 'Content', 'segovia-core' ),
				'placeholder' => esc_html__( 'Type your content here', 'segovia-core' ),
				'type' => Controls_Manager::TEXTAREA,
				'label_block' => true,
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
					'{{WRAPPER}} .banner-title-wrap:after' => 'background-image: url({{url}});',
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
					'{{WRAPPER}} .banner-caption' => 'text-align: {{VALUE}};',
				],
			]
		);

		$this->end_controls_section();// end: Section


		// Style
		$this->start_controls_section(
			'banner_style',
			[
				'label' => esc_html__( 'Banner Style', 'segovia-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'overlay_color',
			[
				'label' => esc_html__( 'Overlay Color', 'segovia-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .banner-style-two .banner-wrap' => 'background: {{VALUE}};',
				],
			]
		);	
		$this->add_responsive_control(
			'caption_min_height',
			[
				'label' => esc_html__( 'Banner Height', 'segovia-core' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 10,
						'max' => 1200,
						'step' => 1,
					],
				],
				'size_units' => [ 'px' ],
				'selectors' => [
					'{{WRAPPER}} .segva-banner.banner-style-two' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'caption_min_width',
			[
				'label' => esc_html__( 'Content Width', 'segovia-core' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 10,
						'max' => 1200,
						'step' => 1,
					],
				],
				'size_units' => [ 'px' ],
				'selectors' => [
					'{{WRAPPER}} .segva-banner.banner-style-two .banner-caption' => 'max-width: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_section();// end: Section
		// Title
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
				'name' => 'sasban_title_typography',				
				'selector' => '{{WRAPPER}} .banner-style-two .banner-wrap h1',
			]
		);
		$this->add_control(
			'title_color',
			[
				'label' => esc_html__( 'Color', 'segovia-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .banner-style-two .banner-wrap h1' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'title_shadow_color',
			[
				'label' => esc_html__( 'Shadow Color', 'segovia-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .banner-style-two .banner-wrap h1' => 'text-shadow: 0 10px {{VALUE}};',
				],
			]
		);
		$this->add_responsive_control(
			'title_padding',
			[
				'label' => __( 'Title Padding', 'segovia-core' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .banner-caption h1' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_section();// end: Section

		// Content		
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
					'selector' => '{{WRAPPER}} .segva-banner.banner-style-two p',
				]
			);
			$this->add_control(
				'content_color',
				[
					'label' => esc_html__( 'Color', 'segovia-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .segva-banner.banner-style-two p' => 'color: {{VALUE}};',
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
					'size_units' => [ 'px', '%' ],
					'selectors' => [
						'{{WRAPPER}} .banner-caption' => 'padding-bottom: {{SIZE}}{{UNIT}};',
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
		$bg_image = !empty( $settings['bg_image']['id'] ) ? $settings['bg_image']['id'] : '';	
		$banner_title = !empty( $settings['banner_title'] ) ? $settings['banner_title'] : '';	
		$banner_title_two = !empty( $settings['banner_title_two'] ) ? $settings['banner_title_two'] : '';	
		$banner_content = !empty( $settings['banner_content'] ) ? $settings['banner_content'] : '';	
		$need_icon = !empty( $settings['need_icon'] ) ? $settings['need_icon'] : '';
		$need_fullwidth = !empty( $settings['need_fullwidth'] ) ? $settings['need_fullwidth'] : '';
		$need_seperator = !empty( $settings['need_seperator'] ) ? $settings['need_seperator'] : '';
		$need_seperator_animation = !empty( $settings['need_seperator_animation'] ) ? $settings['need_seperator_animation'] : '';
		$section_align = !empty( $settings['section_align'] ) ? $settings['section_align'] : '';

		// Image
		$image_url = wp_get_attachment_url( $bg_image );

		if($need_icon) {
			$icon_class = ' dhav-icon';
		} else {
			$icon_class = ' hav-icon';
		}
		if($need_seperator) {
			$sep_class = 'dhav-sep';
		} else {
			$sep_class = ' hav-sep';
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

		$title = $banner_title ? '<h1 class="banner-title">'.$banner_title.'</h1>' : '';
		$title_two = $banner_title_two ? '<h1 class="banner-title banner-title-two">'.$banner_title_two.'</h1>' : '';
		$content = $banner_content ? '<p>'.$banner_content.'</p>' : '';

		if(!$need_fullwidth) {
			$output ='<div class="segva-spacer-wrap">';
		} else {
			$output = '';
		}

      $output .='<div class="segva-banner banner-style-two segva-parallax" style="background-image: url('.$image_url.');">
        <div class="banner-wrap">
          <div class="segva-table-wrap">
            <div class="segva-align-wrap">
              <div class="container">
                <div class="banner-caption '.$icon_class.$sep_class.$animation_cls.$sep_align_class.'">
	                <div class="banner-title-wrap">
	                  '.$title.$title_two.'
	                </div>
                  '.$content.'
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>';

    if(!$need_fullwidth) {
    	$output .='</div>';
  	}

		echo $output;
		
	}

	/**
	 * Render Banner widget output in the editor.
	 * Written as a Backbone JavaScript template and used to generate the live preview.
	*/
	
	//protected function _content_template(){}
	
}
Plugin::instance()->widgets_manager->register_widget_type( new Segovia_Parallax_Banner() );