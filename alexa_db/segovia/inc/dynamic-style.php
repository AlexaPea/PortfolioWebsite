<?php
/*
* ---------------------------------------------------------------------
* VictorThemes Dynamic Style
* ---------------------------------------------------------------------
*/

header("Content-type: text/css;");
$absolute_path = explode('wp-content', $_SERVER['SCRIPT_FILENAME']);
$wp_load = $absolute_path[0] . 'wp-load.php';
require_once($wp_load);

?>
<!-- Overlay Section Colors -->
<?php 
$overlay_bg_color = cs_get_customize_option( 'overlay_bg_color' );
// Overlay Title Text
$overlay_title_text_color = cs_get_customize_option( 'overlay_title_text_color' );
$overlay_text_color = cs_get_customize_option( 'overlay_text_color' );
$overlay_icon_color = cs_get_customize_option( 'overlay_icon_color' );
$overlay_link_color = cs_get_customize_option( 'overlay_link_color' );
$overlay_link_hover_color  = cs_get_customize_option( 'overlay_link_hover_color' );
// Social ICon
$overlay_social_color = cs_get_customize_option( 'overlay_social_color' );
$overlay_social_hover_color  = cs_get_customize_option( 'overlay_social_hover_color' );
$overlay_social_bg_color = cs_get_customize_option ('overlay_social_bg_color');
$overlay_social_bg_hover_color = cs_get_customize_option ('overlay_social_bg_hover_color');
$overlay_social_border_color = cs_get_customize_option ('overlay_social_border_color');
$overlay_social_border_hover_color = cs_get_customize_option ('overlay_social_border_hover_color');
if($overlay_bg_color) { ?>
.no-class {}
.segva-fixed-navigation {
  background: <?php echo esc_attr($overlay_bg_color); ?>;
}
<?php } if($overlay_title_text_color) { ?>
.no-class {}
.segva-fixed-navigation .nav-item h5 {
  color: <?php echo esc_attr($overlay_title_text_color); ?>;
}
.nav-item-title:before {
  background: <?php echo esc_attr($overlay_title_text_color); ?>;
}
<?php } if($overlay_text_color) { ?>
.no-class {}
.segva-fixed-navigation .contact-info ul li {
  color: <?php echo esc_attr($overlay_text_color); ?>;
}

<?php } if($overlay_icon_color) { ?>
.no-class {}
.segva-fixed-navigation .contact-info ul li i, 
.segva-fixed-navigation i {
  color: <?php echo esc_attr($overlay_icon_color); ?>;
}

<?php } if($overlay_link_color) { ?>
.no-class {}
.segva-fixed-navigation .contact-info ul li a,
.segva-fixed-navigation ul li a, .segva-fixed-navigation a,
.segva-fixed-navigation .segva-navigation > ul > li > a > .nav-text,
.segva-fixed-navigation .segva-navigation > ul > li > a {
  color: <?php echo esc_attr($overlay_link_color); ?>;
}
<?php } if($overlay_link_hover_color) { ?>
.no-class {}
 .segva-fixed-navigation .contact-info ul li a:hover,
.segva-fixed-navigation ul li a, .segva-fixed-navigation a:hover,
.segva-fixed-navigation .segva-navigation > ul > li > a:hover > .nav-text,
.segva-fixed-navigation .segva-navigation > ul > li > a:hover, 
.segva-fixed-navigation .segva-navigation > ul > li.current-menu-item > a,
.segva-fixed-navigation .segva-navigation > ul > li.current-menu-item > a > .nav-text {
  color: <?php echo esc_attr($overlay_link_hover_color); ?>;
}
<?php } if($overlay_social_color) { ?>
.no-class {}
.segva-fixed-navigation .segva-social.rounded a,
.segva-fixed-navigation .segva-social a {
  color: <?php echo esc_attr($overlay_social_color); ?>;
}
<?php } if($overlay_social_hover_color) { ?>
.no-class {}
.segva-fixed-navigation .segva-social.rounded a:hover,
.segva-fixed-navigation .segva-social a:hover {
  color: <?php echo esc_attr($overlay_social_hover_color); ?>;
}
<?php } if($overlay_social_bg_color) { ?>
.no-class {}
.segva-fixed-navigation .segva-social.rounded a,
.segva-fixed-navigation .segva-social a {
  background-color: <?php echo esc_attr($overlay_social_bg_color); ?>;
}
<?php } if($overlay_social_bg_hover_color) { ?>
.no-class {}
.segva-fixed-navigation .segva-social.rounded a:hover,
.segva-fixed-navigation .segva-social a:hover {
  background-color: <?php echo esc_attr($overlay_social_bg_hover_color); ?>;
}
<?php } if($overlay_social_border_color) { ?>
.no-class {}
.segva-fixed-navigation .segva-social.rounded a,
.segva-fixed-navigation .segva-social a {
  border-color: <?php echo esc_attr($overlay_social_border_color); ?>;
}
<?php } if($overlay_social_border_hover_color) { ?>
.no-class {}
.segva-fixed-navigation .segva-social.rounded a:hover,
.segva-fixed-navigation .segva-social a:hover {
  border-color: <?php echo esc_attr($overlay_social_border_hover_color); ?>;
}
<?php }

// Header colors - Customizer
$header_bg_color  = cs_get_customize_option( 'header_bg_color' );
$header_border_color = cs_get_customize_option('header_border_color');
$header_link_color  = cs_get_customize_option( 'header_link_color' );
$header_link_hover_color  = cs_get_customize_option( 'header_link_hover_color' );
$header_link_hover_border_color = cs_get_customize_option('header_link_hover_border_color');
if($header_bg_color) { ?>
.no-class {}
.default-header header.segva-header, .default-header .segva-header:before {
  background-color: <?php echo esc_attr($header_bg_color); ?>;
}
<?php } if($header_border_color) { ?>
.no-class {}
.default-header header.segva-header {
  border-color: <?php echo esc_attr($header_border_color); ?>;
}
<?php } if($header_link_color) { ?>
.no-class {}
.default-header .segva-navigation > ul > li.current-menu-ancestor > a > .nav-text, .default-header .segva-navigation > ul > li > a,
.search-link {
  color: <?php echo esc_attr($header_link_color); ?>;
}
.header-right-links {
  border-color: <?php echo esc_attr($header_link_color); ?>;
}

<?php } if($header_link_hover_color) { ?>
.no-class{}
.default-header .segva-navigation > ul > li.current-menu-ancestor > a > .nav-text, 
.default-header .segva-navigation > ul > li > a:hover, .search-link:hover
 {
  color: <?php echo esc_attr($header_link_hover_color); ?>;
}
<?php } 
if($header_link_hover_border_color) { ?>
.default-header .segva-navigation > ul > li.current-menu-ancestor > a > .nav-text:before, 
.default-header .segva-navigation > ul > li > a:hover > .nav-text:before, 
.default-header .segva-navigation > ul > li > a > .nav-text:before {
  background: <?php echo esc_attr($header_link_hover_border_color); ?>;
}
<?php } 
/* Light Transparent Header - Customizer */
$light_trans_header_bg_color = cs_get_customize_option('light_trans_header_bg_color');
$light_trans_header_link_color  = cs_get_customize_option( 'light_trans_header_link_color' );
$light_trans_header_link_hover_color  = cs_get_customize_option( 'light_trans_header_link_hover_color' );
$light_trans_header_link_hover_border_color = cs_get_customize_option('light_trans_header_link_hover_border_color');

