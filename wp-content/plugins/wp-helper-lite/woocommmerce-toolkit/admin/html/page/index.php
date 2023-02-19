<div id="mb-admin">
    <div class="card-wrap">
        <div class="card-header d-flex ">
            <div class="card-header-text">
                <h1 class="card-title"><?php echo esc_html('Chào mừng bạn đến với WP Helper Premium') ?></h1>
            
            </div>
            <div class="card-header-logo">
                <?php
                $logo_url = MB_URL . 'assets/admin/img/wphelper.png';

                ?>
                <img src="<?php echo esc_url($logo_url); ?>" alt="">
            </div>

        </div>
    </div>
    <div class="card-wrap card-active">
        <div class="card-header">
            <h4 class="card-title"><?php echo esc_html('Kích hoạt Plugin') ?></h4>
        </div>
        <div class="card-body">
            <input type="text" class="form-control" placeholder="Purchase code (e.g. 123e4567-e89b-12d3-a456-426614174000)">
            <button class="btn btn-primary"><?php echo esc_html('Kích hoạt') ?></button>
        </div>
    </div>

</div>
