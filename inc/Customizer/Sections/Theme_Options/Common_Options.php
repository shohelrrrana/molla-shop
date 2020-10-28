<?php
/**
 * Banner class file for customizer
 *
 * @package molla-shop
 */

namespace Theme\Customizer\Sections\Theme_Options;

use Theme\Customizer\Panels\Theme_Options;

class Common_Options extends Theme_Options {
    protected $section = 'common_options';
    protected $option_name = 'common_options';

    public function __construct () {
        //Load section & fields
        $this->register_section();
        $this->register_fields();
    }

    public function register_section () {
        \Kirki::add_section( $this->section, [
            'title'    => esc_html__( 'Common Options', 'molla-shop' ),
            'panel'    => $this->panel,
            'priority' => 160,
        ] );
    }

    public function register_fields () {
        \Kirki::add_field( $this->config, [
            'type'            => 'editor',
            'settings'        => 'header_top_left_content',
            'label'           => __( 'Header top left content', 'molla-shop' ),
            'section'         => $this->section,
            'option_name'     => $this->option_name,
            'priority'        => 10,
            'partial_refresh' => [
                $this->section . 'header_top_left_content' => [
                    'selector'        => '.header_top_left_content',
                    'render_callback' => function () {
                        return get_option( $this->option_name )['header_top_left_content'];
                    },
                ],
            ],
        ] );

        \Kirki::add_field( $this->config, [
            'type'            => 'editor',
            'settings'        => 'header_top_right_content',
            'label'           => __( 'Header top right content', 'molla-shop' ),
            'section'         => $this->section,
            'option_name'     => $this->option_name,
            'priority'        => 10,
            'partial_refresh' => [
                $this->section . 'header_top_right_content' => [
                    'selector'        => '.header_top_right_content',
                    'render_callback' => function () {
                        return get_option( $this->option_name )['header_top_right_content'];
                    },
                ],
            ],
        ] );

        \Kirki::add_field( $this->config, [
            'type'            => 'editor',
            'settings'        => 'footer_bottom_left_content',
            'label'           => __( 'Footer bottom left content', 'molla-shop' ),
            'section'         => $this->section,
            'option_name'     => $this->option_name,
            'priority'        => 10,
            'partial_refresh' => [
                $this->section . 'footer_bottom_left_content' => [
                    'selector'        => '.footer_bottom_left_content',
                    'render_callback' => function () {
                        return get_option( $this->option_name )['footer_bottom_left_content'];
                    },
                ],
            ],
        ] );

        \Kirki::add_field( $this->config, [
            'type'            => 'text',
            'settings'        => 'footer_social_icons_title',
            'label'           => __( 'Footer social icons title', 'molla-shop' ),
            'section'         => $this->section,
            'option_name'     => $this->option_name,
            'priority'        => 10,
            'partial_refresh' => [
                $this->section . '.footer_social_icons_title' => [
                    'selector'        => 'footer_social_icons_title',
                    'render_callback' => function () {
                        return get_option( $this->option_name )['footer_social_icons_title'];
                    },
                ],
            ],
        ] );

        \Kirki::add_field( $this->config, [
            'type'        => 'text',
            'settings'    => 'facebook_link',
            'label'       => __( 'Facebook Link', 'molla-shop' ),
            'section'     => $this->section,
            'option_name' => $this->option_name,
            'priority'    => 10,
        ] );

        \Kirki::add_field( $this->config, [
            'type'        => 'text',
            'settings'    => 'twitter_link',
            'label'       => __( 'Twitter Link', 'molla-shop' ),
            'section'     => $this->section,
            'option_name' => $this->option_name,
            'priority'    => 10,
        ] );

        \Kirki::add_field( $this->config, [
            'type'        => 'text',
            'settings'    => 'instagram_link',
            'label'       => __( 'Instagram Link', 'molla-shop' ),
            'section'     => $this->section,
            'option_name' => $this->option_name,
            'priority'    => 10,
        ] );

        \Kirki::add_field( $this->config, [
            'type'        => 'text',
            'settings'    => 'youtube_link',
            'label'       => __( 'Youtube Link', 'molla-shop' ),
            'section'     => $this->section,
            'option_name' => $this->option_name,
            'priority'    => 10,
        ] );

        \Kirki::add_field( $this->config, [
            'type'        => 'text',
            'settings'    => 'pinterest_link',
            'label'       => __( 'Pinterest Link', 'molla-shop' ),
            'section'     => $this->section,
            'option_name' => $this->option_name,
            'priority'    => 10,
        ] );

    }

}