<?php
/*
 * Elementor Segovia Accordion Widget
 * Author & Copyright: VictorTheme
*/

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Segovia_BootAccordion extends Widget_Base{

	/**
	 * Retrieve the widget name.
	*/
	public function get_name(){
		return 'vt-segovia_boot_accordion';
	}

	/**
	 * Retrieve the widget title.
	*/
	public function get_title(){
		return esc_html__( 'Segovia Accordion', 'segovia-core' );
	}

	/**
	 * Retrieve the widget icon.
	*/
	public function get_icon() {
		return 'fa fa-bars';
	}

	/**
	 * Retrieve the list of categories the widget belongs to.
	*/
	public function get_categories() {
		return ['victortheme-category'];
	}

	/**
	 * Retrieve the list of scripts the Segovia FAQ Accordion widget depended on.
	 * Used to set scripts dependencies required to run the widget.
	*/
	/*
	public function get_script_depends() {
		return ['vt-segovia_boot_accordion'];
	}
	*/
	
	/**
	 * Register Segovia FAQ Accordion widget controls.
	 * Adds different input fields to allow the user to change and customize the widget settings.
	*/
	protected function _register_controls(){

		$this->start_controls_section(
			'section_active',
			[
				'label' => __( 'Accordion Options', 'segovia-core' ),
			]
		);
		$this->add_control(
			'accordion_style',
			[
				'label' => __( 'Accordion Style', 'segovia-core' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'style-one' => esc_html__( 'Style One', 'segovia-core' ),
					'style-two' => esc_html__( 'Style Two', 'segovia-core' ),
				],
				'default' => 'style-one',
				'description' => esc_html__( 'Select your accordion style.', 'segovia-core' ),
			]
		);

		$this->add_control(
			'active',
			[
				'label' => __( 'Active Accordion Number', 'segovia-core' ),
				'type' => Controls_Manager::TEXT,
				'default' => 1,
			]
		);
		$this->add_control(
			'hide_border',
			[
				'label' => esc_html__( 'Hide Border', 'segovia-core' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Yes', 'segovia-core' ),
				'label_off' => esc_html__( 'No', 'segovia-core' ),
				'return_value' => 'true',
				'default' => 'true',
			]
		);
		
		$this->end_controls_section();// end: Section

		$this->start_controls_section(
			'section_boot_accordion',
			[
				'label' => __( 'FAQ Accordion Item', 'segovia-core' ),
			]
		);		

		$repeater = new Repeater();		
		$repeater->add_control(
			'accordion_title',
			[
				'label' => esc_html__( 'Accordion Title', 'segovia-core' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( 'Accordion Title', 'segovia-core' ),
				'placeholder' => esc_html__( 'Type title here', 'segovia-core' ),
				'label_block' => true,
			]
		);
		$repeater->add_control(
			'accordion_content',
			[
				'label' => esc_html__( 'Content', 'segovia-core' ),
				'default' => esc_html__( 'your content text', 'segovia-core' ),
				'placeholder' => esc_html__( 'Type your content here', 'segovia-core' ),
				'type' => Controls_Manager::WYSIWYG,
				'label_block' => true,
			]
		);
		$this->add_control(
			'bootAccordion_groups',
			[
				'label' => esc_html__( 'FAQ Accordion Items', 'segovia-core' ),
				'type' => Controls_Manager::REPEATER,
				'default' => [
					[
						'accordion_title' => esc_html__( 'Item #1', 'segovia-core' ),
					],
					
				],
				'fields' => $repeater->get_controls(),
				'title_field' => '{{{ accordion_title }}}',
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
		$this->add_control(
			'section_width',
			[
				'label' => esc_html__( 'Width', 'segovia-core' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1200,
						'step' => 1,
					],
				],
				'size_units' => [ 'px' ],
				'selectors' => [
					'{{WRAPPER}} .faq-wrap' => 'max-width: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'section_border',
				'label' => esc_html__( 'Border', 'segovia-core' ),
				'selector' => '{{WRAPPER}} .card',
			]
		);
		$this->add_control(
			'section_border_radius',
			[
				'label' => __( 'Border Radius', 'segovia-core' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .card, {{WRAPPER}} .card-header' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
				'name' => 'sasacc_title_typography',				
				'selector' => '{{WRAPPER}}  h4.accordion-title button',
			]
		);
		$this->start_controls_tabs( 'title_style' );
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
						'{{WRAPPER}}  h4.accordion-title button.collapsed, {{WRAPPER}}  h4.accordion-title button.collapsed:before' => 'color: {{VALUE}};',
					],
				]
			);
			$this->add_control(
				'title_bg_color',
				[
					'label' => esc_html__( 'Background Color', 'segovia-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}}  h4.accordion-title button.collapsed, {{WRAPPER}}  h4.accordion-title button.collapsed:before' => 'background: {{VALUE}};',
					],
				]
			);
			$this->end_controls_tab();  // end:Normal tab
			$this->start_controls_tab(
					'title_hover',
					[
						'label' => esc_html__( 'Active', 'segovia-core' ),
					]
				);
			$this->add_control(
				'title_hover_color',
				[
					'label' => esc_html__( 'Color', 'segovia-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}}  h4.accordion-title button:hover, {{WRAPPER}}  h4.accordion-title button, {{WRAPPER}}  h4.accordion-title button:hover:before, {{WRAPPER}}  h4.accordion-title button:before' => 'color: {{VALUE}};',
					],
				]
			);
			$this->add_control(
				'title_hover_bg_color',
				[
					'label' => esc_html__( 'Background Color', 'segovia-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}}  h4.accordion-title button:hover, {{WRAPPER}} h4.accordion-title button ' => 'background: {{VALUE}};',
					],
				]
			);
		$this->end_controls_tab();  // end:Hover tab
		$this->end_controls_tabs(); // end tabs
		$this->add_control(
			'title_padding',
			[
				'label' => __( 'Padding', 'segovia-core' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .faq-wrap .btn-link' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_section();// end: Section

		// Section
		$this->start_controls_section(
			'section_expand_style',
			[
				'label' => esc_html__( 'Expand Icon', 'segovia-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'expand_icon_color',
			[
				'label' => esc_html__( 'Icon Color', 'segovia-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} #accordion .btn-link:before, {{WRAPPER}} #accordion .btn-link:after' => 'background: {{VALUE}};',
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
				'name' => 'content_typography',
				'selector' => '{{WRAPPER}} .card-body',
			]
		);
		$this->add_control(
			'content_color',
			[
				'label' => esc_html__( 'Color', 'segovia-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .card-body' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_responsive_control(
			'content_top_space',
			[
				'label' => esc_html__( 'Top space', 'segovia-core' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 500,
						'step' => 2,
					],
				],
				'size_units' => [ 'px' ],
				'selectors' => [
					'{{WRAPPER}} .card-body' => 'padding-top: {{SIZE}}{{UNIT}};',
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
				'size_units' => [ 'px' ],
				'selectors' => [
					'{{WRAPPER}} .card-body' => 'padding-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_section();// end: Section

	}

	/**
	 * Render FAQ Accordion widget output on the frontend.
	 * Written in PHP and used to generate the final HTML.
	*/
	protected function render() {
		// FAQ Accordion query
		$boot_accordion = $this->get_settings_for_display( 'bootAccordion_groups' );
		//$one_active  = ( isset( $settings['one_active'] ) && ( 'true' == $settings['one_active'] ) ) ? true : false;
		$settings = $this->get_settings_for_display();
		$active_tab = !empty( $settings['active'] ) ? $settings['active'] : '';
		$accordion_style = !empty( $settings['accordion_style'] ) ? $settings['accordion_style'] : '';
		$hide_border  = ( isset( $settings['hide_border'] ) && ( 'true' == $settings['hide_border'] ) ) ? true : false;

		if($accordion_style === 'style-two') {
			$style_cls = ' acc-style-two';
		} else {
			$style_cls = ' acc-style-one';
		}

		if($hide_border) {
			$border_class = ' hide-border';
		} else {
			$border_class = ' hav-border';
		}

	
			$output = '';
			if( !empty( $boot_accordion ) && is_array( $boot_accordion ) ){

				$output .= '<div class="faq-wrap '.$style_cls.$border_class.'"><div id="accordion" class="accordion collapse-others">';

				$key = 1;
				foreach ( $boot_accordion as $each_logo ) {
					

				  $opened    = ( $key == $active_tab ) ? ' show' : '';		
				  $collapsed    = ( $key == $active_tab ) ? '' : 'collapsed';		
    			$uniqtab     = uniqid();

					$output .= '<div class="card'.$opened.'">
					              <div class="card-header" id="headingOne'. esc_attr($key.$uniqtab) .'">
					                <h4 class="accordion-title">
					                  <button class="btn btn-link '.$collapsed.'" data-toggle="collapse" data-target="#segvaAcc-'. esc_attr($key.$uniqtab) .'" aria-expanded="true" aria-controls="segvaAcc-'. esc_attr($key.$uniqtab) .'">
										          '.$each_logo['accordion_title'] .'
										        </button>
					                </h4>
					              </div>
					              <div id="segvaAcc-'. esc_attr($key.$uniqtab) .'" class="collapse '. $opened .'" data-parent="#accordion">
									        <div class="card-body">
									          '.do_shortcode($each_logo['accordion_content']).'
									        </div>
									      </div>
					            </div>';
				$key++;
				}

				$output .= '</div></div>';
			}

			echo $output;
		
	}

	/**
	 * Render FAQ Accordion widget output in the editor.
	 * Written as a Backbone JavaScript template and used to generate the live preview.
	*/
	
	//protected function _content_template(){}
	
}
Plugin::instance()->widgets_manager->register_widget_type( new Segovia_BootAccordion() );