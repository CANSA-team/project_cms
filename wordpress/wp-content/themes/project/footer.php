 <footer class="site-footer background-black-2">
            <img src="<?php bloginfo('template_directory'); ?>/assets/images/shapes/footer-bg-1-1.png" alt="" class="site-footer__shape-1">
            <img src="<?php bloginfo('template_directory'); ?>/assets/images/shapes/footer-bg-1-2.png" alt="" class="site-footer__shape-2">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
                        <div class="footer-widget footer-widget__about-widget">
                            <a href="index-2.html" class="footer-widget__logo">
                                <img src="<?php bloginfo('template_directory'); ?>/assets/images/logo-light.png" alt="" width="105" height="43">
                            </a>
                                <?php wp_nav_menu(
                                array(
                                    'theme_location' => 'footer-col-1',
                                    'container' => 'false',
                                    'menu_id' => 'footer-col-1',
                                    'menu_class' => 'list-unstyled footer-widget__links',
                                                     
                                )
                            )?>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-2">
                        <div class="footer-widget footer-widget__contact-widget">
                            <h3 class="footer-widget__title">Contact</h3>
                            
                            <?php wp_nav_menu(
                                array(
                                    'theme_location' => 'footer-col-2',
                                    'container' => 'false',
                                    'menu_id' => 'footer-col-2',
                                    'menu_class' => 'list-unstyled footer-widget__contact',
                                    'before'=>'<i class="organik-icon-email"></i>'
                                )
                            )?>
                           
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-2">
                        <div class="footer-widget footer-widget__links-widget">
                                    
                            <h3 class="footer-widget__title">Links</h3>
                            <?php wp_nav_menu(
                                array(
                                    'theme_location' => 'footer-col-3',
                                    'container' => 'false',
                                    'menu_id' => 'footer-col-3',
                                    'menu_class' => 'list-unstyled footer-widget__links',
                                )
                            )?>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-2">
                        <div class="footer-widget">
                            <h3 class="footer-widget__title">Explore</h3>
                            
                            <?php wp_nav_menu(
                                array(
                                    'theme_location' => 'footer-col-4',
                                    'container' => 'false',
                                    'menu_id' => 'footer-col-4',
                                    'menu_class' => 'list-unstyled footer-widget__links'
                                )
                            )?>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
                        <div class="footer-widget">
                            <h3 class="footer-widget__title">Newsletter</h3>
                            <form action="#" data-url="YOUR_MAILCHIMP_URL" class="mc-form">
                                <input type="email" name="EMAIL" id="mc-email" placeholder="Email Address">
                                <button type="submit">Subscribe</button>
                            </form>
                            <div class="mc-form__response"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bottom-footer">
                <div class="container">
                    <hr>
                    <div class="inner-container text-center">
                        <div class="bottom-footer__social">
                            <a href="#" class="fab fa-twitter"></a>
                            <a href="#" class="fab fa-facebook-square"></a>
                            <a href="#" class="fab fa-instagram"></a>
                        </div>
                        <p class="thm-text-dark">© Copyright <span class="dynamic-year"></span> by Company.com</p>
                    </div>
                </div>
            </div>
        </footer>
    </div>
    <div class="mobile-nav__wrapper">
        <div class="mobile-nav__overlay mobile-nav__toggler"></div>

        <div class="mobile-nav__content">
            <span class="mobile-nav__close mobile-nav__toggler"><i class="organik-icon-close"></i></span>
            <div class="logo-box">
                <a href="index-2.html" aria-label="logo image"><img src="<?php bloginfo('template_directory'); ?>/assets/images/logo-light.png" width="155"
                        alt="" /></a>
            </div>

            <div class="mobile-nav__container"></div>

            <ul class="mobile-nav__contact list-unstyled">
                <li>
                    <i class="organik-icon-email"></i>
                    <a
                        href="https://ninetheme.com/cdn-cgi/l/email-protection#630d0606070b060f13230c1104020d0a084d000c0e"><span
                            class="__cf_email__"
                            data-cfemail="6c020909080409001c2c031e0b0d020507420f0301">[email&#160;protected]</span></a>
                </li>
                <li>
                    <i class="organik-icon-calling"></i>
                    <a href="tel:666-888-0000">666 888 0000</a>
                </li>
            </ul>
            <div class="mobile-nav__top">
                <div class="mobile-nav__language">
                    <img src="<?php bloginfo('template_directory'); ?>/assets/images/resources/flag-1-1.jpg" alt="">
                    <label class="sr-only" for="language-select">select language</label>

                    <select class="selectpicker" id="language-select">
                        <option value="english">English</option>
                        <option value="arabic">Arabic</option>
                    </select>
                </div>
                <div class="main-menu__login">
                    <a href="#"><i class="organik-icon-user"></i>Login / Register</a>
                </div>
            </div>
        </div>

    </div>

    <div class="mini-cart">
        <div class="mini-cart__overlay mini-cart__toggler"></div>
        <div class="mini-cart__content">
            <div class="mini-cart__top">
                <h3 class="mini-cart__title">Shopping Cart</h3>
                <span class="mini-cart__close mini-cart__toggler"><i class="organik-icon-close"></i></span>
            </div>
            <div class="mini-cart__item">
                <img src="<?php bloginfo('template_directory'); ?>/assets/images/products/cart-1-1.jpg" alt="">
                <div class="mini-cart__item-content">
                    <div class="mini-cart__item-top">
                        <h3><a href="product-details.html">Banana</a></h3>
                        <p>$9.99</p>
                    </div>
                    <div class="quantity-box">
                        <button type="button" class="sub">-</button>
                        <input type="number" id="1" value="1" />
                        <button type="button" class="add">+</button>
                    </div>
                </div>
            </div>
            <div class="mini-cart__item">
                <img src="<?php bloginfo('template_directory'); ?>/assets/images/products/cart-1-2.jpg" alt="">
                <div class="mini-cart__item-content">
                    <div class="mini-cart__item-top">
                        <h3><a href="product-details.html">Tomato</a></h3>
                        <p>$9.99</p>
                    </div>
                    <div class="quantity-box">
                        <button type="button" class="sub">-</button>
                        <input type="number" id="2" value="1" />
                        <button type="button" class="add">+</button>
                    </div>
                </div>
            </div>
            <div class="mini-cart__item">
                <img src="<?php bloginfo('template_directory'); ?>/assets/images/products/cart-1-3.jpg" alt="">
                <div class="mini-cart__item-content">
                    <div class="mini-cart__item-top">
                        <h3><a href="product-details.html">Bread</a></h3>
                        <p>$9.99</p>
                    </div>
                    <div class="quantity-box">
                        <button type="button" class="sub">-</button>
                        <input type="number" id="3" value="1" />
                        <button type="button" class="add">+</button>
                    </div>
                </div>
            </div>
            <a href="checkout.html" class="thm-btn mini-cart__checkout">Proceed To Checkout</a>
        </div>
    </div>
    <div class="search-popup">
        <div class="search-popup__overlay search-toggler"></div>

        <div class="search-popup__content">
            <form action="#">
                <label for="search" class="sr-only">search here</label>
                <input type="text" id="search" placeholder="Search Here..." />
                <button type="submit" aria-label="search submit" class="thm-btn">
                    <i class="organik-icon-magnifying-glass"></i>
                </button>
            </form>
        </div>

    </div>

    <a href="#" data-target="html" class="scroll-to-target scroll-to-top"><i class="fa fa-angle-up"></i></a>
    <script data-cfasync="false" src="../../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script src="<?php bloginfo('template_directory'); ?>/assets/vendors/jquery/jquery-3.5.1.min.js"></script>
    <script src="<?php bloginfo('template_directory'); ?>/assets/vendors/bootstrap/bootstrap.bundle.min.js"></script>
    <script src="<?php bloginfo('template_directory'); ?>/assets/vendors/bootstrap-select/bootstrap-select.min.js"></script>
    <script src="<?php bloginfo('template_directory'); ?>/assets/vendors/jarallax/jarallax.min.js"></script>
    <script src="<?php bloginfo('template_directory'); ?>/assets/vendors/jquery-ajaxchimp/jquery.ajaxchimp.min.js"></script>
    <script src="<?php bloginfo('template_directory'); ?>/assets/vendors/jquery-appear/jquery.appear.min.js"></script>
    <script src="<?php bloginfo('template_directory'); ?>/assets/vendors/jquery-circle-progress/jquery.circle-progress.min.js"></script>
    <script src="<?php bloginfo('template_directory'); ?>/assets/vendors/jquery-magnific-popup/jquery.magnific-popup.min.js"></script>
    <script src="<?php bloginfo('template_directory'); ?>/assets/vendors/jquery-validate/jquery.validate.min.js"></script>
    <script src="<?php bloginfo('template_directory'); ?>/assets/vendors/nouislider/nouislider.min.js"></script>
    <script src="<?php bloginfo('template_directory'); ?>/assets/vendors/odometer/odometer.min.js"></script>
    <script src="<?php bloginfo('template_directory'); ?>/assets/vendors/swiper/swiper.min.js"></script>
    <script src="<?php bloginfo('template_directory'); ?>/assets/vendors/tiny-slider/tiny-slider.min.js"></script>
    <script src="<?php bloginfo('template_directory'); ?>/assets/vendors/wnumb/wNumb.min.js"></script>
    <script src="<?php bloginfo('template_directory'); ?>/assets/vendors/wow/wow.js"></script>
    <script src="<?php bloginfo('template_directory'); ?>/assets/vendors/isotope/isotope.js"></script>
    <script src="<?php bloginfo('template_directory'); ?>/assets/vendors/countdown/countdown.min.js"></script>

    <script src="<?php bloginfo('template_directory'); ?>/assets/js/organik.js"></script>
    <script defer src="../../../../static.cloudflareinsights.com/beacon.min.js"
        data-cf-beacon='{"rayId":"65b846620c0bae67","version":"2021.5.2","r":1,"token":"72b2ec455a104aa0b3ca4230f1da2518","si":10}'>
    </script>
</body>

<!-- Mirrored from ninetheme.com/themes/html-templates/oganik/ by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 07 Jun 2021 07:48:47 GMT -->

</html>