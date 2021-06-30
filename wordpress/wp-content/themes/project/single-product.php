<?php
$id = get_the_ID();
$product = wc_get_product($id);
$gallary_img = $product->get_gallery_image_ids();
$customFields =  get_post_custom($id);
$comments = get_comments(array(
    'post_id' => $id ));
if(!empty($comments)){
    $count_ratting_popular = 0;
    $arrStar = array_column($comments, 'comment_karma');
    $count_ratting_popular = max(array_count_values($arrStar));
    $star_popular = array_search($count_ratting_popular,array_count_values($arrStar));
}
?>
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
<div id="loader"
    style="position: fixed; width: 100%; height: 100%; background-color: rgba(0, 0, 0, 0.4); z-index: 100; display: none ;">
    <div class="loader" style="position: fixed; top: 45%; left: 45%; z-index: 999; "></div>
</div>
<?php get_header(); ?>

<div class="stricky-header stricked-menu main-menu">
    <div class="sticky-header__content"></div>
</div>
<section class="page-header">
    <div class="page-header__bg"
        style="background-image: url(<?php echo get_template_directory_uri() ?>/assets/images/backgrounds/page-header-bg-1-1.jpg);">
    </div>

    <div class="container">
        <h2>Product</h2>
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
<section class="product_detail">
    <div class="container">
        <div class="row">
            <div class="col-xl-6 col-lg-6">
                <div class="product_detail_image">
                    <img src="<?php echo wp_get_attachment_url($product->get_image_id());  ?>" alt="">
                </div>
            </div>
            <div class="col-xl-6 col-lg-6">
                <div class="product_detail_content">
                    <h2>
                        <?php echo $product->name ?>
                    </h2>
                    <div class="product_detail_review_box">
                        <div class="product_detail_price_box">
                            <p>
                                <?php echo wc_price($product->get_regular_price()); ?>
                            </p>
                        </div>
                        <div class="product_detail_review">
                            <?php for($i = 1;$i<=5;$i++){
                                    if($i<=$star_popular){ ?>
                            <a href="#"><i class="fa fa-star"></i></a>
                            <?php }else{ ?>
                            <a href="#" class="deactive"><i class="fa fa-star"></i></a>
                            <?php }} ?>
                            <span>
                                <?php echo $count_ratting_popular ?> Customer Reviews
                            </span>
                        </div>
                    </div>
                    <div class="product_detail_text">
                        <p>Aliquam hendrerit a augue insuscipit. Etiam aliquam massa quis des mauris commodo
                            venenatis ligula commodo leez sed blandit convallis dignissim onec vel pellentesque
                            neque.</p>
                    </div>
                    <ul class="list-unstyled product_detail_address">
                        <li>REF. 4231/406</li>
                        <li>Available in store</li>
                    </ul>
                    <div class="product-quantity-box">
                        <div class="quantity-box">
                            <button type="button" class="sub">-</button>
                            <input type="number" id="2" value="1" />
                            <button type="button" class="add">+</button>
                        </div>
                        <div class="addto-cart-box">
                            <button class="thm-btn" type="submit">Add to Cart</button>
                        </div>
                        <div class="wishlist_btn">
                            <a href="#" class="thm-btn">Add to Wishlist</a>
                        </div>
                    </div>
                    <ul class="list-unstyled category_tag_list">
                        <li><span>Category:</span>
                            <?php  get_cat_name(16) ?>
                        </li>
                        <li><span>Tags:</span> Vegetables, Fruits</li>
                    </ul>
                    <div class="product_detail_share_box">
                        <div class="share_box_title">
                            <h2>Share with friends</h2>
                        </div>
                        <div class="share_box_social">
                            <a href="#"><i class="fab fa-facebook-square"></i></a>
                            <a href="#"><i class="fab fa-twitter"></i></a>
                            <a href="#"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12">
                <div class="product-tab-box tabs-box">
                    <ul class="tab-btns tab-buttons clearfix list-unstyled">
                        <li data-tab="#desc" class="tab-btn"><span>description</span></li>
                        <li data-tab="#addi__info" class="tab-btn"><span>Additional info</span></li>
                        <li data-tab="#review" class="tab-btn active-btn"><span>reviews</span></li>
                    </ul>
                    <div class="tabs-content">
                        <div class="tab" id="desc">
                            <div class="product-details-content">
                                <div class="desc-content-box">
                                    <p>
                                        <?php echo $product->description ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="tab" id="addi__info">
                            <ul class="additionali_nfo list-unstyled">
                                <li><span>Weight:</span>3kg</li>
                                <li><span>Category:</span>Food</li>
                                <li><span>Tags:</span>Vegetables, Fruits</li>
                            </ul>
                        </div>
                        <div class="tab active-tab" id="review">
                            <div class="reviews-box">
                                <div class="row">
                                    <div class="col-xl-12">
                                        <div class="product_reviews_box">


                                            <h3 class="product_reviews_title">
                                                <?php echo count($comments) ?> Product reviews
                                            </h3>
                                            <?php if(!empty($comments)){ foreach($comments as $item){ ?>
                                            <div class="product_reviews_single">
                                                <div class="product_reviews_image">
                                                    <img src="<?php bloginfo('template_directory'); ?><?php echo get_template_directory_uri() ?>/assets/images/products/review-1.jpg"
                                                        alt="">
                                                </div>
                                                <div class="product_reviews_content">
                                                    <h3>
                                                        <?php echo $item->comment_author ?><span>
                                                            <?php echo $item->comment_date ?>
                                                        </span>
                                                    </h3>
                                                    <p>
                                                        <?php echo $item->comment_content ?>
                                                    </p>
                                                    <div class="product_reviews_rating product_detail_review">
                                                        <?php for($i = 1;$i<=5;$i++){
                                                            if($i<=$item->comment_karma){ ?>
                                                        <a href="#"><i class="fa fa-star"></i></a>
                                                        <?php }else{ ?>
                                                        <a href="#" class="deactive"><i class="fa fa-star"></i></a>
                                                        <?php }} ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php }} ?>

                                        </div>
                                    </div>
                                    <div class="col-xl-12">
                                        <div class="add_review_box">
                                            <h3 class="add_review_title">Add a review</h3>
                                            <div class="add_review_rating">
                                                <span>Rate this Product?</span>
                                                <a href="javascript:void(0)" onclick="clickStarRatting(1);"><i
                                                        class="fa fa-star"></i></a>
                                                <a href="javascript:void(0)" onclick="clickStarRatting(2);"><i
                                                        class="fa fa-star"></i></a>
                                                <a href="javascript:void(0)" onclick="clickStarRatting(3);"><i
                                                        class="fa fa-star"></i></a>
                                                <a href="javascript:void(0)" onclick="clickStarRatting(4);"><i
                                                        class="fa fa-star"></i></a>
                                                <a href="javascript:void(0)" onclick="clickStarRatting(5);"><i
                                                        class="fa fa-star"></i></a>
                                            </div>
                                            <script>
                                                var starValue = 5;

                                                function clickStarRatting(value) {
                                                    var starDiv = document.querySelectorAll('.add_review_rating')[0].children

                                                    for (var i = 1; i <= 5; i++) {
                                                        if (value >= i) {
                                                            starDiv[i].classList.remove('deactive')
                                                        } else {
                                                            starDiv[i].classList.add('deactive')
                                                        }
                                                    }
                                                    starValue = value;
                                                }
                                            </script>
                                            <div class="add_review_form">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="input-box">
                                                            <textarea name="review" placeholder="Write review"
                                                                required="" id='review-comment'></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="input-box">
                                                            <input type="text" name="name" placeholder="Full name"
                                                                required="" id='review-name'>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="input-box">
                                                            <input type="email" name="email" placeholder="Email address"
                                                                required="" id='review-email'>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-xl-12">
                                                        <div class="review_submit_btn">
                                                            <a style="cursor: pointer;" class="thm-btn">Submit
                                                                Review</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <script>
                                        var divReview = document.querySelector('.product_reviews_box');
                                        const btnSubmit = document.querySelector('.review_submit_btn');
                                        var loader = document.getElementById('loader');

                                        btnSubmit.addEventListener('click', function () {
                                            btnSubmit.disable = true;
                                            var name = document.getElementById('review-name').value;
                                            var comment = document.getElementById('review-comment').value;
                                            var email = document.getElementById('review-email').value;
                                            var star = starValue;
                                            var starComment = '';
                                            $.ajax({
                                                type: "post", //Phương thức truyền post hoặc get
                                                dataType: "json", //Dạng dữ liệu trả về xml, json, script, or html
                                                url: '<?php echo admin_url('admin-ajax.php');?>', //Đường dẫn chứa hàm xử lý dữ liệu. Mặc định của WP như vậy
                                                data : {
                                                    action: "comment", //Tên action
                                                    id:<?php echo $id ?>,
                                                name: name,
                                                comment: comment,
                                                email: email,
                                                star: star,
                                            },
                                            context: this,
                                            beforeSend: function () {
                                                loader.style.display = 'block';
                                            },
                                            success: function (response) {
                                                //Làm gì đó khi dữ liệu đã được xử lý

                                            },
                                          
                                            })
                                        loader.style.display = 'none';
                                        for (var i = 1; i <= 5; i++) {
                                            if (star >= i) {
                                                starComment += '<a href="javascript:void(0)"><i class="fa fa-star"></i></a>'
                                            } else {
                                                starComment += '<a href="javascript:void(0)" class="deactive"><i class="fa fa-star"></i></a>'
                                            }
                                        }
                                        divReview.innerHTML += ` <div class="product_reviews_single">
                                                <div class="product_reviews_image">
                                                    <img src="<?php bloginfo('template_directory'); ?><?php echo get_template_directory_uri() ?>/assets/images/products/review-2.jpg"
                                                        alt="">
                                                </div>
                                                <div class="product_reviews_content">
                                                    <h3>${name}<span>15 Nov, 2019</span></h3>
                                                    <p>${comment}</p>
                                                    <div class="product_reviews_rating product_detail_review">
                                                        ${starComment}
                                                    </div>
                                                </div>
                                            </div>`;
            
                                        });
                                    </script>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="product-two">
    <div class="container">
        <div class="block-title text-center">
            <div class="block-title__decor"></div>
            <p>Recently Added</p>
            <h3>Similar Products</h3>
        </div>
        <div class="thm-tiny__slider" id="product-two__carousel" data-tiny-options='{
            "container": "#product-two__carousel",
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
            <?php
        $arrRand = $product->category_ids[array_rand($product->category_ids)]; //chọn category ngẫu nhiên trong mảng
        $args = array(
            'orderby' =>'rand',
            'order' => 'DESC',
            'limit' => 3, //Số lượng sp
            'tax_query' => array(
                array(
                    'taxonomy' => 'product_cat',
                    'terms' => $arrRand,
                    'operator' => 'IN',
                )
            )
        );
        $products = wc_get_products($args);
        foreach($products as $item){
         ?>
            <div>
                <div class="product-card__two">
                    <div class="product-card__two-image">
                        <span class="product-card__two-sale">sale</span>
                        <img src="<?php echo wp_get_attachment_url($item->get_image_id()); ?>" alt="">
                        <div class="product-card__two-image-content">
                            <a href="#"><i class="organik-icon-visibility"></i></a>
                            <a href="#"><i class="organik-icon-heart"></i></a>
                            <a href="cart.html"><i class="organik-icon-shopping-cart"></i></a>
                        </div>
                    </div>
                    <div class="product-card__two-content">
                        <h3><a href="<?php echo $item->get_permalink() ?>">
                                <?php echo $item->name ?>
                            </a></h3>
                        <div class="product-card__two-stars">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                        </div>
                        <p>$1.00</p>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</section>

</div>
<div class="mobile-nav__wrapper">
    <div class="mobile-nav__overlay mobile-nav__toggler"></div>

    <div class="mobile-nav__content">
        <span class="mobile-nav__close mobile-nav__toggler"><i class="organik-icon-close"></i></span>
        <div class="logo-box">
            <a href="index-2.html" aria-label="logo image"><img
                    src="<?php echo get_template_directory_uri() ?>/assets/images/logo-light.png" width="155"
                    alt="" /></a>
        </div>

        <div class="mobile-nav__container"></div>

        <ul class="mobile-nav__contact list-unstyled">
            <li>
                <i class="organik-icon-email"></i>
                <a href="https://ninetheme.com/cdn-cgi/l/email-protection#553b3030313d303925153a2732343b3c3e7b363a38"><span
                        class="__cf_email__"
                        data-cfemail="b3ddd6d6d7dbd6dfc3f3dcc1d4d2dddad89dd0dcde">[email&#160;protected]</span></a>
            </li>
            <li>
                <i class="organik-icon-calling"></i>
                <a href="tel:666-888-0000">666 888 0000</a>
            </li>
        </ul>
        <div class="mobile-nav__top">
            <div class="mobile-nav__language">
                <img src="<?php echo get_template_directory_uri() ?>/assets/images/resources/flag-1-1.jpg" alt="">
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
            <img src="<?php bloginfo('template_directory'); ?><?php echo get_template_directory_uri() ?>/assets/images/products/cart-1-1.jpg"
                alt="">
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
            <img src="<?php bloginfo('template_directory'); ?><?php echo get_template_directory_uri() ?>/assets/images/products/cart-1-2.jpg"
                alt="">
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
            <img src="<?php bloginfo('template_directory'); ?><?php echo get_template_directory_uri() ?>/assets/images/products/cart-1-3.jpg"
                alt="">
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