<?php
/**
 * Template Name: About
 * Template Post Type: post, page
 */
$www = get_stylesheet_directory_uri();
get_header(); 
?>

<div class="page-header">
    <div class="container">
        <div class="page-title  fade-item">
            <div class="inner">
                <h1>업무사례</h1>
                <div class="taxonomy-title">
                        <?php $term = get_queried_object(); ?>
        

                        <h3 class="font-weight-light"><?php the_field('copy01', $term ) ?></h3>
                        <?php if(get_field('copy02',$term)): ?>
                            <h4 class="serif lg"><?php the_field('copy02', $term ) ?></h4>
                        <?php endif; ?>
        
                </div>
            </div>
        </div>
    </div>
    <div class="bg-media">
        <img src="<?php the_field('page-header-bg-about','option') ?>" alt="">
    </div>
</div> 

<?php get_footer(); ?>
