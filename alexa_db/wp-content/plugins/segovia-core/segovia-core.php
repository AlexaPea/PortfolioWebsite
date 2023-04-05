<?php
/*
Plugin Name: Segovia Core
Plugin URI: https://victorthemes.com/wp-themes
Description: Plugin to contain shortcodes and custom post types of the segovia theme.
Author: VictorThemes
Author URI: https://victorthemes.com/wp-themes/segovia
Version: 1.5.1
Text Domain: segovia-core
*/

if( ! function_exists( 'segovia_block_direct_access' ) ) {
	function segovia_block_direct_access() {
		if( ! defined( 'ABSPATH' ) ) {
			exit( 'Forbidden' );
		}
	}
}

// Plugin URL
define( 'SEGOVIA_PLUGIN_URL', plugins_url( '/', __FILE__ ) );

// Plugin PATH
define( 'SEGOVIA_PLUGIN_PATH', plugin_dir_path( __FILE__ ) );
define( 'SEGOVIA_PLUGIN_ASTS', SEGOVIA_PLUGIN_URL . 'assets' );
define( 'SEGOVIA_PLUGIN_IMGS', SEGOVIA_PLUGIN_ASTS . '/images' );
define( 'SEGOVIA_IMGS_METABOX', SEGOVIA_PLUGIN_IMGS . '/metabox' );
define( 'SEGOVIA_PLUGIN_INC', SEGOVIA_PLUGIN_PATH . 'inc' );

// DIRECTORY SEPARATOR
// define ( 'DS' , DIRECTORY_SEPARATOR );

// Segovia Shortcode Path
// define( 'SEGOVIA_SHORTCODE_PATH', SEGOVIA_SHORTCODE_PATHORTCODE_BASE_PATH . 'shortcodes/' );

// SaaSpot Elementor Shortcode Path
define( 'SEGOVIA_EM_SHORTCODE_BASE_PATH', SEGOVIA_PLUGIN_PATH . 'elementor/' );
define( 'SEGOVIA_EM_SHORTCODE_PATH', SEGOVIA_EM_SHORTCODE_BASE_PATH . 'widgets/' );

/**
 * Check if Codestar Framework is Active or Not!
 */
if( ! function_exists( 'segovia_framework_active' ) ) {
  function segovia_framework_active() {
    return ( defined( 'CS_VERSION' ) ) ? true : false;
  }
}

/**
 * Exertion Core Plugin is Activated
 */
if( ! function_exists( 'segovia_core_plugin_status' ) ) {
  function segovia_core_plugin_status() {
    return true;
  }
}

// cs_get_option
if ( ! function_exists( 'cs_get_option' ) ) {
  function cs_get_option( $option_name = '', $default = '' ) {

    if (segovia_framework_active()) {
      $options = apply_filters( 'cs_get_option', get_option( CS_OPTION ), $option_name, $default );
    } else {
      $options = '';
    }

    if( ! empty( $option_name ) && ! empty( $options[$option_name] ) ) {
      return $options[$option_name];
    } else {
      return ( ! empty( $default ) ) ? $default : null;
    }

  }
}

// cs_get_customize_option
if ( ! function_exists( 'cs_get_customize_option' ) ) {
  function cs_get_customize_option( $option_name = '', $default = '' ) {

    if (segovia_framework_active()) {
      $options = apply_filters( 'cs_get_customize_option', get_option( CS_CUSTOMIZE ), $option_name, $default );
    } else {
      $options = '';
    }

    if( ! empty( $option_name ) && ! empty( $options[$option_name] ) ) {
      return $options[$option_name];
    } else {
      return ( ! empty( $default ) ) ? $default : null;
    }

  }
}

