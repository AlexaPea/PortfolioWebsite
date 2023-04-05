<?php
/* ==========================================================
  Services
=========================================================== */
if ( !function_exists('segovia_countown_function')) {
  function segovia_countown_function( $atts, $content = true ) {

    extract(shortcode_atts(array(
      'count_type'  => '',
      'count_date' =>'',
      'count_date_time' =>'',
      'fake_date' => '',
      'count_icon_image'  => '',
      'count_content' =>'',
      'countdown_format' =>'',
      // Labels
      'label_years' =>'',
      'label_months' =>'',
      'label_weeks' =>'',
      'label_days' =>'',
      'label_hours' =>'',
      'label_minutes' =>'',
      'label_seconds' =>'',

      // Singular Labels
      'label_year' =>'',
      'label_month' =>'',
      'label_week' =>'',
      'label_day' =>'',
      'label_hour' =>'',
      'label_minute' =>'',
      'label_second' =>'',

      'class'  => '',

      // Style
      'content_color'  => '',
      'content_size'  => '',
      'hiphen_color' =>'',
      'value_color'  => '',
      'value_size'  => '',
      'value_bg_color' =>'',
      'value_text_color' =>'',
      'value_text_size' => '',
    
    ), $atts));

    $e_uniqid     = uniqid();
    $inline_style = '';

    // Content
    if ( $content_size || $content_color ) {
      $inline_style .= '.segva-countown-'. $e_uniqid .' .missing-days .missing-title {';
      $inline_style .= ( $content_size ) ? 'font-size:'. segovia_core_check_px($content_size) .';' : '';
      $inline_style .= ( $content_color ) ? 'color:'. $content_color .';' : '';
      $inline_style .= '}';
    }
    // Hiphen Color
    if ( $hiphen_color ) {
      $inline_style .= '.segva-countown-'. $e_uniqid .' h3.missing-title:before, .segva-countown-'. $e_uniqid .' h3.missing-title:after {';
      $inline_style .= ( $hiphen_color ) ? 'background-color:'. $hiphen_color .';' : '';
      $inline_style .= '}';
    }
    // Value
    if ( $value_size || $value_color ) {
      $inline_style .= '.segva-countown-'. $e_uniqid .' .countdown_section .countdown_amount {';
      $inline_style .= ( $value_size ) ? 'font-size:'. segovia_core_check_px($value_size) .';' : '';
      $inline_style .= ( $value_color ) ? 'color:'. $value_color .';' : '';
      $inline_style .= '}';
    }
     if ( $value_bg_color ) {
      $inline_style .= '.segva-countown-'. $e_uniqid .' .countdown_section {';
      $inline_style .= ( $value_bg_color ) ? 'background:'. $value_bg_color .';' : '';
      $inline_style .= '}';
    }
      if ( $value_text_size || $value_text_color ) {
      $inline_style .= '.segva-countown-'. $e_uniqid .' .countdown_section {';
      $inline_style .= ( $value_text_size ) ? 'font-size:'. segovia_core_check_px($value_text_size) .';' : '';
      $inline_style .= ( $value_text_color ) ? 'color:'. $value_text_color .';' : '';
      $inline_style .= '}';
    }
    // add inline style
    add_inline_style( $inline_style );
    $styled_class  = ' segva-countown-'. $e_uniqid;

    // Countown Image
    $image_url = wp_get_attachment_url( $count_icon_image );

    $countdown_format = $countdown_format ? $countdown_format : '';

    $label_years = $label_years ? $label_years : esc_html__('Years','segovia-core');
    $label_months = $label_months ? $label_months : esc_html__('Months','segovia-core');
    $label_weeks = $label_weeks ? $label_weeks : esc_html__('Weeks','segovia-core');
    $label_days = $label_days ? $label_days : esc_html__('Days','segovia-core');
    $label_hours = $label_hours ? $label_hours : esc_html__('Hours','segovia-core');
    $label_minutes = $label_minutes ? $label_minutes : esc_html__('Minutes','segovia-core');
    $label_seconds = $label_seconds ? $label_seconds : esc_html__('Seconds','segovia-core');


    $label_year = $label_year ? $label_year : esc_html__('Year','segovia-core');
    $label_month = $label_month ? $label_month : esc_html__('Month','segovia-core');
    $label_week = $label_week ? $label_week : esc_html__('Week','segovia-core');
    $label_day = $label_day ? $label_day : esc_html__('Day','segovia-core');
    $label_hour = $label_hour ? $label_hour : esc_html__('Hour','segovia-core');
    $label_minute = $label_minute ? $label_minute : esc_html__('Minute','segovia-core');
    $label_second = $label_second ? $label_second : esc_html__('Second','segovia-core');

    if($count_type === 'fake') {
      $count_date_actual = $fake_date;
      $count_class = ' fake';
    } else {
      $count_date_actual = $count_date.' '.$count_date_time;
       $count_class = 'static';
    }

    $image_main = $image_url ? '<div class="segva-icon"><img src="'. $image_url .'" width="122" alt="'.esc_attr($count_content).'"></div>' : '';
    $countdown_content = $count_content ? '<h3 class="missing-title">'.$count_content.'</h3>' : '';

    $output = '';
    $output .= '<div class="segva-married-countdown '.$styled_class.'"><div class="container">
        <div class="missing-days">
          '.$image_main.'
          '.$countdown_content.'
        </div>
        <div class="countdown-wrap">
          <div class="segva-countdown '.$count_type. $count_class.'" data-date="'.$count_date_actual.'" data-years="'.$label_years.'" data-months="'.$label_months.'" data-weeks="'.$label_weeks.'" data-days="'.$label_days.'" data-hours="'.$label_hours.'" data-minutes="'.$label_minutes.'" data-seconds="'.$label_seconds.'" data-year="'.$label_year.'" data-month="'.$label_month.'" data-week="'.$label_week.'" data-day="'.$label_day.'" data-hour="'.$label_hour.'" data-minute="'.$label_minute.'" data-second="'.$label_second.'" data-format="'.$countdown_format.'"><div class="clearfix"></div></div>
        </div>
       
      </div>
    </div>';

    return $output;
  }
}
add_shortcode( 'segva_countown', 'segovia_countown_function' );
