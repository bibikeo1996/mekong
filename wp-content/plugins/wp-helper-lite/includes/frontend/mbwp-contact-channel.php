<?php
if (!defined('ABSPATH')) {
    exit;
}
$mbwp_options = get_option('mbwp_helper');
if (!empty($mbwp_options['mbwp-contact-active'])) {
    function my_front_contact_scripts()
    {
        wp_enqueue_style('mb-wp-contact-style', MBWP_HP_URL . 'assets/css/frontend/mb-wp-contact-style.css');
        wp_enqueue_script('mb-wp-contact-script', MBWP_HP_URL . 'assets/js/frontend/mb-wp-ct-scripts.js', array('jquery'), '1.0.0', true);
    }
    add_action('wp_enqueue_scripts', 'my_front_contact_scripts');
    function render_html_contact_chanel()
    {
        ob_start();
        $mbwp_options = get_option('mbwp_helper');
        $position = ($mbwp_options['opt-accordion-contact']['mbwp-contact-design']['mbwp-contact-position'] == 'mbwp-ct-right') ? 'onRight' : 'onLeft';
        $color = (empty($mbwp_options['opt-accordion-contact']['mbwp-contact-design']['mbwp-contact-color'])) ? '#1e73be' : $mbwp_options['opt-accordion-contact']['mbwp-contact-design']['mbwp-contact-color'];
        $default_greeting =  (!empty($mbwp_options['opt-accordion-contact']['mbwp-contact-design']['mbwp-contact-greeting'])) ? $mbwp_options['opt-accordion-contact']['mbwp-contact-design']['mbwp-contact-greeting'] : 'Xin chào! Chúng tôi có thể giúp gì cho bạn?';
        $mbwph_phone_title = (!empty($mbwp_options['opt-accordion-contact']['mbwp-contact-phone']['mbwp-contact-phone-title'])) ? $mbwp_options['opt-accordion-contact']['mbwp-contact-phone']['mbwp-contact-phone-title'] : $default_greeting;
        $mbwp_general_ct_title = (!empty($mbwp_options['opt-accordion-contact']['mbwp-general-contact']['mbwp-general-contact-title'])) ? $mbwp_options['opt-accordion-contact']['mbwp-general-contact']['mbwp-general-contact-title'] : $default_greeting;;
        $mbwp_contact_repeater = $mbwp_options['opt-accordion-contact']['mbwp-contact-phone']['mbwp-contact-repeater'];
        $position_y = $mbwp_options['opt-accordion-contact']['mbwp-contact-design']['mbwp-helper-position-y'];
        $facebook_chat = $mbwp_options['opt-accordion-contact']['mbwp-general-contact']['mbwp-general-facebook-page'];
        $tawk_chat = $mbwp_options['opt-accordion-contact']['mbwp-general-contact']['mbwp-general-tawk'];
        $facebook = $mbwp_options['opt-accordion-contact']['mbwp-general-contact']['mbwp-general-contact-facebook'];
        $zalo = $mbwp_options['opt-accordion-contact']['mbwp-general-contact']['mbwp-general-contact-zalo'];
        $email = $mbwp_options['opt-accordion-contact']['mbwp-general-contact']['mbwp-general-contact-email'];
        $string = str_replace('.', '', $zalo);
        if (!empty($facebook) || !empty($zalo) || !empty($email) || !empty($facebook_chat) || !empty($tawk_chat)) :
?>
            <div id="mbwph-contact" class="mbwph-main-contact <?php echo esc_attr($position); ?>" style="top: <?php echo esc_attr($position_y) . '%'; ?>">
                <div class="mbwph-contact-container <?php echo esc_attr($position); ?>">
                    <div class="mbwph-contact-header" style="background-color:<?php echo esc_attr($color); ?>">
                        <div class="mbwph-header-title"><?php echo esc_html($mbwp_general_ct_title); ?></div>
                        <div class="mbwph-contact-header-close">
                            <span>
                                <svg width="12" height="13" viewBox="0 0 14 14" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                    <g transform="translate(-4087 108)">
                                        <g>
                                            <path transform="translate(4087 -108)" fill="currentColor" d="M 14 1.41L 12.59 0L 7 5.59L 1.41 0L 0 1.41L 5.59 7L 0 12.59L 1.41 14L 7 8.41L 12.59 14L 14 12.59L 8.41 7L 14 1.41Z"></path>
                                        </g>
                                    </g>
                                </svg>
                            </span>
                        </div>
                    </div>
                    <ul>
                        <?php if (!empty($facebook)) : ?>
                            <li>
                                <a class="mbwph-contact-item mbwph-contact-facebook" href="<?php echo esc_url($facebook); ?>" target="blank">
                                    <div class="mbwph-contact-icon"><img src="<?php echo esc_url(MBWP_HP_URL) ?>assets/images/mbwph-icon-facebook.png" alt="facebook"></div>
                                    <div class="mbwph-contact-child">
                                        <span class="mbwph-contact-child-title">Facebook</span>
                                    </div>
                                </a>
                            </li>
                        <?php endif; ?>
                        <?php if (!empty($email)) : ?>
                            <li>
                                <a class="mbwph-contact-item mbwph-contact-mail" href="mailto:<? echo esc_url($email); ?>" target="blank">
                                    <div class="mbwph-contact-icon"><img src="<?php echo esc_url(MBWP_HP_URL) ?>assets/images/mbwph-icon-email.png" alt=""></div>
                                    <div class="mbwph-contact-child">
                                        <span class="mbwph-contact-child-title"><?php echo esc_html($email); ?></span>
                                    </div>
                                </a>
                            </li>
                        <?php endif; ?>
                        <?php if (!empty($zalo)) : ?>
                            <li>
                                <a class="mbwph-contact-item mbwph-contact-zalo" href="http://zalo.me/<?php echo esc_url($string); ?>" target="blank">
                                    <div class="mbwph-contact-icon"><img src="<?php echo esc_url(MBWP_HP_URL) ?>assets/images/mbwph-icon-zalo.png" alt=""></div>
                                    <div class="mbwph-contact-child">
                                        <span class="mbwph-contact-child-title"><?php echo esc_html($zalo); ?></span>
                                    </div>
                                </a>
                            </li>
                        <?php endif; ?>
                        <?php if (!empty($tawk_chat)) : ?>
                            <li>
                                <a class="mbwph-contact-item mbwph-contact-tawkto" href="javascript:void(Tawk_API.toggle())">
                                    <div class="mbwph-contact-icon"><img src="<?php echo esc_url(MBWP_HP_URL) ?>assets/images/mbwph-icon-chat.png" alt=""></div>
                                    <div class="mbwph-contact-child">
                                        <span class="mbwph-contact-child-title">Hỗ trợ online</span>
                                    </div>
                                </a>
                            </li>
                        <?php endif; ?>
                        <?php if (!empty($facebook_chat)) : ?>
                            <li>
                                <a class="mbwph-contact-item mbwph-contact-messenger" href="/">
                                    <div class="mbwph-contact-icon"><img src="<?php echo esc_url(MBWP_HP_URL) ?>assets/images/mbwph-icon-messenger.png" alt=""></div>
                                    <div class="mbwph-contact-child">
                                        <span class="mbwph-contact-child-title">Messenger</span>
                                    </div>
                                </a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>
                <div class="mbwph-contact-button <?php echo esc_attr($position); ?>" style="background-color:<?php echo esc_attr($color); ?>">
                    <div class="mbwph-button-border" style="background-color:<?php echo esc_attr($color); ?>"></div>
                    <div class="mbwph-button-border" style="background-color:<?php echo esc_attr($color); ?>"></div>
                    <div class="mbwph-button-group-icon">
                        <div class="mbwph-button-icon">
                            <svg class="mbwph-button-icon-child" xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 28 29">
                                <path class="mbwph-button-chat-icon" fill="#FFFFFF" fill-rule="evenodd" d="M878.289968,975.251189 L878.289968,964.83954 C878.289968,963.46238 876.904379,962 875.495172,962 L857.794796,962 C856.385491,962 855,963.46238 855,964.83954 L855,975.251189 C855,976.924031 856.385491,978.386204 857.794796,978.090729 L860.589592,978.090729 L860.589592,981.876783 L860.589592,983.76981 L861.521191,983.76981 C861.560963,983.76981 861.809636,982.719151 862.45279,982.823297 L866.179185,978.090729 L875.495172,978.090729 C876.904379,978.386204 878.289968,976.924031 878.289968,975.251189 Z M881.084764,971.465135 L881.084764,976.197702 C881.43316,978.604561 879.329051,980.755508 876.426771,980.93027 L868.042382,980.93027 L866.179185,982.823297 C866.400357,983.946455 867.522357,984.94992 868.973981,984.716324 L876.426771,984.716324 L879.221567,988.502377 C879.844559,988.400361 880.153166,989.448891 880.153166,989.448891 L881.084764,989.448891 L881.084764,987.555864 L881.084764,984.716324 L882.947962,984.716324 C884.517696,984.949819 885.742758,983.697082 885.742758,981.876783 L885.742758,974.304675 C885.742659,972.717669 884.517597,971.465135 882.947962,971.465135 L881.084764,971.465135 Z" transform="translate(-855 -962)"></path>
                            </svg>
                        </div>
                    </div>
                    <div class="mbwph-close-button-icon">
                        <svg width="12" height="13" viewBox="0 0 14 14" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                            <g transform="translate(-4087 108)">
                                <g>
                                    <path transform="translate(4087 -108)" fill="currentColor" d="M 14 1.41L 12.59 0L 7 5.59L 1.41 0L 0 1.41L 5.59 7L 0 12.59L 1.41 14L 7 8.41L 12.59 14L 14 12.59L 8.41 7L 14 1.41Z"></path>
                                </g>
                            </g>
                        </svg>
                    </div>
                </div>
                <div class="mbwph-contact-greeting <?php echo esc_attr($position); ?>">
                    <div class="mbwph-contact-greeting-content"><?php echo esc_html($default_greeting); ?></div>
                    <div class="mbwph-contact-close-greeting" style="background-color:<?php echo esc_attr($color); ?>">
                        <span>
                            <svg width="12" height="13" viewBox="0 0 14 14" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                <g transform="translate(-4087 108)">
                                    <g>
                                        <path transform="translate(4087 -108)" fill="currentColor" d="M 14 1.41L 12.59 0L 7 5.59L 1.41 0L 0 1.41L 5.59 7L 0 12.59L 1.41 14L 7 8.41L 12.59 14L 14 12.59L 8.41 7L 14 1.41Z"></path>
                                    </g>
                                </g>
                            </svg>
                        </span>
                    </div>
                </div>
            </div>
        <?php endif; ?>
        <?php if (!empty($mbwp_contact_repeater) && count($mbwp_contact_repeater) > 0) :
            $position_y_plus = $position_y + 10;
            $position_y_plus = "{$position_y_plus}%";
        ?>
            <div style="top: <?php echo esc_attr($position_y_plus); ?>;" class="mbwph-call <?php echo esc_attr($position); ?> mbwph-call-middle">
                <div class="mbwph-call-container <?php echo esc_attr($position); ?>">
                    <div class="mbwph-call-header" style="background-color:<?php echo esc_attr($color); ?>">
                        <div class="mbwph-header-title"><?php echo esc_html($mbwph_phone_title); ?></div>
                        <div class="mbwph-header-close">
                            <span>
                                <svg width="12" height="13" viewBox="0 0 14 14" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                    <g transform="translate(-4087 108)">
                                        <g>
                                            <path transform="translate(4087 -108)" fill="currentColor" d="M 14 1.41L 12.59 0L 7 5.59L 1.41 0L 0 1.41L 5.59 7L 0 12.59L 1.41 14L 7 8.41L 12.59 14L 14 12.59L 8.41 7L 14 1.41Z"></path>
                                        </g>
                                    </g>
                                </svg>
                            </span>
                        </div>
                    </div>
                    <ul>
                        <?php if (!empty($mbwp_contact_repeater)) : ?>
                            <?php
                            $images_contact = array(
                                'contact-avata-men' => MBWP_HP_URL . 'assets/images/admin/nam.svg',
                                'contact-avata-women' => MBWP_HP_URL . 'assets/images/admin/nu.svg',
                                'contact-avata-support' => MBWP_HP_URL . 'assets/images/admin/24.svg'
                            );
                            ?>
                            <?php foreach ($mbwp_contact_repeater as $item_phone) : ?>
                                <?php if (!empty($item_phone['mbwp-contact-title']) && !empty($item_phone['mbwp-contact-phone-number'])) : ?>
                                    <li>
                                        <?php
                                        $contact_phone_number = preg_replace('/[^A-Za-z0-9\-]/', '', $item_phone['mbwp-contact-phone-number']);
                                        $contact_avatar_url = isset($images_contact[$item_phone['mbwp-contact-avata']]) ? $images_contact[$item_phone['mbwp-contact-avata']] : "";
                                        $contact_title = $item_phone['mbwp-contact-title'];
                                        $contact_number = $item_phone['mbwp-contact-phone-number'];
                                        ?>
                                        <a class="mbwph-call-item" href="tel:<?php echo esc_url($contact_phone_number); ?>">
                                            <span><img src="<?php echo esc_url($contact_avatar_url);; ?>" alt="<?php echo esc_attr($contact_title) ?>" width="50px" height="50px"></span>
                                            <div class="mbwph-contact-child">
                                                <div class="mbwph-contact-child-title"><?php echo esc_html($contact_title); ?></div>
                                                <div class="mbwph-contact-child-desc"><?php echo esc_html($contact_number); ?></div>
                                            </div>
                                        </a>
                                    </li>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        <?php endif ?>
                    </ul>
                </div>
                <div class="mbwph-call-main <?php echo esc_attr($position) ?>" style="background-color:<?php echo esc_attr($color); ?>">
                    <div class="mbwph-button-border" style="background-color:<?php echo esc_attr($color); ?>"></div>
                    <div class="mbwph-button-border" style="background-color:<?php echo esc_attr($color); ?>"></div>
                    <svg class="mbwph-call-button-icon-child" xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 28 30">
                        <path class="mbwph-button-call-icon" fill="#FFFFFF" fill-rule="evenodd" d="M940.872414,978.904882 C939.924716,977.937215 938.741602,977.937215 937.79994,978.904882 C937.08162,979.641558 936.54439,979.878792 935.838143,980.627954 C935.644982,980.833973 935.482002,980.877674 935.246586,980.740328 C934.781791,980.478121 934.286815,980.265859 933.840129,979.97868 C931.757607,978.623946 930.013117,976.882145 928.467826,974.921839 C927.701216,973.947929 927.019115,972.905345 926.542247,971.731659 C926.445666,971.494424 926.463775,971.338349 926.6509,971.144815 C927.36922,970.426869 927.610672,970.164662 928.316918,969.427987 C929.300835,968.404132 929.300835,967.205474 928.310882,966.175376 C927.749506,965.588533 927.206723,964.77769 926.749111,964.14109 C926.29156,963.50449 925.932581,962.747962 925.347061,962.154875 C924.399362,961.199694 923.216248,961.199694 922.274586,962.161118 C921.55023,962.897794 920.856056,963.653199 920.119628,964.377388 C919.437527,965.045391 919.093458,965.863226 919.021022,966.818407 C918.906333,968.372917 919.274547,969.840026 919.793668,971.269676 C920.856056,974.228864 922.473784,976.857173 924.43558,979.266977 C927.085514,982.52583 930.248533,985.104195 933.948783,986.964613 C935.6148,987.801177 937.341181,988.444207 939.218469,988.550339 C940.510236,988.625255 941.632988,988.288132 942.532396,987.245549 C943.148098,986.533845 943.842272,985.884572 944.494192,985.204083 C945.459999,984.192715 945.466036,982.969084 944.506265,981.970202 C943.359368,980.777786 942.025347,980.091055 940.872414,978.904882 Z M940.382358,973.54478 L940.649524,973.497583 C941.23257,973.394635 941.603198,972.790811 941.439977,972.202844 C940.97488,970.527406 940.107887,969.010104 938.90256,967.758442 C937.61538,966.427182 936.045641,965.504215 934.314009,965.050223 C933.739293,964.899516 933.16512,965.298008 933.082785,965.905204 L933.044877,966.18514 C932.974072,966.707431 933.297859,967.194823 933.791507,967.32705 C935.117621,967.682278 936.321439,968.391422 937.308977,969.412841 C938.23579,970.371393 938.90093,971.53815 939.261598,972.824711 C939.401641,973.324464 939.886476,973.632369 940.382358,973.54478 Z M942.940854,963.694228 C940.618932,961.29279 937.740886,959.69052 934.559939,959.020645 C934.000194,958.902777 933.461152,959.302642 933.381836,959.8878 L933.343988,960.167112 C933.271069,960.705385 933.615682,961.208072 934.130397,961.317762 C936.868581,961.901546 939.347628,963.286122 941.347272,965.348626 C943.231864,967.297758 944.53673,969.7065 945.149595,972.360343 C945.27189,972.889813 945.766987,973.232554 946.285807,973.140969 L946.55074,973.094209 C947.119782,972.993697 947.484193,972.415781 947.350127,971.835056 C946.638568,968.753629 945.126778,965.960567 942.940854,963.694228 Z" transform="translate(-919 -959)"></path>
                    </svg>
                    <div class="mbwph-call-button-close-icon">
                        <svg width="12" height="13" viewBox="0 0 14 14" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                            <g transform="translate(-4087 108)">
                                <g>
                                    <path transform="translate(4087 -108)" fill="currentColor" d="M 14 1.41L 12.59 0L 7 5.59L 1.41 0L 0 1.41L 5.59 7L 0 12.59L 1.41 14L 7 8.41L 12.59 14L 14 12.59L 8.41 7L 14 1.41Z"></path>
                                </g>
                            </g>
                        </svg>
                    </div>
                </div>
            </div>
<?php endif;
    //  Output
    }
    add_action('wp_footer', 'render_html_contact_chanel');
    add_action('wp_footer', 'add_code_chat_facebook');
    function add_code_chat_facebook()
    {
        $mbwp_options = get_option('mbwp_helper');
        $position = ($mbwp_options['opt-accordion-contact']['mbwp-contact-design']['mbwp-contact-position'] == 'mbwp-ct-right') ? 'onRight' : 'onLeft';
        $facebook_chat = $mbwp_options['opt-accordion-contact']['mbwp-general-contact']['mbwp-general-facebook-page'];
        if (!empty($facebook_chat)) {
            $html = '<div class="mbwph-fbc ' . $position . '"><div id="fb-root"></div> </div>
            <script>
            window.fbAsyncInit = function() {
            FB.init({
               xfbml            : true,
               version          : "v12.0"
            });
            };
            (function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.src = "https://connect.facebook.net/vi_VN/sdk/xfbml.customerchat.js";
            fjs.parentNode.insertBefore(js, fjs);
         }(document, "script", "facebook-jssdk"));</script>';
            $html .= '<div class="fb-customerchat"
            attribution=setup_tool
            page_id="' . $facebook_chat . '"
            logged_in_greeting=""
            logged_out_greeting=""
            alignment="left">
         </div>';
            echo esc_html( $html );
        }
    }
    function mbwp_enqueue_inline()
    {
        $mbwp_options = get_option('mbwp_helper');
        $tawk_chat = $mbwp_options['opt-accordion-contact']['mbwp-general-contact']['mbwp-general-tawk'];
        if($tawk_chat) {
            wp_add_inline_script('mb-wp-contact-script', $tawk_chat);
        }
    }
    add_action('wp_enqueue_scripts', 'mbwp_enqueue_inline');
}
