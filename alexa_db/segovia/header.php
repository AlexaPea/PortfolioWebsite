<?php
/*
 * The header for our theme.
 * Author & Copyright: VictorThemes
 * URL: https://victorthemes.com/wp-themes
 */
?><!DOCTYPE html>

<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<?php 

// if the `wp_site_icon` function does not exist (ie we're on < WP 4.3)
if ( ! function_exists( 'has_site_icon' ) || ! has_site_icon() ) { ?>
  <link rel="shortcut icon" href="<?php echo esc_url(SEGOVIA_IMAGES); ?>/favicon.png" />
<?php }

$segovia_all_element_color  = cs_get_customize_option( 'all_element_colors' );
?>
<meta name="msapplication-TileColor" content="<?php echo esc_attr($segovia_all_element_color); ?>">
<meta name="theme-color" content="<?php echo esc_attr($segovia_all_element_color); ?>">

<link rel="profile" href="//gmpg.org/xfn/11">

<?php
// Metabox
global $post;
$segovia_id    = ( isset( $post ) ) ? $post->ID : false;
$segovia_id    = ( is_home() ) ? get_option( 'page_for_posts' ) : $segovia_id;
$segovia_id    = ( segovia_is_woocommerce_shop() ) ? wc_get_page_id( 'shop' ) : $segovia_id;
$segovia_id    = ( ! is_tag() && ! is_archive() && ! is_search() && ! is_404() && ! is_singular('testimonial') ) ? $segovia_id : false;
$segovia_meta  = get_post_meta( $segovia_id, 'page_type_metabox', true );

// Parallax
$segovia_bg_parallax = cs_get_option('theme_bg_parallax');
$segovia_hav_parallax = $segovia_bg_parallax ? ' parallax-window' : '';
$segovia_parallax_speed = cs_get_option('theme_bg_parallax_speed');
$segovia_bg_parallax_speed = $segovia_parallax_speed ? $segovia_parallax_speed : '0.4';

// Theme Layout Width
$segovia_bg_overlay_color  = cs_get_option( 'theme_bg_overlay_color' );
$segovia_layout_width  = cs_get_option( 'theme_layout_width' );
$segovia_layout_width_class = ($segovia_layout_width === 'container') ? 'layout-boxed'. $segovia_hav_parallax : 'layout-full';

// Header Style
if ($segovia_meta ) {
  $segovia_header_design  = $segovia_meta['select_header_design'];
  $segovia_sticky_header  = $segovia_meta['sticky_header'];
  $segovia_search_icon    = $segovia_meta['search_icon'];

} else {
  $segovia_header_design  = cs_get_option('select_header_design');
  $segovia_sticky_header  = cs_get_option('sticky_header');
  $segovia_search_icon    = cs_get_option('search_icon');
}
if ($segovia_header_design === 'default') {
  $segovia_header_design_actual  = cs_get_option('select_header_design');
} else {
  $segovia_header_design_actual = ( $segovia_header_design ) ? $segovia_header_design : cs_get_option('select_header_design');
}
if ($segovia_meta && $segovia_header_design !== 'default') {
  $segovia_sticky_header  = $segovia_meta['sticky_header'];
  $segovia_search_icon    = $segovia_meta['search_icon'];
} else {
  $segovia_sticky_header  = cs_get_option('sticky_header');
  $segovia_search_icon    = cs_get_option('search_icon');
}
if ($segovia_header_design_actual === 'style_two') {
  $segovia_header_class = 'segva-header-two ';
  $segovia_sticky_header_class = $segovia_sticky_header ? ' segva-sticky' : '';
} else {
  $segovia_sticky_header_class = '';
  $segovia_header_class = 'segva-header-one ';
}

