<div class="container electronics">
    <div class="heading heading-flex heading-border mb-3">
        <div class="heading-left">
            <h2 class="title">Electronics</h2><!-- End .title -->
        </div><!-- End .heading-left -->

        <div class="heading-right">
            <ul class="nav nav-pills nav-border-anim justify-content-center" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="elec-best-link" data-toggle="tab" href="#elec-best-tab" role="tab"
                       aria-controls="elec-best-tab" aria-selected="true">Best Seller</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="elec-new-link" data-toggle="tab" href="#elec-new-tab" role="tab"
                       aria-controls="elec-new-tab" aria-selected="false">New</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="elec-featured-link" data-toggle="tab" href="#elec-featured-tab"
                       role="tab" aria-controls="elec-featured-tab" aria-selected="false">Featured</a>
                </li>
            </ul>
        </div><!-- End .heading-right -->
    </div><!-- End .heading -->

    <div class="tab-content tab-content-carousel products">

        <div class="tab-pane p-0 fade show active" id="elec-best-tab" role="tabpanel" aria-labelledby="elec-best-link">
            <div class="row">
                <?php
                $args     = array(
                    'post_type'      => 'product',
                    'post_status'    => 'publish',
                    'posts_per_page' => 4,
                    'meta_key'       => 'total_sales',
                    'orderby'        => 'meta_value_num',
                );
                $products = new WP_Query( $args );
                if ( $products->have_posts() ) {
                    while ( $products->have_posts() ) {
                        $products->the_post();
                        echo '<div class="col-md-4 col-lg-3">';
                        wc_get_template_part( 'content', 'product' );
                        echo '</div>';
                    }
                } else {
                    echo __( 'No products found', 'molla-shop' );
                }
                wp_reset_postdata();
                ?>
            </div>
        </div><!-- .End .tab-pane -->

        <div class="tab-pane p-0 fade" id="elec-new-tab" role="tabpanel" aria-labelledby="elec-new-link">
            <div class="row">
                <?php
                $args     = array(
                    'post_type'      => 'product',
                    'post_status'    => 'publish',
                    'posts_per_page' => 8,
                    'orderby'        => 'date',
                    'order'          => 'DESC',
                );
                $products = new WP_Query( $args );
                if ( $products->have_posts() ) {
                    while ( $products->have_posts() ) {
                        $products->the_post();
                        echo '<div class="col-md-4 col-lg-3">';
                        wc_get_template_part( 'content', 'product' );
                        echo '</div>';
                    }
                } else {
                    echo __( 'No products found', 'molla-shop' );
                }
                wp_reset_postdata();
                ?>
            </div>
        </div><!-- .End .tab-pane -->

        <div class="tab-pane p-0 fade" id="elec-featured-tab" role="tabpanel" aria-labelledby="elec-featured-link">
            <div class="row">
                <?php
                $args     = array(
                    'post_type'      => 'product',
                    'post_status'    => 'publish',
                    'posts_per_page' => 8,
                    'orderby'        => 'date',
                    'order'          => 'DESC',
                    'tax_query'      => [
                        'relation' => 'AND',
                        [
                            'taxonomy' => 'product_visibility',
                            'field'    => 'slug',
                            'terms'    => array( 'featured' ),
                        ]
                    ],
                );
                $products = new WP_Query( $args );
                if ( $products->have_posts() ) {
                    while ( $products->have_posts() ) {
                        $products->the_post();
                        echo '<div class="col-md-4 col-lg-3">';
                        wc_get_template_part( 'content', 'product' );
                        echo '</div>';
                    }
                } else {
                    echo __( 'No products found', 'molla-shop' );
                }
                wp_reset_postdata();
                ?>
            </div>
        </div><!-- .End .tab-pane -->


    </div><!-- End .tab-content -->
</div><!-- End .container -->

<div class="mb-3"></div><!-- End .mb-3 -->