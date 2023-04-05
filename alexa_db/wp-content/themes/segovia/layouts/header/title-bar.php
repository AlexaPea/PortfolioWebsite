<?php
// Metabox
$segovia_id    = ( isset( $post ) ) ? $post->ID : 0;
$segovia_id    = ( is_home() ) ? get_option( 'page_for_posts' ) : $segovia_id;
$segovia_id    = ( segovia_is_woocommerce_shop() ) ? wc_get_page_id( 'shop' ) : $segovia_id;
$segovia_meta  = get_post_meta( $segovia_id, 'page_type_metabox', true );
if ($segovia_meta && is_page()) {
	$segovia_title_bar_padding = $segovia_meta['title_area_spacings'];
} else { $segovia_title_bar_padding = ''; }
// Padding - Theme Options
if ($segovia_title_bar_padding && $segovia_title_bar_padding !== 'padding-none') {
	$segovia_title_top_spacings = $segovia_meta['title_top_spacings'];
	$segovia_title_bottom_spacings = $segovia_meta['title_bottom_spacings'];
	if ($segovia_title_bar_padding === 'padding-custom') {
		$segovia_title_top_spacings = $segovia_title_top_spacings ? 'padding-top:'. segovia_check_px($segovia_title_top_spacings) .';' : '';
		$segovia_title_bottom_spacings = $segovia_title_bottom_spacings ? 'padding-bottom:'. segovia_check_px($segovia_title_bottom_spacings) .';' : '';
		$segovia_custom_padding = $segovia_title_top_spacings . $segovia_title_bottom_spacings;
	} else {
		$segovia_custom_padding = '';
	}
} else {
	$segovia_title_bar_padding = cs_get_option('title_bar_padding');
	$segovia_titlebar_top_padding = cs_get_option('titlebar_top_padding');
	$segovia_titlebar_bottom_padding = cs_get_option('titlebar_bottom_padding');
	if ($segovia_title_bar_padding === 'padding-custom') {
		$segovia_titlebar_top_padding = $segovia_titlebar_top_padding ? 'padding-top:'. segovia_check_px($segovia_titlebar_top_padding) .';' : '';
		$segovia_titlebar_bottom_padding = $segovia_titlebar_bottom_padding ? 'padding-bottom:'. segovia_check_px($segovia_titlebar_bottom_padding) .';' : '';
		$segovia_custom_padding = $segovia_titlebar_top_padding . $segovia_titlebar_bottom_padding;
	} else {
		$segovia_custom_padding = '';
	}
}

// Banner Type - Meta Box
if ($segovia_meta) {
	$segovia_banner_type = $segovia_meta['banner_type'];
} else { $segovia_banner_type = ''; }

// Template
if ($segovia_meta && $segovia_banner_type === 'template') {
	$template_name = $segovia_meta['template_name'];
} else { 
	$template_name = '';
}

// Overlay Color - Theme Options
if ($segovia_meta && is_page()) {
	$segovia_bg_overlay_color = $segovia_meta['titlebar_bg_overlay_color'];
} else { $segovia_bg_overlay_color = ''; }
if ($segovia_bg_overlay_color) {
	if ($segovia_bg_overlay_color) {
		$segovia_overlay_color = 'style=background-color:'. $segovia_bg_overlay_color;
	} else {
		$segovia_overlay_color = '';
	}
} else {
	$segovia_bg_overlay_color = cs_get_option('titlebar_bg_overlay_color');
	if ($segovia_bg_overlay_color) {
		$segovia_overlay_color = 'style=background-color:'. $segovia_bg_overlay_color;
	} else {
		$segovia_overlay_color = '';
	}
}

// Background - Type
if( $segovia_meta && isset( $segovia_meta['title_area_bg'] ) ) {

  extract( $segovia_meta['title_area_bg'] );

  $segovia_background_image       = ( ! empty( $image ) ) ? 'background-image: url(' . $image . ');' : '';
  $segovia_background_repeat      = ( ! empty( $image ) && ! empty( $repeat ) ) ? ' background-repeat: ' . $repeat . ';' : '';
  $segovia_background_position    = ( ! empty( $image ) && ! empty( $position ) ) ? ' background-position: ' . $position . ';' : '';
  $segovia_background_size    = ( ! empty( $image ) && ! empty( $size ) ) ? ' background-size: ' . $size . ';' : '';
  $segovia_background_attachment    = ( ! empty( $image ) && ! empty( $size ) ) ? ' background-attachment: ' . $attachment . ';' : '';
  $segovia_background_color       = ( ! empty( $color ) ) ? ' background-color: ' . $color . ';' : '';
  $segovia_background_style       = ( ! empty( $image ) ) ? $segovia_background_image . $segovia_background_repeat . $segovia_background_position . $segovia_background_size . $segovia_background_attachment : '';

  $segovia_title_bg = ( ! empty( $segovia_background_style ) || ! empty( $segovia_background_color ) ) ? $segovia_background_style . $segovia_background_color : '';

} else { $segovia_title_bg = ''; }

if($segovia_banner_type === 'hide-title-area') {} elseif($segovia_meta && $segovia_banner_type === 'revolution-slider') { 
	// Hide Title Area
	echo do_shortcode($segovia_meta['page_revslider']); 
} elseif($segovia_banner_type === 'template') {
	$args = array(
    // other query params here,
    'post_type' => 'template',
    'p' => $template_name
  );
  $csgve_post = new WP_Query( $args );
  if ($csgve_post->have_posts()) : while ($csgve_post->have_posts()) : $csgve_post->the_post();
    echo the_content();
  endwhile;
  endif;
  wp_reset_postdata();
} else { ?>
	<!-- Banner & Title Area -->
	<div class="segva-title-area <?php echo esc_attr($segovia_title_bar_padding .' '. $segovia_banner_type); ?>" style="<?php echo esc_attr($segovia_custom_padding . $segovia_title_bg); ?>">
		<?php if($segovia_bg_overlay_color) { ?>
			<div class="segva-title-overlay" <?php echo esc_attr($segovia_overlay_color); ?>></div>
		<?php } ?>
			<div class="container">
			  <h1 class="page-title"><?php echo segovia_title_area(); ?></h1>
			</div>
	</div>
<?php }
