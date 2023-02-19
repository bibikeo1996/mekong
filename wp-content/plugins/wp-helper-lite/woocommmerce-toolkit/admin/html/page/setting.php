<?php
$preview_cta =  MBWC_URL . 'assets/admin/img/DemoCTA.svg';
$preview_tmdt =  MBWC_URL . 'assets/admin/img/tmdt.svg';
$preview_payment =  MBWC_URL . 'assets/admin/img/Mauthongtin_macdinh.svg';
$preview_wallet =  MBWC_URL . 'assets/admin/img/cai-dat-thanh-toan.png';
$preview_img =  MBWC_URL . 'assets/admin/img/placeholder-image.jpg';
$dataURL =  MBWC_URL . 'data/data.json';
$tool_name = "WordPress Helper Premium";
?>
<div id="mb-admin">
    <div class="card-wrap">
        <div class="card-header">
            <h4 class="card-title"><?php echo esc_html('WooCommerce Toolkit'); ?></h4>
        </div>
    </div>
    <div class="card-wrap">
        <div class="card-body">
            <?php
            if (in_array('woocommerce/woocommerce.php', apply_filters('active_plugins', get_option('active_plugins')))) { ?>
                <div class="panel-wrap">
                    <div class="panel-menu">
                        <div class="panel-title"><?php echo esc_html('Cài đặt') ?></div>
                        <div class="panel-content">
                            <ul>
                                <li class="panel-menu-item active" data-id="cta" data-image="<?php echo esc_attr($preview_cta); ?>">
                                    <span><?php echo esc_html('1. Nút mua hàng (CTA)') ?></span>
                                    <span><?php echo esc_html('Điều chỉnh nội dung và các cài đặt khác của nút mua hàng.') ?></span>
                                </li>
                                <li class="panel-menu-item" data-id="ecommerce" data-image="<?php echo esc_attr($preview_tmdt); ?>">
                                    <span> <?php echo esc_html('2. Liên kết với sàn thương mại điện tử') ?> </span>
                                    <span><?php echo esc_html('Cho khách hàng có bán hàng trên Shopee, Lazada, Tiki, Sendo.') ?></span>
                                </li>
                                <li class="panel-menu-item" data-id="payment" data-image="<?php echo esc_attr($preview_payment); ?>">
                                    <span> <?php echo esc_html('3. Mẫu thông tin thanh toán') ?> </span>
                                    <span><?php echo esc_html('Điều chỉnh mẫu thông tin để việc quản lý CRM hiệu quả hơn.') ?></span>
                                </li>
                                <li class="panel-menu-item" data-id="wallet" data-image="<?php echo esc_attr($preview_wallet); ?>">
                                    <span> <?php echo esc_html('4. Tích hợp thanh toán bằng ví điện tử') ?> </span>
                                    <span><?php echo esc_html('Sử dụng Momo, Zalo Pay, VN Pay, Shopee Pay để thanh toán đơn hàng.') ?></span>
                                </li>
                                <li class="panel-menu-item" data-id="advance">
                                    <span> <?php echo esc_html('5. Tùy chỉnh nâng cao') ?> </span>
                                    <span><?php echo esc_html('Chức năng nâng cao, giúp tối ưu cho cửa hàng của bạn.') ?></span>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="panel-custom">
                        <div class="panel-title"><?php echo esc_html('Nội dung tùy chỉnh') ?></div>
                        <div class="panel-content">
                            <div class="card-loading">
                                <div class="double-loading">
                                    <div class="c1"></div>
                                    <div class="c2"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel-preview">
                        <div class="panel-title"><?php echo esc_html('Xem trước mẫu') ?></div>
                        <div class="panel-content">
                            <img src="<?php echo esc_url($preview_cta); ?>" alt="" class="preview-default" data-placeholder = "<?php echo esc_attr( $preview_img ); ?>">
                            <div class="form-group">
                                <button class="btn btn-primary" id="updateSetting" data-url="<?php echo esc_attr($dataURL); ?>"><?php echo esc_html('Cập nhật') ?></button>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } else { ?>
                <p><?php _e( 'WP Helper Premium yêu cầu phải cài đặt và kích hoạt <a href = "/wp-admin/plugin-install.php?s=woocommerce&tab=search&type=term">WooCommerce</a>!', 'my_plugin_textdomain' ); ?></p>
            <?php }
            ?>
           
        </div>
    </div>
</div>