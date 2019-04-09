<?php

/* Remove result count & product ordering & item product category..... */
function nimmo_cwoocommerce_remove_function() {
	remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10, 0 );
	remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5, 0 );
	remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10, 0 );
	remove_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10, 0 );
	remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10, 0 );
	remove_action( 'woocommerce_before_shop_loop' , 'woocommerce_catalog_ordering', 30 );
	remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );

	remove_action( 'woocommerce_single_product_summary' , 'woocommerce_template_single_rating', 10 );
	remove_action( 'woocommerce_single_product_summary' , 'woocommerce_template_single_price', 10 );
}
add_action( 'init', 'nimmo_cwoocommerce_remove_function' );

/* Product Category */
add_action( 'woocommerce_before_shop_loop', 'nimmo_woocommerce_nav_top', 2 );
function nimmo_woocommerce_nav_top() { ?>
	<div class="woocommerce-topbar">
		<div class="woocommerce-result-count">
			<?php woocommerce_result_count(); ?>
		</div>
		<div class="woocommerce-topbar-ordering">
			<?php woocommerce_catalog_ordering(); ?>
		</div>
	</div>
<?php }

add_filter( 'woocommerce_after_shop_loop_item', 'nimmo_woocommerce_product' );
function nimmo_woocommerce_product() {
	global $product;
	?>
	<div class="woocommerce-product-inner">
		<div class="woocommerce-product-header">
			<a class="woocommerce-product-details" href="<?php the_permalink(); ?>">
				<?php woocommerce_template_loop_product_thumbnail(); ?>
			</a>
			<div class="woocommerce-product-meta">
				<?php if ( ! $product->managing_stock() && ! $product->is_in_stock() ) { ?>
					<div class="woocommerce-out-of-stock">
				    	<a class="btn" href="<?php the_permalink(); ?>"><?php echo esc_html__('Out Of Stock', 'nimmo'); ?></a>
					</div>
				<?php } else { ?>
					<div class="woocommerce-add-to-cart">
				    	<?php woocommerce_template_loop_add_to_cart(); ?>
					</div>
				<?php } ?>
				<?php if (class_exists('YITH_WCQV')) { ?>
					<div class="woocommerce-quick-view">
						<a href="#" class="yith-wcqv-button" data-product_id="<?php echo esc_attr( $product->get_id() ); ?>"><i class="ti-eye"></i></a>
					</div>
				<?php } ?>
				<div class="woocommerce-wishlist">
					<?php if (class_exists('YITH_WCWL')) {
					    echo do_shortcode('[yith_wcwl_add_to_wishlist link_classes="add_to_wishlist" label="" product_added_text="" browse_wishlist_text="" already_in_wishslist_text="" icon="ti-heart"]');
					} ?>
				</div>
			</div>
		</div>
		<div class="woocommerce-product-holder">
			<h3 class="woocommerce-product-title">
				<a href="<?php the_permalink(); ?>" ><?php the_title(); ?></a>
			</h3>
			<?php woocommerce_template_loop_rating(); ?>
			<?php woocommerce_template_loop_price(); ?>
		</div>
	</div>
<?php }

/* Add the custom Tabs Specification */
function nimmo_custom_product_tab_specification( $tabs ) {
	$product_specification = nimmo_get_page_opt( 'product_specification' );
	if(!empty($product_specification)) {
		$tabs['tab-product-feature'] = array(
			'title'    => esc_html__( 'Product Specification', 'nimmo' ),
			'callback' => 'nimmo_custom_tab_content_specification',
			'priority' => 10,
		);
		return $tabs;
	} else {
		return $tabs;
	}
}
add_filter( 'woocommerce_product_tabs', 'nimmo_custom_product_tab_specification' );

