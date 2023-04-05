<?php
/*
 * Elementor Segovia Blog Widget
 * Author & Copyright: VictorTheme
*/

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Segovia_Slider extends Widget_Base{

	/**
	 * Retrieve the widget name.
	*/
	public function get_name(){
		return 'vt-segovia_slider';
	}

	/**
	 * Retrieve the widget title.
	*/
	public function get_title(){
		return esc_html__( 'Banner Slider', 'segovia-core' );
	}

	/**
	 * Retrieve the widget icon.
	*/
	public function get_icon() {
		return 'fa fa-sliders';
	}

	/**
	 * Retrieve the list of categories the widget belongs to.
	*/
	public function get_categories() {
		return ['victortheme-category'];
	}

	/**
	 * Retrieve the list of scripts the Segovia Slider widget depended on.
	 * Used to set scripts dependencies required to run the widget.
	*/
	/*
	public function get_script_depends() {
		return ['vt-segovia_slider'];
	}
	 */
	
	/**
	 * Register Segovia Slider widget controls.
	 * Adds different input fields to allow the user to change and customize the widget settings.
	*/
	protected function _register_controls(){
		
		$this->start_controls_section(
			'section_slider',
			[
				'label' => __( 'Slider Options', 'segovia-core' ),
			]
		);
		$this->add_control(
			'slider_style',
			[
				'label' => __( 'Slider Style', 'segovia-core' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'style-one' => esc_html__( 'Style One', 'segovia-core' ),
					'style-two' => esc_html__( 'Style Two', 'segovia-core' ),
					'style-three' => esc_html__( 'Style Three', 'segovia-core' ),
				],
				'default' => 'style-one',
				'description' => esc_html__( 'Select your slider style.', 'segovia-core' ),
			]
		);

		$repeater = new Repeater();
		$repeater->add_control(
			'slider_image',
			[
				'label' => esc_html__( 'Slider Background Image', 'segovia-core' ),
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
			]
		);
		$repeater->add_control(
			'slider_featured_image',
			[
				'label' => esc_html__( 'Slider Featured Image', 'segovia-core' ),
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
			]
		);

		$repeater->add_control(
			'slider_title',
			[
				'label' => esc_html__( 'Slider title', 'segovia-core' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'placeholder' => esc_html__( 'Type slide title here', 'segovia-core' ),
			]
		);
		$repeater->add_control(
			'slider_title_two',
			[
				'label' => esc_html__( 'Slider title secondary', 'segovia-core' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'placeholder' => esc_html__( 'Type slide secondary title here', 'segovia-core' ),
			]
		);
		$repeater->add_control(
			'title_shdw_color',
			[
				'label' => esc_html__( 'Shadow Color', 'segovia-core' ),
				'type' => Controls_Manager::COLOR,
			]
		);
		$repeater->add_control(
			'icon_image',
			[
				'label' => esc_html__( 'Upload Icon Image', 'segovia-core' ),
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => '',
				],
				'description' => esc_html__( 'Set your icon image.', 'segovia-core'),
			]
		);
		$repeater->add_control(
			'slider_content',
			[
				'label' => esc_html__( 'Slider categories', 'segovia-core' ),
				'type' => Controls_Manager::TEXTAREA,
				'label_block' => true,
				'placeholder' => esc_html__( 'Type slide categories separated by /', 'segovia-core' ),
			]
		);
		
		$repeater->add_control(
			'btn_txt',
			[
				'label' => esc_html__( 'Button Text', 'segovia-core' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'placeholder' => esc_html__( 'Type your button text here', 'segovia-core' ),
			]
		);
		$repeater->add_control(
			'button_link',
			[
				'label' => esc_html__( 'Button Link', 'segovia-core' ),
				'type' => Controls_Manager::URL,
				'placeholder' => __( 'https://your-link.com', 'segovia-core' ),
				'show_external' => true,
				'default' => [
					'url' => '',
				],
			]
		);

		$this->add_control(
			'swipeSliders_groups',
			[
				'label' => esc_html__( 'Slider Items', 'segovia-core' ),
				'type' => Controls_Manager::REPEATER,
				'default' => [
					[
						'slider_title' => esc_html__( 'Item #1', 'segovia-core' ),
					],
					
				],
				'fields' =>  $repeater->get_controls(),
				'title_field' => '{{{ slider_title }}}',
			]
		);	
		
		$this->end_controls_section();// end: Section

		$this->start_controls_section(
			'section_slider_bottom',
			[
				'label' => __( 'Slider Bottom', 'segovia-core' ),
				'condition' => [
					'slider_style' => 'style-three',
				],
			]
		);

		$this->add_control(
			'bottom_txt',
			[
				'label' => esc_html__( 'Slider Bottom Text', 'segovia-core' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'placeholder' => esc_html__( 'Type your button text here', 'segovia-core' ),
			]
		);	
		$repeater = new Repeater();
		$repeater->add_control(
			'social_icon',
			[
				'label' => esc_html__( 'Social Icon', 'segovia-core' ),
				'type' => Controls_Manager::ICON,
				'frontend_available' => true,
				'options' => Controls_Helper_Output::get_include_icons(),
				'default' => 'fa fa-facebook',
			]
		);
		$repeater->add_control(
			'social_icon_link',
			[
				'label' => esc_html__( 'Icon Link', 'segovia-core' ),
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
			'SocialIcons_groups',
			[
				'label' => esc_html__( 'Social Icons', 'segovia-core' ),
				'type' => Controls_Manager::REPEATER,
				'default' => [
					[
						'social_icon' => esc_html__( 'Item #1', 'segovia-core' ),
					],
					
				],
				'fields' => $repeater->get_controls(),
				'title_field' => '{{{ social_icon }}}',
			]
		);

		$this->end_controls_section();// end: Section

		$this->start_controls_section(
			'section_animation',
			[
				'label' => __( 'Slider Animation', 'segovia-core' ),
			]
		);

		$this->add_control(
			'title_entrance_animation',
			[
				'label' => esc_html__( 'Title Entrance Animation', 'segovia-core' ),
				'type' => Controls_Manager::ANIMATION,
			]
		);
		$this->add_control(
			'content_entrance_animation',
			[
				'label' => esc_html__( 'Content Entrance Animation', 'segovia-core' ),
				'type' => Controls_Manager::ANIMATION,
			]
		);
		$this->add_control(
			'button_entrance_animation',
			[
				'label' => esc_html__( 'Button Entrance Animation', 'segovia-core' ),
				'type' => Controls_Manager::ANIMATION,
			]
		);		
		
		$this->end_controls_section();// end: Section

		$this->start_controls_section(
			'section_carousel',
			[
				'label' => esc_html__( 'Carousel Options', 'segovia-core' ),
			]
		);
		
		$this->add_control(
			'carousel_autoplay_timeout',
			[
				'label' => __( 'Auto Play Timeout', 'segovia-core' ),
				'type' => Controls_Manager::NUMBER,
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
			'carousel_autoplay_interaction',
			[
				'label' => esc_html__( 'Disable Autoplay on Interaction', 'segovia-core' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Yes', 'segovia-core' ),
				'label_off' => esc_html__( 'No', 'segovia-core' ),
				'return_value' => 'true',
				'description' => esc_html__( 'If you want to disable autoplay on interaction, enable it.', 'segovia-core' ),
			]
		);
		$this->add_control(
			'clickable_pagi',
			[
				'label' => esc_html__( 'Pagination Dots Clickable?', 'segovia-core' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Yes', 'segovia-core' ),
				'label_off' => esc_html__( 'No', 'segovia-core' ),
				'return_value' => 'true',
				'description' => esc_html__( 'If you want pagination dots clickable, enable it.', 'segovia-core' ),
			]
		);
		$this->add_control(
			'carousel_speed',
			[
				'label' => __( 'Auto Play Speed', 'segovia-core' ),
				'type' => Controls_Manager::NUMBER,
			]
		);
		$this->add_control(
			'carousel_effect',
			[
				'label' => __( 'Slider Effect', 'segovia-core' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'slide' => esc_html__( 'Slide', 'segovia-core' ),
					'fade' => esc_html__( 'Fade', 'segovia-core' ),
					'cube' => esc_html__( 'Cube', 'segovia-core' ),
					'coverflow' => esc_html__( 'Coverflow', 'segovia-core' ),
				],
				'default' => 'slide',
				'description' => esc_html__( 'Select your slider navigation style.', 'segovia-core' ),
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
		$this->end_controls_section();// end: Section

		$this->start_controls_section(
			'section_bg_style',
			[
				'label' => esc_html__( 'Section Style', 'segovia-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'overlay_color',
			[
				'label' => esc_html__( 'Overlay Color', 'segovia-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .segva-slider-caption' => 'background: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'bg_color',
			[
				'label' => esc_html__( 'Background Color', 'segovia-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .swiper-slide' => 'background: {{VALUE}};',
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
				'name' => 'title_typography',				
				'selector' => '{{WRAPPER}} .segva-slider-caption h2',
			]
		);
		$this->add_control(
			'title_color',
			[
				'label' => esc_html__( 'Color', 'segovia-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .segva-slider-caption h2' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'title_shadow_color',
			[
				'label' => esc_html__( 'Shadow Color', 'segovia-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .segva-slider-caption h2' => 'text-shadow: 1px 15px {{VALUE}};',
				],
			]
		);
		$this->add_responsive_control(
			'title_padding',
			[
				'label' => __( 'Padding', 'segovia-core' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .segva-slider-caption .banner-caption' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
				'name' => 'slider_content_typography',
				'selector' => '{{WRAPPER}} .segva-slider-caption p',
			]
		);
		$this->add_control(
			'slider_content_color',
			[
				'label' => esc_html__( 'Color', 'segovia-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .segva-slider-caption p' => 'color: {{VALUE}};',
				],
			]
		);
		$this->end_controls_section();// end: Section

		// Button Style
		$this->start_controls_section(
			'section_button_style',
			[
				'label' => esc_html__( 'Button', 'segovia-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'button_typography',
				'selector' => '{{WRAPPER}} .segva-border-link',
			]
		);

		$this->add_control(
			'button_padding',
			[
				'label' => __( 'Padding', 'segovia-core' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .segva-border-link' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'button_margin',
			[
				'label' => __( 'Margin', 'segovia-core' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .segva-border-link' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->start_controls_tabs( 'button_style' );
			$this->start_controls_tab(
				'button_normal',
				[
					'label' => esc_html__( 'Normal', 'segovia-core' ),
				]
			);
			$this->add_control(
				'button_color',
				[
					'label' => esc_html__( 'Color', 'segovia-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .segva-slider-caption .segva-border-link, {{WRAPPER}} .caption-wrap .segva-border-link a' => 'color: {{VALUE}};',
					],
				]
			);
			$this->add_control(
				'button_border_color',
				[
					'label' => esc_html__( 'Border Color', 'segovia-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .caption-wrap .segva-border-link a.segva-link:after' => 'background: {{VALUE}};',
					],
				]
			);
			$this->end_controls_tab();  // end:Normal tab
			
			$this->start_controls_tab(
				'button_hover',
				[
					'label' => esc_html__( 'Hover', 'segovia-core' ),
				]
			);
			$this->add_control(
				'button_hover_color',
				[
					'label' => esc_html__( 'Color', 'segovia-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .segva-slider-caption .segva-link:hover' => 'color: {{VALUE}};',
					],
				]
			);
			
		$this->end_controls_tab();  // end:Hover tab
		$this->end_controls_tabs(); // end tabs
		
		$this->end_controls_section();// end: Section


		// Content
		$this->start_controls_section(
			'slider_nav_style',
			[
				'label' => esc_html__( 'Navigation', 'segovia-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'slider_nav_color',
			[
				'label' => esc_html__( 'Color', 'segovia-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .segva-spacer-wrap .swiper-container .swiper-button-prev:before, {{WRAPPER}} .segva-spacer-wrap .swiper-container .swiper-button-next:before' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'slider_nav_bgcolor',
			[
				'label' => esc_html__( 'Background Color', 'segovia-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .segva-spacer-wrap .swiper-container .swiper-button-next, {{WRAPPER}} .segva-spacer-wrap .swiper-container .swiper-button-prev' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'slider_nav_bg_hover_color',
			[
				'label' => esc_html__( 'Background Hover Color', 'segovia-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .segva-spacer-wrap .swiper-container .swiper-button-next:hover,  {{WRAPPER}} .segva-spacer-wrap .swiper-container .swiper-button-prev:hover' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->end_controls_section();// end: Section
	
	}

	/**
	 * Render Blog widget output on the frontend.
	 * Written in PHP and used to generate the final HTML.
	*/
	protected function render() {
		$settings = $this->get_settings_for_display();
		$slider_style = !empty( $settings['slider_style'] ) ? $settings['slider_style'] : '';
		$carousel_effect = !empty( $settings['carousel_effect'] ) ? $settings['carousel_effect'] : '';

		// Carousel Options
		$swipeSliders_groups = !empty( $settings['swipeSliders_groups'] ) ? $settings['swipeSliders_groups'] : [];
		$carousel_autoplay_timeout = !empty( $settings['carousel_autoplay_timeout'] ) ? $settings['carousel_autoplay_timeout'] : '';
		$carousel_speed = !empty( $settings['carousel_speed'] ) ? $settings['carousel_speed'] : '';

		$carousel_loop  = ( isset( $settings['carousel_loop'] ) && ( 'true' == $settings['carousel_loop'] ) ) ? $settings['carousel_loop'] : 'false';
		$carousel_dots  = ( isset( $settings['carousel_dots'] ) && ( 'true' == $settings['carousel_dots'] ) ) ? true : false;
		$carousel_nav  = ( isset( $settings['carousel_nav'] ) && ( 'true' == $settings['carousel_nav'] ) ) ? true : false;
		$carousel_autoplay  = ( isset( $settings['carousel_autoplay'] ) && ( 'true' == $settings['carousel_autoplay'] ) ) ? true : false;
		$carousel_autoplay_interaction = ( isset( $settings['carousel_autoplay_interaction'] ) && ( 'true' == $settings['carousel_autoplay_interaction'] ) ) ? true : false;
		$clickable_pagi = ( isset( $settings['clickable_pagi'] ) && ( 'true' == $settings['clickable_pagi'] ) ) ? true : false;

		$carousel_mousedrag  = ( isset( $settings['carousel_mousedrag'] ) && ( 'true' == $settings['carousel_mousedrag'] ) ) ? $settings['carousel_mousedrag'] : 'false';
		
		// Carousel Data's
		$carousel_loop = $carousel_loop !== 'true' ? ' data-loop="true"' : ' data-loop="false"';	
		$carousel_autoplay_timeout = $carousel_autoplay_timeout ? ' data-interval="'. $carousel_autoplay_timeout .'"' : ' data-interval="5000"';
		$carousel_speed = $carousel_speed ? ' data-speed="'. $carousel_speed .'"' : ' data-speed="1000"';
		$carousel_autoplay = $carousel_autoplay ? ' data-autoplay="true"' : '';
		$carousel_autoplay_interaction = $carousel_autoplay_interaction ? ' data-interaction="true"' : '';
		$clickable_pagi = $clickable_pagi ? 'data-clickpage="true"' : '';
		$carousel_effect = (isset($settings['carousel_effect'])) ? ' data-effect="'.$carousel_effect.'"' : '';
		$carousel_mousedrag = $carousel_mousedrag !== 'true' ? ' data-mousedrag="true"' : ' data-mousedrag="false"';		
		

		$label_entrance_animation = !empty( $settings['label_entrance_animation'] ) ? $settings['label_entrance_animation'] : '';
		$title_entrance_animation = !empty( $settings['title_entrance_animation'] ) ? $settings['title_entrance_animation'] : '';
		$content_entrance_animation = !empty( $settings['content_entrance_animation'] ) ? $settings['content_entrance_animation'] : '';
		$button_entrance_animation = !empty( $settings['button_entrance_animation'] ) ? $settings['button_entrance_animation'] : '';
		$button_two_entrance_animation = !empty( $settings['button_two_entrance_animation'] ) ? $settings['button_two_entrance_animation'] : '';

		// Animation
		$label_entrance_animation = $label_entrance_animation ? $label_entrance_animation : 'fadeInUp';
		$title_entrance_animation = $title_entrance_animation ? $title_entrance_animation : 'fadeInUp';
		$content_entrance_animation = $content_entrance_animation ? $content_entrance_animation : 'fadeInUp';
		$button_entrance_animation = $button_entrance_animation ? $button_entrance_animation : 'fadeInUp';
		$button_two_entrance_animation = $button_two_entrance_animation ? $button_two_entrance_animation : 'fadeInUp';

		$bottom_txt = !empty( $settings['bottom_txt'] ) ? $settings['bottom_txt'] : '';
		$SocialIcons_groups = !empty( $settings['SocialIcons_groups'] ) ? $settings['SocialIcons_groups'] : '';

		// Turn output buffer on
		ob_start();
		if($slider_style === 'style-three') {
			$style_cls = ' slider-style-three';
		} elseif($slider_style === 'style-two') {
			$style_cls = ' slider-style-two';
		} else {
			$style_cls = ' slider-style-one';
		}

		 ?>
<div class="segva-slider <?php echo esc_attr($style_cls); ?>">
<?php if($slider_style === 'style-two') { ?>
<div class="segva-spacer-wrap">
<?php } ?>
<div class="swiper-container swiper-slides segva-swiper swiper-keyboard" <?php echo $carousel_loop . $carousel_autoplay_timeout . $carousel_autoplay . $carousel_effect . $carousel_speed . $carousel_autoplay_interaction . $clickable_pagi . $carousel_mousedrag; ?> data-swiper="container">
	<div class="swiper-wrapper">

    <?php
			if( is_array( $swipeSliders_groups ) && !empty( $swipeSliders_groups ) ){
				foreach ( $swipeSliders_groups as $each_item ) {

					$image_url = wp_get_attachment_url( $each_item['slider_image']['id'] );
					$featured_image_url = wp_get_attachment_url( $each_item['slider_featured_image']['id'] );

					$slider_title = !empty( $each_item['slider_title'] ) ? $each_item['slider_title'] : '';
					$slider_title_two = !empty( $each_item['slider_title_two'] ) ? $each_item['slider_title_two'] : '';
					$title_shdw_color = !empty( $each_item['title_shdw_color'] ) ? $each_item['title_shdw_color'] : '';
					$slider_content = !empty( $each_item['slider_content'] ) ? $each_item['slider_content'] : '';
					
					$button_text = !empty( $each_item['btn_txt'] ) ? $each_item['btn_txt'] : '';
					$button_link = !empty( $each_item['button_link']['url'] ) ? $each_item['button_link']['url'] : '';
					$button_link_external = !empty( $each_item['button_link']['is_external'] ) ? 'target="_blank"' : '';
					$button_link_nofollow = !empty( $each_item['button_link']['nofollow'] ) ? 'rel="nofollow"' : '';
					$button_link_attr = !empty( $button_link ) ?  $button_link_external.' '.$button_link_nofollow : '';

					$button_two_text = !empty( $each_item['btn_two_txt'] ) ? $each_item['btn_two_txt'] : '';
					$button_two_link = !empty( $each_item['button_two_link']['url'] ) ? $each_item['button_two_link']['url'] : '';
					$button_two_link_external = !empty( $each_item['button_two_link']['is_external'] ) ? 'target="_blank"' : '';
					$button_two_link_nofollow = !empty( $each_item['button_two_link']['nofollow'] ) ? 'rel="nofollow"' : '';
					$button_two_link_attr = !empty( $button_two_link ) ?  $button_two_link_external.' '.$button_two_link_nofollow : '';

					$icon_image_url = wp_get_attachment_url( $each_item['icon_image']['id'] );

					if($slider_style === 'style-three') {
						$color = $title_shdw_color ? 'text-shadow: 1px 15px '.$title_shdw_color.';' : '';
					} else {
						$color = $title_shdw_color ? 'text-shadow: 1px 10px '.$title_shdw_color.';' : '';
					}

					if($icon_image_url) {
						$icon_img_actual = 'background-image: url('.$icon_image_url.');';
					} else {
						$icon_img_actual = '';
					}

					$slide_title = $slider_title ? ' <h2 class="slider-caption-title animated slider-caption-title-one" data-animation="'.esc_attr($title_entrance_animation).'" style="'.$color.'">'.$slider_title.'</h2>' : '';
					$slide_title_two = $slider_title_two ? ' <h2 class="slider-caption-title animated slider-caption-title-two" data-animation="'.esc_attr($title_entrance_animation).'" style="'.$color.$icon_img_actual.'">'.$slider_title_two.'</h2>' : '';


					$slide_content = $slider_content ? ' <p class="slider-category animated" data-animation="'.esc_attr($content_entrance_animation).'">'.str_replace("/","<span class='segva-separator'></span>", $slider_content).'</p>' : '';

					$featured_img = $featured_image_url ? '<img src="'. $featured_image_url .'" alt="'.esc_attr($slider_title).'">' : '';

					$button_one = $button_link ? '<div class="segva-border-link animated" data-animation="'.esc_attr($button_entrance_animation).'"><a href="'.esc_url($button_link).'" '.$button_link_attr.' class="segva-link"><i class="fa fa-angle-down" aria-hidden="true"></i> '. $button_text .' </a></div>' : '<div class="segva-border-link animated" data-animation="'.esc_attr($button_entrance_animation).'><span> <i class="fa fa-angle-down" aria-hidden="true"></i> '. $button_text .'</span></div>';
					

					$button_actual = $button_text ? $button_one : '';

					if($slider_style === 'style-three') { ?>
						<div class="swiper-slide" style="background-image: url(<?php echo $image_url; ?>);">
							<div class="segva-slider-caption">
					      <div class="segva-table-wrap">
					        <div class="segva-align-wrap">
					          
						          <div class="row align-items-center">
							          <div class="col-md-6">
							            <div class="banner-caption caption-wrap"><?php echo $slide_content.$slide_title.$slide_title_two.$button_actual; ?>
							            </div>
							          </div>
							          <div class="col-md-6 slider-featured-image">
							            <?php echo $featured_img; ?>
							          </div>
							        </div>
					          
					        </div>
					      </div>
				    	</div>
				    </div>	
					<?php } elseif($slider_style === 'style-two') { ?>
						<div class="swiper-slide" style="background-image: url(<?php echo $image_url; ?>);">
							<div class="segva-slider-caption">
   
			          <div class="row align-items-center">
			          	<div class="slider-featured-image">
				            <?php echo $featured_img; ?>
				          </div>
				          <div class="slider-infos">
				            <div class="banner-caption caption-wrap"><?php echo $slide_content.$slide_title.$slide_title_two.$button_actual; ?>
				            </div>
				          </div>
				        </div>

				    	</div>
				    </div>	
					<?php } else {
					?>
						<div class="swiper-slide" style="background-image: url(<?php echo $image_url; ?>);">
							<div class="segva-slider-caption">
					      <div class="segva-table-wrap">
					        <div class="segva-align-wrap">
					          <div class="container">
						          <div class="row align-items-center">
							          <div class="col-xl-5 col-lg-12">
							            <div class="banner-caption caption-wrap"><?php echo $slide_content.$slide_title.$slide_title_two.$button_actual; ?>
							            </div>
							          </div>
							          <div class="col-xl-7 col-lg-12 slider-featured-image">
							            <?php echo $featured_img; ?>
							          </div>
							        </div>
					          </div>
					        </div>
					      </div>
				    	</div>
				    </div>							
				<?php } 
				}
			} ?>
		</div>
		<?php if($slider_style === 'style-three') {
			echo '<div class="segva-slider-bottom-wrap"><div class="segva-slider-btm-cnt">';
			$bottom_txt = $bottom_txt ? '<span class="alider-btm-text">'.$bottom_txt.'</span>' : '';
			echo $bottom_txt;
			if( is_array( $SocialIcons_groups ) && !empty( $SocialIcons_groups ) ){
      	echo '<div class="segva-social">';
				foreach ( $SocialIcons_groups as $each_icon ) {
					$icon_link = !empty( $each_icon['social_icon_link'] ) ? $each_icon['social_icon_link'] : '';
					$link_url = !empty( $icon_link['url'] ) ? esc_url($icon_link['url']) : '';
					$link_external = !empty( $icon_link['is_external'] ) ? 'target="_blank"' : '';
					$link_nofollow = !empty( $icon_link['nofollow'] ) ? 'rel="nofollow"' : '';
					$link_attr = !empty( $icon_link['url'] ) ?  $link_external.' '.$link_nofollow : '';

				  $social_icon = ( $each_icon['social_icon'] ) ? $each_icon['social_icon'] : '';
			?>
					<a href="<?php echo $link_url; ?>" <?php echo $link_attr; ?> class="slider-btm-icon"><i class="<?php echo $social_icon; ?>"></i></a>
			<?php	}
				echo '</div>';
			}
			echo '</div></div>';
		}
		if($carousel_nav){
			if($slider_style === 'style-three') { ?>
				<div class="segva-swiper-nav">
			<?php } ?>
				<div class="swiper-button-prev"></div>
	      <div class="swiper-button-next"></div>
	    <?php if($slider_style === 'style-three') { ?>
	    	</div>
    <?php } } if($carousel_dots) { ?>  
	    <div class="swiper-pagination-wrap">
	    	<div class="swiper-pagination"></div>
	    </div>
    <?php } ?>
    </div>
    <?php if($slider_style === 'style-two') { ?>
    </div>
    <?php } ?>
  </div>
		<?php
		// Return outbut buffer
		echo ob_get_clean();
		
	}

	/**
	 * Render Blog widget output in the editor.
	 * Written as a Backbone JavaScript template and used to generate the live preview.
	*/

	//protected function _content_template(){}
	
}
Plugin::instance()->widgets_manager->register_widget_type( new Segovia_Slider() );
