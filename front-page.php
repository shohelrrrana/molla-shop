<?php
/**
 * The front page template file
 *
 * @package molla-shop
 */
get_header();
?>

<main class="main">

    <?php
    get_template_part( '/template-parts/front-page/home-slider' );
    get_template_part( '/template-parts/front-page/popular-categories' );
    get_template_part( '/template-parts/front-page/offers' );
    get_template_part( '/template-parts/front-page/sale-products' );
    get_template_part( '/template-parts/front-page/product-by-category' );
    get_template_part( '/template-parts/front-page/subscribe' );
    get_template_part( '/template-parts/front-page/blog' );
    ?>

</main>


<?php get_footer(); ?>
