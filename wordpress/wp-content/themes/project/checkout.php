<?php

/**
 * Template name: Trang Sản Checkout
 *
 */
$cart = $_GET;

var_dump($cart);

?>
<?php get_header() ?>
<div class="stricky-header stricked-menu main-menu">
    <div class="sticky-header__content"></div>
</div>
<section class="page-header">
    <div class="page-header__bg" style="background-image: url(<?php echo get_template_directory_uri() ?>/assets/images/backgrounds/page-header-bg-1-1.jpg);"></div>

    <div class="container">
        <h2>Checkout</h2>
        <ul class="thm-breadcrumb list-unstyled">
            <li><a href="index-2.html">Home</a></li>
            <li>/</li>
            <li><span>Checkout</span></li>
        </ul>
    </div>
</section>
<section class="checkout-page">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <h3>Billing Details</h3>
                <form action="#" class="contact-form-validated contact-one__form">
                    <div class="row">
                        
                        <div class="col-md-6">
                            <input type="text" id="fname" name="fname" placeholder="First Name">
                        </div>
                        <div class="col-md-6">
                            <input type="text" id="lname" name="lname" placeholder="Last Name">
                        </div>
                        <div class="col-md-12">
                            <input type="text" id="company" name="company" placeholder="Company">
                        </div>
                        <div class="col-md-12">
                            <input type="text" id="address1" name="address" placeholder="Address">
                        </div>
                        <div class="col-md-12">
                            <input type="text" id="address2" name="appartment" placeholder="Appartment, Unit, etc. (optional)">
                        </div>
                        <div class="col-md-12">
                            <select id="city" class="selectpicker">
                                <option value="An Giang">An Giang
                                <option value="Bà Rịa - Vũng Tàu">Bà Rịa - Vũng Tàu
                                <option value="Bắc Giang">Bắc Giang
                                <option value="Bắc Kạn">Bắc Kạn
                                <option value="Bạc Liêu">Bạc Liêu
                                <option value="Bắc Ninh">Bắc Ninh
                                <option value="Bến Tre">Bến Tre
                                <option value="Bình Định">Bình Định
                                <option value="Bình Dương">Bình Dương
                                <option value="Bình Phước">Bình Phước
                                <option value="Bình Thuận">Bình Thuận
                                <option value="Bình Thuận">Bình Thuận
                                <option value="Cà Mau">Cà Mau
                                <option value="Cao Bằng">Cao Bằng
                                <option value="Đắk Lắk">Đắk Lắk
                                <option value="Đắk Nông">Đắk Nông
                                <option value="Điện Biên">Điện Biên
                                <option value="Đồng Nai">Đồng Nai
                                <option value="Đồng Tháp">Đồng Tháp
                                <option value="Đồng Tháp">Đồng Tháp
                                <option value="Gia Lai">Gia Lai
                                <option value="Hà Giang">Hà Giang
                                <option value="Hà Nam">Hà Nam
                                <option value="Hà Tĩnh">Hà Tĩnh
                                <option value="Hải Dương">Hải Dương
                                <option value="Hậu Giang">Hậu Giang
                                <option value="Hòa Bình">Hòa Bình
                                <option value="Hưng Yên">Hưng Yên
                                <option value="Khánh Hòa">Khánh Hòa
                                <option value="Kiên Giang">Kiên Giang
                                <option value="Kon Tum">Kon Tum
                                <option value="Lai Châu">Lai Châu
                                <option value="Lâm Đồng">Lâm Đồng
                                <option value="Lạng Sơn">Lạng Sơn
                                <option value="Lào Cai">Lào Cai
                                <option value="Long An">Long An
                                <option value="Nam Định">Nam Định
                                <option value="Nghệ An">Nghệ An
                                <option value="Ninh Bình">Ninh Bình
                                <option value="Ninh Thuận">Ninh Thuận
                                <option value="Phú Thọ">Phú Thọ
                                <option value="Quảng Bình">Quảng Bình
                                <option value="Quảng Bình">Quảng Bình
                                <option value="Quảng Ngãi">Quảng Ngãi
                                <option value="Quảng Ninh">Quảng Ninh
                                <option value="Quảng Trị">Quảng Trị
                                <option value="Sóc Trăng">Sóc Trăng
                                <option value="Sơn La">Sơn La
                                <option value="Tây Ninh">Tây Ninh
                                <option value="Thái Bình">Thái Bình
                                <option value="Thái Nguyên">Thái Nguyên
                                <option value="Thanh Hóa">Thanh Hóa
                                <option value="Thừa Thiên Huế">Thừa Thiên Huế
                                <option value="Tiền Giang">Tiền Giang
                                <option value="Trà Vinh">Trà Vinh
                                <option value="Tuyên Quang">Tuyên Quang
                                <option value="Vĩnh Long">Vĩnh Long
                                <option value="Vĩnh Phúc">Vĩnh Phúc
                                <option value="Yên Bái">Yên Bái
                                <option value="Phú Yên">Phú Yên
                                <option value="Tp.Cần Thơ">Tp.Cần Thơ
                                <option value="Tp.Đà Nẵng">Tp.Đà Nẵng
                                <option value="Tp.Hải Phòng">Tp.Hải Phòng
                                <option value="Tp.Hà Nội">Tp.Hà Nội
                                <option value="TP  HCM">TP HCM
                            </select>
                        </div>
                        <div class="col-md-6">
                            <input type="text" id="state" placeholder="State" name="state">
                        </div>
                        <div class="col-md-6">
                            <input type="text" id="zipcode" placeholder="Zip Code" name="zip">
                        </div>
                        <div class="col-md-6">
                            <input type="email" id="email" placeholder="Email Address" name="email">
                        </div>
                        <div class="col-md-6">
                            <input type="text" id="phone" placeholder="Phone" name="phone">
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <h3 class="order-title">Your Order</h3>
        <div class="row">
            <div class="col-md-6">
                <div class="order-details">
                    <div class="order-details__top">
                        <p>Product</p>
                        <p>Price</p>
                    </div>
                    <p>
                        <span>Subtotal</span>
                        <span>$<?php echo $cart['totall_Sub'] ?></span>
                    </p>
                    <p>
                        <span>Shipping</span>
                        <span>$<?php echo $cart['ship'] ?></span>
                    </p>
                    <p>
                        <span>Total</span>
                        <span>$<?php echo $cart['total_All'] ?></span>
                    </p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="order-payment">
                    <ul id="accordion" class="list-unstyled" data-wow-duration="1500ms">
                        <li>
                            <h2 class="para-title active">
                                <span class="collapsed" role="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    Direct Bank Transfer
                                </span>
                            </h2>
                            <div id="collapseTwo" class="collapse show" role="button" aria-labelledby="collapseTwo" data-parent="#accordion">
                                <p>Make your payment directly into our bank account. Please
                                    use your Order ID as the payment reference. Your order
                                    wont be shipped until the funds have cleared.</p>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="text-right">
                    <a href="javascript:void(0);" onclick=" prossecing();" class="thm-btn">Place Your Order</a>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    function prossecing(){
    var first_name = document.getElementById('fname').value;
    var last_name = document.getElementById('lname').value;
    var email = document.getElementById('email').value;
    var phone = document.getElementById('phone').value;
    var address_1 = document.getElementById('address1').value;
    var address_2 = document.getElementById('address2').value;
    var city = document.getElementById('city').value;
    var state = document.getElementById('state').value ;
    var postcode = document.getElementById('zipcode').value;
    var totall_Sub= <?php echo $cart['totall_Sub'] ?>;
    var total_All = <?php echo $cart['total_All'] ?>; 
    $.ajax({
             type: "post", //Phương thức truyền post hoặc get
             dataType: "json", //Dạng dữ liệu trả về xml, json, script, or html
             url: '<?php echo admin_url('admin-ajax.php'); ?>', //Đường dẫn chứa hàm xử lý dữ liệu. Mặc định của WP như vậy
             data: {
                 action: "addOrderAjax", //Tên action
                 first_name: first_name,
                 last_name: last_name,
                 email:email,
                 phone:phone,
                 address_1:address_1,
                 address_2,address_2,
                 city:city,
                 state:state,
                 postcode:postcode,
                 totall_Sub:totall_Sub,
                 total_All:total_All,                
             },
             context: this,
             beforeSend: function() {
                 //Làm gì đó trước khi gửi dữ liệu vào xử lý
                 document.getElementById('load').style.display = 'block';
             },
             success: function(response) {
                 if (response == true) {
                     document.getElementById('load').style.display = 'none';
                 }
             },
             error: function(jqXHR, textStatus, errorThrown) {
                 //Làm gì đó khi có lỗi xảy ra
             }
         })
    }
</script>
<?php get_footer() ?>