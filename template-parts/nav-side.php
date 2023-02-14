<?php 
    $post_type = get_post_type_object( get_post_type($post) ); 
    $www = get_stylesheet_directory_uri();
    global $post; 
    $post_data = get_post($post->post_parent);
    $page_title = '';
    $page_nav_name = NULL;

    if($post_data->post_name == 'company' OR is_post_type_archive('news')  OR  is_singular('news') OR is_post_type_archive('press')  OR  is_singular('press')){
        $page_title = '트러스트앱랩';
        $page_nav_name = 'company menu';
    }elseif(is_post_type_archive('member')  OR  is_singular('member') OR  is_tax('member_category')){
        $page_title = get_the_archive_title();
        $page_nav_name = 'member menu';
    }elseif(is_post_type_archive('divorce')  OR  is_singular('divorce')  OR  is_tax('divorce_category')){
        $page_title = get_the_archive_title();
        $page_nav_name = 'divorce menu';
    }elseif(is_post_type_archive('inheritance')  OR  is_singular('inheritance') OR  is_tax('inheritance_category')){
        $page_title = get_the_archive_title();
        $page_nav_name = 'inheritance menu';
    }elseif(is_post_type_archive('guardian')  OR  is_singular('guardian') OR  is_tax('guardian_category')){
        $page_title = get_the_archive_title();
        $page_nav_name = 'guardian menu';
    }elseif(is_post_type_archive('case')  OR  is_singular('case') OR  is_tax('case_category')){
        $page_title= get_the_archive_title();
        $page_nav_name = NULL;
    }elseif($post_data->post_name == 'board'){
        $page_title = '';
        $page_nav_name = 'board menu';
    }else{
        $page_title = get_the_title();
    }
?>

<?php if($page_nav_name) :?>
<div class="side-nav">

        <?php 
            wp_nav_menu( array(
                'menu' => $page_nav_name,
                'depth'             => 2,
                'container'         => 'nav',
                'menu_class'        => 'side-nav-menu'
            ) );            
        ?>	

</div>
<?php endif; ?> 

