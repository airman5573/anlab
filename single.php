<?php
    $www = get_stylesheet_directory_uri();
    get_header();
?>

<?php get_template_part( 'template-parts/page-header', 'title' ); ?> 
<?php get_template_part( 'template-parts/page-header', 'nav' ); ?> 

<main>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <?php if ( have_posts() ) : ?>
                    <?php while ( have_posts() ) :the_post(); ?>
                        <?php the_content(); ?>
    
                    <?php endwhile; ?>
                    <?php else : ?>
                    no post
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>
