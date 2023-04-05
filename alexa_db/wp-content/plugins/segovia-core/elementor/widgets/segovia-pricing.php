<?php
/*
 * Elementor Segovia Pricing Widget
 * Author & Copyright: VictorTheme
*/

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Segovia_Pricing extends Widget_Base{

	/**
	 * Retrieve the widget name.
	*/
	public function get_name(){
		return 'vt-segovia_pricing';
	}

	/**
	 * Retrieve the widget title.
	*/
	public function get_title(){
		return esc_html__( 'Pricing Table', 'segovia-core' );
	}

	/**
	 * Retrieve the widget icon.
	*/
	public function get_icon() {
		return 'fa fa-money';
	}

	/**
	 * Retrieve the pricing of categories the widget belongs to.
	*/
	public function get_categories() {
		return ['victortheme-category'];
	}

	/**
	 * Retrieve the pricing of scripts the Segovia Pricing widget depended on.
	 * Used to set scripts dependencies required to run the widget.
	*/
	/*
	public function get_script_depends() {
		return ['vt-segovia_pricing'];
	}
	*/
	
	/**
	 * Register Segovia Pricing widget controls.
	 * Adds different input fields to allow the user to change and customize the widget settings.
	*/
	protected function _register_controls(){
		
		$this->start_controls_section(
			'section_pricing',
			[
				'label' => esc_html__( 'Pricing Options', 'segovia-core' ),
			]
		);

		$this->add_control(
			'pricing_title',
			[
				'label' => esc_html__( 'Standard', 'segovia-core' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( 'Title Text', 'segovia-core' ),
				'placeholder' => esc_html__( 'Type title text here', 'segovia-core' ),
				'label_block' => true,
			]
		);
		$this->add_control(
			'pricing_currency',
			[
				'label' => esc_html__( 'Currency', 'segovia-core' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( '$', 'segovia-core' ),
				'placeholder' => esc_html__( 'Type price currency here', 'segovia-core' ),
				'label_block' => true,
			]
		);
		$this->add_control(
			'pricing_price',
			[
				'label' => esc_html__( 'Price', 'segovia-core' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( '$99', 'segovia-core' ),
				'placeholder' => esc_html__( 'Type price text here', 'segovia-core' ),
				'label_block' => true,
			]
		);
		$this->add_control(
			'pricing_duration',
			[
				'label' => esc_html__( 'Duration', 'segovia-core' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( '/mo', 'segovia-core' ),
				'placeholder' => esc_html__( 'Type price duration here', 'segovia-core' ),
				'label_block' => true,
			]
		);
		$this->add_control(
			'pricing_image',
			[
				'label' => esc_html__( 'Item Image', 'segovia-core' ),
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
				'label_block' => true,
			]
		);
		
		$repeater = new Repeater();

		$repeater->add_control(
			'pricing_text',
			[
				'label' => esc_html__( 'Text', 'segovia-core' ),
				'type' => Controls_Manager::TEXTAREA,
				'label_block' => true,
			]
		);
		$repeater->add_control(
			'disable_feature',
			[
				'label' => esc_html__( 'Disable Feature ?', 'segovia-core' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Yes', 'segovia-core' ),
				'label_off' => esc_html__( 'No', 'segovia-core' ),
				'return_value' => 'true',
				'default' => 'false',
			]
		);
		$this->add_control(
			'pricingItems_groups',
			[
				'label' => esc_html__( 'Pricings', 'segovia-core' ),
				'type' => Controls_Manager::REPEATER,
				'default' => [
					[
						'pricing_text' => esc_html__( 'Item #1', 'segovia-core' ),
					],
					
				],
				'fields' => $repeater->get_controls(),
				'title_field' => '{{{ pricing_text }}}',
			]
		);
		$this->end_controls_section();// end: Section

		// Section
		$this->start_controls_section(
			'section_style',
			[
				'label' => esc_html__( 'Section', 'segovia-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'section_border',
				'label' => esc_html__( 'Border', 'segovia-core' ),
				'selector' => '{{WRAPPER}} .pricing-item',
			]
		);
		$this->add_control(
			'pricing_border_radius',
			[
				'label' => __( 'Border Radius', 'segovia-core' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .pricing-item' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'pricing_bg_color',
			[
				'label' => esc_html__( 'Background', 'segovia-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .pricing-item' => 'background: {{VALUE}};',
				],
			]
		);
		$this->end_controls_section();// end: Section

		// Pricing Link
		$this->start_controls_section(
			'pricing_link_style',
			[
				'label' => esc_html__( 'Pricing Links', 'segovia-core' ),
			]
		);
		$this->add_control(
			'pricing_link_text',
			[
				'label' => esc_html__( 'Link Text', 'segovia-core' ),
				'type' => Controls_Manager::TEXT,
				'placeholder' => esc_html__( 'Subscribe Now', 'segovia-core' ),
				'label_block' => true,
			]
		);
		$this->add_control(
			'pricing_link_text_link',
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
			'section_title_style',
			[
				'label' => esc_html__( 'Title', 'segovia-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'saspri_title_typography',				
				'selector' => '{{WRAPPER}} h2.pricing-title .title',
			]
		);
		$this->add_control(
			'pricing_title_color',
			[
				'label' => esc_html__( 'Color', 'segovia-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} h2.pricing-title .title' => 'color: {{VALUE}};',
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
					'{{WRAPPER}} h2.pricing-title .title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_section();// end: Section

		$this->start_controls_section(
			'section_price_style',
			[
				'label' => esc_html__( 'Price', 'segovia-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'pricing_price_typography',
				'selector' => '{{WRAPPER}} h2.price-title-wrap',
			]
		);
		$this->add_control(
			'pricing_price_color',
			[
				'label' => esc_html__( 'Color', 'segovia-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} h2.price-title-wrap' => 'color: {{VALUE}};',
				],
			]
		);
		$this->end_controls_section();// end: Section

		$this->start_controls_section(
			'section_price_duration_style',
			[
				'label' => esc_html__( 'Price Duration', 'segovia-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'pricing_price_duration_typography',
				'selector' => '{{WRAPPER}} .pricing-title h2 span',
			]
		);
		$this->add_control(
			'pricing_price_duration_color',
			[
				'label' => esc_html__( 'Color', 'segovia-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .pricing-title h2 span' => 'color: {{VALUE}};',
				],
			]
		);
		$this->end_controls_section();// end: Section

		$this->start_controls_section(
			'section_list_style',
			[
				'label' => esc_html__( 'List', 'segovia-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'pricing_list_typography',
				'selector' => '{{WRAPPER}} .pricing-item ul li',
			]
		);
		$this->add_responsive_control(
			'featured_icon_size',
			[
				'label' => esc_html__( 'Featured Icon Size', 'segovia-core' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 2,
						'max' => 150,
						'step' => 2,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .pricing-item ul li:before' => 'font-size: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'pricing_list_featured_color',
			[
				'label' => esc_html__( 'Featured Color', 'segovia-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .pricing-item ul li.enable-feature' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'pricing_tick_color',
			[
				'label' => esc_html__( 'Featured Tick Color', 'segovia-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .pricing-item ul li:before' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'pricing_list_color',
			[
				'label' => esc_html__( 'Ordinary Color', 'segovia-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .pricing-item ul li.disable-feature' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'pricing_ordinary_tick_color',
			[
				'label' => esc_html__( 'Ordinary Tick Color', 'segovia-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .pricing-item ul li.disable-feature:before' => 'color: {{VALUE}};',
				],
			]
		);
		
		$this->end_controls_section();// end: Section

		// Section Link
			// Left Section Link
		$this->start_controls_section(
			'price_link_section',
			[
				'label' => esc_html__( 'Link', 'segovia-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'label' => esc_html__( 'Typography', 'segovia-core' ),
				'name' => 'price_link_typography',
				'selector' => '{{WRAPPER}} .segva-border-link .segva-btn',
			]
		);

		$this->start_controls_tabs( 'list_title_style' );
		$this->start_controls_tab(
				'price_title_normal',
				[
					'label' => esc_html__( 'Normal', 'segovia-core' ),
				]
			);
		$this->add_control(
			'price_link_text_color',
			[
				'label' => esc_html__( 'Color', 'segovia-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .segva-border-link .segva-btn' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'price_link_bg_color',
			[
				'label' => esc_html__( 'Background', 'segovia-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .segva-border-link .segva-btn' => 'background: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'price_link_border_color',
			[
				'label' => esc_html__( 'Border', 'segovia-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .segva-border-link .segva-btn' => 'border-color: {{VALUE}};',
				],
			]
		);

		$this->end_controls_tab();  // end:Normal tab

		$this->start_controls_tab(
			'price_title_hover',
			[
				'label' => esc_html__( 'Hover', 'segovia-core' ),
			]
		);

		$this->add_control(
			'price_title_hover_color',
			[
				'label' => esc_html__( 'Color', 'segovia-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .segva-border-link .segva-btn:hover' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'price_bg_hover_color',
			[
				'label' => esc_html__( 'Background', 'segovia-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .segva-border-link .segva-btn:hover' => 'background: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'price_border_hover_color',
			[
				'label' => esc_html__( 'Border', 'segovia-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .segva-border-link .segva-btn:hover' => 'border-color: {{VALUE}};',
				],
			]
		);

		$this->end_controls_tab();  // end:Hover tab
		$this->end_controls_tabs(); // end tabs

		$this->end_controls_section();// end: Section

		$this->start_controls_section(
			'section_border_style',
			[
				'label' => esc_html__( 'Inner Borders', 'segovia-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'pricing_border_color',
			[
				'label' => esc_html__( 'Color', 'segovia-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .pricing-title:after' => 'background: {{VALUE}};',
				],
			]
		);
		$this->end_controls_section();// end: Section

	}

	/**
	 * Render Pricing widget output on the frontend.
	 * Written in PHP and used to generate the final HTML.
	*/
	protected function render() {
		$settings = $this->get_settings_for_display();
		$pricing_title = !empty( $settings['pricing_title'] ) ? $settings['pricing_title'] : '';
		$pricing_price = !empty( $settings['pricing_price'] ) ? $settings['pricing_price'] : '';
		$pricing_currency = !empty( $settings['pricing_currency'] ) ? $settings['pricing_currency'] : '';
		$pricing_duration = !empty( $settings['pricing_duration'] ) ? $settings['pricing_duration'] : '';
		$pricing_image = !empty( $settings['pricing_image']['id'] ) ? $settings['pricing_image']['id'] : '';

		$pricing_link_text = !empty( $settings['pricing_link_text'] ) ? $settings['pricing_link_text'] : '';

		$pricing_link_text_link = !empty( $settings['pricing_link_text_link'] ) ? $settings['pricing_link_text_link'] : '';
		$link_url = !empty( $pricing_link_text_link['url'] ) ? esc_url($pricing_link_text_link['url']) : '';
		$link_external = !empty( $pricing_link_text_link['is_external'] ) ? 'target="_blank"' : '';
		$link_nofollow = !empty( $pricing_link_text_link['nofollow'] ) ? 'rel="nofollow"' : '';
		$link_attr = !empty( $pricing_link_text_link['url'] ) ?  $link_external.' '.$link_nofollow : '';

		$title_link_main = !empty( $pricing_link_text_link ) ? '<div class="segva-border-link"><a href="'.$link_url.'" '.$link_attr.' class="segva-btn"><i class="fa fa-long-arrow-right" aria-hidden="true"></i> '.$pricing_link_text.' </a></div>' : '<div class="segva-border-link"><span class="segva-btn"><i class="fa fa-long-arrow-right" aria-hidden="true"></i> '.$pricing_link_text.' </span></div>';

		$pricing_currency = $pricing_currency ? '<sup>'.$pricing_currency.'</sup>' : '';

		$title_link_actual = $pricing_link_text ? $title_link_main : '';
		$pricingItems_groups = !empty( $settings['pricingItems_groups'] ) ? $settings['pricingItems_groups'] : [];

		$image_url = wp_get_attachment_url( $pricing_image );

		$image = $pricing_image ? '<span class="segva-image"><img src="'.$image_url.'" alt="'.$pricing_title.'" width="67"></span>' : '';

		$price = $pricing_price ? '<h2 class="price-title-wrap">'.$pricing_currency.$pricing_price.'<span>'.$pricing_duration.'</span></h2>' : '';

	      $output ='<div class="segva-item pricing-item">
              <div class="pricing-title">
                <span class="title ">'.$pricing_title.'</span>'.$image.'
                <div class="price ">'.$price.'</div>
              </div>
              
              <ul>';
               if( is_array( $pricingItems_groups ) && !empty( $pricingItems_groups ) ){
											  foreach ( $pricingItems_groups as $each_pricing ) {
												$pricing_text = $each_pricing['pricing_text'] ? $each_pricing['pricing_text'] : '';
													$disable_feature  = ( isset( $each_pricing['disable_feature'] ) && ( 'true' == $each_pricing['disable_feature'] ) ) ? true : false;
												if($disable_feature) {
												  $border_cls = ' disable-feature';
												} else {
												  $border_cls = ' enable-feature';
												}
											$output .= '<li class='.$border_cls.'>'. do_shortcode($pricing_text) .'</li>';
											  }
											}
          $output .= '</ul>
              '.$title_link_actual.'
            </div>';

		echo $output;
		
	}

	/**
	 * Render Pricing widget output in the editor.
	 * Written as a Backbone JavaScript template and used to generate the live preview.
	*/
	
	//protected function _content_template(){}
	
}
Plugin::instance()->widgets_manager->register_widget_type( new Segovia_Pricing() );