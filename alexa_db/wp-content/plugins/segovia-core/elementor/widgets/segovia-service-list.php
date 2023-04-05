<?php
/*
 * Elementor Segovia Service List Widget
 * Author & Copyright: VictorTheme
*/

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Segovia_Service_List extends Widget_Base{

	/**
	 * Retrieve the widget name.
	*/
	public function get_name(){
		return 'vt-segovia_service_list';
	}

	/**
	 * Retrieve the widget title.
	*/
	public function get_title(){
		return esc_html__( 'Service List Item', 'segovia-core' );
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
	 * Retrieve the list of scripts the Segovia Service List widget depended on.
	 * Used to set scripts dependencies required to run the widget.
	*/
	/*
	public function get_script_depends() {
		return ['vt-segovia_service_list'];
	}
	*/
	
	/**
	 * Register Segovia Service List widget controls.
	 * Adds different input fields to allow the user to change and customize the widget settings.
	*/
	protected function _register_controls(){
		
		$this->start_controls_section(
			'service_list',
			[
				'label' => __( 'Service List Item', 'segovia-core' ),
			]
		);

		$this->add_control(
			'service_list_style',
			[
				'label' => __( 'Service List Style', 'saaspot-core' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'style-one' => esc_html__( 'Style One (Listing)', 'saaspot-core' ),
					'style-two' => esc_html__( 'Style Two (Listing With BG Image)', 'saaspot-core' ),
				],
				'default' => 'style-one',
			]
		);

		$this->add_control(
			'bg_image',
			[
				'label' => esc_html__( 'Upload Bacground Image', 'segovia-core' ),
				'type' => Controls_Manager::MEDIA,
				'condition' => [
					'service_list_style' => 'style-two',
				],
				'frontend_available' => true,
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
				'description' => esc_html__( 'Set your parallax bg image.', 'segovia-core'),
			]
		);
		$this->add_control(
			'service_bg_title',
			[
				'label' => esc_html__( 'Title', 'segovia-core' ),
				'type' => Controls_Manager::TEXT,
				'condition' => [
					'service_list_style' => 'style-two',
				],
				'default' => esc_html__( 'Title', 'segovia-core' ),
				'placeholder' => esc_html__( 'Type title text here', 'segovia-core' ),
				'label_block' => true,
			]
		);
		$this->add_control(
			'service_bg_content',
			[
				'label' => esc_html__( 'Content', 'segovia-core' ),
				'default' => esc_html__( 'your content text', 'segovia-core' ),
				'placeholder' => esc_html__( 'Type your content here', 'segovia-core' ),
				'type' => Controls_Manager::TEXTAREA,
				'condition' => [
					'service_list_style' => 'style-two',
				],
				'label_block' => true,
			]
		);
		$this->add_control(
			'service_bg_link_text',
			[
				'label' => esc_html__( 'Link Text', 'segovia-core' ),
				'type' => Controls_Manager::TEXT,
				'condition' => [
					'service_list_style' => 'style-two',
				],
				'placeholder' => esc_html__( 'Type link text here', 'segovia-core' ),
				'label_block' => true,
			]
		);
		$this->add_control(
			'service_bg_link_text_link',
			[
				'label' => esc_html__( 'Link', 'segovia-core' ),
				'type' => Controls_Manager::URL,
				'condition' => [
					'service_list_style' => 'style-two',
				],
				'placeholder' => 'https://your-link.com',
				'default' => [
					'url' => '',
				],
				'label_block' => true,
			]
		);

		$repeater = new Repeater();
		$repeater->add_control(
			'icon_type',
			[
				'label' => __( 'Icon Type', 'segovia-core' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'image' => esc_html__( 'Image', 'segovia-core' ),
					'icon' => esc_html__( 'Icon', 'segovia-core' ),
				],
				'default' => 'image',
			]
		);
		$repeater->add_control(
			'tools_icon',
			[
				'label' => esc_html__( 'Icon', 'segovia-core' ),
				'type' => Controls_Manager::ICON,
				'options' => Controls_Helper_Output::get_include_icons(),
				'frontend_available' => true,
				'default' => 'icon-arrows-check',
				'condition' => [
					'icon_type' => 'icon',
				],
			]
		);
		$repeater->add_control(
			'tools_image',
			[
				'label' => esc_html__( 'Upload Icon', 'segovia-core' ),
				'type' => Controls_Manager::MEDIA,
				'condition' => [
					'icon_type' => 'image',
				],
				'frontend_available' => true,
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
				'description' => esc_html__( 'Set your icon image.', 'segovia-core'),
			]
		);
		
		$repeater->add_control(
			'service_title',
			[
				'label' => esc_html__( 'Title', 'segovia-core' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( 'Title', 'segovia-core' ),
				'placeholder' => esc_html__( 'Type title text here', 'segovia-core' ),
				'label_block' => true,
			]
		);
		$repeater->add_control(
			'service_title_link',
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
			'tools_content',
			[
				'label' => esc_html__( 'Content', 'segovia-core' ),
				'default' => esc_html__( 'your content text', 'segovia-core' ),
				'placeholder' => esc_html__( 'Type your content here', 'segovia-core' ),
				'type' => Controls_Manager::TEXTAREA,
				'label_block' => true,
			]
		);
		$this->add_control(
			'tools_groups',
			[
				'label' => esc_html__( 'Services List Items', 'segovia-core' ),
				'type' => Controls_Manager::REPEATER,
				'default' => [
					[
						'service_title' => esc_html__( 'SEO Optimizing', 'segovia-core' ),
						'tools_content' => esc_html__( 'Iterative approaches to corporate strategy foster collaborative thinking to proposition.', 'segovia-core' ),
					],
					
				],
				'fields' => $repeater->get_controls(),
				'title_field' => '{{{ service_title }}}',
			]
		);
		
		$this->end_controls_section();// end: Section

		// Left Section Title
		$this->start_controls_section(
			'bg_title_section',
			[
				'label' => esc_html__( 'Left Section Title', 'segovia-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'service_list_style' => 'style-two',
				],
			]
		);
	

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'label' => esc_html__( 'Typography', 'segovia-core' ),
				'name' => 'bg_title_typography',				
				'selector' => '{{WRAPPER}} .services-left-wrap h2',
			]
		);
		$this->add_control(
			'bg_title_color',
			[
				'label' => esc_html__( 'Color', 'segovia-core' ),
				'type' => Controls_Manager::COLOR,
				'condition' => [
					'service_list_style' => 'style-two',
				],
				'selectors' => [
					'{{WRAPPER}} .services-left-wrap h2' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'bg_overlay_color',
			[
				'label' => esc_html__( 'Left Section Overlay Color', 'segovia-core' ),
				'type' => Controls_Manager::COLOR,
				'condition' => [
					'service_list_style' => 'style-two',
				],
				'selectors' => [
					'{{WRAPPER}} .services-left-wrap:before' => 'background: {{VALUE}};',
				],
			]
		);

		$this->end_controls_section();// end: Section

		// Left Section Content Area
		$this->start_controls_section(
			'bg_content_section',
			[
				'label' => esc_html__( 'Left Section Content', 'segovia-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'service_list_style' => 'style-two',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'label' => esc_html__( 'Typography', 'segovia-core' ),
				'name' => 'bg_content_typography',
				'selector' => '{{WRAPPER}} .services-left-wrap p',
			]
		);
		$this->add_control(
			'bg_content_color',
			[
				'label' => esc_html__( 'Color', 'segovia-core' ),
				'type' => Controls_Manager::COLOR,
				'condition' => [
					'service_list_style' => 'style-two',
				],
				'selectors' => [
					'{{WRAPPER}} .services-left-wrap p' => 'color: {{VALUE}};',
				],
			]
		);
		$this->end_controls_section();// end: Section

		// Left Section Link
		$this->start_controls_section(
			'bg_link_section',
			[
				'label' => esc_html__( 'Left Section Link', 'segovia-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'service_list_style' => 'style-two',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'label' => esc_html__( 'Typography', 'segovia-core' ),
				'name' => 'bg_link_typography',
				'selector' => '{{WRAPPER}} .services-left-wrap .segva-border-link a',
			]
		);

		$this->add_responsive_control(
			'link_icon_size',
			[
				'label' => esc_html__( 'Link Icon Size', 'segovia-core' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 2,
						'max' => 120,
						'step' => 2,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .segva-border-link a i' => 'font-size: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->start_controls_tabs( 'list_title_style' );
		$this->start_controls_tab(
				'bg_title_normal',
				[
					'label' => esc_html__( 'Normal', 'segovia-core' ),
				]
			);
		$this->add_control(
			'bg_link_text_color',
			[
				'label' => esc_html__( 'Color', 'segovia-core' ),
				'type' => Controls_Manager::COLOR,
				'condition' => [
					'service_list_style' => 'style-two',
				],
				'selectors' => [
					'{{WRAPPER}} .services-left-wrap .segva-border-link a' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
				'bg_link_border_color',
				[
					'label' => esc_html__( 'Link Border Color', 'segovia-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .segva-border-link a:after' => 'background: {{VALUE}};',
					],
				]
			);

		$this->end_controls_tab();  // end:Normal tab

			$this->start_controls_tab(
				'bg_title_hover',
				[
					'label' => esc_html__( 'Hover', 'segovia-core' ),
				]
			);

			$this->add_control(
				'bg_title_hover_color',
				[
					'label' => esc_html__( 'Color', 'segovia-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .services-left-wrap .segva-border-link a:hover' => 'color: {{VALUE}};',
					],
				]
			);

		$this->end_controls_tab();  // end:Hover tab
		$this->end_controls_tabs(); // end tabs

		$this->end_controls_section();// end: Section


		$this->start_controls_section(
			'icon_style',
			[
				'label' => esc_html__( 'Icon', 'segovia-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'icon_color',
			[
				'label' => esc_html__( 'Color', 'segovia-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .segva-service-item-list .service-item .segva-icon i' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_responsive_control(
			'icon_font_size',
			[
				'label' => esc_html__( 'Icon Font Size', 'segovia-core' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 1,
						'max' => 200,
						'step' => 1,
					],
				],
				'size_units' => [ 'px' ],
				'selectors' => [
					'{{WRAPPER}} .segva-service-item-list .service-item .segva-icon i' => 'font-size: {{SIZE}}{{UNIT}};',
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
					'name' => 'sastool_title_typography',					
					'selector' => '{{WRAPPER}} .service-info h4',
				]
			);
			$this->add_control(
				'title_color',
				[
					'label' => esc_html__( 'Color', 'segovia-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .service-info h4, {{WRAPPER}} .service-info h4 a' => 'color: {{VALUE}};',
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
						'{{WRAPPER}} .service-info h4 a:hover' => 'color: {{VALUE}};',
					],
				]
			);

		$this->end_controls_tab();  // end:Hover tab
		$this->end_controls_tabs(); // end tabs

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
					'selector' => '{{WRAPPER}} .service-info p',
				]
			);
			$this->add_control(
				'content_color',
				[
					'label' => esc_html__( 'Color', 'segovia-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .service-info p' => 'color: {{VALUE}};',
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
		$service_list_style = !empty( $settings['service_list_style'] ) ? $settings['service_list_style'] : [];
		$service_bg_title = !empty( $settings['service_bg_title'] ) ? $settings['service_bg_title'] : [];
		$service_bg_content = !empty( $settings['service_bg_content'] ) ? $settings['service_bg_content'] : [];
		$service_bg_link_text = !empty( $settings['service_bg_link_text'] ) ? $settings['service_bg_link_text'] : [];

		$service_bg_link_text_link = !empty( $settings['service_bg_link_text_link'] ) ? $settings['service_bg_link_text_link'] : '';
		$link_url = !empty( $service_bg_link_text_link['url'] ) ? esc_url($service_bg_link_text_link['url']) : '';
		$link_external = !empty( $service_bg_link_text_link['is_external'] ) ? 'target="_blank"' : '';
		$link_nofollow = !empty( $service_bg_link_text_link['nofollow'] ) ? 'rel="nofollow"' : '';
		$link_attr = !empty( $service_bg_link_text_link['url'] ) ?  $link_external.' '.$link_nofollow : '';

		$bg_image = !empty( $settings['bg_image']['id'] ) ? $settings['bg_image']['id'] : '';	

		// Image
		$image_url = wp_get_attachment_url( $bg_image );

		$title_link_main = !empty( $service_bg_link_text_link ) ? '<div class="segva-border-link"><a href="'.$link_url.'" '.$link_attr.' class="segva-btn"><i class="fa fa-angle-right" aria-hidden="true"></i> '.$service_bg_link_text.'</a></div>' : '<div class="segva-border-link"><span class="segva-btn"><i class="fa fa-angle-right" aria-hidden="true"></i> '.$service_bg_link_text.'</span></div>';

		$title_link_actual = $service_bg_link_text ? $title_link_main : '';

		$output = '';

			if( !empty( $tools ) && is_array( $tools ) ){
			$output .= '<div class="segva-services">';
			if($service_list_style === 'style-two') {
				$output .='<div class="row"><div class="col-lg-6 col-md-12 serv-class">
					  <div class="segva-item services-wrap-item services-left-wrap segva-parallax" style="background-image: url('.$image_url.');">
            <div class="segva-table-wrap">
              <div class="segva-align-wrap">
                <div class="services-info-wrap">
                  <h2 class="services-wrap-title">'.$service_bg_title.'</h2>
                  <p>'.$service_bg_content.'</p>
                  '.$title_link_actual.'
                </div>
              </div>
            </div>
          </div>
          </div>

           <div class="col-lg-6 col-md-12 serv-class">
           <div class="services-wrap-item">
           <div class="segva-table-wrap">
              <div class="segva-align-wrap">
                <div class="services-info-wrap">';	
        }


				// Group Param Output
				foreach ( $tools as $each_logo ) {
					$image_url = wp_get_attachment_url( $each_logo['tools_image']['id'], 'thumbnail' );
					$segovia_alt = get_post_meta($each_logo['tools_image']['id'], '_wp_attachment_image_alt', true);
					$service_title_link = !empty( $each_logo['service_title_link'] ) ? $each_logo['service_title_link'] : '';

					$link_url = !empty( $service_title_link['url'] ) ? esc_url($service_title_link['url']) : '';
					$link_external = !empty( $service_title_link['is_external'] ) ? 'target="_blank"' : '';
					$link_nofollow = !empty( $service_title_link['nofollow'] ) ? 'rel="nofollow"' : '';
					$link_attr = !empty( $service_title_link['url'] ) ?  $link_external.' '.$link_nofollow : '';
					

					$icon_type = !empty( $each_logo['icon_type'] ) ? $each_logo['icon_type'] : '';
		  		$icon = !empty( $each_logo['tools_icon'] ) ? $each_logo['tools_icon'] : '';

				  $title_link = !empty( $link_url ) ? '<a href="'.$link_url.'" '.$link_attr.'>'.$each_logo['service_title'].'</a>' : $each_logo['service_title'];
				  $content = !empty( $each_logo['tools_content'] ) ? '<p>'.$each_logo['tools_content'].'</p>' : '';

				  $image = $image_url ? '<div class="segva-icon"><img src="'. $image_url .'" width=56 alt="'.$segovia_alt.'"></div>' : '';
					$icon = $icon ? '<div class="segva-icon"><i class="'.$icon.'" aria-hidden="true"></i></div>' : '';

				  if($icon_type === 'icon') {
					  $icon_image = $icon;
					} else {
					  $icon_image = $image;
					}

						$title = !empty( $each_logo['service_title'] ) ? '<h4 class="service-title">'.$title_link.'</h4>' : '';

						if($service_list_style === 'style-two') {
				  	
					  $output .= '<div class="service-item ">
		                      '.$icon_image.'
		                    <div class="service-info">
		                      '.$title.$content.'
		                    </div>
		                  </div> ';
							}
					else {
							$output .= '<div class="service-item">
		                      '.$icon_image.'
		                    <div class="service-info">
		                      '.$title.$content.'
		                    </div>
		                  </div>';
					}
				}

			$output .= ' </div>';
			if($service_list_style === 'style-two') {
				$output .='</div>
            </div></div>
            </div> </div></div>';
			}
		}
			echo $output;
		
	}

	/**
	 * Render Service List Item widget output in the editor.
	 * Written as a Backbone JavaScript template and used to generate the live preview.
	*/
	
	//protected function _content_template(){}
	
}
Plugin::instance()->widgets_manager->register_widget_type( new Segovia_Service_List() );

