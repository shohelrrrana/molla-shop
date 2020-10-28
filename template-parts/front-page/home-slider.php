<?php
/**
 * Template Part For front page
 *
 * @package molla-shop
 * */

$section = get_option( 'front_page_home_slider_section', [] );
$sliders = $section['home_sliders'] ?? [];
?>
<?php if ( ! empty( $sliders ) ): ?>
    <div class="intro-slider-container">
        <div class="intro-slider owl-carousel owl-simple owl-nav-inside" data-toggle="owl" data-owl-options='{
                        "nav": false,
                        "responsive": {
                            "992": {
                                "nav": true
                            }
                        }
                    }'>

            <?php
            foreach ( $sliders as $slider ) :
                $bg_image = $slider['bg_image'] ?? '';
                $bg_image = wp_get_attachment_image_url( $bg_image, 'large' );
                $sub_title = $slider['sub_title'] ?? '';
                $title = $slider['title'] ?? '';
                $price = $slider['price'] ?? '';
                $old_price = $slider['old_price'] ?? '';
                $button_title = $slider['button_title'] ?? '';
                $button_link = $slider['button_link'] ?? '';
                ?>
                <div class="intro-slide"
                     style="background-image: url(<?php echo esc_url( $bg_image ); ?>);">
                    <div class="container intro-content">
                        <div class="row">
                            <div class="col-auto offset-lg-3 intro-col">
                                <h3 class="intro-subtitle">
                                    <?php echo esc_html( $sub_title ); ?>
                                </h3>
                                <h1 class="intro-title">
                                    <?php echo esc_html( $title ); ?>
                                    <span>
                                            <?php if ( $old_price ): ?>
                                                <sup class="font-weight-light line-through">
                                                    $<?php echo esc_html( $old_price ); ?>
                                                </sup>
                                            <?php endif; ?>
                                            &nbsp;
                                            <span class="text-primary">
                                                <?php echo esc_html( $price ); ?>
                                            </span>
                                        </span>
                                </h1><!-- End .intro-title -->

                                <a href="<?php echo esc_url( $button_link ); ?>" class="btn btn-outline-primary-2">
                                    <span><?php echo esc_html( $button_title ); ?></span>
                                    <i class="fa fa-long-arrow-right"></i>
                                </a>
                            </div><!-- End .col-auto offset-lg-3 -->
                        </div><!-- End .row -->
                    </div><!-- End .container intro-content -->
                </div><!-- End .intro-slide -->
            <?php endforeach; ?>

        </div><!-- End .owl-carousel owl-simple -->

        <span class="slider-loader"></span><!-- End .slider-loader -->
    </div><!-- End .intro-slider-container -->

    <div class="mb-4"></div><!-- End .mb-2 -->
<?php endif; ?>
