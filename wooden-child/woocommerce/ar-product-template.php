<?php
/**
 * The Template for displaying all single products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}


get_header( 'shop' ); 

$product_id = get_the_ID();
$product = wc_get_product( $product_id );
$product_shotcode = get_post_meta($product_id, '_ar_shortcode', true);
?>

	<?php
	
		/**
		 * woocommerce_before_main_content hook.
		 *
		 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
		 * @hooked woocommerce_breadcrumb - 20
		 */
		do_action( 'woocommerce_before_main_content' );
	?>
	<div class="single-ar-product"> 
		<?php echo do_shortcode($product_shotcode); ?>
	</div>

	<div class="single-product-summary">
		<h1 class="product-title"><?php echo get_the_title($product_id); ?></h1>
		<div class="product-description">
			<?php the_content($product_id); ?>
		</div>
		<span class="product-price"><?php echo wc_price($product->get_price()); ?></span>
		<div class="product-add-to-cart">
			<?php
				echo woocommerce_template_single_add_to_cart();
			?>
		</div>
	</div>
<?php
get_footer( 'shop' );

/* Omit closing PHP tag at the end of PHP files to avoid "headers already sent" issues. */
