<?php
require_once 'helpers/class-tgm-plugin-activation.php';
require_once 'helpers/register_required_plugins.php';
require_once 'helpers/bs4navwalker.php';

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
			echo '</ul><!-- .wpglobus-selector-box -->';
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

	/* Register the primary sidebar. */
	register_sidebar(
		array(
			'id' => 'partners-sidebar',
			'name' => __( 'Наши партнеры', 'bmt' ),
			'description' => __( 'A short description of the sidebar.', 'bmt' ),
			'before_widget' => '<aside id="%1$s" class="col-sm-5 col-lg-4 col-xs-12 aside-wrap %2$s">',
			'after_widget' => '</aside>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>'
		)
	);

	/* Repeat register_sidebar() code for additional sidebars. */
}
add_action( 'widgets_init', 'textdomain_register_sidebars' );