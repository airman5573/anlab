<?php
/**
 * Template Name: Board
 * Template Post Type: post, page
 */
$www = get_stylesheet_directory_uri();
get_header(); 
?>
<?php get_template_part( 'template-parts/page-title' ); ?>
<?php if ( have_posts() ) : ?>
<?php while ( have_posts() ) : the_post(); ?>
<main >
    <section>
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-6">
                    <div class="loop loop-contact-num">
                        <div class="image">
                            <img src="<?php echo $www; ?>/images/ic-chat.png">
                        </div>
                        <div class="desc">
                            <h5>카카오톡</h5>
                            <h4>@에이앤랩</h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="loop loop-contact-num">
                        <div class="image">
                            <img src="<?php echo $www; ?>/images/ic-phone.png">
                        </div>
                        <div class="desc">
                            <h5>전화</h5>
                            <h4>02-538-0339  </h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="loop loop-contact-num">
                        <div class="image">
                            <img src="<?php echo $www; ?>/images/ic-email.png">
                        </div>
                        <div class="desc">
                            <h5>이메일</h5>
                            <h4>help@anlab.co.kr</h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="loop loop-contact-num">
                    <div class="image">
                            <img src="<?php echo $www; ?>/images/ic-office.png">
                        </div>
                        <div class="desc">
                            <h5>방문</h5>
                            <h4>강남역 5번출구 3분거리</h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row fade-item">
                <div class="col-lg-12">
                    <?php echo do_shortcode('[kboard id=1]') ?>
                </div>
            </div>
        </div>
    </section>
</main>
<?php endwhile; ?>
<?php else : ?>
no post
<?php endif; ?>
<?php get_footer(); ?>
