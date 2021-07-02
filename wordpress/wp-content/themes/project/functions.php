<?php
/*
*    Khai bao gia tri
*       THEME_URL = lay duong dan thu muc them
*      CORE = lay duong dan thu muc / core
*/
define('THEME_URL',get_stylesheet_directory());
define('CORE',THEME_URL."/core");

/*
 *  Nhung file/core/init.php
 */
require_once(CORE."/init.php");

/*
 * Thiet lap chieu rong cua noi dung 
 */
if (!isset($content_width)) {
   $content_width = 620;
}

/*
 * Khai bao chuc nang
 */
if (!function_exists('project_theme_setup')) {
    function project_theme_setup(){
        // Thiet lap domain
        $language_folder = THEME_URL.'/languages';
        load_theme_textdomain('project',$language_folder);

        // Them link RSS(nhung chuc nang co san) len <head>
        add_theme_support('automatic-feed-links');

        // Them post thumbnail (anh dai dien theme)
        add_theme_support('post-thumbnails');

        // Post format
        add_theme_support('post-formats',array(
            'image',
            'video',
            'gallery',
            'quote',
            'link'
        ));  
        
        /// Them title-tag
        add_theme_support('title-tag');

        // Them custom background
        $defaut_background = array(
            'defaut-color' => 'e8e8e8'
        );
        add_theme_support('custom-background', $defaut_background);

        // Them menu
        register_nav_menu('primary-menu', __('Primary Menu','project'));

        // Tao sidebar 
        $sidebar = array(
            'name' => __('Main Sidebar','project'),
            'id' => 'main-sidebar',
            'description' => __('Defaut Sidebar'),
            'class' => 'main-sidebar',
            'before_title' => '<h3 class="widgettitle">',
            'after_tittle' => '</h3>'
        );

        register_sidebar($sidebar);
    }
    add_action('init','project_theme_setup');
}
//add Comment
add_action( 'wp_ajax_comment', 'comment_init' );
add_action( 'wp_ajax_nopriv_comment', 'comment_init' );
function comment_init() {
 
    //do bên js để dạng json nên giá trị trả về dùng phải encode
    $name = (isset($_POST['name']))?esc_attr($_POST['name']) : '';
    $comment = (isset($_POST['comment']))?esc_attr($_POST['comment']) : '';
    $email = (isset($_POST['email']))?esc_attr($_POST['email']) : '';
    $star = (isset($_POST['star']))?esc_attr($_POST['star']) : '';
    $id = (isset($_POST['id']))?esc_attr($_POST['id']) : '';


    $arg = array(
        'comment_post_ID' => $id,
        'comment_author' => $name,
        'comment_author_email' => $email,
        'comment_content' => $comment,
        'comment_type'  => '',
        'comment_karma' =>$star,
        'comment_date' => date('Y-m-d H:i:s'),
        'comment_date_gmt' => date('Y-m-d H:i:s'),
    );
    
    $comment_id = wp_insert_comment($arg);
 
    die();//bắt buộc phải có khi kết thúc
}
//LoadMore btn ajax
add_action( 'wp_ajax_loadmore', 'loadmore_init' );
add_action( 'wp_ajax_nopriv_loadmore', 'loadmore_init' );
function loadmore_init() {
    $page = (isset($_POST['page']))?esc_attr($_POST['page']) : '';
    $args = array(
        'orderby' =>'name',
        'order' => 'DESC',
        'limit' => 9, //Số lượng sp
        'paginate' => true,
        'paged' => $page,
    );
    $arr = [];
    $temp = [];
    $products = wc_get_products($args)->products;
    foreach($products as $item){
        $temp = ['id'=>$item->id,'name'=>$item->name,'Price'=>wc_price($item->get_regular_price()),'url'=>$item->get_permalink(),'img'=>wp_get_attachment_url($item->get_image_id())];
        array_push($arr,$temp);
    }
    echo json_encode($arr);
    die();//bắt buộc phải có khi kết thúc
}
//Load More category
add_action( 'wp_ajax_loadmorecategory', 'loadmorecategory_init' );
add_action( 'wp_ajax_nopriv_loadmorecategory', 'loadmorecategory_init' );
function loadmorecategory_init() {
    $id = (isset($_POST['id_category']))?esc_attr($_POST['id_category']) : '';
    $args = array(
        'orderby' =>'name',
        'order' => 'DESC',
        'limit' => 9, //Số lượng sp
        'paginate' => true,
        'paged' => 1,
        'tax_query' => array(
            array(
                'taxonomy' => 'product_cat',
                'terms' => $id,
                'operator' => 'IN',
            )
        )
    );
    $arr = [];
    $temp = [];
    $products = wc_get_products($args)->products;
    foreach($products as $item){
        $temp = ['id'=>$item->id,'name'=>$item->name,'Price'=>wc_price($item->get_regular_price()),'url'=>$item->get_permalink(),'img'=>wp_get_attachment_url($item->get_image_id())];
        array_push($arr,$temp);
    }
    echo json_encode($arr);
    die();//bắt buộc phải có khi kết thúc
}
//page category product
add_action( 'wp_ajax_loadmorecategoryPage', 'loadmorecategoryPage_init' );
add_action( 'wp_ajax_nopriv_loadmorecategoryPage', 'loadmorecategoryPage_init' );
function loadmorecategoryPage_init() {
    $id = (isset($_POST['id_category']))?esc_attr($_POST['id_category']) : '';
    $page = (isset($_POST['page']))?esc_attr($_POST['page']) : '';
    $args = array(
        'orderby' =>'name',
        'order' => 'DESC',
        'limit' => 9, //Số lượng sp
        'paginate' => true,
        'paged' => $page,
        'tax_query' => array(
            array(
                'taxonomy' => 'product_cat',
                'terms' => $id,
                'operator' => 'IN',
            )
        )
    );
    $arr = [];
    $temp = [];
    $products = wc_get_products($args)->products;
    foreach($products as $item){
        $temp = ['name'=>$item->name,'Price'=>wc_price($item->get_regular_price()),'url'=>$item->get_permalink(),'img'=>wp_get_attachment_url($item->get_image_id())];
        array_push($arr,$temp);
    }
    echo json_encode($arr);
    die();//bắt buộc phải có khi kết thúc
}
//product min Max price

