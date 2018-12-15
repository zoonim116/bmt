<?php
require_once 'helpers/class-tgm-plugin-activation.php';
require_once 'helpers/register_required_plugins.php';
require_once 'helpers/bs4navwalker.php';
require_once 'helpers/news.php';

/************************ Setup theme **********************************************/
add_action( 'after_setup_theme', 'bmt_setup' );
function bmt_setup(){
    $res = load_theme_textdomain('bmt');
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'custom-logo' );
    add_theme_support('widgets');
    add_theme_support( 'html5', array( 'gallery', 'caption', 'search-form' ));
}

/************************ Register scripts and styles *****************************/
function wpdocs_theme_name_scripts() { 
    wp_enqueue_script( 'popper', get_template_directory_uri() . '/assets/js/popper.min.js', array(), '1.0.0', true );
    wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array(), '1.0.6', true );
    wp_enqueue_style( 'bootstrap-css', get_template_directory_uri() . '/assets/css/bootstrap.min.css');
    wp_enqueue_style( 'style', get_template_directory_uri() . '/assets/css/style.css');
}

add_action( 'wp_enqueue_scripts', 'wpdocs_theme_name_scripts' );

function themeName_customize_register( $wp_customize ) {

    $wp_customize->add_setting('header_footer', array(
        'transport'         => 'refresh',
        'height'         => 325,
    ));    

    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'header_footer', array(
        'label'             => __('Логотип в футере', 'bmt'),
        'section'           => 'title_tagline',
        'settings'          => 'header_footer',
    )));    
}
add_action('customize_register', 'themeName_customize_register');

function register_menus() {
    register_nav_menus(
        array(
            'header-menu' => __( 'Основное меню', 'bmt' ),
        )
    );
}
add_action( 'init', 'register_menus' );

if(!function_exists('bmt_show_language_panel')) {
	function bmt_show_language_panel(){
		if ( class_exists( 'WPGlobus' ) ) {
			echo '<ul class="list-inline lang-list">';
				foreach( WPGlobus::Config()->enabled_languages as $lang ) {
					$url = WPGlobus_Utils::localize_current_url( $lang );
					if($lang == WPGlobus::Config()->language) {
						echo "<li class=\"list-inline-item\"><a href=\"{$url}\" class=\"active\">{$lang}</a></li>";
					} else {
						echo "<li class=\"list-inline-item\"><a href=\"{$url}\">{$lang}</a></li>";
					}
				}
			echo '</ul>';
		}
	}
}

add_action('bmt_show_language_panel_action', 'bmt_show_language_panel', 10);

$options = include  get_template_directory() .'/helpers/favpress_options.php';
$theme_options = new FavPress_Option (array(
    'is_dev_mode'           => false,                                  // dev mode, default to false
    'option_key'            => 'bmt_option',                           // options key in db, required
    'page_slug'             => 'bmt_option',                           // options page slug, required
    'template'              => $options,                              // template file path or array, required
    'menu_page'             => 'themes.php',                           // parent menu slug or supply `array` (can contains 'icon_url' & 'position') for top level menu
    'use_auto_group_naming' => true,                                   // default to true
    'use_util_menu'         => true,                                   // default to true, shows utility menu
    'minimum_role'          => 'edit_theme_options',                   // default to 'edit_theme_options'
    'layout'                => 'fixed',                                // fluid or fixed, default to fixed
    'page_title'            => __( 'Настройки темы', 'vp_textdomain' ), // page title
    'menu_label'            => __( 'Настройки темы', 'vp_textdomain' ), // menu label
));

/**
 * Register Sidebar
 */
function bmt_register_sidebars() {

	$sidebars = [
		[
			'id' => 'homepage-sidebar',
			'name' => __( 'Главная страница', 'bmt' ),
			'description' => __( 'A short description of the sidebar.', 'bmt' ),
			'before_widget' => '',
			'after_widget' => '',
		],
		[
			'id' => 'partners-sidebar',
			'name' => __( 'Виджет партнеров', 'bmt' ),
			'description' => __( 'Виджет со ссылками на партнеров.', 'bmt' ),
			'before_widget' => '',
			'after_widget' => '',
		]	
	];
	/* Repeat register_sidebar() code for additional sidebars. */
	foreach ($sidebars as $sidebar) {
			register_sidebar($sidebar);
	}	
}
add_action( 'widgets_init', 'bmt_register_sidebars' );

function change_post_menu_label() {
    global $menu, $submenu;

    $menu[5][0] = 'Новости';
    $submenu['edit.php'][5][0] = 'Новости';
    $submenu['edit.php'][10][0] = 'Добавить новость';
    $submenu['edit.php'][16][0] = 'Тэги';
    echo '';
}
add_action( 'admin_menu', 'change_post_menu_label' );