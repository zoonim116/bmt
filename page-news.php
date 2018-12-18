<? /* Template Name: Шаблон новостной страницы */ ?>
<?php get_header(); ?>
<main class="col-sm-7 col-lg-8 col-xs-12">
    <div class="breadcrumbs">
    	<ol class="list-inline" itemscope itemtype="http://schema.org/BreadcrumbList">
		  <li class="list-inline-item" itemprop="itemListElement" itemscope
		      itemtype="http://schema.org/ListItem">
		    <a itemtype="http://schema.org/Thing"
		       itemprop="item" href="<?php echo get_home_url(); ?>">
		        <span itemprop="name"><?php _e('Главная', 'bmt'); ?></span></a>
		    <meta itemprop="position" content="1" />
		  </li>
		  	<?php if(!is_front_page()): ?>
		  		<?php global $wp; ?>
			  &#187;
			  <li class="list-inline-item" itemprop="itemListElement" itemscope
			      itemtype="http://schema.org/ListItem">
			    <a itemtype="http://schema.org/Thing"
			       itemprop="item" href="<?php echo home_url( $wp->request ); ?>">
			      <span itemprop="name"><?php echo single_post_title(); ?></span></a>
			    <meta itemprop="position" content="2" />
			  </li>
			<?php endif; ?>
		</ol>
    </div>
    <span class="title-page"><?php the_title(); ?></span>
    <div class="news-wrap">
		<?php $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$args = array('posts_per_page' => (get_option('posts_per_page')) ? get_option('posts_per_page') : 10, 'paged' => $paged, 'post_type'       => 'post' );
query_posts($args); ?>
		<?php if ( have_posts() ) : ?>

<!-- Add the pagination functions here. -->

<!-- Start of the main loop. -->
<?php while ( have_posts() ) : the_post();  ?>
<div class="news-item">
	<a href="<?php the_permalink(); ?>" class="news-title">
        <?php the_title(); ?>
    </a>
		<a href="#" class="data-news"><?php echo get_the_date(); ?></a>
    <a href="<?php the_permalink(); ?>" class="short-news"> <?php do_action('get_translated_content_action', get_the_content(), 0, 200); ?>...</a>
</div>

<?php endwhile; ?>
<!-- End of the main loop -->

<!-- Add the pagination functions here. -->

<div class="nav-previous alignleft"><?php previous_posts_link( __('Вперед', 'bmt')); ?></div>
<div class="nav-next alignright"><?php next_posts_link( __('Назад', 'bmt')); ?></div>

<?php else : ?>
<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
<?php endif; ?>

		<?php //do_action('get_news_action'); ?>
    </div>
    <?php if(is_front_page()): ?>
		<div class="last-news">
	            <span class="title-wrap"><?php _e('Последние новости', 'bmt'); ?></span>
	            <div class="news-container row">
	            	<?php do_action('get_last_news_action'); ?>
	            </div>
	    </div>
	<?php endif; ?>
</main>

<?php get_sidebar(); ?>

<?php get_footer(); ?>