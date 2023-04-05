<?php
/*
 * Elementor Segovia Process List Widget
 * Author & Copyright: VictorTheme
*/

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Segovia_ContactAddress extends Widget_Base{

	/**
	 * Retrieve the widget name.
	*/
	public function get_name(){
		return 'vt-segovia_contact_address';
	}

	/**
	 * Retrieve the widget title.
	*/
	public function get_title(){
		return esc_html__( 'Contact Address', 'segovia-core' );
	}

	/**
	 * Retrieve the widget icon.
	*/
	public function get_icon() {
		return 'fa fa-server';
	}

	/**
	 * Retrieve the list of categories the widget belongs to.
	*/
	public function get_categories() {
		return ['victortheme-category'];
	}

	/**
	 * Retrieve the list of scripts the Segovia Process List widget depended on.
	 * Used to set scripts dependencies required to run the widget.
	*/
	/*
	public function get_script_depends() {
		return ['vt-segovia_contact_address'];
	}
	*/
	
	/**
	 * Register Segovia Process List widget controls.
	 * Adds different input fields to allow the user to change and customize the widget settings.
	*/
	protected function _register_controls(){
		
		$this->start_controls_section(
			'contact_address_list',
			[
				'label' => __( 'Contact Address', 'segovia-core' ),
			]
		);

		$repeater = new Repeater();
		
		$repeater->add_control(
			'contact_title',
			[
				'label' => esc_html__( 'Title', 'segovia-core' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( 'NEW YORK', 'segovia-core' ),
				'placeholder' => esc_html__( 'Type title text here', 'segovia-core' ),
				'label_block' => true,
			]
		);
		$repeater->add_control(
			'contact_content',
			[
				'label' => esc_html__( 'Address', 'segovia-core' ),
				'type' => Controls_Manager::TEXTAREA,
				'placeholder' => esc_html__( 'Type address here', 'segovia-core' ),
				'label_block' => true,
			]
		);
		$this->add_control(
			'contact_groups',
			[
				'label' => esc_html__( 'Processs List Items', 'segovia-core' ),
				'type' => Controls_Manager::REPEATER,
				'default' => [
					[
						'contact_title' => esc_html__( 'NEW YORK', 'segovia-core' ),
					],
					
				],
				'fields' => $repeater->get_controls(),
				'title_field' => '{{{ contact_title }}}',
			]
		);
		
		$this->end_controls_section();// end: Section


		$this->start_controls_section(
			'contact_title_style',
			[
				'label' => esc_html__( 'Title', 'segovia-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->start_controls_tabs( 'list_one_title_style' );
		$this->start_controls_tab(
				'title_normal',
				[
					'label' => esc_html__( 'Normal', 'segovia-core' ),
				]
			);

			$this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'label' => esc_html__( 'Typography', 'segovia-core' ),
					'name' => 'contact_title_typography',					
					'selector' => '{{WRAPPER}} .process-title',
				]
			);
			$this->add_control(
				'title_color',
				[
					'label' => esc_html__( 'Color', 'segovia-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .process-title' => 'color: {{VALUE}};',
					],
				]
			);
			$this->end_controls_tab();  // end:Normal tab

			$this->start_controls_tab(
				'title_hover',
				[
					'label' => esc_html__( 'Hover', 'segovia-core' ),
				]
			);

			$this->add_control(
				'contact_title_hover_color',
				[
					'label' => esc_html__( 'Color', 'segovia-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .contact-addrs-item:hover  .process-title, {{WRAPPER}} .contact-addrs-item a:focus, {{WRAPPER}} .contact-addrs-item a:hover  ' => 'color: {{VALUE}};',
					],
				]
			);

		$this->end_controls_tab();  // end:Hover tab
		$this->end_controls_tabs(); // end tabs

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
					'selector' => '{{WRAPPER}} .contact-addrs-item p',
				]
			);
			$this->add_control(
				'content_color',
				[
					'label' => esc_html__( 'Color', 'segovia-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .contact-addrs-item p' => 'color: {{VALUE}};',
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
		$contacts = $this->get_settings_for_display( 'contact_groups' );
		$output = '';

			if( !empty( $contacts ) && is_array( $contacts ) ){
			$output .= '<div class="segva-contact-address"><div class="containerr"> <div class="row">';

				// Group Param Output
				foreach ( $contacts as $each_contact ) {


					$contact_title = !empty( $each_contact['contact_title'] ) ? $each_contact['contact_title'] : '';
					$contact_content = !empty( $each_contact['contact_content'] ) ? $each_contact['contact_content'] : '';

					$contact_title_link = !empty( $each_contact['contact_title'] ) ? '<h4 class="contact-addrs-title">'.$each_contact['contact_title'].'</h4>' : '';			

				  $content = $contact_content ? '<p>'.$contact_content.'</p>' : '';
				 
		      $output .='<div class="contact-item-wrap">
	            <div class="segva-item contact-addrs-item">
	             '.$contact_title_link.$content.'
	            </div>
	          </div>';         
				}

			$output .= ' </div><li class="contact-address-line" style="width: 154px; left: 560px; overflow: hidden;"></li></div></div>';
		}
			echo $output;
		
	}

	/**
	 * Render Process List Item widget output in the editor.
	 * Written as a Backbone JavaScript template and used to generate the live preview.
	*/
	
	//protected function _content_template(){}
	
}
Plugin::instance()->widgets_manager->register_widget_type( new Segovia_ContactAddress() );
