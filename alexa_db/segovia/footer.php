<?php
/*
 * The template for displaying the footer.
 * Author & Copyright: VictorThemes
 * URL: https://victorthemes.com/wp-themes
 */

$segovia_id    = ( isset( $post ) ) ? $post->ID : 0;
$segovia_id    = ( is_home() ) ? get_option( 'page_for_posts' ) : $segovia_id;
$segovia_id    = ( segovia_is_woocommerce_shop() ) ? wc_get_page_id( 'shop' ) : $segovia_id;
$segovia_meta  = get_post_meta( $segovia_id, 'page_type_metabox', true );
?>
</div>
<?php
// Header Style
if ($segovia_meta ) {
  $segovia_header_design  = $segovia_meta['select_header_design'];
} else {
  $segovia_header_design  = cs_get_option('select_header_design');
}

if ($segovia_header_design === 'default') {
  $segovia_header_design_actual  = cs_get_option('select_header_design');
} else {
  $segovia_header_design_actual = ( $segovia_header_design ) ? $segovia_header_design : cs_get_option('select_header_design');
}

if ($segovia_meta) {
	$segovia_hide_footer  = $segovia_meta['hide_footer'];
} else { $segovia_hide_footer = ''; }

if ($segovia_meta) {
	$segovia_hide_footer  = $segovia_meta['hide_footer'];
  $segovia_hide_copyright = $segovia_meta['hide_copyright'];
} else { 
  $segovia_hide_footer = ''; 
  $segovia_hide_copyright = '';
} 
$need_copyright = cs_get_option('need_copyright');
if($segovia_header_design_actual === 'style_two') { ?>
</div>
</div>
<?php }
// Hide Footer Metabox
if (!$segovia_hide_footer || !$segovia_hide_copyright) {
?>
	<!-- Footer -->
	<footer class="segva-footer">
		<div class="footer-wrap">
			<?php if (!$segovia_hide_footer) {
				$footer_widget_block = cs_get_option('footer_widget_block');
					if (isset($footer_widget_block)) {
			      // Footer Widget Block
			      get_template_part( 'layouts/footer/footer', 'widgets' );
		    	}
		    } 
		    if(!$segovia_hide_copyright) {
					if (isset($need_copyright)) {
			      // Copyright Block
		      	get_template_part( 'layouts/footer/footer', 'copyright' );  //
		      } 
		  	}
	    ?>
		</div>
	</footer>
	<!-- Footer -->
<?php } // Hide Footer Metabox
if($segovia_header_design_actual != 'style_two') { ?>
</div>
</div><!-- #vtheme-wrapper -->
<?php } ?>
</div><!-- body under div -->
<!-- Segva Footer -->
<?php
$theme_btotop = cs_get_option('theme_btotop');
if($theme_btotop) {
?>
<!-- Caspiar Back Top -->
<div class="segva-back-top">
  <a href="javascript:void(0);"><i class="fa fa-angle-up" aria-hidden="true"></i></a>
</div>
<?php }
wp_footer(); ?>
</body>
</html>
<?php
