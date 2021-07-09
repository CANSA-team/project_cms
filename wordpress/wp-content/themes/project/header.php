<?php
if (is_user_logged_in()) {
    $user = get_user_meta(get_current_user_id());
    $avatar = get_avatar(get_current_user_id(), 40);
}
$current_url = home_url(add_query_arg(array($_GET), $wp->request));

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

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
    <link href="https://fonts.googleapis.com/css2?family=Homemade+Apple&amp;family=Abril+Fatface&amp;family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap" rel="stylesheet" />
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
    <style>
        .btn-disabled,
        .btn-disabled[disabled] {
            opacity: .4;
            cursor: default !important;
            pointer-events: none;
        }

        .login-input {
            width: 100%;
            height: 61px;
            display: block;
            border: none;
            outline: none;
            background-color: #fff;
            color: var(--thm-color);
            text-align: center;
        }

        #loginform-custom {
            text-align: center;
        }
    </style>
    <style>
        .loader {
            border: 16px solid #f3f3f3;
            border-radius: 50%;
            border-top: 16px solid #3498db;
            width: 120px;
            height: 120px;
            -webkit-animation: spin 2s linear infinite;
            /* Safari */
            animation: spin 2s linear infinite;

        }

        /* Safari */
        @-webkit-keyframes spin {
            0% {
                -webkit-transform: rotate(0deg);
            }

            100% {
                -webkit-transform: rotate(360deg);
            }
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }
    </style>
    <div id="loader" style="position: fixed; width: 100%; height: 100%; background-color: rgba(0, 0, 0, 0.4); z-index: 100; display: none ;">
        <div class="loader" style="position: fixed; top: 45%; left: 45%; z-index: 999; "></div>
    </div>
    <script>
        var loader = document.getElementById('loader');
    </script>
    <div style="position: fixed; height: 100%; width: 100%; background-color: rgb(0, 0, 0,0.5); z-index: 100; display: <?php if (isset($_GET['login'])) {
                                                                                                                            echo 'block';
                                                                                                                        } else {
                                                                                                                            echo 'none';
                                                                                                                        } ?>;" class="login-form">
        <div style="width: 500px; height: 500px; background-color: white; position: absolute; top: 25%;right: 40%;">
            <div id="login-div" class="footer-widget" style="width: 100%; height: 100%;">
                <div style="text-align: right;"><svg style="cursor: pointer;" onclick="hiddenLogin();" xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-x" viewBox="0 0 16 16">
                        <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
                    </svg></div>
                <h1 class="footer-widget__title" style="color: black; text-align: center; font-size: 50px; margin-top: 5px;">Login</h1>
                <?php $args = array(
                    'redirect' =>  $current_url,
                    'form_id' => 'loginform-custom',
                    'label_title'    => __('Site Title'), //Displayed in the login form
                    'label_username' => __('Tài khoản'),
                    'label_password' => __('Password'),
                    'label_remember' => __('Remember Me'),
                    'label_log_in'   => __('Log In'),
                    'remember' => true
                );
                wp_login_form($args); ?>
                <div style="margin-top: 15px; text-align: center;"><span><a href="javascript:void(0)" onclick=" registerAction();">Đăng ký thành viên mới</a></span></div>

                <?php if (isset($_GET['login'])) {
                    echo '<div style="margin-top: 15px;" class="alert alert-danger" role="alert">
                    Sai mật khẩu hoặc tài khoản!
                    </div>';
                }  ?>
                <div id="thongbao"></div>
            </div>
            <div id="register-div" class="footer-widget" style="width: 100%; height: 100%; display: none;">
                <div style="text-align: right;">
                    <svg style="position: absolute; cursor: pointer; left: 15px;" onclick="loginAction();" xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z" />
                    </svg>
                    <svg style="cursor: pointer;" onclick="hiddenLogin();" xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-x" viewBox="0 0 16 16">
                        <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
                    </svg>

                </div>

                <h1 class="footer-widget__title" style="color: black; text-align: center; font-size: 50px; margin-top: 5px;">Register</h1>
                <form name="loginform-custom" id="loginform-custom" action="javascript:void(0)" method="post">

                    <p class="login-username">
                        <label for="user_login">Tài khoản</label>
                        <input type="text" name="log" id="user_register" id="validationCustom01" class="input" value="" size="20" required>
                    </p>
                    <p class="login-email">
                        <label style="margin-right: 20px;" for="user_login">Email</label>
                        <input type="text" name="log" id="email_register" id="validationCustom01" class="input" value="" size="20" required>
                    </p>
                    <p class="login-password">
                        <label for="user_pass">Mật khẩu</label>
                        <input type="password" name="pwd" id="pass_register" id="validationCustom01" class="input" value="" size="20" required>
                    </p>

                    <p class="login-remember"><label><input name="rememberme" type="checkbox" id="rememberme" value="forever"> Chấp nhận điều khoản</label></p>
                    <p class="login-submit">
                        <input type="submit" onclick="register();" name="wp-submit" id="wp-submit" class="button button-primary" value="Đăng ký">
                    </p>
                    <div id="thongbao"></div>
                </form>
            </div>

        </div>
    </div>
    <script>
        const registerDiv = document.getElementById('register-div');
        const loginDiv = document.getElementById('login-div');

        function registerAction() {
            loginDiv.style.display = 'none';
            registerDiv.style.display = 'block';
        }

        function loginAction() {
            loginDiv.style.display = 'block';
            registerDiv.style.display = 'none';
        }

        function hiddenLogin() {
            document.querySelector('.login-form').style.display = 'none';
        }

        function clickLogin() {
            var account = document.getElementById('account').value;
            var password = document.getElementById('password').value;
        }
    </script>
    <script>
        function register() {
            var userName = document.getElementById('user_register').value;
            var email = document.getElementById('email_register').value;
            var password = document.getElementById('pass_register').value;
            var thongbao = document.querySelectorAll('#thongbao');
            $.ajax({
                type: "post", //Phương thức truyền post hoặc get
                dataType: "json", //Dạng dữ liệu trả về xml, json, script, or html
                url: '<?php echo admin_url('admin-ajax.php'); ?>', //Đường dẫn chứa hàm xử lý dữ liệu. Mặc định của WP như vậy
                data: {
                    action: "registerAjax", //Tên action
                    userName: userName,
                    email: email,
                    password: password,
                },
                context: this,
                beforeSend: function() {
                    //Làm gì đó trước khi gửi dữ liệu vào xử lý
                },
                success: function(response) {
                    console.log(Number.isInteger(response));

                    if (Number.isInteger(response)) {
                        loginAction();
                        thongbao[0].innerHTML = `<div style="margin-top: 15px;" class="alert alert-success" role="alert">
                    Đăng ký thành công
                    </div>`
                    } else {
                        thongbao[1].innerHTML = `<div style="margin-top: 15px;" class="alert alert-danger" role="alert">
                    ${response.errors.existing_user_login}
                    </div>`
                    }

                },
                error: function(jqXHR, textStatus, errorThrown) {
                    //Làm gì đó khi có lỗi xảy ra

                }
            })
        }
    </script>
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
                            <p>Email <a href="https://ninetheme.com/cdn-cgi/l/email-protection#4b22252d240b24392c2a25222065282426"><span class="__cf_email__" data-cfemail="ea83848c85aa85988d8b848381c4898587">[email&#160;protected]</span></a>
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
                        <?php if (is_user_logged_in() == false) { ?>
                            <a href="#" onclick=" displayLogin();"><i class="organik-icon-user"></i>Login / Register</a>
                        <?php } else { ?>
                            <div class="dropdown">
                                <button style="background-color: transparent; border: none;" class="btn btn-secondary dropdown-toggle" type="button" id="triggerId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <?php echo $avatar ?>
                                    <span style="color: black;"> <?php echo $user['nickname'][0]  ?></span>
                                </button>
                                <div class="dropdown-menu" aria-labelledby="triggerId" style="z-index: 1000; position: relative;">
                                    <a class="dropdown-item" href="<?php echo wp_logout_url(home_url()); ?>">Logout</a>

                                </div>
                            </div>

                        <?php

                        } ?>
                    </div>
                    <?php wp_nav_menu(
                        array(
                            'theme_location' => 'primary-menu',
                            'container' => 'false',
                            'menu_id' => 'primary-menu',
                            'menu_class' => 'main-menu__list'
                        )
                    ) ?>
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
            <script>
                function displayLogin() {
                    document.querySelector('.login-form').style.display = 'block';
                }
            </script>

        </header>