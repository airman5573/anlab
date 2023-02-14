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
                <h1>법무법인 에이앤랩</h1>
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
<main>
    <section class="pb-4">
        <div class="container">
            <div class="row  fade-item">
                <div class="col-lg-6">
                    <div class="pr-4 pt-5">
                        <h3 class="sm mt-0"><?php the_field('title01') ?></h3>
                        <div class="pb-3"></div>
                        <p class="lead lh-200">
                            <?php the_field('desc01') ?>
                        </p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <img src="<?php the_field('image01') ?>">
                </div>

            </div>
        </div>
    </section>

    <section class="pb-4" >
        <div class="container">
            <div class="row  fade-item">
                <div class="col-lg-6 order-lg-2">
                    <div class="pt-4 pl-4">
                        <h3 class="sm mt-0"><?php the_field('title02') ?></h3>
                        <div class="pb-3"></div>
                        <p class="lead lh-200">
                        <?php the_field('desc02') ?>
                        </p>
                    </div>
                </div>
                <div class="col-lg-6 order-lg-1">
                    <img src="<?php the_field('image02') ?>">
                </div>

            </div>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="row  fade-item">
                <div class="col-lg-6">
                    <div class="pr-4 pt-4">
                        <h3 class="sm mt-0"><?php the_field('title03') ?></h3>
                        <div class="pb-3"></div>
                        <p class="lead lh-200">
                        <?php the_field('desc03') ?>
                        </p>
                        <!-- <div class="mt-4 desktop-only"></div>
                        <h3 class="text-left desktop-only"> 
                            <img src="<?php echo $www; ?>/images/logo-dark.svg" style="width:150px;">
                        </h3> -->
                    </div>
                </div>
                <div class="col-lg-6">
                    <img src="<?php the_field('image03') ?>">
                </div>

            </div>
        </div>
    </section>
	
    <section class="pb-4" >
        <div class="container">
            <div class="row  fade-item">
                <div class="col-lg-6 order-lg-2">
                    <div class="pt-4 pl-4">
                        <h3 class="sm mt-0"><?php the_field('title04') ?></h3>
                        <div class="pb-3"></div>
                        <p class="lead lh-200">
                        <?php the_field('desc04') ?>
                        </p>
                    </div>
                </div>
                <div class="col-lg-6 order-lg-1">
                    <img src="http://3.37.8.144/wp-content/uploads/2021/08/4.jpg">
                </div>

            </div>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="row  fade-item">
                <div class="col-lg-6">
                    <div class="pr-4 pt-4">
                        <h3 class="sm mt-0"><?php the_field('title05') ?></h3>
                        <div class="pb-3"></div>
                        <p class="lead lh-200">
                        <?php the_field('desc05') ?>
                        </p>
                        <!-- <div class="mt-4 desktop-only"></div>
                        <h3 class="text-left desktop-only"> 
                            <img src="<?php echo $www; ?>/images/logo-dark.svg" style="width:150px;">
                        </h3> -->
                    </div>
                </div>
                <div class="col-lg-6">
                    <img src="http://3.37.8.144/wp-content/uploads/2021/08/5.png">
                </div>

            </div>
        </div>
    </section>	

</main>
<?php get_footer(); ?>
