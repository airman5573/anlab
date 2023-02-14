<?php
/**
 * Template Name: WP_Query-List
 * Template Post Type: post, page
 */
$www = get_stylesheet_directory_uri();
get_header(); 
?>

<div class="page-header"  style="background-image:url('<?php echo $www; ?>/images/media/bg-hall.jpg')">
    <div class="container">
        <div class="page-title">
            <div class="inner">
                <h1>회사소개</h1>
                <h3>특유의 생존력과 민첩함으로 <br>고객의 수익을 증대시키는 금융시장의 절대강자로 거듭나겠습니다.</h3>
            </div>
        </div> 
    </div>
</div>
<div class="page-nav">
    <?php 
        wp_nav_menu( array(
            'menu' => 'primary menu',
            'depth'             => 2,
            'container'         => 'nav',
            'container_class'   => 'page-header-nav-menu-container',
            'menu_class'        => 'page-header-nav-menu'
        ) );            
    ?>	
</div>
<main >
    <section class="pb-0">
        <div class="container">
            <div class="row section__title mb-0">    
                <div class="col-lg-12">
                    <h3><span>공지사항</span></h3>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="search-form">
                        <form role="search" action="<?php echo site_url();?>" method="get" id="searchform">
                            <input type="text" name="s" placeholder="검색어를 입력해주세요">
                            <input type="hidden" name="post_type" value="notice"> 
                            <input type="submit" alt="Search" value="검색">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section >
        <div class="container">
            <div class="row mb-5">
            <?php 
                    $the_query = new WP_Query( array(
                        'post_type' => 'news',
                        'tax_query' => array(
                            array (
                                'taxonomy' => 'news_category',
                                'field' => 'slug',
                                'terms' => 'featured',
                            )
                        ),
                        'orderby'=> 'date', 
                        'order' => 'ASC',
                    ) );                
                    ?>
                <?php if ( $the_query->have_posts() ) : ?>
                    <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
                    <div class="col-lg-4"> 
                            <a class="loop-channel" href="<?php the_permalink();?>">
                                <h5><?php the_title(); ?></h5>
                                <div class="footer">
                                    <span class="channel">
                                        채널
                                    </span>
                                    <span class="date">
                                        <?php echo get_the_date('Y-m-d'); ?>
                                    </span>
                                </div>
                            </a>
                        </div>
                        <?php endwhile; ?>
                <?php else : ?>
                    No Post
                <?php endif; ?>
                <?php wp_reset_postdata(); ?>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="list-table-title">
                        <h5>제목</h5>
                        <h5 class="date desktop-only">
                            등록일
                        </h5>
                    </div>
                </div>
            </div>


            <div class="row">
                <?php 
                    $the_query = new WP_Query( array(
                        'post_type' => 'news',
                        // 'tax_query' => array(
                        //     array (
                        //         'taxonomy' => 'news_category',
                        //         'field' => 'slug',
                        //         'terms' => 'featured',
                        //     )
                        // ),
                        'orderby'=> 'date', 
                        'order' => 'ASC',
                    ) );                
                    ?>
                <?php if ( $the_query->have_posts() ) : ?>
                    <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
                        <div class="col-md-12">
                            <div class="loop-table">
                                <h5><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h5>
                                <span class="date">
                                    <?php echo get_the_date('Y.m.d') ?>
                                </span>
                            </div>
                        </div>
                        <?php endwhile; ?>
                <?php else : ?>
                    No Post
                <?php endif; ?>
                <?php wp_reset_postdata(); ?>

            </div>
        </div>
    </section>
</main>


<?php get_footer(); ?>
