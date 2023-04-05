<?php
/*
 * Elementor Segovia Looking For Widget
 * Author & Copyright: VictorTheme
*/

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Segovia_About_Item extends Widget_Base{

	/**
	 * Retrieve the widget name.
	*/
	public function get_name(){
		return 'vt-segovia_about_item';
	}

	/**
	 * Retrieve the widget title.
	*/
	public function get_title(){
		return esc_html__( 'About Item', 'segovia-core' );
	}

	/**
	 * Retrieve the widget icon.
	*/
	public function get_icon() {
		return 'fa fa-eye';
	}

	/**
	 * Retrieve the list of categories the widget belongs to.
	*/
	public function get_categories() {
		return ['victortheme-category'];
	}

	/**
	 * Retrieve the list of scripts the Segovia Looking For widget depended on.
	 * Used to set scripts dependencies required to run the widget.
	*/
	/*
	public function get_script_depends() {
		return ['vt-segovia_about_item'];
	}
	*/
	
	/**
	 * Register Segovia Looking For widget controls.
	 * Adds different input fields to allow the user to change and customize the widget settings.
	*/
	protected function _register_controls(){
		
		$this->start_controls_section(
			'section_looking',
			[
				'label' => __( 'About Item Section', 'segovia-core' ),
			]
		);

		// Item Image Section
		$this->add_control(
			'about_item_image',
			[
				'label' => esc_html__( 'Item Image', 'segovia-core' ),
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
				'label_block' => true,
			]
		);
		// Item Title Section
		$this->add_control(
			'about_item_title',
			[
				'label' => esc_html__( 'Title Text', 'segovia-core' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( 'Title Text', 'segovia-core' ),
				'placeholder' => esc_html__( 'Type title text here', 'segovia-core' ),
				'label_block' => true,
			]
		);
		$this->add_control(
			'about_item_title_link',
			[
				'label' => esc_html__( 'Title Link', 'segovia-core' ),
				'type' => Controls_Manager::URL,
				'placeholder' => 'https://your-link.com',
				'default' => [
					'url' => '',
				],
				'label_block' => true,
			]
		);
		// Item Content Section
		$this->add_control(
			'about_item_content',
			[
				'label' => esc_html__( 'Content', 'segovia-core' ),
				'default' => esc_html__( 'your content text', 'segovia-core' ),
				'placeholder' => esc_html__( 'Type your content here', 'segovia-core' ),
				'type' => Controls_Manager::TEXTAREA,
				'label_block' => true,
			]
		);

		// Alignment Section
		$this->add_control(
			'readmore_alignment',
			[
				'label' => esc_html__( 'Section Alignment', 'segovia-core' ),
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
					'{{WRAPPER}} .about-item' => 'text-align: {{VALUE}};',
				],
			]
		);

		$this->end_controls_section();// end: Section

		// Read More Section
		$this->start_controls_section(
			'section_read_more',
			[
				'label' => esc_html__( 'Read More Options', 'segovia-core' ),
			]
		);
		$this->add_control(
			'read_more',
			[
				'label' => esc_html__( 'Read More Text', 'segovia-core' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( 'Read More Text', 'segovia-core' ),
				'placeholder' => esc_html__( 'Type btn text here', 'segovia-core' ),
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
		$this->add_control(
			'read_more_icon',
			[
				'label' => esc_html__( 'Icon', 'segovia-core' ),
				'type' => Controls_Manager::ICON,
				'options' => Controls_Helper_Output::get_include_icons(),
				'frontend_available' => true,
				'default' => 'fa fa-angle-right',
			]
		);
		$this->end_controls_section();// end: Section
		
		// Title Styles
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
					'name' => 'sasloo_title_typography',					
					'selector' => '{{WRAPPER}} .about-info h4',
				]
			);
			$this->start_controls_tabs( 'about_title_style' );
			$this->start_controls_tab(
				'title_normal',
				[
					'label' => esc_html__( 'Normal', 'segovia-core' ),
				]
			);
			$this->add_control(
				'title_color',
				[
					'label' => esc_html__( 'Color', 'segovia-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .about-info h4, {{WRAPPER}} .about-info h4 a' => 'color: {{VALUE}};',
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
				'title_hover_color',
				[
					'label' => esc_html__( 'Color', 'segovia-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .about-info h4 a:hover ' => 'color: {{VALUE}};',
					],
				]
			);

			$this->end_controls_tab();  // end:Hover tab
		$this->end_controls_tabs(); // end tabs

		$this->end_controls_section();// end: Section
		
		// Content Styles
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
					'selector' => '{{WRAPPER}} .about-info p',
				]
			);
			$this->add_control(
				'content_color',
				[
					'label' => esc_html__( 'Color', 'segovia-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .about-info p' => 'color: {{VALUE}};',
					],
				]
			);
		$this->end_controls_section();// end: Section

		$this->start_controls_section(
			'section_readmore_style',
			[
				'label' => esc_html__( 'Read More', 'segovia-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'readmore_typography',				
				'selector' => '{{WRAPPER}} .about-info .segva-link a, {{WRAPPER}} .about-info .segva-link a i',
			]
		);

		$this->add_responsive_control(
			'about_item_icon_size',
			[
				'label' => esc_html__( 'Arrow Icon Size', 'windfall-core' ),
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
					'{{WRAPPER}} .about-info .segva-link a i' => 'font-size: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->start_controls_tabs( 'readmore_style' );
			$this->start_controls_tab(
				'readmore_normal',
				[
					'label' => esc_html__( 'Normal', 'segovia-core' ),
				]
			);
			$this->add_control(
				'readmore_color',
				[
					'label' => esc_html__( 'Color', 'segovia-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .about-info .segva-link a, {{WRAPPER}} .about-info .segva-link a i' => 'color: {{VALUE}};',
					],
				]
			);

			$this->end_controls_tab();  // end:Normal tab
			
			$this->start_controls_tab(
				'readmore_hover',
				[
					'label' => esc_html__( 'Hover', 'segovia-core' ),
				]
			);
			$this->add_control(
				'readmore_hover_color',
				[
					'label' => esc_html__( 'Color', 'segovia-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .about-info .segva-link a:hover ' => 'color: {{VALUE}};',
					],
				]
			);


			$this->add_control(
				'readmore_border_hover_color',
				[
					'label' => esc_html__( 'Border Color', 'segovia-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .segva-link a:after' => 'background: {{VALUE}};',
					],
				]
			);

			$this->end_controls_tab();  // end:Hover tab
		$this->end_controls_tabs(); // end tabs
		
		$this->end_controls_section();// end: Section

		// Image Overlay Color
		$this->start_controls_section(
			'section_image_style',
			[
				'label' => esc_html__( 'Image Overlay', 'segovia-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
				'overlay_color',
				[
					'label' => esc_html__( 'Image Hover Overlay Color', 'segovia-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .about-item .segva-image:before' => 'background: {{VALUE}};',
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
		$about_item_image = !empty( $settings['about_item_image']['id'] ) ? $settings['about_item_image']['id'] : '';	
		$about_item_title = !empty( $settings['about_item_title'] ) ? $settings['about_item_title'] : '';	
		$about_item_title_link = !empty( $settings['about_item_title_link']['url'] ) ? $settings['about_item_title_link']['url'] : '';
		$about_item_title_link_external = !empty( $settings['about_item_title_link']['is_external'] ) ? 'target="_blank"' : '';
		$about_item_title_link_nofollow = !empty( $settings['about_item_title_link']['nofollow'] ) ? 'rel="nofollow"' : '';
		$about_item_title_link_attr = !empty( $about_item_title_link ) ?  $about_item_title_link_external.' '.$about_item_title_link_nofollow : '';

		$about_item_content = !empty( $settings['about_item_content'] ) ? $settings['about_item_content'] : '';	
		$read_more = !empty( $settings['read_more'] ) ? $settings['read_more'] : '';	
		$read_more_link = !empty( $settings['read_more_link']['url'] ) ? $settings['read_more_link']['url'] : '';
		$read_more_link_external = !empty( $settings['read_more_link']['is_external'] ) ? 'target="_blank"' : '';
		$read_more_link_nofollow = !empty( $settings['read_more_link']['nofollow'] ) ? 'rel="nofollow"' : '';
		$read_more_link_attr = !empty( $read_more_link ) ?  $read_more_link_external.' '.$read_more_link_nofollow : '';

		$read_more_icon = !empty( $settings['read_more_icon'] ) ? $settings['read_more_icon'] : '';	
		$image_url = wp_get_attachment_url( $about_item_image );

		$image = $about_item_image ? '<div class="segva-image"><a href="#0"><img src="'.$image_url.'" alt="'.$about_item_title.'"></a></div>' : '';
		$title_link = $about_item_title_link ? '<a href="'.$about_item_title_link.'">'.$about_item_title.'</a>' : $about_item_title;
		$title = $about_item_title ? '<h4 class="about-title">'.$title_link.'</h4>' : '';
		$content = $about_item_content ? '<p>'.$about_item_content.'</p>' : '';
		$icon = $read_more_icon ? ' <i class="'.$read_more_icon.'" aria-hidden="true"></i> ' : '';
		$readmore = $read_more_link ? '<div class="segva-link"><a href="'.esc_url($read_more_link).'" '.$read_more_link_attr .'>'.$icon. $read_more.'</a></div>' : '';

		$output =' <div class="segva-item about-item">
              '.$image.'
              <div class="about-info">
                '.$title.''.$content.''.$readmore.'
              </div>
            </div>';
		echo $output;
		
	}

	/**
	 * Render Looking For widget output in the editor.
	 * Written as a Backbone JavaScript template and used to generate the live preview.
	*/
	
	//protected function _content_template(){}
	
}
Plugin::instance()->widgets_manager->register_widget_type( new Segovia_About_Item() );

