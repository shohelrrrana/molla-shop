<?php
    /**
     * Template for entry Footer
     *
     * @package molla-shop
     */
    if(is_single() || ! is_home()){
        return;
    }
?>
<div class="entry-footer mb-3">
    <a href="<?php echo get_the_permalink(); ?>" class="readmore btn btn-sm btn-light my-3">
        <?php _e('Read More', 'molla-shop'); ?>
    </a>
</div>