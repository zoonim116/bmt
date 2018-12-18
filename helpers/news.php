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
		$args = [
		    'post_type'              => 'post',
		    'nopaging'               => false,
		    'posts_per_page'         => $posts_per_page,
		    'order'                  => 'DESC',
		    'orderby'                => 'ID',
		];

		$query = new WP_Query( $args );
		if ( $query->have_posts() ) {
		    while ( $query->have_posts() ) {
		        $query->the_post();
		        get_template_part('template-parts/news-item');
		    }
		} else {
		    _e('Новостей нет', 'bmt');
		}
		wp_reset_postdata();
	}
}

add_action('get_last_news_action', 'get_last_news');

if(!function_exists('get_news')) {
	function get_news() {
		$paged = (get_query_var('paged')) ? get_query_var('paged') : 0;

		$postsPerPage = (get_option('posts_per_page')) ? get_option('posts_per_page') : 10;
		$postOffset = $paged * $postsPerPage;

		$args = array(
		    'posts_per_page'  => $postsPerPage,
		    'category_name'   => $btmetanm,
		    'offset'          => $postOffset,
		    'post_type'       => 'post'
		);

		$query = new WP_Query( $args );
		if ( $query->have_posts() ) {
		    while ( $query->have_posts() ) {
		        $query->the_post();
		        get_template_part('template-parts/news-item');
			}
			wp_reset_postdata();
		} else {
		    _e('Новостей нет', 'bmt');
		}
		
		// $prev_arrow = is_rtl() ? '→' : '←';
		// $next_arrow = is_rtl() ? '←' : '→';
		
		// // global $wp_query;
		// // $published_posts = wp_count_posts()->publish;
		
		// // $posts_per_page = get_option('posts_per_page');
		// // $total = ceil($published_posts / $posts_per_page);
		// // $big = 999999999; // need an unlikely integer
		// // // die(var_dump($max));
		// // if( $total > 1 )  {
		// // 	if( !$current_page = get_query_var('paged') )
		// // 		$current_page = 1;
		// // 	if( get_option('permalink_structure') ) {
		// // 		$format = 'page/%#%/';
		// // 	} else {
		// // 		$format = '&paged=%#%';
		// // 	}
		// // 	echo paginate_links(array(
		// // 		'base'			=> str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
		// // 		'format'		=> $format,
		// // 		'current'		=> max( 1, get_query_var('paged') ),
		// // 		'total' 		=> $total,
		// // 		'mid_size'		=> 3,
		// // 		'type' 			=> 'list',
		// // 		'prev_text'		=> $prev_arrow,
		// // 		'next_text'		=> $next_arrow,
		// // 	));
		// // 	// previous_posts_link('&laquo; Previous Entries' );
		// // }
	}
}

add_action('get_news_action', 'get_news');
