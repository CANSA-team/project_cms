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
require_once(CORE."init.php");

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
        register_nav_menus('primary-menu', __('Primary Menu','project'));

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