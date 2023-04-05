<?php
/*
 * The template for displaying all pages.
 * Author & Copyright: VictorThemes
 * URL: https://victorthemes.com
 */

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

// Page Layout Options
$woo_single_sidebar = cs_get_option('woo_single_sidebar');
$segovia_woo_columns = cs_get_option('woo_product_columns');
$segovia_woo_sidebar = cs_get_option('woo_sidebar_position');
$segovia_woo_columns = $segovia_woo_columns ? $segovia_woo_columns : '3';

$segovia_woo_widget = cs_get_option('woo_widget');
if ($segovia_woo_widget) {
	$widget_select = $segovia_woo_widget;
} else {
	if (is_active_sidebar( 'shop' )) {
		$widget_select = 'shop';
	} else {
		$widget_select = '';
	}
}

if(is_product() && $woo_single_sidebar) {
	$segovia_woo_sidebar = 'sidebar-hide';
	$segovia_column_class = 'col-md-12';
	$segovia_sidebar_class = 'segva-hide-sidebar';
} else {

	if ($widget_select && is_active_sidebar( $widget_select )) {
		if ($segovia_woo_sidebar === 'left-sidebar') {
			$segovia_column_class = 'segva-primary';
			$segovia_sidebar_class = 'segva-left-sidebar';
		} elseif ($segovia_woo_sidebar === 'sidebar-hide') {
			$segovia_column_class = 'col-md-12';
			$segovia_sidebar_class = 'segva-hide-sidebar';
		} else {
			$segovia_column_class = 'segva-primary';
			$segovia_sidebar_class = 'segva-right-sidebar';
		}
	} else {
		$segovia_woo_sidebar = 'sidebar-hide';
		$segovia_column_class = 'col-md-12';
		$segovia_sidebar_class = 'segva-hide-sidebar';
	}

}

get_header(); ?>
<div class="segva-mid-wrap mid-spacer-two <?php echo esc_attr($segovia_content_padding); ?>" style="<?php echo esc_attr($segovia_custom_padding); ?>">
  <div class="woocommerce woocommerce-page">
		<?php do_action('segovia_woocommerce_before_shop_loop'); ?>
		<div class="container segva-content-area woo-col-<?php echo esc_attr($segovia_woo_columns .' '. $segovia_sidebar_class); ?>">
			<div class="row">
				<?php
				// Left Sidebar
				if($segovia_woo_sidebar === 'left-sidebar') {
		   		get_sidebar('shop');
				}
				?>
				<div class="segva-content-side <?php echo esc_attr($segovia_column_class); ?>">
					<?php
						if ( have_posts() ) :
							woocommerce_content();
						endif; // End of the loop.
					?>
				</div><!-- Content Area -->
				<?php
				// Right Sidebar
				if($segovia_woo_sidebar !== 'left-sidebar' && $segovia_woo_sidebar !== 'sidebar-hide') {
					get_sidebar('shop');
				}
				?>
			</div>
		</div>
	</div>
</div>
<?php
get_footer();
