<?php
/*
 * Elementor Segovia Parallax Video Widget
 * Author & Copyright: VictorTheme
*/

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Segovia_Parallax_Video extends Widget_Base{

	/**
	 * Retrieve the widget name.
	*/
	public function get_name(){
		return 'vt-medley_parallaxvideo';
	}

	/**
	 * Retrieve the widget title.
	*/
	public function get_title(){
		return esc_html__( 'Parallax Video', 'medley-core' );
	}

	/**
	 * Retrieve the widget icon.
	*/
	public function get_icon() {
		return 'fa fa-play-circle-o';
	}

	/**
	 * Retrieve the list of categories the widget belongs to.
	*/
	public function get_categories() {
		return ['victortheme-category'];
	}

	/**
	 * Retrieve the list of scripts the Segovia Parallax Video widget depended on.
	 * Used to set scripts dependencies required to run the widget.
	*/
	/*
	public function get_script_depends() {
		return ['vt-medley_parallaxvideo'];
	}
	*/
	
	/**
	 * Register Segovia Parallax Video widget controls.
	 * Adds different input fields to allow the user to change and customize the widget settings.
	*/
	protected function _register_controls(){
		
		$this->start_controls_section(
			'section_parallaxvideo',
			[
				'label' => __( 'Parallax Video Options', 'medley-core' ),
			]
		);	
		$this->add_control(
			'video_style',
			[
				'label' => esc_html__( 'Video Style', 'medley-core' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'style-one' => esc_html__( 'Style One', 'medley-core' ),
					'style-two' => esc_html__( 'Style Two', 'medley-core' ),
				],
				'default' => 'style-one',
				'description' => esc_html__( 'Select your video style.', 'medley-core' ),
			]
		);
		$this->add_control(
			'bg_image',
			[
				'label' => esc_html__( 'Background Image', 'medley-core' ),
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
			]
		);	
		$this->add_control(
			'play_title',
			[
				'label' => esc_html__( 'Play Button Title', 'medley-core' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => esc_html__( 'Play', 'medley-core' ),
				'placeholder' => esc_html__( 'Type your play button title here', 'medley-core' ),
				'condition' => [
					'video_style' => 'style-two',
				],
			]
		);
		$this->add_control(
			'left_title',
			[
				'label' => esc_html__( 'Title Left', 'medley-core' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => esc_html__( 'Watch our', 'medley-core' ),
				'placeholder' => esc_html__( 'Type your left side title here', 'medley-core' ),
				'condition' => [
					'video_style' => 'style-one',
				],
			]
		);
		$this->add_control(
			'right_title',
			[
				'label' => esc_html__( 'Title Right', 'medley-core' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => esc_html__( 'Intro Video', 'medley-core' ),
				'condition' => [
					'video_style' => 'style-one',
				],
				'placeholder' => esc_html__( 'Type your left side title here', 'medley-core' ),
			]
		);	
		$this->add_control(
			'video_link',
			[
				'label' => esc_html__( 'Video Link', 'medley-core' ),
				'type' => Controls_Manager::TEXTAREA,
				'label_block' => true,
				'default' => esc_html__( 'https://player.vimeo.com/video/97151630', 'medley-core' ),
				'placeholder' => esc_html__( 'Enter your link here', 'medley-core' ),				
			]
		);
		$this->add_control(
			'disable_parallax',
			[
				'label' => esc_html__( 'Disable Parallax?', 'medley-core' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Yes', 'medley-core' ),
				'label_off' => esc_html__( 'No', 'medley-core' ),
				'return_value' => 'true',
			]
		);
		$this->end_controls_section();// end: Section
		
		// Video		
		$this->start_controls_section(
			'section_video_style',
			[
				'label' => esc_html__( 'Parallax Video Style', 'medley-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);	
		$this->add_control(
			'vbtn_bg_color',
			[
				'label' => esc_html__( 'Parallax Background Overlay Color', 'medley-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .segva-video.segva-overlay:before' => 'background: {{VALUE}};',
				],
			]
		);	

		$this->add_control(
			'vbtnaa_icon_color',
			[
				'label' => esc_html__( 'Icon Color', 'medley-core' ),
				'type' => Controls_Manager::COLOR,
				'condition' => [
				'video_style' => 'style-one',
			],
				'selectors' => [
					'{{WRAPPER}} .segva-video h2' => 'color: {{VALUE}};',
				],
			]
		);
		
		$this->start_controls_tabs( 'icon_style' );
			$this->start_controls_tab(
				'icon_normal',
				[
					'label' => esc_html__( 'Normal', 'medley-core' ),
				]
			);
			$this->add_control(
				'vbtn_icon_color',
				[
					'label' => esc_html__( 'Icon Color', 'medley-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .video-btn .fa' => 'color: {{VALUE}};',
					],
				]
			);
			$this->add_control(
				'vbtn_icon_bg_color',
				[
					'label' => esc_html__( 'Icon Background Color', 'medley-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .video-btn' => 'background-color: {{VALUE}};',
					],
				]
			);
			$this->add_control(
				'vbtn_icon_border_color',
				[
					'label' => esc_html__( 'Icon Border Color', 'medley-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .video-btn:before' => 'border-color: {{VALUE}};',
					],
				]
			);
			$this->end_controls_tab();  // end:Normal tab
			
			$this->start_controls_tab(
				'icon_hover',
				[
					'label' => esc_html__( 'Hover', 'medley-core' ),
				]
			);
			$this->add_control(
				'vbtn_icon_hover_color',
				[
					'label' => esc_html__( 'Icon Color', 'medley-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .video-btn:hover .fa' => 'color: {{VALUE}};',
					],
				]
			);
			$this->add_control(
				'vbtn_icon_bg_hover_color',
				[
					'label' => esc_html__( 'Parallax Video Background Color', 'medley-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .video-btn:hover' => 'background-color: {{VALUE}};',
					],
				]
			);
			$this->end_controls_tab();  // end:Hover tab
		$this->end_controls_tabs(); // end tabs

		$this->add_responsive_control(
			'video_height',
			[
				'label' => esc_html__( 'Height', 'segovia-core' ),
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
					'{{WRAPPER}} .segva-video' => 'height:{{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();// end: Section
		
	}

	/**
	 * Render Parallax Video widget output on the frontend.
	 * Written in PHP and used to generate the final HTML.
	*/
	protected function render() {
		$settings = $this->get_settings_for_display();
		// Parallax Video
		$video_style = !empty( $settings['video_style'] ) ? $settings['video_style'] : '';	
		$play_title = !empty( $settings['play_title'] ) ? $settings['play_title'] : '';
		$left_title = !empty( $settings['left_title'] ) ? $settings['left_title'] : '';	
		$right_title = !empty( $settings['right_title'] ) ? $settings['right_title'] : '';	
		$video_link = !empty( $settings['video_link'] ) ? $settings['video_link'] : '';	
		$disable_parallax  = ( isset( $settings['disable_parallax'] ) && ( 'true' == $settings['disable_parallax'] ) ) ? true : false;
		$image_url = wp_get_attachment_url( $settings['bg_image']['id'] );

		$left_title = $left_title ? $left_title : '';
		$right_title = $right_title ? $right_title : '';
		$play_title = $play_title ? '<span class="play-title">'.$play_title.'</span>' : '';

		if($disable_parallax) {
			$para_cls = '';
		} else {
			$para_cls = ' segva-parallax';
		}

		if($video_style === 'style-two') {
			$style_cls = ' pop-video-style-two';
		} else {
			$style_cls = '';
		}

		// Turn output buffer on
		ob_start(); 
		if($video_style === 'style-two') { ?>
		<div class="segva-video segva-overlay <?php echo esc_attr($para_cls.$style_cls); ?>" style="background-image: url(<?php echo $image_url; ?>);" data-target="#SegoviaVideoModal" data-src="<?php echo $video_link; ?>" data-toggle="modal">
		 	<div class="segva-table-wrap">
        <div class="segva-align-wrap">
		  		<div class="container">
		  			<a href="#0" class="video-btn"><?php echo $play_title; ?><i class="fa fa-play" aria-hidden="true"></i><span class="segva-ripple"></span></a>
		  		</div>
		  	</div>		
		  </div>
		</div>
		<?php } else { ?>
		<div class="segva-video segva-overlay <?php echo esc_attr($para_cls.$style_cls); ?>" style="background-image: url(<?php echo $image_url; ?>);">
			<div class="segva-table-wrap">
        <div class="segva-align-wrap">
		  		<div class="container">
					  <?php if($left_title || $right_title) { ?>
					    <h2 class="video-title">
					      <?php echo $left_title; ?> <a href="#0" class="video-btn" data-toggle="modal" data-src="<?php echo $video_link; ?>" data-target="#SegoviaVideoModal"><i class="fa fa-play" aria-hidden="true"></i></a> <?php echo $right_title; ?>
					    </h2>
					  <?php } else { ?>
					  	<a href="#0" class="video-btn" data-toggle="modal" data-src="<?php echo $video_link; ?>" data-target="#SegoviaVideoModal"><i class="fa fa-play" aria-hidden="true"></i></a>
					  <?php } ?>
					</div>
				</div>
		  </div>
		</div>
		<?php }
		// Return outbut buffer
		echo ob_get_clean();
				
	}

	/**
	 * Render Parallax Video widget output in the editor.
	 * Written as a Backbone JavaScript template and used to generate the live preview.
	*/
	 
	//protected function _content_template(){}
	
}
Plugin::instance()->widgets_manager->register_widget_type( new Segovia_Parallax_Video() );