if($light_trans_header_bg_color) { ?>
  .no-class {}
  .transparent-header.light-transparent header.segva-header, 
  .transparent-header.light-transparent .segva-header:before {
    background-color: <?php echo esc_attr($light_trans_header_bg_color); ?>;
  }
<?php }

if($light_trans_header_link_color) { ?>
  .no-class {}
  .transparent-header.light-transparent .segva-header .segva-navigation > ul > li > a > .nav-text, 
  .transparent-header.light-transparent .segva-header .segva-navigation > ul > li > a,
  .transparent-header.light-transparent .segva-header .search-link {
    color: <?php echo esc_attr($light_trans_header_link_color); ?>;
  }

<?php } if($light_trans_header_link_hover_color) { ?>
.no-class {}
.transparent-header.light-transparent .segva-navigation > ul > li.current-menu-ancestor > a > .nav-text, 
.transparent-header.light-transparent .segva-navigation > ul > li > a:hover > .nav-text, 
.transparent-header.light-transparent .segva-navigation > ul > li > a:hover,
.transparent-header.light-transparent .search-link:hover,
.transparent-header.light-transparent .segva-header .segva-navigation > ul > li.current-menu-ancestor > a:hover > .nav-text {
  color: <?php echo esc_attr($light_trans_header_link_hover_color); ?>;
}
<?php }

if($light_trans_header_link_hover_border_color) { ?>
.transparent-header.light-transparent .segva-navigation > ul > li.current-menu-ancestor > a > .nav-text:before, 
.transparent-header.light-transparent .segva-navigation > ul > li > a:hover > .nav-text:before, 
.transparent-header.light-transparent .segva-navigation > ul > li > a > .nav-text:before {
  background: <?php echo esc_attr($light_trans_header_link_hover_border_color); ?>;
}
<?php }


/* Light Transparent Sticky Header - Customizer */
$light_trans_sticky_header_bg_color  = cs_get_customize_option( 'light_trans_sticky_header_bg_color' );
$light_trans_sticky_header_link_color  = cs_get_customize_option( 'light_trans_sticky_header_link_color' );
$light_trans_sticky_header_link_hover_color  = cs_get_customize_option( 'light_trans_sticky_header_link_hover_color' );
$light_trans_sticky_header_border_color = cs_get_customize_option( 'light_trans_sticky_header_border_color' );

if($light_trans_sticky_header_bg_color) { ?>
  .no-class {}
  .transparent-header.light-transparent .is-sticky header.segva-header, 
  .transparent-header.light-transparent .is-sticky .segva-header:before {
    background-color: <?php echo esc_attr($light_trans_sticky_header_bg_color); ?>;
  }
<?php }

if($light_trans_sticky_header_link_color) { ?>
  .no-class {}
  .transparent-header.light-transparent .is-sticky .segva-header .segva-navigation > ul > li > a > .nav-text, 
  .transparent-header.light-transparent .is-sticky .segva-header .segva-navigation > ul > li > a,
  .transparent-header.light-transparent .is-sticky .segva-header .search-link {
    color: <?php echo esc_attr($light_trans_sticky_header_link_color); ?>;
  }

<?php } if($light_trans_sticky_header_link_hover_color) { ?>
.no-class {}
.transparent-header.light-transparent .is-sticky .segva-navigation > ul > li.current-menu-ancestor > a > .nav-text, 
.transparent-header.light-transparent .is-sticky .segva-navigation > ul > li > a:hover > .nav-text, 
.transparent-header.light-transparent .is-sticky .segva-navigation > ul > li > a:hover,
.transparent-header.light-transparent .is-sticky .search-link:hover,
.transparent-header.light-transparent .is-sticky .segva-header .segva-navigation > ul > li.current-menu-ancestor > a:hover > .nav-text {
  color: <?php echo esc_attr($light_trans_sticky_header_link_hover_color); ?>;
}
<?php }

if($light_trans_sticky_header_border_color) { ?>
.transparent-header.light-transparent .is-sticky .segva-navigation > ul > li.current-menu-ancestor > a > .nav-text:before, 
.transparent-header.light-transparent .is-sticky .segva-navigation > ul > li > a:hover > .nav-text:before, 
.transparent-header.light-transparent .is-sticky .segva-navigation > ul > li > a > .nav-text:before {
  background: <?php echo esc_attr($light_trans_sticky_header_border_color); ?>;
}
<?php }

/* Dark Transparent Header - Customizer */
$dark_trans_header_bg_color = cs_get_customize_option('dark_trans_header_bg_color');
$dark_trans_header_link_color  = cs_get_customize_option( 'dark_trans_header_link_color' );
$dark_trans_header_link_hover_color  = cs_get_customize_option( 'dark_trans_header_link_hover_color' );
$dark_trans_header_link_hover_border_color = cs_get_customize_option('dark_trans_header_link_hover_border_color');

if($dark_trans_header_bg_color) { ?>
  .no-class {}
  .transparent-header.dark-transparent header.segva-header, 
  .transparent-header.dark-transparent .segva-header:before {
    background-color: <?php echo esc_attr($dark_trans_header_bg_color); ?>;
  }
<?php }

if($dark_trans_header_link_color) { ?>
  .no-class {}
  .transparent-header.dark-transparent .segva-header .segva-navigation > ul > li > a > .nav-text, 
  .transparent-header.dark-transparent .segva-header .segva-navigation > ul > li > a,
  .transparent-header.dark-transparent .segva-header .search-link {
    color: <?php echo esc_attr($dark_trans_header_link_color); ?>;
  }

<?php } if($dark_trans_header_link_hover_color) { ?>
.no-class {}
.transparent-header.dark-transparent .segva-navigation > ul > li.current-menu-ancestor > a > .nav-text, 
.transparent-header.dark-transparent .segva-navigation > ul > li > a:hover > .nav-text, 
.transparent-header.dark-transparent .segva-navigation > ul > li > a:hover,
.transparent-header.dark-transparent .search-link:hover,
.transparent-header.dark-transparent .segva-header .segva-navigation > ul > li.current-menu-ancestor > a:hover > .nav-text {
  color: <?php echo esc_attr($dark_trans_header_link_hover_color); ?>;
}
<?php }