/* Portfolio Share Options */
if ( ! function_exists( 'segovia_portfolio_share_option' ) ) {
  function segovia_portfolio_share_option() {

    global $post;
    $page_url = get_permalink($post->ID );
    $media_url =  get_the_post_thumbnail_url();
    $title = $post->post_title;
    if (segovia_framework_active()) {
      $share_text = cs_get_option('share_text');
      $share_text = $share_text ? $share_text : esc_html__( 'Share', 'segovia' );
      $share_on_text = cs_get_option('share_on_text');
      $share_on_text = $share_on_text ? $share_on_text : esc_html__( 'Share On', 'segovia' );
    } else {
      $share_text = esc_html__( 'Share', 'segovia' );
      $share_on_text = esc_html__( 'Share On', 'segovia' );
    }
    ?>
     <dt><?php echo esc_attr($share_text); ?></dt>
      <dd>
        <div class="segva-social">
        <a href="//www.facebook.com/share.php?u=<?php print(urlencode($page_url)); ?>&amp;t=<?php print(urlencode($title)); ?>" title="<?php echo esc_attr('Facebook', 'segovia'); ?>" target="_blank">
          <span class="sewl-table-container"><span class="sewl-align-container"><i class="fa fa-facebook"></i></span></span>
        </a>
        <a href="//twitter.com/intent/tweet?text=<?php print(urlencode($title)); ?>&url=<?php print(urlencode($page_url)); ?>" title="<?php  echo esc_attr('Twitter', 'segovia'); ?>" target="_blank"><span class="sewl-table-container"><span class="sewl-align-container"><i class="fa fa-twitter"></i></span></span></a>
        <a href="//www.linkedin.com/shareArticle?mini=true&amp;url=<?php print(urlencode($page_url)); ?>&amp;title=<?php print(urlencode($title)); ?>" title="<?php echo esc_attr('Linkedin', 'segovia'); ?>" target="_blank"><span class="sewl-table-container"><span class="sewl-align-container"><i class="fa fa-linkedin"></i></span></span></a>
        <a href="//pinterest.com/pin/create/button/?url=<?php print(urlencode($page_url)); ?>&media=<?php print(urlencode($media_url)); ?>" title="<?php echo esc_attr('Pinterest', 'segovia'); ?>" target="_blank"><span class="sewl-table-container"><span class="sewl-align-container"><i class="fa fa-pinterest"></i></span></span></a>
      </div>
    </dd>
<?php
  }
}

/* Share Options */
if ( ! function_exists( 'segovia_wp_share_option' ) ) {
  function segovia_wp_share_option() {

    global $post;
    $page_url = get_permalink($post->ID );
    $media_url =  get_the_post_thumbnail_url();
    $title = $post->post_title;
    if (segovia_framework_active()) {
      $share_on_text = cs_get_option('share_on_text');
      $share_on_text = $share_on_text ? $share_on_text : esc_html__( 'Share On', 'segovia' );
    } else {
      $share_on_text = esc_html__( 'Share On', 'segovia' );
    }
    ?>
<div class="segva-blog-share">
      <div class="segva-social">
        <a href="//twitter.com/intent/tweet?text=<?php print(urlencode($title)); ?>&url=<?php print(urlencode($page_url)); ?>" class="icon-fa-twitter" data-toggle="tooltip" data-placement="top" title="<?php echo esc_attr( $share_on_text .' '); echo esc_attr('Twitter', 'segovia'); ?>" target="_blank"><i class="fa fa-twitter"></i></a>
        <a href="//www.facebook.com/sharer/sharer.php?u=<?php print(urlencode($page_url)); ?>&amp;t=<?php print(urlencode($title)); ?>" class="icon-fa-facebook" data-toggle="tooltip" data-placement="top" title="<?php echo esc_attr( $share_on_text .' '); echo esc_attr('Facebook', 'segovia'); ?>" target="_blank"><i class="fa fa-facebook"></i></a>
        <a href="//www.linkedin.com/shareArticle?mini=true&amp;url=<?php print(urlencode($page_url)); ?>&amp;title=<?php print(urlencode($title)); ?>" class="icon-fa-linkedin" data-toggle="tooltip" data-placement="top" title="<?php echo esc_attr( $share_on_text .' '); echo esc_attr('Linkedin', 'segovia'); ?>" target="_blank"><i class="fa fa-linkedin"></i></a>
        <a href="//pinterest.com/pin/create/button/?url=<?php print(urlencode($page_url)); ?>&media=<?php print(urlencode($media_url)); ?>" title="<?php echo esc_attr( $share_on_text .' '); echo esc_attr('Pinterest', 'segovia'); ?>" target="_blank"><i class="fa fa-pinterest-p"></i></a>
    </div>
  </div>
<?php
  }
}

