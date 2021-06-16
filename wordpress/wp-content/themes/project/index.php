<?php get_header(); ?>
 <div class="stricky-header stricked-menu main-menu">
            <div class="sticky-header__content"></div>
        </div>
        
        <!-- Slider -->
        <?php get_template_part('slider') ?>
        <!-- End Slider -->

        <section class="feature-box">
            <div class="container">
                <div class="inner-container wow fadeInUp" data-wow-duration="1500ms">
                    <div class="thm-tiny__slider" id="contact-infos-box" data-tiny-options='{
            "container": "#contact-infos-box",
            "items": 1,
            "slideBy": "page",
            "gutter": 0,
            "mouseDrag": true,
            "autoplay": true,
            "nav": false,
            "controlsPosition": "bottom",
            "controlsText": ["<i class=\"fa fa-angle-left\"></i>", "<i class=\"fa fa-angle-right\"></i>"],
            "autoplayButtonOutput": false,
            "responsive": {
                "640": {
                  "items": 2,
                  "gutter": 30
                },
                "992": {
                  "gutter": 30,
                  "items": 3
                },
                "1200": {
                  "disable": true
                }
              }
         }'>
                        <div>
                            <div class="feature-box__single">
                                <i class="organik-icon-global-shipping feature-box__icon"></i>
                                <div class="feature-box__content">
                                    <h3>Return Policy</h3>
                                    <p>Money back guarantee</p>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="feature-box__single">
                                <i class="organik-icon-delivery-truck feature-box__icon"></i>
                                <div class="feature-box__content">
                                    <h3>Free Shipping</h3>
                                    <p>On all orders over $25.00</p>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="feature-box__single">
                                <i class="organik-icon-online-store feature-box__icon"></i>
                                <div class="feature-box__content">
                                    <h3>Store Locator</h3>
                                    <p>Find your nearest store</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <section class="new-products">
        <img src="<?php bloginfo('template_directory'); ?>/assets/images/shapes/new-product-shape-1.png" alt="" class="new-products__shape-1">
        <div class="container">
            <div class="new-products__top">
                <div class="block-title ">
                    <div class="block-title__decor"></div>
                    <p>Recently Added</p>
                    <h3>New Products</h3>
                </div>
                <ul class="post-filter filters list-unstyled">
                <li class="active filter" data-filter=".filter-item">All</li>
                <?php $orderby = 'name';
			$order = 'asc';
			$hide_empty = false;
			$cat_args = array(
				'orderby'    => $orderby,
				'order'      => $order,
				'hide_empty' => $hide_empty,
			);
			$product_categories = get_terms('product_cat', $cat_args);

            foreach($product_categories as $item){
                if($item->slug != 'uncategorized'){
            ?>
            <li class="filter" data-filter=".category-<?php echo $item->term_id ?>"><?php echo $item->name ?></li>
            <?php }} ?>        
                   
                </ul>
            </div>
           
            <div class="row filter-layout">
            <?php $orderby = 'name';
			$order = 'asc';
			$hide_empty = false;
			$cat_args = array(
				'orderby'    => $orderby,
				'order'      => $order,
				'hide_empty' => $hide_empty,
			);
			$product_categories = get_terms('product_cat', $cat_args);
            $z = 0 ;
            foreach($product_categories as $item){
            ?>
              <?php $args = array(
                        'orderby' =>'date',
                        'order' => 'DESC',
                        'limit' => 3,
                        'tax_query' => array(
                            array(
                                'taxonomy' => 'product_cat',
                                'terms' => $item->term_id,
                                'operator' => 'IN',
                            )
                        )
					);
					$products = wc_get_products($args);
                    $i = 0;
                   
                    foreach($products as $product){
                        
             ?>
                <div class="col-lg-4 col-md-6 <?php if($i == 0 && $z<3){ echo 'filter-item'; $z++;} ?> category-<?php echo $item->term_id ?>">
                    <div class="product-card__two">
                        <div class="product-card__two-image">
                            <span class="product-card__two-sale">sale</span>
                            <img src="<?php bloginfo('template_directory'); ?>/assets/images/products/product-2-1.jpg" alt="">
                            <div class="product-card__two-image-content">
                                <a href="#"><i class="organik-icon-visibility"></i></a>
                                <a href="#"><i class="organik-icon-heart"></i></a>
                                <a href="cart.html"><i class="organik-icon-shopping-cart"></i></a>
                            </div>
                        </div>
                        <div class="product-card__two-content">
                            <h3><a href="<?php echo $product->get_permalink() ?>"><?php echo $product->name ?></a></h3>
                            <div class="product-card__two-stars">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <p><?php echo wc_price($product->get_regular_price()); ?></p>
                        </div>
                    </div>
                </div>
            <?php } } ?>
            </div>
          
        </div>
    </section>
    <section class="offer-banner">
        <div class="container">
            <div class="row">
                <div class="col-md-6 wow fadeInLeft" data-wow-duration="1500ms" data-wow-delay="0ms">
                    <div class="offer-banner__box"
                        style="background-image: url(<?php bloginfo('template_directory'); ?>/assets/images/resources/offer-banner-1-1.jpg);">
                        <div class="offer-banner__content">
                            <h3><span>100%</span> <br>Organic</h3>
                            <p>Quality Organic Food Store</p>
                            <a href="products.html" class="thm-btn">Order Now</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 wow fadeInRight" data-wow-duration="1500ms" data-wow-delay="100ms">
                    <div class="offer-banner__box"
                        style="background-image: url(<?php bloginfo('template_directory'); ?>/assets/images/resources/offer-banner-1-2.jpg);">
                        <div class="offer-banner__content">
                            <h3><span>100%</span> <br>Organic</h3>
                            <p>Quality Organic Food Store</p>
                            <a href="products.html" class="thm-btn">Order Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="funfact-one jarallax" data-jarallax data-speed="0.3" data-imgPosition="50% 50%">
        <img src="<?php bloginfo('template_directory'); ?>/assets/images/backgrounds/funfact-bg-1-1.jpg" class="jarallax-img" alt="">
        <div class="container">
            <div class="row no-gutters">
                <div class="col-md-6 col-lg-3  wow fadeInLeft" data-wow-duration="1500ms" data-wow-delay="0ms">
                    <div class="funfact-one__single">
                        <h3 class="odometer" data-count="8080">00</h3>
                        <p>Organic Products Available</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3  wow fadeInLeft" data-wow-duration="1500ms" data-wow-delay="100ms">
                    <div class="funfact-one__single">
                        <h3 class="odometer" data-count="697">00</h3>
                        <p>Healthy Recipes</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3  wow fadeInLeft" data-wow-duration="1500ms" data-wow-delay="200ms">
                    <div class="funfact-one__single">
                        <h3 class="odometer" data-count="440">00</h3>
                        <p>Expert Team Members</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3  wow fadeInLeft" data-wow-duration="1500ms" data-wow-delay="300ms">
                    <div class="funfact-one__single">
                        <h3 class="odometer" data-count="2870">00</h3>
                        <p>Satisfied Customers</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="call-to-action">
        <img src="<?php bloginfo('template_directory'); ?>/assets/images/shapes/call-shape-1.png" alt="" class="call-to-action__shape-1">
        <img src="<?php bloginfo('template_directory'); ?>/assets/images/shapes/call-shape-2.png" alt="" class="call-to-action__shape-2 wow fadeInLeft"
            data-wow-duration="1500ms">
        <h2 class="floated-text">Organic</h2>
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-lg-12 col-xl-6 clearfix">
                    <img src="<?php bloginfo('template_directory'); ?>/assets/images/resources/call-1-1.jpg" class="call-to-action__image" alt="">
                </div>
                <div class="col-md-12 col-lg-12 col-xl-6 clearfix">
                    <div class="call-to-action__content">
                        <div class="block-title text-left">
                            <div class="block-title__decor"
                                style="background-image: url(<?php bloginfo('template_directory'); ?>/assets/images/shapes/leaf-2-1.png);"></div>

                            <p>Shopping Store</p>
                            <h3>Organic Food Only</h3>
                        </div>
                        <p>There are many variations of passages of lorem ipsum available but the majority have
                            suffered
                            alteration in some form by injected humor or random word.</p>
                        <div class="call-to-action__wrap">
                            <div class="row no-gutters">
                                <div class="col-md-6">
                                    <div class="call-to-action__box">
                                        <i class="organik-icon-farmer"></i>
                                        <h3>Professional
                                            Farmers</h3>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="call-to-action__box">
                                        <i class="organik-icon-farm"></i>
                                        <h3>Solution
                                            for Farming</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a href="products.html" class="thm-btn">Order Now</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="client-carousel ">
        <div class="container">
            <div class="thm-swiper__slider swiper-container" data-swiper-options='{"spaceBetween": 140, "slidesPerView": 5, "autoplay": { "delay": 5000 }, "breakpoints": {
            "0": {
                "spaceBetween": 30,
                "slidesPerView": 2
            },
            "375": {
                "spaceBetween": 30,
                "slidesPerView": 2
            },
            "575": {
                "spaceBetween": 30,
                "slidesPerView": 3
            },
            "767": {
                "spaceBetween": 50,
                "slidesPerView": 4
            },
            "991": {
                "spaceBetween": 50,
                "slidesPerView": 5
            },
            "1199": {
                "spaceBetween": 100,
                "slidesPerView": 5
            }
        }}'>
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <img src="<?php bloginfo('template_directory'); ?>/assets/images/resources/brand-1-1.png" alt="">
                    </div>
                    <div class="swiper-slide">
                        <img src="<?php bloginfo('template_directory'); ?>/assets/images/resources/brand-1-1.png" alt="">
                    </div>
                    <div class="swiper-slide">
                        <img src="<?php bloginfo('template_directory'); ?>/assets/images/resources/brand-1-1.png" alt="">
                    </div>
                    <div class="swiper-slide">
                        <img src="<?php bloginfo('template_directory'); ?>/assets/images/resources/brand-1-1.png" alt="">
                    </div>
                    <div class="swiper-slide">
                        <img src="<?php bloginfo('template_directory'); ?>/assets/images/resources/brand-1-1.png" alt="">
                    </div>
                    <div class="swiper-slide">
                        <img src="<?php bloginfo('template_directory'); ?>/assets/images/resources/brand-1-1.png" alt="">
                    </div>
                    <div class="swiper-slide">
                        <img src="<?php bloginfo('template_directory'); ?>/assets/images/resources/brand-1-1.png" alt="">
                    </div>
                    <div class="swiper-slide">
                        <img src="<?php bloginfo('template_directory'); ?>/assets/images/resources/brand-1-1.png" alt="">
                    </div>
                    <div class="swiper-slide">
                        <img src="<?php bloginfo('template_directory'); ?>/assets/images/resources/brand-1-1.png" alt="">
                    </div>
                    <div class="swiper-slide">
                        <img src="<?php bloginfo('template_directory'); ?>/assets/images/resources/brand-1-1.png" alt="">
                    </div>
                    <div class="swiper-slide">
                        <img src="<?php bloginfo('template_directory'); ?>/assets/images/resources/brand-1-1.png" alt="">
                    </div>
                    <div class="swiper-slide">
                        <img src="<?php bloginfo('template_directory'); ?>/assets/images/resources/brand-1-1.png" alt="">
                    </div>
                    <div class="swiper-slide">
                        <img src="<?php bloginfo('template_directory'); ?>/assets/images/resources/brand-1-1.png" alt="">
                    </div>
                    <div class="swiper-slide">
                        <img src="<?php bloginfo('template_directory'); ?>/assets/images/resources/brand-1-1.png" alt="">
                    </div>
                    <div class="swiper-slide">
                        <img src="<?php bloginfo('template_directory'); ?>/assets/images/resources/brand-1-1.png" alt="">
                    </div>
                    <div class="swiper-slide">
                        <img src="<?php bloginfo('template_directory'); ?>/assets/images/resources/brand-1-1.png" alt="">
                    </div>
                    <div class="swiper-slide">
                        <img src="<?php bloginfo('template_directory'); ?>/assets/images/resources/brand-1-1.png" alt="">
                    </div>
                    <div class="swiper-slide">
                        <img src="<?php bloginfo('template_directory'); ?>/assets/images/resources/brand-1-1.png" alt="">
                    </div>
                    <div class="swiper-slide">
                        <img src="<?php bloginfo('template_directory'); ?>/assets/images/resources/brand-1-1.png" alt="">
                    </div>
                    <div class="swiper-slide">
                        <img src="<?php bloginfo('template_directory'); ?>/assets/images/resources/brand-1-1.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="call-to-action-two">
        <img src="<?php bloginfo('template_directory'); ?>/assets/images/shapes/call-shape-2-1.png" alt="" class="call-to-action-two__shape-1">
        <img src="<?php bloginfo('template_directory'); ?>/assets/images/shapes/call-shape-2-2.png" alt="" class="call-to-action-two__shape-2">
        <img src="<?php bloginfo('template_directory'); ?>/assets/images/shapes/call-shape-2-3.png" alt="" class="call-to-action-two__shape-3">
        <img src="<?php bloginfo('template_directory'); ?>/assets/images/shapes/call-shape-2-4.png" alt="" class="call-to-action-two__shape-4">
        <img src="<?php bloginfo('template_directory'); ?>/assets/images/shapes/call-shape-2-5.png" alt="" class="call-to-action-two__shape-5">
        <img src="<?php bloginfo('template_directory'); ?>/assets/images/shapes/call-shape-2-6.png" alt="" class="call-to-action-two__shape-6">
        <div class="container">
            <div class="row flex-xl-row-reverse">
                <div class="col-lg-12 col-xl-6">
                    <div class="call-to-action-two__image">
                        <h2 class="floated-text">Healthy</h2>
                        <img src="<?php bloginfo('template_directory'); ?>/assets/images/resources/call-2-1.png" alt="">
                    </div>
                </div>
                <div class="col-lg-12 col-xl-6">
                    <div class="call-to-action-two__content">
                        <div class="block-title text-left">
                            <div class="block-title__decor"></div>
                            <p>Pure Organic Products</p>
                            <h3>Everyday Fresh Food</h3>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <h4>Duis aute irure dolor in reprehen in derit.</h4>
                                <p>Voluptate velit essects quis tempor orci. Suspendisse that potenti faucibus.</p>
                            </div>
                            <div class="col-md-6">
                                <ul class="list-unstyled">
                                    <li>
                                        <i class="far fa-check-circle"></i>
                                        Refresing to get such a touch
                                    </li>
                                    <li>
                                        <i class="far fa-check-circle"></i>
                                        Duis aute irure dolor in
                                    </li>
                                    <li>
                                        <i class="far fa-check-circle"></i>
                                        Reprehenderit in voluptate
                                    </li>
                                    <li>
                                        <i class="far fa-check-circle"></i>
                                        Velit esse cillum dolore eu
                                    </li>
                                    <li>
                                        <i class="far fa-check-circle"></i>
                                        Fugiat nulla pariatur
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <a href="products.html" class="thm-btn">Order Now</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="testimonials-one">
        <div class="testimonials-one__head">
            <div class="container">
                <div class="block-title text-center">
                    <div class="block-title__decor"></div>
                    <p>Our Testimonials</p>
                    <h3>What People Say?</h3>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="thm-tiny__slider" id="testimonials-one-box" data-tiny-options='{
        "container": "#testimonials-one-box",
        "items": 1,
        "slideBy": "page",
        "gutter": 0,
        "mouseDrag": true,
        "autoplay": true,
        "nav": false,
        "controlsPosition": "bottom",
        "controlsText": ["<i class=\"fa fa-angle-left\"></i>", "<i class=\"fa fa-angle-right\"></i>"],
        "autoplayButtonOutput": false,
        "responsive": {
            "640": {
                "items": 2,
                "gutter": 30
            },
            "992": {
                "gutter": 30,
                "items": 3
            },
            "1200": {
                "disable": true
            }
            }
    }'>
                <div>
                    <div class="testimonials-one__single">
                        <div class="testimonials-one__image">
                            <img src="<?php bloginfo('template_directory'); ?>/assets/images/resources/testi-1-1.png" alt="">
                        </div>
                        <div class="testimonials-one__content">
                            <p>I was very impresed by the osfins service lorem ipsum is simply free text used by
                                copy typing
                                refreshing. Neque porro est qui dolorem ipsum.</p>
                            <h3>Winnie Collier</h3>
                            <span>Customer</span>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="testimonials-one__single">
                        <div class="testimonials-one__image">
                            <img src="<?php bloginfo('template_directory'); ?>/assets/images/resources/testi-1-2.png" alt="">
                        </div>
                        <div class="testimonials-one__content">
                            <p>I was very impresed by the osfins service lorem ipsum is simply free text used by
                                copy typing
                                refreshing. Neque porro est qui dolorem ipsum.</p>
                            <h3>Helen Woods</h3>
                            <span>Customer</span>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="testimonials-one__single">
                        <div class="testimonials-one__image">
                            <img src="<?php bloginfo('template_directory'); ?>/assets/images/resources/testi-1-3.png" alt="">
                        </div>
                        <div class="testimonials-one__content">
                            <p>I was very impresed by the osfins service lorem ipsum is simply free text used by
                                copy typing
                                refreshing. Neque porro est qui dolorem ipsum.</p>
                            <h3>Ethan Thomas</h3>
                            <span>Customer</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="gallery-one">
        <div class="container-fluid">
            <div class="block-title text-center">
                <div class="block-title__decor"></div>
                <p>We’re On Instagram</p>
                <h3>Shop on Instagram</h3>
            </div>
            <div class="swiper-container thm-swiper__slider" data-swiper-options='{"slidesPerView": 1, "loop": true,
    "autoplay": {
        "delay": 5000
    }, "breakpoints": {
        "0": {
            "spaceBetween": 0,
            "slidesPerView": 1
        },
        "375": {
            "spaceBetween": 0,
            "slidesPerView": 1
        },
        "575": {
            "spaceBetween": 10,
            "slidesPerView": 2
        },
        "767": {
            "spaceBetween": 10,
            "slidesPerView": 3
        },
        "991": {
            "spaceBetween": 10,
            "slidesPerView": 5
        },
        "1199": {
            "spaceBetween": 10,
            "slidesPerView": 5
        }
    }}'>
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="gallery-one__item">
                            <img src="<?php bloginfo('template_directory'); ?>/assets/images/gallery/gallery-1-1.jpg" alt="">
                            <a href="<?php bloginfo('template_directory'); ?>/assets/images/gallery/gallery-1-1.jpg" class="img-popup"><i
                                    class="fa fa-plus"></i></a>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="gallery-one__item">
                            <img src="<?php bloginfo('template_directory'); ?>/assets/images/gallery/gallery-1-2.jpg" alt="">
                            <a href="<?php bloginfo('template_directory'); ?>/assets/images/gallery/gallery-1-2.jpg" class="img-popup"><i
                                    class="fa fa-plus"></i></a>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="gallery-one__item">
                            <img src="<?php bloginfo('template_directory'); ?>/assets/images/gallery/gallery-1-3.jpg" alt="">
                            <a href="<?php bloginfo('template_directory'); ?>/assets/images/gallery/gallery-1-3.jpg" class="img-popup"><i
                                    class="fa fa-plus"></i></a>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="gallery-one__item">
                            <img src="<?php bloginfo('template_directory'); ?>/assets/images/gallery/gallery-1-4.jpg" alt="">
                            <a href="<?php bloginfo('template_directory'); ?>/assets/images/gallery/gallery-1-4.jpg" class="img-popup"><i
                                    class="fa fa-plus"></i></a>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="gallery-one__item">
                            <img src="<?php bloginfo('template_directory'); ?>/assets/images/gallery/gallery-1-5.jpg" alt="">
                            <a href="<?php bloginfo('template_directory'); ?>/assets/images/gallery/gallery-1-5.jpg" class="img-popup"><i
                                    class="fa fa-plus"></i></a>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="gallery-one__item">
                            <img src="<?php bloginfo('template_directory'); ?>/assets/images/gallery/gallery-1-1.jpg" alt="">
                            <a href="<?php bloginfo('template_directory'); ?>/assets/images/gallery/gallery-1-1.jpg" class="img-popup"><i
                                    class="fa fa-plus"></i></a>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="gallery-one__item">
                            <img src="<?php bloginfo('template_directory'); ?>/assets/images/gallery/gallery-1-2.jpg" alt="">
                            <a href="<?php bloginfo('template_directory'); ?>/assets/images/gallery/gallery-1-2.jpg" class="img-popup"><i
                                    class="fa fa-plus"></i></a>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="gallery-one__item">
                            <img src="<?php bloginfo('template_directory'); ?>/assets/images/gallery/gallery-1-3.jpg" alt="">
                            <a href="<?php bloginfo('template_directory'); ?>/assets/images/gallery/gallery-1-3.jpg" class="img-popup"><i
                                    class="fa fa-plus"></i></a>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="gallery-one__item">
                            <img src="<?php bloginfo('template_directory'); ?>/assets/images/gallery/gallery-1-4.jpg" alt="">
                            <a href="<?php bloginfo('template_directory'); ?>/assets/images/gallery/gallery-1-4.jpg" class="img-popup"><i
                                    class="fa fa-plus"></i></a>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="gallery-one__item">
                            <img src="<?php bloginfo('template_directory'); ?>/assets/images/gallery/gallery-1-5.jpg" alt="">
                            <a href="<?php bloginfo('template_directory'); ?>/assets/images/gallery/gallery-1-5.jpg" class="img-popup"><i
                                    class="fa fa-plus"></i></a>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="gallery-one__item">
                            <img src="<?php bloginfo('template_directory'); ?>/assets/images/gallery/gallery-1-1.jpg" alt="">
                            <a href="<?php bloginfo('template_directory'); ?>/assets/images/gallery/gallery-1-1.jpg" class="img-popup"><i
                                    class="fa fa-plus"></i></a>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="gallery-one__item">
                            <img src="<?php bloginfo('template_directory'); ?>/assets/images/gallery/gallery-1-2.jpg" alt="">
                            <a href="<?php bloginfo('template_directory'); ?>/assets/images/gallery/gallery-1-2.jpg" class="img-popup"><i
                                    class="fa fa-plus"></i></a>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="gallery-one__item">
                            <img src="<?php bloginfo('template_directory'); ?>/assets/images/gallery/gallery-1-3.jpg" alt="">
                            <a href="<?php bloginfo('template_directory'); ?>/assets/images/gallery/gallery-1-3.jpg" class="img-popup"><i
                                    class="fa fa-plus"></i></a>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="gallery-one__item">
                            <img src="<?php bloginfo('template_directory'); ?>/assets/images/gallery/gallery-1-4.jpg" alt="">
                            <a href="<?php bloginfo('template_directory'); ?>/assets/images/gallery/gallery-1-4.jpg" class="img-popup"><i
                                    class="fa fa-plus"></i></a>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="gallery-one__item">
                            <img src="<?php bloginfo('template_directory'); ?>/assets/images/gallery/gallery-1-5.jpg" alt="">
                            <a href="<?php bloginfo('template_directory'); ?>/assets/images/gallery/gallery-1-5.jpg" class="img-popup"><i
                                    class="fa fa-plus"></i></a>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="gallery-one__item">
                            <img src="<?php bloginfo('template_directory'); ?>/assets/images/gallery/gallery-1-1.jpg" alt="">
                            <a href="<?php bloginfo('template_directory'); ?>/assets/images/gallery/gallery-1-1.jpg" class="img-popup"><i
                                    class="fa fa-plus"></i></a>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="gallery-one__item">
                            <img src="<?php bloginfo('template_directory'); ?>/assets/images/gallery/gallery-1-2.jpg" alt="">
                            <a href="<?php bloginfo('template_directory'); ?>/assets/images/gallery/gallery-1-2.jpg" class="img-popup"><i
                                    class="fa fa-plus"></i></a>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="gallery-one__item">
                            <img src="<?php bloginfo('template_directory'); ?>/assets/images/gallery/gallery-1-3.jpg" alt="">
                            <a href="<?php bloginfo('template_directory'); ?>/assets/images/gallery/gallery-1-3.jpg" class="img-popup"><i
                                    class="fa fa-plus"></i></a>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="gallery-one__item">
                            <img src="<?php bloginfo('template_directory'); ?>/assets/images/gallery/gallery-1-4.jpg" alt="">
                            <a href="<?php bloginfo('template_directory'); ?>/assets/images/gallery/gallery-1-4.jpg" class="img-popup"><i
                                    class="fa fa-plus"></i></a>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="gallery-one__item">
                            <img src="<?php bloginfo('template_directory'); ?>/assets/images/gallery/gallery-1-5.jpg" alt="">
                            <a href="<?php bloginfo('template_directory'); ?>/assets/images/gallery/gallery-1-5.jpg" class="img-popup"><i
                                    class="fa fa-plus"></i></a>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="gallery-one__item">
                            <img src="<?php bloginfo('template_directory'); ?>/assets/images/gallery/gallery-1-1.jpg" alt="">
                            <a href="<?php bloginfo('template_directory'); ?>/assets/images/gallery/gallery-1-1.jpg" class="img-popup"><i
                                    class="fa fa-plus"></i></a>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="gallery-one__item">
                            <img src="<?php bloginfo('template_directory'); ?>/assets/images/gallery/gallery-1-2.jpg" alt="">
                            <a href="<?php bloginfo('template_directory'); ?>/assets/images/gallery/gallery-1-2.jpg" class="img-popup"><i
                                    class="fa fa-plus"></i></a>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="gallery-one__item">
                            <img src="<?php bloginfo('template_directory'); ?>/assets/images/gallery/gallery-1-3.jpg" alt="">
                            <a href="<?php bloginfo('template_directory'); ?>/assets/images/gallery/gallery-1-3.jpg" class="img-popup"><i
                                    class="fa fa-plus"></i></a>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="gallery-one__item">
                            <img src="<?php bloginfo('template_directory'); ?>/assets/images/gallery/gallery-1-4.jpg" alt="">
                            <a href="<?php bloginfo('template_directory'); ?>/assets/images/gallery/gallery-1-4.jpg" class="img-popup"><i
                                    class="fa fa-plus"></i></a>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="gallery-one__item">
                            <img src="<?php bloginfo('template_directory'); ?>/assets/images/gallery/gallery-1-5.jpg" alt="">
                            <a href="<?php bloginfo('template_directory'); ?>/assets/images/gallery/gallery-1-5.jpg" class="img-popup"><i
                                    class="fa fa-plus"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php get_footer(); ?>      