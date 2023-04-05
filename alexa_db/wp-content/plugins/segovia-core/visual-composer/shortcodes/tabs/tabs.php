<?php
/* ==========================================================
  Tabs
=========================================================== */
if( ! function_exists( 'segovia_vt_tabs_function' ) ) {
  function segovia_vt_tabs_function( $atts, $content = '', $key = '' ) {

    global $vt_tabs;
    $vt_tabs = array();

    extract( shortcode_atts( array(
      'tab_title' => '',
      'tab_content' => '',
      'id'        => '',
      'class'     => '',
      'active'    => 0,

     'tab_section_title_color' =>'',
     'tab_section_title_size' =>'',
     'tab_content_size' =>'',
     'tab_section_content_color' =>'',

     'tab_title_color' =>'',
     'tab_title_size' =>'',
     'tab_main_content_size' =>'',
     'tab_content_color' =>'',
     'tab_title_bg_color' =>'',

     'tab_title_hover_color' =>'',
     'tab_title_active_bg_color' =>'',

   
    ), $atts ) );
    // Turn output buffer on
   

    do_shortcode( $content );

    // is not empty
    if( empty( $vt_tabs ) ) { return; }

    $output       = '';
    $id           = ( $id ) ? ' id="'. $id .'"' : '';
    $active       = ( isset( $_REQUEST['tab'] ) ) ? $_REQUEST['tab'] : $active;
    $uniqtab      = uniqid();

    $inline_style = '';

    // Section Title
    if ( $tab_section_title_color || $tab_section_title_size ) {
      $inline_style .= '.segva-dashboard.segva-tab-section-'. $uniqtab .' .section-title-wrap h2  {';
      $inline_style .= ( $tab_section_title_color ) ? 'color:'. $tab_section_title_color .';' : '';
      $inline_style .= ( $tab_section_title_size ) ? 'font-size:'. segovia_core_check_px($tab_section_title_size) .';' : '';
      $inline_style .= '}';
    }
    // Section Content
    if ( $tab_section_content_color || $tab_content_size ) {
      $inline_style .= '.segva-dashboard.segva-tab-section-'. $uniqtab .' .section-title-wrap p  {';
      $inline_style .= ( $tab_section_content_color ) ? 'color:'. $tab_section_content_color .';' : '';
      $inline_style .= ( $tab_content_size ) ? 'font-size:'. segovia_core_check_px($tab_content_size) .';' : '';
      $inline_style .= '}';
    }
     // Tab Title 
    if ( $tab_title_color || $tab_title_size || $tab_title_bg_color ) {
      $inline_style .= '.segva-dashboard.segva-tab-section-'. $uniqtab .' .nav-tabs .nav-link  {';
      $inline_style .= ( $tab_title_color ) ? 'color:'. $tab_title_color .';' : '';
      $inline_style .= ( $tab_title_size ) ? 'font-size:'. segovia_core_check_px($tab_title_size) .';' : '';
      $inline_style .= ( $tab_title_bg_color ) ? 'background-color:'. $tab_title_bg_color .';' : '';
      $inline_style .= '}';
    }
      // Tab Content
    if ( $tab_content_color || $tab_main_content_size ) {
      $inline_style .= '.segva-dashboard.segva-tab-section-'. $uniqtab .' .tab-content p {';
      $inline_style .= ( $tab_content_color ) ? 'color:'. $tab_content_color .';' : '';
      $inline_style .= ( $tab_main_content_size ) ? 'font-size:'. segovia_core_check_px($tab_main_content_size) .';' : '';
      $inline_style .= '}';
    }
    // Active Styles
    if ( $tab_title_hover_color || $tab_title_active_bg_color ) {
      $inline_style .= '.segva-dashboard.segva-tab-section-'. $uniqtab .' .nav-item.nav-link.active, .segva-dashboard.segva-tab-section-'. $uniqtab .' .nav-item.nav-link:hover  {';
      $inline_style .= ( $tab_title_hover_color ) ? 'color:'. $tab_title_hover_color .';' : '';
      $inline_style .= ( $tab_title_active_bg_color ) ? 'background-color:'. $tab_title_active_bg_color .';' : '';
      $inline_style .= '}';
    }

    // add inline style
    add_inline_style( $inline_style );
    $styled_class  = ' segva-tab-section-'. $uniqtab;

   
    $tab_title = $tab_title ? '<h2 class="section-title">'.$tab_title.'</h2>' : '';
    $tab_content = $tab_content ? '<p>'.$tab_content.'</p>' : ''; 

      $output = '';
      $output .= '<div class="segva-dashboard '.$styled_class.'">
                    <div class="row">
                      <div class="col-lg-4">
                        <div class="dashboard-info">
                         <div class="section-title-wrap section-title-style-two">'.$tab_title.$tab_content.'</div>
                          <nav>
                            <div class="nav flex-column nav-tabs" id="nav-tab" role="tablist">';
                              $key = 1;
                               foreach( $vt_tabs as $key => $tab ){
                                 $title      = $tab['atts']['title'];
                              $active_cls = ( $key == $active ) ? ' active' : '';
                                $output .= '<a class="nav-item nav-link'.$active_cls.'" id="nav-'.$uniqtab.$key.'-tab" data-toggle="tab" href="#nav-'.$uniqtab.$key.'" role="tab" aria-controls="nav-'.$uniqtab.$key.'" aria-selected="true">'.$title .'</a>';
                              $key++;
                              }                           
                $output .= '</div>
                          </nav>
                        </div>
                      </div>
                      <div class="col-lg-8">
                        <div class="tab-content tab-animation" id="nav-tabContent">';
                          $key = 1;
                          foreach( $vt_tabs as $key => $tab ){
                            $active_clss = ( $key == $active ) ? ' active show' : '';

                            $output .= '<div class="tab-pane '.$active_clss.'" id="nav-'.$uniqtab.$key.'" role="tabpanel" aria-labelledby="nav-'.$uniqtab.$key.'-tab"><div class="segva-main-content">'.do_shortcode( $tab['content'] ).'</div></div>';
                          $key++;
                          }
            $output .= '</div>
                      </div>
                    </div>
                  </div>';

 return $output;
   

    // Return outbut buffer
   
  }
  add_shortcode( 'vt_tabs', 'segovia_vt_tabs_function' );
}

/* ==========================================================
  Tab
=========================================================== */
if( ! function_exists( 'segovia_vt_tab_function' ) ) {
  function segovia_vt_tab_function( $atts, $content = '', $key = '' ) {
    global $vt_tabs;
    $vt_tabs[]  = array( 'atts' => $atts, 'content' => $content );
    return;
  }
  add_shortcode('vt_tab', 'segovia_vt_tab_function');
}