if ( ! function_exists( 'segovia_port_term_option' ) ) {
  function segovia_port_term_option() {
     $terms = get_terms('portfolio_category');
      $count = count($terms);
      $i=0;
      $term_list = '';
      if ($count > 0) {
        foreach ($terms as $term) {
          $i++;
          $term_list .= '<li><a href="#0" class="filter cat-'. $term->slug .'" data-filter=".'. $term->slug .'-item" title="' . esc_attr($term->name) . '">' . $term->name . '</a></li>';
          if ($count != $i) {
            $term_list .= '';
          } else {
            $term_list .= '';
          }
        }
        echo $term_list;
      }
  }
}

/* Inline Style */
global $all_inline_styles;
$all_inline_styles = array();
if( ! function_exists( 'add_inline_style' ) ) {
  function add_inline_style( $style ) {
    global $all_inline_styles;
    array_push( $all_inline_styles, $style );
  }
}

/* Enqueue Inline Styles */
if ( ! function_exists( 'segovia_enqueue_inline_styles' ) ) {
  function segovia_enqueue_inline_styles() {

    global $all_inline_styles;

    if ( ! empty( $all_inline_styles ) ) {
      echo '<style id="segovia-inline-style" type="text/css">'. segovia_compress_css_lines( join( '', $all_inline_styles ) ) .'</style>';
    }

  }
  // add_action( 'wp_footer', 'segovia_enqueue_inline_styles' );
}

/* Custom WordPress admin login logo */
if( ! function_exists( 'segovia_theme_login_logo' ) ) {
  function segovia_theme_login_logo() {
    if (segovia_framework_active()) {
      $login_logo = cs_get_option('brand_logo_wp');
      if($login_logo) {
        $login_logo_url = wp_get_attachment_url($login_logo);
      } else {
        $login_logo_url = SEGOVIA_PLUGIN_ASTS . '/logo.png';
      }
    } else {
      $login_logo_url = SEGOVIA_PLUGIN_ASTS . '/logo.png';
    }
    if($login_logo) {
    echo "
      <style>
        body.login #login h1 a {
        background: url('$login_logo_url') no-repeat scroll center bottom transparent;
        height: 100px;
        width: 100%;
        margin-bottom:0px;
        }
      </style>";
    }
  }
  add_action('login_head', 'segovia_theme_login_logo');
}

/* WordPress admin login logo link */
if( ! function_exists( 'segovia_login_url' ) ) {
  function segovia_login_url() {
    return site_url();
  }
  add_filter( 'login_headerurl', 'segovia_login_url', 10, 4 );
}

/* WordPress admin login logo link */
if( ! function_exists( 'segovia_login_title' ) ) {
  function segovia_login_title() {
    return get_bloginfo('name');
  }
  add_filter('login_headertext', 'segovia_login_title');
}


/* VTHEME_NAME_P */
define('VTHEME_NAME_P', 'Segovia');

