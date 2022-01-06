<!-- news, first part -->
<div class="news-featured container">

    <div class="row">

        <div class="col">
            <h2>Novidades</h2>
            <hr>
        </div>

    </div>

    <div class="row news-featured-articles">

        <?php
            if( have_rows('featured_posts') ):
                while( have_rows('featured_posts') ) : the_row();
                $featured_posts = get_sub_field('postagem');
                $class = get_sub_field('formato_de_exibicao');
                if( $posts ):
                    $permalink = get_permalink( $featured_post->ID );
                    $title = get_the_title( $featured_post->ID );
                    $summary = get_field( 'field_name', $featured_post->ID );
        ?>
        <div class="col-lg-4 col-sm-6 col-12 featured-article-<?php echo esc_html( $class ); ?>">

            <img src="<?php echo get_template_directory_uri() ?>/img/featured-image-1.png" class="img-fluid" alt="">
            
            <h4>Casamento</h4>

            <h3><a href="<?php echo esc_url( $permalink ); ?>"><?php echo esc_html( $title ); ?></a></h3>

            <ul class="meta nav">
                <li class="author">Por Camicado</li>
                <li>06. Setembro</li>
            </ul>

            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit ut aliquam, purus sit amet luctus venenatis, lectus magna fringilla urna, porttitor rhoncus dolor purus non enim</p>
        
        </div>
        <?php
            endif;
            endwhile;
            else :
        ?>
        <div class="col featured-article-full">
            <h4>Nenhum artigo encontrado!</h4>
        </div>
        <?php endif; ?>

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

    </div>

</div>