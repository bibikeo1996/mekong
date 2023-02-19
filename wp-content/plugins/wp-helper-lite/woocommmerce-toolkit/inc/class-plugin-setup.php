<?php
if (!defined('WPINC')) {
    die;
}
class WoocommerceToolkit
{
    protected $loader;
    protected $plugin_name;
    protected $version;
    public function __construct()
    {
        if (defined('MB_VERSON')) {
            $this->version = MB_VERSON;
        } else {
            $this->version = '1.0.0';
        }
        $this->plugin_name = 'MB_Plugin';
       
    }
  
    public function activeAdmin() {
        
        $adminUrl = plugin_dir_path( __DIR__ ) . 'admin/class-plugin-admin.php';
        require_once $adminUrl;
        $pluginAdmin = new MBPluginAdmin();
    }
    public function activeFrontEnd() {
        $feUrl = plugin_dir_path( __DIR__ ) . 'frontend/class-plugin-frontEnd.php';
        require_once $feUrl;
        $pluginFrontEnd = new MBPluginFrontEnd();
    }
    public function runPlugin() {
        $this->activeAdmin();
        if(in_array('woocommerce/woocommerce.php', apply_filters('active_plugins', get_option('active_plugins')))) {
            $this->activeFrontEnd();
        }
       
    }
    public function showErrorNotice() {
        add_action( 'admin_notices', [$this,'tmplErrrorNotice'] );
    }
    public function tmplErrrorNotice() {
        ?>
        <div class="error notice">
            <p><?php _e( 'WP Helper Premium yêu cầu phải cài đặt và kích hoạt <a href = "/wp-admin/plugin-install.php?s=woocommerce&tab=search&type=term">WooCommerce</a>!', 'my_plugin_textdomain' ); ?></p>
        </div>
        <?php
    }
    
    public function run()
    {
        $this->loader->run();
    }
    public function get_plugin_name()
    {
        return $this->plugin_name;
    }
    public function get_loader()
    {
        return $this->loader;
    }
    public function get_version()
    {
        return $this->version;
    }
}
