<?php
/**
 * Plugin Name: WP Helper Premium
 * Plugin URI:  https://www.matbao.net/hosting/wp-helper-plugin.html
 * Description: The best WordPress All-in-One plugin. ❤ Made in Vietnam by MWP Team.
 * Version:     4.4.4
 * Author:      Mat Bao Corp
 * Author URI:  https://www.matbao.net/hosting/wp-helper-plugin.html
 * Text Domain: mbwp-helper
 * Domain Path: /languages
 * License:     GPL2
 */
defined( 'ABSPATH' ) || exit;
if ( ! defined( 'MBWP_HP_FILE' ) ) {
define( 'MBWP_HP_FILE', __FILE__ );
}
// Include the main WP Helper class.
if ( ! class_exists( 'MB_WP_Helper', false ) ) {
include_once dirname( MBWP_HP_FILE ) . '/includes/class-mbwp-helper.php';
}
function create_instance_mbwp_hp() {
return MB_WP_Helper::instance();
}
function mbwp_hp_loader() {
load_plugin_textdomain( 'mbwp-helper', false, basename( dirname( MBWP_HP_FILE ) ) . ' /languages/' );
$GLOBALS['mbwp-helper'] = create_instance_mbwp_hp();
}
add_action( 'plugins_loaded', 'mbwp_hp_loader' );
require plugin_dir_path( __FILE__ ) . 'woocommmerce-toolkit/woocommerce-toolkit.php';
