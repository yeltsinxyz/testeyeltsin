<!-- news, second part -->
<div class="news-recent-posts container">
    <div class="row">

    <?php if( have_rows('destaques_linha', 'option')): ?>
            <?php while ( have_rows('destaques_linha', 'option')) : the_row(); ?>
            <?php // set up post object
                $post_object = get_sub_field('destaques_artigo');
                if( $post_object ) :
                $post = $post_object;
                setup_postdata($post);
            ?>
            <?php
                if( get_field('formato_do_post') == 'full' ) {
            ?>
            <div class="col-lg-4 col-sm-6 col-12 featured-article-full">

            <img src="<?php echo get_template_directory_uri() ?>/img/featured-image-1.png" class="img-fluid" alt="">

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

            <?php the_excerpt(); ?>

            </div>
            <?php } ?>
            <?php
                if( get_field('formato_do_post') == 'image' ) {
            ?>
            <div class="col-lg-4 col-sm-6 col-12 featured-article-image">

                <div class="content" style="background-image: url('<?php echo get_template_directory_uri() ?>/img/featured-image-2.png'); background-size: cover;">

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
            <?php } ?>
            <?php
            wp_reset_postdata();
            endif;
            endwhile;       
            ?>
        <?php endif; ?>

        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <div class="col-lg-4 col-sm-6 col-12 featured-article-full">

            <?php the_post_thumbnail( array( 360, 265 ), array ( 'class'  =>  'img-fluid' ) ); ?>
            
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

            <?php the_excerpt(); ?>
        
        </div>
        <?php endwhile; else : ?>
            <div class="col-12 featured-article full">
                <p>Nenhum artigo encontrado</p>
            </div>
        <?php endif; ?>

    </div>
</div>
