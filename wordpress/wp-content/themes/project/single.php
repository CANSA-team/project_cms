<?php

/**
 * Template name: Trang chi tiết sản phẩm
 *
 */
get_header();
//var_dump(get_the_tags($post->ID));
$image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), "full");
?>
<!-- Comment -->
<?php
$comments = get_comments(array(
    'post_id' => $post->ID
));
?>

<div class="stricky-header stricked-menu main-menu">
    <div class="sticky-header__content"></div>
</div>
<section class="page-header">
    <div class="page-header__bg" style="background-image: url(<?php bloginfo('template_directory'); ?>/assets/images/backgrounds/page-header-bg-1-1.jpg);"></div>

    <div class="container">
        <h2>Blog Details</h2>
        <ul class="thm-breadcrumb list-unstyled">
            <?php $args = array(
                'delimiter' => '/',
                'wrap_before' => '',
                'wrap_after'  => '',
                'before' => '<li>' . __('', 'woothemes'),
                'after' => '</li>'
            );
            woocommerce_breadcrumb($args);
            ?>
        </ul>
    </div>
</section>


<section class="blog-details">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-8">
                <div class="blog-card__image blog-details__image">
                    <div class="blog-card__date">18 Nov</div>
                    <img src="<?php echo $image[0] ?>" class="img-fluid" alt="">
                </div>
                <div class="blog-card__meta">
                    <a href="news-details.html"><i class="far fa-user-circle"></i> by Admin</a>
                    <a href="news-details.html"><i class="far fa-comments"></i> 2 Comments</a>
                </div>
                <div class="blog-details__content blog-card__content">
                    <h3><?php echo $post->post_title ?></h3>
                    <p><?php echo $post->post_content ?></p>
                </div>
                <div class="blog-details__meta">
                    <p class="blog-details__tags"><span>Tags:</span><a href="#">Oragnic,</a><a href="#">Healthy,</a><a href="#">Recipes</a></p>
                    <div class="blog-details__social">
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-facebook-square"></i></a>
                        <a href="#"><i class="fab fa-linkedin"></i></a>
                    </div>
                </div>
                <div class="blog-author">
                    <div class="blog-author__image">
                        <img src="assets/images/blog/blog-author-1-1.jpg" alt="">
                    </div>
                    <div class="blog-author__content">
                        <h3>Curtis Swanson</h3>
                        <p>Lorem ipsum is simply free text used by copytyping refreshing. Neque porro est qui dolorem
                            ipsum quia quaed veritatis et quasi architecto.</p>
                    </div>
                </div>
                <div class="blog-comment">
                    <h2> <?php echo count($comments) ?> Comments</h2>
                    <?php if (!empty($comments)) {
                        foreach ($comments as $item) { ?>
                            <div class="blog-comment__box">
                                <div class="blog-comment__image">
                                    <img src="<?php echo get_template_directory_uri() ?>/assets/images/blog/blog-comment-1-2.jpg" alt="">
                                </div>
                                <div class="blog-comment__content">
                                    <div class="blog-comment__content-top">
                                        <h3><?php echo $item->comment_author ?></h3>
                                        <span><?php echo $item->comment_date ?></span>
                                    </div>
                                    <p><?php echo $item->comment_content ?></p>
                                    
                                </div>
                            </div>
                    <?php }
                    } ?>

                </div>
                <div class="comment-form">
                    <h2>Leave a Comments</h2>
                    <form class="contact-one__form contact-form-validated">
                        <div class="row">
                            <div class="col-lg-6">
                                <input type="text" name="name" placeholder="Full Name" required="" id="review_name">
                            </div>
                            <div class="col-lg-6">
                                <input type="text" name="email" placeholder="Email Address" required="" id="review_email">
                            </div>
                            <div class="col-lg-6">
                                <input type="text" name="phone" placeholder="Phone Number" required="" id="review_phone">
                            </div>
                            <div class="col-lg-6">
                                <input type="text" name="subject" placeholder="Subject" required="" id="review_subject">
                            </div>
                            <div class="col-lg-12">
                                <textarea name="message" placeholder="Write Message" required="" id="review_message"></textarea>
                            </div>
                            <div class="col-lg-12">
                                <button style="cursor: pointer;"  class="thm-btn">Submit Comment</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <script>
                var divReview = document.querySelector('.blog-comment');
                const btnSubmit = document.querySelector('.thm-btn');
                var loader = document.getElementById('loader');

                btnSubmit.addEventListener('click', function() {
                    console.log(document.getElementById('review_name').value);
                    var name = document.getElementById('review_name').value;
                    var email = document.getElementById('review_email').value;
                    var phone = document.getElementById('review_phone').value;
                    var subject = document.getElementById('review_subject').value;
                    var message = document.getElementById('review_message').value;
                    $.ajax({
                        type: "post", //Phương thức truyền post hoặc get
                        dataType: "json", //Dạng dữ liệu trả về xml, json, script, or html
                        url: '<?php echo admin_url('admin-ajax.php'); ?>', //Đường dẫn chứa hàm xử lý dữ liệu. Mặc định của WP như vậy
                        data: {
                            action: "commentPost", //Tên action
                            id: <?php echo $post->ID ?>,
                            name: name,
                            email: email,
                            phone: phone,
                            subject: subject,
                            message: message,

                        },
                        context: this,
                        beforeSend: function() {
                           
                        },
                        success: function(response) {
                            //Làm gì đó khi dữ liệu đã được xử lý

                        },

                    })
                    
                    divReview.innerHTML += `<div class="blog-comment__box">
                        <div class="blog-comment__image">
                            <img src="<?php echo get_template_directory_uri() ?>/assets/images/blog/blog-comment-1-2.jpg" alt="">
                        </div>
                        <div class="blog-comment__content">
                            <div class="blog-comment__content-top">
                                <h3>${name}</h3>
                                <span><?php echo $item->comment_date ?></span>
                            </div>
                            <p>${message}</p>
                        </div>
                    </div>`;
                    document.getElementById('review_message').value = '';
                });
            </script>

            <div class="col-md-12 col-lg-4">
                <div class="blog-sidebar">
                    <div class="blog-sidebar__search">
                        <form action="#">
                            <input type="text" placeholder="Search">
                            <button type="submit"><i class="organik-icon-magnifying-glass"></i></button>
                        </form>
                    </div>
                    <div class="blog-sidebar__posts">
                        <h3>Recent Posts</h3>
                        <ul>
                            <?php $args = array(
                                'post_type' => 'post',
                                'orderby'    => 'date',
                                'post_status' => 'publish',
                                'order'    => 'DESC',
                                'posts_per_page' => 3, // this will retrive all the post that is published 
                                'paged' => 1
                            );
                            $result = new WP_Query($args);
                            $postsRecent = $result->posts;
                            foreach ($postsRecent as $item) {
                                $image = wp_get_attachment_image_src(get_post_thumbnail_id($item->ID), 'full');
                            ?>
                                <li>
                                    <img src="<?php echo $image[0]; ?>" style="width:80px; height:80px;" alt="">
                                    <span>20 Nov, 2020</span>
                                    <h4><a href="<?php echo get_permalink($item->ID); ?>"><?php echo $item->post_title ?></a></h4>
                                </li>
                            <?php } ?>
                        </ul>
                    </div>
                    <div class="blog-sidebar__categories">
                        <h3>Catgories</h3>
                        <ul>                        
                            <li>                            
                                <a href="http://127.0.0.1/worpress_cansateam/wordpress/trang-tin-tuc/">Agriculture<i class="fa fa-angle-right"></i></a>
                            </li>
                            <li>
                                <a href="http://127.0.0.1/worpress_cansateam/wordpress/trang-tin-tuc/">
                                    Organic Food <i class="fa fa-angle-right"></i></a>
                            </li>
                            <li>
                                <a href="http://127.0.0.1/worpress_cansateam/wordpress/trang-tin-tuc/">Dairy Farm <i class="fa fa-angle-right"></i></a>
                            </li>
                            <li>
                                <a href="http://127.0.0.1/worpress_cansateam/wordpress/trang-tin-tuc/">Economy Solution <i class="fa fa-angle-right"></i></a>
                            </li>
                            <li>
                                <a href="http://127.0.0.1/worpress_cansateam/wordpress/trang-tin-tuc/">Harvests Innovations <i class="fa fa-angle-right"></i></a>
                            </li>
                        </ul>
                    </div>
                    <div class="blog-sidebar__tags">
                        <h3>Tags</h3>
                        <div class="blog-sidebar__tags-links">
                            <?php $tags = get_the_tags($post->ID);
                            foreach ($tags as $item) { ?>
                                <a href="#"><?php echo $item->name ?></a>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- <footer class="site-footer background-black-2">
    <img src="assets/images/shapes/footer-bg-1-1.png" alt="" class="site-footer__shape-1">
    <img src="assets/images/shapes/footer-bg-1-2.png" alt="" class="site-footer__shape-2">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
                <div class="footer-widget footer-widget__about-widget">
                    <a href="index-2.html" class="footer-widget__logo">
                        <img src="assets/images/logo-light.png" alt="" width="105" height="43">
                    </a>
                    <p class="thm-text-dark">Atiam rhoncus sit amet adip
                        scing sed ipsum. Lorem ipsum
                        dolor sit amet adipiscing <br>
                        sem neque.</p>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-2">
                <div class="footer-widget footer-widget__contact-widget">
                    <h3 class="footer-widget__title">Contact</h3>
                    <ul class="list-unstyled footer-widget__contact">
                        <li>
                            <i class="fa fa-phone-square"></i>
                            <a href="tel:666-888-0000">666 888 0000</a>
                        </li>
                        <li>
                            <i class="fa fa-envelope"></i>
                            <a href="https://ninetheme.com/cdn-cgi/l/email-protection#a0c9cec6cfe0c3cfcdd0c1ced98ec3cfcd"><span class="__cf_email__" data-cfemail="40292e262f00232f2d30212e396e232f2d">[email&#160;protected]</span></a>
                        </li>
                        <li>
                            <i class="fa fa-map-marker-alt"></i>
                            <a href="#">66 top broklyn street.
                                New York</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-2">
                <div class="footer-widget footer-widget__links-widget">
                    <h3 class="footer-widget__title">Links</h3>
                    <ul class="list-unstyled footer-widget__links">
                        <li>
                            <a href="index-2.html">Top Sellers</a>
                        </li>
                        <li>
                            <a href="products.html">Shopping</a>
                        </li>
                        <li>
                            <a href="about.html">About Store</a>
                        </li>
                        <li>
                            <a href="contact.html">Contact</a>
                        </li>
                        <li>
                            <a href="contact.html">Help</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-2">
                <div class="footer-widget">
                    <h3 class="footer-widget__title">Explore</h3>
                    <ul class="list-unstyled footer-widget__links">
                        <li>
                            <a href="products.html">New Products</a>
                        </li>
                        <li>
                            <a href="checkout.html">My Account</a>
                        </li>
                        <li>
                            <a href="contact.html">Support</a>
                        </li>
                        <li>
                            <a href="contact.html">FAQs</a>
                        </li>
                    </ul>
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
</footer> -->
</div>
<div class="mobile-nav__wrapper">
    <div class="mobile-nav__overlay mobile-nav__toggler"></div>

    <div class="mobile-nav__content">
        <span class="mobile-nav__close mobile-nav__toggler"><i class="organik-icon-close"></i></span>
        <div class="logo-box">
            <a href="index-2.html" aria-label="logo image"><img src="assets/images/logo-light.png" width="155" alt="" /></a>
        </div>

        <div class="mobile-nav__container"></div>

        <ul class="mobile-nav__contact list-unstyled">
            <li>
                <i class="organik-icon-email"></i>
                <a href="https://ninetheme.com/cdn-cgi/l/email-protection#ff919a9a9b979a938fbf908d989e919694d19c9092"><span class="__cf_email__" data-cfemail="036d6666676b666f73436c7164626d6a682d606c6e">[email&#160;protected]</span></a>
            </li>
            <li>
                <i class="organik-icon-calling"></i>
                <a href="tel:666-888-0000">666 888 0000</a>
            </li>
        </ul>
        <div class="mobile-nav__top">
            <div class="mobile-nav__language">
                <img src="assets/images/resources/flag-1-1.jpg" alt="">
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
            <img src="assets/images/products/cart-1-1.jpg" alt="">
            <div class="mini-cart__item-content">
                <div class="mini-cart__item-top">
                    <h3><a href="product-details.html">Banana</a></h3>
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
            <img src="assets/images/products/cart-1-2.jpg" alt="">
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
            <img src="assets/images/products/cart-1-3.jpg" alt="">
            <div class="mini-cart__item-content">
                <div class="mini-cart__item-top">
                    <h3><a href="product-details.html">Bread</a></h3>
                    <p>$9.99</p>
                </div>
                <div class="quantity-box">
                    <button type="button" class="sub">-</button>
                    <input type="number" id="2" value="1" />
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
<?php get_footer(); ?>