<?php
/*
 * All CSS and JS files are enqueued from this file
 * Author & Copyright: VictorThemes
 * URL: https://victorthemes.com/wp-themes
 */

/**
 * Enqueue Files for FrontEnd
 */
if ( ! function_exists( 'segovia_vt_scripts_styles' ) ) {
  function segovia_vt_scripts_styles() {

    // Styles
    wp_enqueue_style( 'font-awesome', SEGOVIA_CSS . '/font-awesome.min.css', array(), '4.7.0', 'all'  );
    wp_enqueue_style( 'bootstrap', SEGOVIA_CSS .'/bootstrap.min.css', array(), '4.1.3', 'all' );
    wp_enqueue_style( 'owl-carousel', SEGOVIA_CSS .'/owl.carousel.min.css', array(), '2.4', 'all' );
    wp_enqueue_style( 'animate', SEGOVIA_CSS .'/animate.min.css', array(), '3.5.1', 'all' );
    wp_enqueue_style( 'nice-select', SEGOVIA_CSS .'/nice-select.min.css', array(), SEGOVIA_VERSION, 'all' );
    wp_enqueue_style( 'themify-icons', SEGOVIA_CSS .'/themify-icons.min.css', array(), SEGOVIA_VERSION, 'all' );
    wp_enqueue_style( 'linea', SEGOVIA_CSS .'/linea.min.css', array(), SEGOVIA_VERSION, 'all' );
    wp_enqueue_style( 'magnific-popup', SEGOVIA_CSS .'/magnific-popup.min.css', array(), SEGOVIA_VERSION, 'all' );
    wp_enqueue_style( 'swiper', SEGOVIA_CSS .'/swiper.min.css', array(), '3.4.0', 'all' );
    wp_enqueue_style( 'meanmenu', SEGOVIA_CSS .'/meanmenu.css', array(), '2.0.7', 'all' );
    wp_enqueue_style( 'segovia-styles', SEGOVIA_CSS .'/styles.css', array(), SEGOVIA_VERSION, 'all' );


    wp_enqueue_style( 'segovia-google-font', '//fonts.googleapis.com/css?family=DM+Sans%3A300%2C400%2C500%2C600%2C600i%2C700%2C700i%2C800%2C900%7CPlayfair+Display%3A300%2C400%2C500%2C600%2C600i%2C700%2C700i%2C800%2C900%7CBarlow+Condensed%3A300%2C400%2C500%2C600%2C600i%2C700%2C700i%2C800%2C900&#038;subset=latin', array(), SEGOVIA_VERSION, 'all' );

    // Scripts
    wp_enqueue_script( 'bootstrap', SEGOVIA_SCRIPTS . '/bootstrap.min.js', array( 'jquery' ), '4.1.3', true );
    wp_enqueue_script( 'html5shiv', SEGOVIA_SCRIPTS . '/html5shiv.min.js', array( 'jquery' ), '3.7.0', true );
    wp_enqueue_script( 'jquery-nice-select', SEGOVIA_SCRIPTS . '/jquery.nice-select.min.js', array( 'jquery' ), '1.0', true );
    wp_enqueue_script( 'respond', SEGOVIA_SCRIPTS . '/respond.min.js', array( 'jquery' ), '1.4.2', true );
    wp_enqueue_script( 'placeholders', SEGOVIA_SCRIPTS . '/placeholders.min.js', array( 'jquery' ), '4.0.1', true );
    wp_enqueue_script( 'jquery-sticky', SEGOVIA_SCRIPTS . '/jquery.sticky.min.js', array( 'jquery' ), '1.0.6', true );
    wp_enqueue_script( 'jquery-matchheight', SEGOVIA_SCRIPTS . '/jquery.matchHeight-min.js', array( 'jquery' ), '0.7.2', true );
    wp_enqueue_script( 'theia-sticky-sidebar', SEGOVIA_SCRIPTS . '/theia-sticky-sidebar.min.js', array( 'jquery' ), '1.5.0', true );
    wp_enqueue_script( 'isotope', SEGOVIA_SCRIPTS . '/isotope.min.js', array( 'jquery' ), '3.0.1', true );
    wp_enqueue_script( 'packery-mode-pkgd', SEGOVIA_SCRIPTS . '/packery-mode.pkgd.min.js', array( 'jquery' ), '2.0.0', true );
    wp_enqueue_script( 'owl-carousel', SEGOVIA_SCRIPTS . '/owl.carousel.min.js', array( 'jquery' ), '2.1.6', true );
    wp_enqueue_script( 'jarallax', SEGOVIA_SCRIPTS . '/jarallax.min.js', array( 'jquery' ), '1.7.3', true );
    wp_enqueue_script( 'jquery-magnific-popup', SEGOVIA_SCRIPTS . '/jquery.magnific-popup.min.js', array( 'jquery' ), '1.1.0', true );
    wp_enqueue_script( 'waypoints', SEGOVIA_SCRIPTS . '/waypoints.min.js', array( 'jquery' ), '1.6.2', true );
    wp_enqueue_script( 'jquery-circle-progress', SEGOVIA_SCRIPTS . '/jquery.circle-progress.min.js', array( 'jquery' ), '1.2.1', true );
    wp_enqueue_script( 'jquery-counterup', SEGOVIA_SCRIPTS . '/jquery.counterup.min.js', array( 'jquery' ), '1.0', true );
    wp_enqueue_script( 'jquery-countdown', SEGOVIA_SCRIPTS . '/jquery-countdown.min.js', array( 'jquery' ), '1.6.2', true );
    wp_enqueue_script( 'typed', SEGOVIA_SCRIPTS . '/typed.min.js', array( 'jquery' ), SEGOVIA_VERSION, true );
    wp_enqueue_script( 'jquery-meanmenu', SEGOVIA_SCRIPTS . '/jquery.meanmenu.js', array( 'jquery' ), SEGOVIA_VERSION, true );
    wp_enqueue_script( 'swiper-jquery', SEGOVIA_SCRIPTS . '/swiper.min.js', array( 'jquery' ), '5.3.6', true );
    wp_enqueue_script( 'depreloader', SEGOVIA_SCRIPTS . '/depreloader.min.js', array( 'jquery' ), SEGOVIA_VERSION, true );
    wp_enqueue_script( 'segovia-scripts', SEGOVIA_SCRIPTS . '/scripts.js', array( 'jquery' ), SEGOVIA_VERSION, true );

    // Comments
    wp_enqueue_script( 'segovia-validate', SEGOVIA_SCRIPTS . '/jquery.validate.min.js', array( 'jquery' ), '1.9.0', true );
    wp_add_inline_script( 'segovia-validate', 'jQuery(document).ready(function($) {$("#commentform").validate({rules: {author: {required: true,minlength: 2},email: {required: true,email: true},comment: {required: true,minlength: 10}}});});' );
    // Dynamic Styles -
     wp_enqueue_style( 'dynamic-style', SEGOVIA_THEMEROOT_URI . '/inc/dynamic-style.php', array(), SEGOVIA_VERSION, 'all' );

    // Responsive Active
    wp_enqueue_style( 'segovia-responsive', SEGOVIA_CSS .'/responsive.css', array(), SEGOVIA_VERSION, 'all' );

    // Adds support for pages with threaded comments
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
      wp_enqueue_script( 'comment-reply' );
    }

  }
  add_action( 'wp_enqueue_scripts', 'segovia_vt_scripts_styles' );
}

