<?php
    $www = get_stylesheet_directory_uri();
    get_header();
?>

<script>
    (function ($) {
        $('header.site-header').removeClass('text-light');
        $('header.site-header').addClass('text-dark');
    })(jQuery);
</script>



<main>
    <section class="detail-member">
        <div class="container">
            <div class="row fade-item" style="background-image:url('<?php the_field('image_bg') ?>')">
                <div class="col-lg-5 offset-lg-1">
                    <div class="desc">
                        <div class="inner">
                            <div class="mobile-only profile">
                                <img src="<?php the_field('image_bg'); ?>" alt="">
                            </div>


                            <h3 class="title">
                     
                                <?php the_title(); ?>  <?php the_field('job'); ?>  
                          
                            </h3>
                            <div class="job">
                                <h4 >
                                    <?php the_field('slogan') ?> 
                                </h4>
                            </div>
                            <!--<div class="slogan">

                                <h4 class="lg serif">
                                    <?php the_field('slogan_alt') ?>
                                </h4>
                            </div> -->
                            <div class="info">
                                <div class="career font-weight-light">
                                    <?php the_field('career') ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <a id="btn-godown" class="btn scrollTo" href="#case">
                <img src="<?php echo $www; ?>/images/ic_arrow_bottom.svg">
            </a>

        </div>
    </section>

	<section class="case" id="case"><!--수정사항 (새로 생성) 시작-->
        <div class="container">
			<div class="row section__title  fade-item">
                <div class="col-lg-12">
                    <h3 class="sm">업무사례</h3>
                </div>
            </div>
			
			<?=do_shortcode('[kboard id=4]');?>
		</div>
	</section><!--수정사항 (새로 생성) 끝-->


    <script>
    (function ($) {
        $('#carouselCase .carousel-item:first-child').addClass('active');
    })(jQuery);
    </script>
</main>

<?php get_footer(); ?>
