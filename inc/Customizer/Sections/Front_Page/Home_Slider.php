<?php
/**
 * HomeSlider class file for customizer
 *
 * @package molla-shop
 */

namespace Theme\Customizer\Sections\Front_Page;

use Theme\Customizer\Panels\Front_Page;

class Home_Slider extends Front_Page {
    protected $section = 'front_page_home_slider_section';
    protected $option_name = 'front_page_home_slider_section';

    public function __construct () {
        //Load section & fields
        $this->register_section();
        $this->register_fields();
    }

    public function register_section () {
        \Kirki::add_section( $this->section, [
            'title'    => esc_html__( 'Home Slider Section', 'molla-shop' ),
            'panel'    => $this->panel,
            'priority' => 160,
        ] );
    }

    public function register_fields () {

        \Kirki::add_field( $this->config, [
            'type'            => 'repeater',
            'settings'        => 'home_sliders',
            'label'           => esc_html__( 'Home Sliders', 'molla-shop' ),
            'row_label'       => [
                'type'  => 'field',
                'field' => 'title',
            ],
            'button_label'    => esc_html__( '"Add new slider', 'molla-shop' ),
            'section'         => $this->section,
            'option_name'     => $this->option_name,
            'partial_refresh' => [
                $this->section . 'home_sliders' => [
                    'selector'        => '#home_slider .home_sliders',
                    'render_callback' => '__return_false',
                ],
            ],
            'fields'          => [
                'bg_image' => [
                    'type'  => 'image',
                    'label' => esc_html__( 'Background Image', 'molla-shop' ),
                ],
                'sub_title' => [
                    'type'  => 'text',
                    'label' => esc_html__( 'Sub Title', 'molla-shop' ),
                ],
                'title' => [
                    'type'  => 'text',
                    'label' => esc_html__( 'Title', 'molla-shop' ),
                ],
                'price' => [
                    'type'  => 'text',
                    'label' => esc_html__( 'Price', 'molla-shop' ),
                ],
                'old_price' => [
                    'type'  => 'text',
                    'label' => esc_html__( 'Old Price', 'molla-shop' ),
                ],
                'button_title' => [
                    'type'  => 'text',
                    'label' => esc_html__( ' Button Title', 'molla-shop' ),
                ],
                'button_link' => [
                    'type'  => 'text',
                    'label' => esc_html__( ' Button Link', 'molla-shop' ),
                ],
            ],
        ] );
    }

}