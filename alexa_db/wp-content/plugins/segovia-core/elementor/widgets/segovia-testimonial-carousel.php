<?php
/*
 * Elementor Segovia Testimonial Carousel Widget
 * Author & Copyright: VictorTheme
*/

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

$noneed_testimonial_post = (segovia_framework_active()) ? cs_get_option('noneed_testimonial_post') : '';

if (!$noneed_testimonial_post) {
class Segovia_Testimonial_Carousel extends Widget_Base{

	/**
	 * Retrieve the widget name.
	*/
	public function get_name(){
		return 'vt-segovia_testimonial_carousel';
	}

	/**
	 * Retrieve the widget title.
	*/
	public function get_title(){
		return esc_html__( 'Testimonial Carousel', 'segovia-core' );
	}

	/**
	 * Retrieve the widget icon.
	*/
	public function get_icon() {
		return 'fa fa-comments';
	}

	/**
	 * Retrieve the list of categories the widget belongs to.
	*/
	public function get_categories() {
		return ['victortheme-category'];
	}

	/**
	 * Retrieve the list of scripts the Segovia Testimonial Carousel widget depended on.
	 * Used to set scripts dependencies required to run the widget.
	*/
	public function get_script_depends() {
		return ['vt-segovia_testimonial_carousel'];
	}
	
	/**
	 * Register Segovia Testimonial Carousel widget controls.
	 * Adds different input fields to allow the user to change and customize the widget settings.
	*/
	protected function _register_controls(){
		
		$this->start_controls_section(
			'section_testimonial',
			[
				'label' => esc_html__( 'Testimonial Options', 'segovia-core' ),
			]
		);
		$this->add_control(
			'testimonial_style',
			[
				'label' => __( 'Testimonial Style', 'segovia-core' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'style-one' => esc_html__( 'Style One', 'segovia-core' ),
					'style-two' => esc_html__( 'Style Two', 'segovia-core' ),
					'style-three' => esc_html__( 'Style Three', 'segovia-core' ),
				],
				'default' => 'style-one',
				'description' => esc_html__( 'Select your testimonial style.', 'segovia-core' ),
			]
		);
		$this->add_control(
			'testimonial_list_heading',
			[
				'label' => __( 'Listing', 'segovia-core' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		$this->add_control(
			'testimonial_limit',
			[
				'label' => esc_html__( 'Limit', 'segovia-core' ),
				'type' => Controls_Manager::NUMBER,
				'min' => -1,
				'step' => 1,
			]
		);
		$this->add_control(
			'testimonial_order',
			[
				'label' => esc_html__( 'Order', 'segovia-core' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'DESC',
				'options' => [
					'DESC' => esc_html__('DESC', 'segovia-core'),
					'ASC' => esc_html__('ASC', 'segovia-core'),
				],
			]
		);
		$this->add_control(
			'testimonial_orderby',
			[
				'label' => esc_html__( 'Order By', 'segovia-core' ),
				'type' => Controls_Manager::SELECT2,
				'options' => [
					'none' => esc_html__('None', 'segovia-core'),
					'ID' => esc_html__('ID', 'segovia-core'),
					'author' => esc_html__('Author', 'segovia-core'),
					'title' => esc_html__('Name', 'segovia-core'),
					'date' => esc_html__('Date', 'segovia-core'),
					'rand' => esc_html__('Rand', 'segovia-core'),
					'menu_order' => esc_html__('Menu Order', 'segovia-core'),
				],
			]
		);
		$this->add_control(
			'seperator_image',
			[
				'label' => esc_html__( 'Upload Separator Image', 'segovia-core' ),
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => '',
				],
				'description' => esc_html__( 'Set your title & profession separator image.', 'segovia-core'),
				'selectors' => [
					'{{WRAPPER}} span.segva-separator' => 'background-image: url({{url}});',
				],
			]
		);
		$this->add_control(
			'short_content',
			[
				'label' => esc_html__( 'Excerpt Length', 'segovia-core' ),
				'type' => Controls_Manager::NUMBER,
				'min' => 1,
				'step' => 1,
				'default' => 55,
				'description' => esc_html__( 'How many words you want in short content paragraph.', 'segovia-core' ),
			]
		);
		$this->add_control(
			'quote_image',
			[
				'label' => esc_html__( 'Upload Quote Image', 'segovia-core' ),
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => '',
				],
				'condition' => [
					'testimonial_style!' => 'style-two',
				],
				'description' => esc_html__( 'Set your quote image.', 'segovia-core'),
				'selectors' => [
					'{{WRAPPER}} .segva-testimonials .testi-infos:before' => 'background-image: url({{url}});',
				],
			]
		);
		$this->end_controls_section();// end: Section
		
		
		$this->start_controls_section(
			'section_carousel',
			[
				'label' => esc_html__( 'Carousel Options', 'segovia-core' ),
			]
		);
		
		$this->add_responsive_control(
			'carousel_items',
			[
				'label' => esc_html__( 'How many items?', 'segovia-core' ),
				'type' => Controls_Manager::NUMBER,
				'min' => 1,
				'max' => 100,
				'step' => 1,
				'default' => 3,
				'description' => esc_html__( 'Enter the number of items to show.', 'segovia-core' ),
			]
		);
		$this->add_responsive_control(
			'carousel_margin',
			[
				'label' => __( 'Space Between Items', 'segovia-core' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' =>30,
				],
				'label_block' => true,
			]
		);
		$this->add_control(
			'carousel_autoplay_timeout',
			[
				'label' => __( 'Auto Play Timeout', 'segovia-core' ),
				'type' => Controls_Manager::NUMBER,
				'default' => 5000,
			]
		);
		$this->add_control(
			'carousel_loop',
			[
				'label' => esc_html__( 'Disable Loop?', 'segovia-core' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Yes', 'segovia-core' ),
				'label_off' => esc_html__( 'No', 'segovia-core' ),
				'return_value' => 'true',
				'description' => esc_html__( 'Continuously moving carousel, if enabled.', 'segovia-core' ),
			]
		);
		$this->add_control(
			'carousel_dots',
			[
				'label' => esc_html__( 'Dots', 'segovia-core' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Yes', 'segovia-core' ),
				'label_off' => esc_html__( 'No', 'segovia-core' ),
				'return_value' => 'true',
				'description' => esc_html__( 'If you want Carousel Dots, enable it.', 'segovia-core' ),
			]
		);
		$this->add_control(
			'carousel_nav',
			[
				'label' => esc_html__( 'Navigation', 'segovia-core' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Yes', 'segovia-core' ),
				'label_off' => esc_html__( 'No', 'segovia-core' ),
				'return_value' => 'true',
				'description' => esc_html__( 'If you want Carousel Navigation, enable it.', 'segovia-core' ),
			]
		);
		
		$this->add_control(
			'carousel_autoplay',
			[
				'label' => esc_html__( 'Autoplay', 'segovia-core' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Yes', 'segovia-core' ),
				'label_off' => esc_html__( 'No', 'segovia-core' ),
				'return_value' => 'true',
				'description' => esc_html__( 'If you want to start Carousel automatically, enable it.', 'segovia-core' ),
			]
		);
		$this->add_control(
			'carousel_animate_out',
			[
				'label' => esc_html__( 'Animate Out', 'segovia-core' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Yes', 'segovia-core' ),
				'label_off' => esc_html__( 'No', 'segovia-core' ),
				'return_value' => 'true',
				'description' => esc_html__( 'CSS3 animation out.', 'segovia-core' ),
			]
		);
		$this->add_control(
			'carousel_mousedrag',
			[
				'label' => esc_html__( 'Disable Mouse Drag?', 'segovia-core' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Yes', 'segovia-core' ),
				'label_off' => esc_html__( 'No', 'segovia-core' ),
				'return_value' => 'true',
				'description' => esc_html__( 'If you want to disable Mouse Drag, check it.', 'segovia-core' ),
			]
		);
		$this->add_control(
			'carousel_autowidth',
			[
				'label' => esc_html__( 'Auto Width', 'segovia-core' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Yes', 'segovia-core' ),
				'label_off' => esc_html__( 'No', 'segovia-core' ),
				'return_value' => 'true',
				'description' => esc_html__( 'Adjust Auto Width automatically for each carousel items.', 'segovia-core' ),
			]
		);
		$this->add_control(
			'carousel_autoheight',
			[
				'label' => esc_html__( 'Auto Height', 'segovia-core' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Yes', 'segovia-core' ),
				'label_off' => esc_html__( 'No', 'segovia-core' ),
				'return_value' => 'true',
				'description' => esc_html__( 'Adjust Auto Height automatically for each carousel items.', 'segovia-core' ),
			]
		);
		$this->end_controls_section();// end: Section
		
		$this->start_controls_section(
			'section_area_style',
			[
				'label' => esc_html__( 'Area', 'segovia-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'testimonial_style' => 'style-two',
				],
			]
		);
		$this->add_control(
			'area_bg_color',
			[
				'label' => esc_html__( 'Background Color', 'segovia-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .testimonial-item' => 'background: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'btn_box_shadow',
				'label' => esc_html__( 'Box Shadow', 'segovia-core' ),
				'selector' => '{{WRAPPER}} .testimonial-item',
			]
		);
		
		$this->end_controls_section();// end: Section

		// Image
		$this->start_controls_section(
			'section_image_style',
			[
				'label' => esc_html__( 'Image', 'segovia-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'img_border_color',
			[
				'label' => esc_html__( 'Image Border Color', 'segovia-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .segva-testimonials .testimonial-item .segva-image img' => 'border-color: {{VALUE}};',
				],
			]
		);		
		$this->end_controls_section();// end: Section

		$this->start_controls_section(
			'section_name_style',
			[
				'label' => esc_html__( 'Name', 'segovia-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'name_typography',				
				'selector' => '{{WRAPPER}} .testimonial-item h4',
			]
		);		
		$this->start_controls_tabs( 'process_title_style' );
			$this->start_controls_tab(
				'title_normal',
				[
					'label' => esc_html__( 'Normal', 'segovia-core' ),
				]
			);
			$this->add_control(
				'name_color',
				[
					'label' => esc_html__( 'Color', 'segovia-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} h4.author-name, {{WRAPPER}} h4.author-name a' => 'color: {{VALUE}};',
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
				'name_hov_color',
				[
					'label' => esc_html__( 'Color', 'segovia-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} h4.author-name a:hover' => 'color: {{VALUE}};',
					],
				]
			);
			$this->end_controls_tab();  // end:Hover tab
		$this->end_controls_tabs(); // end tabs
		$this->end_controls_section();// end: Section

		$this->start_controls_section(
			'section_designation_text_style',
			[
				'label' => esc_html__( 'Designation Text', 'segovia-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'designation_text_typography',
				'selector' => '{{WRAPPER}} h4.author-name .author-designation',
			]
		);
		$this->add_control(
			'designation_text_color',
			[
				'label' => esc_html__( 'Color', 'segovia-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} h4.author-name .author-designation' => 'color: {{VALUE}};',
				],
			]
		);
		$this->end_controls_section();// end: Section
		
		$this->start_controls_section(
			'section_content_text_style',
			[
				'label' => esc_html__( 'Content Text', 'segovia-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'content_text_typography',
				'selector' => '{{WRAPPER}} .testimonial-item p, {{WRAPPER}} .testimonial-info p',
			]
		);
		$this->add_control(
			'content_text_color',
			[
				'label' => esc_html__( 'Color', 'segovia-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .testimonial-item p, {{WRAPPER}} .testimonial-info p' => 'color: {{VALUE}};',
				],
			]
		);
		$this->end_controls_section();// end: Section

		// Quote
		$this->start_controls_section(
			'section_quote_style',
			[
				'label' => esc_html__( 'Quote', 'segovia-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'testimonial_style!' => 'style-two',
				],
			]
		);
		$this->add_responsive_control(
			'quote_size',
			[
				'label' => esc_html__( 'Quote Size', 'segovia-core' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 500,
						'step' => 1,
					],
				],
				'size_units' => [ 'px' ],
				'selectors' => [
					'{{WRAPPER}} .segva-testimonials .testi-infos:before' => 'background-size: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_section();// end: Section
		
		// Navigation
		$this->start_controls_section(
			'section_navigation_style',
			[
				'label' => esc_html__( 'Navigation', 'segovia-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'carousel_nav' => 'true',
				],
				'frontend_available' => true,
			]
		);
		$this->add_control(
			'navigation_arrow',
			[
				'label' => esc_html__( 'Navigation Arrow', 'segovia-core' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'DESC',
				'options' => [
					'white' => esc_html__('White Arrow', 'segovia-core'),
					'black' => esc_html__('Black Arrow', 'segovia-core'),
				],
			]
		);

		$this->end_controls_section();// end: Section
		
		// Dots
		$this->start_controls_section(
			'section_dots_style',
			[
				'label' => esc_html__( 'Dots', 'segovia-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'carousel_dots' => 'true',
				],
				'frontend_available' => true,
			]
		);
		$this->add_responsive_control(
			'dots_size',
			[
				'label' => esc_html__( 'Size', 'segovia-core' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000,
						'step' => 1,
					],
				],
				'size_units' => [ 'px' ],
				'selectors' => [
					'{{WRAPPER}} .owl-carousel .owl-dot' => 'width: {{SIZE}}{{UNIT}};height: {{SIZE}}{{UNIT}}',
				],
			]
		);
		$this->add_responsive_control(
			'dots_margin',
			[
				'label' => __( 'Margin', 'segovia-core' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .owl-carousel .owl-dot' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->start_controls_tabs( 'dots_style' );
			$this->start_controls_tab(
				'dots_normal',
				[
					'label' => esc_html__( 'Normal', 'segovia-core' ),
				]
			);
			$this->add_control(
				'dots_color',
				[
					'label' => esc_html__( 'Background Color', 'segovia-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .owl-carousel .owl-dot' => 'background: {{VALUE}};',
					],
				]
			);
			$this->add_group_control(
				Group_Control_Border::get_type(),
				[
					'name' => 'dots_border',
					'label' => esc_html__( 'Border', 'segovia-core' ),
					'selector' => '{{WRAPPER}} .owl-carousel .owl-dot',
				]
			);
			$this->end_controls_tab();  // end:Normal tab
			
			$this->start_controls_tab(
				'dots_active',
				[
					'label' => esc_html__( 'Active', 'segovia-core' ),
				]
			);
			$this->add_control(
				'dots_active_color',
				[
					'label' => esc_html__( 'Background Color', 'segovia-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .owl-carousel .owl-dot.active' => 'background: {{VALUE}};',
					],
				]
			);
			$this->add_group_control(
				Group_Control_Border::get_type(),
				[
					'name' => 'dots_active_border',
					'label' => esc_html__( 'Border', 'segovia-core' ),
					'selector' => '{{WRAPPER}} .owl-carousel .owl-dot.active',
				]
			);
			$this->end_controls_tab();  // end:Active tab
			
		$this->end_controls_tabs(); // end tabs		
		$this->end_controls_section();// end: Section
		
	}

	/**
	 * Render Testimonial Carousel widget output on the frontend.
	 * Written in PHP and used to generate the final HTML.
	*/
	protected function render() {
		$settings = $this->get_settings_for_display();
		$testimonial_style = !empty( $settings['testimonial_style'] ) ? $settings['testimonial_style'] : '';
		$testimonial_limit = !empty( $settings['testimonial_limit'] ) ? $settings['testimonial_limit'] : '-1';
		$testimonial_order = !empty( $settings['testimonial_order'] ) ? $settings['testimonial_order'] : '';
		$testimonial_orderby = !empty( $settings['testimonial_orderby'] ) ? $settings['testimonial_orderby'] : '';
		$navigation_arrow = !empty( $settings['navigation_arrow'] ) ? $settings['navigation_arrow'] : '';
		$testimonial_show_category = !empty( $settings['testimonial_show_category'] ) ? $settings['testimonial_show_category'] : [];
		$short_content = !empty( $settings['short_content'] ) ? $settings['short_content'] : '';
		
		// Carousel Options
		$carousel_items = !empty( $settings['carousel_items'] ) ? $settings['carousel_items'] : '';
		$carousel_items_tablet = !empty( $settings['carousel_items_tablet'] ) ? $settings['carousel_items_tablet'] : '';
		$carousel_items_mobile = !empty( $settings['carousel_items_mobile'] ) ? $settings['carousel_items_mobile'] : '';
		$carousel_margin = !empty( $settings['carousel_margin']['size'] ) ? $settings['carousel_margin']['size'] : '';
		$carousel_autoplay_timeout = !empty( $settings['carousel_autoplay_timeout'] ) ? $settings['carousel_autoplay_timeout'] : '';

		$carousel_loop  = ( isset( $settings['carousel_loop'] ) && ( 'true' == $settings['carousel_loop'] ) ) ? true : false;
		$carousel_dots  = ( isset( $settings['carousel_dots'] ) && ( 'true' == $settings['carousel_dots'] ) ) ? true : false;
		$carousel_nav  = ( isset( $settings['carousel_nav'] ) && ( 'true' == $settings['carousel_nav'] ) ) ? true : false;
		$carousel_autoplay  = ( isset( $settings['carousel_autoplay'] ) && ( 'true' == $settings['carousel_autoplay'] ) ) ? true : false;
		$carousel_animate_out  = ( isset( $settings['carousel_animate_out'] ) && ( 'true' == $settings['carousel_animate_out'] ) ) ? true : false;
		$carousel_mousedrag  = ( isset( $settings['carousel_mousedrag'] ) && ( 'true' == $settings['carousel_mousedrag'] ) ) ? $settings['carousel_mousedrag'] : 'false';
		$carousel_autowidth  = ( isset( $settings['carousel_autowidth'] ) && ( 'true' == $settings['carousel_autowidth'] ) ) ? true : false;
		$carousel_autoheight  = ( isset( $settings['carousel_autoheight'] ) && ( 'true' == $settings['carousel_autoheight'] ) ) ? true : false;

		$styled_class  = ' segva-testimCarElementor ';

		// Carousel Data's
		$carousel_loop = $carousel_loop !== 'true' ? ' data-loop="true"' : ' data-loop="false"';
		$carousel_items = $carousel_items ? ' data-items="'. $carousel_items .'"' : ' data-items="5"';
		$carousel_margin = $carousel_margin ? ' data-margin="'. $carousel_margin .'"' : ' data-margin="30"';
		$carousel_dots = $carousel_dots ? ' data-dots="true"' : ' data-dots="false"';
		$carousel_nav = $carousel_nav ? ' data-nav="true"' : ' data-nav="false"';
		$carousel_autoplay_timeout = $carousel_autoplay_timeout ? ' data-autoplay-timeout="'. $carousel_autoplay_timeout .'"' : '';
		$carousel_autoplay = $carousel_autoplay ? ' data-autoplay="true"' : '';
		$carousel_animate_out = $carousel_animate_out ? ' data-animateout="true"' : '';
		$carousel_mousedrag = $carousel_mousedrag !== 'true' ? ' data-mouse-drag="true"' : ' data-mouse-drag="false"';
		$carousel_autowidth = $carousel_autowidth ? ' data-auto-width="true"' : '';
		$carousel_autoheight = $carousel_autoheight ? ' data-auto-height="true"' : '';
		$carousel_tablet = $carousel_items_tablet ? ' data-items-tablet="'. $carousel_items_tablet .'"' : ' data-items-tablet="3"';
		$carousel_mobile = $carousel_items_mobile ? ' data-items-mobile-landscape="'. $carousel_items_mobile .'"' : ' data-items-mobile-landscape="2"';
		$carousel_small_mobile = $carousel_items_mobile ? ' data-items-mobile-portrait="'. $carousel_items_mobile .'"' : ' data-items-mobile-portrait="1"';

		// Turn output buffer on
		ob_start();

		if($navigation_arrow === 'white') {
    	$arrow_cls = ' white-arrow';
    } else {
    	$arrow_cls = ' black-arrow';
    }

    if($testimonial_style === 'style-three') {
    	$style_class = ' testi-style-three';
    }	elseif($testimonial_style === 'style-two') {
    	$style_class = ' testi-style-two';
    } else {
    	$style_class = ' testi-style-one';
    }

    if ($short_content) {
			$short_content = $short_content;
	  } else {
			$short_content = '36';
	  }

		$args = array(
		  'post_type' => 'testimonial',
		  'posts_per_page' => (int) $testimonial_limit,
		  'testimonial_category' => $testimonial_show_category,
		  'orderby' => $testimonial_orderby,
		  'order' => $testimonial_order
		);

		$segovia_testi = new \WP_Query( $args );

		if ($segovia_testi->have_posts()) :
		?>
		<div class="segva-testimonials <?php echo esc_attr($arrow_cls.$style_class); ?>">
	    <div class="container">
        <div class="owl-carousel" <?php echo $carousel_loop .' '. $carousel_items .' '. $carousel_margin .' '. $carousel_dots .' '. $carousel_nav .' '. $carousel_autoplay_timeout .' '. $carousel_autoplay .' '. $carousel_animate_out .' '. $carousel_mousedrag .' '. $carousel_autowidth .' '. $carousel_autoheight .' '. $carousel_tablet .' '. $carousel_mobile .' '. $carousel_small_mobile; ?>>
				
				<?php while ($segovia_testi->have_posts()) : $segovia_testi->the_post();

				// Get Meta Box Options - segovia_framework_active()
        $testimonial_options = get_post_meta( get_the_ID(), 'testimonial_options', true );
        $testi_job = $testimonial_options['testi_pro'];
        $testi_logo = $testimonial_options['testi_logo'];
        $testi_link = $testimonial_options['testi_link'];

        $testi_logo_img = wp_get_attachment_image_url( $testimonial_options['testi_logo'], 'fullsize', true );

				// Featured Image
				$large_image =  wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'fullsize', false, '' );
				$segovia_alt = get_post_meta( get_post_thumbnail_id(get_the_ID()), '_wp_attachment_image_alt', true);
				$large_image = $large_image[0];

				if($testi_link) {
					$testi_link_actual = $testi_link;
				} else {
					$testi_link_actual = get_permalink();
				}

				if($testimonial_style === 'style-three') {?>
					<div class="item">
            <div class="testimonial-item">
              <div class="testi-infos">
	              <p><?php segovia_excerpt($short_content); ?></p>
	              <h4 class="author-name"><a href="<?php echo esc_url($testi_link_actual); ?>"><?php echo esc_html(get_the_title()); ?></a>
		              <?php if ($testi_job) { ?>
		              	<span class="segva-separator"></span> 
		              	<span class="author-designation"><?php echo esc_html($testi_job); ?></span>
		              <?php } ?>
	              </h4>
              </div>
            </div>
          </div>
				<?php } else { ?>
          <div class="item">
            <div class="testimonial-item">
              <?php if($large_image) { ?>
              <div class="segva-image"><div class="testi-border"></div><img src="<?php echo esc_url($large_image); ?>" alt="<?php echo esc_attr($segovia_alt); ?>"></div>
              <?php } if($testimonial_style === 'style-two' && $testi_logo) { ?>
	            	<div class="segva-icon"><img src="<?php echo esc_url($testi_logo_img); ?>" width="103" alt="<?php echo esc_html(get_the_title()); ?>"></div>
	            <?php } ?>
              <div class="testi-infos">
	              <p><?php segovia_excerpt($short_content); ?></p>
	              <h4 class="author-name"><a href="<?php echo esc_url($testi_link_actual); ?>"><?php echo esc_html(get_the_title()); ?></a><?php if ($testi_job) {
	              if($testimonial_style != 'style-two') { ?>
	              	<span class="segva-separator"></span> 
	              <?php } ?>
	              <span class="author-designation"><?php echo esc_html($testi_job); ?></span><?php } ?></h4>
              </div>
            </div>
          </div>          
        <?php }
				endwhile;
				wp_reset_postdata();
				?>
      </div>
	    <?php  ?>
		</div>
		</div>
	<?php
	  endif;
		// outbut buffer
		echo ob_get_clean();
		
	}

	/**
	 * Render Testimonial Carousel widget output in the editor.
	 * Written as a Backbone JavaScript template and used to generate the live preview.
	*/
	
	//protected function _content_template(){}
	
}
Plugin::instance()->widgets_manager->register_widget_type( new Segovia_Testimonial_Carousel() );
}