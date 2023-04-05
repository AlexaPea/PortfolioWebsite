<?php
/*
 * The template for displaying all single portfolios.
 * Author & Copyright: VictorThemes
 * URL: https://victorthemes.com/wp-themes
 */

// Metabox
$segovia_id    = ( isset( $post ) ) ? $post->ID : 0;
$segovia_id    = ( is_home() ) ? get_option( 'page_for_posts' ) : $segovia_id;
$segovia_id    = ( segovia_is_woocommerce_shop() ) ? wc_get_page_id( 'shop' ) : $segovia_id;
$segovia_meta  = get_post_meta( $segovia_id, 'page_type_metabox', true );
$segovia_single_pagination = cs_get_option('portfolio_single_pagination');
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

$portfolio_meta  = get_post_meta( $segovia_id, 'portfolio_single_metabox', true );
if ($portfolio_meta) {
	$portfolio_layout = $portfolio_meta['portfolio_single_layout'];
} else {
	$portfolio_layout = '';
}
get_header(); ?>
	<div class="segva-mid-wrap <?php echo esc_attr($segovia_content_padding); ?> sgva-content-area" style="<?php echo esc_attr($segovia_custom_padding); ?>">
		<div class="container">
			<?php 
			if (have_posts()) : while (have_posts()) : the_post();
			the_content(); 
				endwhile;
				endif;
	  	  wp_reset_postdata();  // avoid errors further down the page
		  ?>
		</div>
	</div>
	<div class="portfolio-single-nav">
		<div class="container">
	    <?php segovia_portfolio_next_prev(); ?>
	  </div>
  </div>
<?php  
get_footer();
