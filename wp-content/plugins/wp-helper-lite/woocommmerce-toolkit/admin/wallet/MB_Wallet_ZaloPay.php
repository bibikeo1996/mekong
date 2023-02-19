<?php
defined( 'ABSPATH' ) || exit;

if( !class_exists('MB_Wallet_ZaloPay') ){

    class MB_Wallet_ZaloPay extends WC_Payment_Gateway {
        public function __construct() {

            $this->id                 = 'MB_Wallet_ZaloPay';
            $this->icon               = MBWC_URL.'assets/admin/img/zalopay.svg';
            $this->has_fields         = false;
            $this->method_title       = __( 'Ví điện tử ZaLo', 'wphp-wc' );
            $this->method_description = __( 'Cho phép thanh toán qua tử ZaLo', 'wphp-wc' );

            // Load the settings.
            $this->init_form_fields();
            $this->init_settings();

            // Define user set variables
            $this->title        = $this->get_option( 'title' );
            $this->description  = $this->get_option( 'description' );
            $this->instructions = $this->get_option( 'instructions', $this->description );
            $this->zalo_image_url = $this->get_option( 'zalo_image_url' );
            // Actions
            add_action( 'woocommerce_update_options_payment_gateways_' . $this->id, array(
                $this,
                'process_admin_options'
            ) );
            add_action( 'woocommerce_thankyou_' . $this->id, array( $this, 'thankyou_page' ) );

            // Customer Emails
            add_action( 'woocommerce_email_before_order_table', array( $this, 'email_instructions' ), 10, 3 );
        }
        public function init_form_fields() {

            $this->form_fields = apply_filters( 'wc_offline_form_fields', array(

                'enabled' => array(
                    'title'   => __( 'Bật/Tắt', 'wphp-wc' ),
                    'type'    => 'checkbox',
                    'label'   => __( 'Bật phương thức thanh toán', 'wphp-wc' ),
                    'default' => 'yes'
                ),

                'title' => array(
                    'title'       => __( 'Tiêu đề', 'wphp-wc' ),
                    'type'        => 'text',
                    'description' => __( 'Trường này sẽ hiện thị ở ngoài trang thanh toán', 'wphp-wc' ),
                    'default'     => __( 'Thanh toán qua Zalo', 'wphp-wc' ),
                    'desc_tip'    => true,
                ),

                'description' => array(
                    'title'       => __( 'Mô tả', 'wphp-wc' ),
                    'type'        => 'textarea',
                    'description' => __( 'Nhập mô tả của phương thức.', 'wphp-wc' ),
                    'default'     => __( 'Thanh toán qua ví điện tử Zalo. An toàn và nhanh chóng!', 'wphp-wc' ),
                    'desc_tip'    => true,
                ),
                'phone'       => array(
                    'title'       => __( 'Số điện thoại Zalo', 'wphp-wc' ),
                    'type'        => 'text',
                    'description' => __( 'Nhập số điện thoại nhận tiền', 'wphp-wc' ),
                    'desc_tip'    => true,
                ),
                'name'        => array(
                    'title' => __( 'Tên tài khoản Zalo', 'wphp-wc' ),
                    'type'  => 'text',
                ),
                'zalo_image_url' => array(
                    'title' => __( 'Hình QR Code', 'wphp-wc' ),
                    'type' => 'text',
                    'desc_tip'      => false,
                    'class'      => 'upload_input_qr',
                )
            ) );
        }
        public function thankyou_page( $order_id ) {
            
            if ( $this->instructions ) {
                
                $order = new WC_Order($order_id);
                esc_html($order->get_formatted_order_total());
               
            }

        }
        public function email_instructions( $order, $sent_to_admin, $plain_text = false ) {

            if ( $this->instructions && ! $sent_to_admin && $this->id === $order->payment_method && $order->has_status( 'pending' ) ) {
                $this->show($order->id);
            }
        }
        public function process_payment( $order_id ) {
            global $woocommerce;
            $order = new WC_Order( $order_id );

            // Mark as on-hold (we're awaiting the payment)
            $order->update_status( 'pending', __( 'Chờ thanh toán', 'wphp-wc' ) );

            // Remove cart
            $woocommerce->cart->empty_cart();

            return array(
                'result'   => 'success',
                'redirect' => $this->get_return_url( $order )
            );
        }
    }

}