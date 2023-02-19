<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// Create a section
CSF::createSection( $prefix, array(
    'title'  => __( 'SMTP Mail', 'mbwp-helper' ),
    'icon'   => 'fas fa-envelope',
    'description' => __('<p>Các website đều có phần gửi mail khi có người liên hệ hoặc khi có đơn hàng mới, nhưng <strong>không phải Hosting</strong> nào cũng <strong>cho phép người dùng gửi</strong> mail thông qua hàm <strong>PHP</strong> hay gửi <strong>SMTP mail theo tên miền.</strong></p>
<p>Tính năng <strong>SMTP mail</strong> cho phép người dùng có thể <strong>cấu hình việc gửi mail</strong> dễ dàng, nhanh chóng và không tốn chi phí.</p>
<a href="https://wiki.matbao.net/kb/thong-tin-smtp-gmail-cach-cau-hinh-smtp-gmail-free-vao-wordpress/" target="_blank">Xem hướng dẫn cài đặt</a>', 'mbwp-helper'),
    'fields' => array(
        array(
            'id'        =>  'mbwp-opt-smtp',
            'type'      =>  'fieldset',
            'class'     =>  'mbwp-opt-smtp',
            'fields'    => array(
                array(
                    'id'        =>  'mbwp-smtp-active',
                    'type'      =>  'switcher',
                    'title'     =>  __('Kích hoạt','mbwp-helper'),
                    'class'     =>  'mbwp-flex-row',
                    'text_on'   =>  __('Bật','mbwp-helper'),
                    'text_off'  =>  __('Tắt','mbwp-helper')
                ),
                array(
                    'id'         => 'mbwp-smtp-setting',
                    'type'       => 'radio',
                    'title'      => __('Cài đặt SMTP (Mailer)','mbwp-helper'),
                    'dependency' => array( 'mbwp-smtp-active', '==','true' ),
                    'class'     =>  'mbwp-opt-smtp-list',
                    'options'    => array(
                        '1' => 'Gmail SMTP',
                        '2' => 'SMTP Yandex',
                        '0' => 'SMTP Khác',
                    ),
                    'default'    => '1',
                    'inline' => true
                ),
                array(
                    'id'         => 'mbwp-smtp-email',
                    'type'       => 'text',
                    'title'      => __('Được gửi từ email','mbwp-helper'),
                    'placeholder'=> __('Vd: support@gmail.com','mbwp-helper'),
                    'validate'   => 'csf_validate_email',
                    'dependency' => array( 'mbwp-smtp-active', '==', 'true' ),
                    'after'      => __('<i>Nếu bạn sử dụng Gmail, Yandex mail hoặc SMTP khác để gửi mail cho khách hàng thì đây sẽ là email gửi của bạn.</i>','mbwp-helper')
                ),
                array(
                    'id'         => 'mbwp-smtp-fromName',
                    'type'       => 'text',
                    'title'      => __('Tên người gửi','mbwp-helper'),
                    'placeholder'=> __('Tên Công ty / Cá Nhân','mbwp-helper'),
                    'dependency' => array( 'mbwp-smtp-active', '==', 'true'),
                    'after'      => __('<i>Tên được hiển thị cho email khi gửi.</i>','mbwp-helper')
                ),
                array(
                    'id'         => 'mbwp-smtp-host',
                    'type'       => 'text',
                    'title'      => __('Máy chủ SMTP','mbwp-helper'),
                    'placeholder'=> __('Máy chủ SMTP','mbwp-helper'),
                    'dependency' => array( 'mbwp-smtp-active', '==', 'true' ),
                ),
                array(
                    'id'         => 'mbwp-smtp-security',
                    'type'       => 'radio',
                    'title'      => __('Bảo mật SMTP','mbwp-helper'),
                    'placeholder'=> __('Máy chủ SMTP','mbwp-helper'),
                    'dependency' => array( 'mbwp-smtp-active', '==', 'true'),
                    'after'      => __('<i>Bảo mật TLS là phương án được khuyên dùng. Nếu máy chủ SMTP của bạn cho phép cả 2 loại bảo mật này, chúng tôi khuyên bạn nên dùng TLS.</i>','mbwp-helper'),
                    'options'    => array(
                        'none' => 'None',
                        'ssl' => 'SSL',
                        'tls' => 'TLS',
                    ),
                    'default'    => 'ssl',
                    'inline' => true
                ),
                array(
                    'id'         => 'mbwp-smtp-port',
                    'type'       => 'text',
                    'title'      => __('Cổng SMTP','mbwp-helper'),
                    'placeholder'=> '25',
                    'validate'   => 'csf_validate_numeric',
                    'after' => __('Port 587 / 465 / 25','mbwp-helper') ,
                    'dependency' => array( 'mbwp-smtp-active', '==', 'true' ),
                ),
                array(
                    'id'         => 'mbwp-smtp-user',
                    'type'       => 'text',
                    'title'      => __('Tên đăng nhập SMTP','mbwp-helper'),
                    'validate'   => 'csf_validate_email',
                    'placeholder'=> __('Tên đăng nhập SMTP','mbwp-helper'),
                    'dependency' => array( 'mbwp-smtp-active', '==', 'true' ),
                ),
                array(
                    'id'         => 'mbwp-smtp-password',
                    'type'       => 'text',
                    'class'      => 'mb-input-password',
                    'title'      => __('Mật khẩu SMTP','mbwp-helper'),
                    'placeholder'=> __('Mật khẩu SMTP','mbwp-helper'),
                    'dependency' => array( 'mbwp-smtp-active', '==', 'true'),
                    'after'      => '<i class="fas fa-eye"></i>',
                    'attributes'  => array(
                        'type'      => 'password',
                    ),
                )
            )
        ),
        array(
            'id'            =>  'mbwp-smtp-test',
            'type'          =>  'fieldset',
            'title'         =>  __( 'Kiểm tra SMTP', 'mbwp-helper' ),
            'class'         =>  'mbwp-smtp-test',
            'description'   =>  'tdasdada',
            'fields'        => array(
                array(
                    'id'         => 'mbwp-smtp-mail-test',
                    'type'       => 'text',
                    'class'      => 'email-smtp-test',
                    'validate'   => 'csf_validate_email',
                    'placeholder'=> __('Địa chỉ Email nhận','mbwp-helper'),
                    'before'     => __('Sau khi hoàn tất việc cài đặt, để biết được việc <strong>gửi mail có thành công hay không?</strong> Bạn <strong>nhập email bất kỳ</strong> vào ô bên dưới, bấm kiểm tra <strong>và kiểm tra hộp thư đến</strong> của email đó, nếu nhận được email thì bạn <strong>đã cài đặt thành công.</strong> ','mbwp-helper'),
                    'after'      => '<div class="smtp-test-result"></div>',
                    'attributes'  => array(
                        'type'      => 'email',
                    ),
                ),
                array(
                    'id'         => 'mbwp-smtp-btn-test',
                    'type'       => 'text',
                    'class'      => 'btn-smpt-test',
                    'before'     => '<div id="loader"></div>',
                    'value'      => __('Kiểm tra','mbwp-helper'),
                    'attributes'  => array(
                        'type'    => 'button',
                    ),
                ),
            )
        )
    )
) );
