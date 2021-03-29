<?php 
$term = get_queried_object();
$www = get_stylesheet_directory_uri();


?>

<div class="page-header">
    <div class="container">
        <div class="page-header-title">
            <h2>
                <?php if(is_archive()): ?>
                    <?php the_archive_title(); ?>
                <?php else: ?>
                    <?php the_title(); ?>
                <?php endif ?>
            </h2>
        </div> 
    </div>
    <div class="bg-media">
        <?php if(is_page() && get_field('page-header-bg-img')): ?>
            <img src="<?php the_field('page-header-bg-img')?>">
        <?php else: ?>
            <img src="<?php echo $www; ?>/images/media/bg-hall.jpg">
        <?php endif; ?>
    </div>
</div>
