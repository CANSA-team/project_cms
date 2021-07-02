<?php

/**
 * Template name: Trang Sản Cart
 *
 */
$couponValue = null;
if(isset($_GET['coupon'])){
    $coupon = new WC_Coupon( $_GET['coupon'] );
    $couponValue = $coupon->get_data();
}

if (is_user_logged_in()) {
    $shipCort = WC_Shipping_Zones::get_zones()[1]['shipping_methods'][1]->cost;
}
?>
<?php get_header() ?>
<div class="stricky-header stricked-menu main-menu">
    <div class="sticky-header__content"></div>
</div>
<section class="page-header">
    <div class="page-header__bg" style="background-image: url(<?php echo get_template_directory_uri() ?>/assets/images/backgrounds/page-header-bg-1-1.jpg);"></div>

    <div class="container">
        <h2>Cart</h2>
        <ul class="thm-breadcrumb list-unstyled">
            <li><a href="index-2.html">Home</a></li>
            <li>/</li>
            <li><span>Cart</span></li>
        </ul>
    </div>
</section>
<section class="cart-page">
    <div class="container">
        <div class="table-responsive">
            <table class="table cart-table">
                <thead>
                    <tr>
                        <th>Item</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                        <th>Remove</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $cart = [];
                    if (is_user_logged_in()) {
                        $user = get_user_meta(get_current_user_id());
                        $cart = unserialize($user['_woocommerce_persistent_cart_1'][0])['cart'];
                    }
                    if($cart!=null){
                    foreach ($cart as $item) {
                        $product = wc_get_product($item['product_id']);
                    ?>
                        <tr id="<?php echo $item['key'] ?>">
                            <td>
                                <div class="product-box">
                                    <img style="width: 100px; height: 100px;" src="<?php echo wp_get_attachment_url($product->get_image_id()); ?>" alt="">
                                    <h3><a href="<?php echo $product->get_permalink() ?>"><?php echo $product->name ?></a></h3>
                                </div>
                            </td>
                            <td><?php echo wc_price($product->get_regular_price()) ?></td>
                            <td>
                                <div class="quantity-box">
                                    <button type="button" onclick="priceUpdateMinus('<?php echo $item['key'] ?>')" class="sub">-</button>
                                    <input onchange=" changeTotal();" type="number" id="quality-<?php echo $item['key'] ?>" value="<?php echo $item['quantity']; ?>" />
                                    <button type="button" onclick="priceUpdatePlus('<?php echo $item['key'] ?>')" class="add">+</button>
                                </div>
                            </td>
                            <td class="total-div" id="total-<?php echo $item['key'] ?>">
                                <?php echo $item['line_subtotal']; ?>
                            </td>
                            <td>
                                <i style="cursor: pointer;" onclick="delete1('<?php echo $item['key'] ?>');" class="organik-icon-close remove-icon"></i>
                            </td>
                        </tr>
                    <?php  }} ?>
                </tbody>
            </table>
        </div>
        <div class="row">
            <div class="col-lg-8">
                <form action="./?" class="contact-one__form">
                    <input type="text" name="coupon" id="coupon-div" placeholder="Enter Coupon Code" value="<?php if(isset($_GET['coupon'])){ echo $_GET['coupon']; } ?>">
                    <button type="submit"  onclick="Coupon();" class="thm-btn">Apply Coupon</button>
                </form>
            </div>
            <div class="col-lg-4">
                <ul class="cart-total list-unstyled">
                    <li>
                        <span>Subtotal</span>
                        <span id="total-result">0</span>
                    </li>
                    <li>
                        <span>Shipping Cost</span>

                        <span id="cort-price"> <?php if (is_user_logged_in()) { if($couponValue!=null){ if($couponValue['free_shipping']==true){ echo 0; }else{ echo $shipCort;}  }else{ echo $shipCort;}}else{ echo 0; } ?></span>
                    </li>
                    <li>
                        <span>Total</span>
                        <span  id="total-all">$19.98 USD</span>
                    </li>
                </ul>
                <div class="button-box">
                    <a href="javascript:void(0);" onclick="hrefRedict();" class="thm-btn">Checkout</a>
                </div>
            </div>
        </div>
    </div>
</section>
<script>

    var shiping =  <?php if (is_user_logged_in()) { if($couponValue!=null){ if($couponValue['free_shipping']==true){ echo 0; }else{ echo $shipCort;}  }else{ echo $shipCort;}}else{ echo 0; } ?>;
    changeTotal();  
    var total_All = 0;
    var totall_Sub = 0;
    function Coupon(){
        var coupon = document.getElementById('coupon-div').value;
        console.log(coupon)
    }
    function hrefRedict(){
        changeTotal();  
        var str = `../checkout/?total_All=${total_All}&&totall_Sub=${totall_Sub}&&ship=${shiping}`;
        window.location.replace(str);
    }
    function changeTotal() {
        var totalDiv = document.querySelectorAll('.total-div');
        var totalResult = document.getElementById('total-result');
        var cort = document.getElementById('cort-price');
        var totalAll = document.getElementById('total-all');
        var total = 0;
         
        totalDiv.forEach(element => {
            total += parseInt(element.innerHTML)
        });
        totalResult.innerHTML = "$" + total +<?php if($couponValue['amount']!=0){ echo '"-"+'.$couponValue['amount'].'+'; } ?>'' ;
        temp_Total = (total + parseInt(cort.innerHTML))<?php if($couponValue['amount']!=0){ echo '-'.$couponValue['amount']; } ?> ; 
        total_All = temp_Total;   
        totall_Sub = total; 
        totalAll.innerHTML ="$" + temp_Total;
    }
</script>
<?php get_footer() ?>