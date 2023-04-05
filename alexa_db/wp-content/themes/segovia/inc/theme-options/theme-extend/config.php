<?php
/*
 * Codestar Framework Config
 * Author & Copyright: VictorThemes
 * URL: https://victorthemes.com/wp-themes
 */

/**
 * Integrate - Codestar Framework
 */
require SEGOVIA_FRAMEWORK .'/theme-options/theme-options.php';
require SEGOVIA_FRAMEWORK .'/theme-options/theme-customizer.php';

/**
 * Codestar Framework - Changing Override Folder Path
 */
function segovia_vt_cs_framework_override() {
  return 'inc/theme-options/theme-extend';
}
add_filter( 'cs_framework_override', 'segovia_vt_cs_framework_override' );

/**
 * Custom New Font Family
 */
if( ! function_exists( 'segovia_vt_custom_font_upload' ) ) {
  function segovia_vt_custom_font_upload( $db_value ) {

    $fonts = cs_get_option( 'font_family' );

    if ( ! empty( $fonts ) ) {

      echo '<optgroup label="Your Custom Fonts">';
      foreach ( $fonts as $key => $value ) {
        echo '<option value="'. $value['name'] .'" data-type="customfonts"'. selected( $value['name'], $db_value, true ) .'>'. $value['name'] .'</option>';
      }
      echo '</optgroup>';

    }

  }
  add_action( 'cs_typography_family', 'segovia_vt_custom_font_upload' );
}

/**
 * Check Custom Font
 */
if ( ! function_exists( 'segovia_vt_custom_upload_font' ) ) {
  function segovia_vt_custom_upload_font( $font ) {

    $fonts  = cs_get_option( 'font_family' );
    $custom = array();

    if( ! empty( $fonts ) ) {
      foreach ( $fonts as $custom_font ) {
        $custom[] = $custom_font['name'];
      }
    }

    return ( ! empty( $font ) && ! empty( $custom ) && in_array( $font, $custom ) ) ? true : false;

  }
}

function segovia_vt_add_icons_json( $json = array() ) {
  $json[] = SEGOVIA_CS_FRAMEWORK .'/fields/icon/linea.json';
  return $json;
}
add_filter( 'cs_add_icons_json', 'segovia_vt_add_icons_json' );

function segovia_vt_add_themify_json( $json = array() ) {
  $json[] = SEGOVIA_CS_FRAMEWORK .'/fields/icon/themify.json';
  return $json;
}
add_filter( 'cs_add_icons_json', 'segovia_vt_add_themify_json' );

/**
 * Get Registered Sidebars
 */
if ( ! function_exists( 'segovia_vt_registered_sidebars' ) ) {
  function segovia_vt_registered_sidebars() {

    global $wp_registered_sidebars;
    $widgets = array();

    if( ! empty( $wp_registered_sidebars ) ) {
      foreach ( $wp_registered_sidebars as $key => $value ) {
        $widgets[$key] = $value['name'];
      }
    }

    return array_reverse( $widgets );

  }
}

/**
 * Enqueue Google Fonts
 */
if ( ! function_exists( 'segovia_vt_google_fonts' ) ) {
  function segovia_vt_google_fonts() {

    $embed_fonts  = array();
    $query_args   = array();
    $subsets      = cs_get_option( 'subsets' );
    $subsets      = ( ! empty( $subsets ) ) ? '&subset=' . implode( ',', $subsets ) : '';
    $font_weight  = cs_get_option( 'font_weight' );
    $font_weight  = ( ! empty( $font_weight ) ) ? ':' . implode( ',', $font_weight ) : '';
    $typography   = cs_get_option( 'typography' );

    if ( empty( $typography ) ) { return; }

    foreach ( $typography as $font ) {
      if ( ! empty( $font['selector'] ) ) {
        if( $font['font']['family'] ) {
          $family  = $font['font']['family'];
          $variant = ( $font['font']['variant'] != 'regular' ) ? $font['font']['variant'] : 400;
          $embed_fonts[$family]['variant'][$variant] = $variant;
        }
      }
    }

    if ( ! empty( $embed_fonts ) ) {
      foreach ( $embed_fonts as $name => $font ) {
        $query_args[] = $name . $font_weight;
      }
      wp_enqueue_style( 'segovia-google-fonts', esc_url( add_query_arg( 'family', urlencode( implode( '|', $query_args ) ) . $subsets, '//fonts.googleapis.com/css' ) ), array(), null );
    }

  }
}

/* Typography */
if ( ! function_exists( 'segovia_vt_get_typography' ) ) {
  function segovia_vt_get_typography() {

    $typography = cs_get_option( 'typography' );
    $output     = '';

    if ( ! empty( $typography ) ) {
      foreach ( $typography as $font ) {
        if ( ! empty( $font['selector'] ) ) {

          $weight  = ( $font['font']['variant'] != 'regular' ) ? segovia_vt_esc_string( $font['font']['variant'] ) : 400;
          $style   = segovia_vt_esc_number( $font['font']['variant'] );
          $style   = ( $style && $style != 'regular' ) ? $style : 'normal';
          $family  = ( $font['font']['family'] ) ? '"'. $font['font']['family'] .'", sans-serif' : $font['font']['family'];

          $output .= $font['selector'] . '{';
          $output .= 'font-family: '. $family .';';
          $output .= ( ! empty( $font['size'] ) ) ? 'font-size: '. segovia_check_px( $font['size'] ) .';' : '';
          $output .= ( ! empty( $font['line_height'] ) ) ? 'line-height: '. $font['line_height'] .';' : '';
          $output .= 'font-style: '. $style .';';
          // $output .= 'font-weight: '. $weight .';';
          $output .= ( ! empty( $font['css'] ) ) ? $font['css'] : '';
          $output .= '}';

        }
      }
    }

    return $output;

  }
}
