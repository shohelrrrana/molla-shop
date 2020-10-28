<?php
/**
 * Enqueue class file
 *
 * @package molla-shop
 */

namespace Theme\Setup;

use Theme\Traits\Singleton;

class Enqueue {
    use Singleton;

    protected function __construct () {
        $this->setup_hooks();
    }

    public function setup_hooks () {
        //Action
        add_action( 'wp_enqueue_scripts', [ $this, 'register_style' ] );
        add_action( 'wp_enqueue_scripts', [ $this, 'register_script' ] );
    }

    public function register_style () {
        wp_enqueue_style( 'google-font', '//fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800%7CShadows+Into+Light', [], THEME_VERSION );
        wp_enqueue_style( 'bootstrap', THEME_URI . '/assets/vendor/bootstrap/css/bootstrap.min.css', [], THEME_VERSION );
        wp_enqueue_style( 'line-awesome', THEME_URI . '/assets/vendor/line-awesome/css/line-awesome.min.css', [], THEME_VERSION );
        wp_enqueue_style( 'font-awesome', THEME_URI . '/assets/vendor/font-awesome/css/font-awesome.min.css', [], THEME_VERSION );
        wp_enqueue_style( 'owl-carousel', THEME_URI . '/assets/vendor/owl-carousel/css/owl-carousel.css', [], THEME_VERSION );
        wp_enqueue_style( 'magnific-popup', THEME_URI . '/assets/vendor/magnific-popup/css/magnific-popup.css', [], THEME_VERSION );
        wp_enqueue_style( 'jquery-countdown', THEME_URI . '/assets/vendor/jquery-countdown/css/jquery.countdown.css', [], THEME_VERSION );
        wp_enqueue_style( 'skin-demo', THEME_URI . '/assets/css/skin-demo.css', [], THEME_VERSION );
        wp_enqueue_style( 'style', THEME_URI . '/assets/css/style.css', [], THEME_VERSION );
        wp_enqueue_style( 'theme-blog', THEME_URI . '/assets/css/theme-blog.css', [], THEME_VERSION );
        wp_enqueue_style( 'demo', THEME_URI . '/assets/css/demo.css', [], THEME_VERSION );
        wp_enqueue_style( 'theme-style', get_stylesheet_uri(), [], THEME_VERSION );
    }

    public function register_script () {
        wp_enqueue_script( 'new-jquery', THEME_URI . '/assets/vendor/jquery.min.js', [ 'jquery' ], THEME_VERSION, true );
        wp_enqueue_script( 'bootstrap', THEME_URI . '/assets/vendor/bootstrap/js/bootstrap.min.js', [ 'jquery' ], THEME_VERSION, true );
        wp_enqueue_script( 'popper', THEME_URI . '/assets/vendor/bootstrap/js/popper.min.js', [ 'jquery' ], THEME_VERSION, true );
        wp_enqueue_script( 'jquery-hoverIntent', THEME_URI . '/assets/vendor/jquery/jquery.hoverIntent.min.js', [ 'jquery' ], THEME_VERSION, true );
        wp_enqueue_script( 'jquery-waypoints', THEME_URI . '/assets/vendor/jquery/jquery.waypoints.min.js', [ 'jquery' ], THEME_VERSION, true );
        wp_enqueue_script( 'superfish', THEME_URI . '/assets/vendor/jquery/superfish.min.js', [ 'jquery' ], THEME_VERSION, true );
        wp_enqueue_script( 'owl-carousel', THEME_URI . '/assets/vendor/owl-carousel/js/owl.carousel.min.js', [ 'jquery' ], THEME_VERSION, true );
        wp_enqueue_script( 'bootstrap-input-spinner', THEME_URI . '/assets/vendor/jquery/bootstrap-input-spinner.js', [ 'jquery' ], THEME_VERSION, true );
        wp_enqueue_script( 'magnific-popup', THEME_URI . '/assets/vendor/magnific-popup/js/magnific-popup.min.js', [ 'jquery' ], THEME_VERSION, true );
        wp_enqueue_script( 'jquery.plugin', THEME_URI . '/assets/vendor/jquery/jquery.plugin.min.js', [ 'jquery' ], THEME_VERSION, true );
        wp_enqueue_script( 'jquery-countdown', THEME_URI . '/assets/vendor/jquery-countdown/js/jquery.countdown.min.js', [ 'jquery' ], THEME_VERSION, true );
        wp_enqueue_script( 'main-script', THEME_URI . '/assets/js/main-script.js', [ 'jquery' ], THEME_VERSION, true );
        wp_enqueue_script( 'theme-script', THEME_URI . '/assets/js/theme-script.js', [ 'jquery' ], THEME_VERSION, true );
    }
}