<?php
// Metabox
global $post;
$segovia_id    = ( isset( $post ) ) ? $post->ID : false;
$segovia_id    = ( is_home() ) ? get_option( 'page_for_posts' ) : $segovia_id;
$segovia_id    = ( segovia_is_woocommerce_shop() ) ? wc_get_page_id( 'shop' ) : $segovia_id;
$segovia_id    = ( ! is_tag() && ! is_archive() && ! is_search() && ! is_404() && ! is_singular('testimonial') ) ? $segovia_id : false;
$segovia_meta  = get_post_meta( $segovia_id, 'page_type_metabox', true );
if ($segovia_meta) {
  $segovia_topbar_options = $segovia_meta['topbar_options'];
} else {
  $segovia_topbar_options = '';
}
// Define Theme Options and Metabox varials in right way!
if ($segovia_meta) {
  if ($segovia_topbar_options === 'custom' && $segovia_topbar_options !== 'default') {
    $segovia_top_left           = $segovia_meta['top_left'];
    $segovia_top_right          = $segovia_meta['top_right'];
    $segovia_topbar_left_width  = $segovia_meta['topbar_left_width'];
    $segovia_topbar_right_width = $segovia_meta['topbar_right_width'];
    $segovia_left_width         = $segovia_topbar_left_width ? 'width:'. $segovia_topbar_left_width .';' : '';
    $segovia_right_width        = $segovia_topbar_right_width ? 'width:'. $segovia_topbar_right_width .';' : '';
    $segovia_hide_topbar        = $segovia_topbar_options;
    $segovia_topbar_bg          = $segovia_meta['topbar_bg'];
    if ($segovia_topbar_bg) {
      $segovia_topbar_bg = 'background-color: '. $segovia_topbar_bg .';';
    } else {$segovia_topbar_bg = '';}
  } else {
    $segovia_top_left           = cs_get_option('top_left');
    $segovia_top_right          = cs_get_option('top_right');
    $segovia_topbar_left_width  = cs_get_option('topbar_left_width');
    $segovia_topbar_right_width = cs_get_option('topbar_right_width');
    $segovia_left_width         = $segovia_topbar_left_width ? 'width:'. $segovia_topbar_left_width .';' : '';
    $segovia_right_width        = $segovia_topbar_right_width ? 'width:'. $segovia_topbar_right_width .';' : '';
    $segovia_hide_topbar        = cs_get_option('top_bar');
    $segovia_topbar_bg          = '';
  }
} else {
  // Theme Options fields
  $segovia_top_left           = cs_get_option('top_left');
  $segovia_top_right          = cs_get_option('top_right');
  $segovia_topbar_left_width  = cs_get_option('topbar_left_width');
  $segovia_topbar_right_width = cs_get_option('topbar_right_width');
  $segovia_left_width         = $segovia_topbar_left_width ? 'width:'. $segovia_topbar_left_width .';' : '';
  $segovia_right_width        = $segovia_topbar_right_width ? 'width:'. $segovia_topbar_right_width .';' : '';
  $segovia_hide_topbar        = cs_get_option('top_bar');
  $segovia_topbar_bg          = '';
}
// All options
if ($segovia_meta && $segovia_topbar_options === 'custom' && $segovia_topbar_options !== 'default') {
  $segovia_top_left = ( $segovia_top_left ) ? $segovia_meta['top_left'] : cs_get_option('top_left');
  $segovia_top_right = ( $segovia_top_right ) ? $segovia_meta['top_right'] : cs_get_option('top_right');
} else {
  $segovia_top_left = cs_get_option('top_left');
  $segovia_top_right = cs_get_option('top_right');
}
if ($segovia_meta && $segovia_topbar_options !== 'default') {
  if ($segovia_topbar_options === 'hide_topbar') {
    $segovia_hide_topbar = 'hide';
  } else {
    $segovia_hide_topbar = 'show';
  }
} else {
  $segovia_hide_topbar_check = cs_get_option('top_bar');
  if ($segovia_hide_topbar_check === true ) {
    $segovia_hide_topbar = 'hide';
  } else {
    $segovia_hide_topbar = 'show';
  }
}
if ($segovia_meta) {
  $segovia_topbar_bg = ( $segovia_topbar_bg ) ? $segovia_meta['topbar_bg'] : '';
} else {
  $segovia_topbar_bg = '';
}

if ($segovia_topbar_bg) {
  $segovia_topbar_bg = 'background-color: '. $segovia_topbar_bg .';';
} else {$segovia_topbar_bg = '';}

$segovia_topbar_left_width = ( $segovia_topbar_left_width ) ? $segovia_meta['topbar_left_width'] : cs_get_option('topbar_left_width');
$segovia_topbar_right_width = ( $segovia_topbar_right_width ) ? $segovia_meta['topbar_right_width'] : cs_get_option('topbar_right_width');
$segovia_left_width   = $segovia_topbar_left_width ? 'width:'. $segovia_topbar_left_width .';' : '';
$segovia_right_width  = $segovia_topbar_right_width ? 'width:'. $segovia_topbar_right_width .';' : '';

if($segovia_hide_topbar === 'show') {
?>
<div class="segva-topbar" style="<?php echo esc_attr($segovia_topbar_bg); ?>">
  <div class="container">
    <div class="row">
      <div class="segva-topbar-left" style="<?php echo esc_attr($segovia_left_width); ?>">
        <?php echo do_shortcode($segovia_top_left); ?>
      </div> <!-- segva-topbar-left -->
      <div class="segva-topbar-right" style="<?php echo esc_attr($segovia_right_width); ?>">
        <?php echo do_shortcode($segovia_top_right); ?>
      </div> <!-- segva-topbar-right -->
    </div> <!-- Row -->
  </div> <!-- Container -->
</div>
<?php } // Hide Topbar - From Metabox
