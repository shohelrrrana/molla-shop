<?php
/**
 * Setup Theme class file
 *
 * @package molla-shop
 */

namespace Theme\Woocommerce;

use \Theme\Traits\Singleton;

class Mod_Woocommerce {
    use Singleton;

    protected function __construct () {
        //Load Methods
        $this->setup_hooks();
    }

    protected function setup_hooks () {

        //remove actions
        remove_action( ' woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail' );
        remove_action( ' woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash' );
        remove_all_actions( 'woocommerce_before_shop_loop_item_title' );
        remove_all_actions( 'woocommerce_shop_loop_item_title' );
        remove_all_actions( 'woocommerce_after_shop_loop_item_title' );
        remove_all_actions( 'woocommerce_after_shop_loop_item' );
        remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar' );


        //Add Actions
        add_action( 'woocommerce_before_main_content', [ $this, 'before_main_content_open_tags' ] );
        add_action( 'woocommerce_after_main_content', [ $this, 'before_main_content_close_tags' ] );
        add_action( 'woocommerce_before_shop_loop', [ $this, 'before_shop_loop_open_tags' ] );
        add_action( 'woocommerce_after_shop_loop', [ $this, 'after_shop_loop_close_tags' ] );
        add_action( 'molla_woocommerce_sidebar', [ $this, 'molla_woocommerce_get_sidebar' ] );
        add_action( 'woocommerce_before_shop_loop_item_title', [ $this, 'molla_product_figure_template' ] );
        add_action( 'woocommerce_before_shop_loop_item_title', [ $this, 'molla_product_body_template' ] );
        add_action( 'pre_get_posts', [ $this, 'advanced_search_query' ], 1000 );


        //Add filters
        add_filter( 'woocommerce_show_page_title', '__return_false' );
        add_filter( 'woocommerce_pagination_args', [ $this, 'molla_shop_pagination' ], 1 );

    }

    public function advanced_search_query ( $query ) {
        if ( $query->is_search() ) {
            // category terms search.
            if ( isset( $_GET['category'] ) && ! empty( $_GET['category'] ) ) {
                $query->set(
                    'tax_query',
                    array(
                        array(
                            'taxonomy' => 'product_cat',
                            'field'    => 'slug',
                            'terms'    => array( $_GET['category']
                            )
                        )
                    )
                );
            }
        }
        return $query;
    }

    public function before_main_content_open_tags () {
        echo '<div class="container">';
    }

    public function before_main_content_close_tags () {
        echo '</div>';
    }

    public function before_shop_loop_open_tags () {
        $column = is_active_sidebar( 'shop-sidebar' ) ? 'col-md-9' : 'col-12';
        echo '<div class="row">';
        do_action( 'molla_woocommerce_sidebar' );
        echo '<div class="' . esc_attr( $column ) . '">';
    }

    public function after_shop_loop_close_tags () {
        echo '</div>';
        echo '</div>';
    }

    public function molla_product_figure_template () {
        global $product;
        ?>
        <figure class="product-media justify-content-center">
            <?php
            if ( $product->get_stock_status() != 'instock' ) {
                echo '<span class="product-label label-out">Out of Stock</span>';
            }
            if ( $product->get_sale_price() ) {
                echo '<span class="product-label label-sale">Sale</span>';
            }
            $newness_days = 30;
            $created      = strtotime( $product->get_date_created() );
            if ( ( time() - ( 60 * 60 * 24 * $newness_days ) ) < $created ) {
                echo '<span class="product-label label-new">New</span>';
            }
            ?>

            <a href="<?php the_permalink(); ?>">
                <img src="<?php the_post_thumbnail_url(); ?>" alt="Product image" class="product-image">
            </a>

            <div class="product-action-vertical">
                <a
                        href="?add_to_wishlist=<?php the_ID(); ?>"
                        class="btn-product-icon btn-wishlist btn-expandable add_to_wishlist"
                        data-title="Add to wishlist"
                        data-product-id="<?php the_ID(); ?>"
                        data-product-type="<?php echo $product->get_type(); ?>"
                        data-original-product-id="<?php the_ID(); ?>"
                        rel="nofollow"
                >

                    <i class="fa fa-heart"></i>
                    <span>add to wishlist</span>
                </a>
                <a href="<?php the_permalink(); ?>"
                   class="btn-product-icon" title="Quick view">
                    <i class="fa fa-eye"></i>
                    <span>Quick view</span>
                </a>
            </div><!-- End .product-action-vertical -->

            <div class="product-action">
                <a
                        href="?add-to-cart=<?php the_ID(); ?>"
                        class="btn-product btn-cart add_to_cart_button ajax_add_to_cart"
                        title="Add to cart"
                        data-quantity="1"
                        data-product_id="<?php the_ID(); ?>"
                        data-product-type="<?php echo $product->get_type(); ?>"
                        rel="nofollow"
                >
                    <span>add to cart</span>
                </a>
            </div><!-- End .product-action -->
        </figure>
        <?php
    }

    public function molla_product_body_template () {
        global $product;
        ?>
        <div class="product-body">
            <div class="product-cat text-center">
                <?php foreach ( get_the_terms( get_the_ID(), 'product_cat' ) as $item ) : ?>
                    <a href="<?php echo get_term_link( $item->term_id, 'product_cat' ) ?>">
                        <?php echo esc_html( $item->name ); ?>
                    </a>
                <?php endforeach; ?>
            </div><!-- End .product-cat -->
            <h3 class="product-title text-center">
                <a href="<?php the_permalink(); ?>">
                    <?php the_title(); ?>
                </a>
            </h3>
            <!-- End .product-title -->
            <div class="product-price text-center justify-content-center">
                <span class="new-price">
                    <?php
                    if ( function_exists( 'get_woocommerce_currency_symbol' ) ) {
                        echo get_woocommerce_currency_symbol();
                    } else {
                        echo '$';
                    }
                    echo esc_html( $product->get_price() );
                    ?>
                </span>
                <?php if ( $product->get_sale_price() ): ?>
                    <span class="old-price">
                    <?php
                    _e( 'Was ', 'molla-shop' );
                    if ( function_exists( 'get_woocommerce_currency_symbol' ) ) {
                        echo get_woocommerce_currency_symbol();
                    } else {
                        echo '$';
                    }
                    echo esc_html( $product->get_regular_price() );
                    ?>
                    </span>
                <?php endif; ?>
            </div><!-- End .product-price -->
            <div class="ratings-container  justify-content-center">
                <div class="ratings">
                    <div class="ratings-val" style="width: 100%;">
                        <img src="<?php echo THEME_URI . '/assets/img/rating.png'; ?>"
                             alt="">
                    </div>
                    <!-- End .ratings-val -->
                </div><!-- End .ratings -->
                <span class="ratings-text">
                    ( <?php echo esc_html( $product->get_review_count() ); ?> <?php _e( 'Reviews', 'molla-shop' ); ?> )
                </span>
            </div><!-- End .rating-container -->

        </div><!-- End .product-body -->

        <?php
    }

    public function molla_woocommerce_get_sidebar () {
        if ( is_active_sidebar( 'shop-sidebar' ) ):
            ?>
            <div class="col-md-3">
                <?php get_sidebar(); ?>
            </div>
        <?php
        endif;
    }

    public function molla_shop_pagination ( $args ) {
        $args['next_text'] = 'Next <i class="fa fa-long-arrow-right"></i>';
        $args['prev_text'] = '<i class="fa fa-long-arrow-left"></i> Prev';
        return $args;
    }

}