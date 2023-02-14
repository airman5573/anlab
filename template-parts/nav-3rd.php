<div class="nav-sub"> 
    <?php 
        $page_id = $wp_query->get_queried_object_id();
        $term = get_queried_object(); 
        if($term->parent){
            $term_id = $term->parent;
        }else{
            $term_id = $term->term_id;
        }
        $taxonomy_name =  get_query_var( 'taxonomy' );
        $termchildren = get_terms( $taxonomy_name, array( 
            'child_of' => $term_id,
            'orderby' => 'term_order',
            'order' => 'ASC'
            )
        );
        $class="";
    ?>
    <nav>
        <ul>
            <?php foreach($termchildren as $child): ?>
                <?php if($page_id ==$child->term_id ){
                    $class ="current-menu-item";
                }else{
                    $class="";
                } ?>
                <li class="<?php echo $class; ?>">
                    
                    <a href="<?php echo get_term_link( $child, $taxonomy_name )  ?>"><?php echo $child->name ?></a>
                </li>
            <?php endforeach; ?>
        </ul>
    </nav>
</div>