// Header Transparent
if ($segovia_meta) {
  // Shortcode Banner Type
  $segovia_banner_type =  $segovia_meta['banner_type'];
  $hide_header =  $segovia_meta['hide_header'];
} else { 
  $segovia_banner_type = '';
  $hide_header = ''; 
}

  // Fixed Footer
  $footer_fixed_style = cs_get_option('footer_fixed_style');

  // Sticky Header
  $sticky_header    = cs_get_option('sticky_header');
  
  if ($segovia_meta && $segovia_header_design !== 'default') {
    $sticky_header = $segovia_meta['sticky_header'];
  } else {
    $sticky_header  = cs_get_option('sticky_header');
  }
  if($sticky_header) {
    $sticky_header_class = 'sticky-header';
  } else {
    $sticky_header_class = '';
  }

  // Transparent Header
  if ($segovia_meta && $segovia_header_design !== 'default') {
    $trans_header = $segovia_meta['transparency_header'];
    $trans_menu_style = $segovia_meta['trans_menu_style'];
  } else {
    $trans_header  = cs_get_option('trans_header');
    $trans_menu_style = '';
  }
  if($segovia_header_design_actual === 'style_two') {
    $trans_header_class = 'default-header';
    $trans_menu_class = '';
  } else {
    if($trans_header) {
      $trans_header_class = 'transparent-header';
      if($trans_menu_style === 'dark_menu_color') {
        $trans_menu_class = ' dark-transparent';
      } else {
        $trans_menu_class = ' light-transparent';
      }
    } else {
      $trans_header_class = 'default-header';
      $trans_menu_class = ' light-transparent';
    }
  }

  // Header Width - Wide or Container
  if ($segovia_meta && $segovia_header_design !== 'default') {
    $header_width = $segovia_meta['header_width'];
  } else {
    $header_width  = cs_get_option('header_width');
  }

  if($header_width) {
    $add_menu_class = '';
  } else {
    $add_menu_class = 'class-add-header';
  }
  
  // Menu Bottom Border
  if ($segovia_meta && $segovia_header_design !== 'default') {
    $menu_border = $segovia_meta['menu_border'];
  } else {
    $menu_border  = cs_get_option('menu_border');
  }

  if($menu_border) {
    $border_menu_class = 'header-style-three';
  } else {
    $border_menu_class = '';
  }

wp_head();
?>
</head>
<body <?php body_class(); ?>>
<?php

if ($segovia_bg_parallax) { ?>
  <div class="<?php echo esc_attr($segovia_layout_width_class); ?>" data-stellar-background-ratio="<?php echo esc_attr($segovia_bg_parallax_speed); ?>">
<?php } else { ?>
  <div class="<?php echo esc_attr($segovia_layout_width_class); ?>">
<?php } ?>