if($dark_trans_header_link_hover_border_color) { ?>
.transparent-header.dark-transparent .segva-navigation > ul > li.current-menu-ancestor > a > .nav-text:before, 
.transparent-header.dark-transparent .segva-navigation > ul > li > a:hover > .nav-text:before, 
.transparent-header.dark-transparent .segva-navigation > ul > li > a > .nav-text:before {
  background: <?php echo esc_attr($dark_trans_header_link_hover_border_color); ?>;
}
<?php }


/* Dark Transparent Sticky Header - Customizer */
$dark_trans_sticky_header_bg_color  = cs_get_customize_option( 'dark_trans_sticky_header_bg_color' );
$dark_trans_sticky_header_link_color  = cs_get_customize_option( 'dark_trans_sticky_header_link_color' );
$dark_trans_sticky_header_link_hover_color  = cs_get_customize_option( 'dark_trans_sticky_header_link_hover_color' );
$dark_trans_sticky_header_border_color = cs_get_customize_option( 'dark_trans_sticky_header_border_color' );

if($dark_trans_sticky_header_bg_color) { ?>
  .no-class {}
  .transparent-header.dark-transparent .is-sticky header.segva-header, 
  .transparent-header.dark-transparent .is-sticky .segva-header:before {
    background-color: <?php echo esc_attr($dark_trans_sticky_header_bg_color); ?>;
  }
<?php }

if($dark_trans_sticky_header_link_color) { ?>
  .no-class {}
  .transparent-header.dark-transparent .is-sticky .segva-header .segva-navigation > ul > li > a > .nav-text, 
  .transparent-header.dark-transparent .is-sticky .segva-header .segva-navigation > ul > li > a,
  .transparent-header.dark-transparent .is-sticky .segva-header .search-link {
    color: <?php echo esc_attr($dark_trans_sticky_header_link_color); ?>;
  }

<?php } if($dark_trans_sticky_header_link_hover_color) { ?>
.no-class {}
.transparent-header.dark-transparent .is-sticky .segva-navigation > ul > li.current-menu-ancestor > a > .nav-text, 
.transparent-header.dark-transparent .is-sticky .segva-navigation > ul > li > a:hover > .nav-text, 
.transparent-header.dark-transparent .is-sticky .segva-navigation > ul > li > a:hover,
.transparent-header.dark-transparent .is-sticky .search-link:hover,
.transparent-header.dark-transparent .is-sticky .segva-header .segva-navigation > ul > li.current-menu-ancestor > a:hover > .nav-text {
  color: <?php echo esc_attr($dark_trans_sticky_header_link_hover_color); ?>;
}
<?php }

if($dark_trans_sticky_header_border_color) { ?>
.transparent-header.dark-transparent .is-sticky .segva-navigation > ul > li.current-menu-ancestor > a > .nav-text:before, 
.transparent-header.dark-transparent .is-sticky .segva-navigation > ul > li > a:hover > .nav-text:before, 
.transparent-header.dark-transparent .is-sticky .segva-navigation > ul > li > a > .nav-text:before {
  background: <?php echo esc_attr($dark_trans_sticky_header_border_color); ?>;
}
<?php }
// Sub-menu Colors
$submenu_bg_color  = cs_get_customize_option( 'submenu_bg_color' );
$submenu_bg_hover_color  = cs_get_customize_option( 'submenu_bg_hover_color' );
$submenu_border_color  = cs_get_customize_option( 'submenu_border_color' );
$submenu_link_color  = cs_get_customize_option( 'submenu_link_color' );
$submenu_link_hover_color  = cs_get_customize_option( 'submenu_link_hover_color' );
if($submenu_bg_color) { ?>
.no-class {}
.dropdown-nav {
  background-color: <?php echo esc_attr($submenu_bg_color); ?>;
}
<?php } if($submenu_link_color) { ?>
.no-class {}
.segva-header .dropdown-nav > li > a {
  color: <?php echo esc_attr($submenu_link_color); ?>;
}
<?php } if($submenu_link_hover_color) { ?>
.no-class {}
.segva-header .dropdown-nav > li > a:hover, .segva-header .dropdown-nav > li > a:active,
 .segva-header dropdown-nav > li:hover > a, 
.segva-header .dropdown-nav > li.active > a {
  color: <?php echo esc_attr($submenu_link_hover_color); ?>;
}
<?php }

/* Sidebar Menu - Customizer */
$sidebar_bg_color  = cs_get_customize_option( 'sidebar_bg_color' );
$sidebar_text_color  = cs_get_customize_option( 'sidebar_text_color' );
$sidebar_link_color  = cs_get_customize_option( 'sidebar_link_color' );
$sidebar_link_hover_color  = cs_get_customize_option( 'sidebar_link_hover_color' );
$sidebar_submenu_link_color  = cs_get_customize_option( 'sidebar_submenu_link_color' );
$sidebar_submenu_link_hover_color  = cs_get_customize_option( 'sidebar_submenu_link_hover_color' );
// Social Icons
$sidebar_submenu_social_icon_color = cs_get_customize_option('sidebar_submenu_social_icon_color');
$sidebar_submenu_social_icon_hover_color = cs_get_customize_option('sidebar_submenu_social_icon_hover_color');
$sidebar_menu_border_color = cs_get_customize_option('sidebar_menu_border_color');
$sidebar_submenu_arrow_color = cs_get_customize_option('sidebar_submenu_arrow_color');

