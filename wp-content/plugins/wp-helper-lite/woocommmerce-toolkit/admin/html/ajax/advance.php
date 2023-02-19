<?php 
 $telegramToken = get_option('telegramToken');
 $telegramChatid = get_option('telegramChatid');
?>
<div class="panel-content-head">
    <h3><?php echo esc_html('Tùy chỉnh nâng cao') ?> </h3>
    <p><?php echo esc_html('Chức năng nâng cao, giúp tối ưu cho cửa hàng của bạn') ?></p>
</div>
<div class="panel-content-body">
    <div class="form-group d-flex form-group-checkbox">
        <div class="form-checkbox-text">
            <label for="" class="form-label"><?php echo esc_html('Tạo thông báo mua hàng') ?></label>
            <p class="form-desc">Tính năng này sẽ <strong>tự tạo 1 thông báo mua hàng</strong> của bạn với <strong>nội dung vừa có người vừa mua sản phẩm này.</strong> Mục đích là để khách hàng quyết định mua hàng nhanh hơn.</p>
        </div>
        <label class="switch">
            <input type="checkbox" id="notify" data-key='advance' class="setting-value" value="0" <?php echo esc_attr($this->checkboxChecked('advance','notify')); ?>>
            <div class="slider round">
                <!--ADDED HTML -->
                <span class="on"><?php echo esc_html('Bật'); ?></span>
                <span class="off"><?php echo esc_html('Tắt'); ?></span>
                <!--END-->
            </div>
        </label>
    </div>
   
    <div class="form-group d-flex form-group-checkbox">
        <div class="form-checkbox-text">
            <label for="" class="form-label"><?php echo esc_html('Xuất hóa đơn VAT') ?></label>
            <p class="form-desc">Tính năng này sẽ <strong>thêm trường yêu cầu xuất hóa đơn VAT vào Woocommerce</strong> của bạn.</p>
        </div>
        <label class="switch">
            <input type="checkbox" id="vat" data-key='advance' class="setting-value" value="0" <?php echo esc_attr($this->checkboxChecked('advance','vat')); ?>>
            <div class="slider round">
                <!--ADDED HTML -->
                <span class="on"><?php echo esc_html('Bật'); ?></span>
                <span class="off"><?php echo esc_html('Tắt'); ?></span>
                <!--END-->
            </div>
        </label>
    </div>
    <div class="form-group d-flex form-group-checkbox">
        <div class="form-checkbox-text">
            <label for="" class="form-label"><?php echo esc_html('Rút gọn mô tả sản phẩm') ?></label>
            <p class="form-desc"><?php echo esc_html('Đôi khi mô tả sản phẩm của bạn quá dài, khiến cho quá trình xem sản phẩm khó khăn. Tính năng này sẽ cho mô tả sản phẩm của bạn gọn hơn.') ?></p>
        </div>
        <label class="switch">
            <input type="checkbox" id="compact" data-key='advance' class="setting-value" value="0" <?php echo esc_attr($this->checkboxChecked('advance','compact')); ?>>
            <div class="slider round">
                <!--ADDED HTML -->
                <span class="on"><?php echo esc_html('Bật'); ?></span>
                <span class="off"><?php echo esc_html('Tắt'); ?></span>
                <!--END-->
            </div>
        </label>
    </div>
    <div class="form-group d-flex form-group-checkbox">
        <div class="form-checkbox-text">
            <label for="" class="form-label"><?php echo esc_html('Thông báo đơn hàng về Telegram'); ?></label>
            <p class="form-desc">Kích hoạt chức năng này sẽ gửi thông báo đơn hàng của bạn về ứng dụng Telegram của bạn. Hướng dẫn cài đặt thông báo Telegram. <a href="https://wiki.matbao.net/kb/huong-dan-tao-bot-va-gui-thong-bao-telegram/" target="_blank">Xem hướng dẫn tại đây</a></p>
        </div>
        <label class="switch">
            <input type="checkbox" id="telegram" data-key='advance' class="setting-value" value="0" <?php echo esc_attr($this->checkboxChecked('advance','telegram')); ?>>
            <div class="slider round">
                <!--ADDED HTML -->
                <span class="on"><?php echo esc_html('Bật'); ?></span>
                <span class="off"><?php echo esc_html('Tắt'); ?></span>
                <!--END-->
            </div>
        </label>
    </div>
    <div class="form-group">
        <label for="" class="form-label"><?php echo esc_html('Telegram Bot Token'); ?></label>
       
        <input type="text" placeholder="Nhập Token của Bot" class="form-control setting-value" data-key = "advance" id="telegramToken" value="<?php echo  esc_attr($telegramToken); ?>">
    </div>
    <div class="form-group">
        <label for="" class="form-label">Telegram Chat ID</label>
       
        <input type="text" placeholder="Nhập CHAT ID" class="form-control setting-value" data-key = "advance" id="telegramChatid" value="<?php echo esc_attr( $telegramChatid); ?>">
    </div>
</div>