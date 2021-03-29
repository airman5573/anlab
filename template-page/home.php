<?php
/**
 * Template Name: Home
 * Template Post Type: post, page
 */
$www = get_stylesheet_directory_uri();
get_header(); 
?>

<script>
    const header = document.querySelector('header');
    header.classList.add('transparent')
    header.classList.remove('text-dark')
    header.classList.add('text-light')
</script>

<main>
    <section class="hero">
        <div class="hero__content">
            <h1><span class="condensed">lorem</span></h1>
            <h4>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere, autem, deleniti iure tempora impedit, consequatur consequuntur soluta animi quia laudantium adipisci doloribus officia. Hic laborum numquam natus sint ducimus necessitatibus ea similique animi ullam odit nulla quaerat tempora recusandae soluta minus praesentium, inventore tempore illo magni.sapiente quo est aliquam?
            </h4>
        </div>
        <div class="hero__bg">
            <img src="<?php echo $www; ?>/dist/images/media/bg-nature.jpg">
        </div>
    </section>
    <section>
        <div class="container">
            <div class="row section__title">
                <div class="col-lg-12">
                    <h3>lorem</h3>
                    <p> Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4">
                    <a class="loop" href="<?php echo site_url();?>/business/livestock/">
                        <div class="loop__image">
                            <img src="<?php echo $www; ?>/images/media/bg-brand.jpg">
                        </div>
                        <div class="loop__desc">
                            <h4>lorem</h4>
                            <p> Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4">
                    <a class="loop" ref="<?php echo site_url();?>/business/brand/">
                        <div class="loop__image">
                            <img src="<?php echo $www; ?>/images/media/bg-brand.jpg">
                        </div>
                        <div class="loop__desc">
                            <h4>lorem</h4>
                            <p> Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4">
                    <a class="loop" ref="<?php echo site_url();?>/business/100labs/">
                        <div class="loop__image">
                            <img src="<?php echo $www; ?>/images/media/bg-brand.jpg">
                        </div>
                        <div class="loop__desc">
                            <h4>lorem</h4>
                            <p> Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>
