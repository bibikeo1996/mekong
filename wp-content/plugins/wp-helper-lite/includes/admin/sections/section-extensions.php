<?php
defined( 'ABSPATH' ) || exit;
// Create a section
CSF::createSection( $prefix, array(
    'title'  => __( 'Tiện ích mở rộng', 'mbwp-helper' ),
    'icon'   => 'fas fa-th',
    'description' => __('Thêm nhiều tính năng hơn giúp cải thiện trang WordPress của bạn.','mbwp-helper'),
    'fields' => array(
        array(
            'id'     => 'mbwp-opt-extensions',
            'type'   => 'fieldset',
            'class' => 'mbwp-opt-extensions mbwp-pd-0 mbwp-box-shadow-none',
            'fields' => array(
                array(
                    'id'    => 'mbwp-toggle-gutenberg',
                    'type'  => 'radio',
                    'title' => __('Trình soạn thảo văn bản','mbwp-helper'),
                    'class' => 'mbwp-toggle-gutenberg',
                    'after' => __('<i><strong>Chọn lựa trình soạn thảo</strong> phù hợp với bạn.</i>','mbwp-helper'),
                    'options'    => array(
                        '0' => 'Gutenberg Editor',
                        '1' => 'Classic Editor',
                    ),
                    'default'    => '1'
                )
            ),
        ),
        array(
            'id'     => 'mbwp-opt-duplicate',
            'type'   => 'fieldset',
            'class' => 'mbwp-flex mbwp-flex-column mbwp-box-shadow-none mbwp-opt-duplicate mbwp-pd-0',
            'fields' => array(
                array(
                    'id'    => 'mbwp-duplicate-page-post',
                    'type'  => 'switcher',
                    'title' => __('Nhân bản trang/ bài viết <i class="fas fa-question-circle"></i>','mbwp-helper'),
                    'class' => 'mbwp-duplicate-page-post mbwp-help',
                    'after' => __('<i>Cho phép nhân bản trang / bài viết.</i>','mbwp-helper'),
                    'text_on'   =>  __('Bật','mbwp-helper'),
                    'text_off'  =>  __('Tắt','mbwp-helper'),
                    'subtitle' => __('<p><strong>Nhân bản trang/ bài viết</strong></p>
                                    <p>Có thêm tính năng nhân bản cho các trang và bài viết của bạn.</p>
                                    <p>Mình ảnh minh họa:</p>
                                    <img src="'.MBWP_HP_URL.'assets/images/admin/duplicate-article.svg"><span class="close-icon"><i class="fas fa-times"></i></span>','mbwp-helper')
                ),
                array(
                    'id'    => 'mbwp-duplicate-menu',
                    'type'  => 'switcher',
                    'text_on'   =>  __('Bật','mbwp-helper'),
                    'text_off'  =>  __('Tắt','mbwp-helper'),
                    'title' => __('Nhân bản menu <i class="fas fa-question-circle"></i>','mbwp-helper'),
                    'class' => 'mbwp-duplicate-menu mbwp-pd-y-15 mbwp-help',
                    'after' => __('<i>Tính năng nhân bản trang/ bài viết và menu sẽcho phép bạn có thểtạo thêm bản sao giống với nội dung đã được tạo. Việc này sẽ giúp bạn thao tác nhanh hơn trong việc tạo trang WordPress của mình.</i>','mbwp-helper'),
                    'subtitle' => __('<p><strong>Nhân bản menu</strong></p>
                                    <p>Có thêm tính năng nhân bản cho menu của bạn.</p>
                                    <p>Mình ảnh minh họa:</p>
                                    <img src="'.MBWP_HP_URL.'assets/images/admin/duplicate-menu.svg"><span class="close-icon"><i class="fas fa-times"></i></span>','mbwp-helper')
                )
            )
        ),
        array(
            'id'     => 'mbwp-redirect-404',
            'type'   => 'fieldset',
            'title' => __('Chuyển 404 về trang chủ','mbwp-helper'),
            'class' => 'mbwp-pd-0 mbwp-box-shadow-none mbwp-redirect-404',
            'fields' => array(
                array(
                    'id'     => 'switcher-redirect-404',
                    'type'   => 'switcher',
                    'class' => 'mbwp-flex mbwp-flex-column',
                    'after' => __('<i>Lỗi 404 là lỗi thường gặp ở các trang web. Tính năng này sẽ <strong>giúp chuyển hướng truy cập về lại trang chủ</strong> của bạn, khi khách hàng gặp phải các liên kết bị lỗi.</i>','mbwp-helper'),
                    'text_on'   =>  __('Bật','mbwp-helper'),
                    'text_off'  =>  __('Tắt','mbwp-helper')
                )
            )
        ),
        array(
            'id'     => 'mbwp-helper-disable-emojis',
            'type'   => 'fieldset',
            'title' => __('Xóa biểu tượng Emojis','mbwp-helper'),
            'class' => 'mbwp-pd-0 mbwp-box-shadow-none mbwp-redirect-404',
            'fields' => array(
                array(
                    'id'     => 'switcher-disable-emojis',
                    'type'   => 'switcher',
                    'class' => 'mbwp-flex mbwp-flex-column',
                    'after' => __('<i>Không load tệp <strong>wp-emoji-release.min.js</strong> chứa các icon cảm xúc của WordPress.</i>','mbwp-helper'),
                    'text_on'   =>  __('Bật','mbwp-helper'),
                    'text_off'  =>  __('Tắt','mbwp-helper')
                )
            )
        ),
        array(
            'id'     => 'mbwp-helper-remove-query-strings',
            'type'   => 'fieldset',
            'title' => __('Remove Query Strings','mbwp-helper'),
            'class' => 'mbwp-pd-0 mbwp-box-shadow-none mbwp-redirect-404',
            'fields' => array(
                array(
                    'id'     => 'switcher-remove-query-strings',
                    'type'   => 'switcher',
                    'class' => 'mbwp-flex mbwp-flex-column',
                    'after' => __('<i>Xóa chuỗi truy vấn khỏi tài nguyên tĩnh</i>','mbwp-helper'),
                    'text_on'   =>  __('Bật','mbwp-helper'),
                    'text_off'  =>  __('Tắt','mbwp-helper')
                )
            )
        ),
        array(
            'id'     => 'mbwp-helper-disable-wp-embeds',
            'type'   => 'fieldset',
            'title' => __('Disable Wordpress Embeds','mbwp-helper'),
            'class' => 'mbwp-pd-0 mbwp-box-shadow-none mbwp-redirect-404',
            'fields' => array(
                array(
                    'id'     => 'switcher-disable-wp-embeds',
                    'type'   => 'switcher',
                    'class' => 'mbwp-flex mbwp-flex-column',
                    'after' => __('<i>Tắt tính năng chèn <strong>mã nhúng oEmbeds</strong> trong WordPress</i>','mbwp-helper'),
                    'text_on'   =>  __('Bật','mbwp-helper'),
                    'text_off'  =>  __('Tắt','mbwp-helper')
                )
            )
        ),
        array(
            'id'     => 'mbwp-helper-disable-google-font',
            'type'   => 'fieldset',
            'title' => __('Tắt Google Font','mbwp-helper'),
            'class' => 'mbwp-pd-0 mbwp-box-shadow-none mbwp-redirect-404',
            'fields' => array(
                array(
                    'id'     => 'switcher-disable-google-font',
                    'type'   => 'switcher',
                    'class' => 'mbwp-flex mbwp-flex-column',
                    'after' => __('<i>Tắt không load <strong>Google font</strong> trên trang, và load font mặc định của trang</i>','mbwp-helper'),
                    'text_on'   =>  __('Bật','mbwp-helper'),
                    'text_off'  =>  __('Tắt','mbwp-helper')
                )
            )
        ),
        array(
            'id'     => 'mbwp-helper-disable-dashicons',
            'type'   => 'fieldset',
            'title' => __('Tắt Dashicons','mbwp-helper'),
            'class' => 'mbwp-pd-0 mbwp-box-shadow-none mbwp-redirect-404',
            'fields' => array(
                array(
                    'id'     => 'switcher-disable-dashicons',
                    'type'   => 'switcher',
                    'class' => 'mbwp-flex mbwp-flex-column',
                    'after' => __('<i>Tắt dashicons trên giao diện người dùng khi chưa đăng nhập.</i>','mbwp-helper'),
                    'text_on'   =>  __('Bật','mbwp-helper'),
                    'text_off'  =>  __('Tắt','mbwp-helper')
                )
            )
        ),
        array(
            'id'     => 'mbwp-opt-login',
            'type'   => 'fieldset',
            'title' => __('Giao diện đăng nhập','mbwp-helper'),
            'class' => 'mbwp-pd-0 mbwp-box-shadow-none mbwp-opt-login',
            'fields' => array(
                array(
                    'id'    => 'mbwp-login-active',
                    'type'  => 'switcher',
                    'class' => 'mbwp-flex mbwp-flex-column mbwp-login-active',
                    'text_on'   =>  __('Bật','mbwp-helper'),
                    'text_off'  =>  __('Tắt','mbwp-helper'),
                    'after' => __('<i>Bạn đã có thể <strong>sử dụng logo của mình</strong> để thay cho logo mặc định <strong>wordpress</strong> sở trang đăng nhập và <strong>liên kết khi nhấp</strong> vào logo đó.</i>','mbwp-helper')
                )
            )
        ),
        array(
            'id'    => 'mbwp-login-logo',
            'class' => 'mbwp-login-logo',
            'type'  => 'media',
            'title' => __('Logo','mbwp-helper'),
            'library'      => 'image',
            'button_title' => __('Chọn ảnh','mbwp-helper'),
            'placeholder'  => 'http://',
            'preview' => true,
            'dependency' => array( 'mbwp-login-active', '==', 'true'),
        ),
        array(
            'id'        => 'mbwp-login-link',
            'class'     => 'mbwp-login-link',
            'type'      => 'text',
            'title'     => __('Đường dẫn liên kết','mbwp-helper'),
            'default'   => get_site_url(),
            'validate'  => 'mbwp_customize_validate_url',
            'dependency' => array( 'mbwp-login-active', '==', 'true' ),
        )
    )
) );



// CSF::createSection( $prefix, array(
//     'title'  => __( 'WP Helper Premium', 'mbwp-helper' ),
//     'icon'   => 'fas fa-th',
//    'defaults' => [],
// ) );
add_submenu_page(
    'mbwp-helper',
    __('Woocommerce Toolkit', 'textdomain'),
    __('Woocommerce Toolkit', 'textdomain'),
    'manage_options',
    'mb-plugin',
    'books_ref_page_callback',
    8
);