if ($sidebar_bg_color) { ?>
.no-class {}
.segva-sidebar-nav, .segva-sidebar-nav.open {
  background-color: <?php echo esc_attr($sidebar_bg_color); ?>;
}
<?php } if($sidebar_text_color) { ?>
.no-class {}
.sidebar-nav-wrap .segva-copyright,
.action-links .segva-menu-txt {
  color: <?php echo esc_attr($sidebar_text_color); ?>;
}
.sidebar-toggle-link .toggle-separator:before, .sidebar-toggle-link .toggle-separator:after {
  background: <?php echo esc_attr($sidebar_text_color); ?>;
}
<?php } if($sidebar_menu_border_color){ ?>
.no-class {}
.sidebar-nav-wrap .segva-navigation > ul > li > a, .sidebar-dropdown-arrow {
  border-color: <?php echo esc_attr($sidebar_menu_border_color); ?>;
}
<?php } if($sidebar_submenu_arrow_color) { ?>
.no-class {}
.sidebar-dropdown-arrow:before {
  color: <?php echo esc_attr($sidebar_submenu_arrow_color); ?>;
}
<?php }
if($sidebar_link_color) { ?>
.no-class {}
.sidebar-nav-wrap .segva-navigation > ul > li > a, 
.sidebar-nav-wrap .segva-navigation > ul > li > a > .nav-text, .sidebar-nav-wrap .segva-copyright a {
  color: <?php echo esc_attr($sidebar_link_color); ?>;
}
<?php } if($sidebar_link_hover_color) { ?>
.no-class {}
.sidebar-nav-wrap .segva-navigation > ul > li > a:hover, 
.sidebar-nav-wrap .segva-navigation > ul > li > a:hover > .nav-text, .sidebar-nav-wrap .segva-copyright a:hover,
.segva-sidebar-nav .segva-navigation > ul > li.current-menu-ancestor > a > .nav-text
 {
  color: <?php echo esc_attr($sidebar_link_hover_color); ?>;
}
<?php }  if($sidebar_submenu_link_color) { ?>
.no-class {}
.sidebar-nav-wrap .dropdown-nav > li > a {
  color: <?php echo esc_attr($sidebar_submenu_link_color); ?>;
}
<?php } if($sidebar_submenu_link_hover_color) { ?>
.no-class {}
.sidebar-nav-wrap .dropdown-nav > li > a:hover,
.sidebar-nav-wrap .dropdown-nav > li.active > a {
  color: <?php echo esc_attr($sidebar_submenu_link_hover_color); ?>;
}
<?php } if($sidebar_submenu_social_icon_color){ ?>
.no-class {}
.sidebar-nav-wrap .segva-social.rounded a, .sidebar-nav-wrap .segva-social a,
.sidebar-part2-bottom .segva-social a {
  color: <?php echo esc_attr($sidebar_submenu_social_icon_color); ?>;
}
<?php } if($sidebar_submenu_social_icon_hover_color){ ?>
.no-class {}
.sidebar-nav-wrap .segva-social.rounded a:hover, .sidebar-nav-wrap .segva-social a:hover,
.sidebar-part2-bottom .segva-social a:hover, .sidebar-part2-bottom .segva-social a:focus {
  color: <?php echo esc_attr($sidebar_submenu_social_icon_hover_color); ?>;
}
<?php }

