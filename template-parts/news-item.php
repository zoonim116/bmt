<?php if(is_front_page()): ?>
	<div class="news-item col-md-6">
<?php else: ?>
	<div class="news-item">
<?php endif; ?>

    <a href="<?php the_permalink(); ?>" class="news-title">
        <?php the_title(); ?>
    </a>
    <?php if(!is_front_page()): ?>
		<a href="#" class="data-news"><?php the_date(); ?></a>
    <?php endif; ?>

    <a href="<?php the_permalink(); ?>" class="short-news"> <?php do_action('get_translated_content_action', get_the_content(), 0, 200); ?>...</a>
</div>