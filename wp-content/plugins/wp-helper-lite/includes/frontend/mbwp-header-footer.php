<?php
if ( ! defined( 'ABSPATH' ) ) {
exit;
}
$mbwp_options = get_option( 'mbwp_helper' );

if ( ! empty( $mbwp_options['wpmb-header-code-editor'] ) ) {
function mwp_render_header_script() {
$mbwp_options = get_option( 'mbwp_helper' );
$result       = stripslashes( $mbwp_options['wpmb-header-code-editor'] );
echo esc_html( $result );
}
add_action( 'wp_head', 'mwp_render_header_script', 1 );
}

if ( ! empty( $mbwp_options['wpmb-footer-code-editor'] ) ) {
function mwp_render_footer_script() {
$mbwp_options = get_option( 'mbwp_helper' );
$result       = stripslashes( $mbwp_options['wpmb-footer-code-editor'] );
echo esc_html( $result );
}
add_action( 'wp_footer', 'mwp_render_footer_script', 1 );
}

if ( ! empty( $mbwp_options['mbwp-helper-body-scripts-top'] ) ) {
function mbwp_helper_body_top_script() {
$mbwp_options = get_option( 'mbwp_helper' );
$result       = stripslashes( $mbwp_options['mbwp-helper-body-scripts-top'] );
echo esc_html( $result );
}
add_action( 'wp_body_open', 'mbwp_helper_body_top_script', 1 );
}