/* Mobile Menu - Customizer */
$mobile_menu_toggle_color = cs_get_customize_option('mobile_menu_toggle_color');
$mobile_menu_bg_color  = cs_get_customize_option( 'mobile_menu_bg_color' );
$mobile_menu_bg_hover_color  = cs_get_customize_option( 'mobile_menu_bg_hover_color' );
$mobile_menu_link_color  = cs_get_customize_option( 'mobile_menu_link_color' );
$mobile_menu_link_hover_color  = cs_get_customize_option( 'mobile_menu_link_hover_color' );
$mobile_menu_border_color  = cs_get_customize_option( 'mobile_menu_border_color' );
$mobile_menu_expand_color  = cs_get_customize_option( 'mobile_menu_expand_color' );
$mobile_menu_expand_hover_color  = cs_get_customize_option( 'mobile_menu_expand_hover_color' );
$mobile_menu_expand_bg_color  = cs_get_customize_option( 'mobile_menu_expand_bg_color' );
$mobile_menu_expand_bg_hover_color  = cs_get_customize_option( 'mobile_menu_expand_bg_hover_color' );
if($mobile_menu_toggle_color){ ?>
.no-class {}
.mean-container a.meanmenu-reveal span,
.mean-container a.meanmenu-reveal span:before,
.mean-container a.meanmenu-reveal span:after,
.segva-transparent-header .mean-container a.meanmenu-reveal span:before,
.segva-transparent-header .mean-container a.meanmenu-reveal span:after,
.segva-transparent-header .mean-container a.meanmenu-reveal span,
.mean-container a.meanmenu-reveal.meanclose span:before {
  background: <?php echo esc_attr($mobile_menu_toggle_color); ?>;
}
<?php }
if ($mobile_menu_bg_color) { ?>
.no-class {}
.mean-container .mean-nav {
  background-color: <?php echo esc_attr($mobile_menu_bg_color); ?>;
}
<?php } if($mobile_menu_bg_hover_color) { ?>
.no-class {}
.segva-header .mean-container .dropdown-nav > li:hover > a,
.segva-header .mean-container .dropdown-nav > li:focus > a,
.mean-container .mean-nav ul li:hover > a,
.mean-container .mean-nav ul li:focus > a,
.mean-container .mean-nav ul li.current_page_ancestor > a,
.mean-container .mean-nav ul li.current_menu_item > a {
  background-color: <?php echo esc_attr($mobile_menu_bg_hover_color); ?>;
}
<?php } if($mobile_menu_link_color) { ?>
.no-class {}
.mean-container .mean-nav ul li a {
  color: <?php echo esc_attr($mobile_menu_link_color); ?>;
}
<?php } if($mobile_menu_link_hover_color) { ?>
.no-class {}
.mean-container .mean-nav ul li a:hover,
.mean-container .mean-nav ul li a:focus,
.segva-header .mean-container .dropdown-nav > li.active > a,
.mean-container ul li.current-menu-ancestor > a,
.mean-container .mean-nav ul li.current_page_ancestor > a,
.mean-container .mean-nav ul li.current_menu_item > a {
  color: <?php echo esc_attr($mobile_menu_link_hover_color); ?>;
}
<?php } if($mobile_menu_border_color) { ?>
.no-class {}
.mean-container .mean-nav ul li li a, .mean-container .mean-nav ul li a {
  border-color: <?php echo esc_attr($mobile_menu_border_color); ?>;
}
<?php } if($mobile_menu_expand_color) { ?>
.no-class {}
.mean-container .mean-nav ul li a.mean-expand {
  color: <?php echo esc_attr($mobile_menu_expand_color); ?>;
}
<?php } if($mobile_menu_expand_hover_color) { ?>
.no-class {}
.mean-container .mean-nav ul li a.mean-expand:hover,
.mean-container .mean-nav ul li a.mean-expand:focus,
.mean-container .mean-nav ul li:hover > a.mean-expand,
.mean-container .mean-nav ul li:focus > a.mean-expand,
.segva-header .mean-container .dropdown-nav > li:hover > a.mean-expand,
.segva-header .mean-container .dropdown-nav > li:focus > a.mean-expand {
  color: <?php echo esc_attr($mobile_menu_expand_hover_color); ?>;
}
<?php } if($mobile_menu_expand_bg_color) { ?>
.no-class {}
.mean-container .mean-nav ul li a.mean-expand {
  background-color: <?php echo esc_attr($mobile_menu_expand_bg_color); ?>;
}
<?php } if($mobile_menu_expand_bg_hover_color) { ?>
.no-class {}
.mean-container .mean-nav ul li a.mean-expand:hover,
.mean-container .mean-nav ul li a.mean-expand:focus,
.mean-container .mean-nav ul li:hover > a.mean-expand,
.mean-container .mean-nav ul li:focus > a.mean-expand,
.segva-header .mean-container .dropdown-nav > li:hover > a.mean-expand,
.segva-header .mean-container .dropdown-nav > li:focus > a.mean-expand {
  background-color: <?php echo esc_attr($mobile_menu_expand_bg_hover_color); ?>;
}
<?php }
/* Title Area - Theme Options - Background */
$titlebar_bg = cs_get_option('titlebar_bg');
$title_heading_color  = cs_get_customize_option( 'titlebar_title_color' );
$title_sub_heading_color  = cs_get_customize_option( 'titlebar_sub_title_color' );
$titlebar_bg_color = cs_get_customize_option('titlebar_bg_color');
if ($titlebar_bg) {

  $title_area = ( ! empty( $titlebar_bg['image'] ) ) ? 'background-image: url('. $titlebar_bg['image'] .');' : '';
  $title_area .= ( ! empty( $titlebar_bg['repeat'] ) ) ? 'background-repeat: '. $titlebar_bg['repeat'] .';' : '';
  $title_area .= ( ! empty( $titlebar_bg['position'] ) ) ? 'background-position: '. $titlebar_bg['position'] .';' : '';
  $title_area .= ( ! empty( $titlebar_bg['attachment'] ) ) ? 'background-attachment: '. $titlebar_bg['attachment'] .';' : '';
  $title_area .= ( ! empty( $titlebar_bg['size'] ) ) ? 'background-size: '. $titlebar_bg['size'] .';' : '';
  $title_area .= ( ! empty( $titlebar_bg['color'] ) ) ? 'background-color: '. $titlebar_bg['color'] .';' : ''; ?>
  .segva-page-title {
    <?php echo esc_attr($title_area); ?>
  }
<?php } if($titlebar_bg_color){ ?>
.no-class {}
.segva-title-area {
  background: <?php echo esc_attr($titlebar_bg_color); ?>;
}
<?php }
if($title_heading_color) { ?>
.no-class {}
.segva-title-area h1.page-title {
  color: <?php echo esc_attr($title_heading_color); ?>;
}
<?php } if ($title_sub_heading_color) { ?>
.no-class {}
.segva-page-title .page-sub-title {
  color: <?php echo esc_attr($title_sub_heading_color); ?>;
}
<?php }
// Breadcrumb Colors
$breadcrumb_text_color = cs_get_customize_option('breadcrumb_text_color');
$breadcrumb_link_color = cs_get_customize_option('breadcrumb_link_color');
$breadcrumb_link_hover_color = cs_get_customize_option('breadcrumb_link_hover_color');
$breadcrumb_bg_color = cs_get_customize_option('breadcrumb_bg_color');
if ($breadcrumb_text_color) { ?>
.no-class {}
.breadcrumb > li, .breadcrumb > li + li:before {
  color: <?php echo esc_attr($breadcrumb_text_color); ?>;
}
<?php } if($breadcrumb_link_color) { ?>
.no-class {}
.breadcrumb > li > a  {
  color: <?php echo esc_attr($breadcrumb_link_color); ?>;
}
<?php } if($breadcrumb_link_hover_color) { ?>
.no-class {}
.breadcrumb > li > a:hover, .breadcrumb > li > a:focus {
  color: <?php echo esc_attr($breadcrumb_link_hover_color); ?>;
}
<?php } if($breadcrumb_bg_color) { ?>
.no-class {}
.segva-page-title {
  background: <?php echo esc_attr($breadcrumb_bg_color); ?>;
}
<?php }
/* Footer */
$footer_bg_color  = cs_get_customize_option( 'footer_bg_color' );
$footer_heading_color  = cs_get_customize_option( 'footer_heading_color' );
$footer_text_color  = cs_get_customize_option( 'footer_text_color' );
$footer_link_color  = cs_get_customize_option( 'footer_link_color' );
$footer_link_hover_color  = cs_get_customize_option( 'footer_link_hover_color' );
if ($footer_bg_color) { ?>
.no-class {}
.segva-footer {
  background: <?php echo esc_attr($footer_bg_color); ?>;
}
<?php } if ($footer_heading_color) { ?>
.no-class {}
.segva-footer .widget-title {
  color: <?php echo esc_attr($footer_heading_color); ?>;
}
<?php } if ($footer_text_color) { ?>
.no-class {}
 .segva-footer .segva-copyright, .segva-footer .segva-widget ul li, .segva-footer .segva-widget table td,
  .segva-footer .recent-post h5,  .segva-footer .segva-secondary p,  .segva-footer .rssSummary, 
   .segva-footer .segva-widget ul li,  .segva-footer .segva-widget table td,  .segva-footer rss-date, .segva-footer p, .segva-footer .segva-widget table th, .footer-wrap ul li span, .footer-wrap .woocommerce ul.product_list_widget .woocommerce-Price-amount, .footer-wrap .nice-select, .footer-wrap .segva-widget table td, .footer-wrap .segva-widget #wp-calendar caption, .footer-wrap .woocommerce .widget_shopping_cart .total strong, .footer-wrap .woocommerce.widget_shopping_cart .total strong, .woocommerce .footer-wrap input[type="text"], .woocommerce .footer-wrap input[type="text"]::placeholder, .segva-footer, .footer-wrap .select2-container--default .select2-selection--single .select2-selection__rendered, .footer-wrap .select2-container--default .select2-selection--single .select2-selection__placeholder, .segva-footer .segva-widget p {
  color: <?php echo esc_attr($footer_text_color); ?>;
}
<?php } if ($footer_link_color) { ?>
.no-class {}
 .segva-footer .segva-widget ul li a,  .segva-footer .segva-secondary a,  .segva-footer .banner-spot-info h4 a,
  .segva-footer a, .footer-wrap .segva-widget table td a, .footer-wrap .segva-widget.widget_recent_comments ul li a, .footer-wrap .segva-widget.widget_rss ul li a, .footer-wrap .tagcloud a, .footer-wrap .segva-widget table td a, .footer-wrap .widget_product_tag_cloud .tagcloud a, .segva-footer .segva-widget ul li a .product-title {
  color: <?php echo esc_attr($footer_link_color); ?>;
}
<?php } if ($footer_link_hover_color) { ?>
.no-class {}
.segva-footer .segva-widget ul li a:hover , .segva-footer .segva-secondary a:hover,  .segva-footer .banner-spot-info h4 a:hover,
  .segva-footer a:hover, .footer-wrap .segva-widget table td a:hover,
  .footer-wrap .segva-widget.widget_recent_comments ul li a:hover, 
.footer-wrap .segva-widget.widget_rss ul li a:hover,
.footer-wrap .tagcloud a:hover,
.footer-wrap .segva-widget table td a:hover, .footer-wrap .widget_product_tag_cloud .tagcloud a:hover,
.segva-footer .segva-widget ul li a .product-title:hover,
.segva-footer .segva-widget ul li a .product-title:focus {
  color: <?php echo esc_attr($footer_link_hover_color); ?>;
}
<?php } 
// Copyright Colors
$copyright_text_color  = cs_get_customize_option( 'copyright_text_color' );
$copyright_link_color  = cs_get_customize_option( 'copyright_link_color' );
$copyright_link_hover_color  = cs_get_customize_option( 'copyright_link_hover_color' );
$copyright_bg_color  = cs_get_customize_option( 'copyright_bg_color' );

