<?php
if ( ! defined( 'ABSPATH' ) ) {
exit;
}
$mbwp_options = get_option( 'mbwp_helper' );
if ( ! empty( $mbwp_options['mbwp-opt-smtp']['mbwp-smtp-active'] ) ) {
function mbwp_send_smtp_email( $phpmailer ) {
$mbwp_options = get_option( 'mbwp_helper' );
$phpmailer->isSMTP();
$phpmailer->Host       =  sanitize_text_field( $mbwp_options['mbwp-opt-smtp']['mbwp-smtp-host'] );
$phpmailer->Port       =  sanitize_text_field( $mbwp_options['mbwp-opt-smtp']['mbwp-smtp-port'] );
$phpmailer->SMTPSecure =  sanitize_text_field( $mbwp_options['mbwp-opt-smtp']['mbwp-smtp-security'] );
$phpmailer->From = sanitize_text_field( $mbwp_options['mbwp-opt-smtp']['mbwp-smtp-email'] );
$phpmailer->SMTPAuth   = true;
$phpmailer->Username   = sanitize_text_field( $mbwp_options['mbwp-opt-smtp']['mbwp-smtp-user'] );
$phpmailer->Password   = $mbwp_options['mbwp-opt-smtp']['mbwp-smtp-password'];
$phpmailer->FromName = sanitize_text_field( $mbwp_options['mbwp-opt-smtp']['mbwp-smtp-fromName'] );
$phpmailer->AddReplyTo( $phpmailer->From, $phpmailer->FromName );
}
add_action( 'phpmailer_init', 'mbwp_send_smtp_email' );
function mbwph_catch_phpmailer_error( $error ) {

}
add_action( 'wp_mail_failed', 'mbwph_catch_phpmailer_error' );
function mbwp_mail_enqueue_script() {
$data = array();
$data['url'] = admin_url( 'admin-ajax.php' );
$data['icon'] = MBWP_HP_URL . 'assets/images/wp-helper-loading.gif';
wp_enqueue_script( 'mbwp-smtp', MBWP_HP_URL . 'assets/js/mbwp-smtp-mail.js', array( 'jquery' ), '4.0.0', true );
wp_localize_script( 'mbwp-smtp', 'smtp', $data );
}
add_action( 'admin_enqueue_scripts', 'mbwp_mail_enqueue_script' );
add_action( 'wp_ajax_mbwp_send_mail', array( 'mbwph_Posts', 'mbwp_send_mail_ajax' ) );
add_action( 'wp_ajax_nopriv_mbwp_send_mail', array( 'mbwph_Posts', 'mbwp_send_mail_ajax' ) );
function mbwp_send_mail_ajax() {
if (  isset( $_POST['email'] ) && sanitize_text_field( $_POST['email'] ) ) {
$to = sanitize_text_field( $_POST['email'] );
$subject = 'WP Helper - Cấu hình SMTP thành công';
$headers = array( 'Content-Type: text/html; charset=UTF-8' );
ob_start();
echo esc_html('Xin chúc mừng bạn đã cấu hình máy chủ SMTP thành công.') . PHP_EOL;
echo esc_html('WP Helper Team.') . PHP_EOL;
$message = ob_get_contents();
ob_end_clean();
$mail = wp_mail( $to, $subject, $message, $headers );
if ( $mail ) {
echo esc_html('success');
} else {
echo esc_html('error');
}
}
exit();
}
add_filter( 'wp_mail_content_type', 'mbwph_mail_content_type' );
function mbwph_mail_content_type() {
return 'text/html';
}
}
