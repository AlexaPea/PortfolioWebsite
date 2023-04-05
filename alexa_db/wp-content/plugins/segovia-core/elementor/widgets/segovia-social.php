<?php
/*
 * Elementor Segovia Social Icons Widget
 * Author & Copyright: VictorTheme
*/

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Segovia_Social extends Widget_Base{

	/**
	 * Retrieve the widget name.
	*/
	public function get_name(){
		return 'vt-segovia_social_icons';
	}

	/**
	 * Retrieve the widget title.
	*/
	public function get_title(){
		return esc_html__( 'Social Icons', 'segovia-core' );
	}

	/**
	 * Retrieve the widget icon.
	*/
	public function get_icon() {
		return 'fa fa-share-alt';
	}

	/**
	 * Retrieve the list of categories the widget belongs to.
	*/
	public function get_categories() {
		return ['victortheme-category'];
	}

	/**
	 * Retrieve the list of scripts the Segovia Social Icons widget depended on.
	 * Used to set scripts dependencies required to run the widget.
	*/
	public function get_script_depends() {
		return ['vt-segovia_social_icons'];
	}
	
	/**
	 * Register Segovia Social Icons widget controls.
	 * Adds different input fields to allow the user to change and customize the widget settings.
	*/
	protected function _register_controls(){
		
		$this->start_controls_section(
			'section_social',
			[
				'label' => esc_html__( 'Social Icons', 'segovia-core' ),
			]
		);
		$this->add_control(
			'social_title',
			[
				'label' => esc_html__( 'Title', 'segovia-core' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'placeholder' => esc_html__( 'Type title here', 'segovia-core' ),
			]
		);
		$this->add_control(
			'rounded_style',
			[
				'label' => esc_html__( 'Rounded Style', 'segovia-core' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Yes', 'segovia-core' ),
				'label_off' => esc_html__( 'No', 'segovia-core' ),
				'return_value' => 'true',
				'default' => 'true',
			]
		);
		$this->add_responsive_control(
			'section_align',
			[
				'label' => esc_html__( 'Alignment', 'segovia-core' ),
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
					'{{WRAPPER}} .social-section' => 'text-align: {{VALUE}};',
				],
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
				'selector' => '{{WRAPPER}} .social-section h4.social-title',
			]
		);
		$this->add_control(
			'title_color',
			[
				'label' => esc_html__( 'Color', 'segovia-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .social-section h4.social-title' => 'color: {{VALUE}};',
				],
			]
		);
		$this->end_controls_section();// end: Section

		// Social Icons
		$this->start_controls_section(
			'section_social_style',
			[
				'label' => esc_html__( 'Social Icons', 'segovia-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->start_controls_tabs( 'icon_style' );
		$this->start_controls_tab(
			'icon_normal',
			[
				'label' => esc_html__( 'Normal', 'segovia-core' ),
			]
		);
		$this->add_control(
			'icon_color',
			[
				'label' => esc_html__( 'Color', 'segovia-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .segva-social.rounded a, {{WRAPPER}} .segva-social a' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'icon_bg_color',
			[
				'label' => esc_html__( 'Icon Background Color', 'segovia-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .segva-social.rounded a' => 'background: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'icon_border_color',
			[
				'label' => esc_html__( 'Icon Border Color', 'segovia-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .segva-social.rounded a' => 'border-color: {{VALUE}};',
				],
			]
		);
		$this->end_controls_tab();  // end:Normal tab
		$this->start_controls_tab(
			'icon_hover',
			[
				'label' => esc_html__( 'Hover', 'segovia-core' ),
			]
		);
		$this->add_control(
			'icon_hover_color',
			[
				'label' => esc_html__( 'Icon Hover Color', 'segovia-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .segva-social.rounded a:hover, {{WRAPPER}} .segva-social a:hover' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'icon_bg_hover_color',
			[
				'label' => esc_html__( 'Icon Background Hover Color', 'segovia-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .segva-social.rounded a:hover' => 'background: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'icon_border_hover_color',
			[
				'label' => esc_html__( 'Icon Border Hover Color', 'segovia-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .segva-social.rounded a:hover' => 'border-color: {{VALUE}};',
				],
			]
		);
		$this->end_controls_tab();  // end:Normal tab
		$this->end_controls_tabs();
		$this->add_responsive_control(
			'icon_size',
			[
				'label' => esc_html__( 'Size', 'obira-core' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000,
						'step' => 1,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .segva-social a' => 'font-size:{{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'icon_margin',
			[
				'label' => __( 'Margin', 'obira-core' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .segva-social a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_section();// end: Section

	}

	/**
	 * Render Social Icons widget output on the frontend.
	 * Written in PHP and used to generate the final HTML.
	*/
	protected function render() {
		$settings = $this->get_settings_for_display();
		$rounded_style = !empty( $settings['rounded_style'] ) ? $settings['rounded_style'] : '';
		$social_title = !empty( $settings['social_title'] ) ? $settings['social_title'] : '';
		$SocialIcons_groups = !empty( $settings['SocialIcons_groups'] ) ? $settings['SocialIcons_groups'] : '';

	  // Social Title
	  $social_title = $social_title ? '<h4 class="social-title">'.$social_title.'</h4>' : '';
	  if($rounded_style) {
	  	$rounded_class = ' rounded';
	  } else {
	  	$rounded_class = '';
	  }

		// Turn output buffer on
		ob_start();

      if( is_array( $SocialIcons_groups ) && !empty( $SocialIcons_groups ) ){
      	echo '<div class="social-section">'.$social_title.'<div class="segva-social '.$rounded_class.'">';
				foreach ( $SocialIcons_groups as $each_icon ) {
					$icon_link = !empty( $each_icon['social_icon_link'] ) ? $each_icon['social_icon_link'] : '';
					$link_url = !empty( $icon_link['url'] ) ? esc_url($icon_link['url']) : '';
					$link_external = !empty( $icon_link['is_external'] ) ? 'target="_blank"' : '';
					$link_nofollow = !empty( $icon_link['nofollow'] ) ? 'rel="nofollow"' : '';
					$link_attr = !empty( $icon_link['url'] ) ?  $link_external.' '.$link_nofollow : '';

				  $social_icon = ( $each_icon['social_icon'] ) ? $each_icon['social_icon'] : '';
			?>
					<a href="<?php echo $link_url; ?>" <?php echo $link_attr; ?> class="<?php echo str_replace('fa ', 'icon-', $social_icon); ?>"><i class="<?php echo $social_icon; ?>"></i></a>
			<?php	}
				echo '</div></div>';
			}

		// Return outbut buffer
		echo ob_get_clean();
	}

	/**
	 * Render Social Icons widget output in the editor.
	 * Written as a Backbone JavaScript template and used to generate the live preview.
	*/
	
	//protected function _content_template(){}
	
}
Plugin::instance()->widgets_manager->register_widget_type( new Segovia_Social() );
