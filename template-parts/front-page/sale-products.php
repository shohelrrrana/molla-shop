<?php
/**
 * Template Part For front page
 *
 * @package molla-shop
 * */

$section    = get_option( 'front_page_popular_categories_section', [] );
$ex_term    = get_term_by( 'slug', 'uncategorized', 'product_cat' );
$categories = get_terms( [
    'taxonomy' => 'product_cat',
    'number'   => 6,
    'exclude'  => array( $ex_term->term_id ),
] );
?>
<div class="bg-light pt-3 pb-5">
    <div class="container">
        <div class="heading heading-flex heading-border mb-3">
            <div class="heading-left">
                <h2 class="title">Hot Deals Products</h2><!-- End .title -->
            </div><!-- End .heading-left -->

            <div class="heading-right">
                <ul class="nav nav-pills nav-border-anim justify-content-center" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="hot-all-link" data-toggle="tab" href="#hot-all-tab"
                           role="tab" aria-controls="hot-all-tab" aria-selected="true">All</a>
                    </li>
                    <?php foreach ( $categories as $category ) : ?>
                        <li class="nav-item">
                            <a class="nav-link" id="hot-<?php echo esc_attr( $category->slug ); ?>-link"
                               data-toggle="tab" href="#hot-<?php echo esc_attr( $category->slug ); ?>-tab" role="tab"
                               aria-controls="hot-elec-tab" aria-selected="false">
                                <?php echo esc_html( $category->name ); ?>
                            </a>
                        </li>
                    <?php endforeach; ?>

                </ul>
            </div><!-- End .heading-right -->
        </div><!-- End .heading -->

        <div class="tab-content tab-content-carousel  woocommerce">


            <div class="tab-pane p-0 fade show active" id="hot-all-tab" role="tabpanel"
                 aria-labelledby="hot-all-link">
                <div class="row">
                    <?php
                    $args     = [
                        'post_type'      => 'product',
                        'post_status'    => 'publish',
                        'posts_per_page' => 8,
                        'meta_query'     => array(
                            'relation' => 'OR',
                            [ // Simple products type
                              'key'     => '_sale_price',
                              'value'   => 0,
                              'compare' => '>',
                              'type'    => 'numeric'
                            ],
                            [ // Variable products type
                              'key'     => '_min_variation_sale_price',
                              'value'   => 0,
                              'compare' => '>',
                              'type'    => 'numeric'
                            ]
                        )
                    ];
                    $products = new WP_Query( $args );
                    while ( $products->have_posts() ) {
                        $products->the_post();
                        global $product;

                        echo '<div class="col-md-4 col-lg-3">';
                        wc_get_template_part( 'content', 'product' );
                        echo '</div>';
                    }
                    wp_reset_query();
                    ?>
                </div>
                >
            </div>

            <?php foreach ( $categories as $category ) : ?>
                <div class="tab-pane p-0 fade" id="hot-<?php echo esc_attr( $category->slug ); ?>-tab" role="tabpanel"
                     aria-labelledby="hot-<?php echo esc_attr( $category->slug ); ?>-link">
                    <div class="row">
                        <?php
                        $args     = [
                            'post_type'      => 'product',
                            'posts_per_page' => 8,
                            'post_status'    => 'publish',
                            'tax_query'      => array(
                                'relation' => 'AND',
                                [
                                    'taxonomy' => 'product_cat',
                                    'field'    => 'slug',
                                    'terms'    => array( $category->slug ),
                                ]
                            )
                        ];
                        $products = new WP_Query( $args );
                        while ( $products->have_posts() ) {
                            $products->the_post();
                            global $product;
                            echo '<div class="col-md-4 col-lg-3">';
                            wc_get_template_part( 'content', 'product' );
                            echo '</div>';
                        }
                        wp_reset_query();
                        ?>
                    </div>

                </div><!-- .End .tab-pane -->
            <?php endforeach; ?>


        </div><!-- End .tab-content -->
    </div><!-- End .container -->
</div><!-- End .bg-light pt-5 pb-5 -->

<div class="mb-3"></div><!-- End .mb-3 -->