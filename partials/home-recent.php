<!-- news, second part -->
<div class="news-recent-posts container">
    <div class="row">

        <div class="col-lg-4 col-sm-6 col-12 featured-article-image">

            <div class="content" style="background-image: url('<?php echo get_template_directory_uri() ?>/img/featured-image-2.png'); background-size: cover;">

                <h4>Inspire-se</h4>

                <h3><a href="">Lorem ipsum dolor sit amet consect</a></h3>

                <ul class="meta nav">
                    <li class="author">Por Camicado</li>
                    <li>06. Setembro</li>
                </ul>

            </div>

        </div>

        <div class="col-lg-4 col-sm-6 col-12 featured-article-full">

            <img src="<?php echo get_template_directory_uri() ?>/img/featured-image-1.png"  class="img-fluid" alt="">
            
            <h4>Casamento</h4>

            <h3><a href="">Lorem ipsum dolor sit amet consect</a></h3>
            
            <ul class="meta nav">
                <li class="author">Por Camicado</li>
                <li>06. Setembro</li>
            </ul>

            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit ut aliquam, purus sit amet luctus venenatis, lectus magna fringilla urna, porttitor rhoncus dolor purus non enim</p>
        
        </div>

        <div class="col-lg-4 col-sm-6 col-12 featured-article-image">

            <div class="content" style="background-image: url('<?php echo get_template_directory_uri() ?>/img/featured-image-2.png'); background-size: cover;">

                <h4>Inspire-se</h4>

                <h3><a href="">Lorem ipsum dolor sit amet consect</a></h3>

                <ul class="meta nav">
                    <li class="author">Por Camicado</li>
                    <li>06. Setembro</li>
                </ul>

            </div>

        </div>

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
