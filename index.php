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
    <div class="content-wrap">
    	<?php 
		if ( have_posts() ) {
			while ( have_posts() ) {
				the_post(); 
				the_content();
			}
		}
		?>
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

<?php get_sidebar('proposal'); ?>

<?php get_footer(); ?>