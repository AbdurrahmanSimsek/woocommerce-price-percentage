// Only for WooCommerce version 3.0+
add_filter( 'woocommerce_format_sale_price', 'woocommerce_custom_sales_price', 10, 3 );
function woocommerce_custom_sales_price( $price, $regular_price, $sale_price ) {
    $percentage = round( ( $regular_price - $sale_price ) / $regular_price * 100 ).'%';
    $percentage_txt = __('<br /> <h3>İndirim ', 'woocommerce' ).$percentage;
    $price = '<del>' . ( is_numeric( $regular_price ) ? wc_price( $regular_price ) : $regular_price ) . '</del> <ins>' . ( is_numeric( $sale_price ) ? wc_price( $sale_price ) . $percentage_txt : $sale_price . $percentage_txt ) . '</h3></ins>';
    return $price;
}
