<?php
/*
 * Elementor Segovia Countown Widget
 * Author & Copyright: VictorTheme
*/

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Segovia_Countdown extends Widget_Base{

	/**
	 * Retrieve the widget name.
	*/
	public function get_name(){
		return 'vt-segovia_countdown';
	}

	/**
	 * Retrieve the widget title.
	*/
	public function get_title(){
		return esc_html__( 'Countdown', 'segovia-core' );
	}

	/**
	 * Retrieve the widget icon.
	*/
	public function get_icon() {
		return 'fa fa-clock-o';
	}

	/**
	 * Retrieve the list of categories the widget belongs to.
	*/
	public function get_categories() {
		return ['victortheme-category'];
	}

	/**
	 * Retrieve the list of scripts the Segovia Section Title widget depended on.
	 * Used to set scripts dependencies required to run the widget.
	*/
	/*
	public function get_script_depends() {
		return ['vt-segovia_countdown'];
	}
	*/
	
	/**
	 * Register Segovia Section Title widget controls.
	 * Adds different input fields to allow the user to change and customize the widget settings.
	*/
	protected function _register_controls(){
		
		$this->start_controls_section(
			'countdown_date',
			[
				'label' => esc_html__( 'Settings', 'segovia-core' ),
			]
		);
		$this->add_control(
			'count_type',
			[
				'label' => __( 'Countdown Type', 'segovia-core' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'static' => esc_html__( 'Static Date', 'segovia-core' ),
					'fake'    => esc_html__('Fake Date', 'segovia-core'),
				],
				'default' => 'static',
				'description' => esc_html__( 'Select your countdown date type.', 'segovia-core' ),
			]
		);
		$this->add_control(
			'count_date',
			[
				'label' => esc_html__( 'Date', 'segovia-core' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => esc_html__( 'mm/dd/yyyy', 'segovia-core' ),
				'placeholder' => esc_html__( 'Type your date here', 'segovia-core' ),
				'description' => esc_html__( 'Enter your date in month/day/year format.', 'segovia-core' ),
				'condition' => [
					'count_type' => 'static',
				],
			]
		);
		$this->add_control(
			'count_date_time',
			[
				'label' => esc_html__( 'Time', 'segovia-core' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => esc_html__( 'hh:mm:ss', 'segovia-core' ),
				'placeholder' => esc_html__( 'Type your date here', 'segovia-core' ),
				'description' => esc_html__( 'Enter your date in hours:minutes:seconds format.', 'segovia-core' ),
				'condition' => [
					'count_type' => 'static',
				],
			]
		);

		$this->add_control(
			'fake_date',
			[
				'label' => esc_html__( 'Fake Date', 'segovia-core' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => esc_html__( '3', 'segovia-core' ),
				'description' => esc_html__( 'Enter your fake day count here. Ex: 2 or 3(in days)', 'segovia-core' ),
				'condition' => [
					'count_type' => 'fake',
				],
			]
		);
		$this->add_control(
			'count_icon_image',
			[
				'label' => esc_html__( 'Top Image', 'segovia-core' ),
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
				
			]
		);
		$this->add_control(
			'count_content',
			[
				'label' => esc_html__( 'Content', 'segovia-core' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => esc_html__( 'This is Content text', 'segovia-core' ),
				'placeholder' => esc_html__( 'Type your content text here', 'segovia-core' ),
			]
		);

		$this->add_responsive_control(
			'section_max_width',
			[
				'label' => esc_html__( 'Width', 'segovia-core' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000,
						'step' => 2,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .segva-sectCountdownElementor' => 'max-width: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'countdown_format',
			[
				'label' => esc_html__( 'Countdown Format', 'segovia-core' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => esc_html__( 'dHMS', 'segovia-core' ),

			]
		);
		$this->add_control(
			'count_format',
			[
				'type' => Controls_Manager::RAW_HTML,
				'raw' => '<div class="elementor-control-raw-html elementor-panel-alert elementor-panel-alert-warning"><b>For Countdown Format Reference:<a href="http://keith-wood.name/countdown.html">Click Here</a></b></div>',
			]
		);
		$this->end_controls_section();// end: Section

		$this->start_controls_section(
			'countdown_labels',
			[
				'label' => esc_html__( 'Countdown Labels', 'segovia-core' ),
			]
		);
		$this->add_control(
			'plural_labels',
			[
				'type' => Controls_Manager::RAW_HTML,
				'raw' => '<div class="elementor-control-raw-html elementor-panel-alert elementor-panel-alert-warning"><b>Plural Labels</b></div>',
			]
		);

		$this->add_control(
			'label_years',
			[
				'label' => esc_html__( 'Years Text', 'segovia-core' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => esc_html__( 'years', 'segovia-core' ),
			]
		);
		$this->add_control(
			'label_months',
			[
				'label' => esc_html__( 'Months Text', 'segovia-core' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => esc_html__( 'months', 'segovia-core' ),
			]
		);
		$this->add_control(
			'label_weeks',
			[
				'label' => esc_html__( 'Weeks Text', 'segovia-core' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => esc_html__( 'weeks', 'segovia-core' ),
			]
		);
		$this->add_control(
			'label_days',
			[
				'label' => esc_html__( 'Days Text', 'segovia-core' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => esc_html__( 'days', 'segovia-core' ),
			]
		);
		$this->add_control(
			'label_hours',
			[
				'label' => esc_html__( 'Hours Text', 'segovia-core' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => esc_html__( 'hours', 'segovia-core' ),
			]
		);
		$this->add_control(
			'label_minutes',
			[
				'label' => esc_html__( 'Minutes Text', 'segovia-core' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => esc_html__( 'minutes', 'segovia-core' ),
			]
		);
		$this->add_control(
			'label_seconds',
			[
				'label' => esc_html__( 'Seconds Text', 'segovia-core' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => esc_html__( 'seconds', 'segovia-core' ),
			]
		);

		$this->add_control(
			'singular_label',
			[
				'type' => Controls_Manager::RAW_HTML,
				'raw' => '<div class="elementor-control-raw-html elementor-panel-alert elementor-panel-alert-warning"><b>Singular Labels</b></div>',
			]
		);

		$this->add_control(
			'label_year',
			[
				'label' => esc_html__( 'Year Text', 'segovia-core' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => esc_html__( 'year', 'segovia-core' ),
			]
		);
		$this->add_control(
			'label_month',
			[
				'label' => esc_html__( 'Month Text', 'segovia-core' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => esc_html__( 'month', 'segovia-core' ),
			]
		);
		$this->add_control(
			'label_week',
			[
				'label' => esc_html__( 'Week Text', 'segovia-core' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => esc_html__( 'week', 'segovia-core' ),
			]
		);
		$this->add_control(
			'label_day',
			[
				'label' => esc_html__( 'Day Text', 'segovia-core' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => esc_html__( 'day', 'segovia-core' ),
			]
		);
		$this->add_control(
			'label_hour',
			[
				'label' => esc_html__( 'Hour Text', 'segovia-core' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => esc_html__( 'hour', 'segovia-core' ),
			]
		);
		$this->add_control(
			'label_minute',
			[
				'label' => esc_html__( 'Minute Text', 'segovia-core' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => esc_html__( 'minute', 'segovia-core' ),
			]
		);
		$this->add_control(
			'label_second',
			[
				'label' => esc_html__( 'Second Text', 'segovia-core' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => esc_html__( 'second', 'segovia-core' ),
			]
		);
		$this->end_controls_section();// end: Section


		// Value
		$this->start_controls_section(
			'section_value_style',
			[
				'label' => esc_html__( 'Countdown Value', 'segovia-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'value_typography',				
				'selector' => '{{WRAPPER}} .segva-sectCountdownElementor .countdown_section .countdown_amount',
			]
		);
		$this->add_control(
			'value_color',
			[
				'label' => esc_html__( 'Value Color', 'segovia-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .segva-sectCountdownElementor .countdown_section .countdown_amount' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'value_bg_color',
			[
				'label' => esc_html__( 'Value Background Color', 'segovia-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .segva-sectCountdownElementor .countdown_section' => 'background: {{VALUE}};',
				],
			]
		);
		$this->end_controls_section();// end: Section

		// Title
		$this->start_controls_section(
			'section_title_style',
			[
				'label' => esc_html__( 'Countdown Title', 'segovia-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'selector' => '{{WRAPPER}} .segva-sectCountdownElementor .countdown_section',
			]
		);
		$this->add_control(
			'title_color',
			[
				'label' => esc_html__( 'Color', 'segovia-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .segva-sectCountdownElementor .countdown_section' => 'color: {{VALUE}};',
				],
			]
		);
		$this->end_controls_section();// end: Section


		// Content
		$this->start_controls_section(
			'section_content_style',
			[
				'label' => esc_html__( 'Countdown Section Title', 'segovia-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'content_typography',
				'selector' => '{{WRAPPER}} .segva-sectCountdownElementor .missing-days h3',
			]
		);
		$this->add_control(
			'content_color',
			[
				'label' => esc_html__( 'Content Color', 'segovia-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .segva-sectCountdownElementor .missing-days h3' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'content_hiphen_color',
			[
				'label' => esc_html__( 'Content Hiphen Color', 'segovia-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .segva-sectCountdownElementor h3.missing-title:before, {{WRAPPER}} .segva-sectCountdownElementor h3.missing-title:after' => 'background-color: {{VALUE}};',
				],
			]
		);
		$this->end_controls_section();// end: Section
				
	}

	/**
	 * Render Section Title widget output on the frontend.
	 * Written in PHP and used to generate the final HTML.
	*/
	protected function render() {
		$settings = $this->get_settings_for_display();
		$count_type = !empty( $settings['count_type'] ) ? $settings['count_type'] : '';
		$count_date = !empty( $settings['count_date'] ) ? $settings['count_date'] : '';
		$count_date_time = !empty( $settings['count_date_time'] ) ? $settings['count_date_time'] : '';
		$fake_date = !empty( $settings['fake_date'] ) ? $settings['fake_date'] : '';
		$event_date = !empty( $settings['event_date'] ) ? $settings['event_date'] : '';
		$count_content = !empty( $settings['count_content'] ) ? $settings['count_content'] : '';
		$countdown_format = !empty( $settings['countdown_format'] ) ? $settings['countdown_format'] : '';
		$image_url = wp_get_attachment_url( $settings['count_icon_image']['id'] );

		// Labels Plural
		$label_years = !empty( $settings['label_years'] ) ? $settings['label_years'] : '';
		$label_months = !empty( $settings['label_months'] ) ? $settings['label_months'] : '';
		$label_weeks = !empty( $settings['label_weeks'] ) ? $settings['label_weeks'] : '';
		$label_days = !empty( $settings['label_days'] ) ? $settings['label_days'] : '';
		$label_hours = !empty( $settings['label_hours'] ) ? $settings['label_hours'] : '';
		$label_minutes = !empty( $settings['label_minutes'] ) ? $settings['label_minutes'] : '';
		$label_seconds = !empty( $settings['label_seconds'] ) ? $settings['label_seconds'] : '';

		$label_years = $label_years ? $label_years : esc_html__('Years','segovia-core');
		$label_months = $label_months ? $label_months : esc_html__('Months','segovia-core');
		$label_weeks = $label_weeks ? $label_weeks : esc_html__('Weeks','segovia-core');
		$label_days = $label_days ? $label_days : esc_html__('Days','segovia-core');
		$label_hours = $label_hours ? $label_hours : esc_html__('Hours','segovia-core');
		$label_minutes = $label_minutes ? $label_minutes : esc_html__('Minutes','segovia-core');
		$label_seconds = $label_seconds ? $label_seconds : esc_html__('Seconds','segovia-core');

		// Labels Singular
		$label_year = !empty( $settings['label_year'] ) ? $settings['label_year'] : '';
		$label_month = !empty( $settings['label_month'] ) ? $settings['label_month'] : '';
		$label_week = !empty( $settings['label_week'] ) ? $settings['label_week'] : '';
		$label_day = !empty( $settings['label_day'] ) ? $settings['label_day'] : '';
		$label_hour = !empty( $settings['label_hour'] ) ? $settings['label_hour'] : '';
		$label_minute = !empty( $settings['label_minute'] ) ? $settings['label_minute'] : '';
		$label_second = !empty( $settings['label_second'] ) ? $settings['label_second'] : '';

		$label_year = $label_year ? $label_year : esc_html__('Year','segovia-core');
		$label_month = $label_month ? $label_month : esc_html__('Month','segovia-core');
		$label_week = $label_week ? $label_week : esc_html__('Week','segovia-core');
		$label_day = $label_day ? $label_day : esc_html__('Day','segovia-core');
		$label_hour = $label_hour ? $label_hour : esc_html__('Hour','segovia-core');
		$label_minute = $label_minute ? $label_minute : esc_html__('Minute','segovia-core');
		$label_second = $label_second ? $label_second : esc_html__('Second','segovia-core');

		$countdown_format = $countdown_format ? $countdown_format : '';

		if($count_type === 'fake') {
			$count_date_actual = $fake_date;
		} else {
			$count_date_actual = $count_date.' '.$count_date_time;
		}

		$image_main = $image_url ? '<div class="segva-icon"><img src="'. $image_url .'" width="122" alt="'.esc_attr($count_content).'"></div>' : '';
		$countdown_content = $count_content ? '<h3 class="missing-title">'.$count_content.'</h3>' : '';
		$styled_class  = ' segva-sectCountdownElementor ';

		$output = '';
		$output .= '<div class="segva-married-countdown '.$styled_class.'"><div class="container">
		 		<div class="missing-days">
          '.$image_main.'
          '.$countdown_content.'
        </div>
        <div class="countdown-wrap">
          <div class="segva-countdown '.$count_type.'" data-date="'.$count_date_actual.'" data-years="'.$label_years.'" data-months="'.$label_months.'" data-weeks="'.$label_weeks.'" data-days="'.$label_days.'" data-hours="'.$label_hours.'" data-minutes="'.$label_minutes.'" data-seconds="'.$label_seconds.'" data-year="'.$label_year.'" data-month="'.$label_month.'" data-week="'.$label_week.'" data-day="'.$label_day.'" data-hour="'.$label_hour.'" data-minute="'.$label_minute.'" data-second="'.$label_second.'" data-format="'.$countdown_format.'"><div class="clearfix"></div></div>
        </div>
       
      </div>
    </div>';

		echo $output;
		
	}

	/**
	 * Render Section Title widget output in the editor.
	 * Written as a Backbone JavaScript template and used to generate the live preview.
	*/
	
	//protected function _content_template(){}
	
}
Plugin::instance()->widgets_manager->register_widget_type( new Segovia_Countdown() );
