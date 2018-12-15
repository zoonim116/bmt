<?php

function change_post_object_label() {
    global $wp_post_types;

    $labels = &$wp_post_types['post']->labels;
    $labels->name = __('Новости', 'bmt');
    $labels->singular_name = __('Новость', 'bmt');
    $labels->add_new = __('Добавить', 'bmt');
    $labels->add_new_item = __('Добавить новость', 'bmt');
    $labels->edit_item = __('Редактировать новость', 'bmt');
    $labels->new_item = 'New Portfolio';
    $labels->view_item = __('Посмотреть новость', 'bmt');
    $labels->search_items = __('Найти новость', 'bmt');
    $labels->not_found = __('Новости не найдены', 'bmt');
    $labels->not_found_in_trash = __('новости не найдена в корзине', 'bmt');
}
add_action( 'init', 'change_post_object_label' );


// Get N last news for homepage
if(!function_exists('get_last_news')) {
	function get_last_news(){
		$posts_per_page = favpress_option('bmt_option.news_on_homepage');
		$args = array (
		    'post_type'              => 'post',
		    'nopaging'               => false,
		    'posts_per_page'         => $posts_per_page,
		    'order'                  => 'DESC',
		    'orderby'                => 'ID',
		);

		$query = new WP_Query( $args );
	}
}

add_action('get_last_news_action', 'get_last_news');
