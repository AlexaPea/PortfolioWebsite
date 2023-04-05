<?php
/*
 * Elementor Segovia Process List Widget
 * Author & Copyright: VictorTheme
*/

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Segovia_Process extends Widget_Base{

	/**
	 * Retrieve the widget name.
	*/
	public function get_name(){
		return 'vt-segovia_process';
	}

	/**
	 * Retrieve the widget title.
	*/
	public function get_title(){
		return esc_html__( 'Process List Item', 'segovia-core' );
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
		return ['vt-segovia_process'];
	}
	*/
	
	/**
	 * Register Segovia Process List widget controls.
	 * Adds different input fields to allow the user to change and customize the widget settings.
	*/
	protected function _register_controls(){
		
		$this->start_controls_section(
			'process_list',
			[
				'label' => __( 'Process List Item', 'segovia-core' ),
			]
		);

		$repeater = new Repeater();

		$repeater->add_control(
			'process_image',
			[
				'label' => esc_html__( 'Upload Process Image', 'segovia-core' ),
				'type' => Controls_Manager::MEDIA,
				'frontend_available' => true,
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
				'description' => esc_html__( 'Set your process image.', 'segovia-core'),
			]
		);
		
		$repeater->add_control(
			'process_title',
			[
				'label' => esc_html__( 'Title', 'segovia-core' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( 'Title', 'segovia-core' ),
				'placeholder' => esc_html__( 'Type title text here', 'segovia-core' ),
				'label_block' => true,
			]
		);
		$repeater->add_control(
			'process_title_link',
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
		$repeater->add_control(
			'process_content',
			[
				'label' => esc_html__( 'Content', 'segovia-core' ),
				'type' => Controls_Manager::TEXTAREA,
				'placeholder' => esc_html__( 'Type content text here', 'segovia-core' ),
				'label_block' => true,
			]
		);
		$repeater->add_control(
			'process_sep_image',
			[
				'label' => esc_html__( 'Upload Process Separator Image', 'segovia-core' ),
				'type' => Controls_Manager::MEDIA,
				'frontend_available' => true,
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
				'description' => esc_html__( 'Set your process separator image.', 'segovia-core'),
			]
		);
		$this->add_control(
			'tools_groups',
			[
				'label' => esc_html__( 'Processs List Items', 'segovia-core' ),
				'type' => Controls_Manager::REPEATER,
				'default' => [
					[
						'process_title' => esc_html__( 'SEO Optimizing', 'segovia-core' ),
					],
					
				],
				'fields' => $repeater->get_controls(),
				'title_field' => '{{{ process_title }}}',
			]
		);
		
		$this->end_controls_section();// end: Section


		$this->start_controls_section(
			'process_title_style',
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
					'name' => 'process_title_typography',					
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
				'process_title_hover_color',
				[
					'label' => esc_html__( 'Color', 'segovia-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .process-item:hover  .process-title, {{WRAPPER}} .process-item a:focus, {{WRAPPER}} .process-item a:hover  ' => 'color: {{VALUE}};',
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
					'selector' => '{{WRAPPER}} .process-item p',
				]
			);
			$this->add_control(
				'content_color',
				[
					'label' => esc_html__( 'Color', 'segovia-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .process-item p' => 'color: {{VALUE}};',
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
		$tools = $this->get_settings_for_display( 'tools_groups' );
		$output = '';

			if( !empty( $tools ) && is_array( $tools ) ){
			$output .= '<div class="segva-process"><div class="container"> <div class="row">';

				// Group Param Output
				foreach ( $tools as $each_logo ) {
					$image_url = wp_get_attachment_url( $each_logo['process_image']['id'], 'thumbnail' );
					$segovia_alt = get_post_meta($each_logo['process_image']['id'], '_wp_attachment_image_alt', true);
					$sep_image_url = wp_get_attachment_url( $each_logo['process_sep_image']['id'], 'thumbnail' );
					$segovia_sep_alt = get_post_meta($each_logo['process_sep_image']['id'], '_wp_attachment_image_alt', true);
					$process_title = !empty( $each_logo['process_title'] ) ? $each_logo['process_title'] : '';
					$process_content = !empty( $each_logo['process_content'] ) ? $each_logo['process_content'] : '';

					$process_title_link = !empty( $each_logo['process_title_link'] ) ? $each_logo['process_title_link'] : '<span class="process-title">'.$each_logo['process_title'].'</span>';

					$link_url = !empty( $process_title_link['url'] ) ? esc_url($process_title_link['url']) : '';
					$link_external = !empty( $process_title_link['is_external'] ) ? 'target="_blank"' : '';
					$link_nofollow = !empty( $process_title_link['nofollow'] ) ? 'rel="nofollow"' : '';
					$link_attr = !empty( $process_title_link['url'] ) ?  $link_external.' '.$link_nofollow : '';
					

				  $process_title_link = !empty( $link_url ) ? '<a href="'.$link_url.'" '.$link_attr.' class="process-info"><span class="process-title">'.$each_logo['process_title'].'</span></a>' : $each_logo['process_title'];

				  $content = $process_content ? '<p>'.$process_content.'</p>' : '';
				 
				  $image = $image_url ? '<div class="segva-image"><img src="'. $image_url .'"  alt="'.$segovia_alt.'" width="102"></div>' : '';
				  $sep_image = $sep_image_url ? '<div class="separator-image"><img src="'. $sep_image_url .'"  alt="'.$segovia_sep_alt.'" width="16"></div>' : '';

		      $output .='<div class="col-lg-3 col-md-6 col-sm-12 process-item-wrap">
	            <div class="segva-item process-item">
	              '.$image.$sep_image.'
	             '.$process_title_link.$content.'
	            </div>
	          </div>';         
				}

			$output .= ' </div></div></div>';
		}
			echo $output;
		
	}

	/**
	 * Render Process List Item widget output in the editor.
	 * Written as a Backbone JavaScript template and used to generate the live preview.
	*/
	
	//protected function _content_template(){}
	
}
Plugin::instance()->widgets_manager->register_widget_type( new Segovia_Process() );
