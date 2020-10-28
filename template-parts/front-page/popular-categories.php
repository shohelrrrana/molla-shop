<?php
/**
 * Template Part For front page
 *
 * @package molla-shop
 * */

$section                   = get_option( 'front_page_popular_categories_section', [] );
$section_heading           = $section['section_heading'] ?? '';
$show_number_of_categories = $section['show_number_of_categories'] ?? 6;
$show_number_of_columns    = $section['show_number_of_columns'] ?? 2;
$ex_term                   = get_term_by( 'slug', 'uncategorized', 'product_cat' );
$categories                = get_terms( [
    'taxonomy'   => 'product_cat',
    'number'     => $show_number_of_categories,
    'exclude'    => array( $ex_term->term_id ),
] );
?>
<div id="popular_categories" class="container">
    <h2 class="title text-center mb-2 section_heading">
        <?php echo esc_html($section_heading); ?>
    </h2>

    <div class="cat-blocks-container">
        <div class="row">

            <?php
            foreach ( $categories as $category ) :
                $thumbnail_id = get_term_meta( $category->term_id, 'thumbnail_id', true );
                $thumbnail_url = wp_get_attachment_image_url( $thumbnail_id );
                ?>
                <div class="col-6 col-sm-4 col-lg-<?php echo esc_attr($show_number_of_columns); ?>">
                    <a href="<?php echo get_term_link( $category->term_id ); ?>" class="cat-block">
                        <figure>
                            <span>
                                <img src="<?php echo esc_url( $thumbnail_url ); ?>"
                                     alt="Category image">
                            </span>
                        </figure>

                        <h3 class="cat-block-title">
                            <?php echo esc_html( $category->name ); ?>
                        </h3>
                    </a>
                </div>
            <?php
            endforeach;
            ?>

        </div><!-- End .row -->
    </div><!-- End .cat-blocks-container -->
</div><!-- End .container -->

<div class="mb-2"></div><!-- End .mb-2 -->