<?php

/**
 * Template name: Trang tin tức
 *
 */
get_header();
?>
<div class="stricky-header stricked-menu main-menu">
    <div class="sticky-header__content"></div>
</div>
<section class="page-header">
    <div class="page-header__bg" style="background-image: url(<?php bloginfo('template_directory'); ?>/assets/images/backgrounds/page-header-bg-1-1.jpg);">
    </div>

    <div class="container">
        <h2>Blog</h2>
        <ul class="thm-breadcrumb list-unstyled">
            <li><a href="index-2.html">Home</a></li>
            <li>/</li>
            <li><span>Blog</span></li>
        </ul>
    </div>
</section>
<div class="blog-page">
    <div class="container">
        <div class="row"  id="news-item">
            <?php $args = array(
                'post_type' => 'post',
                'orderby'    => 'ID',
                'post_status' => 'publish',
                'order'    => 'DESC',
                'posts_per_page' => 6, // this will retrive all the post that is published 
                'paged' => 1
            );
            $result = new WP_Query($args); 
            $posts = $result->posts;
           
 
            foreach($posts as $item){
                $image = wp_get_attachment_image_src(get_post_thumbnail_id($item->ID),"full");
            ?>
            <div class="col-sm-12 col-md-6 col-lg-4">
                <div class="blog-card">
                    <div class="blog-card__image">
                        <div class="blog-card__date">18 Nov</div>
                        <img src="<?php echo $image[0];?>" alt="How to Findout Healthy Food For Body">
                        <a href="news-details.html"></a>
                    </div>
                    <div class="blog-card__content">
                        <div class="blog-card__meta">
                            <a href="news-details.html"><i class="far fa-user-circle"></i> by Admin</a>
                            <a href="news-details.html"><i class="far fa-comments"></i> 2 Comments</a>
                        </div>
                        <h3><a href="<?php echo get_permalink($item->ID);?>"><?php echo $item->post_title ?></a></h3>
                        <p><?php echo mb_strimwidth($item->post_content, 0,100, '...'); ?></p>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
        <ul class="list-unstyled post-pagination d-flex justify-content-center">
            <li class="clickleft"><a href="javascript:void(0)"><i class="fa fa-angle-left"></i></a></li>
            <?php for($i = 1; $i <= ceil($result->max_num_pages); $i++){ ?>
            <li ><a href="javascript:void(0)" class="check_id" onclick="changeColorClick(<?php echo $i ?>);" id="<?php echo $i ?>"><?php echo $i ?></a></li>
            <?php } ?>
            <li  class="clickright"><a href="javascript:void(0)" ><i class="fa fa-angle-right"></i></a></li>
        </ul>
    </div>
</div>
<script>
    var id_all = 1;
    var panigationDiv = document.querySelectorAll('.check_id');
    panigationDiv[0].style.backgroundColor = '#60be74';
    document.querySelector('.clickleft').addEventListener('click',function(){
        if(id_all>1){
            id_all--;
            changeColorClick(id_all);
        }
    });
    document.querySelector('.clickright').addEventListener('click',function(){
        if(id_all < <?php echo ceil($result->max_num_pages); ?>){
            id_all++;
            changeColorClick(id_all);
        }
        
    }); 
    function changeColorClick(id){
        id_all = id;
        var panigationDiv = document.querySelectorAll('.check_id');
        var newDiv = document.getElementById('news-item');
        panigationDiv.forEach(element => {
            if(element.id != id){
                element.style.backgroundColor = '#eff2f6';
            }else{
                element.style.backgroundColor = '#60be74';
                
                $.ajax({
                    type : "post", //Phương thức truyền post hoặc get
                    dataType : "json", //Dạng dữ liệu trả về xml, json, script, or html
                    url : '<?php echo admin_url('admin-ajax.php');?>', //Đường dẫn chứa hàm xử lý dữ liệu. Mặc định của WP như vậy
                    data : {
                        action: "panigationPostNews", //Tên action
                        page:id
                    },
                    context: this,
                    beforeSend: function(){
                        //Làm gì đó trước khi gửi dữ liệu vào xử lý
                    },
                    success: function(response) {
                    //Làm gì đó khi dữ liệu đã được xử lý
                     console.log(response)
                     newDiv.innerHTML = '';
                     response.forEach(element => {
                        newDiv.innerHTML += `<div class="col-sm-12 col-md-6 col-lg-4">
                <div class="blog-card">
                    <div class="blog-card__image">
                        <div class="blog-card__date">18 Nov</div>
                        <img src="<?php echo $image[0];?>" alt="How to Findout Healthy Food For Body">
                        <a href="news-details.html"></a>
                    </div>
                    <div class="blog-card__content">
                        <div class="blog-card__meta">
                            <a href="news-details.html"><i class="far fa-user-circle"></i> by Admin</a>
                            <a href="news-details.html"><i class="far fa-comments"></i> 2 Comments</a>
                        </div>
                        <h3><a href="<?php echo get_permalink($item->ID);?>">${element.post_title}</a></h3>
                        <p><?php echo mb_strimwidth($item->post_content, 0,100, '...'); ?></p>
                    </div>
                </div>
            </div>`;
                     });
                    },
                    error: function( jqXHR, textStatus, errorThrown ){
                        //Làm gì đó khi có lỗi xảy ra
                        console.log( 'The following error occured: ' + textStatus, errorThrown );
                    }
                })
            }
            
        });
    }

</script>
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
                            <a href="https://ninetheme.com/cdn-cgi/l/email-protection#076e6961684764686a7766697e2964686a"><span class="__cf_email__" data-cfemail="137a7d757c53707c7e63727d6a3d707c7e">[email&#160;protected]</span></a>
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
                <a href="https://ninetheme.com/cdn-cgi/l/email-protection#78161d1d1c101d140838170a1f19161113561b1715"><span class="__cf_email__" data-cfemail="8ae4efefeee2efe6facae5f8edebe4e3e1a4e9e5e7">[email&#160;protected]</span></a>
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
                    <input type="number" id="2" value="1" />
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