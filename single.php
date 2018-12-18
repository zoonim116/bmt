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
		  <?php if(is_single()): ?>
		  	<?php
		  		$obj = get_post_type_object('post');
		  	 ?>
		  	 &#187;
		  	<li class="list-inline-item" itemprop="itemListElement" itemscope
		      itemtype="http://schema.org/ListItem">
		    <a itemtype="http://schema.org/Thing"
		       itemprop="item" href="<?php echo get_page_link(78); ?>">
		        <span itemprop="name"><?php _e($obj->labels->name, 'bmt'); ?></span></a>
		    <meta itemprop="position" content="1" />
		  </li>

		  <?php endif; ?>
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
    <div class="content">

	    <?php 
		if ( have_posts() ) {
			while ( have_posts() ) {
				the_post(); ?>
				<span class="title-page"><?php the_title(); ?></span>
			<?php	the_content();
			}
		}
		?>
	</div>
</main>

<?php get_sidebar(); ?>

<?php get_footer(); ?>