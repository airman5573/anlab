<a href="<?php the_permalink();?>" class="loop-list">
    <div class="header">
        
        <h6 class="meta">
            <?php 
                $postType = get_post_type_object(get_post_type());
                if ($postType) {
                    echo esc_html($postType->labels->singular_name);
                }
            ?>
        </h6> 
        
        <h4 class="title">
            <?php the_title(); ?>
        </h4>
    </div>
<!-- 
    <div class="footer">
        <p class="date">
            <?php echo get_the_date('Y.m.d') ?>
        </p>
    </div> -->
</a>