if ($copyright_text_color) { ?>
.no-class {}
.segva-copyright , .segva-copyright ul li, .segva-copyright p, .cprt-left, cprt-right, .segva-footer .segva-copyright p {
  color: <?php echo esc_attr($copyright_text_color); ?>;
}
<?php } if ($copyright_link_color) { ?>
.no-class {}
.segva-copyright a, .segva-footer .segva-copyright p a {
  color: <?php echo esc_attr($copyright_link_color); ?>;
}
<?php } if ($copyright_link_hover_color) { ?>
.no-class {}
.segva-copyright a:hover, .segva-copyright a:focus, .segva-footer .segva-copyright p a:hover, .segva-footer .segva-copyright p a:hover {
  color: <?php echo esc_attr($copyright_link_hover_color); ?>;
}
<?php } if ($copyright_bg_color) { ?>
.no-class {}
.segva-copyright.bottom {
  background-color: <?php echo esc_attr($copyright_bg_color); ?>;
}
<?php } 
// Content Colors
$body_color  = cs_get_customize_option( 'body_color' ); 
if ($body_color) { ?>
.no-class {}
body, p, .segva-slider-caption p, .segva-blog-detail p, .segva-content-side p, .project-detail-wrap p, .segva-team-single-section p, .textwidget p, .segva-services-wrap .service-item p, .blog-style-four span.blog-item-month, .segva-testimonials .testi-infos p, .faq-wrap.acc-style-two .card-body, .contact-section .contact-title-wrap h5.contact-item-title, .dl-horizontal dd, .dl-horizontal dt, .pricing-item ul li, .pricing-title h2 span, .pricing-item ul li.disable-feature, .pricing-item ul li:before, .pricing-item ul li.disable-feature:before, .segva-testimonials.testi-style-two h4.author-name span.author-designation, .blog-item.blog-default h6.blog-meta, .blog-globe-content, .segva-blog-detail blockquote p, .segva-content-side blockquote p, p.logged-in-as, .segva-form form input, .segva-form form input::placeholder, .segva-form form textarea, .segva-form form select, .segva-form form textarea::placeholder, .woocommerce-ordering .nice-select, .woocommerce ul.products li.product .price, .woocommerce div.product p.price, .woocommerce div.product span.price, .product_meta span, .comment-respond .comment-form-rating label, .woocommerce #review_form #respond textarea, .woocommerce #review_form #respond textarea::placeholder, form label, .woocommerce table.shop_table td, .woocommerce-cart table.cart td.actions .coupon .input-text, .woocommerce-cart table.cart td.actions .coupon .input-text::placeholder, .woocommerce.single-product p, .woocommerce table.shop_table td strong,
.woocommerce-MyAccount-content strong, .checkout_coupon.woocommerce-form-coupon p, .woocommerce input::placeholder, .woocommerce textarea::placeholder, .cspir-mid-wrap b, .woocommerce-order-received ul.order_details li, .woocommerce .woocommerce-customer-details address, .woocommerce-account address, .woocommerce form .form-row .select2-container, .woocommerce .select2-container--default .select2-selection--single .select2-selection__rendered,.woocommerce-cart .shipping-calculator-form .form-row input.input-text, .woocommerce-error, .woocommerce-info, .woocommerce-message, .woocommerce input, .woocommerce-Reviews input[type="text"], .woocommerce-Reviews input[type="email"], .woocommerce input[type="text"], .woocommerce input[type="tel"], .woocommerce input[type="email"], .woocommerce input[type="password"], .woocommerce-Reviews textarea, .woocommerce textarea, .woocommerce-cart table.cart td.actions .coupon .input-text, .woocommerce .woocommerce-checkout-review-order table.shop_table tbody .product-name, .woocommerce .woocommerce-checkout-review-order table.shop_table td.product-total, .woocommerce .woocommerce-checkout-review-order ul#shipping_method li label, .woocommerc p, .woocommerc span {
  color: <?php echo esc_attr($body_color); ?>;
}
.faq-wrap.acc-style-two .btn-link:before, .faq-wrap.acc-style-two .btn-link:after {
  background: <?php echo esc_attr($body_color); ?>;
}
<?php } 
$body_links_color  = cs_get_customize_option( 'body_links_color' );
if ($body_links_color) { ?>
.no-class {}
.caption-wrap .segva-border-link a, .segva-border-link a, .masonry-filters ul li a, .project-category a, .projects-style-two .project-category a, .blog-category a, .blog-meta a, .segva-link a, .horizontalslides .caption-wrap .segva-border-link a, .segva-controls-links a, .dl-horizontal dd a, .segva-social a, .about-info h4 a, .mate-info h5 a , .segva-social.square a, .pricing-item .segva-link a, .segva-full-height .segva-border-link a, blockquote cite a, .segva-blog-tags ul li a, .contact-info ul li a, input[type="submit"], .project-category span:after, .blog-info h4 a, .service-info h4 a, .process-item a .process-title, .services-left-wrap .segva-border-link a, .segva-link-wrap .segva-link, .blog-style-four .segva-link, .bpw-style-one .masonry-item .segva-link, .projects-style-three .project-info .project-title a, .projects-style-three .project-info .project-category a, a.contact-link-item, .blog-item.blog-default h6.blog-meta a, p.logged-in-as a, .woocommerce ul.products li.product .button, .woocommerce ul.products li.product a.added_to_cart.wc-forward, .woocommerce nav.woocommerce-pagination ul li a, .product_meta a, .woocommerce div.product .woocommerce-tabs ul.tabs li a, .woocommerce table.shop_table td.product-name a, .woocommerce-cart .cart-collaterals .shipping-calculator-button, .woocommerce-error a, .woocommerce-info a, .woocommerce-message a, .woocommerce-privacy-policy-text p a {
  color: <?php echo esc_attr($body_links_color); ?>;
}
.segva-border-link a:after, .segva-link a:after {
  background: <?php echo esc_attr($body_links_color); ?>;
}
.woocommerce-error a, .woocommerce-info a, .woocommerce-message a {
  border-color: <?php echo esc_attr($body_links_color); ?>;
}
<?php }

