<?php
if (!defined('WPINC')) {
    die;
}
define('MBWC_VERSON', '1.4.0');
define('MBWC_FILE', __FILE__);
define('MBWC_ABSPATH', dirname(MBWC_FILE) . '/');
define('MBWC_URL', plugins_url('/', MBWC_FILE));
function mbwc_plugin_active()
{
    require_once plugin_dir_path(__FILE__) . 'inc/class-plugin-active.php';
    Plugin_Active::active();
}
function mbwc_plugin_deactive()
{
    require_once plugin_dir_path(__FILE__) . 'inc/class-plugin-deactive.php';
    Plugin_Deactive::deactive();
}
if (!function_exists('is_woocommerce_activated')) {
    function is_woocommerce_activated()
    {
        if (class_exists('woocommerce')) {
            return true;
        } else {
            return false;
        }
    }
}
require plugin_dir_path(__FILE__) . 'inc/class-plugin-setup.php';
$pluginSetup = new WoocommerceToolkit();
$pluginSetup->runPlugin();

// require plugin_dir_path(__FILE__) . 'admin/class-plugin-admin.php';
// $pluginSetup = new MBPluginAdmin();
