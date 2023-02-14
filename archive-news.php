<?php
    $www = get_stylesheet_directory_uri();
    get_header();
?>
<?php get_template_part( 'template-parts/page-title' ); ?>


<main>
    <section>
        <div class="container">
            <?php if ( have_posts() ) : ?>
                <div class="row  fade-item">
                    <?php while ( have_posts() ) : the_post(); ?>
                        <div class="col-lg-4">
                            <?php get_template_part( 'template-parts/loop','thumbnail' ); ?>
                        </div>
                    <?php endwhile; ?>
                </div>
            <?php else : ?>
                no post
            <?php endif; ?>
        </div>
        <?php dbd_pagination(); ?>
    </section>
</main>
<?php get_footer(); ?>
