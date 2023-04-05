<?php
/*
 * The sidebar containing the main widget area.
 * Author & Copyright: VictorThemes
 * URL: https://victorthemes.com/wp-themes
 */

$segovia_blog_widget = cs_get_option('blog_widget');
$segovia_single_blog_widget = cs_get_option('single_blog_widget');
$segovia_team_widget = cs_get_option('team_widget');
$floating_sidebar = cs_get_option('floating_sidebar');

if($floating_sidebar) {
	$sidebar_type = 'segva-floating-sidebar';
} else{
	$sidebar_type = '';
}

if (is_page()) {
	// Page Layout Options
	$segovia_page_layout = get_post_meta( get_the_ID(), 'page_layout_options', true );

	if ($segovia_page_layout) {
		$sidebar_type = $segovia_page_layout['floating_sidebar'];
	} else {
		$sidebar_type = '';
	}
	if ($sidebar_type) {
	  $sidebar_type = ' segva-floating-sidebar';
	} else {
		$sidebar_type = '';
	}
}

?>

<div class="col-md-3 segva-secondary <?php echo esc_attr($sidebar_type); ?>">
	<?php if (is_page() && $segovia_page_layout['page_sidebar_widget']) {
		if (is_active_sidebar($segovia_page_layout['page_sidebar_widget'])) {
			dynamic_sidebar($segovia_page_layout['page_sidebar_widget']);
		}
	} elseif (!is_page() && $segovia_blog_widget && !$segovia_single_blog_widget) {
		if (is_active_sidebar($segovia_blog_widget)) {
			dynamic_sidebar($segovia_blog_widget);
		}
	} elseif ($segovia_team_widget && is_singular('team')) {
		if (is_active_sidebar($segovia_team_widget)) {
			dynamic_sidebar($segovia_team_widget);
		}
	} elseif (is_single() && $segovia_single_blog_widget) {
		if (is_active_sidebar($segovia_single_blog_widget)) {
			dynamic_sidebar($segovia_single_blog_widget);
		}
	} else {
		if (is_active_sidebar('sidebar-1')) {
			dynamic_sidebar( 'sidebar-1' );
		}
	} ?>
</div><!-- #secondary -->
<?php
