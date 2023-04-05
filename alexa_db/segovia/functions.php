<?php
/*
 * Segovia Theme's Functions
 * Author & Copyright: VictorThemes
 * URL: https://victorthemes.com/wp-themes
 */

/**
 * Define - Folder Paths
 */
define( 'SEGOVIA_THEMEROOT_PATH', get_template_directory() );
define( 'SEGOVIA_THEMEROOT_URI', get_template_directory_uri() );
define( 'SEGOVIA_CSS', SEGOVIA_THEMEROOT_URI . '/assets/css' );
define( 'SEGOVIA_IMAGES', SEGOVIA_THEMEROOT_URI . '/assets/images' );
define( 'SEGOVIA_SCRIPTS', SEGOVIA_THEMEROOT_URI . '/assets/js' );
define( 'SEGOVIA_FRAMEWORK', get_template_directory() . '/inc' );
define( 'SEGOVIA_LAYOUT', get_template_directory() . '/layouts' );
define( 'SEGOVIA_CS_IMAGES', SEGOVIA_THEMEROOT_URI . '/inc/theme-options/theme-extend/images' );
define( 'SEGOVIA_CS_FRAMEWORK', get_template_directory() . '/inc/theme-options/theme-extend' ); // Called in Icons field *.json
define( 'SEGOVIA_ADMIN_PATH', get_template_directory() . '/inc/theme-options/cs-framework' ); // Called in Icons field *.json

/**
 * Define - Global Theme Info's
 */
if (is_child_theme()) { // If Child Theme Active
	$segovia_theme_child = wp_get_theme();
	$segovia_get_parent = $segovia_theme_child->Template;
	$segovia_theme = wp_get_theme($segovia_get_parent);
} else { // Parent Theme Active
	$segovia_theme = wp_get_theme();
}
define('SEGOVIA_NAME', $segovia_theme->get( 'Name' ));
define('SEGOVIA_VERSION', $segovia_theme->get( 'Version' ));
define('SEGOVIA_BRAND_URL', $segovia_theme->get( 'AuthorURI' ));
define('SEGOVIA_BRAND_NAME', $segovia_theme->get( 'Author' ));

/**
 * All Main Files Include
 */
require_once( SEGOVIA_FRAMEWORK . '/init.php' );