// Initial File
include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
if (is_plugin_active('segovia-core/segovia-core.php')) {

	// Custom Post Type
	require_once( SEGOVIA_PLUGIN_INC . '/custom-post-type.php' );
  if (segovia_framework_active()) {
    $img_resizer = cs_get_option('theme_img_resizer');
    // Aq Resizer
    if(!$img_resizer) {
      require_once( SEGOVIA_PLUGIN_INC . '/aq_resizer.php' );
    }
  }

  if (defined( 'CS_VERSION' )) {
    require_once( SEGOVIA_PLUGIN_INC . '/theme-metabox.php' );
  }
   /* Breadcrumbs */
  require_once( SEGOVIA_PLUGIN_INC . '/breadcrumb-trail.php' );

  // Shortcodes
  // require_once( SEGOVIA_SHORTCODE_BASE_PATH . 'vc-setup.php' );
  require_once( SEGOVIA_PLUGIN_INC . '/custom-shortcodes/theme-shortcodes.php' );
  require_once( SEGOVIA_PLUGIN_INC . '/custom-shortcodes/custom-shortcodes.php' );

  if (segovia_framework_active()) {
    // Widgets
    require_once( SEGOVIA_PLUGIN_INC . '/widgets/recent-posts.php' );
    require_once( SEGOVIA_PLUGIN_INC . '/widgets/text-widget.php' );
    require_once( SEGOVIA_PLUGIN_INC . '/widgets/widget-extra-fields.php' );
  }

  // Elementor
  if( defined('ELEMENTOR_PATH') && file_exists( SEGOVIA_EM_SHORTCODE_BASE_PATH . '/em-setup.php' ) ) {
    require_once( SEGOVIA_EM_SHORTCODE_BASE_PATH . '/em-setup.php' );
  }

}

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


// Portfolio Filter

if( ! function_exists( 'segovia_portfolio_filter' ) ) {
   function segovia_portfolio_filter() {?>

      <div class="masonry-filters ">
      <ul>
        <li><a href="javascript:void(0);" data-filter="*" class="active"><?php esc_html_e('Show all', 'segovia-core'); ?></a></li>
        <?php
            $terms = get_terms('portfolio_category');
            $count = count($terms);
            $i=0;
            $term_list = '';
            if ($count > 0) {
              foreach ($terms as $term) {
                $i++;
                $term_list .= '<li><a href="#0" class="filter cat-'. $term->slug .'" data-filter=".'. $term->slug .'-item" title="' . esc_attr($term->name) . '">' . $term->name . '</a></li>';
                if ($count != $i) {
                  $term_list .= '';
                } else {
                  $term_list .= '';
                }
              }
              echo $term_list;
            }
        ?>
      </ul>
    </div>

<?php } }

/* Validate px entered in field */
if( ! function_exists( 'segovia_core_check_px' ) ) {
  function segovia_core_check_px( $num ) {
    return ( is_numeric( $num ) ) ? $num . 'px' : $num;
  }
}

/**
 * Plugin language
 */
