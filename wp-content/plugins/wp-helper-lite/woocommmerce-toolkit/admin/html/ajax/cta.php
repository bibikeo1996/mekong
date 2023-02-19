<div class="panel-content-head">
    <h3><?php echo esc_html('Nút mua hàng (CTA)') ?></h3>
    <p><?php echo esc_html('Bằng việc thay đổi nội dung và cài đặt khác của nút mua hàng sẽ thu hút khách hàng tốt hơn dẫn đến việc bán hàng của bạn sẽ hiệu quả hơn.') ?></p>
</div>
<div class="panel-content-body">
    <?php 
    $btnCartName = get_option('btnCartName');
    $convertZeroToContact = get_option('convertZeroToContact');
    $convertZeroToContactChecked = (!empty($convertZeroToContact) && $convertZeroToContact == '1') ? "checked" : ""; 
    $showBuyNow = get_option('showBuyNow');
    $showBuyNowChecked = (!empty($showBuyNow) && $showBuyNow == '1') ? "checked" : ""; 
    ?>
    <div class="form-group">
        <label for="" class="form-label"><?php echo esc_html('Thay đổi nội dung nút mua hàng'); ?></label>
        <p class="form-desc"><?php echo esc_html('Bằng việc thay đổi nội dung và cài đặt khác của nút mua hàng sẽ thu hút khách hàng tốt hơn dẫn đến việc bán hàng của bạn sẽ hiệu quả hơn.'); ?></p>
        <input type="text" placeholder="Thêm vào giỏ hàng" class="form-control setting-value" data-key = "cta" id="btnCartName" value="<?php echo  esc_attr($btnCartName); ?>">
    </div>
    <div class="form-group d-flex form-group-checkbox">
        <div class="form-checkbox-text">
            <label for="" class="form-label"><?php echo esc_html('Chuyển giá 0đ thành liên hệ') ?></label>
            <p class="form-desc"><?php echo esc_html('Khi sử dụng tính năng này, [nút mua hàng] của những sản phẩm bạn đã cài đặt giá “0đ” sẽ được đổi thành [nút liên hệ].') ?></p>
        </div>
        <label class="switch">
            <input type="checkbox"  id="convertZeroToContact" class="setting-value" data-key="cta" value="0" <?php echo esc_attr($convertZeroToContactChecked); ?>>
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
            <label for="" class="form-label">Thêm nút mua hàng ngay</label>
            <p class="form-desc">Hiển thị nút mua hàng ngay tại trang chi tiết sản phẩm. Giúp khách hàng thực hiện thao tác thanh toán một cách nhanh chóng.</p>
        </div>
        <label class="switch">
            <input type="checkbox" data-key="cta" class="setting-value" id="showBuyNow" <?php echo esc_attr($showBuyNowChecked); ?> value="0">
            <div class="slider round">
                <!--ADDED HTML -->
                <span class="on">Bật</span>
                <span class="off">Tắt</span>
                <!--END-->
            </div>
        </label>
    </div>
</div>