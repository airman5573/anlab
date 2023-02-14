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

