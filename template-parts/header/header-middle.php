<?php
/**
 * Template Part For Header
 *
 * @package molla-shop
 * */
$ex_term    = get_term_by( 'slug', 'uncategorized', 'product_cat' );
$categories = get_terms( [
    'taxonomy' => 'product_cat',
    'number'   => 99,
    'exclude'  => array( $ex_term->term_id ),
] );
global $woocommerce;
?>
<div class="header-middle">
    <div class="container">
        <div class="header-left">
            <button class="mobile-menu-toggler">
                <span class="sr-only">Toggle mobile menu</span>
                <i class="icon-bars"></i>
            </button>
            <?php the_custom_logo(); ?>
        </div><!-- End .header-left -->

        <div class="header-center">
            <div class="header-search header-search-extended header-search-visible header-search-no-radius d-none d-lg-block">
                <a href="#" class="search-toggle" role="button"><i class="icon-search"></i></a>
                <form action="<?php echo site_url(); ?>" method="get">
                    <div class="header-search-wrapper search-wrapper-wide">
                        <div class="select-custom">
                            <select id="category" name="category">
                                <option value="">All Departments</option>
                                <?php foreach ( $categories as $category ) : ?>
                                    <option value="<?php echo esc_attr( $category->slug ); ?>" <?php echo isset( $_GET['category'] ) && $_GET['category'] == $category->slug ? 'selected' : ''; ?>>
                                        <?php echo esc_html( $category->name ); ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div><!-- End .select-custom -->
                        <label for="s" class="sr-only">Search</label>
                        <input type="search" class="form-control" name="s" id="s"
                               value="<?php echo isset( $_GET['s'] ) ? $_GET['s'] : ''; ?>"
                               placeholder="Search product ..."
                               required>
                        <input type="hidden" name="post_type" value="product">
                        <button class="btn btn-primary" type="submit"><i class="fa fa-search"></i></button>
                    </div><!-- End .header-search-wrapper -->
                </form>
            </div><!-- End .header-search -->
        </div>

        <div class="header-right">
            <div class="header-dropdown-link">

                <a href="<?php echo get_page_link( get_page_by_title( 'Wishlist' ) ); ?>" class="wishlist-link">
                    <i class="fa fa-heart-o"></i>
                    <span class="wishlist-count">
                        <?php
                        if ( function_exists( 'yith_wcwl_count_products' ) ) {
                            echo yith_wcwl_count_products();
                        }
                        ?>
                    </span>
                    <span class="wishlist-txt">Wishlist</span>
                </a>

                <div class="dropdown cart-dropdown">
                    <a href="<?php echo get_page_link( get_page_by_title( 'Cart' ) ); ?>" class="dropdown-toggle"
                       role="button"
                       data-toggle="dropdown" aria-haspopup="true"
                       aria-expanded="false" data-display="static">
                        <i class="fa fa-cart-plus" aria-hidden="true"></i>
                        <span class="cart-count">
                            <?php
                            echo esc_html( $woocommerce->cart->cart_contents_count );
                            ?>
                        </span>
                        <span class="cart-txt">Cart</span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right">
                        <div class="dropdown-cart-products">

                            <?php
                            if ( ! empty( $woocommerce->cart->get_cart() ) ):
                                foreach ( $woocommerce->cart->get_cart() as $cart ) :
                                    $product = $cart['data'];
                                    $quantity = $cart['quantity'];
                                    $product_image = wp_get_attachment_image_url( get_post_thumbnail_id( $product->get_id() ), 'thumbnail' );
                                    ?>
                                    <div class="product">
                                        <div class="product-cart-details">
                                            <h4 class="product-title">
                                                <a href="<?php echo esc_url( get_page_link( $product->get_id() ) ); ?>">
                                                    <?php echo esc_html( $product->get_title() ); ?>
                                                </a>
                                            </h4>

                                            <span class="cart-product-info">
                                            <span class="cart-product-qty">
                                                <?php echo esc_html( $quantity ); ?>
                                            </span>
                                            x <?php echo wp_kses_post( $product->get_price_html() ); ?>
                                        </span>
                                        </div><!-- End .product-cart-details -->

                                        <figure class="product-image-container">
                                            <a href="<?php echo get_permalink( $product ); ?>" class="product-image">
                                                <img src="<?php echo esc_url( $product_image ); ?>"
                                                     alt="product">
                                            </a>
                                        </figure>
                                        <!--                                    <a href="#" class="btn-remove" title="Remove Product"><i-->
                                        <!--                                                class="fa fa-close"></i></a>-->
                                    </div><!-- End .product -->
                                <?php
                                endforeach;
                            endif;
                            ?>


                            <div class="dropdown-cart-total">
                                <span>Total</span>

                                <span class="cart-total-price">
                                    <?php
                                    if ( function_exists( 'wc_cart_totals_subtotal_html' ) ) {
                                        echo wc_cart_totals_subtotal_html();
                                    }
                                    ?>
                                </span>
                            </div><!-- End .dropdown-cart-total -->

                            <div class="dropdown-cart-action">
                                <a href="<?php echo get_page_link( get_page_by_title( 'Cart' ) ); ?>"
                                   class="btn btn-primary">View Cart</a>
                                <a href="<?php echo get_page_link( get_page_by_title( 'Checkout' ) ); ?>"
                                   class="btn btn-outline-primary-2">
                                    <span>Checkout</span>
                                    <i class="fa fa-long-arrow-right"></i></a>
                            </div><!-- End .dropdown-cart-total -->
                        </div><!-- End .dropdown-menu -->
                    </div><!-- End .cart-dropdown -->
                </div>
            </div><!-- End .header-right -->
        </div><!-- End .container -->
    </div><!-- End .header-middle -->