<!-- banner home -->
<div class="banner-home container">
    <div class="row">
        <div class="col">
            <?php if ( have_rows( 'banner_home' ) ) : ?>
                <?php while ( have_rows( 'banner_home' ) ) : the_row(); ?>
                    <?php if ( get_sub_field( 'image' ) ) : ?>
                        <img src="<?php the_sub_field( 'image' ); ?>" class="img-fluid" />
                    <?php endif ?>
                    <?php the_sub_field( 'link' ); ?>
                <?php endwhile; ?>
            <?php endif; ?>
        </div>
    </div>
</div>