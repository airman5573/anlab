<?php
/**
 * Template Name: Page
 * Template Post Type: post, page
 */
$www = get_stylesheet_directory_uri();
get_header(); 
?>
<?php get_template_part( 'template-parts/page-header', 'title' ); ?> 
<?php get_template_part( 'template-parts/page-header', 'nav' ); ?> 
<main>
    <section>
        <div class="container">
            <div class="row section--title">
                <div class="col-lg-12">
                    <h3>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Sapiente, odio!
                    </h3>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-7">
                    <h4>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sapiente, odio!</h4>


                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sapiente, odio!</p>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Laudantium officia ex optio corrupti explicabo eius blanditiis nihil molestiae natus perspiciatis facilis quasi repudiandae, quas, velit unde animi aliquid nobis obcaecati! Est nihil repellendus voluptate totam, illo nam beatae quibusdam eum.!</p>


                </div>
                <div class="col-lg-5">
                    <img src="<?php echo $www; ?>/images/media/img-man.jpg">
                </div>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>
