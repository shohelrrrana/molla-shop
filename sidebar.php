<?php
/**
 * The single template file
 *
 * @package molla-shop
 */
?>
<aside class="sidebar">
    <?php
    if ( is_home() && ! is_single() ) {
        dynamic_sidebar( 'blog-sidebar' );
    }
    if ( function_exists( 'is_shop' ) && is_shop() ) {
        dynamic_sidebar( 'shop-sidebar' );
    }
    ?>
</aside>
