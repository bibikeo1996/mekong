<?php
if (!defined('WPINC')) {
    die;
}

class Plugin_Active
{

    public static function active()
    {
       
    }
    public static function add_admin_menu()
    {
        add_menu_page(
            'Plugin Options',
            'Plugin Options',
            'manage_options',
            'plugin-options',
            'show_plugin_options',
            '',
            '2'
        );
    }
}
