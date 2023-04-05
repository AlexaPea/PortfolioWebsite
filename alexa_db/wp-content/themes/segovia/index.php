<?php
/*
 * The main template file.
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
$segovia_blog_style = cs_get_option('blog_listing_style');
$segovia_blog_columns = cs_get_option('blog_listing_columns');
$segovia_sidebar_position = cs_get_option('blog_sidebar_position');
$blog_widget = cs_get_option('blog_widget');

if ($blog_widget) {
	$widget_select = $blog_widget;
} else {
	if (is_active_sidebar('sidebar-1')) {
		$widget_select = 'sidebar-1';
	} else {
		$widget_select = '';
	}
}

// Style
if ($segovia_blog_style === 'style-two') {
	$segovia_blog_class = '';
} elseif ($segovia_blog_style === 'style-three') {
  $segovia_blog_class = '';
} elseif ($segovia_blog_style === 'style-four') {
  $segovia_blog_class = ' blog-style-four';
} else {
	$segovia_blog_class = ' blogs-style-two ';
}

// Sidebar Position
if ($widget_select && is_active_sidebar( $widget_select )) {
	if ($segovia_sidebar_position === 'sidebar-hide') {
		$layout_class = 'col-md-12';
		$segovia_sidebar_class = 'segva-hide-sidebar';
	} elseif ($segovia_sidebar_position === 'sidebar-left') {
		$layout_class = 'segva-primary';
		$segovia_sidebar_class = 'segva-left-sidebar';
	} else {
		$layout_class = 'segva-primary';
		$segovia_sidebar_class = 'segva-right-sidebar';
	}
} else {
	$segovia_sidebar_position = 'sidebar-hide';
	$layout_class = 'col-md-12';
	$segovia_sidebar_class = 'hide-sidebar';
}

// Blog Masonry Column Option
  if($segovia_blog_columns === 'segva-blog-col-2') {
    $blg_items = '2';
  } elseif($segovia_blog_columns === 'segva-blog-col-4') {
    $blg_items = '4';
  }  else {
    $blg_items = '3';
  }

?>
  <div class="segva-mid-wrap <?php echo esc_attr($segovia_content_padding .' '. $segovia_sidebar_class); ?>" style="<?php echo esc_attr($segovia_custom_padding); ?>">
    <div class="container">
      <div class="blogs-wrap">
				<div class="row">
	    	  <?php if ($segovia_sidebar_position === 'sidebar-left' && $segovia_sidebar_position !== 'sidebar-hide') {
						get_sidebar(); // Sidebar
					} ?>
				  <div class="segva-primary <?php echo esc_attr($layout_class.$segovia_blog_class); ?>">
				   	<?php 	if($segovia_blog_style === 'style-three') { ?>
				   		<div class="row">
						   	<?php }
								if($segovia_blog_style === 'style-two') { ?>
									<div class="segva-masonry" data-items="<?php echo esc_attr($blg_items); ?>">
								<?php } if($segovia_blog_style === 'style-four') { ?>
						    	  <div class="segva-blog-items-wrap <?php echo esc_attr($segovia_blog_class); ?>">
								<?php }
									if ( have_posts() ) :
										/* Start the Loop */
										while ( have_posts() ) : the_post();
											get_template_part( 'layouts/post/content' );
										endwhile;
									else :
										get_template_part( 'layouts/post/content', 'none' );
									endif;
								if($segovia_blog_style === 'style-two' || $segovia_blog_style === 'style-four') { ?>
									</div>
								<?php } if($segovia_blog_style === 'style-three') { ?>
							</div>
							<?php }
							// Pagination
							segovia_default_paging_nav(); ?>
					</div><!-- Blog Div -->
					<?php
					if ($segovia_sidebar_position !== 'sidebar-hide') {
						get_sidebar(); // Sidebar
					}
				  wp_reset_postdata();  // avoid errors further down the page
					?>
				</div><!-- Content Area -->
			</div>
		</div>
	</div>

<?php
get_footer();
