<a class="loop-member" href="<?php the_permalink();?>"> 
    <div class="image">
        <?php if(get_the_post_thumbnail()): ?>
            <!-- <?php echo get_the_post_thumbnail(); ?> -->
            
            <img src="<?php the_field('image_alt') ?>" alt="">
        <?php else: ?>
            <img src="http://via.placeholder.com/800x800/ ">
        <?php endif; ?>
    </div>

    <div class="desc">
        <h3 class="title">

            <?php the_title(); ?> <span class="sm"><?php the_field('job'); ?>  </span>

        </h3>
        <h5 class="job">
            <?php the_field('slogan'); ?>    
        </h5>
    </div> 
    <div class="slogan_alt">
        <!-- <h4  class="slogan">
            <?php the_field('slogan') ?>
        </h4> -->
        <h5>
            <?php the_field('slogan_alt') ?>
        </h5>
    </div> 
</a>
