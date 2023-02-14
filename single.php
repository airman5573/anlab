<?php
    $www = get_stylesheet_directory_uri();
    get_header();
?>

<?php get_template_part( 'template-parts/page-title' ); ?>

<main class="post">
    <section >
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <?php if ( have_posts() ) : ?>
                    <?php while ( have_posts() ) :the_post(); ?>
                        
                        <div class="content-area">
                            <div class="content">
                                <h3 class="title">
                                    <?php the_title(); ?>
                                </h3>
                                <?php the_content(); ?>
                            </div>


                            




                            <?php  $projects = get_field('member_relation'); ?>
                            <?php if( $projects ): ?>
                            <div class="member-area">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <h4 class="lg title">담당 변호사</h4>
                                    </div>
                                </div>
                                <div class="row">
                                    <?php foreach( $projects as $project ): ?>
                                        <div class="col-lg-3 col-6">
                                            <a class="loop loop-member-sm"  href="<?php the_permalink($project->ID);?>">
                                                <div class="image">
                                                    <img src="<?php the_field('image_rect', $project->ID) ?>" alt="">
                                                    
                                                    <!-- <?php if(get_the_post_thumbnail($project->ID)): ?>
                                                        <?php echo get_the_post_thumbnail($project->ID); ?>
                                                    <?php else: ?>
                                                        <img src="http://via.placeholder.com/800x600/ ">
                                                    <?php endif; ?> -->
                                                </div>
                                                <div class="desc">
                                                    <h5>
                                                        <?php echo get_the_title($project->ID); ?> 
                                                        <?php 
                                                            $postType = get_post_type_object(get_post_type($project->ID));
                                                            if ($postType) {
                                                                echo esc_html($postType->labels->singular_name);
                                                            }
                                                        ?>
                                                    </h5>

                                                </div>
                                            </a>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div><!--member-->
                            <?php endif; ?>



                        </div>
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
