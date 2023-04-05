<?php
	// Main Text
	$segovia_need_copyright = cs_get_option('need_copyright');
	$segovia_footer_copyright_layout = cs_get_option('footer_copyright_layout');

	if ($segovia_footer_copyright_layout === 'copyright-1') {
		$segovia_copyright_layout_class = 'col-md-6 col-sm-12';
		$segovia_copyright_seclayout_class = 'text-right';
	} elseif ($segovia_footer_copyright_layout === 'copyright-2') {
		$segovia_copyright_layout_class = 'col-md-6 col-sm-12 pull-right text-right';
		$segovia_copyright_seclayout_class = 'pull-left text-left';
	} elseif ($segovia_footer_copyright_layout === 'copyright-3') {
		$segovia_copyright_layout_class = 'col-sm-12 text-center';
	} else {
		$segovia_copyright_layout_class = '';
		$segovia_copyright_seclayout_class = '';
	}

	if (isset($segovia_need_copyright)) {
?>

<!-- Copyright Bar -->
<div class="segva-copyright bottom">
	<div class="container">
		<div class="row">
			<?php
				$segovia_copyright_text = cs_get_option('copyright_text');
				if ($segovia_copyright_text){ ?>
					<div class="cprt-left <?php echo esc_attr($segovia_copyright_layout_class); ?>">
						<?php echo '<p>'. do_shortcode($segovia_copyright_text) .'</p> '; ?> 
					</div> 
				<?php } else { ?>
					<div class="text-center col-md-12"> <p> &copy; <?php echo esc_html(date('Y')); ?><a href="<?php echo esc_url(home_url( '/' )); ?>"><?php esc_html_e(' VictorThemes', 'segovia') ?></a> </p>
					</div>
				<?php }
				$segovia_secondary_text = cs_get_option('secondary_text');
				if ($segovia_footer_copyright_layout != 'copyright-3' && $segovia_secondary_text) { ?>
					<div class="col-md-6 col-sm-12 cprt-right <?php echo esc_attr($segovia_copyright_seclayout_class); ?>">
						<?php
							echo '<p>'. do_shortcode($segovia_secondary_text).'</p>'; 
						?>
					</div>
				<?php } ?>
		</div>
	</div>
</div>
<!-- Copyright Bar -->
<?php 
}
