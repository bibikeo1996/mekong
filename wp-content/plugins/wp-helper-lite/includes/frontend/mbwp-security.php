<?php
defined( 'ABSPATH' ) || exit;
$mbwp_options = get_option( 'mbwp_helper' );
if(! empty( $mbwp_options['mbwp-remove-xml-rpc'] ) ){
    add_filter( 'xmlrpc_enabled', '__return_false' );
}
if(!empty($mbwp_options['mbwp-disable-copy-content'])){
    add_action('wp_enqueue_scripts', 'disable_copy_content');
    function disable_copy_content(){
        wp_enqueue_script( 'mbwph-disable-copy', MBWP_HP_URL . 'assets/js/frontend/disable-copy.js', array('jquery'), '', true );
    }
}
if(!empty($mbwp_options['mbwp-delete-link-head'])){
    remove_action('wp_head', 'wp_generator');
    remove_action('wp_head', 'rsd_link');
    remove_action('wp_head', 'wlwmanifest_link');
    remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);
    remove_action('wp_head', 'feed_links', 2);
    remove_action('wp_head', 'feed_links_extra', 3);
    remove_action('wp_head', 'start_post_rel_link', 10, 0);
    remove_action('wp_head', 'parent_post_rel_link', 10, 0);
    remove_action('wp_head', 'index_rel_link');
    remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0);
    remove_action('wp_head', 'adjacent_posts_rel_link_wp_head, 10, 0');
}
if(!empty($mbwp_options['mbwp-switcher-hide-wp-version'])){
    function remove_version_info() {
        return '';
    }
    add_filter('the_generator', 'remove_version_info');
    function change_footer_admin () {
        return ' ';
    }
    add_filter('admin_footer_text', 'change_footer_admin', 9999);
    function change_footer_version() {
        return ' ';
    }
    add_filter( 'update_footer', 'change_footer_version', 9999);
}
if(!empty($mbwp_options['mbwp-switcher-hide-menu-theme-plugin'])){
    if(is_admin()){
        add_filter( 'auto_update_core', '__return_false' );
        add_filter( 'auto_update_translation', '__return_false' );
        add_action( 'admin_menu', 'mbwp_helper_remove_menu_pages_admin' );
        function mbwp_helper_remove_menu_pages_admin() {
            remove_menu_page( 'theme-editor.php' );
            remove_menu_page( 'plugins.php' );
        }
        if (!defined('DISALLOW_FILE_EDIT'))
            define('DISALLOW_FILE_EDIT', true);
        if (!defined('DISALLOW_FILE_MODS'))
            define('DISALLOW_FILE_MODS', true);
    }
}
if(!empty($mbwp_options['mbwp-login-url']['mbwp-switcher-change-url-login'])){
    if(!class_exists( 'mbwph_Security_Load_Settings' )){
        class mbwph_Security_Load_Settings{
            private $secureOptions;
            public function __construct() {
                $this->setup_vars();
                add_action( 'login_init', array( $this,'mbwph_hide_login_head'),1);
                add_action( 'login_form', array( $this,'mbwph_hide_login_hidden_field'));
                add_action( 'template_redirect', array( $this,'mbwph_hide_login_init'));
                add_action( 'init', array( $this,'mbwph_hide_login_init'));
                add_filter( 'lostpassword_url',  array( $this,'mbwph_hide_login_lostpassword'), 10, 0 );
                add_action( 'lostpassword_form', array( $this,'mbwph_hide_login_hidden_field'));
                add_filter( 'lostpassword_redirect', array( $this,'mbwph_hide_login_lostpassword_redirect'), 100, 1 );
            }
            function setup_vars(){
                $this->secureOptions = get_option( 'mbwp_helper' );
            }
            function mbwph_hide_login_head(){
                $mbwph_slug =  $this->secureOptions['mbwp-login-url']['mbwp-login-new-url'];
                if( isset($_POST['redirect_slug']) && $_POST['redirect_slug'] == $mbwph_slug){
                    return false;
                }
                if( strpos($_SERVER['REQUEST_URI'], 'action=logout') !== false ){
                    check_admin_referer( 'log-out' );
                    $user = wp_get_current_user();
                    wp_logout();
                    wp_safe_redirect( home_url(), 302 );
                    die;
                }
                if( ( strpos($_SERVER['REQUEST_URI'], $mbwph_slug) === false  ) &&
                    ( strpos($_SERVER['REQUEST_URI'], 'wp-login.php') !== false  ) ){
                    wp_safe_redirect( home_url( '404' ), 302 );
                    exit();
                }
            }
            function mbwph_hide_login_hidden_field(){
                $mbwph_slug =  $this->secureOptions['mbwp-login-url']['mbwp-login-new-url'];
                ?>
                <input type="hidden" name="redirect_slug" value="<?php echo esc_attr($mbwph_slug) ?>" />
                <?php
            }
            function mbwph_hide_login_init(){
                $mbwph_slug =  $this->secureOptions['mbwp-login-url']['mbwp-login-new-url'];
                if('/'.$mbwph_slug ==  $_SERVER['REQUEST_URI']){
                    wp_safe_redirect(home_url('wp-login.php?'.$mbwph_slug.'&redirect=false'));
                    exit();
                }
            }
            function mbwph_hide_login_lostpassword() {
                $mbwph_slug =  $this->secureOptions['mbwp-login-url']['mbwp-login-new-url'];
                return site_url('wp-login.php?action=lostpassword&'.$mbwph_slug.'&redirect=false');
            }
            function mbwph_hide_login_lostpassword_redirect($lostpassword_redirect) {
                $mbwph_slug =  $this->secureOptions['mbwp-login-url']['mbwp-login-new-url'];
                return 'wp-login.php?checkemail=confirm&redirect=false&' . $mbwph_slug;
            }
        }
        new mbwph_Security_Load_Settings;
    }
}
