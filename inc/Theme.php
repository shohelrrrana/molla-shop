<?php
/**
 * Theme Main class file
 *
 * @package molla-shop
 */

namespace Theme;

use Theme\Customizer\Customizer;
use Theme\Setup\Enqueue;
use Theme\Setup\Menus;
use Theme\Woocommerce\Mod_Woocommerce;
use Theme\Setup\Setup;
use Theme\Setup\Sidebars;

class Theme {
    static $boot;

    public function __construct () {
        //Load Methods
        $this->include_files();

        //Get Instance Classes
        Setup::get_instance();
        Enqueue::get_instance();
        Customizer::get_instance();
        Menus::get_instance();
        Sidebars::get_instance();
        Mod_Woocommerce::get_instance();
    }

    public function include_files () {
        require_once get_template_directory() . '/inc/Helpers/helper.php';
        require_once get_template_directory() . '/inc/Helpers/template-tags.php';
        require_once get_template_directory() . '/inc/Helpers/plugin_activation.php';
        require_once get_template_directory() . '/inc/Plugins/Kirki_Installer_Section.php';
        require_once get_template_directory() . '/demo-data/demo-data.php';
    }

    static public function boot () {
        if ( ! static::$boot ) {
            static::$boot = new Theme();
        }
        return static::$boot;
    }
}