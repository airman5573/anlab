<?php
/**
 */
$post_type = get_post_type_object( get_post_type($post) ); 
$www = get_stylesheet_directory_uri();
global $post; 
$post_data = get_post($post->post_parent);

?>

<?php 
    $menu_wp_name = NULL;
    if($post_data->post_name == 'company' ){
        $menu_wp_name = 'sub company';
    }elseif($post_data->post_name == 'business' ){
        $menu_wp_name = 'sub business';
    }elseif(is_post_type_archive('news') OR is_singular('news') OR $post_data->post_name == 'community' ){
        $menu_wp_name = 'sub community';
    }
?>

<?php if($menu_wp_name) :?>
    <div class="page-header-nav">
        <div class="container">
                <?php 
                    wp_nav_menu( array(
                        'menu' => $menu_wp_name,
                        'depth'             => 2,
                        'container'         => 'nav',
                        'container_class'   => 'page-header-nav-menu-container',
                        'menu_class'        => 'page-header-nav-menu'
                    ) );            
                ?>	
        </div>
    </div>
<?php endif; ?>


