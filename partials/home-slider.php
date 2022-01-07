<!-- full width slider -->
<div class="full-width-slider container-fluid">

    <div class="swiper">
    <!-- Additional required wrapper -->
    <div class="swiper-wrapper">
        <!-- Slides -->
        <?php if( have_rows('slider', 'option')): ?>
            <ul>
                <?php while ( have_rows('slider', 'option')) : the_row(); ?>
                <?php // set up post object
                    $post_object = get_sub_field('slidepost');
                    if( $post_object ) :
                    $post = $post_object;
                    setup_postdata($post);
                ?>
                <div class="swiper-slide" style="background-image: url('<?php the_post_thumbnail_url(); ?>'); background-size: cover;">
                <?php $categories = get_the_category();

                if ( ! empty( $categories ) ) {
                ?>
                <h2><?php echo esc_html( $categories[0]->name ); ?></h2>
                <?php } ?>
                    <div class="content-slide">
                        <h3><a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
                        <ul class="meta nav">
                            <li class="author">Por <?php the_author(); ?></li>
                            <li><?php the_date(); ?></li>
                        </ul>
                        <a href="" class="btn">Confira</a>
                    </div>
                </div>
                <?php
                wp_reset_postdata();
                endif;
                endwhile;       
                ?>
            </ul>
        <?php endif; ?>
    </div>
    <!-- If we need pagination -->
    <div class="swiper-pagination"></div>
    </div>
    
</div>