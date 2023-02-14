<?php
    $www = get_stylesheet_directory_uri();
    get_header();
?>
<div class="page-header" >
    <div class="container">
        <div class="page-title  fade-item">
            <div class="inner">
                <h1><?php echo  get_search_query(); ?></h1>
            </div>
        </div> 
    </div>

    <div class="bg-media">
        <img src="<?php the_field('page-header-bg-about','option') ?>" alt="">
    </div>
</div>




<?php 
    $s = isset($_GET["s"]) ? $_GET["s"] : ""; 
    $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
?>

<main>
        <?php 
            $the_query = new WP_Query(
                array(
                    's' => $s,
                    'post_type' =>'divorce',
                    'posts_per_page' => '5',
                    'paged' => $paged 
                ));          
        ?>
        <section>
            <div class="container">
                <div class="row section__title">
                    <div class="col-lg-12">
                        <div class="line"></div>
                        <h3 class="sm">이혼, 그리고 봄</h3>
                    </div>
                </div>
                <?php if ( $the_query->have_posts() ) : ?>
                    <div class="row section__desc">
                        <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
                            <div class="col-lg-12">
                                <?php get_template_part( 'template-parts/loop','list' ); ?>
                            </div>
                        <?php endwhile; ?>
                    </div>

                <?php else : ?>
                    <div class="row">
                        <div class="col-lg-12">
                            <p>검색결과가 없습니다.</p>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </section>

        <?php 
            $the_query = new WP_Query(
                array(
                    's' => $s,
                    'post_type' =>'inheritance',
                    'posts_per_page' => '5',
                    'paged' => $paged 
                ));          
        ?>
        <section>
            <div class="container">
                <div class="row section__title">
                    <div class="col-lg-12">
                        <div class="line"></div>
                        <h3 class="sm">희망, 상속</h3>
                    </div>
                </div>
                <?php if ( $the_query->have_posts() ) : ?>
                    <div class="row section__desc">
                        <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
                            <div class="col-lg-12">
                                <?php get_template_part( 'template-parts/loop','list' ); ?>
                            </div>
                        <?php endwhile; ?>
                    </div>

                <?php else : ?>
                    <div class="row">
                        <div class="col-lg-12">
                            <p>검색결과가 없습니다.</p>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </section>


        <?php 
            $the_query = new WP_Query(
                array(
                    's' => $s,
                    'post_type' =>'guardian',
                    'posts_per_page' => '5',
                    'paged' => $paged 
                ));          
        ?>
        <section>
            <div class="container">
                <div class="row section__title">
                    <div class="col-lg-12">
                        <div class="line"></div>
                        <h3 class="sm">성년후견</h3>
                    </div>
                </div>
                <?php if ( $the_query->have_posts() ) : ?>
                    <div class="row section__desc">
                        <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
                            <div class="col-lg-12">
                                <?php get_template_part( 'template-parts/loop','list' ); ?>
                            </div>
                        <?php endwhile; ?>
                    </div>
                <?php else : ?>
                    <div class="row">
                        <div class="col-lg-12">
                            <p>검색결과가 없습니다.</p>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </section>


        <?php 
            $the_query = new WP_Query(
                array(
                    's' => $s,
                    'post_type' =>'case',
                    'posts_per_page' => '5',
                    'paged' => $paged 
                ));          
        ?>
        <section>
            <div class="container">
                <div class="row section__title">
                    <div class="col-lg-12">
                        <div class="line"></div>
                        <h3 class="sm">해피엔딩, 사례</h3>
                    </div>
                </div>
                <?php if ( $the_query->have_posts() ) : ?>
                    <div class="row section__desc">
                        <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
                            <div class="col-lg-12">
                                <?php get_template_part( 'template-parts/loop','list' ); ?>
                            </div>
                        <?php endwhile; ?>
                    </div>
                <?php else : ?>
                    <div class="row">
                        <div class="col-lg-12">
                            <p>검색결과가 없습니다.</p>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </section>

</main> 
<?php get_footer(); ?>
