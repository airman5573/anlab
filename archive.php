<?php
    $www = get_stylesheet_directory_uri();
    get_header();
?>
<?php get_template_part( 'template-parts/page-header', 'title' ); ?> 
<?php get_template_part( 'template-parts/page-header', 'nav' ); ?> 
<main >
    <section class="pt-5">
        <div class="container">
            <div class="row">
                <?php if ( have_posts() ) : ?>
                    <?php while ( have_posts() ) : the_post(); ?>
                        <div class="col-md-12">
                            <div class="loop-news">
                                <h5><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h5>
                                <span class="date">
                                    <?php the_date('Y.m.d') ?>
                                </span>
                            </div>
                        </div>
                    <?php endwhile; ?>
                <?php else : ?>
                    no post
                <?php endif; ?>
            </div>
        </div>
    </section>
</main>


<?php get_footer(); ?>
