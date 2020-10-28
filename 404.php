<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package molla-shop
 */

get_header();
?>

<main id="primary" class="site-main">
    <section class="error-404 not-found">
        <div class="container">
            <header class="page-header">
                <h1 class="page-title">
                    <?php _e( 'Oops! That page cannot be found.', 'molla-shop' ); ?>
                </h1>
            </header>
        </div>
    </section>
</main>

<?php
get_footer();
