<!DOCTYPE html>
<html <?php language_attributes(); ?> >

<!-- Mirrored from ninetheme.com/themes/html-templates/oganik/ by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 07 Jun 2021 07:47:53 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Home One || Oganik || HTML Template For Organic Stores</title>

    <link rel="apple-touch-icon" sizes="180x180" href="<?php bloginfo('template_directory') ?>/<?php bloginfo('template_directory'); ?>/assets/images/favicons/apple-touch-icon.png" />
    <link rel="icon" type="image/png" sizes="32x32" href="<?php bloginfo('template_directory') ?>/<?php bloginfo('template_directory'); ?>/assets/images/favicons/favicon-32x32.png" />
    <link rel="icon" type="image/png" sizes="16x16" href="<?php bloginfo('template_directory') ?>/<?php bloginfo('template_directory'); ?>/assets/images/favicons/favicon-16x16.png" />
    <link rel="manifest" href="<?php bloginfo('template_directory'); ?>/assets/images/favicons/site.webmanifest" />
    <meta name="description" content="Agrikon HTML Template For Agriculture Farm & Farmers" />

    <link rel="preconnect" href="https://fonts.gstatic.com/" />
    <link
        href="https://fonts.googleapis.com/css2?family=Homemade+Apple&amp;family=Abril+Fatface&amp;family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/assets/vendors/bootstrap/bootstrap.min.css" />
    <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/assets/vendors/bootstrap-select/bootstrap-select.min.css" />
    <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/assets/vendors/animate/animate.min.css" />
    <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/assets/vendors/fontawesome/css/all.min.css" />
    <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/assets/vendors/jarallax/jarallax.css" />
    <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/assets/vendors/organik-icon/organik-icons.css" />
    <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/assets/vendors/jquery-magnific-popup/jquery.magnific-popup.css" />
    <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/assets/vendors/nouislider/nouislider.min.css" />
    <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/assets/vendors/nouislider/nouislider.pips.css" />
    <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/assets/vendors/odometer/odometer.min.css" />
    <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/assets/vendors/swiper/swiper.min.css" />
    <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/assets/vendors/tiny-slider/tiny-slider.min.css" />

    <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/assets/css/organik.css" />
</head>

<body>
    <div class="preloader">
        <img class="preloader__image" width="55" src="<?php bloginfo('template_directory'); ?>/assets/images/loader.png" alt="" />
    </div>

    <div class="page-wrapper">
        <header class="main-header">
            <div class="topbar">
                <div class="container">
                    <div class="main-logo">
                        <a href="index-2.html" class="logo">
                            <img src="<?php bloginfo('template_directory'); ?>/assets/images/logo-dark.png" width="105" alt="">
                        </a>
                        <div class="mobile-nav__buttons">
                            <a href="#" class="search-toggler"><i class="organik-icon-magnifying-glass"></i></a>
                            <a href="#" class="mini-cart__toggler"><i class="organik-icon-shopping-cart"></i></a>
                        </div>
                        <span class="fa fa-bars mobile-nav__toggler"></span>
                    </div>
                    <div class="topbar__left">
                        <div class="topbar__social">
                            <a href="#" class="fab fa-twitter"></a>
                            <a href="#" class="fab fa-facebook-square"></a>
                            <a href="#" class="fab fa-instagram"></a>
                        </div>
                        <div class="topbar__info">
                            <i class="organik-icon-email"></i>
                            <p>Email <a
                                    href="https://ninetheme.com/cdn-cgi/l/email-protection#4b22252d240b24392c2a25222065282426"><span
                                        class="__cf_email__"
                                        data-cfemail="ea83848c85aa85988d8b848381c4898587">[email&#160;protected]</span></a>
                            </p>
                        </div>
                    </div>
                    <div class="topbar__right">
                        <div class="topbar__info">
                            <i class="organik-icon-calling"></i>
                            <p>Phone <a href="tel:+92-666-888-0000">92 666 888 0000</a></p>
                        </div>
                        <div class="topbar__buttons">
                            <a href="#" class="search-toggler"><i class="organik-icon-magnifying-glass"></i></a>
                            <a href="#" class="mini-cart__toggler"><i class="organik-icon-shopping-cart"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <nav class="main-menu">
                <div class="container">
                    <div class="main-menu__login">
                        <a href="#"><i class="organik-icon-user"></i>Login / Register</a>
                    </div>
                    <?php wp_nav_menu(
                        array(
                            'theme_location' => 'primary-menu',
                            'container' => 'false',
                            'menu_id' => 'primary-menu',
                            'menu_class' => 'main-menu__list'
                        )
                    )?>
                    <div class="main-menu__language">
                        <img src="<?php bloginfo('template_directory'); ?>/assets/images/resources/flag-1-1.jpg" alt="">
                        <label class="sr-only" for="language-select">select language</label>

                        <select class="selectpicker" id="language-select-header">
                            <option value="english">English</option>
                            <option value="arabic">Arabic</option>
                        </select>
                    </div>
                </div>
            </nav>

        </header>

       