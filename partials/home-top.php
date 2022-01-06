<!-- news, top articles read -->
<div class="news-top-articles container">
    <div class="row">
        <div class="col">
            <h2>Mais Lidos</h2>
            <hr>
        </div>
    </div>
    <div class="row">

        <?php

        $popularpostbyview = array(
            'meta_key'  => 'wp_post_views_count', // set custom meta key
            'orderby'    => 'meta_value_num',
            'order'      => 'DESC',
            'posts_per_page' => 4
        );
        
        // Invoke the query
        $prime_posts = new WP_Query( $popularpostbyview );
        
        if ( $prime_posts->have_posts() ) :
            while ( $prime_posts->have_posts() ) : $prime_posts->the_post();
        ?>
        <div class="col-lg-4 col-sm-6 col-12 featured-article-image">

            <div class="content" style="background-image: url('<?php the_post_thumbnail_url(); ?>'); background-size: cover;">

                <?php $categories = get_the_category();
    
                if ( ! empty( $categories ) ) {
                ?>
                <h4><?php echo esc_html( $categories[0]->name ); ?></h4>
                <?php } ?>

                <h3><a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>

                <ul class="meta nav">
                    <li class="author">Por <?php the_author(); ?></li>
                    <li><?php the_date(); ?></li>
                </ul>

            </div>

        </div>
        <?php
            endwhile;
            wp_reset_postdata();
        endif;
        ?>

    </div>
</div>