<?php if($segovia_bg_overlay_color) { ?>
  <div class="layout-overlay" style="background-color: <?php echo esc_attr($segovia_bg_overlay_color); ?>;"></div>
<?php }
// Add Extra class for side menu nav
  if($segovia_header_design_actual === 'style_two') { 
    $left_menu_class= 'side-nav-menu-class'; 
  } else {
    $left_menu_class= ''; 
  }
  // Fixed Footer option
  if($footer_fixed_style) {
    $fixed_footer_class ='sticky-footer';
  } else {
    $fixed_footer_class ='';
  }

  if ($segovia_meta) {
    $segovia_banner_type = $segovia_meta['banner_type'];
  } else { $segovia_banner_type = ''; }

  if ($segovia_meta) {
    $segovia_need_breadcrumbs  = $segovia_meta['need_breadcrumbs'];
  } else { $segovia_need_breadcrumbs = ''; }

  $segovia_need_title_bar = cs_get_option('need_title_bar');
  $segovia_need_breadcrumbss = cs_get_option('need_breadcrumbs');

  if($segovia_banner_type != 'hide-title-area' && $segovia_need_breadcrumbs) {
    $title_crumb_class = 'have-title-crumb';
  } else {
    $title_crumb_class = 'dhav-title-crumb';
  }

  $segovia_mobile_breakpoint = cs_get_option('mobile_breakpoint');
  $segovia_breakpoint = $segovia_mobile_breakpoint ? $segovia_mobile_breakpoint : '767';

  // Hide Main Menu
  if ($segovia_meta && $segovia_header_design !== 'default' ) {
    $hide_main_menu = $segovia_meta['hide_main_menu'];
  } else {
    $hide_main_menu  = cs_get_option('hide_main_menu');
  }

  $brand_logo_default_small = cs_get_option('brand_logo_default_small');

  $social_ftr_icon    = cs_get_option('social_ftr_icon');
  if ($segovia_meta && $segovia_header_design !== 'default') {
    $social_ftr_icon = $segovia_meta['social_ftr_icon'];
  } else {
    $social_ftr_icon  = cs_get_option('social_ftr_icon');
  }

  $menu_text = cs_get_option('menu_text');
  $menu_text_actual = $menu_text ? $menu_text : esc_html__( 'Menu', 'segovia');

  $logo_column = cs_get_option('logo_column_layout');
  $menu_column = cs_get_option('menu_column_layout');
  $right_icon_column = cs_get_option('icon_column_layout');

  if($logo_column === '1/12'){
    $logo_col_class = 'col-lg-1 col-md-1 col-sm-1 col-xs-6';
  } elseif($logo_column === '1/5'){
    $logo_col_class = 'col-lg-2 col-md-2 col-sm-2 col-xs-6';
  } elseif($logo_column === '1/4'){
    $logo_col_class = 'col-lg-3 col-md-3 col-sm-3 col-xs-6';
  } elseif($logo_column === '1/3'){
    $logo_col_class = 'col-lg-4 col-md-4 col-sm-4 col-xs-6';
  } elseif($logo_column === '5/12'){
    $logo_col_class = 'col-lg-5 col-md-5 col-sm-5 col-xs-6';
  } elseif($logo_column === '1/2'){
    $logo_col_class = 'col-lg-6 col-md-6 col-sm-6 col-xs-6';
  } elseif($logo_column === '7/12'){
    $logo_col_class = 'col-lg-7 col-md-7 col-sm-7 col-xs-6';
  } elseif($logo_column === '2/3'){
    $logo_col_class = 'col-lg-8 col-md-8 col-sm-8 col-xs-6';
  } elseif($logo_column === '3/4'){
    $logo_col_class = 'col-lg-9 col-md-9 col-sm-9 col-xs-6';
  } elseif($logo_column === '5/6'){
    $logo_col_class = 'col-lg-10 col-md-10 col-sm-10 col-xs-6';
  } elseif($logo_column === '11/12'){
    $logo_col_class = 'col-lg-11 col-md-11 col-sm-11 col-xs-6';
  } elseif($logo_column === '12/12'){
    $logo_col_class = 'col-lg-12 col-md-12 col-sm-12 col-xs-6';
  } else {
    $logo_col_class = 'col-lg-2 col-md-2';
  }

  if($menu_column === '1/12'){
    $menu_col_class = 'col-lg-1 col-md-1 col-sm-1 col-xs-6';
  } elseif($menu_column === '1/5'){
    $menu_col_class = 'col-lg-2 col-md-2 col-sm-2 col-xs-6';
  } elseif($menu_column === '1/4'){
    $menu_col_class = 'col-lg-3 col-md-3 col-sm-3 col-xs-6';
  } elseif($menu_column === '1/3'){
    $menu_col_class = 'col-lg-4 col-md-4 col-sm-4 col-xs-6';
  } elseif($menu_column === '5/12'){
    $menu_col_class = 'col-lg-5 col-md-5 col-sm-5 col-xs-6';
  } elseif($menu_column === '1/2'){
    $menu_col_class = 'col-lg-6 col-md-6 col-sm-6 col-xs-6';
  } elseif($menu_column === '7/12'){
    $menu_col_class = 'col-lg-7 col-md-7 col-sm-7 col-xs-6';
  } elseif($menu_column === '2/3'){
    $menu_col_class = 'col-lg-8 col-md-8 col-sm-8 col-xs-6';
  } elseif($menu_column === '3/4'){
    $menu_col_class = 'col-lg-9 col-md-9 col-sm-9 col-xs-6';
  } elseif($menu_column === '5/6'){
    $menu_col_class = 'col-lg-10 col-md-10 col-sm-10 col-xs-6';
  } elseif($menu_column === '11/12'){
    $menu_col_class = 'col-lg-11 col-md-11 col-sm-11 col-xs-6';
  } elseif($menu_column === '12/12'){
    $menu_col_class = 'col-lg-12 col-md-12 col-sm-12 col-xs-6';
  } else {
    $menu_col_class = 'col-lg-9 col-md-8';
  }

  if($right_icon_column === '1/12'){
    $icon_col_class = 'col-lg-1 col-md-1 col-sm-1 col-xs-6';
  } elseif($right_icon_column === '1/5'){
    $icon_col_class = 'col-lg-2 col-md-2 col-sm-2 col-xs-6';
  } elseif($right_icon_column === '1/4'){
    $icon_col_class = 'col-lg-3 col-md-3 col-sm-3 col-xs-6';
  } elseif($right_icon_column === '1/3'){
    $icon_col_class = 'col-lg-4 col-md-4 col-sm-4 col-xs-6';
  } elseif($right_icon_column === '5/12'){
    $icon_col_class = 'col-lg-5 col-md-5 col-sm-5 col-xs-6';
  } elseif($right_icon_column === '1/2'){
    $icon_col_class = 'col-lg-6 col-md-6 col-sm-6 col-xs-6';
  } elseif($right_icon_column === '7/12'){
    $icon_col_class = 'col-lg-7 col-md-7 col-sm-7 col-xs-6';
  } elseif($right_icon_column === '2/3'){
    $icon_col_class = 'col-lg-8 col-md-8 col-sm-8 col-xs-6';
  } elseif($right_icon_column === '3/4'){
    $icon_col_class = 'col-lg-9 col-md-9 col-sm-9 col-xs-6';
  } elseif($right_icon_column === '5/6'){
    $icon_col_class = 'col-lg-10 col-md-10 col-sm-10 col-xs-6';
  } elseif($right_icon_column === '11/12'){
    $icon_col_class = 'col-lg-11 col-md-11 col-sm-11 col-xs-6';
  } elseif($right_icon_column === '12/12'){
    $icon_col_class = 'col-lg-12 col-md-12 col-sm-12 col-xs-6';
  } else {
    $icon_col_class = 'col-lg-1 col-md-2 site-header-icon';
  }

  ?>

