<?php
/**
 * My Orders
 *
 * @deprecated  2.6.0 this template file is no longer used. My Account shortcode uses orders.php.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$my_orders_columns = apply_filters( 'woocommerce_my_account_my_orders_columns', array(
	'order-number'  => __( 'Order', 'woocommerce' ),
	'order-travellers'   => __( 'Travellers', 'woocommerce' ),
	'order-date'    => __( 'Date', 'woocommerce' ),
	'order-price'  => __( 'Price', 'woocommerce' ),
	'order-actions' => '&nbsp;',
) );

$customer_orders = get_posts( apply_filters( 'woocommerce_my_account_my_orders_query', array(
	'numberposts' => $order_count,
	'meta_key'    => '_customer_user',
	'meta_value'  => get_current_user_id(),
	'post_type'   => wc_get_order_types( 'view-orders' ),
	'post_status' => array_keys( wc_get_order_statuses() )
) ) );

if ( $customer_orders ) : ?>

	<h2><?php echo apply_filters( 'woocommerce_my_account_my_orders_title', __( 'Your previous tours with Viland', 'woocommerce' ) ); ?></h2>

	<table class="shop_table shop_table_responsive my_account_orders hidden-mbPo">

		<thead>
			<tr>
				<?php foreach ( $my_orders_columns as $column_id => $column_name ) : ?>
					<th class="<?php echo esc_attr( $column_id ); ?>"><span class="nobr"><?php echo esc_html( $column_name ); ?></span></th>
				<?php endforeach; ?>
			</tr>
		</thead>

		<tbody>
			<?php foreach ( $customer_orders as $customer_order ) :
				$order      = wc_get_order( $customer_order );
				$item_count = $order->get_item_count();
				foreach( $order->get_items() as $item_id => $item ) {
					$product = apply_filters( 'woocommerce_order_item_product', $order->get_product_from_item( $item ), $item );
					$product_permalink = apply_filters( 'woocommerce_order_item_permalink', $product->get_permalink( $item ) , $item, $order );
					$url_img = get_the_post_thumbnail_url( $product->id, 'thumbnail' );
				}
				?>
				<tr class="order">
					<?php foreach ( $my_orders_columns as $column_id => $column_name ) : ?>
						<td class="<?php echo esc_attr( $column_id ); ?>" data-title="<?php echo esc_attr( $column_name ); ?>">
							<?php if ( has_action( 'woocommerce_my_account_my_orders_column_' . $column_id ) ) : ?>
								<?php do_action( 'woocommerce_my_account_my_orders_column_' . $column_id, $order ); ?>

							<?php elseif ( 'order-number' === $column_id ) : ?>
								<?php if( $url_img ): ?>
								<a href="<?php echo $product_permalink; ?>"><img src="<?php echo $url_img; ?>"></a>
								<?php endif; ?>
								<a href="<?php echo $product_permalink; ?>"><?php echo $product->get_title(); ?></a>

                            <?php elseif ( 'order-travellers' === $column_id ) : ?>
                                <p class="title-cl">TRAVELLERS</p>
                                <?php echo $item_count; ?>

                            <?php elseif ( 'order-date' === $column_id ) : ?>
                                <p class="title-cl">DATE</p>
								<time datetime="<?php echo date( 'Y-m-d', strtotime( $order->order_date ) ); ?>" title="<?php echo esc_attr( strtotime( $order->order_date ) ); ?>"><?php echo date_i18n( get_option( 'date_format' ), strtotime( $order->order_date ) ); ?></time>

							<?php elseif ( 'order-price' === $column_id ) : ?>
                                <p class="title-cl">PRICE</p>
								<?php echo $order->get_formatted_order_total(); ?>

							<?php elseif ( 'order-actions' === $column_id ) : ?>
								<td class="hidden-mobile"><a class="write-review" data-toggle="modal" data-target="#review-popup" href="#">Write A Review</a></td>
							<?php endif; ?>
						</td>
					<?php endforeach; ?>
				</tr>
                <tr class="visible-mobile"><td colspan="5" class="space-td"></td></tr>
                <tr class="visible-mobile">
                    <td colspan="5"><a class="write-review" data-toggle="modal" data-target="#review-popup" href="#">Write A Review</a></td>
                </tr>
                <tr><td colspan="5" class="space-td"></td></tr>
			<?php endforeach; ?>
		</tbody>
	</table>


    <table class="shop_table shop_table_responsive my_account_orders visible-mbPo">

        <tbody>
        <?php foreach ( $customer_orders as $customer_order ) :
            $order      = wc_get_order( $customer_order );
            $item_count = $order->get_item_count();
            foreach( $order->get_items() as $item_id => $item ) {
                $product = apply_filters( 'woocommerce_order_item_product', $order->get_product_from_item( $item ), $item );
                $product_permalink = apply_filters( 'woocommerce_order_item_permalink', $product->get_permalink( $item ) , $item, $order );
                $url_img = get_the_post_thumbnail_url( $product->id, 'thumbnail' );
            }
            ?>
            <tr class="order">
                <?php foreach ( $my_orders_columns as $column_id => $column_name ) : ?>
                <td class="<?php echo esc_attr( $column_id ); ?>" data-title="<?php echo esc_attr( $column_name ); ?>">
                    <?php if ( has_action( 'woocommerce_my_account_my_orders_column_' . $column_id ) ) : ?>
                        <?php do_action( 'woocommerce_my_account_my_orders_column_' . $column_id, $order ); ?>

                    <?php elseif ( 'order-number' === $column_id ) : ?>
                        <?php if( $url_img ): ?>
                            <a href="<?php echo $product_permalink; ?>"><img src="<?php echo $url_img; ?>"></a>
                        <?php endif; ?>
                        <a href="<?php echo $product_permalink; ?>"><?php echo $product->get_title(); ?></a>

                    <?php elseif ( 'order-actions' === $column_id ) : ?>
                        <td class="hidden-mobile"><a class="write-review" data-toggle="modal" data-target="#review-popup" href="#">Write A Review</a></td>
                    <?php endif; ?>
                    </td>
                <?php endforeach; ?>
            </tr>
            <tr class="visible-mobile"><td class="space-td" colspan="2"></td></tr>
<!--            <tr class="visible-mobile">-->
<!--                <td><a class="write-review" data-toggle="modal" data-target="#review-popup" href="#">Write A Review</a></td>-->
<!--            </tr>-->
            <tr><td class="space-td" colspan="2"></td></tr>
        <?php endforeach; ?>
        </tbody>
    </table>
<?php endif; ?>
