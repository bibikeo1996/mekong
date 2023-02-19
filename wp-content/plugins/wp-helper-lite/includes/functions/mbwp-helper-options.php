<?php
defined( 'ABSPATH' ) || exit;
if ( class_exists( 'CSF' ) ) {
// Set a unique slug-like ID
$prefix = 'mbwp_helper';
}
// Create options
$options['framework_title']         = __( 'WordPress Helper Premium', ' mbwp-helper ' );
$options['framework_class']         = 'mbwp-helper';
$options['menu_title']              = __( 'WP Helper', 'mbwp-helper' );
$options['menu_slug']               = 'mbwp-helper';
$options['menu_type']               = 'menu';
$options['menu_capability']         = 'manage_options';
$options['menu_icon']               = MBWP_HP_URL . 'assets/images/admin/icon.svg';
$options['menu_position']           = 3;
$options['menu_hidden']             = false;
$options['menu_parent']             = '';
$options['show_bar_menu']           = true;
$options['show_sub_menu']           = true;
$options['show_in_network']         = true;
$options['show_in_customizer']      = false;
$options['show_search']             = true;
$options['show_reset_all']          = true;
$options['show_reset_section']      = true;
$options['show_footer']             = false;
$options['show_all_options']        = true;
$options['show_form_warning']       = true;
$options['sticky_header']           = true;
$options['save_defaults']           = true;
$options['ajax_save']               = true;
$options['admin_bar_menu_icon']     = '';
$options['admin_bar_menu_priority'] = 80;
$options['footer_text']             = __( 'WP Helper', 'mbwp-helper' );
$options['database']                = 'options';
$options['transient_time']          = 0;
$options['contextual_help']         = array();
$options['contextual_help_sidebar'] = '';
$options['enqueue_webfont']         = true;
$options['async_webfont']           = false;
$options['output_css']              = true;
$options['nav']                     = 'inline';
$options['theme']                   = 'light';
$options['class']                   = '';
$options['defaults']                = array();
CSF::createOptions( $prefix, $options );
require_once MBWPH_ABSPATH . '/includes/admin/options.php';

