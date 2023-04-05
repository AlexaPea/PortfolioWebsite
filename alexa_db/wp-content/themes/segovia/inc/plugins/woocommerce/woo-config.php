<?php
/*
 * All WooCommerce Related Functions
 * Author & Copyright: VictorThemes
 * URL: https://victorthemes.com/wp-themes
 */

if ( class_exists( 'WooCommerce' ) ) {

	/**
	* Insert the opening anchor tag for products in the loop.
	*/
	function segovia_product_wrap_open() {
		echo '<div class="product-wrap">';
	}
	add_action( 'segovia_open_wrap', 'segovia_product_wrap_open', 1 );

	/**
	 * Insert the opening anchor tag for products in the loop.
	 */
	function segovia_product_wrap_close() {
		echo '</div>';
	}
	add_action( 'segovia_close_wrap', 'segovia_product_wrap_close', 1 );

	// Removed price & added peice and Add to cart in same action
	remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10 );
	if ( ! function_exists( 'segovia_woocommerce_template_loop_price' ) ) {

		/**
		 * Get the product price for the loop.
		 */
		function segovia_woocommerce_template_loop_price($args = array()) {
			global $product;
			if ( $price_html = $product->get_price_html() ) : ?>
				<span class="price"><?php printf($price_html);
				global $product;

			if ( $product ) {
				$defaults = array(
					'quantity'   => 1,
					'class'      => implode( ' ', array_filter( array(
						'button',
						'product_type_' . $product->get_type(),
						$product->is_purchasable() && $product->is_in_stock() ? 'add_to_cart_button' : '',
						$product->supports( 'ajax_add_to_cart' ) ? 'ajax_add_to_cart' : '',
					) ) ),
					'attributes' => array(
						'data-product_id'  => $product->get_id(),
						'data-product_sku' => $product->get_sku(),
						'aria-label'       => $product->add_to_cart_description(),
						'rel'              => 'nofollow',
					),
				);

				$args = apply_filters( 'woocommerce_loop_add_to_cart_args', wp_parse_args( $args, $defaults ), $product );
				wc_get_template( 'loop/add-to-cart.php', $args );
			}
			?></span>
			<?php endif;
		}
	}
	add_action( 'woocommerce_after_shop_loop_item_title', 'segovia_woocommerce_template_loop_price', 10 );

	// Product Column Limit - Shop Page
	add_filter('loop_shop_columns', 'segovia_loop_columns');
	if ( ! function_exists('segovia_loop_columns') ) {
		function segovia_loop_columns() {
			$col = cs_get_option('woo_product_columns');
			if($col) {
				return $col;
			} else {
				return 3;
			}
		}
	}

	// Remove product single meta & added new action with custom structure
	remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );
	if ( ! function_exists( 'segovia_woocommerce_template_single_meta' ) ) {
		/**
		 * Output the product meta.
		 */
		function segovia_woocommerce_template_single_meta() {
			global $product; ?>
			<div class="product_meta">
				<?php do_action( 'woocommerce_product_meta_start' );
				if ( wc_product_sku_enabled() && ( $product->get_sku() || $product->is_type( 'variable' ) ) ) : ?>
					<span class="meta-item sku_wrapper"><span class="meta-title"><?php esc_html_e( 'SKU:', 'segovia' ); ?></span> <span class="sku"><?php echo esc_html( $sku = $product->get_sku() ) ? $sku : esc_html__( 'N/A', 'segovia' ); ?></span></span>
				<?php endif;
				  echo wc_get_product_category_list( $product->get_id(), ', ', '<span class="posted_in meta-item "><span class="meta-title">' . _n( 'Category:', 'Categories:', count( $product->get_category_ids() ), 'segovia' ) . ' </span>', '</span>' );
				  echo wc_get_product_tag_list( $product->get_id(), ', ', '<span class="tagged_as meta-item"><span class="meta-title">' . _n( 'Tag:', 'Tags:', count( $product->get_tag_ids() ), 'segovia' ) . '</span> ', '</span>' );
				do_action( 'woocommerce_product_meta_end' ); ?>

			</div>
		<?php
		}
	}
	add_action( 'woocommerce_single_product_summary', 'segovia_woocommerce_template_single_meta', 40 );

	remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );
	add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 25 );

  // Remove Product add to cart
	remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );

	// Remove the product rating display on product loops
  remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 );

  /* Remove Product Title action and added with h4 tag */
  remove_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10 );

  if ( ! function_exists( 'segovia_template_loop_product_title' ) ) {

		/**
		 * Show the product title in the product loop. By default this is an H2.
		 */
		function segovia_template_loop_product_title() {
			global $product;
			$link = apply_filters( 'woocommerce_loop_product_link', get_the_permalink(), $product );
			echo '<h4 class="woocommerce-loop-product__title"><a href="' . esc_url( $link ) . '" class="woocommerce-LoopProduct-link woocommerce-loop-product__link">' . esc_html(get_the_title()) . '</a></h4>';
		}
	}
	add_action( 'woocommerce_shop_loop_item_title', 'segovia_template_loop_product_title', 10 );

	// Remove Product description title
	add_filter( 'woocommerce_product_description_heading', 'remove_product_description_heading' );
	function remove_product_description_heading() {
		return '';
	}

	add_filter('woocommerce_product_additional_information_heading', 'isa_product_additional_information_heading');
	function isa_product_additional_information_heading() {
    return '';
	}

	// WooCommerce Products per Page Limit
	add_filter( 'loop_shop_per_page', 'segovia_product_limit', 20 );
	if ( ! function_exists('segovia_product_limit') ) {
	  function segovia_product_limit() {
	    $woo_limit = cs_get_option('theme_woo_limit');
	    $woo_limit = $woo_limit ? $woo_limit : '9';
	    return $woo_limit;
	  }
	}

	// Remove Shop Page Title
	add_filter( 'woocommerce_show_page_title' , 'segovia_hide_page_title' );
	function segovia_hide_page_title() {
		return false;
	}

	// Single Product Single/Gallery Script
	add_action( 'after_setup_theme', 'segovia_single_product_gallery_image' );
	function segovia_single_product_gallery_image() {
		add_theme_support( 'wc-product-gallery-lightbox' );
		add_theme_support( 'wc-product-gallery-slider' );
	}

	// Single Product Page - Related Products Limit & columns
	add_filter( 'woocommerce_output_related_products_args', 'segovia_related_products_args' );
  function segovia_related_products_args( $args ) {
  	$woo_related_limit = cs_get_option('woo_related_limit');
  	$columns = cs_get_option('woo_product_columns');
  	if ($woo_related_limit) {
			$args['posts_per_page'] = (int)$woo_related_limit; // 4 related products
		} else {
			$args['posts_per_page'] = 4; // 4 related products
		}
		if($columns) {
			$args['columns'] = (int)$columns;
		} else {
			$args['columns'] = 3;
		}
		return $args;
	}

	// Related Products Title Change
  $related_title = cs_get_option('woo_related_title');
  function custom_related_products_text( $translated_text, $text, $domain ) {
  $related_title = cs_get_option('woo_related_title');
    switch ( $translated_text ) {
      case 'Related products' :
        $translated_text = $related_title;
        break;
    }
    return $translated_text;
  }
  if($related_title){
    add_filter( 'gettext', 'custom_related_products_text', 20, 3 );
  }

	// Define image sizes
	function segovia_woo_image_dimensions() {
		global $pagenow;

		if ( ! isset( $_GET['activated'] ) || $pagenow != 'themes.php' ) {
			return;
		}
  	$catalog = array(
			'width' 	=> '260',
			'height'	=> '340',
			'crop'		=> 1
		);
		$single = array(
			'width' 	=> '580',
			'height'	=> '483',
			'crop'		=> 1
		);
		$thumbnail = array(
			'width' 	=> '125',
			'height'	=> '125',
			'crop'		=> 1
		);
		// Image sizes
		update_option( 'shop_catalog_image_size', $catalog ); // Product category thumbs
		update_option( 'shop_single_image_size', $single ); // Single product image
		update_option( 'shop_thumbnail_image_size', $thumbnail ); // Image gallery thumbs
	}
	add_action( 'after_switch_theme', 'segovia_woo_image_dimensions', 1 );

	// Product Single Gallery Image size
	add_filter( 'woocommerce_gallery_thumbnail_size', 'custom_woocommerce_gallery_thumbnail_size' );

	function custom_woocommerce_gallery_thumbnail_size() {
		return 'thumbnail';
	}

	// Sale tag In product single & added inside product images
	remove_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash', 10 );
	remove_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_images', 20 );

	if ( ! function_exists( 'segovia_woocommerce_show_product_images' ) ) {

		/**
		 * Output the product image before the single product summary.
		 */
		function segovia_woocommerce_show_product_images() {
			global $product;

			$columns           = apply_filters( 'woocommerce_product_thumbnails_columns', 4 );
			$post_thumbnail_id = $product->get_image_id();
			$wrapper_classes   = apply_filters( 'woocommerce_single_product_image_gallery_classes', array(
				'woocommerce-product-gallery',
				'woocommerce-product-gallery--' . ( $product->get_image_id() ? 'with-images' : 'without-images' ),
				'woocommerce-product-gallery--columns-' . absint( $columns ),
				'images',
			) );
			?>
			<div class="<?php echo esc_attr( implode( ' ', array_map( 'sanitize_html_class', $wrapper_classes ) ) ); ?>" data-columns="<?php echo esc_attr( $columns ); ?>" style="opacity: 0; transition: opacity .25s ease-in-out;">
			<?php
					wc_get_template( 'single-product/sale-flash.php' ); ?>
				<figure class="woocommerce-product-gallery__wrapper">

					<?php
					if ( $product->get_image_id() ) {
						$html = wc_get_gallery_image_html( $post_thumbnail_id, true );
					} else {
						$html  = '<div class="woocommerce-product-gallery__image--placeholder">';
						$html .= sprintf( '<img src="%s" alt="%s" class="wp-post-image" />', esc_url( wc_placeholder_img_src( 'woocommerce_single' ) ), esc_html__( 'Awaiting product image', 'segovia' ) );
						$html .= '</div>';
					}

					echo apply_filters( 'woocommerce_single_product_image_thumbnail_html', $html, $post_thumbnail_id ); // phpcs:disable WordPress.XSS.EscapeOutput.OutputNotEscaped

					do_action( 'woocommerce_product_thumbnails' );
					?>
				</figure>
			</div>
		<?php
		}
	}
	add_action( 'woocommerce_before_single_product_summary', 'segovia_woocommerce_show_product_images', 20 );

	// Remove You May Also Like section
	remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15 );
  $woo_single_upsell = cs_get_option('woo_single_upsell');
  if($woo_single_upsell) {
		add_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_upsells', 20);
		if (!function_exists('woocommerce_output_upsells')) {
			function woocommerce_output_upsells() {
				$columns = cs_get_option('up_sell_column');
				$columns = $columns ? $columns : '3';
			    woocommerce_upsell_display(3,$columns); // Display 3 products in rows of 3
			}
		}
	}

	// Remove Cross sell section
	remove_action( 'woocommerce_cart_collaterals', 'woocommerce_cross_sell_display' );

  // Remove Related Products section
  $woo_single_related = cs_get_option('woo_single_related');
  if(!$woo_single_related) {
		remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );
  }

	// Product thumbnail column set to 1
	add_filter( 'woocommerce_product_thumbnails_columns', 'segovia_single_gallery_columns', 99 );
	function segovia_single_gallery_columns() {
	 return 1;
	}

} // class_exists => WooCommerce
