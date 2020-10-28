<div class="blog-posts bg-light pt-4 pb-7">
    <div class="container">
        <h2 class="title">
            <?php _e( 'From Our Blog', 'molla-shop' ) ?>
        </h2><!-- End .title-lg text-center -->

        <div class="owl-carousel owl-simple" data-toggle="owl"
             data-owl-options='{
                            "nav": false,
                            "dots": true,
                            "items": 3,
                            "margin": 20,
                            "loop": false,
                            "responsive": {
                                "0": {
                                    "items":1
                                },
                                "600": {
                                    "items":2
                                },
                                "992": {
                                    "items":3
                                },
                                "1280": {
                                    "items":4,
                                    "nav": true,
                                    "dots": false
                                }
                            }
                        }'>

            <?php
            $posts = get_posts( [
                'numberposts' => 20,
            ] );
            foreach ( $posts as $post ):
                ?>

                <article class="entry">
                    <figure class="entry-media">
                        <a href="<?php the_permalink(); ?>">
                            <?php the_post_thumbnail(); ?>
                        </a>
                    </figure><!-- End .entry-media -->

                    <div class="entry-body">
                        <div class="entry-meta">
                            <a href="#">Nov 22, 2018</a>, 0 Comments
                        </div><!-- End .entry-meta -->

                        <h3 class="entry-title">
                            <a href="<?php the_permalink(); ?>">
                                <?php the_title(); ?>
                            </a>
                        </h3><!-- End .entry-title -->

                        <div class="entry-content">
                            <p>
                                <?php the_excerpt(); ?>
                            </p>
                            <a href="<?php the_permalink(); ?>" class="read-more">
                                Read More
                            </a>
                        </div><!-- End .entry-content -->
                    </div><!-- End .entry-body -->
                </article><!-- End .entry -->
            <?php endforeach; ?>


        </div><!-- End .owl-carousel -->
    </div><!-- End .container -->
</div><!-- End .blog-posts -->