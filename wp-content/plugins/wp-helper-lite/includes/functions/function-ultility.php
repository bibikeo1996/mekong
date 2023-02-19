<?php
function mbwp_format_text( $text ) {
$expr = ' /(?<=\s|^)[a-z]/i ';
preg_match_all( $expr, $text, $matches );
$result = implode( '', $matches[0] );
return strtoupper( $result );
}
function mbwp_format_date( $date ) {
$format_date = strtotime( $date );
$date_exp = explode( '', $format_date );
$new_date = gmdate( 'd-m-Y', $date_exp[0] );
return $new_date;
}
add_action( 'wp_ajax_mbwp_send_mail', 'mbwp_send_mail' );
add_action( 'wp_ajax_nopriv_mbwp_send_mail', 'mbwp_send_mail' );
function mbwp_send_mail() {
if (  isset( $_POST['email']) && sanitize_text_field( $_POST['email'] ) ) {
$to = sanitize_text_field( $_POST['email'] );
$subject = 'WP Helper - Cấu hình SMTP thành công';
$headers = array( ' Content-Type: text/html; charset=UTF-8 ' );
ob_start();
echo esc_html('Xin chúc mừng bạn đã cấu hình máy chủ SMTP thành công.') . PHP_EOL;
echo esc_html('WP Helper Team.') . PHP_EOL;
$message = ob_get_contents();
ob_end_clean();
$mail = wp_mail( $to, $subject, $message, $headers );
if ( $mail ) {
echo esc_html('success');
}
}
die();
}
