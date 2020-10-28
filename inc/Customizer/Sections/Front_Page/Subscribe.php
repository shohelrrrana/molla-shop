<?php
/**
 * subscribe class file for customizer
 *
 * @package molla-shop
 */

namespace Theme\Customizer\Sections\Front_Page;

use Theme\Customizer\Panels\Front_Page;

class Subscribe extends Front_Page {
    protected $section = 'front_page_subscribe_section';
    protected $option_name = 'front_page_subscribe_section';

    public function __construct () {
        //Load section & fields
        $this->register_section();
        $this->register_fields();
    }

    public function register_section () {
        \Kirki::add_section( $this->section, [
            'title'    => esc_html__( 'Subscribe Section', 'molla-shop' ),
            'panel'    => $this->panel,
            'priority' => 160,
        ] );
    }

    public function register_fields () {

        \Kirki::add_field( $this->config, [
            'type'            => 'text',
            'settings'        => 'section_heading',
            'label'           => esc_html__( 'Section Heading', 'molla-shop' ),
            'section'         => $this->section,
            'option_name'     => $this->option_name,
            'partial_refresh' => [
                $this->section . 'section_heading' => [
                    'selector'        => '#subscribe .section_heading',
                    'render_callback' => function () {
                        return get_option( $this->option_name )['section_heading'];
                    },
                ],
            ],
        ] );

        \Kirki::add_field( $this->config, [
            'type'            => 'text',
            'settings'        => 'section_sub_heading',
            'label'           => esc_html__( 'Section Sub Heading', 'molla-shop' ),
            'section'         => $this->section,
            'option_name'     => $this->option_name,
            'partial_refresh' => [
                $this->section . 'section_heading' => [
                    'selector'        => '#subscribe .section_sub_heading',
                    'render_callback' => function () {
                        return get_option( $this->option_name )['section_sub_heading'];
                    },
                ],
            ],
        ] );

        \Kirki::add_field( $this->config, [
            'type'            => 'text',
            'settings'        => 'form_shortcode',
            'label'           => esc_html__( 'Form Shortcode', 'molla-shop' ),
            'section'         => $this->section,
            'option_name'     => $this->option_name,
        ] );


    }

}