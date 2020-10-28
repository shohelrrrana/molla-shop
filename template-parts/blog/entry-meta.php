<?php
    /**
     * Template for entry Meta
     *
     * @package molla-shop
     */
    $post_terms = wp_get_post_terms( get_the_ID(), ['category'] );
?>
<div class="entry-meta mb-4 mt-4">
    <i class="fa fa-clock"></i>
    <span><?php _e( 'Posted on: ' );?></span>
    <time class="entry-time">
        <a href="<?php echo get_the_permalink(); ?>">
            <?php echo get_the_date( 'dS M Y' ); ?>
        </a>
    </time>
    &nbsp;
    <span>
        <i class="fa fa-user"></i>
    <?php _e( 'By ' );?>
        <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ) ?>">
            <?php echo get_the_author_meta( 'display_name' ) ?>
        </a>
    </span>

    <br>

    <span>
        <i class="fa fa-folder"></i>
    <?php
        if ( !empty( $post_terms ) ):
            foreach ( $post_terms as $key => $post_term ):
        ?>
            <a href="<?php echo get_term_link( $post_term ); ?>">
                <?php echo esc_html( $post_term->name ); ?> ,
            </a>
        <?php
            endforeach;
            endif;
        ?>
    </span>

</div>