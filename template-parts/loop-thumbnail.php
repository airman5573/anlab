<a class="loop loop-thumbnail"  href="<?php the_permalink();?>">
    <div class="image">
        <?php if(get_the_post_thumbnail()): ?>
            <?php echo get_the_post_thumbnail(); ?>
        <?php else: ?>
            <img src="http://via.placeholder.com/800x600/ ">
        <?php endif; ?>
    </div>
    <div class="desc">
        <h6>
            <?php 
                $postType = get_post_type_object(get_post_type());
                if ($postType) {
                    echo esc_html($postType->labels->singular_name);
                }
            ?>
        </h6>
        <h4>
            <?php the_title(); ?>
        </h4>
        <p class="date">
            <?php echo get_the_date('Y.m.d') ?>
        </p>
    </div>
</a>