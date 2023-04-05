<!DOCTYPE html>

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
wp_head();

// Metabox
$segovia_id    = ( isset( $post ) ) ? $post->ID : 0;
$segovia_id    = ( is_home() ) ? get_option( 'page_for_posts' ) : $segovia_id;
$segovia_id    = ( segovia_is_woocommerce_shop() ) ? wc_get_page_id( 'shop' ) : $segovia_id;
$segovia_meta  = get_post_meta( $segovia_id, 'page_type_metabox', true );

if ($segovia_meta) {
  $segovia_content_padding = $segovia_meta['content_spacings'];
} else { $segovia_content_padding = ''; }
// Padding - Metabox
if ($segovia_content_padding && $segovia_content_padding !== 'padding-none') {
  $segovia_content_top_spacings = $segovia_meta['content_top_spacings'];
  $segovia_content_bottom_spacings = $segovia_meta['content_bottom_spacings'];
  if ($segovia_content_padding === 'padding-custom') {
    $segovia_content_top_spacings = $segovia_content_top_spacings ? 'padding-top:'. segovia_check_px($segovia_content_top_spacings) .';' : '';
    $segovia_content_bottom_spacings = $segovia_content_bottom_spacings ? 'padding-bottom:'. segovia_check_px($segovia_content_bottom_spacings) .';' : '';
    $segovia_custom_padding = $segovia_content_top_spacings . $segovia_content_bottom_spacings;
  } else {
    $segovia_custom_padding = '';
  }
} else {
  $segovia_custom_padding = '';
}
?>
</head>

	<body <?php body_class(); ?>>
    <div class="vt-maintenance-mode">
      <div class="container <?php echo esc_attr($segovia_content_padding); ?> segva-content-area" style="<?php echo esc_attr($segovia_custom_padding); ?>">
       	<div class="row">
          <?php
            $segovia_page = get_post( cs_get_option('maintenance_mode_page') );
            WPBMap::addAllMappedShortcodes();
            echo ( is_object( $segovia_page ) ) ? do_shortcode( $segovia_page->post_content ) : '';
          ?>
        </div>
      </div>
    </div>
    <?php wp_footer(); ?>
  </body>
</html>
<?php
