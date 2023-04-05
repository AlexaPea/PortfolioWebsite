<?php
// Logo Image
$segovia_brand_logo_default = cs_get_option('brand_logo_default');
$segovia_brand_logo_retina = cs_get_option('brand_logo_retina');

$default_logo_class = $segovia_brand_logo_default ? ' hav-default-logo' : ' dhav-default-logo';
$default_retina_logo_class = $segovia_brand_logo_retina ? ' hav-retina-logo' : ' dhav-retina-logo';

// Transparent Header Logos
$segovia_transparent_logo = cs_get_option('transparent_logo_default');
$segovia_transparent_retina = cs_get_option('transparent_logo_retina');

$transparent_logo_class = $segovia_transparent_logo ? ' hav-transparent-logo' : ' dhav-transparent-logo';
$trans_retina_logo_class = $segovia_transparent_retina ? ' hav-trans-retina' : ' dhav-trans-retina';

// Metabox - Header Transparent
global $post;
$segovia_id    = ( isset( $post ) ) ? $post->ID : 0;
$segovia_id    = ( is_home() ) ? get_option( 'page_for_posts' ) : $segovia_id;
$segovia_id    = ( segovia_is_woocommerce_shop() ) ? wc_get_page_id( 'shop' ) : $segovia_id;
$segovia_meta  = get_post_meta( $segovia_id, 'page_type_metabox'. true );

if ($segovia_meta ) {
  $segovia_header_design  = $segovia_meta['select_header_design'];
  $segovia_sticky_header  = $segovia_meta['sticky_header'];
  $segovia_search_icon    = $segovia_meta['search_icon'];
} else {
  $segovia_header_design  = cs_get_option('select_header_design');
  $segovia_sticky_header  = cs_get_option('sticky_header');
  $segovia_search_icon    = cs_get_option('search_icon');
}
if ($segovia_header_design === 'default') {
  $segovia_header_design_actual  = cs_get_option('select_header_design');
} else {
  $segovia_header_design_actual = ( $segovia_header_design ) ? $segovia_header_design : cs_get_option('select_header_design');
}
if ($segovia_meta && $segovia_header_design !== 'default') {
  $segovia_transparent_header = $segovia_meta['transparency_header'];
} else {
  $segovia_transparent_header  = cs_get_option('trans_header');
}

// Retina Size
$segovia_retina_width = cs_get_option('retina_width');
$segovia_retina_height = cs_get_option('retina_height');

$retina_width_actual = $segovia_retina_width ? 'width='. esc_attr($segovia_retina_width)  : '' ;
$retina_height_actual = $segovia_retina_height ? 'height='. esc_attr($segovia_retina_height)  : '' ;

// Logo Spacings
$segovia_brand_logo_top = cs_get_option('brand_logo_top');
$segovia_brand_logo_bottom = cs_get_option('brand_logo_bottom');
if ($segovia_brand_logo_top ) {
	$segovia_brand_logo_top = 'padding-top:'. segovia_check_px($segovia_brand_logo_top) .';';
} else { $segovia_brand_logo_top = ''; }

if ($segovia_brand_logo_bottom ) {
	$segovia_brand_logo_bottom = 'padding-bottom:'. segovia_check_px($segovia_brand_logo_bottom) .';';
} else { $segovia_brand_logo_bottom = ''; }
?>
<div class="segva-brand <?php echo esc_attr($trans_retina_logo_class.$transparent_logo_class.$default_logo_class.$default_retina_logo_class); ?>" style="<?php echo esc_attr($segovia_brand_logo_top); echo esc_attr($segovia_brand_logo_bottom); ?>">
	<a href="<?php echo esc_url(home_url( '/' )); ?>">
	<?php
		if (isset($segovia_transparent_logo)){
			if (isset($segovia_transparent_retina)){
				echo '<img src="'. esc_url(wp_get_attachment_url($segovia_transparent_retina)) .'" '. esc_attr($retina_width_actual) .' '. esc_attr($retina_height_actual) .' alt="'. esc_attr(get_bloginfo('name')) .'" class="transparent-retina-logo transparent-logo">';
			}
			echo '<img src="'. esc_url(wp_get_attachment_url($segovia_transparent_logo)) .'" alt="'. esc_attr(get_bloginfo('name')).'" class="transparent-default-logo transparent-logo" '. esc_attr($retina_width_actual) .' '. esc_attr($retina_height_actual) .'>';
		} 
	if (isset($segovia_brand_logo_default)){
		if ($segovia_brand_logo_retina){
			echo '<img src="'. esc_url(wp_get_attachment_url($segovia_brand_logo_retina)) .'" '. esc_attr($retina_width_actual) .' '. esc_attr($retina_height_actual) .' alt="'.esc_attr(get_bloginfo('name')) .'" class="retina-logo brand-logo-retina">
				';
		}
		echo '<img src="'. esc_url(wp_get_attachment_url($segovia_brand_logo_default)) .'" alt="'. esc_attr(get_bloginfo('name')) .'" class="default-logo" '. esc_attr($retina_width_actual) .' '. esc_attr($retina_height_actual) .'>';
	} else {
		echo '<div class="text-logo">'. esc_html(get_bloginfo( 'name' )) . '</div>';
	}

	echo '</a>';
	?>
</div>
<?php
