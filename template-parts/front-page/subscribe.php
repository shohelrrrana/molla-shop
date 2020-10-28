<?php
/**
 * Template Part For front page
 *
 * @package molla-shop
 * */

$section             = get_option( 'front_page_subscribe_section', [] );
$section_heading     = $section['section_heading'] ?? '';
$section_sub_heading = $section['section_sub_heading'] ?? '';
$form_shortcode      = $section['form_shortcode'] ?? '';
?>
<div id="subscribe" class="cta cta-horizontal cta-horizontal-box bg-primary">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-2xl-5col">
                <h3 class="cta-title text-white section_heading">
                    <?php echo esc_html( $section_heading ); ?>
                </h3><!-- End .cta-title -->
                <p class="cta-desc text-white section_sub_heading">
                    <?php echo esc_html( $section_sub_heading ); ?>
                </p>
                <!-- End .cta-desc -->
            </div><!-- End .col-lg-5 -->

            <div class="col-3xl-5col">
                <?php echo do_shortcode( $form_shortcode ); ?>
            </div><!-- End .col-lg-7 -->
        </div><!-- End .row -->
    </div><!-- End .container -->
</div>