$body_link_hover_color  = cs_get_customize_option( 'body_link_hover_color' );
if ($body_link_hover_color) { ?>
.no-class {}
.caption-wrap .segva-border-link a:hover, .segva-border-link a:hover, .masonry-filters ul li a:hover, .project-category a:hover, .projects-style-two .project-category a:hover, .blog-category a:hover, .blog-meta a:hover, .segva-link a:hover, .horizontalslides .caption-wrap .segva-border-link a:hover, .segva-controls-links a:hover, .dl-horizontal dd a:hover, .segva-social a:hover, .about-info h4 a:hover, .mate-info h5 a:hover , .segva-social.square a:hover, .pricing-item .segva-link a:hover, .segva-full-height .segva-border-link a:hover, blockquote cite a:hover, .segva-blog-tags ul li a:hover, .contact-info ul li a:hover, input[type="submit"]:hover, .blog-info h4 a:hover, .masonry-filters ul li a.active, .service-info h4 a:hover, .process-item a:hover .process-title, .services-left-wrap .segva-border-link a:hover, .segva-link-wrap .segva-link:hover, .projects-style-two .project-title a:hover, .segva-services-wrap .service-title a:hover, .blog-style-four .segva-link:hover, .blog-style-four .segva-link:focus, .projects-style-three .project-info .project-title a:hover, .projects-style-three .project-info .project-category a:hover, a.contact-link-item:hover, a.contact-link-item:focus, h4.author-name a:hover, h4.author-name a:focus, .segva-testimonials.testi-style-two h4.author-name a:hover, .segva-testimonials.testi-style-two h4.author-name a:focus, .blog-item.blog-default h6.blog-meta a:hover, .blog-item.blog-default h6.blog-meta a:focus, p.logged-in-as a:hover, p.logged-in-as:focus,.woocommerce ul.products li.product .woocommerce-loop-product__title a:hover, .woocommerce ul.products li.product .woocommerce-loop-product__title a:focus,
.woocommerce ul.products li.product .button:hover, .woocommerce ul.products li.product a.added_to_cart.wc-forward:hover, .woocommerce nav.woocommerce-pagination ul li a:hover, .woocommerce nav.woocommerce-pagination ul li a:focus, .woocommerce nav.woocommerce-pagination ul li span, .woocommerce nav.woocommerce-pagination ul li a:focus, .woocommerce nav.woocommerce-pagination ul li a:hover, .woocommerce nav.woocommerce-pagination ul li span.current, .product_meta a:hover, .product_meta a:focus, .woocommerce div.product .woocommerce-tabs ul.tabs li a:hover, .woocommerce div.product .woocommerce-tabs ul.tabs li a:focus, .woocommerce div.product .woocommerce-tabs ul.tabs li.active a, .woocommerce table.shop_table td.product-name a:hover, .woocommerce table.shop_table td.product-name a:focus, .woocommerce-cart .cart-collaterals .shipping-calculator-button:hover, .woocommerce-error a:hover, .woocommerce-info a:hover, .woocommerce-message a:hover, .woocommerce-privacy-policy-text p a:hover, .woocommerce-privacy-policy-text p a:focus {
  color: <?php echo esc_attr($body_link_hover_color); ?>;
}
.segva-border-link a:hover:after, .segva-link a:hover:after {
  background-color: <?php echo esc_attr($body_link_hover_color); ?>;
}
<?php }

$body_link_border_color  = cs_get_customize_option( 'body_link_border_color' );
if ($body_link_border_color) { ?>
.no-class {}
.segva-link-wrap .segva-link:after, .masonry-filters ul li a:after, .blog-style-four .segva-link:hover:after  {
  background: <?php echo esc_attr($body_link_border_color); ?>;
}

<?php }

