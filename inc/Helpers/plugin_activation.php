<?php
require_once get_template_directory() . '/inc/Plugins/class-tgm-plugin-activation.php';

function starter_theme_plugin_activation() {

    $plugins = [
        [
            'name'     => __( 'Kirki Customizer Framework', 'molla_shop' ),
            'slug'     => 'kirki',
            'source'   => 'https://downloads.wordpress.org/plugin/kirki.3.1.5.zip',
            'required' => true,
        ],
        [
            'name'     => __( 'One Click Demo Import', 'molla_shop' ),
            'slug'     => 'one-click-demo-import',
            'source'   => 'https://downloads.wordpress.org/plugin/one-click-demo-import.2.6.1.zip',
            'required' => true,
        ],
        [
            'name'     => __( 'MC4WP: Mailchimp for WordPress', 'molla_shop' ),
            'slug'     => 'mailchimp-for-wp',
            'required' => true,
        ],
        [
            'name'     => __( 'Woocommerce', 'molla_shop' ),
            'slug'     => 'woocommerce',
            'required' => true,
        ],
        [
            'name'     => __( 'YITH WooCommerce Wishlist', 'molla_shop' ),
            'slug'     => 'yith-woocommerce-wishlist',
            'required' => true,
        ],
    ];

    $config = [
        'id'          => 'starter_theme_plugins_activation',
        'menu'        => 'molla_shop-plugins-activation',
        'parent_slug' => 'themes.php',
        'has_notices' => true,

    ];

    tgmpa( $plugins, $config );

}
add_action( 'tgmpa_register', 'starter_theme_plugin_activation' );