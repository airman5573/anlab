<?php
/**
 * Template Name: WP_Query-Grid
 * Template Post Type: post, page
 */
$www = get_stylesheet_directory_uri();
get_header(); 
?>

<div class="page-header" style="background-image:url('<?php echo $www; ?>/images/media/bg-hall.jpg')">
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
<main>
    <section>
        <div class="container">
            <div class="row section__title">
                <div class="col-lg-12">
                    <h3><span>언론보도</span></h3>
                </div>
            </div>
            <div class="row">
                <?php 
                    $the_query = new WP_Query( array(
                        'post_type' => 'news',
                        'orderby'=> 'date', 
                        'order' => 'ASC',
                        'posts_per_page' => '3',
                    ) );                
                    ?>
                <?php if ( $the_query->have_posts() ) : ?>
                <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
                <div class="col-md-4">
                    <div class="loop-blog">
                        <div class="image">
                            <a href="<?php the_permalink();?>">
                                <?php if( get_the_post_thumbnail()): ?>
                                <?php echo get_the_post_thumbnail(); ?>
                                <?php else: ?>
                                <img src="http://via.placeholder.com/800x600/ ">
                                <?php endif; ?>

                            </a>
                        </div>
                        <div class="desc">
                            <p class="meta">NEWS</p>
                            <h4><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h4>
                            <p class="date">
                                <?php echo get_the_date('Y-m-d'); ?>
                            </p>
                        </div>

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

    <section>
        <div class="container">
            <div class="row">
                <?php 
                    $the_query = new WP_Query( array(
                        'post_type' => 'news',
                        'orderby'=> 'date', 
                        'order' => 'ASC',
                        'posts_per_page' => '3',
                    ));                
                ?>
                <?php if ( $the_query->have_posts() ) : ?>
                <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
                <div class="col-md-4">
                    <a class="loop-publication" href="<?php the_permalink();?>">
                        <div class="desc">
                            <div class="tag">
                                Tag
                            </div>
                            <h4><?php the_title(); ?></h4>
                        </div>
                        <div class="meta">
                            <p>Category </p>
                            <p><?php echo get_the_date('Y-m-d'); ?></p>
                        </div>
                    </a>
                </div>
                <?php endwhile; ?>
                <?php else : ?>
                No Post
                <?php endif; ?>
                <?php wp_reset_postdata(); ?>
            </div>
        </div>
    </section>
    <section>
        <div class="container">
            <div class="row">
                <?php 
                    $the_query = new WP_Query( array(
                        'post_type' => 'news',
                        'orderby'=> 'date', 
                        'order' => 'ASC',
                        'posts_per_page' => '3',
                    ));                
                ?>
                <?php if ( $the_query->have_posts() ) : ?>
                <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
                <div class="col-md-4">
                    <div class="loop loop-team">
                        <div class="image">
                            <img src="http://via.placeholder.com/800x800/ ">
                        </div>
                        <div class="desc">
                            <h4>박용덕</h4>
                            <h5>Founder</h5>
                        </div>
                        <div class="detail">

                            <ul>
                                <li>카이스트 산업디자인학과</li>
                                <li>엔써즈 디자인실</li>
                                <li>GS칼텍스 마케팅실 </li>
                            </ul>
                        </div>

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
    <section>
        <div class="container">
            <div class="row">
                <?php 
                    $the_query = new WP_Query( array(
                        'post_type' => 'news',
                        'orderby'=> 'date', 
                        'order' => 'ASC',
                        'posts_per_page' => '2',
                    ));                
                ?>
                <?php if ( $the_query->have_posts() ) : ?>
                <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
                <div class="col-lg-6" >
                    <a class="loop loop-service light" href="<?php echo site_url();?>/">
                        <div class="inner">
                            <div class="desc">
                                <h3> Product name
                                </h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium, officiis! </p>
                            </div>

                            <img src="http://via.placeholder.com/100x100/ ">
                        </div>
                    </a>
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
