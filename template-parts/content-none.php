<?php
    /**
     * The Content None File
     *
     * @package molla-shop
     */
?>
<section class="no-result not-found">
    <header class="page-header">
        <h1 class="page-title"><?php echo esc_html( 'Nothing Found', 'molla-shop' )?></h1>
    </header>
    <div class="page-content">
        <?php
            if ( is_home() && current_user_can( 'publish_posts' ) ) {
            printf( wp_kses_post( 'Ready to publish your first post? <a href="%s">Get started</a>', 'molla-shop' ), esc_url(admin_url( 'post-new.php' )) );
            }elseif(is_search()){
                echo esc_html('Sorry! Nothing match item on your search keyword. Please try again with different keyword', 'molla-shop');
            }else{
                echo esc_html( 'Sorry! cannot find what you are looking.', 'molla-shop' );
            }
        ?>
    </div>
</section>