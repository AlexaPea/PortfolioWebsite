<?php
/* ==========================================================
  Accordion
=========================================================== */
if( ! function_exists( 'segovia_vt_accordion_function' ) ) {
  function segovia_vt_accordion_function( $atts, $content = '', $key = '' ) {

    global $vt_accordion_tabs;
    $vt_accordion_tabs = array();

    extract( shortcode_atts( array(
      'accordion_style' => '',
      'id'            => '',
      'class'         => '',
      'tick_image'    => '',
      'one_active'    => '',
      'active_tab'    => 0,
      'title_size'    => '',
      'title_color' => '',
      'title_bg_color'    => '',
      'tgl_btn_color' =>'',

      'active_title_color' =>'',
      'active_title_bg_color' =>'',
      'active_toggle_color' =>'',
    ), $atts ) );

    do_shortcode( $content );

    $image_url = wp_get_attachment_url( $tick_image );

    // is not empty clients
    if( empty( $vt_accordion_tabs ) ) { return; }

    $id          = ( $id ) ? ' id="'. $id .'"' : '';
    $class       = ( $class ) ? ' '. $class : '';
    $one_active  = ( $one_active ) ? ' collapse-others' : '';
    $uniqtab     = uniqid();


    // Shortcode Style CSS
    $inline_style  = '';
     // Title Color
    if ( $title_size ) {
      $inline_style .= '.faq-wrap.segva-acc-'. $uniqtab .' .accordion-title .btn-link {';
      $inline_style .= ( $title_size ) ? 'font-size:'. segovia_core_check_px($title_size) .';' : '';
      $inline_style .= '}';
    }
    // Title Color
    if ( $title_color || $title_bg_color) {
      $inline_style .= '.faq-wrap.segva-acc-'. $uniqtab .' .accordion-title .btn-link.collapsed {';
      $inline_style .= ( $title_color  ) ? 'color:'. $title_color .';' : '';
      $inline_style .= ( $title_bg_color  ) ? 'background-color:'. $title_bg_color .';' : '';
      $inline_style .= '}';
    }
    // Toggle Button Color
    if ( $tgl_btn_color ) {
      $inline_style .= '.faq-wrap.segva-acc-'. $uniqtab .' .accordion-title .btn-link.collapsed:after, .faq-wrap.segva-acc-'. $uniqtab .' .accordion-title .btn-link.collapsed:before {';
      $inline_style .= ( $tgl_btn_color  ) ? 'background:'. $tgl_btn_color .';' : '';
      $inline_style .= '}';
    }
    // Active Title Color
    if ( $title_size || $active_title_color || $active_title_bg_color) {
      $inline_style .= '.faq-wrap.segva-acc-'. $uniqtab .' .accordion-title .btn-link {';
      $inline_style .= ( $active_title_color  ) ? 'color:'. $active_title_color .';' : '';
      $inline_style .= ( $active_title_bg_color  ) ? 'background-color:'. $active_title_bg_color .';' : '';
      $inline_style .= '}';
    }
     // Toggle Button Color
    if ( $active_toggle_color ) {
      $inline_style .= '.faq-wrap.segva-acc-'. $uniqtab .' .accordion-title .btn-link:after, .faq-wrap.segva-acc-'. $uniqtab .' .accordion-title .btn-link:before {';
      $inline_style .= ( $active_toggle_color  ) ? 'background:'. $active_toggle_color .';' : '';
      $inline_style .= '}';
    }
    
    // add inline style
    add_inline_style( $inline_style );
    $styled_class  = ' segva-acc-'. $uniqtab;


    // begin output
    $output = '';
      if( !empty( $vt_accordion_tabs ) && is_array( $vt_accordion_tabs ) ){

        $output .= '<div'. $id .' class="faq-wrap '.$styled_class.'" ><div id="accordion" class="accordion '.$one_active.''.$class.'">';

       
        foreach ( $vt_accordion_tabs as $key => $tab ) {

        $collapsed  = ( ( $key + 1 ) == $active_tab ) ? ' in' : 'collapsed';
        $opened    = ( ( $key + 1 ) == $active_tab ) ? ' in show' : '';
        $active_cls    = ( ( $key + 1 ) == $active_tab ) ? ' active' : '';
        $uniqtab     = uniqid();


          $output .= '<div class="card'.$opened.'">
                        <div class="card-header" id="headingOne'. esc_attr($key.$uniqtab) .'">
                          <h4 class="accordion-title '.$active_cls.'">
                            <button class="btn btn-link '.$collapsed.'" data-toggle="collapse" data-target="#segvaAcc-'. esc_attr($key.$uniqtab) .'" aria-expanded="true" aria-controls="segvaAcc-'. esc_attr($key.$uniqtab) .'">
                              '.$tab['atts']['title']  .'
                            </button>
                          </h4>
                        </div>
                        <div id="segvaAcc-'. esc_attr($key.$uniqtab) .'" class="collapse '. $opened .'" data-parent="#accordion">
                          <div class="card-body">
                            '. do_shortcode( $tab['content'] ) . '
                          </div>
                        </div>
                      </div>';
      
        }

        $output .= '</div></div>';
      }
    // end output
    return $output;
  }
  add_shortcode( 'vc_accordion', 'segovia_vt_accordion_function' );
}

/**
 *
 * Accordion Shortcode
 * @since 1.0.0
 * @version 1.1.0
 *
 */
if( ! function_exists( 'segovia_vt_accordionn_tab' ) ) {
  function segovia_vt_accordionn_tab( $atts, $content = '', $key = '' ) {
    global $vt_accordion_tabs;
    $vt_accordion_tabs[]  = array( 'atts' => $atts, 'content' => $content );
    return;
  }
  add_shortcode( 'vc_accordion_tab', 'segovia_vt_accordionn_tab' );
}
