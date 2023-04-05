<!-- Footer Widgets -->
<?php if (is_active_sidebar( 'footer-1' ) || is_active_sidebar( 'footer-2' ) || is_active_sidebar( 'footer-3' ) || is_active_sidebar( 'footer-4' )) { ?>
<div class="container footer-widget-area">
	<div class="row">
		<?php echo segovia_vt_footer_widgets(); ?>
	</div>
</div> <?php }
