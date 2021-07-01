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
        $temp = ['name'=>$item->name,'Price'=>wc_price($item->get_regular_price()),'url'=>$item->get_permalink(),'img'=>wp_get_attachment_url($item->get_image_id())];
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
        $temp = ['name'=>$item->name,'Price'=>wc_price($item->get_regular_price()),'url'=>$item->get_permalink(),'img'=>wp_get_attachment_url($item->get_image_id())];
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
add_action( 'wp_ajax_nopriv_addCartAjax', 'QaddCartAjax_init' );
function addCartAjax_init() {
    $id = (isset($_POST['id']))?esc_attr($_POST['id']) : '';
    $quality = (isset($_POST['quality']))?esc_attr($_POST['quality']) : '';
    $key = WC()->cart->add_to_cart($id);

    echo json_encode(WC()->cart->set_quantity($key, $quality,true));
    die();//bắt buộc phải có khi kết thúc
}

