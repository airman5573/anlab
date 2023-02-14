<?php
    $www = get_stylesheet_directory_uri();
    get_header();
?>
<?php get_template_part( 'template-parts/page-title' ); ?>

<!--<?php echo do_shortcode('[kboard id=2]');?>
<main>
<?php get_template_part( 'template-parts/nav-page' ); ?>
    <section class="bg-light section-case">

        <div class="container">
            <?php if ( have_posts() ) : ?>
                <div class="row mb-5">
                    <div class="col-lg-12">
                        <?php if( have_rows('case_keyword_big', 'options') ): ?>
                            <div class="keyword keyword_big"> 
                            <?php while( have_rows('case_keyword_big', 'options') ): the_row(); ?>
                                    <a href="<?php the_sub_field('url') ?>">
                                    #<?php the_sub_field('title'); ?> 
                                    </a>
                            <?php endwhile; ?>
                            </div>
                        <?php endif; ?>
                        <div class="search-form">
                            <form role="search" class="input-txt" action="<?php echo site_url('/'); ?>" method="get" id="searchform">
                                <input type="text" name="s" placeholder="해피엔딩, 사례 검색"/>
                                <input type="hidden" value="case" name="post_type" />
                                <button type="submit" id="searchsubmit">
                                    <i class="fa fa-search"></i> 
                                </button>
                            </form>
                        </div> 
                        <?php if( have_rows('case_keyword', 'options') ): ?>
                            <div class="keyword"> 
                            <?php while( have_rows('case_keyword', 'options') ): the_row(); ?>
                                    <a href="<?php the_sub_field('url') ?>">
                                    #<?php the_sub_field('title'); ?> 
                                    </a>
                            <?php endwhile; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="row">
                    <?php while ( have_posts() ) : the_post(); ?>
                        <div class="col-lg-3">
                            <?php get_template_part( 'template-parts/loop','case' ); ?>
                        </div>
                    <?php endwhile; ?>
                </div>
            <?php else : ?>
                no post
            <?php endif; ?>
        </div>
        <?php dbd_pagination(); ?>
    </section>
</main>-->

<?php get_footer(); ?>
