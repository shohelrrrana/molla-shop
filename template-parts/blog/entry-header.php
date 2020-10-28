<?php
/**
 * Template for entry header
 *
 * @package molla-shop
 */
?>
<header class="entry-header mb-3">
    <?php if(has_post_thumbnail()): ?>
        <div class="entry-image mb-3">
            <a href="<?php echo get_the_permalink(); ?>">
                <?php the_post_thumbnail( 'medium' );?>
            </a>
        </div>
    <?php endif; ?>
    <h4 class="entry-title">
        <a href="<?php echo get_the_permalink(); ?>"> 
            <?php the_title(); ?> 
        </a>
    </h4>
</header>