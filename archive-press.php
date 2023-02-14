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
                            <a class="loop loop-thumbnail"  href="<?php the_permalink();?>">
                                <div class="image">
                                    <?php if(get_the_post_thumbnail()): ?>
                                        <?php echo get_the_post_thumbnail(); ?>
                                    <?php else: ?>
                                        <img src="http://via.placeholder.com/800x600/ ">
                                    <?php endif; ?>
                                </div>
                                <div class="desc">
                                    <h6>
                                        <?php 
                                            $terms = get_the_terms( $post->ID, 'press_category' );
                                            if ( !empty( $terms ) ){
                                                // get the first term
                                                $term = array_shift( $terms );
                                                echo $term->name;
                                            }
                                        ?>
                                    </h6>
                                    <h4>
                                        <?php the_title(); ?>
                                    </h4>
                                    <p class="date">
                                        <?php echo get_the_date('Y.m.d') ?>
                                    </p>
                                </div>
                            </a>
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
