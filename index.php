<?php
    $www = get_stylesheet_directory_uri();
    get_header();
?>

<div class="page-header" >
    <div class="container">
        <div class="page-title  fade-item">
            <div class="inner">
                <h1><?php the_title(); ?></h1>
            </div>
        </div> 
    </div>

    <div class="bg-media">
        <img src="<?php the_field('page-header-bg-about','option') ?>" alt="">
    </div>
</div>


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
