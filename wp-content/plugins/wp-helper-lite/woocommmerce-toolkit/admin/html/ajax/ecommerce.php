<?php
$logo_tiki =  MBWC_URL . '/assets/admin/img/Tiki.svg';
$logo_shopee =  MBWC_URL . '/assets/admin/img/Shopee.svg';
$logo_lazada =  MBWC_URL . '/assets/admin/img/Lazada.svg';
$logo_sendo =  MBWC_URL . '/assets/admin/img/Sendo.svg';


?>
<div class="panel-content-head">
    <h3>Liên kết sàn thương mại điện tử</h3>
    <p>Tính năng này cho phép bạn tạo đường dẫn cho sản phẩm đã được đăng ở các sàn thương mại điện tử: Shopee, Lazada, Tiki, Sendo.</p>
</div>
<div class="panel-content-body">
    <div class="form-group">
        <label for="" class="form-label">Chọn sàn thương mại điện tử</label>
        <div class="checkbox-list">
            <div class="checkbox-item">
                <input type="checkbox" id="tiki" data-key='ecommerce' class="setting-value" value="0" <?php echo esc_attr($this->checkboxChecked('ecommerce','tiki')); ?>>
                <label for="tiki"><img src="<?php echo esc_url($logo_tiki); ?>" alt=""></label>
            </div>
            <div class="checkbox-item">
                <input type="checkbox" id="shopee" data-key='ecommerce' class="setting-value" value="0" <?php echo esc_attr($this->checkboxChecked('ecommerce','shopee')); ?>>
                <label for="shopee"><img src="<?php echo esc_url($logo_shopee); ?>" alt=""></label>
            </div>
            <div class="checkbox-item">
                <input type="checkbox" id="lazada" data-key='ecommerce' class="setting-value" value="0" <?php echo esc_attr($this->checkboxChecked('ecommerce','lazada')); ?>>
                <label for="lazada"><img src="<?php echo esc_url($logo_lazada); ?>" alt=""></label>
            </div>
            <div class="checkbox-item">
                <input type="checkbox" id="sendo" data-key='ecommerce' class="setting-value" value="0" <?php echo esc_attr($this->checkboxChecked('ecommerce','sendo')); ?>>
                <label for="sendo"><img src="<?php echo esc_url($logo_sendo); ?>" alt=""></label>
            </div>
        </div>

    </div>

</div>