$sidebar_content_color  = cs_get_customize_option( 'sidebar_content_color' );
if ($sidebar_content_color) { ?>
.no-class {}
.recent-post h5, .segva-secondary p, .rssSummary, .segva-secondary ul li, .segva-secondary table td, rss-date,
.segva-secondary .recent-post h5.post-time, 
.segva-secondary .nice-select, 
.segva-secondary #wp-calendar caption,
.segva-secondary table th,
.segva-secondary .rss-date,
.segva-secondary.widget_search form input[type="text"], 
.segva-secondary.widget_search form input[type="text"]::placeholder,
.segva-secondary.widget_product_search input[type="search"],
.segva-secondary.widget_product_search input[type="search"]::placeholder,
.segva-secondary.widget_shopping_cart ul.product_list_widget li .amount, 
.segva-secondary.widget_shopping_cart ul.product_list_widget li .quantity,
.segva-secondary.widget_shopping_cart .total strong,
.segva-secondary.widget_price_filter .price_slider_amount,
.segva-secondary .select2-container .select2-search--inline .select2-search__field::placeholder,
.segva-secondary .select2-results__options,
.segva-secondary .select2-container--default .select2-selection--single .select2-selection__placeholder,
.segva-secondary ul.product_list_widget .woocommerce-Price-amount {
  color: <?php echo esc_attr($sidebar_content_color); ?>;
}
<?php }
$sidebar_links_color  = cs_get_customize_option( 'sidebar_links_color' );
if ($sidebar_links_color) { ?>
.no-class {}
.segva-secondary ul li a, .segva-secondary a, .banner-spot-info h4 a, .segva-secondary .recent-post a,
.segva-secondary .segva-secondary ul li a,
.segva-secondary table td a {
  color: <?php echo esc_attr($sidebar_links_color); ?>;
}
<?php }
$sidebar_links_hover_color  = cs_get_customize_option( 'sidebar_links_hover_color' );
if ($sidebar_links_hover_color) { ?>
.no-class {}
.segva-secondary ul li a:hover, .segva-secondary a:hover, .banner-spot-info h4 a:hover, 
.segva-secondary .recent-post a:hover, .segva-secondary .recent-post a:focus,
.segva-secondary .segva-secondary ul li a:hover,
.segva-secondary .segva-secondary ul li a:focus,
.segva-secondary table td a:hover, .segva-secondary table td a:focus {
  color: <?php echo esc_attr($sidebar_links_hover_color); ?>;
}
<?php }
$content_heading_color  = cs_get_customize_option( 'content_heading_color' );
if ($content_heading_color) { ?>
.no-class {}
.segva-slider-caption h2, .section-title-wrap h2, .segva-big-title-wrap .big-title, .banner-wrap h2, .project-detail-wrap h3,
.banner-style-two .banner-wrap h1, .my-info h1, .services-left-wrap h2, .counter-item h2, .pricing-title .title, .pricing-title .price,
.error-wrap h1, .get-in-touch h1, .projects-style-two .project-title a, .segva-services-wrap .service-title a, .faq-wrap.acc-style-two .btn-link, .projects-style-three .project-info .project-title a, .section-values-wrap h3.values-title, h4.author-name a, .progress-item h4, .pricing-title h2, .segva-testimonials.testi-style-two h4.author-name a, .segva-blog-detail .comment-reply-title, .woocommerce ul.products li.product .woocommerce-loop-product__title a, .woocommerce div.product .product_title, .product_meta span.meta-title, .woocommerce #reviews #comments h2, .woocommerce-tabs.wc-tabs-wrapper .woocommerce-Reviews span#reply-title, .woocommerce .cart-collaterals .cart_totals h2, .woocommerce-page .cart-collaterals .cart_totals h2, .woocommerce table.shop_table th, #add_payment_method .cart-collaterals .cart_totals table th, .woocommerce-cart .cart-collaterals .cart_totals table th, .woocommerce-checkout .cart-collaterals .cart_totals table th, h4.contact-addrs-title {
  color: <?php echo esc_attr($content_heading_color); ?>;
}
<?php }
$sidebar_heading_color  = cs_get_customize_option( 'sidebar_heading_color' );
if ($sidebar_heading_color) { ?>
.no-class {}
.segva-secondary  .widget_categories h4.widget-title, .segva-secondary  h4.widget-title {
  color: <?php echo esc_attr($sidebar_heading_color); ?>;
}
<?php }
// Maintenance Mode
$maintenance_mode_bg  = cs_get_option( 'maintenance_mode_bg' );
if ($maintenance_mode_bg) {
  $maintenance_css = ( ! empty( $maintenance_mode_bg['image'] ) ) ? 'background-image: url('. $maintenance_mode_bg['image'] .');' : '';
  $maintenance_css .= ( ! empty( $maintenance_mode_bg['repeat'] ) ) ? 'background-repeat: '. $maintenance_mode_bg['repeat'] .';' : '';
  $maintenance_css .= ( ! empty( $maintenance_mode_bg['position'] ) ) ? 'background-position: '. $maintenance_mode_bg['position'] .';' : '';
  $maintenance_css .= ( ! empty( $maintenance_mode_bg['attachment'] ) ) ? 'background-attachment: '. $maintenance_mode_bg['attachment'] .';' : '';
  $maintenance_css .= ( ! empty( $maintenance_mode_bg['size'] ) ) ? 'background-size: '. $maintenance_mode_bg['size'] .';' : '';
  $maintenance_css .= ( ! empty( $maintenance_mode_bg['color'] ) ) ? 'background-color: '. $maintenance_mode_bg['color'] .';' : ''; ?>
  .vt-maintenance-mode {
    <?php echo esc_attr($maintenance_css); ?>
  }
<?php } 
// Mobile Menu Breakpoint
$mobile_breakpoint = cs_get_option('mobile_breakpoint');
$breakpoint = $mobile_breakpoint ? $mobile_breakpoint : '1199'; ?>
@media (max-width: <?php echo esc_attr($breakpoint); ?>px) {
  .no-class {}
  .segva-header .segva-navigation,
  .segva-header .segva-navigation-col {
    display: none!important;
  }
  .segva-sidebar-toggle,
  .segva-header-three .segva-full-wrap .segva-sidebar-toggle {
    display: none;
  }
  .segva-center-header .segva-toggle {
    display: none;
  }
  .segva-toggle.active,
  .segva-header-right .segva-navigation {
    display: none !important;
  }
  .header-segva-style-two .navi-toggle {
    display: none;
  }
  .header-five-menu-toggle {
    display: none;
  }
  .segva-header-three .segva-sidebar-nav {
    position: relative;
    width: 100%;
    height: auto;
    background: #ffffff;
    z-index: 3;
    top: 0;
  }
  .segva-header-three .sidebar-nav-wrap {
    padding: 13px 35px;
  }
  .segva-header-three .sidebar-nav-wrap .segva-brand {
    text-align: left;
    padding: 7px 0 20px;
    float: left;
  }
  .segva-header-three .mean-container .mean-bar {
    width: 95%;
    top: 0;
    left: 0;
    right: 0;
    margin: 0 auto;
  }
  .segva-header-three .segva-sidebar-nav nav.segva-navigation {
    display: none !important;
  }
  .has-sidebarnav .segva-main-wrap {
    margin-left: 0 !important;
  }
  .sidebarnav-open .segva-sidebar-nav {
    -webkit-transform: translateX(0);
    -ms-transform: translateX(0);
    transform: translateX(0);
  }
  .sidebarnav-open .segva-full-wrap, .sidebarnav-open .segva-footer {
    -webkit-transform: translateX(300px);
    -ms-transform: translateX(300px);
    transform: translateX(300px);
  }
  .segva-full-wrap .segva-sidebar-toggle {
    display: block;
  }
  .has-sidebarnav .segva-footer {
    width: 100%;
    left: 0;
  }
  .segva-main-wrap.segva-header-three, .has-sidebarnav .segva-banner.slider-cnt-left .caption-wrap {
    width: 100%;
    margin-left: 0;
  }
  .segva-navigation-wrap {
    display: none;
  }
  nav.sidebar-nav-wrap.sidebar-menu-two,
  .sidebar-nav-wrap .segva-navigation {
    display: none !important;
  }
  .header-links-wrap {
    display: none;
  }
  .header-segva-style-three.header-segva-style-five .segva-header .logo-wraper {
    padding-bottom: 0;
  }
  .header-segva-style-three.header-segva-style-five .menu-wraper {
    display: none;
  }
  .segva-sidebar-nav .segva-social,  .segva-sidebar-nav  .segva-copyright {
    display: none;
  }
  .segva-sidebar-nav .sidebar-nav-wrap.mean-container {
    padding: 30px 40px 30px;
    position: relative;
    border-bottom: 1px solid #f1f1f1;
  }
  .segva-wrapper {
    padding-left: 0;
  }
  .segva-sidebar-nav {
    position: relative;
    overflow: unset;
  }
  .segva-sidebar-nav .mean-container a.meanmenu-reveal {
    top: 40px;
    right: 20px !important;
  }
  .segva-main-wrap.side-nav-menu-class .toggle-link{
    display: none;
  }
  .segva-sidebar-nav {
    -webkit-transform: none;
    -ms-transform: none;
    transform: none;
  }
  .side-nav-menu-class .segva-sidebar-nav {
    width: 100%;
    height: auto;
    display: inline;
  }
  .admin-bar .segva-sidebar-nav {
    top: 0;
    height: calc(100% - 32px);
    width: 100%;
  }
  .sidebar-part1 {
    overflow: visible;
    width: 100%;
    padding: 0;
  }
  .sidebar-part2 {
    display: none;
  }
}
<?php
$segovia_vt_get_typography  = segovia_vt_get_typography();
echo $segovia_vt_get_typography;
