
<?php

defined( 'ABSPATH' ) || exit;
$www = get_stylesheet_directory_uri();
?>
<!DOCTYPE html>
<html <?php language_attributes();?>>
    <head>
        <meta charset="<?php bloginfo('charset'); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="profile" href="http://gmpg.org/xfn/11">
        <?php wp_head(); ?>
    </head> 
    <body <?php body_class();?>>
    <header class="site-header light text-dark">
        <div class="header-main header-contents has-center logo-center">
            <div class="container">

                <div class="header-left-items header-items">
                    <div class="site-branding">
                        <a href="<?php echo site_url(); ?>" class="logo">
                            <img src="<?php echo $www; ?>/images/logo-dark.png" class="logo-dark"> 
                            <img src="<?php echo $www; ?>/images/logo-light.png" class="logo-light">
                        </a>
                    </div>
                </div>
                <div class="header-center-items header-items has-menu">
                    <nav id="primary-menu" class="main-navigation">
                        <?php
                        wp_nav_menu( array(
                            'theme_location' => 'primary_menu',
                            'depth'             => 1,
                            'container'      => null,
                            'menu_class'     => 'menu nav-menu',
                        ) );
                        ?>
                    </nav>
                </div>
                <div class="header-right-items header-items">
                    <a href="" class="btn btn-light" style="color:black;">문의하기</a>
                </div>
            </div>
        </div>
    </header>
        <?php get_template_part( 'template-parts/panel', 'hamburger' ); ?>
        <div class="js-scroll"  data-barba="wrapper"  >
            <div data-barba="container" id="container">
        