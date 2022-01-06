    <!-- newsletter -->
    <div class="newsletter container-lg">

        <div class="row">

            <div class="col">

                <h2>Newsletter</h2>

            </div>

        </div>

        <div class="row">

            <div class="col">
                <h3>Fique por dentro das nossas novidades por e-mail.</h3>
            </div>

            <div class="col">
                <form action="" class="row row-cols-lg-auto g-3 align-items-center">
                    <div class="col-12">
                        <label for="email" class="visually-hidden">E-mail</label>
                        <input type="email" name="email" id="email" placeholder="Digite seu e-mail" class="form-control">
                    </div>
                    <div class="col-12">
                        <input type="button" value="Enviar" class="btn">
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

    <footer></footer>

    <?php wp_footer(); ?>

</body>
</html>