<?php
// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
$www = get_stylesheet_directory_uri();
?>

<div id="hamburger-fullscreen" class="hamburger-fullscreen content-menu content-animation-slide open">

    <div class="site-header light text-light transparent">
        <div class="header-main header-contents">
            <div class="container-fluid">
                <div class="header-left-items header-items">
                    <div class="site-branding">
                        <a href="<?php echo site_url(); ?>" class="logo">
                            <img src="<?php echo $www; ?>/images/logo-dark.svg" class="logo-dark"> 
                            <img src="<?php echo $www; ?>/images/logo-light.svg" class="logo-light"> 
                        </a>
                    </div>
                </div>
                <div class="header-center-items header-items has-menu">
                </div>
                <div class="header-right-items header-items">

                    <div class="header-hamburger hamburger-menu button-close active" data-target="hamburger-fullscreen">
                        <div class="hamburger-box">
                            <div class="hamburger-inner"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="hamburger-screen-inner">
        <div class="container">
            <div class="row p-5">
                <div class="col">
                    <div class="hamburger-sub-nav">
                        <h4>소개</h4>
                        <nav>
                            <?php
                                wp_nav_menu( array(
                                    'menu' => 'company menu',
                                    'depth'             => 1,
                                    'container'      => null,
                                    'menu_class'     => 'menu ',
                                ) );
                            ?>
                        </nav>
                    </div>
                </div>

                <div class="col">
                    <div class="hamburger-sub-nav">
                        <h4>변호사</h4>
                        <nav>
                            <?php
                                wp_nav_menu( array(
                                    'menu' => 'member menu',
                                    'depth'             => 1,
                                    'container'      => null,
                                    'menu_class'     => 'menu ',
                                ) );
                            ?>
                        </nav>
                    </div>
                </div>


                <div class="col">
                    <div class="hamburger-sub-nav">
                        <h4>이혼소송</h4>
                        <nav>
                            <?php
                                wp_nav_menu( array(
                                    'menu' => 'divorce menu',
                                    'depth'             => 1,
                                    'container'      => null,
                                    'menu_class'     => 'menu ',
                                ) );
                            ?>
                        </nav>
                    </div>
                </div>
                <div class="col">
                    <div class="hamburger-sub-nav">
                        <h4>상속소송</h4>
                        <nav>
                            <?php
                                wp_nav_menu( array(
                                    'menu' => 'inheritance menu',
                                    'depth'             => 1,
                                    'container'      => null,
                                    'menu_class'     => 'menu ',
                                ) );
                            ?>
                        </nav>
                    </div>
                </div>
                <div class="col">
                    <div class="hamburger-sub-nav">
                        <h4>성공사례</h4>
                        <nav>
                            <?php
                                wp_nav_menu( array(
                                    'menu' => 'case menu',
                                    'depth'             => 1,
                                    'container'      => null,
                                    'menu_class'     => 'menu ',
                                ) );
                            ?>
                        </nav>
                    </div>
                </div>
                <div class="col">
                    <div class="hamburger-sub-nav">
                        <h4>상담문의</h4>
                        <nav>
                            <?php
                                wp_nav_menu( array(
                                    'menu' => 'about menu',
                                    'depth'             => 1,
                                    'container'      => null,
                                    'menu_class'     => 'menu ',
                                ) );
                            ?>
                        </nav>
                    </div>
                </div>

            </div>
        </div>
    </div>





    <div class="hamburger-screen-inner">

        <div class="hamburger-screen-content ps">

            <nav id="fullscreen-menu" class="fullscreen-menu hamburger-navigation  hover-open">
                <?php
                wp_nav_menu( array(
                    'theme_location' => 'primary_menu',
                    'container'      => null,
                    'depth'          => 1,
                    'fallback_cb'    => 'wp_page_menu',
                ) );
                ?>
            </nav>

            <div class="fullscreen-footer">
                <!-- <div class="currency list-dropdown up"> <span class="label">Currency</span>
                    <div class="dropdown"> <span class="current"> <span class="selected">USD</span> <span
                                class="svg-icon icon-arrow-dropdown size-smaller caret"><svg role="img">
                                    <use href="#arrow-dropdown" xlink:href="#arrow-dropdown"></use>
                                </svg></span> </span>
                        <ul>
                            <li><a href="#" class="woocs_flag_view_item woocs_flag_view_item_current"
                                    data-currency="USD">USD</a></li>
                            <li><a href="#" class="woocs_flag_view_item" data-currency="EUR">EUR</a></li>
                        </ul>
                    </div>
                </div> -->
                <!-- <div class="language list-dropdown up"> <span class="label">Language</span>
                    <div class="dropdown"> <span class="current"> <span class="selected">English</span> <span
                                class="svg-icon icon-arrow-dropdown size-smaller caret"><svg role="img">
                                    <use href="#arrow-dropdown" xlink:href="#arrow-dropdown"></use>
                                </svg></span> </span>
                        <ul>
                            <li class="en"><a href="#">English</a></li>
                            <li class="fr"><a href="#">Français</a></li>
                            <li class="it"><a href="#">Italiano</a></li>
                        </ul>
                    </div>
                </div> -->
            </div>
            <!-- <div class="social-icons">
                <?php
                wp_nav_menu( array(
                    'theme_location'  => 'socials',
                    'container_class' => 'socials-menu ',
                    'menu_id'         => 'footer-socials',
                    'depth'           => 1,
                    'link_before'     => '<span>',
                    'link_after'      => '</span>',
                ) );
                ?>
            </div> -->
        </div>

    </div>
</div>
