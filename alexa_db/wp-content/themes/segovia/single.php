<?php
/*
 * The template for displaying all single posts.
 * Author & Copyright: VictorThemes
 * URL: https://victorthemes.com/wp-themes
 */
get_header();

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

// Theme Options
$segovia_sidebar_position = cs_get_option('single_sidebar_position');
$segovia_single_comment = cs_get_option('single_comment_form');

// Theme Options
$segovia_sidebar_position = cs_get_option('single_sidebar_position');
$segovia_single_blog_widget = cs_get_option('single_blog_widget');
if ($segovia_single_blog_widget) {
	$widget_select = $segovia_single_blog_widget;
} else {
	if (is_active_sidebar('sidebar-1')) {
		$widget_select = 'sidebar-1';
	} else {
		$widget_select = '';
	}
}

	// Sidebar Position
if ($widget_select && is_active_sidebar( $widget_select )) {
	if ($segovia_sidebar_position === 'sidebar-hide') {
		$segovia_layout_class = 'col-md-12';
		$segovia_sidebar_class = 'segva-hide-sidebar';
	} elseif ($segovia_sidebar_position === 'sidebar-left') {
		$segovia_layout_class = 'col-md-9';
		$segovia_sidebar_class = 'segva-left-sidebar';
	} else {
		$segovia_layout_class = 'col-md-9';
		$segovia_sidebar_class = 'segva-right-sidebar';
	}
}  else {
	$segovia_sidebar_position = 'sidebar-hide';
	$segovia_layout_class = 'col-md-12';
	$segovia_sidebar_class = 'hide-sidebar';
}

?>

<div class="segva-mid-wrap <?php echo esc_attr($segovia_content_padding .' '. $segovia_sidebar_class); ?>" style="<?php echo esc_attr($segovia_custom_padding); ?>">
  <div class="container">
  	<div class="blogs-wrap">
			<div class="row">
				<?php
				if ($segovia_sidebar_position === 'sidebar-left' && $segovia_sidebar_position !== 'sidebar-hide') {
					get_sidebar(); // Sidebar
				}
				?>
			  <div class="<?php echo esc_attr($segovia_layout_class); ?> segva-primary">
					<div class="segva-unit-fix">
						<div class="segva-blog-detail">
							<?php
							if ( have_posts() ) :
								/* Start the Loop */
								while ( have_posts() ) : the_post();
									if ( !post_password_required() ) {
										get_template_part( 'layouts/post/content', 'single' );
									} else {
										echo	get_the_password_form();
									}
									if ( comments_open() || get_comments_number() ) :
								    comments_template();
								  endif;
								endwhile;
							else :
								get_template_part( 'layouts/post/content', 'none' );
							endif;
							?>
						</div>
					</div><!-- Blog Div -->
				</div><!-- Content Area -->
				<?php
					if ($segovia_sidebar_position !== 'sidebar-hide') {
						get_sidebar(); // Sidebar
					}
				?>
			</div>
		</div>
	</div>
</div>

<?php
get_footer();
