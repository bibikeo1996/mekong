<?php
class MBPluginAdmin
{
    public function __construct()
    {
        add_action('admin_enqueue_scripts', [$this, 'admin_style']);
        add_action('admin_menu', [$this, 'add_admin_menu']);
        $this->active_ajax();
        // Media
        add_action('admin_enqueue_scripts', [$this, 'load_media_files']);
        // Ecommerce
        add_action('woocommerce_product_options_general_product_data', [$this, 'activeEcommerceSetting']);
        add_action('woocommerce_process_product_meta', [$this, 'saveEcommercefields']);
        // Wallet
        add_filter('woocommerce_payment_gateways', [$this, 'activeWalletSetting']);
        // add_action( 'plugins_loaded', [$this,'initWalletClass'] );
        // VAT
        add_action('woocommerce_admin_order_data_after_shipping_address', [$this, 'mb_hpwc_after_shipping_address_vat'], 99);
    }
    public function admin_style()
    {
        wp_enqueue_style('fontawesome-styles', 'https://pro.fontawesome.com/releases/v5.10.0/css/all.css',);
        wp_enqueue_style('admin-styles', MBWC_URL . 'assets/admin/css/admin.css',);
        wp_enqueue_style('toast-styles', MBWC_URL . 'assets/admin/css/jquery.toast.css',);
        wp_enqueue_script('custom-js', MBWC_URL . 'assets/admin/js/main.js', array(), time(), true);
        wp_localize_script('custom-js', 'mb_ajax_object', array('ajax_url' => admin_url('admin-ajax.php')));
        wp_enqueue_script('toast-js', MBWC_URL . 'assets/admin/js/jquery.toast.js', array(), time(), true);
       
    }
    public function add_admin_menu()
    {
        add_menu_page(
            'WP Helper',
            'WP Helper <span class = "menu-admin-icon">Premium</span>',
            'manage_options',
            'mb-plugin',
            [$this, 'show_general_setting_page'],
            '',
            '2'
        );
        // add_submenu_page('mb-plugin', 'Cài đặt chung', 'Cài đặt chung', 'manage_options', 'plugin-options-general-settings', [$this, 'show_general_setting_page']);
    }
    public function show_html_admin()
    {
        require_once plugin_dir_path(__FILE__) . '/html/page/index.php';
    }
    public function show_general_setting_page()
    {
        require_once plugin_dir_path(__FILE__) . '/html/page/setting.php';
    }
    public function active_ajax()
    {
        add_action('wp_ajax_showHtmlPanel', [$this, 'showHtmlPanel_func']);
        add_action('wp_ajax_nopriv_showHtmlPanel', [$this, 'showHtmlPanel_func']);
        // Setting Info
        add_action('wp_ajax_getSettingInfo', [$this, 'getSettingInfo_func']);
        add_action('wp_ajax_nopriv_getSettingInfo', [$this, 'getSettingInfo_func']);
        // Save Tempo
        add_action('wp_ajax_saveTempo', [$this, 'saveTempo_func']);
        add_action('wp_ajax_nopriv_saveTempo', [$this, 'saveTempo_func']);
        // Remove Tempo
        add_action('wp_ajax_removeDataTempo', [$this, 'removeDataTempo_func']);
        add_action('wp_ajax_nopriv_removeDataTempo', [$this, 'removeDataTempo_func']);
        // Compare Data
        add_action('wp_ajax_compareData', [$this, 'compareData_func']);
        add_action('wp_ajax_nopriv_compareData', [$this, 'compareData_func']);
    }
    public function showHtmlPanel_func()
    {
        $id = isset($_GET['id']) ? sanitize_text_field($_GET['id']) : "cta";
        $fileName = $id . ".php";
        $fileUrl = plugin_dir_path(__FILE__) . "/html/ajax/{$fileName}";
        $fileDefault = plugin_dir_path(__FILE__) . "/html/ajax/cta.php";
        $fileUrl = (file_exists($fileUrl)) ? $fileUrl : $fileDefault;
        require_once  $fileUrl;
        die();
    }
    public function checkboxChecked($keyPage = "", $keySetting = "")
    {
        $value = get_option($keySetting);
        $valueChecked = $value == '1' ? "checked" : "";
        return $valueChecked;
    }
    
