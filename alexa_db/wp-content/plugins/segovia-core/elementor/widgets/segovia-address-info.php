<?php
/*
 * Elementor Segovia Address Info Widget
 * Author & Copyright: VictorTheme
*/

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Segovia_AddressInfo extends Widget_Base{

	/**
	 * Retrieve the widget name.
	*/
	public function get_name(){
		return 'vt-segovia_address_info';
	}

	/**
	 * Retrieve the widget title.
	*/
	public function get_title(){
		return esc_html__( 'Address Info', 'segovia-core' );
	}

	/**
	 * Retrieve the widget icon.
	*/
	public function get_icon() {
		return 'fa fa-envelope';
	}

	/**
	 * Retrieve the list of categories the widget belongs to.
	*/
	public function get_categories() {
		return ['victortheme-category'];
	}

	/**
	 * Retrieve the list of scripts the Segovia Address Info widget depended on.
	 * Used to set scripts dependencies required to run the widget.
	*/
	/*
	public function get_script_depends() {
		return ['vt-segovia_list'];
	}
	*/
	
	/**
	 * Register Segovia Address Info widget controls.
	 * Adds different input fields to allow the user to change and customize the widget settings.
	*/
	protected function _register_controls(){
		
		$this->start_controls_section(
			'section_address_info',
			[
				'label' => esc_html__( 'Address Info Options', 'segovia-core' ),
			]
		);
		$this->add_control(
			'address_title',
			[
				'label' => esc_html__( 'Title', 'segovia-core' ),
				'type' => Controls_Manager::TEXT,
				'placeholder' => esc_html__( 'Enter item title here', 'segovia-core' ),
				'label_block' => true,
			]
		);
		$this->add_control(
			'address_text',
			[
				'label' => esc_html__( 'Description', 'segovia-core' ),
				'type' => Controls_Manager::TEXTAREA,
				'placeholder' => esc_html__( 'Enter short intro text here', 'segovia-core' ),
				'label_block' => true,
			]
		);
		
		$repeater = new Repeater();	
		$repeater->add_control(
			'list_icon',
			[
				'label' => esc_html__( 'Icon', 'segovia-core' ),
				'type' => Controls_Manager::ICON,
				'options' => Controls_Helper_Output::get_include_icons(),
				'frontend_available' => true,
				'default' => 'fa fa-home',
			]
		);
		$repeater->add_control(
			'list_title',
			[
				'label' => esc_html__( 'List Title', 'segovia-core' ),
				'type' => Controls_Manager::TEXT,
				'placeholder' => esc_html__( 'Enter item title here', 'segovia-core' ),
				'label_block' => true,
			]
		);	
		$repeater->add_control(
			'list_text',
			[
				'label' => esc_html__( 'Link Text', 'segovia-core' ),
				'type' => Controls_Manager::TEXT,
				'placeholder' => esc_html__( 'Enter item link text here', 'segovia-core' ),
				'label_block' => true,
			]
		);
		$repeater->add_control(
			'list_title_link',
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
			'listItems_groups',
			[
				'label' => esc_html__( 'Address Info', 'segovia-core' ),
				'type' => Controls_Manager::REPEATER,
				'default' => [
					[
						'list_title' => esc_html__( 'Item #1', 'segovia-core' ),
					],
					
				],
				'fields' => $repeater->get_controls(),
				'title_field' => '{{{ list_title }}}',
			]
		);

		$this->end_controls_section();// end: Section
		
		$this->start_controls_section(
			'section_address_info_title_style',
			[
				'label' => esc_html__( 'Title', 'segovia-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'sasadd_title_typography',				
				'selector' => '{{WRAPPER}} .get-in-touch h2',
			]
		);
		$this->add_control(
			'list_title_color',
			[
				'label' => esc_html__( 'Color', 'segovia-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .get-in-touch h2' => 'color: {{VALUE}};',
				],
			]
		);
		$this->end_controls_section();// end: Section

		$this->start_controls_section(
			'section_address_info_cont_style',
			[
				'label' => esc_html__( 'Content', 'segovia-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'list_content_typography',
				'selector' => '{{WRAPPER}} .get-in-touch p',
			]
		);
		$this->add_control(
			'list_content_color',
			[
				'label' => esc_html__( 'Color', 'segovia-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .get-in-touch p' => 'color: {{VALUE}};',
				],
			]
		);
		$this->end_controls_section();// end: Section

		// Icon
		$this->start_controls_section(
			'section_address_info_icon_style',
			[
				'label' => esc_html__( 'Icon', 'segovia-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'list_icon_color',
			[
				'label' => esc_html__( 'Color', 'segovia-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .contact-info ul li i' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_responsive_control(
			'icon_size',
			[
				'label' => esc_html__( 'Icon Size', 'segovia-core' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 33,
						'max' => 200,
						'step' => 1,
					],
				],
				'size_units' => [ 'px' ],
				'selectors' => [
					'{{WRAPPER}} .contact-info ul li i' => 'font-size: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_section();// end: Section
		
		$this->start_controls_section(
			'section_text_link_style',
			[
				'label' => esc_html__( 'Links', 'segovia-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'link_text_typography',
				'selector' => '{{WRAPPER}} .contact-info ul li',
			]
		);

		$this->start_controls_tabs( 'contect_title_style' );
		$this->start_controls_tab(
			'title_normal',
			[
				'label' => esc_html__( 'Normal', 'segovia-core' ),
			]
		);
		$this->add_control(
			'link_text_color',
			[
				'label' => esc_html__( 'Color', 'segovia-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .contact-info ul li, {{WRAPPER}} .contact-info ul li a' => 'color: {{VALUE}};',
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
			'link_text_color_hov',
			[
				'label' => esc_html__( 'Hover Color', 'segovia-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .contact-info ul li a:hover' => 'color: {{VALUE}};',
				],
			]
		);
		$this->end_controls_tab();  // end:Hover tab
		$this->end_controls_tabs(); // end tabs	
		$this->end_controls_section();// end: Section

	}

	/**
	 * Render Address Info widget output on the frontend.
	 * Written in PHP and used to generate the final HTML.
	*/
	protected function render() {
		$settings = $this->get_settings_for_display();
		$address_title = !empty( $settings['address_title'] ) ? $settings['address_title'] : [];
		$address_text = !empty( $settings['address_text'] ) ? $settings['address_text'] : [];
		$listItems_groups = !empty( $settings['listItems_groups'] ) ? $settings['listItems_groups'] : [];

		$address_title = $address_title ? '<h2 class="contact-wrap-title">'.$address_title.'</h2>' : '';
		$address_text = $address_text ? '<p>'.$address_text.'</p>' : '';

							$output = '<div class="get-in-touch">
               '.$address_title.''.$address_text.'
                <div class="contact-info">
                  <ul>';
                     // Group Param Output
												if( is_array( $listItems_groups ) && !empty( $listItems_groups ) ){
												  foreach ( $listItems_groups as $each_list ) {

												  $list_title = !empty( $each_list['list_title'] ) ? $each_list['list_title'] : '';
												  $icon = !empty( $each_list['list_icon'] ) ? $each_list['list_icon'] : '';
												  $list_text = !empty( $each_list['list_text'] ) ? $each_list['list_text'] : '';
												  $list_title_link = !empty( $each_list['list_title_link']['url'] ) ? $each_list['list_title_link']['url'] : '';
													$list_title_link_external = !empty( $each_list['list_title_link']['is_external'] ) ? 'target="_blank"' : '';
													$list_title_link_nofollow = !empty( $each_list['list_title_link']['nofollow'] ) ? 'rel="nofollow"' : '';
													$list_title_link_attr = !empty( $list_title_link ) ?  $list_title_link_external.' '.$list_title_link_nofollow : '';

													$list_icon = $icon ? ' <i class="'.$icon.'" aria-hidden="true"></i>' : '';
													$list_title_actual = $list_title ? '<span>'.$list_title.'</span>' : '';
													$list_txt = $list_title_link ? '<a href="'.$list_title_link.'" '.$list_title_link_attr.'>'.$list_text.'</a>' : $list_text;

												  $output .= '<li>'.$list_icon.''.$list_title_actual.$list_txt.'</li>';
												  }
												}
                $output .='</ul>
                </div>
              </div>';

		echo $output;
		
	}

	/**
	 * Render Address Info widget output in the editor.
	 * Written as a Backbone JavaScript template and used to generate the live preview.
	*/
	
	//protected function _content_template(){}
	
}
Plugin::instance()->widgets_manager->register_widget_type( new Segovia_AddressInfo() );

