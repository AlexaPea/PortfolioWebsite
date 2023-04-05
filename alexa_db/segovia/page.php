<?php
/*
 * The template for displaying all pages.
 * Author & Copyright: VictorThemes
 * URL: https://victorthemes.com/wp-themes
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
$segovia_page_layout = get_post_meta( get_the_ID(), 'page_layout_options', true );
if ($segovia_page_layout) {
	$segovia_page_layout = $segovia_page_layout['page_layout'];
	if ($segovia_page_layout === 'extra-width') {
		$segovia_column_class = 'extra-width';
		$segovia_layout_class = 'container-fluid';
	} elseif($segovia_page_layout === 'left-sidebar' || $segovia_page_layout === 'right-sidebar') {
		$segovia_column_class = 'col-md-9 segva-primary';
		$segovia_layout_class = 'container';
	} else {
		$segovia_column_class = 'col-md-12';
		$segovia_layout_class = 'container';
	}

	// Page Layout Class
	if ($segovia_page_layout === 'left-sidebar') {
		$segovia_sidebar_class = 'segva-left-sidebar';
	} elseif ($segovia_page_layout === 'right-sidebar') {
		$segovia_sidebar_class = 'segva-right-sidebar';
	} elseif ($segovia_page_layout === 'extra-width') {
		$segovia_sidebar_class = 'segva-extra-width';
	} else {
		$segovia_sidebar_class = 'segva-full-width';
	}
} else {
	$segovia_column_class = 'col-md-12';
	$segovia_layout_class = 'container';
	$segovia_sidebar_class = 'segva-full-width';
}

get_header(); ?>

<div class="<?php echo esc_attr($segovia_layout_class .' '. $segovia_content_padding .' '. $segovia_sidebar_class); ?> segva-content-area page-float-bar" style="<?php echo esc_attr($segovia_custom_padding); ?>">
	<div class="row">
		<?php
			// Left Sidebar
			if($segovia_page_layout === 'left-sidebar') {
	   		get_sidebar();
			}
		?>

		<div class="segva-content-side <?php echo esc_attr($segovia_column_class); ?>">
			<?php
				while ( have_posts() ) : the_post();
					the_content();
					echo segovia_wp_link_pages();
					// If comments are open or we have at least one comment, load up the comment template.
					if ( (comments_open() || get_comments_number()) ) :
						comments_template();
					endif;
				endwhile; // End of the loop.
			?>
		</div><!-- Content Area -->
		<?php
			// Right Sidebar
			if($segovia_page_layout === 'right-sidebar') {
				get_sidebar();
			}
		?>
	</div>
</div>
<?php
get_footer();
