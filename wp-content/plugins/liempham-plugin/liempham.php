<?php
/**
 * Plugin Name: Liêm Phạm Plugin
 * Plugin URI: #
 * Description: Đây là plugin tôi viết chỉ để cá nhân hóa 1 số phần của wordpress
 * Version: 1.0 // Đây là phiên bản đầu tiên của plugin
 * Author: Phạm Thanh Liêm
 * Author URI: 077.6300.794(zalo,sdt)
 * License: GPLv2 or later
 */

// function xóa resize ảnh wordpress
function remove_unused_image_size( $sizes) {
 
   unset( $sizes['thumbnail']);
   unset( $sizes['medium']);
   unset( $sizes['large']);
   unset( $sizes['post-thumbnail']);
   unset( $sizes['twentyfourteen-full-width']
);
}
add_filter('intermediate_image_sizes_advanced', 'remove_unused_image_size');
// function xóa resize ảnh wordpress

// function việt hóa bước thanh toán
add_filter( 'gettext', function ( $strings ) {
$text = array(
'SHOPPING CART' => 'Giỏ hàng',
'CHECKOUT DETAILS' => 'Thanh toán',
'ORDER COMPLETE' => 'Hoàn tất',
);
$strings = str_ireplace( array_keys( $text ), $text, $strings );
return $strings;
}, 20 );
// function việt hóa bước thanh toán

// bypass logout wordpress khỏi phải click 2 bước
function wc_bypass_logout_confirmation() {
    global $wp;
 
    if ( isset( $wp->query_vars['customer-logout'] ) ) {
        wp_redirect( str_replace( '&amp;', '&', wp_logout_url( wc_get_page_permalink( 'myaccount' ) ) ) );
        exit;
    }
}
 add_action( 'template_redirect', 'wc_bypass_logout_confirmation' );
// bypass logout wordpress khỏi phải click 2 bước

// Upload ảnh định dạng Webp
function webp_upload_mimes($existing_mimes) {
    $existing_mimes['webp'] = 'image/webp';
    return $existing_mimes;
};
add_filter('mime_types', 'webp_upload_mimes');
// Upload ảnh định dạng Webp

function admin_style() {
  echo '<style type="text/css"> #flatsome-notice{display:none !important;;}</style>'; 
}
add_action('admin_enqueue_scripts', 'admin_style');

// custom logo login wordpress
function scanwp_custom_login_logo() { 
	echo '<style type="text/css"> h1 a { background-image:url("#") !important;}</style>'; 
} 
add_action('login_head', 'scanwp_custom_login_logo');
// custom logo login wordpress

// custom footer admin wordpress
function remove_footer_admin () { 
	echo "Thiết Kế Bởi LiemPham - <a href='tel:0776300794'>077.6300.794 - Web:<a href='http://liempham.baotramcompany.com/' target='_blank'>liemphamdev</a>"; 
} 
add_filter('admin_footer_text', 'remove_footer_admin');
// custom footer admin wordpress

// Giới hạn giá trị đơn hàng theo từng khu vực
// add_action( 'woocommerce_checkout_process', 'webamator_validate_city' );
// function webamator_validate_city() {
// 	$disableCityList = array (
// 	'Hồ Chí Minh',
// 	'tphcm',
// 	'Ho Chi Minh',
// 	);
// 	$billingCity = isset( $_POST['billing_city'] ) ? trim( $_POST['billing_city'] ) : '';
// 	$billingCity = str_replace(array('-','_'),' ',$billingCity);
// 	$billingCity = ucwords($billingCity);
// 		if (in_array($billingCity, $disableCityList))
// 		{
// 			if( is_cart() || is_checkout() ) {
// 				global $woocommerce;
// 				// Set minimum cart total
// 				$minimum_cart_total = 500000;
// 					// A Minimum of 100 AUD is required before checking out.
// 				$total = WC()->cart->subtotal;
// 					// Compare values and add an error is Cart's total
// 				  if( $total <= $minimum_cart_total  ) {
// 					 // Display our error message
// 							wc_add_notice( __( 'Khách sỉ tại TPHCM phải có đơn trên 500.000đ' ), 'error' );
// 				}
// 			  }
// 		}else{
// 			if( is_cart() || is_checkout() ) {
// 				global $woocommerce;
// 				// Set minimum cart total
// 				$minimum_cart_total = 1000000;
// 					// A Minimum of 100 AUD is required before checking out.
// 				$total = WC()->cart->subtotal;
// 					// Compare values and add an error is Cart's total
// 				  if( $total <= $minimum_cart_total  ) {
// 					 // Display our error message
// 							wc_add_notice( __( 'Khách sỉ tại Tỉnh phải có đơn trên 1.000.000đ' ), 'error' );
// 				}
// 			  }
// 		}
// }
// Giới hạn giá trị đơn hàng theo từng khu vực

// Giới hạn giá trị đơn - đạt điều kiện mới được thanh toán
// add_action( 'woocommerce_check_cart_items', 'cldws_set_min_total');
// function cldws_set_min_total() {
//   Only run in the Cart or Checkout pages
//   if( is_cart() || is_checkout() ) {
//     global $woocommerce;
//     // Set minimum cart total
//     $minimum_cart_total = 500000;
//         // A Minimum of 100 AUD is required before checking out.
//     $total = WC()->cart->subtotal;
//         // Compare values and add an error is Cart's total
//       if( $total <= $minimum_cart_total  ) {
//          // Display our error message
//       wc_add_notice( sprintf( '<strong>Khách hàng mua sỉ tại TPHCM phải có đơn từ 500.000đ mới được thanh toán!.</strong></br><strong>Khách hàng mua sỉ Tỉnh phải có đơn từ 1.000.000đ mới được thanh toán!.</strong>'
//         .'<br />Tổng giá trị đơn hàng: %s %s',
//         $minimum_cart_total,get_option( 'woocommerce_currency'),
//         $total,get_option( 'woocommerce_currency') ),'error' );
//     }
//   }
// }
// Giới hạn giá trị đơn - đạt điều kiện mới được thanh toán