/* Function that displays output for the Tab Specification. */
function nimmo_custom_tab_content_specification( $slug, $tab ) { 
	$product_specification = nimmo_get_page_opt( 'product_specification' );
	$result = count($product_specification); ?>
	<div class="tab-content-wrap">
		<?php if (!empty($product_specification)) : ?>
			<div class="tab-product-feature-list">
				<?php for($i=0; $i<$result; $i+=2) { ?>
					<div class="row">
						<div class="col-xl-3 col-lg-4 col-md-12">
                        	<?php echo isset($product_specification[$i])?esc_html( $product_specification[$i] ):''; ?>
                        </div>
                        <div class="col-xl-9 col-lg-8 col-md-12">
                        	<?php echo isset($product_specification[$i+1])?esc_html( $product_specification[$i+1] ):''; ?>
                        </div>
                    </div>
                    <div class="line-gap"></div>
				<?php } ?>
			</div>
		<?php endif; ?>
	</div>
<?php }

/* Removes the "shop" title on the main shop page */
function nimmo_hide_page_title()
{
    return false;
}
add_filter('woocommerce_show_page_title', 'nimmo_hide_page_title');

/* Replace text Onsale */
add_filter( 'woocommerce_sale_flash', 'nimmo_replace_sale_text' );
function nimmo_replace_sale_text( $html ) {
	return str_replace( 'Sale!', ''.esc_html__( 'Sale', 'nimmo' ).'', $html );
}


/* Show product per page */
function nimmo_loop_shop_per_page(){
	$product_per_page = nimmo_get_opt( 'product_per_page', '12' );

	if(isset($_REQUEST['loop_shop_per_page']) && !empty($_REQUEST['loop_shop_per_page'])) {
		return $_REQUEST['loop_shop_per_page'];
	} else {
		return $product_per_page;
	}
}
add_filter( 'loop_shop_per_page', 'nimmo_loop_shop_per_page' );

/**
 * Modify image width theme support.
 */
add_filter('woocommerce_get_image_size_gallery_thumbnail', function ($size) {
    $size['width'] = 250;
    $size['height'] = 285;
    $size['crop'] = 1;
    return $size;
});

/* Product Single: Summary */
add_action( 'woocommerce_before_single_product_summary', 'nimmo_woocommerce_single_summer_start', 0 );
function nimmo_woocommerce_single_summer_start() { ?>
	<?php echo '<div class="woocommerce-summary-wrap row">'; ?>
<?php }
add_action( 'woocommerce_after_single_product_summary', 'nimmo_woocommerce_single_summer_end', 5 );
function nimmo_woocommerce_single_summer_end() { ?>
	<?php echo '</div></div>'; ?>
<?php }
add_action( 'woocommerce_single_product_summary', 'nimmo_woocommerce_product_holder', 25 );
function nimmo_woocommerce_product_holder() { ?>
	<div class="woocommerce-sg-product-holder">
		<div class="woocommerce-holder-price">
			<?php woocommerce_template_single_price(); ?>
		</div>
		<div class="woocommerce-holde-rating">
			<?php woocommerce_template_single_rating(); ?>
		</div>
	</div>
<?php }

add_action( 'woocommerce_single_product_summary', 'nimmo_single_product_wishlist', 30 );
function nimmo_single_product_wishlist() { ?>
	<div class="woocommerce-single-wishlist">
		<?php if (class_exists('YITH_WCWL')) {
		    echo do_shortcode('[yith_wcwl_add_to_wishlist link_classes="add_to_wishlist" label="" product_added_text="" browse_wishlist_text="" already_in_wishslist_text="" icon="ti-heart"]');
		} ?>
	</div>
<?php }

/* Product Single: Gallery */
add_action( 'woocommerce_before_single_product_summary', 'nimmo_woocommerce_single_gallery_start', 0 );
function nimmo_woocommerce_single_gallery_start() { ?>
	<?php echo '<div class="woocommerce-gallery col-xl-6 col-lg-6 col-md-12">'; ?>
<?php }
add_action( 'woocommerce_before_single_product_summary', 'nimmo_woocommerce_single_gallery_end', 30 );
function nimmo_woocommerce_single_gallery_end() { ?>
	<?php echo '</div><div class="col-xl-6 col-lg-6 col-md-12">'; ?>
<?php }