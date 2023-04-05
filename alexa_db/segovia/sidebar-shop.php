<?php
/*
 * The sidebar only for WooCommerce pages.
 * Author & Copyright: VictorThemes
 * URL: https://victorthemes.com
 */

$caspiar_woo_widget = cs_get_option('woo_widget');

?>
<div class="col-md-3 segva-secondary">
	<?php if ($caspiar_woo_widget) {
		if (is_active_sidebar($caspiar_woo_widget)) {
			dynamic_sidebar($caspiar_woo_widget);
		}
	} else {
		if (is_active_sidebar( 'shop' )) {
			dynamic_sidebar( 'shop' );
		}
	} ?>
</div>
<?php
