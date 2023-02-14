<a class="loop loop-no-image" href="<?php the_permalink();?>">
    <div class="header">
        <h6 class="meta">
            <?php 
                $term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
                echo $term->name; 
            ?>
        </h6>
    </div>
    <div class="content">
        <h5 class="meta">
            <?php 
                $postType = get_post_type_object(get_post_type());
                if ($postType) {
                    echo esc_html($postType->labels->singular_name);
                }
            ?>
        </h5>
        <h4 class="title">
            <?php the_title(); ?>
        </h4>
    </div>
    <div class="footer">
        <p class="date">
            <?php echo get_the_date('Y.m.d') ?>
        </p>
    </div>
</a>