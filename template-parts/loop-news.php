<div class="loop loop-news">
    <div class="image">
        <?php if(get_the_post_thumbnail()): ?>
            <?php echo get_the_post_thumbnail(); ?>
        <?php else: ?>
            <img src="http://via.placeholder.com/800x600/ ">
        <?php endif; ?>
    </div>
    <div class="desc">
        <h4>
            <a href="<?php the_permalink();?>"><?php the_title(); ?></a>
        </h4>
        <p class="date">
            <?php echo get_the_date('Y.m.d') ?>
        </p>
    </div>
</div>