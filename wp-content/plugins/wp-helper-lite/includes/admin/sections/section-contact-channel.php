<?php
defined( 'ABSPATH' ) || exit;
// Create a section
$options = array();
CSF::createSection(
    $prefix,
    array(
        'title'               => esc_html__( 'Kênh liên hệ', 'mbwp-helper' ),
        'icon'  => 'fas fa-id-card',
        'description' => __( ' Tính năng này cho phép cài đặt các popup trên trang web của bạn để khách hàng có thể tương tác trực tiếp hỏi về sản phẩm.', 'mbwp-helper' ),
        'fields' => array(
            array(
                'id'=> 'mbwp-contact-active',
                'type'  => 'switcher',
                'title' => __( 'Kích hoạt dịch vụ', 'mbwp-helper' ),
                'class' => 'mbwp-contact-active',
                'text_on'   =>  __( 'Bật', 'mbwp-helper' ),
                'text_off'  =>  __( 'Tắt', 'mbwp-helper' )
            ),
            array(
                'id'            => 'opt-accordion-contact',
                'type'          => 'accordion',
                'class'         => 'opt-accordion-contact',
                'before'        => __('<h4>Cài đặt</h4><p>Bạn cần phải cài đặt các tính năng trước khi đưa vào sử dụng.</p>', 'mbwp-helper'),
                'dependency'    => array('mbwp-contact-active', '==', 'true'),
                'accordions'    => array(
                    array(
                        'title'     => __('1. Nút trò chuyện', 'mbwp-helper'),
                        'desc'      => __('<h3>Nút trò truyện</h3><p>Khi cài đặt phần này sẽ xuất hiện nút dùng đểthao tác trò chuyện trực tiếp giữa khách hàng và nhân viên của bạn.</p>Mình ảnh minh họa khi hiển thị trên web:<img src="' . MBWP_HP_URL . '/assets/images/admin/Nuttrochuyen.jpg"><span class="close-icon"><i class="fas fa-times"></i></span>', 'mbwp-helper'),
                        'icon'      => 'fas fa-plus-circle',
                        'fields'    => array(
                            array(
                                'id'     => 'mbwp-contact-design',
                                'type'   => 'fieldset',
                                'class' => 'mbwp-flex mbwp-flex-column',
                                'before'          => __('Bằng việc thay <b>đổi màu sắc, nội dung</b> và <b>vị trí,</b> sẽ <b>thu hút khách hàng tốt hơn</b> dẫn đến việc tương tác nhiều hơn.', 'mbwp-helper'),
                                'fields' => array(
                                    array(
                                        'id'    => 'mbwp-contact-color',
                                        'type'  => 'color',
                                        'title' => __('Chọn màu <i class="fas fa-question-circle"></i>', 'mbwp-helper'),
                                        'class' => 'mbwp-flex mbwp-flex-column pl-0 mbwp-help',
                                        'after' => __('<i>Chúng tôi khuyên bạn <b>nên sử dụng màu sắc thương hiệu</b> hoặc <b>màu sắc đối lập</b> để tạo sự thu hút khách hàng bấm vào.<br>Hạn chế sử dụng màu đỏ trong trường hợp này. </i>', 'mbwp-helper'),
                                        'subtitle' => __('<h3>Chọn mầu</h3><p>Khi đổi màu trong phần cài đặt, màu sắc của  nút trò chuyện ở trang web của bạn sẽ được thay đổi theo</p>Mình ảnh minh họa khi hiển thị trên web:<img src="' . MBWP_HP_URL . '/assets/images/admin/Nuttrochuyen_chonmau.jpg"><span class="close-icon"><i class="fas fa-times"></i></span>', 'mbwp-helper'),
                                    ),
                                    array(
                                        'id'    => 'mbwp-contact-greeting',
                                        'type'  => 'text',
                                        'class' => 'mbwp-contact-greeting mbwp-flex mbwp-flex-column pl-0 mbwp-help',
                                        'title' => __('Tiêu đề <i class="fas fa-question-circle"></i>', 'mbwp-helper'),
                                        'placeholder' => __('Xin chào! Chúng tôi có thể giúp gì cho bạn?', 'mbwp-helper'),
                                        'subtitle' => __('<h3>Tiêu đề</h3><p>Là dòng hiển thị để kêu gọi khách hàng bấm vào để bắt đầu trò chuyện.</p>Mình ảnh minh họa khi hiển thị trên web:<img src="' . MBWP_HP_URL . '/assets/images/admin/Nuttrochuyen_tieude.png"><span class="close-icon"><i class="fas fa-times"></i></span>', 'mbwp-helper'),
                                    ),
                                    array(
                                        'id'    => 'mbwp-helper-position-y',
                                        'type'  => 'slider',
                                        'title' => __('Độ cao hiển thị', 'mbwp-helper'),
                                        'class' => 'mbwp-helper-position-y mbwp-flex mbwp-flex-column',
                                        'unit'    => '%',
                                        'default' => 80,
                                    ),
                                    array(
                                        'id'         => 'mbwp-contact-position',
                                        'type'       => 'radio',
                                        'title'      => __('Vị trí hiển thị <i class="fas fa-question-circle"></i>', 'mbwp-helper'),
                                        'class'      => 'mbwp-contact-position mbwp-flex mbwp-flex-column pl-0 mbwp-help',
                                        'subtitle'   => __('<h3>Vị trí hiển thị</h3><p>Bạn có thể chọn vị trí góc trái hoặc phải màn hình để hiển thị tốt hơn và không che nội dung trang web của bạn.</p>Hình ảnh minh họa cho vị trí góc Phải<img src="' . MBWP_HP_URL . '/assets/images/admin/Nuttrochuyen_vitri2.jpg"><span class="close-icon"><i class="fas fa-times"></i></span>', 'mbwp-helper'),
                                        'options'    => array(
                                            'mbwp-ct-left' => __('Trái', 'mbwp-helper'),
                                            'mbwp-ct-right' => __('Phải', 'mbwp-helper'),
                                        ),
                                        'default'    => 'mbwp-ct-right',
                                        'inline' => true,
                                    )
                                )
                            ),
                        )
                    ),
                    array(
                        'title'     => __('2. Nút gọi điện', 'mbwp-helper'),
                        'icon'      => 'fas fa-plus-circle',
                        'desc'        => __('<h3>Nút gọi điện</h3><p>Khi cài đặt phần này sẽ xuất hiện nút dùng để thao tác gọi điện nhanh đến các nhân viên mà bạn đã cài đặt.</p>Mình ảnh minh họa khi hiển thị trên web: <img src="' . MBWP_HP_URL . '/assets/images/admin/Nutgoidien.jpg"><span class="close-icon"><i class="fas fa-times"></i></span>', 'mbwp-helper'),
                        'fields'    => array(
                            array(
                                'id'     => 'mbwp-contact-phone',
                                'type'   => 'fieldset',
                                'class'  => 'mbwp-flex mbwp-flex-column',
                                'before' => __('Việc hiển thị <b>nút gọi điện</b> khi bấm vào <b>là số điện thoại của tư vấn viên hoặc nhân viên hỗ trợ</b> sẽ <b>giúp khách hàng</b> của bạn có thể tự <b>liên hệ nhanh chóng</b> và hiệu quả hơn.', 'mbwp-helper'),
                                'fields' => array(
                                    array(
                                        'id'        => 'mbwp-contact-phone-title',
                                        'type'      => 'text',
                                        'title'     => __('Tiêu đề <i class="fas fa-question-circle"></i>', 'mbwp-helper'),
                                        'class'     => 'mbwp-flex mbwp-flex-column pl-0 mbwp-help',
                                        'placeholder' => __('Gọi cho chúng tôi ngay', 'mbwp-helper'),
                                        'subtitle'  => __('<h3>Tiêu đề</h3><p>Câu kêu gọi ngắn gọn để khách bấm vào gọi.</p>Mình ảnh minh họa khi hiển thị trên web:<img src="' . MBWP_HP_URL . '/assets/images/admin/Nutgoidien_Tieude.jpg"><span class="close-icon"><i class="fas fa-times"></i></span>', 'mbwp-helper')
                                    ),
                                    array(
                                        'id'     => 'mbwp-contact-repeater',
                                        'type'   => 'repeater',
                                        'title'  => __('Bạn cần thêm thông tin nhân viên tư vấn hoặc hỗ trợ <i class="fas fa-question-circle"></i>', 'mbwp-helper'),
                                        'button_title' => __('Thêm nhân viên', 'mbwp-helper'),
                                        'max' => 5,
                                        'class' => 'mbwp-contact-repeater mbwp-flex mbwp-flex-column pl-0 mbwp-help',
                                        'subtitle' => __('<h3>Thêm nhân viên</h3><p>Bạn có thể thêm nhiều nhân viên với các chức danh khác nhau như tư vấn, bán hàng và hỗ trợ kỹ thuật.</p><p>Lưu ý: không thêm quá nhiều sẽ gây rối cho khách hàng của bạn.</p>Mình ảnh minh họa khi có 3 nhân viên hiển thị trên web:<img src="' . MBWP_HP_URL . '/assets/images/admin/Nutgoidien_Themnhanvien.jpg"><span class="close-icon"><i class="fas fa-times"></i></span>', 'mbwp-helper'),
                                        'fields' => array(
                                            array(
                                                'id'       => 'mbwp-contact-avata',
                                                'type'     => 'radio',
                                                'title'    => __('Hình đại diện', 'mbwp-helper'),
                                                'inline'   => true,
                                                'class'    => 'mbwp-contact-avata',
                                                'options'  => array(
                                                    'contact-avata-men'     => __('Nam', 'mbwp-helper'),
                                                    'contact-avata-women'   => __('Nữ', 'mbwp-helper'),
                                                    'contact-avata-support' => __('Support 24/7', 'mbwp-helper'),
                                                ),
                                                'default'    => 'contact-avata-support'
                                            ),
                                            array(
                                                'id'    => 'mbwp-contact-title',
                                                'type'  => 'text',
                                                'title' => __('Tên hiển thị', 'mbwp-helper'),
                                                'placeholder' => __('Nhân viên kinh doanh', 'mbwp-helper')
                                            ),
                                            array(
                                                'id'    => 'mbwp-contact-phone-number',
                                                'type'  => 'text',
                                                'title' => __('Số điện thoại', 'mbwp-helper'),
                                                'placeholder' => __('Vd: 0909 XXX XXX', 'mbwp-helper'),
                                                'after' => __('<i>Nhập số điện thoại tư vấn viên hoặc nhân viên hỗ trợ của bạn.</i>', 'mbwp-helper')
                                            ),
                                        ),
                                    ),
                                )
                            ),
                        )
                    ),
                    array(
                        'title'     => __('3. Các kênh khác', 'mbwp-helper'),
                        'icon'      => 'fas fa-plus-circle',
                        'desc' => __('<h3>Các kênh khác</h3><p>Bạn có thể sử dụng các <b>kênh liên hệ</b> khác như <b>email,</b> các mạng xã hội như: <b>Facebook, Zalo,</b> để trao đổi và tư vấn với khách hàng dễ dàng hơn.</p><img src="' . MBWP_HP_URL . '/assets/images/admin/Cackenhkhac.jpg"><span class="close-icon"><i class="fas fa-times"></i></span>', 'mbwp-helper'),
                        'fields'    => array(
                            array(
                                'id'     => 'mbwp-general-contact',
                                'type'   => 'fieldset',
                                'class'  => 'mbwp-flex mbwp-flex-column',
                                'before'    => __('Bạn có thể sử dụng các kênh liên hệ khác như email, các mạng xã hội như: Facebook, Zalo, để trao đổi và tư vấn với khách hàng dễ dàng hơn.', 'mbwp-helper'),
                                'fields' => array(
                                    array(
                                        'id'    => 'mbwp-general-contact-title',
                                        'title' => __('Tiêu đề', 'mbwp-helper'),
                                        'type'  => 'text',
                                        'class' => 'mbwp-flex mbwp-flex-column pl-0',
                                        'placeholder' => __('Gọi cho chúng tôi ngay', 'mbwp-helper'),
                                    ),
                                    array(
                                        'id'    => 'mbwp-general-contact-email',
                                        'title' => __('Địa chỉ Email', 'mbwp-helper'),
                                        'type'  => 'text',
                                        'class' => 'mbwp-flex mbwp-flex-column pl-0',
                                        'validate' => 'csf_validate_email',
                                        'placeholder' => __('Vd: support@gmail.com', 'mbwp-helper'),
                                    ),
                                    array(
                                        'id'    => 'mbwp-general-contact-facebook',
                                        'type'  => 'text',
                                        'title' => 'Facebook',
                                        'class' => 'mbwp-flex mbwp-flex-column pl-0',
                                        'validate' => 'csf_validate_url',
                                        'placeholder' => __('Vd: https://www.facebook.com/your-page', 'bwp-helper'),
                                    ),
                                    array(
                                        'id'    => 'mbwp-general-contact-zalo',
                                        'type'  => 'text',
                                        'title' => 'Zalo',
                                        'class' => 'mbwp-flex mbwp-flex-column pl-0',
                                        'validate' => 'csf_validate_numeric',
                                        'placeholder' => __('Vd: 0909 XXX XXX', 'mbwp-helper'),
                                    ),
                                    array(
                                        'id'    => 'mbwp-general-facebook-page',
                                        'type'  => 'text',
                                        'class' => 'mbwp-flex mbwp-flex-column pl-0',
                                        'title' => 'Facebook chat trực tuyến',
                                        'placeholder' => __('Page ID ứng dụng', 'mbwp-helper'),
                                        'after' => __('Xem hướng dẫn nhận Page ID từ Facebook <a href="https://wiki.matbao.net/kb/huong-dan-lay-id-fanpage-facebook/" target="_blank">tại đây</a>', 'mbwp-helper')
                                    ),
                                    array(
                                        'id'    => 'mbwp-general-tawk',
                                        'class' => 'mbwp-flex mbwp-flex-column pl-0',
                                        'type'  => 'code_editor',
                                        'title' => 'Tawk.to chat trực tuyến',
                                        'placeholder' => __('Mã Tawk.to', 'mbwp-helper'),
                                        'sanitize' => false,
                                        'settings' => array(
                                            'theme'  => 'monokai',
                                            'mode'   => 'javascript',
                                        ),
                                        'before' => __('Xem hướng dẫn nhận Tawk.to  <a href="https://wiki.matbao.net/kb/huong-dan-dang-ky-tai-khoan-tawk-to-va-lay-tawk-to-id/" target="_blank">tại đây</a>', 'mbwp-helper')
                                    )
                                )
                            ),
                        )
                    )
                )
            )
        )
    )
);
