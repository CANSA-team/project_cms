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
        register_nav_menu('footer-col-1', __('Footer About','project'));
        register_nav_menu('footer-col-2', __('Footer Contact','project'));
        register_nav_menu('footer-col-3', __('Footer Links','project'));
        register_nav_menu('footer-col-4', __('Footer Explore','project'));


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
