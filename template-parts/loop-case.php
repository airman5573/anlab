<a class="loop-case" href="<?php the_permalink();?>">
    <p class="meta">
        <?php the_field('meta_cat') ?>
    </p>
    <div class="desc">
        <h5 class="title">
            <?php the_title(); ?>
        </h5>
        <div class="summary">
            <p>
                <?php the_field('summary'); ?>
            </p> 
        </div>
    </div>
    <div class="detail">
        <span class="name" >
            자세히 보기
        </span>
        
    </div>
    <?php
    $post_relation = get_field('member_relation');
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