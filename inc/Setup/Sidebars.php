<?php
/**
 * Sidebars class file
 *
 * @package molla-shop
 */

namespace Theme\Setup;
use Theme\Traits\Singleton;

class Sidebars {
    use Singleton;

    protected function __construct() {
        $this->setup_hooks();
    }

    public function setup_hooks() {
        //Action
        add_action( 'widgets_init', [$this, 'register_sidebars'] );
    }

    public function register_sidebars() {
        register_sidebar( [
            'name'          => __( 'Shop Sidebar', 'molla-shop' ),
            'id'            => 'shop-sidebar',
            'description'   => __( 'Widgets in this area will be shown on shop page.', 'molla-shop' ),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h3 class="widgettitle">',
            'after_title'   => '</h3>',
        ] );
        register_sidebar( [
            'name'          => __( 'Blog Sidebar', 'molla-shop' ),
            'id'            => 'blog-sidebar',
            'description'   => __( 'Widgets in this area will be shown on blog page.', 'molla-shop' ),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h3 class="widgettitle">',
            'after_title'   => '</h3>',
        ] );

        register_sidebar( [
            'name'          => __( 'Footer #1', 'molla-shop' ),
            'id'            => 'footer-one',
            'description'   => __( 'Widgets in this area will be shown on footer area', 'molla-shop' ),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h4 class="widget-title">',
            'after_title'   => '</h4>',
        ] );

        register_sidebar( [
            'name'          => __( 'Footer #2', 'molla-shop' ),
            'id'            => 'footer-two',
            'description'   => __( 'Widgets in this area will be shown on footer area', 'molla-shop' ),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h4 class="widget-title">',
            'after_title'   => '</h4>',
        ] );

        register_sidebar( [
            'name'          => __( 'Footer #3', 'molla-shop' ),
            'id'            => 'footer-three',
            'description'   => __( 'Widgets in this area will be shown on footer area', 'molla-shop' ),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h4 class="widget-title">',
            'after_title'   => '</h4>',
        ] );

        register_sidebar( [
            'name'          => __( 'Footer #4', 'molla-shop' ),
            'id'            => 'footer-four',
            'description'   => __( 'Widgets in this area will be shown on footer area', 'molla-shop' ),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h4 class="widget-title">',
            'after_title'   => '</h4>',
        ] );
    }
}