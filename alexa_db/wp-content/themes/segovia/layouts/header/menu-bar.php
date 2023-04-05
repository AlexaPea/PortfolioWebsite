<?php
// Metabox
$segovia_id    = ( isset( $post ) ) ? $post->ID : 0;
$segovia_id    = ( is_home() ) ? get_option( 'page_for_posts' ) : $segovia_id;
$segovia_id    = ( segovia_is_woocommerce_shop() ) ? wc_get_page_id( 'shop' ) : $segovia_id;
$segovia_id    = ( ! is_tag() && ! is_archive() && ! is_search() && ! is_404() && ! is_singular('testimonial') ) ? $segovia_id : false;
$segovia_meta  = get_post_meta( $segovia_id, 'page_type_metabox', true );

// Header Style - ThemeOptions & Metabox
if ($segovia_meta) {
  $segovia_header_design  = $segovia_meta['select_header_design'];
  $segovia_sticky_header  = $segovia_meta['sticky_header'];
} else {
  $segovia_header_design  = cs_get_option('select_header_design');
  $segovia_sticky_header  = cs_get_option('sticky_header');
}
if ($segovia_meta && $segovia_header_design !== 'default') {
  $segovia_sticky_header  = $segovia_meta['sticky_header'];
} else {
  $segovia_sticky_header  = cs_get_option('sticky_header');
}

$segovia_mobile_breakpoint = cs_get_option('mobile_breakpoint');
$segovia_breakpoint = $segovia_mobile_breakpoint ? $segovia_mobile_breakpoint : '1199';

if ($segovia_header_design === 'default') {
  $segovia_header_design_actual  = cs_get_option('select_header_design');
} else {
  $segovia_header_design_actual = ( $segovia_header_design ) ? $segovia_header_design : cs_get_option('select_header_design');
}

if ($segovia_header_design_actual !== 'style_two') {
  $segovia_sticky_header_class = $segovia_sticky_header ? ' segva-sticky' : '';
} else {
  $segovia_sticky_header_class = '';
}

  // Sidebar Header Footer Social
  $social_ftr_icon    = cs_get_option('social_ftr_icon');
  if ($segovia_meta && $segovia_header_design !== 'default') {
    $social_ftr_icon = $segovia_meta['social_ftr_icon'];
  } else {
    $social_ftr_icon  = cs_get_option('social_ftr_icon');
  }

  // Sidebar Header Footer Copyright
  if ($segovia_meta && $segovia_header_design !== 'default') {
    $social_ftr_cprt = $segovia_meta['social_ftr_cprt'];
  } else {
    $social_ftr_cprt  = cs_get_option('social_ftr_cprt');
  }

  // Hide Main Menu
  if ($segovia_meta && $segovia_header_design !== 'default' ) {
    $hide_main_menu = $segovia_meta['hide_main_menu'];
  } else {
    $hide_main_menu  = cs_get_option('hide_main_menu');
  }


// Navigation & Search
 if($segovia_header_design_actual === 'style_two') { ?>
  <div class="segva-table-row middle">
    <div class="segva-table-wrap">
      <div class="segva-align-wrap">
        <?php
          if ($segovia_meta) {
            $segovia_choose_menu = $segovia_meta['choose_menu'];
          } else { $segovia_choose_menu = ''; }
          $segovia_choose_menu = $segovia_choose_menu ? $segovia_choose_menu : '';

          echo '<nav class="segva-navigation" data-nav="'. $segovia_breakpoint .'">';
          wp_nav_menu(
            array(
              'menu'              => 'primary',
              'theme_location'    => 'primary',
              'container'         => '',
              'menu'              => $segovia_choose_menu,
              'menu_class'        => '',
              'fallback_cb'       => 'segovia_wp_bootstrap_navwalker::fallback',
              'walker'            => new segovia_wp_bootstrap_navwalker()
            )
          );
          echo '</nav>';
          ?>
      </div>  
    </div> 
  </div>  
<?php } else { 
  if(!$hide_main_menu) {
    if ($segovia_meta) {
      $segovia_choose_menu = $segovia_meta['choose_menu'];
    } else { $segovia_choose_menu = ''; }
    $segovia_choose_menu = $segovia_choose_menu ? $segovia_choose_menu : '';

    echo '<nav class="segva-navigation " data-nav="'. $segovia_breakpoint .'">';
    wp_nav_menu(
      array(
        'menu'              => 'primary',
        'theme_location'    => 'primary',
        'container'         => '',
        'menu'              => $segovia_choose_menu,
        'menu_class'        => '',
        'fallback_cb'       => 'segovia_wp_bootstrap_navwalker::fallback',
        'walker'            => new segovia_wp_bootstrap_navwalker()
      )
    );
    echo '</nav>';

   }
 }
