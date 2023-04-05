<?php
/*
 * Elementor Segovia Service Toggle Widget
 * Author & Copyright: VictorTheme
*/

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Segovia_ServiceToggle extends Widget_Base{

	/**
	 * Retrieve the widget name.
	*/
	public function get_name(){
		return 'vt-segovia_servetoggle';
	}

	/**
	 * Retrieve the widget title.
	*/
	public function get_title(){
		return esc_html__( 'Service Toggle', 'segovia-core' );
	}

	/**
	 * Retrieve the widget icon.
	*/
	public function get_icon() {
		return 'fa fa-lightbulb-o';
	}

	/**
	 * Retrieve the list of categories the widget belongs to.
	*/
	public function get_categories() {
		return ['victortheme-category'];
	}

	/**
	 * Retrieve the list of scripts the Segovia Service Toggle widget depended on.
	 * Used to set scripts dependencies required to run the widget.
	*/
	/*
	public function get_script_depends() {
		return ['vt-segovia_servetoggle'];
	}
	*/
	
	/**
	 * Register Segovia ServiceToggle widget controls.
	 * Adds different input fields to allow the user to change and customize the widget settings.
	*/
	protected function _register_controls(){
		
		$this->start_controls_section(
			'section_servetoggle',
			[
				'label' => __( 'Service Toggle Content', 'segovia-core' ),
			]
		);
		$this->add_control(
			'identifying_image',
			[
				'label' => esc_html__( 'Upload Image', 'segovia-core' ),
				'type' => Controls_Manager::MEDIA,
				'frontend_available' => true,
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
				'description' => esc_html__( 'Set your icon image.', 'segovia-core'),
			]
		);
		$this->add_control(
			'identifying_title',
			[
				'label' => esc_html__( 'Title Text', 'segovia-core' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( 'Title Text', 'segovia-core' ),
				'placeholder' => esc_html__( 'Type title text here', 'segovia-core' ),
				'label_block' => true,
			]
		);
		$this->add_control(
			'identifying_content',
			[
				'label' => esc_html__( 'Content', 'segovia-core' ),
				'default' => esc_html__( 'your content text', 'segovia-core' ),
				'placeholder' => esc_html__( 'Type your content here', 'segovia-core' ),
				'type' => Controls_Manager::TEXTAREA,
				'label_block' => true,
			]
		);
		$this->add_control(
			'toggle_align',
			[
				'label' => esc_html__( 'Toggle Align', 'segovia-core' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Yes', 'segovia-core' ),
				'label_off' => esc_html__( 'No', 'segovia-core' ),
				'return_value' => 'true',
				'default' => 'false',
			]
		);
		$this->add_control(
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
					'{{WRAPPER}}' => 'text-align: {{VALUE}};',
				],
			]
		);

		$this->end_controls_section();// end: Section

		$this->start_controls_section(
			'section_servetoggle_btn',
			[
				'label' => esc_html__( 'Link Options', 'segovia-core' ),
			]
		);
		$this->add_control(
			'identifying_btn',
			[
				'label' => esc_html__( 'Link Text', 'segovia-core' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( 'LEARN MORE', 'segovia-core' ),
				'placeholder' => esc_html__( 'Type link text here', 'segovia-core' ),
				'label_block' => true,
			]
		);
		$this->add_control(
			'identifying_btn_link',
			[
				'label' => esc_html__( 'Link Link', 'segovia-core' ),
				'type' => Controls_Manager::URL,
				'placeholder' => 'https://your-link.com',
				'default' => [
					'url' => '',
				],
				'label_block' => true,
			]
		);
		$this->add_control(
			'identifying_btn_icon',
			[
				'label' => esc_html__( 'Icon', 'segovia-core' ),
				'type' => Controls_Manager::ICON,
				'options' => Controls_Helper_Output::get_include_icons(),
				'frontend_available' => true,
				'default' => 'fa fa-angle-right',
			]
		);
		$this->add_control(
			'icon_alignment',
			[
				'label' => esc_html__( 'Alignment', 'segovia-core' ),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => esc_html__( 'Left', 'segovia-core' ),
						'icon' => 'fa fa-align-left',
					],
					'right' => [
						'title' => esc_html__( 'Right', 'segovia-core' ),
						'icon' => 'fa fa-align-right',
					],
				],
				'default' => 'right',
			]
		);
		$this->end_controls_section();// end: Section

		// Style
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
				'name' => 'saside_title_typography',				
				'selector' => '{{WRAPPER}} .identify-info h2',
			]
		);
		$this->add_control(
			'title_color',
			[
				'label' => esc_html__( 'Color', 'segovia-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .identify-info h2' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'title_padding',
			[
				'label' => __( 'Title Padding', 'segovia-core' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .identify-info h2' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'selector' => '{{WRAPPER}} .identify-info p',
				]
			);
			$this->add_control(
				'content_color',
				[
					'label' => esc_html__( 'Color', 'segovia-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .identify-info p' => 'color: {{VALUE}};',
					],
				]
			);
			$this->add_control(
				'content_border_color',
				[
					'label' => esc_html__( 'Border Color', 'segovia-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .identify-info' => 'border-color: {{VALUE}};',
					],
				]
			);
		$this->end_controls_section();// end: Section

		// Link
		$this->start_controls_section(
			'section_link_style',
			[
				'label' => esc_html__( 'Link', 'segovia-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'link_typography',
				'selector' => '{{WRAPPER}} .identify-info .segva-border-link a',
			]
		);
		$this->start_controls_tabs( 'link_style' );
			$this->start_controls_tab(
				'link_normal',
				[
					'label' => esc_html__( 'Normal', 'segovia-core' ),
				]
			);
			$this->add_control(
				'link_color',
				[
					'label' => esc_html__( 'Color', 'segovia-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .identify-info .segva-border-link a' => 'color: {{VALUE}};',
					],
				]
			);
			$this->add_control(
				'link_border_color',
				[
					'label' => esc_html__( 'Border Color', 'segovia-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .identify-info .segva-border-link a:after' => 'background: {{VALUE}};',
					],
				]
			);
			$this->end_controls_tab();  // end:Normal tab
			
			$this->start_controls_tab(
				'link_hover',
				[
					'label' => esc_html__( 'Hover', 'segovia-core' ),
				]
			);
			$this->add_control(
				'link_hover_color',
				[
					'label' => esc_html__( 'Color', 'segovia-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .identify-info .segva-border-link a:hover' => 'color: {{VALUE}};',
					],
				]
			);
			$this->end_controls_tab();  // end:Hover tab
		$this->end_controls_tabs(); // end tabs
		
		$this->end_controls_section();// end: Section

	}

	/**
	 * Render App Works widget output on the frontend.
	 * Written in PHP and used to generate the final HTML.
	*/
	protected function render() {
		$settings = $this->get_settings_for_display();
		$toggle_align = !empty( $settings['toggle_align'] ) ? $settings['toggle_align'] : '';	
		$identifying_image = !empty( $settings['identifying_image']['id'] ) ? $settings['identifying_image']['id'] : '';	
		$identifying_title = !empty( $settings['identifying_title'] ) ? $settings['identifying_title'] : '';	
		$identifying_content = !empty( $settings['identifying_content'] ) ? $settings['identifying_content'] : '';	

		$identifying_btn = !empty( $settings['identifying_btn'] ) ? $settings['identifying_btn'] : '';	
		$identifying_btn_link = !empty( $settings['identifying_btn_link']['url'] ) ? $settings['identifying_btn_link']['url'] : '';
		$identifying_btn_link_external = !empty( $settings['identifying_btn_link']['is_external'] ) ? 'target="_blank"' : '';
		$identifying_btn_link_nofollow = !empty( $settings['identifying_btn_link']['nofollow'] ) ? 'rel="nofollow"' : '';
		$identifying_btn_link_attr = !empty( $identifying_btn_link ) ?  $identifying_btn_link_external.' '.$identifying_btn_link_nofollow : '';

		$identifying_btn_icon = !empty( $settings['identifying_btn_icon'] ) ? $settings['identifying_btn_icon'] : '';	
		$icon_alignment = !empty( $settings['icon_alignment'] ) ? $settings['icon_alignment'] : '';	

		$title = $identifying_title ? '<h2 class="identify-title">'.$identifying_title.'</h2>' : '';
		$content = $identifying_content ? '<p>'.$identifying_content.'</p>' : '';
		// Image
		$image_url = wp_get_attachment_url( $identifying_image );
		$segovia_alt = get_post_meta($identifying_image, '_wp_attachment_image_alt', true);

		$image = $image_url ? '<img src="'.$image_url.'" alt="'.$segovia_alt.'">' : '';

		$icon = $identifying_btn_icon ? '<i class="'.$identifying_btn_icon.'" aria-hidden="true"></i>' : '';
		if($icon_alignment === 'left') {
		  $icon_left = $icon.' ';
		  $icon_right = '';
		} else {
		  $icon_left = '';
		  $icon_right = ' '.$icon;
		}
		if($toggle_align === 'true') {
		  $align_left = ' order-lg-2';
		  $align_right = ' order-lg-1';
		} else {
		  $align_left = '';
		  $align_right = '';
		}
		
		$link = $identifying_btn_link ? '<div class="segva-border-link"><a href="'.$identifying_btn_link.'" '.$identifying_btn_link_attr.' class="segva-btn">'.$icon_left.$identifying_btn.$icon_right.'</a></div>' : '';

		$output = '<div class="identify-item">
			          <div class="row">
			            <div class="col-lg-6'.$align_left.'">
			              <div class="segva-image segva-item">'.$image.'</div>
			            </div>
			            <div class="col-lg-6'.$align_right.'">
			              <div class="identify-info segva-item">
			                <div class="segva-table-wrap">
			                  <div class="segva-align-wrap">
			                    '.$title.$content.$link.'
			                  </div>
			                </div>
			              </div>
			            </div>
			          </div>
			        </div>';
		echo $output;
		
	}

	/**
	 * Render ServiceToggle widget output in the editor.
	 * Written as a Backbone JavaScript template and used to generate the live preview.
	*/
	
	//protected function _content_template(){}
	
}
Plugin::instance()->widgets_manager->register_widget_type( new Segovia_ServiceToggle() );