add_action( 'wp_login_failed', 'front_end_login_fail' );
function front_end_login_fail( $username ) {

// Getting URL of the login page
$referrer = $_SERVER['HTTP_REFERER'];    
// if there's a valid referrer, and it's not the default log-in screen
if( !empty( $referrer ) && !strstr( $referrer,'wp-login' ) && !strstr( $referrer,'wp-admin' ) ) {
    wp_redirect( home_url() . "?login=failed" ); 
    exit;
}

}

/**
 * Function Name: check_username_password.
 * Description: This redirects to the custom login page if user name or password is   empty with a modified url
**/
add_action( 'authenticate', 'check_username_password', 1, 3);
function check_username_password( $login, $username, $password ) {

// Getting URL of the login page
$referrer = $_SERVER['HTTP_REFERER'];

// if there's a valid referrer, and it's not the default log-in screen
if( !empty( $referrer ) && !strstr( $referrer,'wp-login' ) && !strstr( $referrer,'wp-admin' ) ) { 
    if( $username == "" || $password == "" ){
        wp_redirect( home_url() . "?login=empty" );
        exit;
    }
}

}
// Register
add_action( 'wp_ajax_registerAjax', 'registerAjax_init' );
add_action( 'wp_ajax_nopriv_registerAjax', 'registerAjax_init' );
function registerAjax_init() {
    $userName = (isset($_POST['userName']))?esc_attr($_POST['userName']) : '';
    $email = (isset($_POST['email']))?esc_attr($_POST['email']) : '';
    $password = (isset($_POST['password']))?esc_attr($_POST['password']) : '';
    $check =  wp_create_user($userName,$password, $email);
    echo json_encode($check);
    die();//bắt buộc phải có khi kết thúc
}
//Delete cart ajax
add_action( 'wp_ajax_DeleteCartAjax', 'DeleteCartAjax_init' );
add_action( 'wp_ajax_nopriv_DeleteCartAjax', 'DeleteCartAjax_init' );
function DeleteCartAjax_init() {
    $key = (isset($_POST['key']))?esc_attr($_POST['key']) : '';
    
    echo json_encode(WC()->cart->remove_cart_item($key ));
    die();//bắt buộc phải có khi kết thúc
}
//Delete cart ajax
add_action( 'wp_ajax_QualityAjax', 'QualityAjax_init' );
add_action( 'wp_ajax_nopriv_QualityAjax', 'QualityAjax_init' );
function QualityAjax_init() {
    $key = (isset($_POST['key']))?esc_attr($_POST['key']) : '';
    $quality = (isset($_POST['quality']))?esc_attr($_POST['quality']) : '';
    echo json_encode(WC()->cart->set_quantity($key, $quality,true));
    die();//bắt buộc phải có khi kết thúc
}
//Add cart ajax
add_action( 'wp_ajax_addCartAjax', 'addCartAjax_init' );
add_action( 'wp_ajax_nopriv_addCartAjax', 'addCartAjax_init' );
function addCartAjax_init() {
    $id = (isset($_POST['id']))?esc_attr($_POST['id']) : '';
    $quality = (isset($_POST['quality']))?esc_attr($_POST['quality']) : '';
    $key = WC()->cart->add_to_cart($id);
    WC()->cart->set_quantity($key,$quality,true);
    $item = wc_get_product($id);
    $temp = ['key'=>$key,'quality'=>$quality,'name'=>$item->name,'Price'=>$item->get_regular_price(),'url'=>$item->get_permalink(),'img'=>wp_get_attachment_url($item->get_image_id())];
    echo json_encode($temp);
    die();//bắt buộc phải có khi kết thúc
}
//Checkout order ajax
add_action( 'wp_ajax_addOrderAjax', 'addOrderAjax_init' );
add_action( 'wp_ajax_nopriv_addOrderAjax', 'addOrderAjax_init' );
function addOrderAjax_init() {
    $first_name = (isset($_POST['first_name']))?esc_attr($_POST['first_name']) : '';
    $last_name = (isset($_POST['last_name']))?esc_attr($_POST['last_name']) : '';
    $email = (isset($_POST['email']))?esc_attr($_POST['email']) : '';
    $phone = (isset($_POST['phone']))?esc_attr($_POST['phone']) : '';
    $address_1 = (isset($_POST['address_1']))?esc_attr($_POST['address_1']) : '';
    $address_2 = (isset($_POST['address_2']))?esc_attr($_POST['address_2']) : '';
    $city = (isset($_POST['city']))?esc_attr($_POST['city']) : '';
    $state = (isset($_POST['state']))?esc_attr($_POST['state']) : '';
    $postcode = (isset($_POST['postcode']))?esc_attr($_POST['postcode']) : '';
    $totall_Sub= (isset($_POST['totall_Sub']))?esc_attr($_POST['totall_Sub']) : '';
    $total_All = (isset($_POST['total_All']))?esc_attr($_POST['total_All']) : '';
    $order_data = array(
        'status' => apply_filters('woocommerce_default_order_status', 'processing'),
        'customer_id' => get_current_user_id()
    );
    $order = wc_create_order($order_data);
    $address = array(
        'first_name' => $first_name,
        'last_name'  => $last_name,
        'email'      => $email,
        'phone'      => $phone,
        'address_1'  => $address_1,
        'address_2'  => $address_2,
        'city'       => $city,
        'state'      => $state,
        'postcode'   => $postcode
    );
    $items = WC()->cart->get_cart();
    foreach($items as $item => $values) {
      $product_id = $values['product_id'];
      $product = wc_get_product($product_id);
      $var_slug = $values['variation']['attribute_pa_weight'];
      $quantity = (int)$values['quantity'];
      $variationsArray = array();
      $variationsArray['variation'] = array(
        'pa_weight' => $var_slug
      );
      $order->add_product($product, $quantity, $variationsArray);
    }
    
    $order->set_address( $address, 'billing' );
    $order->set_address( $address, 'shipping' );
    
    $order->set_total($totall_Sub, 'total');
    $order->set_total($total_All, 'subtotal');
    $order->update_status( 'processing' );
    echo json_encode(WC()->cart->empty_cart());
    die();//bắt buộc phải có khi kết thúc
}
//Ajax panigation Page
add_action( 'wp_ajax_panigationPostNews', 'panigationPostNews_init' );
add_action( 'wp_ajax_nopriv_panigationPostNews', 'panigationPostNews_init' );
function panigationPostNews_init() {
    $page = (isset($_POST['page']))?esc_attr($_POST['page']) : '';
    $args = array(
        'post_type' => 'post',
        'orderby'    => 'ID',
        'post_status' => 'publish',
        'order'    => 'DESC',
        'posts_per_page' => 6, // this will retrive all the post that is published 
        'paged' => $page
    );
    $result = new WP_Query($args); 
    $posts = $result->posts;
    echo json_encode($posts);
    die();//bắt buộc phải có khi kết thúc
}
//add Comment Post
add_action( 'wp_ajax_commentPost', 'commentPost_init' );
add_action( 'wp_ajax_nopriv_commentPost', 'commentPost_init' );
function commentPost_init() {
 
    //do bên js để dạng json nên giá trị trả về dùng phải encode
    $name = (isset($_POST['name']))?esc_attr($_POST['name']) : '';
    $message = (isset($_POST['message']))?esc_attr($_POST['message']) : '';
    $email = (isset($_POST['email']))?esc_attr($_POST['email']) : '';
    $id = (isset($_POST['id']))?esc_attr($_POST['id']) : '';
    $subject = (isset($_POST['subject']))?esc_attr($_POST['subject']) : '';

    $arg = array(
        'comment_post_ID' => $id,
        'comment_author' => $name,
        'comment_author_email' => $email,
        'comment_content' => $message,
        'comment_type'  => '',
        'comment_date' => date('Y-m-d H:i:s'),
        'comment_date_gmt' => date('Y-m-d H:i:s'),
    );
    
   wp_insert_comment($arg);
 
    die();//bắt buộc phải có khi kết thúc
}

