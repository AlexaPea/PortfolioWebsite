<?php
/*
 * The template for displaying 404 pages (not found).
 * Author & Copyright: VictorThemes
 * URL: https://victorthemes.com/wp-themes
 */

// Theme Options
$segovia_error_heading = cs_get_option('error_heading');
$segovia_error_page_content = cs_get_option('error_page_content');
$segovia_error_page_bg = cs_get_option('error_page_bg');
$segovia_error_btn_text = cs_get_option('error_btn_text');

$segovia_error_heading = ( $segovia_error_heading ) ? $segovia_error_heading : esc_html__( 'Page not found', 'segovia' );
$segovia_error_page_content = ( $segovia_error_page_content ) ? $segovia_error_page_content : esc_html__( 'Oops! The page you are looking for does not exist. It might have been moved or deleted.', 'segovia' );
$segovia_error_page_bg = ( $segovia_error_page_bg ) ? wp_get_attachment_url($segovia_error_page_bg) : esc_url(SEGOVIA_IMAGES) . '/404.png';
$segovia_error_btn_text = ( $segovia_error_btn_text ) ? $segovia_error_btn_text : esc_html__( 'Back To Homepage', 'segovia' );

get_header(); ?>

<!-- Content -->
<div class="segva-404-wrap">
  <div class="segva-table-wrap">
    <div class="segva-align-wrap">
      <div class="container">
        <div class="error-wrap">
        <img src="<?php echo esc_url($segovia_error_page_bg); ?>">
          <h1 class="error-title"><?php echo esc_html($segovia_error_heading); ?></h1>
          <p><?php echo esc_html($segovia_error_page_content); ?></p>
          <div class="segva-link-wrap"><a href="<?php echo esc_url(home_url( '/' )); ?>" class="segva-link"><?php echo esc_html($segovia_error_btn_text); ?></a></div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Content -->
<?php
get_footer();
