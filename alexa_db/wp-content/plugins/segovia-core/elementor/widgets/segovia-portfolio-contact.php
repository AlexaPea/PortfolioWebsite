<?php
/*
 * Elementor Segovia Social Icons Widget
 * Author & Copyright: VictorTheme
*/

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Segovia_Portfolio_Contact_Item extends Widget_Base{

	/**
	 * Retrieve the widget name.
	*/
	public function get_name(){
		return 'vt-segovia_portfolio_contact_item';
	}

	/**
	 * Retrieve the widget title.
	*/
	public function get_title(){
		return esc_html__( 'Portfolio Contact Item', 'segovia-core' );
	}

	/**
	 * Retrieve the widget icon.
	*/
	public function get_icon() {
		return 'fa fa-share-alt';
	}

	/**
	 * Retrieve the list of categories the widget belongs to.
	*/
	public function get_categories() {
		return ['victortheme-category'];
	}

	/**
	 * Retrieve the list of scripts the Segovia Social Icons widget depended on.
	 * Used to set scripts dependencies required to run the widget.
	*/
	public function get_script_depends() {
		return ['vt-segovia_portfolio_contact_item'];
	}
	
	/**
	 * Register Segovia Social Icons widget controls.
	 * Adds different input fields to allow the user to change and customize the widget settings.
	*/
	protected function _register_controls(){
		
		$this->start_controls_section(
			'section_contact_item',
			[
				'label' => esc_html__( 'Contact Items', 'segovia-core' ),
			]
		);
		$repeater = new Repeater();
		$repeater->add_control(
			'contact_title',
			[
				'label' => esc_html__( 'Title', 'segovia-core' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'placeholder' => esc_html__( 'Type title here', 'segovia-core' ),
			]
		);
		$repeater->add_control(
			'contact_icon',
			[
				'label' => esc_html__( 'Icon', 'segovia-core' ),
				'type' => Controls_Manager::ICON,
				'frontend_available' => true,
				'options' => Controls_Helper_Output::get_include_icons(),
				'default' => 'fa fa-facebook',
			]
		);
		$repeater->add_control(
			'contact_text',
			[
				'label' => esc_html__( 'Text', 'segovia-core' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'placeholder' => esc_html__( 'Type text here', 'segovia-core' ),
			]
		);
		$repeater->add_control(
			'contact_text_link',
			[
				'label' => esc_html__( 'Text Link', 'segovia-core' ),
				'type' => Controls_Manager::URL,
				'placeholder' => __( 'https://your-link.com', 'segovia-core' ),
				'show_external' => true,
				'default' => [
					'url' => '',
					'is_external' => true,
					'nofollow' => true,
				],
			]
		);
		$this->add_control(
			'ContactItems_groups',
			[
				'label' => esc_html__( 'Social Icons', 'segovia-core' ),
				'type' => Controls_Manager::REPEATER,
				'default' => [
					[
						'contact_icon' => esc_html__( 'Item #1', 'segovia-core' ),
					],
					
				],
				'fields' => $repeater->get_controls(),
				'title_field' => '{{{ contact_icon }}}',
			]
		);
		$this->add_control(
			'need_border',
			[
				'label' => esc_html__( 'Border Bottom', 'segovia-core' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Yes', 'segovia-core' ),
				'label_off' => esc_html__( 'No', 'segovia-core' ),
				'return_value' => 'true',

			]
		);
		$this->end_controls_section();// end: Section

		$this->start_controls_section(
			'section_general_style',
			[
				'label' => esc_html__( 'General', 'segovia-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'border_color',
			[
				'label' => esc_html__( 'Border Color', 'segovia-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .contact-section .segva-contact-item, {{WRAPPER}} .contact-section' => 'border-color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'bg_color',
			[
				'label' => esc_html__( 'Background Color', 'segovia-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .contact-section' => 'background: {{VALUE}};',
				],
			]
		);
		$this->add_responsive_control(
			'item_width',
			[
				'label' => esc_html__( 'Item Width', 'segovia-core' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 10,
						'max' => 500,
						'step' => 1,
					],
				],
				'size_units' => [ '%','px' ],
				'selectors' => [
					'{{WRAPPER}} .contact-section .segva-contact-item' => 'min-width: {{SIZE}}{{UNIT}};',
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
				'name' => 'title_typography',				
				'selector' => '{{WRAPPER}} h5.contact-item-title',
			]
		);
		$this->add_control(
			'title_color',
			[
				'label' => esc_html__( 'Color', 'segovia-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} h5.contact-item-title' => 'color: {{VALUE}};',
				],
			]
		);
		$this->end_controls_section();// end: Section

		// Text
		$this->start_controls_section(
			'section_text_style',
			[
				'label' => esc_html__( 'Text', 'segovia-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'contact_text_typography',
				'selector' => '{{WRAPPER}} .blog-info h4',
			]
		);
		$this->start_controls_tabs( 'contact_text_style' );
			$this->start_controls_tab(
				'text_normal',
				[
					'label' => esc_html__( 'Normal', 'segovia-core' ),
				]
			);
			$this->add_control(
				'text_color',
				[
					'label' => esc_html__( 'Color', 'segovia-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .contact-title-wrap span, {{WRAPPER}} .contact-title-wrap a' => 'color: {{VALUE}};',
					],
				]
			);
			$this->end_controls_tab();  // end:Normal tab
			$this->start_controls_tab(
				'text_hover',
				[
					'label' => esc_html__( 'Hover', 'segovia-core' ),
				]
			);
			$this->add_control(
				'text_hover_color',
				[
					'label' => esc_html__( 'Color', 'segovia-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .contact-title-wrap a:hover' => 'color: {{VALUE}};',
					],
				]
			);
			$this->end_controls_tab();  // end:Hover tab
		$this->end_controls_tabs(); // end tabs
		$this->end_controls_section();// end: Section

		// Icons
		$this->start_controls_section(
			'section_contact_item_style',
			[
				'label' => esc_html__( 'Icons', 'segovia-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_responsive_control(
			'icon_size',
			[
				'label' => esc_html__( 'Size', 'obira-core' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000,
						'step' => 1,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .contact-section .contact-icon i' => 'font-size:{{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'icon_margin',
			[
				'label' => __( 'Margin', 'obira-core' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .contact-section .contact-icon' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'icon_color',
			[
				'label' => esc_html__( 'Color', 'segovia-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .contact-section .contact-icon i' => 'color: {{VALUE}};',
				],
			]
		);
		$this->end_controls_section();// end: Section

	}

	/**
	 * Render Social Icons widget output on the frontend.
	 * Written in PHP and used to generate the final HTML.
	*/
	protected function render() {
		$settings = $this->get_settings_for_display();

		$social_title = !empty( $settings['social_title'] ) ? $settings['social_title'] : '';
		$need_border = !empty( $settings['need_border'] ) ? $settings['need_border'] : '';
		$ContactItems_groups = !empty( $settings['ContactItems_groups'] ) ? $settings['ContactItems_groups'] : '';

		if($need_border) {
			$border_cls = ' hav-border-bottom';
		} else {
			$border_cls = '';
		}

		// Turn output buffer on
		ob_start();

      if( is_array( $ContactItems_groups ) && !empty( $ContactItems_groups ) ){
      	echo '<div class="contact-section">';
				foreach ( $ContactItems_groups as $each_icon ) {
					$contact_link = !empty( $each_icon['contact_text_link'] ) ? $each_icon['contact_text_link'] : '';
					$link_url = !empty( $contact_link['url'] ) ? esc_url($contact_link['url']) : '';
					$link_external = !empty( $contact_link['is_external'] ) ? 'target="_blank"' : '';
					$link_nofollow = !empty( $contact_link['nofollow'] ) ? 'rel="nofollow"' : '';
					$link_attr = !empty( $contact_link['url'] ) ?  $link_external.' '.$link_nofollow : '';

				  $contact_icon = ( $each_icon['contact_icon'] ) ? $each_icon['contact_icon'] : '';
				  $contact_text = ( $each_icon['contact_text'] ) ? $each_icon['contact_text'] : '';
				  $contact_title = ( $each_icon['contact_title'] ) ? $each_icon['contact_title'] : '';

				  $title = $contact_title ? '<h5 class="contact-item-title">'.$contact_title.'</h5>' : '';
				  $link = $link_url ? '<a href="'.$link_url.'" '.$link_attr.' class="contact-link-item">'.$contact_text.'</a>' : '<span class="contact-link-item">'.$contact_text.'</span>';
				  $link_actual = $contact_text ? $link : '';
				  echo '<div class="segva-contact-item '.$border_cls.'">';
				  echo '<span class="contact-icon"><i class="'.$contact_icon.'"></i></span>';
				  echo '<div class="contact-title-wrap">'.$title.$link_actual.'</div>';
				  echo '</div>';

				}
				echo '</div>';
			}

		// Return outbut buffer
		echo ob_get_clean();
	}

	/**
	 * Render Social Icons widget output in the editor.
	 * Written as a Backbone JavaScript template and used to generate the live preview.
	*/
	
	//protected function _content_template(){}
	
}
Plugin::instance()->widgets_manager->register_widget_type( new Segovia_Portfolio_Contact_Item() );
