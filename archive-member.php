<?php
    $www = get_stylesheet_directory_uri();
    get_header();
?>


<!-- <script>
    (function ($) {
        $('.site-header').removeClass('text-light');
        $('.site-header').addClass('text-dark');
    })(jQuery);
</script> -->


<div class="page-header " >
    <div class="container">
        <div class="page-title fade-item">
            <div class="inner">
                <h1>변호사</h1>
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
        <img src="<?php the_field('page-header-bg-member','option') ?>" alt="">
    </div>

</div>

<main>
    <section class="member-list">
        <div class="container">
                <?php 
                    $the_query = new WP_Query( array(
                        'post_type' => 'member',
                        'orderby'=> 'menu_order', 
                        'order' => 'ASC',
                        'posts_per_page' => '-1',

                        'tax_query' => array(
                            array (
                                'taxonomy' => 'member_category',
                                'field' => 'slug',
                                'terms' => 'partner',
                            )
                        ),
                    ));                
                ?>
                <?php if ($the_query->have_posts() ) : ?> 


                <div class="row section__title fade-item mb-3">
                    <div class="col-lg-12">
                        <h3 class="font-weight-medium">파트너 변호사</h3>
                    </div>
                </div>

                <div class="row">
                        <!-- <div class="col-lg-4 fade-item">
                            <div class="loop-member-logo">
                                <div class="inner">
                                    <h3 class="serif">Trust Me</h3>
                                    <h2><span class="serif">Trust Me</span></h2>
                                    <p>당신의 말 못할 고민, 저희가 들어드리겠습니다.</p>
                                
                                </div>

                            </div>
                        </div> -->
                    <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
                        <div class="col-lg-4  col-6  fade-item">
                            <?php get_template_part( 'template-parts/loop','member' ); ?>
                        </div>
                    <?php endwhile; ?>
                </div>
            <?php else : ?>
                no post
            <?php endif; ?>
        </div>
    </section>

    <?php 
        $the_query = new WP_Query( array(
            'post_type' => 'member',
            'orderby'=> 'menu_order', 
            'order' => 'ASC',
            'posts_per_page' => '-1',

            'tax_query' => array(
                array (
                    'taxonomy' => 'member_category',
                    'field' => 'slug',
                    'terms' => 'partner',
                    'operator' => 'NOT IN',
                )
            ),
        ));                
    ?>
    <?php if ($the_query->have_posts() ) : ?> 


    <section class="member-list pt-0">
        <div class="container">
            <div class="row section__title fade-item mb-3">
                <div class="col-lg-12">
                    <h3 class="font-weight-medium">변호사</h3>
                </div>
            </div>
            <div class="row">
                <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
                    <div class="col-lg-4  col-6  fade-item">
                        <?php get_template_part( 'template-parts/loop','member' ); ?>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
    </section>
    <?php else : ?>
    <?php endif; ?>
</main>
<script>
// (function($){
//     $('.loop-member:nth-child(odd) .col-lg-5').addClass('order-lg-1');
//     $('.loop-member:nth-child(odd) .col-lg-7').addClass('order-lg-2');
//     console.log($('.loop-member:nth-child(odd) .col-lg-7'));
// })(jQuery);

</script>

<?php get_footer(); ?>
