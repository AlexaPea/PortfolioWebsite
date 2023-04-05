<?php
/*
 * Elementor Fame Portfolio Widget
 * Author & Copyright: VictorTheme
*/

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly




class Segovia_Portfolio extends Widget_Base{

	/**
	 * Retrieve the widget name.
	*/
	public function get_name(){
		return 'vt-segovia_portfolio';
	}

	/**
	 * Retrieve the widget title.
	*/
	public function get_title(){
		return esc_html__( 'Portfolio', 'segovia-core' );
	}

	/**
	 * Retrieve the widget icon.
	*/
	public function get_icon() {
		return 'fa fa-rocket';
	}

	/**
	 * Retrieve the list of categories the widget belongs to.
	*/
	public function get_categories() {
		return ['victortheme-category'];
	}

	/**
	 * Retrieve the list of scripts the Fame Portfolio widget depended on.
	 * Used to set scripts dependencies required to run the widget.
	*/
	public function get_script_depends() {
		return ['vt-segovia_portfolio'];
	}
	
	/**
	 * Register Fame Portfolio widget controls.
	 * Adds different input fields to allow the user to change and customize the widget settings.
	*/
	protected function _register_controls(){

		$this->start_controls_section(
			'section_portfolio_listing',
			[
				'label' => esc_html__( 'Listing', 'segovia-core' ),
			]
		);
			$this->add_control(
			'portfolio_style',
			[
				'label' => __( 'Portfolio Style', 'segovia-core' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'bpw-style-one' => esc_html__( 'Style One', 'segovia-core' ),
					'bpw-style-two' => esc_html__( 'Style Two', 'segovia-core' ),
					'bpw-style-three' => esc_html__( 'Style Three', 'segovia-core' ),
				],
				'default' => 'bpw-style-one',
				'description' => esc_html__( 'Select your portfolio style.', 'segovia-core' ),
			]
		);
		$this->add_control(
			'portfolio_title',
			[
				'label' => esc_html__( 'Portfolio Title', 'segovia-core' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( 'Our', 'segovia-core' ),
				'label_block' => true,
				'condition' => [
					'portfolio_style!' => 'bpw-style-three',
				],
			]
		);
		$this->add_control(
			'portfolio_sec_title',
			[
				'label' => esc_html__( 'Portfolio Secondary Title', 'segovia-core' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( 'Works', 'segovia-core' ),
				'label_block' => true,
				'condition' => [
					'portfolio_style!' => 'bpw-style-three',
				],
			]
		);
		$this->add_control(
			'portfolio_column',
			[
				'label' => __( 'Columns', 'segovia-core' ),
				'type' => Controls_Manager::SELECT,
				'frontend_available' => true,
				'options' => [
					'bpw-col-2' => esc_html__( 'Column Two', 'segovia-core' ),
					'bpw-col-3' => esc_html__( 'Column Three', 'segovia-core' ),
					'bpw-col-4' => esc_html__( 'Column Four', 'segovia-core' ),
				],
				'default' => 'Select gallery column',
				'description' => esc_html__( 'Select your gallery column.', 'segovia-core' ),
			]
		);
		$this->add_control(
			'portfolio_limit',
			[
				'label' => esc_html__( 'Limit', 'segovia-core' ),
				'type' => Controls_Manager::NUMBER,
				'min' => -1,
				'step' => 1,
				'description' => esc_html__( 'Enter the number of items to show.', 'segovia-core' ),
			]
		);
		$this->add_control(
			'portfolio_order',
			[
				'label' => __( 'Order', 'segovia-core' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'ASC' => esc_html__( 'Asending', 'segovia-core' ),
					'DESC' => esc_html__( 'Desending', 'segovia-core' ),
				],
				'default' => '',
				'description' => esc_html__( 'Select your order.', 'segovia-core' ),
			]
		);
		$this->add_control(
			'portfolio_orderby',
			[
				'label' => __( 'Order By', 'segovia-core' ),
				'type' => Controls_Manager::SELECT2,
				'default' => '',
				'options' => [
					'none' => __('None', 'segovia-core'),
					'ID' => __('ID', 'segovia-core'),
					'author' => __('Author', 'segovia-core'),
					'title' => __('Name', 'segovia-core'),
					'date' => __('Date', 'segovia-core'),
					'rand' => __('Rand', 'segovia-core'),
					'menu_order' => __('Menu Order', 'segovia-core'),
				],
			]
		);
		$this->add_control(
			'portfolio_show_category',
			[
				'label' => __( 'Show only certain categories?', 'segovia-core' ),
				'type' => Controls_Manager::SELECT2,
				'default' => [],
				'options' => Controls_Helper_Output::get_terms_names( 'portfolio_category'),
				'multiple' => true,
			]
		);
		$this->add_control(
			'readmore_title',
			[
				'label' => esc_html__( 'View More Projects Text', 'segovia-core' ),
				'type' => Controls_Manager::TEXT,
				'placeholder' => esc_html__( 'View More Projects', 'segovia-core' ),
				'label_block' => true,
				'condition' => [
					'portfolio_style' => array('bpw-style-one'),
				],
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
				'condition' => [
					'portfolio_style' => array('bpw-style-one'),
				],
				'label_block' => true,
			]
		);
		$this->end_controls_section();// end: Section
		
		$this->start_controls_section(
			'section_portfolio_ena_dis',
			[
				'label' => esc_html__( 'Enable & Disable', 'segovia-core' ),
			]
		);
		$this->add_control(
			'image_link',
			[
				'label' => esc_html__( 'Need Link for Image?', 'segovia-core' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Yes', 'segovia-core' ),
				'label_off' => esc_html__( 'No', 'segovia-core' ),
				'return_value' => 'true',
				'condition' => [
					'portfolio_style!' => array('bpw-style-one'),
				],
			]
		);
		$this->add_control(
			'portfolio_filter',
			[
				'label' => esc_html__( 'Filter', 'segovia-core' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Yes', 'segovia-core' ),
				'label_off' => esc_html__( 'No', 'segovia-core' ),
				'return_value' => 'true',
				'default' => 'true',
				'condition' => [
					'portfolio_style' => array('bpw-style-two'),
				],
			]
		);
		$this->add_control(
			'portfolio_pagination',
			[
				'label' => esc_html__( 'Pagination', 'segovia-core' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Yes', 'segovia-core' ),
				'label_off' => esc_html__( 'No', 'segovia-core' ),
				'return_value' => 'true',
				'default' => 'true',
			]
		);
		$this->end_controls_section();// end: Section
		
		// Filter
		$this->start_controls_section(
			'section_filter_style',
			[
				'label' => esc_html__( 'Filter', 'segovia-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'portfolio_style' => array('bpw-style-two'),
				],
				'frontend_available' => true,
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'filter_typography',
				'selector' => '{{WRAPPER}} .masonry-filters ul li a',
			]
		);
		$this->add_responsive_control(
			'filter_padding',
			[
				'label' => __( 'Padding', 'segovia-core' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .masonry-filters ul li a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->start_controls_tabs( 'filter_style' );
			$this->start_controls_tab(
				'filter_normal',
				[
					'label' => esc_html__( 'Normal', 'segovia-core' ),
				]
			);
			$this->add_control(
				'filter_color',
				[
					'label' => esc_html__( 'Color', 'segovia-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .masonry-filters ul li a' => 'color: {{VALUE}};',
					],
				]
			);
			$this->end_controls_tab();  // end:Normal tab
			$this->start_controls_tab(
				'filter_active',
				[
					'label' => esc_html__( 'Active', 'segovia-core' ),
				]
			);
			$this->add_control(
				'filter_active_color',
				[
					'label' => esc_html__( 'Color', 'segovia-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .masonry-filters ul li a.active, {{WRAPPER}} .masonry-filters ul li a:hover' => 'color: {{VALUE}}',
					],
				]
			);

			$this->end_controls_tab();  // end:Active tab
		$this->end_controls_tabs(); // end tabs		
		$this->end_controls_section();// end: Section

		// Portfolio Title Color
		$this->start_controls_section(
			'port_main_title_style',
			[
				'label' => esc_html__( 'Portfolio Section Title', 'segovia-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'portfolio_style!' => 'bpw-style-three',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'sasapp_port_main_title_typography',
				'selector' => '{{WRAPPER}} .section-title-wrap h2',
			]
		);
		$this->add_responsive_control(
			'sec_title_padding',
			[
				'label' => __( 'Padding', 'segovia-core' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .section-title-wrap' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'port_main_title_color',
			[
				'label' => esc_html__( 'Color', 'segovia-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .section-title-wrap h2' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'title_shadow_color',
			[
				'label' => esc_html__( 'Shadow Color', 'segovia-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .section-title-wrap .section-title' => 'text-shadow: 0 8px {{VALUE}};',
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
				'name' => 'sasapp_title_typography',
				'selector' => '{{WRAPPER}} .project-info h4 a, {{WRAPPER}} .horizontalslides .segva-slider-caption h2, {{WRAPPER}} .banner-wrap h2,
{{WRAPPER}} .banner-title a',
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
						'{{WRAPPER}} .project-info h4 a, {{WRAPPER}} .horizontalslides .segva-slider-caption h2, {{WRAPPER}} .banner-wrap h2, {{WRAPPER}} .banner-title a' => 'color: {{VALUE}};',
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
						'{{WRAPPER}} .project-info h4 a:hover, {{WRAPPER}} .banner-title a:hover, {{WRAPPER}} .banner-title a:focus' => 'color: {{VALUE}};',
					],
				]
			);
			$this->end_controls_tab();  // end:Hover tab
		$this->end_controls_tabs(); // end tabs		
		$this->end_controls_section();// end: Section

		// Portfolio Category
		$this->start_controls_section(
			'port_cat_style',
			[
				'label' => esc_html__( 'Categories', 'segovia-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'portfolio_style' => array('bpw-style-one', 'bpw-style-two', 'bpw-style-three'),
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'port_cat_typography',
				'selector' => '{{WRAPPER}} .project-category a',
			]
		);
		$this->start_controls_tabs( 'port_style' );
			$this->start_controls_tab(
				'port_cat_normal',
				[
					'label' => esc_html__( 'Normal', 'segovia-core' ),
				]
			);
			$this->add_control(
				'port_cat_color',
				[
					'label' => esc_html__( 'Color', 'segovia-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .project-category a, {{WRAPPER}} .project-category span:after' => 'color: {{VALUE}};',
					],
				]
			);
			$this->end_controls_tab();  // end:Normal tab
			
			$this->start_controls_tab(
				'port_cat_hover',
				[
					'label' => esc_html__( 'Hover', 'segovia-core' ),
				]
			);
			$this->add_control(
				'port_cat_hover_color',
				[
					'label' => esc_html__( 'Color', 'segovia-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .project-category a:hover' => 'color: {{VALUE}};',
					],
				]
			);
			$this->end_controls_tab();  // end:Hover tab
		$this->end_controls_tabs(); // end tabs		
		$this->end_controls_section();// end: Section

		// Overlay Color
		$this->start_controls_section(
			'port_overlay_style',
			[
				'label' => esc_html__( 'Hover Overlay', 'segovia-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'portfolio_style' => array('bpw-style-one', 'bpw-style-two'),
				],
			]
		);
			$this->add_control(
			'port_overlay_color',
			[
				'label' => esc_html__( 'Color', 'segovia-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .gallery-style-two .project-info, {{WRAPPER}} .projects-style-two .project-item .segva-image:before' => 'background: {{VALUE}};',
				],
			]
		);
		$this->end_controls_section();// end: Section

		// Read More
		$this->start_controls_section(
			'section_rmore_style',
			[
				'label' => esc_html__( 'Read More', 'segovia-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'portfolio_style' => array('bpw-style-one'),
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'sasapp_rmore_typography',
				'selector' => '{{WRAPPER}} .segva-link',
			]
		);

		$this->start_controls_tabs( 'rmore_style' );
			$this->start_controls_tab(
				'rmore_normal',
				[
					'label' => esc_html__( 'Normal', 'segovia-core' ),
				]
			);
			$this->add_control(
				'rmore_color',
				[
					'label' => esc_html__( 'Color', 'segovia-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .segva-link' => 'color: {{VALUE}};',
					],
				]
			);
			$this->add_control(
				'rmore_border_color',
				[
					'label' => esc_html__( 'Border Color', 'segovia-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .segva-link:after' => 'background: {{VALUE}};',
					],
				]
			);
			$this->end_controls_tab();  // end:Normal tab
			
			$this->start_controls_tab(
				'rmore_hover',
				[
					'label' => esc_html__( 'Hover', 'segovia-core' ),
				]
			);
			$this->add_control(
				'rmore_hover_color',
				[
					'label' => esc_html__( 'Color', 'segovia-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .segva-link:hover' => 'color: {{VALUE}};',
					],
				]
			);
			$this->end_controls_tab();  // end:Hover tab
		$this->end_controls_tabs(); // end tabs		
		$this->end_controls_section();// end: Section
		
		// Pagination
		$this->start_controls_section(
			'section_pagi_style',
			[
				'label' => esc_html__( 'Pagination', 'segovia-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'portfolio_pagination' => 'true',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'pagi_typography',
				'selector' => '{{WRAPPER}} .segovia-pagination ul li a, {{WRAPPER}} .segovia-pagination ul li span, {{WRAPPER}} .wp-pagenavi span, {{WRAPPER}} .wp-pagenavi a',
			]
		);
		$this->start_controls_tabs( 'pagi_style' );
			$this->start_controls_tab(
				'pagi_normal',
				[
					'label' => esc_html__( 'Normal', 'segovia-core' ),
				]
			);
			$this->add_control(
				'pagi_color',
				[
					'label' => esc_html__( 'Color', 'segovia-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .segovia-pagination ul li a,  {{WRAPPER}} .wp-pagenavi span, {{WRAPPER}} .wp-pagenavi a' => 'color: {{VALUE}};',
					],
				]
			);
			$this->end_controls_tab();  // end:Normal tab
			
			$this->start_controls_tab(
				'pagi_hover',
				[
					'label' => esc_html__( 'Hover', 'segovia-core' ),
				]
			);
			$this->add_control(
				'pagi_hover_color',
				[
					'label' => esc_html__( 'Color', 'segovia-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .segovia-pagination ul li a:hover, {{WRAPPER}} .wp-pagenavi a:hover' => 'color: {{VALUE}};',
					],
				]
			);
			$this->end_controls_tab();  // end:Hover tab
			$this->start_controls_tab(
				'pagi_active',
				[
					'label' => esc_html__( 'Active', 'segovia-core' ),
				]
			);
			$this->add_control(
				'pagi_active_color',
				[
					'label' => esc_html__( 'Color', 'segovia-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .segovia-pagination ul li span.current, {{WRAPPER}} .wp-pagenavi span.current' => 'color: {{VALUE}};',
					],
				]
			);
			$this->add_control(
				'pagi_active_border_color',
				[
					'label' => esc_html__( 'Color', 'segovia-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						' {{WRAPPER}} .segovia-pagination ul li span.current, {{WRAPPER}} .wp-pagenavi span.current' => 'border-color: {{VALUE}};',
					],
				]
			);
			
			$this->end_controls_tab();  // end:Active tab
		$this->end_controls_tabs(); // end tabs
		
		$this->end_controls_section();// end: Section

	}

	/**
	 * Render Portfolio widget output on the frontend.
	 * Written in PHP and used to generate the final HTML.
	*/
	protected function render() {
		$settings = $this->get_settings_for_display();
		$portfolio_style = !empty( $settings['portfolio_style'] ) ? $settings['portfolio_style'] : '';
		$portfolio_column = !empty( $settings['portfolio_column'] ) ? $settings['portfolio_column'] : '3';

		$portfolio_limit = !empty( $settings['portfolio_limit'] ) ? $settings['portfolio_limit'] : '';
		$portfolio_order = !empty( $settings['portfolio_order'] ) ? $settings['portfolio_order'] : '';
		$portfolio_orderby = !empty( $settings['portfolio_orderby'] ) ? $settings['portfolio_orderby'] : '';
		$portfolio_show_category = !empty( $settings['portfolio_show_category'] ) ? $settings['portfolio_show_category'] : [];
		
		$portfolio_aqr  = ( isset( $settings['portfolio_aqr'] ) && ( 'true' == $settings['portfolio_aqr'] ) ) ? true : false;
		$portfolio_filter  = ( isset( $settings['portfolio_filter'] ) && ( 'true' == $settings['portfolio_filter'] ) ) ? true : false;
		$image_link  = ( isset( $settings['image_link'] ) && ( 'true' == $settings['image_link'] ) ) ? true : false;
		$portfolio_pagination  = ( isset( $settings['portfolio_pagination'] ) && ( 'true' == $settings['portfolio_pagination'] ) ) ? true : false;

		$portfolio_limit = $portfolio_limit ? $portfolio_limit : '-1';

		$portfolio_title = !empty( $settings['portfolio_title'] ) ? $settings['portfolio_title'] : '';
		$portfolio_sec_title = !empty( $settings['portfolio_sec_title'] ) ? $settings['portfolio_sec_title'] : '';
		$readmore_title = !empty( $settings['readmore_title'] ) ? $settings['readmore_title'] : '';
		$read_more_link = !empty( $settings['read_more_link']['url'] ) ? $settings['read_more_link']['url'] : '';
		$read_more_link_external = !empty( $settings['read_more_link']['is_external'] ) ? 'target="_blank"' : '';
		$read_more_link_nofollow = !empty( $settings['read_more_link']['nofollow'] ) ? 'rel="nofollow"' : '';
		$read_more_link_attr = !empty( $read_more_link ) ?  $read_more_link_external.' '.$read_more_link_nofollow : '';
		$readmore = $read_more_link ? '<div class="segva-link-wrap"><a href="'.esc_url($read_more_link).'" '.$read_more_link_attr .' class="segva-link">'. $readmore_title.'</a></div>' : '';

    // Turn output buffer on
    ob_start();

  if( $portfolio_style === 'bpw-style-two' ) { ?>
    <div class="segva-projects projects-style-two">
      <div class="containerRR">
  <?php   }
  if( $portfolio_style === 'bpw-style-three' ) { ?>
      <div class="segva-projects style-three-hover">
      <div class="contajiner"> 
        <?php }

if($portfolio_style === 'bpw-style-two') { ?>
		<div class="row">
			<div class="col-lg-3">
		    <div class="section-title-wrap hav-sep hav-icon hav-animation">
		      <div class="sec-title">
		      	<h2 class="section-title"><?php echo esc_attr($portfolio_title); ?></h2>
		      	<h2 class="section-title section-title-two"><?php echo esc_attr($portfolio_sec_title); ?></h2>
		      </div>
		    </div>
	    
	  <?php
    if ($portfolio_filter) {
    ?>
    <div class="masonry-filters ">
	    <ul>
				<li><a href="javascript:void(0);" data-filter="*" class="active"><?php esc_html_e('Show all', 'segovia-core'); ?></a></li>
	      <?php
	        if ($portfolio_show_category) {
	          $terms = $portfolio_show_category;
	          $count = count($terms);
	          if ($count > 0) {
	            foreach ($terms as $term) {
	              echo '<li class="'. preg_replace('/\s+/', "", strtolower($term)) .'-item"><a href="#0" class="filter '. preg_replace('/\s+/', "", strtolower($term)) .'" data-filter=".'. preg_replace('/\s+/', "", strtolower($term)) .'-item" title="' . str_replace('-', " ", strtolower($term)) . '">' . str_replace('-', " ", strtolower($term)) . '</a></li>';
	             }
	          }
	        } else {
	          $terms = get_terms('portfolio_category');
	          $count = count($terms);
	          $i=0;
	          $term_list = '';
	          if ($count > 0) {
	            foreach ($terms as $term) {
	              $i++;
	              $term_list .= '<li><a href="#0" class="filter cat-'. $term->slug .'" data-filter=".'. $term->slug .'-item" title="' . esc_attr($term->name) . '">' . $term->name . '</a></li>';
	              if ($count != $i) {
	                $term_list .= '';
	              } else {
	                $term_list .= '';
	              }
	            }
	            echo $term_list;
	          }
	        }
	      ?>
			</ul>
  	</div> 
  <?php } ?>
  </div> 
  <?php }

    // Pagination
    global $paged;
    if( get_query_var( 'paged' ) )
      $my_page = get_query_var( 'paged' );
    else {
      if( get_query_var( 'page' ) )
        $my_page = get_query_var( 'page' );
      else
        $my_page = 1;
      set_query_var( 'paged', $my_page );
      $paged = $my_page;
    }

    $args = array(
      // other query params here,
      'paged' => $my_page,
      'post_type' => 'portfolio',
      'posts_per_page' => (int)$portfolio_limit,
      'portfolio_category' => $portfolio_show_category,
      'orderby' => $portfolio_orderby,
      'order' => $portfolio_order
    );

    $segva_port = new \WP_Query( $args ); 

      if($portfolio_column === 'bpw-col-3') {
        $items = '3';
      } elseif($portfolio_column === 'bpw-col-4') {
        $items = '4';
      } else {
        $items = '2';
      }
    ?>

<!-- Portfolio Start -->

<?php 
if($portfolio_style === 'bpw-style-two')  { ?>
  <div class="segva-projects projects-style-two col-lg-9">
    <div class="containerRR">
     <div class="segva-masonry" data-items="<?php echo esc_attr($items); ?>" data-space="50"> <?php } 

  elseif ($portfolio_style === 'bpw-style-three') { ?>
    <div class="segva-projects projects-style-three">
      <div class="containeddr">
        <div class="segva-masonry" data-items="<?php echo esc_attr($items); ?>" data-space="70">  <?php } else { ?>

  <div class="segva-full-wrap gallery-style-two <?php echo esc_attr($portfolio_style); ?> ">
      <div class="segva-masonry" data-items="<?php echo esc_attr($items); ?>" data-space="30"> <?php }
      if ($portfolio_style === 'bpw-style-one') { 
      	if($portfolio_title) { ?>
	      <div class="masonry-item">
		      <div class="section-title-wrap hav-sep hav-icon hav-animation">
			      <div class="sec-title">
			      	<h2 class="section-title"><?php echo esc_attr($portfolio_title); ?></h2>
			      	<h2 class="section-title section-title-two"><?php echo esc_attr($portfolio_sec_title); ?></h2>
			      </div>
		      </div>
	      </div>
      <?php } }
  
      if ($segva_port->have_posts()) : while ($segva_port->have_posts()) : $segva_port->the_post();

        // Category
        global $post;
        $terms = wp_get_post_terms($post->ID,'portfolio_category');
        foreach ($terms as $term) {
          $cat_class = '' . $term->slug.'-item';
        }
        $count = count($terms);
        $i=0;
        $cat_class = '';
        if ($count > 0) {
          foreach ($terms as $term) {
            $i++;
            $cat_class .= ''. $term->slug .'-item ';
            if ($count != $i) {
              $cat_class .= '';
            } else {
              $cat_class .= '';
            }
          }
        }

        // Featured Image
        $large_image =  wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'fullsize', false, '' );
        $large_image = $large_image[0];

        ?>
      
      <!-- Style two -->
    <?php 
      if($portfolio_style === 'bpw-style-two')  { 
        if($large_image) { 
          $large_image = $large_image;
        } else {
          $large_image  = SEGOVIA_IMAGES.'/masonry-featured.png';
          
        } ?>
       <div class="masonry-item  <?php echo esc_attr($cat_class); ?>" data-category="<?php echo esc_attr($cat_class); ?>">
        <div class="project-item">
          <?php  if($large_image) { ?>
          <div class="segva-image">
          <?php if($image_link) { ?>
          	<a href="<?php esc_url(the_permalink()); ?>">
          <?php } ?>
          <img src="<?php echo $large_image; ?>" alt="<?php echo esc_attr(get_the_title()); ?>">
          <?php if($image_link) { ?>
          	</a>
          <?php } ?>
          </div> 
          <?php } ?>
          <div class="project-info">
            <div class="project-info-wrap">
              <h4 class="project-title"><a href="<?php esc_url(the_permalink()); ?>"><?php echo esc_attr(get_the_title()); ?></a></h4>
              <span class="segva-separator"></span>
              <h5 class="project-category">
                <?php
                  $category_list = wp_get_post_terms($post->ID, 'portfolio_category');
                  $i=1;
                  foreach ($category_list as $term) {
                    $term_link = get_term_link( $term );
                    echo '<span><a href="'. esc_url($term_link) .'" class="">'. $term->name .'</a></span> ';
                    if($i++==2) break;
                  }
                ?>
              </h5>
            </div>
          </div>
        </div>
      </div>  <?php } elseif($portfolio_style === 'bpw-style-three') { 

         if($large_image) { 
          $large_image = $large_image;
        }else {
          $large_image  = SEGOVIA_IMAGES.'/masonry-featured.png';
          
        } ?>

        <div class="masonry-item flip-box  <?php echo esc_attr($cat_class); ?>" data-category="<?php echo esc_attr($cat_class); ?>">
          <div class="masonry-item-wrap">
	          <div class="project-item flip-box-inner">
	            <div class="segva-image">
	            <?php if($image_link) { ?>
		          	<a href="<?php esc_url(the_permalink()); ?>">
		          <?php } ?>
	            	<img src="<?php echo $large_image; ?>" alt="<?php echo esc_attr(get_the_title()); ?>">
            	<?php if($image_link) { ?>
		          	</a>
		          <?php } ?>
	            </div>
	          </div>
            <div class="project-info">
              <div class="project-info-wrap">
                <h4 class="project-title"><a href="<?php esc_url(the_permalink()); ?>"><?php esc_html(the_title()); ?></a></h4>
                <span class="segva-separator"></span>
                <h5 class="project-category">
                   <?php
                    $category_list = wp_get_post_terms($post->ID, 'portfolio_category');
                    $i=1;
                    foreach ($category_list as $term) {
                      $term_link = get_term_link( $term );
                      echo '<span><a href="'. esc_url($term_link) .'" class="">'. $term->name .'</a></span> ';
                      if($i++==2) break;
                    }
                    ?>
                </h5>
              </div>
            </div>
        	</div>
        </div>

        <?php  } else { ?>

      <div class="masonry-item  <?php echo esc_attr($cat_class); ?>" data-category="<?php echo esc_attr($cat_class); ?>">
        <div class="project-item "> <?php
          if($large_image) { 
          $large_image = $large_image;
        } else {
          $large_image  = SEGOVIA_IMAGES.'/grid-featured.png';
          
        }  if($large_image) { ?>
          <div class="segva-image"><img src="<?php echo $large_image; ?>" alt="<?php echo esc_attr(get_the_title()); ?>"></div> <?php } ?>
          <div class="project-info">
	          <div class="segva-table-wrap">
			        <div class="segva-align-wrap">
		            <div class="project-info-wrap">
		              <h4 class="project-title"><a href="<?php esc_url(the_permalink()); ?>"><?php esc_html(the_title()); ?></a></h4>
		              <h5 class="project-category">
		                <?php
		                  $category_list = wp_get_post_terms($post->ID, 'portfolio_category');
		                  $i=1;
		                  foreach ($category_list as $term) {
		                    $term_link = get_term_link( $term );
		                    echo '<span><a href="'. esc_url($term_link) .'" class="">'. $term->name .'</a></span> ';
		                    if($i++==2) break;
		                  }
		                  ?>
		              </h5>
	            	</div>
	          	</div>
	          </div>
          </div>
        </div>
      </div> <?php }
       
      endwhile;
      endif;
      wp_reset_postdata();
      if ($portfolio_style === 'bpw-style-one') { ?>
      <div class="masonry-item">
	      <div class="project-more-info-wrap">
		      <div class="segva-table-wrap">
		        <div class="segva-align-wrap">
		      		<?php echo $readmore; ?>
		      	</div>
		      </div>
	      </div>
      </div>
      <?php } ?>

      </div>
    </div> 
          
    <?php

    if ($portfolio_pagination) {
      if ( function_exists('wp_pagenavi')) {
        wp_pagenavi(array( 'query' => $segva_port ) );
        wp_reset_postdata();  // avoid errors further down the page
      }
    }
  if($portfolio_style === 'bpw-style-two') { ?>
        </div>
      </div> 
    </div> 
    </div> 
  <?php }
  if($portfolio_style === 'bpw-style-three') {?>
  </div>
  </div>
  </div>
  <?php }
		// Return outbut buffer
		echo ob_get_clean();
		
	}

	/**
	 * Render Portfolio widget output in the editor.
	 * Written as a Backbone JavaScript template and used to generate the live preview.
	*/
	
	//protected function _content_template(){}
	
}
Plugin::instance()->widgets_manager->register_widget_type( new Segovia_Portfolio() );
