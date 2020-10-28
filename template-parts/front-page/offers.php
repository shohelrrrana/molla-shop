<?php
/**
 * Template Part For front page
 *
 * @package molla-shop
 * */

$section = get_option( 'front_page_offers_section', [] );
$offers  = $section['offers'] ?? [];
if ( ! empty( $offers ) ):
    ?>
    <div id="offers" class="container">
        <div class="row">

            <?php
            $i = 0;
            foreach ( $offers as $offer ) :
                $i++;
                $title           = $offer['title'] ?? '';
                $sub_title       = $offer['sub_title'] ?? '';
                $promotion_title = $offer['promotion_title'] ?? '';
                $button_title    = $offer['button_title'] ?? '';
                $button_link     = $offer['button_link'] ?? '';
                $bg_image        = $offer['bg_image'] ?? '';
                $bg_image        = wp_get_attachment_image_url( $bg_image, 'large' );
                $column          = $i === 2 || $i === 5 ? 6 : 3;
                ?>
                <div class="col-sm-6 col-lg-<?php echo esc_attr( $column ); ?>">
                    <div class="banner banner-overlay">
                        <a href="#">
                            <img src="<?php echo esc_url( $bg_image ); ?>"
                                 alt="Banner">
                        </a>

                        <div class="banner-content">
                            <h4 class="banner-subtitle text-white">
                                <a href="#"><?php echo esc_html( $sub_title ); ?></a>
                            </h4>
                            <!-- End .banner-subtitle -->
                            <h3 class="banner-title text-white">
                                <a href="#">
                                    <?php echo esc_html( $title ); ?>
                                    <br>
                                    <span><?php echo esc_html( $promotion_title ); ?></span>
                                </a>
                            </h3><!-- End .banner-title -->
                            <a href="<?php echo esc_url( $button_link ); ?>" class="banner-link">
                                <?php echo esc_html( $button_title ); ?>
                                <i class="icon-long-arrow-right"></i>
                            </a>
                        </div><!-- End .banner-content -->
                    </div><!-- End .banner -->
                </div><!-- End .col-lg-3 -->
            <?php endforeach; ?>


        </div><!-- End .row -->
    </div><!-- End .container -->
    <div class="mb-3"></div><!-- End .mb-3 -->
<?php endif; ?>