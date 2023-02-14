<?php
/**
 * Template Name: Mobile Menu
 *
 * @package daybyday
 */
$www = get_stylesheet_directory_uri();
get_header(); 

?>

<div id="mobile-menu" class="mobile-menu-panel offscreen-panel">
    <div class="backdrop"></div>
    <div class="panel">



        <div class="header-mobile custom logo-center">
            <div class="container-fluid">
                <div class="mobile-menu-hamburger"> <button class="mobile-menu-toggle hamburger-menu"
                        data-toggle="off-canvas" data-target="mobile-menu" aria-label="Toggle Menu"> <span
                            class="hamburger-box"> <span class="hamburger-inner"></span> </span> </button></div>

            </div>
        </div>

        <?php
                wp_nav_menu( array(
                    'menu' => 'primary menu',
                    'container'       => 'nav',
                    'container_class' => 'mobile-menu__nav',
                ) );
            
        ?>
        <hr class="mobile-menu__divider divider">

    </div>
</div>
