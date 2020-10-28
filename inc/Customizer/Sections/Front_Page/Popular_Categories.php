<?php
/**
 * Popular_Categories class file for customizer
 *
 * @package molla-shop
 */

namespace Theme\Customizer\Sections\Front_Page;

use Theme\Customizer\Panels\Front_Page;

class Popular_Categories extends Front_Page {
    protected $section = 'front_page_popular_categories_section';
    protected $option_name = 'front_page_popular_categories_section';

    public function __construct () {
        //Load section & fields
        $this->register_section();
        $this->register_fields();
    }

    public function register_section () {
        \Kirki::add_section( $this->section, [
            'title'    => esc_html__( 'Popular Categories Section', 'molla-shop' ),
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
                    'selector'        => '#popular_categories .section_heading',
                    'render_callback' => function () {
                        return get_option( $this->option_name )['section_heading'];
                    },
                ],
            ],
        ] );

        \Kirki::add_field( $this->config, [
            'type'        => 'text',
            'settings'    => 'show_number_of_categories',
            'label'       => esc_html__( 'Show Number Of Categories', 'molla-shop' ),
            'section'     => $this->section,
            'option_name' => $this->option_name,
        ] );

        \Kirki::add_field( $this->config, [
            'type'        => 'select',
            'settings'    => 'show_number_of_columns',
            'label'       => esc_html__( 'Show Number Of Columns Per Row', 'molla-shop' ),
            'section'     => $this->section,
            'option_name' => $this->option_name,
            'default'     => 2,
            'choices'     => [
                4   => esc_html__( 'Three', 'molla-shop' ),
                3   => esc_html__( 'Four', 'molla-shop' ),
                2   => esc_html__( 'Six', 'molla-shop' ),
            ],
        ] );


    }

}