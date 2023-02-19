<?php 
$logo_momo =  MBWC_URL . '/assets/admin/img/logo-momo.svg';
$logo_zalopay =  MBWC_URL . '/assets/admin/img/zalopay.svg';
$logo_vnpay =  MBWC_URL . '/assets/admin/img/vnpay.svg';
$logo_shopeepay =  MBWC_URL . '/assets/admin/img/shopeepay.svg';

 ?>
<div class="panel-content-head">
    <h3>Tích hợp thanh toán bằng ví điện tử</h3>
    <p>Tính năng cho phép bạn <strong>cài đặt thêm</strong> phần <strong>hình thức thanh toán</strong> trên trang web bằng các ví điện tử (Momo, ZaloPay, VNPay, ShopeePay) một cách đơn giản và nhanh chóng.</p>
</div>
<div class="panel-content-body">
    <div class="form-group d-flex form-group-checkbox">
        <div class="form-checkbox-text">
            <label for="" class="form-label">Momo</label>
            <div class="form-desc-image">
            <img src="<?php echo esc_url($logo_momo); ?>" alt="">
            <p><a href="/wp-admin/admin.php?page=wc-settings&tab=checkout&section=wp_hp_wc_momo_pay_gateway" target="_blank">Hướng dẫn</a> cài đặt thanh toán bằng MoMo.  </p>
            </div>
           
        </div>
        <label class="switch">
            <input type="checkbox" id="momo"  data-key='wallet' class="setting-value" value="0" <?php echo esc_attr($this->checkboxChecked('wallet','momo')); ?>>
            <div class="slider round">
                <!--ADDED HTML -->
                <span class="on">Bật</span>
                <span class="off">Tắt</span>
                <!--END-->
            </div>
        </label>
    </div>
   
    <div class="form-group d-flex form-group-checkbox">
        <div class="form-checkbox-text">
            <label for="" class="form-label">Zalo Pay</label>
            <div class="form-desc-image">
            <img src="<?php echo esc_url($logo_zalopay); ?>" alt="">
            <p><a href="/wp-admin/admin.php?page=wc-settings&tab=checkout&section=wp_hp_wc_momo_pay_gateway" target="_blank">Hướng dẫn</a> cài đặt thanh toán bằng MoMo.  </p>
            </div>
           
        </div>
        <label class="switch">
            <input type="checkbox" id="zaloPay"  data-key='wallet' class="setting-value" value="0" <?php echo esc_attr($this->checkboxChecked('wallet','zaloPay')); ?>>
            <div class="slider round">
                <!--ADDED HTML -->
                <span class="on">Bật</span>
                <span class="off">Tắt</span>
                <!--END-->
            </div>
        </label>
    </div>
    <div class="form-group d-flex form-group-checkbox">
        <div class="form-checkbox-text">
            <label for="" class="form-label">VN Pay</label>
            <div class="form-desc-image">
            <img src="<?php echo esc_url($logo_vnpay); ?>" alt="">
            <p><a href="/wp-admin/admin.php?page=wc-settings&tab=checkout&section=wp_hp_wc_momo_pay_gateway" target="_blank">Hướng dẫn</a> cài đặt thanh toán bằng MoMo.  </p>
            </div>
           
        </div>
        <label class="switch">
            <input type="checkbox" id="vnPay"  data-key='wallet' class="setting-value" value="0" <?php echo esc_attr($this->checkboxChecked('wallet','vnPay')); ?>>
            <div class="slider round">
                <!--ADDED HTML -->
                <span class="on">Bật</span>
                <span class="off">Tắt</span>
                <!--END-->
            </div>
        </label>
    </div>
    <div class="form-group d-flex form-group-checkbox">
        <div class="form-checkbox-text">
            <label for="" class="form-label">Shopee Pay</label>
            <div class="form-desc-image">
            <img src="<?php echo esc_url($logo_shopeepay); ?>" alt="">
            <p><a href="/wp-admin/admin.php?page=wc-settings&tab=checkout&section=wp_hp_wc_momo_pay_gateway" target="_blank">Hướng dẫn</a> cài đặt thanh toán bằng MoMo.  </p>
            </div>
           
        </div>
        <label class="switch">
            <input type="checkbox" id="shopeePay"  data-key='wallet' class="setting-value" value="0" <?php echo esc_attr($this->checkboxChecked('wallet','shopeePay')); ?>>
            <div class="slider round">
                <!--ADDED HTML -->
                <span class="on">Bật</span>
                <span class="off">Tắt</span>
                <!--END-->
            </div>
        </label>
    </div>
</div>