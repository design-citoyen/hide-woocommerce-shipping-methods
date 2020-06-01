/**
 * @snippet       Disable Free Shipping if Cart has Shipping Class (WooCommerce 2.6+)
 * @how-to        Get CustomizeWoo.com FREE
 * @author        Rodolfo Melogli
 * @testedwith    WooCommerce 4.0
 * @donate $9     https://businessbloomer.com/bloomer-armada/
 */
  
add_filter( 'woocommerce_package_rates', 'hide_canada_shipping_for_popart_shipping_class', 10, 2 );

// Canada   
function hide_canada_shipping_for_popart_shipping_class ( $rates, $package ) {
   $shipping_class_target = 244; // shipping class ID (PopArt class)
   $in_cart = false;
   foreach ( WC()->cart->get_cart_contents() as $key => $values ) {
      if ( $values[ 'data' ]->get_shipping_class_id() == $shipping_class_target ) {
         $in_cart = true;
         break;
      } 
   }
   if ( $in_cart ) {
      unset( $rates['flat_rate:11'] ); // shipping method with ID (Livraison Canada)
   }
   return $rates;
}

add_filter( 'woocommerce_package_rates', 'hide_usa_shipping_for_popart_shipping_class', 10, 2 );

// USA   
function hide_usa_shipping_for_popart_shipping_class ( $rates, $package ) {
   $shipping_class_target = 244; // shipping class ID (PopArt class)
   $in_cart = false;
   foreach ( WC()->cart->get_cart_contents() as $key => $values ) {
      if ( $values[ 'data' ]->get_shipping_class_id() == $shipping_class_target ) {
         $in_cart = true;
         break;
      } 
   }
   if ( $in_cart ) {
      unset( $rates['flat_rate:13'] ); // shipping method with ID (Livraison USA)
   }
   return $rates;
}

add_filter( 'woocommerce_package_rates', 'hide_world_shipping_for_popart_shipping_class', 10, 2 );

// USA   
function hide_world_shipping_for_popart_shipping_class ( $rates, $package ) {
   $shipping_class_target = 244; // shipping class ID (PopArt class)
   $in_cart = false;
   foreach ( WC()->cart->get_cart_contents() as $key => $values ) {
      if ( $values[ 'data' ]->get_shipping_class_id() == $shipping_class_target ) {
         $in_cart = true;
         break;
      } 
   }
   if ( $in_cart ) {
      unset( $rates['flat_rate:14'] ); // shipping method with ID (Livraison International)
   }
   return $rates;
}
