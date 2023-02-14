<?php
    $www = get_stylesheet_directory_uri();
    get_header();
?>


<?php 
    $post_type = get_post_type_object( get_post_type($post) ); 
    $www = get_stylesheet_directory_uri();
    global $post; 
    $post_data = get_post($post->post_parent);
    $page_title = '';
    $page_bg = get_field('page-header-bg-about','option');

    if($post_data->post_name == 'company' ){
        $page_title = get_the_title();
    }elseif(is_post_type_archive('news')  OR  is_singular('news') OR is_post_type_archive('press')  OR  is_singular('press')){
        $postType = get_post_type_object(get_post_type());
        if ($postType) {
            $page_title = $postType->labels->singular_name;
        }
    }elseif(is_post_type_archive('member')  OR  is_singular('member')){
        $postType = get_post_type_object(get_post_type());
        if ($postType) {
            $page_title = $postType->labels->singular_name;
        }
    }elseif(is_post_type_archive('divorce')  OR  is_singular('divorce') OR is_tax('divorce_category')){
        // $page_title = get_the_archive_title();
        $page_bg = get_field('page-header-bg-divorce','option');
        $postType = get_post_type_object(get_post_type());
        if ($postType) {
            $page_title = $postType->labels->singular_name;
        }

    }elseif(is_post_type_archive('inheritance')  OR  is_singular('inheritance') OR is_tax('inheritance_category')){
        $postType = get_post_type_object(get_post_type());
        $page_bg = get_field('page-header-bg-inheritance','option');
        if ($postType) {
            $page_title = $postType->labels->singular_name;
        }

    }elseif(is_post_type_archive('guardian')  OR  is_singular('guardian')  OR is_tax('guardian_category')){
        $postType = get_post_type_object(get_post_type());
        $page_bg = get_field('page-header-bg-guardian','option');
        if ($postType) {
            $page_title = $postType->labels->singular_name;
        }

    }elseif(is_post_type_archive('case')  OR  is_singular('case')  OR is_tax('case_category')){
        $postType = get_post_type_object(get_post_type());
        $page_bg = get_field('page-header-bg-case','option');
        if ($postType) {
            $page_title = $postType->labels->singular_name;
        }

    }elseif($post_data->post_name == 'board'){
        $page_title = get_the_title();
        $page_bg = get_field('page-header-bg-board','option');
    }else{
        $page_title = get_the_title();
    }
?>


<div class="page-header" >
    <div class="container">
        <div class="page-title  fade-item">
            <div class="inner">
                <h1><?php echo $page_title;?></h1>


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
        <?php if(is_post_type_archive('divorce')  OR  is_singular('divorce')  OR is_tax('divorce_category')): ?>
            <img src="<?php the_field('page-header-bg-divorce','option') ?>" alt="">
        <?php else: ?>
            <img src="<?php echo $page_bg; ?>" alt="">
        <?php endif; ?>
    </div>
</div>



<main >
    <section class="content-main">
        <div class="container">
            <div class="row">
                <div class="col-lg-1">
                     <?php get_template_part( 'template-parts/nav-side' ); ?>
                </div>
                <div class="col-lg-9">
                    <div class="content-area">
                        <?php if ( have_posts() ) : ?>
                            <div class="nav-tab">
                                <ul class="nav nav-pills" id="pills-tab" role="tablist">
                                    <?php $i=1 ?>
                                    <?php while ( have_posts() ) : the_post(); ?>
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link" id="post<?php echo $i ?>-tab" data-toggle="pill" href="#post<?php echo $i ?>" role="tab" aria-controls="post<?php echo $i ?>" aria-selected="true">
                                                <?php the_title(); ?>
                                            </a>
                                        </li>
                                    <?php $i++ ?>
                                    <?php endwhile; ?>
                                </ul>
                            </div>
                        <?php else : ?>
                                no post
                        <?php endif; ?>
                        <?php if ( have_posts() ) : ?>
                        <div class="tab-content" id="pills-tabContent">
                            <?php $i=1 ?>
                            <?php while ( have_posts() ) : the_post(); ?>
                                <div class="tab-pane fade" id="post<?php echo $i ?>" role="tabpanel" aria-labelledby="post<?php echo $i ?>-tab">
                                    <div class="content">
                                        <?php the_content(); ?>
                                    </div>



                                    <?php  $projects = get_field('case_relation'); ?>
                                    <?php if( $projects ): ?>
                                    <div class="case-area">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <h4 class="lg title">해피엔딩, 사례</h4>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <?php foreach( $projects as $project ): ?>
                                                <div class="col-lg-4 col-12">
                                                    <a class="loop-case" href="<?php the_permalink($project->ID);?>">
                                                        <p class="meta">
                                                            <?php the_field('meta_cat', $project->ID) ?>
                                                        </p>
                                                        <div class="desc">
                                                            <h5 class="title">
                                                                <?php echo get_the_title($project->ID); ?>
                                                            </h5>
                                                            <div class="summary">
                                                                <p style="max-height:88px;min-height:88px;overflow:hidden;">
                                                                    <?php the_field('summary', $project->ID); ?>
                                                                </p> 
                                                            </div>
                                                        </div>
                                                        <div class="detail">
                                                            <span class="name" >
                                                                자세히 보기
                                                            </span>
                                                            
                                                        </div>
                                                        <?php
                                                        $post_relation = get_field('member_relation', $project->ID);
                                                        if( $post_relation ): ?>
                                                            <div class="member">
                                                                <h6>담당 변호사</h6>
                                                                <ul>
                                                                    <?php foreach( $post_relation as $post ): 
                                                                        setup_postdata($post); ?>
                                                                            <li>
                                                                                <img src="<?php the_field('image_rect'); ?>" alt="">
                                                                                <span>
                                                                                    <?php the_title(); ?> 변호사
                                                                                </span>
                                                                            </li>
                                                                    <?php endforeach; ?>
                                                                    <?php wp_reset_postdata(); ?>
                                                                </ul>
                                                            </div>
                                                        <?php endif; ?>
                                                    </a>
                                                </div>
                                            <?php endforeach; ?>
                                        </div>
                                    </div><!--member-->
                                    <?php endif; ?>




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
                                <?php $i++ ?>
                            <?php endwhile; ?>
                        </div>
                        <?php else : ?>
                                no post
                        <?php endif; ?>
                    </div>
                </div><!--col-lg-9-->
            </div>
        </div>
    </section>
            
    <script>
            (function($){
                $('.nav-item:first-child a').addClass('active');
                $('.tab-pane:first-child').addClass('show active');



               if($('#post2-tab').length){
                    
               }else{
                $('.nav-tab').css('display','none');
               }

            })(jQuery);
            </script>
</main>

<?php get_footer(); ?>