    public function getSettingInfo_func()
    {
        $result = [];
        echo wp_json_encode($result);
        die();
    }
    public function saveTempo_func()
    {
        $dataTempo = [];
        $id = isset($_GET['id']) ? sanitize_text_field($_GET['id']) : "";
        $key = isset($_GET['key']) ? sanitize_text_field($_GET['key']) : "";
        $value = isset($_GET['value']) ? sanitize_text_field($_GET['value']) : "";
        $option = get_option($key);
        if ($option == '') {
            $action = "add";
            add_option($key, $value);
        } else {
            $action = "update";
            update_option($key, $value);
        }
        $option = get_option($key);
        $dataTempo[$id][$key] = $value;
        $dataTempoUpdate = json_encode($dataTempo);
        $dataTempo['option'] = $option;
        $dataTempo['key'] = $key;
        $dataTempo['action'] = $action;
        echo wp_json_encode($dataTempo);
        die();
    }
    public function activeEcommerceSetting()
    {
        $data_ecommerce  = [
            'tiki',
            'shopee',
            'lazada',
            'sendo',
        ];
        foreach ($data_ecommerce as $item) {
            $title = ucfirst($item);
            $value = get_option($item);
            if ($value == '1') {
                woocommerce_wp_text_input(
                    array(
                        'id' => "product-ecommerce-{$item}",
                        'placeholder' => __("Nhập link sản phẩm sàn {$title}", 'wphp-wc'),
                        'label' => __("Link {$title}", 'wphp-wc')
                    )
                );
            }
        }
    }
    public function saveEcommercefields()
    {
        global $post;
        $postID = $post->ID;
        $data_ecommerce  = [
            'tiki',
            'shopee',
            'lazada',
            'sendo',
        ];
        foreach ($data_ecommerce as $key) {
            $name = "product-ecommerce-{$key}";
            $value = sanitize_text_field($_POST[$name]);
            if ($value) {
                update_post_meta($postID, $name, esc_attr($value));
            }
        }
    }
    public function activeWalletSetting($gateways)
    {
        $data_wallet = [
            'momo',
            'zaloPay',
            'vnPay',
            'shopeePay',
        ];
        foreach ($data_wallet as $item) {
            $value = get_option($item);
            if ($value == '1') {
                $name =  "MB_Wallet_" . ucfirst($item);
                $gateways[] = $name;
                $fileURL = plugin_dir_path(__FILE__) . "wallet/{$name}.php";
                if (file_exists($fileURL)) {
                    require_once $fileURL;
                }
            }
        }
        require_once plugin_dir_path(__FILE__) . 'wallet/MB_Wallet_Momo.php';
        return $gateways;
    }
    public function load_media_files()
    {
        wp_enqueue_media();
    }
    function mb_hpwc_after_shipping_address_vat($order)
    {
        $mb_hpwc_invoice_vat_input = get_post_meta($order->get_id(), 'mb_hpwc_invoice_vat_input', true);
        $billing_vat_company = get_post_meta($order->get_id(), 'billing_vat_company', true);
        $billing_vat_tax_code = get_post_meta($order->get_id(), 'billing_vat_tax_code', true);
        $billing_vat_company_address = get_post_meta($order->get_id(), 'billing_vat_company_address', true);
?>
        <p><strong>Xuất hóa đơn:</strong> <?php echo (esc_html($mb_hpwc_invoice_vat_input)) ? 'Có' : 'Không'; ?></p>
        <?php
        if ($mb_hpwc_invoice_vat_input) :
        ?>
            <p>
                <strong>Thông tin xuất hóa đơn:</strong><br>
                Tên công ty: <?php echo esc_html($billing_vat_company); ?><br>
                Mã số thuế: <?php echo esc_html($billing_vat_tax_code); ?><br>
                Địa chỉ: <?php echo esc_html($billing_vat_company_address); ?><br>
            </p>
<?php
        endif;
    }
}
