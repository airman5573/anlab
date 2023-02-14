
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
        <link rel="apple-touch-icon" sizes="180x180" href="<?php echo $www ?>/images/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="<?php echo $www ?>/images/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="<?php echo $www ?>/images/favicon-16x16.png">
        <link rel="manifest" href="<?php echo $www ?>/images/site.webmanifest">
        <meta name="msapplication-TileColor" content="#da532c">
        <meta name="theme-color" content="#ffffff">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link rel="stylesheet" href="<?php echo $www;?>/vendors/bootstrap4/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo $www;?>/vendors/fontawesome/css/all.min.css">
        <link rel="stylesheet" href="<?php echo $www;?>/css/main.min.css?v=0809203">
        <link rel="stylesheet" href="<?php echo $www ?>/vendors/xeicon@2.3.3/xeicon.min.css">
        <style>
				
				.home-member:before{background:#b7b7b7; height:102vh;}
				
				section .section__title .line{background:#3b5999;}
				
				.loop-thumbnail-effect .desc h6,
				.loop-thumbnail .desc h6{color:#3b5999;}
				
				.loop-thumbnail-effect .desc p.date{border-top:1px solid #3b5999;}
				
				
				/*헤더 메뉴 css*/
				.header-center-items.header-items.has-menu {position: relative; left: 40px;}
				.main-navigation li ul {background: rgba(255,255,255,.9);}
				
				
				/*pc css*/
				@media all and (min-width:1025px){
					/*메인 헤더*/
					.site-branding {width: 225px; margin-left: 165px;}
					.site-branding .logo img {height: 39px;}
				}
				
				/* 태블릿 tablet css*/
				@media all and (min-width:430px) and (max-width:1024px){
					/*메인 헤더*/
					.site-branding {width: 200px;}
					.site-branding .logo img {height: 35px;}
				}
				
				/* 모바일 mobile css*/
				@media all and (max-width:430px){
					/*메인 헤더*/
					.site-branding {width: 200px;}
					.site-branding .logo img {height: 35px;}
				}
        </style>
        <?php wp_head(); ?>
		
		<!-- 메인에 필요한 css 파일, home.php 파일에서 옮겨놓음 - 22.12.19 -->
		<link rel="stylesheet" href="/css/main_traffic.css" />
    </head> 
    <body <?php body_class();?>>
	
	<?php
	// 수정사항(새로 생성), '헤더 및 퀵 메뉴' 출력해주는 숏코드 / functions.php 파일에 정의.
	echo do_shortcode('[header_menu]');
	?>
	
	<!--
    <header class="site-header light transparent text-light">
        <div class="header-main header-contents has-center">
            <div class="container-fluid">
                <div class="header-left-items header-items">
                    <div class="site-branding">
                        <a href="<?php echo site_url(); ?>" class="logo">
                            <img src="<?php echo $www; ?>/images/logo_b.png" class="logo-dark"> 
                            <img src="<?php echo $www; ?>/images/logo_w.png" class="logo-light"> 
                        </a>
                    </div>
                </div>
                <div class="header-center-items header-items has-menu">
                    <nav id="primary-menu" class="main-navigation">
                        <?php
                        wp_nav_menu( array(
                            'theme_location' => 'primary_menu',
                            'depth'             => 2,
                            'container'      => null,
                            'menu_class'     => 'menu nav-menu',
                        ) );
                        ?>
                    </nav>
                </div>
                <div class="header-right-items header-items">
                   <div class="header-hamburger hamburger-menu" data-target="hamburger-fullscreen">
                        <div class="hamburger-box">
                            <div class="hamburger-inner"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-mobile logo-center ">
            <div class="container-fluid">
                <div class="mobile-menu-hamburger">
                    <button class="mobile-menu-toggle hamburger-menu" data-toggle="off-canvas"
                        data-target="mobile-menu">
                        <span class="hamburger-box">
                            <span class="hamburger-inner">
                            </span>
                        </span>
                    </button>
                </div>
                <div class="site-branding">
                    <a href="<?php echo site_url();?>" class="logo">
                        <img src="<?php echo $www;?>/images/logo_b.png" alt="" class="logo-dark">
                        <img src="<?php echo $www;?>/images/logo_w.png" alt="" class="logo-light">
                    </a>
                </div>
                <div class="mobile-header-icons">
                </div>
            </div>
        </div>
    </header>
	-->
        
        <?php get_template_part( 'template-parts/mobile-menu' ); ?>
        <div class="js-scroll"  data-barba="wrapper"  >
            <div data-barba="container" id="container">
        