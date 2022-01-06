    <!-- newsletter -->
    <div class="newsletter container-lg">

        <div class="row">

            <div class="col">

                <h2>Newsletter</h2>
                <hr>

            </div>

        </div>

        <div class="row">

            <div class="col-4">
                <h3>Fique por dentro das nossas novidades por e-mail.</h3>
            </div>

            <div class="col-8">
                <form action="" class="row row-cols-lg-auto g-3 align-items-center">
                    <div class="col-auto">
                        <label for="email" class="visually-hidden">E-mail</label>
                        <input type="email" name="email" id="email" placeholder="Digite seu e-mail" class="form-control form-control-lg">
                    </div>
                    <div class="col-auto">
                        <input type="button" value="Enviar" class="btn btn-lg">
                    </div>
                </form>
            </div>

        </div>

    </div>

    <!-- blog description -->
    <div class="news-blog-description container">
        <div class="row">
            <div class="col-2">
                <h3><?php the_field('content_title', 'option'); ?></h3>
            </div>
            <div class="col">
                <p><?php the_field('content_text', 'option'); ?></p>
            </div>
        </div>
    </div>

    <footer class="footer-site container-fluid">

        <div class="row">

            <div class="col-8">
                <ul class="nav menuFooter">
                    <?php 
                    wp_nav_menu(array(
                        'menu'           => 'footer',
                        'items_wrap' => '%3$s',
                        'container' => false
                    ));
                    ?>
                </ul>
            </div>

            <div class="col-4">
                <ul class="nav social justify-content-end">
                    <li><a href="<?php the_field('facebook', 'option'); ?>"><i class="fab fa-facebook-f"></i></a></li>
                    <li><a href="<?php the_field('instagram', 'option'); ?>"><i class="fab fa-instagram"></i></a></li>
                    <li><a href="<?php the_field('twitter', 'option'); ?>"><i class="fab fa-twitter"></i></a></li>
                </ul>
            </div>

        </div>

        <div class="row">

            <div class="col copyright">
                Powered by Agência Especializada em SEO
            </div>

        </div>

    </footer>

    <?php wp_footer(); ?>

</body>
</html>