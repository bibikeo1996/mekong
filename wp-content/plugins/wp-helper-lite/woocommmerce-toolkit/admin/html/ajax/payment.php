<div class="panel-content-head">
    <h3>Mẫu thông tin thanh toán</h3>
    <p>Điều chỉnh mẫu thông tin để việc quản lý CRM hiệu quả hơn.</p>
</div>
<div class="panel-content-body">
    <div class="form-group d-flex form-group-checkbox">
        <div class="form-checkbox-text">
            <label for="" class="form-label">Họ và tên</label>
            <p class="form-desc">Mẫu mặc định của trường này là sẽ tách riêng 2 ô Tên và Họ. Khi tính năng này được bật, Họ và tên chỉ còn lại 1 ô nhập.</p>
        </div>
        <label class="switch">
            <input type="checkbox" id="fullname" data-key='payment' class="setting-value" value="0" <?php echo esc_attr($this->checkboxChecked('payment','fullname')); ?>>
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
            <label for="" class="form-label">Địa chỉ</label>
            <p class="form-desc">
            Mẫu <strong>mặc định</strong> của trường địa chỉ là <strong>có 2 ô nhập</strong> (Ô để nhập địa chỉ và ô để nhập tên, số căn hộ cho khách ở chung cư). Khi <strong>tính năng</strong> này được <strong>bật,</strong> trường địa chỉ <strong>còn lại 1 ô nhập.</strong>
            </p>
        </div>
        <label class="switch">
            <input type="checkbox" id="address" data-key='payment' class="setting-value" value="0" <?php echo esc_attr($this->checkboxChecked('payment','address')); ?>>
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
            <label for="" class="form-label">Ẩn quốc gia/Khu vực</label>
            <p class="form-desc">
            Ẩn trường Quốc gia / Khu vực
            </p>
        </div>
        <label class="switch">
            <input type="checkbox" id="country"  data-key='payment' class="setting-value" value="0" <?php echo esc_attr($this->checkboxChecked('payment','country')); ?>>
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
            <label for="" class="form-label">Ẩn tên công ty</label>
            <p class="form-desc">
            Ẩn trường Tên công ty
            </p>
        </div>
        <label class="switch">
            <input type="checkbox" id="company"  data-key='payment' class="setting-value" value="0" <?php echo esc_attr($this->checkboxChecked('payment','company')); ?>>
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
            <label for="" class="form-label">Ẩn mã bưu điện</label>
            <p class="form-desc">
            Ẩn trường Mã bưu điện
            </p>
        </div>
        <label class="switch">
            <input type="checkbox"  id="zipCode"  data-key='payment' class="setting-value" value="0" <?php echo esc_attr($this->checkboxChecked('payment','zipCode')); ?>>
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
            <label for="" class="form-label">Tỉnh / Thành phố</label>
            <p class="form-desc">
           Ẩn trường Tỉnh/ Thành phố
            </p>
        </div>
        <label class="switch">
            <input type="checkbox"  id="province"  data-key='payment' class="setting-value" value="0" <?php echo esc_attr($this->checkboxChecked('payment','province')); ?>>
            <div class="slider round">
                <!--ADDED HTML -->
                <span class="on">Bật</span>
                <span class="off">Tắt</span>
                <!--END-->
            </div>
        </label>
    </div>
  
</div>