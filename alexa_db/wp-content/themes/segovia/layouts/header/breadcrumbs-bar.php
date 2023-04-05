<?php
$segovia_id    = ( isset( $post ) ) ? $post->ID : 0;
$segovia_id    = ( is_home() ) ? get_option( 'page_for_posts' ) : $segovia_id;
$segovia_id    = ( segovia_is_woocommerce_shop() ) ? wc_get_page_id( 'shop' ) : $segovia_id;
$segovia_meta  = get_post_meta( $segovia_id, 'page_type_metabox', true );
if ($segovia_meta) {
	$segovia_need_breadcrumbs  = $segovia_meta['need_breadcrumbs'];
} else { $segovia_need_breadcrumbs = cs_get_option('need_breadcrumbs'); }
if ($segovia_need_breadcrumbs) { // Hide Breadcrumbs
?>
<!-- Breadcrumbs -->
<div class="segva-page-title">
	<div class="container">
		<?php if ( function_exists( 'breadcrumb_trail' ) ) breadcrumb_trail(); ?>
	</div>
</div>
<!-- Breadcrumbs -->
<?php } // Hide Breadcrumbs
