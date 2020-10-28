<?php
/**
 * The header part for our theme
 *
 * @package molla-shop
 */
$common_options           = get_option( 'common_options', [] );
$header_top_left_content  = $common_options['header_top_left_content'] ?? '';
$header_top_right_content = $common_options['header_top_right_content'] ?? '';

?>
<div class="header-top">
    <div class="container">
        <div class="header-left header_top_left_content">
            <?php echo wp_kses_post( $header_top_left_content ); ?>
        </div><!-- End .header-left -->

        <div class="header-right header_top_right_content">
            <?php echo wp_kses_post( $header_top_right_content ); ?>
        </div><!-- End .header-right -->
    </div><!-- End .container -->
</div><!-- End .header-top -->