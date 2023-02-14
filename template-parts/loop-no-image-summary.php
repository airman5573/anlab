<a class="loop loop-no-image-summary" href="<?php the_permalink();?>">
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
    <div class="content">
        <p>
            <?php echo wp_trim_words( get_field('summary'), 35, '...' ); ?>
        </p>
    </div>
    <div class="footer">
        <p class="date">
            <?php echo get_the_date('Y.m.d') ?>
        </p>
    </div>
</a>