<?php
/**
 * Template name: Trang Sản Phẩm
 *
 */
$item = wc_get_product(88);
$args = array(
    'orderby' =>'name',
    'order' => 'DESC',
    'limit' => 9, //Số lượng sp
    'paginate' => true,
    'paged' => 1,
);
$products = wc_get_products($args)->products;
?>

<?php get_header(); ?>
<div class="stricky-header stricked-menu main-menu">
    <div class="sticky-header__content"></div>
</div>
<section class="page-header">
    <div class="page-header__bg"
        style="background-image: url(<?php bloginfo('template_directory'); ?>/assets/images/backgrounds/page-header-bg-1-1.jpg);">
    </div>

    <div class="container">
        <h2>Products</h2>
        <ul class="thm-breadcrumb list-unstyled">
            <li><a href="index-2.html">Home</a></li>
            <li>/</li>
            <li><span>Products</span></li>
        </ul>
    </div>
</section>
<section class="products-page">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-3">
                <div class="product-sidebar">
                    <div class="product-sidebar__single product-sidebar__search-widget">
                        <form action="#">
                            <input type="text" placeholder="Search">
                            <button class="organik-icon-magnifying-glass" type="submit"></button>
                        </form>
                    </div>
                    <script>
                        function price_fiter(){
                           
                            var productDiv = document.getElementById('product_category');
                            productDiv.innerHTML = '';
                            page_price = 1;
                            minPrice = document.getElementById('min-value-rangeslider').textContent;
                            maxPrice =document.getElementById('max-value-rangeslider').textContent;
                            $.ajax({
                            type: "post", //Phương thức truyền post hoặc get
                            dataType: "json", //Dạng dữ liệu trả về xml, json, script, or html
                            url: '<?php echo admin_url('admin-ajax.php');?>', //Đường dẫn chứa hàm xử lý dữ liệu. Mặc định của WP như vậy
                            data : {
                                action: "loadmoreMinMax", //Tên action
                                minPrice:minPrice,
                                maxPrice:maxPrice,
                                },
                        context: this,
                        beforeSend: function () {
                            loader.style.display = 'block';
                        },
                        success:function(response) {
                            console.log(response)
                            loader.style.display = 'none';
                            response.forEach(element => {
                                productDiv.innerHTML += `
                        <div class="col-md-6 col-lg-4">
                        <div class="product-card">
                            <div class="product-card__image">
                                <img src="${element.img}" alt="">
                                <div class="product-card__image-content">
                                    <a href="#"><i class="organik-icon-heart"></i></a>
                                    <a href="cart.html"><i class="organik-icon-shopping-cart"></i></a>
                                </div>
                            </div>
                            <div class="product-card__content">
                                <div class="product-card__left">
                                    <h3><a href="${element.url}">
                                        ${element.name}
                                        </a></h3>
                                    <p>
                                        ${element.Price}
                                    </p>
                                </div>
                                <div class="product-card__right">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                            </div>
                        </div>
                    </div>`;
                            });
                        },         
                        });
                        }
                    </script>
                    <div class="product-sidebar__single">
                        <h3>Categories</h3>
                        <ul class="list-unstyled product-sidebar__links">
                        <?php 
                        $order = 'asc';
                        $hide_empty = false;
                        $cat_args = array(
                            'orderby'    => $orderby,
                            'order'      => $order,
                            'hide_empty' => $hide_empty,
                        );
                        $product_categories = get_terms('product_cat', $cat_args);
                        foreach($product_categories as $item){
                            if($item->name != 'Uncategorized'){
                        ?>
                            <li><a href="javascript:void(0);" onclick="getProductByCategory(<?php echo $item->term_id ?>);" ><?php echo $item->name ?> <i class="fa fa-angle-right"></i></a></li>
                            <?php }} ?>
                        </ul>
                    </div>
                </div>
            </div>
            <script>
                page_category = -1;
                id_cat = -1;
                function getProductByCategory(id) {
                    page_category = 1;
                    id_cat = id;
                    var productDiv = document.getElementById('product_category');
                    $.ajax({
                            type: "post", //Phương thức truyền post hoặc get
                            dataType: "json", //Dạng dữ liệu trả về xml, json, script, or html
                            url: '<?php echo admin_url('admin-ajax.php');?>', //Đường dẫn chứa hàm xử lý dữ liệu. Mặc định của WP như vậy
                            data : {
                                action: "loadmorecategory", //Tên action
                                page:page,
                                id_category:id,
                                },
                        context: this,
                        beforeSend: function () {
                            loader.style.display = 'block';
                        },
                        success:function(response) {
                            console.log(response)
                            productDiv.innerHTML ='';
                            loader.style.display = 'none';
                            response.forEach(element => {
                                productDiv.innerHTML += `
                        <div class="col-md-6 col-lg-4">
                        <div class="product-card">
                            <div class="product-card__image">
                                <img src="${element.img}" alt="">
                                <div class="product-card__image-content">
                                    <a href="javascript:void(0);" onclick="addCart(${element.id},1);"><i class="organik-icon-shopping-cart"></i></a>
                                </div>
                            </div>
                            <div class="product-card__content">
                                <div class="product-card__left">
                                    <h3><a href="${element.url}">
                                        ${element.name}
                                        </a></h3>
                                    <p>
                                        ${element.Price}
                                    </p>
                                </div>
                                <div class="product-card__right">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                            </div>
                        </div>
                    </div>`;
                            });
                        },         
                        });
                }

            </script>
            <div class="col-sm-12 col-md-12 col-lg-9">
                <div class="product-sorter">
                    <p>Showing 1–9 of 12 results</p>
                    <div class="product-sorter__select">
                        <select class="selectpicker">
                            <option value="#">Sort by popular</option>
                            <option value="#">Sort by popular</option>
                            <option value="#">Sort by popular</option>
                            <option value="#">Sort by popular</option>
                        </select>
                    </div>
                </div>
                <div class="row" id="product_category">
                    <?php foreach($products as $item){ ?>
                    <div class="col-md-6 col-lg-4">
                        <div class="product-card">
                            <div class="product-card__image">
                                <img src="<?php echo wp_get_attachment_url($item->get_image_id()); ?>" alt="">
                                <div class="product-card__image-content">
                                    <a href="javascript:void(0);" onclick="addCart(<?php echo $item->id  ?>,1);"><i class="organik-icon-shopping-cart"></i></a>
                                </div>
                            </div>
                            <div class="product-card__content">
                                <div class="product-card__left">
                                    <h3><a href="<?php echo $item->get_permalink() ?>">
                                            <?php echo $item->name ?>
                                        </a></h3>
                                    <p>
                                    <?php if($item->get_sale_price()==''){echo wc_price($item->get_regular_price());}else{ echo wc_price($item->get_sale_price()).' <strike>'.wc_price($item->get_regular_price()).'</strike>';}  ?>
                                    </p>
                                </div>
                                <div class="product-card__right">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
                <div class="text-center" id="btnLoadMore">
                    <a style="cursor: pointer;" class="thm-btn products__load-more">Load More</a>
                </div>
                <script>
                    var productDiv = document.getElementById('product_category');
                    var page = 2;
                    const btnMore = document.getElementById('btnLoadMore');
                    btnMore.addEventListener('click', function () {
                        if(page_category == -1){
                            $.ajax({
                            type: "post", //Phương thức truyền post hoặc get
                            dataType: "json", //Dạng dữ liệu trả về xml, json, script, or html
                            url: '<?php echo admin_url('admin-ajax.php');?>', //Đường dẫn chứa hàm xử lý dữ liệu. Mặc định của WP như vậy
                            data : {
                                action: "loadmore", //Tên action
                                page:page,
                                },
                        context: this,
                        beforeSend: function () {
                            loader.style.display = 'block';
                        },
                        success:function(response) {
                            loader.style.display = 'none';
                            response.forEach(element => {
                                productDiv.innerHTML += `
                        <div class="col-md-6 col-lg-4">
                        <div class="product-card">
                            <div class="product-card__image">
                                <img src="${element.img}" alt="">
                                <div class="product-card__image-content">
                                    <a href="javascript:void(0);" onclick="addCart(${element.id},1);"><i class="organik-icon-shopping-cart"></i></a>
                                </div>
                            </div>
                            <div class="product-card__content">
                                <div class="product-card__left">
                                    <h3><a href="${element.url}">
                                        ${element.name}
                                        </a></h3>
                                    <p>
                                        ${element.Price}
                                    </p>
                                </div>
                                <div class="product-card__right">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                            </div>
                        </div>
                    </div>`;
                            });
                        },         
                        });
                        page++;
                        }else{
                            page_category++
                            $.ajax({
                            type: "post", //Phương thức truyền post hoặc get
                            dataType: "json", //Dạng dữ liệu trả về xml, json, script, or html
                            url: '<?php echo admin_url('admin-ajax.php');?>', //Đường dẫn chứa hàm xử lý dữ liệu. Mặc định của WP như vậy
                            data : {
                                action: "loadmorecategoryPage", //Tên action
                                page: page_category,
                                id_category:id_cat,
                                },
                        context: this,
                        beforeSend: function () {
                            loader.style.display = 'block';
                        },
                        success:function(response) {
                            console.log(response)
                            loader.style.display = 'none';
                            response.forEach(element => {
                                productDiv.innerHTML += `
                        <div class="col-md-6 col-lg-4">
                        <div class="product-card">
                            <div class="product-card__image">
                                <img src="${element.img}" alt="">
                                <div class="product-card__image-content">
                                    <a href="javascript:void(0);" onclick="addCart(${element.id},1);"><i class="organik-icon-shopping-cart"></i></a>
                                </div>
                            </div>
                            <div class="product-card__content">
                                <div class="product-card__left">
                                    <h3><a href="${element.url}">
                                        ${element.name}
                                        </a></h3>
                                    <p>
                                        ${element.Price}
                                    </p>
                                </div>
                                <div class="product-card__right">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                            </div>
                        </div>
                    </div>`;
                            });
                        },         
                        });
                        page++;
                        }
                       
                    });
                </script>
            </div>
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
                    src="<?php bloginfo('template_directory'); ?>/assets/images/logo-light.png" width="155"
                    alt="" /></a>
        </div>

        <div class="mobile-nav__container"></div>

        <ul class="mobile-nav__contact list-unstyled">
            <li>
                <i class="organik-icon-email"></i>
                <a href="https://ninetheme.com/cdn-cgi/l/email-protection#38565d5d5c505d544878574a5f59565153165b5755"><span
                        class="__cf_email__"
                        data-cfemail="1e707b7b7a767b726e5e716c797f707775307d7173">[email&#160;protected]</span></a>
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
<?php get_footer() ?>