<div id="vtheme-wrapper"> <!-- #vtheme-wrapper -->
<?php if($segovia_header_design_actual != 'style_two') { ?>
  <div class="segva-main-wrap <?php echo esc_attr($fixed_footer_class); ?> <?php echo esc_attr($left_menu_class); ?> <?php echo esc_attr($trans_header_class.$trans_menu_class); ?> <?php echo esc_attr($border_menu_class); ?> <?php echo esc_attr($title_crumb_class); ?> ">
    <!-- Segva Main Wrap Inner -->
    <div class="main-wrap-inner">
    <?php }
      // Header
      if($segovia_header_design_actual === 'style_two') { ?>
          <div class="segva-sidebar-nav">
            <div class="sidebar-part1">
              <div class="sidebar-nav-wrap">
                <?php
                  // Brand Logo
                  get_template_part( 'layouts/header/logo' ); 
                  get_template_part( 'layouts/header/menu', 'bar' ); 
                ?>
              </div>
            </div>
            <div class="sidebar-part2">
              <?php if ($brand_logo_default_small) { ?>
              <div class="logo2">
                <a href="<?php echo esc_url(home_url('/')); ?>"><img src="<?php echo esc_url(wp_get_attachment_url($brand_logo_default_small))?>" alt="<?php get_bloginfo( 'name' );?>"/></a>
              </div>
              <?php } else { ?>
              <div class="logo2">
                <a href="<?php echo esc_url(home_url('/')); ?>"><img src="<?php echo esc_url(SEGOVIA_IMAGES) . '/small-logo.png' ?>" alt="<?php get_bloginfo( 'name' );?>"/></a>
              </div>
              <?php } ?>

              <div class="segva-table-wrap">
                <div class="segva-align-wrap">
                  <div class="action-links">
                    <span class="segva-menu-txt"><?php echo esc_html($menu_text_actual); ?></span>
                    <a href="javascript:void(0);" class="sidebar-toggle-link"><span class="toggle-separator"></span></a>
                  </div>
                </div>
              </div>
              <div class="sidebar-part2-bottom">
                <?php echo do_shortcode($social_ftr_icon); ?>
              </div>
            </div>
          </div>  
          <div class="segva-wrapper">
          <div class="segva-wrap-inner">
        <?php } else { if($hide_header) {} else{ ?>

        <header class="segva-header <?php echo esc_attr($sticky_header_class); ?> <?php echo esc_attr($add_menu_class.$header_width); ?>">
          <?php if($header_width) { ?>
            <div class="container"> <?php  } ?>
              <div class="header-wrap">
              <div class="row">
                <div class="<?php echo esc_attr($logo_col_class); ?>">
                  <?php get_template_part( 'layouts/header/logo' ); ?>
                </div>
                <div class="<?php echo esc_attr($menu_col_class); ?> segva-navigation-col">
                  <?php get_template_part( 'layouts/header/menu', 'bar' ); ?>
                </div>
                <div class="<?php echo esc_attr($icon_col_class); ?>">
                   
                  <div class="segva-header-right">
                  
                    <div class="header-right-links">
                      <?php  
                      // Search Icon
                      $search_icon    = cs_get_option('search_icon');
                      if ($segovia_meta && $segovia_header_design !== 'default') {
                        $search_icon = $segovia_meta['search_icon'];
                      } else {
                        $search_icon  = cs_get_option('search_icon');
                      }
                       
                      if($search_icon) { ?>
                        <a href="javascript:void(0);" class="search-link"><i class="fa fa-search fa-rotate-90" aria-hidden="true"></i></a>
                      <?php } ?>
                    </div> 
                  </div> <!-- segva-navigation -->
                </div>
              </div>
              <?php if($header_width) { ?> </div> <?php } ?> 
            </div>
        </header>
      <?php } } ?>

      <!-- Segva Search -->
      <div class="segva-search">
        <div class="segva-table-wrap">
          <div class="segva-align-wrap">
            <div class="search-closer"></div>
            <div class="search-wrap">
                <?php  get_search_form(); ?>
            </div>
          </div>
        </div>
      </div>        
      
  <?php
  // Title Bar
  if($segovia_need_title_bar) {
    if(!is_404()){
      get_template_part( 'layouts/header/title', 'bar' );
    }
  }

  // Breadcrumbs
  if (isset($segovia_need_breadcrumbss)) {
    if(!is_404() && !post_password_required()){
      get_template_part( 'layouts/header/breadcrumbs', 'bar' );
    }
  }
