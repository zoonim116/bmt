<aside class="col-sm-5 col-lg-4 col-xs-12 aside-wrap">
    
    <span class="aside-title"><?php _e('Наши партнеры', 'bmt'); ?></span>
    <ul class="aside-list list-unstyled">
        <li><a href="#" target="_blank" rel="nofollow"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/rozula-banner.png" class="img-responsive" alt="partner"/></a></li>
        <li><a href="#" target="_blank" rel="nofollow"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/pelagia-banner.png" class="img-responsive" alt="partner"/></a></li>
        <li><a href="#" target="_blank" rel="nofollow"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/egersund-banner.png" class="img-responsive" alt="partner"/></a></li>
    </ul>
    <?php if (!empty(get_page_template_slug())) : ?>
        <?php get_template_part('sidebar-', get_page_template_slug()); ?>
    <?php else: ?>
        <span class="aside-title"><?php echo _e("Заявка", 'bmt'); ?></span>
    <div class="aside-content">
        <div class="aside-content-text">
            <?php dynamic_sidebar( 'homepage-sidebar' ); ?>
        </div>
        <a href="#" class="btn"><? _e('Заполнить заявку', 'bmt'); ?></a>
    </div>
    <?php endif; ?>
    
</aside>