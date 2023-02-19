<?php
class MBPluginFrontEnd
{
    public function __construct()
    {
        add_action('wp_enqueue_scripts', [$this, 'fe_style']);
        add_action('wp_head', [$this, 'btnCartName']);
        $this->active_ajax();
        $this->activeCTA();
        $this->activeEcommerce();
        $this->activePayment();
        $this->activeAdvance();
    }
    public function fe_style()
    {
        wp_enqueue_style('fe-styles', MBWC_URL . 'assets/fe/css/app.css', [], time());
        wp_enqueue_script('app-js', MBWC_URL . 'assets/fe/js/app.js', array(), time(), true);
        wp_localize_script('app-js', 'mb_ajax_object', array('ajax_url' => admin_url('admin-ajax.php')));
        wp_enqueue_script('sweet-js',  MBWC_URL . 'assets/fe/js/sweetalert.min.js', array(), time(), true);
    }
    public function getValueSetting($key = "", $keySetting = "")
    {
        $value = get_option($keySetting);
        return $value;
    }
    public function btnCartName()
    {
        $ctaText = $this->getValueSetting('cta', 'btnCartName');
        $ctaText = ($ctaText) ? $ctaText :  __('Thêm vào giỏ', 'wphp-wc');
        return __($ctaText, 'mbwp-helper');
    }
    public function activeCTA()
    {
        // Change Button Cart Name
        add_filter('woocommerce_product_single_add_to_cart_text', [$this, 'btnCartName']);
        add_filter('woocommerce_product_add_to_cart_text', [$this, 'btnCartName']);
        // Convert zero to contact
        $this->convertZeroToContact();
        // Quickbuy
        $this->activeShowBuyNow();
    }
    public function convertZeroToContact()
    {
        $convertZeroToContact = $this->getValueSetting('cta', 'convertZeroToContact');
        if ($convertZeroToContact == 1) {
            add_action('woocommerce_get_price_html', [$this, 'replacePriceHTMl']);
            add_filter('woocommerce_is_purchasable', [$this, 'hideAddtoCartWhenPriceZero'], 10, 2);
        }
    }
    public function replacePriceHTMl($price)
    {
        global $product;
        if ($product->get_price() == 0 || !$product->is_in_stock()) {
            if ($product->is_on_sale() && $product->get_regular_price()) {
                $regular_price = wc_get_price_to_display($product, array('qty' => 1, 'price' => $product->get_regular_price()));
                $price = wc_format_price_range($regular_price, __('Liên hệ', 'wphp-wc'));
            } else {
                $price = '<span class="mbhp-wc-amount">' . __('Liên hệ', 'wphp-wc') . '</span>';
            }
        }
        return $price;
    }
    function hideAddtoCartWhenPriceZero($purchasable, $product)
    {
        $id = $product->get_id();
        $price = $product->get_price();
        if ($price == 0 || empty($price)) {
            remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart');
            $purchasable = false;
        }
        return $purchasable;
    }
    public function activeShowBuyNow()
    {
        $settingShowBuyNow = $this->getValueSetting('cta', 'showBuyNow');
        if ($settingShowBuyNow == '1') {
            add_action('woocommerce_after_add_to_cart_button', [$this, 'showBuyNow']);
            add_filter('woocommerce_add_to_cart_redirect', [$this, 'redirectBuyNow']);
        }
    }
    public function showBuyNow()
    {
        $xhtml = null;
        $xhtml .= sprintf('  <button type="button" class="button mb-buynow-button" id="mb_hpwc_buy_now_button">Mua ngay</button><input type="hidden" name="is_buy_now" class="is_buy_now" value="0" autocomplete="off"/>');
        // OUtput
    }
    public function redirectBuyNow($redirect_url)
    {
        if (isset($_REQUEST['is_buy_now']) && $_REQUEST['is_buy_now']) {
            $redirect_url = wc_get_checkout_url(); //or wc_get_cart_url()
        }
        return $redirect_url;
    }
    public function activeEcommerce()
    {
        add_action('woocommerce_after_add_to_cart_form', [$this, 'showEcommerce']);
    }
    public function showEcommerce()
    {
        $xhtml = null;
        global $product;
        $id = $product->get_id();
        $links = [];
        $data_ecommerce  = [
            'tiki',
            'shopee',
            'lazada',
            'sendo',
        ];
        foreach ($data_ecommerce as $item) {
            $value = get_option($item);
            if ($value == '1') {
                $link = get_post_meta($id, 'product-ecommerce-' . $item, true);
                if ($link) {
                    $links[$item] = $link;
                }
            }
        }
        $logo = array(
            'tiki'   => 'Tiki.svg',
            'shopee' => 'Shopee.svg',
            'lazada' => 'Lazada.svg',
            'sendo'  => 'Sendo.svg',
        );
        if ($links) {
            $xhtml .= "<ul class = 'mb-ecommerce-buttons'>";
            foreach ($links as $key => $link) {
                if ($link) {
                    $link = esc_url($link);
                    $logoUrl = plugin_dir_url(__DIR__) . "assets/admin/img/{$logo[$key]}";
                    $logoUrl = esc_url($logoUrl);
                    $logoImage = "<img src = '{$logoUrl}'>";
                    $name = ucfirst($key);
                    $name = esc_html($name);
                    $xhtml .= sprintf('<li>%s <a href = "%s" target = "_blank">Xem giá %s</a></li>', $logoImage, $link, $name);
                }
            }
            $xhtml .= "</ul>";
        }
        $allowed_html = array(
            'ul' => array(
                'class' => 'mb-ecommerce-buttons',
            ),
            'li' => array(),
            'img' => array(
                'src' => array()
            ),
            'a' => array(
                'href' => array(),
                'title' => array()
            ),
        );
        
        echo wp_kses($xhtml ,$allowed_html );
        
    }
    public function activePayment()
    {
        add_filter('woocommerce_checkout_fields', [$this, 'removeFieldCheckOut'], 30, 1);
        add_action('woocommerce_checkout_update_order_meta', [$this, 'updateOrderMetaCheckoutField']);
    }
    public function removeFieldCheckOut($fields)
    {
        $removeFields = [];
        $fullnameSetting = $this->getValueSetting('payment', 'fullname');
        $companySetting = $this->getValueSetting('payment', 'company');
        $zipCodeSetting = $this->getValueSetting('payment', 'zipCode');
        $countrySetting = $this->getValueSetting('payment', 'country');
        $addressSetting = $this->getValueSetting('payment', 'address');
        $provinceSetting = $this->getValueSetting('payment', 'province');
        if ($fullnameSetting == 1) {
            array_push($removeFields, 'first_name');
            $fields['billing']['billing_last_name'] = array(
                'label'         => __('Họ và tên', 'wphp-wc'),
                'placeholder'   => __('Nhập đầy đủ họ và tên của bạn', 'wphp-wc'),
                'required'      => true,
                'class'         => array('form-row-wide'),
                'clear'         => true
            );
            $fields['shipping']['shipping_last_name'] = array(
                'label'         => __('Họ và tên', 'wphp-wc'),
                'placeholder'   => __('Nhập đầy đủ họ và tên của người nhận', 'wphp-wc'),
                'required'      => true,
                'class'         => array('form-row-wide'),
                'clear'         => true
            );
        }
        if ($companySetting == 1) {
            array_push($removeFields, 'company');
        }
        if ($countrySetting == 1) {
            array_push($removeFields, 'country');
        }
        if ($zipCodeSetting == 1) {
            array_push($removeFields, 'postcode');
        }
        if ($addressSetting == 1) {
            array_push($removeFields, 'address_2');
        }
        if ($provinceSetting == 1) {
            array_push($removeFields, 'city');
        }
        foreach ($removeFields as $field) {
            unset($fields['billing']['billing_' . $field]);
            unset($fields['shipping']['shipping_' . $field]);
        }
        $fields['billing']['billing_phone']['placeholder'] = __('Nhập số điện thoại', 'wp-helper-premium');
        $fields['billing']['billing_email']['placeholder'] = __('Nhập email', 'wp-helper-premium');
        // Tỉnh thành quận huyện
        $fields['billing']['billing_last_name']['priority'] = 10;
        $fields['billing']['billing_phone']['priority'] = 20;
        $fields['billing']['billing_email']['priority'] = 30;
        $fields['billing']['billing_address_1']['priority'] = 70;
        return $fields;
    }
    public function active_ajax()
    {
    }
    public function activeAdvance()
    {
        $telegramSetting = $this->getValueSetting('advance', 'telegram');
        $vatSetting = $this->getValueSetting('advance', 'vat');
        $comtactSetting = $this->getValueSetting('advance', 'compact');
        $notifySetting = $this->getValueSetting('advance', 'notify');
        if ($telegramSetting == '1') {
            add_action('woocommerce_checkout_order_processed', [$this, 'notifyTelegram']);
        }
        if ($vatSetting == '1') {
            add_action('woocommerce_after_checkout_billing_form', [$this, 'createInvoiceVAT']);
            add_action('woocommerce_checkout_process', [$this, 'VATValidate']);
            add_action('woocommerce_checkout_update_order_meta', [$this, 'updateMetaVAT']);
        }
        if ($comtactSetting == '1') {
            add_action('wp_footer', [$this, 'compactContentProduct'], 0);
        }
        if ($notifySetting == '1') {
            add_action('wp_enqueue_scripts', [$this, 'notifyStyle']);
            add_action('wp_footer', [$this, 'showNotify'], 0);
        }
    }
    public function notifyTelegram($order_id)
    {
        if (!$order_id) return;
        $order = wc_get_order($order_id);
        $order_data = $order->get_data();
        $last_name = $order_data['billing']['last_name'];
        $phone = (isset($order_data['billing']['phone'])) ? $order_data['billing']['phone'] : "Chưa nhập số điện thoại";
        $paymentMethod = $order->get_payment_method_title();
        $msg = "<strong>Thông báo đơn hàng mới : #{$order_id} </strong> " . "\n";
        $msg .= "Họ tên: {$last_name}" . "\n";
        $msg .= "Số điện thoại: {$phone}" . "\n";
        $msg .= "Phương thức thanh toán: {$paymentMethod}" . "\n";
        $msg .= "<strong>Thông tin đơn hàng</strong>" . "\n";
        foreach ($order->get_items() as $item_id => $item) {
            $product_name = $item->get_name();
            $quantity = $item->get_quantity();
            $subtotal = $item->get_subtotal();
            $total = $item->get_total();
            $subtotal = number_format($subtotal) . "đ";
            $msg .= " - {$product_name} x ({$quantity}) - {$subtotal}" . "\n";
        }
        $total = $order->get_total();
        $total = number_format($total) . "đ";
        $msg .= "——————————————————————————" . "\n";
        $msg .= "Tổng đơn hàng: {$total}";
        $chatID = $this->getValueSetting('advance', 'telegramChatid'); // ID của Group trong Telegram
        $token = $this->getValueSetting('advance', 'telegramToken'); // Token của con Bot gửi thông báo
        $url = "https://api.telegram.org/bot" . $token . "/sendMessage?parse_mode=html&chat_id=" . $chatID;
        $url = $url . "&text=" . urlencode($msg);
        wp_remote_get($url);
    }
    public function createInvoiceVAT()
    {
        $xhtml = '<div class="mb_hpwc_invoice_vat">
        <label class="mb_hpwc_invoice_vat_label">
            <input class="mb_hpwc_invoice_vat_input" type="checkbox" name="mb_hpwc_invoice_vat_input" value="1">
            Xuất hóa đơn VAT
        </label>
        <div class="mb_hpwc_invoice_vat_wrap">
            <fieldset>
                <legend>Thông tin xuất hóa đơn:</legend>
                <p class="form-row form-row-first" id="billing_vat_company_field">
                    <label for="billing_vat_company" class="">Tên công ty <abbr class="required" title="bắt buộc">*</abbr></label>
                    <input type="text" class="input-text " name="billing_vat_company" id="billing_vat_company" placeholder="" value="">
                </p>
                <p class="form-row form-row-last" id="billing_vat_tax_code_field">
                    <label for="billing_vat_tax_code" class="">Mã số thuế <abbr class="required" title="bắt buộc">*</abbr></label>
                    <input type="text" class="input-text " name="billing_vat_tax_code" id="billing_vat_tax_code" placeholder="" value="">
                </p>
                <p class="form-row form-row-wide " id="billing_vat_company_address_field">
                    <label for="billing_vat_company_address" class="">Địa chỉ <abbr class="required" title="bắt buộc">*</abbr></label>
                    <span class="woocommerce-input-wrapper"><input type="text" class="input-text " name="billing_vat_company_address" id="billing_vat_company_address" placeholder="" value=""></span>
                </p>
            </fieldset>
        </div>
    </div>';
    //   Output
    }
    public function VATValidate()
    {
        if (isset($_POST['mb_hpwc_invoice_vat_input']) && !empty($_POST['mb_hpwc_invoice_vat_input'])) {
            if (empty($_POST['billing_vat_company'])) {
                wc_add_notice(__('Hãy nhập tên công ty'), 'error');
            }
            if (empty($_POST['billing_vat_tax_code'])) {
                wc_add_notice(__('Hãy nhập mã số thuế'), 'error');
            }
            if (empty($_POST['billing_vat_company_address'])) {
                wc_add_notice(__('Hãy nhập địa chỉ công ty'), 'error');
            }
        }
    }
    function updateMetaVAT($order_id)
    {
        if (isset($_POST['mb_hpwc_invoice_vat_input']) && !empty($_POST['mb_hpwc_invoice_vat_input'])) {
            update_post_meta($order_id, 'mb_hpwc_invoice_vat_input', intval($_POST['mb_hpwc_invoice_vat_input']));
            if (isset($_POST['billing_vat_company']) && !empty($_POST['billing_vat_company'])) {
                update_post_meta($order_id, 'billing_vat_company', sanitize_text_field($_POST['billing_vat_company']));
            }
            if (isset($_POST['billing_vat_tax_code']) && !empty($_POST['billing_vat_tax_code'])) {
                update_post_meta($order_id, 'billing_vat_tax_code', sanitize_text_field($_POST['billing_vat_tax_code']));
            }
            if (isset($_POST['billing_vat_company_address']) && !empty($_POST['billing_vat_company_address'])) {
                update_post_meta($order_id, 'billing_vat_company_address', sanitize_text_field($_POST['billing_vat_company_address']));
            }
        }
    }
    public function compactContentProduct()
    {
        wc_enqueue_js("jQuery('#tab-description').addClass('compact-active')");
    }
    public function notifyStyle()
    {
        wp_enqueue_style('wp-hp-wc-notification-style', MBWC_URL . 'assets/fe/css/mb-hp-wc-notification.css', [], time());
        wp_enqueue_script('wp-hp-wc-notification-js', MBWC_URL . 'assets/fe/js/mb-hp-wc-notification.js', array(), time(), true);
        $args = array(
            'post_type' => 'product',
            'posts_per_page' => 10,
            'ignore_sticky_posts' => 1,
        );
        $ids = array();
        $loop = new WP_Query($args);
        if ($loop->have_posts()) {
            while ($loop->have_posts()) : $loop->the_post();
                global $product;
                array_push($ids, get_the_ID());
            endwhile;
            wp_reset_query();
        }
        $data_notification = [];
        foreach ($ids as $item) :
            $product =  wc_get_product($item);
            $product_name = $product->get_name();
            $permalink = $product->get_permalink();
            $image = wp_get_attachment_url($product->get_image_id());
            $image = ($image) ? $image : MBWC_URL . "assets/fe/img/placeholder-image.jpg";
            $obj = [
                'product_name'  =>  $product_name,
                'permalink'     =>  $permalink,
                'images'        =>  $image
            ];
            array_push($data_notification, $obj);
        endforeach;
        wp_localize_script('wp-hp-wc-notification-js', 'notification', $data_notification);
    }
    public function showNotify()
    {
        $result =  '<div id="mbwp-message-purchased"></div>';
        $allowed_html = array(
            'div' => array('id' => 'mbwp-message-purchased')
        );
        echo wp_kses($result,$allowed_html);
    }
}
