<?php
/*
 * Elementor Segovia Dashboard Widget
 * Author & Copyright: VictorTheme
*/

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Segovia_Dashboard extends Widget_Base{

	/**
	 * Retrieve the widget name.
	*/
	public function get_name(){
		return 'vt-segovia_dashboard';
	}

	/**
	 * Retrieve the widget title.
	*/
	public function get_title(){
		return esc_html__( 'FAQ Tab', 'segovia-core' );
	}

	/**
	 * Retrieve the widget icon.
	*/
	public function get_icon() {
		return 'fa fa-tachometer';
	}

	/**
	 * Retrieve the list of categories the widget belongs to.
	*/
	public function get_categories() {
		return ['victortheme-category'];
	}

	/**
	 * Retrieve the list of scripts the Segovia Dashboard widget depended on.
	 * Used to set scripts dependencies required to run the widget.
	*/
	/*
	public function get_script_depends() {
		return ['vt-segovia_dashboard'];
	}
	*/
	
	/**
	 * Register Segovia Dashboard widget controls.
	 * Adds different input fields to allow the user to change and customize the widget settings.
	*/
	protected function _register_controls(){

		$this->start_controls_section(
			'section_active',
			[
				'label' => __( 'Tab Options', 'segovia-core' ),
			]
		);
		$this->add_control(
			'active',
			[
				'label' => __( 'Active Tab Number', 'segovia-core' ),
				'type' => Controls_Manager::TEXT,
				'default' => 1,
			]
		);
		$this->add_control(
			'tab_section_title',
			[
				'label' => esc_html__( 'Title', 'segovia-core' ),
				'type' => Controls_Manager::TEXT,
				'placeholder' => esc_html__( 'Enter title count here', 'segovia-core' ),
				'label_block' => true,
			]
		);
		$this->add_control(
			'tab_section_content',
			[
				'label' => esc_html__( 'Title', 'segovia-core' ),
				'type' => Controls_Manager::TEXTAREA,
				'placeholder' => esc_html__( 'Enter content here', 'segovia-core' ),
				'label_block' => true,
			]
		);
		
		$this->end_controls_section();// end: Section

		$this->start_controls_section(
			'section_dashboard',
			[
				'label' => __( 'Dashboard Item', 'segovia-core' ),
			]
		);		

		$repeater = new Repeater();		
		$repeater->add_control(
			'tab_title',
			[
				'label' => esc_html__( 'Tab Title', 'segovia-core' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( 'Tab Title', 'segovia-core' ),
				'placeholder' => esc_html__( 'Type tag text here', 'segovia-core' ),
				'label_block' => true,
			]
		);		
		$repeater->add_control(
			'tab_main_content',
			[
				'label' => esc_html__( 'Content', 'segovia-core' ),
				'default' => esc_html__( 'your content text', 'segovia-core' ),
				'placeholder' => esc_html__( 'Type your content here', 'segovia-core' ),
				'type' => Controls_Manager::WYSIWYG,
				'label_block' => true,
			]
		);

		$this->add_control(
			'dashTab_groups',
			[
				'label' => esc_html__( 'Dashboard Items', 'segovia-core' ),
				'type' => Controls_Manager::REPEATER,
				'default' => [
					[
						'tab_title' => esc_html__( 'Order Value', 'segovia-core' ),
					],
					
				],
				'fields' => $repeater->get_controls(),
				'title_field' => '{{{ tab_title }}}',
			]
		);
		
		$this->end_controls_section();// end: Section		

		// Section Title
		$this->start_controls_section(
			'section_title_style',
			[
				'label' => esc_html__( 'Section Title', 'segovia-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'sasdas_section_title_typography',				
				'selector' => '{{WRAPPER}} .segva-dashboard .section-title-wrap h2',
			]
		);
		$this->add_control(
			'section_title_color',
			[
				'label' => esc_html__( 'Color', 'segovia-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .segva-dashboard .section-title-wrap h2' => 'color: {{VALUE}};',
				],
			]
		);
			$this->add_responsive_control(
		'segva_section_content_align',
		[
			'label' => esc_html__( 'Alignment', 'segovia-core' ),
			'type' => Controls_Manager::CHOOSE,
			'frontend_available' => true,
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
					'{{WRAPPER}} .segva-dashboard .section-title-wrap ' => 'text-align: {{VALUE}};',
				],
			]
		);
		$this->end_controls_section();// end: Section
		// Section Content
		$this->start_controls_section(
			'section_text_style',
			[
				'label' => esc_html__( 'Section Subtitle', 'segovia-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'section_content_typography',
				'selector' => '{{WRAPPER}} .segva-dashboard .section-title-wrap p',
			]
		);
		$this->add_control(
			'section_content_color',
			[
				'label' => esc_html__( 'Color', 'segovia-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .segva-dashboard .section-title-wrap p' => 'color: {{VALUE}};',
				],
			]
		);

		$this->end_controls_section();// end: Section

		// Tab Title Style
		$this->start_controls_section(
			'section_tab_style',
			[
				'label' => esc_html__( 'Tab Title', 'segovia-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'sasdas_title_typography',
				'selector' => '{{WRAPPER}} .nav-tabs .nav-link',
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
						'{{WRAPPER}} .nav-tabs .nav-link' => 'color: {{VALUE}};',
					],
				]
			);
			$this->add_control(
				'title_bg_color',
				[
					'label' => esc_html__( 'Background Color', 'segovia-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .nav-tabs .nav-link' => 'background-color: {{VALUE}};',
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
						'{{WRAPPER}} .nav-tabs .nav-link:hover, {{WRAPPER}} .nav-tabs .nav-link.active' => 'color: {{VALUE}};',
					],
				]
			);
			$this->add_control(
				'title_bg_hover_color',
				[
					'label' => esc_html__( 'Background Hover Color', 'segovia-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .nav-tabs .nav-link:hover, {{WRAPPER}} .nav-tabs .nav-link.active' => 'background-color: {{VALUE}};',
					],
				]
			);
			$this->end_controls_tab();  // end:Hover tab
		$this->end_controls_tabs(); // end tabs	
		
		$this->end_controls_section();// end: Section

	}

	/**
	 * Render Dashboard widget output on the frontend.
	 * Written in PHP and used to generate the final HTML.
	*/
	protected function render() {
		// Dashboard query
		$dashboard = $this->get_settings_for_display( 'dashTab_groups' );
		//$one_active  = ( isset( $settings['one_active'] ) && ( 'true' == $settings['one_active'] ) ) ? true : false;
		$settings = $this->get_settings_for_display();
		$col_style = !empty( $settings['col_style'] ) ? $settings['col_style'] : '';
		$tab_style = !empty( $settings['tab_style'] ) ? $settings['tab_style'] : '';
		$active = !empty( $settings['active'] ) ? $settings['active'] : '';
		$tab_section_title = !empty( $settings['tab_section_title'] ) ? $settings['tab_section_title'] : '';
		$tab_section_content = !empty( $settings['tab_section_content'] ) ? $settings['tab_section_content'] : '';

		$title = $tab_section_title ? '<h2 class="section-title">'.$tab_section_title.'</h2>' : '';
		$content = $tab_section_content ? '<p>'.$tab_section_content.'</p>' : '';
    $uniqtab     = uniqid(2);

	
			$output = '';
			if( !empty( $dashboard ) && is_array( $dashboard ) ){
			$output .= '<div class="segva-dashboard">
							      <div class="row">
							        <div class="col-lg-4">
							          <div class="dashboard-info">
							            <div class="section-title-wrap section-title-style-two">'.$title.$content.'</div>
							            <nav>
							              <div class="nav flex-column nav-tabs" id="nav-tab" role="tablist">';
							              	$key = 1;
															foreach ( $dashboard as $each_logo ) {
															$active_cls = ( $key == $active ) ? ' active' : '';
																$output .= '<a class="nav-item nav-link'.$active_cls.'" id="nav-'.$uniqtab.$key.'-tab" data-toggle="tab" href="#nav-'.$uniqtab.$key.'" role="tab" aria-controls="nav-'.$uniqtab.$key.'" aria-selected="true">'.$each_logo['tab_title'].'</a>';
															$key++;
															}						                
	              $output .= '</div>
							            </nav>
							          </div>
							        </div>
							        <div class="col-lg-8">
							          <div class="tab-content tab-animation" id="nav-tabContent">';
													$key = 1;
													foreach ( $dashboard as $each_logo ) {
														$active_clss = ( $key == $active ) ? ' active show' : '';

														$output .= '<div class="tab-pane '.$active_clss.'" id="nav-'.$uniqtab.$key.'" role="tabpanel" aria-labelledby="nav-'.$uniqtab.$key.'-tab"><div class="segva-main-content">'.$each_logo['tab_main_content'].'</div></div>';
													$key++;
													}
	          $output .= '</div>
							        </div>
							      </div>
								  </div>';
			}
			echo $output;
		
	}

	/**
	 * Render Dashboard widget output in the editor.
	 * Written as a Backbone JavaScript template and used to generate the live preview.
	*/
	
	//protected function _content_template(){}
	
}
Plugin::instance()->widgets_manager->register_widget_type( new Segovia_Dashboard() );