/**
 * Enqueue Files for BackEnd
 */
if ( ! function_exists( 'segovia_vt_admin_scripts_styles' ) ) {
  function segovia_vt_admin_scripts_styles() {

    wp_enqueue_style( 'segovia-admin-main', SEGOVIA_CSS . '/admin-styles.css', true );
    wp_enqueue_script( 'segovia-admin-scripts', SEGOVIA_SCRIPTS . '/admin-scripts.js', true );
    wp_enqueue_style( 'themify-icons', SEGOVIA_CSS .'/themify-icons.min.css', array(), SEGOVIA_VERSION, 'all' );
    wp_enqueue_style( 'linea', SEGOVIA_CSS .'/linea.min.css', array(), SEGOVIA_VERSION, 'all' );

  }
  add_action( 'admin_enqueue_scripts', 'segovia_vt_admin_scripts_styles' );
}

/* Enqueue All Styles */
if ( ! function_exists( 'segovia_vt_wp_enqueue_styles' ) ) {
  function segovia_vt_wp_enqueue_styles() {
    segovia_vt_google_fonts();
  }
  add_action( 'wp_enqueue_scripts', 'segovia_vt_wp_enqueue_styles' );
}

/**
 * Apply theme's stylesheet to the visual editor.
 *
 * @uses add_editor_style() Links a stylesheet to visual editor
 * @uses get_stylesheet_uri() Returns URI of theme stylesheet
 */
function segovia_add_editor_styles() {
  add_editor_style( get_stylesheet_uri() );
}
add_action( 'init', 'segovia_add_editor_styles' );
