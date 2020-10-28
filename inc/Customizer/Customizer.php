<?php
/**
 * Kirki Setup class file
 *
 * @package molla-shop
 */

namespace Theme\Customizer;

use Theme\Traits\Singleton;

class Customizer {
    protected $config = 'theme_customizer_config';
    use Singleton;

    public function __construct() {
        if ( !class_exists( 'Kirki' ) ) {
            return;
        }
        //Load the class methods
        $this->config();
        $this->load_panels();
        $this->load_sections();
    }

    public function config() {
        \Kirki::add_config( $this->config, [
            'capability'  => 'edit_theme_options',
            'option_type' => 'option',
        ] );
    }

    public function load_panels() {
        //Load panels
        \Theme\Customizer\Panels\Theme_Options::get_instance();
        \Theme\Customizer\Panels\Front_Page::get_instance();
    }

    public function load_sections() {
        //Theme option sections
        \Theme\Customizer\Sections\Theme_Options\Typography::get_instance();
        \Theme\Customizer\Sections\Theme_Options\Common_Options::get_instance();

        //Front page sections
        \Theme\Customizer\Sections\Front_Page\Home_Slider::get_instance();
        \Theme\Customizer\Sections\Front_Page\Popular_Categories::get_instance();
        \Theme\Customizer\Sections\Front_Page\Offers::get_instance();
        \Theme\Customizer\Sections\Front_Page\Subscribe::get_instance();
    }

}