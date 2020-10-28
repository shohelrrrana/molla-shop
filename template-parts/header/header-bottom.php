<?php
/**
 * Template Part of header
 *
 * @package molla-shop
 * */
$ex_term    = get_term_by( 'slug', 'uncategorized', 'product_cat' );
$categories = get_terms( [
    'taxonomy'   => 'product_cat',
    'number'     => 12,
    'exclude'    => array( $ex_term->term_id ),
] );
?>
<div class="header-bottom sticky-header">
    <div class="container">
        <div class="header-left">
            <?php if(is_front_page()): ?>
            <div class="dropdown category-dropdown is-on <?php echo is_front_page() ? 'show' : ''; ?>"
                 data-visible="true">
                <a href="#" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true"
                   aria-expanded="true" data-display="static" title="Browse Categories">
                    Browse Categories
                </a>

                <div class="dropdown-menu <?php echo is_front_page() ? 'show' : ''; ?>">
                    <nav class="side-nav">
                        <ul class="menu-vertical sf-arrows">
                            <?php foreach ( $categories as $category ) : ?>
                                <li>
                                    <a href="<?php echo get_term_link( $category->term_id ); ?>">
                                        <?php echo esc_html( $category->name ) ?>
                                    </a>
                                </li>
                            <?php endforeach; ?>
                        </ul><!-- End .menu-vertical -->
                    </nav><!-- End .side-nav -->
                </div><!-- End .dropdown-menu -->
                
                
            </div><!-- End .category-dropdown -->
            <?php endif; ?>
        </div><!-- End .col-lg-3 -->
        <div class="header-center">
            <nav class="main-nav">
                <?php
                if ( has_nav_menu( 'primary-menu' ) ) {
                    wp_nav_menu( [
                        'location'   => 'primary-menu',
                        'menu_class' => 'menu sf-arrows',
                    ] );
                }
                ?>
            </nav><!-- End .main-nav -->
        </div><!-- End .col-lg-9 -->
        <div class="header-right">
            <i class="la la-lightbulb-o"></i>
            <p>Clearance Up to 30% Off</span></p>
        </div>
    </div><!-- End .container -->
</div><!-- End .header-bottom -->