function segovia_plugin_language_setup() {
  load_plugin_textdomain( 'segovia-core', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' );
}
add_action( 'init', 'segovia_plugin_language_setup' );

/* WPAUTOP for shortcode output */
if( ! function_exists( 'segovia_set_wpautop' ) ) {
  function segovia_set_wpautop( $content, $force = true ) {
    if ( $force ) {
      $content = wpautop( preg_replace( '/<\/?p\>/', "\n", $content ) . "\n" );
    }
    return do_shortcode( shortcode_unautop( $content ) );
  }
}

/* Use shortcodes in text widgets */
add_filter('widget_text', 'do_shortcode');

/* Shortcodes enable in the_excerpt */
add_filter('the_excerpt', 'do_shortcode');

/* Remove p tag and add by our self in the_excerpt */
remove_filter('the_excerpt', 'wpautop');

/* Add Extra Social Fields in Admin User Profile */
function segovia_add_twitter_facebook( $contactmethods ) {
  $contactmethods['facebook']   = 'Facebook';
  $contactmethods['twitter']    = 'Twitter';
  $contactmethods['vine']  = 'Vine';
  $contactmethods['pinterest']   = 'Pinterest';
  $contactmethods['instagram']   = 'Instagram';
  return $contactmethods;
}
add_filter('user_contactmethods','segovia_add_twitter_facebook',10,1);

/**
 *
 * Encode string for backup options
 *
 * @since 1.0.0
 * @version 1.0.0
 *
 */
if ( ! function_exists( 'cs_encode_string' ) ) {
  function cs_encode_string( $string ) {
    return rtrim( strtr( call_user_func( 'base'. '64' .'_encode', addslashes( gzcompress( serialize( $string ), 9 ) ) ), '+/', '-_' ), '=' );
  }
}

/**
 *
 * Decode string for backup options
 *
 * @since 1.0.0
 * @version 1.0.0
 *
 */
if ( ! function_exists( 'cs_decode_string' ) ) {
  function cs_decode_string( $string ) {
    return unserialize( gzuncompress( stripslashes( call_user_func( 'base'. '64' .'_decode', rtrim( strtr( $string, '-_', '+/' ), '=' ) ) ) ) );
  }
}

/**
 * One Click Install
 * @return Import Demos - Needed Import Demo's
 */
function segovia_import_files() {
  return array(
    array(
      'import_file_name'           => 'Segovia',
      'import_file_url'            => trailingslashit( SEGOVIA_PLUGIN_URL ) . 'inc/import/content.xml',
      'import_widget_file_url'     => trailingslashit( SEGOVIA_PLUGIN_URL ) . 'inc/import/widget.wie',
      'import_customizer_file_url' => trailingslashit( SEGOVIA_PLUGIN_URL ) . 'inc/import/customize.dat',
      'local_import_csf'           => array(
        array(
          'file_path'   => trailingslashit( SEGOVIA_PLUGIN_URL ) . 'inc/import/theme-options.json',
          'option_name' => '_cs_options',
        ),
      ),
      'import_preview_image_url'   => trailingslashit( SEGOVIA_PLUGIN_URL ) . 'inc/import/screenshot.jpg',
      'import_notice'              => __( 'Import process may take 3-5 minutes, please be patient. It\'s really based on your network speed.', 'segovia-core' ),
      // 'preview_url'                => 'https://victorthemes.com/themes/segovia/',
    ),
  );
}
add_filter( 'pt-ocdi/import_files', 'segovia_import_files' );

/**
 * One Click Import Function for CodeStar Framework
 */
if ( ! function_exists( 'csf_after_content_import_execution' ) ) {
  function csf_after_content_import_execution( $selected_import_files, $import_files, $selected_index ) {

    $downloader = new OCDI\Downloader();

    if( ! empty( $import_files[$selected_index]['import_csf'] ) ) {

      foreach( $import_files[$selected_index]['import_csf'] as $index => $import ) {
        $file_path = $downloader->download_file( $import['file_url'], 'demo-csf-import-file-'. $index . '-'. date( 'Y-m-d__H-i-s' ) .'.json' );
        $file_raw  = OCDI\Helpers::data_from_file( $file_path );
        update_option( $import['option_name'], json_decode( $file_raw, true ) );
      }

    } else if( ! empty( $import_files[$selected_index]['local_import_csf'] ) ) {

      foreach( $import_files[$selected_index]['local_import_csf'] as $index => $import ) {
        $file_path = $import['file_path'];
        $file_raw  = OCDI\Helpers::data_from_file( $file_path );
        update_option( $import['option_name'], json_decode( $file_raw, true ) );
      }

    }

    // Put info to log file.
    $ocdi       = OCDI\OneClickDemoImport::get_instance();
    $log_path   = $ocdi->get_log_file_path();

    OCDI\Helpers::append_to_file( 'Codestar Framework files loaded.'. $logs, $log_path );

  }
  add_action('pt-ocdi/after_content_import_execution', 'csf_after_content_import_execution', 3, 99 );
}

/**
 * [segovia_after_import_setup]
 * @return Front Page, Post Page & Menu Set
 */
function segovia_after_import_setup() {
    // Assign menus to their locations.
    $main_menu = get_term_by( 'name', 'Main Menu', 'nav_menu' );

    set_theme_mod( 'nav_menu_locations', array(
        'primary' => $main_menu->term_id,
      )
    );

    // Assign front page and posts page (blog page).
    $front_page_id = get_page_by_title( 'Home V1' );
    $blog_page_id  = get_page_by_title( 'Blog' );

    update_option( 'show_on_front', 'page' );
    update_option( 'page_on_front', $front_page_id->ID );
    update_option( 'page_for_posts', $blog_page_id->ID );

}
add_action( 'pt-ocdi/after_import', 'segovia_after_import_setup' );

// Install Demos Menu - Menu Edited
function segovia_core_one_click_page( $default_settings ) {
  $default_settings['parent_slug'] = 'themes.php';
  $default_settings['page_title']  = esc_html__( 'Install Demos', 'segovia-core' );
  $default_settings['menu_title']  = esc_html__( 'Install Demos', 'segovia-core' );
  $default_settings['capability']  = 'import';
  $default_settings['menu_slug']   = 'install_demos';

  return $default_settings;
}
add_filter( 'pt-ocdi/plugin_page_setup', 'segovia_core_one_click_page' );

// Model Popup - Width Increased
function segovia_ocdi_confirmation_dialog_options ( $options ) {
  return array_merge( $options, array(
    'width'       => 600,
    'dialogClass' => 'wp-dialog',
    'resizable'   => false,
    'height'      => 'auto',
    'modal'       => true,
  ) );
}
add_filter( 'pt-ocdi/confirmation_dialog_options', 'segovia_ocdi_confirmation_dialog_options', 10, 1 );

// Disable the branding notice - ProteusThemes
add_filter( 'pt-ocdi/disable_pt_branding', '__return_true' );

function ocdi_plugin_intro_text( $default_text ) {
  $auto_install = admin_url('themes.php?page=install_demos');
  $manual_install = admin_url('themes.php?page=install_demos&import-mode=manual');
  $default_text .= '<h1>Install Demos</h1>
  <div class="segovia-core_intro-text vtdemo-one-click">
  <div id="poststuff">

    <div class="postbox important-notes">
      <h3><span>Important notes:</span></h3>
      <div class="inside">
        <ol>
          <li>Please note, this import process will take time. So, please be patient.</li>
          <li>Please make sure you\'ve installed recommended plugins before you import this content.</li>
          <li>All images are demo purposes only. So, images may repeat in your site content.</li>
        </ol>
      </div>
    </div>

    <div class="postbox vt-support-box vt-error-box">
      <h3><span>Don\'t Edit Parent Theme Files:</span></h3>
      <div class="inside">
        <p>Don\'t edit any files from parent theme! Use only a <strong>Child Theme</strong> files for your customizations!</p>
        <p>If you get future updates from our theme, you\'ll lose edited customization from your parent theme.</p>
      </div>
    </div>

    <div class="postbox vt-support-box">
      <h3><span>Need Support?</span> <a href="https://www.youtube.com/watch?v=Why7Zijp-z8" target="_blank" class="cs-section-video"><i class="fa fa-youtube-play"></i> <span>How to?</span></a></h3>
      <div class="inside">
        <p>Have any doubts regarding this installation or any other issues? Please feel free to open a ticket in our support center.</p>
        <a href="http://victorthemes.com/docs/segovia" class="button-primary" target="_blank">Docs</a>
        <a href="https://victorthemes.com/wp-themes/segovia" class="button-primary" target="_blank">Item Page</a>
      </div>
    </div>
    <div class="nav-tab-wrapper vt-nav-tab">
      <a href="'. $auto_install .'" class="nav-tab vt-mode-switch vt-auto-mode nav-tab-active">Auto Import</a>
      <a href="'. $manual_install .'" class="nav-tab vt-mode-switch vt-manual-mode">Manual Import</a>
    </div>

  </div>
  </div>';

  return $default_text;
}
add_filter( 'pt-ocdi/plugin_intro_text', 'ocdi_plugin_intro_text' );