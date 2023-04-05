<?php
/*
 * Elementor SaaSpot Tools Widget
 * Author & Copyright: VictorTheme
*/

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Segovia_ContactInfo extends Widget_Base{

	/**
	 * Retrieve the widget name.
	*/
	public function get_name(){
		return 'vt-segovia_infos';
	}

	/**
	 * Retrieve the widget title.
	*/
	public function get_title(){
		return esc_html__( 'Contact Info', 'segovia-core' );
	}

	/**
	 * Retrieve the widget icon.
	*/
	public function get_icon() {
		return 'fa fa-wrench';
	}

	/**
	 * Retrieve the list of categories the widget belongs to.
	*/
	public function get_categories() {
		return ['victortheme-category'];
	}

	/**
	 * Retrieve the list of scripts the SaaSpot Contact Info widget depended on.
	 * Used to set scripts dependencies required to run the widget.
	*/
	/*
	public function get_script_depends() {
		return ['vt-segovia_infos'];
	}
	*/
	
	/**
	 * Register SaaSpot Contact Info widget controls.
	 * Adds different input fields to allow the user to change and customize the widget settings.
	*/
	protected function _register_controls(){
		
		$this->start_controls_section(
			'section_infos',
			[
				'label' => __( 'Contact Info Item', 'segovia-core' ),
			]
		);


		$repeater = new Repeater();

		$repeater->add_control(
			'infos_contact_title',
			[
				'label' => esc_html__( 'Contact Info Title', 'segovia-core' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( 'General', 'segovia-core' ),
				'placeholder' => esc_html__( 'Type title text here', 'segovia-core' ),
				'label_block' => true,
			]
		);
		$repeater->add_control(
			'infos_content',
			[
				'label' => esc_html__( 'Content', 'segovia-core' ),
				'default' => esc_html__( 'your content text', 'segovia-core' ),
				'placeholder' => esc_html__( 'Type your content here', 'segovia-core' ),
				'type' => Controls_Manager::TEXTAREA,
				'label_block' => true,
			]
		);
		
		$repeater->add_control(
			'infos_title',
			[
				'label' => esc_html__( 'Contact Link Text', 'segovia-core' ),
				'type' => Controls_Manager::TEXT,
				'placeholder' => esc_html__( 'Type link text here', 'segovia-core' ),
				'label_block' => true,
			]
		);
		$repeater->add_control(
			'infos_info_link',
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

		$this->add_control(
			'infos_groups',
			[
				'label' => esc_html__( 'Contact Info Items', 'segovia-core' ),
				'type' => Controls_Manager::REPEATER,
				'default' => [
					[
						'infos_title' => esc_html__( 'Contact Us', 'segovia-core' ),
						'infos_content' => esc_html__( 'The ship set ground on the shore of this sert gilligan millionaire and his wife  with three boys of his own come and knock on our door.', 'segovia-core' ),
					],
					
				],
				'fields' => $repeater->get_controls(),
				'title_field' => '{{{ infos_title }}}',
			]
		);
		
		$this->end_controls_section();// end: Section

		$this->start_controls_section(
			'section_box_style',
			[
				'label' => esc_html__( 'Section', 'segovia-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
			$this->add_group_control(
				Group_Control_Border::get_type(),
				[
					'name' => 'box_border',
					'label' => esc_html__( 'Border', 'segovia-core' ),
					'selector' => '{{WRAPPER}} .info-item, {{WRAPPER}} .chat-support-item',
				]
			);
			
		$this->end_controls_section();// end: Section

		$this->start_controls_section(
			'main_title_style',
			[
				'label' => esc_html__( 'Main Title', 'segovia-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'label' => esc_html__( 'Typography', 'segovia-core' ),
				'name' => 'main_title_typography',				
				'selector' => '{{WRAPPER}} .info-item .info-main-title',
			]
		);
		$this->add_control(
			'main_title_color',
			[
				'label' => esc_html__( 'Color', 'segovia-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .info-item .info-main-title' => 'color: {{VALUE}};',
				],
			]
		);

		$this->end_controls_section();// end: Section

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
					'label' => esc_html__( 'Typography', 'segovia-core' ),
					'name' => 'sasinfo_link_typography',					
					'selector' => '{{WRAPPER}} .info-info .info-title, {{WRAPPER}} .info-info .info-title a',
				]
			);
			$this->add_control(
				'link_color',
				[
					'label' => esc_html__( 'Color', 'segovia-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .info-info .info-title, {{WRAPPER}} .info-info .info-title a' => 'color: {{VALUE}};',
					],
				]
			);
			$this->add_control(
				'link_hover_color',
				[
					'label' => esc_html__( 'Hover Color', 'segovia-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .info-info .info-title a:hover' => 'color: {{VALUE}};',
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
					'selector' => '{{WRAPPER}} .info-info p',
				]
			);
			$this->add_control(
				'content_color',
				[
					'label' => esc_html__( 'Color', 'segovia-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .info-info p' => 'color: {{VALUE}};',
					],
				]
			);
		$this->end_controls_section();// end: Section
		
	}

	/**
	 * Render Contact Info widget output on the frontend.
	 * Written in PHP and used to generate the final HTML.
	*/
	protected function render() {
		// Contact Info query
		$settings = $this->get_settings_for_display();
		$infos = $this->get_settings_for_display( 'infos_groups' );

			$output = '';

			if( !empty( $infos ) && is_array( $infos ) ){
			$output .= '<div class="Contact-info-main-wrap">';	

				// Group Param Output
				foreach ( $infos as $each_logo ) {
				
					$infos_info_link = !empty( $each_logo['infos_info_link'] ) ? $each_logo['infos_info_link'] : '';
					$link_url = !empty( $infos_info_link['url'] ) ? esc_url($infos_info_link['url']) : '';
					$link_external = !empty( $infos_info_link['is_external'] ) ? 'target="_blank"' : '';
					$link_nofollow = !empty( $infos_info_link['nofollow'] ) ? 'rel="nofollow"' : '';
					$link_attr = !empty( $infos_info_link['url'] ) ?  $link_external.' '.$link_nofollow : '';

					// $icon_type = !empty( $each_logo['icon_type'] ) ? $each_logo['icon_type'] : '';
		  		$info_main_title = !empty( $each_logo['infos_contact_title'] ) ? $each_logo['infos_contact_title'] : '';

				  $info_link = !empty( $link_url ) ? '<a href="'.$link_url.'" '.$link_attr.'>'.$each_logo['infos_title'].'</a>' : $each_logo['infos_title'];
				  $content = !empty( $each_logo['infos_content'] ) ? '<p>'.$each_logo['infos_content'].'</p>' : '';


				
				  	$info_link_title = !empty( $each_logo['infos_title'] ) ? '<h5 class="info-title">'.$info_link.'</h5>' : '';
						$output .= '<div class="info-item"><span class="info-main-title">'.$info_main_title.'</span><div class="info-info">'.$content.$info_link_title.'</div></div>';
					
				}

			$output .= '</div>';
			}
			echo $output;
		
	}

	/**
	 * Render Contact Info widget output in the editor.
	 * Written as a Backbone JavaScript template and used to generate the live preview.
	*/
	
	//protected function _content_template(){}
	
}
Plugin::instance()->widgets_manager->register_widget_type( new Segovia_ContactInfo() );