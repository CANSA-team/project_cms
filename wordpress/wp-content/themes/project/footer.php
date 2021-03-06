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
                        ) ?>
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
                                'before' => '<i class="organik-icon-email"></i>'
                            )
                        ) ?>
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
                        ) ?>
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
                        ) ?>
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
                 <p class="thm-text-dark">?? Copyright <span class="dynamic-year"></span> by Company.com</p>
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
             <a href="index-2.html" aria-label="logo image"><img src="<?php bloginfo('template_directory'); ?>/assets/images/logo-light.png" width="155" alt="" /></a>
         </div>

         <div class="mobile-nav__container"></div>

         <ul class="mobile-nav__contact list-unstyled">
             <li>
                 <i class="organik-icon-email"></i>
                 <a href="https://ninetheme.com/cdn-cgi/l/email-protection#630d0606070b060f13230c1104020d0a084d000c0e"><span class="__cf_email__" data-cfemail="6c020909080409001c2c031e0b0d020507420f0301">[email&#160;protected]</span></a>
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
     <div class="mini-cart__content" id="cartAllItem">
         <div class="mini-cart__top">
             <h3 class="mini-cart__title">Shopping Cart</h3>
             <span class="mini-cart__close mini-cart__toggler"><i class="organik-icon-close"></i></span>
         </div>
         <?php
            $cart = [];
            if (is_user_logged_in()) {
                $user = get_user_meta(get_current_user_id());
                $cart = unserialize($user['_woocommerce_persistent_cart_1'][0])['cart'];
            } else {
                echo '<div style="color: white;">Vui l??ng ????ng nh???p ????? add cart!!</div>';
            }
            if ($cart != null) {
                foreach ($cart as $item) {
                    $product = wc_get_product($item['product_id']);
            ?>
                 <div class="mini-cart__item" id="<?php echo $item['key'] ?>">
                     <div style="position: absolute; width: 90%; text-align: right;"><svg style="cursor: pointer;" onclick="delete1('<?php echo $item['key'] ?>');" xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="white" class="bi bi-x" viewBox="0 0 16 16">
                             <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
                         </svg></div>
                     <img src="<?php echo wp_get_attachment_url($product->get_image_id()); ?>" alt="">
                     <div class="mini-cart__item-content" style="z-index: 999;">
                         <div class="mini-cart__item-top">
                             <h3><a href="<?php echo $product->get_permalink() ?>"><?php echo $product->name ?></a></h3>
                             <p id="total-<?php echo $item['key'] ?>"> <?php echo wc_price($item['line_subtotal']); ?></p>
                             <input type="hidden" id="price-<?php echo $item['key'] ?>" value="<?php echo $product->get_regular_price() ?>">
                         </div>
                         <div class="quantity-box">
                             <button type="button" onclick="priceUpdateMinus('<?php echo $item['key'] ?>')" class="sub">-</button>
                             <input type="number" id="quality-<?php echo $item['key'] ?>" value="<?php echo $item['quantity']; ?>" />
                             <button type="button" onclick="priceUpdatePlus('<?php echo $item['key'] ?>')" class="add">+</button>
                         </div>
                     </div>
                 </div>
         <?php }
            } ?>

         <div class="spinner-border" role="status" id="load" style="margin-left: 130px; display: none;">
             <span class="sr-only">Loading...</span>
         </div>
         
         <a href="<?php echo get_home_url() ?>/trang-cart" class="thm-btn mini-cart__checkout">Proceed To Checkout</a>

     </div>
 </div>
 <script>
     function priceUpdatePlus(key) {
         var quality = document.querySelectorAll('#quality-' + key);
         var temp = 0;
         quality.forEach(element => {
             element.value++
             temp = element.value
         });
         console.log(temp)
         var priceRegular = document.getElementById('price-' + key).value;
         var priceTotal = document.querySelectorAll('#total-' + key);
         var quality = document.querySelectorAll('#quality-' + key);
         var prevalue = temp
         var total = prevalue * priceRegular;
         priceTotal.forEach(element => {
             element.innerHTML = total;
         });
         changQuality(key, prevalue)
         changeTotal();
     }

     function priceUpdateMinus(key) {
         var quality = document.querySelectorAll('#quality-' + key);
         quality.forEach(element => {
             element.value--
             temp = element.value
         });
         console.log(temp)
         var priceRegular = document.getElementById('price-' + key).value;
         var priceTotal = document.querySelectorAll('#total-' + key);
         var quality = document.querySelectorAll('#quality-' + key);
         var prevalue = temp
         var total = prevalue * priceRegular;
         priceTotal.forEach(element => {
             element.innerHTML = total;
         });
         changQuality(key, prevalue)
         changeTotal();

     }

     function changQuality(key, quality) {
         $.ajax({
             type: "post", //Ph????ng th???c truy???n post ho???c get
             dataType: "json", //D???ng d??? li???u tr??? v??? xml, json, script, or html
             url: '<?php echo admin_url('admin-ajax.php'); ?>', //???????ng d???n ch???a h??m x??? l?? d??? li???u. M???c ?????nh c???a WP nh?? v???y
             data: {
                 action: "QualityAjax", //T??n action
                 key: key,
                 quality: quality,
             },
             context: this,
             beforeSend: function() {
                 //L??m g?? ???? tr?????c khi g???i d??? li???u v??o x??? l??
                 document.getElementById('load').style.display = 'block';
             },
             success: function(response) {
                 if (response == true) {
                     document.getElementById('load').style.display = 'none';
                 }
             },
             error: function(jqXHR, textStatus, errorThrown) {
                 //L??m g?? ???? khi c?? l???i x???y ra
             }
         })
     }

     function delete1(item) {
         var check = confirm('B???n c?? mu???n x??a?')
         if (check) {
             $.ajax({
                 type: "post", //Ph????ng th???c truy???n post ho???c get
                 dataType: "json", //D???ng d??? li???u tr??? v??? xml, json, script, or html
                 url: '<?php echo admin_url('admin-ajax.php'); ?>', //???????ng d???n ch???a h??m x??? l?? d??? li???u. M???c ?????nh c???a WP nh?? v???y
                 data: {
                     action: "DeleteCartAjax", //T??n action
                     key: item,

                 },
                 context: this,
                 beforeSend: function() {
                     //L??m g?? ???? tr?????c khi g???i d??? li???u v??o x??? l??
                     document.getElementById('load').style.display = 'block';

                 },
                 success: function(response) {

                     if (response == true) {
                         document.getElementById(item + '').remove();
                         document.getElementById('load').style.display = 'none';
                     }
                 },
                 error: function(jqXHR, textStatus, errorThrown) {
                     //L??m g?? ???? khi c?? l???i x???y ra
                 }
             })
         }
     }
 </script>
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
 <script>
     function addCart(id, quality) {
         $.ajax({
             type: "post", //Ph????ng th???c truy???n post ho???c get
             dataType: "json", //D???ng d??? li???u tr??? v??? xml, json, script, or html
             url: '<?php echo admin_url('admin-ajax.php'); ?>', //???????ng d???n ch???a h??m x??? l?? d??? li???u. M???c ?????nh c???a WP nh?? v???y
             data: {
                 action: "addCartAjax", //T??n action
                 id: id,
                 quality: quality,
             },
             context: this,
             beforeSend: function() {
                 //L??m g?? ???? tr?????c khi g???i d??? li???u v??o x??? l??
                 document.getElementById('load').style.display = 'block';
                 loader.style.display = 'block';

             },
             success: function(response) {
                 document.getElementById('cartAllItem').innerHTML += ` <div class="mini-cart__item" id="${response.key}">
                 <div style="position: absolute; width: 90%; text-align: right;"><svg style="cursor: pointer;" onclick="delete1('${response.key}');" xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="white" class="bi bi-x" viewBox="0 0 16 16">
                         <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
                     </svg></div>
                 <img src="${response.img}" alt="">
                 <div class="mini-cart__item-content" style="z-index: 999;">
                     <div class="mini-cart__item-top">
                         <h3><a href="${response.url}">${response.name}</a></h3>
                         <p id="total-${response.key}">$${parseInt(response.quality)*parseInt(response.Price)}</p>
                         <input type="hidden" id="price-${response.key}" value="${response.Price}">
                     </div>
                     <div class="quantity-box">
                         <button type="button" onclick="priceUpdateMinus('${response.key}')" class="sub">-</button>
                         <input type="number" id="quality-${response.key}" value="${response.quality}" />
                         <button type="button" onclick="priceUpdatePlus('${response.key}')" class="add">+</button>
                     </div>
                 </div>
             </div>`;
                 document.getElementById('load').style.display = 'none';
                 loader.style.display = 'none';
             },
             error: function(jqXHR, textStatus, errorThrown) {
                 //L??m g?? ???? khi c?? l???i x???y ra
             }
         })
     }
 </script>
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
 <script defer src="../../../../static.cloudflareinsights.com/beacon.min.js" data-cf-beacon='{"rayId":"65b846620c0bae67","version":"2021.5.2","r":1,"token":"72b2ec455a104aa0b3ca4230f1da2518","si":10}'>
 </script>
 </body>

 <!-- Mirrored from ninetheme.com/themes/html-templates/oganik/ by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 07 Jun 2021 07:48:47 GMT -->

 </html>