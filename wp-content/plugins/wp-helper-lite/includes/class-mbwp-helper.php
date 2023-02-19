<?php
/**
 * MB WP Helper setup
 * @since 4.0.0
 */
class MB_WP_Helper
{
    public $version = '4.0.0';
    protected static $_instance = null;
    public static function instance()
    {
        if (is_null(self::$_instance)) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }
    /**
     * MB WP Helper Constructor.
     */
    public function __construct()
    {
        $this->define_constants();
        $this->includes();
        $this->init_hooks();
    }
    private function init_hooks()
    {
        add_action('admin_enqueue_scripts', array($this, 'mbwph_admin_customs_scripts'));
    }
    private function define_constants()
    {
        $this->define('MBWPH_ABSPATH', dirname(MBWP_HP_FILE) . '/');
        $this->define('MBWP_HP_BASENAME', plugin_basename(MBWPH_ABSPATH));
        $this->define('MBWP_HP_URL', plugins_url('/', MBWP_HP_FILE));
        $this->define('MBWP_HP_VERSION', $this->version);
    }
    public function includes()
    {
        include_once MBWPH_ABSPATH . '/includes/lib/codestar-framework/codestar-framework.php';
        include_once MBWPH_ABSPATH . '/includes/functions/function-ultility.php';
        include_once MBWPH_ABSPATH . '/includes/functions/mbwp-helper-options.php';
        include_once MBWPH_ABSPATH . '/includes/frontend/mbwp-header-footer.php';
        include_once MBWPH_ABSPATH . '/includes/frontend/mbwp-contact-channel.php';
        include_once MBWPH_ABSPATH . '/includes/frontend/mbwp-email-smtp.php';
        include_once MBWPH_ABSPATH . '/includes/frontend/mbwp-security.php';
        include_once MBWPH_ABSPATH . '/includes/frontend/mbwp-extensions.php';
        include_once MBWPH_ABSPATH . '/includes/functions/class-csf-field-btn-a.php';
    }
    function mbwph_admin_customs_scripts()
    {
        wp_enqueue_style('mbwp-helper-style-admin', MBWP_HP_URL . 'assets/css/admin/mbwp-admin.css', array(), $this->version);
        wp_enqueue_script('mbwp-helper-script-admin', MBWP_HP_URL . 'assets/js/admin.js', array('jquery'), '', true);
    }
    private function define($name, $value)
    {
        if (!defined($name)) {
            define($name, $value);
        }
    }
}
